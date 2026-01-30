<div class="comment my-5">
    <div class="row align-items-center">
        <span class="spanMovie col-auto"><a href="index.php?ctrl=user&action=user&id=<?= $comment->getUser_id() ?>"><?= $comment->getPseudo() ?></a></span>
        <span class="pageMovieNote spanMovie col-auto ms-auto" data-note="<?= $comment->getRating() ?>">
            <span class="stars d-block"></span>
        </span>

    </div>
    <p>
        <?= $comment->getComment() ?>
    </p>
    <form method="post">
        <input type="radio" class="btn-check" name="searchBy" value="<?= $comment->getId() ?>" id="filter-like" onchange="this.form.submit()">
        <label class="form-label" for="filter-like"><i class="bi bi-heart-fill"></i><span> <?= $comment->getLike() ?> </span></label>
    </form>

    <div class="row align-items-center ">
        <span class="spanMovie d-block col-6"><?= $comment->getDateFormat() ?></span>
        <form method="post" class="d-block text-end col-6">
            <input type="radio" class="btn-check" name="searchBy" value="<?= $comment->getId() ?>" id="filter-report" onchange="this.form.submit()">
            <label class="form-label" for="filter-report">Signaler</label>
        </form>

    </div>
</div>
