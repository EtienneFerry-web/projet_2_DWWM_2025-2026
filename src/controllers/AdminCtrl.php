<?php
    namespace App\Controllers;

    // Modèles
    use App\Models\MovieModel;
    use App\Models\CommentModel;
    // Entités
    use App\Entities\MovieEntity;
   

    /**
     * @author Etienne
     * 27/02/2026
     * Version 1
     */

    class AdminCtrl extends MotherCtrl{

        /**
        * @author Etienne
        * Administrator & Moderator dashboard page
        * Displays statistics and latest lists for the admin panel
        * @return displays displays site statistics and allows quick actions to rank or delete another user,
        * as well as managing reports and restrictions for other users
        */
        
		public function dashboard(){
			$this->_checkAccess(2);

            $objMovieModel      = new MovieModel;
            $objCommentModel    = new CommentModel;

            $arrLastMoviesData      = $objMovieModel->findLastMovies();
            $arrLastMoviesObjects = [];

            foreach($arrLastMoviesData as $data){
                $objMovie = new MovieEntity("mov_");
                $objMovie->hydrate($data);
                $arrLastMoviesObjects[] = $objMovie;
            }

            $arrTopLikesData = $objMovieModel->findMostLikedMovies();
            $arrTopLikesObjects = [];

            foreach($arrTopLikesData as $data){
                $objMovie = new MovieEntity("mov_");
                $objMovie->hydrate($data);
                $arrTopLikesObjects[] = $objMovie;
            }

            $arrTopCommentsData = $objMovieModel->findMostCommentedMovies();
            $arrTopCommentsObjects = [];

            foreach($arrTopCommentsData as $data){
                $objMovie = new MovieEntity("mov_");
                $objMovie->hydrate($data);
                $arrTopCommentsObjects[] = $objMovie;
            }




            $this->_arrData['total_movies']     = $objMovieModel->countAllMovies();
            $this->_arrData['total_likes']      = $objMovieModel->countAllLikes();
            $this->_arrData['total_comments']   = $objCommentModel->countAllComments();
            
            $this->_arrData['arrLastMovies']    = $arrLastMoviesObjects;
            $this->_arrData['arrTopLikes']      = $arrTopLikesObjects;
            $this->_arrData['arrTopComments']   = $arrTopCommentsObjects;


			$this->_display("dashboard");
		}

        
}