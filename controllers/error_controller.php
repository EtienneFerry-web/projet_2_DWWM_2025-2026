<?php 
    require'controllers/mother_controller.php';

    /**
     * @author Marco Schmitt
     * 16/01/2026
     * Version 0.1
     */


    class ErrorCtrl extends MotherCtrl{

        public function err404(){
            //Page d'erreur pas not found

            $this->_display($strPage = "404");
        }

        public function err403(){
            //Page Pour les accés 

            $this->_display($strPage = "403");
        }

    }
