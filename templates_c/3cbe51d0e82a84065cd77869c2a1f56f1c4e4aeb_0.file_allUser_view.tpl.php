<?php
/* Smarty version 5.8.0, created on 2026-02-26 16:33:40
  from 'file:views/allUser_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_69a075e44aace5_24032588',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3cbe51d0e82a84065cd77869c2a1f56f1c4e4aeb' => 
    array (
      0 => 'views/allUser_view.tpl',
      1 => 1772000816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69a075e44aace5_24032588 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_115267098269a075e445a3f4_90943563', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_678188869a075e445be34_32874447', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_135773600869a075e445cc26_41775055', "css_variation");
?>



<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_122428037269a075e445d963_37639843', "content");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_31827114769a075e44a9eb4_05178691', "js");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_115267098269a075e445a3f4_90943563 extends \Smarty\Runtime\Block
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
class Block_678188869a075e445be34_32874447 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
}
}
/* {/block "description"} */
/* {block "css_variation"} */
class Block_135773600869a075e445cc26_41775055 extends \Smarty\Runtime\Block
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
class Block_122428037269a075e445d963_37639843 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

<section id="dashboard" class="container py-5">
    <h1>DashBoard</h1>

    <div class="py-2 row g-2">
        <a id="user" href="index.php?ctrl=admin&action=dashboard" class="nav-link col-2">Home</a>
        <a id="user" href="index.php?ctrl=user&action=allUser" class="nav-link col-2 active">Utilisateurs</a>
        <a id="addMovie" href="index.php?ctrl=movie&action=allMovie" class="nav-link col-2">Films</a>
        <a id="person" href="index.php?ctrl=person&action=allPerson" class="nav-link col-2">Célébrités</a>
        <a id="report" href="index.php?ctrl=report&action=allReport" class="nav-link col-2">Signalement</a>
    </div>

    <div id="ficheMovie" class="d-flex flex-column">
        <h2>Tous les Utilisateurs</h2>

        <form class="row g-1 align-items-center py-3" method="GET" action="index.php">
            <input type="hidden" name="ctrl" value="user">
            <input type="hidden" name="action" value="allUser">
            <div class="col-12 col-md-5 p-0">
                <input class="form-control" type="search" placeholder="Rechercher..." name="search" value="<?php echo (($tmp = $_smarty_tpl->getValue('searchTerm') ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
            </div>
            <div class="col-12 col-md-5 p-0">
                <select class="form-select" name="filter" onchange="this.form.submit()">
                    <option value="all"     <?php if ($_smarty_tpl->getValue('filter') == 'all') {?>selected<?php }?>>Tous Les Grades</option>
                    <option value="asc"     <?php if ($_smarty_tpl->getValue('filter') == 'asc') {?>selected<?php }?>>Croissant</option>
                    <option value="desc"    <?php if ($_smarty_tpl->getValue('filter') == 'desc') {?>selected<?php }?>>Decroissant</option>
                    <option value="admin"   <?php if ($_smarty_tpl->getValue('filter') == 'admin') {?>selected<?php }?>>Administrateurs</option>
                    <option value="modo"    <?php if ($_smarty_tpl->getValue('filter') == 'modo') {?>selected<?php }?>>Modérateurs</option>
                    <option value="user"    <?php if ($_smarty_tpl->getValue('filter') == 'user') {?>selected<?php }?>>Utilisateurs</option>
                </select>
            </div>
            <div class="col-12 col-md-2 p-0">
                <button type="submit" class="w-100 p-1 btnCustom" id="sendUser">Recherche</button>
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
                    <a class="text-decoration-none" href="index.php?ctrl=user&action=user&id=<?php echo $_smarty_tpl->getValue('objUser')->getId();?>
"><span class="spanMovie"><?php echo $_smarty_tpl->getValue('objUser')->getPseudo();?>
</span></a>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end gap-3">

                        <?php if ($_SESSION['user']['user_funct_id'] > $_smarty_tpl->getValue('objUser')->getUser_funct_id()) {?>
                        <form action="index.php?ctrl=user&action=updateGrade&id=<?php echo $_smarty_tpl->getValue('objUser')->getId();?>
" method="post">
                            <select name="user_funct_id" class="form-select form-select-sm" onchange="this.form.submit()">
                                <option value="1" <?php if ($_smarty_tpl->getValue('objUser')->getUser_funct_id() == 1) {?>selected<?php }?> >Utilisateur</option>
                                <option value="2" <?php if ($_smarty_tpl->getValue('objUser')->getUser_funct_id() == 2) {?>selected<?php }?> >Modérateur</option>

                            <?php if ($_SESSION['user']['user_funct_id'] == 3) {?>
                                    <option value="3" <?php if ($_smarty_tpl->getValue('objUser')->getUser_funct_id() == 3) {?>selected<?php }?>>Administrateur</option>
                            <?php }?>
                            </select>
                        </form>
                        <?php } else { ?>
                            <span >
                                <?php if ($_smarty_tpl->getValue('objUser')->getUser_funct_id() == 1) {?>Utilisateur
                                <?php } elseif ($_smarty_tpl->getValue('objUser')->getUser_funct_id() == 2) {?>Modérateur
                                <?php } elseif ($_smarty_tpl->getValue('objUser')->getUser_funct_id() == 3) {?>Administrateur
                                <?php }?>
                            </span>
                        <?php }?>

                        <?php if ($_SESSION['user']['user_funct_id'] > $_smarty_tpl->getValue('objUser')->getUser_funct_id() || $_SESSION['user']['user_id'] == $_smarty_tpl->getValue('objUser')->getId()) {?>
                            <a href="index.php?ctrl=user&action=settingsAllUser&id=<?php echo $_smarty_tpl->getValue('objUser')->getId();?>
" class="btn btn-sm btn-outline-dark px-5">Modifier</a>
                        <?php }?>

                        <?php if ($_SESSION['user']['user_funct_id'] > $_smarty_tpl->getValue('objUser')->getUser_funct_id() || $_SESSION['user']['user_id'] == $_smarty_tpl->getValue('objUser')->getId()) {?>
                            <a href="index.php?ctrl=user&action=deleteAccount&id=<?php echo $_smarty_tpl->getValue('objUser')->getId();?>
"
                                class="btn btn-sm btn-outline-danger px-5"
                                onclick="return confirm('Vous allez supprimer le film <?php echo strtr((string)$_smarty_tpl->getValue('objUser')->getPseudo(), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", 
						"\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S",
						"`" => "\\`", "\${" => "\\\$\{"));?>
')">
                                Supprimer
                            </a>
                        <?php }?>
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
class Block_31827114769a075e44a9eb4_05178691 extends \Smarty\Runtime\Block
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
