<?php
    require'controllers/mother_controller.php';
    require'entities/user_entity.php';
    require'models/user_model.php';
    require'entities/movie_entity.php';
    require'models/movie_model.php';
    require'entities/comment_entity.php';
    require'models/comment_model.php';

    /**
    * Log in  
    * @author Etienne
    * 
    * 1. Collect information from the form
    * 2. Test if the form is correctly filled
    * 3. If the form is correctly filled, add of the information in the database, else ERROR
    * 
    * @todo Green alert when connected/account created 
    * 
    * 
    */

    class UserCtrl extends MotherCtrl{

        public function login(){
            // Treating login form
            $strEmail       = $_POST['email']??"";
            $strPwd 		= $_POST['pwd']??"";
            
                        
            // Preparing hydrate
            $objUser	        = new UserEntity;
            $objUserModel       = new UserModel;
            $objUser->hydrate($_POST);

            // Testing form
            $arrError = [];
            if (count($_POST) > 0) {
                // Vérifier le formulaire
                // Verify form
                if ($strEmail == ""){
                    $arrError['email'] = "Le mail est obligatoire";
                }	
                if ($strPwd == ""){
                    $arrError['pwd'] = "Le mot de passe est obligatoire";
                }
                if (count($arrError) == 0){
                    $arrResult = $objUserModel->verifUser($strEmail, $strPwd);
                    if ($arrResult === false){//If database return nothing
                            $arrError[] = "Mail ou mot de passe invalide";
                        }else{
                            session_start();
                            $_SESSION['user']		= $arrResult;
                            $_SESSION['success'] 	= "Bienvenue, vous êtes bien connecté";
                            header("Location:index.php");
                            exit;
                    }
                }
            }	
			$this->getContent($strPage = "login", objUser: $objUser, arrError: $arrError);
        }
        
        public function logout(){
            session_start();
            // Cleaning session from User
	        unset($_SESSION['user']);
	        $_SESSION['success'] 	= "Vous êtes bien déconnecté";
	        header("Location:index.php");
	        exit;
        }
        /**
        * Create account 
        * @author Etienne
        * 
        * 1. Collect information from the form
        * 2. Test if the form is correctly filled
        * 3. If the form is correctly filled, add of the information in the database, else ERROR
        * 
        * @todo Green alert when connected/account created 
        * 
        * 
        */

        public function createAccount(){
            
            //Treating createAccount Form
            $strName 		= $_POST['name']??"";
            $strFirstname 	= $_POST['firstname']??"";
            $strPseudo 	    = $_POST['pseudo']??"";
            $strBirthdate   = $_POST['birthdate']??"";
            $strEmail 		= $_POST['email']??"";
            $strPwd 		= $_POST['pwd']??"";
            $strPwdConfirm	= $_POST['pwd_confirm']??"";
            
            //Preparing hydrate
            $objUser	= new UserEntity;
            $objUser->hydrate($_POST);
    
            //Testing Form
            $arrError = [];
            if (count($_POST) > 0) {
                if ($objUser->getName() == ""){
                    $arrError['name'] = "Le nom est obligatoire";
                }	
                if ($objUser->getFirstname() == ""){
                    $arrError['firstname'] = "Le prénom est obligatoire";
                }	
                if ($objUser->getPseudo() == ""){
                    $arrError['pseudo'] = "Le pseudo est obligatoire";
                }	
                if ($objUser->getBirthdate() == ""){
                    $arrError['birthdate'] = "La date de naissance est obligatoire";
                }
                if ($objUser->getEmail() == ""){
                    $arrError['email'] = "Le mail est obligatoire";
                }else if (!filter_var($objUser->getEmail(), FILTER_VALIDATE_EMAIL)){
                    $arrError['email'] = "Le format du mail n'est pas correct";
                }
    
            // Adding regex to verify password
                $strRegex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{16,}$/";
                if ($objUser->getPwd() == ""){
                    $arrError['pwd'] = "Le mot de passe est obligatoire";
                }else if (!preg_match($strRegex, $objUser->getPwd())){
                    $arrError['pwd'] = "Le mot de passe ne correspond pas aux règles";
                }else if($objUser->getPwd() != $strPwdConfirm){
                    $arrError['pwd_confirm'] = "Le mot de passe et sa confirmation ne sont pas identiques";
                }
                
                
            //If form is correctly filled
                if (count($arrError) == 0){
            //Database add
                    $objUserModel	= new UserModel;
                    $boolInsert 	= $objUserModel->insert($objUser);
                    if ($boolInsert === true){
                        $_SESSION['success'] 	= "Le compte a bien été créé";
                    header("Location:index.php");
                    exit;
                    }else{
                        $arrError[] = "Erreur lors de l'ajout";
                    }
                }
            }   
    
            //Display variable
            $this->getContent($strPage = "createAccount", objUser: $objUser, arrError: $arrError);
        }

        public function settingsUser(){
            $this->getContent($strPage = "settingsUser");
        }


        public function user(){

            $intId = $_GET['id'];

            $objUserModel = new UserModel;
			$arrUser		= $objUserModel->userPage($intId);
			$objUser       = new UserEntity('mov_');
			$objUser->hydrate($arrUser);

			$objLikeModel = new MovieModel;
			$arrLike      = $objLikeModel->userLike($intId);

			$arrMovieToDisplay	= array();

			foreach($arrLike as $arrDetMovie){
				$objMovie = new MovieEntity('mov_');
				$objMovie->hydrate($arrDetMovie);

				$arrMovieToDisplay[] = $objMovie;
			}

			$objCommentModel = new CommentModel;
			$arrComment     = $objCommentModel->reviewUser($intId);

			$arrCommentToDisplay	= array();

			foreach($arrComment as $arrDetComment){
				$objComment = new CommentEntity('com_');
				$objComment->hydrate($arrDetComment);

				$arrCommentToDisplay[]	= $objComment;
			}



            $this->getContent($strPage = "user", objUser: $objUser, objContent: $arrMovieToDisplay, objComment: $arrCommentToDisplay );
        }

    }
