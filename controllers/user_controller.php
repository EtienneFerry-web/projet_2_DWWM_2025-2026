<?php
    require'entities/user_entity.php';
    require'models/user_model.php';
    require'entities/movie_entity.php';
    require'models/movie_model.php';
    require'entities/comment_entity.php';
    require'models/comment_model.php';
<<<<<<< HEAD
 
    /**
    * Log in  
=======

    /**
    * Log in
>>>>>>> origin/main
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
<<<<<<< HEAD
 
    class UserCtrl extends MotherCtrl{
 
=======

    class UserCtrl extends MotherCtrl{

>>>>>>> origin/main
        public function login(){
            // Treating login form
            $strEmail       = $_POST['email']??"";
            $strPwd         = $_POST['pwd']??"";
<<<<<<< HEAD
            
            $this->_arrData['strPage']  = "login";
 
=======

            $this->_arrData['strPage']  = "login";

>>>>>>> origin/main
            // Preparing hydrate
            $objUser            = new UserEntity;
            $objUserModel       = new UserModel;
            $objUser->hydrate($_POST);
<<<<<<< HEAD
 
=======

>>>>>>> origin/main
            // Testing form
            $arrError = [];
            if (count($_POST) > 0) {
                // Vérifier le formulaire
                // Verify form
                if ($strEmail == ""){
                    $arrError['email'] = "Le mail est obligatoire";
<<<<<<< HEAD
                }   
=======
                }
>>>>>>> origin/main
                if ($strPwd == ""){
                    $arrError['pwd'] = "Le mot de passe est obligatoire";
                }
                if (count($arrError) == 0){
                    $arrResult = $objUserModel->verifUser($strEmail, $strPwd);
                    if ($arrResult === false){//If database return nothing
                            $arrError[] = "Mail ou mot de passe invalide";
                        }else{
                            session_start();
                            $_SESSION['user']       = $arrResult;
                            $_SESSION['success']    = "Bienvenue, vous êtes bien connecté";
                            header("Location:index.php");
                            exit;
                    }
                }
<<<<<<< HEAD
            }   
            $this->_arrData['objUser'] = $objUser;
            $this->_arrData['arrError'] = $arrError;
            $this->_arrData['strEmail'] = $strEmail;
 
            $this->_display("login");
        }
        
=======
            }
            $this->_arrData['objUser'] = $objUser;
            $this->_arrData['arrError'] = $arrError;
            $this->_arrData['strEmail'] = $strEmail;

            $this->_display("login");
        }

>>>>>>> origin/main
        public function logout(){
            session_start();
            // Cleaning session from User
            unset($_SESSION['user']);
            $_SESSION['success']    = "Vous êtes bien déconnecté";
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
<<<<<<< HEAD
 
        public function createAccount(){
            
=======

        public function createAccount(){

>>>>>>> origin/main
            //Treating createAccount Form
            $strName        = $_POST['name']??"";
            $strFirstname   = $_POST['firstname']??"";
            $strPseudo      = $_POST['pseudo']??"";
            $strBirthdate   = $_POST['birthdate']??"";
            $strEmail       = $_POST['email']??"";
            $strPwd         = $_POST['pwd']??"";
            $strPwdConfirm  = $_POST['pwd_confirm']??"";
<<<<<<< HEAD
            
            //Preparing hydrate
            $objUser    = new UserEntity;
            $objUser->hydrate($_POST);
    
=======

            //Preparing hydrate
            $objUser    = new UserEntity;
            $objUser->hydrate($_POST);

>>>>>>> origin/main
            //Testing Form
            $arrError = [];
            if (count($_POST) > 0) {
                if ($objUser->getName() == ""){
                    $arrError['name'] = "Le nom est obligatoire";
<<<<<<< HEAD
                }   
                if ($objUser->getFirstname() == ""){
                    $arrError['firstname'] = "Le prénom est obligatoire";
                }   
                if ($objUser->getPseudo() == ""){
                    $arrError['pseudo'] = "Le pseudo est obligatoire";
                }   
=======
                }
                if ($objUser->getFirstname() == ""){
                    $arrError['firstname'] = "Le prénom est obligatoire";
                }
                if ($objUser->getPseudo() == ""){
                    $arrError['pseudo'] = "Le pseudo est obligatoire";
                }
>>>>>>> origin/main
                if ($objUser->getBirthdate() == ""){
                    $arrError['birthdate'] = "La date de naissance est obligatoire";
                }
                if ($objUser->getEmail() == ""){
                    $arrError['email'] = "Le mail est obligatoire";
                }else if (!filter_var($objUser->getEmail(), FILTER_VALIDATE_EMAIL)){
                    $arrError['email'] = "Le format du mail n'est pas correct";
                }
<<<<<<< HEAD
    
=======

>>>>>>> origin/main
            // Adding regex to verify password
                $strRegex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{16,}$/";
                if ($objUser->getPwd() == ""){
                    $arrError['pwd'] = "Le mot de passe est obligatoire";
                }else if (!preg_match($strRegex, $objUser->getPwd())){
                    $arrError['pwd'] = "Le mot de passe ne correspond pas aux règles";
                }else if($objUser->getPwd() != $strPwdConfirm){
                    $arrError['pwd_confirm'] = "Le mot de passe et sa confirmation ne sont pas identiques";
                }
<<<<<<< HEAD
                
                
=======


>>>>>>> origin/main
            //If form is correctly filled
                if (count($arrError) == 0){
            //Database add
                    $objUserModel   = new UserModel;
                    $boolInsert     = $objUserModel->insert($objUser);
<<<<<<< HEAD
 
                    if ($boolInsert == true){
                            session_start();
                            $_SESSION['user']       = $arrResult;
                            $_SESSION['success']    = "Le compte compte a bien été crée";
                            header("Location:index.php?ctrl=user&action=login");
                            exit;
                    }else{
                        $arrError[] = "Erreur lors de l'ajout";
                    }
                }
            }   
 
=======
                    var_dump($boolInsert);
                    
                    if($boolInsert['user_email'] == $objUser->getEmail()){
                        $arrError[] = 'email probleme change';
                    }
                    if($boolInsert['user_pseudo'] == $objUser->getPseudo()){
                       $arrError[] = 'pseudo probleme change';
                    }
                    
                    if ($boolInsert != false && !is_array($boolInsert)){
                            
                            $_SESSION['success']    = "Le compte compte a bien été crée";
                            var_dump($boolInsert);
                           /* header("Location:index.php?ctrl=user&action=login");
                            exit;*/
                    }else{
                        $arrError[] = '';
                    }
                }
            }

