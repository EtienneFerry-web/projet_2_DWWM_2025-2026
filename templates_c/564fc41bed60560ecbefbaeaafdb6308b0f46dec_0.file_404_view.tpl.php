<?php
/* Smarty version 5.7.0, created on 2026-02-09 15:22:51
  from 'file:views/404_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_6989fbcb274be2_06464975',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '564fc41bed60560ecbefbaeaafdb6308b0f46dec' => 
    array (
      0 => 'views/404_view.tpl',
      1 => 1770634641,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6989fbcb274be2_06464975 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1065024156989fbcb264bf9_63979993', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_8815973686989fbcb26be14_47491216', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_6002102446989fbcb26e590_67437987', "css_variation");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1597610066989fbcb270b05_80486609', "content");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_14900926876989fbcb273073_62516006', "js");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_1065024156989fbcb264bf9_63979993 extends \Smarty\Runtime\Block
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
class Block_8815973686989fbcb26be14_47491216 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>
Erreur 404 page intropuvable<?php
}
}
/* {/block "description"} */
/* {block "css_variation"} */
class Block_6002102446989fbcb26e590_67437987 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>

    <link rel="stylesheet" href="/Projet2/assets/css/404.css">
<?php
}
}
/* {/block "css_variation"} */
/* {block "content"} */
class Block_1597610066989fbcb270b05_80486609 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
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
class Block_14900926876989fbcb273073_62516006 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>

    <?php echo '<script'; ?>
 src="/Projet2/assets/js/404.js"> <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "js"} */
}
