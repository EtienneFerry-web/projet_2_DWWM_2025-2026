<?php
/* Smarty version 5.7.0, created on 2026-02-01 10:37:36
  from 'file:views/_partial/reviewMovie.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_697f2cf037e974_21087058',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9d6cdd84c4c70f84790c40800e8c190218f7c0e6' => 
    array (
      0 => 'views/_partial/reviewMovie.tpl',
      1 => 1769942239,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697f2cf037e974_21087058 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views\\_partial';
?><div class="row py-3 border-bottom border-dark">
    <div class="col-3 my-auto">
        <a href="index.php?ctrl=movie&action=movie&id=<?php echo $_smarty_tpl->getValue('review')->getId();?>
">
            <img src="<?php echo $_smarty_tpl->getValue('review')->getUrl();?>
" alt="couverture de film" class="img-fluid">
        </a>
    </div>
    <div class="col-9 d-flex flex-column text-start py-5 comment-content">
        <h3><?php echo $_smarty_tpl->getValue('review')->getTitle();?>
</h3>
        <p><?php echo $_smarty_tpl->getValue('review')->getComment();?>
</p>
        <span class="pageMovieNote spanMovie d-block text-start mt-auto" data-note="<?php echo $_smarty_tpl->getValue('review')->getRating();?>
">
            <span class="stars"></span>
            <span class="note"><?php echo $_smarty_tpl->getValue('review')->getRating();?>
</span>
        </span>
        <form method="post">
            <input type="radio" class="btn-check" name="searchBy" value="<?php echo $_smarty_tpl->getValue('review')->getId();?>
" id="filter-like-<?php echo $_smarty_tpl->getValue('review')->getId();?>
" onchange="this.form.submit()">
            <label class="form-label" for="filter-like-<?php echo $_smarty_tpl->getValue('review')->getId();?>
">
                <i class="bi bi-heart-fill"></i><span> <?php echo $_smarty_tpl->getValue('review')->getLike();?>
 </span>
            </label>
        </form>
        <div class="row align-items-center ">
            <span class="spanMovie d-block col-6"><?php echo $_smarty_tpl->getValue('review')->getDateFormat();?>
</span>
            <?php if ((true && (true && null !== ($_SESSION['user'] ?? null))) && $_SESSION['user']['user_id'] == $_GET['id']) {?>
                <form method="post" class="d-block ms-auto col-auto">
                    <input type="radio" class="btn-check" name="deleteComment" value="<?php echo $_smarty_tpl->getValue('review')->getId();?>
" id="filter-report" onchange="this.form.submit()">
                    <label class="form-label m-0" for="filter-report">Supprimer</label>
                </form>
                <div class="d-block text-end col-auto">
                    <button
                      type="button"
                      class="spanMovie border-0 edit-comment"
                      data-id="<?php echo $_smarty_tpl->getValue('review')->getId();?>
"
                    >
                      Modifier
                    </button>
                </div>
            <?php } else { ?>
                <form method="post" class="d-block ms-auto col-auto">
                    <input type="radio" class="btn-check" name="searchBy" value="<?php echo $_smarty_tpl->getValue('review')->getId();?>
" id="filter-report-<?php echo $_smarty_tpl->getValue('review')->getId();?>
" onchange="this.form.submit()">
                    <label class="form-label" for="filter-report-<?php echo $_smarty_tpl->getValue('review')->getId();?>
">Signaler</label>
                </form>
            <?php }?>
        </div>
    </div>
</div>
<?php }
}
