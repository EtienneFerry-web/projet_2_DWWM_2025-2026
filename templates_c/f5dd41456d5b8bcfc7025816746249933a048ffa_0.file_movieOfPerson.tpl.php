<?php
/* Smarty version 5.7.0, created on 2026-02-05 09:47:51
  from 'file:views/_partial/movieOfPerson.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_698467475edae3_36910942',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f5dd41456d5b8bcfc7025816746249933a048ffa' => 
    array (
      0 => 'views/_partial/movieOfPerson.tpl',
      1 => 1770284868,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_698467475edae3_36910942 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views\\_partial';
?><div class="col-6 col-md-3 p-1 hoverMovie">
    <a href="index.php?ctrl=movie&action=movie&id=<?php echo $_smarty_tpl->getValue('objMovie')->getId();?>
">
        <img src="<?php echo $_smarty_tpl->getValue('objMovie')->getThumbnailUrl();?>
" loading="eager" alt="Couverture de film" class="img-fluid"/>

        <span class="movieNote moviePerson spanMovie" data-note="<?php echo $_smarty_tpl->getValue('objMovie')->getRating();?>
">
            <span class="stars"></span>
        </span>

        <span class="movieLikes">
              <i class="bi bi-heart-fill"></i><?php echo $_smarty_tpl->getValue('objMovie')->getLike();?>

        </span>
    </a>
</div>
<?php }
}
