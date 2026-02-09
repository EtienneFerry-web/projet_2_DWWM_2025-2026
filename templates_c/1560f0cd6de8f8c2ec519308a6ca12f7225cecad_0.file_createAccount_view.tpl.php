<?php
/* Smarty version 5.7.0, created on 2026-02-09 12:03:56
  from 'file:views/createAccount_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_6989cd2c7c2c33_61310813',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1560f0cd6de8f8c2ec519308a6ca12f7225cecad' => 
    array (
      0 => 'views/createAccount_view.tpl',
      1 => 1770417758,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6989cd2c7c2c33_61310813 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_13189001806989cd2c79a2d0_48471982', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1798697736989cd2c7a14a4_38395163', "description");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_11973753156989cd2c7a3bb5_66704345', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_13189001806989cd2c79a2d0_48471982 extends \Smarty\Runtime\Block
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
class Block_1798697736989cd2c7a14a4_38395163 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>
Ici vous pouvez ajouter un film !<?php
}
}
/* {/block "description"} */
/* {block "content"} */
class Block_11973753156989cd2c7a3bb5_66704345 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>

    <section class="container py-5 my-auto">
	    <h1 class="text-center">Inscription</h1>
		<p class="mx-auto text-center py-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam quae pariatur sint, atque sed soluta numquam! Doloremque voluptatem odit temporibus.</p>
		<form method="post">
            <div class="form-group py-2">
                <label  class="form-label">Nom :</label>
                <input  type="text" 
                        name="name"
                        class="form-control <?php if (((true && (true && null !== ($_smarty_tpl->getValue('arrError')['name'] ?? null))))) {?> is-invalid <?php }?> "  
                        value="<?php echo $_smarty_tpl->getValue('objUser')->getName();?>
"
                        placeholder="Nom">
            </div>
            <div class="form-group py-2">
                <label  class="form-label">Prenom :</label>
                <input  type="text"
                        name="firstname"
                        class="form-control <?php if (((true && (true && null !== ($_smarty_tpl->getValue('arrError')['firstname'] ?? null))))) {?> is-invalid <?php }?>"  
                        value="<?php echo $_smarty_tpl->getValue('objUser')->getFirstname();?>
"
                        placeholder="Prenom">
            </div>
            <div class="form-group py-2">
                <label  class="form-label">Pseudo :</label>
                <input  type="text"
                        name="pseudo"
                        class="form-control <?php if (((true && (true && null !== ($_smarty_tpl->getValue('arrError')['pseudo'] ?? null))))) {?> is-invalid <?php }?>"  
                        value="<?php echo $_smarty_tpl->getValue('objUser')->getPseudo();?>
"
                        placeholder="Pseudo">
            </div>
            <div class="form-group py-2">
                <label for="date" class="form-label">Date de naissance :</label>
     			<input
    				type="date"
    				class="form-control"
    				id="birthdate"
    				name="birthdate"
    				aria-describedby="date-help"
    				value="<?php echo $_smarty_tpl->getValue('objUser')->getBirthdate();?>
" >
     			<small id="date-help" class="form-text text-muted">
        				Format: JJ/MM/AAAA
                </small>
            </div>
            <div class="form-group py-2">
                <label class="form-label">Adresse Mail :</label>
                <input  type="email" 
                        name="email"
                        class="form-control <?php if (((true && (true && null !== ($_smarty_tpl->getValue('arrError')['email'] ?? null))))) {?> is-invalid<?php }?>" 
                        value="<?php echo $_smarty_tpl->getValue('objUser')->getEmail();?>
"
                        placeholder="Email">
            </div>
            <div class="form-group py-2">
                <label class="form-label" >Mots de passe :</label>
                <input  type="password" 
                        name="pwd"
                        class="form-control <?php if (((true && (true && null !== ($_smarty_tpl->getValue('arrError')['pwd'] ?? null))))) {?> is-invalid <?php }?>"  
                        placeholder="Mots de Passe">
            </div>
            <div class="form-group py-2">
                <label class="form-label">Confirmation du mot de passe :</label>
                <input  type="password" 
                        name="pwd_confirm"
                        class="form-control <?php if (((true && (true && null !== ($_smarty_tpl->getValue('arrError')['pwd_confirm'] ?? null))))) {?> is-invalid <?php }?>"  
                        placeholder="Mots de passe de comfirmation">
            </div>

            <input class="w-100 btnCustom" type="submit" >
        </form>
    </section>
<?php
}
}
/* {/block "content"} */
}
