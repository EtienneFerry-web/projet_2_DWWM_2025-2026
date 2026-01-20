

<section class="container row mx-auto" id="movie">
    <div class="col-12 col-md-4 py-1 py-md-5 text-center">
        <h1 class="d-block d-md-none"><?= $objContent->getTitle() ?></h1>
        <img src="<?= $objContent->getUrl() ?>" alt="" class="img-fluid w-75 w-md-50">
        <div class="py-3 text-center w-75 w-md-50 mx-auto">
            <span class="pageMovieNote spanMovie" data-note="<?= $objContent->getRating() ?>">
                <span class="stars d-inline-block"></span>
                <span class="note d-inline-block"><?= $objContent->getRating() ?></span>
            </span>

            <span class="movieLikes py-2 d-flex gap-1 spanMovie justify-content-center">
                <i class="bi bi-heart-fill"></i><span><?= $objContent->getLike() ?></span>
            </span>
        </div>

    </div>
    <div class="col-12 col-md-8 py-1 py-md-5 text-center text-md-start">
        <h1 class="d-md-block d-none"><?= $objContent->getTitle() ?></h1>

        <span class=" spanMovie d-block py-2"> Date de sortie : <?= $objContent->getDateFormat() ?> </span>

        <p><?= $objContent->getDescription() ?></p>
        <div class="col-12 col-md-8 py-2 row" >

            <span class=" spanMovie d-block py-2"> Film : <?= $objContent->getCountry() ?></span>


            <div class="row col-12 py-4 text-center text-md-start">
                <h3>Casting</h3>
                <?php foreach($objAllPerson as $objPerson){?>
                    <a class="spanMovie d-block col-4" href="index.php?ctrl=person&action=person&id=<?= $objPerson->getId() ?>"><?= $objPerson->getFullName() ?></a>
                <?php } ?>
            </div>
            <a href="<?= $objContent->getTrailer() ?>" target="blank" class="py-2 spanMovie d-block link"> Voir le trailer &#8599;</a>
            <a id="shareMovie" class="py-2 spanMovie d-block link">Partager &#8599;</a>
        </div>
    </div>
</section>
<!--
<section  id="imgMovie" class="container py-5">
    <div class="splide">
      <div class="splide__track">
        <ul class="splide__list">
          <li class="splide__slide">
            <img src="https://dummyimage.com/300x400/000/fff" />
          </li>
          <li class="splide__slide">
            <img src="https://dummyimage.com/500x400/555/fff" />
          </li>
          <li class="splide__slide">
            <img src="https://dummyimage.com/350x400/999/fff" />
          </li>
          <li class="splide__slide">
            <img src="https://dummyimage.com/350x400/999/fff" />
          </li>
          <li class="splide__slide">
            <img src="https://dummyimage.com/350x400/999/fff" />
          </li>
          <li class="splide__slide">
            <img src="https://dummyimage.com/300x400/000/fff" />
          </li>
          <li class="splide__slide">
            <img src="https://dummyimage.com/500x400/555/fff" />
          </li>
          <li class="splide__slide">
            <img src="https://dummyimage.com/350x400/999/fff" />
          </li>
          <li class="splide__slide">
            <img src="https://dummyimage.com/350x400/999/fff" />
          </li>
          <li class="splide__slide">
            <img src="https://dummyimage.com/350x400/999/fff" />
          </li>
        </ul>
      </div>
    </div>
    </section>-->
<section id="addComment" class="container text-center py-5">
    <h2>Avis</h2>
    <div class="text-start py-2">
        <form method="post" class="">
            <div class="py-2">
                <label for="comment" class="form-label fw-bold">Donnez votre avis</label>
                <textarea
                    id="comment"
                    class="form-control"
                    rows="4"
                    placeholder="Écrivez votre commentaire..."
                ></textarea>
            </div>
            <div class="row align-items-center">
                <div class="col-md-8 rating user-select-none text-center text-md-start py-2">
                    <span class="spanMovie">Votre Note :
                    <i class="bi bi-star" data-value="1"></i>
                    <i class="bi bi-star" data-value="2"></i>
                    <i class="bi bi-star" data-value="3"></i>
                    <i class="bi bi-star" data-value="4"></i>
                    <i class="bi bi-star" data-value="5"></i>
                    </span>
                    <input type="hidden" name="note" id="note" value="0">

                </div>
                <div class="col-md-4 mw-100 " >
                    <input type="submit" value="Envoyer" class="btnCustom w-100">
                </div>
            </div>
        </form>
    </div>
</section>
<section id="userComment" class="container py-5">
    <h3 class="py-3">Avis utilisateur</h3>
    <div class="allComment">

        <?php
            if(count($objComment) === 0){
                echo  "<h3 class='text-center py-3'>aucun commantaire</h3>";
            } else {
                foreach($objComment as $comment){
                include("views/_partial/commentMovie.php");
                }
            }
        ?>

    </div>
<<<<<<< HEAD
</section>
=======
</section>
>>>>>>> origin/marco
