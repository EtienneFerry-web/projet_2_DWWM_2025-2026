<?php
    namespace App\Dto;

    //require'dto/mother_dto.php';

    class SearchDto extends Dto{


		private string  $_name;
		private ?float  $_rating = 0;
		private ?string $_content;
		private ?string $_photo;
		private ?int    $_like;
		private string  $_type;
		private string  $_search;
		private string  $_searchBy;


		/**
		* Constructeur
		*/
		public function __construct(string $prefixe = ""){
			// Préfixe de la table pour hydratation
			$this->_prefixe = $prefixe;
		}

		public function getName():string{
		    return $this->_name;
		}

		public function setName(string $strName=""){
		   $this->_name = $strName;
		}

		public function getContent():string{
		    return $this->_content;
		}

		public function setContent(?string $strContent=""){
		   $this->_content = $strContent??' ';
		}

		public function getPhoto():string{
		    return $this->_photo;
		}

		public function setPhoto(?string $strPhoto=""){
		   $this->_photo = $strPhoto??'assets/img/defaultImgUser.jpg';
		}

		public function getType():string{
		    return $this->_type;
		}

		public function setType(string $strType=""){
		   $this->_type = $strType;
		}

		public function getSearch():string{
		    return $this->_search;
		}

		public function setSearch(string $strSearch=""){
		   $this->_search = $this->clean($strSearch);
		}

		public function getSearchBy():string{
		    return $this->_searchBy;
		}

		public function setSearchBy(string $strSearchBy=""){
		   $this->_searchBy = $this->clean($strSearchBy);
		}

		public function getLike():int{
		    return $this->_like;
		}

		public function setLike(?int $intLike=0){
		   $this->_like = $intLike??0;
		}

		public function getRating():float{
		    return number_format($this->_rating, 1, '.', '');
		}

		public function setRating(?float $floatRating=0){
		   $this->_rating = $floatRating??0;
		}
    }
