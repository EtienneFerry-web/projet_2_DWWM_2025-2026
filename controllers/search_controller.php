<?php
    
    require'dto/search_dto.php';
    require'models/search_model.php';

    /**
     * @author Marco Schmitt
     * 16/01/2026
     * Version 0.1
     */

    class SearchCtrl extends MotherCtrl{

        public function searchPage(){

            if(isset($_POST['search']) && !empty(trim($_POST['search']))){

                $objSearch = new SearchDto();
                $objSearch->setSearch($_POST['search']);
                
                $searchBy = $_POST['searchBy']??0;

                $objSearchModel 	= new SearchModel;
    			$arrResult		    = $objSearchModel->searchContent($objSearch, $searchBy);



    			$arrResultToDisplay	= array();

    			foreach($arrResult as $arrDeResult){
    				$objContent = new SearchDto('sear_');
    				$objContent->hydrate($arrDeResult);

    				$arrResultToDisplay[]	= $objContent;
    				}
            } else {
                header("Location: index.php");
                exit();
            }

            $this->_arrData['arrResultToDisplay']	= $arrResultToDisplay;
            $this->_arrData['arrSearch']	        = $objSearch;

            $this->_display($strPage = "resultSearch");
        }

    }
