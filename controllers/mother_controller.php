<?php

/**
 * @author Marco Schmitt
 * 16/01/2026
 * Version 0.1
 * @todo Peut être utilisé extract etc ob_start(); puis $content = ob_get_clean(); et l'echo echo $content;
 */


class MotherCtrl{

    protected array $_arrData = [];

    protected function _display($strPage="", $objUser=[], $arrError=[]){

        foreach($this->_arrData as $key=>$value){
            $$key = $value;
        }

        include'views/_partial/header.php';
        include'views/'.$strPage.'_view.php';
        include'views/_partial/footer.php';


    }

}
