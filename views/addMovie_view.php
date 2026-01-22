<?php
	/**
	* @todo select sur les producteur realisateur et acteurs(ajout auto si n'existepas)
	*/
	//Récupérer les informations du Formulaire
	var_dump($_POST);
		$strTitle 				= $_POST['title']??'';
		$intCategorie			= $_POST5['categorie']??0;
		$strOriginalTitle		= $_POST['original_title']??'';
		$strLength				= $_POST['length']??'';
		$strDescription			= $_POST['description']??'';
		$strRelease_date		= $_POST['release_date']??'';
		$strCountry				= $_POST['country']??'';
		$intProductor			= $_POST['productor']??'0';
		$intRealisator			= $_POST['realisator']??'0';
		$strCharacterName		= $_POST['characterName']??'';
		$strUrl					= $_POST['url']??'';
		$strProducerName		= $_POST['producerName']??'';
		$strProducerFirstname	= $_POST['producerFirstname']??'';
		$strProducerBirthdate	= $_POST['producerBirthdate']??'';
		$strProducerDeathdate	= $_POST['producerDeathdate']??'';
		$strRealisatorName		= $_POST['realisatorName']??'';
		$strRealisatorFirstname	= $_POST['realisatorFirstname']??'';
		$strRealisatorBirthdate	= $_POST['realisatorBirthdate']??'';
		$strRealisatorDeathdate	= $_POST['realisatorDeathdate']??'';
		$strActorName			= $_POST['actorName']??'';
		$strActorFirstname		= $_POST['actorFirstame']??'';
		$strActorBirthdate		= $_POST['actorBirthdate']??'';
		$strActorDeathdate		= $_POST['actorDeathdate']??'';
		$strCharacterName		= $_POST['characterName']??'';
	
	
	$objMovie	= new MovieEntity;
	$objMovie->hydrate($_POST);
	
	$objPerson = new PersonEntity;
	$objPerson->hydrate($_POST);
	
	$objParticip = new ParticipateEntity;
	$objParticip->hydrate($_POST);
	
	$objPhoto = new PhotoEntity;
	$objPhoto->hydrate($_POST);
	
	
	$objCategorieModel = new ContentModel;	
	$arrCategorie = $objCategorieModel->findAllCategories();
	var_dump($intCategorie);
	var_dump($arrCategorie);
	var_dump($objMovie);
	var_dump($objPerson);
	var_dump($objParticip);
	var_dump($objPhoto);
	
	
