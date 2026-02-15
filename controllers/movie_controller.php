<?php
    require'entities/movie_entity.php';
    require'entities/report_entity.php';
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
			$objMovieModel = new MovieModel;

			if(isset($_POST['likeMovieBtn'])){


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
						// Vérification des codes d'erreur
						switch ($_FILES['images']['error']){
							case 0 :
								// Renommage de l'image
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


					$boolInsert = $objMovieModel->addImageOfMovies($strImageName, $_GET['id'], $_SESSION['user']['user_id']);

					if($boolInsert){
    					 $strDest = 'assets/img/movie/' . $strImageName;

                        if(move_uploaded_file($_FILES['images']['tmp_name'], $strDest)){
                        $this->_resize($strDest, 400, 400);

                        $_SESSION['success'] = "ajoute de l'image";

                    } else {
                        $arrError['photo'] = "Erreur lors du téléchargement";
                    }
					}
				}
			}



			/**
			 * @author Etienne
			 *
			 */
				// 1. Check if the form has been submitted
				if(!empty($_POST) && isset($_POST['com_comment']) ) {

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

        public function addMovie(){
			// 1. Initialisation des objets et variables
			$objMovie = new MovieEntity();
			$objMovie->hydrate($_POST); // On remplit l'objet avec ce que l'utilisateur a tapé
			$objMovieModel = new MovieModel();

			$arrError = [];

			// 2. Validation des données
			if (count($_POST)>0){
				if (empty($objMovie->getTitle())) {
					$arrError['title'] = "Le titre est obligatoire";
				}
				// if (empty($objMovie->getCategorieId())) {
				// 	$arrError['categorie'] = "La catégorie est obligatoire";
				// }
				if (empty($objMovie->getLength())) {
					$arrError['length'] = "La durée est obligatoire";
				}
				if (empty($objMovie->getDescription())) {
					$arrError['description'] = "Le synopsis est obligatoire";
				}
				// if (empty($objMovie->getphoto())) {
				// 	$arrError['photo'] = "L'affiche du film est obligatoire";
				// }


				$arrTypeAllowed	= array('image/jpeg', 'image/png');
				if ($_FILES['photo']['error'] == 4){ // Est-ce que le fichier existe ?
					$arrError['photo'] = "L'image est obligatoire";
				}else if (!in_array($_FILES['photo']['type'], $arrTypeAllowed)){
					$arrError['photo'] = "Le type de fichier n'est pas autorisé";
				}


				if (count($arrError) == 0) {
				$strImageName	= uniqid();
					switch ($_FILES['photo']['type']){
						case 'image/jpeg' :
							$strImageName .= '.jpg';
							break;
						case 'image/png' :
							$strImageName .= '.png';
							break;
					}
                     $strDest = 'assets/img/movie/' . $strImageName;

                    if(move_uploaded_file($_FILES['photo']['tmp_name'], $strDest)){
                        $objMovie->setphoto($strImageName);
                    } else {
                        $arrError['photo'] = "Erreur lors du téléchargement";
                    }

				$boolResultMovie = $objMovieModel->addMovie($objMovie);

					if ($boolResultMovie) {
						$_SESSION['success'] = "Le film a été soumis avec succès !";
						header("Location: index.php");
						exit;
					} else {
						$arrError['global'] = "Erreur lors de l'enregistrement en base de données.";
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

			$this->_arrData['objMovie']		   = $objMovie;
			$this->_arrData['arrError']		   = $arrError;
			$this->_arrData['arrCatToDisplay'] = $arrCatToDisplay;
			$this->_arrData['arrNatToDisplay'] = $arrNatToDisplay;


            $this->_display("addMovie");
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

		public function allMovie(){
			if (!isset($_SESSION['user']) && $_SESSION['user']['user_funct_id'] != 2 && $_SESSION['user']['user_funct_id'] != 3){ // Pas d'utilisateur connecté
				header("Location:index.php?ctrl=error&action=err403");
				exit;
			}

			$objMovieModel 	= new MovieModel;
			$arrMovie   	= $objMovieModel->findAllMovies();

			// Initialisation d'un tableau => objets
			$arrMovieToDisplay	= array();

			// Boucle de transformation du tableau de tableau en tableau d'objets
			foreach($arrMovie as $arrDetMovie){
				$objMovie = new MovieEntity("mov_");
				$objMovie->hydrate($arrDetMovie);

				$arrMovieToDisplay[]	= $objMovie;
			}

			$this->_arrData['arrMovieToDisplay']	    = $arrMovieToDisplay;

			$this->_display("allMovie");
		}

    }
