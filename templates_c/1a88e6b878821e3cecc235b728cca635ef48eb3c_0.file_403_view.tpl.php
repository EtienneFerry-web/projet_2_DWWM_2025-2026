<?php
/* Smarty version 5.7.0, created on 2026-02-10 15:58:43
  from 'file:views/403_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_698b55b393d1b7_66940075',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a88e6b878821e3cecc235b728cca635ef48eb3c' => 
    array (
      0 => 'views/403_view.tpl',
      1 => 1770738253,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_698b55b393d1b7_66940075 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_294804258698b55b3937d51_19399388', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_514812989698b55b3939ec2_98415050', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_776338741698b55b393ad84_90714172', "css_variation");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_507017556698b55b393bab8_10539371', "content");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1883200846698b55b393c762_77632227', "js");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_294804258698b55b3937d51_19399388 extends \Smarty\Runtime\Block
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
class Block_514812989698b55b3939ec2_98415050 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Erreur 403 page intropuvable<?php
}
}
/* {/block "description"} */
/* {block "css_variation"} */
class Block_776338741698b55b393ad84_90714172 extends \Smarty\Runtime\Block
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
class Block_507017556698b55b393bab8_10539371 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

<section class="container text-center py-5">
    <h1>403 - ACCESS DENIED</h1>
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
class Block_1883200846698b55b393c762_77632227 extends \Smarty\Runtime\Block
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
