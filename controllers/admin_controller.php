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


			$this->_display("dashboard");
		}

		public function allReport(){

			// $objUserModel 	= new UserModel;
			// $arrRepUser 		= $objUserModel->findAllUserReport();

			// // Initialisation d'un tableau => objets
			// $arrUserRepToDisplay	= array();

			// // Boucle de transformation du tableau de tableau en tableau d'objets
			// foreach($arrRepUser as $arrDetUser){
			// 	$objUser = new UserEntity;
			// 	$objUser->hydrate($arrDetUser);

			// 	$arrUserRepToDisplay[]	= $objUser;
			// }

			// $this->_arrData['arrUserRepToDisplay'] = $arrUserRepToDisplay;

			$this->_display("allReport");
		}

    }
