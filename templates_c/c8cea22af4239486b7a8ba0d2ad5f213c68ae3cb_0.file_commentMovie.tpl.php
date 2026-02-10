<?php
/* Smarty version 5.7.0, created on 2026-02-10 15:08:14
  from 'file:views/_partial/commentMovie.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_698b49dea6a5a9_12300677',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c8cea22af4239486b7a8ba0d2ad5f213c68ae3cb' => 
    array (
      0 => 'views/_partial/commentMovie.tpl',
      1 => 1770736081,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_698b49dea6a5a9_12300677 (\Smarty\Template $_smarty_tpl) {
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
            <span class="spanMovie col-auto"><a href="index.php?ctrl=user&action=user&id=<?php echo $_smarty_tpl->getValue('comment')->getUser_id();?>
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
 <?php echo $_smarty_tpl->getValue('comment')->getUser_liked();?>
</span>
                    </label>
                </button>
            </form>
        </div>

        <div class="row align-items-center ">
            <span class="spanMovie d-block col-6 me-auto"><?php echo $_smarty_tpl->getValue('comment')->getDateFormat();?>
</span>
            <?php if ((true && (true && null !== ($_SESSION['user'] ?? null))) && $_SESSION['user']['user_funct_id'] == 1) {?>
                <form method="post" class="d-block ms-auto col-auto">
                    <input type="hidden" name="comment" value="<?php echo $_smarty_tpl->getValue('comment')->getComment();?>
">
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getValue('comment')->getId();?>
">
                    <button type="submit" name="commentReport" value="1"
                            class="border-0 bg-transparent p-0">
                        <i class="bi bi-flag fs-3"></i>
                    </button>
                </form>
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
