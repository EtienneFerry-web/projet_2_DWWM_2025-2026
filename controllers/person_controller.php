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

    }
