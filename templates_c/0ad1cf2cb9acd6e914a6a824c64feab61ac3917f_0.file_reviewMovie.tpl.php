<?php
/* Smarty version 5.7.0, created on 2026-02-24 07:34:43
  from 'file:views/_partial/reviewMovie.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_699d549379af75_40607510',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0ad1cf2cb9acd6e914a6a824c64feab61ac3917f' => 
    array (
      0 => 'views/_partial/reviewMovie.tpl',
      1 => 1771860012,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_699d549379af75_40607510 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views/_partial';
?><div class="row py-3 border-bottom border-dark position-relative">
    <?php if ($_smarty_tpl->getValue('review')->getSpoiler() == 1) {?>
        <div class="comment-spoiler" id="spoiler">
            <h3 class="border-0">Anti-Spoiler</h3>
            <p>Attention ce commentaire contient un spoiler !</p>
            <h4>Cliquez pour voir le commentaire !</h4>
        </div>
    <?php }?>

    <div class="col-3 my-auto">
        <a id="movie" data-movie="<?php echo $_smarty_tpl->getValue('review')->getMovieId();?>
" href="index.php?ctrl=movie&action=movie&id=<?php echo $_smarty_tpl->getValue('review')->getMovieId();?>
">
            <img src="<?php echo $_smarty_tpl->getValue('review')->getPhoto();?>
" alt="couverture de film" class="img-fluid border-0">
        </a>
    </div>

    <div class="col-9 d-flex flex-column text-start py-3">
        <h3><?php echo $_smarty_tpl->getValue('review')->getTitle();?>
</h3>

        <div class="editable-content d-flex flex-column h-100" id="comment-container-<?php echo $_smarty_tpl->getValue('review')->getId();?>
">

            <div class="flex-grow-1 py-3">
                <p class="comment-text"><?php echo $_smarty_tpl->getValue('review')->getComment();?>
</p>

                <span class="pageMovieNote spanMovie d-block text-start" data-note="<?php echo $_smarty_tpl->getValue('review')->getRating();?>
">
                    <span class="stars"></span>
                    <span class="note note-display"><?php echo $_smarty_tpl->getValue('review')->getRating();?>
</span>
                </span>

                <form method="post" class="mt-2">
                    <input type="hidden"  name="likeReviewBtn" value="<?php echo $_smarty_tpl->getValue('review')->getId();?>
">

                    <button type="submit" class="border-0 bg-transparent p-0 text-decoration-none" name="">
                        <label class="form-label" style="cursor:pointer;">
                        <?php if ($_smarty_tpl->getValue('review')->getUser_liked()) {?>
                            <i class="bi bi-heart-fill"></i>
                        <?php } else { ?>
                            <i class="bi bi-heart"></i>
                        <?php }?>
                            <span class="like-count"> <?php echo $_smarty_tpl->getValue('review')->getLike();?>
</span>
                        </label>
                     </button>
                    

                    <!--<label class="form-label" for="filter-like-<?php echo $_smarty_tpl->getValue('review')->getId();?>
">
                        <i class="bi bi-heart-fill"></i><span>  </span>
                    </label>-->
                </form>
            </div>

            <div class="row align-items-center pt-3">
                <span class="spanMovie d-block col-6"><?php echo $_smarty_tpl->getValue('review')->getDateFormat();?>
</span>
                <?php if ((true && (true && null !== ($_SESSION['user'] ?? null))) && $_SESSION['user']['user_funct_id'] != 1 && $_SESSION['user']['user_id'] != $_GET['id']) {?>
                    <form method="post" class="d-block ms-auto col-auto">
                        <input type="radio" class="btn-check" name="spoiler" value="<?php echo $_smarty_tpl->getValue('review')->getId();?>
" id="filter-spoiler-<?php echo $_smarty_tpl->getValue('review')->getId();?>
" onchange="this.form.submit()">
                        <label class="form-label m-0" for="filter-spoiler-<?php echo $_smarty_tpl->getValue('review')->getId();?>
"><i class="bi bi-eye<?php if ($_smarty_tpl->getValue('review')->getSpoiler() == 1) {?>-slash<?php }?> fs-2"></i></label>
                    </form>
                    <form method="post" class="d-block col-auto">
                        <input type="radio" class="btn-check" name="deleteComment"
                               value="<?php echo $_smarty_tpl->getValue('review')->getId();?>
"
                               id="filter-delete-<?php echo $_smarty_tpl->getValue('review')->getId();?>
"
                               onchange="if(confirm('Voulez-vous vraiment supprimer ce commentaire ?')) { this.form.submit(); } else { this.checked = false; }">
                        <label class="form-label m-0" for="filter-delete-<?php echo $_smarty_tpl->getValue('review')->getId();?>
"><i class="bi bi-trash3 fs-3"></i></label>
                    </form>
                <?php } elseif ((true && (true && null !== ($_SESSION['user'] ?? null))) && $_SESSION['user']['user_id'] == $_GET['id']) {?>
                    <form method="post" class="d-block ms-auto col-auto"
                            onsubmit="return confirm('Voulez-vous vraiment supprimer ce commentaire ?')">
                        <button type="submit" name="deleteComment" value="<?php echo $_smarty_tpl->getValue('review')->getId();?>
"
                                class="border-0 bg-transparent p-0">
                            <i class="bi bi-trash3 fs-3"></i>
                        </button>
                    </form>
                    <div class="d-block text-end col-auto">
                        <button type="button" class="spanMovie border-0 edit-comment bg-transparent" onclick="enableEdit('<?php echo $_smarty_tpl->getValue('review')->getId();?>
')">
                            <i class="bi bi-pencil-square fs-3"></i>
                        </button>
                    </div>
                <?php } else { ?>
                    <?php if ($_smarty_tpl->getValue('review')->getReported() == 0) {?>
                    <button class="border-0 bg-transparent text-end col-6 pe-3" data-bs-toggle="modal" data-bs-target="#reportModal-review-<?php echo $_smarty_tpl->getValue('review')->getId();?>
">
                        <i class="bi bi-flag fs-3 ms-auto"></i>
                    </button>
                    <div class="modal fade m-auto" id="reportModal-review-<?php echo $_smarty_tpl->getValue('review')->getId();?>
" tabindex="-1">
                        <div class="modal-dialog">
                            <form method="POST" class="modal-content">
                                <input type="hidden" name="commentReportId" value="<?php echo $_smarty_tpl->getValue('review')->getId();?>
 ">
                                <div class="modal-header border-0"">
                                    <h5 class="modal-title">Signaler : <?php echo $_smarty_tpl->getValue('review')->getTitle();?>
 </h5>
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
                    <?php } else { ?>
                    <button class="border-0 bg-transparent text-end col-6 pe-3" data-bs-toggle="modal" data-bs-target="#reportModal-review-<?php echo $_smarty_tpl->getValue('review')->getId();?>
">
                        <i class="bi bi-flag-fill fs-3 ms-auto"></i>
                    </button>
                    <div class="modal fade" id="reportModal-review-<?php echo $_smarty_tpl->getValue('review')->getId();?>
" tabindex="-1">
                        <div class="modal-dialog">
                            <form method="POST" class="modal-content">

                                <div class="modal-header border-0"">
                                    <h5 class="modal-title">Signaler : <?php echo $_smarty_tpl->getValue('review')->getTitle();?>
 </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">
                                    <p>Voulez vous vraiment supprimer votre signalement ?</p>
                                </div>

                                <div class="modal-footer border-0 mx-auto">
                                    <button type="button" class="btn btn-outline-dark px-3" data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" name="repComDelete" value="<?php echo $_smarty_tpl->getValue('review')->getId();?>
" class="btn btn-outline-danger px-3">Supprimer</button>
                                </div>

                            </form>
                        </div>
                    </div>
                    <?php }?>
                <?php }?>
            </div>
        </div>
    </div>
</div>
<?php }
}
