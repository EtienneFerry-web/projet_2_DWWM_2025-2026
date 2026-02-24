<?php
/* Smarty version 5.7.0, created on 2026-02-20 08:33:54
  from 'file:views/movie_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_69981c726c7b27_63407135',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '40fa910ff3b0fd748d72b302f743967591aaff39' => 
    array (
      0 => 'views/movie_view.tpl',
      1 => 1771511477,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/_partial/commentMovie.tpl' => 1,
  ),
))) {
function content_69981c726c7b27_63407135 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_100988827769981c725a0438_26160573', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_148958876369981c725b04c1_77703411', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_166403091769981c725b6d18_23885883', "css_variation");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_184862317069981c725bd0a1_61329850', "content");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_15956630769981c726c31f0_26635910', "js");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_100988827769981c725a0438_26160573 extends \Smarty\Runtime\Block
{
public $prepend = 'true';
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
echo $_smarty_tpl->getValue('objMovie')->getTitle();
}
}
/* {/block "title"} */
/* {block "description"} */
class Block_148958876369981c725b04c1_77703411 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>
bienvenue sur notre accueil !!!!<?php
}
}
/* {/block "description"} */
/* {block "css_variation"} */
class Block_166403091769981c725b6d18_23885883 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide-core.min.css">
<link rel="stylesheet" href="/Projet2/assets/css/slideMovie.css">
<?php
}
}
/* {/block "css_variation"} */
/* {block "content"} */
class Block_184862317069981c725bd0a1_61329850 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>

<section class="container row mx-auto" id="movie">
    <div class="col-12 col-md-4 py-1 py-md-5 text-center">
        <h1 class="d-block d-md-none"><?php echo $_smarty_tpl->getValue('objMovie')->getTitle();?>
</h1>
        <img src="<?php echo $_smarty_tpl->getValue('objMovie')->getPhoto();?>
" alt="" class="img-fluid w-75 w-md-50">
        <div class="py-3 text-center w-75 w-md-50 mx-auto">
        <span class="pageMovieNote spanMovie" data-note="<?php echo $_smarty_tpl->getValue('objMovie')->getRating();?>
">
            <span class="stars d-inline-block"></span>
            <span class="note d-inline-block" id="average" ><?php echo $_smarty_tpl->getValue('objMovie')->getRating();?>
</span>
        </span>
        <span class="movieLikes py-2 d-flex gap-1 spanMovie justify-content-center border-0 bg-transparent w-100 p-0 text-reset"><i class="bi bi-heart-fill me-1"></i> <?php echo $_smarty_tpl->getValue('objMovie')->getLike();?>
</span>
    </div>
</div>
<div class="col-12 col-md-8 py-3 py-md-5 text-center text-md-start">
    <h1 class="d-md-block d-none mb-3"><?php echo $_smarty_tpl->getValue('objMovie')->getTitle();?>
</h1>

    <div class="mb-3">
        <span class="spanMovie d-block py-1"><strong>Durée :</strong> <?php echo $_smarty_tpl->getValue('objMovie')->getLength();?>
</span>
        <span class="spanMovie d-block py-1"><strong>Date de sortie :</strong> <?php echo $_smarty_tpl->getValue('objMovie')->getDateFormat();?>
</span>
        <span class="spanMovie d-block py-1"><strong>Pays :</strong> <?php echo $_smarty_tpl->getValue('objMovie')->getCountry();?>
</span>
    </div>

    <p class="px-2 px-md-0 mb-4"><?php echo $_smarty_tpl->getValue('objMovie')->getDescription();?>
</p>

    <div class="py-3 py-md-4">
        <h3 class="mb-3">Casting</h3>
        <div class="row g-2 justify-content-center justify-content-md-start">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrPersToDisplay'), 'objPerson');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('objPerson')->value) {
$foreach0DoElse = false;
?>
                <div class="col-6 col-sm-4 col-md-3">
                    <a class="spanMovie d-block text-truncate" href="index.php?ctrl=person&action=person&id=<?php echo $_smarty_tpl->getValue('objPerson')->getId();?>
