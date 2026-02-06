<?php
/* Smarty version 5.7.0, created on 2026-02-06 06:13:01
  from 'file:views/createAccount_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_6985866d0f59e6_17639404',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1560f0cd6de8f8c2ec519308a6ca12f7225cecad' => 
    array (
      0 => 'views/createAccount_view.tpl',
      1 => 1769785504,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6985866d0f59e6_17639404 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2856991356985866d0bc7f6_23818702', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_18386373776985866d0c2d29_06391144', "description");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_12649076506985866d0c5330_37814908', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_2856991356985866d0bc7f6_23818702 extends \Smarty\Runtime\Block
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
class Block_18386373776985866d0c2d29_06391144 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>
Ici vous pouvez ajouter un film !<?php
}
}
/* {/block "description"} */
/* {block "content"} */
class Block_12649076506985866d0c5330_37814908 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>

    <section class="container py-5 my-auto">
        <?php if (((true && ($_smarty_tpl->hasVariable('arrError') && null !== ($_smarty_tpl->getValue('arrError') ?? null))) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('arrError')) > 0)) {?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h5 class="alert-heading"><i class="bi bi-exclamation-triangle-fill me-2"></i>Oups !</h5>
                <ul class="mb-0">
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrError'), 'errorMsg');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('errorMsg')->value) {
$foreach0DoElse = false;
?>
                        <li><?php echo $_smarty_tpl->getValue('errorMsg');?>
</li>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php }?>
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
