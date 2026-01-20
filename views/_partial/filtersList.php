 <form method="post">
     <div class="row flex-sm-column g-2 text-start">
         <!-- Filtre Réalisateur -->
         <div class="col-md-3 w-100">
         <label for="filmTitle" class="form-label">Réalisateur</label>
         <select class="form-select">
             <option value="">Tous</option>
             <option value="inception">Inception</option>
             <option value="interstellar">Interstellar</option>
             <option value="matrix">Matrix</option>
         </select>
         </div>

         <!-- Filtre  acteur -->
         <div class="col-md-3 w-100">
         <label for="actor" class="form-label">Acteur</label>
         <select class="form-select" id="actor">
             <option value="">Tous</option>
             <option value="leo">Leonardo DiCaprio</option>
             <option value="keanu">Keanu Reeves</option>
             <option value="matt">Matt Damon</option>
         </select>
         </div>

         <!-- Filtre  Genre -->
         <div class="col-md-3 w-100">
         <label for="actor" class="form-label">Genre</label>
         <select class="form-select" id="actor">
             <option value="">Tous</option>
             <option value="leo">Leonardo DiCaprio</option>
             <option value="keanu">Keanu Reeves</option>
             <option value="matt">Matt Damon</option>
         </select>
         </div>

         <!-- Filtre producteur -->
         <div class="col-md-3 w-100">
         <label for="producer" class="form-label">Producteur</label>
         <select class="form-select" id="producer">
             <option value="">Tous</option>
             <option value="christopher">Christopher Nolan</option>
             <option value="wachowski">Wachowski</option>
             <option value="steven">Steven Spielberg</option>
         </select>
         </div>

         <!-- Filtre pays -->
         <div class="col-md-3 w-100">
             <label for="country" class="form-label">Pays</label>
             <select class="form-select" id="country">
                 <option value="">Tous</option>
                 <option value="usa">USA</option>
                 <option value="france">France</option>
                 <option value="uk">UK</option>
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
     				value="" >
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
    				value="" >
				</div>
				<div class="col-md-6">
    				<label for="enddate" class="form-label">Date de fin</label>
    				<input
    				type="date"
    				class="form-control"
    				id="enddate"
    				name="enddate"
    				value="" >
				</div>
  			</div>
   		</div>
     </div>

     <div class="py-3 text-center">
         <button type="submit" class="btnCustom">Filtrer</button>
         <button type="reset" class="btnCustom">Réinitialiser</button>
     </div>
</form>