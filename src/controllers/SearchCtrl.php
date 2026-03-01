<?php
    namespace App\Controllers;

    use App\Dto\SearchDto;
    use App\Models\SearchModel;

    /**
     * @author Marco Schmitt
     * 27/02/2026
     * Version 1
     */

    class SearchCtrl extends MotherCtrl{

        /**
        * AJAX endpoint for search autocompletion
        * @return void encodes search suggestions as a JSON array for real-time frontend display
        */

        public function autoComplete(){

            header('Content-Type: application/json');
            $keywords = file_get_contents("php://input");
			$data = json_decode($keywords, true);

            $objSearch = new SearchDto();
            $objSearch->setSearch($data['keywords']);

            $objSearchModel 	= new SearchModel;
			$arrResult		    = $objSearchModel->searchContent($objSearch, 10, 0);

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

        /**
        * Search results page
        * @return void processes search criteria, fetches matching content, and displays results
        */

        public function searchPage(){

            if(isset($_GET['search']) && !empty(trim($_GET['search']))){

                $objSearch = new SearchDto();
                $objSearch->setSearch($_GET['search']);

                $searchBy = $_GET['searchBy']??0;

                $objSearchModel 	= new SearchModel;
    			$arrResult		    = $objSearchModel->searchContent($objSearch, 20, $searchBy);

    			$arrResultToDisplay	= array();

    			foreach($arrResult as $arrDeResult){
    				$objContent = new SearchDto('sear_');
    				$objContent->hydrate($arrDeResult);

    				$arrResultToDisplay[]	= $objContent;
    				}

            } else {
                $this->_redirect();
            }

            $this->_arrData['arrResultToDisplay']	= $arrResultToDisplay;
            $this->_arrData['arrSearch']	        = $objSearch;

            $this->_display("resultSearch");
        }

    }
