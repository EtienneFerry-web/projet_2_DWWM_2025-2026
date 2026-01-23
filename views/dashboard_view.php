<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
	<link rel="stylesheet" href="/Projet2/assets/css/style.css">
</head>
<body>
<section id="dashboard" class="container py-5">
    <h1>DashBoard</h1>
    <div class="py-2 container row col-12 col-lg-auto">
        <div id="user"  class="nav-link col-2">Utilisateur</div>
        <div id="addMovie"  class="nav-link col-2">Fiche Flim</div>
        <div id="report"  class="nav-link col-2">Utilisateur Signaler</div>
    </div>
    <a href="index.php" class="homeBtn"><i class="bi bi-house-fill fs-1"></i></a>
    <div id="ficheMovie" class="d-none">
        <h2>Fiche Film</h2>
        <<form method="post">
		
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
					<label for="categorie" class="form-label">Genre</label>
					<select class="form-control" id="author" name="categorie">
						<option value="0" <?php echo ($intCategory == 0)?'selected':''; ?> class="form-control">Toutes les catégories</option>
						<!-- Faire une boucle sur les catégories de la base de données -->
						<?php
						foreach($arrCategory as $arrDetCategory){
						?>
							<option class="form-control" value="<?php echo $arrDetCategory['cat_id']; ?> " 
								<?php echo ($intCategory == $arrDetCategory['cat_id'])?'selected':''; ?> 
							>
								<?php echo $arrDetCategory['cat_name']; ?>
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
			
			<hr>
									
			<div class="form-group py-2">
                <label class="form-label">Affiche du film</label>
                <input name="url" type="text" class="form-control"  placeholder="Collez le lien vers l'image de l'affiche">
            </div>
		

            <input class="w-100 btnCustom my-2" type="submit" >
        </form>
    </div>
    <div id="listUser" class="d-block">
        <h2>Tous Les Utilisateur</h2>
            <form class="row g-1 align-items-center py-3 ">
                <div class="col-12 col-md-5 p-0">
                    <input class="form-control " type="search" placeholder="Rechercher..." name="search" value="">
                </div>

                <div class="col-12 col-md-5 p-0">
                    <select class="form-select">
                        <option value="">Tous Les Grade</option>
                        <option value="usa">Croissant</option>
                        <option value="france">Decroissant</option>
                    </select>
                </div>
                <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                    Recherche
                </button>
            </form>
            <div class="allUser">
                <form class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2 col-md-auto">
                        <span class="spanMovie">1</span>
                    </div>
                    <div class="col-3 col-md-1">
                        <span class="spanMovie">Pseudo</span>
                    </div>
                    <!-- Grade -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Restriction</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Restriction -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Grade</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                        Valider
                    </button>
                </form>
                <form class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2 col-md-auto">
                        <span class="spanMovie">1</span>
                    </div>
                    <div class="col-3 col-md-1">
                        <span class="spanMovie">Pseudo</span>
                    </div>
                    <!-- Grade -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Restriction</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Restriction -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Grade</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                        Valider
                    </button>
                </form>
                <form class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2 col-md-auto">
                        <span class="spanMovie">1</span>
                    </div>
                    <div class="col-3 col-md-1">
                        <span class="spanMovie">Pseudo</span>
                    </div>
                    <!-- Grade -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Restriction</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Restriction -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Grade</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                        Valider
                    </button>
                </form>
                <form class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2 col-md-auto">
                        <span class="spanMovie">1</span>
                    </div>
                    <div class="col-3 col-md-1">
                        <span class="spanMovie">Pseudo</span>
                    </div>
                    <!-- Grade -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Restriction</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Restriction -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Grade</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                        Valider
                    </button>
                </form>
                <form class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2 col-md-auto">
                        <span class="spanMovie">1</span>
                    </div>
                    <div class="col-3 col-md-1">
                        <span class="spanMovie">Pseudo</span>
                    </div>
                    <!-- Grade -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Restriction</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Restriction -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Grade</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                        Valider
                    </button>
                </form>
                <form class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2 col-md-auto">
                        <span class="spanMovie">1</span>
                    </div>
                    <div class="col-3 col-md-1">
                        <span class="spanMovie">Pseudo</span>
                    </div>
                    <!-- Grade -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Restriction</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Restriction -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Grade</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                        Valider
                    </button>
                </form>
                <form class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2 col-md-auto">
                        <span class="spanMovie">1</span>
                    </div>
                    <div class="col-3 col-md-1">
                        <span class="spanMovie">Pseudo</span>
                    </div>
                    <!-- Grade -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Restriction</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Restriction -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Grade</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                        Valider
                    </button>
                </form>
                <form class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2 col-md-auto">
                        <span class="spanMovie">1</span>
                    </div>
                    <div class="col-3 col-md-1">
                        <span class="spanMovie">Pseudo</span>
                    </div>
                    <!-- Grade -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Restriction</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Restriction -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Grade</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                        Valider
                    </button>
                </form>
                <form class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2 col-md-auto">
                        <span class="spanMovie">1</span>
                    </div>
                    <div class="col-3 col-md-1">
                        <span class="spanMovie">Pseudo</span>
                    </div>
                    <!-- Grade -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Restriction</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Restriction -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Grade</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                        Valider
                    </button>
                </form>
                <form class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2 col-md-auto">
                        <span class="spanMovie">1</span>
                    </div>
                    <div class="col-3 col-md-1">
                        <span class="spanMovie">Pseudo</span>
                    </div>
                    <!-- Grade -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Restriction</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Restriction -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Grade</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                        Valider
                    </button>
                </form>
                <form class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2 col-md-auto">
                        <span class="spanMovie">1</span>
                    </div>
                    <div class="col-3 col-md-1">
                        <span class="spanMovie">Pseudo</span>
                    </div>
                    <!-- Grade -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Restriction</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Restriction -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Grade</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                        Valider
                    </button>
                </form>
            </div>
        <div>
    </div>
    </div>
    <div id="allReport" class="d-none">
        <h2>Les Signalement</h2>

    </div>
</section>
<script src="assets/js/dasboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
