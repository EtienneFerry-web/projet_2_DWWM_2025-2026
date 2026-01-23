
<?php
    require_once'models/mother_model.php';

    class MovieModel extends Connect{

        public function newMovie(){
          $strRq	= "
                        SELECT mov_id, pho_url AS 'mov_url', COALESCE(AVG(ratings.rat_score), 0) AS 'mov_rating', COUNT(DISTINCT follows.follo_user_id) AS 'mov_like'
                        FROM movies
                        LEFT JOIN photos ON movies.mov_id = photos.pho_mov_id
                        LEFT JOIN ratings ON movies.mov_id = ratings.rat_mov_id
                        LEFT JOIN follows ON movies.mov_id = follows.follo_mov_id
                        WHERE mov_release_date BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE()
                        GROUP BY movies.mov_id
                          ";


		    return $this->_db->query($strRq)->fetchAll();
        }


        public function allMovie(int $intLimit=0, ):array{

		
			$strRq	= " SELECT mov_id, mov_title, mov_description , pho_url AS 'mov_url', COALESCE(AVG(ratings.rat_score), 0) AS 'mov_rating', COUNT(DISTINCT follows.follo_user_id) AS 'mov_like'
                        FROM movies
                        LEFT JOIN photos ON movies.mov_id = photos.pho_mov_id
                        LEFT JOIN ratings ON movies.mov_id = ratings.rat_mov_id
                        LEFT JOIN follows ON movies.mov_id = follows.follo_mov_id
                        ";
			
            $strRq .= "
            
                    WHERE mov_id IN ( 	SELECT part_mov_id
                             	FROM participates
                             	WHERE part_pers_id = 7
                                )
                        
                        
                        ";            

			$strRq .= " GROUP BY movies.mov_id
			            ORDER BY mov_release_date DESC
			            ";

			if ($intLimit > 0){
				$strRq  .= " LIMIT ".$intLimit;
			}

			// Lancer la requête et récupérer les résultats
			return $this->_db->query($strRq)->fetchAll();
		}

		public function findMovie(int $idMovie=0){

 	        $strRq	= "
                        SELECT movies.*, pho_url AS 'mov_url', COALESCE(AVG(ratings.rat_score), 0) AS 'mov_rating', COUNT(DISTINCT follows.follo_user_id) AS 'mov_like', nat_country AS 'mov_country'
                        FROM movies
                        LEFT JOIN photos ON movies.mov_id = photos.pho_mov_id
                        LEFT JOIN nationalities ON movies.mov_nat_id = nationalities.nat_id
                        LEFT JOIN ratings ON movies.mov_id = ratings.rat_mov_id
                        LEFT JOIN follows ON movies.mov_id = follows.follo_mov_id
                        WHERE mov_id = $idMovie";


		    return $this->_db->query($strRq)->fetch();
		}

		public function movieOfPerson(int $idPerson=0){

          	$strRq	= " SELECT
                        movies.mov_id,
                        photos.pho_url AS 'mov_url',
                        COALESCE(AVG(ratings.rat_score), 0) AS 'mov_rating',
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

		    $strRq	= " SELECT mov_id, pho_url AS 'mov_url'
                        FROM users
                        INNER JOIN follows ON users.user_id = follows.follo_user_id
                        INNER JOIN movies ON follows.follo_mov_id = movies.mov_id
                        INNER JOIN photos ON movies.mov_id = photos.pho_mov_id
                        WHERE user_id = $idUser";

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
