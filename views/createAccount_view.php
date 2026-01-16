

    <section class="container py-5 my-auto">
    <?php if (count($arrError) > 0) {?>
		<div class="alert alert-danger">
		<?php foreach ($arrError as $strError){ ?>
			<p><?php echo $strError; ?></p>
		<?php }	?>
		</div>
	<?php } ?>
	    <h1 class="text-center">Inscription</h1>
		<p class="mx-auto text-center py-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam quae pariatur sint, atque sed soluta numquam! Doloremque voluptatem odit temporibus.</a></p>
		<form method="post">
            <div class="form-group py-2">
                <label class="form-label">Nom :</label>
                <input  type="text" 
                        class="form-control <?php if (isset($arrError['name'])) { echo 'is-invalid'; } ?> "  
                        value="<?php echo($objUser->getName()); ?>"
                        placeholder="Nom">
            </div>
            <div class="form-group py-2">
                <label class="form-label">Prenom :</label>
                <input  type="text" 
                        class="form-control <?php if (isset($arrError['firstname'])) { echo 'is-invalid'; } ?>"  
                        value="<?php echo($objUser->getFirstname()); ?>"
                        placeholder="Prenom">
            </div>
            <div class="form-group py-2">
                <label for="date" class="form-label">Date de naissance :</label>
     			<input
    				type="date"
    				class="form-control"
    				id="birthdate"
    				name="birthdate"
    				aria-describedby="date-help"
    				value="<?php echo($objUser->getBirthdate()); ?>" >
     			<small id="date-help" class="form-text text-muted">
        				Format: JJ/MM/AAAA
                </small>
            </div>
            <div class="form-group py-2">
                <label class="form-label">Adresse Mail :</label>
                <input  type="email" 
                        class="form-control <?php if (isset($arrError['mail'])) { echo 'is-invalid'; } ?>" 
                        value="<?php echo($objUser->getEmail()); ?>"
                        placeholder="Email">
            </div>
            <div class="form-group py-2">
                <label class="form-label" >Mots de passe :</label>
                <input  type="password" 
                        class="form-control <?php if (isset($arrError['pwd'])) { echo 'is-invalid'; } ?>"  
                        value=""
                        placeholder="Mots de Passe">
            </div>
            <div class="form-group py-2">
                <label class="form-label">Confirmation du mot de passe :</label>
                <input  type="password" 
                        class="form-control <?php if (isset($arrError['pwd_confirm'])) { echo 'is-invalid'; } ?>"  
                        placeholder="Mots de passe de comfirmation">
            </div>

            <input class="w-100 btnCustom" type="submit" >
        </form>
    </section>