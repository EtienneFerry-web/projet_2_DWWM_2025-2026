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
                <img src="assets/img/users/{$objUser->getPhoto()}" alt="image de profil" class="img-fluid">
            </div>
            <div class="col-12 col-md-9 col-lg-10 ">
                <div class="row">
                    <div class="col-10">
                        <h1>{$objUser->getPseudo()}</h1>
                        <p>{$objUser->getBio()}</p>
                    </div>
                    <div class="col-2">
                        <div class="row">
                            <p>{$objStat->getUser_liked()} likes </p>
                            <p>{$objStat->getNbComments()} comments</p>
                        </div>
                    </div>

                </div>
                <div class="row align-items-center g-2">
                    <div class="col-auto">
                        <span class="spanMovie border-0">
                            {$objUser->getFunction()}
                            {if $smarty.session.user.user_id == $objUser->getID()}
                                <a href="index.php?ctrl=user&action=permissions"
                                    class="btn btn-outline-secondary rounded-circle mx-2" data-bs-toggle="tooltip"
                                    data-bs-placement="right" data-bs-title="Consulter mes droits">?</a>
                            {/if}
                        </span>

                    </div>


                    {if isset($smarty.session.user) && $smarty.session.user.user_id == $smarty.get.id}
                        <div class="col-auto ms-auto">
                            <a href="index.php?ctrl=user&action=settingsUser"
                                class="btn btn-outline-primary btn-sm d-flex align-items-center gap-1">
                                <i class="bi bi-gear fs-5"></i><span>Gestion du compte</span>
                            </a>
                        </div>
                    {/if}

                    {if isset($smarty.session.user)
                                                        && $smarty.session.user.user_id == $smarty.get.id
                                                        && $smarty.session.user.user_funct_id != 1}
                    <div class="col-auto">
                        <a href="index.php?ctrl=admin&action=dashboard"
                            class="btn btn-outline-dark btn-sm d-flex align-items-center gap-1">
                            <i class="bi bi-speedometer2 fs-5"></i><span>Dashboard</span>
                        </a>
                    </div>
                {elseif isset($smarty.session.user) && $smarty.session.user.user_id != $smarty.get.id}
                    <div class="col-auto ms-auto">
                        {if $objUser->getReported() == 0}
                            <button class="border-0 bg-transparent p-0" data-bs-toggle="modal" data-bs-target="#reportModal">
                                {if $objUser->getReported() == 0}<i class="bi bi-flag fs-3"></i>
                                {else} <i class="bi bi-flag-fill fs-3"></i>
                                {/if}
                            </button>
                            <div class="modal fade" id="reportModal" tabindex="-1">
                                <div class="modal-dialog">
                                    <form method="POST" class="modal-content">

                                        <div class="modal-header border-0"">
                                <h5 class=" modal-title">Signaler : {$objUser->getPseudo()} </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">
                                    <p>Pour que votre signalement soit prit en charge veuillez renseigner la raison !
                                    </p>
                                    <textarea name="repUser" class="form-control"
                                        placeholder="Raison du signalement..."></textarea>
                                </div>

                                <div class="modal-footer border-0 mx-auto">
                                    <button type="button" class="btn btn-outline-dark px-3"
                                        data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-outline-success px-3">Valider</button>
                                </div>

                            </form>
                        </div>
                    </div>
                    {else}
                    <button class="border-0 bg-transparent p-0" data-bs-toggle="modal" data-bs-target="#reportModal">
                        {if $objUser->getReported() == 0}<i class="bi bi-flag fs-3"></i>{else} <i
                            class="bi bi-flag-fill fs-3"></i>{/if}
                    </button>
                    <div class="modal fade" id="reportModal" tabindex="-1">
                        <div class="modal-dialog">
                            <form method="POST" class="modal-content">

                                <div class="modal-header border-0"">
                                                                                                        <h5 class="
                                    modal-title">
                                            Signaler :
                                            {$objUser->getPseudo()}
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <div class="modal-body">
                                            <p>Voulez-vous vraiment supprimer votre signalement ?</p>
                                        </div>

                                        <div class="modal-footer border-0 mx-auto">
                                            <button type="button" class="btn btn-outline-dark px-3"
                                                data-bs-dismiss="modal">Annuler</button>
                                            <button type="submit" name="repDelete" value="delete"
                                                class="btn btn-outline-danger px-3">Supprimer</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        {/if}
                    </div>
                {/if}
            </div>
        </div>
    </div>

    <div class="col-12 py-2">
        <div class="like py-3 col-12">
            <span class="spanMovie d-block col-12">Films Likés</span>
            <div class="splide py-2">
                <div class="splide__track">
                    <ul class="splide__list">
                        {foreach from=$arrMovieToDisplay item=objLike}
                            {include file="views/_partial/likeUser.tpl"}
                        {foreachelse}
                            <h3 class="mx-auto py-2">Cet utilisateur ne posséde aucun like !</h3>
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
        {foreachelse}
            <div class="col-12 text-center py-3">
                <h3 class="border-0">Cet Utilisateur n'a pas de review</h3>
            </div>
        {/foreach}
    </div>
</section>


{/block}

{block name="js"}
    <script
        src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.5.3/dist/js/splide-extension-auto-scroll.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/Projet2/assets/js/moviePage.js"></script>
    <script src="/Projet2/assets/js/comment.js"></script>
    <script src="/Projet2/assets/js/star.js"> </script>
    <script src="/Projet2/assets/js/permission.js"> </script>
{/block}