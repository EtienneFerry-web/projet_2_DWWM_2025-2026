<?php
    require'controllers/mother_controller.php';
    require'entities/content_entity.php';
    require'models/content_model.php';

    /**
     * @author Marco Schmitt
     * 16/01/2026
     * Version 0.1
     */

    class ContentCtrl extends MotherCtrl{

        public function home(){
            $this->getContent($strPage = "home");
        }

        public function list(){
            $this->getContent($strPage = "list");
        }

        public function movie(){
            $this->getContent($strPage = "movie");
        }

        public function resultSearch(){
            $this->getContent($strPage = "resultSearch");
        }

        public function person(){
            $this->getContent($strPage = "person");
        }

        public function addMovie(){
            $this->getContent($strPage = "addMovie");
        }

    }
