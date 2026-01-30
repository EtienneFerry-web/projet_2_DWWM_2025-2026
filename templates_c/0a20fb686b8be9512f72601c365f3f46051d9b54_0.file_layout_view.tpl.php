<?php
/* Smarty version 5.7.0, created on 2026-01-30 14:58:51
  from 'file:views/layout_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_697cc72b5ef8b8_84148361',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a20fb686b8be9512f72601c365f3f46051d9b54' => 
    array (
      0 => 'views/layout_view.tpl',
      1 => 1769775882,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/_partial/header.tpl' => 1,
    'file:views/_partial/footer.tpl' => 1,
  ),
))) {
function content_697cc72b5ef8b8_84148361 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
$_smarty_tpl->renderSubTemplate("file:views/_partial/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1212003826697cc72b5e3065_13628592', "content");
?>


<?php $_smarty_tpl->renderSubTemplate("file:views/_partial/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
/* {block "content"} */
class Block_1212003826697cc72b5e3065_13628592 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
}
}
/* {/block "content"} */
}
