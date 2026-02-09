<?php
/* Smarty version 5.7.0, created on 2026-02-09 12:02:55
  from 'file:views/layout_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_6989ccefdd04b8_89581019',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c4c16a7571f3f93afdf8cc90616822cde02ac846' => 
    array (
      0 => 'views/layout_view.tpl',
      1 => 1769785504,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/_partial/header.tpl' => 1,
    'file:views/_partial/footer.tpl' => 1,
  ),
))) {
function content_6989ccefdd04b8_89581019 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
$_smarty_tpl->renderSubTemplate("file:views/_partial/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_18010862236989ccefdcd312_81841831', "content");
?>


<?php $_smarty_tpl->renderSubTemplate("file:views/_partial/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
/* {block "content"} */
class Block_18010862236989ccefdcd312_81841831 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
}
}
/* {/block "content"} */
}
