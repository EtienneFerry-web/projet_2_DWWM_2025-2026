
<section id="search" class="container row flex-lg-row-reverse py-5 mx-auto text-center text-lg-start">
    <h1>Resultat</h1>
    <p>Résultat a la recherche "<?= $objSearch->getSearch() ?>".</p>
    <div class="py-2 col-12 col-lg-4">
        <form method="post" action="index.php?ctrl=search&action=searchPage">
            <input type="hidden" name="search" value="<?= $objSearch->getSearch() ?>">
            <label class="form-label w-100 border-bottom border-dark">Résultat Par :</label>

            <div class="d-block text-start p-2">
                <input type="radio" class="btn-check" name="searchBy" value="3" id="filter-actors" onchange="this.form.submit()">
                <label class="nav-link text-uppercase" for="filter-actors">Acteur</label>
            </div>

            <div class="d-block text-start p-2">
                <input type="radio" class="btn-check" name="searchBy" value="2" id="filter-producer" onchange="this.form.submit()">
                <label class="nav-link text-uppercase" for="filter-producer">Producer</label>
            </div>

            <div class="d-block text-start p-2">
                <input type="radio" class="btn-check" name="searchBy" value="1" id="filter-director" onchange="this.form.submit()">
                <label class="nav-link text-uppercase" for="filter-director">Réalisateur</label>
            </div>

            <div class="d-block text-start p-2">
                <input type="radio" class="btn-check" name="searchBy" value="4" id="filter-user" onchange="this.form.submit()">
                <label class="nav-link text-uppercase" for="filter-user">Utilisateur</label>
            </div>

            <div class="d-block text-start p-2">
                <input type="radio" class="btn-check" name="searchBy" value="5" id="filter-movie" onchange="this.form.submit()">
                <label class="nav-link text-uppercase" for="filter-movie">Film</label>
            </div>
            <div class="d-block text-start p-2">
                <input type="radio" class="btn-check" name="searchBy" value="0" id="filter-default" onchange="this.form.submit()">
                <label class="nav-link text-uppercase" for="filter-default">Par defaut</label>
            </div>
        </form>

    </div>
    <div class="py-2 col-12 col-lg-8 scrollSearch">
    <?php
    if(empty($objContent) || $objContent === 0){
       echo "<h2 class='text-center'>Aucun Résultat !</h2>";
    } else {
        foreach($objContent as $content){
            require'views/_partial/movieSearch.php';
        }
    }
     ?>

    </div>

</section>
