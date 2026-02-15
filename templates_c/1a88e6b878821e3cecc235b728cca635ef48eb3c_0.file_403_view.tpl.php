<?php
/* Smarty version 5.7.0, created on 2026-02-15 19:04:03
  from 'file:views/403_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_699218a3d2c021_59242828',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a88e6b878821e3cecc235b728cca635ef48eb3c' => 
    array (
      0 => 'views/403_view.tpl',
      1 => 1771182234,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_699218a3d2c021_59242828 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_448105336699218a3d21188_20425839', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1378604425699218a3d26637_88341591', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1286758328699218a3d27fa2_52081609', "css_variation");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_706236535699218a3d29747_89676279', "content");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1987156006699218a3d2ae59_34319371', "js");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_448105336699218a3d21188_20425839 extends \Smarty\Runtime\Block
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
class Block_1378604425699218a3d26637_88341591 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Erreur 403 page intropuvable<?php
}
}
/* {/block "description"} */
/* {block "css_variation"} */
class Block_1286758328699218a3d27fa2_52081609 extends \Smarty\Runtime\Block
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
class Block_706236535699218a3d29747_89676279 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

<section class="container text-center py-5">
    <h1>403 - Accès Refusé</h1>
    <p>Flèche du haut saute Flèche du bas accroupi bonne chance !</p>

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
class Block_1987156006699218a3d2ae59_34319371 extends \Smarty\Runtime\Block
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
