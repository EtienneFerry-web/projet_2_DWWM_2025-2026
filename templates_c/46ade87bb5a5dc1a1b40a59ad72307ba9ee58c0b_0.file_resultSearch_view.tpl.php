<?php
/* Smarty version 5.8.0, created on 2026-02-26 13:56:09
  from 'file:views/resultSearch_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_69a050f907caa2_72280667',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '46ade87bb5a5dc1a1b40a59ad72307ba9ee58c0b' => 
    array (
      0 => 'views/resultSearch_view.tpl',
      1 => 1772029740,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/_partial/movieSearch.tpl' => 1,
  ),
))) {
function content_69a050f907caa2_72280667 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_50580981969a050f9021be5_27350100', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1995680869a050f902c0f3_79499490', "description");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_91958784269a050f9035152_42192302', "content");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_4429604569a050f90776a6_05203969', "js");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_50580981969a050f9021be5_27350100 extends \Smarty\Runtime\Block
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
class Block_1995680869a050f902c0f3_79499490 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Ici vous pouvez ajouter un film !<?php
}
}
/* {/block "description"} */
/* {block "content"} */
class Block_91958784269a050f9035152_42192302 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

<section id="search" class="container row flex-lg-row-reverse py-5 mx-auto text-center text-lg-start">
    <h1>Resultat</h1>
    <p>Résultat a la recherche "<?php echo $_smarty_tpl->getValue('arrSearch')->getSearch();?>
".</p>
    <div class="py-2 col-12 col-lg-4">
        <form method="post" action="index.php?ctrl=search&action=searchPage">
            <input type="hidden" name="search" value="<?php echo $_smarty_tpl->getValue('arrSearch')->getSearch();?>
">
            <label class="form-label w-100 border-bottom border-dark">Résultat Par :</label>

            <div class="d-block text-start p-2">
                <input type="radio" class="btn-check" name="searchBy" value="3" id="filter-actors" onchange="this.form.submit()">
                <label class="nav-link text-uppercase" for="filter-actors">Acteur</label>
            </div>

            <div class="d-block text-start p-2">
                <input type="radio" class="btn-check" name="searchBy" value="2" id="filter-producer" onchange="this.form.submit()">
                <label class="nav-link text-uppercase" for="filter-producer">Producteur</label>
            </div>

            <div class="d-block text-start p-2">
                <input type="radio" class="btn-check" name="searchBy" value="1" id="filter-director" onchange="this.form.submit()">
                <label class="nav-link text-uppercase" for="filter-director">Réalisateur</label>
            </div>

            <div class="d-block text-start p-2">
                <input type="radio" class="btn-check" name="searchBy" value="4" id="filter-user" onchange="this.form.submit()">
                <label class="nav-link text-uppercase" for="filter-user">Utilisateur</label>
            </div>

            <div class="d-block text-start p-2">
                <input type="radio" class="btn-check" name="searchBy" value="5" id="filter-movie" onchange="this.form.submit()">
                <label class="nav-link text-uppercase" for="filter-movie">Film</label>
            </div>
            <div class="d-block text-start p-2">
                <input type="radio" class="btn-check" name="searchBy" value="0" id="filter-default" onchange="this.form.submit()">
                <label class="nav-link text-uppercase" for="filter-default">Par defaut</label>
            </div>
        </form>

    </div>
    <div class="py-2 col-12 col-lg-8 scrollSearch">
    
    <?php if (( !$_smarty_tpl->hasVariable('arrResultToDisplay') || empty($_smarty_tpl->getValue('arrResultToDisplay'))) || $_smarty_tpl->getValue('arrResultToDisplay') === 0) {?>
       <h2 class='text-center'>Aucun Résultat !</h2>
    <?php } else { ?>
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrResultToDisplay'), 'objContent');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('objContent')->value) {
$foreach0DoElse = false;
?>
            <?php $_smarty_tpl->renderSubTemplate("file:views/_partial/movieSearch.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    <?php }?>
    </div>

</section>
<?php
}
}
/* {/block "content"} */
/* {block "js"} */
class Block_4429604569a050f90776a6_05203969 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

    <?php echo '<script'; ?>
 src="/Projet2/assets/js/search.js"> <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "js"} */
}
