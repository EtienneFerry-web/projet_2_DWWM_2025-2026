
<?php
    require_once'models/mother_model.php';

    class MovieModel extends Connect{

        public function newMovie(){
          $strRq	= "
                        SELECT mov_id, pho_url AS 'mov_url', AVG(ratings.rat_score) AS 'mov_rating', COUNT(DISTINCT follows.follo_user_id) AS 'mov_like'
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

			// Ecrire la requête
			$strRq	= " SELECT mov_id, mov_title, mov_description , pho_url AS 'mov_url', AVG(ratings.rat_score) AS 'mov_rating', COUNT(DISTINCT follows.follo_user_id) AS 'mov_like'
                        FROM movies
                        LEFT JOIN photos ON movies.mov_id = photos.pho_mov_id
                        LEFT JOIN ratings ON movies.mov_id = ratings.rat_mov_id
                        LEFT JOIN follows ON movies.mov_id = follows.follo_mov_id
                        ";
			// Pour le where (un seul)
			//$boolWhere	= false; // flag
			/*$strWhere	= " WHERE ";
			// Recherche par mot clé
			if ($strKeywords != '') {
				$strRq .= " WHERE (article_title LIKE '%".$strKeywords."%'
								OR article_content LIKE '%".$strKeywords."%') ";
				//$boolWhere	= true;
				$strWhere	= " AND ";
			}

			// Recherche par auteur
			if ($intAuthor > 0){
				/*if ($boolWhere){
					$strRq .= " AND ";
				}else{
					$strRq .= " WHERE ";
				}
				$strRq .= $strWhere." article_creator = ".$intAuthor;
				$strWhere	= " AND ";
			}

			// Recherche par dates
			if ($intPeriod == 0){
				// Par date exacte
				if ($strDate != ''){
					$strRq .= $strWhere." article_createdate = '".$strDate."'";
				}
			}else{
				// Par période de dates
				if ($strStartDate != '' && $strEndDate != ''){
				//if ( ($strStartDate != '') && ($strEndDate != '') ){ Parethèses selon le développeur - pas de changement si que des && - Attention ||
					$strRq .= $strWhere." article_createdate BETWEEN '".$strStartDate."' AND '".$strEndDate."'";
				}else{
					if ($strStartDate != ''){
						// A partir de
						$strRq .= $strWhere." article_createdate >= '".$strStartDate."'";
					}else if ($strEndDate != ''){
						// Avant le
						$strRq .= $strWhere." article_createdate <= '".$strEndDate."'";
					}
				}
			}*/

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
                        SELECT movies.*, pho_url AS 'mov_url', AVG(ratings.rat_score) AS 'mov_rating', COUNT(DISTINCT follows.follo_user_id) AS 'mov_like', nat_country AS 'mov_country'
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
                        AVG(DISTINCT ratings.rat_score) AS 'mov_rating',
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
		
		/**
		* @author Audrey
		* 17/01/2026
		* @version: v0.1
		* @todo comparer si le film proposer est déjà dans la base de données
		*/
		
		/**
		* Recherche de toutes les categories de film
		* @return array Liste de résultat
		*/
		public function findAllCategories():array{
			require'category_entity.php';
			$strRq = "SELECT cat_id, cat_name
					  FROM categories";	
			// Lancer la requête et récupérer les résultats
			return $this->_db->query($strRq)->fetchAll(PDO::FECTCH_ASSOC);
		
		}
		/**
		* Insertion d'un film dans la base données
		* 
		*/
		public function insert(object $objNewMovie):bool{
                
		// Request construction
			$strRq 	=   "INSERT INTO movies (mov_title, mov_original_title, mov_lenght, mov_descritpion, mov_release_date)
						            VALUES (:title, :originalTitle, :length, :description, :createDate)";
			// Prepared request
			$rqPrep	= $this->_db->prepare($strRq);
			// Sending information
			$rqPrep->bindValue(":title", $objNewMovie->getTitle(), PDO::PARAM_STR);
			$rqPrep->bindValue(":originalTitle", $objNewMovie->getOriginalTitle(), PDO::PARAM_STR);
			$rqPrep->bindValue(":length", $objNewMovie->getlenght(), PDO::PARAM_STR);
			$rqPrep->bindValue(":descritption", $objNewMovie->getDescritption(), PDO::PARAM_STR);
			$rqPrep->bindValue(":createDate", $objNewMovie->getCreateDate(), PDO::PARAM_STR);
			// Request execution
			return $rqPrep->execute();
		}
    }
