<?php
/* Smarty version 5.7.0, created on 2026-02-09 12:14:05
  from 'file:views/settingsPerson_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_6989cf8d13d252_88539952',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b07c4a03a214605d54b2db88dd7065c6b8f9a488' => 
    array (
      0 => 'views/settingsPerson_view.tpl',
      1 => 1770639239,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6989cf8d13d252_88539952 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_4460750066989cf8d12b741_51120533', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_5348822766989cf8d12daf4_41952391', "description");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_17635260366989cf8d12eb89_99427054', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_4460750066989cf8d12b741_51120533 extends \Smarty\Runtime\Block
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
class Block_5348822766989cf8d12daf4_41952391 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Ici vous pouvez ajouter un film !<?php
}
}
/* {/block "description"} */
/* {block "content"} */
class Block_17635260366989cf8d12eb89_99427054 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

<section id="" class="container py-5 my-auto">
	<h1 class="text-center">Modifier une célébrité</h1>
	<p class="mx-auto text-center py-2"></p>
	<form method="post">

		<div class="row">
			<div class="col-12 form-group py-2">
				<label class="form-label">Nom*</label>
				<input name="name" type="text" class="form-control" id="name" placeholder="Nom"
					value="<?php echo $_smarty_tpl->getValue('objPerson')->getName();?>
" required>
			</div>
			<div class="col-12 form-group py-2">
				<label class="form-label">Prénom*</label>
				<input name="name" type="text" class="form-control" id="name" placeholder="Nom"
					value="<?php echo $_smarty_tpl->getValue('objPerson')->getFirstName();?>
" required>
			</div>
			<div class="col-6 form-group py-2">
				<label class="form-label">Date de naissance*</label>
				<input name="name" type="date" class="form-control" id="name" placeholder="Nom"
					value="<?php echo $_smarty_tpl->getValue('objPerson')->getBirthdate();?>
" required>
			</div>
			<div class="col-6 form-group py-2">
				<label class="form-label">Date de décès</label>
				<input name="name" type="date" class="form-control" id="name" placeholder="Nom"
					value="<?php echo $_smarty_tpl->getValue('objPerson')->getDeathdate();?>
" required>
			</div>
			<div class="col-6 form-group py-2">
				<label class="form-label">Pays d'origine*</label>
				</label>
				<input name="country" type="text" class="form-control" id="country" placeholder="Pays d'origine"
					value="<?php echo $_smarty_tpl->getValue('objPerson')->getCountry();?>
" required>
			</div>
			<div class="col-12 form-group py-2">
				<label class="form-label">Métier*</label>
				<select class="form-control" id="fonction" name="fonction">
					<option value="0" selected>Tous les métiers</option>
					<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrJobToDisplay'), 'arrDetJob');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('arrDetJob')->value) {
$foreach0DoElse = false;
?>
					<option value="<?php echo $_smarty_tpl->getValue('arrDetJob')->getId();?>
" <?php if (($_smarty_tpl->getValue('arrDetJob')->getId() == $_smarty_tpl->getValue('_GET')['id'])) {?>selected<?php }?>>
						<?php echo $_smarty_tpl->getValue('arrDetJob')->getNameJob();?>

					</option>
					<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
				</select>
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
