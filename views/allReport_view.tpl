{extends file="views/layout_view.tpl"}

{block name="title" prepend}Dashboard - Signalements{/block}

{block name="description"}{/block}

{block name="css_variation"}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/Projet2/assets/css/style.css">
{/block}

{block name="content"}

<section id="dashboard" class="container py-5">

        <h1>DashBoard</h1>
        <nav class="py-2 row g-2">
            <div class="py-2 row g-2">
                <a id="user" href="index.php?ctrl=admin&action=dashboard" class="nav-link col-2">Home</a>
                <a id="user" href="index.php?ctrl=user&action=allUser" class="nav-link col-2">Utilisateurs</a>
                <a id="addMovie" href="index.php?ctrl=movie&action=allMovie" class="nav-link col-2">Films</a>
                <a id="person" href="index.php?ctrl=person&action=allPerson" class="nav-link col-2">Célébrités</a>
                <a id="report" href="index.php?ctrl=report&action=allReport" class="nav-link col-2  active">Signalement</a>
            </div>
        </nav>


    <h2 class="mb-4 py-2">Gestion des Signalements</h2>

    <section class="mb-5">
        <h3 class="h4"><i class="bi bi-chat-left-text me-2"></i>Signalements : Commentaires</h3>
        <div class="container-fluid p-3">
            {foreach from=$arrRepComToDisplay item=objReport}
                <form method="post" class="row border-bottom py-3 align-items-center">
                    <div class="col-md-1 fw-bold">#{$objReport->getId()}</div>
                    <div class="col-md-3 d-flex align-items-center">
                        <a class="text-decoration-none text-dark d-flex align-items-center" href="index.php?ctrl=user&action=user&id={$objReport->getReportedUserId()}">
                            <img src="assets/img/{$objReport->getPhoto()}" class="rounded-circle border me-2" style="width: 40px; height: 40px; object-fit: cover;" alt="Photo de profil">
                            <span class="fw-bold">{$objReport->getPseudo()}</span>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <p class="m-0 fw-bold">Raison: {$objReport->getReason()}</p>
                        <p class="m-0 ">Commentaire: {$objReport->getComContent()}</p>
                    </div>
                    <div class="col-md-4 d-flex justify-content-end align-items-center gap-2">
                        <button type="submit" name="addRemoveSpoiler" value="{$objReport->getReportedComId()}" class="btn btn-outline-warning btn-sm">{if $objReport->getSpoiler() == 0} Add Spoiler {else} Remove Spoiler {/if}</button>
                        <button type="submit" name="deleteComment" value="{$objReport->getReportedComId()}" class="btn btn-outline-danger btn-sm">Supprimer</button>
                        <button type="submit" name="deleteRep" value="{$objReport->getId()}" class="btn btn-outline-success btn-sm px-3">Valider</button>
                    </div>
                </form>
            {foreachelse}
                <p class="text-muted py-3 m-0">Aucun signalement de commentaire.</p>
            {/foreach}
        </div>
    </section>

    <section class="mb-5">
        <h3 class="h4"><i class="bi bi-people me-2"></i>Signalements : Utilisateurs</h3>
        <div class="container-fluid p-3">
            {foreach from=$arrRepUserToDisplay item=objReport}
                <form method="post" class="row border-bottom py-3 align-items-center">
                    <div class="col-md-1 fw-bold">#{$objReport->getReportedUserId()}</div>
                    <div class="col-md-3 d-flex align-items-center">
                        <a class="text-decoration-none text-dark d-flex align-items-center" href="index.php?ctrl=user&action=user&id={$objReport->getReportedUserId()}">
                            <img src="assets/img/{$objReport->getPhoto()|default:'default-user.png'}"
                                class="rounded-circle border me-2"
                                style="width: 40px; height: 40px; object-fit: cover;" alt="Photo de profil">
                            <span class="fw-bold text-dark">{$objReport->getPseudoUser()}</span>
                        </a>
                    </div>
                    <p class="col-md-4 m-0 fw-bold">Raison: {$objReport->getReason()}</p>
                    <div class="col-md-4 d-flex justify-content-end gap-2">
                        <div class="btn-group">
                            <button type="banUser" value="1" class="btn btn-outline-warning btn-sm">15 J</button>
                            <button type="banUser" value="2" class="btn btn-outline-warning btn-sm">30 J</button>
                        </div>
                        <button type="submit" name="banUser" value="3" class="btn btn-outline-danger btn-sm">Bannir</button>
                        <button type="submit" name="deleteRep" value="{$objReport->getId()}" class="btn btn-outline-success btn-sm px-3">Valider</button>
                    </div>
                </form>
            {foreachelse}
                <p class="text-muted py-3 m-0">Aucun signalement d'utilisateur en attente.</p>
            {/foreach}
        </div>
    </section>

    <section class="mb-5">
        <h3 class="h4"><i class="bi bi-film me-2"></i>Signalements : Films</h3>
        <div class="container-fluid p-3">
            {foreach from=$arrRepMovieToDisplay item=objReport}
                <form method="post" class="row border-bottom py-3 align-items-center">
                    <div class="col-md-1 fw-bold">#{$objReport->getReportedMovieId()}</div>
                    <a href="index.php?ctrl=movie&action=movie&id={$objReport->getReportedMovieId()}"class="col-md-3 d-flex align-items-center text-decoration-none text-dark">
                        <span class="fw-bold">{$objReport->getTitle()}</span>
                    </a>
                    <p class="col-md-4 m-0 fw-bold">Raison: {$objReport->getReason()}</p>
                    <div class="col-md-4 d-flex justify-content-end gap-2">
                         <a href="index.php?ctrl=movie&action=deleteMovie&id={$objReport->getReportedMovieId()}" class="btn btn-outline-danger btn-sm px-3" onclick="return confirm('Vous allez supprimer le film {$objReport->getTitle()|escape:'javascript'}')">Supprimer</a>
                         <a href="" class="btn btn-sm btn-outline-dark px-3">Modifier</a>
                         <button type="submit" name="deleteRep" value="{$objReport->getId()}" class="btn btn-outline-success btn-sm px-3">Valider</button>
                    </div>
                </form>
            {foreachelse}
                 <p class="text-muted py-3 m-0">Aucun signalement de film.</p>
            {/foreach}
        </div>
    </section>
</section>
{/block}

{block name="js"}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
{/block}
