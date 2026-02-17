{extends file="views/layout_view.tpl"}
{if ($objMovie->getId()|is_null)}
{block name="title" prepend}Ajouter un film{/block}
{block name="description"}Ici vous pouvez ajouter un film !{/block}
{else}
{block name="title" prepend}Modifier un film{/block}
{block name="description"}Ici vous pouvez modifier un film !{/block}
{/if}
{block name="content"}
<section id="addMovie" class="container py-5 my-auto">
	{if ($objMovie->getId()|is_null)}
	<h1 class="text-center">Demande d'ajout de film</h1>
	<p class="mx-auto text-center py-2">Vous ne trouvez pas votre film préféré dans notre catalogue ? Aidez-nous à
		enrichir notre base de données ! Remplissez le formulaire ci-dessous avec les informations du film, et notre
		équipe l'ajoutera après vérification. </a></p>
	{else}
	<h1 class="text-center">Modifier un film</h1>
	{/if}
	<form method="post" enctype="multipart/form-data">

		<div class="row">
			<div class="col-12 form-group py-2">
				<label class="form-label">Titre du film*</label>
				<input name="title" type="text" class="form-control" id="title" placeholder="Titre"
					value="{$objMovie->getTitle()}">
			</div>
			<div class="col-md-12">
				<label for="categories" class="form-label">Genre</label>
				<select class="form-control" id="categories" name="categoriesId">
					<option>Tous les genres</option>

					{foreach from=$arrCatToDisplay item=arrDetCategory}
					<option class="form-control" value="{$arrDetCategory->getId()}" 
						{if $arrDetCategory->getId() == $objMovie->getCategoriesId()}selected{/if}>
						{$arrDetCategory->getCategories()}
					</option>
					{/foreach}
				</select>
			</div>

			<div class="col-md-12">
				<label for="country" class="form-label">Pays d'origine*</label>
				<select class="form-control" id="country" name="countryId">
					<option>Pays d'origine</option>

					{foreach from=$arrNatToDisplay item=arrDetNat}
					<option class="form-control" value="{$arrDetNat->getId()}" 
						{if $arrDetNat->getId() == $objMovie->getCountryId()}selected{/if}>
						{$arrDetNat->getCountry()}
					</option>
					{/foreach}
				</select>
			</div>


			<div class="form-group py-2">
				<label class="form-label">Date de sortie*</label>
				<input name="release_date" type="date" class="form-control" id="release_date"
					value="{$objMovie->getRelease_date()}" placeholder="Quelle est la date de sortie du film?">
			</div>

			<div class="form-group py-2">
				<label class="form-label">Titre original</label>
				<input name="original_title" type="text" class="form-control" id="original_title"
					value="{$objMovie->getOriginalTitle()}" placeholder="">
			</div>
			<div class="form-group py-2">
				<label class="form-label">Durée*</label>
				<input name="length" type="time" class="form-control" id="length" value="{$objMovie->getLength()}"
					placeholder="Email">
			</div>
			<div class="form-group py-2">
				<label class="form-label">Synopsis*</label>
				<textarea name="description" class="form-control textarea" id="description"
					placeholder="Synopsis">{$objMovie->getDescription()}</textarea>
			</div>
			<div class="col-12 form-group py-2">
				<label for="photo" class="form-label">Affiche du film*</label>
				</label>
				<div>
					{if (!$objMovie->getId()|is_null)}
					<img src="assets/img/movie/{$objMovie->getPhoto()}" alt="Affiche du film {$objMovie->getTitle()}">
					{/if}
				</div>
				<input name="photo" id="photo" type="file" class="form-control" value="{$objMovie->getPhoto()}">
			</div>

			<div class="form-group py-2">
				<label class="form-label">Trailer du film</label>
				<input name="trailer_url" type="text" class="form-control" value="{$objMovie->getTrailer()}"
					placeholder="Collez le lien du trailer">
			</div>

			<input class="w-100 btnCustom my-2" type="submit">

	</form>
</section>
{/block}