<?php
/* Smarty version 4.5.6, created on 2026-02-24 14:55:39
  from 'C:\wamp64\www\Projet2\views\_partial\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_699dbbebd077b1_48205236',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf4b0827183660a68d6cad67684f094c45172acc' => 
    array (
      0 => 'C:\\wamp64\\www\\Projet2\\views\\_partial\\header.tpl',
      1 => 1771943991,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/_partial/navHeader.tpl' => 1,
    'file:views/_partial/searchForm.tpl' => 1,
    'file:views/_partial/message.tpl' => 1,
  ),
),false)) {
function content_699dbbebd077b1_48205236 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_446334210699dbbebcfafc4_40499892', "description");
?>
">
	<title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1028075285699dbbebcfdc87_87750752', "title");
?>
</title>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_732482279699dbbebd00a80_46284623', "css_variation");
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
                <?php $_smarty_tpl->_subTemplateRender("file:views/_partial/navHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <?php $_smarty_tpl->_subTemplateRender("file:views/_partial/searchForm.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('formClass'=>" d-flex ms-lg-3 col-12 col-sm-6"), 0, false);
?>
            </div>
        </div>
    </nav>
    <?php $_smarty_tpl->_subTemplateRender("file:views/_partial/message.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <a href="index.php?ctrl=page&action=contact"
        class="btn btn-light position-fixed bottom-0 end-0 m-4 rounded-circle shadow-lg d-flex align-items-center justify-content-center"
        style="width: 50px; height: 50px; z-index: 999;">
        <i class="bi bi-chat-dots-fill fs-3"></i>
    </a>
<?php }
/* {block "description"} */
class Block_446334210699dbbebcfafc4_40499892 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'description' => 
  array (
    0 => 'Block_446334210699dbbebcfafc4_40499892',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "description"} */
/* {block "title"} */
class Block_1028075285699dbbebcfdc87_87750752 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_1028075285699dbbebcfdc87_87750752',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 - Give Me Five<?php
}
}
/* {/block "title"} */
/* {block "css_variation"} */
class Block_732482279699dbbebd00a80_46284623 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'css_variation' => 
  array (
    0 => 'Block_732482279699dbbebd00a80_46284623',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "css_variation"} */
}
