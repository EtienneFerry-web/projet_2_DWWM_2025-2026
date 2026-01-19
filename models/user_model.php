<?php
    require_once'models/mother_model.php';

    class UserModel extends Connect{

        public function userPage(int $idUser=0){

            $strRq	= " SELECT users.*, functions.funct_name AS 'user_function'
                        FROM users
                        INNER JOIN functions ON users.user_funct_id = functions.funct_id
                        WHERE user_id = $idUser";



            return $this->_db->query($strRq)->fetch();



        }
    }
