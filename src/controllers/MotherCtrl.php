<?php
    namespace App\Controllers;
    /**
    * @author Marco Schmitt
    * 16/01/2026
    * Version 0.1
    *
    */

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    use Smarty\Smarty;
    use DateTime;

    class MotherCtrl{

        protected array $_arrData = [];
        protected object $_objMail;

        public function __construct() {

            $this->_objMail = new PHPMailer(true); 

            
    
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
                $token = $_SERVER['HTTP_X_CSRF_TOKEN'] ?? $_POST['csrf_token'] ?? '';
                
                if (!$this->_verifyCsrfToken($token)) {   
                    $this->_redirect($_ENV['BASE_URL']."error/err403");
                    exit; 
                }

            } else {
                
                if (!isset($_SESSION['csrf_token'])) {
                    $this->_generateCsrfToken();
                } else {
                    $_SESSION['csrf_token_expiration'] = time() + (30 * 60); 
                }
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
				return $objSmarty->fetch("views/mails/".$strView."_view.tpl");
			}
        }

         /**
         * Resizes an image file while maintaining quality and optional aspect ratio.
         * * This internal method performs the following:
         * 1. Retrieves original dimensions using getimagesize.
         * 2. Calculates new dimensions; if $keepRatio is true, it scales the image to fit 
         * within the $intX and $intY boundaries without stretching.
         * 3. Creates a true-color canvas and preserves PNG/WebP transparency (alpha blending).
         * 4. Resamples the image using a high-quality interpolation algorithm.
         * 5. Saves the output back to the original path, supporting JPG, PNG, and WebP.
         *
         * @access protected
         * @param  string  $img       The server path to the image file.
         * @param  int     $intX      The target width (default 280px).
         * @param  int     $intY      The target height (default 400px).
         * @param  bool    $keepRatio If true, prevents distortion by calculating proportional dimensions.
         * @return void
         */

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

        protected function _checkAccess(int $grade=1):void{

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
			$token = bin2hex(random_bytes(32)); 
			$_SESSION['csrf_token'] = $token;
		
			$_SESSION['csrf_token_expiration'] = time() + (30 * 60); 
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

        protected function _selfRedirect(){
            header("Location:".$_SERVER['REQUEST_URI']);
            exit;
        }

        protected function _redirect($url){
             header("Location:".$url);
            exit;
        }

        /** 
		* Envoyer le mail
		* 
		*/
		protected function _sendMail():bool{
            try {
			//$this->_objMail 			= new PHPMailer(); // Nouvel objet Mail
			$this->_objMail->IsSMTP();
			$this->_objMail->Mailer 	= "smtp";
			$this->_objMail->CharSet	= PHPMailer::CHARSET_UTF8;

			// Si on veut afficher les messages de debug
			$this->_objMail->SMTPDebug  = 0;

			// Connection au serveur de mail
			$this->_objMail->SMTPAuth   	= TRUE;
			$this->_objMail->SMTPSecure 	= "tls";
			$this->_objMail->Port       	= $_ENV['MAIL_PORT'];
			$this->_objMail->Host       	= "smtp.gmail.com";
			$this->_objMail->Username 		= $_ENV['MAIL_USERNAME'];
			$this->_objMail->Password 		= $_ENV['MAIL_PASSWORD'];

			// Comment envoyer le mail
			$this->_objMail->IsHTML(true); // en HTML
			$this->_objMail->setFrom($_ENV['MAIL_USERNAME'], 'GiveMeFive'); // Expéditeur

			if($this->_objMail->Send()) {
                $this->_objMail->clearAddresses();
                return true;
            } else {
                return false;
                }
            } catch(Exception $e) {
                $this->_objMail->clearAddresses();
                return false;
            }
         }
    }
