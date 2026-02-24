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

        /**
        * Rendering the view using the Smarty template engine
        * @param string $strView the name of the template file to display
        * @return void assigns data to Smarty and renders the final view
        */

        protected function _display($strView){

            $objSmarty	= new Smarty();

            $objSmarty->registerPlugin('modifier', 'vardump', 'var_dump');


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

        /**
        * Resizing an image to specific dimensions
        * @param string $img the path to the image file
        * @param int $intX the target width in pixels (default 250)
        * @param int $intY the target height in pixels (default 250)
        * @return void processes and overwrites the image with the new size
        */

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

        /**
        * Checking user access permissions
        * @param int $grade the minimum required function ID level
        * @return void redirects to 403 error page if access is denied
        */

        protected function _checkAccess(int $grade){

            if(!isset($_SESSION['user'])){
                header("Location:index.php?ctrl=error&action=err403");
                exit;
            }

            if($grade > $_SESSION['user']['user_funct_id']){
                header("Location:index.php?ctrl=error&action=err403");
                exit;
            }

        }
    }
