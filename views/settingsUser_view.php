<section id="settingsUser" class="container py-5">
<h1>Gestion de compte</h1>
<div class="py-3"><a href="index.php?ctrl=user&action=user&id=" class="spanMovie">Votre Profil</a></div>
<!--Contenue bio pseudo Photo de profil -->
<div class="py-5">
     <h2>Profil Utilisateur</h2>
     <form method="post" class="row">
         <div class="col-12 col-sm-6 p-2">
             <label for="" class="form-label">Changez de pseudo</label>
             <input type="text" name="" value="" class="form-control">
         </div>
         <div class="col-12 col-sm-6 p-2">
             <label for="" class="form-label">Changez de Bio</label>
             <textarea name="" id="" placeholder="Bio Utilisateur" class="form-control"></textarea>
         </div>
         <div class="col-12 p-2">
             <label class="form-label">Photo de profil</label>

             <input type="file" class="form-control" accept="image/*">
         </div>
         <button type="submit" class="btnCustom py-3">Enregistrer</button>
     </form>
</div>
<!--Contenue mail mots de passe -->
<div class="py-5">
     <h2>Sécurité</h2>
     <form method="post" class="row">
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
             <a href="index.php?ctrl=user&action=delete" class="nav-link">
                 Supprimer votre compte
             </a>
         </div>
     </div>
</div>

</section>
