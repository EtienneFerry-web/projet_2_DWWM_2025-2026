<?php
/* Smarty version 5.7.0, created on 2026-02-11 14:57:32
  from 'file:views/_partial/header.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_698c98dc5bdf15_09480816',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f404f7d883b51dcd31100dd14757de511187eaa0' => 
    array (
      0 => 'views/_partial/header.tpl',
      1 => 1770634641,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/_partial/navHeader.tpl' => 1,
    'file:views/_partial/searchForm.tpl' => 1,
    'file:views/_partial/message.tpl' => 1,
  ),
))) {
function content_698c98dc5bdf15_09480816 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views/_partial';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_654489187698c98dc5a06b5_96073055', "description");
?>
">
	<title><?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1280521134698c98dc5a6915_96881098', "title");
?>
</title>
    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_295786801698c98dc5aca15_62921472', "css_variation");
?>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
	<link rel="stylesheet" href="/Projet2/assets/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a href="index.php"><img src="/Projet2/assets/img/iconSite.png" alt="icon du site" class="iconHeader"></a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <img src="/Projet2/assets/img/menu.svg" alt="menu burger" class="iconHeader">
            </button>
            <div class="collapse navbar-collapse" id="navbarMain">
                <?php $_smarty_tpl->renderSubTemplate("file:views/_partial/navHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
                <?php $_smarty_tpl->renderSubTemplate("file:views/_partial/searchForm.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('formClass'=>" d-flex ms-lg-3 col-12 col-sm-6"), (int) 0, $_smarty_current_dir);
?>
            </div>
        </div>
    </nav>
    <?php $_smarty_tpl->renderSubTemplate("file:views/_partial/message.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
/* {block "description"} */
class Block_654489187698c98dc5a06b5_96073055 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views/_partial';
}
}
/* {/block "description"} */
/* {block "title"} */
class Block_1280521134698c98dc5a6915_96881098 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views/_partial';
?>
 - Give Me Five<?php
}
}
/* {/block "title"} */
/* {block "css_variation"} */
class Block_295786801698c98dc5aca15_62921472 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views/_partial';
}
}
/* {/block "css_variation"} */
}
