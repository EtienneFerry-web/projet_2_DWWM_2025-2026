<?php

    /**
    * @author All
    * 16/01/2026
    * Version 0.1
    */

    class Connect {

		protected $_db;

		public function __construct(){
<<<<<<< HEAD
			try {
				// Ajout de port=8889 et mdp root
				$this->_db = new PDO(
					"mysql:host=localhost;dbname=GiveMeFive;port=8889", 
					"root", 
					"root", 
					array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC)
				);

				// Désactive le mode strict pour votre erreur de GROUP BY précédente
				$this->_db->exec("SET SESSION sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");
				
				$this->_db->exec("SET CHARACTER SET utf8");
				$this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			} catch(PDOException $e) {
				// On arrête tout ici si la connexion échoue
				die("Échec de connexion : " . $e->getMessage());
			}
		}
	}
=======
			try{
				// Connexion à la base de données
				$this->_db	= new PDO(
								"mysql:host=localhost;dbname=GiveMeFive", // Serveur et BDD
								"root", //Nom d'utilisateur de la base de données
								"",// Mot de passe de la base de données
								array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC) // Mode de renvoi
				);
				// Pour résoudre les problèmes d’encodage
				$this->_db->exec("SET CHARACTER SET utf8");
				// Configuration des exceptions
				$this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch(PDOException$e) {
				echo "Échec : " . $e->getMessage();
			}
		}
	}
>>>>>>> origin/main
