<?php
/* Smarty version 5.7.0, created on 2026-02-15 18:58:59
  from 'file:views/404_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_699217731b5dd6_90579259',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9c0510c2f661c941317c90f458dff00a1e78124f' => 
    array (
      0 => 'views/404_view.tpl',
      1 => 1770990163,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_699217731b5dd6_90579259 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_365324187699217731ae3d7_86316487', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1799237661699217731b0854_28014984', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1461764922699217731b2116_70315897', "css_variation");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1742879649699217731b3689_22656468', "content");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_860263527699217731b4c37_41577483', "js");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_365324187699217731ae3d7_86316487 extends \Smarty\Runtime\Block
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
class Block_1799237661699217731b0854_28014984 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Erreur 404 page intropuvable<?php
}
}
/* {/block "description"} */
/* {block "css_variation"} */
class Block_1461764922699217731b2116_70315897 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

    <link rel="stylesheet" href="/Projet2/assets/css/404.css">
<?php
}
}
/* {/block "css_variation"} */
/* {block "content"} */
class Block_1742879649699217731b3689_22656468 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

<section id="zone">
    <div id="canvas">
        <div id="dvd-logo" class="dvd-box">
            <svg viewBox="0 0 160 90">
                <rect x="5" y="5" width="150" height="80" rx="75" ry="75"
                    fill="none" stroke="currentColor" stroke-width="4" />

                <text x="50%" y="40" dominant-baseline="middle" text-anchor="middle"
                    class="text-404" fill="currentColor">404</text>

                <text x="50%" y="65" dominant-baseline="middle" text-anchor="middle"
                    class="text-notfound" fill="currentColor">NOT FOUND</text>
            </svg>
        </div>
    </div>
</section>
<?php
}
}
/* {/block "content"} */
/* {block "js"} */
class Block_860263527699217731b4c37_41577483 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

    <?php echo '<script'; ?>
 src="/Projet2/assets/js/404.js"> <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "js"} */
}
