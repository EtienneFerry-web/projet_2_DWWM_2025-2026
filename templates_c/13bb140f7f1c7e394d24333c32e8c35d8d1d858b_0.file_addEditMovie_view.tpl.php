<?php
/* Smarty version 5.8.0, created on 2026-02-26 15:16:13
  from 'file:views/addEditMovie_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_69a063bda80f02_84294091',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '13bb140f7f1c7e394d24333c32e8c35d8d1d858b' => 
    array (
      0 => 'views/addEditMovie_view.tpl',
      1 => 1772118883,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69a063bda80f02_84294091 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php if (($_smarty_tpl->getSmarty()->getModifierCallback('is_null')($_smarty_tpl->getValue('objMovie')->getId()))) {
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_15766932469a063bd97c056_32052398', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_86429231169a063bd986c34_37864089', "description");
?>

<?php } else {
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_19666836469a063bd993694_41670378', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_177098452369a063bd99d2b7_06824281', "description");
?>

<?php }
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_97533288469a063bd9a97b4_19970251', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_15766932469a063bd97c056_32052398 extends \Smarty\Runtime\Block
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
class Block_86429231169a063bd986c34_37864089 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Ici vous pouvez ajouter un film !<?php
}
}
/* {/block "description"} */
/* {block "title"} */
class Block_19666836469a063bd993694_41670378 extends \Smarty\Runtime\Block
{
public $prepend = 'true';
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Modifier un film<?php
}
}
/* {/block "title"} */
/* {block "description"} */
class Block_177098452369a063bd99d2b7_06824281 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Ici vous pouvez modifier un film !<?php
}
}
/* {/block "description"} */
/* {block "content"} */
class Block_97533288469a063bd9a97b4_19970251 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

<section id="addMovie" class="container py-5 my-auto">
	<?php if (($_smarty_tpl->getSmarty()->getModifierCallback('is_null')($_smarty_tpl->getValue('objMovie')->getId()))) {?>
	<h1 class="text-center">Demande d'ajout de film</h1>
	<p class="mx-auto text-center py-2">Vous ne trouvez pas votre film préféré dans notre catalogue ? Aidez-nous à
		enrichir notre base de données ! Remplissez le formulaire ci-dessous avec les informations du film, et notre
		équipe l'ajoutera après vérification. </a></p>
	<?php } else { ?>
	<h1 class="text-center">Modifier un film</h1>
	<?php }?>
	<form method="post" enctype="multipart/form-data">

		<div class="row">
			<div class="col-12 form-group py-2">
				<label class="form-label">Titre du film*</label>
				<input name="title" type="text" class="form-control" id="title" placeholder="Titre"
					value="<?php echo $_smarty_tpl->getValue('objMovie')->getTitle();?>
">
			</div>
			<div class="col-md-12">
				<label for="categories" class="form-label">Genre</label>
				<select class="form-control" id="categories" name="categoriesId">
					<option value="0">Tous les genres</option>

					<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrCatToDisplay'), 'arrDetCategory');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('arrDetCategory')->value) {
$foreach0DoElse = false;
?>
					<option class="form-control" value="<?php echo $_smarty_tpl->getValue('arrDetCategory')->getId();?>
" <?php if ($_smarty_tpl->getValue('arrDetCategory')->getId() == $_smarty_tpl->getValue('objMovie')->getCategoriesId()) {?>selected<?php }?>>
						<?php echo $_smarty_tpl->getValue('arrDetCategory')->getCategories();?>

					</option>
					<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
				</select>
			</div>

			<div class="col-md-12">
				<label for="country" class="form-label">Pays d'origine*</label>
				<select class="form-control" id="country" name="countryId">
					<option value="0">Pays d'origine</option>

					<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrNatToDisplay'), 'arrDetNat');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('arrDetNat')->value) {
$foreach1DoElse = false;
?>
					<option class="form-control" value="<?php echo $_smarty_tpl->getValue('arrDetNat')->getId();?>
" <?php if ($_smarty_tpl->getValue('arrDetNat')->getId() == $_smarty_tpl->getValue('objMovie')->getCountryId()) {?>selected<?php }?>>
						<?php echo $_smarty_tpl->getValue('arrDetNat')->getCountry();?>

					</option>
					<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
				</select>
			</div>


			<div class="form-group py-2">
				<label class="form-label">Date de sortie*</label>
				<input name="release_date" type="date" class="form-control" id="release_date"
					value="<?php echo $_smarty_tpl->getValue('objMovie')->getRelease_date();?>
" placeholder="Quelle est la date de sortie du film?">
			</div>

			<div class="form-group py-2">
				<label class="form-label">Titre original</label>
				<input name="original_title" type="text" class="form-control" id="original_title"
					value="<?php echo $_smarty_tpl->getValue('objMovie')->getOriginalTitle();?>
" placeholder="">
			</div>
			<div class="form-group py-2">
				<label class="form-label">Durée*</label>
				<input name="length" type="time" class="form-control" id="length" value="<?php echo $_smarty_tpl->getValue('objMovie')->getLength();?>
">
			</div>
			<div class="form-group py-2">
				<label class="form-label">Synopsis*</label>
				<textarea name="description" class="form-control textarea" id="description"
					placeholder="Synopsis"><?php echo $_smarty_tpl->getValue('objMovie')->getDescription();?>
</textarea>
			</div>
			<div class="col-12 form-group py-2">
				<label for="photo" class="form-label">Affiche du film*</label>
				</label>
				<div>
										<img src="assets/img/movie/<?php echo $_smarty_tpl->getValue('objMovie')->getPhoto();?>
" alt="Affiche du film <?php echo $_smarty_tpl->getValue('objMovie')->getTitle();?>
">
									</div>
				<input name="photo" id="photo" type="file" class="form-control " value="<?php echo $_smarty_tpl->getValue('objMovie')->getPhoto();?>
">
			</div>

			<div class="form-group py-2">
				<label class="form-label">Trailer du film</label>
				<input name="trailer_url" type="text" class="form-control" value="<?php echo $_smarty_tpl->getValue('objMovie')->getTrailer();?>
"
					placeholder="Collez le lien du trailer">
			</div>

			<input class="w-100 btnCustom my-2" type="submit">

	</form>
</section>
<?php
}
}
/* {/block "content"} */
}
