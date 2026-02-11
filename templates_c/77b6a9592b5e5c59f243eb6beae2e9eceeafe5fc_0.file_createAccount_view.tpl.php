<?php
/* Smarty version 5.7.0, created on 2026-02-11 14:40:31
  from 'file:views/createAccount_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_698c94df572367_22812711',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '77b6a9592b5e5c59f243eb6beae2e9eceeafe5fc' => 
    array (
      0 => 'views/createAccount_view.tpl',
      1 => 1770372450,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_698c94df572367_22812711 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1566150406698c94df4d47e1_72609490', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1571330807698c94df4e4991_63263279', "description");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_18178643698c94df4edd86_05276320', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_1566150406698c94df4d47e1_72609490 extends \Smarty\Runtime\Block
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
class Block_1571330807698c94df4e4991_63263279 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Ici vous pouvez ajouter un film !<?php
}
}
/* {/block "description"} */
/* {block "content"} */
class Block_18178643698c94df4edd86_05276320 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
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
