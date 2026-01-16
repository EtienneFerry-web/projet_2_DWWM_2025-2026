<?php
    require'controllers/mother_controller.php';

    class PageCtrl extends MotherCtrl{

        public function mention(){
            $this->getContent($strPage = "mention");
        }

        public function policy(){
            $this->getContent($strPage = "policy");
        }

    }