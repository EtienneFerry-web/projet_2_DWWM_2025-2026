
<?php
    require_once("mother_entity.php");

	/**
	* Classe d'un objet Article
	* @author Marco
	*/
	class CommentEntity extends Entity{
		// Attributs
		private int    $_user_id;
		private string $_pseudo;
		private float  $_rating = 0;
		private string $_datetime;
		private string $_comment;
		private string $_title;
		private string $_url;
		private int    $_like;
		private int $_movieId;


		/**
		* Constructeur
		*/
		public function __construct(string $prefixe = ""){
			// Préfixe de la table pour hydratation
			$this->_prefixe = $prefixe;
		}


		public function getDateFormat(string $strFormat = "fr_FR"){
			// Traiter l'affichage de la date
			$objDate	= new DateTime($this->_datetime);
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

		public function setDatetime(string $strDate){
			$this->_datetime = $strDate;
		}


		public function getPseudo():string{
			return $this->_pseudo ;
		}

		public function setPseudo(string $strName){
			$this->_pseudo = $strName;
		}

		public function getRating():float{
			return $this->_rating;
		}

		public function setRating(float $floatScore){
			$this->_rating = $floatScore;
		}

		public function getComment():string{
			return $this->_comment ;
		}

		public function setComment(string $strComment){
			$this->_comment = $strComment;
		}

		public function getTitle():string{
			return $this->_title ;
		}

		public function setTitle(string $strComment){
			$this->_title = $strComment;
		}

		public function getUrl():string{
			return $this->_url ;
		}

		public function setUrl(string $strComment){
			$this->_url = $strComment;
		}

		public function getUser_id():string{
			return $this->_user_id ;
		}

		public function setUser_id(string $intIdUser){
			$this->_user_id = $intIdUser;
		}

		public function getLike():int{
			return $this->_like ;
		}

		public function setLike(int $intLike){
			$this->_like = $intLike;
		}

		public function getMovieId(){
			return $this->_movieId ;
		}

		public function setMovieId(int $intNote){
			$this->_movieId = $intNote ;
		}


	}
