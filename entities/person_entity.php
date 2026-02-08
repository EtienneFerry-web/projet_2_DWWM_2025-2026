
<?php
    require_once("mother_entity.php");

	/**
	* Classe d'un objet Article
	* @author Marco
	*/
	class PersonEntity extends Entity{
		// Attributs
		private string $_name;
		private string $_firstname;
		private string $_birthdate;
		private ?string $_deathdate="";
		private ?string $_bio="";
		private string $_country;
		private string $_photo;
		private string $_NameJob;


		/**
		* Constructeur
		*/
		public function __construct(string $prefixe = ""){
			// Préfixe de la table pour hydratation
			$this->_prefixe = "pers_";
		}

		public function getBirthDate(){
		    return $this->_birthdate;
		}

		public function getDeathDate(){
		    return $this->_deathdate;
		}

		public function getAge(){
            $dateNaissance = new DateTime($this->_birthdate);
            $age = $dateNaissance->diff(new DateTime())->y;

            return $age .' ans';
		}


		public function getDeathDateFormat(string $strFormat = "fr_FR"){
      		if (empty($this->_deathdate)) {
                return '';
            }
			$objDate	= new DateTime($this->_deathdate);
			//$strDate	= $objDate->format("d/m/Y"); // en anglais

			// Version avec configuration pour l'avoir en français
			$objDateFormatter	= new IntlDateFormatter(
                $strFormat, // langue
                IntlDateFormatter::LONG,  // format de date
                IntlDateFormatter::NONE, // format heure
            );
			$strDate	= $objDateFormatter->format($objDate);
			return 'Mort : '.$strDate;
		}

		public function getBirthdateFormat(string $strFormat = "fr_FR"){
      		if (empty($this->_birthdate)) {
                return '';
            }
			$objDate	= new DateTime($this->_birthdate);
			//$strDate	= $objDate->format("d/m/Y"); // en anglais

			// Version avec configuration pour l'avoir en français
			$objDateFormatter	= new IntlDateFormatter(
                $strFormat, // langue
                IntlDateFormatter::LONG,  // format de date
                IntlDateFormatter::NONE, // format heure
            );
			$strDate	= $objDateFormatter->format($objDate);
			return 'Née : '.$strDate;
		}

		public function setDeathDate(?string $strDeathDate){
		    $this->_deathdate = $strDeathDate;
		}

		public function setBirthdate(string $strBirthDate){
			$this->_birthdate = $strBirthDate;
		}

		public function getFullName():string{
			return $this->_name ." ".$this->_firstname ;
		}

		public function setName(string $strName){
			$this->_name = $strName;
		}

		public function setFirstname(string $strFirstname){
			$this->_firstname = $strFirstname;
		}

		public function getCountry():string{
			return $this->_country;
		}

		public function setCountry(string $strCountry){
			$this->_country = $strCountry;
		}

		public function getBio():string{
			return $this->_bio;
		}

		public function setBio(?string $strBio){
			$this->_bio = $strBio;
		}


		public function getPhoto():string{
			return $this->_photo;
		}

		public function setPhoto(string $strPhoto){
			$this->_photo = $strPhoto;
		}

		public function getNameJob():string{
			return $this->_NameJob;
		}

		public function setNameJob(string $strJob){
			$this->_NameJob = $strJob;
		}



	}
