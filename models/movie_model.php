<?php
    require_once'models/mother_model.php';

    class MovieModel extends Connect{

        public string $producer     = '';
        public string $actor        = '';
        public string $realisator   = '';
        public string $categories   = '';
        public string $country      = '';
        public string $date         = '';
        public string $startdate    = '';
        public string $enddate      = '';
        public string $order        = '';
        public string $job          = 'ASC';
        
        public function findAllMovies() : array {
            $strRq = "SELECT mov_id, mov_title
                        FROM movies";
            return $this->_db->query($strRq)->fetchAll();
        }

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


        public function allMovie(): array {
            $strWhere = " WHERE ";
            $strRq = " SELECT mov_id, mov_title, mov_description, pho_url AS 'mov_url', 
                            COALESCE(AVG(ratings.rat_score), 0) AS 'mov_rating', 
                            COUNT(DISTINCT lik_user_id) AS 'mov_like'
                    FROM movies
                    LEFT JOIN photos ON movies.mov_id = photos.pho_mov_id
                    LEFT JOIN ratings ON movies.mov_id = ratings.rat_mov_id
                    LEFT JOIN liked ON movies.mov_id = liked.lik_item_id AND liked.lik_type = 'movies'
                    ";

            $conditions = [];

            if (!empty($this->actor)) {
                $conditions[] = "participates.part_job_id = 3 AND participates.part_pers_id = :actor";
            }

            if (!empty($this->producer)) {
                $conditions[] = "participates.part_job_id = 2 AND participates.part_pers_id = :producer";
            }

            if (!empty($this->realisator)) {
                $conditions[] = "participates.part_job_id = 1 AND participates.part_pers_id = :realisator";
            }

            if (!empty($conditions)) {
                $strRq .= " $strWhere mov_id IN (
                                SELECT part_mov_id
                                FROM participates
                                WHERE " . implode(" OR ", $conditions) . "
                            )";
                $strWhere = " AND ";
            }

            if (!empty($this->categories)) {
                $strRq .= " $strWhere mov_id IN (
                                SELECT belong_mov_id
                                FROM belongs
                                WHERE belong_cat_id = :category
                            )";
                $strWhere = " AND ";
            }

            if (!empty($this->country)) {
                $strRq .= " $strWhere mov_nat_id = :country";
                $strWhere = " AND ";
            }

            if (!empty($this->date)) {
                $strRq .= " $strWhere mov_release_date = :date";
            } elseif (!empty($this->startdate) && !empty($this->enddate)) {
                $strRq .= " $strWhere mov_release_date BETWEEN :startDate AND :endDate";
            } elseif (!empty($this->startdate)) {
                $strRq .= " $strWhere mov_release_date > :startDate";
            } elseif (!empty($this->enddate)) {
                $strRq .= " $strWhere mov_release_date < :endDate";
            }

            $strRq .= " GROUP BY movies.mov_id
                        ORDER BY mov_release_date DESC";

            
            $stmt = $this->_db->prepare($strRq);

            
            if (!empty($this->actor)) {
                $stmt->bindValue(':actor', $this->actor, PDO::PARAM_INT);
            }
            if (!empty($this->producer)) {
                $stmt->bindValue(':producer', $this->producer, PDO::PARAM_INT);
            }
            if (!empty($this->realisator)) {
                $stmt->bindValue(':realisator', $this->realisator, PDO::PARAM_INT);
            }
            if (!empty($this->categories)) {
                $stmt->bindValue(':category', $this->categories, PDO::PARAM_INT);
            }
            if (!empty($this->country)) {
                $stmt->bindValue(':country', $this->country, PDO::PARAM_INT);
            }
            if (!empty($this->date)) {
                $stmt->bindValue(':date', $this->date, PDO::PARAM_STR);
            }
            if (!empty($this->startdate)) {
                $stmt->bindValue(':startDate', $this->startdate, PDO::PARAM_STR);
            }
            if (!empty($this->enddate)) {
                $stmt->bindValue(':endDate', $this->enddate, PDO::PARAM_STR);
            }

            // 4. Exécution
            $stmt->execute();

            return $stmt->fetchAll();
                }

        public function findMovie(int $idMovie, int $intUserId = 0){

            $strRq  = " SELECT movies.*,
                            pho_url AS 'mov_url',
                            COALESCE(AVG(ratings.rat_score), 0) AS 'mov_rating',
                          
                            COUNT(DISTINCT liked.lik_user_id ) AS 'mov_like',
                            nat_country AS 'mov_country',
                      
                            EXISTS(
                                SELECT 1 FROM liked 
                                WHERE lik_user_id = :user_id 
                                AND lik_type = 'movies' 
                                AND lik_item_id = movies.mov_id
                            ) AS mov_user_liked
                        FROM movies
                        LEFT JOIN photos ON movies.mov_id = photos.pho_mov_id
                        LEFT JOIN nationalities ON movies.mov_nat_id = nationalities.nat_id
                        LEFT JOIN ratings ON movies.mov_id = ratings.rat_mov_id
                      
                        LEFT JOIN liked ON movies.mov_id = liked.lik_item_id AND liked.lik_type = 'movies'
                        WHERE mov_id = :id 
                        GROUP BY movies.mov_id";

            $stmt = $this->_db->prepare($strRq);
            $stmt->bindValue(':id', $idMovie, PDO::PARAM_INT);
            $stmt->bindValue(':user_id', $intUserId, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        }

		public function movieOfPerson(int $idPerson=0):array{

            $direction = (strtoupper($this->order) === 'ASC') ? 'ASC' : 'DESC';    

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
                        WHERE persons.pers_id = :id";

            if(!empty($this->job)){
                $strRq	.=" AND mov_id IN ( SELECT part_mov_id
                                           	FROM participates
                                           	WHERE part_pers_id = :id AND part_job_id = :job )";
            }



            $strRq	.=" GROUP BY movies.mov_id";

            if(!empty($this->order)){
                $strRq	.=" ORDER BY mov_release_date $direction ";
            }

            $stmt = $this->_db->prepare($strRq);

            if(!empty($this->job)){
                $stmt->bindValue(':job', $this->job, PDO::PARAM_INT);
            }

            $stmt->bindValue(':id', $idPerson, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetchAll(); 
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
        
        /**
        * Delete Movie
        * @author Audrey
        * @param $intId = $_GET['id'];
        * return boolean
        */
		public function deleteMovie(int $intId){
			$strRq = "DELETE FROM movies  
					  WHERE mov_id = :id";
        
			$rqPrep = $this->_db->prepare($strRq);
			$rqPrep->bindValue(':id', $intId, PDO::PARAM_INT);
        
			return $rqPrep->execute();
        }

            public function LikeMovie($intUserId, $intItemId){

            $strRq = "INSERT IGNORE INTO liked(lik_user_id, lik_item_id, lik_type, lik_created_at)
                VALUES (:user_id, :item_id, 'movies', NOW())";
			
			$rqPrep	= $this->_db->prepare($strRq);

				$rqPrep->bindValue(":user_id", $intUserId, PDO::PARAM_INT);
				$rqPrep->bindValue(":item_id", $intItemId, PDO::PARAM_INT);

			$rqPrep->execute();

            if($rqPrep->rowCount() > 0){

            return 1;

            } else {

                $deleteRq = "   DELETE FROM liked
                                WHERE lik_item_id   = :item_id
                                AND lik_user_id     = :user_id";

                $prepDelete = $this->_db->prepare($deleteRq);
                $prepDelete->bindValue(':item_id', $intItemId, PDO::PARAM_INT);
                $prepDelete->bindValue(':user_id', $intUserId, PDO::PARAM_INT);

                $prepDelete->execute();

                return 2;

            }
		}

    }
?>
