<?php
    require'controllers/mother_controller.php';
    require'entities/user_entity.php';
    require'models/user_model.php';

    class UserCtrl extends MotherCtrl{

        public function login(){
            $this->getContent($strPage = "login");
        }

        public function logout(){
            session_start();

           	unset($_SESSION['user']);

           	$_SESSION['success'] 	= "Vous êtes bien déconnecté";

           	header("Location:index.php");
           	exit;
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
