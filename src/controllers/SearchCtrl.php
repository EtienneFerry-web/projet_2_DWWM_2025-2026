<?php
    namespace App\Controllers;

    use App\Dto\SearchDto;
    use App\Models\SearchModel;

    /**
     * @author Marco Schmitt
     * 16/01/2026
     * Version 0.1
     */

    class SearchCtrl extends MotherCtrl{

        public function autoComplete(){

            header('Content-Type: application/json');
            $keywords = file_get_contents("php://input");
			$data = json_decode($keywords, true);

            $objSearch = new SearchDto();
            $objSearch->setSearch($data['keywords']);

            $objSearchModel 	= new SearchModel;
			$arrResult		    = $objSearchModel->searchContent($objSearch, 0, 10);

            $arrResultToDisplay	= array();

 			foreach($arrResult as $arrDeResult){
    				$objContent = new SearchDto('sear_');
    				$objContent->hydrate($arrDeResult);

    				$arrResultToDisplay[]	= $objContent;
 			}

            $arrSearchResultToDisplay = [];

            foreach($arrResultToDisplay as $arrDeResult){

                $index = [
                    'type' => $arrDeResult->getType(),
                    'label' => $arrDeResult->getName(),
                ];

                $arrSearchResultToDisplay[] = $index;

 			}

            echo json_encode($arrSearchResultToDisplay);
        }

        public function searchPage(){

            if(isset($_POST['search']) && !empty(trim($_POST['search']))){

                $objSearch = new SearchDto();
                $objSearch->setSearch($_POST['search']);

                $searchBy = $_POST['searchBy']??0;

                $objSearchModel 	= new SearchModel;
    			$arrResult		    = $objSearchModel->searchContent($objSearch, $searchBy, 20);

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

            $this->_display("resultSearch");
        }

    }
