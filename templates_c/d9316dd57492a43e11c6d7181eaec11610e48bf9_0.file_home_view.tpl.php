<?php
/* Smarty version 5.7.0, created on 2026-02-11 15:08:29
  from 'file:views/home_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_698c9b6da8a863_79249562',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd9316dd57492a43e11c6d7181eaec11610e48bf9' => 
    array (
      0 => 'views/home_view.tpl',
      1 => 1770634641,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/_partial/newMovie.tpl' => 1,
  ),
))) {
function content_698c9b6da8a863_79249562 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1495014236698c9b6da478b5_31576065', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_333666592698c9b6da51895_93690722', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1979266322698c9b6da58028_22314904', "css_variation");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1454505448698c9b6da5e245_91917432', "content");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_439187265698c9b6da86452_21151745', "js");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_1495014236698c9b6da478b5_31576065 extends \Smarty\Runtime\Block
{
public $prepend = 'true';
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>
Accueil<?php
}
}
/* {/block "title"} */
/* {block "description"} */
class Block_333666592698c9b6da51895_93690722 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>
bienvenue sur notre accueil !!!!<?php
}
}
/* {/block "description"} */
/* {block "css_variation"} */
class Block_1979266322698c9b6da58028_22314904 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide-core.min.css">
<?php
}
}
/* {/block "css_variation"} */
/* {block "content"} */
class Block_1454505448698c9b6da5e245_91917432 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>

    <section id="hero" class=" container  row mx-auto py-5">
        <div class="col-12 col-md-6 d-flex flex-column justify-content-center text-center text-md-start  py-5">
            <?php if (!(true && (true && null !== ($_SESSION['user'] ?? null)))) {?>
            <h1>Bienvenue sur give me five</h1>
            <p class="py-3">N'hésitez a vous connecter ou vous créer un compte pour accéder a plus de fonctionnalité donnez votre avis sur nos film !</p>
            <div>
                <a href="index.php?ctrl=user&action=login" class="btnCustom ">Se connecter</a>
                <a href="index.php?ctrl=user&action=createAccount" class="btnCustom ">S'incrire</a>
            </div>
            <?php } else { ?>
            <h1>Bienvenue <?php echo $_smarty_tpl->getValue('pseudo');?>
 </h1>

            <p class="py-3">On veut connaître vos goûts ! Sentez-vous libres de présenter et noter vos films favoris.</p>
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
class Block_439187265698c9b6da86452_21151745 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
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
