{extends file="views/layout_view.tpl"}
{block name="title" prepend}Dashboard{/block}
{block name="description"}{/block}

{block name="css_variation"}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<link rel="stylesheet" href="/Projet2/assets/css/style.css">
{/block}

{block name="content"}
<section id="dashboard" class="container py-5">
    <h1>DashBoard</h1>
    <div class="py-2 container row col-12 col-lg-auto">
        <div id="user" class="nav-link col-2">Utilisateurs</div>
        <div id="addMovie" class="nav-link col-2">Films</div>
        <div id="report" class="nav-link col-2">Célébrités</div>
        <!--rajout onglet Modération Films + Signal-->
    </div>
    <a href="index.php" class="homeBtn"><i class="bi bi-house-fill fs-1"></i></a>
    <div id="ficheMovie" class="d-none">
        <h2>Tous les films</h2>
        <form class="row g-1 align-items-center py-3 ">
            <div class="col-12 col-md-5 p-0">
                <input class="form-control " type="search" placeholder="Rechercher..." name="search" value="">
            </div>
            <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                Recherche
            </button>
        </form>
        <div class="allUser">
            {foreach from=$arrMovieToDisplay item=objMovie}
            <div class="row g-2 align-items-center justify-content-center py-2">
                <div class="col-2">
                    <span class="spanMovie">{$objMovie->getId()}</span>
                </div>
                <div class="col-4">
                    <span class="spanMovie">{$objMovie->getTitle()}</span>
                </div>
                <div class="col-3">
                    <a href="index.php?ctrl=movie&action=editMovie&id={$objMovie->getId()}">Modifier</a>
                </div>
                <div class="col-3">
                    <a href="index.php?ctrl=movie&action=deleteMovie&id={$objMovie->getId()}">Supprimer</a>
                </div>
            </div>
            {/foreach}
        </div>
    </div>
    <div id="listUser" class="d-block">
        <h2>Tous Les Utilisateurs</h2>
        <form class="row g-1 align-items-center py-3 ">
            <div class="col-12 col-md-5 p-0">
                <input class="form-control " type="search" placeholder="Rechercher..." name="search" value="">
            </div>

            <div class="col-12 col-md-5 p-0">
                <select class="form-select">
                    <option value="">Tous Les Grades</option>
                    <option value="usa">Croissant</option>
                    <option value="france">Decroissant</option>
                </select>
            </div>
            <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                Recherche
            </button>
        </form>

        <div class="allUser">
            {foreach from=$arrUserToDisplay item=objUser}
            <div class="row g-2 align-items-center justify-content-center py-2">
                <div class="col-1">
                    <span class="spanMovie">{$objUser->getId()}</span>
                </div>
                <div class="col-3">
                    <span class="spanMovie">{$objUser->getPseudo()}</span>
                </div>
                <div class="col-4">
                    <span class="spanMovie">{$objUser->getEmail()}</span>
                </div>
                <div class="col-2">
                    <a href="">Modifier</a>
                </div>
                <div class="col-2">
                    <a href="index.php?ctrl=user&action=deleteAccount&id={$objUser->getId()}">Supprimer</a>
                </div>
            </div>
            {/foreach}
        </div>

        <div>
        </div>
    </div>
    <div id="allReport" class="d-none">
        <h2>les célébrités</h2>
        <div class="allUser">
            {foreach from=$arrPersonToDisplay item=objPerson}
            <div class="row g-2 align-items-center justify-content-center py-2">
                <div class="col-1">
                    <span class="spanMovie">{$objPerson->getId()}</span>
                </div>
                <div class="col-3">
                    <span class="spanMovie">{$objPerson->getFullName()}</span>
                </div>
                <div class="col-2">
                    <a href="index.php?ctrl=person&action=settingsPerson&id={$objPerson->getId()}">Modifier</a>
                </div>
                <div class="col-2">
                    <a href="index.php?ctrl=person&action=deletePerson&id={$objPerson->getId()}">Supprimer</a>
                </div>
            </div>

            {/foreach}
        </div>
</section>
{/block}

{block name="js"}
<script src="assets/js/dasboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
{/block}