<?php

/**
 * @author Marco Schmitt
 * 16/01/2026
 * Version 0.1
 * @todo Peut être utilisé extract etc ob_start(); puis $content = ob_get_clean(); et l'echo echo $content;
 */
use Smarty\Smarty;

class MotherCtrl{

    protected array $_arrData = [];

    protected function _display($strView){

        $objSmarty	= new Smarty();
        // Ajouter le var_dump au modificateur de smarty : vardump est le nom appelé après le |
        $objSmarty->registerPlugin('modifier', 'vardump', 'var_dump');

        // Récupérer les variables
        foreach($this->_arrData as $key=>$value){
            //$$key = $value;
            $objSmarty->assign($key, $value);
        }
        $objSmarty->assign("pseudo", $_SESSION['user']['user_pseudo']??NULL);
        // Message de succès
        $objSmarty->assign("success_message", $_SESSION['success']??NULL);
        unset($_SESSION['success']);
        
        $objSmarty->display("views/".$strView."_view.tpl");

    }
}