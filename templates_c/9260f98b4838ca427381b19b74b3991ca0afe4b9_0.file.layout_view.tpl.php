<?php
/* Smarty version 4.5.6, created on 2026-02-24 14:55:39
  from 'C:\wamp64\www\Projet2\views\layout_view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_699dbbebc51b22_34297258',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9260f98b4838ca427381b19b74b3991ca0afe4b9' => 
    array (
      0 => 'C:\\wamp64\\www\\Projet2\\views\\layout_view.tpl',
      1 => 1771943991,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/_partial/header.tpl' => 1,
    'file:views/_partial/footer.tpl' => 1,
  ),
),false)) {
function content_699dbbebc51b22_34297258 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->_subTemplateRender("file:views/_partial/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2132777744699dbbebc507b9_85727253', "content");
?>


<?php $_smarty_tpl->_subTemplateRender("file:views/_partial/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
/* {block "content"} */
class Block_2132777744699dbbebc507b9_85727253 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_2132777744699dbbebc507b9_85727253',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "content"} */
}
