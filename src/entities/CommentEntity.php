<?php
    namespace App\Entities;
    use DateTime;
    use IntlDateFormatter;

	/**
    * CommentEntity Class
    * Represents a user comment on a movie
    * @author Marco
    */

	class CommentEntity extends Entity{
		// Attributs
		private int     $_user_id;
		private string  $_pseudo;
		private float   $_rating = 0;
		private string  $_datetime;
		private string  $_comment;
		private string  $_title;
		private ?string  $_photo = 'defaultImgUser.jpg';
		private int     $_like;
		private int     $_movieId;
		private int     $_spoiler;
		private int     $_reported;
		private int		$_user_liked = 0;

		/**
        * Constructor
        * Sets the table prefix for hydration
        */

		public function __construct(string $prefixe = ""){
			$this->_prefixe = 'com_';
		}

		/**
        * Getting the formatted date
        * @param string $strFormat the locale format (default fr_FR)
        * @return string the formatted date string
        */

		public function getDateFormat(string $strFormat = "fr_FR"){
			$objDate	= new DateTime($this->_datetime);

			$objDateFormatter	= new IntlDateFormatter(
                $strFormat, 
                IntlDateFormatter::LONG,
                IntlDateFormatter::NONE, 
            );
			$strDate	= $objDateFormatter->format($objDate);
			return $strDate;
		}

		/**
        * Updating the datetime
        * @param string $strDate the new datetime string
        */

		public function setDatetime(string $strDate){
			$this->_datetime = $strDate;
		}

		/**
        * Getting the pseudo
        * @return string the user's pseudo
        */

		public function getPseudo():string{
			return $this->_pseudo ;
		}

		/**
        * Getting the rating
        * @return float the score value
        */

		public function setPseudo(string $strName){
			$this->_pseudo = $strName;
		}

		/**
        * Getting the rating
        * @return float the score value
        */

		public function getRating():float{
			return $this->_rating;
		}

		/**
        * Updating the rating
        * @param float $floatScore the new score
        */

		public function setRating(float $floatScore){
			$this->_rating = $floatScore;
		}

		/**
        * Getting the comment content
        * @return string the content of the comment
        */		

		public function getComment():string{
			return $this->_comment ;
		}

		/**
        * Updating the comment content
        * @param string $strComment the new content
        */

		public function setComment(string $strComment){
			$this->_comment = $strComment;
		}

		/**
        * Getting the title
        * @return string the comment title
        */

		public function getTitle():string{
			return $this->_title ;
		}

		/**
        * Updating the title
        * @param string $strComment the new title
        */

		public function setTitle(string $strComment){
			$this->_title = $strComment;
		}

		/**
        * Getting the photo
        * @return string|null the user's photo filename
        */

		public function getPhoto():?string{
			return $this->_photo??'defaultImgUser.jpg' ;
		}

		/**
        * Updating the photo
        * @param string|null $strComment the new photo filename
        */

		public function setPhoto(?string $strComment){
			$this->_photo = $strComment;
		}

		/**
        * Getting the user ID
        * @return string the identifier of the user
        */

		public function getUser_id():string{
			return $this->_user_id ;
		}

		/**
        * Updating the user ID
        * @param string $intIdUser the new user identifier
        */

		public function setUser_id(string $intIdUser){
			$this->_user_id = $intIdUser;
		}

		/**
        * Getting the like count
        * @return int the total likes
        */

		public function getLike():int{
			return $this->_like ;
		}

		/**
        * Updating the like count
        * @param int $intLike the new like total
        */

		public function setLike(int $intLike){
			$this->_like = $intLike;
		}

		/**
        * Getting the spoiler status
        * @return int the spoiler flag
        */

		public function getSpoiler():int{
			return $this->_spoiler ;
		}

		/**
        * Updating the spoiler status
        * @param int $intSpoiler the new spoiler flag
        */

		public function setSpoiler(int $intSpoiler){
			$this->_spoiler = $intSpoiler;
		}

		/**
        * Getting the movie ID
        * @return int the identifier of the movie
        */

		public function getMovieId(){
			return $this->_movieId ;
		}

		/**
        * Updating the movie ID
        * @param int $intNote the new movie identifier
        */

		public function setMovieId(int $intNote){
			$this->_movieId = $intNote ;
		}

		/**
        * Getting the reported status
        * @return int the number of reports
        */

		public function getReported(){
			return $this->_reported ;
		}

		/**
        * Updating the reported status
        * @param int $intRep the new report count
        */

		public function setReported(int $intRep){
			$this->_reported = $intRep ;
		}

		/**
        * Updating the user liked status
        * @param int $bool the new status
        */

		public function setUser_liked(int $bool){
			$this->_user_liked = $bool;
		}
		
		/**
        * Getting the user liked status
        * @return int the status value
        */

		public function getUser_liked():int{
			return $this->_user_liked;
		}
	}
