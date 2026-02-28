{extends file="views/layout_view.tpl"}
{block name="title" prepend}Modifier un film{/block}
{block name="content"}
<section id="" class="container py-5 my-auto">
    <h1 class="text-center">Modifier une célébrité</h1>
    <p class="mx-auto text-center py-2"></p>
    <form method="post">
        <input type="hidden" name="csrf_token" value="{$smarty.session.csrf_token}">
        <div class="row">
            <div class="col-12 form-group py-2">
                <label class="form-label">Titre du film*</label>
                <input name="title" type="text" class="form-control" id="title" value="">
            </div>
            <div class="col-md-12">
                <label for="categorie" class="form-label">Genre</label>
                <select class="form-control" id="categorie" name="categorie">
                    //boucle pour ttes les catégories
                    <option class="form-control" value="">

                    </option>
                </select>
            </div>

            <div class="form-group py-2">
                <label class="form-label">Date de sortie*</label>
                <input name="release_date" type="date" class="form-control" id="release_date" value="">
            </div>

            <div class="form-group py-2">
                <label class="form-label">Titre original</label>
                <input name="original_title" type="text" class="form-control" id="original_title" value="">
            </div>
            <div class="form-group py-2">
                <label class="form-label">Durée*</label>
                <input name="length" type="time" class="form-control" id="length" value="">
            </div>
            <div class="form-group py-2">
                <label class="form-label">Synopsis*</label>
                <textarea name="description" class="form-control textarea" id="description"
                    placeholder="Synopsis"></textarea>
            </div>

            <hr>

        </div>
        <label class="form-label">Acteur principal*</label>
        <div class="row">
            <div class="form-group col-4 py-2">
                <label class="form-label">Nom</label>
                <input name="actorName" type="text" class="form-control" id="actorName" value="">
            </div>
            <div class="form-group col-4 py-2">
                <label for="actorFirstname" class="form-label">Prénom</label>
                <input name="actorFirstname" type="text" class="form-control" id="actorFirstname" value="">
            </div>
            <div class="form-group col-4 py-2">
                <label class="form-label">Rôle principal</label>
                <input name="characterName" type="text" class="form-control" id="characterName" value="">
            </div>
        </div>

        <hr>

        <div class="col-12 form-group py-2">
            <label for="url" class="form-label">Affiche du film*</label>
            </label>
            <div>
                <img src="" alt="Photo de ">
            </div>
            <input name="url" type="file" class="form-control ">
        </div>

        <div>
            <small>* champs obligatoires</small>
        </div>

        <div class="col-12 form-group py-2">
            <input class="w-100 btnCustom my-2" type="submit">
        </div>
    </form>
</section>

{/block}