">
                        <?php echo $_smarty_tpl->getValue('objPerson')->getFullName();?>

                    </a>
                </div>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </div>
    </div>

    <div class="d-flex flex-wrap align-items-center gap-3 justify-content-center justify-content-md-start mb-4">
        <a href="<?php echo $_smarty_tpl->getValue('objMovie')->getTrailer();?>
" target="_blank" class="spanMovie link">Voir le trailer &#8599;</a>
        <a id="shareMovie" class="spanMovie link" style="cursor:pointer;">Partager &#8599;</a>
    </div>

    <hr class="d-md-none my-4 opacity-25">

    <?php if ((true && (true && null !== ($_SESSION['user'] ?? null)))) {?>
    <div class="row g-3 justify-content-center justify-content-md-start align-items-center">
        <div class="col-12 col-sm-auto">
            <form method="POST">
                <input type="hidden" name="likeMovieBtn" value="<?php echo $_smarty_tpl->getValue('objMovie')->getId();?>
">
                <button type="submit" class="movieLikes d-flex align-items-center gap-2 spanMovie border-0 bg-transparent p-0 mx-auto mx-md-0" style="cursor: pointer;">
                    Liker : <?php if ($_smarty_tpl->getValue('objMovie')->getUser_liked()) {?><i class="bi bi-heart-fill fs-4"></i><?php } else { ?> <i class="bi bi-heart fs-4"></i><?php }?>
                </button>
            </form>
        </div>

        <div class="col-12 col-sm-auto">
            <form method="post">
                <div class="rating user-select-none d-flex align-items-center justify-content-center justify-content-md-start gap-1">
                    <span class="spanMovie me-2">Votre Note :</span>
                    <i class="bi bi-star fs-4" data-value="1"></i>
                    <i class="bi bi-star fs-4" data-value="2"></i>
                    <i class="bi bi-star fs-4" data-value="3"></i>
                    <i class="bi bi-star fs-4" data-value="4"></i>
                    <i class="bi bi-star fs-4" data-value="5"></i>
                    <input type="hidden" name="rating" id="note" value="<?php echo $_smarty_tpl->getValue('objMovie')->getNoteUser();?>
" class="form-control <?php if ((true && (true && null !== ($_smarty_tpl->getValue('arrError')['noteRating'] ?? null)))) {?> is-invalid <?php }?>">
                </div>
            </form>
        </div>
    </div>


    <div class="mt-4">
        <button class="border-0 bg-transparent p-0" data-bs-toggle="modal" data-bs-target="#reportModal" title="Signaler">
            <?php if ($_smarty_tpl->getValue('objMovie')->getReported() == 0) {?>
                <i class="bi bi-flag fs-3"></i>
            <?php } else { ?>
                <i class="bi bi-flag-fill fs-3"></i>
            <?php }?>
        </button>
    </div>
<?php }?>
    <div class="modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="POST" class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Signaler : <?php echo $_smarty_tpl->getValue('objMovie')->getTitle();?>
</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body text-center text-md-start">
                    <?php if ($_smarty_tpl->getValue('objMovie')->getReported() == 0) {?>
                        <p>Pour que votre signalement soit pris en charge, veuillez renseigner la raison :</p>
                        <textarea name="repMovie" class="form-control" rows="4" placeholder="Raison du signalement..."></textarea>
                    <?php } else { ?>
                        <p>Voulez-vous vraiment supprimer votre signalement ?</p>
                    <?php }?>
                </div>

                <div class="modal-footer border-0 justify-content-center">
                    <button type="button" class="btn btn-outline-dark px-4" data-bs-dismiss="modal">Annuler</button>
                    <?php if ($_smarty_tpl->getValue('objMovie')->getReported() == 0) {?>
                        <button type="submit" class="btn btn-outline-success px-4">Valider</button>
                    <?php } else { ?>
                        <button type="submit" name="repDelete" value="delete" class="btn btn-outline-danger px-4">Supprimer</button>
                    <?php }?>
                </div>
            </form>
        </div>
    </div>
