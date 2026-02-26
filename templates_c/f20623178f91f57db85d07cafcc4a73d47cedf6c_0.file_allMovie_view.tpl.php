<?php
/* Smarty version 5.8.0, created on 2026-02-25 17:52:38
  from 'file:views/allMovie_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_699f36e648e840_73652691',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f20623178f91f57db85d07cafcc4a73d47cedf6c' => 
    array (
      0 => 'views/allMovie_view.tpl',
      1 => 1772000816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_699f36e648e840_73652691 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1028489189699f36e62eec88_84622168', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_861201746699f36e62f07d8_49992349', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_459767212699f36e62f1638_44023917', "css_variation");
?>



<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1924479941699f36e62f2538_53103558', "content");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_414931364699f36e648d8a5_38745067', "js");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_1028489189699f36e62eec88_84622168 extends \Smarty\Runtime\Block
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
class Block_861201746699f36e62f07d8_49992349 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
}
}
/* {/block "description"} */
/* {block "css_variation"} */
class Block_459767212699f36e62f1638_44023917 extends \Smarty\Runtime\Block
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
class Block_1924479941699f36e62f2538_53103558 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

    <section id="dashboard" class="container py-5">
        <h1>DashBoard</h1>

        <div class="py-2 row g-2">
            <a id="user" href="index.php?ctrl=admin&action=dashboard" class="nav-link col-2">Home</a>
            <a id="user" href="index.php?ctrl=user&action=allUser" class="nav-link col-2">Utilisateurs</a>
            <a id="addMovie" href="index.php?ctrl=movie&action=allMovie" class="nav-link col-2 active">Films</a>
            <a id="person" href="index.php?ctrl=person&action=allPerson" class="nav-link col-2">Célébrités</a>
            <a id="report" href="index.php?ctrl=report&action=allReport" class="nav-link col-2">Signalement</a>
        </div>

        <div id="ficheMovie" class="d-flex flex-column">
            <h2>Tous les films</h2>

            <form class="row g-1 align-items-center py-3">
                <input type="hidden" name="ctrl" value="movie">
                <input type="hidden" name="action" value="allMovie">
                <div class="col-12 col-md-3 p-0">
                    <input class="form-control" type="search" placeholder="Rechercher..." name="search"
                        value="<?php echo (($tmp = $_smarty_tpl->getValue('search') ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                </div>
                <div class="col-12 col-md-3 p-0">
                    <select class="form-select" name="filter" onchange="this.form.submit()">
                        <option value="0" <?php if ($_smarty_tpl->getValue('filter') == '0') {?>selected<?php }?>>Tous les genres</option>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrCatToDisplay'), 'arrDetCategory');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('arrDetCategory')->value) {
$foreach0DoElse = false;
?>
                            <option class="form-control" value="<?php echo $_smarty_tpl->getValue('arrDetCategory')->getId();?>
"
                                <?php if ($_smarty_tpl->getValue('filter') == $_smarty_tpl->getValue('arrDetCategory')->getId()) {?>selected<?php }?>>
                                <?php echo $_smarty_tpl->getValue('arrDetCategory')->getCategories();?>

                            </option>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </select>
                </div>
                <div class="col-6 col-md-3 p-0">
                    <select class="form-select" name="sort" onchange="this.form.submit()">
                        <option value="asc" <?php if ($_smarty_tpl->getValue('sort') == 'asc' || $_smarty_tpl->getValue('sort') == '') {?>selected<?php }?>>Nom (A-Z)</option>
                        <option value="desc" <?php if ($_smarty_tpl->getValue('sort') == 'desc') {?>selected<?php }?>>Nom (Z-A)</option>
                    </select>
                </div>
                <div class="col-12 col-md-3 p-0">
                    <button type="submit" class="w-100 p-1 btnCustom" id="sendMovie">Recherche</button>
                </div>
            </form>

            <div class="allMovie">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrMovieToDisplay'), 'objMovie');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('objMovie')->value) {
$foreach1DoElse = false;
?>
                    <div class="row g-2 align-items-center py-2 border-bottom">
                        <div class="col-2 col-md-1">
                            <span class="spanMovie fw-bold">#<?php echo $_smarty_tpl->getValue('objMovie')->getId();?>
</span>
                        </div>
                        <div class="col-10 col-md-5">
                            <a class="text-decoration-none"
                                href="index.php?ctrl=movie&action=movie&id=<?php echo $_smarty_tpl->getValue('objMovie')->getId();?>
"><span
                                    class="spanMovie"><?php echo $_smarty_tpl->getValue('objMovie')->getTitle();?>
</span></a>
                        </div>
                        <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end gap-3">
                            <a href="index.php?ctrl=movie&action=addEditMovie&id=<?php echo $_smarty_tpl->getValue('objMovie')->getId();?>
"
                                class="btn btn-sm btn-outline-dark px-5">Modifier</a>
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
class Block_414931364699f36e648d8a5_38745067 extends \Smarty\Runtime\Block
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
