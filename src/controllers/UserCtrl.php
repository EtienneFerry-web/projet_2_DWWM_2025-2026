<?php
    namespace App\Controllers;
    //Entities
    use App\Entities\MovieEntity;
    use App\Entities\CommentEntity;
    use App\Entities\ReportEntity;
    use App\Entities\UserEntity;
    //models
    use App\Models\ReportModel;
    use App\Models\MovieModel;
    use App\Models\CommentModel;
    use App\Models\UserModel;

    use DateTime;

    /**
     * User authentication
     * @author Etienne
     *
     * 1. Collect credentials from the POST request
     * 2. Validate if the email and password fields are filled
     * 3. If valid, verify credentials against the database
     * 4. If authenticated, start session and redirect; else, manage failed attempts and lockout timer
     */


    class UserCtrl extends MotherCtrl{

        public function userActivity(){


            $time = new DateTime;

            if($_SESSION['last_activity'] > $time){
                $_SESSION['last_activity']    = new DateTime('+30 minutes');
            } else{
                $_SESSION['last_activity'] = 0;
                echo('logout');
                exit;
            }

        }

        public function login(){

            $strEmail       = $_POST['email']??"";
            $strPwd         = $_POST['pwd']??"";

            $objUser            = new UserEntity;
            $objUserModel       = new UserModel;
            $objUser->hydrate($_POST);

            $arrError = [];
            if (count($_POST) > 0) {

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

                            $_SESSION['user']       = $arrResult;
                            $_SESSION['success']    = "Bienvenue, vous êtes bien connecté";
                            $_SESSION['last_activity']    = new DateTime('+30 minutes');

                            $arrData = array (
                                'userId'  => $_SESSION['user']['user_id'],
                                'event'   => 'LOGIN',
                                'ip'      => $_SERVER['REMOTE_ADDR'],
                                'agent'   => $_SERVER['HTTP_USER_AGENT'] ?? 'Inconnu'
                            );

                            $objUserModel->addLogs($arrData);
                            $this->_redirect($_ENV['BASE_URL']);
                    }
                }
            }
            
            $this->_arrData['objUser'] = $objUser;
            $this->_arrData['arrError'] = $arrError;
            $this->_arrData['strEmail'] = $strEmail;

            $this->_display("login");
        }

        /**
         * Terminate user session
         * @author Marco & Etienne
         *
         * 1. Initialize session access
         * 2. Remove user data from the session
         * 3. Set a success message for the redirection
         * 4. Redirect the user to the homepage
         */

        public function logout(){

            $objUserModel       = new UserModel;

            $arrData = array (
                'userId'  => $_SESSION['user']['user_id'],
                'event'   => 'LOGOUT',
                'ip'      => $_SERVER['REMOTE_ADDR'],
                'agent'   => $_SERVER['HTTP_USER_AGENT'] ?? 'Inconnu'
            );

            $objUserModel->addLogs($arrData);
            // Cleaning session from User


            if($_SESSION['last_activity'] == 0){
                $_SESSION['success']  = "Vous avez êtes déconnecté pour inactivité !";
                unset($_SESSION['user']);
                unset($_SESSION['last_activity']);
                $this->_redirect($_ENV['BASE_URL']."user/login");
               
            } else {
                $_SESSION['success']  = "Vous êtes bien déconnecté";
                unset($_SESSION['user']);
                unset($_SESSION['last_activity']);
                $this->_redirect($_ENV['BASE_URL']);
            }

        }

        /**
        * Create account
        * @author Etienne
        *
        * 1. Collect information from the form
        * 2. Test if the form is correctly filled
        * 3. If the form is correctly filled, add of the information in the database, else ERROR
        *
        */

        public function createAccount(){

            $strName        = $_POST['name']??"";
            $strFirstname   = $_POST['firstname']??"";
            $strPseudo      = $_POST['pseudo']??"";
            $strBirthdate   = $_POST['birthdate']??"";
            $strEmail       = $_POST['email']??"";
            $strPwd         = $_POST['pwd']??"";
            $strPwdConfirm  = $_POST['pwd_confirm']??"";
     
            $objUser    = new UserEntity;
            $objUser->hydrate($_POST);

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

                $password = $objUser->getPwd();


                if ($password == "") {
                    $arrError['pwd'] = "Le mot de passe est obligatoire";
                } else {
                    if(strlen($password) < 16) {
                        $arrError['pwd'] = "Le mot de passe doit au moins avoir 16 caractères";
                    }

                    if (!preg_match('/[A-Z]/', $password)) {
                        $arrError['pwd'] = "Il manque une majuscule";
                    }

                    if (!preg_match('/[a-z]/', $password)) {
                        $arrError['pwd'] = "Il manque une minuscule";
                    }

                    if (!preg_match('/[0-9]/', $password)) {
                        $arrError['pwd'] = "Il manque au moins un chiffre";
                    }

                    if (!preg_match('/[#?!@$%^&*-]/', $password)) {
                        $arrError['pwd'] = "Il manque un caractère spécial (#?!@$%^&*-)";
                    }

                    if ($password != $strPwdConfirm){
                        $arrError['pwd_confirm'] = "Le mot de passe et sa confirmation ne sont pas identiques";
                    }
                }

                //If form is correctly filled
                if (count($arrError) == 0){
                    //Database add
                    $objUserModel   = new UserModel;
                    $boolInsert     = $objUserModel->insert($objUser);

                    if($boolInsert != true && $boolInsert['user_email'] == $objUser->getEmail()){
                        $arrError[] = 'Adresse mail ou Mots de passe Invalide !';
                    }
                    if($boolInsert != true  && $boolInsert['user_pseudo'] == $objUser->getPseudo()){
                       $arrError[] = 'pseudo probleme change';
                    }

                    if ($boolInsert != false && count($arrError) == 0){

                            $_SESSION['success']    = "Le compte compte a bien été crée";
                            $this->_redirect($_ENV['BASE_URL']."user/login");

                    }else{
                        $arrError[] = '';
                    }
                }
            }
            
            $this->_arrData['name']         = $strName;
            $this->_arrData['firstname']    = $strFirstname;
            $this->_arrData['pseudo']       = $strPseudo;
            $this->_arrData['birthdate']    = $strBirthdate;
            $this->_arrData['strEmail']     = $strEmail;
            $this->_arrData['arrError']     = $arrError;
            $this->_arrData['objUser']      = $objUser;
            // Afficher
            $this->_display("createAccount");
        }

        /**
         * Validate user information
         * @author Etienne
         *
         * 1. Initialize an empty error array
         * 2. Check if name, firstname, and pseudo are provided
         * 3. Validate email presence and verify correct email format
         * 4. Return the list of identified validation errors
         *
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

        /**
         * Update user profile settings
         * @author Etienne
         *
         * 1. Check if the user is authenticated, otherwise redirect to 403 error
         * 2. Retrieve and hydrate user data from the database or session
         * 3. Process form submission: validate text fields and handle image upload
         * 4. Verify password strength (length, case, numbers, special characters) and confirmation
         * 5. If no errors, update the database and refresh the session data
         *
         */

        public function settingsUser() {
            $this->_checkAccess();


            $objUserModel	= new UserModel;
            $arrUser		= $objUserModel->userPage($_GET['id']??$_SESSION['user']['user_id']);

            $objUser	= new UserEntity;
            $objUser->hydrate($arrUser);

            $arrError = [];

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

                $password = $objUser->getPwd();
                $strPwdConfirm = $objUser->getPwdConfirm();

                if ($password != "") {

                    if(strlen($password) < 16) {
                        $arrError['pwd'] = "Le mot de passe doit au moins avoir 16 caractères";
                    }

                    if (!preg_match('/[A-Z]/', $password)) {
                        $arrError['pwd'] = "Il manque une majuscule";
                    }

                    if (!preg_match('/[a-z]/', $password)) {
                        $arrError['pwd'] = "Il manque une minuscule";
                    }

                    if (!preg_match('/[0-9]/', $password)) {
                        $arrError['pwd'] = "Il manque au moins un chiffre";
                    }

                    if (!preg_match('/[#?!@$%^&*-]/', $password)) {
                        $arrError['pwd'] = "Il manque un caractère spécial (#?!@$%^&*-)";
                    }

                    if ($password != $strPwdConfirm){
                        $arrError['pwd_confirm'] = "Le mot de passe et sa confirmation ne sont pas identiques";
                    }
                }

                if(count($arrError) == 0){
                    $boolUpdate = $objUserModel->settingsUser($objUser);

                    if($boolUpdate){
                        $_SESSION['user']['user_pseudo'] = $objUser->getPseudo();

                        $_SESSION['success'] = "Le profil à bien été mis à jour";
                        $this->_selfRedirect();
                    }else{
                        $arrError[] = "Erreur lors de la mise a jours, veuilez reessayer";
                    }
                }

            }

            $this->_arrData['arrError'] = $arrError;
            $this->_arrData['objUser']  = $objUser;
            $this->_display("settingsUser");

        }

        /**
         * Display and manage user profile interactions
         * @author Marco & Etienne
         *
         * 1. Retrieve profile data and verify if the user exists (404 if not)
         * 2. Handle comment management: deletion, modification, and reporting
         * 3. Process social interactions: liking reviews and marking spoilers
         * 4. Manage user-to-user reporting and report deletion
         * 5. Fetch and hydrate lists of liked movies and user reviews for display
         *
         */

        public function userPage() {

            $intId = $_GET['id'];
            $objUserModel = new UserModel;
			$arrUser		= $objUserModel->userPage($intId, $_SESSION['user']['user_id']??0);

            if (!$arrUser) {
                $this->_redirect($_ENV['BASE_URL']."error/err404");
            }

			$objUser       = new UserEntity('mov_');
			$objUser->hydrate($arrUser);

            

            $objCommentModel = new CommentModel;
            $objComment = new CommentEntity;
            $arrError = [];

            if (isset($_POST['deleteImage']) && isset($_SESSION['user'])) {
                $result = $objUserModel->deletephotoMovieOfUser($_POST['deleteImage'], $_SESSION['user']['user_id']);

                if ($result) {
                    $_SESSION['success'] = "L'image à bien était supprimer !";
                } else {
                    $arrError[] = "erreur lors de la suppression veulliez réssayer !";
                }
            }

            if (isset($_POST['deleteComment']) && isset($_SESSION['user'])) {
                $objComment->setId((int)$_POST['deleteComment']);
                $objComment->setUser_id($_SESSION['user']['user_id']);

                $result = $objCommentModel->deleteComment($objComment);


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
                    $this->_selfRedirect();
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
            }
            elseif(isset($_POST['repComDelete']) && $_POST['repComDelete'] != ''){

                    $objReport = new ReportEntity;
    				$objReport->setReported_com_id($_POST['repComDelete']);

    				$repResult = $objCommentModel->deleteRepCom($objReport, $_SESSION['user']['user_id']);

                    if ($repResult) {
                        $_SESSION['success'] = "Votre signalement a bien était supprimer ! !";
                    }  else {
                        $arrError[] = "erreur";
                    }
            }

        	if(isset($_POST['likeReviewBtn'])&&(isset($_SESSION['user']))){

					$repResult = $objCommentModel->LikeComment($_SESSION['user']['user_id'], $_POST['likeReviewBtn']);

					if ($repResult === 1) {
						$_SESSION['success'] = "Votre like a bien été pris en compte !";
                        header("Location: index.php?ctrl=user&action=user&id=" . $intId);
                        exit;
					} else if($repResult === 2) {
						$_SESSION['success'] = "Votre like a bien été était supprimer !";
					}

    			}elseif(isset($_POST['likeReviewBtn']) && !isset($_SESSION['user'])){
    				$arrError[''] = "Vous devez etre connecté pour liker un commentaire";
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

            if(isset($_SESSION['user']) && $_GET['id'] == $_SESSION['user']['user_id']){


                $objReportModel = new ReportModel;

                $arrReport = $objReportModel->repOfConnectUser($_SESSION['user']['user_id']);

                $arrReportToDisplay = array();

                foreach ($arrReport as $arrDetReport) {
                    $objReport = new ReportEntity;
                    $objReport->hydrate($arrDetReport);
                    $arrReportToDisplay[] = $objReport;
                }

                $this->_arrData['arrReportToDisplay'] = $arrReportToDisplay;
            }



            $objLikeModel = new MovieModel;
            $arrImage = $objUserModel->photoMovieOfUser($intId);
            $arrLike = $objLikeModel->userLike($intId);
            $arrMovieToDisplay = array();

            foreach ($arrLike as $arrDetMovie) {
                $objMovie = new MovieEntity('mov_');
                $objMovie->hydrate($arrDetMovie);
                $arrMovieToDisplay[] = $objMovie;
            }

            $arrImageToDisplay = array();

            foreach ($arrImage as $arrDetImage) {
                $objMovieImg = new MovieEntity('pho_');
                $objMovieImg->hydrate($arrDetImage);
                $arrImageToDisplay[] = $objMovieImg;
            }

            $arrComment = $objCommentModel->reviewUser($intId, $_SESSION['user']['user_id'] ?? 0);
            $arrCommentToDisplay = array();

            foreach ($arrComment as $arrDetComment) {
                $objComment = new CommentEntity('com_');
                $objComment->hydrate($arrDetComment);
                $arrCommentToDisplay[] = $objComment;
            }

          
            
            $arrStat = $objUserModel->countStatUser($_GET['id']);   
            $objStat = new UserEntity;
            $objStat->hydrate($arrStat); 
            
            $this->_arrData['arrError'] = $arrError;
            $this->_arrData['objUser'] = $objUser;
            $this->_arrData['objStat'] = $objStat;
            $this->_arrData['arrImageToDisplay'] = $arrImageToDisplay;
            $this->_arrData['arrMovieToDisplay'] = $arrMovieToDisplay;
            $this->_arrData['arrCommentToDisplay'] = $arrCommentToDisplay;
            

            $this->_display("user");
        }
        /**
         * Delete user account (Self-service or Administrative)
         * @author Etienne
         *
         * 1. Check authentication and retrieve user permissions (ranks)
         * 2. If a target ID is provided, perform administrative checks (role hierarchy, existence)
         * 3. Prevent self-deletion via admin tools and protect top-level administrators
         * 4. Execute administrative deletion if permissions are sufficient
         * 5. Handle self-deletion: remove user data, destroy session, and redirect to home
         *
         */

        public function deleteAccount(){

            $this->_checkAccess();

            $objUserModel = new UserModel();
            $myId         = (int)$_SESSION['user']['user_id'];
            $myRank       = (int)$_SESSION['user']['user_funct_id'];


            if (isset($_GET['id']) && !empty($_GET['id'])) {

                $intTargetId = (int)$_GET['id'];

                if ($myRank != 2 && $myRank != 3){
                    header("Location:index.php?ctrl=error&action=err403");
                    exit;
                }


                if ($intTargetId == $myId){
                    $_SESSION['error'] = "Pour supprimer votre propre compte, ne passez pas par la gestion admin.";
                    header("Location:index.php?ctrl=admin&action=dashboard");
                    exit;
                }


                $arrTargetData = $objUserModel->findUser($intTargetId);

                if(!$arrTargetData) {
                    $_SESSION['error'] = "Cet utilisateur n'existe pas.";
                    header("location:index.php?ctrl=user&action=allUser");
                    exit;
                }


                $objTargetUser = new UserEntity();
                $objTargetUser->hydrate($arrTargetData);
                $targetRank = (int)$objTargetUser->getUser_funct_id();


                if($targetRank == 3) {
                    $_SESSION['error'] = "ACTION REFUSÉE : Impossible de supprimer un Administrateur.";
                    header("location:index.php?ctrl=user&action=allUser");
                    exit;
                }


                if($myRank <= $targetRank) {
                    $_SESSION['error'] = "Vous n'avez pas le grade suffisant pour supprimer cet utilisateur.";
                    header("location:index.php?ctrl=user&action=allUser");
                    exit;
                }

                if($objUserModel->deleteUser($intTargetId)) {
                    $_SESSION['success'] = "L'utilisateur a bien été supprimé.";
                } else {
                    $_SESSION['error'] = "Erreur technique lors de la suppression.";
                }


                header("Location:index.php?ctrl=user&action=allUser");
                exit;

            }

            else {

                if($objUserModel->deleteUser($myId)){

                    unset($_SESSION['user']);
                    session_destroy();
                    session_start();
                    $_SESSION['success'] = "Votre compte a bien été supprimé. Au revoir !";

                    header("Location:index.php");
                    exit;
                } else {
                    $_SESSION['error'] = "Erreur lors de la suppression de votre compte.";
                    header("Location:index.php");
                    exit;
                }
            }
        }

        /**
         * Display list of all users with filtering and search
         * @author 
         * * 1. Retrieve search terms and filter criteria from the URL
         * 2. Validate administrative permissions (Moderator/Admin) to restrict access
         * 3. Fetch filtered user data from the database based on search parameters
         * 4. Transform raw database arrays into a collection of UserEntity objects
         * 5. Pass the object list and current filters to the view for rendering
         * 
         * */

        public function allUser(){

            $search = $_GET['search'] ?? NULL;
            $filter = $_GET['filter'] ?? 'all';

			if (!isset($_SESSION['user']) && $_SESSION['user']['user_funct_id'] != 2 && $_SESSION['user']['user_funct_id'] != 3){ // Pas d'utilisateur connecté
				header("Location:index.php?ctrl=error&action=err403");
				exit;
			}

			$objUserModel 	= new UserModel;
			$arrUsers 		= $objUserModel->findAllUsers();
            $arrUsers       = $objUserModel->findAllUsersWithFilters($search, $filter);

			// Initialisation d'un tableau => objets
			$arrUserToDisplay	= array();

			// Boucle de transformation du tableau de tableau en tableau d'objets
			foreach($arrUsers as $arrDetUser){
				$objUser = new UserEntity;
				$objUser->hydrate($arrDetUser);
				$arrUserToDisplay[]	= $objUser;
			}

			$this->_arrData['arrUserToDisplay']	    = $arrUserToDisplay;
            $this->_arrData['searchTerm']           = $search;
            $this->_arrData['filter']               = $filter;

			$this->_display("allUser");
		}

        /**
         * Administrative management of user profiles
         * @author Etienne
         *
         * 1. Check if a user is logged in, redirecting to 403 if not
         * 2. Retrieve target user data via GET ID or fallback to current session
         * 3. Process form submissions and validate basic user information
         * 4. Manage profile picture uploads with file type and destination checks
         * 5. Update database via UserModel and refresh session data if editing own profile
         *
         */

        public function settingsAllUser() {

            if (!isset($_SESSION['user'])){ // Pas d'utilisateur connecté
            header("Location:index.php?ctrl=error&action=error_403");
            exit;
            }

            $objUserModel	= new UserModel;
            $arrUser		= $objUserModel->userPage($_GET['id']??$_SESSION['user']['user_id']);

            $objUser	= new UserEntity;
            $objUser->hydrate($arrUser);

            $arrError = [];


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

                if(count($arrError) == 0){
                    $boolUpdate = $objUserModel->settingsAllUser($objUser);

                    if($boolUpdate){
                        if($objUser->getPseudo() == $_SESSION['user']['user_pseudo']){

                        $_SESSION['success'] = "Le profil à bien été mis à jour";
                        header("Location:index.php?ctrl=user&action=settingsAllUser");
                        exit;
                        }
                    }else{
                        $arrError[] = "Erreur lors de la mise a jours, veuillez reessayer";
                    }
                }

            }

            $this->_arrData['arrError'] = $arrError;
            $this->_arrData['objUser']  = $objUser;
            $this->_display("settingsAllUser");

        }

        /**
         * Update user permission levels
         * @author Etienne
         *
         * 1. Verify administrative privileges (Moderator/Admin) before allowing access
         * 2. Capture the target user ID and the new rank ID from request data
         * 3. Update the user's role/function within the database via the UserModel
         * 4. Provide session feedback (success or error) based on the operation result
         * 5. Redirect back to the user management list
         *
         */
        public function updateGrade() {
            if(!isset($_SESSION['user']) || ($_SESSION['user']['user_funct_id'] != 2 && $_SESSION['user']['user_funct_id'] != 3)) {
                header("Location:index.php?ctrl=error&action=err403");
                exit;
            }

            $intIdUser      = $_GET['id']?? null;
            $intNewGrade = $_POST['user_funct_id'] ?? null;

            if($intIdUser && $intNewGrade) {
                $objUserModel = new UserModel();
                $success = $objUserModel->updateGrade((int)$intIdUser, (int)$intNewGrade);

                if($success){
                    $_SESSION['success'] = "Le grade a bien été mis à jour.";
                } else {
                    $_SESSION['error'] = "Erreur lors de la mise à jour";
                }
            }

            header("Location: index.php?ctrl=user&action=allUser");
        }

         /**
		* @author Audrey
		* Affichage de la page permission en fonction de son grade
		*/

        public function permissions() {
            $this->_checkAccess();

            $this->_display("permissions");
        }

        public function forgotPwd(){
			$objUser 	= new UserEntity();
            $arrError = [];

            $this->_arrData['objUser'] = $objUser;

			
			if (count($_POST) >0) {
				
				$strMail 	= $_POST['email'];
				$objUser->setEmail($strMail);
				
				$objModel	= new UserModel();
				$arrUser 	= $objModel->findUserByMail($objUser->getEmail());

                $_SESSION['success'] = "Si vous êtes inscrit sur notre site, vous allez recevoir un mail contenant un lien pour redéfinir votre mot de passe.";
				
				if ($arrUser !== false){
					$strToken 	= bin2hex(random_bytes(64)); // Génère un token aléatoire
					$boolOk		= $objModel->updateForgotInfos($strToken, $arrUser['user_id']);
					if ($boolOk){
                        //Construction lien
                        $link = $_ENV['BASE_URL']."user/recoverPwd?token=" . $strToken;

						// Destinataire(s)
						$this->_objMail->addAddress($arrUser['user_email'], $arrUser['user_name'].' '.$arrUser['user_firstname']);
						$this->_objMail->Subject    = "Mot de passe oublié";
				
						
						$this->_arrData['link']  = $link;
						$this->_arrData['user_name']  = $arrUser['user_name'];

						$this->_objMail->Body      	= $this->_display("mailForgot_pwd", false);

                        if($this->_sendMail()){
                            $_SESSION['success'] = "Ca marche !";
                        }
                    }
				}
			}
			
			$this->_display("forgotPwd");
        }
		/**
		* Page de modification du mot de passe si oublié
		*/
		public function recoverPwd(){
            var_dump($_POST);
            $strToken = $_GET['token'] ?? '';
            $arrError = [];
            if(empty($strToken)){
                $_SESSION['error'] = "Token manquant.";
                header("Location:index.php?ctrl=user&action=login");
                exit;
            }

			$objModel	= new UserModel();
			$arrUser 	= $objModel->findUserByToken($_GET['token']);

            if($arrUser === false) {
                $_SESSION['error'] = "Ce lien de réinitialisation est invalide ou expiré.";
                header("Location:index.php?ctrl=user&action=forgot_pwd");
                exit;
            }
			
			if (count($_POST) > 0){
				$objUser 	= new UserEntity();
				$objUser->setId($arrUser['user_id']);
				$objUser->setPwd($_POST['pwd'] ?? '');

                $arrError 	= $this->_verifPwd($objUser, $_POST['pwdConfirm']);

				if (count($arrError) == 0){
					$boolOk	= $objModel->updatePwd($objUser);
					if ($boolOk){
						$_SESSION['success'] = "Votre mot de passe a bien été changé";
						header("Location:index.php?ctrl=user&action=login");
						exit;
					}else{
						$arrError[]	= "Erreur lors du changement de mot de passe.";
					}
				}
			}			
			
			$this->_arrData['arrError']	= $arrError;
			
			$this->_display("recoverPwd");
		}

        /**
		* Méthode permettant de vérifier le mot de passe de l'utilisateur
		* @param object $objUser L'utilisateur à vérifier
		* @param string $strPwdConfirm Confirmation du mot de passe
		* @return array Le tableau des erreurs
		*/
		private function _verifPwd(object $objUser, string $strPwdConfirm):array{
			$strRegex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{16,}$/";
			if ($objUser->getPwd() == ""){
				$arrError['pwd'] = "Le mot de passe est obligatoire";
			}else if (!preg_match($strRegex, $objUser->getPwd())){
				$arrError['pwd'] = "Le mot de passe ne correspond pas aux règles";
			}else if($objUser->getPwd() != $strPwdConfirm){
				$arrError['pwd_confirm'] = "Le mot de passe et sa confirmation ne sont pas identiques";
			}
			
			return $arrError??array();			
		}
}
