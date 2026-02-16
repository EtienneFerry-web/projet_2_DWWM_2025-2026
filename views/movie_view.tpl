{extends file="views/layout_view.tpl"}
{block name="title" prepend}{$objMovie->getTitle()}{/block}
{block name="description"}bienvenue sur notre accueil !!!!{/block}

{block name="css_variation"}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide-core.min.css">
<link rel="stylesheet" href="/Projet2/assets/css/slideMovie.css">
{/block}

{block name="content"}
<section class="container row mx-auto" id="movie">
    <div class="col-12 col-md-4 py-1 py-md-5 text-center">
        <h1 class="d-block d-md-none">{$objMovie->getTitle()}</h1>
        <img src="{$objMovie->getPhoto()}" alt="" class="img-fluid w-75 w-md-50">
        <div class="py-3 text-center w-75 w-md-50 mx-auto">
        <span class="pageMovieNote spanMovie" data-note="{$objMovie->getRating()}">
            <span class="stars d-inline-block"></span>
            <span class="note d-inline-block" id="average" >{$objMovie->getRating()}</span>
        </span>
        <span class="movieLikes py-2 d-flex gap-1 spanMovie justify-content-center border-0 bg-transparent w-100 p-0 text-reset"><i class="bi bi-heart-fill me-1"></i> {$objMovie->getLike()}</span>
</div>
</div>
    <div class="col-12 col-md-8 py-1 py-md-5 text-center text-md-start">
        <h1 class="d-md-block d-none">{$objMovie->getTitle()}</h1>
        <span class=" spanMovie d-block py-2"> Durée : {$objMovie->getLength()}</span>
        <span class=" spanMovie d-block py-2"> Date de sortie : {$objMovie->getDateFormat()} </span>
        <p>{$objMovie->getDescription()}</p>
        <div class="col-12 col-md-8 py-2 row" >

            <span class=" spanMovie d-block py-2"> Film : {$objMovie->getCountry()}</span>


            <div class="row col-12 py-4 text-center text-md-start">
                <h3>Casting</h3>
                {foreach from=$arrPersToDisplay item=objPerson}
                    <a class="spanMovie d-block col-4" href="index.php?ctrl=person&action=person&id={$objPerson->getId()}"> {$objPerson->getFullName()}</a>
                {/foreach}
            </div>
            <div class="d-flex align-item-center gap-2">
                <a href="{$objMovie->getTrailer()}" target="blank" class="py-2 spanMovie d-block link"> Voir le trailer &#8599;</a>
                <a id="shareMovie" class="py-2 spanMovie d-block link">Partager &#8599;</a>
            </div>

        </div>
        {if isset($smarty.session.user)}
        <form method="POST" class="d-inline">
            <input type="hidden" name="likeMovieBtn" value="{$objMovie->getId()}">

            <button type="submit"
                    name=""
                    value=""
                    class="movieLikes py-2 d-flex gap-1 spanMovie justify-content-center border-0 bg-transparent p-0 text-reset"
                    style="cursor: pointer;"
                    > Liker :
            {if $objMovie->getUser_liked()}
                <i class="bi bi-heart-fill"></i>
            {else}
                <i class="bi bi-heart"></i>
            {/if}

            </button>
        </form>

        <form method="post">
            <div class="row align-items-center">
                <div class="col-md-8 rating user-select-none text-center text-md-start py-2">
                    <span class="spanMovie">Votre Note :
                    <!--Data value for ,5 with double click-->
                    <i class="bi bi-star" data-value="1"></i>
                    <i class="bi bi-star" data-value="2"></i>
                    <i class="bi bi-star" data-value="3"></i>
                    <i class="bi bi-star" data-value="4"></i>
                    <i class="bi bi-star" data-value="5"></i>
                    </span>
                    <!--input value for rating score-->
                    <input type="hidden" name="rating" id="note" value="{$objMovie->getNoteUser()}" class="form-control {if isset($arrError['noteRating'])} is-invalid {/if}">

                </div>
            </div>
        </form>
        {/if}
        {if $objMovie->getReported() == 0}
        <button class="border-0 bg-transparent p-0" data-bs-toggle="modal" data-bs-target="#reportModal">
            {if $objMovie->getReported() == 0}<i class="bi bi-flag fs-3"></i>{else} <i class="bi bi-flag-fill fs-3"></i>{/if}
        </button>
        <div class="modal fade" id="reportModal" tabindex="-1">
            <div class="modal-dialog">
                <form method="POST" class="modal-content">

                    <div class="modal-header border-0"">
                        <h5 class="modal-title">Signaler : {$objMovie->getTitle()} </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <p>Pour que votre signalement sois prit en charge veuillez renseigner la raison !</p>
                        <textarea name="repMovie" class="form-control" placeholder="Raison du signalement..."></textarea>
                    </div>

                    <div class="modal-footer border-0 mx-auto">
                        <button type="button" class="btn btn-outline-dark px-3" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-outline-success px-3">Validez</button>
                    </div>

                </form>
            </div>
        </div>
        {else}
        <button class="border-0 bg-transparent p-0" data-bs-toggle="modal" data-bs-target="#reportModal">
            {if $objMovie->getReported() == 0}<i class="bi bi-flag fs-3"></i>{else} <i class="bi bi-flag-fill fs-3"></i>{/if}
        </button>
        <div class="modal fade" id="reportModal" tabindex="-1">
            <div class="modal-dialog">
                <form method="POST" class="modal-content">

                    <div class="modal-header border-0"">
                        <h5 class="modal-title">Signaler : {$objMovie->getTitle()} </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <p>Voulez vous vraiment supprimer votre signalement ?</p>
                    </div>

                    <div class="modal-footer border-0 mx-auto">
                        <button type="button" class="btn btn-outline-dark px-3" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" name="repDelete" value="delete" class="btn btn-outline-danger px-3">Supprimer</button>
                    </div>

                </form>
            </div>
        </div>
        {/if}
        {if isset($smarty.session.user) && $smarty.session.user.user_funct_id != 1}
        <div class="col-12 text-center text-md-start">
           <a href=""><i class="bi bi-pencil-square fs-3 cursor-pointer"></i></a>
        </div>
        {/if}
    </div>
