<?php
    namespace App\Entities;

    /**
	 * UserEntity Class.
	 * Represents an application user.
	 * Maps the columns of the 'users' table.
	 */

    class UserEntity extends Entity{

        /**
		 * User Attributes
		 */

        private string 	$_name = '';
		private string 	$_firstname = '';
		private string 	$_pseudo = '';
        private string 	$_birthdate = '';
		private string 	$_email = '';
		private ?string $_bio = '';
		private ?string $_photo = '';

		/**
		 * Security and role-related attributes
		 */

		private string 	$_function;
		private string 	$_pwd;
		private string 	$_pwdConfirm;
		private int 	$_reported = 0;
		private int 	$_funct_id = 1;


		/**
		 * Constructor.
		 * Sets the prefix used by the hydrator (e.g., user_name, user_email, etc.).
		 */
		public function __construct(){
			// Table prefix for hydratation
			$this->_prefixe = 'user_';
		}

		/**
		 * Getters & Setters
		 */


		/**
		 * @return string The user's last name.
		 */

		public function getName():string{
			return $this->_name;
		}

		/**
		 * @param string $strNewName The raw last name.
		 */

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

		public function setBio(?string $strBio){
			$this->_bio = $strBio??"" ;
		}
		public function getBio():string{
			return $this->_bio;
		}

		public function setPhoto(?string $strPhoto){
			$this->_photo = $strPhoto??"defaultImgUser.jpg" ;
		}

		public function getPhoto():string{
			return $this->_photo;
		}

		public function getPwd():string{
			return $this->_pwd;
		}

		public function getPwdConfirm():string{
			return $this->_pwdConfirm;
		}
		public function setPwdConfirm(string $strPwdConfirm){
			$this->_pwdConfirm = $strPwdConfirm;
		}





		public function setFunction(string $strFunction){
			$this->_function = $strFunction;
		}
		public function getFunction():string{
			return $this->_function;
		}

		public function setReported(int $intRep){
			$this->_reported = $intRep;
		}
		public function getReported():int{
			return $this->_reported;
		}

		public function getPwdHash():string{
			return password_hash($this->_pwd, PASSWORD_DEFAULT);
		}
		public function setPwd(string $strPwd){
			$this->_pwd = $strPwd;
		}

		public function getUser_funct_id(): int {
			return $this->_funct_id;
		}

		public function setFunct_id(int $intId): void {
			$this->_funct_id = $intId;
		}

    }
