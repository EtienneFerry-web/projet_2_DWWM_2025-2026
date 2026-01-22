<?php
    require'controllers/mother_controller.php';

    /**
     * @author Marco Schmitt
     * 16/01/2026
     * Version 0.1
     */


    class PageCtrl extends MotherCtrl{

        public function mention(){
            $this->getContent($strPage = "mention");
        }

        public function policy(){
            $this->getContent($strPage = "policy");
        }

    }
