<?php
    require_once'models/mother_model.php';

    class MovieModel extends Connect{

        public function newMovie(){
            // FIX: Added MIN() around pho_url to handle GROUP BY restriction
            $strRq    = "
                        SELECT 
                            movies.mov_id, 
                            MIN(photos.pho_url) AS 'mov_url', 
                            AVG(ratings.rat_score) AS 'mov_rating', 
                            COUNT(DISTINCT follows.follo_user_id) AS 'mov_like'
                        FROM movies
                        LEFT JOIN photos ON movies.mov_id = photos.pho_mov_id
                        LEFT JOIN ratings ON movies.mov_id = ratings.rat_mov_id
                        LEFT JOIN follows ON movies.mov_id = follows.follo_mov_id
                        WHERE mov_release_date BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE()
                        GROUP BY movies.mov_id
                        ";

            return $this->_db->query($strRq)->fetchAll();
        }


        public function allMovie(int $intLimit=0, string $strKeywords='', int $intAuthor=0,
                         int $intPeriod=0, string $strDate='', string $strStartDate='',
                         string $strEndDate=''):array{

            // FIX: Added MIN() around pho_url
            $strRq  = " SELECT 
                            movies.mov_id, 
                            mov_title, 
                            mov_description, 
                            MIN(photos.pho_url) AS 'mov_url', 
                            AVG(ratings.rat_score) AS 'mov_rating', 
                            COUNT(DISTINCT follows.follo_user_id) AS 'mov_like'
                        FROM movies
                        LEFT JOIN photos ON movies.mov_id = photos.pho_mov_id
                        LEFT JOIN ratings ON movies.mov_id = ratings.rat_mov_id
                        LEFT JOIN follows ON movies.mov_id = follows.follo_mov_id
                        ";

            // (Your existing filter logic here is commented out in source, keeping as is)
            
            $strRq .= " GROUP BY movies.mov_id
                        ORDER BY mov_release_date DESC
                        ";

            if ($intLimit > 0){
                $strRq  .= " LIMIT ".$intLimit;
            }

            return $this->_db->query($strRq)->fetchAll();
        }

        public function findMovie(int $idMovie=0){
            // findMovie usually returns one row, but if strict mode is on and there are multiple photos, 
            // you might still need aggregation or a LIMIT 1 in the JOIN, but typically findMovie doesn't GROUP BY.
            // However, looking at your original code, it doesn't have GROUP BY but uses aggregate functions (AVG, COUNT).
            // This implicitly groups everything into one row.
            
            $strRq  = "
                        SELECT 
                            movies.*, 
                            MIN(photos.pho_url) AS 'mov_url', 
                            AVG(ratings.rat_score) AS 'mov_rating', 
                            COUNT(DISTINCT follows.follo_user_id) AS 'mov_like', 
                            nat_country AS 'mov_country'
                        FROM movies
                        LEFT JOIN photos ON movies.mov_id = photos.pho_mov_id
                        LEFT JOIN nationalities ON movies.mov_nat_id = nationalities.nat_id
                        LEFT JOIN ratings ON movies.mov_id = ratings.rat_mov_id
                        LEFT JOIN follows ON movies.mov_id = follows.follo_mov_id
                        WHERE mov_id = $idMovie
                        GROUP BY movies.mov_id"; // Ideally add GROUP BY here for strict compliance


            return $this->_db->query($strRq)->fetch();
        }

        public function movieOfPerson(int $idPerson=0){

            // FIX: Added MIN() around pho_url
            $strRq  = " SELECT
                        movies.mov_id,
                        MIN(photos.pho_url) AS 'mov_url',
                        AVG(ratings.rat_score) AS 'mov_rating', -- Removed DISTINCT inside AVG, usually not needed unless intended
                        COUNT(DISTINCT follows.follo_user_id) AS 'mov_like'
                        FROM persons
                        LEFT JOIN participates ON persons.pers_id = participates.part_pers_id
                        LEFT JOIN movies ON participates.part_mov_id = movies.mov_id
                        LEFT JOIN photos ON movies.mov_id = photos.pho_mov_id
                        LEFT JOIN ratings ON movies.mov_id = ratings.rat_mov_id
                        LEFT JOIN follows ON movies.mov_id = follows.follo_mov_id
                        WHERE persons.pers_id = $idPerson
                        GROUP BY movies.mov_id";

            return $this->_db->query($strRq)->fetchAll();
        }


        public function userLike(int $idUser=0){
            // FIX: Added MIN() around pho_url and added GROUP BY to avoid duplicates
            $strRq  = " SELECT 
                            movies.mov_id, 
                            MIN(photos.pho_url) AS 'mov_url'
                        FROM users
                        INNER JOIN follows ON users.user_id = follows.follo_user_id
                        INNER JOIN movies ON follows.follo_mov_id = movies.mov_id
                        INNER JOIN photos ON movies.mov_id = photos.pho_mov_id
                        WHERE user_id = $idUser
                        GROUP BY movies.mov_id";

            return $this->_db->query($strRq)->fetchAll();

        }

    }
?>