<?php
/* Smarty version 5.8.0, created on 2026-02-25 16:33:30
  from 'file:views/home_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_699f245a5558c5_70740515',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '27394379dc99c228fc92f3598fcd7ef3d3eaa5ad' => 
    array (
      0 => 'views/home_view.tpl',
      1 => 1772000816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/_partial/newMovie.tpl' => 1,
  ),
))) {
function content_699f245a5558c5_70740515 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1283183817699f245a53d592_90680132', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_262621290699f245a53f0f1_39451100', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_251703239699f245a53fff9_87009820', "css_variation");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1237314477699f245a540d35_06959211', "content");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_887019321699f245a554d47_40322981', "js");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_1283183817699f245a53d592_90680132 extends \Smarty\Runtime\Block
{
public $prepend = 'true';
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Accueil<?php
}
}
/* {/block "title"} */
/* {block "description"} */
class Block_262621290699f245a53f0f1_39451100 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Bienvenue sur notre accueil !!!!<?php
}
}
/* {/block "description"} */
/* {block "css_variation"} */
class Block_251703239699f245a53fff9_87009820 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide-core.min.css">
<?php
}
}
/* {/block "css_variation"} */
/* {block "content"} */
class Block_1237314477699f245a540d35_06959211 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

        <a href="index.php?ctrl=page&action=contact"
            class="btn btn-light position-fixed bottom-0 end-0 m-4 rounded-circle shadow-lg d-flex align-items-center justify-content-center"
            style="width: 50px; height: 50px; z-index: 999;">

        <i class="bi bi-chat-dots-fill fs-3"></i>

    </a>
    <section id="hero" class=" container  row mx-auto py-5">
        <div class="col-12 col-md-6 d-flex flex-column justify-content-center text-center text-md-start  py-5">
            <?php if (!(true && (true && null !== ($_SESSION['user'] ?? null)))) {?>
            <h1>Bienvenue sur give me five</h1>
            <p class="py-3">Connectez-vous ou créez un compte pour accéder à toutes nos fonctionnalités et partager votre avis sur vos films préférés !</p>
            <div>
                <a href="index.php?ctrl=user&action=login" class="btnCustom ">Se connecter</a>
                <a href="index.php?ctrl=user&action=createAccount" class="btnCustom ">S'incrire</a>
            </div>
            <?php } else { ?>
            <h1>Bienvenue <?php echo $_smarty_tpl->getValue('pseudo');?>
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
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrMovieToDisplay'), 'objMovie');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('objMovie')->value) {
$foreach0DoElse = false;
?>
                    <?php $_smarty_tpl->renderSubTemplate("file:views/_partial/newMovie.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


          </ul>
        </div>
      </div>
    </section>
<?php
}
}
/* {/block "content"} */
/* {block "js"} */
class Block_887019321699f245a554d47_40322981 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
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
