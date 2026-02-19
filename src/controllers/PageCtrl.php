<?php
    namespace App\Controllers;
    /**
     * @author Marco Schmitt
     * 16/01/2026
     * Version 0.1
     */


    class PageCtrl extends MotherCtrl{
        
        //Page Mention
        public function mention(){
            $this->_display("mention");
        }
        //Page Policy
        public function policy(){
            $this->_display("policy");
        }

    }
