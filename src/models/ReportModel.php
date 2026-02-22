<?php
    namespace App\Models;
    use PDO;
    //require_once'models/mother_model.php';

    class ReportModel extends connect{

        public function allUserReport(){
            $strRq = "  SELECT rep_id ,rep_bio_user, rep_pseudo_user, rep_reported_user_id, rep_reason, user_photo AS 'rep_photo', user_ban_at AS 'rep_user_ban'
                        FROM reports
                        INNER JOIN users ON reports.rep_reported_user_id = users.user_id
                        WHERE rep_reported_movie_id IS NULL AND rep_reported_com_id IS NULL AND rep_delete_at IS NULL
                        GROUP BY rep_reported_user_id";

            return $this->_db->query($strRq)->fetchAll();
        }

        public function allMovieReport(){
            $strRq = "  SELECT rep_id , rep_reported_movie_id, rep_reason, mov_title AS 'rep_title'
                        FROM reports
                        INNER JOIN movies ON reports.rep_reported_movie_id = movies.mov_id
                        WHERE rep_reported_user_id IS NULL AND rep_reported_com_id IS NULL AND rep_delete_at IS NULL
                        GROUP BY rep_reported_movie_id";

            return $this->_db->query($strRq)->fetchAll();
        }

        public function allCommentReport(){
            $strRq = "  SELECT rep_id, rep_reported_com_id, rep_com_content, rep_reason, rep_reported_user_id,user_pseudo AS 'rep_pseudo', user_photo AS 'rep_photo', com_spoiler AS 'rep_spoiler', user_ban_at AS 'rep_user_ban'
                        FROM reports
                        INNER JOIN comments ON reports.rep_reported_com_id = comments.com_id
                        INNER JOIN users ON reports.rep_reported_user_id = users.user_id
                        WHERE rep_reported_movie_id IS NULL AND rep_com_content IS NOT NULL AND rep_delete_at IS NULL
                        GROUP BY rep_reported_com_id";

            return $this->_db->query($strRq)->fetchAll();
        }
        //Report Traiter par un admin
        public function validateReport(int $intId){
            $strRq = "  UPDATE reports
                            SET rep_delete_at = NOW()
                        WHERE rep_id = :id";

            $rqPrep = $this->_db->prepare($strRq);
    		$rqPrep->bindValue(':id', $intId, PDO::PARAM_INT);

    		return $rqPrep->execute();
        }
        //Report annuler par l'utilisateur
        public function deleteReport(int $intId){
            $strRq = "  DELETE FROM reports
                        WHERE rep_id = :id";

            $rqPrep = $this->_db->prepare($strRq);
    		$rqPrep->bindValue(':id', $intId, PDO::PARAM_INT);

    		return $rqPrep->execute();
        }

        public function repOfConnectUser(int $intId){

            $strRq = "  SELECT user_pseudo AS 'rep_pseudo', mov_title AS 'rep_title', rep_reason, rep_delete_at, rep_reported_user_id, rep_reported_movie_id
                        FROM reports
                        LEFT JOIN users ON reports.rep_reported_user_id = users.user_id
                        LEFT JOIN movies ON reports.rep_reported_movie_id = movies.mov_id
                        WHERE rep_reporter_user_id = :id";

            $rqPrep = $this->_db->prepare($strRq);
    		$rqPrep->bindValue(':id', $intId, PDO::PARAM_INT);

    		 $rqPrep->execute();

            return $rqPrep->fetchAll();
        }
    }
