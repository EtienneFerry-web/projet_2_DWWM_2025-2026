<?php
/* Smarty version 5.7.0, created on 2026-02-13 20:48:28
  from 'file:views/movie_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_698f8e1cadfa44_99401659',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6c04460491494cb4da3f1370f66e49b0a7668a1b' => 
    array (
      0 => 'views/movie_view.tpl',
      1 => 1770990163,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/_partial/commentMovie.tpl' => 1,
  ),
))) {
function content_698f8e1cadfa44_99401659 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1069790998698f8e1cac3de1_30836657', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_392723297698f8e1cac71f9_62607430', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1171563788698f8e1cac89d6_97083809', "css_variation");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1060387450698f8e1caca292_30278139', "content");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_833422467698f8e1cadf005_37837780', "js");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_1069790998698f8e1cac3de1_30836657 extends \Smarty\Runtime\Block
{
public $prepend = 'true';
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
echo $_smarty_tpl->getValue('objMovie')->getTitle();
}
}
/* {/block "title"} */
/* {block "description"} */
class Block_392723297698f8e1cac71f9_62607430 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
bienvenue sur notre accueil !!!!<?php
}
}
/* {/block "description"} */
/* {block "css_variation"} */
class Block_1171563788698f8e1cac89d6_97083809 extends \Smarty\Runtime\Block
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
class Block_1060387450698f8e1caca292_30278139 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

<section class="container row mx-auto" id="movie">
    <div class="col-12 col-md-4 py-1 py-md-5 text-center">
        <h1 class="d-block d-md-none"><?php echo $_smarty_tpl->getValue('objMovie')->getTitle();?>
</h1>
        <img src="<?php echo $_smarty_tpl->getValue('objMovie')->getUrl();?>
" alt="" class="img-fluid w-75 w-md-50">
        <div class="py-3 text-center w-75 w-md-50 mx-auto">
        <span class="pageMovieNote spanMovie" data-note="<?php echo $_smarty_tpl->getValue('objMovie')->getRating();?>
">
            <span class="stars d-inline-block"></span>
            <span class="note d-inline-block"><?php echo $_smarty_tpl->getValue('objMovie')->getRating();?>
</span>
        </span>
        <form method="POST" class="d-inline">
            <input type="hidden" name="likeMovieBtn" value="<?php echo $_smarty_tpl->getValue('objMovie')->getId();?>
">
            
            <button type="submit" 
                    name=""
                    value=""
                    class="movieLikes py-2 d-flex gap-1 spanMovie justify-content-center border-0 bg-transparent w-100 p-0 text-reset" 
                    style="cursor: pointer;"
                    >
            <?php if ($_smarty_tpl->getValue('objMovie')->getUser_liked()) {?>
                <i class="bi bi-heart-fill"></i>
            <?php } else { ?>
                <i class="bi bi-heart"></i>
            <?php }?>
            <span><?php echo $_smarty_tpl->getValue('objMovie')->getLike();?>
</span>
            </button>
        </form>
</div>
</div>
    <div class="col-12 col-md-8 py-1 py-md-5 text-center text-md-start">
        <h1 class="d-md-block d-none"><?php echo $_smarty_tpl->getValue('objMovie')->getTitle();?>
</h1>
        <span class=" spanMovie d-block py-2"> Durée : <?php echo $_smarty_tpl->getValue('objMovie')->getLength();?>
</span>
        <span class=" spanMovie d-block py-2"> Date de sortie : <?php echo $_smarty_tpl->getValue('objMovie')->getDateFormat();?>
 </span>
        <p><?php echo $_smarty_tpl->getValue('objMovie')->getDescription();?>
</p>
        <div class="col-12 col-md-8 py-2 row" >

            <span class=" spanMovie d-block py-2"> Film : <?php echo $_smarty_tpl->getValue('objMovie')->getCountry();?>
</span>


            <div class="row col-12 py-4 text-center text-md-start">
                <h3>Casting</h3>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrPersToDisplay'), 'objPerson');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('objPerson')->value) {
$foreach0DoElse = false;
?>
                    <a class="spanMovie d-block col-4" href="index.php?ctrl=person&action=person&id=<?php echo $_smarty_tpl->getValue('objPerson')->getId();?>
"> <?php echo $_smarty_tpl->getValue('objPerson')->getFullName();?>
</a>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </div>
            <a href="<?php echo $_smarty_tpl->getValue('objMovie')->getTrailer();?>
" target="blank" class="py-2 spanMovie d-block link"> Voir le trailer &#8599;</a>
            <a id="shareMovie" class="py-2 spanMovie d-block link">Partager &#8599;</a>
        </div>
    </div>
</section>
<section  id="imgMovie" class="container py-5 text-center">
    <h2>Image du film</h2>
    <form method="post" class="row text-center">
        <div class="col-10 p-2 mx-auto">
            <input type="file" class="form-control" accept="image/*">
        </div>
        <button type="submit" class="btnCustom py-2 col-10 mx-auto">Enregistrer</button>
    </form>
    <div class="splide">
      <div class="splide__track">
        <ul class="splide__list">
          <li class="splide__slide">
            <img src="https://dummyimage.com/300x400/000/fff" />
          </li>
          <li class="splide__slide">
            <img src="https://dummyimage.com/500x400/555/fff" />
          </li>
          <li class="splide__slide">
            <img src="https://dummyimage.com/350x400/999/fff" />
          </li>
          <li class="splide__slide">
            <img src="https://dummyimage.com/350x400/999/fff" />
          </li>
          <li class="splide__slide">
            <img src="https://dummyimage.com/350x400/999/fff" />
          </li>
          <li class="splide__slide">
            <img src="https://dummyimage.com/300x400/000/fff" />
          </li>
          <li class="splide__slide">
            <img src="https://dummyimage.com/500x400/555/fff" />
          </li>
          <li class="splide__slide">
            <img src="https://dummyimage.com/350x400/999/fff" />
          </li>
          <li class="splide__slide">
            <img src="https://dummyimage.com/350x400/999/fff" />
          </li>
          <li class="splide__slide">
            <img src="https://dummyimage.com/350x400/999/fff" />
          </li>
        </ul>
      </div>
    </div>
</section>
<?php if ($_smarty_tpl->getValue('curDate')->format('Y-m-d') >= $_smarty_tpl->getValue('objMovie')->getRelease_date()) {?>
    <section id="addComment" class="container text-center py-5">
        <h2>Avis</h2>
        <div class="text-start py-2">
            <form method="post" >
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
                        <input type="hidden" name="rating" id="note" value="0" class="form-control <?php if ((true && (true && null !== ($_smarty_tpl->getValue('arrError')['noteRating'] ?? null)))) {?> is-invalid <?php }?>">

                    </div>
                    <div class="col-md-4 mw-100 " >
                        <!--On click verify if ratings value > NULL & comment can be empty-->
                        <input type="submit" value="Envoyer" class="btnCustom w-100">
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section id="userComment" class="container py-5">
        <h3 class="py-3">Avis utilisateur</h3>
        <div class="allComment">
                <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('arrCommentToDisplay')) === 0) {?>
                    <h3 class='text-center py-3'>aucun commentaire</h3>
                <?php } else { ?>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrCommentToDisplay'), 'comment');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('comment')->value) {
$foreach1DoElse = false;
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
class Block_833422467698f8e1cadf005_37837780 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
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
