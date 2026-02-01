{extends file="views/layout_view.tpl"}
{block name="title" prepend}Ajouter un film{/block}
{block name="description"}Ici vous pouvez ajouter un film !{/block}
{block name="content"}
<section id="addMovie" class="container py-5 my-auto">
    h1 class="text-center">Demande d'ajout de film</h1>
		<p class="mx-auto text-center py-2">Vous ne trouvez pas votre film préféré dans notre catalogue ? Aidez-nous à enrichir notre base de données ! Remplissez le formulaire ci-dessous avec les informations du film, et notre équipe l'ajoutera après vérification. </a></p>
		<form method="post">
		
			<div class="row">
				<div class="col-6 form-group py-2">
					<label class="form-label">Titre du film*</label>
					<input 	name="title" 
							type="text" 
							class="form-control" 
							id="title" 
							placeholder="Titre" 
							value="{$objContent->getTitle()}"
							required>
				</div>
				<div class="col-md-6">
					<label for="categorie" class="form-label">Genre</label>
					<select class="form-control" id="categorie" name="categorie">
					<option value="0">Toutes les catégories</option>
					
					{foreach from=$arrResult item=arrDetCategory}
						<option class="form-control" value="{$arrDetCategory['mov_id']}" 
							{if $objCategories->getID() == $arrDetCategory['mov_id']}selected{/if}
						>
							{$arrDetCategory['mov_categories']}
						</option>
					{/foreach}
					</select>
				</div>

			
			
			<div class="form-group py-2">
                <label class="form-label">Date de sortie*</label>
                <input 	name="release_date" 
						type="date" 
						class="form-control" 
						id="release_date"  
						value="{$objContent->getCreatedate()}"
						placeholder="Quelle est la date de sortie du film?" 
						required>
            </div>
			
            <div class="form-group py-2">
                <label class="form-label">Titre original</label>
                <input 	name="original_title" 						
						type="text" 
						class="form-control" 
						id="original_title"
						value="{$objContent->getOriginalTitle()}"
						placeholder="">
            </div>
            <div class="form-group py-2">
                <label class="form-label">Durée*</label>
                <input 	name="length" 
						type="time" 
						class="form-control" 
						id="length"  
						value="{$objContent->getLength()}"
						placeholder="Email" 
						required>
            </div>
            <div class="form-group py-2">
                <label class="form-label" >Synopsis*</label>
                <textarea 	name="description" 	 
							class="form-control textarea" 
							id="description" 
							placeholder="Synopsis" 
							required>{$objContent->getDescription()}</textarea>
            </div>            
			
			<hr>
			
			</div>
			<label class="form-label">Acteur principal*</label>
			<div class="row">
				<div class="form-group col-4 py-2">
					<label class="form-label">Nom</label>
					<input 	name="actorName" 
							type="text" 
							class="form-control {if isset($arrError['actorName'])}is-invalid{/if}" 
							id="actorName" 
							value="{$strActorName}"
							placeholder="Nom de l'acteur principal"
							required>
				</div>
				<div class="form-group col-4 py-2">
					<label for="actorFirstname" class="form-label">Prénom</label>
					<input 	name="actorFirstname" 
							type="text" 
							class="form-control {if isset($arrError['actorFirstname'])}is-invalid{/if}" 
							id="actorFirstname" 
							value="{$strActorFirstname}"
							placeholder="Nom de l'acteur principal"
							required>
				</div>
				<div class="form-group col-4 py-2">
					<label class="form-label">Rôle principal</label>
					<input 	name="characterName" 
							type="text" 
							class="form-control" 
							id="characterName" 
							value="{$strCharacterName}"
							placeholder="nom du personnage de l'acteur principal">
				</div>
			</div>
			
			<hr>
									
			<div class="form-group py-2">
                <label class="form-label">Affiche du film</label>
                <input name="url" type="text" class="form-control"  placeholder="Collez le lien vers l'image de l'affiche">
            </div>
		

            <input class="w-100 btnCustom my-2" type="submit" >
        </form>
</section>
{/block}