<div class="row py-2">
    <div class="col-4 text-center my-auto">
        <a href="index.php?ctrl=movie&action=movie&id=<?= $objMovie->getId() ?>"><img src="<?= $objMovie->getUrl() ?>" alt="" class="img-fluid"></a>
    </div>
    <div class="col-8 text-start">
        <a href="index.php?ctrl=movie&action=movie&id=<?= $objMovie->getId() ?>" class="link"><h2><?= $objMovie->getTitle() ?></h2></a>
        <p><?= $objMovie->getDescription() ?></p>
        <span class="pageMovieNote spanMovie" data-note="<?= $objMovie->getRating() ?>">
            <span class="stars d-inline-block"></span>
            <span class="note d-inline-block"><?= $objMovie->getRating() ?></span>
        </span>

        <span class="movieLikes py-2 d-flex gap-1 spanMovie">
            <i class="bi bi-heart-fill"></i><span><?= $objMovie->getLike() ?></span>
        </span>
    </div>
</div>
