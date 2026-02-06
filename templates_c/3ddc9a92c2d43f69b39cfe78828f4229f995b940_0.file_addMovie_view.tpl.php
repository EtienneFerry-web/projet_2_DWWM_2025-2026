<?php
/* Smarty version 5.7.0, created on 2026-01-31 13:53:59
  from 'file:views/addMovie_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_697e09779c81f4_44493070',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3ddc9a92c2d43f69b39cfe78828f4229f995b940' => 
    array (
      0 => 'views/addMovie_view.tpl',
      1 => 1769797403,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697e09779c81f4_44493070 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1877018934697e09779c4b52_75775026', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_668689088697e09779c6924_32084193', "description");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_715994145697e09779c7782_63996012', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_1877018934697e09779c4b52_75775026 extends \Smarty\Runtime\Block
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
class Block_668689088697e09779c6924_32084193 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Ici vous pouvez ajouter un film !<?php
}
}
/* {/block "description"} */
/* {block "content"} */
class Block_715994145697e09779c7782_63996012 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

<section id="addMovie" class="container py-5 my-auto">
    <h1 class="text-center">Demande d'ajout de film</h1>
    <p class="mx-auto text-center py-2">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam quae pariatur sint, atque sed soluta numquam! Doloremque voluptatem odit temporibus.
    </p>

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
</section>
<?php
}
}
/* {/block "content"} */
}
