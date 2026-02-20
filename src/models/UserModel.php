<?php
    namespace App\Models;
    use PDO;
    //require_once'models/mother_model.php';

    class UserModel extends Connect{

        // Methods
		public function __construct(){
				parent::__construct();
		}

        /**
        * @return array
        */

		public function findUser(int $id) {
			$strRq = "SELECT *
						FROM users
						WHERE user_id = :id
						AND user_delete_at IS NULL";

			$prep = $this->_db->prepare($strRq);
			$prep->bindValue(':id', $id, PDO::PARAM_INT);
			$prep->execute();

			return $prep->fetch();
		}

        public function findAllUsers():array{
			// Writing request
			$strRq	= "SELECT user_id, user_firstname, user_name, user_pseudo, user_email, user_funct_id
						FROM users
						WHERE user_delete_at IS NULL";

			// Launching request and collecting results
			return $this->_db->query($strRq)->fetchAll();
		}

		public function findAllUsersWithFilters(?string $strSearch, string $strFilter): array {

			$strRq = "SELECT user_id, user_firstname, user_name, user_pseudo, user_email, user_funct_id
						FROM users
						WHERE user_delete_at IS NULL";

			$params = [];

			if (!empty($strSearch)) {

				$strRq .= " AND user_pseudo LIKE :search";

				$params[':search'] = "%" . $strSearch . "%";
			}

			$orderBy = " ORDER BY user_id DESC";

			switch($strFilter) {
				case 'admin':
					$strRq .= " AND user_funct_id = 3";
					break;
				case 'modo':
					$strRq .= " AND user_funct_id = 2";
					break;
				case 'user':
					$strRq .= " AND user_funct_id = 1";
					break;
				case 'asc':
					$orderBy = " ORDER BY user_pseudo ASC";
					break;
				case 'desc':
					$orderBy = " ORDER BY user_pseudo DESC";
					break;
				default:
					break;
			}

			$strRq .= $orderBy;

			$prep = $this->_db->prepare($strRq);

			foreach($params as $key => $val) {
				$prep->bindValue($key, $val, PDO::PARAM_STR);
			}

			$prep->execute();

			return $prep->fetchAll();
		}

        /**
		 * User login request
		 *
        * @param string $stEmail
        * @param string $strPwd
        * @return array|bool
        */
		public function verifUser(string $strEmail, string $strPwd):array|bool{
			// verify user request
			$strRq	= "SELECT user_id, user_name, user_firstname, user_pseudo ,user_pwd, user_funct_id
						FROM users
						WHERE user_email = '".$strEmail."'";
			// Recover user information
			// Request exxecution and recovering reluts
			$arrUser 	= $this->_db->query($strRq)->fetch();


			// Hached password verification
			if($arrUser != null){
				if (password_verify($strPwd, $arrUser['user_pwd'])){
				// User return
				unset($arrUser['user_pwd']); // removing pwd
				return $arrUser;
				}else{
					return false;
				}
			} else{
				return false;
			}
		}
		/**
		* @author Etienne
		* Function Insert user in database
		* @param object $objUser User object
		* @return bool If request ok (true) else (false)
		*/
		public function insert(object $objUser){

		// Request construction
		    $strRq1 = "  SELECT user_email, user_pseudo
                        FROM users
                        WHERE user_email = :email OR user_pseudo = :pseudo ";

            $rqPrep1	= $this->_db->prepare($strRq1);

            $rqPrep1->bindValue(":pseudo", $objUser->getPseudo(), PDO::PARAM_STR);
			$rqPrep1->bindValue(":email", $objUser->getEmail(), PDO::PARAM_STR);

			$rqPrep1->execute();

			 $arrInsertRequest = $rqPrep1->fetch();


			if(isset($arrInsertRequest['user_email'])){

			   return $arrInsertRequest;
				exit;

			} else{

    			$strRq2 	=   "INSERT INTO users (user_name, user_firstname, user_pseudo, user_email, user_birthdate, user_pwd, user_creadate)
    						            VALUES (:name, :firstname, :pseudo, :email, :birthdate,:pwd, NOW())";
    			// Prepared request
    			$rqPrep2	= $this->_db->prepare($strRq2);
    			// Sending information
    			$rqPrep2->bindValue(":name", $objUser->getName(), PDO::PARAM_STR);
    			$rqPrep2->bindValue(":firstname", $objUser->getFirstname(), PDO::PARAM_STR);
    			$rqPrep2->bindValue(":pseudo", $objUser->getPseudo(), PDO::PARAM_STR);
    			$rqPrep2->bindValue(":birthdate", $objUser->getBirthdate(), PDO::PARAM_STR);
    			$rqPrep2->bindValue(":email", $objUser->getEmail(), PDO::PARAM_STR);
    			$rqPrep2->bindValue(":pwd", $objUser->getPwdHash(), PDO::PARAM_STR);
    			// Request execution
    			return $rqPrep2->execute();
			}
		}

        public function userPage(int $idUser=0, $idConnectUser=0){

            $strRq	= " SELECT users.*, functions.funct_name AS 'user_function',
						EXISTS(
                            SELECT 1 FROM reports
                            WHERE rep_reported_user_id = user_id
                            AND rep_reporter_user_id = $idConnectUser
                            AND rep_pseudo_user IS NOT NULL
                            ) AS 'user_reported'
                        FROM users
                        INNER JOIN functions ON users.user_funct_id = functions.funct_id
                        WHERE user_id = $idUser AND user_delete_at IS NULL";

            return $this->_db->query($strRq)->fetch();
        }
		/**
         * Delete account
         * @author Etienne
         * @param $intId = $_GET['id'];
         * return boolean
         */


		/**
         * Delete account
         * @author Etienne
         * @param $intId = $_GET['id'];
         * return boolean
         */

        public function deleteUser(int $intId){
			$strRq = "UPDATE users SET user_delete_at = NOW()
					  WHERE user_id = :id";

			$rqPrep = $this->_db->prepare($strRq);
			$rqPrep->bindValue(':id', $intId, PDO::PARAM_INT);

			return $rqPrep->execute();
        }
        
        public function banUser(int $intId, int $intDay, bool $blType){
			$strRq = "UPDATE users SET user_ban_at = CURDATE + INTERVAL :value";
			
			if($blType == 3){
			    $strRq .="YEAR";
			} else{
			    $strRq .="DAY";
			}
			
			$strRq .="	  WHERE user_id = :id";

			$rqPrep = $this->_db->prepare($strRq);
			$rqPrep->bindValue(':id', $intId, PDO::PARAM_INT);
			$rqPrep->bindValue(':value', $intId, PDO::PARAM_INT);
			

			return $rqPrep->execute();
        }

		public function settingsUser(object $objUser):bool{

			$strRq = "UPDATE users
						SET user_name 			= :name,
							user_firstname		= :firstname,
							user_pseudo 		= :pseudo,
							user_birthdate		= :birthdate,
							user_photo			= :photo,
							user_email			= :email,
							user_bio			= :bio,
							user_update_at		= NOW()";

					if(!empty($objUser->getPwd())){

			$strRq .=",		user_pwd			=:pwd";
						}
			$strRq .="		WHERE user_id			= :id";

			$rqPrep	= $this->_db->prepare($strRq);
				// Donne les informations
				$rqPrep->bindValue(":name", $objUser->getName(), PDO::PARAM_STR);
				$rqPrep->bindValue(":firstname", $objUser->getFirstname(), PDO::PARAM_STR);
				$rqPrep->bindValue(":pseudo", $objUser->getPseudo(), PDO::PARAM_STR);
				$rqPrep->bindValue(":email", $objUser->getEmail(), PDO::PARAM_STR);
				$rqPrep->bindValue(":birthdate", $objUser->getBirthdate(), PDO::PARAM_STR);
				$rqPrep->bindValue(":photo", $objUser->getPhoto(), PDO::PARAM_STR);
				$rqPrep->bindValue(":bio", $objUser->getBio(), PDO::PARAM_STR);
				$rqPrep->bindValue(":id", $objUser->getId(), PDO::PARAM_INT);

			if(!empty($objUser->getPwd())){
					$rqPrep->bindValue(":pwd", $objUser->getPwdHash(), PDO::PARAM_STR);
			}
				

			// Executer la requête
			return $rqPrep->execute();
		}

		//MODIFIER UN AUTRE UTILISATEUR

		public function settingsAllUser(object $objUser):bool{

			$strRq = "UPDATE users
						SET user_name 			= :name,
							user_firstname		= :firstname,
							user_pseudo 		= :pseudo,
							user_birthdate		= :birthdate,
							user_photo			= :photo,
							user_email			= :email,
							user_bio			= :bio,
							user_update_at		= NOW()
						WHERE user_id 			= :id";

			$rqPrep	= $this->_db->prepare($strRq);
				// Donne les informations
				$rqPrep->bindValue(":name", $objUser->getName(), PDO::PARAM_STR);
				$rqPrep->bindValue(":firstname", $objUser->getFirstname(), PDO::PARAM_STR);
				$rqPrep->bindValue(":pseudo", $objUser->getPseudo(), PDO::PARAM_STR);
				$rqPrep->bindValue(":email", $objUser->getEmail(), PDO::PARAM_STR);
				$rqPrep->bindValue(":birthdate", $objUser->getBirthdate(), PDO::PARAM_STR);
				$rqPrep->bindValue(":photo", $objUser->getPhoto(), PDO::PARAM_STR);
				$rqPrep->bindValue(":bio", $objUser->getBio(), PDO::PARAM_STR);
				$rqPrep->bindValue(":id", $objUser->getId(), PDO::PARAM_INT);


			// Executer la requête
			return $rqPrep->execute();
		}

		public function reportUser(object $objUser, object $objReport, int $intId){
		    $strRq = "  INSERT INTO reports (rep_reported_user_id, rep_reporter_user_id, rep_reason, rep_pseudo_user, rep_bio_user ,rep_date)
						VALUES (:userId, :reporter, :reason, :pseudo, :bio, NOW())";

      		$rqPrep = $this->_db->prepare($strRq);

      		$rqPrep->bindValue(':userId', $objUser->getId(), PDO::PARAM_INT);
      		$rqPrep->bindValue(':reporter', $intId, PDO::PARAM_INT);
            $rqPrep->bindValue(':reason', $objReport->getReason(), PDO::PARAM_STR);
            $rqPrep->bindValue(':pseudo', $objUser->getPseudo(), PDO::PARAM_STR);
            $rqPrep->bindValue(':bio', $objUser->getBio(), PDO::PARAM_STR);

      		return $rqPrep->execute();

		}

		public function deleteRepUser(object $objUser, int $intId ){

            $strRq = "  DELETE FROM reports
                        WHERE rep_reported_user_id = :userId AND rep_reporter_user_id = :reporter AND rep_pseudo_user IS NOT NULL";

      		$rqPrep = $this->_db->prepare($strRq);

      		$rqPrep->bindValue(':userId', $objUser->getId(), PDO::PARAM_INT);
      		$rqPrep->bindValue(':reporter', $intId, PDO::PARAM_INT);

      		return $rqPrep->execute();
		}

		public function updateGrade(int $intId, int $intFunctId):bool {
			$strRq = "UPDATE users 
						SET user_funct_id 	= :functId,
							user_update_at	= NOW()
						WHERE user_id 		= :id";

			$rqPrep = $this->_db->prepare($strRq);

			$rqPrep->bindValue(':functId', $intFunctId, PDO::PARAM_INT);
			$rqPrep->bindValue(":id", $intId, PDO::PARAM_INT);

			return $rqPrep->execute();
		}

    }
