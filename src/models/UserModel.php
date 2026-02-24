<?php
    namespace App\Models;
    use PDO;

	/**
	 * UserModel Class.
	 * Manage all interactions with 'users' and 'reports' table.
	 */

    class UserModel extends Connect{

		public function __construct(){
				parent::__construct();
		}

        /**
         *Retrieves a user by their ID.
		 *
		 **@param int $id The user ID.
		 *@return array|bool User data as an array, or false if not found.
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

		/** 
		 * Retrieves a simplified list of active users.
		 * @return array  An array of the user data.
		 */

        public function findAllUsers():array{

			$strRq	= "SELECT user_id, user_firstname, user_name, user_pseudo, user_email, user_funct_id
						FROM users
						WHERE user_delete_at IS NULL";

			return $this->_db->query($strRq)->fetchAll();
		}

		/**
		 * @author Etienne
		 * 
		 * Performs an advanced user search with filtering and sorting.
		 * Handles search input and sorting options.
		 *
		 * @param string|null $strSearch The search term (username).
		 * @param string $strFilter The filter type (e.g., admin, moderator, asc, desc).
		 * @return array An array of matching users.
		 */

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
		 * @author Etienne
		 * 
		 * Verifies user credentials during login.
		 *
		 * @param string $strEmail The entered email.
		 * @param string $strPwd The plain text password.
		 * @return array|bool Returns user data (excluding password) on success, or false on failure.
		 */

		public function verifUser(string $strEmail, string $strPwd):array|bool{

			$strRq	= " SELECT user_id, user_name, user_firstname, user_pseudo ,user_pwd, user_funct_id
						FROM users
						WHERE user_email = '".$strEmail."'";

			$arrUser 	= $this->_db->query($strRq)->fetch();



			if($arrUser != null){
				if (password_verify($strPwd, $arrUser['user_pwd'])){

				unset($arrUser['user_pwd']); 
				return $arrUser;
				}else{
					return false;
				}
			} else{
				return false;
			}
		}

		/**
		 *@author Etienne 
		 * 
		 * Registers a new user.
		 * First checks if the email or username already exists.
		 *
		 * @param object $objUser A hydrated UserEntity object.
		 * @return mixed Returns existing data (array) if a duplicate exists, or true/false after insertion.
		 */

		public function insert(object $objUser){
	
		    $strRq1 = " SELECT user_email, user_pseudo
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
    			
    			$rqPrep2	= $this->_db->prepare($strRq2);
    			$rqPrep2->bindValue(":name", $objUser->getName(), PDO::PARAM_STR);
    			$rqPrep2->bindValue(":firstname", $objUser->getFirstname(), PDO::PARAM_STR);
    			$rqPrep2->bindValue(":pseudo", $objUser->getPseudo(), PDO::PARAM_STR);
    			$rqPrep2->bindValue(":birthdate", $objUser->getBirthdate(), PDO::PARAM_STR);
    			$rqPrep2->bindValue(":email", $objUser->getEmail(), PDO::PARAM_STR);
    			$rqPrep2->bindValue(":pwd", $objUser->getPwdHash(), PDO::PARAM_STR);

    			return $rqPrep2->execute();
			}
		}
		
		/**
		 * @author Marco 
		 * 
		 * Retrieves details for the public profile page.
		 * Includes a join for the rank name and checks if the logged-in user has already reported this profile.
		 *
		 * @param int $idUser The ID of the visited profile.
		 * @param int $idConnectUser The ID of the logged-in user (to check for reports).
		 * @return array|bool
		 */

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
		 * @author Etienne 
		 * 
		 * Soft deletes a user.
		 * Does not remove the row from the database, but sets the 'user_delete_at' timestamp.
		 *
		 * @param int $intId The ID to delete.
		 * @return bool
		 */

        public function deleteUser(int $intId){
			$strRq = "UPDATE users SET user_delete_at = NOW()
					  WHERE user_id = :id";

			$rqPrep = $this->_db->prepare($strRq);
			$rqPrep->bindValue(':id', $intId, PDO::PARAM_INT);

			return $rqPrep->execute();
        }

		/**
		 * @author Marco 
		 * 
		 * Bans a user for a specific duration.
		 *
		 * @param int $intId The user ID.
		 * @param int $intDuration The duration value.
		 * @param bool $blType The duration type (3 = Year, otherwise = Day).
		 * @return bool
		 */
        
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
		
		/**
		 * @author Etienne 
		 * 
		 * Updates profile settings (Logged-in user).
		 * Handles optional password updates.
		 *
		 * @param object $objUser The user object containing the new data.
		 * @return bool
		 */

		public function settingsUser(object $objUser):bool{

			$strRq = "	UPDATE users
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
				
			return $rqPrep->execute();
		}

		/**
		 * @author Etienne 
		 * 
		 * Modifies a user profile by an Admin/Moderator.
		 * Similar to settingsUser, but does not include password modification here.
		 *
		 * @param object $objUser The user object.
		 * @return bool
		 */

		public function settingsAllUser(object $objUser):bool{

			$strRq = " 	UPDATE users
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
				
			$rqPrep->bindValue(":name", $objUser->getName(), PDO::PARAM_STR);
			$rqPrep->bindValue(":firstname", $objUser->getFirstname(), PDO::PARAM_STR);
			$rqPrep->bindValue(":pseudo", $objUser->getPseudo(), PDO::PARAM_STR);
			$rqPrep->bindValue(":email", $objUser->getEmail(), PDO::PARAM_STR);
			$rqPrep->bindValue(":birthdate", $objUser->getBirthdate(), PDO::PARAM_STR);
			$rqPrep->bindValue(":photo", $objUser->getPhoto(), PDO::PARAM_STR);
			$rqPrep->bindValue(":bio", $objUser->getBio(), PDO::PARAM_STR);
			$rqPrep->bindValue(":id", $objUser->getId(), PDO::PARAM_INT);

			return $rqPrep->execute();
		}
		
		/**
		 *@author Marco 
		 * 
		 * Reports a user.
		 * * @param object $objUser The reported user.
		 * @param object $objReport The object containing the reason for the report.
		 * @param int $intId The ID of the person reporting.
		 * @return bool
		 */

		public function reportUser(object $objUser, object $objReport, int $intId){
		    $strRq = "  INSERT INTO reports (rep_reported_user_id, rep_reporter_user_id, rep_reason, rep_pseudo_user, rep_bio_user ,rep_date)
						VALUES 				(:userId, :reporter, :reason, :pseudo, :bio, NOW())";

      		$rqPrep = $this->_db->prepare($strRq);

      		$rqPrep->bindValue(':userId', $objUser->getId(), PDO::PARAM_INT);
      		$rqPrep->bindValue(':reporter', $intId, PDO::PARAM_INT);
            $rqPrep->bindValue(':reason', $objReport->getReason(), PDO::PARAM_STR);
            $rqPrep->bindValue(':pseudo', $objUser->getPseudo(), PDO::PARAM_STR);
            $rqPrep->bindValue(':bio', $objUser->getBio(), PDO::PARAM_STR);

      		return $rqPrep->execute();

		}

		/**
		 * @author Marco
		 * 
		 * Removes a user report (Cancellation).
		 *
		 * @param object $objUser The user concerned.
		 * @param int $intId The ID of the person canceling their report.
		 * @return bool
		 */

		public function deleteRepUser(object $objUser, int $intId ){

            $strRq = "  DELETE FROM reports
                        WHERE rep_reported_user_id = :userId AND rep_reporter_user_id = :reporter AND rep_pseudo_user IS NOT NULL";

      		$rqPrep = $this->_db->prepare($strRq);

      		$rqPrep->bindValue(':userId', $objUser->getId(), PDO::PARAM_INT);
      		$rqPrep->bindValue(':reporter', $intId, PDO::PARAM_INT);

      		return $rqPrep->execute();
		}

		/**
		 * @author Etienne
		 * 
		 * Updates a user's rank (role).
		 *
		 * @param int $intId The user ID.
		 * @param int $intFunctId The new role ID (1 = User, 2 = Moderator, 3 = Admin).
		 * @return bool
		 */

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
