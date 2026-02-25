<?php
/* Smarty version 5.8.0, created on 2026-02-24 14:41:58
  from 'file:views/login_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_699db8b60a1046_71365474',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e83124573ad54856f47c24e09354ce23506ad530' => 
    array (
      0 => 'views/login_view.tpl',
      1 => 1771943991,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_699db8b60a1046_71365474 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1481056804699db8b6098212_56241079', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1065899308699db8b609a7a8_86061188', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_535249709699db8b609cc89_89513167', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_1481056804699db8b6098212_56241079 extends \Smarty\Runtime\Block
{
public $prepend = 'true';
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Connexion<?php
}
}
/* {/block "title"} */
/* {block "description"} */
class Block_1065899308699db8b609a7a8_86061188 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Connectez-vous pour une expérience personnalisée<?php
}
}
/* {/block "description"} */
/* {block "content"} */
class Block_535249709699db8b609cc89_89513167 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

    <section id="login" class="container py-5 my-auto ">
        <!-- include messages  -->
        <h1 class="text-center">Connexion</h1>
        <p class="mx-auto text-center py-2">Si vous n'avez pas de compte vous pouvez en créer un sur la page d'<a
                href="/Projet2/page/create_account.html" class="text-dark">inscription</a> !</p>
        <form method="post">
            <div class="form-group py-3">
                <label class="form-label">Adresse e-mail</label>
                <input type="email" name="email" class="form-control <?php if (((true && (true && null !== ($_smarty_tpl->getValue('arrError')['email'] ?? null))))) {?> is-invalid<?php }?>"
                    value="<?php echo $_smarty_tpl->getValue('objUser')->getEmail();?>
" placeholder="Email">
            </div>
            <div class="form-group py-3">
                <label class="form-label">Mot de passe</label>
                <input type="password" name="pwd" class="form-control <?php if (((true && (true && null !== ($_smarty_tpl->getValue('arrError')['pwd'] ?? null))))) {?> is-invalid <?php }?>"
                    value="" placeholder="Mot de Passe">
            </div>

            <input class="w-100 btnCustom" type="submit" value="Se connecter">
        </form>
    </section>
<?php
}
}
/* {/block "content"} */
}
