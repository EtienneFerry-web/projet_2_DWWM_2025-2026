<?php
/* Smarty version 5.7.0, created on 2026-02-01 16:20:40
  from 'file:views/404_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_697f7d583481c0_37679852',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9c0510c2f661c941317c90f458dff00a1e78124f' => 
    array (
      0 => 'views/404_view.tpl',
      1 => 1769962767,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697f7d583481c0_37679852 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1536996234697f7d58343ff5_42583152', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1277562606697f7d58345d88_22297261', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1485365469697f7d58346b84_83376464', "css_variation");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2062404897697f7d58347809_02950559', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_1536996234697f7d58343ff5_42583152 extends \Smarty\Runtime\Block
{
public $prepend = 'true';
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
404<?php
}
}
/* {/block "title"} */
/* {block "description"} */
class Block_1277562606697f7d58345d88_22297261 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Erreur 404 page intropuvable<?php
}
}
/* {/block "description"} */
/* {block "css_variation"} */
class Block_1485365469697f7d58346b84_83376464 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>


<?php
}
}
/* {/block "css_variation"} */
/* {block "content"} */
class Block_2062404897697f7d58347809_02950559 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
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
