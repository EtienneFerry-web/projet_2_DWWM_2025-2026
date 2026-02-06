
<?php
    require_once("mother_entity.php");

    class UserEntity extends Entity{

        // Attributs
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
		public function setName(string $strNewName){
			$this->_name = $this->clean($strNewName);
		}
		public function getFirstname():string{
			return $this->_firstname;
		}
		public function setFirstname(string $strFirstname){
			$this->_firstname = $this->clean($strFirstname);
		}
		public function getPseudo():string{
			return $this->_pseudo;
		}
		public function setPseudo(string $strPseudo){
			$this->_pseudo = $this->clean($strPseudo);
		}

        public function getBirthdate():string{
            return $this->_birthdate;
        }
        public function setBirthdate(string $strBirthdate){
            $this->_birthdate = $strBirthdate;
        }
		public function getEmail():string{
			return $this->_email;
		}
		public function setEmail(string $strEmail){
			$this->_email = strtolower($this->clean($strEmail));
		}
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
			$this->_photo = $strBio??"/Projet2/assets/img/defaultImgUser.jpg" ;
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
