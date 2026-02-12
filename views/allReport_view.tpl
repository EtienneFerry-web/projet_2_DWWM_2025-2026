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
        <a id="user" href="index.php?ctrl=admin&action=dashboard" class="nav-link col-2">Home</a>
        <a id="user" href="index.php?ctrl=admin&action=allUser" class="nav-link col-2">Utilisateurs</a>
        <a id="addMovie" href="index.php?ctrl=admin&action=allMovie" class="nav-link col-2">Films</a>
        <a id="person" href="index.php?ctrl=admin&action=allPerson" class="nav-link col-2">Célébrités</a>
        <a id="report" href="index.php?ctrl=admin&action=allReport" class="nav-link col-2 active">Signalement</a>
    </div>


        <h2>Les signalement</h2>
        <div id="ficheMovie" class="d-flex flex-column py-3"></div>
        <h3>Les commentaire</h3>
        <form class="row g-1 align-items-center py-3">
            <div class="col-12 col-md-5 p-0">
                <input class="form-control" type="search" placeholder="Rechercher..." name="search" value="">
            </div>
            <div class="col-12 col-md-5 p-0">
                <select class="form-select">
                    <option value="">Tous Les Grades</option>
                    <option value="usa">Croissant</option>
                    <option value="france">Decroissant</option>
                </select>
            </div>
            <div class="col-12 col-md-2 p-0">
                <button type="submit" class="w-100 p-1 btnCustom" id="sendMovie">Recherche</button>
            </div>
        </form>

        <div class="container-fluid mt-4">
            <form method="post" class="row border-bottom py-3 align-items-center">
                <div class="col-md-1 fw-bold">#42</div>

                    <div class="col-md-3 d-flex align-items-center">
                        <div class="rounded-circle bg-secondary me-2">
                            <img src="assets/img/mouse.png"
                                class="rounded-circle border"
                                style="width: 40px; height: 40px; object-fit: cover;"
                                alt="Avatar">
                        </div>
                        <div>
                            <div class="fw-bold text-dark">bad_user_99</div>
                            <div class="small text-muted">Inscrit le 12/01/24</div>
                        </div>
                    </div>
                    <div class="col-md-4">"Spam répétitif dans les commentaires aaaaaaaaaaaaaaaaaaa"</div>
                    <div class="col-md-4 d-flex justify-content-end align-items-center gap-2">
                        <div class="btn-group ms-auto">
                            <button type="button" class="btn btn-outline-warning btn-sm px-4 text-nowrap">15 Jours</button>
                            <button type="button" class="btn btn-outline-warning btn-sm px-4 text-nowrap">30 Jours</button>
                        </div>
                        <button type="button" class="btn btn-outline-danger btn-sm px-4 py-1">Bannir</button>
                        <button type="button" class="btn btn-outline-success btn-sm px-4 py-1">Ignorer</button>
                    </div>
            </form>
        </div>
    </div>
    <div id="ficheMovie" class="d-flex flex-column py-3"></div>
        <h3>Les Profils</h3>
        <form class="row g-1 align-items-center py-3">
            <div class="col-12 col-md-5 p-0">
                <input class="form-control" type="search" placeholder="Rechercher..." name="search" value="">
            </div>
            <div class="col-12 col-md-5 p-0">
                <select class="form-select">
                    <option value="">Tous Les Grades</option>
                    <option value="usa">Croissant</option>
                    <option value="france">Decroissant</option>
                </select>
            </div>
            <div class="col-12 col-md-2 p-0">
                <button type="submit" class="w-100 p-1 btnCustom" id="sendMovie">Recherche</button>
            </div>
        </form>
        <div class="container-fluid mt-4">
            <form method="post" class="row border-bottom py-3 align-items-center bg-light-hover">
                <div class="col-md-1 fw-bold">#42</div>

                <div class="col-md-3 d-flex align-items-center">
                    <div class="rounded-circle bg-secondary me-2">
                        <img src="assets/img/mouse.png"
                            class="rounded-circle border"
                            style="width: 40px; height: 40px; object-fit: cover;"
                            alt="Avatar">
                    </div>
                    <div>
                        <div class="fw-bold text-dark">bad_user_99</div>
                        <div class="small text-muted">Inscrit le 12/01/24</div>
                    </div>
                </div>

                <div class="col-md-4">

                    <div class="small text-muted fst-italic">"Photo de profil inappropriée et bio publicitaire."</div>
                </div>

                <div class="col-md-4 d-flex justify-content-end gap-2">
                    <div class="col-md-4 d-flex justify-content-end align-items-center gap-2">
                        <div class="btn-group ms-auto">
                            <button type="button" class="btn btn-outline-warning btn-sm px-4 text-nowrap">15 Jours</button>
                            <button type="button" class="btn btn-outline-warning btn-sm px-4 text-nowrap">30 Jours</button>
                        </div>
                        <button type="button" class="btn btn-outline-danger btn-sm px-4 py-1">Bannir</button>
                        <button type="button" class="btn btn-outline-success btn-sm px-4 py-1">Ignorer</button>
                </div>
            </form>
        </div>

</section>
{/block}

{block name="js"}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
{/block}
