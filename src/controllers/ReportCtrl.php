<?php
    namespace App\Controllers;

    //Entities
    use App\Entities\ReportEntity;
    //models
    use App\Models\ReportModel;
    use App\Models\CommentModel;


    // require'models/report_model.php';
    // require'models/comment_model.php';
    // require'entities/report_entity.php';


    class ReportCtrl extends MotherCtrl{

        public function allReport(){

            if (!isset($_SESSION['user']) && $_SESSION['user']['user_funct_id'] == 1){
				header("Location:index.php?ctrl=error&action=err403");
				exit;
			}

			if (isset($_POST['deleteComment']) && isset($_SESSION['user'])) {
                $objComment->setId((int)$_POST['deleteComment']);
                $objComment->setUser_id($_SESSION['user']['user_id']);

                $result = $objCommentModel->deleteComment($objComment);

                if ($result) {
                    $_SESSION['success'] = "Le commentaire à bien était supprimer !";
                } else {
                    $arrError[] = "erreur lors de la suppression veulliez réssayer !";
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
