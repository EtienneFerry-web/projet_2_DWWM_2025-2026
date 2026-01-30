<?php
/* Smarty version 5.7.0, created on 2026-01-30 14:58:51
  from 'file:views/_partial/commentMovie.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_697cc72be95d08_42161252',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '73b9f6d8afaf8fa290d7dd416c4701680b096fc7' => 
    array (
      0 => 'views/_partial/commentMovie.tpl',
      1 => 1769779324,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697cc72be95d08_42161252 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views\\_partial';
?><div class="comment my-5">
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
    <form method="post">
        <input type="radio" class="btn-check" name="searchBy" value="<?php echo $_smarty_tpl->getValue('comment')->getId();?>
" id="filter-like" onchange="this.form.submit()">
        <label class="form-label" for="filter-like"><i class="bi bi-heart-fill"></i><span> <?php echo $_smarty_tpl->getValue('comment')->getLike();?>
 </span></label>
    </form>

    <div class="row align-items-center ">
        <span class="spanMovie d-block col-6"><?php echo $_smarty_tpl->getValue('comment')->getDateFormat();?>
</span>
        <form method="post" class="d-block text-end col-6">
            <input type="radio" class="btn-check" name="searchBy" value="<?php echo $_smarty_tpl->getValue('comment')->getId();?>
" id="filter-report" onchange="this.form.submit()">
            <label class="form-label" for="filter-report">Signaler</label>
        </form>

    </div>
</div>
<?php }
}
