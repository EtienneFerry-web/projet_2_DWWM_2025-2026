<?php
/* Smarty version 5.8.0, created on 2026-02-25 16:33:30
  from 'file:views/_partial/newMovie.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_699f245a7a5351_30321321',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '08411f9dbff3639b5df34e2030e8f11e09ee391f' => 
    array (
      0 => 'views/_partial/newMovie.tpl',
      1 => 1772000816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_699f245a7a5351_30321321 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views\\_partial';
?><li class="splide__slide hoverMovie">
    <a href="index.php?ctrl=movie&action=movie&id=<?php echo $_smarty_tpl->getValue('objMovie')->getId();?>
">
        <img src="assets/img/movie/<?php echo $_smarty_tpl->getValue('objMovie')->getPhoto();?>
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
