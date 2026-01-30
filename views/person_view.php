<section class="container row mx-auto" id="actor">
    <div class="col-12 col-md-3  py-5 text-center ">
        <img src="<?= $objPerson->getPhoto()  ?>" alt="" class="img-fluid w-75 w-50">
        <div class="py-3 text-center w-75 w-md-50 mx-auto">
            <span class=" spanMovie d-block py-1"><?= $objPerson->getCountry() ?></span>
            <span class=" spanMovie d-block py-1">Née : <?= $objPerson->getBirthDate() ?></span>
            <span class=" spanMovie d-block py-1">Mort : <?= $objPerson->getDeathDate() ?></span>
            <p><?= $objPerson->getBio() ?></p>
        </div>

    </div>
    <div class="col-12 col-md-9 py-1 py-md-5 text-center text-md-start ">
        <h1 class="d-md"><?= $objPerson->getFullName() ?></h1>
        <form method="post" class="row filterActor align-items-center">
            <div class="col-5 col-md-4 ">
                <select class="form-select" name="order">
                    <option value="">Date</option>
                    <option value="ASC" <?= ("ASC" === (string)$arrPost['order'])? "selected" : "" ?>>Croissant</option>
                    <option value="DESC" <?= ("DESC" === (string)$arrPost['order'])? "selected" : "" ?>>Decroissant</option>
                </select>
            </div>
            <div class="col-5 col-md-4">
                <select class="form-select" name="job" >
                    <option value="">Rôle</option>
                    <?php foreach($objJobs as $jobs){?>
                        <option value="<?= $jobs->getId() ?>" <?= ($jobs->getId() === (int)$arrPost['job'])? "selected" : "" ?>><?= $jobs->getNameJob() ?></option>
                    <?php } ?>
                </select>
            </div>
            <a href="/Projet2/index.php?ctrl=person&action=person&id=<?= $objPerson->getId() ?>" class="col-12 col-md-2 p-1 nav-link">
                Réinitialiser
            </a>
            <button type="submit" class="col-12 col-md-2 p-1 nav-link">
                Recherche
            </button>
        </form>
        <div class="row p-3 scrollList">

            <?php
                foreach($objContent as $objMovie){
                include("views/_partial/movieOfPerson.php");
                }
            ?>

        </div>

    </div>
</section>
