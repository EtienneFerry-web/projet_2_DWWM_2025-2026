<?php
    require_once("mother_entity.php");

    /**
    * Classe d'un objet Report
    * @author Marco
    */
    class ReportEntity extends Entity{
        // Attributs
        private ?int    $_reported_user_id;
        private ?int    $_reported_movie_id;
        private ?int    $_reported_com_id;
        private ?string $_com_content;
        private ?string $_pseudo_user;
        private ?string $_bio_user;
        private string  $_date;
        private int     $_reporter_user_id;
        private string  $_reason;
        private ?string  $_pseudo;
        private ?string  $_photo;
        private string  $_title;


        /**
        * Constructeur
        */
        public function __construct(string $prefixe = ""){
            // Préfixe de la table pour hydratation
            $this->_prefixe = "rep_";
        }

        // Getters

        public function getReportedUserId():?int{
            return $this->_reported_user_id;
        }

        public function getReportedMovieId():?int{
            return $this->_reported_movie_id;
        }

        public function getReportedComId():?int{
            return $this->_reported_com_id;
        }

        public function getPseudo():?string{
            return $this->_pseudo;
        }

        public function getTitle():string{
            return $this->_title;
        }

        public function getPhoto():?string{
            return $this->_photo;
        }

        public function getComContent():?string{
            return $this->_com_content;
        }

        public function getPseudoUser():?string{
            return $this->_pseudo_user;
        }

        public function getBioUser():?string{
            return $this->_bio_user;
        }

        public function getDate():string{
            return $this->_date;
        }

        public function getReporterUserId():int{
            return $this->_reporter_user_id;
        }

        public function getReason():string{
            return $this->_reason;
        }

        // Setters

        public function setPseudo(?string $pseudo){
             $this->_pseudo = $pseudo;
        }

        public function setPhoto(?string $photo){
             $this->_photo = $photo??'defaultImgUser.jpg';
        }

        public function setReported_user_id(?int $reported_user_id){
            $this->_reported_user_id = $reported_user_id;
        }

        public function setReported_movie_id(?int $reported_movie_id){
            $this->_reported_movie_id = $reported_movie_id;
        }

        public function setReported_com_id(?int $reported_com_id){
            $this->_reported_com_id = $reported_com_id;
        }

        public function setCom_content(?string $com_content){
            $this->_com_content = $com_content;
        }

        public function setPseudo_user(?string $pseudo_user){
            $this->_pseudo_user = $pseudo_user;
        }

        public function setBio_user(?string $bio_user){
            $this->_bio_user = $bio_user;
        }

        public function setDate(string $date){
            $this->_date = $date;
        }

        public function setTitle(string $strTitle){
            $this->_title = $strTitle;
        }

        public function setReporter_user_id(int $reporter_user_id){
            $this->_reporter_user_id = $reporter_user_id;
        }

        public function setReason(string $reason){
            $this->_reason = $reason;
        }
    }