>>>>>>> origin/main
            $this->_arrData['name'] = $strName;
            $this->_arrData['firstname'] = $strFirstname;
            $this->_arrData['pseudo'] = $strPseudo;
            $this->_arrData['birthdate'] = $strBirthdate;
            $this->_arrData['strEmail'] = $strEmail;
<<<<<<< HEAD
 
=======

>>>>>>> origin/main
            $this->_arrData['arrError'] = $arrError;
            $this->_arrData['objUser']  = $objUser;
            // Afficher
            $this->_display("createAccount");
        }
<<<<<<< HEAD
 
        public function settingsUser(){
            $this->getContent("settingsUser");
=======

        public function settingsUser(){
            if(!isset($_SESSION['user'])){
                header("Location:index.php?ctrl=error&action=err403");
                exit;
            }

            $this->_display("settingsUser");
>>>>>>> origin/main
        }

        public function user(){

            $intId = $_GET['id'];

<<<<<<< HEAD
            $objUserModel = new UserModel;
			$arrUser		= $objUserModel->userPage($intId);

            if(!isset($arrUser['user_id'])){
				header("Location:index.php?Ctrl=error&action=err404");
				exit;
			}

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

            $this->_arrData['objUser'] = $objUser;
            $this->_arrData['arrMovieToDisplay'] = $arrMovieToDisplay;
            $this->_arrData['arrCommentToDisplay'] = $arrCommentToDisplay;



            $this->_display("user");
        }

    }
=======

            $objUserModel = new UserModel;
			$arrUser		= $objUserModel->userPage($intId);

            if(!$arrUser){
				header("Location:index.php?Ctrl=error&action=err404");
				exit;
			} else{
			    $objCommentModel = new CommentModel;
				$objComment = new CommentEntity;

			    if( isset($_POST['deleteComment'])){

					$objComment->setId((int)$_POST['deleteComment']);
					$objComment->setUser_id($_SESSION['user']['user_id']);

					$result = $objCommentModel->deleteComment($objComment);

					if($result){
					    $_SESSION['success'] ="Le commentaire à bien était supprimer !";
					} else{
					    $this->_arrData['arrError'] = "erreur lors de la suppression veulliez réssayer !";
					}

				} elseif(isset($_POST['comment']) && isset($_POST['rating'])) {

                    $objComment->hydrate($_POST);

				    $result = $objCommentModel->commentModify($objComment, $_SESSION['user']['user_id']);

					if($result){
					    $_SESSION['success'] ="Le commentaire à bien était modifier !";
					} else{
					    $this->_arrData['arrError'] = "erreur lors de la modification";
					}
				}

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


    			$arrComment     = $objCommentModel->reviewUser($intId);

    			$arrCommentToDisplay	= array();

    			foreach($arrComment as $arrDetComment){
    				$objComment = new CommentEntity('com_');
    				$objComment->hydrate($arrDetComment);

    				$arrCommentToDisplay[]	= $objComment;
    			}

                $this->_arrData['objUser'] = $objUser;
                $this->_arrData['arrMovieToDisplay'] = $arrMovieToDisplay;
                $this->_arrData['arrCommentToDisplay'] = $arrCommentToDisplay;



                $this->_display("user");
			}
        }


        public function deleteAccount(){

        if(!isset($_SESSION['user']['user_id'])){
            header("Location:index.php?ctrl=user&action=login");
            exit;
        } else{

            $objUserModel = new UserModel();
            $success = $objUserModel->deleteUser($_SESSION['user']['user_id']);

            // Si on a supprimé, on nettoie tout
            if($success){
            unset($_SESSION['user']);
            $_SESSION['success'] = "Votre compte à bien été supprimé";
            header("Location:index.php");
            exit;
            }
        }
    }
}
>>>>>>> origin/main
