<?php
    require'entities/report_entity.php';
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
            $strPwd         = $_POST['pwd']??"";

            $this->_arrData['strPage']  = "login";

            // Preparing hydrate
            $objUser            = new UserEntity;
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

                if (count($arrError) == 0 ){
                    $arrResult = $objUserModel->verifUser($strEmail, $strPwd);
                    if ($arrResult === false){//If database return nothing
                            $arrError[] = "Mail ou mot de passe invalide";

                            $_SESSION['pwdError']['nbr'] += 1;

                            if($_SESSION['pwdError']['nbr'] > 3){
                                $_SESSION['pwdError']['restrict'] = new DateTime('+5 minutes');
                            }
                        }else{
                            session_start();
                            $_SESSION['user']       = $arrResult;
                            $_SESSION['success']    = "Bienvenue, vous êtes bien connecté";
                            header("Location:index.php");
                            exit;
                    }
                }
            }
            $this->_arrData['objUser'] = $objUser;
            $this->_arrData['arrError'] = $arrError;
            $this->_arrData['strEmail'] = $strEmail;

            $this->_display("login");
        }

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

        public function createAccount(){

            //Treating createAccount Form
            $strName        = $_POST['name']??"";
            $strFirstname   = $_POST['firstname']??"";
            $strPseudo      = $_POST['pseudo']??"";
            $strBirthdate   = $_POST['birthdate']??"";
            $strEmail       = $_POST['email']??"";
            $strPwd         = $_POST['pwd']??"";
            $strPwdConfirm  = $_POST['pwd_confirm']??"";
            //Preparing hydrate
            $objUser    = new UserEntity;
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
            //e.ferry607123@gmail.com
            //1234567890AZERTYUIOP!a
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
                    $objUserModel   = new UserModel;
                    $boolInsert     = $objUserModel->insert($objUser);
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

            $this->_arrData['name'] = $strName;
            $this->_arrData['firstname'] = $strFirstname;
            $this->_arrData['pseudo'] = $strPseudo;
            $this->_arrData['birthdate'] = $strBirthdate;
            $this->_arrData['strEmail'] = $strEmail;
            $this->_arrData['arrError'] = $arrError;
            $this->_arrData['objUser']  = $objUser;
            // Afficher
            $this->_display("createAccount");
        }

        /**
         * VerifInfos
         * @author Etienne
         * @param $objUser
         * return array
         */

        private function verifInfos(object $objUser):array {
            $arrError =[];

            if($objUser->getName()==""){
                $arrError["name"] = "Le nom est obligatoire.";
            }
            if($objUser->getFirstname()==""){
                $arrError["firstname"] = "Le prénom est obligatoire.";
            }
            if($objUser->getPseudo()==""){
                $arrError["pseudo"] = "Le pseudo est obligatoire.";
            }
            if($objUser->getEmail()==""){
                $arrError["email"] = "Le pseudo est obligatoire.";
            }elseif (!filter_var($objUser->getEmail(), FILTER_VALIDATE_EMAIL)) {
                $arrError['email'] = "Le format de l'email n'est pas valide.";
            }

            return $arrError;
        }

        public function settingsUser() {

            if (!isset($_SESSION['user'])){ // Pas d'utilisateur connecté
            header("Location:index.php?ctrl=error&action=error_403");
            exit;
            }

            $objUserModel	= new UserModel;
            $arrUser		= $objUserModel->userPage($_GET['id']??$_SESSION['user']['user_id']);

            $objUser	= new UserEntity;
            $objUser->hydrate($arrUser);

            $arrError = [];
            var_dump($objUser);
            var_dump($_FILES);

            if (count($_POST) > 0) {
                $objUser->hydrate($_POST);
                $arrError	= $this->verifInfos($objUser);

                if($_FILES['photo']['error'] != 4) {

                    $arrTypeFile = array('image/jpeg', 'image/png');

                    if(!in_array($_FILES['photo']['type'], $arrTypeFile)){
                        $arrError['photo'] = "Le type de fichier n'est pas autorisé (veuillez utiliser un fichier JPEG ou PNG).";
                    }

                    if(!isset($arrError['photo'])){
                        $strImageName = uniqid();

                        switch($_FILES['photo']['type']){
                            case 'image/jpeg' : $strImageName .= '.jpg'; break;
                            case 'image/png' : $strImageName .= '.png'; break;
                        }

                        $strDest = 'assets/img/users/' . $strImageName;

                        if(move_uploaded_file($_FILES['photo']['tmp_name'], $strDest)){
                            $objUser->setPhoto($strImageName);
                        } else {
                            $arrError['photo'] = "Erreur lors du téléchargement";
                        }
                    }
                }

                if(!empty($objUser->getPwd())){
                    $strRegex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{16,}$/";
                    $strPwdConfirm = $_POST['pwdconfirm'];
                    if(!preg_match($strRegex, $objUser->getPwd())){
                        $arrError['pwd'] = "Le mot de passe ne correspond pas aux règles";
                    }else if($objUser->getPwd() != $strPwdConfirm){
                        $arrError['pwd_confirm'] = "Le mot de passe et sa confirmation ne sont pas identiques";
                    }
                }
                
                if(count($arrError) == 0){
                    $boolUpdate = $objUserModel->settingsUser($objUser);

                    if($boolUpdate){
                        $_SESSION['user']['user_pseudo'] = $objUser->getPseudo();

                        $_SESSION['success'] = "Le profil à bien été mis à jour";
                        header("Location:index.php?ctrl=user&action=settingsUser");
                        exit;
                    }else{
                        $arrError[] = "Erreur lors de la mise a jours, veuilez reessayer";
                    }
                }
                
            }

            $this->_arrData['arrError'] = $arrError;
            $this->_arrData['objUser']  = $objUser;
            $this->_display("settingsUser");

        }

        public function user() {

            $intId = $_GET['id'];
            $objUserModel = new UserModel;
			$arrUser		= $objUserModel->userPage($intId, $_SESSION['user']['user_id']??0);

            if(!isset($arrUser['user_id'])){
				header("Location:index.php?Ctrl=error&action=err404");
				exit;
			}

			$objUser       = new UserEntity('mov_');
			$objUser->hydrate($arrUser);

            if (!$arrUser) {
                header("Location:index.php?Ctrl=error&action=err404");
                exit;
            }

            $objCommentModel = new CommentModel;
            $objComment = new CommentEntity;
            $arrError = [];

            if (isset($_POST['deleteComment'])) {
                $objComment->setId((int)$_POST['deleteComment']);
                $objComment->setUser_id($_GET['id']);

                if ($_GET['id'] == $_SESSION['user']['user_id'] || $_SESSION['user']['user_funct_id'] != 1) {
                    $result = $objCommentModel->deleteComment($objComment);
                }

                if ($result) {
                    $_SESSION['success'] = "Le commentaire à bien était supprimer !";
                } else {
                    $arrError[] = "erreur lors de la suppression veulliez réssayer !";
                }
            }

            elseif (isset($_POST['comment']) && isset($_POST['rating'])) {
                $objComment->hydrate($_POST);
                $result = $objCommentModel->commentModify($objComment, $_SESSION['user']['user_id']);

                if ($result) {
                    $_SESSION['success'] = "Le commentaire à bien était modifier !";
                    header("Location: index.php?ctrl=user&action=user&id=" . $intId);
                    exit;
                } else {
                    $arrError[] = "erreur lors de la modification";
                }
            }

            if (isset($_POST['commentReport']) && $_POST['commentReport'] != '' && isset($_SESSION['user']['user_id'])) {
                $objReport = new ReportEntity;
                $objReport->setReason($_POST['commentReport']);
                $objReport->setReported_com_id($_POST['commentReportId']);

                $repResult = $objCommentModel->reportComment($objReport, $_SESSION['user']['user_id']);

                if ($repResult) {
                    $_SESSION['success'] = "Le signalement a bien été envoyé !";
                    header("Location: index.php?ctrl=user&action=user&id=" . $intId);
                    exit;
                }  else {
                    $arrError[] = "erreur";
                }
            }   elseif(isset($_POST['repComDelete']) && $_POST['repComDelete'] != ''){

                    $objReport = new ReportEntity;
    				$objReport->setReported_com_id($_POST['repComDelete']);

    				$repResult = $objCommentModel->deleteRepCom($objReport, $_SESSION['user']['user_id']);

                    if ($repResult) {
                        $_SESSION['success'] = "Votre signalement a bien était supprimer ! !";
                    }  else {
                        $arrError[] = "erreur";
                    }
            }





            if (isset($_POST['spoiler']) && $_SESSION['user']['user_funct_id'] != 1) {
                if ($objCommentModel->addSpoiler($_POST['spoiler'])) {
                    $_SESSION['success'] = "Spoiler Update !";
                }
            }



            $objUser = new UserEntity;
            $objUser->hydrate($arrUser);

            if (isset($_POST['repUser']) && $_POST['repUser'] != '' && isset($_SESSION['user']['user_id'])) {

                $objReport = new ReportEntity;
                $objReport->setReason($_POST['repUser']);

                $repResult = $objUserModel->reportUser($objUser, $objReport,$_SESSION['user']['user_id']);

                if ($repResult) {
                    $_SESSION['success'] = "Le signalement a bien été envoyé !";
                    header("Location: index.php?ctrl=user&action=user&id=" . $intId);
                    exit;
                }  else {
                    $arrError[] = "erreur";
                }

            } elseif(isset($_POST['repDelete']) && $_POST['repDelete'] == 'delete'){

				$repResult = $objUserModel->deleteRepUser($objUser, $_SESSION['user']['user_id']);

                if ($repResult) {
                    $_SESSION['success'] = "Votre signalement a bien était supprimer ! !";
                    header("Location: index.php?ctrl=user&action=user&id=" . $intId);
                    exit;
                }  else {
                    $arrError[] = "erreur";
                }

            }

            $objLikeModel = new MovieModel;
            $arrLike = $objLikeModel->userLike($intId);
            $arrMovieToDisplay = array();

            foreach ($arrLike as $arrDetMovie) {
                $objMovie = new MovieEntity('mov_');
                $objMovie->hydrate($arrDetMovie);
                $arrMovieToDisplay[] = $objMovie;
            }

            $arrComment = $objCommentModel->reviewUser($intId, $_SESSION['user']['user_id'] ?? 0);
            $arrCommentToDisplay = array();

            foreach ($arrComment as $arrDetComment) {
                $objComment = new CommentEntity('com_');
                $objComment->hydrate($arrDetComment);
                $arrCommentToDisplay[] = $objComment;
            }

            $this->_arrData['arrError'] = $arrError;
            $this->_arrData['objUser'] = $objUser;
            $this->_arrData['arrMovieToDisplay'] = $arrMovieToDisplay;
            $this->_arrData['arrCommentToDisplay'] = $arrCommentToDisplay;

            $this->_display("user");
        }


        public function deleteAccount(){

            if(!isset($_SESSION['user']['user_id'])){
                header("Location:index.php?ctrl=user&action=login");
                exit;
            }

            if (isset($_GET['id']) && ((int)$_GET['id']) == ($_SESSION['user']['user_id'])){
                $_SESSION['success'] = "Vous ne pouvez pas supprimer votre compte";
                header("Location:index.php?ctrl=admin&action=dashboard");
                exit;
            }

            if (isset($_GET['id']) && $_SESSION['user']['user_funct_id'] != 2 && $_SESSION['user']['user_funct_id'] != 3){ // s'il est pas admin ou modo
				header("Location:index.php?ctrl=error&action=err403");
				exit;
			}

            $objUserModel = new UserModel();
            $success = $objUserModel->deleteUser($_GET['id'] ?? $_SESSION['user']['user_id']);

            // Si on a supprimé, on nettoie tout
            if($success && !isset($_GET['id'])){
            unset($_SESSION['user']);
            $_SESSION['success'] = "Votre compte à bien été supprimé";
            header("Location:index.php");
            exit;
            }else{
                $_SESSION['success'] = "Le compte à bien été supprimé";
                header("Location:index.php?ctrl=admin&action=dashboard");
                exit;
            }

        }
        public function allUser(){

			if (!isset($_SESSION['user']) && $_SESSION['user']['user_funct_id'] != 2 && $_SESSION['user']['user_funct_id'] != 3){ // Pas d'utilisateur connecté
				header("Location:index.php?ctrl=error&action=err403");
				exit;
			}

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

			$this->_arrData['arrUserToDisplay']	    = $arrUserToDisplay;

			$this->_display("allUser");
		}

}
