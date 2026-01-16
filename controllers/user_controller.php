<?php
    require'controllers/mother_controller.php';
    require'entities/user_entity.php';
    require'models/user_model.php';

    class UserCtrl extends MotherCtrl{

        public function login(){
            $this->getContent($strPage = "login");
        }

        public function logout(){
            $this->getContent($strPage = "logout");
        }

        public function createAccount(){
            $this->getContent($strPage = "createAccount");
        }

        public function settingsUser(){
            $this->getContent($strPage = "settingsUser");
        }


        public function user(){
            $this->getContent($strPage = "user");
        }
    }
