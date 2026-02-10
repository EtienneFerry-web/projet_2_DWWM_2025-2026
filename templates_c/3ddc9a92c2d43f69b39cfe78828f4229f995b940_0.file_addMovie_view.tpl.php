<?php
/* Smarty version 5.7.0, created on 2026-02-10 14:59:14
  from 'file:views/addMovie_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_698b47c2e2c8e6_76250759',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3ddc9a92c2d43f69b39cfe78828f4229f995b940' => 
    array (
      0 => 'views/addMovie_view.tpl',
      1 => 1770735553,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_698b47c2e2c8e6_76250759 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1595694735698b47c2e1e6c9_91407841', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1805713028698b47c2e20462_95455567', "description");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2138865057698b47c2e21367_43091645', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_1595694735698b47c2e1e6c9_91407841 extends \Smarty\Runtime\Block
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
class Block_1805713028698b47c2e20462_95455567 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Ici vous pouvez ajouter un film !<?php
}
}
/* {/block "description"} */
/* {block "content"} */
class Block_2138865057698b47c2e21367_43091645 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

<section id="addMovie" class="container py-5 my-auto">
	<h1 class="text-center">Demande d'ajout de film</h1>
	<p class="mx-auto text-center py-2">Vous ne trouvez pas votre film préféré dans notre catalogue ? Aidez-nous à
		enrichir notre base de données ! Remplissez le formulaire ci-dessous avec les informations du film, et notre
		équipe l'ajoutera après vérification. </a></p>
	<form method="post" enctype="multipart/form-data">

		<div class="row">
			<div class="col-12 form-group py-2">
				<label class="form-label">Titre du film*</label>
				<input name="title" type="text" class="form-control" id="title" placeholder="Titre" value="">
			</div>
			<div class="col-md-12">
				<label for="categories" class="form-label">Genre</label>
				<select class="form-control" id="categories" name="categoriesId">
					<option value="0">Toutes les catégories</option>

					<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrCatToDisplay'), 'arrDetCategory');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('arrDetCategory')->value) {
$foreach0DoElse = false;
?>
					<option class="form-control" value="<?php echo $_smarty_tpl->getValue('arrDetCategory')->getId();?>
" selected>
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
					<option value="0">Tous les pays d'origine</option>

					<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrNatToDisplay'), 'arrDetNat');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('arrDetNat')->value) {
$foreach1DoElse = false;
?>
					<option class="form-control" value="<?php echo $_smarty_tpl->getValue('arrDetNat')->getId();?>
" <?php if ($_smarty_tpl->getValue('arrDetNat')->getId() == $_smarty_tpl->getValue('arrDetNat')) {?>selected<?php }?>>
						<?php echo $_smarty_tpl->getValue('arrDetNat')->getCountry();?>

					</option>
					<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
				</select>
			</div>


			<div class="form-group py-2">
				<label class="form-label">Date de sortie*</label>
				<input name="release_date" type="date" class="form-control" id="release_date" value=""
					placeholder="Quelle est la date de sortie du film?">
			</div>

			<div class="form-group py-2">
				<label class="form-label">Titre original</label>
				<input name="originalTitle" type="text" class="form-control" id="original_title" value=""
					placeholder="">
			</div>
			<div class="form-group py-2">
				<label class="form-label">Durée*</label>
				<input name="length" type="time" class="form-control" id="length" value="" placeholder="Email">
			</div>
			<div class="form-group py-2">
				<label class="form-label">Synopsis*</label>
				<textarea name="description" class="form-control textarea" id="description"
					placeholder="Synopsis"></textarea>
			</div>

			<hr>

			<!-- </div>
			<label class="form-label">Acteur principal*</label>
			<div class="row">
				<div class="form-group col-4 py-2">
					<label class="form-label">Nom</label>
					<input 	name="actorName" 
							type="text" 
							class="form-control <?php if ((true && (true && null !== ($_smarty_tpl->getValue('arrError')['actorName'] ?? null)))) {?>is-invalid<?php }?>" 
							id="actorName" 
							value="<?php echo $_smarty_tpl->getValue('strActorName');?>
"
							placeholder="Nom de l'acteur principal"
							required>
				</div>
				<div class="form-group col-4 py-2">
					<label for="actorFirstname" class="form-label">Prénom</label>
					<input 	name="actorFirstname" 
							type="text" 
							class="form-control <?php if ((true && (true && null !== ($_smarty_tpl->getValue('arrError')['actorFirstname'] ?? null)))) {?>is-invalid<?php }?>" 
							id="actorFirstname" 
							value="<?php echo $_smarty_tpl->getValue('strActorFirstname');?>
"
							placeholder="Nom de l'acteur principal"
							required>
				</div>
				<div class="form-group col-4 py-2">
					<label class="form-label">Rôle principal</label>
					<input 	name="characterName" 
							type="text" 
							class="form-control" 
							id="characterName" 
							value="<?php echo $_smarty_tpl->getValue('strCharacterName');?>
"
							placeholder="nom du personnage de l'acteur principal">
				</div>
			</div> -->

			<hr>

			<div class="col-12 form-group py-2">
				<label for="photo" class="form-label">Affiche du film*</label>
				</label>
				<div>
					<img src="assets/img/movie/" alt="Affiche du film ">
				</div>
				<input name="photo" id="photo" type="file" class="form-control ">
			</div>

			<div class="form-group py-2">
				<label class="form-label">Trailer du film</label>
				<input name="trailer_url" type="text" class="form-control" value=""
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
