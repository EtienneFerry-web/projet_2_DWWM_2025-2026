<?php
/* Smarty version 5.8.0, created on 2026-02-26 19:46:01
  from 'file:views/user_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_69a0a2f9b4ae51_89415751',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3e6204db2b3faf8be3c5c8ed5d2082aa044c08c2' => 
    array (
      0 => 'views/user_view.tpl',
      1 => 1772135159,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/_partial/likeUser.tpl' => 1,
    'file:views/_partial/reviewMovie.tpl' => 1,
  ),
))) {
function content_69a0a2f9b4ae51_89415751 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_138980519969a0a2f9b2cf91_77573091', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_30974298969a0a2f9b2e835_21846796', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_176391878769a0a2f9b2f748_05628784', "css_variation");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_63425746469a0a2f9b30477_29323887', "content");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_195308448369a0a2f9b4a3e4_37766389', "js");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_138980519969a0a2f9b2cf91_77573091 extends \Smarty\Runtime\Block
{
public $prepend = 'true';
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Ajouter un film<?php
}
}
/* {/block "title"} */
/* {block "description"} */
class Block_30974298969a0a2f9b2e835_21846796 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Ici vous pouvez ajouter un film !<?php
}
}
/* {/block "description"} */
/* {block "css_variation"} */
class Block_176391878769a0a2f9b2f748_05628784 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide-core.min.css">
    <link rel="stylesheet" href="/Projet2/assets/css/slideMovie.css">
<?php
}
}
/* {/block "css_variation"} */
/* {block "content"} */
class Block_63425746469a0a2f9b30477_29323887 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>


    <section id="user" class="container py-2">
        <div class="col-12 row text-center align-items-center text-md-start py-2 mx-auto">
            <div class="col-6 col-md-3 col-lg-2 mx-auto ">
                <img src="assets/img/users/<?php echo $_smarty_tpl->getValue('objUser')->getPhoto();?>
" alt="image de profil" class="img-fluid">
            </div>
            <div class="col-12 col-md-9 col-lg-10 ">
                <div class="row">
                    <div class="col-10">
                        <h1><?php echo $_smarty_tpl->getValue('objUser')->getPseudo();?>
</h1>
                        <p><?php echo $_smarty_tpl->getValue('objUser')->getBio();?>
