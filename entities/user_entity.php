<?php

	/**
	 * @author Etienne
	 * user entity
	 */
	require_once("mother_entity.php");
	
	class UserEntity extends Entity{
		/**
		 * @todo string > private
		 */
		// Attributes 
		public string $_name = '';
		public string $_firstname = '';
		public string $_pseudo = '';
        public string $_birthdate = '';
		public string $_email = '';
		public string $_pwd;	


		
		/**
		* Constructor
		*/
		public function __construct(){
			// Table prefix for hydratation
			$this->_prefixe = 'user_';
		}
		
		/**
		 * Method - getters et setters
		 * Format value to prepare Hydratation
		 * 
		 * @param clean trim undesirable space before and after the value
		 * @param strtolower sanitize from unwanted CAP
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
		public function getPwdHash():string{
			return password_hash($this->_pwd, PASSWORD_DEFAULT);
		}
		public function setPwd(string $strPwd){
			$this->_pwd = $strPwd;
		}		
	}