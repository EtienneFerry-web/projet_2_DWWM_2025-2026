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

    class MovieCtrl extends MotherCtrl{

        public function home(){

            $objContentModel 	= new MovieModel;
			$arrMovie		    = $objContentModel->newMovie();

			$this->_arrData['arrMovieToDisplay']	= array();

			foreach($arrMovie as $arrDetMovie){
				$objContent = new MovieEntity('mov_');
				$objContent->hydrate($arrDetMovie);

				$this->_arrData['arrMovieToDisplay'][]	= $objContent;
			}

            $this->_display($strPage = "home");
        }

        public function list(){

            $this->_arrData['arrPost']['producer']    	= $_POST['producer']??"";
            $this->_arrData['arrPost']['actor'] 	    = $_POST['actor']??"";
            $this->_arrData['arrPost']['realisator'] 	= $_POST['realisator']??"";
            $this->_arrData['arrPost']['categories'] 	= $_POST['categories']??"";
            $this->_arrData['arrPost']['country']     	= $_POST['country']??"";
            $this->_arrData['arrPost']['date'] 			= $_POST['date']??"";
            $this->_arrData['arrPost']['startDate'] 	= $_POST['startdate']??"";
            $this->_arrData['arrPost']['endDate']	    = $_POST['enddate']??"";

            $objPersonModel 	   = new PersonModel;
            $arrActor              = $objPersonModel->findActor();
            $arrReal               = $objPersonModel->findReal();
            $arrProducer           = $objPersonModel->findProducer();

            $this->_arrData['arrActorToDisplay']	= array();

            foreach($arrActor as $arrDetActor){
				$objContent = new PersonEntity('pers_');
				$objContent->hydrate($arrDetActor);

				$this->_arrData['arrActorToDisplay'][]	= $objContent;
			}

			
			$this->_arrData['arrRealToDisplay']	= array();

			foreach($arrReal as $arrDetReal){
				$objContent = new PersonEntity('pers_');
				$objContent->hydrate($arrDetReal);

				$this->_arrData['arrRealToDisplay'][]	= $objContent;
			}

			$this->_arrData['arrProducerToDisplay']	= array();

			foreach($arrProducer as $arrDetProducer){
				$objContent = new PersonEntity('pers_');
				$objContent->hydrate($arrDetProducer);

				$this->_arrData['arrProducerToDisplay'][]	= $objContent;
			}

            $objContentModel 	= new MovieModel;
			$arrMovie		    = $objContentModel->allMovie($this->_arrData['arrPost']);
			$arrCountry         = $objContentModel->allCountry();
			$arrCategories      = $objContentModel->allCategories();

			
			$this->_arrData['arrCategoriesToDisplay'] = array();

			foreach($arrCategories as $arrDetCategories){
				$objContent = new MovieEntity('mov_');
				$objContent->hydrate($arrDetCategories);

				$this->_arrData['arrCategoriesToDisplay'][]	= $objContent;
			}

			$arrCountryToDisplay	= array();
			$this->_arrData['arrCountryToDisplay'] = array();

			foreach($arrCountry as $arrDetCountry){
				$objContent = new MovieEntity('mov_');
				$objContent->hydrate($arrDetCountry);

				$this->_arrData['arrCountryToDisplay'][]	= $objContent;
			}



			$arrMovieToDisplay	= array();
			$this->_arrData['arrMovieToDisplay'] = array();

			foreach($arrMovie as $arrDetMovie){
				$objContent = new MovieEntity('mov_');
				$objContent->hydrate($arrDetMovie);

				$this->_arrData['arrMovieToDisplay'][]	= $objContent;
			}

            $this->_display($strPage = "list");
        }

        public function movie(){
			$this->_arrData['arrError'] = [];
            $intId = $_GET['id']; //<-- ID of Movie
			$objCommentModel	= new CommentModel;
			/**
			 * @author Etienne
			 *
			 */
				// 1. Check if the form has been submitted
				if(!empty($_POST)) {

				// 2. Ensure the user is logged in
					if(isset($_SESSION['user'])) {

				// 3. Validation: Check if the comment is empty (after trimming whitespace)
						if ((trim($_POST['com_comment'])== "")){
							$this->_arrData['arrError']['com_comment'] = "Vous devez remplir le champ commentaire pour laisser un avis";
						}
				// 4. Validation: Check if a rating has been selected
						if (empty($_POST['noteRating'])){
							$this->_arrData['arrError']['noteRating'] = "Vous devez notez le film pour laisser un avis";
						}
				/// 5. Final Verdict: If no errors were found, proceed with insertion
						if(count($this->_arrData['arrError'])===0) {
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
					} else{
						$this->_arrData['arrError'][] ="Vous devez être connecté pour pouvoir commenter !";
					}
				}

            $objMovieModel 	= new MovieModel;
			$arrMovie 		= $objMovieModel->findMovie($intId);

			if(!$arrMovie['mov_id']){
				header("Location:index.php?Ctrl=error&action=err404");
				exit;
			}

			$this->_arrData['objMovie']  = new MovieEntity('mov_');
			$this->_arrData['objMovie']->hydrate($arrMovie);

			$objPersonModel = new PersonModel;
			$arrPerson      = $objPersonModel->findAllPerson($intId);

			
			$this->_arrData['arrPersToDisplay'] = array();

			foreach($arrPerson as $arrDetPerson){
				$objPerson = new PersonEntity('pers_');
				$objPerson->hydrate($arrDetPerson);

				$this->_arrData['arrPersToDisplay'][]	= $objPerson;
			}

			$arrComment = $objCommentModel->commentOfMovie($intId);

			
			$this->_arrData['arrCommentToDisplay'] = array();

			foreach($arrComment as $arrDetComment){
				$objComment = new CommentEntity('com_');
				$objComment->hydrate($arrDetComment);

				$this->_arrData['arrCommentToDisplay'][]	= $objComment;
			}


            $this->_display($strPage = "movie",objContent: $objMovie, objAllPerson: $arrPersToDisplay, objComment: $arrCommentToDisplay, arrError: $arrError);
        }

        public function addMovie(){
            $this->_display($strPage = "addMovie");
        }

    }
