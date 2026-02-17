<?php
    namespace App\Controllers;
    /**
     * @author Marco Schmitt
     * 16/01/2026
     * Version 0.1
     */


    class ErrorCtrl extends MotherCtrl{

        public function err404(){
            //Page d'erreur pas not found

            $this->_display("404");
        }

        public function err403(){
            //Page Pour les accés

            $this->_display("403");
        }

    }
