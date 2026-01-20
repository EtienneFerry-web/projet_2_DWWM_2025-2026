<?php

	/**
	 * @author Etienne
	 * User entity
	 */
	require_once("mother_entity.php");
	
	class UserEntity extends Entity{
		/**
		 *  User attributs
		 * 
		 */
		private string $_name = '';
		private string $_firstname = '';
		private string $_pseudo = '';
        private string $_birthdate = '';
		private string $_email = '';
		private ?string $_bio = '';
		private ?string $_photo = '';
		private string $_function;
		private string $_pwd;



		/**
		* Constructor
		*/
		public function __construct(){
			// Table prefix for hydratation
			$this->_prefixe = 'user_';
		}

		/**
		 * Method - getters et setters
		 * Format value to prepare Hydrate
		 * 
		 * @param clean 		trim undesirable space before and after the value
		 * @param strtolower 	sanitize from unwanted CAP
		 * @param password_hash 
		 */

		/**
		* Name recover
		* @return string Object name
		*/
		public function getName():string{
			return $this->_name;
		}

		/**
		* Name Update
		* @param string New Name
		*/
		public function setName(string $strNewName){
			$this->_name = $this->clean($strNewName);
		}

		/**
		* Firstname recover
		* @return string Object Firstname
		*/
		public function getFirstname():string{
			return $this->_firstname;
		}

		/**
		* Firstame Update
		* @param string New Firstname
		*/
		public function setFirstname(string $strFirstname){
			$this->_firstname = $this->clean($strFirstname);
		}

		/**
		* Pseudo recover
		* @return string Object Pseudo
		*/
		public function getPseudo():string{
			return $this->_pseudo;
		}

		/**
		* Pseudo Update
		* @param string New Pseudo
		*/
		public function setPseudo(string $strPseudo){
			$this->_pseudo = $this->clean($strPseudo);
		}

		/**
		* Birthdate recover
		* @return string Object Birthdate
		*/
        public function getBirthdate():string{
            return $this->_birthdate;
        }

		/**
		* Birthdate Update
		* @param string New Birthdate
		*/
        public function setBirthdate(string $strBirthdate){
            $this->_birthdate = $strBirthdate;
        }

		/**
		* Email recover
		* @return string Object Email
		*/
		public function getEmail():string{
			return $this->_email;
		}

		/**
		* Email Update
		* @param string New Email
		*/
		public function setEmail(string $strEmail){
			$this->_email = strtolower($this->clean($strEmail));
		}

		/**
		* Password recover
		* @return string Object Password
		*/
		
		public function getPwd():string{
			return $this->_pwd;
		}

		public function setBio(?string $strBio){
			$this->_bio = $strBio??"Cette Utilisateur na pas de bio!" ;
		}
		public function getBio():string{
			return $this->_bio;
		}

		public function setPhoto(?string $strBio){
			$this->_photo = $strBio??"/Projet2/assets/img/mouse.png" ;
		}
		public function getPhoto():string{
			return $this->_photo;
		}

		public function setFunction(string $strFunction){
			$this->_function = $strFunction;
		}
		public function getFunction():string{
			return $this->_function;
		}


		public function getPwdHash():string{
			return password_hash($this->_pwd, PASSWORD_DEFAULT);
		}
		public function setPwd(string $strPwd){
			$this->_pwd = $strPwd;
		}

    }
