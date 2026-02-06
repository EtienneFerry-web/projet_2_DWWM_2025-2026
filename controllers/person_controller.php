<?php
    require'entities/movie_entity.php';
    require'entities/comment_entity.php';
    require'entities/person_entity.php';
    require'models/movie_model.php';
    require'models/comment_model.php';
    require'models/person_model.php';

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
                $objContent = new PersonEntity('job_');
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

        public function settingsPerson() {
            if (isset($_GET['id']) && $_SESSION['user']['user_funct_id'] != 2 && $_SESSION['user']['user_funct_id'] != 3){ // s'il est pas admin ou modo
				header("Location:index.php?ctrl=error&action=err403");
				exit;
			}
            $objPersonModel = new PersonModel();
            $arrPerson      = $objPersonModel->findPerson($_GET['id']);
             
             //Preparing hydrate
            $objPerson = new PersonEntity();
			$objPerson->hydrate($arrPerson);
            var_dump($objPerson);
            $arrError =[];

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
                if ($objPerson->getPhoto() == ""){
                    $arrError['photo'] = "La photo est obligatoire";
                }
              
            }  
            
            $this->_arrData['objPerson'] = $objPerson;
            $this->_display("settingsPerson");
        
        }
    }