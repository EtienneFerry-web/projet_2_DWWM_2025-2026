<?php

class MotherCtrl{

    protected function getContent($strPage=""){

        include'views/_partial/header.php';
        include"views/".$strPage."_view.php";
        include'views/_partial/footer.php';

    }

}