</p>
                    </div>
                    <div class="col-2">
                        <div class="row">
                            <p><?php echo $_smarty_tpl->getValue('objStat')->getUser_liked();?>
 likes </p>
                            <p><?php echo $_smarty_tpl->getValue('objStat')->getNbComments();?>
 comments</p>
                        </div>
                    </div>

                </div>
                <div class="row align-items-center g-2">
                    <div class="col-auto">
                        <span class="spanMovie border-0">
                            <?php echo $_smarty_tpl->getValue('objUser')->getFunction();?>

                            <?php if ($_SESSION['user']['user_id'] == $_smarty_tpl->getValue('objUser')->getID()) {?>
                                <a href="index.php?ctrl=user&action=permissions"
                                    class="btn btn-outline-secondary rounded-circle mx-2" data-bs-toggle="tooltip"
                                    data-bs-placement="right" data-bs-title="Consulter mes droits">?</a>
                            <?php }?>
                        </span>

                    </div>


                    <?php if ((true && (true && null !== ($_SESSION['user'] ?? null))) && $_SESSION['user']['user_id'] == $_GET['id']) {?>
                        <div class="col-auto ms-auto">
                            <a href="index.php?ctrl=user&action=settingsUser"
                                class="btn btn-outline-primary btn-sm d-flex align-items-center gap-1">
                                <i class="bi bi-gear fs-5"></i><span>Gestion du compte</span>
                            </a>
                        </div>
                    <?php }?>

                    <?php if ((true && (true && null !== ($_SESSION['user'] ?? null))) && $_SESSION['user']['user_id'] == $_GET['id'] && $_SESSION['user']['user_funct_id'] != 1) {?>
                    <div class="col-auto">
                        <a href="index.php?ctrl=admin&action=dashboard"
                            class="btn btn-outline-dark btn-sm d-flex align-items-center gap-1">
                            <i class="bi bi-speedometer2 fs-5"></i><span>Dashboard</span>
                        </a>
                    </div>
                <?php } elseif ((true && (true && null !== ($_SESSION['user'] ?? null))) && $_SESSION['user']['user_id'] != $_GET['id']) {?>
                    <div class="col-auto ms-auto">
                        <?php if ($_smarty_tpl->getValue('objUser')->getReported() == 0) {?>
                            <button class="border-0 bg-transparent p-0" data-bs-toggle="modal" data-bs-target="#reportModal">
                                <?php if ($_smarty_tpl->getValue('objUser')->getReported() == 0) {?><i class="bi bi-flag fs-3"></i>
                                <?php } else { ?> <i class="bi bi-flag-fill fs-3"></i>
                                <?php }?>
                            </button>
                            <div class="modal fade" id="reportModal" tabindex="-1">
                                <div class="modal-dialog">
                                    <form method="POST" class="modal-content">

                                        <div class="modal-header border-0"">
                                <h5 class=" modal-title">Signaler : <?php echo $_smarty_tpl->getValue('objUser')->getPseudo();?>
 </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">
                                    <p>Pour que votre signalement soit prit en charge veuillez renseigner la raison !
                                    </p>
                                    <textarea name="repUser" class="form-control"
                                        placeholder="Raison du signalement..."></textarea>
                                </div>

                                <div class="modal-footer border-0 mx-auto">
                                    <button type="button" class="btn btn-outline-dark px-3"
                                        data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-outline-success px-3">Valider</button>
                                </div>

                            </form>
                        </div>
                    </div>
                    <?php } else { ?>
                    <button class="border-0 bg-transparent p-0" data-bs-toggle="modal" data-bs-target="#reportModal">
                        <?php if ($_smarty_tpl->getValue('objUser')->getReported() == 0) {?><i class="bi bi-flag fs-3"></i><?php } else { ?> <i
                            class="bi bi-flag-fill fs-3"></i><?php }?>
                    </button>
                    <div class="modal fade" id="reportModal" tabindex="-1">
                        <div class="modal-dialog">
                            <form method="POST" class="modal-content">

                                <div class="modal-header border-0"">
                                                                                                        <h5 class="
                                    modal-title">
                                            Signaler :
                                            <?php echo $_smarty_tpl->getValue('objUser')->getPseudo();?>

                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <div class="modal-body">
                                            <p>Voulez-vous vraiment supprimer votre signalement ?</p>
                                        </div>

                                        <div class="modal-footer border-0 mx-auto">
                                            <button type="button" class="btn btn-outline-dark px-3"
                                                data-bs-dismiss="modal">Annuler</button>
                                            <button type="submit" name="repDelete" value="delete"
                                                class="btn btn-outline-danger px-3">Supprimer</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>

    <div class="col-12 py-2">
        <div class="like py-3 col-12">
            <span class="spanMovie d-block col-12">Films Likés</span>
            <div class="splide py-2">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrMovieToDisplay'), 'objLike');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('objLike')->value) {
$foreach0DoElse = false;
?>
                            <?php $_smarty_tpl->renderSubTemplate("file:views/_partial/likeUser.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
                        <?php
}
if ($foreach0DoElse) {
?>
                            <h3 class="mx-auto py-2">Cet utilisateur ne posséde aucun like !</h3>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="review" class="container text-center">
    <h2>Vos review / <?php echo $_smarty_tpl->getValue('objUser')->getPseudo();?>
</h2>
    <div class="col-12 col-md-10 mx-auto py-1 scrollList">
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrCommentToDisplay'), 'review');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('review')->value) {
$foreach1DoElse = false;
?>
            <?php $_smarty_tpl->renderSubTemplate("file:views/_partial/reviewMovie.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
        <?php
}
if ($foreach1DoElse) {
?>
            <div class="col-12 text-center py-3">
                <h3 class="border-0">Cet Utilisateur n'a pas de review</h3>
            </div>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </div>
</section>


<?php
}
}
/* {/block "content"} */
/* {block "js"} */
class Block_195308448369a0a2f9b4a3e4_37766389 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

    <?php echo '<script'; ?>

        src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.5.3/dist/js/splide-extension-auto-scroll.min.js">
    <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/Projet2/assets/js/moviePage.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/Projet2/assets/js/comment.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/Projet2/assets/js/star.js"> <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/Projet2/assets/js/permission.js"> <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "js"} */
}
