<?php
/* Smarty version 5.7.0, created on 2026-02-06 15:25:13
  from 'file:views/settingsPerson_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_698607d9c46ea9_77826961',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b07c4a03a214605d54b2db88dd7065c6b8f9a488' => 
    array (
      0 => 'views/settingsPerson_view.tpl',
      1 => 1770391511,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_698607d9c46ea9_77826961 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1589830828698607d9c31e13_25565960', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1358743208698607d9c34e88_55902249', "description");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_864453651698607d9c36a22_79457951', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_1589830828698607d9c31e13_25565960 extends \Smarty\Runtime\Block
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
class Block_1358743208698607d9c34e88_55902249 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Ici vous pouvez ajouter un film !<?php
}
}
/* {/block "description"} */
/* {block "content"} */
class Block_864453651698607d9c36a22_79457951 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

<section id="" class="container py-5 my-auto">
    <h1 class="text-center">Demande d'ajout de film</h1>
		<p class="mx-auto text-center py-2">Vous ne trouvez pas votre film préféré dans notre catalogue ? Aidez-nous à enrichir notre base de données ! Remplissez le formulaire ci-dessous avec les informations du film, et notre équipe l'ajoutera après vérification. </a></p>
		<form method="post">
		
			<div class="row">
				<div class="col-6 form-group py-2">
					<label class="form-label">Nom*</label>
					<input 	name="name" 
							type="text" 
							class="form-control" 
							id="name" 
							placeholder="Nom" 
							value="<?php echo $_smarty_tpl->getValue('objPerson')->getName();?>
"
							required>
				</div>			
				<div class="col-6 form-group py-2">
					<label class="form-label">Prénom*</label>
					<input 	name="name" 
							type="text" 
							class="form-control" 
							id="name" 
							placeholder="Nom" 
							value="<?php echo $_smarty_tpl->getValue('objPerson')->getFirstName();?>
"
							required>
				</div>
				<div class="col-6 form-group py-2">
					<label class="form-label">Date de naissance*</label>
					<input 	name="name" 
							type="date" 
							class="form-control" 
							id="name" 
							placeholder="Nom" 
							value="<?php echo $_smarty_tpl->getValue('objPerson')->getBirthdate();?>
"
							required>
				</div>	
				<div class="col-6 form-group py-2">
					<label class="form-label">Fonction*</label>
					<input 	name="name" 
							type="date" 
							class="form-control" 
							id="name" 
							placeholder="Nom" 
							value=""
							required>
				</div>	
				<div class="col-6 form-group py-2">
					<label class="form-label">Nationalité*</label>
					<input 	name="name" 
							type="date" 
							class="form-control" 
							id="name" 
							placeholder="Nom" 
							value=""
							required>
				</div>
            
									
			<div class="form-group py-2">
                <label class="form-label">Affiche du film</label>
                <input name="url" type="text" class="form-control"  placeholder="Collez le lien vers l'image de l'affiche">
            </div>
		

            <input class="w-100 btnCustom my-2" type="submit" >
        </form>
</section>
<?php
}
}
/* {/block "content"} */
}
