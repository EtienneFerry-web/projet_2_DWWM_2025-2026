<?php
/* Smarty version 5.7.0, created on 2026-02-09 12:02:55
  from 'file:views/_partial/newMovie.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_6989ccefe32687_54584958',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5eaea3ebb6af61f966e56c83248ee6dc32c9419f' => 
    array (
      0 => 'views/_partial/newMovie.tpl',
      1 => 1769785504,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6989ccefe32687_54584958 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views/_partial';
?><li class="splide__slide hoverMovie">
    <a href="index.php?ctrl=movie&action=movie&id=<?php echo $_smarty_tpl->getValue('objMovie')->getId();?>
">
        <img src="<?php echo $_smarty_tpl->getValue('objMovie')->getUrl();?>
" loading="eager" alt="Couverture de film"/>

        <span class="movieNote spanMovie" data-note="<?php echo $_smarty_tpl->getValue('objMovie')->getRating();?>
">
            <span class="stars"></span>
        </span>

        <span class="movieLikes">
              <i class="bi bi-heart-fill"></i><?php echo $_smarty_tpl->getValue('objMovie')->getLike();?>

        </span>
    </a>
</li>
<?php }
}
