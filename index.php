<?php
	session_start();
	
	require'vendor/autoload.php';

	$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
	$dotenv->load();
	
	$strCtrl	= $_GET['ctrl']??'movie'; 
	$strMethod	= $_GET['action']??'home'; 
	
	$boolError		= false;

	
	$strFileName	= "src/Controllers/".ucfirst($strCtrl)."Ctrl.php";
	if (file_exists($strFileName)){
		
		require($strFileName);
		
		$strClassName	= "App\\Controllers\\".ucfirst($strCtrl)."Ctrl";
		if (class_exists($strClassName)){
			
			$objController 	= new $strClassName();
			if (method_exists($objController, $strMethod)){
				
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
	        header("Location:".$_ENV['BASE_URL']."error/err404");
            exit;
	}
