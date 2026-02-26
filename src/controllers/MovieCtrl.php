<?php
    namespace App\Controllers;

    // Modèles
    use App\Models\MovieModel;
    use App\Models\CommentModel;
    use App\Models\PersonModel;
    use App\Models\UserModel;
    // Entités
    use App\Entities\MovieEntity;
    use App\Entities\ReportEntity;
    use App\Entities\CommentEntity;
    use App\Entities\PersonEntity;

    /**
     * @author Marco Schmitt
     * 16/01/2026
     * Version 0.1
     */

    class MovieCtrl extends MotherCtrl{

		/**
        * Main home page of the application
        * @return void retrieves the latest movies and displays the homepage view
        */

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

		/**
        * Filtering and displaying the movie list
        * @return void handles search filters and hydrates entities for actors, directors, producers, and movies
        */

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

        public function note(){

            $objMovieModel = new MovieModel;

            header('Content-Type: application/json');
            $intNoteJson = file_get_contents("php://input");
			$data = json_decode($intNoteJson, true);

		    $insetResult = $objMovieModel->insertUpdateNote($_SESSION['user']['user_id'], $_GET['id'], $data['intNote']);


			if($insetResult){
			    echo json_encode($insetResult);
				exit;
			}   else{
  		        echo json_encode("ca marche pas");
                exit;
			}
        }


		/**
        * Single movie details page
        * @return void manages ratings, likes, comments, reports, and image uploads for a specific movie
        */

        public function moviePage(){
			$arrError = [];

			$objCommentModel	= new CommentModel;
			$objMovieModel = new MovieModel;

			if (isset($_POST['deleteComment']) && isset($_SESSION['user'])) {
			    $objCommentDelete = new CommentEntity('com_');
                $objCommentDelete->setId((int)$_POST['deleteComment']);
                $objCommentDelete->setUser_id($_SESSION['user']['user_id']);

                $result = $objCommentModel->deleteComment($objCommentDelete);

                if ($result) {
                    $_SESSION['success'] = "Le commentaire à bien était supprimer !";
                } else {
                    $arrError[] = "erreur lors de la suppression veulliez réssayer !";
                }
            }

            if(isset($_POST['deleteNoteUser'])){
                $repResult = $objMovieModel->deleteNoteUser($_SESSION['user']['user_id'], $_GET['id']);

                if ($repResult) {
                    $_SESSION['success'] = "La note à bien était supprimer !";
                } else {
                    $arrError[] = "Erreur lors de la suppression, si vous avez un review vous devez la supprimer pour pouvoir supprimer la note !";
                }
            }



			if (isset($_POST['deleteComment']) && isset($_SESSION['user'])) {
			    $objCommentDelete = new CommentEntity('com_');
                $objCommentDelete->setId((int)$_POST['deleteComment']);
                $objCommentDelete->setUser_id($_SESSION['user']['user_id']);

                $result = $objCommentModel->deleteComment($objCommentDelete);

                if ($result) {
                    $_SESSION['success'] = "Le commentaire à bien était supprimer !";
					$this->_selfRedirect();
                } else {
                    $arrError[] = "erreur lors de la suppression veulliez réssayer !";
                }
            }

			if(isset($_POST['likeMovieBtn']) && (isset($_SESSION['user']))){

				$repResult = $objMovieModel->likeMovie($_SESSION['user']['user_id'], $_GET['id']);

				if ($repResult === 1) {
					$_SESSION['success'] = "Votre like a bien été pris en compte !";
					$this->_selfRedirect();
				} else if($repResult === 2) {
					$_SESSION['success'] = "Votre like a bien été était supprimer !";
					$this->_selfRedirect();
				}

				}elseif(!isset($_SESSION['user'])&& isset($_POST['likeMovieBtn'])){
					$arrError[''] = "Vous devez etre connecté pour liker un film";
				}

				if(isset($_POST['likeCommentBtn'])&&(isset($_SESSION['user']))){

					$repResult = $objCommentModel->LikeComment($_SESSION['user']['user_id'], $_POST['likeCommentBtn']);

					if ($repResult === 1) {
						$_SESSION['success'] = "Votre like a bien été pris en compte !";
						$this->_selfRedirect();
					} else if($repResult === 2) {
						$_SESSION['success'] = "Votre like a bien été était supprimer !";
						$this->_selfRedirect();
					}

    			}elseif(isset($_POST['likeMovieBtn']) && !isset($_SESSION['user'])){
    				$arrError[''] = "Vous devez etre connecté pour liker un commentaire";
    			}

    			if (isset($_POST['repMovie']) && $_POST['repMovie'] != '' && isset($_SESSION['user']['user_id'])) {

                $arrData = array_merge([
                    'reported_movie_id' => $_GET['id'],
                    'reporter_user_id'  => $_SESSION['user']['user_id'],
                    'rep_reason' => $_POST['repMovie']
                ]);

			    $objReport = new ReportEntity;
				$objReport->hydrate($arrData);

                $repResult = $objMovieModel->reportMovie($objReport);

                if ($repResult) {
                    $_SESSION['success'] = "Le signalement a bien été envoyé !";
					$this->_selfRedirect();
                }  else {
                    $arrError[] = "erreur";
                }

            } elseif(isset($_POST['repDelete']) && $_POST['repDelete'] == 'delete'){

                $arrData = array_merge([
                    'reported_movie_id' => $_GET['id'],
                    'reporter_user_id'  => $_SESSION['user']['user_id'],
                ]);
                $objReport = new ReportEntity;
				$objReport->hydrate($arrData);

				$repResult = $objMovieModel->deleteRepMovie($objReport);

                if ($repResult) {
                    $_SESSION['success'] = "Votre signalement a bien était supprimer ! !";
                }  else {
                    $arrError[] = "erreur";
                }
            }

			if(isset($_FILES['images'])){
                $arrTypeAllowed	= array('image/jpeg', 'image/png', 'image/webp');
				if ($_FILES['images']['error'] != 4){
					if (!in_array($_FILES['images']['type'], $arrTypeAllowed)){
						$arrError['images'] = "Le type de fichier n'est pas autorisé";
					}else{

						switch ($_FILES['images']['error']){
							case 0 :

								$strImageName	= uniqid();

								switch ($_FILES['images']['type']){
									case 'image/jpeg' :
										$strImageName .= '.jpg';
										break;
									case 'image/png' :
										$strImageName .= '.png';
										break;
									case 'image/webp' :
										$strImageName .= '.webp';
										break;
								}

								break;
							case 1 :
								$arrError['img'] = "Le fichier est trop volumineux";
								break;
							case 2 :
								$arrError['img'] = "Le fichier est trop volumineux";
								break;
							case 3 :
								$arrError['img'] = "Le fichier a été partiellement téléchargé";
								break;
							case 6 :
								$arrError['img'] = "Le répertoire temporaire est manquant";
								break;
							default :
								$arrError['img'] = "Erreur sur l'image";
								break;
						}
					}

				}else{
					$arrError['img'] = "L'image est obligatoire";
				}

				if(count($arrError) == 0){

                    $resultInsert = $objMovieModel->addImageOfMovies($strImageName, $_GET['id'], $_SESSION['user']['user_id']);

                    if($resultInsert['success']){

                        if(!empty($resultInsert['oldImg']) && file_exists('assets/img/movie/'. $resultInsert['oldImg'])){
                            unlink('assets/img/movie/' . $resultInsert['oldImg']);
                        }

                        $strDest = 'assets/img/movie/' . $strImageName;

                        if(move_uploaded_file($_FILES['images']['tmp_name'], $strDest)){
                            $this->_resize($strDest, 400, 400, true);

                            $_SESSION['success'] = "ajoute de l'image";
                        } else {
                            $arrError['photo'] = "Erreur lors du téléchargement";
                        }
                    }
                }
			}

				if(!empty($_POST) && isset($_POST['com_comment']) ) {

					if(isset($_SESSION['user'])) {


						if ((trim($_POST['com_comment'])== "")){
							$arrError['com_comment'] = "Vous devez remplir le champ commentaire pour laisser un avis";
						}
				
						if (empty($_POST['rating'])){
							$arrError['noteRating'] = "Vous devez notez le film pour laisser un avis";
						}

						if(count($arrError)===0) {

							$objComment = new CommentEntity;
							$objComment->setComment($_POST['com_comment']);
							$objComment->setUser_id($_SESSION['user']['user_id']);
							$objComment->setRating($_POST['rating']);
							$objComment->setmovieId($_GET['id']);

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

			if (isset($_POST['commentReport']) && $_POST['commentReport'] != '' && isset($_SESSION['user']['user_id'])) {
                $objReport = new ReportEntity;
                $objReport->setReason($_POST['commentReport']);
                $objReport->setReported_com_id($_POST['commentReportId']);

                $repResult = $objCommentModel->reportComment($objReport, $_SESSION['user']['user_id']);

                if ($repResult) {
                    $_SESSION['success'] = "Le signalement a bien été envoyé !";
                    header("Location: index.php?ctrl=movie&action=movie&id=" . $_GET['id']);
                    exit;
                }  else {
                    $arrError[] = "erreur";
                }
            }   elseif(isset($_POST['repComDelete']) && $_POST['repComDelete'] != ''){

                    $objReport = new ReportEntity;
    				$objReport->setReported_com_id($_POST['repComDelete']);

    				$repResult = $objCommentModel->deleteRepCom($objReport, $_SESSION['user']['user_id']);

                    if ($repResult) {
                        $_SESSION['success'] = "Votre signalement a bien était supprimer ! !";
                    }  else {
                        $arrError[] = "erreur";
                    }
            }

            $objMovieModel 	= new MovieModel;

			$arrMovie = $objMovieModel->findMovie($_GET['id'], $_SESSION['user']['user_id']??0);
			$arrMovieImages = $objMovieModel->selectImageMovie($_GET['id']);

			if(!$arrMovie['mov_id']){
				header("Location:index.php?Ctrl=error&action=err404");
				exit;
			}

			$arrImagesToDisplay = array();

			foreach($arrMovieImages as $arrDetImage){
				$objMovie = new MovieEntity('mov_');
				$objMovie->hydrate($arrDetImage);

				$arrImagesToDisplay[]	= $objMovie;
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
			$this->_arrData['arrImagesToDisplay'] = $arrImagesToDisplay;
			$this->_arrData['objMovie'] = $objMovie;

            $this->_display("movie");
        }

		/**
        * Adding a new movie to the catalog
        * @return void handles form validation, file upload, and database insertion
        */

        public function addEditMovie(){

			$objMovie = new MovieEntity('mov_');
			$objMovie->hydrate($_POST); 
			$objMovieModel = new MovieModel();

			if (isset($_GET['id'])){
				$arrMovie= [];
				$arrMovie = $objMovieModel->findOneMovie($_GET['id']);
				$objMovie->hydrate($arrMovie);
			}

			$arrError = [];
			// 2. Data validation
			if (count($_POST)>0){

				// if (!$this->_verifyCsrfToken($_POST['crsf_token'])){
				// 	header("Location:index.php?ctrl=error&action=err403");
				// 	exit;					
				// }
				

				if (empty($objMovie->getTitle())) {
					$arrError['title'] = "Le titre est obligatoire";
				}
				if ($objMovie->getCategoriesId() == 0) {
					$arrError['categoriesId'] = "Le genre est obligatoire";
				}
				if ($objMovie->getCountryId() == 0) {
					$arrError['countryId'] = "Le pays d'origine est obligatoire";
				}
				if ($objMovie->getRelease_date() == '') {
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

				$objMovie->hydrate($_POST);

				$arrTypeAllowed	= array('image/jpeg', 'image/png', 'image/webp');
				if ($_FILES['photo']['error'] != 4){

					if (!in_array($_FILES['photo']['type'], $arrTypeAllowed)){
					$arrError['photo'] = "Le type de fichier n'est pas autorisé";
				}else{
					switch ($_FILES['photo']['error']){
						case 0 :
							$strImageName	= uniqid().".webp";
						//Getting the original image name
							$strOldImg	= $objMovie->getPhoto();

							$objMovie->setPhoto($strImageName);
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

			}elseif(!isset($_GET['id'])){

				// Est-ce que le fichier existe ?
				if (is_null($objMovie->getPhoto())){
					$arrError['img'] = "L'image est obligatoire";
				}
			}

			// If the form is correctly completed
			if (count($arrError) == 0){

				if (!isset($_GET['id'])){
					$boolResultMovie = $objMovieModel->addMovie($objMovie);
				}else{
					$boolResultMovie = $objMovieModel->updateMovie($objMovie);
				}
				// If no errors, attempting the insertion
				if ($boolResultMovie === true) {
					if (isset($strImageName)){
							// Setting the destination path
							$strDest    = $_ENV['IMG_PATH'].$strImageName;
							// Fetching the source file path
							$strSource	= $_FILES['photo']['tmp_name'];
						}
						if ($boolResultMovie === true){

							//Removing the old image
							$strOldFile	= $_ENV['IMG_PATH'].$strOldImg;

							if (move_uploaded_file($_FILES['photo']['tmp_name'], $strDest)) {
								if (!empty($strOldImg)) {
									$strOldFile = $_ENV['IMG_PATH'] . $strOldImg;
									if (file_exists($strOldFile)) {
										unlink($strOldFile);
									}
								}
								$this->_resize($strDest,280, 450, true);
							}


							if (is_null($objMovie->getId())){
								$_SESSION['success'] 	= "Le film a bien été créé";
								//header("Location:index.php?");
							exit;
							}else{
								$_SESSION['success'] 	= "Le film a bien été modifié";
								//header("Location:index.php?ctrl=movie&action=allMovie");
							//exit;
							}
						}else{
							$arrError['img'] = "Erreur dans le traitement de l'image";
						}
					}else{
						$arrError[] = "Erreur lors de l'ajout";
					}
				}
			}
			
			// Loading categories for the select input
			$arrCategory = $objMovieModel->allCategories();
				$arrCatToDisplay	= array();

			$arrCatToDisplay = array();
			foreach($arrCategory as $arrDetCat){
				$objContent = new MovieEntity('mov_');
				$objContent->hydrate($arrDetCat);

				$arrCatToDisplay[]	= $objContent;
			}
			
			// Loading nationalites for the select input
			$arrNationality = $objMovieModel->allCountry();
			$arrNatToDisplay	= array();

			$arrNatToDisplay = array();
			foreach($arrNationality as $arrDetNat){
				$objNat = new MovieEntity('mov_');
				$objNat->hydrate($arrDetNat);

				$arrNatToDisplay[]	= $objNat;
			}
			//$this->_arrData['form_token']	= $this->_generateCsrfToken();
			$this->_arrData['objMovie']		   = $objMovie;
			$this->_arrData['arrError']		   = $arrError;
			$this->_arrData['arrCatToDisplay'] = $arrCatToDisplay;
			$this->_arrData['arrNatToDisplay'] = $arrNatToDisplay;

            $this->_display("addEditMovie");
        }

		/**
        * Deleting a movie from the database
        * @return void redirects to the dashboard with a success message upon deletion
        */

		public function deleteMovie() {
			//Permission control
           if (isset($_SESSION['user']) && $_SESSION['user']['user_funct_id'] != 2 && $_SESSION['user']['user_funct_id'] != 3){ // just administrator and moderator can delete a movie
				header("Location:index.php?ctrl=error&action=err403");
				exit;
			}
            $objMovieModel = new MovieModel();
            $success = $objMovieModel->deleteMovie($_GET['id']);

            if($success){

                $_SESSION['success'] = "Le film a bien été supprimé";
                header("Location:index.php?ctrl=movie&action=allMovie");
                exit;

            }

		}

		/**
        * Management page for all movies
        * @return void retrieves all movies from the database and displays the administration list
        */

		public function allMovie(){
			$search = $_GET['search'] ?? NULL;
            $filter = $_GET['filter'] ?? '0';
			$sort   = $_GET['sort'] ?? 'ASC';
			
			// Check if user is authenticated and has correct permission
			if (!isset($_SESSION['user']) && $_SESSION['user']['user_funct_id'] != 2 && $_SESSION['user']['user_funct_id'] != 3){ // Pas d'utilisateur connecté
				header("Location:index.php?ctrl=error&action=err403");
				exit;
			}
			
			// Initialize model and fetch movies based on filters
			$objMovieModel 	= new MovieModel;
			$arrMovie   	= $objMovieModel->findMovieWithFilters($search, $filter,$sort);

			
			$arrMovieToDisplay	= array();

			// Converting the multidimensional array into an object array for the list of Movie
			foreach($arrMovie as $arrDetMovie){
				$objMovie = new MovieEntity("mov_");
				$objMovie->hydrate($arrDetMovie);

				$arrMovieToDisplay[]= $objMovie;
			}

			// Loading categories for the select input
			$arrCategory 		= $objMovieModel->allCategories();
			$arrCatToDisplay	= array();

			foreach($arrCategory as $arrDetCat){
				$objContent = new MovieEntity('mov_');
				$objContent->hydrate($arrDetCat);

				$arrCatToDisplay[]	= $objContent;
			}

			$this->_arrData['arrMovieToDisplay']	= $arrMovieToDisplay;
			$this->_arrData['arrCatToDisplay']	    = $arrCatToDisplay;
            $this->_arrData['search']               = $search;
            $this->_arrData['filter']               = $filter;
			$this->_arrData['sort']                 = $sort;

			$this->_display("allMovie");
		}

    }
