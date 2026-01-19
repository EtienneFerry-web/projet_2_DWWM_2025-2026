<div class="row py-2 ">
    <div class="col-3 my-auto">
        <a href="index.php?ctrl=content&action=movie&id=<?= $review->getId() ?>">
            <img src="<?= $review->getUrl() ?>" alt="couverture de film" class="img-fluid">
        </a>
    </div>
    <div class="col-9 d-flex flex-column text-start py-5">
        <h3><?= $review->getTitle() ?></h3>
        <p><?= $review->getComment() ?></p>
        <span class="pageMovieNote spanMovie d-block text-start mt-auto" data-note="<?= $review->getRating() ?>">
            <span class="stars"></span>
            <span class="note"><?= $review->getRating() ?></span>
        </span>
        <span class="spanMovie"><?= $review->getDateFormat() ?></span>
    </div>
</div>
