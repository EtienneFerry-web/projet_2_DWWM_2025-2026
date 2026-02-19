<?php
    namespace App\Controllers;

    //Entities
    use App\Entities\ReportEntity;
    use App\Entities\CommentEntity;
    //models
    use App\Models\ReportModel;
    use App\Models\CommentModel;
    use App\Models\UserModel;

    /**
    * Reports
    * @author Marco
    * @todo Faire la rq du ban(Faire Procedure avec historique des ban + trigger) et merge les edit movie et user
    */

    class ReportCtrl extends MotherCtrl{

        public function allReport(){
            $this->_checkAccess(2);

            $objCommentModel = new CommentModel;
            $objReportModel = new ReportModel;
            $objUserModel = new UserModel;
            $objComment = new CommentEntity;
            
			//Add spoiler on comment
			if(isset($_POST['addRemoveSpoiler'])){

			    if($objCommentModel->addSpoiler($_POST['addRemoveSpoiler'])){
					$_SESSION['success'] = "Spoiler Update !";
				}
			}
			
			//Delete Comment
			if (isset($_POST['deleteComment'])) {
			
                $objComment->setId((int)$_POST['deleteComment']);
                $objComment->setUser_id($_SESSION['user']['user_id']);

                $result = $objCommentModel->deleteComment($objComment);

                if ($result) {
                    $_SESSION['success'] = "Le commentaire à bien était supprimer !";
                } else {
                    $arrError[] = "erreur lors de la suppression veulliez réssayer !";
                }
            }
            
            //Delete Reports
            if (isset($_POST['deleteRep'])){
                
                $boolResult = $objReportModel->deleteReport($_POST['deleteRep']);
                
                if($boolResult){
                    $_SESSION['success'] = "Le reports à bien était supprimer !";
                } else{
                    $arrError[] = "erreur lors de la tentative de suppression !";
                }
            }
            
            //User ban
            if (isset($_POST['userBan'])){
            
                $boolResult = $objUserModel->banUser($_POST['userBan']));
                
                if($boolResult){
                    $_SESSION['success'] = "L'utilisateur a était banni !";
                } else{
                    $arrError[] = "erreur lors de la tentative de suppression !";
                }
            }



            $objReportModel = new ReportModel;

            $arrUserRep     = $objReportModel->allUserReport();
            $arrComRep      = $objReportModel->allCommentReport();
            $arrMovieRep    = $objReportModel->allMovieReport();

            $arrRepUserToDisplay	= array();

 			foreach($arrUserRep as $arrDeReport){
				$objContent = new ReportEntity;
				$objContent->hydrate($arrDeReport);

				$arrRepUserToDisplay[]	= $objContent;
 			}

            $arrRepComToDisplay	= array();

 			foreach($arrComRep as $arrDeReport){
				$objContent = new ReportEntity;
				$objContent->hydrate($arrDeReport);

				$arrRepComToDisplay[]	= $objContent;
      		}

            $arrRepMovieToDisplay	= array();

 			foreach($arrMovieRep as $arrDeReport){
				$objContent = new ReportEntity;
				$objContent->hydrate($arrDeReport);

				$arrRepMovieToDisplay[]	= $objContent;
       	    }

            $this->_arrData['arrRepMovieToDisplay'] = $arrRepMovieToDisplay;
            $this->_arrData['arrRepComToDisplay'] = $arrRepComToDisplay;
            $this->_arrData['arrRepUserToDisplay'] = $arrRepUserToDisplay;

            $this->_display("allReport");
        }

    }
