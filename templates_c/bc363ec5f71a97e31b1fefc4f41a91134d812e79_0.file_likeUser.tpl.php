<?php
/* Smarty version 5.7.0, created on 2026-02-10 12:30:50
  from 'file:views/_partial/likeUser.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_698b24faea2519_14925718',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bc363ec5f71a97e31b1fefc4f41a91134d812e79' => 
    array (
      0 => 'views/_partial/likeUser.tpl',
      1 => 1769785504,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_698b24faea2519_14925718 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views/_partial';
?><li class="splide__slide">
    <a href="index.php?ctrl=movie&action=movie&id=<?php echo $_smarty_tpl->getValue('objLike')->getId();?>
">
        <img src="<?php echo $_smarty_tpl->getValue('objLike')->getUrl();?>
" loading="eager" alt="Couverture de film"/>
    </a>
</li>
<?php }
}
