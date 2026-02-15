<?php
/* Smarty version 5.7.0, created on 2026-02-13 20:37:18
  from 'file:views/allUser_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_698f8b7ee341a7_85365935',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3cbe51d0e82a84065cd77869c2a1f56f1c4e4aeb' => 
    array (
      0 => 'views/allUser_view.tpl',
      1 => 1770990163,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_698f8b7ee341a7_85365935 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1493494415698f8b7ee26289_79428498', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_496655502698f8b7ee280f9_22932022', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_590413990698f8b7ee28fa0_00680942', "css_variation");
?>



<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_418818043698f8b7ee2a4b3_77227061', "content");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1205162945698f8b7ee329c2_78474640', "js");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_1493494415698f8b7ee26289_79428498 extends \Smarty\Runtime\Block
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
class Block_496655502698f8b7ee280f9_22932022 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
}
}
/* {/block "description"} */
/* {block "css_variation"} */
class Block_590413990698f8b7ee28fa0_00680942 extends \Smarty\Runtime\Block
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
class Block_418818043698f8b7ee2a4b3_77227061 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

<section id="dashboard" class="container py-5">
    <h1>DashBoard</h1>

    <div class="py-2 row g-2">
        <a id="user" href="index.php?ctrl=admin&action=dashboard" class="nav-link col-2">Home</a>
        <a id="user" href="index.php?ctrl=admin&action=allUser" class="nav-link col-2 active">Utilisateurs</a>
        <a id="addMovie" href="index.php?ctrl=admin&action=allMovie" class="nav-link col-2">Films</a>
        <a id="person" href="index.php?ctrl=admin&action=allPerson" class="nav-link col-2">Célébrités</a>
        <a id="report" href="index.php?ctrl=admin&action=allReport" class="nav-link col-2">Signalement</a>
    </div>

    <div id="ficheMovie" class="d-flex flex-column">
        <h2>Tous les Utilisateurs</h2>

        <form class="row g-1 align-items-center py-3">
            <div class="col-12 col-md-5 p-0">
                <input class="form-control" type="search" placeholder="Rechercher..." name="search" value="">
            </div>
            <div class="col-12 col-md-5 p-0">
                <select class="form-select">
                    <option value="">Tous Les Grades</option>
                    <option value="usa">Croissant</option>
                    <option value="france">Decroissant</option>
                </select>
            </div>
            <div class="col-12 col-md-2 p-0">
                <button type="submit" class="w-100 p-1 btnCustom" id="sendMovie">Recherche</button>
            </div>
        </form>

        <div class="allMovie">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrUserToDisplay'), 'objUser');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('objUser')->value) {
$foreach0DoElse = false;
?>
                <div class="row g-2 align-items-center py-2 border-bottom">
                    <div class="col-2 col-md-1">
                        <span class="spanMovie fw-bold">#<?php echo $_smarty_tpl->getValue('objUser')->getId();?>
</span>
                    </div>
                    <div class="col-10 col-md-5">
                        <span class="spanMovie"><?php echo $_smarty_tpl->getValue('objUser')->getPseudo();?>
</span>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end gap-3">
                        <a href="" class="btn btn-sm btn-outline-dark px-5">Modifier</a>
                        <a href="index.php?ctrl=movie&action=deleteAccount&id=<?php echo $_smarty_tpl->getValue('objUser')->getId();?>
"
                        class="btn btn-sm btn-outline-danger px-5"
                        onclick="return confirm('Vous allez supprimer le film <?php echo strtr((string)$_smarty_tpl->getValue('objUser')->getPseudo(), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", 
						"\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S",
						"`" => "\\`", "\${" => "\\\$\{"));?>
')">
                            Supprimer
                        </a>
                    </div>
                </div>
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
class Block_1205162945698f8b7ee329c2_78474640 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block "js"} */
}
