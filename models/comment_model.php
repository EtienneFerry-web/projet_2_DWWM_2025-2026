<?php

    require_once'models/mother_model.php';

    class CommentModel extends Connect{

        public function commentOfMovie(int $idMovie=0){

            $strRq	= " SELECT
                            comments.com_id,
                            comments.com_user_id,
                            users.user_pseudo AS com_pseudo,
                            comments.com_comment,
                            ratings.rat_score AS com_rating,
                            comments.com_datetime,
                            COUNT(DISTINCT liked.lik_user_id) AS com_like
                        FROM comments
                        INNER JOIN users ON comments.com_user_id = users.user_id
                        INNER JOIN movies ON comments.com_movie_id = movies.mov_id
                        LEFT JOIN liked ON liked.lik_item_id = comments.com_id AND liked.lik_type = 'comment'
                        LEFT JOIN ratings ON ratings.rat_mov_id = movies.mov_id AND ratings.rat_user_id = users.user_id
                        WHERE movies.mov_id = $idMovie
                        GROUP BY
                            comments.com_id,
                            comments.com_user_id,
                            users.user_pseudo,
                            comments.com_comment,
                            ratings.rat_score,
                            comments.com_datetime";


		    return $this->_db->query($strRq)->fetchAll();

        }

        public function reviewUser(int $idUser=0){

            $strRq	="  SELECT
                            movies.mov_id AS 'com_id',
                            photos.pho_url AS 'com_url',
                            movies.mov_title  AS 'com_title',
                            comments.com_comment,
                            ratings.rat_score AS 'com_rating',
                            COUNT(DISTINCT lik_user_id) AS 'com_like',
                            com_datetime
                        FROM users
                        INNER JOIN ratings ON users.user_id = ratings.rat_user_id
                        INNER JOIN movies ON ratings.rat_mov_id = movies.mov_id
                        INNER JOIN comments ON (users.user_id = comments.com_user_id AND movies.mov_id = comments.com_movie_id)
                        INNER JOIN photos ON movies.mov_id = photos.pho_mov_id
                        LEFT JOIN liked ON liked.lik_item_id = comments.com_id AND liked.lik_type = 'comment'
                        WHERE users.user_id = $idUser
                            GROUP BY
                            comments.com_id,
                            comments.com_user_id,
                            users.user_pseudo,
                            comments.com_comment,
                            ratings.rat_score,
                            comments.com_datetime";


	        return $this->_db->query($strRq)->fetchAll();

        }


        /**
         * @author Etienne
         * Function insert Comment & rating in database
         * @param object $objComment Comment object
         * 
         */
        
public function commentInsert(object $objComment): bool {
    // 1. Insertion du commentaire (Cela fonctionne car on peut commenter plusieurs fois)
    $sql1 = "INSERT INTO comments (com_comment, com_user_id, com_movie_id, com_datetime) 
            VALUES (:comment, :userId, :movieId, NOW())
            ON DUPLICATE KEY UPDATE com_comment = :comment, com_datetime = NOW() ";
    
    $rq1 = $this->_db->prepare($sql1);
    $rq1->bindValue(":comment", $objComment->getComment(), PDO::PARAM_STR);
    $rq1->bindValue(":userId",  $objComment->getUser_id(), PDO::PARAM_INT);
    $rq1->bindValue(":movieId", $objComment->getMovieId(), PDO::PARAM_INT);
    
    $success1 = $rq1->execute();

    // 2. CORRECTION ICI : Gestion de la note (INSERT ou UPDATE)
    // On utilise "ON DUPLICATE KEY UPDATE"
    $sql2 = "INSERT INTO ratings (rat_user_id, rat_mov_id, rat_score) 
            VALUES (:userId, :movieId, :rating)
            ON DUPLICATE KEY UPDATE rat_score = :rating";

    $rq2 = $this->_db->prepare($sql2);
    $rq2->bindValue(":userId",  $objComment->getUser_id(), PDO::PARAM_INT);
    $rq2->bindValue(":movieId", $objComment->getMovieId(), PDO::PARAM_INT);
    
    // ATTENTION : Si tes notes sont à virgule (ex: 4.5), utilise PARAM_STR
    $rq2->bindValue(":rating",  $objComment->getRating(),  PDO::PARAM_STR); 
    
    $success2 = $rq2->execute();

    return ($success1 && $success2);
}

    }
