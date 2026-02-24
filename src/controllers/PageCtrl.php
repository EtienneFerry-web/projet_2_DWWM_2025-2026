<?php
    namespace App\Controllers;
    /**
     * @author Marco Schmitt
     * 16/01/2026
     * Version 0.1
     */


    class PageCtrl extends MotherCtrl{
        
       /**
        * Legal mentions page
        * @return void displays the legal mentions and credits view
        */

        public function mention(){
            $this->_display("mention");
        }

        /**
        * Privacy policy page
        * @return void displays the data protection and privacy policy view
        */
        
        public function policy(){
            $this->_display("policy");
        }

    }
