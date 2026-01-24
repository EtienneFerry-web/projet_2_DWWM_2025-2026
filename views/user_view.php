
<section id="user" class="container py-2">
    <div class="col-12 row text-center align-items-center text-md-start py-2 mx-auto">
        <div class="col-6 col-md-3 col-lg-2 mx-auto ">
            <img src="<?= $objUser->getPhoto() ?>" alt="image de profil" class="img-fluid">
        </div>
        <div class="col-12 col-md-9 col-lg-10 ">
            <h1><?= $objUser->getPseudo() ?></h1>
            <p><?= $objUser->getBio() ?></p>
            <?= (isset($_SESSION['user']) && $_SESSION['user']['user_id'] == $_GET['id'] )? "<a href='index.php?ctrl=user&action=settingsUser'>Gestion du Compte</a>": "" ?>
            <?=(isset($_SESSION['user']) && $_SESSION['user']['user_id'] == $_GET['id'] && $objUser->getFunction() === "Administrator")? "<a class='ms-2' href='index.php?ctrl=admin&action=dashboard'>Dashboard</a>": "" ?>
            <span class="spanMovie d-block py-1 border-0"><?= $objUser->getFunction() ?></span>
        </div>
    </div>
    <div class="col-12  py-2">
        <div class="like py-3 col-12">
            <span class="spanMovie d-block col-12">Film Liker</span>
            <div class="splide py-2">
              <div class="splide__track">
                <ul class="splide__list">
                    <?php
                        foreach($objContent as $objLike){
                            include("views/_partial/likeUser.php");
                        }
                    ?>
                </ul>
              </div>
            </div>
        </div>
</section>
<section id="review" class="container text-center">
    <h2>Vos review / pseudo</h2>
    <div class="col-12 col-md-10 mx-auto py-1 scrollList">
        <?php
            foreach($objComment as $review){
                include("views/_partial/reviewMovie.php");
            }
        ?>
    </div>
</section>
