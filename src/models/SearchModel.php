<?php
    namespace App\Models;
    use PDO;

    class SearchModel extends Connect{

        public function searchContent(object $objSearch, int $searchBy=0, int $limite): array {

            $strRq = "SELECT sear_id, sear_name, sear_content, sear_photo, sear_rating, sear_like, sear_type
                      FROM (";

            if(empty($searchBy) || $searchBy == 5){
                $strRq .=" SELECT mov_id AS sear_id, mov_title AS sear_name, mov_description AS sear_content, pho_photo AS sear_photo,
                                    COALESCE(AVG(ratings.rat_score), 0) AS sear_rating,
                                    COALESCE(COUNT(DISTINCT lik_user_id), 0) AS sear_like, 'movie' AS sear_type,
                                    CASE
                                        WHEN mov_title LIKE :search THEN 1
                                        WHEN mov_title LIKE :startSearch THEN 2
                                    ELSE 3 END AS score
                            FROM movies
                            LEFT JOIN photos ON movies.mov_id = photos.pho_mov_id
                            LEFT JOIN ratings ON movies.mov_id = ratings.rat_mov_id
                            LEFT JOIN liked ON movies.mov_id = liked.lik_mov_id
                            WHERE mov_title LIKE :fullSearch AND lik_com_id IS NULL
                         GROUP BY mov_id";
            }

            if(empty($searchBy)){
                 $strRq .=" UNION ";
            }

            if(empty($searchBy) || $searchBy != 5 && $searchBy != 4){
                $strRq .="      SELECT pers_id AS sear_id, CONCAT(pers_name, ' ', pers_firstname) AS sear_name, pers_bio AS sear_content, pers_photo AS sear_photo, NULL AS sear_rating,  NULL AS sear_like, 'person' AS sear_type,
                                 CASE
                                    WHEN CONCAT(pers_name, ' ', pers_firstname) LIKE :search THEN 1
                                    WHEN CONCAT(pers_name, ' ', pers_firstname) LIKE :startSearch THEN 2
                                    ELSE 3 END AS score
                          FROM persons
                          WHERE CONCAT(pers_name, ' ', pers_firstname) LIKE :fullSearch";
                if($searchBy != 0){
                    $strRq .=" AND pers_id IN ( SELECT part_pers_id
                                                FROM participates
                                                WHERE part_job_id = :job
                            )";
                }
            }
            if(empty($searchBy)){
                 $strRq .=" UNION ";
            }

             if(empty($searchBy) || $searchBy == 4){
                  $strRq .="        SELECT user_id AS sear_id, user_pseudo AS sear_name, user_bio AS sear_content, user_photo AS sear_photo, NULL AS sear_rating,  NULL AS sear_like, 'user' AS sear_type,
                                    CASE
                                        WHEN user_pseudo LIKE :search THEN 1
                                        WHEN user_pseudo LIKE :startSearch THEN 2
                                        ELSE 3 END AS score
                                    FROM users
                                    WHERE user_pseudo LIKE :fullSearch";
             }

            $strRq .=" ) AS search_results
                      ORDER BY score, sear_name LIMIT :limit";



            $rqPrep = $this->_db->prepare($strRq);
            $rqPrep->bindValue(":limit", $limite, PDO::PARAM_INT);
            $rqPrep->bindValue(":fullSearch", "%".$objSearch->getSearch() ."%", PDO::PARAM_STR);
            $rqPrep->bindValue(":startSearch", $objSearch->getSearch()."%", PDO::PARAM_STR);
            $rqPrep->bindValue(":search", $objSearch->getSearch(), PDO::PARAM_STR);
            
            if (strpos($strRq, ':job') !== false) {
                $rqPrep->bindValue(":job", $searchBy, PDO::PARAM_INT);
            }
            $rqPrep->execute();

            return $rqPrep->fetchAll(PDO::FETCH_ASSOC);
        }

    }
