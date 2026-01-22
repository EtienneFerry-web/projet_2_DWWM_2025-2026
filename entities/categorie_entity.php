<?php
	require_once("mother_entity.php");
	
	/**
	* Classe d'un objet Catégorie
	* @author Christel
	*/
	
	class CategorieModel extends Entity{
		//Attributs
	
		private string $_name; 
		
		/**
		* Constructeur
		*/
		public function __construct(){
			// Préfixe de la table pour hydratation
			$this->_prefixe = 'cat_';
		}
		
		// Méthodes - getters et setters

		/**
		* Récupération du nom de l'objet
		* @return strin nom de l'objet
		*/
		public function getName(){
			return $this->_name;
		}
	}