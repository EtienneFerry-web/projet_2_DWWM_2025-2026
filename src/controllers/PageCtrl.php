<?php
    namespace App\Controllers;
    /**
     * @author Marco Schmitt
     * 27/02/2026
     * Version 1
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

                    $this->_arrData['strName']       = $strName;
                    $this->_arrData['strSubject']    = $strSubject;
                    $this->_arrData['strEmail']      = $strEmail;
                    $this->_arrData['strMessage']    = $strMessage;

                    $this->_objMail->addAddress('slendsher48@gmail.com', 'GiveMeFive');
                    $this->_objMail->Subject    = "Formulaire de Contact";
        

                    $this->_objMail->Body      	= $this->_display("mailMessage", false);

                    if($this->_sendMail()){
                        $_SESSION['success'] = "L'email a bien était envoyé !";
                        $this->_redirect();
                    } else{
                        $arrError[] = "Erreur lors de l'envoie veuillez réassayer !";
                    }

                }

                $this->_arrData['arrError'] = $arrError;
            }

			// Afficher
			$this->_display("contact");
        }

    }
