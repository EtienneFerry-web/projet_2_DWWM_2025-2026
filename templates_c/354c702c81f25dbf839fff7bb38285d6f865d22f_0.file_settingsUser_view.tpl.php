<?php
/* Smarty version 5.7.0, created on 2026-02-04 15:20:39
  from 'file:views/settingsUser_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_698363c7ed1697_03214696',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '354c702c81f25dbf839fff7bb38285d6f865d22f' => 
    array (
      0 => 'views/settingsUser_view.tpl',
      1 => 1770216590,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_698363c7ed1697_03214696 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_649127639698363c7ecb815_05476899', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_133009921698363c7ece439_86672220', "description");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1362929474698363c7ecfe42_60970324', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_649127639698363c7ecb815_05476899 extends \Smarty\Runtime\Block
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
class Block_133009921698363c7ece439_86672220 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Ici vous pouvez ajouter un film !<?php
}
}
/* {/block "description"} */
/* {block "content"} */
class Block_1362929474698363c7ecfe42_60970324 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

<section id="settingsUser" class="container py-5">
<h1>Gestion de compte</h1>
<div class="py-3"><a href="index.php?ctrl=user&action=user&id=<?php echo $_smarty_tpl->getValue('pseudo');?>
" class="spanMovie">Votre Profil</a></div>
<!--Contenue bio pseudo Photo de profil -->
<div class="py-5">
     <h2>Profil Utilisateur</h2>
     <form method="post" class="row">
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
         <button type="submit" class="btnCustom py-3">Enregistrer</button>
     </form>
</div>
<!--Contenue mail mots de passe -->
<div class="py-5">
     <h2>Sécurité</h2>
     <form method="post" class="row">
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
             <a href="index.php?ctrl=user&action=delete" class="nav-link">
                 Supprimer votre compte
             </a>
         </div>
     </div>
</div>

</section>
<?php
}
}
/* {/block "content"} */
}
