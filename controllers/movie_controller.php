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
			$arrError = [];
            $intId = $_GET['id']; //<-- ID of Movie
			$objCommentModel	= new CommentModel; 
			/**
			 * @author Etienne
			 * 
			 */

    
    session_start();
				// 1. Check if the form has been submitted
				if(!empty($_POST)) {

				// 2. Ensure the user is logged in
					if(isset($_SESSION['user'])) {

				// 3. Validation: Check if the comment is empty (after trimming whitespace)
						if ((trim($_POST['com_comment'])== "")){
							$arrError['com_comment'] = "Vous devez remplir le champ commentaire pour laisser un avis";
						} 
				// 4. Validation: Check if a rating has been selected
						if (empty($_POST['noteRating'])){
							$arrError['noteRating'] = "Vous devez notez le film pour laisser un avis";
						} 
				/// 5. Final Verdict: If no errors were found, proceed with insertion
						if(count($arrError)===0) {
				// Instantiate and hydrate the CommentEntity
							$objComment = new CommentEntity;
							$objComment->setComment($_POST['com_comment']);
							$objComment->setUser_id($_SESSION['user']['user_id']);
							$objComment->setRating($_POST['noteRating']);
							$objComment->setmovieId($intId);
				// Insert into DB and set success notification
							$objCommentModel->commentInsert($objComment);
							$_SESSION['success'] 	= "Votre commentaire à bien etait publié";
						}
					}
				}
			
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

			$arrComment     = $objCommentModel->commentOfMovie($intId);

			$arrCommentToDisplay	= array();

			foreach($arrComment as $arrDetComment){
				$objComment = new CommentEntity('com_');
				$objComment->hydrate($arrDetComment);

				$arrCommentToDisplay[]	= $objComment;
			}


            $this->getContent($strPage = "movie",objContent: $objMovie, objAllPerson: $arrPersToDisplay, objComment: $arrCommentToDisplay, arrError: $arrError);
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
