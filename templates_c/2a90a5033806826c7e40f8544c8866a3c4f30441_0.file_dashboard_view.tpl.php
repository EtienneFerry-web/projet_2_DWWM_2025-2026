<?php
/* Smarty version 5.7.0, created on 2026-02-24 07:34:45
  from 'file:views/dashboard_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_699d549599c372_35550074',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2a90a5033806826c7e40f8544c8866a3c4f30441' => 
    array (
      0 => 'views/dashboard_view.tpl',
      1 => 1771860004,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_699d549599c372_35550074 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1321250495699d549590f0f9_35318219', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_652307337699d5495919fa6_06744578', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_95275351699d5495920326_58649589', "css_variation");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1838487255699d54959269f4_42260741', "content");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_677483653699d54959973f6_70900313', "js");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_1321250495699d549590f0f9_35318219 extends \Smarty\Runtime\Block
{
public $prepend = 'true';
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>
Dashboard<?php
}
}
/* {/block "title"} */
/* {block "description"} */
class Block_652307337699d5495919fa6_06744578 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
}
}
/* {/block "description"} */
/* {block "css_variation"} */
class Block_95275351699d5495920326_58649589 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/Projet2/assets/css/style.css">
<?php
}
}
/* {/block "css_variation"} */
/* {block "content"} */
class Block_1838487255699d54959269f4_42260741 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>

<section id="dashboard" class="container py-5">
    <h1>DashBoard</h1>

    <div class="py-2 row g-2">
        <a id="user" href="index.php?ctrl=admin&action=dashboard" class="nav-link col-2 active">Home</a>
        <a id="user" href="index.php?ctrl=user&action=allUser" class="nav-link col-2">Utilisateurs</a>
        <a id="addMovie" href="index.php?ctrl=movie&action=allMovie" class="nav-link col-2 ">Films</a>
        <a id="person" href="index.php?ctrl=person&action=allPerson" class="nav-link col-2">Célébrités</a>
        <a id="report" href="index.php?ctrl=report&action=allReport" class="nav-link col-2">Signalement</a>
    </div>

    <h2>Home Dashboard</h2>
    <div class="mx-auto py-5">
        <div class="row g-4 mb-5">
            <div class="col-md-4 text-center">
                <h3 class=" display-5 fw-bold"><?php echo $_smarty_tpl->getValue('total_likes');?>
</h3>
                <h4 class=" mb-2">Like sur le site</h4>
            </div>
            <div class="col-md-4 text-center">
                <h3 class=" display-5 fw-bold"><?php echo $_smarty_tpl->getValue('total_movies');?>
</h3>
                <h4 class=" mb-2">Film sur le site</h4>
            </div>
            <div class="col-md-4 text-center">
                <h3 class=" display-5 fw-bold"><?php echo $_smarty_tpl->getValue('total_comments');?>
</h3>
                <h4 class=" mb-2">Commentaires sur le site</h4>
            </div>
        </div>

        <div class="mt-4">
            <h5 class="fw-bold text-uppercase mb-3">Les plus liké</h5>
            <ul class="list-group list-group-flush border-top border-dark">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrTopLikes'), 'objMovie');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('objMovie')->value) {
$foreach0DoElse = false;
?>
                <li class="list-group-item d-flex justify-content-center align-items-center px-0">
                    <a class="text-decoration-none col-4 text-dark" href="index.php?ctrl=movie&action=movie&id=<?php echo $_smarty_tpl->getValue('objMovie')->getId();?>
">
                        <span><?php echo $_smarty_tpl->getValue('objMovie')->getTitle();?>
</span>
                    </a>
                    <span class="col-4 text-center"><?php echo $_smarty_tpl->getValue('objMovie')->getLike();?>
 likes</span>
                    <span class="col-4 text-end"><?php echo $_smarty_tpl->getValue('objMovie')->getNbComments();?>
 commentaires</span>
                </li>
                <?php
}
if ($foreach0DoElse) {
?>
                    <li class="list-group-item text-center">Aucun film trouvé.</li>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </ul>
        </div>

        <div class="mt-4">
            <h5 class="fw-bold text-uppercase mb-3">Les plus commenté</h5>
            <ul class="list-group list-group-flush border-top border-dark">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrTopComments'), 'objMovie');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('objMovie')->value) {
$foreach1DoElse = false;
?>
                <li class="list-group-item d-flex justify-content-center align-items-center px-0">
                    <a class="text-decoration-none col-4 text-dark" href="index.php?ctrl=movie&action=movie&id=<?php echo $_smarty_tpl->getValue('objMovie')->getId();?>
">
                        <span><?php echo $_smarty_tpl->getValue('objMovie')->getTitle();?>
</span>
                    </a>
                    <span class="col-4 text-center"><?php echo $_smarty_tpl->getValue('objMovie')->getLike();?>
 likes</span>
                    <span class="col-4 text-end"><?php echo $_smarty_tpl->getValue('objMovie')->getNbComments();?>
 commentaires</span>
                </li>
                <?php
}
if ($foreach1DoElse) {
?>
                    <li class="list-group-item text-center">Aucun film trouvé.</li>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </ul>
        </div>

        <div class="mt-4">
            <h5 class="fw-bold text-uppercase mb-3">Dernier ajouts</h5>
            <ul class="list-group list-group-flush border-top border-dark">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrLastMovies'), 'objMovie');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('objMovie')->value) {
$foreach2DoElse = false;
?>
                <li class="list-group-item d-flex justify-content-center align-items-center px-0">
                    <a class="text-decoration-none col-4 text-dark" href="index.php?ctrl=movie&action=movie&id=<?php echo $_smarty_tpl->getValue('objMovie')->getId();?>
">
                        <span><?php echo $_smarty_tpl->getValue('objMovie')->getTitle();?>
</span>
                    </a>
                    <span class="col-4 text-center"><?php echo $_smarty_tpl->getValue('objMovie')->getLike();?>
 likes</span>
                    <span class="col-4 text-end"><?php echo $_smarty_tpl->getValue('objMovie')->getNbComments();?>
 commentaires</span>
                </li>
                <?php
}
if ($foreach2DoElse) {
?>
                    <li class="list-group-item text-center">Aucun film trouvé.</li>
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
class Block_677483653699d54959973f6_70900313 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>

    <?php echo '<script'; ?>
 src="assets/js/dasboard.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block "js"} */
}
