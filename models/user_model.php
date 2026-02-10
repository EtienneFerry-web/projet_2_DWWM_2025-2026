<?php
    require_once'models/mother_model.php';
	


    class UserModel extends Connect{
		
        // Methods
		public function __construct(){
				parent::__construct();
		}

        /**
        * @return array
        */
        public function findAllUsers():array{
			// Writing request
			$strRq	= "SELECT user_id, user_firstname, user_name, user_pseudo, user_email
						FROM users 
						WHERE user_delete_at IS NULL";
						
			// Launching request and collecting results
			return $this->_db->query($strRq)->fetchAll();
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
                            SELECT 1 FROM reported_users 
                            WHERE rep_user_user_id = user_id
                            AND rep_reporter_id = $idConnectUser
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


		public function reportUser(object $objUser, int $reporter):int{

			$strRq = "  INSERT IGNORE INTO reported_users (rep_user_bio, rep_user_pseudo, rep_user_img, rep_user_user_id, rep_reporter_id ,rep_user_date)
						VALUES (:bio, :pseudo, :img, :reported, :reporter,NOW())";
        
			$rqPrep = $this->_db->prepare($strRq);

			$rqPrep->bindValue(':reported', $objUser->getId(), PDO::PARAM_INT);
			$rqPrep->bindValue(':bio', $objUser->getBio(), PDO::PARAM_STR);
			$rqPrep->bindValue(':pseudo', $objUser->getPseudo(), PDO::PARAM_STR);
			$rqPrep->bindValue(':img', $objUser->getPhoto(), PDO::PARAM_STR);
			$rqPrep->bindValue(':reporter', $reporter, PDO::PARAM_INT);
			

        
			$rqPrep->execute();

			if ($rqPrep->rowCount() > 0) {
                return 1; 
            } else {
                
                $deleteRq = "   DELETE FROM reported_users
                                WHERE rep_user_user_id = :reported
                                AND rep_reporter_id = :reporter"; 

                $prepDelete = $this->_db->prepare($deleteRq);
                $prepDelete->bindValue(':reported', $objUser->getId(), PDO::PARAM_INT);
                $prepDelete->bindValue(':reporter', $reporter, PDO::PARAM_INT);
                $prepDelete->execute();

                return 2; 
            }
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
							user_update_at		= NOW()
						WHERE user_id			= :id";

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
    }
