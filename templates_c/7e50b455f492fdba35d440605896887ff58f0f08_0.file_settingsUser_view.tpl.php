<?php
/* Smarty version 5.7.0, created on 2026-02-10 13:30:54
  from 'file:views/settingsUser_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_698b330ea4b488_60451801',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e50b455f492fdba35d440605896887ff58f0f08' => 
    array (
      0 => 'views/settingsUser_view.tpl',
      1 => 1770648473,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_698b330ea4b488_60451801 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2114587994698b330ea22d97_14227258', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1909006461698b330ea2b087_12349400', "description");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_70920135698b330ea2d7c2_11589841', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_2114587994698b330ea22d97_14227258 extends \Smarty\Runtime\Block
{
public $prepend = 'true';
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>
Ajouter un film<?php
}
}
/* {/block "title"} */
/* {block "description"} */
class Block_1909006461698b330ea2b087_12349400 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>
Ici vous pouvez ajouter un film !<?php
}
}
/* {/block "description"} */
/* {block "content"} */
class Block_70920135698b330ea2d7c2_11589841 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>

<section id="settingsUser" class="container py-5">
<h1>Gestion de compte</h1>
<div class="py-3"><a href="index.php?ctrl=user&action=user&id=<?php echo $_SESSION['user']['user_id'];?>
" class="spanMovie"><i class="bi bi-arrow-left fs-1"></i></a></div>
<!--Contenue bio pseudo Photo de profil -->
<div class="py-5">
     <h2>Profil Utilisateur</h2>
     <form method="post" enctype="multipart/form-data" class="row">
        <div class="form-group py-2">
            <label  class="form-label">Changez le prenom :</label>
            <input  type="text"
                    name="firstname"
                    class="form-control <?php if (((true && (true && null !== ($_smarty_tpl->getValue('arrError')['firstname'] ?? null))))) {?> is-invalid <?php }?>"  
                    value="<?php echo $_smarty_tpl->getValue('objUser')->getFirstname();?>
"
                    placeholder="Prenom">
        </div>
        <div class="form-group py-2">
            <label  class="form-label">Changez le nom :</label>
            <input  type="text"
                    name="name"
                    class="form-control <?php if (((true && (true && null !== ($_smarty_tpl->getValue('arrError')['name'] ?? null))))) {?> is-invalid <?php }?>"  
                    value="<?php echo $_smarty_tpl->getValue('objUser')->getName();?>
"
                    placeholder="Nom">
        </div>
          <div class="form-group py-2">
             <label for="" class="form-label">Changez de pseudo</label>
             <input type="text" 
                    name="pseudo"  
                    value="<?php echo $_smarty_tpl->getValue('objUser')->getPseudo();?>
" 
                    class="form-control <?php if (((true && (true && null !== ($_smarty_tpl->getValue('arrError')['pseudo'] ?? null))))) {?> is-invalid <?php }?>">
         </div>
          <div class="form-group py-2">
             <label for="" class="form-label">Changez de Bio</label>
             <textarea  name="bio" 
                        placeholder="Bio Utilisateur"
                        class="form-control <?php if (((true && (true && null !== ($_smarty_tpl->getValue('arrError')['bio'] ?? null))))) {?> is-invalid <?php }?>"><?php echo $_smarty_tpl->getValue('objUser')->getBio();?>
</textarea>
         </div>
         <div class="col-12 p-2">
            <label class="form-label">Photo de profil</label>
            <div class="mb-2">
                <img src="assets/img/users/<?php echo $_smarty_tpl->getValue('objUser')->getPhoto();?>
" alt="Photo de profil" style="max-width: 150px;">
            </div>
             <input     name="photo"
                        type="file" 
                        class="form-control <?php if (((true && (true && null !== ($_smarty_tpl->getValue('arrError')['photo'] ?? null))))) {?> is-invalid <?php }?>" 
                        >
         </div>


     <h2 class="py-2">Sécurité</h2>
        <div class="form-group py-2">
             <label for="" class="form-label">Adresse Email</label>
             <input name="" id="" placeholder="Email" class="form-control">
         </div>
         <div class="form-group py-2">
             <label for="" class="form-label">Mots de Passe</label>
             <input type="text" name="" value="" class="form-control">
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
