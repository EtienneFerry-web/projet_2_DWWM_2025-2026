<?php
    require'entities/admin_entity.php';
    require'models/admin_model.php';
    require'models/user_model.php';
    require'models/movie_model.php';
    require'models/person_model.php';
    require'entities/user_entity.php';
    require'entities/movie_entity.php';
    require'entities/person_entity.php';
    

    /**
     * @author Audrey Sonntag
     * 06/02/2026
     * Version 0.1
     */

    class AdminCtrl extends MotherCtrl{

        /**
		* Page de gestion des utilisateurs
		*/
		public function dashboard(){
			if (!isset($_SESSION['user']) && $_SESSION['user']['user_funct_id'] != 2 && $_SESSION['user']['user_funct_id'] != 3){ // Pas d'utilisateur connecté
				header("Location:index.php?ctrl=error&action=err403");
				exit;
			}
			
			// Récupération des utilisateurs
			$objUserModel 	= new UserModel;
			$arrUsers 		= $objUserModel->findAllUsers();
           
			// Initialisation d'un tableau => objets
			$arrUserToDisplay	= array(); 

			// Boucle de transformation du tableau de tableau en tableau d'objets
			foreach($arrUsers as $arrDetUser){
				$objUser = new UserEntity;
				$objUser->hydrate($arrDetUser);
				
				$arrUserToDisplay[]	= $objUser;
			}
           
			
            // Récupération des films 
			$objMovieModel 	= new MovieModel;
			$arrMovie   	= $objMovieModel->findAllMovies();
           
			// Initialisation d'un tableau => objets
			$arrMovieToDisplay	= array(); 

			// Boucle de transformation du tableau de tableau en tableau d'objets
			foreach($arrMovie as $arrDetMovie){
				$objMovie = new MovieEntity("mov_");
				$objMovie->hydrate($arrDetMovie);
				
				$arrMovieToDisplay[]	= $objMovie;
			}

            // Récupération des personnes (réalisateurs, producteurs et acteurs) 
			$objPersonModel 	= new PersonModel;
			$arrPerson   	= $objPersonModel->listPerson();
           
			// Initialisation d'un tableau => objets
			$arrPersonToDisplay	= array(); 

			// Boucle de transformation du tableau de tableau en tableau d'objets
			foreach($arrPerson as $arrDetPerson){
				$objPerson = new PersonEntity();
				$objPerson->hydrate($arrDetPerson);
				
				$arrPersonToDisplay[]	= $objPerson;
			}
            
			// Donner arrUsersToDisplay à maman pour l'affichage
			$this->_arrData['arrUserToDisplay']	    = $arrUserToDisplay;
			$this->_arrData['arrMovieToDisplay']	= $arrMovieToDisplay;
			$this->_arrData['arrPersonToDisplay']	= $arrPersonToDisplay;


			$this->_display("dashboard");
		}




    }
