<?php
    namespace App\Controllers;
    /**
     * @author Marco Schmitt
     * 16/01/2026
     * Version 0.1
     */

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    class PageCtrl extends MotherCtrl{
        
       /**
        * Legal mentions page
        * @return void displays the legal mentions and credits view
        */

        public function mention(){
            $this->_display("mention");
        }

        /**
        * Privacy policy page
        * @return void displays the data protection and privacy policy view
        */
        
        public function policy(){
            $this->_display("policy");
        }
        //Page Contact
        public function contact(){

            if (count($_POST)>0){

                $strName = $_POST['name'];
                $strEmail = $_POST['email'];
                $strSubject = $_POST['subject'];
                $strMessage = $_POST['message'];



                $arrError = [];
                if ($strName == ""){
                    $arrError['name'] = "Le nom est obligatoire";
                }
                if ($strSubject == ""){
                    $arrError['subject'] = "L'objet est obligatoire";
                }
                if ($strMessage == ""){
                    $arrError['message'] = "Le contenu du message est obligatoire";
                }
                if ($strEmail == ""){
                    $arrError['email'] = "Le mail est obligatoire";
                }else if (!filter_var($strEmail, FILTER_VALIDATE_EMAIL)){
                    $arrError['email'] = "Le format du mail n'est pas correct";
                }

                if (count($arrError) == 0){
                    // $objMail = new PHPMailer(); // Nouvel objet Mail
                    // $objMail->IsSMTP();
                    // $objMail->Mailer 		= "smtp";
                    // $objMail->CharSet 		= PHPMailer::CHARSET_UTF8;

                    // // Si on veut afficher les messages de debug
                    // $objMail->SMTPDebug  	= 0;

                    // // Connection au serveur de mail
                    // $objMail->SMTPAuth   	= TRUE;
                    // $objMail->SMTPSecure 	= "ssl";
                    // $objMail->Port       	= $_ENV['MAIL_PORT'];
                    // $objMail->Host       	= "smtp.gmail.com";
                    // $objMail->Username 		= $_ENV['MAIL_USERNAME'];
                    // $objMail->Password 		= $_ENV['MAIL_PASSWORD'];

                    // // Comment envoyer le mail
                    // $objMail->IsHTML(true); // en HTML
                    // $objMail->setFrom($_ENV['MAIL_USERNAME'], 'Give Me Five'); // Expéditeur

                    // // Destinataire(s)
                    // $objMail->addAddress('slendSher48@gmail.com', 'GiveMeFive');

                    // // Mail
                    // $objMail->Subject    = 'Give Me Five - Formulaire de Contact';

                    // $this->_arrData['strName']       = $strName;
                    // $this->_arrData['strSubject']    = $strSubject;
                    // $this->_arrData['strEmail']      = $strEmail;
                    // $this->_arrData['strMessage']    = $strMessage;

                    // $objMail->Body       = $this->_display("mailMessage", false);

                    // // Envoyer le mail
                    // if($objMail->Send()){
                    //     $_SESSION['success'] = "mail envoyer !";
                    //     header("location: index.php?ctrl=page&action=contact");
                    //     exit;
                    // }

                    $this->_arrData['strName']       = $strName;
                    $this->_arrData['strSubject']    = $strSubject;
                    $this->_arrData['strEmail']      = $strEmail;
                    $this->_arrData['strMessage']    = $strMessage;

                    $this->_objMail->addAddress('slendsher48@gmail.com', 'GiveMeFive');
                    $this->_objMail->Subject    = "Formulaire de Contact";
        

                    $this->_objMail->Body      	= $this->_display("mailMessage", false);

                    if($this->_sendMail()){
                        $_SESSION['success'] = "L'email a bien était envoyé !";
                    }

                }

                $this->_arrData['arrError'] = $arrError;
            }

			// Afficher
			$this->_display("contact");
        }

    }
