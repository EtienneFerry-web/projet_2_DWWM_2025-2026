<div class="row py-3 border-bottom border-dark">
    <div class="col-3 my-auto">
        <a href="index.php?ctrl=movie&action=movie&id={$review->getId()}">
            <img src="{$review->getUrl()}" alt="couverture de film" class="img-fluid">
        </a>
    </div>
    <div class="col-9 d-flex flex-column text-start py-5 comment-content">
        <h3>{$review->getTitle()}</h3>
        <p>{$review->getComment()}</p>
        <span class="pageMovieNote spanMovie d-block text-start mt-auto" data-note="{$review->getRating()}">
            <span class="stars"></span>
            <span class="note">{$review->getRating()}</span>
        </span>
        <form method="post">
            <input type="radio" class="btn-check" name="searchBy" value="{$review->getId()}" id="filter-like-{$review->getId()}" onchange="this.form.submit()">
            <label class="form-label" for="filter-like-{$review->getId()}">
                <i class="bi bi-heart-fill"></i><span> {$review->getLike()} </span>
            </label>
        </form>
        <div class="row align-items-center ">
            <span class="spanMovie d-block col-6">{$review->getDateFormat()}</span>
            {if isset($smarty.session.user) && $smarty.session.user.user_id == $smarty.get.id}
                <form method="post" class="d-block ms-auto col-auto">
                    <input type="radio" class="btn-check" name="deleteComment" value="{$review->getId()}" id="filter-report" onchange="this.form.submit()">
                    <label class="form-label m-0" for="filter-report">Supprimer</label>
                </form>
                <div class="d-block text-end col-auto">
                    <button
                      type="button"
                      class="spanMovie border-0 edit-comment"
                      data-id="{$review->getId()}"
                    >
                      Modifier
                    </button>
                </div>
            {else}
                <form method="post" class="d-block ms-auto col-auto">
                    <input type="radio" class="btn-check" name="searchBy" value="{$review->getId()}" id="filter-report-{$review->getId()}" onchange="this.form.submit()">
                    <label class="form-label" for="filter-report-{$review->getId()}">Signaler</label>
                </form>
            {/if}
        </div>
    </div>
</div>
