<?php
/* Smarty version 5.7.0, created on 2026-02-05 14:44:59
  from 'file:views/_partial/movieList.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_6984aceb345b70_36051417',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e72d06d7dd6c81ec682255e946abbfd5b8a33521' => 
    array (
      0 => 'views/_partial/movieList.tpl',
      1 => 1770302695,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6984aceb345b70_36051417 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views\\_partial';
?><div class="row py-2">
    <div class="col-4 text-center my-auto">
        <a href="index.php?ctrl=movie&action=movie&id=<?php echo $_smarty_tpl->getValue('objMovie')->getId();?>
"><img src="<?php echo $_smarty_tpl->getValue('objMovie')->getThumbnailUrl();?>
" alt="" class="img-fluid"></a>
    </div>
    <div class="col-8 text-start">
        <a href="index.php?ctrl=movie&action=movie&id=<?php echo $_smarty_tpl->getValue('objMovie')->getId();?>
" class="link"><h2><?php echo $_smarty_tpl->getValue('objMovie')->getTitle();?>
</h2></a>
        <p><?php echo $_smarty_tpl->getValue('objMovie')->getDescription();?>
</p>
        <span class="pageMovieNote spanMovie" data-note="<?php echo $_smarty_tpl->getValue('objMovie')->getRating();?>
">
            <span class="stars d-inline-block"></span>
            <span class="note d-inline-block"><?php echo $_smarty_tpl->getValue('objMovie')->getRating();?>
</span>
        </span>

        <span class="movieLikes py-2 d-flex gap-1 spanMovie">
            <i class="bi bi-heart-fill"></i><span><?php echo $_smarty_tpl->getValue('objMovie')->getLike();?>
</span>
        </span>
    </div>
</div>
<?php }
}
