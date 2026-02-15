<div class="comment my-5">
        {if $comment->getSpoiler() == 1}
            <div class="comment-spoiler" id="spoiler">
                <h3 class="border-0">Anti-Spoiler</h3>
                <p>Attention ce commentaire contient un spoiler !</p>
                <h4>Cliquez pour voir le commentaire !</h4>
            </div>
        {/if}
        <div class="row align-items-center">
            <div class="rounded-circle col-auto">
                <img src="assets/img/{$comment->getUrl()}"
                    class="rounded-circle border"
                    style="width: 40px; height: 40px; object-fit: cover;"
                    alt="Avatar">
            </div>
            <span class="spanMovie col-auto p-0"><a href="index.php?ctrl=user&action=user&id={$comment->getUser_id()}">{$comment->getPseudo()}</a></span>
            <span class="pageMovieNote spanMovie col-auto ms-auto" data-note="{$comment->getRating()}">
                <span class="stars d-block"></span>
            </span>

        </div>
        <p>
            {$comment->getComment()}
        </p>

        <div class="col-1">
            <form method="post" action="" class="js-like-form">

                <input type="hidden" name="likeCommentBtn" value="{$comment->getId()}">

                <button type="submit" class="border-0 bg-transparent p-0 text-decoration-none" name="">
                    <label class="form-label" style="cursor:pointer;">
                    {if $comment->getUser_liked()}
                        <i class="bi bi-heart-fill"></i>
                    {else}
                        <i class="bi bi-heart"></i>
                    {/if}
                        <span class="like-count"> {$comment->getLike()}</span>
                    </label>
                </button>
            </form>
        </div>

        <div class="row align-items-center ">
            <span class="spanMovie d-block col-6 me-auto">{$comment->getDateFormat()}</span>
            {if isset($smarty.session.user) && $smarty.session.user.user_funct_id == 1}
                {if $comment->getReported() == 0}
                <button class="border-0 bg-transparent text-end col-6 pe-3" data-bs-toggle="modal" data-bs-target="#reportModal-review-{$comment->getId()}">
                    <i class="bi bi-flag fs-3 ms-auto"></i>
                </button>
                <div class="modal fade" id="reportModal-review-{$comment->getId()}" tabindex="-1">
                    <div class="modal-dialog">
                        <form method="POST" class="modal-content">
                            <input type="hidden" name="commentReportId" value="{$comment->getId()} ">
                            <div class="modal-header border-0"">
                                <h5 class="modal-title">Signaler : {$comment->getPseudo()} </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                <p>Pour que votre signalement sois prit en charge veuillez renseigner la raison !</p>
                                <textarea name="commentReport" class="form-control" placeholder="Raison du signalement..."></textarea>
                            </div>

                            <div class="modal-footer border-0 mx-auto">
                                <button type="button" class="btn btn-outline-dark px-3" data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-outline-success px-3">Validez</button>
                            </div>

                        </form>
                    </div>
                </div>
                {else}
                <button class="border-0 bg-transparent text-end col-6 pe-3" data-bs-toggle="modal" data-bs-target="#reportModal-review-{$comment->getId()}">
                    <i class="bi bi-flag-fill fs-3 ms-auto"></i>
                </button>
                <div class="modal fade" id="reportModal-review-{$comment->getId()}" tabindex="-1">
                    <div class="modal-dialog">
                        <form method="POST" class="modal-content">

                            <div class="modal-header border-0"">
                                <h5 class="modal-title">Signaler : {$comment->getPseudo()} </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                <p>Voulez vous vraiment supprimer votre signalement ?</p>
                            </div>

                            <div class="modal-footer border-0 mx-auto">
                                <button type="button" class="btn btn-outline-dark px-3" data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" name="repComDelete" value="{$comment->getId()}" class="btn btn-outline-danger px-3">Supprimer</button>
                            </div>

                        </form>
                    </div>
                </div>
                {/if}
            {elseif isset($smarty.session.user) && $smarty.session.user.user_funct_id != 1}
                <form method="post" class="d-block ms-auto col-auto">
                    <input type="radio" class="btn-check" name="spoiler" value="{$comment->getId()}" id="filter-spoiler-{$comment->getId()}" onchange="this.form.submit()">
                    <label class="form-label m-0" for="filter-spoiler-{$comment->getId()}"><i class="bi bi-eye{if $comment->getSpoiler() == 1}-slash{/if} fs-2"></i></label>
                </form>
                <form method="post" class="d-block col-auto">
                    <input type="radio" class="btn-check" name="deleteComment"
                            value="{$comment->getId()}"
                            id="filter-delete-{$comment->getId()}"
                            onchange="if(confirm('Voulez-vous vraiment supprimer ce commentaire ?')) { this.form.submit(); } else { this.checked = false; }">
                    <label class="form-label m-0" for="filter-delete-{$comment->getId()}"><i class="bi bi-trash3 fs-3"></i></label>
                </form>
            {/if}
        </div>

</div>
