<?php
/* Smarty version 5.7.0, created on 2026-02-15 19:15:27
  from 'file:views/settingsPerson_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_69921b4f1280c4_08259791',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b07c4a03a214605d54b2db88dd7065c6b8f9a488' => 
    array (
      0 => 'views/settingsPerson_view.tpl',
      1 => 1770990163,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69921b4f1280c4_08259791 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_135493242469921b4f107f25_29660100', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_88702754369921b4f1096f3_87915355', "description");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_26615037869921b4f10a5a4_92994400', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_135493242469921b4f107f25_29660100 extends \Smarty\Runtime\Block
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
class Block_88702754369921b4f1096f3_87915355 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Ici vous pouvez ajouter un film !<?php
}
}
/* {/block "description"} */
/* {block "content"} */
class Block_26615037869921b4f10a5a4_92994400 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

<section id="" class="container py-5 my-auto">
	<h1 class="text-center">Modifier une célébrité</h1>
	<p class="mx-auto text-center py-2"></p>
	<form method="post" enctype="multipart/form-data">

		<div class="row">
			<div class="col-12 form-group py-2">
				<label class="form-label">Nom*</label>
				<input name="name" type="text" class="form-control" id="name" placeholder="Nom"
					value="<?php echo $_smarty_tpl->getValue('objPerson')->getName();?>
">
			</div>
			<div class="col-12 form-group py-2">
				<label class="form-label">Prénom*</label>
				<input name="firstname" type="text" class="form-control" id="firstname" placeholder="Nom"
					value="<?php echo $_smarty_tpl->getValue('objPerson')->getFirstName();?>
">
			</div>
			<div class="col-6 form-group py-2">
				<label class="form-label">Date de naissance*</label>
				<input name="birthdate" type="date" class="form-control" id="birthdate" placeholder="Date de naissance"
					value="<?php echo $_smarty_tpl->getValue('objPerson')->getBirthdate();?>
">
			</div>
			<div class="col-6 form-group py-2">
				<label class="form-label">Date de décès</label>
				<input name="deathdate" type="date" class="form-control" id="deathdate" placeholder="Date de décès"
					value="<?php echo $_smarty_tpl->getValue('objPerson')->getDeathdate();?>
">
			</div>
			<div class="col-12 form-group py-2">
				<label for="bio" class="form-label">Biographie*</label>
				<textarea name="bio" id="bio" class="form-control"><?php echo $_smarty_tpl->getValue('objPerson')->getBio();?>
</textarea>
			</div>

			<div class="col-12 form-group py-2">
				<label for="country" class="form-label">Pays d'origine*</label>
				</label>

				<select class="form-control" name="country" id="country" value="<?php echo $_smarty_tpl->getValue('country')->getId;?>
">
					<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrCountryToDisplay'), 'country');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('country')->value) {
$foreach0DoElse = false;
?>
					<option value="<?php echo $_smarty_tpl->getValue('country')->getId();?>
" <?php if ($_smarty_tpl->getValue('country')->getCountry() == $_smarty_tpl->getValue('objPerson')->getCountry()) {?>selected<?php }?>>
						<?php echo $_smarty_tpl->getValue('country')->getCountry();?>

					</option>

					<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
				</select>
			</div>
			<div class="col-12 form-group py-2">
				<label for="country" class="form-label">Photo*</label>
				</label>
				<div>
					<img src="assets/img/person/<?php echo $_smarty_tpl->getValue('objPerson')->getPhoto();?>
" alt="Photo de <?php echo $_smarty_tpl->getValue('objPerson')->getName();?>
">
				</div>
				<input name="photo" type="file" class="form-control ">
			</div>

			<div>
				<small>* champs obligatoires</small>
			</div>
			<div class="col-12 form-group py-2">
				<input class="w-100 btnCustom my-2" type="submit">
			</div>
		</div>
	</form>
</section>
<?php
}
}
/* {/block "content"} */
}
