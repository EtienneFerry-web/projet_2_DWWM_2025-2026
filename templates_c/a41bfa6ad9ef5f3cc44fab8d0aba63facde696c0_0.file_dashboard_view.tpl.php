<?php
/* Smarty version 5.7.0, created on 2026-02-08 19:43:13
  from 'file:views/dashboard_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_6988e751d80749_44948226',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a41bfa6ad9ef5f3cc44fab8d0aba63facde696c0' => 
    array (
      0 => 'views/dashboard_view.tpl',
      1 => 1770579791,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6988e751d80749_44948226 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_21134445966988e751d68c00_19360648', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_17575039166988e751d6ae62_75937821', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_12523322856988e751d6be97_08349918', "css_variation");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1462475226988e751d6cc39_01100220', "content");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2306109016988e751d7fb36_01473619', "js");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_21134445966988e751d68c00_19360648 extends \Smarty\Runtime\Block
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
class Block_17575039166988e751d6ae62_75937821 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
}
}
/* {/block "description"} */
/* {block "css_variation"} */
class Block_12523322856988e751d6be97_08349918 extends \Smarty\Runtime\Block
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
class Block_1462475226988e751d6cc39_01100220 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

<section id="dashboard" class="container py-5">
    <h1>DashBoard</h1>
    
    <div class="py-2 container row col-12 col-lg-auto">
        <button id="user" class="nav-link col-2">Utilisateurs</button>
        <button id="addMovie" class="nav-link col-2">Films</button>
        <button id="person" class="nav-link col-2">Célébrités</button>
        <button id="report" class="nav-link col-2">Signalement</button>
    </div>

    <div id="ficheMovie" class="d-none">
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
            <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="sendMovie">Recherche</button>
        </form>

        <div class="allMovie">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrMovieToDisplay'), 'objMovie');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('objMovie')->value) {
$foreach0DoElse = false;
?>
            <div class="row g-2 align-items-center py-2 border-bottom">
                <div class="col-12 col-md-2 text-center text-md-start">
                    <span class="spanMovie fw-bold">#<?php echo $_smarty_tpl->getValue('objMovie')->getId();?>
</span>
                </div>
                <div class="col-12 col-md-4 text-center text-md-start">
                    <span class="spanMovie"><?php echo $_smarty_tpl->getValue('objMovie')->getTitle();?>
</span>
                </div>
                <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end gap-3">
                    <a href="" class="btn btn-sm btn-outline-dark px-5">Modifier</a>
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

    <div id="listUser" class="d-block">
        <h2>Tous Les Utilisateurs</h2>
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
            <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="sendUser">Recherche</button>
        </form>

        <div class="allUser">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrUserToDisplay'), 'objUser');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('objUser')->value) {
$foreach1DoElse = false;
?>
            <div class="row g-2 align-items-center py-2 border-bottom">
                <div class="col-12 col-md-1 text-center text-md-start">
                    <span class="spanMovie fw-bold">#<?php echo $_smarty_tpl->getValue('objUser')->getId();?>
</span>
                </div>
                <div class="col-12 col-md-3 text-center text-md-start">
                    <span class="spanMovie"><?php echo $_smarty_tpl->getValue('objUser')->getPseudo();?>
</span>
                </div>
                <div class="col-12 col-md-4 text-center text-md-start">
                    <span class="spanMovie"><?php echo $_smarty_tpl->getValue('objUser')->getEmail();?>
</span>
                </div>
                <div class="col-12 col-md-4 d-flex justify-content-center justify-content-md-end gap-3">
                    <a href="" class="btn btn-sm btn-outline-dark px-5">Modifier</a>
                    <a href="index.php?ctrl=user&action=deleteAccount&id=<?php echo $_smarty_tpl->getValue('objUser')->getId();?>
"
                       class="btn btn-sm btn-outline-danger px-5"
                       onclick="return confirm('Vous allez Supprimer <?php echo strtr((string)$_smarty_tpl->getValue('objUser')->getPseudo(), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", 
						"\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S",
						"`" => "\\`", "\${" => "\\\$\{"));?>
 !')">
                        Supprimer
                    </a>
                </div>
            </div>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </div>
    </div>

    <div id="allPerson" class="d-none">
        <h2>Les célébrités</h2>
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
            <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="sendPerson">Recherche</button>
        </form>

        <div class="allPersonList">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrPersonToDisplay'), 'objPerson');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('objPerson')->value) {
$foreach2DoElse = false;
?>
            <div class="row g-2 align-items-center py-2 border-bottom">
                <div class="col-12 col-md-1 text-md-start text-center">
                    <span class="spanMovie fw-bold">#<?php echo $_smarty_tpl->getValue('objPerson')->getId();?>
</span>
                </div>
                <div class="col-12 col-md-5 text-center text-md-start">
                    <span class="spanMovie"><?php echo $_smarty_tpl->getValue('objPerson')->getFullName();?>
</span>
                </div>
                <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end gap-3">
                    <a href="" class="btn btn-sm btn-outline-dark px-5">Modifier</a>
                    <a href="index.php?ctrl=person&action=deletePerson&id=<?php echo $_smarty_tpl->getValue('objPerson')->getId();?>
"
                       class="btn btn-sm btn-outline-danger px-5"
                       onclick="return confirm('Vous aller supprimer <?php echo strtr((string)$_smarty_tpl->getValue('objPerson')->getFullName(), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", 
						"\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S",
						"`" => "\\`", "\${" => "\\\$\{"));?>
 !')">
                        Supprimer
                    </a>
                </div>
            </div>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </div>
    </div>

    <div id="allReport" class="d-none">
        <h2>Les Signalements</h2>
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
            <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="sendReport">Recherche</button>
        </form>

        <div class="allReportList">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrReportToDisplay'), 'objReport');
$foreach3DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('objReport')->value) {
$foreach3DoElse = false;
?>
                <div class="row border-bottom py-2">
                     <div class="col-12">Signalement #<?php echo $_smarty_tpl->getValue('objReport')->getId();?>
</div>
                </div>
            <?php
}
if ($foreach3DoElse) {
?>
                <h3 class="text-center py-4">Aucun signalement !</h3>
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
class Block_2306109016988e751d7fb36_01473619 extends \Smarty\Runtime\Block
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
