<?php
    namespace App\Models;
    use PDO;
    //require_once'models/mother_model.php';

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
                        SELECT mov_id, pho_photo AS 'mov_photo', COALESCE(AVG(ratings.rat_score), 0) AS 'mov_rating', COUNT(DISTINCT lik_user_id) AS 'mov_like'
                        FROM movies
                        LEFT JOIN photos ON movies.mov_id = photos.pho_mov_id
                        LEFT JOIN ratings ON movies.mov_id = ratings.rat_mov_id
                        LEFT JOIN liked ON movies.mov_id = liked.lik_mov_id AND liked.lik_com_id IS NULL
                        WHERE mov_release_date BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE() AND photos.pho_type = 'Affiche'
                        GROUP BY movies.mov_id,  pho_photo
                        ";

            return $this->_db->query($strRq)->fetchAll();
        }

        public function allMovie(): array {
            $strWhere = " WHERE ";
            $strRq = " SELECT mov_id, mov_title, mov_description, pho_photo AS 'mov_photo',
                            COALESCE(AVG(ratings.rat_score), 0) AS 'mov_rating',
                            COUNT(DISTINCT lik_user_id) AS 'mov_like'
                    FROM movies
                    LEFT JOIN photos ON movies.mov_id = photos.pho_mov_id
                    LEFT JOIN ratings ON movies.mov_id = ratings.rat_mov_id
                    LEFT JOIN liked ON movies.mov_id = liked.lik_mov_id AND liked.lik_com_id IS NULL
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
                            pho_photo AS 'mov_photo',
                            COALESCE(AVG(ratings.rat_score), 0) AS 'mov_rating',

                            COUNT(DISTINCT liked.lik_user_id ) AS 'mov_like',
                            nat_country AS 'mov_country',

                            EXISTS(
                                SELECT 1 FROM liked
                                WHERE lik_user_id = :user_id
                                AND lik_com_id IS NULL
                                AND lik_mov_id = movies.mov_id
                            ) AS mov_user_liked,

                            EXISTS(
                                SELECT 1 FROM reports
                                WHERE rep_reporter_user_id = :user_id
                                AND rep_reported_movie_id = movies.mov_id

                            ) AS mov_reported,

                            (
                                SELECT rat_score FROM ratings
                                WHERE rat_user_id = :user_id
                                AND rat_mov_id = movies.mov_id
                            ) AS mov_note_user

                        FROM movies
                        LEFT JOIN photos ON movies.mov_id = photos.pho_mov_id
                        LEFT JOIN nationalities ON movies.mov_nat_id = nationalities.nat_id
                        LEFT JOIN ratings ON movies.mov_id = ratings.rat_mov_id

                        LEFT JOIN liked ON movies.mov_id = liked.lik_mov_id AND liked.lik_com_id IS NULL
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
                            photos.pho_photo AS 'mov_photo',
                            COALESCE(AVG(ratings.rat_score), 0) AS 'mov_rating',
                            COUNT(DISTINCT lik_user_id) AS 'mov_like'
                        FROM persons
                        LEFT JOIN participates ON persons.pers_id = participates.part_pers_id
                        LEFT JOIN movies ON participates.part_mov_id = movies.mov_id
                        LEFT JOIN photos ON movies.mov_id = photos.pho_mov_id
                        LEFT JOIN ratings ON movies.mov_id = ratings.rat_mov_id
                        LEFT JOIN liked ON movies.mov_id = liked.lik_mov_id AND liked.lik_com_id IS NULL
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
            // FIX: Added MIN() around pho_photo and added GROUP BY to avoid duplicates
            $strRq  = " SELECT
                            movies.mov_id,
                            photos.pho_photo AS 'mov_photo'
                        FROM users
                        LEFT JOIN liked ON users.user_id = liked.lik_user_id AND liked.lik_mov_id IS NOT NULL
                        INNER JOIN movies ON liked.lik_mov_id = movies.mov_id
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

        public function addMovie(object $objNewMovie):bool{

		// Request construction
			$strRq 	=   "INSERT INTO movies (mov_title, mov_original_title, mov_length, mov_description, mov_release_date, mov_nat_id, mov_trailer_url)
						        VALUES (:title, :originalTitle, :length, :description, :createDate, :idNationality, :trailer)";
			// Prepared request
			$rqPrep	= $this->_db->prepare($strRq);
			// Sending information
			$rqPrep->bindValue(":title", $objNewMovie->getTitle(), PDO::PARAM_STR);
			$rqPrep->bindValue(":originalTitle", $objNewMovie->getOriginalTitle(), PDO::PARAM_STR);
			$rqPrep->bindValue(":length", $objNewMovie->getLength(), PDO::PARAM_STR);
			$rqPrep->bindValue(":description", $objNewMovie->getDescription(), PDO::PARAM_STR);
			$rqPrep->bindValue(":createDate", $objNewMovie->getRelease_date(), PDO::PARAM_STR);
			$rqPrep->bindValue(":idNationality", $objNewMovie->getCountryId(), PDO::PARAM_INT);
			$rqPrep->bindValue(":trailer", $objNewMovie->getTrailer(), PDO::PARAM_STR);

			// Request execution
			$result = $rqPrep->execute();

            if ($result){
            $lastId = $this->_db->lastInsertId();

                $strRq2 =" INSERT INTO photos(pho_photo, pho_type, pho_mov_id)
                            VALUES (:photo, 'Affiche', :idMovie)";

            $rqPrep2	= $this->_db->prepare($strRq2);
            $rqPrep2->bindValue(":photo", $objNewMovie->getphoto(), PDO::PARAM_STR);
            $rqPrep2->bindValue(":idMovie", $lastId, PDO::PARAM_INT);

             $resultPhoto = $rqPrep2->execute();

                if ($resultPhoto){

                    $strRq3 =" INSERT INTO belongs (belong_cat_id, belong_mov_id)
                                VALUES (:catId, :idMovie)";
                    $rqPrep3	= $this->_db->prepare($strRq3);
                    $rqPrep3->bindValue(":catId", $objNewMovie->getCategoriesId(), PDO::PARAM_STR);
                    $rqPrep3->bindValue(":idMovie", $lastId, PDO::PARAM_INT);

                    return $rqPrep3->execute();
                }

            }



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

            public function LikeMovie($intUserId, $intMovId){

            $strRq = "INSERT IGNORE INTO liked(lik_user_id, lik_mov_id)
                VALUES (:user_id, :mov_id)";

			$rqPrep	= $this->_db->prepare($strRq);

				$rqPrep->bindValue(":user_id", $intUserId, PDO::PARAM_INT);
				$rqPrep->bindValue(":mov_id", $intMovId, PDO::PARAM_INT);

			$rqPrep->execute();

            if($rqPrep->rowCount() > 0){

            return 1;

            } else {

                $deleteRq = "   DELETE FROM liked
                                WHERE lik_mov_id  = :mov_id
                                AND lik_user_id     = :user_id";

                $prepDelete = $this->_db->prepare($deleteRq);
                $prepDelete->bindValue(':mov_id', $intMovId, PDO::PARAM_INT);
                $prepDelete->bindValue(':user_id', $intUserId, PDO::PARAM_INT);

                $prepDelete->execute();

                return 2;

            }
		}

		public function addImageOfMovies(string $img, int $intMovId, int $intUserId){

            $strRqCount = " SELECT COUNT(*)
                            FROM photos
                            WHERE pho_mov_id = :movId AND pho_type = 'Content'";

            $rqPrepCount = $this->_db->prepare($strRqCount);
            $rqPrepCount->bindValue(':movId', $intMovId, PDO::PARAM_INT);

            $rqPrepCount->execute();

            $nbrImg = $rqPrepCount->fetch();


    		if($nbrImg['COUNT(*)'] < 20){
                $strRq = "INSERT INTO photos (pho_photo, pho_type, pho_mov_id, pho_user_id)
    				  VALUES (:img, 'Content', :movId, :userId)";

                $rqPrep = $this->_db->prepare($strRq);
                $rqPrep->bindValue(':img', $img, PDO::PARAM_STR);
                $rqPrep->bindValue(':movId', $intMovId, PDO::PARAM_INT);
                $rqPrep->bindValue(':userId', $intUserId, PDO::PARAM_INT);

                return $rqPrep->execute();
            }


		}

		public function selectImageMovie($intMovId){

		    $strRq = " SELECT pho_id AS 'mov_id', pho_photo AS 'mov_photo'
						FROM photos
						WHERE pho_mov_id = :id AND pho_type = 'Content'";

			$rqPrep = $this->_db->prepare($strRq);
			$rqPrep->bindValue(':id', $intMovId, PDO::PARAM_INT);
			$rqPrep->execute();
			return $rqPrep->fetchAll();

		}

		public function reportMovie(object $objReport){
		    $strRq = "  INSERT INTO reports (rep_reported_movie_id, rep_reporter_user_id, rep_reason ,rep_date)
					VALUES (:movieId, :reporter, :reason ,NOW())";

      		$rqPrep = $this->_db->prepare($strRq);


      		$rqPrep->bindValue(':movieId', $objReport->getReportedMovieId(), PDO::PARAM_INT);
      		$rqPrep->bindValue(':reporter', $objReport->getReporterUserId(), PDO::PARAM_INT);
            $rqPrep->bindValue(':reason', $objReport->getReason(), PDO::PARAM_STR);

      		return $rqPrep->execute();

		}

		public function deleteRepMovie(object $objReport){

            $strRq = "  DELETE FROM reports
                        WHERE rep_reported_movie_id = :movieId AND rep_reporter_user_id = :reporter";

      		$rqPrep = $this->_db->prepare($strRq);

      		$rqPrep->bindValue(':movieId', $objReport->getReportedMovieId(), PDO::PARAM_INT);
      		$rqPrep->bindValue(':reporter', $objReport->getReporterUserId(), PDO::PARAM_INT);

      		return $rqPrep->execute();
		}

		public function insertUpdateNote(int $intIdUser, int $movId, string $intNote){

            $strRq = "  INSERT INTO ratings (rat_user_id, rat_mov_id, rat_score)
                        VALUES (:userId, :movieId, :rating)
                        ON DUPLICATE KEY UPDATE rat_score = :rating";

            $rqPrep = $this->_db->prepare($strRq);
            $rqPrep->bindValue(":userId",  $intIdUser, PDO::PARAM_INT);
            $rqPrep->bindValue(":movieId", $movId, PDO::PARAM_INT);
            $rqPrep->bindValue(":rating",  $intNote,  PDO::PARAM_STR);

            $bool = $rqPrep->execute();

            if($bool){
                $strRq = "  SELECT AVG(rat_score) AS 'average'
                            FROM ratings
                            WHERE rat_mov_id = :movieId
                            GROUP BY rat_mov_id";

                $rqPrep2 = $this->_db->prepare($strRq);

                $rqPrep2->bindValue(":movieId", $movId, PDO::PARAM_INT);

                $rqPrep2->execute();

                return $rqPrep2->fetch();


            } else{
                return false;
            }

		}

        public function countAllLikes() {
			$strRq = "SELECT COUNT(*)
						FROM liked";

			return $this->_db->query($strRq)->fetchColumn();
		}

        public function countAllMovies() {
			$strRq = "SELECT COUNT(*)
						FROM movies";

			return $this->_db->query($strRq)->fetchColumn();
		}

        public function findLastMovies() {
            $strRq = "SELECT movies.mov_id, movies.mov_title, movies.mov_release_date,
                            COUNT(DISTINCT liked.lik_user_id)  AS 'mov_like',
                            COUNT(DISTINCT comments.com_id)    AS 'mov_nb_comments'
                        FROM movies
                        LEFT JOIN liked ON movies.mov_id    = liked.lik_mov_id AND liked.lik_com_id IS NULL
                        LEFT JOIN comments ON movies.mov_id = comments.com_movie_id
                        GROUP BY movies.mov_id
                        ORDER BY movies.mov_id DESC
                        LIMIT 10";
            return $this->_db->query($strRq)->fetchAll();
        }

        public function findMostLikedMovies() {
            $strRq = "SELECT movies.mov_id, movies.mov_title, movies.mov_release_date,
                            COUNT(DISTINCT liked.lik_user_id)   AS 'mov_like',
                            COUNT(DISTINCT comments.com_id)      AS 'mov_nb_comments'
                        FROM movies 
                        LEFT JOIN liked ON movies.mov_id = liked.lik_mov_id AND liked.lik_com_id IS NULL
                        LEFT JOIN comments ON movies.mov_id = comments.com_movie_id
                        GROUP BY movies.mov_id
                        ORDER BY mov_like DESC 
                        LIMIT 5";

            return $this->_db->query($strRq)->fetchAll();
        }

        public function findMostCommentedMovies() {
            $strRq = "SELECT movies.mov_id, movies.mov_title, movies.mov_release_date,
                            COUNT(DISTINCT liked.lik_user_id) AS 'mov_like',
                            COUNT(DISTINCT comments.com_id) AS 'mov_nb_comments'
                        FROM movies
                        LEFT JOIN liked ON movies.mov_id = liked.lik_mov_id AND liked.lik_com_id IS NULL
                        LEFT JOIN comments ON movies.mov_id = comments.com_movie_id
                        GROUP BY movies.mov_id
                        ORDER BY mov_nb_comments DESC
                        LIMIT 5";
            return $this->_db->query($strRq)->fetchAll();
        }
    }
?>
