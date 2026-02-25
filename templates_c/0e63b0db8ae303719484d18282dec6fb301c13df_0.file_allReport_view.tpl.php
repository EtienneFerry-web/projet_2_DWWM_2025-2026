<?php
/* Smarty version 5.7.0, created on 2026-02-20 12:11:46
  from 'file:views/allReport_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_69984f8256e206_32145642',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0e63b0db8ae303719484d18282dec6fb301c13df' => 
    array (
      0 => 'views/allReport_view.tpl',
      1 => 1771511477,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69984f8256e206_32145642 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_28861553669984f82485c78_28209108', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_188210842769984f82491462_70047428', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_68075304969984f82497a20_85877107', "css_variation");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_3669085769984f824a0738_92263279', "content");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_132399545169984f825699d1_16012315', "js");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_28861553669984f82485c78_28209108 extends \Smarty\Runtime\Block
{
public $prepend = 'true';
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>
Dashboard - Signalements<?php
}
}
/* {/block "title"} */
/* {block "description"} */
class Block_188210842769984f82491462_70047428 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
}
}
/* {/block "description"} */
/* {block "css_variation"} */
class Block_68075304969984f82497a20_85877107 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/Projet2/assets/css/style.css">
<?php
}
}
/* {/block "css_variation"} */
/* {block "content"} */
class Block_3669085769984f824a0738_92263279 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>


<section id="dashboard" class="container py-5">

        <h1>DashBoard</h1>
        <nav class="py-2 row g-2">
            <div class="py-2 row g-2">
                <a id="user" href="index.php?ctrl=admin&action=dashboard" class="nav-link col-2">Home</a>
                <a id="user" href="index.php?ctrl=user&action=allUser" class="nav-link col-2">Utilisateurs</a>
                <a id="addMovie" href="index.php?ctrl=movie&action=allMovie" class="nav-link col-2">Films</a>
                <a id="person" href="index.php?ctrl=person&action=allPerson" class="nav-link col-2">Célébrités</a>
                <a id="report" href="index.php?ctrl=report&action=allReport" class="nav-link col-2  active">Signalement</a>
            </div>
        </nav>


    <h2 class="mb-4 py-2">Gestion des Signalements</h2>

    <section class="mb-5">
        <h3 class="h4"><i class="bi bi-chat-left-text me-2"></i>Signalements : Commentaires</h3>
        <div class="container-fluid p-3">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrRepComToDisplay'), 'objReport');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('objReport')->value) {
$foreach0DoElse = false;
?>
                <form method="post" class="row border-bottom py-3 align-items-center">
                    <div class="col-md-1 fw-bold">#<?php echo $_smarty_tpl->getValue('objReport')->getId();?>
</div>
                    <div class="col-md-3 d-flex align-items-center">
                        <a class="text-decoration-none text-dark d-flex align-items-center" href="index.php?ctrl=user&action=user&id=<?php echo $_smarty_tpl->getValue('objReport')->getReportedUserId();?>
">
                            <img src="assets/img/<?php echo $_smarty_tpl->getValue('objReport')->getPhoto();?>
" class="rounded-circle border me-2" style="width: 40px; height: 40px; object-fit: cover;" alt="Photo de profil">
                            <span class="fw-bold"><?php echo $_smarty_tpl->getValue('objReport')->getPseudo();?>
</span>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <p class="m-0 fw-bold">Raison: <?php echo $_smarty_tpl->getValue('objReport')->getReason();?>
</p>
                        <p class="m-0 ">Commentaire: <?php echo $_smarty_tpl->getValue('objReport')->getComContent();?>
</p>
                    </div>
                    <div class="col-md-4 d-flex justify-content-end align-items-center gap-2">
                        <button type="submit" name="addRemoveSpoiler" value="<?php echo $_smarty_tpl->getValue('objReport')->getReportedComId();?>
" class="btn btn-outline-warning btn-sm"><?php if ($_smarty_tpl->getValue('objReport')->getSpoiler() == 0) {?> Add Spoiler <?php } else { ?> Remove Spoiler <?php }?></button>
                        <button type="submit" name="deleteComment" value="<?php echo $_smarty_tpl->getValue('objReport')->getReportedComId();?>
" class="btn btn-outline-danger btn-sm">Supprimer</button>
                        <button type="submit" name="deleteRep" value="<?php echo $_smarty_tpl->getValue('objReport')->getId();?>
