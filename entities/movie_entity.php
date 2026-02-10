
<?php
	require_once("mother_entity.php");

	/**
	* Classe d'un objet Article
	* @author Christel
	*/
	class MovieEntity extends Entity{
		// Attributs
		private string $_title;
		private string $_original_title;
		private string $_url;
		private string $_description;
		private string $_release_date;
		private string $_trailer_url;
		private int $_countryId;
		private string $_country;
		private int $_categoriesId;
		private string $_categories;
		private string $_length;
		private string $_func;
		private int    $_like;
		private float  $_rating;
		private string $_nationality;

		/**
		* Constructeur
		*/
		public function __construct(string $prefixe = ""){
			// Préfixe de la table pour hydratation
			$this->_prefixe = $prefixe;
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
		* Récupération du titre original
		* @return string le titre original de l'objet
		*/
		public function getOriginalTitle():string{
			return $this->_original_title;
		}
		/**
		* Mise à jour du titre
		* @param string le nouveau titre
		*/
		public function setOriginalTitle(string $strOriginalTitle){
			$this->_original_title = $this->clean($strOriginalTitle);
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
		* Mise à jour du contenu
		* @param string le nouveau contenu
		*/
		public function setDescription(string $strContent){
			$this->_description = $this->clean($strContent);
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
		public function getRelease_date():string{
			return $this->_release_date;
		}
		/**
		* Mise à jour de la date de création
		* @param string la nouvelle date de création
		*/
		public function setRelease_date(string $strCreatedate){
			$this->_release_date = $strCreatedate;
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


		public function getCountry():string{
			return $this->_country;
		}
		/**
		* Mise à jour de l'identifiant du créateur
		* @param int le nouvel identifiant du créateur
		*/
		public function setCountry(string $strCountry){
			$this->_country = $strCountry;
		}

		public function getCategories():string{
			return $this->_categories;
		}
		/**
		* Mise à jour de l'identifiant du créateur
		* @param int le nouvel identifiant du créateur
		*/
		public function setCategories(string $strCategories){
			$this->_categories = $strCategories;
		}

		public function getLength():string{
			return $this->_length;
		}
		/**
		* Mise à jour de l'identifiant du créateur
		* @param int le nouvel identifiant du créateur
		*/
		public function setLength(string $strLength){
			$this->_length = $strLength;
		}
		
		public function getCountryId():string{
			return $this->_countryId;
		}
		/**
		* Mise à jour de l'identifiant du créateur
		* @param int le nouvel identifiant du créateur
		*/
		public function setCountryId(string $strCountryId){
			$this->_countryId = $strCountryId;
		}

		public function getCategoriesId():string{
			return $this->_categoriesId;
		}
		/**
		* Mise à jour de l'identifiant du créateur
		* @param int le nouvel identifiant du créateur
		*/
		public function setCategoriesId(string $strCategoriesId){
			$this->_categoriesId = $strCategoriesId;
		}

	}
