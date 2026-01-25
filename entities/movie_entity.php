
<?php
	require_once("mother_entity.php");

	/**
	* Classe d'un objet Article
	* @author Marco Audrey
	* @todo Audrey > fonction ajout de film avec condition "connecter"
	*/
	class MovieEntity extends Entity{
		// Attributs
		private string $_title='';
		private string $_url='';
		private string $_description='';
		private string $_release_date='';
		private string $_trailer_url='';
		private string $_country='';
		private string $_func='';
		private int    $_like=0;
		private float  $_rating=0.0;
		private string $_originalTitle='';
		private string $_length='';
		
	

		/**
		* Constructeur
		*/
		public function __construct(string $prefixe = ""){
			// Préfixe de la table pour hydratation
			$this->_prefixe='mov_';
		}

		// Méthodes - getters et setters
		
		/**
		* Récupération du titre
		* @return string le titre de l'objet
		*/
		public function getTitle():string{
			return $this->_title;
		}
		/**
		* Mise à jour du titre
		* @param string le nouveau titre
		*/
		public function setTitle(string $strTitle){
			$this->_title = $this->clean($strTitle);
		}
		/**
		* Récupération de l'image
		* @return string l'image de l'objet
		*/
		public function getUrl():string{
			return $this->_url;
		}
		/**
		* Mise à jour de l'image
		* @param string la nouvelle image
		*/
		public function setUrl(string $strImg){
			$this->_url = $strImg;
		}

		/**
		* Récupération du contenu
		* @return string le contenu de l'objet
		*/
		public function getDescription():string{
			return $this->_description;
		}
		/**
		* Récupérer le résumé du contenu
		* @return string le résumé du contenu
		*/
		public function getSummary(int $intNbCar = 70):string{
			return mb_strimwidth($this->_description, 0, $intNbCar, "...");
		}

		/**
		* Récupération de la date de création
		* @return string la date de création de l'objet
		*/
		public function getCreatedate():string{
			return $this->_release_date;
		}
		
		/**
		* Récupérer la date selon un format
		*/
		public function getDateFormat(string $strFormat = "fr_FR"){
			// Traiter l'affichage de la date
			$objDate	= new DateTime($this->_release_date);
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
		public function getRating():float{
			return  number_format($this->_rating, 1, '.', '');
		}
		/**
		* Mise à jour de l'identifiant du créateur
		* @param int le nouvel identifiant du créateur
		*/
		public function setRating(float $floatRating){
			$this->_rating = $floatRating;
		}

		public function getLike():int{
			return $this->_like;
		}
		/**
		* Mise à jour de l'identifiant du créateur
		* @param int le nouvel identifiant du créateur
		*/
		public function setLike(int $intLike){
			$this->_like = $intLike;
		}

		public function getTrailer():string{
			return $this->_trailer_url;
		}
		/**
		* Mise à jour de l'identifiant du créateur
		* @param int le nouvel identifiant du créateur
		*/
		public function setTrailer_url(string $strTrailer){
			$this->_trailer_url = $strTrailer;
		}
				
		/**
		* Récupération du titre original
		* @return string le titre original de l'objet
		*/
		public function getOriginalTitle():string{
			return $this->_originalTitle;
		}
		
		/**
		* Récupération de la durée
		* @return string la durée de l'objet
		*/
		public function getLength():string{
			return $this->_length;
		}
		
	}
