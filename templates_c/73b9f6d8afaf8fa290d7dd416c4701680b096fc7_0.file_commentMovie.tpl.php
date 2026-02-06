<?php
/* Smarty version 5.7.0, created on 2026-02-05 09:21:16
  from 'file:views/_partial/commentMovie.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_6984610c206954_07492383',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '73b9f6d8afaf8fa290d7dd416c4701680b096fc7' => 
    array (
      0 => 'views/_partial/commentMovie.tpl',
      1 => 1770283274,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6984610c206954_07492383 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views\\_partial';
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
        <form method="post" class="col-1">
            <input type="radio" class="btn-check" name="searchBy" value="<?php echo $_smarty_tpl->getValue('comment')->getId();?>
" id="filter-like" onchange="this.form.submit()">
            <label class="form-label" for="filter-like"><i class="bi bi-heart-fill"></i><span> <?php echo $_smarty_tpl->getValue('comment')->getLike();?>
 </span></label>
        </form>

        <div class="row align-items-center ">
            <span class="spanMovie d-block col-6 me-auto"><?php echo $_smarty_tpl->getValue('comment')->getDateFormat();?>
</span>
            <form method="post" class="d-block text-end col-auto">
                <input type="radio" class="btn-check" name="searchBy" value="<?php echo $_smarty_tpl->getValue('comment')->getId();?>
" id="filter-report" onchange="this.form.submit()">
                <label class="form-label" for="filter-report"><i class="bi bi-flag fs-3"></i></label>
            </form>
            <?php if ((true && (true && null !== ($_SESSION['user'] ?? null))) && $_SESSION['user']['user_funct_id'] != 1) {?>
                <form method="post" class="d-block text-end col-auto">
                    <input type="radio" class="btn-check" name="spoiler" value="<?php echo $_smarty_tpl->getValue('comment')->getId();?>
" id="filter-spoiler-<?php echo $_smarty_tpl->getValue('comment')->getId();?>
" onchange="this.form.submit()">
                    <label class="form-label" for="filter-spoiler-<?php echo $_smarty_tpl->getValue('comment')->getId();?>
"><i class="bi bi-eye<?php if ($_smarty_tpl->getValue('comment')->getSpoiler() == 1) {?>-slash<?php }?> fs-2"></i></label>
                </form>
            <?php }?>
        </div>

</div>
<?php }
}
