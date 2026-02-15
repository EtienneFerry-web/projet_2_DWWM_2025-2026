<?php
/* Smarty version 5.7.0, created on 2026-02-13 20:27:15
  from 'file:views/_partial/navHeader.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_698f89230c2222_48605487',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b209417b8b5ac840a518d8f532233b926d4b1d78' => 
    array (
      0 => 'views/_partial/navHeader.tpl',
      1 => 1770990163,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_698f89230c2222_48605487 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views\\_partial';
?><ul class="navbar-nav ms-auto mb-2 mb-lg-0">
    <?php if (!(true && (true && null !== ($_SESSION['user'] ?? null)))) {?>
        <li class="nav-item my-auto"><a class="nav-link <?php echo $_smarty_tpl->getValue('strView') === "login" ? "active" : '';?>
" href="index.php?ctrl=user&action=login">Connexion</a></li>
        <li class="nav-item my-auto"><a class="nav-link <?php echo $_smarty_tpl->getValue('strView') === "createAccount" ? "active" : '';?>
" href="index.php?ctrl=user&action=createAccount">Inscription</a></li>
    <?php } else { ?>
        <li class="nav-item my-auto"><a class="nav-link <?php echo $_smarty_tpl->getValue('strView') === "user" ? "active" : '';?>
" href="index.php?ctrl=user&action=user&id=<?php echo $_SESSION['user']['user_id'];?>
"><i class="bi bi-person-circle fs-2"></i></a></li>
        <li class="nav-item my-auto"><a class="nav-link <?php echo $_smarty_tpl->getValue('strView') === "logout" ? "active" : '';?>
" href="index.php?ctrl=user&action=logout">Deconnexion</i></a></li>
         <li class="nav-item my-auto"><a class="nav-link <?php echo $_smarty_tpl->getValue('strView') === "addEdditMovie" ? "active" : '';?>
" href="index.php?ctrl=movie&action=addEditMovie">Ajouter un film</a></li>
    <?php }?>
    <li class="nav-item my-auto"><a class="nav-link <?php echo $_smarty_tpl->getValue('strView') == 'list' ? 'active' : '';?>
" href="index.php?ctrl=movie&action=list">Nos Films</a></li>
</ul>
<?php }
}
