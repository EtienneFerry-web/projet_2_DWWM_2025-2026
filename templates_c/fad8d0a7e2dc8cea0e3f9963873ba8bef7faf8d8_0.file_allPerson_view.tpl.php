<?php
/* Smarty version 5.7.0, created on 2026-02-15 19:15:25
  from 'file:views/allPerson_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_69921b4d74d100_18795796',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fad8d0a7e2dc8cea0e3f9963873ba8bef7faf8d8' => 
    array (
      0 => 'views/allPerson_view.tpl',
      1 => 1771182918,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69921b4d74d100_18795796 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_53276750169921b4d724a26_09645851', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_60485742769921b4d72b4d3_78274988', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_50733443269921b4d72d366_14625021', "css_variation");
?>



<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_95968984769921b4d72f260_42300065', "content");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_203632959169921b4d74bd77_17591107', "js");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_53276750169921b4d724a26_09645851 extends \Smarty\Runtime\Block
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
class Block_60485742769921b4d72b4d3_78274988 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
}
}
/* {/block "description"} */
/* {block "css_variation"} */
class Block_50733443269921b4d72d366_14625021 extends \Smarty\Runtime\Block
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
class Block_95968984769921b4d72f260_42300065 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

<section id="dashboard" class="container py-5">
    <h1>DashBoard</h1>

    <div class="py-2 row g-2">
        <a id="user" href="index.php?ctrl=admin&action=dashboard" class="nav-link col-2">Home</a>
        <a id="user" href="index.php?ctrl=admin&action=allUser" class="nav-link col-2">Utilisateurs</a>
        <a id="addMovie" href="index.php?ctrl=admin&action=allMovie" class="nav-link col-2">Films</a>
        <a id="person" href="index.php?ctrl=admin&action=allPerson" class="nav-link col-2 active">Célébrités</a>
        <a id="report" href="index.php?ctrl=admin&action=allReport" class="nav-link col-2">Signalement</a>
    </div>

    <div id="ficheMovie" class="d-flex flex-column">
        <h2>Tous les Célébrités</h2>

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
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrPersonToDisplay'), 'objPerson');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('objPerson')->value) {
$foreach0DoElse = false;
?>
                <div class="row g-2 align-items-center py-2 border-bottom">
                    <div class="col-2 col-md-1">
                        <span class="spanMovie fw-bold">#<?php echo $_smarty_tpl->getValue('objPerson')->getId();?>
</span>
                    </div>
                    <div class="col-10 col-md-5">
                        <span class="spanMovie"><?php echo $_smarty_tpl->getValue('objPerson')->getFullName();?>
</span>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end gap-3">
                        <a href="index.php?ctrl=person&action=settingsPerson&id=<?php echo $_smarty_tpl->getValue('objPerson')->getId();?>
" class="btn btn-sm btn-outline-dark px-5">Modifier</a>
                        <a href="index.php?ctrl=movie&action=deletePerson&id=<?php echo $_smarty_tpl->getValue('objPerson')->getId();?>
"
                        class="btn btn-sm btn-outline-danger px-5"
                        onclick="return confirm('Vous allez supprimer <?php echo strtr((string)$_smarty_tpl->getValue('objPerson')->getFullName(), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", 
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
class Block_203632959169921b4d74bd77_17591107 extends \Smarty\Runtime\Block
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
