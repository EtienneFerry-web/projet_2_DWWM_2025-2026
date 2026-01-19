

    <section id="login" class="container py-5 my-auto ">
    <?php 
    if (count($arrError) > 0) {?>
		<div class="alert alert-danger">
		<?php foreach ($arrError as $strError){ ?>
			<p><?php echo $strError; ?></p>
		<?php }	?>
		</div>
	<?php } ?>
	    <h1 class="text-center">Connexion</h1>
		<p class="mx-auto text-center py-2">Si vous n'avez pas de compte vous pouvez en créer un sur la page <a href="/Projet2/page/create_account.html" class="text-dark">d'inscription !</a></p>
		<form method="post">
            <div class="form-group py-3">
                <label class="form-label">Adresse Mail</label>
                <input  type="email" 
                        name="email"
                        class="form-control <?php if (isset($arrError['email'])) { echo 'is-invalid'; } ?>" 
                        value="<?php echo($objUser->getEmail()); ?>"
                        placeholder="Email">
            </div>
            <div class="form-group py-3">
                <label class="form-label">Mots de passe</label>
                <input  type="password" 
                        name="pwd"
                        class="form-control <?php if (isset($arrError['pwd'])) { echo 'is-invalid'; } ?>"  
                        value=""
                        placeholder="Mot de Passe">
            </div>

            <input class="w-100 btnCustom" type="submit" >
        </form>
    </section>