?>

    <section class="container py-5 my-auto">
	    <h1 class="text-center">Demande d'ajout de film</h1>
		<p class="mx-auto text-center py-2">Vous ne trouvez pas votre film préféré dans notre catalogue ? Aidez-nous à enrichir notre base de données ! Remplissez le formulaire ci-dessous avec les informations du film, et notre équipe l'ajoutera après vérification. </a></p>
		<form method="post">
		
			<div class="row">
				<div class="col-6 form-group py-2">
					<label class="form-label">Titre du film*</label>
					<input 	name="title" 
							type="text" 
							class="form-control" 
							id="Title" 
							placeholder="Titre" 
							value="<?php echo($strTitle); ?>"
							required>
				</div>
				<div class="col-md-6">
					<label for="categorie" class="form-label">genre</label>
					<select class="form-control" id="author" name="categorie">
						<option value="0" <?php echo ($intCategorie == 0)?'selected':''; ?> class="form-control">Toutes les catégories</option>
						<!-- Faire une boucle sur les catégories de la base de données -->
						<?php
						foreach($arrCategorie as $arrDetCategorie){
						?>
							<option class="form-control" value="<?php echo $arrDetCategorie['cat_id']; ?> " 
								<?php echo ($intCategorie == $arrDetCategorie['cat_id'])?'selected':''; ?> 
							>
								<?php echo $arrDetCategorie['cat_name']; ?>
							</option>
						<?php
						}
						?>
					</select>
				</div>

			
			
			<div class="form-group py-2">
                <label class="form-label">Date de sortie*</label>
                <input 	name="release_date" 
						type="date" 
						class="form-control" 
						id="release_date"  
						value="<?php echo($strRelease_date); ?>"
						placeholder="Quelle est la date de sortie du film?" 
						required>
            </div>
			
            <div class="form-group py-2">
                <label class="form-label">Titre original</label>
                <input 	name="original_title" 						
						type="text" 
						class="form-control" 
						id="original_title"
						value="<?php echo($strOriginalTitle); ?>"
						placeholder="">
            </div>
            <div class="form-group py-2">
                <label class="form-label">Durée*</label>
                <input 	name="length" 
						type="time" 
						class="form-control" 
						id="length"  
						value="<?php echo($strLength); ?>"
						placeholder="Email" 
						required>
            </div>
            <div class="form-group py-2">
                <label class="form-label" >Synopsis*</label>
                <textarea 	name="description" 	 
							class="form-control textarea" 
							id="description" 
							placeholder="Synopsis" 
							required><?php echo($strDescription); ?></textarea>
            </div>            
			
			<hr>
			<label for="" class="form-label">Producteur</label>
			<div class="row">
				<div class="col-6">
					<label for="producerName" class="form-label">Nom</label>
					<input 	name="producerName" 
						type="text" 
						class="form-control" 
						id="producerName"  
						value="<?php echo($strProducerName); ?>"
						placeholder="" 
						required>
				</div>
				<div class="col-6">
					<label for="producerFirstname" class="form-label">Prénom</label>
					<input 	name="producerFirstname" 
						type="text" 
						class="form-control" 
						id="producerFirstname"  
						value="<?php echo($strProducerFirstname); ?>"
						placeholder="" 
						required>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<label for="producerBirthdate" class="form-label">Date de naissance</label>
					<input 	name="producerBirthdate" 
						type="date" 
						class="form-control" 
						id="producerBirthdate"  
						value="<?php echo($strProducerBirthdate); ?>"
						placeholder="" 
						required>
				</div>
				<div class="col-6">
					<label for="producerDeathdate" class="form-label">Date de décès</label>
					<input 	name="producerDeathdate" 
						type="date" 
						class="form-control" 
						id="producerDeathdate"  
						value="<?php echo($strProducerDeathdate); ?>"
						placeholder="" 
						>
				</div>
			</div>
			<div class="form-group py-2">
                <label class="form-label">Nationalité*</label>
                <input 	name="producerCountry" 
						type="text" 
						class="form-control" 
						id="producerCountry"  
						value="<?php echo($strProducerCountry); ?>"
						placeholder="Quelle est la nationalité du producteur?" 
						required>
            </div>
			
			<hr>
			<label for="" class="form-label">Réalisateur</label>
			<div class="row">
				<div class="col-6">
					<label for="realisatorName" class="form-label">Nom</label>
					<input 	name="realisatorName" 
						type="text" 
						class="form-control" 
						id="realisatorName"  
						value="<?php echo($strRealisatorName); ?>"
						placeholder="" 
						required>
				</div>
				<div class="col-6">
					<label for="realisatorFirstname" class="form-label">Prénom</label>
					<input 	name="realisatorFirstname" 
						type="text" 
						class="form-control" 
						id="realisatorFirstname"  
						value="<?php echo($strRealisatorFirstname); ?>"
						placeholder="" 
						required>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<label for="realisatorBirthdate" class="form-label">Date de naissance</label>
					<input 	name="realisatorBirthdate" 
						type="date" 
						class="form-control" 
						id="realisatorBirthdate"  
						value="<?php echo($strRealisatorBirthdate); ?>"
						placeholder="" 
						required>
				</div>
				<div class="col-6">
					<label for="realisatorDeathdate" class="form-label">Date de décès</label>
					<input 	name="realisatorDeathdate" 
						type="date" 
						class="form-control" 
						id="realisatorDeathdate"  
						value="<?php echo($strRealisatorDeathdate); ?>"
						placeholder="" 
						>
				</div>
			</div>
			<div class="form-group py-2">
                <label class="form-label">Nationalité*</label>
                <input 	name="realisatorCountry" 
						type="text" 
						class="form-control" 
						id="realisatorCountry"  
						value="<?php echo($strRealisatorCountry); ?>"
						placeholder="Quelle est la nationalité du producteur?" 
						required>
            </div>
			<hr>
			
				
			</div>
			</div>
			<label class="form-label">Acteur principal*</label>
			<div class="row">
				<div class="form-group col-4 py-2">
					<label class="form-label">Nom</label>
					<input 	name="actorName" 
							type="text" 
							class="form-control" 
							id="actorName" 
							value="<?php echo($strActorName); ?>"
							placeholder="Nom de l'acteur principal">
				</div>
				<div class="form-group col-4 py-2">
					<label for="actorFirstname" class="form-label">Prénom</label>
					<input 	name="actorFirstname" 
							type="text" 
							class="form-control" 
							id="actorFirstname" 
							value="<?php echo($strActorFirstname); ?>"
							placeholder="Nom de l'acteur principal">
				</div>
				<div class="form-group col-4 py-2">
					<label class="form-label">Rôle principal</label>
					<input 	name="characterName" 
							type="text" 
							class="form-control" 
							id="characterName" 
							value="<?php echo($strCharacterName); ?>"
							placeholder="nom du personnage de l'acteur principal">
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<label for="actorBirthdate" class="form-label">Date de naissance</label>
					<input 	name="actorBirthdate" 
						type="date" 
						class="form-control" 
						id="actorBirthdate"  
						value="<?php echo($strActorBirthdate); ?>"
						placeholder="" 
						required>
				</div>
				<div class="col-6">
					<label for="actorDeathdate" class="form-label">Date de décès</label>
					<input 	name="actorDeathdate" 
						type="date" 
						class="form-control" 
						id="actorDeathdate"  
						value="<?php echo($strActorDeathdate); ?>"
						placeholder="" 
						>
				</div>
				<div class="form-group py-2">
                <label class="form-label">Nationalité*</label>
                <input 	name="realisatorCountry" 
						type="text" 
						class="form-control" 
						id="realisatorCountry"  
						value="<?php echo($strRealisatorCountry); ?>"
						placeholder="Quelle est la nationalité du producteur?" 
						required>
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
