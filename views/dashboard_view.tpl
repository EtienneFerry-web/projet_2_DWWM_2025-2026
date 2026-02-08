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
        <button id="user"  class="nav-link col-2 ">Utilisateurs</button>
        <button id="addMovie"  class="nav-link col-2">Films</button>
        <button id="person"  class="nav-link col-2">Célébrités</button>
        <button id="report"  class="nav-link col-2">Signalement</button>
        <!--rajout onglet Modération Films + Signal-->
    </div>

    <div id="ficheMovie" class="d-none">
        <h2>Tous les films</h2>
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
            {foreach from=$arrMovieToDisplay item=objMovie}
            <div class="row g-2 align-items-center py-2 border-bottom">
                <div class="col-12 col-md-2 text-center text-md-start">
                    <span class="spanMovie fw-bold">#{$objMovie->getId()}</span>
                </div>
                <div class="col-12 col-md-4 text-center text-md-start">
                    <span class="spanMovie">{$objMovie->getTitle()}</span>
                </div>
                <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end gap-3">
                    <a href="" class="btn btn-sm btn-outline-dark px-5">
                        Modifier
                    </a>
                    <a href="index.php?ctrl=movie&action=deleteMovie&id={$objMovie->getId()}"
                       class="btn btn-sm btn-outline-danger px-5"

                           onclick="return confirm('Vous allez supprimer le film {$objMovie->getTitle()|escape:'javascript'}')">
                        Supprimer
                    </a>
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
                <div class="row g-2 align-items-center py-2 border-bottom">
                    <div class="col-12 col-md-1 text-center text-md-start">
                        <span class="spanMovie fw-bold">#{$objUser->getId()}</span>
                    </div>
                    <div class="col-12 col-md-3 text-center text-md-start">
                        <span class="spanMovie">{$objUser->getPseudo()}</span>
                    </div>
                    <div class="col-12 col-md-4 text-center text-md-start">
                        <span class="spanMovie">{$objUser->getEmail()}</span>
                    </div>
                    <div class="col-12 col-md-4 d-flex justify-content-center justify-content-md-end gap-3">
                        <a href="" class="btn btn-sm btn-outline-dark px-5">
                            Modifier
                        </a>
                        <a href="index.php?ctrl=user&action=deleteAccount&id={$objUser->getId()}"
                           class="btn btn-sm btn-outline-danger px-5"
                           onclick="return confirm('Vous allez Supprimer {$objUser->getPseudo()|escape:'javascript'} !')">
                            Supprimer
                        </a>
                    </div>
                </div>
                {/foreach}
            </div>

        <div>
    </div>
    </div>
    <div id="allPerson" class="d-none">
        <h2>les célébrités</h2>

        <div class="allUser">
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
            {foreach from=$arrPersonToDisplay item=objPerson}
            <div class="row g-2 align-items-center py-2 border-bottom">
                <div class="col-12 col-md-1 text-md-start text-center">
                    <span class="spanMovie fw-bold">#{$objPerson->getId()}</span>
                </div>
                <div class="col-12 col-md-5 text-center text-md-start">
                    <span class="spanMovie">{$objPerson->getFullName()}</span>
                </div>
                <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end gap-3">
                    <a href="" class="btn btn-sm btn-outline-dark px-5">Modifier</a>
                    <a href="index.php?ctrl=person&action=deletePerson&id={$objPerson->getId()}"
                       class="btn btn-sm btn-outline-danger px-5"
                       onclick="return confirm('Vous aller supprimer {$objPerson->getFullName()|escape:'javascript'} !')">
                        Supprimer
                    </a>
                </div>
            </div>
            {/foreach}
    </div>
    <div id="allReport" class="d-none">
        <h2>Les Signalements</h2>
        <div class="allReport">
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
            {foreach from=$arrPersonToDisplay item=objPerson}

            {foreachelse}
                <h2>Aucun signalement !</h2>
            {/foreach}
    </div>
</section>
{/block}

{block name="js"}
  <script src="assets/js/dasboard.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
{/block}