" class="btn btn-outline-success btn-sm px-3">Valider</button>
                    </div>
                </form>
            <?php
}
if ($foreach0DoElse) {
?>
                <p class="text-muted py-3 m-0">Aucun signalement de commentaire.</p>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </div>
    </section>

    <section class="mb-5">
        <h3 class="h4"><i class="bi bi-people me-2"></i>Signalements : Utilisateurs</h3>
        <div class="container-fluid p-3">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrRepUserToDisplay'), 'objReport');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('objReport')->value) {
$foreach1DoElse = false;
?>
                <form method="post" class="row border-bottom py-3 align-items-center">
                    <div class="col-md-1 fw-bold">#<?php echo $_smarty_tpl->getValue('objReport')->getReportedUserId();?>
</div>
                    <div class="col-md-3 d-flex align-items-center">
                        <a class="text-decoration-none text-dark d-flex align-items-center" href="index.php?ctrl=user&action=user&id=<?php echo $_smarty_tpl->getValue('objReport')->getReportedUserId();?>
">
                            <img src="assets/img/<?php echo (($tmp = $_smarty_tpl->getValue('objReport')->getPhoto() ?? null)===null||$tmp==='' ? 'default-user.png' ?? null : $tmp);?>
"
                                class="rounded-circle border me-2"
                                style="width: 40px; height: 40px; object-fit: cover;" alt="Photo de profil">
                            <span class="fw-bold text-dark"><?php echo $_smarty_tpl->getValue('objReport')->getPseudoUser();?>
</span>
                        </a>
                    </div>
                    <p class="col-md-4 m-0 fw-bold">Raison: <?php echo $_smarty_tpl->getValue('objReport')->getReason();?>
</p>
                    <div class="col-md-4 d-flex justify-content-end gap-2">
                        <div class="btn-group">
                            <button type="banUser" value="1" class="btn btn-outline-warning btn-sm">15 J</button>
                            <button type="banUser" value="2" class="btn btn-outline-warning btn-sm">30 J</button>
                        </div>
                        <button type="submit" name="banUser" value="3" class="btn btn-outline-danger btn-sm">Bannir</button>
                        <button type="submit" name="deleteRep" value="<?php echo $_smarty_tpl->getValue('objReport')->getId();?>
" class="btn btn-outline-success btn-sm px-3">Valider</button>
                    </div>
                </form>
            <?php
}
if ($foreach1DoElse) {
?>
                <p class="text-muted py-3 m-0">Aucun signalement d'utilisateur en attente.</p>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </div>
    </section>

    <section class="mb-5">
        <h3 class="h4"><i class="bi bi-film me-2"></i>Signalements : Films</h3>
        <div class="container-fluid p-3">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrRepMovieToDisplay'), 'objReport');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('objReport')->value) {
$foreach2DoElse = false;
?>
                <form method="post" class="row border-bottom py-3 align-items-center">
                    <div class="col-md-1 fw-bold">#<?php echo $_smarty_tpl->getValue('objReport')->getReportedMovieId();?>
</div>
                    <div class="col-md-3 d-flex align-items-center">
                        <span class="fw-bold"><?php echo $_smarty_tpl->getValue('objReport')->getTitle();?>
</span>
                    </div>
                    <p class="col-md-4 m-0 fw-bold">Raison: <?php echo $_smarty_tpl->getValue('objReport')->getReason();?>
</p>
                    <div class="col-md-4 d-flex justify-content-end gap-2">
                         <a href="index.php?ctrl=movie&action=deleteMovie&id=<?php echo $_smarty_tpl->getValue('objReport')->getReportedMovieId();?>
" class="btn btn-outline-danger btn-sm px-3" onclick="return confirm('Vous allez supprimer le film <?php echo strtr((string)$_smarty_tpl->getValue('objReport')->getTitle(), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", 
						"\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S",
						"`" => "\\`", "\${" => "\\\$\{"));?>
')">Supprimer</a>
                         <a href="" class="btn btn-sm btn-outline-dark px-3">Modifier</a>
                         <button type="submit" name="deleteRep" value="<?php echo $_smarty_tpl->getValue('objReport')->getId();?>
" class="btn btn-outline-success btn-sm px-3">Valider</button>
                    </div>
                </form>
            <?php
}
if ($foreach2DoElse) {
?>
                 <p class="text-muted py-3 m-0">Aucun signalement de film.</p>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </div>
    </section>
</section>
<?php
}
}
/* {/block "content"} */
/* {block "js"} */
class Block_132399545169984f825699d1_16012315 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>

    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block "js"} */
}
