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

        public function __construct() {
        
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
               
                if (!$this->_verifyCsrfToken($_POST['csrf_token'])) {
                    
                    $_SESSION['csrf_token_expiration'] = time() + (30 * 60);
                    header("Location: index.php?ctrl=error&action=err403");
                    exit;
                }
            }
            $now = time();
            if (empty($_SESSION['csrf_token']) || $now > $_SESSION['csrf_token_expiration']) {
                $this->_generateCsrfToken();
            }
        }

        /**
        * Rendering the view using the Smarty template engine
        * @param string $strView the name of the template file to display
        * @return void assigns data to Smarty and renders the final view
        */
        
        protected function _display(string $strView, bool $boolDisplay = true){

            $objSmarty	= new Smarty();

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

        /**
        * Checking user access permissions
        * @param int $grade the minimum required function ID level
        * @return void redirects to 403 error page if access is denied
        */

        protected function _checkAccess(int $grade=1){

            if(!isset($_SESSION['user']) || $grade > $_SESSION['user']['user_funct_id']){
                header("Location:index.php?ctrl=error&action=err403");
                exit;
            }

        }

        /** 
		* Générer et stocker le token CSRF dans la session avec une expiration
		* @return string $token le jeton généré
		*/
		protected function _generateCsrfToken():string {
			$token = bin2hex(random_bytes(32)); // Génère un token aléatoire
			$_SESSION['csrf_token'] = $token;
			// Définir une expiration (par exemple, 30 minutes à partir de maintenant)
			$_SESSION['csrf_token_expiration'] = time() + (30 * 60); // 30 minutes en secondes
			return $token;
		}
		
		/**
		* Vérifier le token CSRF et son expiration
		* @param string $token Le token à vérifier
		* @return boolean le token est ok ou pas
		*/
		protected function _verifyCsrfToken(string $token):bool {
			if ($_ENV['CSRF_TOKEN'] == 1){
				return isset($_SESSION['csrf_token'])
					&& $_SESSION['csrf_token'] === $token
					&& isset($_SESSION['csrf_token_expiration'])
					&& $_SESSION['csrf_token_expiration'] >= time(); // Vérifie si le token n'a pas expiré
			}else{
				return true;
			}
		}
    }
