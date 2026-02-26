{extends file="views/layout_view.tpl"}
{block name="title" prepend}Dashboard{/block}
{block name="description"}{/block}

{block name="css_variation"}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{$smarty.env.BASE_URL}assets/css/style.css">
{/block}

{block name="content"}
<section id="dashboard" class="container py-5">
    <h1>DashBoard</h1>

    <div class="py-2 row g-2">
        <a id="user" href="{$smarty.env.BASE_URL}admin/dashboard" class="nav-link col-2 active">Home</a>
        <a id="user" href="{$smarty.env.BASE_URL}user/allUser" class="nav-link col-2">Utilisateurs</a>
        <a id="addMovie" href="{$smarty.env.BASE_URL}movie/allMovie" class="nav-link col-2 ">Films</a>
        <a id="person" href="{$smarty.env.BASE_URL}person/allPerson" class="nav-link col-2">Célébrités</a>
        <a id="report" href="{$smarty.env.BASE_URL}report/allReport" class="nav-link col-2">Signalement</a>
    </div>

    <h2>Home Dashboard</h2>
    <div class="mx-auto py-5">
        <div class="row g-4 mb-5">
            <div class="col-md-4 text-center">
                <h3 class=" display-5 fw-bold">{$total_likes}</h3>
                <h4 class=" mb-2">Like sur le site</h4>
            </div>
            <div class="col-md-4 text-center">
                <h3 class=" display-5 fw-bold">{$total_movies}</h3>
                <h4 class=" mb-2">Film sur le site</h4>
            </div>
            <div class="col-md-4 text-center">
                <h3 class=" display-5 fw-bold">{$total_comments}</h3>
                <h4 class=" mb-2">Commentaires sur le site</h4>
            </div>
        </div>

        <div class="mt-4">
            <h5 class="fw-bold text-uppercase mb-3">Les plus likés</h5>
            <ul class="list-group list-group-flush border-top border-dark">
                {foreach from=$arrTopLikes item=objMovie}
                <li class="list-group-item d-flex justify-content-center align-items-center px-0">
                    <a class="text-decoration-none col-4 text-dark" href="{$smarty.env.BASE_URL}movie/moviePage/{$objMovie->getId()}">
                        <span>{$objMovie->getTitle()}</span>
                    </a>
                    <span class="col-4 text-center">{$objMovie->getLike()} likes</span>
                    <span class="col-4 text-end">{$objMovie->getNbComments()} commentaires</span>
                </li>
                {foreachelse}
                    <li class="list-group-item text-center">Aucun film trouvé.</li>
                {/foreach}
            </ul>
        </div>

        <div class="mt-4">
            <h5 class="fw-bold text-uppercase mb-3">Les plus commentés</h5>
            <ul class="list-group list-group-flush border-top border-dark">
                {foreach from=$arrTopComments item=objMovie}
                <li class="list-group-item d-flex justify-content-center align-items-center px-0">
                    <a class="text-decoration-none col-4 text-dark" href="{$smarty.env.BASE_URL}movie/moviePage/{$objMovie->getId()}">
                        <span>{$objMovie->getTitle()}</span>
                    </a>
                    <span class="col-4 text-center">{$objMovie->getLike()} likes</span>
                    <span class="col-4 text-end">{$objMovie->getNbComments()} commentaires</span>
                </li>
                {foreachelse}
                    <li class="list-group-item text-center">Aucun film trouvé.</li>
                {/foreach}
            </ul>
        </div>

        <div class="mt-4">
            <h5 class="fw-bold text-uppercase mb-3">Derniers ajouts</h5>
            <ul class="list-group list-group-flush border-top border-dark">
                {foreach from=$arrLastMovies item=objMovie}
                <li class="list-group-item d-flex justify-content-center align-items-center px-0">
                    <a class="text-decoration-none col-4 text-dark" href="{$smarty.env.BASE_URL}movie/moviePage/{$objMovie->getId()}">
                        <span>{$objMovie->getTitle()}</span>
                    </a>
                    <span class="col-4 text-center">{$objMovie->getLike()} likes</span>
                    <span class="col-4 text-end">{$objMovie->getNbComments()} commentaires</span>
                </li>
                {foreachelse}
                    <li class="list-group-item text-center">Aucun film trouvé.</li>
                {/foreach}
            </ul>
        </div>
    </div>
</section>
{/block}

{block name="js"}
    <script src="{$smarty.env.BASE_URL}assets/js/dasboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
{/block}
