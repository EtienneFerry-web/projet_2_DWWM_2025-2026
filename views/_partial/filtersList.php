 <form method="post">
     <div class="row flex-sm-column g-2 text-start">
         <!-- Filtre Réalisateur -->
         <div class="col-md-3 w-100">
         <label for="filmTitle" class="form-label">Réalisateur</label>
         <select class="form-select" name="realisator" >
             <option value="">Tous</option>
             <?php foreach($objReal as $real){ ?>
                 <option value="<?= $real->getId() ?>" <?= ($real->getId() === (int)$arrPost['realisator'])? "selected" : "" ?>><?= $real->getFullName() ?></option>
            <?php } ?>
         </select>
         </div>

         <!-- Filtre  acteur -->
         <div class="col-md-3 w-100">
         <label for="actor" class="form-label">Acteur</label>
         <select class="form-select"  name="actor" >
             <option value="">Tous</option>
             <?php foreach($objActor as $actor){ ?>
                 <option value="<?= $actor->getId() ?>" <?= ($actor->getId() === (int)$arrPost['actor'])? "selected" : "" ?>><?= $actor->getFullName() ?></option>
            <?php } ?>
         </select>
         </div>

         <!-- Filtre  Genre -->
         <div class="col-md-3 w-100">
         <label for="actor" class="form-label">Genre</label>
         <select class="form-select" id="categories" name="categories">
             <option value="">Tous</option>
             <?php foreach($objCategories as $categories){ ?>
                 <option value="<?= $categories->getId() ?>" <?= ($categories->getId() === (int)$arrPost['categories'])? "selected" : "" ?>><?= $categories->getCategories() ?></option>
            <?php } ?>
         </select>
         </div>

         <!-- Filtre producteur -->
         <div class="col-md-3 w-100">
         <label for="producer" class="form-label">Producteur</label>
         <select class="form-select" id="producer" name="producer">
             <option value="">Tous</option>
             <?php foreach($objProducer as $producer){ ?>
                 <option value="<?= $producer->getId() ?>" <?= ($producer->getId() === (int)$arrPost['producer'])? "selected" : "" ?>><?= $producer->getFullName() ?></option>
            <?php } ?>
         </select>
         </div>

         <!-- Filtre pays -->
         <div class="col-md-3 w-100">
             <label for="country" class="form-label">Pays</label>
             <select class="form-select" id="country" name="country">
                 <option value="">Tous</option>
                 <?php foreach($objCountry as $country){ ?>
                     <option value="<?= $country->getId() ?>" <?= ($country->getId() === (int)$arrPost['country'])? "selected" : "" ?>><?= $country->getCountry() ?></option>
                <?php } ?>
             </select>
             </div>

             <div class="col-md-6" id="date-exact">
  			<label for="date" class="form-label">Date</label>
  			<input
     				type="date"
     				class="form-control"
     				id="date"
     				name="date"
     				aria-describedby="date-help"
     				value="<?= $arrPost['date'] ?>" >
  			<small id="date-help" class="form-text text-muted">
     				Format: JJ/MM/AAAA
  			</small>
   		</div>
   		<div id="date-range" >
  			<div class="row g-3">
				<div class="col-md-6">
    				<label for="startdate" class="form-label">Date de début</label>
    				<input
    				type="date"
    				class="form-control"
    				id="startdate"
    				name="startdate"
    				value="<?= $arrPost['startDate'] ?>" >
				</div>
				<div class="col-md-6">
    				<label for="enddate" class="form-label">Date de fin</label>
    				<input
    				type="date"
    				class="form-control"
    				id="enddate"
    				name="enddate"
    				value="<?= $arrPost['endDate'] ?>" >
				</div>
  			</div>
   		</div>
     </div>

     <div class="py-3 text-center">
         <button type="submit" class="btnCustom">Filtrer</button>
         <a href="/Projet2/index.php?ctrl=movie&action=list" class="btnCustom">Réinitialiser</button></a>
     </div>
</form>
