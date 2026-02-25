<?php
/* Smarty version 4.5.6, created on 2026-02-24 14:55:39
  from 'C:\wamp64\www\Projet2\views\home_view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_699dbbeba34378_34989025',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7bcb57275da240f151cb3bfbb0dfba0d14208de9' => 
    array (
      0 => 'C:\\wamp64\\www\\Projet2\\views\\home_view.tpl',
      1 => 1771943991,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/_partial/newMovie.tpl' => 1,
  ),
),false)) {
function content_699dbbeba34378_34989025 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_256198972699dbbeba11a82_60433687', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_109525897699dbbeba14ba5_54644053', "description");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1654213726699dbbeba159c6_46569726', "css_variation");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2101739405699dbbeba164d6_58352738', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_935863695699dbbeba33a80_55487953', "js");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "views/layout_view.tpl");
}
/* {block "title"} */
class Block_256198972699dbbeba11a82_60433687 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_256198972699dbbeba11a82_60433687',
  ),
);
public $prepend = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Accueil<?php
}
}
/* {/block "title"} */
/* {block "description"} */
class Block_109525897699dbbeba14ba5_54644053 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'description' => 
  array (
    0 => 'Block_109525897699dbbeba14ba5_54644053',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Bienvenue sur notre accueil !!!!<?php
}
}
/* {/block "description"} */
/* {block "css_variation"} */
class Block_1654213726699dbbeba159c6_46569726 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'css_variation' => 
  array (
    0 => 'Block_1654213726699dbbeba159c6_46569726',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide-core.min.css">
<?php
}
}
/* {/block "css_variation"} */
/* {block "content"} */
class Block_2101739405699dbbeba164d6_58352738 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_2101739405699dbbeba164d6_58352738',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    
    <section id="hero" class=" container  row mx-auto py-5">
        <div class="col-12 col-md-6 d-flex flex-column justify-content-center text-center text-md-start  py-5">
            <?php if (!(isset($_SESSION['user']))) {?>
            <h1>Bienvenue sur give me five</h1>
            <p class="py-3">Connectez-vous ou créez un compte pour accéder à toutes nos fonctionnalités et partager votre avis sur vos films préférés !</p>
            <div>
                <a href="index.php?ctrl=user&action=login" class="btnCustom ">Se connecter</a>
                <a href="index.php?ctrl=user&action=createAccount" class="btnCustom ">S'incrire</a>
            </div>
            <?php } else { ?>
            <h1>Bienvenue <?php echo $_smarty_tpl->tpl_vars['pseudo']->value;?>
 </h1>

            <p class="py-3">Faites-nous découvrir votre univers ! Partagez vos pépites et donnez une note à vos classiques favoris.</p>
            <?php }?>
        </div>

        <div class="col-12 col-md-6 text-center py-5 logo">
            <img src="assets/img/logo_givemefive.png" alt="icon du site">
        </div>
    </section>
    <section id="newMovie" class="container-fluid py-5 text-center">
      <h2>Les Nouveautés du mois</h2>

      <div class="splide py-5">
        <div class="splide__track">
          <ul class="splide__list">

               <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['arrMovieToDisplay']->value, 'objMovie');
$_smarty_tpl->tpl_vars['objMovie']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['objMovie']->value) {
$_smarty_tpl->tpl_vars['objMovie']->do_else = false;
?>
                    <?php $_smarty_tpl->_subTemplateRender("file:views/_partial/newMovie.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


          </ul>
        </div>
      </div>
    </section>
<?php
}
}
/* {/block "content"} */
/* {block "js"} */
class Block_935863695699dbbeba33a80_55487953 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'js' => 
  array (
    0 => 'Block_935863695699dbbeba33a80_55487953',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.5.3/dist/js/splide-extension-auto-scroll.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/Projet2/assets/js/slideIndex.js"><?php echo '</script'; ?>
>

<?php
}
}
/* {/block "js"} */
}
