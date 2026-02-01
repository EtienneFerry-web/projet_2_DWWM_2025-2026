<?php
/* Smarty version 5.7.0, created on 2026-01-31 08:59:41
  from 'file:views/_partial/reviewMovie.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_697dc47d51d612_82357170',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9d6cdd84c4c70f84790c40800e8c190218f7c0e6' => 
    array (
      0 => 'views/_partial/reviewMovie.tpl',
      1 => 1769849370,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697dc47d51d612_82357170 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views\\_partial';
?><div class="row py-3 border-bottom border-dark">
    <div class="col-3 my-auto">
        <a href="index.php?ctrl=movie&action=movie&id=<?php echo $_smarty_tpl->getValue('review')->getId();?>
">
            <img src="<?php echo $_smarty_tpl->getValue('review')->getUrl();?>
" alt="couverture de film" class="img-fluid">
        </a>
    </div>
    
    <div class="col-9 d-flex flex-column text-start py-5">
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
            
                        <form method="post" class="d-block text-end col-6">
                <input type="radio" class="btn-check" name="searchBy" value="<?php echo $_smarty_tpl->getValue('review')->getId();?>
" id="filter-report-<?php echo $_smarty_tpl->getValue('review')->getId();?>
" onchange="this.form.submit()">
                <label class="form-label" for="filter-report-<?php echo $_smarty_tpl->getValue('review')->getId();?>
">Signaler</label>
            </form>
        </div>
    </div>
</div><?php }
}
