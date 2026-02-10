<?php
/* Smarty version 5.7.0, created on 2026-02-10 16:01:33
  from 'file:views/list_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_698b565d356645_29630177',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4b7a60fc36bf66e8f4de47421ef765d30899fdd' => 
    array (
      0 => 'views/list_view.tpl',
      1 => 1770632078,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/_partial/filtersList.tpl' => 2,
    'file:views/_partial/movieList.tpl' => 1,
  ),
))) {
function content_698b565d356645_29630177 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_892143191698b565d34ab38_56243686', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1517938101698b565d34d450_33498828', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1050466681698b565d34e575_82172058', "content");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_659313500698b565d355bf1_16398765', "js");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_892143191698b565d34ab38_56243686 extends \Smarty\Runtime\Block
{
public $prepend = 'true';
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Catalogue<?php
}
}
/* {/block "title"} */
/* {block "description"} */
class Block_1517938101698b565d34d450_33498828 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Notre liste de film, par categorie, réalisateur ...<?php
}
}
/* {/block "description"} */
/* {block "content"} */
class Block_1050466681698b565d34e575_82172058 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
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
class Block_659313500698b565d355bf1_16398765 extends \Smarty\Runtime\Block
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
