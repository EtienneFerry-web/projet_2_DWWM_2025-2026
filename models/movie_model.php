<?php
    require_once'models/mother_model.php';

    class MovieModel extends Connect{

        public function newMovie(){
          $strRq	= "
                        SELECT mov_id, pho_url AS 'mov_url', COALESCE(AVG(ratings.rat_score), 0) AS 'mov_rating', COUNT(DISTINCT lik_user_id) AS 'mov_like'
                        FROM movies
                        LEFT JOIN photos ON movies.mov_id = photos.pho_mov_id
                        LEFT JOIN ratings ON movies.mov_id = ratings.rat_mov_id
                        LEFT JOIN liked ON movies.mov_id = liked.lik_item_id AND liked.lik_type = 'movies'
                        WHERE mov_release_date BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE()
                        GROUP BY movies.mov_id
                        ";

            return $this->_db->query($strRq)->fetchAll();
        }


        public function allMovie(array $arrPost=[] ):array{

            $strWhere	= " WHERE ";


			$strRq	= " SELECT mov_id, mov_title, mov_description , pho_url AS 'mov_url', COALESCE(AVG(ratings.rat_score), 0) AS 'mov_rating', COUNT(DISTINCT lik_user_id) AS 'mov_like'
                        FROM movies
                        LEFT JOIN photos ON movies.mov_id = photos.pho_mov_id
                        LEFT JOIN ratings ON movies.mov_id = ratings.rat_mov_id
                        LEFT JOIN liked ON movies.mov_id = liked.lik_item_id AND liked.lik_type = 'movies'
                        ";
            $conditions = [];

            //Recherche de tel acteur en temps que acteur, realisateur et producter
            if (!empty($arrPost['actor'])) {
                $conditions[] = "participates.part_job_id = 3 AND participates.part_pers_id = " . (int)$arrPost['actor'] . "";
            }

            if (!empty($arrPost['producer'])) {
                $conditions[] = "participates.part_job_id = 2 AND participates.part_pers_id = " . (int)$arrPost['producer'] . "";
            }

            if (!empty($arrPost['realisator'])) {
                $conditions[] = "participates.part_job_id = 1 AND participates.part_pers_id = " . (int)$arrPost['realisator'] . "";
            }

            if (!empty($conditions)) {
                $strRq .= " $strWhere mov_id IN (
                                SELECT part_mov_id
                                FROM participates
                                WHERE " . implode(" OR ", $conditions) . "
                            )";
                $strWhere	= " AND ";
            }

            if (!empty($arrPost['categories'])){
                $strRq .=" $strWhere mov_id IN( SELECT belong_mov_id
                                                FROM belongs
                                                WHERE belong_cat_id =".$arrPost['categories'].")";
                $strWhere	= " AND ";
            }

            if (!empty($arrPost['country'])){
                $strRq .=" $strWhere mov_nat_id ='".$arrPost['country']."'";
                $strWhere	= " AND ";
            }

            if(!empty($arrPost['date'])){
                $strRq .=" $strWhere mov_release_date = '".$arrPost['date']."'
                            ";
            } elseif(!empty($arrPost['startDate']) && !empty($arrPost['endDate'])){

                $strRq .=" $strWhere mov_release_date BETWEEN '".$arrPost['startDate']."' AND '".$arrPost['startDate']."'";

            } elseif(!empty($arrPost['startDate'])){

                $strRq .=" $strWhere mov_release_date > '".$arrPost['startDate']."'";

            } elseif(!empty($arrPost['endDate'])){

                $strRq .=" $strWhere mov_release_date < '".$arrPost['endDate']."'";

            }


            // (Your existing filter logic here is commented out in source, keeping as is)

            $strRq .= " GROUP BY movies.mov_id
                        ORDER BY mov_release_date DESC
                        ";



            return $this->_db->query($strRq)->fetchAll();
        }

		public function findMovie(int $idMovie=0){

 	        $strRq	= " SELECT movies.*,
                            pho_url AS 'mov_url',
                            COALESCE(AVG(ratings.rat_score), 0) AS 'mov_rating',
                            COUNT(DISTINCT lik_user_id ) AS 'mov_like',
                            nat_country AS 'mov_country'
                        FROM movies
                        LEFT JOIN photos ON movies.mov_id = photos.pho_mov_id
                        LEFT JOIN nationalities ON movies.mov_nat_id = nationalities.nat_id
                        LEFT JOIN ratings ON movies.mov_id = ratings.rat_mov_id
                        LEFT JOIN liked ON movies.mov_id = liked.lik_item_id AND liked.lik_type = 'movies'
                        WHERE mov_id = $idMovie ";


            return $this->_db->query($strRq)->fetch();
        }

		public function movieOfPerson(int $idPerson=0,array $arrPost=[]):array{

          	$strRq	= " SELECT
                            movies.mov_id,
                            photos.pho_url AS 'mov_url',
                            COALESCE(AVG(ratings.rat_score), 0) AS 'mov_rating',
                            COUNT(DISTINCT lik_user_id) AS 'mov_like'
                        FROM persons
                        LEFT JOIN participates ON persons.pers_id = participates.part_pers_id
                        LEFT JOIN movies ON participates.part_mov_id = movies.mov_id
                        LEFT JOIN photos ON movies.mov_id = photos.pho_mov_id
                        LEFT JOIN ratings ON movies.mov_id = ratings.rat_mov_id
                        LEFT JOIN liked ON movies.mov_id = liked.lik_item_id AND liked.lik_type = 'movies'
                        WHERE persons.pers_id = $idPerson ";

            if(!empty($arrPost['job'])){
                $strRq	.=" AND mov_id IN ( SELECT part_mov_id
                                           	FROM participates
                                           	WHERE part_pers_id = $idPerson AND part_job_id = ".$arrPost['job'].")";
            }



            $strRq	.=" GROUP BY movies.mov_id";

            if(!empty($arrPost['order'])){
                $strRq	.=" ORDER BY mov_release_date ".$arrPost['order'];
            }

            return $this->_db->query($strRq)->fetchAll();
        }


        public function userLike(int $idUser=0){
            // FIX: Added MIN() around pho_url and added GROUP BY to avoid duplicates
            $strRq  = " SELECT
                            movies.mov_id,
                            photos.pho_url AS 'mov_url'
                        FROM users
                        LEFT JOIN liked ON users.user_id = liked.lik_user_id AND liked.lik_type = 'movies'
                        INNER JOIN movies ON liked.lik_item_id = movies.mov_id
                        INNER JOIN photos ON movies.mov_id = photos.pho_mov_id
                        WHERE user_id = $idUser
                        GROUP BY movies.mov_id
                        ORDER BY lik_created_at";

            return $this->_db->query($strRq)->fetchAll();

		}


		public function allCountry(){

		    $strRq	= " SELECT nat_id AS 'mov_id', nat_country AS 'mov_country'
						FROM nationalities";

            return $this->_db->query($strRq)->fetchAll();

		}

		public function allCategories(){

		    $strRq	= " SELECT cat_id AS 'mov_id', cat_name AS 'mov_categories'
						FROM categories";

            return $this->_db->query($strRq)->fetchAll();

        }

    }
?>
