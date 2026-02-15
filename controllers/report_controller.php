<?php
    require'models/report_model.php';
    require'entities/report_entity.php';


    class ReportCtrl extends MotherCtrl{

        public function allReport(){

            if (!isset($_SESSION['user']) && $_SESSION['user']['user_funct_id'] == 1){
				header("Location:index.php?ctrl=error&action=err403");
				exit;
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


            var_dump($arrRepMovieToDisplay);
            var_dump($arrMovieRep);


            $this->_arrData['arrRepMovieToDisplay'] = $arrRepMovieToDisplay;
            $this->_arrData['arrRepComToDisplay'] = $arrRepComToDisplay;
            $this->_arrData['arrRepUserToDisplay'] = $arrRepUserToDisplay;

            $this->_display("allReport");
        }

    }
