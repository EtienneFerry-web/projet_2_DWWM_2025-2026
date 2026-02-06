{extends file="views/layout_view.tpl"}
{block name="title" prepend}Ajouter un film{/block}
{block name="description"}Ici vous pouvez ajouter un film !{/block}
{block name="content"}
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
							value="{$objPerson->getName()}"
							required>
				</div>			
				<div class="col-6 form-group py-2">
					<label class="form-label">Prénom*</label>
					<input 	name="name" 
							type="text" 
							class="form-control" 
							id="name" 
							placeholder="Nom" 
							value="{$objPerson->getFirstName()}"
							required>
				</div>
				<div class="col-6 form-group py-2">
					<label class="form-label">Date de naissance*</label>
					<input 	name="name" 
							type="date" 
							class="form-control" 
							id="name" 
							placeholder="Nom" 
							value="{$objPerson->getBirthdate()}"
							required>
				</div>	
					
			
            
									
			<div class="form-group py-2">
                <label class="form-label">Affiche du film</label>
                <input name="url" type="text" class="form-control"  placeholder="Collez le lien vers l'image de l'affiche">
            </div>
		

            <input class="w-100 btnCustom my-2" type="submit" >
        </form>
</section>
{/block}