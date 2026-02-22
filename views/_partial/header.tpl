
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{block name="description"}{/block}">
	<title>{block name="title"} - Give Me Five{/block}</title>
    {block name="css_variation"}{/block}
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
	<link rel="stylesheet" href="/Projet2/assets/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a href="index.php"><img src="/Projet2/assets/img/iconSite.png" alt="icon du site" class="iconHeader"></a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <img src="/Projet2/assets/img/menu.svg" alt="menu burger" class="iconHeader">
            </button>
            <div class="collapse navbar-collapse" id="navbarMain">
                {include file="views/_partial/navHeader.tpl"}
                {include file="views/_partial/searchForm.tpl" formClass=" d-flex ms-lg-3 col-12 col-sm-6"}
            </div>
        </div>
    </nav>
    {include file="views/_partial/message.tpl"}
    <a href="index.php?ctrl=page&action=contact"
        class="btn btn-light position-fixed bottom-0 end-0 m-4 rounded-circle shadow-lg d-flex align-items-center justify-content-center"
        style="width: 50px; height: 50px; z-index: 999;">
        <i class="bi bi-chat-dots-fill fs-3"></i>
    </a>
