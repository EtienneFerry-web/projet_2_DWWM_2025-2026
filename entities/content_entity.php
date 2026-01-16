<?php
	require_once("mother_entity.php");
	
	/**
	* Classe d'un objet Article
	* @author Kevin
	*/
	class Movie extends Entity{
		// Attributs 
		private string $_title;
		private string $_img;
		private string $_content;
		private string $_description;
		private int $_creator;
		private string $_mod_id;
		
		/**
		* Constructeur
		*/
		public function __construct(){
			// Préfixe de la table pour hydratation
			$this->_prefixe = 'mov_';
		}
		
		// Méthodes - getters et setters

		/**
		* Récupération du titre du film
		* @return string le titre du film de l'objet
		*/
		public function getTitle():string{
			return $this->_title;
		}
		/**
		* Mise à jour du titre du film 
		* @param string le nouveau titre du film
		*/
		public function setTitle(string $strTitle){
			$this->_title = $this->nettoyer($strTitle);
		}
		
		/**
		* Récupération de l'image du film
		* @return string l'image du film l'objet
		*/
		public function getImg():string{
			return $this->_img;
		}
		/**
		* Mise à jour de l'image du film
		* @param string la nouvelle image du film 
		*/
		public function setImg(string $strImg){
			$this->_img = $strImg;
		}
		
		/**
		* Récupération du temps du film 
		* @return string le temps du film  de l'objet
		*/
		public function getLength():string{
			return $this->_name;
		}
		/**
		* Mise à jour du temps du film 
		* @param string le temps du film 
		*/
		public function setContent(string $strContent){
			$this->_content = $this->nettoyer($strContent);
		}
		
		/** 
		* Récupérer le résumé du contenu 
		* @return string le résumé du contenu
		*/
		public function getDescription(int $intNbCar = 70):string{
			return mb_strimwidth($this->_dmescription, 0, $intNbCar, "...");
		}
		
		/**
		* Récupération de la date de création
		* @return string la date de création de l'objet
		*/
		public function getCreatedate():string{
			return $this->_createdate;
		}
		/**
		* Mise à jour de la date de création
		* @param string la nouvelle date de création
		*/
		public function setCreatedate(string $strCreatedate){
			$this->_createdate = $strCreatedate;
		}	

		/**
		* Récupérer la date selon un format
		*/
		public function getMov_Release_Date(string $strFormat = "fr_FR"){
			// Traiter l'affichage de la date
			$objDate	= new DateTime($this->_Mov_Release_Date);
			//$strDate	= $objDate->format("d/m/Y"); // en anglais
			
			// Version avec configuration pour l'avoir en français
			$objDateFormatter	= new IntlDateFormatter(
                $strFormat, // langue
                IntlDateFormatter::LONG,  // format de date
                IntlDateFormatter::NONE, // format heure
            );
			$strDate	= $objDateFormatter->format($objDate);
			return $strDate;
		}
		
		/**
		* Récupération de l'identifiant du créateur
		* @return int l'identifiant du créateur de l'objet
		*/
		public function getCreator():int{
			return $this->_creator;
		}
		/**
		* Mise à jour de l'identifiant du créateur
		* @param int le nouvel identifiant du créateur
		*/
		public function setCreator(int $intCreator){
			$this->_creator = $intCreator;
		}		
		
		/**
		* Récupération du nom du créateur
		* @return string le nom du créateur de l'objet
		*/
		public function getCreatorname():string{
			return $this->_creatorname;
		}
		/**
		* Mise à jour du nom du créateur
		* @param string le nouveau nom du créateur
		*/
		public function setMod_Id(string $strCreatorname){
			$this->_creatorname = $strCreatorname;
		}	
		
	}