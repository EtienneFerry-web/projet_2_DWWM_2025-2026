<?php
/* Smarty version 5.7.0, created on 2026-02-13 20:27:15
  from 'file:views/_partial/searchForm.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_698f8923248716_34886491',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '47d4c81216c90e28035cb918e49531671ba99c68' => 
    array (
      0 => 'views/_partial/searchForm.tpl',
      1 => 1770990163,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_698f8923248716_34886491 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views\\_partial';
?>
<form action="index.php?ctrl=search&action=searchPage" class="<?php echo $_smarty_tpl->getValue('formClass');?>
" role="search" method="post" id="formSearch">
    <div class="search-container">
        <input class="form-control me-2" type="search" placeholder="Rechercher..." name="search" value="<?php if ((true && ($_smarty_tpl->hasVariable('arrSearch') && null !== ($_smarty_tpl->getValue('arrSearch') ?? null)))) {?> <?php echo $_smarty_tpl->getValue('arrSearch')->getSearch();?>
 <?php }?>" id="searchBar" autocomplete="off">
        <div id="suggestions" class="suggestions-list"></div>
    </div>
    <button class="btn" type="submit">
        <img src="/Projet2/assets/img/iconBtnSearch.svg" height="32" width="32">
    </button>
</form>
<?php }
}
