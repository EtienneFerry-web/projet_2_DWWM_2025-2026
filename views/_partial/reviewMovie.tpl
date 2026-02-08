<div class="row py-3 border-bottom border-dark position-relative">
    {if $review->getSpoiler() == 1}
        <div class="comment-spoiler" id="spoiler">
            <h3 class="border-0">Anti-Spoiler</h3>
            <p>Attention ce commentaire contient un spoiler !</p>
            <h4>Cliquez pour voir le commentaire !</h4>
        </div>
    {/if}

    <div class="col-3 my-auto">
        <a id="movie" data-movie="{$review->getMovieId()}" href="index.php?ctrl=movie&action=movie&id={$review->getMovieId()}">
            <img src="{$review->getUrl()}" alt="couverture de film" class="img-fluid">
        </a>
    </div>

    <div class="col-9 d-flex flex-column text-start py-3">
        <h3>{$review->getTitle()}</h3>

        <div class="editable-content d-flex flex-column h-100" id="comment-container-{$review->getId()}">

            <div class="flex-grow-1 py-3">
                <p class="comment-text">{$review->getComment()}</p>

                <span class="pageMovieNote spanMovie d-block text-start" data-note="{$review->getRating()}">
                    <span class="stars"></span>
                    <span class="note note-display">{$review->getRating()}</span>
                </span>

                <form method="post" class="mt-2">
                    <input type="radio" class="btn-check" name="searchBy" value="{$review->getId()}" id="filter-like-{$review->getId()}" onchange="this.form.submit()">
                    <label class="form-label" for="filter-like-{$review->getId()}">
                        <i class="bi bi-heart-fill"></i><span> {$review->getLike()} </span>
                    </label>
                </form>
            </div>

            <div class="row align-items-center pt-3">
                <span class="spanMovie d-block col-6">{$review->getDateFormat()}</span>
                {if isset($smarty.session.user) && $smarty.session.user.user_funct_id != 1 && $smarty.session.user.user_id != $smarty.get.id}
                    <form method="post" class="d-block ms-auto col-auto">
                        <input type="radio" class="btn-check" name="spoiler" value="{$review->getId()}" id="filter-spoiler-{$review->getId()}" onchange="this.form.submit()">
                        <label class="form-label m-0" for="filter-spoiler-{$review->getId()}"><i class="bi bi-eye{if $review->getSpoiler() == 1}-slash{/if} fs-2"></i></label>
                    </form>
                    <form method="post" class="d-block col-auto">
                        <input type="radio" class="btn-check" name="deleteComment"
                               value="{$review->getId()}"
                               id="filter-delete-{$review->getId()}"
                               onchange="if(confirm('Voulez-vous vraiment supprimer ce commentaire ?')) { this.form.submit(); } else { this.checked = false; }">
                        <label class="form-label m-0" for="filter-delete-{$review->getId()}"><i class="bi bi-trash3 fs-3"></i></label>
                    </form>
                {elseif isset($smarty.session.user) && $smarty.session.user.user_id == $smarty.get.id}
                    <form method="post" class="d-block ms-auto col-auto"
                            onsubmit="return confirm('Voulez-vous vraiment supprimer ce commentaire ?')">
                        <button type="submit" name="deleteComment" value="{$review->getId()}"
                                class="border-0 bg-transparent p-0">
                            <i class="bi bi-trash3 fs-3"></i>
                        </button>
                    </form>
                    <div class="d-block text-end col-auto">
                        <button type="button" class="spanMovie border-0 edit-comment bg-transparent" onclick="enableEdit('{$review->getId()}')">
                            <i class="bi bi-pencil-square fs-3"></i>
                        </button>
                    </div>
                {else}
                <form method="post" class="d-block ms-auto col-auto">
                    <button type="submit" name="searchBy" value="{$review->getId()}"
                            class="border-0 bg-transparent p-0">
                        <i class="bi bi-flag fs-3"></i>
                    </button>
                </form>
                {/if}
            </div>
        </div>
    </div>
</div>
