<?php		

    require'entities/user_entity.php';
    require'models/user_model.php';
    require'entities/movie_entity.php';
    require'models/movie_model.php';
    require'entities/comment_entity.php';
    require'models/comment_model.php';

    class CommentCtrl extends MotherCtrl{

        public function likeComment(){
			if(!isset($_SESSION['user'])){
				header("Location:index.php?ctrl=user&action=login");
				exit;
			}

			$intItemId = (int)$_GET['id'];

			$intUserId = $_SESSION['user']['user_id'];
			
			$objCommentModel = new CommentModel; 
    		$objCommentModel->LikeComment($intUserId, $intItemId);

			header("Location:index.php?ctrl=movie&action=movie&id=" . $intItemId);
			exit;
		}
    }