</div>
</section>

<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('arrImagesToDisplay')) > 0) {?>
<section  id="imgMovie" class="container py-5 text-center">
    <h2>Image du film</h2>
    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('arrImagesToDisplay')) < 20 && (true && (true && null !== ($_SESSION['user'] ?? null)))) {?>
    <form method="post" class="row text-center" enctype="multipart/form-data">
        <div class="col-10 p-2 mx-auto">
            <input type="file" class="form-control" accept="image/*" name="images">
        </div>
        <button type="submit" class="btnCustom py-2 col-10 mx-auto">Enregistrer</button>
    </form>
    <?php }?>
    <div class="splide">
      <div class="splide__track">
        <ul class="splide__list">
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrImagesToDisplay'), 'objImage');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('objImage')->value) {
$foreach1DoElse = false;
?>
            <li class="splide__slide">
                <img src="assets/img/movie/<?php echo $_smarty_tpl->getValue('objImage')->getPhoto();?>
" />
            </li>
          <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </ul>
      </div>
    </div>
</section>
<?php }
if ($_smarty_tpl->getValue('curDate')->format('Y-m-d') >= $_smarty_tpl->getValue('objMovie')->getRelease_date()) {
if ((true && (true && null !== ($_SESSION['user'] ?? null)))) {?>
    <section id="addComment" class="container text-center py-5">
        <h2>Avis</h2>
        <div class="text-start py-2">
            <form method="post">
                <div class="py-2">
                    <label for="comment" class="form-label fw-bold">Donnez votre avis</label>
                    <textarea
                        id="comment"
                        name="com_comment"
                        class="form-control <?php if ((true && (true && null !== ($_smarty_tpl->getValue('arrError')['com_comment'] ?? null)))) {?> is-invalid <?php }?>"
                        rows="4"
                        placeholder="Écrivez votre commentaire..."
                    ></textarea>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-8 rating user-select-none text-center text-md-start py-2">
                        <span class="spanMovie">Votre Note :
                        <!--Data value for ,5 with double click-->
                        <i class="bi bi-star" data-value="1"></i>
                        <i class="bi bi-star" data-value="2"></i>
                        <i class="bi bi-star" data-value="3"></i>
                        <i class="bi bi-star" data-value="4"></i>
                        <i class="bi bi-star" data-value="5"></i>
                        </span>
                        <!--input value for rating score-->
                        <input type="hidden" name="rating" id="note" value="<?php echo $_smarty_tpl->getValue('objMovie')->getNoteUser();?>
" class="form-control <?php if ((true && (true && null !== ($_smarty_tpl->getValue('arrError')['noteRating'] ?? null)))) {?> is-invalid <?php }?>">

                    </div>
                    <div class="col-md-4 mw-100 " >
                        <!--On click verify if ratings value > NULL & comment can be empty-->
                        <input type="submit" value="Envoyer" class="btnCustom w-100">
                    </div>
                </div>
            </form>
        </div>

    </section>
     <?php }?>
    <section id="userComment" class="container py-5">
        <h3 class="py-3">Avis utilisateur</h3>
        <div class="allComment">
                <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('arrCommentToDisplay')) === 0) {?>
                    <h3 class='text-center py-3'>aucun commentaire</h3>
                <?php } else { ?>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrCommentToDisplay'), 'comment');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('comment')->value) {
$foreach2DoElse = false;
?>
                        <?php $_smarty_tpl->renderSubTemplate("file:views/_partial/commentMovie.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                <?php }?>
        </div>
    </section>
<?php } else { ?>
    <section class="container text-center py-3">
        <h2>Les commentaire ne sont pas disponible</h2>
        <p class="mx-auto">Les commentaire seront disponible lorsque le film sera sortie!</p>
    </section>

<?php }
}
}
/* {/block "content"} */
/* {block "js"} */
class Block_15956630769981c726c31f0_26635910 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>

    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.5.3/dist/js/splide-extension-auto-scroll.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/Projet2/assets/js/moviePage.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/Projet2/assets/js/star.js"> <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "js"} */
}
