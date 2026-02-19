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

    <div class="py-2 row g-2">
        <a id="user" href="index.php?ctrl=admin&action=dashboard" class="nav-link col-2 active">Home</a>
        <a id="user" href="index.php?ctrl=user&action=allUser" class="nav-link col-2">Utilisateurs</a>
        <a id="addMovie" href="index.php?ctrl=movie&action=allMovie" class="nav-link col-2 ">Films</a>
        <a id="person" href="index.php?ctrl=person&action=allPerson" class="nav-link col-2">Célébrités</a>
        <a id="report" href="index.php?ctrl=report&action=allReport" class="nav-link col-2">Signalement</a>
    </div>

    <h2>Home Dashboard</h2>
    <div class="mx-auto py-5">
        <div class="row g-4 mb-5">
            <div class="col-md-4 text-center">
                <h3 class=" display-5 fw-bold">12</h3>
                <h4 class=" mb-2">NOUVEAUX FILMS</h4>
            </div>
            <div class="col-md-4 text-center">
                <h3 class=" display-5 fw-bold">12</h3>
                <h4 class=" mb-2">NOUVEAUX FILMS</h4>
            </div>
            <div class="col-md-4 text-center">
                <h3 class=" display-5 fw-bold">12</h3>
                <h4 class=" mb-2">NOUVEAUX FILMS</h4>
            </div>
        </div>

        <div class="mt-4">
            <h5 class="fw-bold text-uppercase mb-3">Top Performance</h5>
            <ul class="list-group list-group-flush border-top border-dark">
                <li class="list-group-item d-flex justify-content-center align-items-center px-0">
                    <span class="col-4">Inception (2026)</span>
                    <span class="col-4 text-center">1,250 likes</span>
                    <span class="col-4 text-end">890 commentaires</span>
                </li>
                <li class="list-group-item d-flex justify-content-center align-items-center px-0">
                    <span class="col-4">Inception (2026)</span>
                    <span class="col-4 text-center">1,250 likes</span>
                    <span class="col-4 text-end">890 commentaires</span>
                </li>
                <li class="list-group-item d-flex justify-content-center align-items-center px-0">
                    <span class="col-4">Inception (2026)</span>
                    <span class="col-4 text-center">1,250 likes</span>
                    <span class="col-4 text-end">890 commentaires</span>
                </li>
            </ul>
        </div>
    </div>
</section>
{/block}

{block name="js"}
    <script src="assets/js/dasboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
{/block}
