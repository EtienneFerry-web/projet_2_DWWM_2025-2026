<?php
/* Smarty version 5.7.0, created on 2026-02-13 20:27:14
  from 'file:views/allMovie_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_698f8922bb7270_38823409',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f20623178f91f57db85d07cafcc4a73d47cedf6c' => 
    array (
      0 => 'views/allMovie_view.tpl',
      1 => 1771003769,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_698f8922bb7270_38823409 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1448889470698f8922b9c5b5_94710653', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1128376005698f8922ba3e32_46974649', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2006740934698f8922ba5637_60175515', "css_variation");
?>



<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1756478838698f8922ba6b39_79777195', "content");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_39405823698f8922bb6578_23651058', "js");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_1448889470698f8922b9c5b5_94710653 extends \Smarty\Runtime\Block
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
class Block_1128376005698f8922ba3e32_46974649 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
}
}
/* {/block "description"} */
/* {block "css_variation"} */
class Block_2006740934698f8922ba5637_60175515 extends \Smarty\Runtime\Block
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
class Block_1756478838698f8922ba6b39_79777195 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

<section id="dashboard" class="container py-5">
    <h1>DashBoard</h1>

    <div class="py-2 row g-2">
        <a id="user" href="index.php?ctrl=admin&action=dashboard" class="nav-link col-2">Home</a>
        <a id="user" href="index.php?ctrl=admin&action=allUser" class="nav-link col-2">Utilisateurs</a>
        <a id="addMovie" href="index.php?ctrl=admin&action=allMovie" class="nav-link col-2 active">Films</a>
        <a id="person" href="index.php?ctrl=admin&action=allPerson" class="nav-link col-2">Célébrités</a>
        <a id="report" href="index.php?ctrl=admin&action=allReport" class="nav-link col-2">Signalement</a>
    </div>

    <div id="ficheMovie" class="d-flex flex-column">
        <h2>Tous les films</h2>

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
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrMovieToDisplay'), 'objMovie');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('objMovie')->value) {
$foreach0DoElse = false;
?>
                <div class="row g-2 align-items-center py-2 border-bottom">
                    <div class="col-2 col-md-1">
                        <span class="spanMovie fw-bold">#<?php echo $_smarty_tpl->getValue('objMovie')->getId();?>
</span>
                    </div>
                    <div class="col-10 col-md-5">
                        <span class="spanMovie"><?php echo $_smarty_tpl->getValue('objMovie')->getTitle();?>
</span>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end gap-3">
                        <a href="index.php?ctrl=movie&action=addEditMovie&id=<?php echo $_smarty_tpl->getValue('objMovie')->getId();?>
" class="btn btn-sm btn-outline-dark px-5">Modifier</a>
                        <a href="index.php?ctrl=movie&action=deleteMovie&id=<?php echo $_smarty_tpl->getValue('objMovie')->getId();?>
"
                        class="btn btn-sm btn-outline-danger px-5"
                        onclick="return confirm('Vous allez supprimer le film <?php echo strtr((string)$_smarty_tpl->getValue('objMovie')->getTitle(), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", 
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
class Block_39405823698f8922bb6578_23651058 extends \Smarty\Runtime\Block
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
