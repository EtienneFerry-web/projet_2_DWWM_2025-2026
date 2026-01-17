<?php
    require'controllers/mother_controller.php';
    require'entities/user_entity.php';
    require'models/user_model.php';

    class UserCtrl extends MotherCtrl{

        public function login(){
            $this->getContent($strPage = "login");
        }

        public function logout(){
            $this->getContent($strPage = "logout");
        }

        public function createAccount(){
            
            // Traitement du formulaire
            $strName 		= $_POST['name']??"";
            $strFirstname 	= $_POST['firstname']??"";
            $strPseudo 	    = $_POST['pseudo']??"";
            $strBirthdate   = $_POST['birthdate']??"";
            $strEmail 		= $_POST['email']??"";
            $strPwd 		= $_POST['pwd']??"";
            $strPwdConfirm	= $_POST['pwd_confirm']??"";
            
            $objUser	= new User;
            $objUser->hydrate($_POST);

            // Tester le formulaire
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
                $strRegex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{16,}$/";
                if ($objUser->getPwd() == ""){
                    $arrError['pwd'] = "Le mot de passe est obligatoire";
                }else if (!preg_match($strRegex, $objUser->getPwd())){
                    $arrError['pwd'] = "Le mot de passe ne correspond pas aux règles";
                }else if($objUser->getPwd() != $strPwdConfirm){
                    $arrError['pwd_confirm'] = "Le mot de passe et sa confirmation ne sont pas identiques";
                }
                // Ajouter la vérification du mot de passe par regex
                
                // Si le formulaire est rempli correctement
                if (count($arrError) == 0){
                    // => Ajout dans la base de données 
                    $objUserModel	= new UserModel;
                    //$intNbInsert 	= $objUserModel->insert($strName, $strFirstname, $strMail, $strPwd);
                    $boolInsert 	= $objUserModel->insert($objUser);
                    if ($boolInsert === true){
                        $_SESSION['success'] 	= "Le compte a bien été créé";
                        //header("Location:index.php");
                        //exit;
                    }else{
                        $arrError[] = "Erreur lors de l'ajout";
                    }
                }
            }   
            //Display variable
            $arrData = array(
                'objUser'   => $objUser,
                'arrError'  => $arrError
            );
            $this->getContent($strPage = "createAccount",$arrData);
        }

        public function settingsUser(){
            $this->getContent($strPage = "settingsUser");
        }


        public function user(){
            $this->getContent($strPage = "user");
        }
    }
