<?php
/* Smarty version 5.7.0, created on 2026-02-06 10:00:38
  from 'file:views/user_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_6985bbc67a5cc4_14993510',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3e6204db2b3faf8be3c5c8ed5d2082aa044c08c2' => 
    array (
      0 => 'views/user_view.tpl',
      1 => 1770372036,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/_partial/likeUser.tpl' => 1,
    'file:views/_partial/reviewMovie.tpl' => 1,
  ),
))) {
function content_6985bbc67a5cc4_14993510 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_14925303776985bbc66ba295_64242992', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_6578746256985bbc66c8084_48459066', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_10417092596985bbc66d54c3_86521596', "css_variation");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1877172606985bbc66e0f98_87944964', "content");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_979140936985bbc679eb30_99699254', "js");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_14925303776985bbc66ba295_64242992 extends \Smarty\Runtime\Block
{
public $prepend = 'true';
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Ajouter un film<?php
}
}
/* {/block "title"} */
/* {block "description"} */
class Block_6578746256985bbc66c8084_48459066 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Ici vous pouvez ajouter un film !<?php
}
}
/* {/block "description"} */
/* {block "css_variation"} */
class Block_10417092596985bbc66d54c3_86521596 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide-core.min.css">
    <link rel="stylesheet" href="/Projet2/assets/css/slideMovie.css">
<?php
}
}
/* {/block "css_variation"} */
/* {block "content"} */
class Block_1877172606985bbc66e0f98_87944964 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

<section id="user" class="container py-2">
    <div class="col-12 row text-center align-items-center text-md-start py-2 mx-auto">
        <div class="col-6 col-md-3 col-lg-2 mx-auto ">
            <img src="<?php echo $_smarty_tpl->getValue('objUser')->getPhoto();?>
" alt="image de profil" class="img-fluid">
        </div>
        <div class="col-12 col-md-9 col-lg-10 ">
            <h1><?php echo $_smarty_tpl->getValue('objUser')->getPseudo();?>
</h1>
            <p><?php echo $_smarty_tpl->getValue('objUser')->getBio();?>
</p>
            <?php if ((true && (true && null !== ($_SESSION['user'] ?? null))) && $_SESSION['user']['user_id'] == $_GET['id']) {?>
                <a href="index.php?ctrl=user&action=settingsUser">Gestion du Compte</a>
            <?php }?>
            <?php if ((true && (true && null !== ($_SESSION['user'] ?? null))) && $_SESSION['user']['user_id'] == $_GET['id'] && $_smarty_tpl->getValue('objUser')->getFunction() === "Administrator") {?>
                <a class="ms-2" href="index.php?ctrl=admin&action=dashboard">Dashboard</a>
            <?php }?>

            <span class="spanMovie d-block py-1 border-0"><?php echo $_smarty_tpl->getValue('objUser')->getFunction();?>
</span>
        </div>
    </div>

    <div class="col-12 py-2">
        <div class="like py-3 col-12">
            <span class="spanMovie d-block col-12">Film Liker</span>
            <div class="splide py-2">
              <div class="splide__track">
                <ul class="splide__list">
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrMovieToDisplay'), 'objLike');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('objLike')->value) {
$foreach0DoElse = false;
?>
                        <?php $_smarty_tpl->renderSubTemplate("file:views/_partial/likeUser.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </ul>
              </div>
            </div>
        </div>
    </div>
</section>

<section id="review" class="container text-center">
    <h2>Vos review / <?php echo $_smarty_tpl->getValue('objUser')->getPseudo();?>
</h2>
    <div class="col-12 col-md-10 mx-auto py-1 scrollList">
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrCommentToDisplay'), 'review');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('review')->value) {
$foreach1DoElse = false;
?>
            <?php $_smarty_tpl->renderSubTemplate("file:views/_partial/reviewMovie.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </div>
</section>


<?php
}
}
/* {/block "content"} */
/* {block "js"} */
class Block_979140936985bbc679eb30_99699254 extends \Smarty\Runtime\Block
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
 src="/Projet2/assets/js/slideMovie.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/Projet2/assets/js/comment.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/Projet2/assets/js/star.js"> <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "js"} */
}
