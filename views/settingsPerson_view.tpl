{extends file="views/layout_view.tpl"}
{block name="title" prepend}Ajouter un film{/block}
{block name="description"}Ici vous pouvez ajouter un film !{/block}
{block name="content"}
<section id="" class="container py-5 my-auto">
	<h1 class="text-center">Modifier une célébrité</h1>
	<p class="mx-auto text-center py-2"></p>
	<form method="post" enctype="multipart/form-data">

		<div class="row">
			<div class="col-12 form-group py-2">
				<label class="form-label">Nom*</label>
				<input name="name" type="text" class="form-control" id="name" placeholder="Nom"
					value="{$objPerson->getName()}">
			</div>
			<div class="col-12 form-group py-2">
				<label class="form-label">Prénom*</label>
				<input name="firstname" type="text" class="form-control" id="firstname" placeholder="Nom"
					value="{$objPerson->getFirstName()}">
			</div>
			<div class="col-6 form-group py-2">
				<label class="form-label">Date de naissance*</label>
				<input name="birthdate" type="date" class="form-control" id="birthdate" placeholder="Date de naissance"
					value="{$objPerson->getBirthdate()}">
			</div>
			<div class="col-6 form-group py-2">
				<label class="form-label">Date de décès</label>
				<input name="deathdate" type="date" class="form-control" id="deathdate" placeholder="Date de décès"
					value="{$objPerson->getDeathdate()}">
			</div>
			<div class="col-12 form-group py-2">
				<label for="bio" class="form-label">Biographie*</label>
				<textarea name="bio" id="bio" class="form-control">{$objPerson->getBio()}</textarea>
			</div>

			<div class="col-12 form-group py-2">
				<label for="country" class="form-label">Pays d'origine*</label>
				</label>

				<select class="form-control" name="country" id="country" value="{$country->getId}">
					{foreach from=$arrCountryToDisplay item=country}
					<option value="{$country->getId()}" {if $country->getCountry() ==
						$objPerson->getCountry()}selected{/if}>
						{$country->getCountry()}
					</option>

					{/foreach}
				</select>
			</div>
			<div class="col-12 form-group py-2">
				<label for="country" class="form-label">Photo*</label>
				</label>
				<div>
					<img src="{$smarty.env.BASE_URL}assets/img/person/{$objPerson->getPhoto()}" alt="Photo de {$objPerson->getName()}">
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
{/block}