{extends file="views/layout_view.tpl"}
{block name="title" prepend}Modifier un utilisateur{/block}
{block name="description"}Ici vous pouvez ajouter un film !{/block}
{block name="content"}
<section id="settingsUser" class="container py-5">
<h1>Gestion de l'utilisateur</h1>
<!--Contenue bio pseudo Photo de profil -->
<div class="py-5">
     <h2>Profil Utilisateur</h2>
     <form method="post" enctype="multipart/form-data" class="row">
        <div class="form-group py-2">
            <label  class="form-label">Changer le prenom :</label>
            <input  type="text"
                    name="firstname"
                    class="form-control {if (isset($arrError['firstname']))} is-invalid {/if}"  
                    value="{$objUser->getFirstname()}"
                    placeholder="Prenom">
        </div>
        <div class="form-group py-2">
            <label  class="form-label">Changez le nom :</label>
            <input  type="text"
                    name="name"
                    class="form-control {if (isset($arrError['name']))} is-invalid {/if}"  
                    value="{$objUser->getName()}"
                    placeholder="Nom">
        </div>
          <div class="form-group py-2">
             <label for="" class="form-label">Changer le pseudo</label>
             <input type="text" 
                    name="pseudo"  
                    value="{$objUser->getPseudo()}" 
                    class="form-control {if (isset($arrError['pseudo']))} is-invalid {/if}">
         </div>
          <div class="form-group py-2">
             <label for="" class="form-label">Changer la Bio</label>
             <textarea  name="bio" 
                        placeholder="Bio Utilisateur"
                        class="form-control {if (isset($arrError['bio']))} is-invalid {/if}">{$objUser->getBio()}</textarea>
         </div>
         <div class="col-12 p-2">
            <label class="form-label">Modifier la photo de profil</label>
            <div class="mb-2">
                <img src="assets/img/users/{$objUser->getPhoto()}" alt="Photo de profil" style="max-width: 150px;">
            </div>
             <input     name="photo"
                        type="file" 
                        class="form-control {if (isset($arrError['photo'])) } is-invalid {/if}" 
                        >
         </div>
            <button type="submit" class="btnCustom py-3">Enregistrer</button>
    </form>
        
     </div>
</div>

</section>
{/block}