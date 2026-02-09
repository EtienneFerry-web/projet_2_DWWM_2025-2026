{extends file="views/layout_view.tpl"}
{block name="title" prepend}Ajouter un film{/block}
{block name="description"}Ici vous pouvez ajouter un film !{/block}
{block name="content"}
<section id="" class="container py-5 my-auto">
	<h1 class="text-center">Modifier une célébrité</h1>
	<p class="mx-auto text-center py-2"></p>
	<form method="post">

		<div class="row">
			<div class="col-12 form-group py-2">
				<label class="form-label">Nom*</label>
				<input name="name" type="text" class="form-control" id="name" placeholder="Nom"
					value="{$objPerson->getName()}" required>
			</div>
			<div class="col-12 form-group py-2">
				<label class="form-label">Prénom*</label>
				<input name="name" type="text" class="form-control" id="name" placeholder="Nom"
					value="{$objPerson->getFirstName()}" required>
			</div>
			<div class="col-6 form-group py-2">
				<label class="form-label">Date de naissance*</label>
				<input name="name" type="date" class="form-control" id="name" placeholder="Nom"
					value="{$objPerson->getBirthdate()}" required>
			</div>
			<div class="col-6 form-group py-2">
				<label class="form-label">Date de décès</label>
				<input name="name" type="date" class="form-control" id="name" placeholder="Nom"
					value="{$objPerson->getDeathdate()}" required>
			</div>
			<div class="col-6 form-group py-2">
				<label class="form-label">Pays d'origine*</label>
				</label>
				<input name="country" type="text" class="form-control" id="country" placeholder="Pays d'origine"
					value="{$objPerson->getCountry()}" required>
			</div>
			<div class="col-12 form-group py-2">
				<label class="form-label">Métier*</label>
				<select class="form-control" id="fonction" name="fonction">
					<option value="0" selected>Tous les métiers</option>
					{foreach from=$arrJobToDisplay item=arrDetJob}
					<option value="{$arrDetJob->getId()}" {if ($arrDetJob->getId() == $_GET['id'])}selected{/if}>
						{$arrDetJob->getNameJob()}
					</option>
					{/foreach}
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
{/block}