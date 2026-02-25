<?php
/* Smarty version 5.8.0, created on 2026-02-24 14:47:49
  from 'file:views/dashboard_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_699dba15122ee8_26260336',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a41bfa6ad9ef5f3cc44fab8d0aba63facde696c0' => 
    array (
      0 => 'views/dashboard_view.tpl',
      1 => 1771943991,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_699dba15122ee8_26260336 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1083846679699dba1510f774_08352650', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1931413383699dba15111742_94508662', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1661528775699dba151125f7_13628013', "css_variation");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_139724657699dba15113595_35120343', "content");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_546770500699dba15121bc8_81600441', "js");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_1083846679699dba1510f774_08352650 extends \Smarty\Runtime\Block
{
public $prepend = 'true';
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Dashboard<?php
}
}
/* {/block "title"} */
/* {block "description"} */
class Block_1931413383699dba15111742_94508662 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
}
}
/* {/block "description"} */
/* {block "css_variation"} */
class Block_1661528775699dba151125f7_13628013 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/Projet2/assets/css/style.css">
<?php
}
}
/* {/block "css_variation"} */
/* {block "content"} */
class Block_139724657699dba15113595_35120343 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
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
            <h5 class="fw-bold text-uppercase mb-3">Les plus likés</h5>
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
            <h5 class="fw-bold text-uppercase mb-3">Les plus commentés</h5>
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
            <h5 class="fw-bold text-uppercase mb-3">Derniers ajouts</h5>
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
class Block_546770500699dba15121bc8_81600441 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
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
