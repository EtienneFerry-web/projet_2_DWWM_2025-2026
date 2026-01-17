<?php
	require_once("mother_entity.php");
	
	class User extends Entity{
		// Attributs 
		public string $_name = '';
		public string $_firstname = '';

		public string $_pseudo = '';
        public string $_birthdate = '';
		public string $_email = '';
		public string $_pwd;	


		
		/**
		* Constructeur
		*/
		public function __construct(){
			// Préfixe de la table pour hydratation
			$this->_prefixe = 'user_';
		}
		
		// Méthodes - getters et setters
		public function getName():string{
			return $this->_name;
		}
		public function setName(string $strNewName){
			$this->_name = $this->nettoyer($strNewName);
		}
		public function getFirstname():string{
			return $this->_firstname;
		}
		public function setFirstname(string $strFirstname){
			$this->_firstname = $this->nettoyer($strFirstname);
		}
		public function getPseudo():string{
			return $this->_pseudo;
		}
		public function setPseudo(string $strPseudo){
			$this->_pseudo = $this->nettoyer($strPseudo);
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
			$this->_email = strtolower($this->nettoyer($strEmail));
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