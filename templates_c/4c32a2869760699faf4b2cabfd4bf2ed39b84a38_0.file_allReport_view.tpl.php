<?php
/* Smarty version 5.7.0, created on 2026-02-10 14:11:39
  from 'file:views/allReport_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_698b3c9bbe81d1_44665917',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c32a2869760699faf4b2cabfd4bf2ed39b84a38' => 
    array (
      0 => 'views/allReport_view.tpl',
      1 => 1770732698,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_698b3c9bbe81d1_44665917 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1979045052698b3c9bbe2f36_88175568', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1055410588698b3c9bbe4eb6_55361535', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2113214187698b3c9bbe5c97_16489698', "css_variation");
?>



<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1395930149698b3c9bbe69f2_56135527', "content");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_280224209698b3c9bbe7774_10685660', "js");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_1979045052698b3c9bbe2f36_88175568 extends \Smarty\Runtime\Block
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
class Block_1055410588698b3c9bbe4eb6_55361535 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
}
}
/* {/block "description"} */
/* {block "css_variation"} */
class Block_2113214187698b3c9bbe5c97_16489698 extends \Smarty\Runtime\Block
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
class Block_1395930149698b3c9bbe69f2_56135527 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

<section id="dashboard" class="container py-5">
    <h1>DashBoard</h1>
    
    <div class="py-2 row g-2">
        <a id="user" href="index.php?ctrl=admin&action=allUser" class="nav-link col-2">Utilisateurs</a>
        <a id="addMovie" href="index.php?ctrl=admin&action=allMovie" class="nav-link col-2">Films</a>
        <a id="person" href="index.php?ctrl=admin&action=allPerson" class="nav-link col-2">Célébrités</a>
        <a id="report" href="index.php?ctrl=admin&action=allReport" class="nav-link col-2">Signalement</a>
    </div>

    
        <h2>Les signalement</h2>
        <div id="ficheMovie" class="d-flex flex-column py-3"></div>
        <h3>Les commentaire</h3>
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
    </div>
    <div id="ficheMovie" class="d-flex flex-column py-3"></div>
        <h3>Les Profils</h3>
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
    
</section>
<?php
}
}
/* {/block "content"} */
/* {block "js"} */
class Block_280224209698b3c9bbe7774_10685660 extends \Smarty\Runtime\Block
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
