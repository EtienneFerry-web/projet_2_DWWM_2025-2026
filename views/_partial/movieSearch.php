
<?php if((string)$content->getType() === "movie") { ?>
    <div class="row py-2">
        <div class="col-4 text-center my-auto">
            <a href="index.php?ctrl=movie&action=movie&id=<?= $content->getId() ?>"><img src="<?= $content->getPhoto() ?>" alt="" class="img-fluid"></a>
        </div>
        <div class="col-8 text-start">
            <a href="index.php?ctrl=movie&action=movie&id=<?= $content->getId() ?>" class="link"><h2><?= $content->getName() ?></h2></a>
            <p><?= $content->getContent() ?></p>
            <span class="pageMovieNote spanMovie" data-note="<?= $content->getRating() ?>">
                <span class="stars d-inline-block"></span>
                <span class="note d-inline-block"><?= $content->getRating() ?></span>
            </span>

            <span class="movieLikes py-2 d-flex gap-1 spanMovie">
                <i class="bi bi-heart-fill"></i><span><?= $content->getLike() ?></span>
            </span>
            <span class="spanMovie text-uppercase">Film</span>
        </div>
    </div>
<?php } elseif((string)$content->getType() === "user") { ?>
    <div class="row py-2">
        <div class="col-4 text-center my-auto">
            <a href="index.php?ctrl=user&action=user&id=<?= $content->getId() ?>"><img src="<?= $content->getPhoto() ?>" alt="" class="img-fluid"></a>
        </div>
        <div class="col-8 text-start">
            <a href="index.php?ctrl=user&action=user&id=<?= $content->getId() ?>" class="link"><h2><?= $content->getName() ?></h2></a>
            <p><?= $content->getContent() ?></p>
            <span class="spanMovie text-uppercase">Utilisateur</span>
        </div>
    </div>
<?php } else { ?>
    <div class="row py-2">
        <div class="col-4 text-center my-auto">
            <a href="index.php?ctrl=person&action=person&id=<?= $content->getId() ?>"><img src="<?= $content->getPhoto() ?>" alt="" class="img-fluid"></a>
        </div>
        <div class="col-8 text-start">
            <a href="index.php?ctrl=person&action=person&id=<?= $content->getId() ?>" class="link"><h2><?= $content->getName() ?></h2></a>
            <p><?= $content->getContent() ?></p>
            <span class="spanMovie text-uppercase">Personnalité</span>
        </div>
    </div>
<?php }  ?>
