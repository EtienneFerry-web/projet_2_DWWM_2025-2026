<?php
    namespace App\Controllers;
    /**
     * @author Marco Schmitt
     * 16/01/2026
     * Version 1
     */


    class ErrorCtrl extends MotherCtrl{

        //Page Error not found
        public function err404(){
            $this->_display("404");
        }
        //Page Access denied
        public function err403(){
            $this->_display("403");
        }

    }
