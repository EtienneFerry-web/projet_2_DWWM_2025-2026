<div class="row py-3 border-bottom border-dark">
    <div class="col-3 my-auto">
        <a href="index.php?ctrl=movie&action=movie&id=<?= $review->getId() ?>">
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
        <form method="post">
            <input type="radio" class="btn-check" name="searchBy" value="<?= $review->getId() ?>" id="filter-like" onchange="this.form.submit()">
            <label class="form-label" for="filter-like"><i class="bi bi-heart-fill"></i><span> <?= $review->getLike() ?> </span></label>
        </form>
        <div class="row align-items-center ">
            <span class="spanMovie d-block col-6"><?= $review->getDateFormat() ?></span>
            <form method="post" class="d-block text-end col-6">
                <input type="radio" class="btn-check" name="searchBy" value="<?= $review->getId() ?>" id="filter-report" onchange="this.form.submit()">
                <label class="form-label" for="filter-report">Signaler</label>
            </form>
        </div>
    </div>
</div>
