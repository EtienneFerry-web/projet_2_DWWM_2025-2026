<?php
    namespace App\Controllers;
    /**
     * @author Marco Schmitt
     * 16/01/2026
     * Version 1
     */


    class ErrorCtrl extends MotherCtrl{

        /**
        * Page not found error page
        * @return displays the 404 error view
        */

        public function err404(){
            $this->_display("404");
        }

        /**
        * Forbidden access error page
        * @return displays the 403 error view
        */

        public function err403(){
            $this->_display("403");
        }

    }
