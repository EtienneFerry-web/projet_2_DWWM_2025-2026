<?php
/* Smarty version 5.7.0, created on 2026-02-20 08:33:54
  from 'file:views/_partial/commentMovie.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_69981c727af843_91276084',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c8cea22af4239486b7a8ba0d2ad5f213c68ae3cb' => 
    array (
      0 => 'views/_partial/commentMovie.tpl',
      1 => 1771511477,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69981c727af843_91276084 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views/_partial';
?><div class="comment my-5">
        <?php if ($_smarty_tpl->getValue('comment')->getSpoiler() == 1) {?>
            <div class="comment-spoiler" id="spoiler">
                <h3 class="border-0">Anti-Spoiler</h3>
                <p>Attention ce commentaire contient un spoiler !</p>
                <h4>Cliquez pour voir le commentaire !</h4>
            </div>
        <?php }?>
        <div class="row align-items-center">
            <div class="rounded-circle col-auto">
                <img src="assets/img/<?php echo $_smarty_tpl->getValue('comment')->getPhoto();?>
"
                    class="rounded-circle border"
                    style="width: 40px; height: 40px; object-fit: cover;"
                    alt="Avatar">
            </div>
            <span class="spanMovie col-auto p-0"><a href="index.php?ctrl=user&action=user&id=<?php echo $_smarty_tpl->getValue('comment')->getUser_id();?>
"><?php echo $_smarty_tpl->getValue('comment')->getPseudo();?>
</a></span>
            <span class="pageMovieNote spanMovie col-auto ms-auto" data-note="<?php echo $_smarty_tpl->getValue('comment')->getRating();?>
">
                <span class="stars d-block"></span>
            </span>

        </div>
        <p>
            <?php echo $_smarty_tpl->getValue('comment')->getComment();?>

        </p>

        <div class="col-1">
            <form method="post" action="" class="js-like-form">

                <input type="hidden" name="likeCommentBtn" value="<?php echo $_smarty_tpl->getValue('comment')->getId();?>
">

                <button type="submit" class="border-0 bg-transparent p-0 text-decoration-none" name="">
                    <label class="form-label" style="cursor:pointer;">
                    <?php if ($_smarty_tpl->getValue('comment')->getUser_liked()) {?>
                        <i class="bi bi-heart-fill"></i>
                    <?php } else { ?>
                        <i class="bi bi-heart"></i>
                    <?php }?>
                        <span class="like-count"> <?php echo $_smarty_tpl->getValue('comment')->getLike();?>
</span>
                    </label>
                </button>
            </form>
        </div>

        <div class="row align-items-center ">
            <span class="spanMovie d-block col-6 me-auto"><?php echo $_smarty_tpl->getValue('comment')->getDateFormat();?>
</span>
            <?php if ((true && (true && null !== ($_SESSION['user'] ?? null))) && $_SESSION['user']['user_funct_id'] == 1) {?>
                <?php if ($_smarty_tpl->getValue('comment')->getReported() == 0) {?>
                <button class="border-0 bg-transparent text-end col-6 pe-3" data-bs-toggle="modal" data-bs-target="#reportModal-review-<?php echo $_smarty_tpl->getValue('comment')->getId();?>
">
                    <i class="bi bi-flag fs-3 ms-auto"></i>
                </button>
                <div class="modal fade" id="reportModal-review-<?php echo $_smarty_tpl->getValue('comment')->getId();?>
" tabindex="-1">
                    <div class="modal-dialog">
                        <form method="POST" class="modal-content">
                            <input type="hidden" name="commentReportId" value="<?php echo $_smarty_tpl->getValue('comment')->getId();?>
 ">
                            <div class="modal-header border-0"">
                                <h5 class="modal-title">Signaler : <?php echo $_smarty_tpl->getValue('comment')->getPseudo();?>
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
                <button class="border-0 bg-transparent text-end col-6 pe-3" data-bs-toggle="modal" data-bs-target="#reportModal-review-<?php echo $_smarty_tpl->getValue('comment')->getId();?>
">
                    <i class="bi bi-flag-fill fs-3 ms-auto"></i>
                </button>
                <div class="modal fade" id="reportModal-review-<?php echo $_smarty_tpl->getValue('comment')->getId();?>
" tabindex="-1">
                    <div class="modal-dialog">
                        <form method="POST" class="modal-content">

                            <div class="modal-header border-0"">
                                <h5 class="modal-title">Signaler : <?php echo $_smarty_tpl->getValue('comment')->getPseudo();?>
 </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                <p>Voulez vous vraiment supprimer votre signalement ?</p>
                            </div>

                            <div class="modal-footer border-0 mx-auto">
                                <button type="button" class="btn btn-outline-dark px-3" data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" name="repComDelete" value="<?php echo $_smarty_tpl->getValue('comment')->getId();?>
" class="btn btn-outline-danger px-3">Supprimer</button>
                            </div>

                        </form>
                    </div>
                </div>
                <?php }?>
            <?php } elseif ((true && (true && null !== ($_SESSION['user'] ?? null))) && $_SESSION['user']['user_funct_id'] != 1) {?>
                <form method="post" class="d-block ms-auto col-auto">
                    <input type="radio" class="btn-check" name="spoiler" value="<?php echo $_smarty_tpl->getValue('comment')->getId();?>
" id="filter-spoiler-<?php echo $_smarty_tpl->getValue('comment')->getId();?>
" onchange="this.form.submit()">
                    <label class="form-label m-0" for="filter-spoiler-<?php echo $_smarty_tpl->getValue('comment')->getId();?>
"><i class="bi bi-eye<?php if ($_smarty_tpl->getValue('comment')->getSpoiler() == 1) {?>-slash<?php }?> fs-2"></i></label>
                </form>
                <form method="post" class="d-block col-auto">
                    <input type="radio" class="btn-check" name="deleteComment"
                            value="<?php echo $_smarty_tpl->getValue('comment')->getId();?>
"
                            id="filter-delete-<?php echo $_smarty_tpl->getValue('comment')->getId();?>
"
                            onchange="if(confirm('Voulez-vous vraiment supprimer ce commentaire ?')) { this.form.submit(); } else { this.checked = false; }">
                    <label class="form-label m-0" for="filter-delete-<?php echo $_smarty_tpl->getValue('comment')->getId();?>
"><i class="bi bi-trash3 fs-3"></i></label>
                </form>
            <?php }?>
        </div>

</div>
<?php }
}
