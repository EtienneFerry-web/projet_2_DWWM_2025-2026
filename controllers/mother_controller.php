<?php

/**
 * @author Marco Schmitt
 * 16/01/2026
 * Version 0.1
 */


class MotherCtrl{

    protected function getContent($strPage="", $objContent=[], $objAllPerson=[], $objComment=[], $objPerson=[] $objUser=[], $arrError =array(), $arrResult=array()){
        include'views/_partial/header.php';
        include"views/".$strPage."_view.php";
        include'views/_partial/footer.php';

    }

}
