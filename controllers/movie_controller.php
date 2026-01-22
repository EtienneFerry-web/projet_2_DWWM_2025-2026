<?php
    require'controllers/mother_controller.php';
    require'entities/movie_entity.php';
    require'entities/comment_entity.php';
    require'entities/person_entity.php';
    require'models/movie_model.php';
    require'models/comment_model.php';
    require'models/person_model.php';
	require'models/movie_model.php';
	require'entities/participate_entity.php';

    /**
     * @author Marco Schmitt
     * 16/01/2026
     * Version 0.1
     */

    class MovieCtrl extends MotherCtrl{

        public function home(){

            $objContentModel 	= new MovieModel;
			$arrMovie		    = $objContentModel->newMovie();

			$arrMovieToDisplay	= array();

			foreach($arrMovie as $arrDetMovie){
				$objContent = new MovieEntity('mov_');
				$objContent->hydrate($arrDetMovie);

				$arrMovieToDisplay[]	= $objContent;
			}

            $this->getContent($strPage = "home", objContent: $arrMovieToDisplay);
        }

        public function list(){

            $objContentModel 	= new MovieModel;
			$arrMovie		    = $objContentModel->allMovie(0);

			$arrMovieToDisplay	= array();

			foreach($arrMovie as $arrDetMovie){
				$objContent = new MovieEntity('mov_');
				$objContent->hydrate($arrDetMovie);

				$arrMovieToDisplay[]	= $objContent;
			}

            $this->getContent($strPage = "list", objContent: $arrMovieToDisplay);
        }

        public function movie(){

            $intId = $_GET['id'];

            $objMovieModel 	= new MovieModel;
			$arrMovie 		= $objMovieModel->findMovie($intId);
			$objMovie       = new MovieEntity('mov_');
			$objMovie->hydrate($arrMovie);

			$objPersonModel = new PersonModel;
			$arrPerson      = $objPersonModel->findAllPerson($intId);

			$arrPersToDisplay	= array();

			foreach($arrPerson as $arrDetPerson){
				$objPerson = new PersonEntity('pers_');
				$objPerson->hydrate($arrDetPerson);

				$arrPersToDisplay[]	= $objPerson;
			}

			$objCommentModel = new CommentModel;
			$arrComment     = $objCommentModel->commentOfMovie($intId);

			$arrCommentToDisplay	= array();

			foreach($arrComment as $arrDetComment){
				$objComment = new CommentEntity('com_');
				$objComment->hydrate($arrDetComment);

				$arrCommentToDisplay[]	= $objComment;
			}


            $this->getContent($strPage = "movie",objContent: $objMovie, objAllPerson: $arrPersToDisplay, objComment: $arrCommentToDisplay );
        }

        public function resultSearch(){

            $objContentModel 	= new MovieModel;
			$arrMovie		    = $objContentModel->allMovie(0);



			$arrMovieToDisplay	= array();

			foreach($arrMovie as $arrDetMovie){
				$objContent = new MovieEntity('mov_');
				$objContent->hydrate($arrDetMovie);

				$arrMovieToDisplay[]	= $objContent;
			}

            $this->getContent($strPage = "resultSearch",objContent: $arrMovieToDisplay);
        }

        public function person(){
            $this->getContent($strPage = "person");
        }

        public function addMovie(){
            $this->getContent($strPage = "addMovie");
        }

    }
