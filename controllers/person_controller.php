<?php
    require'controllers/mother_controller.php';
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

            $intId = $_GET['id'];

            $arrPost['order'] = $_POST['order']??"";
            $arrPost['job']  = $_POST['job']??"";

            $objPersonModel = new PersonModel;
			$arrPerson 		= $objPersonModel->findPerson($intId);
			$arrJobs        = $objPersonModel->findJobsOfPerson($intId);

			$arrJobToDisplay	= array();

			foreach($arrJobs as $arrDetJob){
                $objContent = new PersonEntity('job_');
                $objContent->hydrate($arrDetJob);

                $arrJobToDisplay[]	= $objContent;
            }


			$objPerson      = new PersonEntity('pers_');
			$objPerson->hydrate($arrPerson);


			$objMovieModel 	    = new MovieModel;
            $arrMovie		    = $objMovieModel->movieOfPerson($intId, $arrPost);

            $arrMovieToDisplay	= array();

            foreach($arrMovie as $arrDetMovie){
            $objContent = new MovieEntity('mov_');
            $objContent->hydrate($arrDetMovie);

            $arrMovieToDisplay[]	= $objContent;
            }



            $this->getContent($strPage = "person", objPerson:  $objPerson, objContent:  $arrMovieToDisplay, objJobs: $arrJobToDisplay, arrPost: $arrPost );
        }

    }
