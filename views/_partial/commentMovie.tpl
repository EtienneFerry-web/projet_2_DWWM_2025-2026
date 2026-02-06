<div class="comment my-5">
        {if $comment->getSpoiler() == 1}
            <div class="comment-spoiler" id="spoiler">
                <h3 class="border-0">Anti-Spoiler</h3>
                <p>Attention ce commentaire contient un spoiler !</p>
                <h4>Cliquez pour voir le commentaire !</h4>
            </div>
        {/if}
        <div class="row align-items-center">
            <span class="spanMovie col-auto"><a href="index.php?ctrl=user&action=user&id={$comment->getUser_id()}">{$comment->getPseudo()}</a></span>
            <span class="pageMovieNote spanMovie col-auto ms-auto" data-note="{$comment->getRating()}">
                <span class="stars d-block"></span>
            </span>

        </div>
        <p>
            {$comment->getComment()}
        </p>
        <form method="post" class="col-1">
            <input type="radio" class="btn-check" name="searchBy" value="{$comment->getId()}" id="filter-like" onchange="this.form.submit()">
            <label class="form-label" for="filter-like"><i class="bi bi-heart-fill"></i><span> {$comment->getLike()} </span></label>
        </form>

        <div class="row align-items-center ">
            <span class="spanMovie d-block col-6 me-auto">{$comment->getDateFormat()}</span>
            <form method="post" class="d-block text-end col-auto">
                <input type="radio" class="btn-check" name="searchBy" value="{$comment->getId()}" id="filter-report" onchange="this.form.submit()">
                <label class="form-label" for="filter-report"><i class="bi bi-flag fs-3"></i></label>
            </form>
            {if isset($smarty.session.user) && $smarty.session.user.user_funct_id != 1}
                <form method="post" class="d-block text-end col-auto">
                    <input type="radio" class="btn-check" name="spoiler" value="{$comment->getId()}" id="filter-spoiler-{$comment->getId()}" onchange="this.form.submit()">
                    <label class="form-label" for="filter-spoiler-{$comment->getId()}"><i class="bi bi-eye{if $comment->getSpoiler() == 1}-slash{/if} fs-2"></i></label>
                </form>
            {/if}
        </div>

</div>
