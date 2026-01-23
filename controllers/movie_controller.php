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
		
		/**
	* @todo select sur les producteur realisateur et acteurs(ajout auto si n'existepas)
	*/
	//Récupérer les informations du Formulaire
		public function AddMovie() {
			var_dump($_POST);
			$strTitle 				= $_POST['title']??'';
			$intCategory			= $_POST5['category']??0;
			$strOriginalTitle		= $_POST['original_title']??'';
			$strLength				= $_POST['length']??'';
			$strDescription			= $_POST['description']??'';
			$strReleaseDate			= $_POST['release_date']??'';
			$strCharacterName		= $_POST['characterName']??'';
			$strUrl					= $_POST['url']??'';
			$strActorName			= $_POST['actorName']??'';
			$strActorFirstname		= $_POST['actorFirstame']??'';
			$strCharacterName		= $_POST['characterName']??'';


			$objMovie	= new MovieEntity;
			$objPerson = new PersonEntity;
			$objPerson->hydrate($_POST);
			$objMovie->hydrate($_POST);
			
			$objMovieModel = new MovieModel;
			$arrCategory = $objMovieModel->findAllCategories();
			
			if (count($_POST) > 0) {
				if ($objMovie->getTitle() == ""){
					$arrError['title'] = "Le titre est obligatoire";
				}	
				if ($objMovie->getLength() == ""){
					$arrError['length'] = "La durée est obligatoire";
				}	
				if ($objMovie->getDescription() == ""){
					$arrError['description'] = "La description est obligatoire";
				}
				if ($objMovie->getCreatedate() ==""){
					$arrError['release_date'] = "La date de sortie est obligatoire";
				}	
			}
			// Si le formulaire est rempli correctement
			if (count($arrError) == 0){
				// => Ajout dans la base de données 
				$objNewMovie	= new MovieModel;
				$boolInsert 	= $objNewMovie->insert($objMovie);
				if ($boolInsert === true){
					$_SESSION['success'] 	= "Le film a été soumis au modérateur";
				header("Location:index.php");
                exit;
				}else{
					$arrError[] = "Erreur lors de l'ajout";
				}	
			}
			
			var_dump($intCategory);
			var_dump($objMovieModel);
			var_dump($objPerson);
			
		}
	}