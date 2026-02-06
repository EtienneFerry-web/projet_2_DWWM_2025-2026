<?php
/* Smarty version 5.7.0, created on 2026-02-06 13:05:35
  from 'file:views/403_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_6985e71f5d4c91_73325967',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a88e6b878821e3cecc235b728cca635ef48eb3c' => 
    array (
      0 => 'views/403_view.tpl',
      1 => 1770383093,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6985e71f5d4c91_73325967 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_16555113166985e71f5cd803_41845724', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_5517018876985e71f5d0658_29137257', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2969527626985e71f5d20a8_19028204', "css_variation");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_724067186985e71f5d3af3_21188618', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_16555113166985e71f5cd803_41845724 extends \Smarty\Runtime\Block
{
public $prepend = 'true';
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
403<?php
}
}
/* {/block "title"} */
/* {block "description"} */
class Block_5517018876985e71f5d0658_29137257 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Erreur 403 page intropuvable<?php
}
}
/* {/block "description"} */
/* {block "css_variation"} */
class Block_2969527626985e71f5d20a8_19028204 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>


<?php
}
}
/* {/block "css_variation"} */
/* {block "content"} */
class Block_724067186985e71f5d3af3_21188618 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

<section class="container text-center py-5">
    <h1>Erreur - 403</h1>
    <p class="mx-auto">Accés non autorisé !</p>
</section>
<?php
}
}
/* {/block "content"} */
}
