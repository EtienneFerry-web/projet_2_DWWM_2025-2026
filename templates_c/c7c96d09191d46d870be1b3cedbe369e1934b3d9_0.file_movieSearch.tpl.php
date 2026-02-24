<?php
/* Smarty version 5.7.0, created on 2026-02-16 14:29:19
  from 'file:views/_partial/movieSearch.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_699329bf561392_64694539',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c7c96d09191d46d870be1b3cedbe369e1934b3d9' => 
    array (
      0 => 'views/_partial/movieSearch.tpl',
      1 => 1770838668,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_699329bf561392_64694539 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views/_partial';
if ($_smarty_tpl->getValue('objContent')->getType() === "movie") {?>
    <div class="row py-2">
        <div class="col-4 text-center my-auto">
            <a href="index.php?ctrl=movie&action=movie&id=<?php echo $_smarty_tpl->getValue('objContent')->getId();?>
"><img src="<?php echo $_smarty_tpl->getValue('objContent')->getPhoto();?>
" alt="" class="img-fluid"></a>
        </div>
        <div class="col-8 text-start">
            <a href="index.php?ctrl=movie&action=movie&id=<?php echo $_smarty_tpl->getValue('objContent')->getId();?>
" class="link"><h2><?php echo $_smarty_tpl->getValue('objContent')->getName();?>
</h2></a>
            <p><?php echo $_smarty_tpl->getValue('objContent')->getContent();?>
</p>
            <span class="pageMovieNote spanMovie" data-note="<?php echo $_smarty_tpl->getValue('objContent')->getRating();?>
">
                <span class="stars d-inline-block"></span>
                <span class="note d-inline-block"><?php echo $_smarty_tpl->getValue('objContent')->getRating();?>
</span>
            </span>

            <span class="movieLikes py-2 d-flex gap-1 spanMovie">
                <i class="bi bi-heart-fill"></i><span><?php echo $_smarty_tpl->getValue('objContent')->getLike();?>
</span>
            </span>
            <span class="spanMovie text-uppercase">Film</span>
        </div>
    </div>
<?php } elseif ($_smarty_tpl->getValue('objContent')->getType() === "user") {?>
    <div class="row py-2">
        <div class="col-4 text-center my-auto">
            <a href="index.php?ctrl=user&action=user&id=<?php echo $_smarty_tpl->getValue('objContent')->getId();?>
"><img src="<?php echo $_smarty_tpl->getValue('objContent')->getPhoto();?>
" alt="" class="img-fluid"></a>
        </div>
        <div class="col-8 text-start">
            <a href="index.php?ctrl=user&action=user&id=<?php echo $_smarty_tpl->getValue('objContent')->getId();?>
" class="link"><h2><?php echo $_smarty_tpl->getValue('objContent')->getName();?>
</h2></a>
            <p><?php echo $_smarty_tpl->getValue('objContent')->getContent();?>
</p>
            <span class="spanMovie text-uppercase">Utilisateur</span>
        </div>
    </div>
<?php } else { ?>
    <div class="row py-2">
        <div class="col-4 text-center my-auto">
            <a href="index.php?ctrl=person&action=person&id=<?php echo $_smarty_tpl->getValue('objContent')->getId();?>
"><img src="<?php echo $_smarty_tpl->getValue('objContent')->getPhoto();?>
" alt="" class="img-fluid"></a>
        </div>
        <div class="col-8 text-start">
            <a href="index.php?ctrl=person&action=person&id=<?php echo $_smarty_tpl->getValue('objContent')->getId();?>
" class="link"><h2><?php echo $_smarty_tpl->getValue('objContent')->getName();?>
</h2></a>
            <p><?php echo $_smarty_tpl->getValue('objContent')->getContent();?>
</p>
            <span class="spanMovie text-uppercase">Personnalité</span>
        </div>
    </div>
<?php }
}
}
