<?php

    /**
     * @author Marco Schmitt
     * 16/01/2026
     * Version 0.1
     */


    class PageCtrl extends MotherCtrl{

        public function mention(){
            $this->_display($strPage = "mention");
        }

        public function policy(){
            $this->_display($strPage = "policy");
        }

    }
