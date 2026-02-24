<?php
/* Smarty version 5.7.0, created on 2026-02-19 16:19:16
  from 'file:views/settingsAllUser_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_6997380454d8b7_89771503',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8e1e2d3464e657617fb5c857e02a58fa3c776a55' => 
    array (
      0 => 'views/settingsAllUser_view.tpl',
      1 => 1771517953,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6997380454d8b7_89771503 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_202423820699738044f3c74_59103676', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1306813060699738044fe2d9_10638076', "description");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_72290518469973804504591_36274680', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_202423820699738044f3c74_59103676 extends \Smarty\Runtime\Block
{
public $prepend = 'true';
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>
Modifier un utilisateur<?php
}
}
/* {/block "title"} */
/* {block "description"} */
class Block_1306813060699738044fe2d9_10638076 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>
Ici vous pouvez ajouter un film !<?php
}
}
/* {/block "description"} */
/* {block "content"} */
class Block_72290518469973804504591_36274680 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>

<section id="settingsUser" class="container py-5">
<h1>Gestion de l'utilisateur</h1>
<div class="py-3"><a href="index.php?ctrl=user&action=settingsAllUser&id=<?php echo $_smarty_tpl->getValue('objUser')->getId();?>
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
             <label for="" class="form-label">Changez le pseudo</label>
             <input type="text" 
                    name="pseudo"  
                    value="<?php echo $_smarty_tpl->getValue('objUser')->getPseudo();?>
" 
                    class="form-control <?php if (((true && (true && null !== ($_smarty_tpl->getValue('arrError')['pseudo'] ?? null))))) {?> is-invalid <?php }?>">
         </div>
          <div class="form-group py-2">
             <label for="" class="form-label">Changer la Bio</label>
             <textarea  name="bio" 
                        placeholder="Bio Utilisateur"
                        class="form-control <?php if (((true && (true && null !== ($_smarty_tpl->getValue('arrError')['bio'] ?? null))))) {?> is-invalid <?php }?>"><?php echo $_smarty_tpl->getValue('objUser')->getBio();?>
</textarea>
         </div>
         <div class="col-12 p-2">
            <label class="form-label">Modifier la photo de profil</label>
            <div class="mb-2">
                <img src="assets/img/users/<?php echo $_smarty_tpl->getValue('objUser')->getPhoto();?>
" alt="Photo de profil" style="max-width: 150px;">
            </div>
             <input     name="photo"
                        type="file" 
                        class="form-control <?php if (((true && (true && null !== ($_smarty_tpl->getValue('arrError')['photo'] ?? null))))) {?> is-invalid <?php }?>" 
                        >
         </div>
            <button type="submit" class="btnCustom py-3">Enregistrer</button>
    </form>
        
     </div>
</div>

</section>
<?php
}
}
/* {/block "content"} */
}
