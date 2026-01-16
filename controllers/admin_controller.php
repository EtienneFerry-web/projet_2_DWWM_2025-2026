<?php
    require'controllers/mother_controller.php';
    require'entities/admin_entity.php';
    require'models/admin_model.php';

    class AdminCtrl extends MotherCtrl{

        public function dashboard(){
            $this->getContent($strPage = "dashboard");
        }
    }
