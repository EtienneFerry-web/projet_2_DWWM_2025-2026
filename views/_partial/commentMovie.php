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
    <div>
        <span class="spanMovie"><?= $comment->getDateFormat() ?></span>
    </div>
</div>
