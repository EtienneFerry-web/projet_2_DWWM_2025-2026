<?php
/* Smarty version 5.7.0, created on 2026-02-10 07:08:30
  from 'file:views/editMovie_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_698ad96e4969f5_73306073',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '761aacb6d2511ddf6d18d4225d489d6565774022' => 
    array (
      0 => 'views/editMovie_view.tpl',
      1 => 1770707308,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_698ad96e4969f5_73306073 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2087988185698ad96e493d13_09892740', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_42267462698ad96e495c11_53692655', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_2087988185698ad96e493d13_09892740 extends \Smarty\Runtime\Block
{
public $prepend = 'true';
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Modifier un film<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_42267462698ad96e495c11_53692655 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

<section id="" class="container py-5 my-auto">
    <h1 class="text-center">Modifier une célébrité</h1>
    <p class="mx-auto text-center py-2"></p>
    <form method="post">

        <div class="row">
            <div class="col-12 form-group py-2">
                <label class="form-label">Titre du film*</label>
                <input name="title" type="text" class="form-control" id="title" placeholder="Titre" value="" required>
            </div>
            <div class="col-md-12">
                <label for="categorie" class="form-label">Genre</label>
                <select class="form-control" id="categorie" name="categorie">
                    //boucle pour ttes les catégories
                    <option class="form-control" value="">

                    </option>
                </select>
            </div>

            <div class="form-group py-2">
                <label class="form-label">Date de sortie*</label>
                <input name="release_date" type="date" class="form-control" id="release_date" value=""
                    placeholder="Quelle est la date de sortie du film?">
            </div>

            <div class="form-group py-2">
                <label class="form-label">Titre original</label>
                <input name="original_title" type="text" class="form-control" id="original_title" value=""
                    placeholder="">
            </div>
            <div class="form-group py-2">
                <label class="form-label">Durée*</label>
                <input name="length" type="time" class="form-control" id="length" value="" placeholder="Email">
            </div>
            <div class="form-group py-2">
                <label class="form-label">Synopsis*</label>
                <textarea name="description" class="form-control textarea" id="description"
                    placeholder="Synopsis"></textarea>
            </div>

            <hr>

        </div>
        <label class="form-label">Acteur principal*</label>
        <div class="row">
            <div class="form-group col-4 py-2">
                <label class="form-label">Nom</label>
                <input name="actorName" type="text" class="form-control" id="actorName" value=""
                    placeholder="Nom de l'acteur principal" required>
            </div>
            <div class="form-group col-4 py-2">
                <label for="actorFirstname" class="form-label">Prénom</label>
                <input name="actorFirstname" type="text" class="form-control" id="actorFirstname" value=""
                    placeholder="Nom de l'acteur principal" required>
            </div>
            <div class="form-group col-4 py-2">
                <label class="form-label">Rôle principal</label>
                <input name="characterName" type="text" class="form-control" id="characterName" value=""
                    placeholder="nom du personnage de l'acteur principal">
            </div>
        </div>

        <hr>

        <div class="col-12 form-group py-2">
            <label for="url" class="form-label">Affiche du film*</label>
            </label>
            <div>
                <img src="" alt="Photo de ">
            </div>
            <input name="url" type="file" class="form-control ">
        </div>

        <div>
            <small>* champs obligatoires</small>
        </div>

        <div class="col-12 form-group py-2">
            <input class="w-100 btnCustom my-2" type="submit">
        </div>
    </form>
</section>

<?php
}
}
/* {/block "content"} */
}
