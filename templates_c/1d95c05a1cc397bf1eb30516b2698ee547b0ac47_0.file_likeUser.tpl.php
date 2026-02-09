<?php
/* Smarty version 5.7.0, created on 2026-02-09 10:45:33
  from 'file:views/_partial/likeUser.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_6989bacdeca584_89714126',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1d95c05a1cc397bf1eb30516b2698ee547b0ac47' => 
    array (
      0 => 'views/_partial/likeUser.tpl',
      1 => 1770632078,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6989bacdeca584_89714126 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views\\_partial';
?><li class="splide__slide">
    <a href="index.php?ctrl=movie&action=movie&id=<?php echo $_smarty_tpl->getValue('objLike')->getId();?>
">
        <img src="<?php echo $_smarty_tpl->getValue('objLike')->getUrl();?>
" loading="eager" alt="Couverture de film"/>
    </a>
</li>
<?php }
}
