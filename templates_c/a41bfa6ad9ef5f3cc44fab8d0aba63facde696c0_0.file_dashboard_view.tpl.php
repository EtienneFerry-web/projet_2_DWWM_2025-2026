<?php
/* Smarty version 5.7.0, created on 2026-02-10 13:21:16
  from 'file:views/dashboard_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_698b30cc71e1c2_64947256',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a41bfa6ad9ef5f3cc44fab8d0aba63facde696c0' => 
    array (
      0 => 'views/dashboard_view.tpl',
      1 => 1770729182,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_698b30cc71e1c2_64947256 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1903038315698b30cc707531_92761378', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1314413083698b30cc709531_51082216', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1252303410698b30cc70a343_18707933', "css_variation");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1747842551698b30cc70b0f5_90189716', "content");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_489147955698b30cc71d694_07120568', "js");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_1903038315698b30cc707531_92761378 extends \Smarty\Runtime\Block
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
class Block_1314413083698b30cc709531_51082216 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
}
}
/* {/block "description"} */
/* {block "css_variation"} */
class Block_1252303410698b30cc70a343_18707933 extends \Smarty\Runtime\Block
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
class Block_1747842551698b30cc70b0f5_90189716 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

<section id="dashboard" class="container py-5">
    <h1>DashBoard</h1>
    
    <div class="py-2 container row col-12 col-lg-auto">
        <a id="user" href="index.php?ctrl=admin&action=allUser" class="nav-link col-2">Utilisateurs</a>
        <a id="addMovie" href="index.php?ctrl=admin&action=allMovie" class="nav-link col-2">Films</a>
        <a id="person" href="index.php?ctrl=admin&action=allPerson" class="nav-link col-2">Célébrités</a>
        <a id="report" href="index.php?ctrl=admin&action=allReport" class="nav-link col-2">Signalement</a>
    </div>

    <div id="ficheMovie" class="d-flex">
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
            
                <div class="container-fluid mt-4">
                    <form method="post" class="row border-bottom py-3 align-items-center">
                        <div class="col-md-1 fw-bold">#42</div>
                            
                            <div class="col-md-3 d-flex align-items-center">
                                <div class="rounded-circle bg-secondary me-2"> 
                                    <img src="assets/img/mouse.png" 
                                        class="rounded-circle border" 
                                        style="width: 40px; height: 40px; object-fit: cover;" 
                                        alt="Avatar">
                                </div>
                                <div>
                                    <div class="fw-bold text-dark">bad_user_99</div>
                                    <div class="small text-muted">Inscrit le 12/01/24</div>
                                </div>
                            </div>
                            <div class="col-md-4">"Spam répétitif dans les commentaires aaaaaaaaaaaaaaaaaaa"</div>
                            <div class="col-md-4 d-flex justify-content-end align-items-center gap-2">
                                <div class="btn-group ms-auto">
                                    <button type="button" class="btn btn-outline-warning btn-sm px-4 text-nowrap">15 Jours</button>
                                    <button type="button" class="btn btn-outline-warning btn-sm px-4 text-nowrap">30 Jours</button>
                                </div>
                                <button type="button" class="btn btn-outline-danger btn-sm px-4 py-1">Bannir</button>
                                <button type="button" class="btn btn-outline-success btn-sm px-4 py-1">Ignorer</button>
                            </div>
                    </form>
                </div>
           
        <div class="container-fluid mt-4">
            <form method="post" class="row border-bottom py-3 align-items-center bg-light-hover">
                <div class="col-md-1 fw-bold">#42</div>
                
                <div class="col-md-3 d-flex align-items-center">
                    <div class="rounded-circle bg-secondary me-2"> 
                        <img src="assets/img/mouse.png" 
                            class="rounded-circle border" 
                            style="width: 40px; height: 40px; object-fit: cover;" 
                            alt="Avatar">
                    </div>
                    <div>
                        <div class="fw-bold text-dark">bad_user_99</div>
                        <div class="small text-muted">Inscrit le 12/01/24</div>
                    </div>
                </div>

                <div class="col-md-4">
                    
                    <div class="small text-muted fst-italic">"Photo de profil inappropriée et bio publicitaire."</div>
                </div>

                <div class="col-md-4 d-flex justify-content-end gap-2">
                    <div class="col-md-4 d-flex justify-content-end align-items-center gap-2">
                        <div class="btn-group ms-auto">
                            <button type="button" class="btn btn-outline-warning btn-sm px-4 text-nowrap">15 Jours</button>
                            <button type="button" class="btn btn-outline-warning btn-sm px-4 text-nowrap">30 Jours</button>
                        </div>
                        <button type="button" class="btn btn-outline-danger btn-sm px-4 py-1">Bannir</button>
                        <button type="button" class="btn btn-outline-success btn-sm px-4 py-1">Ignorer</button>
                    </div>
                </form>
            </div>
        </div>
</section>
<?php
}
}
/* {/block "content"} */
/* {block "js"} */
class Block_489147955698b30cc71d694_07120568 extends \Smarty\Runtime\Block
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
