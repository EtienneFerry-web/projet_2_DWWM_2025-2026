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








    }
