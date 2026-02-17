<?php
    namespace App\Controllers;
    /**
    * @author Marco Schmitt
    * 16/01/2026
    * Version 0.1
    *
    */
    use Smarty\Smarty;
    use DateTime;

    class MotherCtrl{

        protected array $_arrData = [];

        protected function _display($strView){

            $objSmarty	= new Smarty();
            // Ajouter le var_dump au modificateur de smarty : vardump est le nom appelé après le |
            $objSmarty->registerPlugin('modifier', 'vardump', 'var_dump');

            // Récupérer les variables
            foreach($this->_arrData as $key=>$value){
                $objSmarty->assign($key, $value);
            }

            $date = new DateTime();
            $objSmarty->assign('curDate', $date);


            $objSmarty->assign("pseudo", $_SESSION['user']['user_pseudo']??NULL);

            $objSmarty->assign("success_message", $_SESSION['success']??NULL);
            unset($_SESSION['success']);

            $objSmarty->display("views/".$strView."_view.tpl");

        }

        protected function _resize($img, $intX=250, $intY=250){
    		$filename = $img;

            $width = $intX;
            $height = $intY;

            list($width_orig, $height_orig) = getimagesize($filename);

            $image_p = imagecreatetruecolor($width, $height);

            $data = file_get_contents($filename);
            $image = imagecreatefromstring($data);

            imagecopyresampled(
                $image_p,
                $image,
                0, 0, 0, 0,
                $width, $height,
                $width_orig, $height_orig
            );

            $extension = pathinfo($img, PATHINFO_EXTENSION);

            if ($extension == 'jpg' || $extension == 'jpeg') {
                imagejpeg($image_p, $img, 80);
            } elseif ($extension == 'png') {
                imagepng($image_p, $img);
            } elseif ($extension == 'webp') {
                imagewebp($image_p, $img);
            }

            imagedestroy($image);
            imagedestroy($image_p);

        }
    }
