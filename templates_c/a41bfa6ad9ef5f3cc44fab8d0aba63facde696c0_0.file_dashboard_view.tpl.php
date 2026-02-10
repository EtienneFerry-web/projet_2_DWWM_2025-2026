<?php
/* Smarty version 5.7.0, created on 2026-02-09 16:33:34
  from 'file:views/dashboard_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_698a0c5e4d7ce3_22637848',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a41bfa6ad9ef5f3cc44fab8d0aba63facde696c0' => 
    array (
      0 => 'views/dashboard_view.tpl',
      1 => 1770654812,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_698a0c5e4d7ce3_22637848 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_68170110698a0c5e4c1fd7_75576410', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_993510628698a0c5e4c3f40_67151766', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2053270020698a0c5e4c4d05_01683451', "css_variation");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2115146422698a0c5e4c5a37_80939058', "content");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_123224716698a0c5e4d7276_02679232', "js");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_68170110698a0c5e4c1fd7_75576410 extends \Smarty\Runtime\Block
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
class Block_993510628698a0c5e4c3f40_67151766 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
}
}
/* {/block "description"} */
/* {block "css_variation"} */
class Block_2053270020698a0c5e4c4d05_01683451 extends \Smarty\Runtime\Block
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
class Block_2115146422698a0c5e4c5a37_80939058 extends \Smarty\Runtime\Block
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
class Block_123224716698a0c5e4d7276_02679232 extends \Smarty\Runtime\Block
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
