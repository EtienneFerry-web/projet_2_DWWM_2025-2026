<?php
/* Smarty version 5.7.0, created on 2026-02-08 16:51:14
  from 'file:views/403_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_6988bf0276e6e2_64866441',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a88e6b878821e3cecc235b728cca635ef48eb3c' => 
    array (
      0 => 'views/403_view.tpl',
      1 => 1770569440,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6988bf0276e6e2_64866441 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_9329321076988bf02768db0_57727663', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_7566221566988bf0276ad14_11223251', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_19152870136988bf0276bbb4_11287354', "css_variation");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_15954744576988bf0276c897_42251156', "content");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_3148724156988bf0276da92_70196207', "js");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_9329321076988bf02768db0_57727663 extends \Smarty\Runtime\Block
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
class Block_7566221566988bf0276ad14_11223251 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Erreur 403 page intropuvable<?php
}
}
/* {/block "description"} */
/* {block "css_variation"} */
class Block_19152870136988bf0276bbb4_11287354 extends \Smarty\Runtime\Block
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
class Block_15954744576988bf0276c897_42251156 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

<section class="container text-center py-5">
    <h1>403 - ACCESS DENIED</h1>
    <p>Appuie sur <b>Espace</b> pour sauter les barrières !</p>

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
class Block_3148724156988bf0276da92_70196207 extends \Smarty\Runtime\Block
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
