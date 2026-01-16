<?php
    $strPage ="addMovie";
    require'../_partial/header.php';
?>

    <section class="container py-5 my-auto">
	    <h1 class="text-center">Demande d'ajout de film</h1>
		<p class="mx-auto text-center py-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam quae pariatur sint, atque sed soluta numquam! Doloremque voluptatem odit temporibus.</a></p>
		<form>
            <div class="form-group py-2">
                <label class="form-label">Nom</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nom">
            </div>
            <div class="form-group py-2">
                <label class="form-label">Prenom</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Prenom">
            </div>
            <div class="form-group py-2">
                <label class="form-label">Adresse Mail</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
            </div>
            <div class="form-group py-2">
                <label class="form-label" >Mots de passe</label>
                <input type="password" class="form-control"  placeholder="Mots de Passe">
            </div>
            <div class="form-group py-2">
                <label class="form-label">Mots de passe de comfirmation</label>
                <input type="password" class="form-control"  placeholder="Mots de passe de comfirmation">
            </div>

            <input class="w-100 btnCustom" type="submit" >
        </form>
    </section>
<?php require'../_partial/footer.php'; ?>
