{extends file="views/layout_view.tpl"}
{block name="title" prepend}Ajouter un film{/block}
{block name="description"}Ici vous pouvez ajouter un film !{/block}

{block name="css_variation"}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="stylesheet" href="/Projet2/assets/css/style.css">
{/block}

{block name="content"}
<section id="dashboard" class="container py-5">
    <h1>DashBoard</h1>
    <div class="py-2 container row col-12 col-lg-auto">
        <div id="user"  class="nav-link col-2">Utilisateur</div>
        <div id="addMovie"  class="nav-link col-2">Fiche Flim</div>
        <div id="report"  class="nav-link col-2">Utilisateur Signaler</div>
    </div>
    <a href="index.php" class="homeBtn"><i class="bi bi-house-fill fs-1"></i></a>
    <div id="ficheMovie" class="d-none">
        <h2>Fiche Film</h2>
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
    </div>
    <div id="listUser" class="d-block">
        <h2>Tous Les Utilisateur</h2>
            <form class="row g-1 align-items-center py-3 ">
                <div class="col-12 col-md-5 p-0">
                    <input class="form-control " type="search" placeholder="Rechercher..." name="search" value="">
                </div>

                <div class="col-12 col-md-5 p-0">
                    <select class="form-select">
                        <option value="">Tous Les Grade</option>
                        <option value="usa">Croissant</option>
                        <option value="france">Decroissant</option>
                    </select>
                </div>
                <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                    Recherche
                </button>
            </form>
            <div class="allUser">
                <form class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2 col-md-auto">
                        <span class="spanMovie">1</span>
                    </div>
                    <div class="col-3 col-md-1">
                        <span class="spanMovie">Pseudo</span>
                    </div>
                    <!-- Grade -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Restriction</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Restriction -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Grade</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                        Valider
                    </button>
                </form>
                <form class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2 col-md-auto">
                        <span class="spanMovie">1</span>
                    </div>
                    <div class="col-3 col-md-1">
                        <span class="spanMovie">Pseudo</span>
                    </div>
                    <!-- Grade -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Restriction</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Restriction -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Grade</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                        Valider
                    </button>
                </form>
                <form class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2 col-md-auto">
                        <span class="spanMovie">1</span>
                    </div>
                    <div class="col-3 col-md-1">
                        <span class="spanMovie">Pseudo</span>
                    </div>
                    <!-- Grade -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Restriction</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Restriction -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Grade</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                        Valider
                    </button>
                </form>
                <form class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2 col-md-auto">
                        <span class="spanMovie">1</span>
                    </div>
                    <div class="col-3 col-md-1">
                        <span class="spanMovie">Pseudo</span>
                    </div>
                    <!-- Grade -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Restriction</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Restriction -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Grade</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                        Valider
                    </button>
                </form>
                <form class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2 col-md-auto">
                        <span class="spanMovie">1</span>
                    </div>
                    <div class="col-3 col-md-1">
                        <span class="spanMovie">Pseudo</span>
                    </div>
                    <!-- Grade -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Restriction</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Restriction -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Grade</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                        Valider
                    </button>
                </form>
                <form class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2 col-md-auto">
                        <span class="spanMovie">1</span>
                    </div>
                    <div class="col-3 col-md-1">
                        <span class="spanMovie">Pseudo</span>
                    </div>
                    <!-- Grade -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Restriction</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Restriction -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Grade</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                        Valider
                    </button>
                </form>
                <form class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2 col-md-auto">
                        <span class="spanMovie">1</span>
                    </div>
                    <div class="col-3 col-md-1">
                        <span class="spanMovie">Pseudo</span>
                    </div>
                    <!-- Grade -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Restriction</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Restriction -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Grade</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                        Valider
                    </button>
                </form>
                <form class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2 col-md-auto">
                        <span class="spanMovie">1</span>
                    </div>
                    <div class="col-3 col-md-1">
                        <span class="spanMovie">Pseudo</span>
                    </div>
                    <!-- Grade -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Restriction</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Restriction -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Grade</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                        Valider
                    </button>
                </form>
                <form class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2 col-md-auto">
                        <span class="spanMovie">1</span>
                    </div>
                    <div class="col-3 col-md-1">
                        <span class="spanMovie">Pseudo</span>
                    </div>
                    <!-- Grade -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Restriction</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Restriction -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Grade</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                        Valider
                    </button>
                </form>
                <form class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2 col-md-auto">
                        <span class="spanMovie">1</span>
                    </div>
                    <div class="col-3 col-md-1">
                        <span class="spanMovie">Pseudo</span>
                    </div>
                    <!-- Grade -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Restriction</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Restriction -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Grade</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                        Valider
                    </button>
                </form>
                <form class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2 col-md-auto">
                        <span class="spanMovie">1</span>
                    </div>
                    <div class="col-3 col-md-1">
                        <span class="spanMovie">Pseudo</span>
                    </div>
                    <!-- Grade -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Restriction</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Restriction -->
                    <div class="col-12 col-md-4">
                      <div class="row g-2 align-items-center">
                        <!-- Label prend juste sa largeur -->
                        <label class="col-auto col-form-label spanMovie">Grade</label>
                        <!-- Select prend le reste -->
                        <div class="col">
                          <select class="form-select">
                            <option value="tous">Tous</option>
                            <option value="admin">Admin</option>
                            <option value="user">Utilisateur</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                        Valider
                    </button>
                </form>
            </div>
        <div>
    </div>
    </div>
    <div id="allReport" class="d-none">
        <h2>Les Signalement</h2>

    </div>
</section>
{/block}

{block name="js"}
  <script src="assets/js/dasboard.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
{/block}