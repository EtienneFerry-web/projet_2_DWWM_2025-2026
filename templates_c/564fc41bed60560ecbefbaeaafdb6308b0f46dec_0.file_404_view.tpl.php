<?php
/* Smarty version 5.7.0, created on 2026-02-06 06:35:21
  from 'file:views/404_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_69858ba9031833_78583501',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '564fc41bed60560ecbefbaeaafdb6308b0f46dec' => 
    array (
      0 => 'views/404_view.tpl',
      1 => 1770217654,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69858ba9031833_78583501 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_58791464569858ba9024459_09268727', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_171764380269858ba902aba7_67497318', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_175394647369858ba902d6b8_02661595', "css_variation");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_134648173269858ba902fca4_86389175', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_58791464569858ba9024459_09268727 extends \Smarty\Runtime\Block
{
public $prepend = 'true';
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>
404<?php
}
}
/* {/block "title"} */
/* {block "description"} */
class Block_171764380269858ba902aba7_67497318 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>
Erreur 404 page intropuvable<?php
}
}
/* {/block "description"} */
/* {block "css_variation"} */
class Block_175394647369858ba902d6b8_02661595 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>


<?php
}
}
/* {/block "css_variation"} */
/* {block "content"} */
class Block_134648173269858ba902fca4_86389175 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>

<section class="container text-center py-5">
    <h1>Erreur - 404</h1>
    <p class="mx-auto">La page introuvable !</p>
</section>
<?php
}
}
/* {/block "content"} */
}
