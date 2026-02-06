<?php
/* Smarty version 5.7.0, created on 2026-02-03 07:33:07
  from 'file:views/dashboard_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_6981a4b38e3ce6_51163377',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a41bfa6ad9ef5f3cc44fab8d0aba63facde696c0' => 
    array (
      0 => 'views/dashboard_view.tpl',
      1 => 1769785505,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6981a4b38e3ce6_51163377 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_15133153206981a4b38ae675_28267196', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_4706146416981a4b38bd326_37958139', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_18665800246981a4b38c6cd0_68942675', "css_variation");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_3075948566981a4b38d0535_30277606', "content");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_10179781396981a4b38dcf56_98757894', "js");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_15133153206981a4b38ae675_28267196 extends \Smarty\Runtime\Block
{
public $prepend = 'true';
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Ajouter un film<?php
}
}
/* {/block "title"} */
/* {block "description"} */
class Block_4706146416981a4b38bd326_37958139 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Ici vous pouvez ajouter un film !<?php
}
}
/* {/block "description"} */
/* {block "css_variation"} */
class Block_18665800246981a4b38c6cd0_68942675 extends \Smarty\Runtime\Block
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
class Block_3075948566981a4b38d0535_30277606 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

<section id="dashboard" class="container py-5">
    <h1>DashBoard</h1>
    <div class="py-2 container row col-12 col-lg-auto">
        <div id="user"  class="nav-link col-2">Utilisateur</div>
        <div id="addMovie"  class="nav-link col-2">Fiche Flim</div>
        <div id="report"  class="nav-link col-2">Utilisateur Signaler</div>
    </div>
    <a href="index.php" class="homeBtn"><i class="bi bi-house-fill fs-1"></i></a>
    <div id="ficheMovie" class="d-none">
        <h2>Fiche Film</h2>
        <form method="post">
            <div class="form-group py-2">
                <label class="form-label">Titre*</label>
                <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Titre">
            </div>

            <div class="form-group py-2">
                <label class="form-label">Titre original*</label>
                <input name="original_title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Prenom">
            </div>

            <div class="form-group py-2">
                <label class="form-label">Durée*</label>
                <input name="length" type="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
            </div>

            <div class="form-group py-2">
                <label class="form-label">Synopsis*</label>
                <input name="descritpion" type="text" class="form-control" placeholder="Synopsis">
            </div>

            <div class="form-group py-2">
                <label class="form-label">Date de sortie*</label>
                <input name="release_date" type="date" class="form-control" placeholder="">
            </div>

            <div class="form-group py-2">
                <label class="form-label">Nationalité*</label>
                <input name="country" type="text" class="form-control" placeholder="">
            </div>

            <div class="form-group py-2">
                <label class="form-label">Produteur*</label>
                <input name="productor" type="text" class="form-control" placeholder="">
            </div>

            <div class="form-group py-2">
                <label class="form-label">Réalisteur*</label>
                <input name="realisator" type="text" class="form-control" placeholder="">
            </div>

            <div class="row">
                <div class="form-group col-6 py-2">
                    <label class="form-label">Acteur principal*</label>
                    <input name="actor1" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-group col-6 py-2">
                    <label class="form-label">Rôle principal</label>
                    <input name="name1" type="text" class="form-control" placeholder="">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6 py-2">
                    <label class="form-label">Acteur secondaire</label>
                    <input name="actor2" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-group col-6 py-2">
                    <label class="form-label">Rôle secondaire</label>
                    <input name="name2" type="text" class="form-control" placeholder="">
                </div>
            </div>

            <div class="form-group py-2">
                <label class="form-label">Affiche du film</label>
                <input name="url" type="text" class="form-control" placeholder="Collez le lien vers votre image">
            </div>

            <div class="accordion my-2" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Ajout lien photo
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="form-group py-2">
                                <label class="form-label">Photo</label>
                                <input name="url" type="text" class="form-control" placeholder="Collez le lien vers votre image">
                            </div>
                            <div class="form-group py-2">
                                <label class="form-label">Photo</label>
                                <input name="url" type="text" class="form-control" placeholder="Collez le lien vers votre image">
                            </div>
                            <div class="form-group py-2">
                                <label class="form-label">Photo</label>
                                <input name="url" type="text" class="form-control" placeholder="Collez le lien vers votre image">
                            </div>
                            <div class="form-group py-2">
                                <label class="form-label">Photo</label>
                                <input name="url" type="text" class="form-control" placeholder="Collez le lien vers votre image">
                            </div>
                            <div class="form-group py-2">
                                <label class="form-label">Photo</label>
                                <input name="url" type="text" class="form-control" placeholder="Collez le lien vers votre image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input class="w-100 btnCustom" type="submit">
        </form>
    </div>
    <div id="listUser" class="d-block">
        <h2>Tous Les Utilisateur</h2>
            <form class="row g-1 align-items-center py-3 ">
                <div class="col-12 col-md-5 p-0">
                    <input class="form-control " type="search" placeholder="Rechercher..." name="search" value="">
                </div>

                <div class="col-12 col-md-5 p-0">
                    <select class="form-select">
                        <option value="">Tous Les Grade</option>
                        <option value="usa">Croissant</option>
                        <option value="france">Decroissant</option>
                    </select>
                </div>
                <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                    Recherche
                </button>
            </form>
            <div class="allUser">
                <form class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2 col-md-auto">
                        <span class="spanMovie">1</span>
                    </div>
                    <div class="col-3 col-md-1">
                        <span class="spanMovie">Pseudo</span>
                    </div>
                    <!-- Grade -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Restriction</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Restriction -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Grade</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                        Valider
                    </button>
                </form>
                <form class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2 col-md-auto">
                        <span class="spanMovie">1</span>
                    </div>
                    <div class="col-3 col-md-1">
                        <span class="spanMovie">Pseudo</span>
                    </div>
                    <!-- Grade -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Restriction</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Restriction -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Grade</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                        Valider
                    </button>
                </form>
                <form class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2 col-md-auto">
                        <span class="spanMovie">1</span>
                    </div>
                    <div class="col-3 col-md-1">
                        <span class="spanMovie">Pseudo</span>
                    </div>
                    <!-- Grade -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Restriction</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Restriction -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Grade</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                        Valider
                    </button>
                </form>
                <form class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2 col-md-auto">
                        <span class="spanMovie">1</span>
                    </div>
                    <div class="col-3 col-md-1">
                        <span class="spanMovie">Pseudo</span>
                    </div>
                    <!-- Grade -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Restriction</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Restriction -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Grade</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                        Valider
                    </button>
                </form>
                <form class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2 col-md-auto">
                        <span class="spanMovie">1</span>
                    </div>
                    <div class="col-3 col-md-1">
                        <span class="spanMovie">Pseudo</span>
                    </div>
                    <!-- Grade -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Restriction</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Restriction -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Grade</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                        Valider
                    </button>
                </form>
                <form class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2 col-md-auto">
                        <span class="spanMovie">1</span>
                    </div>
                    <div class="col-3 col-md-1">
                        <span class="spanMovie">Pseudo</span>
                    </div>
                    <!-- Grade -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Restriction</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Restriction -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Grade</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                        Valider
                    </button>
                </form>
                <form class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2 col-md-auto">
                        <span class="spanMovie">1</span>
                    </div>
                    <div class="col-3 col-md-1">
                        <span class="spanMovie">Pseudo</span>
                    </div>
                    <!-- Grade -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Restriction</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Restriction -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Grade</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                        Valider
                    </button>
                </form>
                <form class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2 col-md-auto">
                        <span class="spanMovie">1</span>
                    </div>
                    <div class="col-3 col-md-1">
                        <span class="spanMovie">Pseudo</span>
                    </div>
                    <!-- Grade -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Restriction</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Restriction -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Grade</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                        Valider
                    </button>
                </form>
                <form class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2 col-md-auto">
                        <span class="spanMovie">1</span>
                    </div>
                    <div class="col-3 col-md-1">
                        <span class="spanMovie">Pseudo</span>
                    </div>
                    <!-- Grade -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Restriction</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Restriction -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Grade</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                        Valider
                    </button>
                </form>
                <form class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2 col-md-auto">
                        <span class="spanMovie">1</span>
                    </div>
                    <div class="col-3 col-md-1">
                        <span class="spanMovie">Pseudo</span>
                    </div>
                    <!-- Grade -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Restriction</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Restriction -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Grade</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                        Valider
                    </button>
                </form>
                <form class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2 col-md-auto">
                        <span class="spanMovie">1</span>
                    </div>
                    <div class="col-3 col-md-1">
                        <span class="spanMovie">Pseudo</span>
                    </div>
                    <!-- Grade -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Restriction</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Restriction -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Grade</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                        Valider
                    </button>
                </form>
            </div>
        <div>
    </div>
    </div>
    <div id="allReport" class="d-none">
        <h2>Les Signalement</h2>

    </div>
</section>
<?php
}
}
/* {/block "content"} */
/* {block "js"} */
class Block_10179781396981a4b38dcf56_98757894 extends \Smarty\Runtime\Block
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
