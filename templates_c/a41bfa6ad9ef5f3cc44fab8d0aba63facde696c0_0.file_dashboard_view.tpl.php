<?php
/* Smarty version 5.7.0, created on 2026-01-31 09:15:24
  from 'file:views/dashboard_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_697dc82cc624c6_06067598',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a41bfa6ad9ef5f3cc44fab8d0aba63facde696c0' => 
    array (
      0 => 'views/dashboard_view.tpl',
      1 => 1769850923,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697dc82cc624c6_06067598 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1532341279697dc82cc48e23_84412980', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_854611814697dc82cc4aa64_29510562', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1298068830697dc82cc4b914_57408844', "css_variation");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1995003699697dc82cc4c6c8_81506982', "content");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1060503929697dc82cc61562_15496188', "js");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_1532341279697dc82cc48e23_84412980 extends \Smarty\Runtime\Block
{
public $prepend = 'true';
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Dashboard<?php
}
}
/* {/block "title"} */
/* {block "description"} */
class Block_854611814697dc82cc4aa64_29510562 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
}
}
/* {/block "description"} */
/* {block "css_variation"} */
class Block_1298068830697dc82cc4b914_57408844 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="stylesheet" href="/Projet2/assets/css/style.css">
<?php
}
}
/* {/block "css_variation"} */
/* {block "content"} */
class Block_1995003699697dc82cc4c6c8_81506982 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

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
		
			<div class="row">
				<div class="col-6 form-group py-2">
					<label class="form-label">Titre du film*</label>
					<input 	name="title" 
							type="text" 
							class="form-control" 
							id="title" 
							placeholder="Titre" 
							value="<?php echo $_smarty_tpl->getValue('objContent')->getTitle();?>
"
							required>
				</div>
				<div class="col-md-6">
					<label for="categorie" class="form-label">Genre</label>
					<select class="form-control" id="categorie" name="categorie">
					<option value="0">Toutes les catégories</option>
					<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrResult'), 'arrDetCategory');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('arrDetCategory')->value) {
$foreach0DoElse = false;
?>
						<option class="form-control" value="<?php echo $_smarty_tpl->getValue('arrDetCategory')['cat_id'];?>
" 
							<?php if ((true && ($_smarty_tpl->hasVariable('objCategories') && null !== ($_smarty_tpl->getValue('objCategories') ?? null))) && $_smarty_tpl->getValue('objCategories')->getID() == $_smarty_tpl->getValue('arrDetCategory')['cat_id']) {?>selected<?php }?> 
						> 
							<?php echo $_smarty_tpl->getValue('arrDetCategory')['cat_name'];?>

						</option>
					<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>        
					</select>
				</div>

			
			
			<div class="form-group py-2">
                <label class="form-label">Date de sortie*</label>
                <input 	name="release_date" 
						type="date" 
						class="form-control" 
						id="release_date"  
						value="<?php echo $_smarty_tpl->getValue('objContent')->getCreatedate();?>

						placeholder="Quelle est la date de sortie du film?" 
						required>
            </div>
			
            <div class="form-group py-2">
                <label class="form-label">Titre original</label>
                <input 	name="original_title" 						
						type="text" 
						class="form-control" 
						id="original_title"
						value="<?php echo $_smarty_tpl->getValue('objContent')->getOriginalTitle();?>
"
						placeholder="">
            </div>
            <div class="form-group py-2">
                <label class="form-label">Durée*</label>
                <input 	name="length" 
						type="time" 
						class="form-control" 
						id="length"  
						value="<?php echo $_smarty_tpl->getValue('objContent')->getLength();?>
"
						placeholder="Email" 
						required>
            </div>
            <div class="form-group py-2">
                <label class="form-label" >Synopsis*</label>
                <textarea 	name="description" 	 
							class="form-control textarea" 
							id="description" 
							placeholder="Synopsis" 
							required><?php echo $_smarty_tpl->getValue('objContent')->getDescription();?>
</textarea>
            </div>            
			
			<hr>
			
			</div>
			<label class="form-label">Acteur principal*</label>
			<div class="row">
				<div class="form-group col-4 py-2">
					<label class="form-label">Nom</label>
					<input 	name="actorName" 
							type="text" 
							class="form-control <?php if ((true && (true && null !== ($_smarty_tpl->getValue('arrError')['actorName'] ?? null)))) {?>is-invalid<?php }?>" 
							id="actorName" 
							value="<?php echo $_smarty_tpl->getValue('strActorName');?>
"
							placeholder="Nom de l'acteur principal"
							required>
				</div>
				<div class="form-group col-4 py-2">
					<label for="actorFirstname" class="form-label">Prénom</label>
					<input 	name="actorFirstname" 
							type="text" 
							class="form-control <?php if ((true && (true && null !== ($_smarty_tpl->getValue('arrError')['actorFirstname'] ?? null)))) {?>is-invalid<?php }?>" 
							id="actorFirstname" 
							value="<?php echo $_smarty_tpl->getValue('strActorFirstname');?>
"
							placeholder="Nom de l'acteur principal"
							required>
				</div>
				<div class="form-group col-4 py-2">
					<label class="form-label">Rôle principal</label>
					<input 	name="characterName" 
							type="text" 
							class="form-control" 
							id="characterName" 
							value="<?php echo $_smarty_tpl->getValue('strCharacterName');?>
"
							placeholder="nom du personnage de l'acteur principal">
				</div>
			</div>
			
			<hr>
									
			<div class="form-group py-2">
                <label class="form-label">Affiche du film</label>
                <input name="url" type="text" class="form-control"  placeholder="Collez le lien vers l'image de l'affiche">
            </div>
		

            <input class="w-100 btnCustom my-2" type="submit" >
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
<?php
}
}
/* {/block "content"} */
/* {block "js"} */
class Block_1060503929697dc82cc61562_15496188 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

  <?php echo '<script'; ?>
 src="assets/js/dasboard.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block "js"} */
}
