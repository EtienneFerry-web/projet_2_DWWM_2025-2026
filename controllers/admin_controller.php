<?php
    require'entities/admin_entity.php';
    require'models/admin_model.php';

    /**
     * @author Marco Schmitt
     * 16/01/2026
     * Version 0.1
     */

    class AdminCtrl extends MotherCtrl{

        public function dashboard(){
            $this->_display("dashboard");
        }
    }
