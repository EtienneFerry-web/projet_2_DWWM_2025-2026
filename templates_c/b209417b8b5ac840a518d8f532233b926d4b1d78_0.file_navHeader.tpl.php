<?php
/* Smarty version 5.7.0, created on 2026-02-07 14:19:38
  from 'file:views/_partial/navHeader.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_698749fa008c07_53980337',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b209417b8b5ac840a518d8f532233b926d4b1d78' => 
    array (
      0 => 'views/_partial/navHeader.tpl',
      1 => 1770473962,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_698749fa008c07_53980337 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views\\_partial';
?><ul class="navbar-nav ms-auto mb-2 mb-lg-0">
    <?php if (!(true && (true && null !== ($_SESSION['user'] ?? null)))) {?>
        <li class="nav-item"><a class="nav-link <?php echo $_smarty_tpl->getValue('strPage') === "login" ? "active" : '';?>
" href="index.php?ctrl=user&action=login">Connexion</a></li>
        <li class="nav-item"><a class="nav-link <?php echo $_smarty_tpl->getValue('strPage') === "createAccount" ? "active" : '';?>
" href="index.php?ctrl=user&action=createAccount">Inscription</a></li>
    <?php } else { ?>
        <li class="nav-item"><a class="nav-link <?php echo $_smarty_tpl->getValue('strPage') === "logout" ? "active" : '';?>
" href="index.php?ctrl=user&action=logout">Déconnection</a></li>
         <li class="nav-item"><a class="nav-link <?php echo $_smarty_tpl->getValue('strPage') === "addMovie" ? "active" : '';?>
" href="index.php?ctrl=movie&action=addMovie">Ajouter un film</a></li>
        <li class="nav-item"><a class="nav-link <?php echo $_smarty_tpl->getValue('strPage') === "user" ? "active" : '';?>
" href="index.php?ctrl=user&action=user&id=<?php echo $_SESSION['user']['user_id'];?>
">Profil</a></li>
    <?php }?>
</ul>
<div class="dropdown">
    <button class="btn btn-light dropdown-toggle " type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        classement
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item <?php echo $_smarty_tpl->getValue('strPage') === "list" ? "active" : '';?>
" href="index.php?ctrl=movie&action=list">Action 1</a></li>
        <li><a class="dropdown-item" href="/Projet2/page/list.php">Action 2</a></li>
        <li><a class="dropdown-item" href="/Projet2/page/list.php">Action 3</a></li>
    </ul>
</div>
<?php }
}
