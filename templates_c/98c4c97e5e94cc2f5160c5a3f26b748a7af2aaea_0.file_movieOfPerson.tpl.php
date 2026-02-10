<?php
/* Smarty version 5.7.0, created on 2026-02-10 13:31:19
  from 'file:views/_partial/movieOfPerson.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_698b3327e03a19_65843812',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '98c4c97e5e94cc2f5160c5a3f26b748a7af2aaea' => 
    array (
      0 => 'views/_partial/movieOfPerson.tpl',
      1 => 1770634641,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_698b3327e03a19_65843812 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views/_partial';
?><div class="col-6 col-md-3 p-1 hoverMovie">
    <a href="index.php?ctrl=movie&action=movie&id=<?php echo $_smarty_tpl->getValue('objMovie')->getId();?>
">
        <img src="<?php echo $_smarty_tpl->getValue('objMovie')->getUrl();?>
" loading="eager" alt="Couverture de film" class="img-fluid"/>

        <span class="movieNote moviePerson spanMovie" data-note="<?php echo $_smarty_tpl->getValue('objMovie')->getRating();?>
">
            <span class="stars"></span>
        </span>

        <span class="movieLikes">
              <i class="bi bi-heart-fill"></i><?php echo $_smarty_tpl->getValue('objMovie')->getLike();?>

        </span>
    </a>
</div>
<?php }
}
