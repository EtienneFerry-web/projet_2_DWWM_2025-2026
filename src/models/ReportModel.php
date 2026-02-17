<?php
    namespace App\Models;
    use PDO;
    //require_once'models/mother_model.php';

    class ReportModel extends connect{

        public function allUserReport(){
            $strRq = "  SELECT rep_id ,rep_bio_user, rep_pseudo_user, rep_reported_user_id, rep_reason, user_photo AS 'rep_photo'
                        FROM reports
                        INNER JOIN users ON reports.rep_reported_user_id = users.user_id
                        WHERE rep_reported_movie_id IS NULL AND rep_reported_com_id IS NULL ";

            return $this->_db->query($strRq)->fetchAll();
        }

        public function allMovieReport(){
            $strRq = "  SELECT rep_id , rep_reported_movie_id, rep_reason, mov_title AS 'rep_title'
                        FROM reports
                        INNER JOIN movies ON reports.rep_reported_movie_id = movies.mov_id
                        WHERE rep_reported_user_id IS NULL AND rep_reported_com_id IS NULL ";

            return $this->_db->query($strRq)->fetchAll();
        }

        public function allCommentReport(){
            $strRq = "  SELECT rep_id ,rep_com_content, rep_reason, rep_reported_user_id,user_pseudo AS 'rep_pseudo', user_photo AS 'rep_photo'
                        FROM reports
                        INNER JOIN users ON reports.rep_reported_user_id = users.user_id
                        WHERE rep_reported_movie_id IS NULL AND rep_com_content IS NOT NULL";

            return $this->_db->query($strRq)->fetchAll();
        }

        public function deleteReport(int $intId){
            $strRq = "  DELETE FROM reports
                        WHERE rep_id = :id";

            $rqPrep = $this->_db->prepare($strRq);
    		$rqPrep->bindValue(':id', $intId, PDO::PARAM_INT);

    		return $rqPrep->execute();
        }
    }
