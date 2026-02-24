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

        protected function _display(string $strView, bool $boolDisplay = true){

            $objSmarty	= new Smarty();
            // Ajouter le var_dump au modificateur de smarty : vardump est le nom appelé après le |
            $objSmarty->registerPlugin('modifier', 'vardump', 'var_dump');
            $objSmarty->registerPlugin('modifier', 'is_null', 'is_null');
            // Récupérer les variables
            foreach($this->_arrData as $key=>$value){
                $objSmarty->assign($key, $value);
            }

            $date = new DateTime();
            $objSmarty->assign('curDate', $date);


            $objSmarty->assign("pseudo", $_SESSION['user']['user_pseudo']??NULL);

            $objSmarty->assign("success_message", $_SESSION['success']??NULL);
            unset($_SESSION['success']);
            if($boolDisplay){
                $objSmarty->display("views/".$strView."_view.tpl");
            }else{
				return $objSmarty->fetch("views/".$strView."_view.tpl");
			}
        }

        protected function _resize($img, $intX = 280, $intY = 400, $keepRatio = false) {
            $filename = $img;

          
            list($width_orig, $height_orig) = getimagesize($filename);

            $width = $intX;
            $height = $intY;

            
            if ($keepRatio) {
                $ratio = $width_orig / $height_orig;


                $height = $intY;

                $width = $intY * $ratio;


                if ($width > $intX) {
                    $width = $intX;
                    $height = $intX / $ratio;
                }
            }

            $image_p = imagecreatetruecolor($width, $height);

            
            imagealphablending($image_p, false);
            imagesavealpha($image_p, true);

            $data = file_get_contents($filename);
            $image = imagecreatefromstring($data);

            imagecopyresampled(
                $image_p,
                $image,
                0, 0, 0, 0,
                (int)$width, (int)$height,
                $width_orig, $height_orig
            );

            $extension = strtolower(pathinfo($img, PATHINFO_EXTENSION));

            if ($extension == 'jpg' || $extension == 'jpeg') {
                imagejpeg($image_p, $img, 90);
            } elseif ($extension == 'png') {
                imagepng($image_p, $img, 8);
            } elseif ($extension == 'webp') {
                imagewebp($image_p, $img, 85);
            }

            imagedestroy($image);
            imagedestroy($image_p);
        }
        
        protected function _checkAccess(int $grade=1){

            if(!isset($_SESSION['user']) && $grade > $_SESSION['user']['user_funct_id']){
                header("Location:index.php?ctrl=error&action=err403");
                exit;
            }

        }
    }
