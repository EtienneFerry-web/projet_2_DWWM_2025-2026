<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<?php if($strPage ==="home" || $strPage ==="movie" || $strPage ==="actor" || $strPage ==="user"){ ?>
	    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide-core.min.css">
		<?php if($strPage ==="movie" || $strPage ==="user" ){ ?>
		<link rel="stylesheet" href="/Projet2/assets/css/slideMovie.css">
		<?php }?>
	<?php }?>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
	<link rel="stylesheet" href="/Projet2/assets/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a href="index.php"><img src="/Projet2/assets/img/iconSite.png" alt="icon du site" class="iconHeader"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <img src="/Projet2/assets/img/menu.svg" alt="menu burger" class="iconHeader">
            </button>
            <div class="collapse navbar-collapse" id="navbarMain">
                <?php require'navHeader.php'?>
                <form action="index.php?ctrl=content&action=resultSearch" class="d-flex ms-lg-3" role="search" method="post">
                    <input class="form-control me-2" type="search" placeholder="Rechercher..." name="search" value="">
                    <button class="btn" type="submit">
                        <img src="/Projet2/assets/img/iconBtnSearch.svg" height="32" width="32">
                    </button>
                </form>
            </div>
        </div>
    </nav>