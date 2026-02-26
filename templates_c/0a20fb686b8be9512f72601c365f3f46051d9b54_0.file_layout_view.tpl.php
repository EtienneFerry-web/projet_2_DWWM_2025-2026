<?php
/* Smarty version 5.8.0, created on 2026-02-25 16:33:26
  from 'file:views/layout_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_699f2456f03977_91068790',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a20fb686b8be9512f72601c365f3f46051d9b54' => 
    array (
      0 => 'views/layout_view.tpl',
      1 => 1772000816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/_partial/header.tpl' => 1,
    'file:views/_partial/footer.tpl' => 1,
  ),
))) {
function content_699f2456f03977_91068790 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
$_smarty_tpl->renderSubTemplate("file:views/_partial/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1483251623699f2456f00783_52140124', "content");
?>


<?php $_smarty_tpl->renderSubTemplate("file:views/_partial/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
/* {block "content"} */
class Block_1483251623699f2456f00783_52140124 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
}
}
/* {/block "content"} */
}
