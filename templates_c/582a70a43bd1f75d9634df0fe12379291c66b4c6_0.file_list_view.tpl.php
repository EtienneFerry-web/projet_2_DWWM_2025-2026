<?php
/* Smarty version 5.7.0, created on 2026-02-09 13:14:25
  from 'file:views/list_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_6989ddb18d9e15_96414846',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '582a70a43bd1f75d9634df0fe12379291c66b4c6' => 
    array (
      0 => 'views/list_view.tpl',
      1 => 1769785504,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/_partial/filtersList.tpl' => 2,
    'file:views/_partial/movieList.tpl' => 1,
  ),
))) {
function content_6989ddb18d9e15_96414846 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_401627236989ddb18b95c8_07897694', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_11928394476989ddb18bf703_73008881', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_19600697696989ddb18c1cf6_93157770', "content");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_18668401546989ddb18d8509_00226874', "js");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_401627236989ddb18b95c8_07897694 extends \Smarty\Runtime\Block
{
public $prepend = 'true';
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>
Catalogue<?php
}
}
/* {/block "title"} */
/* {block "description"} */
class Block_11928394476989ddb18bf703_73008881 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>
Notre liste de film, par categorie, réalisateur ...<?php
}
}
/* {/block "description"} */
/* {block "content"} */
class Block_19600697696989ddb18c1cf6_93157770 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>

<section id="listFilter" class="container text-center text-lg-start row py-5 mx-auto">
	<h1 >Liste film</h1>
	<div class="col-12 col-lg-3 p-3 ">

        <div class="accordion d-block d-lg-none" id="filtersAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFilters">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFilters">
                        Filtres
                    </button>
                </h2>
                <div id="collapseFilters" class="accordion-collapse collapse" data-bs-parent="#filtersAccordion">
                    <div class="accordion-body">
                        <?php $_smarty_tpl->renderSubTemplate("file:views/_partial/filtersList.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-none d-lg-block">
            <h4 class="mb-3">Filtres</h4>
            <?php $_smarty_tpl->renderSubTemplate("file:views/_partial/filtersList.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
        </div>
	</div>

	<div class="col-12 col-lg-9 p-3 scrollList">
            <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('arrMovieToDisplay')) === 0) {?>
               <h2 class="text-center">Aucun Résultat !</h2>
            <?php } else { ?>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrMovieToDisplay'), 'objMovie');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('objMovie')->value) {
$foreach0DoElse = false;
?>
                    <?php $_smarty_tpl->renderSubTemplate("file:views/_partial/movieList.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
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
class Block_18668401546989ddb18d8509_00226874 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>

        <?php echo '<script'; ?>
 src="/Projet2/assets/js/search.js"> <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "js"} */
}
