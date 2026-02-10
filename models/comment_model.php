<?php

    require_once'models/mother_model.php';

    class CommentModel extends Connect{

        public function commentOfMovie(int $idMovie=0, $idConnectUser=0){

            $strRq	= " SELECT
                            comments.com_id,
                            comments.com_user_id,
                            comments.com_spoiler,
                            users.user_pseudo AS com_pseudo,
                            users.user_photo AS com_url,
                            comments.com_comment,
                            ratings.rat_score AS com_rating,
                            comments.com_datetime,
                            COUNT(DISTINCT liked.lik_user_id) AS com_like,

                            EXISTS(
                            SELECT 1 FROM reported_comments 
                            WHERE rep_com_reported_id = comments.com_id 
                            AND rep_com_reporter_id = $idConnectUser
                            ) AS 'com_reported'

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

        public function reviewUser(int $idUser=0, int $idConnectUser=0){

            $strRq	="  SELECT
                        com_id,
                        comments.com_spoiler,
                        movies.mov_id AS 'com_movieId',
                        photos.pho_url AS 'com_url',
                        movies.mov_title AS 'com_title',
                        comments.com_comment,
                        ratings.rat_score AS 'com_rating',
                        COUNT(DISTINCT liked.lik_user_id) AS 'com_like',
                        com_datetime,
                    
                        EXISTS(
                            SELECT 1 FROM reported_comments 
                            WHERE rep_com_reported_id = comments.com_id 
                            AND rep_com_reporter_id = $idConnectUser
                        ) AS 'com_reported'

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
                        comments.com_datetime,
                        photos.pho_url,
                        movies.mov_id,
                        movies.mov_title";


	        return $this->_db->query($strRq)->fetchAll();

        }


        /**
         * @author Etienne
         * Function insert Comment & rating in database
         * @param object $objComment Comment object
         *
         */

        public function commentInsert(object $objComment) {

            $sql1 = "INSERT IGNORE INTO comments (com_comment, com_user_id, com_movie_id, com_datetime)
                    VALUES (:comment, :userId, :movieId, NOW())";

            $rq1 = $this->_db->prepare($sql1);
            $rq1->bindValue(":comment", $objComment->getComment(), PDO::PARAM_STR);
            $rq1->bindValue(":userId",  $objComment->getUser_id(), PDO::PARAM_INT);
            $rq1->bindValue(":movieId", $objComment->getMovieId(), PDO::PARAM_INT);

            $success1 = $rq1->execute();

            if ($rq1->rowCount() === 0) {
                return [
                    'success' => false,
                    'error' => 'Vous avez déjà commenté ce film, vous pouvez le modifier dans votre profil !'
                ];
            }

    // 2. CORRECTION ICI : Gestion de la note (INSERT ou UPDATE)
    // On utilise "ON DUPLICATE KEY UPDATE"
    $sql2 = "INSERT INTO ratings (rat_user_id, rat_mov_id, rat_score) 
            VALUES (:userId, :movieId, :rating)
            ON DUPLICATE KEY UPDATE rat_score = :rating";

            $sql2 = "INSERT IGNORE INTO ratings (rat_user_id, rat_mov_id, rat_score)
                    VALUES (:userId, :movieId, :rating)";


            $rq2 = $this->_db->prepare($sql2);
            $rq2->bindValue(":userId",  $objComment->getUser_id(), PDO::PARAM_INT);
            $rq2->bindValue(":movieId", $objComment->getMovieId(), PDO::PARAM_INT);
            $rq2->bindValue(":rating",  $objComment->getRating(),  PDO::PARAM_STR);

            $success2 = $rq2->execute();

            return ($success1 && $success2);
        }

        public function commentModify(object $objComment, int $comId): bool {
            // 1. Insertion du commentaire (Cela fonctionne car on peut commenter plusieurs fois)
            $sql1 = "   UPDATE comments
                        SET com_comment = :comment,
                        com_datetime = NOW()
                        WHERE com_id = :id AND com_user_id = :userId";

            $rq1 = $this->_db->prepare($sql1);
            $rq1->bindValue(":comment", $objComment->getComment(), PDO::PARAM_STR);
            $rq1->bindValue(":userId",  $comId, PDO::PARAM_INT);
            $rq1->bindValue(":id", $objComment->getId(), PDO::PARAM_INT);

            $success1 = $rq1->execute();

            if ($rq1->rowCount() === 0) {
                return [
                    'success' => false,
                    'error' => 'Vous avez déjà commenté ce film, vous pouvez le modifier dans votre profil !'
                ];
            }

            $sql2 = "   UPDATE ratings
                        SET rat_score = :rating
                        WHERE rat_user_id = :userId AND rat_mov_id = :movieId";


            $rq2 = $this->_db->prepare($sql2);
            $rq2->bindValue(":userId",  $comId, PDO::PARAM_INT);
            $rq2->bindValue(":movieId", $objComment->getMovieId(), PDO::PARAM_INT);
            $rq2->bindValue(":rating",  $objComment->getRating(),  PDO::PARAM_STR);

            $success2 = $rq2->execute();

            $sql3 = " DELETE FROM liked WHERE lik_item_id = :id AND lik_type = 'comment'";


            $rq3 = $this->_db->prepare($sql3);
            $rq3->bindValue(":id", $objComment->getId(), PDO::PARAM_INT);

            $success3 = $rq3->execute();

            return ($success1 && $success2 && $success3);


        }

        public function deleteComment(object $objComment):bool{

            $strRq = "DELETE FROM comments WHERE com_id = :comId AND com_user_id = :userId ";

            $rq = $this->_db->prepare($strRq);

            $rq->bindValue(":comId",  $objComment->getId(), PDO::PARAM_INT);
            $rq->bindValue(":userId", $objComment->getUser_id(), PDO::PARAM_INT);

            return $rq->execute();

        }

        public function addSpoiler(int $idComment):bool{
            $strRq = "  UPDATE comments
                        SET com_spoiler = NOT com_spoiler
                        WHERE com_id = :id";

            $rq = $this->_db->prepare($strRq);

            $rq->bindValue(':id', $idComment, PDO::PARAM_INT);

            return $rq->execute();
        }

        public function reportComment(object $objComment, int $reporterId): int {
            
            $strRq = "  INSERT IGNORE INTO reported_comments (rep_com_content, rep_com_reported_id, rep_com_reporter_id, rep_com_date)
                        VALUES (:content, :comId, :reporterId, NOW())";

            $rq = $this->_db->prepare($strRq);
            $rq->bindValue(':comId', $objComment->getId(), PDO::PARAM_INT);
            $rq->bindValue(':content', $objComment->getComment(), PDO::PARAM_STR);
            $rq->bindValue(':reporterId', $reporterId, PDO::PARAM_INT);
            $rq->execute();

            
            if ($rq->rowCount() > 0) {
                return 1; 
            } else {
                
                $deleteRq = "   DELETE FROM reported_comments 
                                WHERE rep_com_reported_id = :comId 
                                AND rep_com_reporter_id = :reporterId"; 

                $prepDelete = $this->_db->prepare($deleteRq);
                $prepDelete->bindValue(':comId', $objComment->getId(), PDO::PARAM_INT);
                $prepDelete->bindValue(':reporterId', $reporterId, PDO::PARAM_INT);
                $prepDelete->execute();

                return 2; 
            }
        }
    }
