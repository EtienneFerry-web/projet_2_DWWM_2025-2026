<?php
/* Smarty version 5.7.0, created on 2026-02-07 16:06:05
  from 'file:views/settingsUser_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_698762ed13e1a7_47533924',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '354c702c81f25dbf839fff7bb38285d6f865d22f' => 
    array (
      0 => 'views/settingsUser_view.tpl',
      1 => 1770480363,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_698762ed13e1a7_47533924 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_354817702698762ed138c87_82072182', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_105485432698762ed13b021_62240698', "description");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1896877207698762ed13bfc8_40989402', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_354817702698762ed138c87_82072182 extends \Smarty\Runtime\Block
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
class Block_105485432698762ed13b021_62240698 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Ici vous pouvez ajouter un film !<?php
}
}
/* {/block "description"} */
/* {block "content"} */
class Block_1896877207698762ed13bfc8_40989402 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

<section id="settingsUser" class="container py-5">
<h1>Gestion de compte</h1>
<div class="py-3"><a href="index.php?ctrl=user&action=user&id=<?php echo $_SESSION['user']['user_id'];?>
" class="spanMovie"><i class="bi bi-arrow-left fs-1"></i></a></div>
<!--Contenue bio pseudo Photo de profil -->
<div class="py-5">
     <h2>Profil Utilisateur</h2>
     <form method="post" class="row">
        <div class="col-12 col-sm-6 p-2">
             <label for="" class="form-label">Prenom</label>
             <input type="text" name="" value="" class="form-control">
         </div>
        <div class="col-12 col-sm-6 p-2">
             <label for="" class="form-label">Nom</label>
             <input type="text" name="" value="" class="form-control">
         </div>
         <div class="col-12 col-sm-6 p-2">
             <label for="" class="form-label">Changez de pseudo</label>
             <input type="text" name="" value="" class="form-control">
         </div>
         <div class="col-12 col-sm-6 p-2">
             <label for="" class="form-label">Changez de Bio</label>
             <textarea name="" id="" placeholder="Bio Utilisateur" class="form-control"></textarea>
         </div>
         <div class="col-12 p-2">
             <label class="form-label">Photo de profil</label>

             <input type="file" class="form-control" accept="image/*">
         </div>


     <h2 class="py-2">Sécurité</h2>

         <div class="col-12 col-sm-6 p-2">
             <label for="" class="form-label">Mots de Passe</label>
             <input type="text" name="" value="" class="form-control">
         </div>
         <div class="col-12 col-sm-6 p-2">
             <label for="" class="form-label">Adresse Email</label>
             <input name="" id="" placeholder="Email" class="form-control">
         </div>
         <button type="submit" class="btnCustom py-3">Enregistrer</button>
     </form>
     <div class="row justify-content-center mt-3">
         <div class="col-auto">
             <a href="index.php?ctrl=user&action=logout" class="nav-link">
                 Se déconnecter
             </a>
         </div>

    <div class="col-auto">
    <form action="index.php?ctrl=user&action=deleteAccount" method="POST" class="nav-link col-auto"
        onsubmit="return confirm('Êtes-vous sûr ? C’est irréversible !');">
        <button type="submit" class="border-0 bg-transparent">
            Supprimer mon compte
        </button>
    </form>
         </div>
     </div>
</div>

</section>
<?php
}
}
/* {/block "content"} */
}
