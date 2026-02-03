<?php
/* Smarty version 5.7.0, created on 2026-02-03 09:39:20
  from 'file:views/404_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_6981c248605971_24348671',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9c0510c2f661c941317c90f458dff00a1e78124f' => 
    array (
      0 => 'views/404_view.tpl',
      1 => 1770024666,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6981c248605971_24348671 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_10516084736981c2485e13f3_00868966', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_385243146981c2485ec5e3_65513092', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_628193576981c2485f5cd5_17659798', "css_variation");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_19788302706981c2485ff443_61315570', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_10516084736981c2485e13f3_00868966 extends \Smarty\Runtime\Block
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
class Block_385243146981c2485ec5e3_65513092 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Erreur 404 page intropuvable<?php
}
}
/* {/block "description"} */
/* {block "css_variation"} */
class Block_628193576981c2485f5cd5_17659798 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>


<?php
}
}
/* {/block "css_variation"} */
/* {block "content"} */
class Block_19788302706981c2485ff443_61315570 extends \Smarty\Runtime\Block
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
