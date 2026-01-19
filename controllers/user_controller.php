<?php
    require'controllers/mother_controller.php';
    require'entities/user_entity.php';
    require'models/user_model.php';
    require'entities/movie_entity.php';
    require'models/movie_model.php';
    require'entities/comment_entity.php';
    require'models/comment_model.php';

    /**
     * @author Marco Schmitt
     * 16/01/2026
     * Version 0.1
     */

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

            $intId = $_GET['id'];

            $objUserModel = new UserModel;
			$arrUser		= $objUserModel->userPage($intId);
			$objUser       = new UserEntity('mov_');
			$objUser->hydrate($arrUser);

			$objLikeModel = new MovieModel;
			$arrLike      = $objLikeModel->userLike($intId);

			$arrMovieToDisplay	= array();

			foreach($arrLike as $arrDetMovie){
				$objMovie = new MovieEntity('mov_');
				$objMovie->hydrate($arrDetMovie);

				$arrMovieToDisplay[] = $objMovie;
			}

			$objCommentModel = new CommentModel;
			$arrComment     = $objCommentModel->reviewUser($intId);

			$arrCommentToDisplay	= array();

			foreach($arrComment as $arrDetComment){
				$objComment = new CommentEntity('com_');
				$objComment->hydrate($arrDetComment);

				$arrCommentToDisplay[]	= $objComment;
			}



            $this->getContent($strPage = "user", objUser: $objUser, objContent: $arrMovieToDisplay, objComment: $arrCommentToDisplay );
        }

    }
