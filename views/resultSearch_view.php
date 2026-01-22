<?php var_dump($_POST) ?>
<section id="search" class="container row flex-lg-row-reverse py-5 mx-auto text-center text-lg-start">
    <h1>Resultat</h1>
    <p>Résultat a la recherche "qzdqzd qdqzdqz dqdz".</p>
    <div class="py-2 col-12 col-lg-4">
        <form method="post">
            <label for="filmTitle" class="form-label w-100">Rechercher Par :</label>
            <select class="form-select form-control">
                <option value="">Tous</option>
                <option value="Film">Film</option>
                <option value="Acteur">Acteur</option>
                <option value="Réalisateur">Réalisateur</option>
                <option value="Producteur">Producteurs</option>
            </select>
            <div class="py-3 text-center">
                <button type="submit" class="btnCustom">Filtrer</button>
                <button type="reset" class="btnCustom">Réinitialiser</button>
            </div>
        </form>
    </div>
    <div class="py-2 col-12 col-lg-8 scrollSearch">
    <?php
    foreach($objContent as $objMovie){
        require'views/_partial/movieSearch.php';
     }
     ?>

    </div>

</section>
