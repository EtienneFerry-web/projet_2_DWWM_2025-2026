<?php
/* Smarty version 5.7.0, created on 2026-01-30 18:32:20
  from 'file:views/person_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_697cf9349512a1_80520694',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6c3fea10f35c0339744c381967e031092750666d' => 
    array (
      0 => 'views/person_view.tpl',
      1 => 1769797403,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/_partial/movieOfPerson.tpl' => 1,
  ),
))) {
function content_697cf9349512a1_80520694 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_722509507697cf93493d7f4_65818928', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1062387658697cf93493f7b5_96951780', "description");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1539801495697cf934940618_45214974', "content");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1809096419697cf9349508c9_31922269', "js");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_722509507697cf93493d7f4_65818928 extends \Smarty\Runtime\Block
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
class Block_1062387658697cf93493f7b5_96951780 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Ici vous pouvez ajouter un film !<?php
}
}
/* {/block "description"} */
/* {block "content"} */
class Block_1539801495697cf934940618_45214974 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

<section class="container row mx-auto" id="actor">
    <div class="col-12 col-md-3 py-5 text-center ">
        <img src="<?php echo $_smarty_tpl->getValue('objPerson')->getPhoto();?>
" alt="Photo de <?php echo $_smarty_tpl->getValue('objPerson')->getFullName();?>
" class="img-fluid w-75 w-50">
        <div class="py-3 text-center w-75 w-md-50 mx-auto">
            <span class="spanMovie d-block py-1"><?php echo $_smarty_tpl->getValue('objPerson')->getCountry();?>
</span>
            <span class="spanMovie d-block py-1">Née : <?php echo $_smarty_tpl->getValue('objPerson')->getBirthDate();?>
</span>
            
                        <?php if ($_smarty_tpl->getValue('objPerson')->getDeathDate()) {?>
                <span class="spanMovie d-block py-1">Mort : <?php echo $_smarty_tpl->getValue('objPerson')->getDeathDate();?>
</span>
            <?php }?>
            
            <p><?php echo $_smarty_tpl->getValue('objPerson')->getBio();?>
</p>
        </div>
    </div>

    <div class="col-12 col-md-9 py-1 py-md-5 text-center text-md-start ">
        <h1 class="d-md"><?php echo $_smarty_tpl->getValue('objPerson')->getFullName();?>
</h1>
        
        <form method="post" class="row filterActor align-items-center">
            <div class="col-5 col-md-4 ">
                <select class="form-select" name="order">
                    <option value="">Date</option>
                    <option value="ASC" <?php if ($_smarty_tpl->getValue('order') === "ASC") {?>selected<?php }?>>Croissant</option>
                    <option value="DESC" <?php if ($_smarty_tpl->getValue('order') === "DESC") {?>selected<?php }?>>Decroissant</option>
                </select>
            </div>

            <div class="col-5 col-md-4">
                <select class="form-select" name="job" >
                    <option value="">Rôle</option>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrJobToDisplay'), 'objJobs');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('objJobs')->value) {
$foreach0DoElse = false;
?>
                        <option value="<?php echo $_smarty_tpl->getValue('objJobs')->getId();?>
" <?php if ($_smarty_tpl->getValue('objJobs')->getId() == $_smarty_tpl->getValue('job')) {?>selected<?php }?>>
                            <?php echo $_smarty_tpl->getValue('objJobs')->getNameJob();?>

                        </option>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </select>
            </div>

            <a href="/Projet2/index.php?ctrl=person&action=person&id=<?php echo $_smarty_tpl->getValue('objPerson')->getId();?>
" class="col-12 col-md-2 p-1 nav-link">
                Réinitialiser
            </a>
            <button type="submit" class="col-12 col-md-2 p-1 nav-link">
                Recherche
            </button>
        </form>

        <div class="row p-3 scrollList">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrMovieToDisplay'), 'objMovie');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('objMovie')->value) {
$foreach1DoElse = false;
?>
                <?php $_smarty_tpl->renderSubTemplate("file:views/_partial/movieOfPerson.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </div>
    </div>
</section>

<?php
}
}
/* {/block "content"} */
/* {block "js"} */
class Block_1809096419697cf9349508c9_31922269 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

    <?php echo '<script'; ?>
 src="/Projet2/assets/js/person.js"> <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "js"} */
}
