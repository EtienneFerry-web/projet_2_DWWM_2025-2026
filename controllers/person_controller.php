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

            $objPersonModel = new PersonModel;
			$arrPerson 		= $objPersonModel->findPerson($intId);
			$objPerson      = new PersonEntity('pers_');
			$objPerson->hydrate($arrPerson);


			$objMovieModel 	    = new MovieModel;
            $arrMovie		    = $objMovieModel->movieOfPerson($intId);

            $arrMovieToDisplay	= array();

            foreach($arrMovie as $arrDetMovie){
            $objContent = new MovieEntity('mov_');
            $objContent->hydrate($arrDetMovie);

            $arrMovieToDisplay[]	= $objContent;
            }



            $this->getContent($strPage = "person", objPerson:  $objPerson, objContent:  $arrMovieToDisplay);
        }

    }
