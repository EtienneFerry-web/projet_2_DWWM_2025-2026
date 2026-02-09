<?php
/* Smarty version 5.7.0, created on 2026-02-09 10:45:34
  from 'file:views/_partial/reviewMovie.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_6989bace00aa75_77929488',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9d6cdd84c4c70f84790c40800e8c190218f7c0e6' => 
    array (
      0 => 'views/_partial/reviewMovie.tpl',
      1 => 1770633470,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6989bace00aa75_77929488 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views\\_partial';
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
            <img src="<?php echo $_smarty_tpl->getValue('review')->getUrl();?>
" alt="couverture de film" class="img-fluid">
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
                    <input type="radio" class="btn-check" name="searchBy" value="<?php echo $_smarty_tpl->getValue('review')->getId();?>
" id="filter-like-<?php echo $_smarty_tpl->getValue('review')->getId();?>
" onchange="this.form.submit()">
                    <label class="form-label" for="filter-like-<?php echo $_smarty_tpl->getValue('review')->getId();?>
">
                        <i class="bi bi-heart-fill"></i><span> <?php echo $_smarty_tpl->getValue('review')->getLike();?>
 </span>
                    </label>
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
                <form method="post" class="d-block ms-auto col-auto">
                    <input type="hidden" name="comment" value="<?php echo $_smarty_tpl->getValue('review')->getComment();?>
">
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getValue('review')->getId();?>
">
                    <button type="submit" name="commentReport" value="1"
                            class="border-0 bg-transparent p-0">
                        <i class="bi bi-flag fs-3"></i>
                    </button>
                </form>
                <?php }?>
            </div>
        </div>
    </div>
</div>
<?php }
}
