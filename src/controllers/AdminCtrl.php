<?php
    namespace App\Controllers;

    // Modèles
    use App\Models\AdminModel;
    use App\Models\UserModel;
    use App\Models\MovieModel;
    use App\Models\PersonModel;
    use App\Models\CommentModel;

    // Entités
    use App\Entities\AdminEntity;
    use App\Entities\UserEntity;
    use App\Entities\MovieEntity;
    use App\Entities\PersonEntity;


    /**
     * @author Audrey Sonntag
     * 06/02/2026
     * Version 0.1
     */

    class AdminCtrl extends MotherCtrl{

        /**
		* Page de gestion des utilisateurs
		*/
		public function dashboard(){
			if (!isset($_SESSION['user']) || $_SESSION['user']['user_funct_id'] != 2 && $_SESSION['user']['user_funct_id'] != 3){ // Pas d'utilisateur connecté
				header("Location:index.php?ctrl=error&action=err403");
				exit;
			}

            $objMovieModel      = new MovieModel;
            $objCommentModel    = new CommentModel;

            $arrLastMoviesData      = $objMovieModel->findLastMovies();
            $arrLastMoviesObjects = [];

            foreach($arrLastMoviesData as $data){
                $objMovie = new MovieEntity("mov_");
                $objMovie->hydrate($data);
                $arrLastMoviesObjects[] = $objMovie;
            }

            $this->_arrData['total_movies']     = $objMovieModel->countAllMovies();
            $this->_arrData['total_likes']      = $objMovieModel->countAllLikes();
            $this->_arrData['total_comments']   = $objCommentModel->countAllComments();
            $this->_arrData['arrLastMovies']    = $arrLastMoviesObjects;

			$this->_display("dashboard");
		}

        
}