
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
                <select class="form-select">
                    <option value="">Date</option>
                    <option value="usa">Croissant</option>
                    <option value="france">Decroissant</option>
                </select>
            </div>
            <div class="col-5 col-md-4">
                <select class="form-select" >
                    <option value="">Popularité</option>
                    <option value="usa">Moin Populaire</option>
                    <option value="france">Plus Populaire</option>
                </select>
            </div>
            <button type="submit" class="btn p-0 border-0 bg-transparent col-2 col-md-4 text-end" id="send">
              <i class="bi bi-arrow-clockwise fs-2"></i>
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