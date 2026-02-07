{extends file="views/layout_view.tpl"}
{block name="title" prepend}Ajouter un film{/block}
{block name="description"}Ici vous pouvez ajouter un film !{/block}

{block name="css_variation"}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide-core.min.css">
    <link rel="stylesheet" href="/Projet2/assets/css/slideMovie.css">
{/block}

{block name="content"}
<section id="user" class="container py-2">
    <div class="col-12 row text-center align-items-center text-md-start py-2 mx-auto">
        <div class="col-6 col-md-3 col-lg-2 mx-auto ">
            <img src="{$objUser->getPhoto()}" alt="image de profil" class="img-fluid">
        </div>
        <div class="col-12 col-md-9 col-lg-10 ">
            <h1>{$objUser->getPseudo()}</h1>
            <p>{$objUser->getBio()}</p>
            {if isset($smarty.session.user) && $smarty.session.user.user_id == $smarty.get.id}
                <a href="index.php?ctrl=user&action=settingsUser">Gestion du Compte</a>
            {/if}
            {if isset($smarty.session.user) && $smarty.session.user.user_id == $smarty.get.id && $objUser->getFunction() === "Administrator"}
                <a class="ms-2" href="index.php?ctrl=admin&action=dashboard">Dashboard</a>
            {/if}

            <span class="spanMovie d-block py-1 border-0">{$objUser->getFunction()}</span>
        </div>
    </div>

    <div class="col-12 py-2">
        <div class="like py-3 col-12">
            <span class="spanMovie d-block col-12">Film Liker</span>
            <div class="splide py-2">
              <div class="splide__track">
                <ul class="splide__list">
                    {foreach from=$arrMovieToDisplay item=objLike}
                        {include file="views/_partial/likeUser.tpl"}
                    {foreachelse}
                        <h3 class="mx-auto py-2">Cette utilisateur ne posséde aucun like !</h3>
                    {/foreach}
                </ul>
              </div>
            </div>
        </div>
    </div>
</section>

<section id="review" class="container text-center">
    <h2>Vos review / {$objUser->getPseudo()}</h2>
    <div class="col-12 col-md-10 mx-auto py-1 scrollList">
        {foreach $arrCommentToDisplay as $review}
            {include file="views/_partial/reviewMovie.tpl"}
        {/foreach}
    </div>
</section>


{/block}

{block name="js"}
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.5.3/dist/js/splide-extension-auto-scroll.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="/Projet2/assets/js/moviePage.js"></script>
    <script src="/Projet2/assets/js/comment.js"></script>
    <script src="/Projet2/assets/js/star.js"> </script>
{/block}
