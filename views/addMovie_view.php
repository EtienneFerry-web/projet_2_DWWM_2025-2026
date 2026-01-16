<section id="addMovie" class="container py-5 my-auto">
    <h1 class="text-center">Demande d'ajout de film</h1>
    <p class="mx-auto text-center py-2">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam quae pariatur sint, atque sed soluta numquam! Doloremque voluptatem odit temporibus.
    </p>

    <form method="post">
        <div class="form-group py-2">
            <label class="form-label">Titre*</label>
            <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Titre">
        </div>

        <div class="form-group py-2">
            <label class="form-label">Titre original*</label>
            <input name="original_title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Prenom">
        </div>

        <div class="form-group py-2">
            <label class="form-label">Durée*</label>
            <input name="length" type="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
        </div>

        <div class="form-group py-2">
            <label class="form-label">Synopsis*</label>
            <input name="descritpion" type="text" class="form-control" placeholder="Synopsis">
        </div>

        <div class="form-group py-2">
            <label class="form-label">Date de sortie*</label>
            <input name="release_date" type="date" class="form-control" placeholder="">
        </div>

        <div class="form-group py-2">
            <label class="form-label">Nationalité*</label>
            <input name="country" type="text" class="form-control" placeholder="">
        </div>

        <div class="form-group py-2">
            <label class="form-label">Produteur*</label>
            <input name="productor" type="text" class="form-control" placeholder="">
        </div>

        <div class="form-group py-2">
            <label class="form-label">Réalisteur*</label>
            <input name="realisator" type="text" class="form-control" placeholder="">
        </div>

        <div class="row">
            <div class="form-group col-6 py-2">
                <label class="form-label">Acteur principal*</label>
                <input name="actor1" type="text" class="form-control" placeholder="">
            </div>
            <div class="form-group col-6 py-2">
                <label class="form-label">Rôle principal</label>
                <input name="name1" type="text" class="form-control" placeholder="">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-6 py-2">
                <label class="form-label">Acteur secondaire</label>
                <input name="actor2" type="text" class="form-control" placeholder="">
            </div>
            <div class="form-group col-6 py-2">
                <label class="form-label">Rôle secondaire</label>
                <input name="name2" type="text" class="form-control" placeholder="">
            </div>
        </div>

        <div class="form-group py-2">
            <label class="form-label">Affiche du film</label>
            <input name="url" type="text" class="form-control" placeholder="Collez le lien vers votre image">
        </div>

        <div class="accordion my-2" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Ajout lien photo
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="form-group py-2">
                            <label class="form-label">Photo</label>
                            <input name="url" type="text" class="form-control" placeholder="Collez le lien vers votre image">
                        </div>
                        <div class="form-group py-2">
                            <label class="form-label">Photo</label>
                            <input name="url" type="text" class="form-control" placeholder="Collez le lien vers votre image">
                        </div>
                        <div class="form-group py-2">
                            <label class="form-label">Photo</label>
                            <input name="url" type="text" class="form-control" placeholder="Collez le lien vers votre image">
                        </div>
                        <div class="form-group py-2">
                            <label class="form-label">Photo</label>
                            <input name="url" type="text" class="form-control" placeholder="Collez le lien vers votre image">
                        </div>
                        <div class="form-group py-2">
                            <label class="form-label">Photo</label>
                            <input name="url" type="text" class="form-control" placeholder="Collez le lien vers votre image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input class="w-100 btnCustom" type="submit">
    </form>
</section>
