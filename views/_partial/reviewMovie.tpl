<div class="row py-3 border-bottom border-dark">
    <div class="col-3 my-auto">
        <a href="index.php?ctrl=movie&action=movie&id={$review->getId()}">
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

                {if isset($smarty.session.user) && $smarty.session.user.user_id == $smarty.get.id}
                <form method="post" class="d-block ms-auto col-auto">
                    <input type="radio" class="btn-check" name="deleteComment"
                           value="{$review->getId()}"
                           id="filter-delete-{$review->getId()}"
                           onchange="if(confirm('Voulez-vous vraiment supprimer ce commentaire ?')) { this.form.submit(); } else { this.checked = false; }">
                    <label class="form-label m-0" for="filter-delete-{$review->getId()}">Supprimer</label>
                </form>
                    <div class="d-block text-end col-auto">
                        <button type="button" class="spanMovie border-0 edit-comment" onclick="enableEdit('{$review->getId()}')">
                            Modifier
                        </button>
                    </div>
                {else}
                    <form method="post" class="d-block ms-auto col-auto">
                        <input type="radio" class="btn-check" name="searchBy" value="{$review->getId()}" id="filter-report-{$review->getId()}" onchange="this.form.submit()">
                        <label class="form-label m-0" for="filter-report-{$review->getId()}">Signaler</label>
                    </form>
                {/if}
            </div>
        </div>
    </div>
</div>
