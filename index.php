<?php
	session_start();
	require'vendor/autoload.php';

	$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
	$dotenv->load();

	require'controllers/mother_controller.php';
	// Récupère les infos dans l'url
	$strCtrl	= $_GET['ctrl']??'movie'; // quel contrôleur ?
	$strMethod	= $_GET['action']??'home'; // quel méthode ?
	// Flag pour afficher le 404 si besoin
	$boolError		= false;
	// Construciton du nom du fichier du controller
	$strFileName	= "controllers/".$strCtrl."_controller.php";
	if (file_exists($strFileName)){
		// Si le fichier existe, on l'inclut
		require($strFileName);
		// Construction du nom de la classe
		$strClassName	= ucfirst($strCtrl)."Ctrl";
		if (class_exists($strClassName)){
			// si la classe existe, on l'instancie
			$objController 	= new $strClassName();
			if (method_exists($objController, $strMethod)){
				// Si la méthode existe, on l'appelle
				$objController->$strMethod();
			}else{
				$boolError	= true;
			}
		}else{
			$boolError	= true;
		}
	}else{
		$boolError	= true;
	}

	if($boolError){
	        header("Location:index.php?ctrl=error&action=err404");
            exit;
	}
