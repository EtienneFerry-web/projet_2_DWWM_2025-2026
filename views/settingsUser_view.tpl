{extends file="views/layout_view.tpl"}
{block name="title" prepend}Ajouter un film{/block}
{block name="description"}Ici vous pouvez ajouter un film !{/block}
{block name="content"}
<section id="settingsUser" class="container py-5">
<h1>Gestion de compte</h1>
<<<<<<< HEAD
<div class="py-3"><a href="index.php?ctrl=user&action=user&id={$pseudo}" class="spanMovie">Votre Profil</a></div>
=======
<div class="py-3"><a href="index.php?ctrl=user&action=user&id={$smarty.session.user.user_id}" class="spanMovie"><i class="bi bi-arrow-left fs-1"></i></a></div>
>>>>>>> origin/main
<!--Contenue bio pseudo Photo de profil -->
<div class="py-5">
     <h2>Profil Utilisateur</h2>
     <form method="post" enctype="multipart/form-data" class="row">
         <div class="col-12 col-sm-6 p-2">
             <label for="" class="form-label">Changez de pseudo</label>
             <input type="text" name="pseudo" value="" class="form-control">
         </div>
         <div class="col-12 col-sm-6 p-2">
             <label for="" class="form-label">Changez de Bio</label>
             <textarea name="bio" id="" placeholder="Bio Utilisateur" class="form-control"></textarea>
         </div>
         <div class="col-12 p-2">
             <label class="form-label">Photo de profil</label>

             <input name="profile-picture"type="file" class="form-control {if (isset($arrError['img'])) } is-invalid {/if}" type="file" accept="image/*">
         </div>
<<<<<<< HEAD
         <button type="submit" class="btnCustom py-3">Enregistrer</button>
     </form>
</div>
<!--Contenue mail mots de passe -->
<div class="py-5">
     <h2>Sécurité</h2>
     <form method="post" class="row">
=======


     <h2 class="py-2">Sécurité</h2>

>>>>>>> origin/main
         <div class="col-12 col-sm-6 p-2">
             <label for="" class="form-label">Mots de Passe</label>
             <input type="text" name="" value="" class="form-control">
         </div>
         <div class="col-12 col-sm-6 p-2">
             <label for="" class="form-label">Adresse Email</label>
             <input name="" id="" placeholder="Email" class="form-control">
         </div>
         <button type="submit" class="btnCustom py-3">Enregistrer</button>
     </form>
     <div class="row justify-content-center mt-3">
         <div class="col-auto">
             <a href="index.php?ctrl=user&action=logout" class="nav-link">
                 Se déconnecter
             </a>
         </div>

         <div class="col-auto">
<<<<<<< HEAD
             <a href="index.php?ctrl=user&action=delete" class="nav-link">
                 Supprimer votre compte
             </a>
=======
             <form action="index.php?ctrl=user&action=deleteAccount" method="POST" class="nav-link col-auto"
      onsubmit="return confirm('Êtes-vous sûr ? C’est irréversible !');">
        <button type="submit" class="border-0 bg-transparent">
            Supprimer mon compte
        </button>
</form>
>>>>>>> origin/main
         </div>
     </div>
</div>

</section>
<<<<<<< HEAD
{/block}
=======
{/block}
>>>>>>> origin/main
