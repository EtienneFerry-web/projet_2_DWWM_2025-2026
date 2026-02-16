<?php
    require'entities/movie_entity.php';
    require'entities/comment_entity.php';
    require'entities/person_entity.php';
    require'models/movie_model.php';
    require'models/comment_model.php';
    require'models/person_model.php';
	require'models/user_model.php';

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

			$this->_arrData['arrMovieToDisplay'] = $arrMovieToDisplay;

            $this->_display("home");
        }

        public function list(){
            $objContentModel 	= new MovieModel;

            $objContentModel->producer  	= $_POST['producer']??"";
            $objContentModel->actor 	    = $_POST['actor']??"";
            $objContentModel->realisator 	= $_POST['realisator']??"";
            $objContentModel->categories  	= $_POST['categories']??"";
            $objContentModel->country     	= $_POST['country']??"";
            $objContentModel->date 			= $_POST['date']??"";
            $objContentModel->startdate  	= $_POST['startdate']??"";
            $objContentModel->enddate 	    = $_POST['enddate']??"";

            $objPersonModel 	   = new PersonModel;
            $arrActor              = $objPersonModel->findActor();
            $arrReal               = $objPersonModel->findReal();
            $arrProducer           = $objPersonModel->findProducer();

            $arrActorToDisplay = array();

            foreach($arrActor as $arrDetActor){
				$objContent = new PersonEntity('pers_');
				$objContent->hydrate($arrDetActor);

				$arrActorToDisplay[]	= $objContent;
			}


			$arrRealToDisplay	= array();

			foreach($arrReal as $arrDetReal){
				$objContent = new PersonEntity('pers_');
				$objContent->hydrate($arrDetReal);

				$arrRealToDisplay[]	= $objContent;
			}

			$arrProducerToDisplay	= array();

			foreach($arrProducer as $arrDetProducer){
				$objContent = new PersonEntity('pers_');
				$objContent->hydrate($arrDetProducer);

				$arrProducerToDisplay[]	= $objContent;
			}


			$arrMovie		    = $objContentModel->allMovie();
			$arrCountry         = $objContentModel->allCountry();
			$arrCategories      = $objContentModel->allCategories();


			$arrCategoriesToDisplay = array();

			foreach($arrCategories as $arrDetCategories){
				$objContent = new MovieEntity('mov_');
				$objContent->hydrate($arrDetCategories);

				$arrCategoriesToDisplay[]	= $objContent;
			}

			$arrCountryToDisplay = array();

			foreach($arrCountry as $arrDetCountry){
				$objContent = new MovieEntity('mov_');
				$objContent->hydrate($arrDetCountry);

				$arrCountryToDisplay[]	= $objContent;
			}


			$arrMovieToDisplay = array();

			foreach($arrMovie as $arrDetMovie){
				$objContent = new MovieEntity('mov_');
				$objContent->hydrate($arrDetMovie);

				$arrMovieToDisplay[]	= $objContent;
			}

			$this->_arrData['producer'] 	= $objContentModel->producer;
			$this->_arrData['actor'] 		= $objContentModel->actor;
			$this->_arrData['realisator']   = $objContentModel->realisator;
			$this->_arrData['categories']   = $objContentModel->categories;
			$this->_arrData['country'] 	    = $objContentModel->country;
			$this->_arrData['date'] 		= $objContentModel->date;
			$this->_arrData['startDate'] 	= $objContentModel->startdate;
			$this->_arrData['endDate'] 	    = $objContentModel->enddate;

			$this->_arrData['arrActorToDisplay'] 		= $arrActorToDisplay;
			$this->_arrData['arrRealToDisplay'] 		= $arrRealToDisplay;
			$this->_arrData['arrProducerToDisplay'] 	= $arrProducerToDisplay;
			$this->_arrData['arrCategoriesToDisplay'] 	= $arrCategoriesToDisplay;
			$this->_arrData['arrCountryToDisplay'] 		= $arrCountryToDisplay;
			$this->_arrData['arrMovieToDisplay'] 		= $arrMovieToDisplay;

            $this->_display("list");
        }



        public function movie(){
			$arrError = [];

			$objCommentModel	= new CommentModel;

			if(isset($_POST['likeMovieBtn'])){
				$objMovieModel = new MovieModel;

    			$repResult = $objMovieModel->LikeMovie($_SESSION['user']['user_id'], $_GET['id']);

				if ($repResult === 1) {
					$_SESSION['success'] = "Votre like a bien été pris en compte !";
				} else if($repResult === 2) {
					$_SESSION['success'] = "Votre like a bien été était supprimer !";
                }
		}
			if(isset($_POST['likeCommentBtn'])){



				$repResult = $objCommentModel->LikeComment($_SESSION['user']['user_id'], $_POST['likeCommentBtn']);


				if ($repResult === 1) {
					$_SESSION['success'] = "Votre like a bien été pris en compte !";
				} else if($repResult === 2) {
					$_SESSION['success'] = "Votre like a bien été était supprimer !";
                }

			}



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
							$arrError['com_comment'] = "Vous devez remplir le champ commentaire pour laisser un avis";
						}
				// 4. Validation: Check if a rating has been selected
						if (empty($_POST['rating'])){
							$arrError['noteRating'] = "Vous devez notez le film pour laisser un avis";
						}
				/// 5. Final Verdict: If no errors were found, proceed with insertion
						if(count($arrError)===0) {
				// Instantiate and hydrate the CommentEntity
							$objComment = new CommentEntity;
							$objComment->setComment($_POST['com_comment']);
							$objComment->setUser_id($_SESSION['user']['user_id']);
							$objComment->setRating($_POST['rating']);
							$objComment->setmovieId($_GET['id']);
				// Insert into DB and set success notification
							$comment = $objCommentModel->commentInsert($objComment);

							if(!$comment){
							    $arrError[] 	= "Echec de l'ajout du commentaire !";
							} elseif(isset($comment['error'])){
							    $arrError[] 	= $comment['error'];
							}else{
			                    $_SESSION['success'] 	= "Votre commentaire à bien etait publié";
							}


						}
					} else{
						$arrError[] ="Vous devez être connecté pour pouvoir commenter !";
					}
				}

			if(isset($_POST['spoiler']) && $_SESSION['user']['user_funct_id'] != 1){

			    if($objCommentModel->addSpoiler($_POST['spoiler'])){
					$_SESSION['success'] = "Spoiler Update !";
				}
			}

			if (isset($_POST['commentReport']) && $_POST['commentReport'] == 1) {

				$objComment = new CommentEntity;
				$objComment->hydrate($_POST);

				$repResult = $objCommentModel->reportComment($objComment, $_SESSION['user']['user_id']);

				if ($repResult === 1) {
					$_SESSION['success'] = "Le signalement a bien été envoyé !";
				} elseif ($repResult === 2) {
					$_SESSION['success'] = "Le signalement à bien était supprimer !";
				} else{
					$arrError[] = "Vous avez déjà signalé cet utilisateur !";
				}

			}

            $objMovieModel 	= new MovieModel;
			$movieId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

			$userId = isset($_SESSION['user']['user_id']) ? $_SESSION['user']['user_id'] : 0;

			$arrMovie = $objMovieModel->findMovie($movieId, $userId);

			if(!$arrMovie['mov_id']){
				header("Location:index.php?Ctrl=error&action=err404");
				exit;
			}

			$objMovie  = new MovieEntity('mov_');
			$objMovie->hydrate($arrMovie);

			$objPersonModel = new PersonModel;
			$arrPerson      = $objPersonModel->findAllPerson($_GET['id']);


			$arrPersToDisplay = array();

			foreach($arrPerson as $arrDetPerson){
				$objPerson = new PersonEntity('pers_');
				$objPerson->hydrate($arrDetPerson);

				$arrPersToDisplay[]	= $objPerson;
			}

			$arrComment = $objCommentModel->commentOfMovie($_GET['id'],$_SESSION['user']['user_id']??0);

			$arrCommentToDisplay = array();

			foreach($arrComment as $arrDetComment){
				$objComment = new CommentEntity('com_');
				$objComment->hydrate($arrDetComment);

				$arrCommentToDisplay[]	= $objComment;
			}

			$this->_arrData['arrError'] = $arrError;

			$this->_arrData['arrCommentToDisplay'] = $arrCommentToDisplay;
			$this->_arrData['arrPersToDisplay'] = $arrPersToDisplay;
			$this->_arrData['objMovie'] = $objMovie;

            $this->_display("movie");
        }

		/**
		* @author Audrey
		* Page d'ajout / edition d'un Film
		*/
        public function addEditMovie(){
			if (!isset($_SESSION['user'])){ // Pas d'utilisateur connecté
				header("Location:index.php?ctrl=error&action=error_403");
				exit;
			}
			// 1. Initialisation des objets et variables
			var_dump($_POST);
			var_dump($_GET);
			$objMovie = new MovieEntity('mov_');
			$objMovieModel = new MovieModel();
			
			
			if (isset($_GET['id'])){
				$arrMovie= [];
				$arrMovie = $objMovieModel->findOneMovie($_GET['id']);
				$objMovie->hydrate($arrMovie);
			}
			else
			{
				//si on est en ajout			
				$objMovie->hydrate($_POST);
			}
			
			$arrError = [];
			// 2. Validation des données
			if (count($_POST)>0){
				if (empty($objMovie->getTitle())) {
					$arrError['title'] = "Le titre est obligatoire";
				}
				if ($objMovie->getCategoriesId() == 0) {
					$arrError['categoriesId'] = "Le genre est obligatoire";
				}
				if ($objMovie->getCountryId() == 0) {
					$arrError['countryId'] = "Le pays d'origine est obligatoire";
				}
				if (empty($objMovie->getRelease_date())) {
					$arrError['countryId'] = "La durée est obligatoire";
				}
				if (empty($objMovie->getLength())) {
					$arrError['length'] = "La durée est obligatoire";
				}
				if (empty($objMovie->getDescription())) {
					$arrError['description'] = "Le synopsis est obligatoire";
				}
				if (empty($objMovie->getTrailer())) {
					$arrError['countryId'] = "La durée est obligatoire";
				}			
				if (empty($objMovie->getUrl())) {
				$arrError['photo'] = "L'affiche du film est obligatoire";
				}


				$arrTypeAllowed	= array('image/jpeg', 'image/png', 'image/webp');
				if ($_FILES['photo']['error'] != 4){ 
			
					if (!in_array($_FILES['photo']['type'], $arrTypeAllowed)){
					$arrError['photo'] = "Le type de fichier n'est pas autorisé";
				}else{					
					switch ($_FILES['photo']['error']){
						case 0 :
							$strImageName	= uniqid().".webp";
						// Récupère le nom de l'image avant changement
							$strOldImg	= $objMovie->getUrl();

							$objMovie->setUrl($strImageName);
							break;
					
						case 1 :
							$arrError['photo'] = "Le fichier est trop volumineux";
							break;
						case 2 :
							$arrError['photo'] = "Le fichier est trop volumineux";
							break;
						case 3 :
							$arrError['photo'] = "Le fichier a été partiellement téléchargé";
							break;
						case 6 :
							$arrError['photo'] = "Le répertoire temporaire est manquant";
							break;
						default :
							$arrError['photo'] = "Erreur sur l'image";
							break;
					}
				}

				// 3. Logique d'insertion
				
			}else{
				// Est-ce que le fichier existe ?
				if (is_null($objMovie->getUrl())){ 
					$arrError['img'] = "L'image est obligatoire";
				}
			}
			var_dump($_POST);
			// Si le formulaire est rempli correctement
			if (count($arrError) == 0){			
		
				if (is_null($objMovie->getId())){			
					$boolResultMovie = $objMovieModel->addMovie($objMovie);
				}else{
					$boolResultMovie = $objMovieModel->updateMovie($objMovie);
				}
				// Si aucune erreur, on tente l'insertion
				if ($boolResultMovie === true) {
					if (isset($strImageName)){
							// Création du chemin de destination
							$strDest    = $_ENV['IMG_PATH'].$strImageName;
							// Récupération de la source de l'image
							$strSource	= $_FILES['photo']['tmp_name'];							
						}
						if ($boolResultMovie === true){
						
							//suppression de l'ancienne image
							$strOldFile	= $_ENV['IMG_PATH'].$strOldImg;
							if (file_exists($strOldFile)){
								unlink($strOldFile);
							}
							
							if (is_null($objMovie->getId())){
								$_SESSION['success'] 	= "Le film a bien été créé";
								header("Location:index.php?");
							exit;
							}else{
								$_SESSION['success'] 	= "Le film a bien été modifié";
								header("Location:index.php?ctrl=admin&action=allMovie");
							exit;
							}							
						}else{
							$arrError['img'] = "Erreur dans le traitement de l'image";
						}
					}else{
						$arrError[] = "Erreur lors de l'ajout";
					}
				}
			}
			
			$arrCategory = $objMovieModel->allCategories();
				$arrCatToDisplay	= array();

		
			$arrCatToDisplay = array();
			foreach($arrCategory as $arrDetCat){
				$objContent = new MovieEntity('mov_');
				$objContent->hydrate($arrDetCat);

				$arrCatToDisplay[]	= $objContent;
			}

			$arrNationality = $objMovieModel->allCountry();
			$arrNatToDisplay	= array();

			$arrNatToDisplay = array();
			foreach($arrNationality as $arrDetNat){
				$objNat = new MovieEntity('mov_');
				$objNat->hydrate($arrDetNat);

				$arrNatToDisplay[]	= $objNat;
			}


			// 4. Si on arrive ici (erreur de saisie ou échec SQL), on réaffiche le formulaire
			// On passe $objMovie pour que les champs restent remplis (UX)
			$this->_arrData['objMovie']		   = $objMovie;
			$this->_arrData['arrError']		   = $arrError;
			$this->_arrData['arrCatToDisplay'] = $arrCatToDisplay;
			$this->_arrData['arrNatToDisplay'] = $arrNatToDisplay;


            $this->_display("addEditMovie");
        }

		public function deleteMovie() {

           if (isset($_SESSION['user']) && $_SESSION['user']['user_funct_id'] != 2 && $_SESSION['user']['user_funct_id'] != 3){ // s'il est pas admin ou modo
				header("Location:index.php?ctrl=error&action=err403");
				exit;
			}
            $objMovieModel = new MovieModel();
            $success = $objMovieModel->deleteMovie($_GET['id']);

            // Si on a supprimé, on nettoie tout
            if($success){

                $_SESSION['success'] = "Le film a bien été supprimé";
                header("Location:index.php?ctrl=admin&action=dashboard");
                exit;

            }


		}

    }