</section>

{if count($arrImagesToDisplay) > 0}
<section  id="imgMovie" class="container py-5 text-center">
    <h2>Image du film</h2>
    {if count($arrImagesToDisplay) < 20 && isset($smarty.session.user)}
    <form method="post" class="row text-center" enctype="multipart/form-data">
        <div class="col-10 p-2 mx-auto">
            <input type="file" class="form-control" accept="image/*" name="images">
        </div>
        <button type="submit" class="btnCustom py-2 col-10 mx-auto">Enregistrer</button>
    </form>
    {/if}
    <div class="splide">
      <div class="splide__track">
        <ul class="splide__list">
        {foreach from=$arrImagesToDisplay item=objImage}
            <li class="splide__slide">
                <img src="assets/img/movie/{$objImage->getPhoto()}" />
            </li>
          {/foreach}
        </ul>
      </div>
    </div>
</section>
{/if}
{if $curDate->format('Y-m-d') >= $objMovie->getRelease_date()}
    <section id="addComment" class="container text-center py-5">
        <h2>Avis</h2>
        <div class="text-start py-2">
            <form method="post">
                <div class="py-2">
                    <label for="comment" class="form-label fw-bold">Donnez votre avis</label>
                    <textarea
                        id="comment"
                        name="com_comment"
                        class="form-control {if isset($arrError['com_comment'])} is-invalid {/if}"
                        rows="4"
                        placeholder="Écrivez votre commentaire..."
                    ></textarea>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-8 rating user-select-none text-center text-md-start py-2">
                        <span class="spanMovie">Votre Note :
                        <!--Data value for ,5 with double click-->
                        <i class="bi bi-star" data-value="1"></i>
                        <i class="bi bi-star" data-value="2"></i>
                        <i class="bi bi-star" data-value="3"></i>
                        <i class="bi bi-star" data-value="4"></i>
                        <i class="bi bi-star" data-value="5"></i>
                        </span>
                        <!--input value for rating score-->
                        <input type="hidden" name="rating" id="note" value="{$objMovie->getNoteUser()}" class="form-control {if isset($arrError['noteRating'])} is-invalid {/if}">

                    </div>
                    <div class="col-md-4 mw-100 " >
                        <!--On click verify if ratings value > NULL & comment can be empty-->
                        <input type="submit" value="Envoyer" class="btnCustom w-100">
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section id="userComment" class="container py-5">
        <h3 class="py-3">Avis utilisateur</h3>
        <div class="allComment">
                {if count($arrCommentToDisplay) === 0}
                    <h3 class='text-center py-3'>aucun commentaire</h3>
                {else}
                    {foreach from=$arrCommentToDisplay item=comment}
                        {include file="views/_partial/commentMovie.tpl"}
                    {/foreach}
                {/if}
        </div>
    </section>
{else}
    <section class="container text-center py-3">
        <h2>Les commentaire ne sont pas disponible</h2>
        <p class="mx-auto">Les commentaire seront disponible lorsque le film sera sortie!</p>
    </section>

{/if}
{/block}

{block name="js"}
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.5.3/dist/js/splide-extension-auto-scroll.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="/Projet2/assets/js/moviePage.js"></script>
    <script src="/Projet2/assets/js/star.js"> </script>
{/block}
