<?php
    namespace App\Controllers;

    //Entities
    use App\Entities\MovieEntity;
    use App\Entities\CommentEntity;
    use App\Entities\PersonEntity;
    //Models
    use App\Models\MovieModel;
    use App\Models\CommentModel;
    use App\Models\PersonModel;

    /**
     * @author Marco Schmitt
     * 16/01/2026
     * Version 0.1
     */

    class PersonCtrl extends MotherCtrl{

        public function person(){

            $objMovieModel 	    = new MovieModel;

            $objMovieModel->order = $_POST['order']??"";
            $objMovieModel->job   = $_POST['job']??"";

            $objPersonModel = new PersonModel;
			$arrPerson 		= $objPersonModel->findPerson($_GET['id']);
			$arrJobs        = $objPersonModel->findJobsOfPerson($_GET['id']);


			$arrJobToDisplay	= array();

			foreach($arrJobs as $arrDetJob){
                $objContent = new PersonEntity;
                $objContent->hydrate($arrDetJob);

                $arrJobToDisplay[]	= $objContent;
            }

			$objPerson = new PersonEntity('pers_');
			$objPerson->hydrate($arrPerson);


            $arrMovie		    = $objMovieModel->movieOfPerson($_GET['id']);

            $arrMovieToDisplay	= array();

            foreach($arrMovie as $arrDetMovie){
            $objContent = new MovieEntity('mov_');
            $objContent->hydrate($arrDetMovie);

            $arrMovieToDisplay[]	= $objContent;
            }

            $this->_arrData['arrMovieToDisplay']    = $arrMovieToDisplay;
            $this->_arrData['arrJobToDisplay']      = $arrJobToDisplay;
            $this->_arrData['objPerson']            = $objPerson;

            $this->_arrData['order'] = $objMovieModel->order;
            $this->_arrData['job']   = $objMovieModel->job;


            $this->_display("person");
        }

        /**
        * @author Audrey Sonntag
         * 06/02/2026
         * Version 0.1
        */

        public function deletePerson() {

           if (isset($_SESSION['user']) && $_SESSION['user']['user_funct_id'] != 2 && $_SESSION['user']['user_funct_id'] != 3){ // s'il est pas admin ou modo
				header("Location:index.php?ctrl=error&action=err403");
				exit;
			}
            $objPersonModel = new PersonModel();
            $success = $objPersonModel->deletePerson($_GET['id']);

            // Si on a supprimé, on nettoie tout
            if($success){
                $_SESSION['success'] = "La célébrité a bien été supprimée";
                header("Location:index.php?ctrl=admin&action=dashboard");
                exit;
            }
		}


        /**
        * @author Audrey Sonntag
         * 06/02/2026
         * Version 0.1
        */

        public function settingsPerson() {
            if (isset($_GET['id']) && $_SESSION['user']['user_funct_id'] != 2 && $_SESSION['user']['user_funct_id'] != 3){ // s'il est pas admin ou modo
				header("Location:index.php?ctrl=error&action=err403");
				exit;
			}
            $objPersonModel = new PersonModel();
            var_dump($_POST);
            $objPerson = new PersonEntity();
            $objPerson->hydrate($_POST);

            //Testing Form
            $arrError = [];
            if (count($_POST) > 0) {
                if ($objPerson->getName() == ""){
                    $arrError['name'] = "Le nom est obligatoire";
                }
                if ($objPerson->getFirstname() == ""){
                    $arrError['firstname'] = "Le prénom est obligatoire";
                }
                if ($objPerson->getBirthdate() == ""){
                    $arrError['birthdate'] = "La date de naissance est obligatoire";
                }
                if ($objPerson->getCountry() == ""){
                    $arrError['country'] = "La nationalité est obligatoire";
                }
                if ($objPerson->getBio() == ""){
                    $arrError['bio'] = "La biographie est obligatoire";
                }

                $arrTypeAllowed	= array('image/jpeg', 'image/png');
				if ($_FILES['photo']['error'] == 4){ // Est-ce que le fichier existe ?
					$arrError['photo'] = "L'image est obligatoire";
				}else if (!in_array($_FILES['photo']['type'], $arrTypeAllowed)){
					$arrError['photo'] = "Le type de fichier n'est pas autorisé";
				}

                if (count($arrError) == 0){
                    $objPerson->setId($_GET['id']);

                    $strImageName	= uniqid();
					switch ($_FILES['photo']['type']){
						case 'image/jpeg' :
							$strImageName .= '.jpg';
							break;
						case 'image/png' :
							$strImageName .= '.png';
							break;
					}
                     $strDest = 'assets/img/person/' . $strImageName;

                    if(move_uploaded_file($_FILES['photo']['tmp_name'], $strDest)){
                        $objPerson->setPhoto($strImageName);
                    } else {
                        $arrError['photo'] = "Erreur lors du téléchargement";
                    }

					// update of the person info
					$boolUpdate 	= $objPersonModel->updatePerson($objPerson);
                }

            }

            $arrPerson      = $objPersonModel->findPerson($_GET['id']);
            $arrCountry     = $objPersonModel->allCountry();


            $arrCountryToDisplay    = array();

            foreach($arrCountry as $arrDetCountry){
                $objPerson = new PersonEntity('pers_');
                $objPerson->hydrate($arrDetCountry);

                $arrCountryToDisplay[]  = $objPerson;
            }

            //Preparing hydrate

			$objPerson->hydrate($arrPerson);
            var_dump($objPerson);


            //If the form is correct, we update the user's info

            $this->_arrData['objPerson']            = $objPerson;
            $this->_arrData['arrCountryToDisplay']  = $arrCountryToDisplay;
            $this->_arrData['arrError']             = $arrError;
            $this->_display("settingsPerson");


        }

        public function allPerson(){

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

			$this->_arrData['arrPersonToDisplay']	= $arrPersonToDisplay;

			$this->_display("allPerson");
		}
    }
