<?php
/* Smarty version 5.7.0, created on 2026-02-11 12:38:27
  from 'file:views/403_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_698c78436d5d57_10991694',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a88e6b878821e3cecc235b728cca635ef48eb3c' => 
    array (
      0 => 'views/403_view.tpl',
      1 => 1770813504,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_698c78436d5d57_10991694 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_580256563698c78436a1c90_05258735', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1211782409698c78436b0222_14627807', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_219093412698c78436baf40_38552865', "css_variation");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1745725372698c78436c5ba9_18882574', "content");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1874316686698c78436cf415_53328784', "js");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_580256563698c78436a1c90_05258735 extends \Smarty\Runtime\Block
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
class Block_1211782409698c78436b0222_14627807 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Erreur 403 page intropuvable<?php
}
}
/* {/block "description"} */
/* {block "css_variation"} */
class Block_219093412698c78436baf40_38552865 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

    <link rel="stylesheet" href="/Projet2/assets/css/403.css">
<?php
}
}
/* {/block "css_variation"} */
/* {block "content"} */
class Block_1745725372698c78436c5ba9_18882574 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

<section class="container text-center py-5">
    <h1>403 - ACCESS REFUSER</h1>
    <p>Fléche du haut saute Fléche du bas accroupi bonne chance !</p>

    <div id="game-container">
        <div id="player">403</div>
    </div>

    <div>Score: <span id="score">0</span></div>
    <div class="col-12 text-center">

        <button class="btn btn-outline-dark px-5 text-uppercase my-5" onclick="createObstacle()">Start</button>
    </div>
</section>
<?php
}
}
/* {/block "content"} */
/* {block "js"} */
class Block_1874316686698c78436cf415_53328784 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

    <?php echo '<script'; ?>
 src="/Projet2/assets/js/403.js"> <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "js"} */
}
