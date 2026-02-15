<?php
/* Smarty version 5.7.0, created on 2026-02-15 19:05:10
  from 'file:views/login_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_699218e6344553_10990763',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e83124573ad54856f47c24e09354ce23506ad530' => 
    array (
      0 => 'views/login_view.tpl',
      1 => 1770990163,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_699218e6344553_10990763 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2119899589699218e633a154_35041043', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_37721315699218e633baf8_94007683', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1413435133699218e633ca26_43674935', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_2119899589699218e633a154_35041043 extends \Smarty\Runtime\Block
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
class Block_37721315699218e633baf8_94007683 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Connecte toi pour une experience personnalisée<?php
}
}
/* {/block "description"} */
/* {block "content"} */
class Block_1413435133699218e633ca26_43674935 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

<section id="login" class="container py-5 my-auto ">
<!-- include messages  -->
    <h1 class="text-center">Connexion</h1>
    <p class="mx-auto text-center py-2">Si vous n'avez pas de compte vous pouvez en créer un sur la page <a href="/Projet2/page/create_account.html" class="text-dark">d'inscription !</a></p>
    <form method="post">
        <div class="form-group py-3">
            <label class="form-label">Adresse Mail</label>
            <input  type="email"
                    name="email"
                    class="form-control <?php if (((true && (true && null !== ($_smarty_tpl->getValue('arrError')['email'] ?? null))))) {?> is-invalid<?php }?>"
                    value="<?php echo $_smarty_tpl->getValue('objUser')->getEmail();?>
"
                    placeholder="Email">
        </div>
        <div class="form-group py-3">
            <label class="form-label">Mots de passe</label>
            <input  type="password"
                    name="pwd"
                    class="form-control <?php if (((true && (true && null !== ($_smarty_tpl->getValue('arrError')['pwd'] ?? null))))) {?> is-invalid <?php }?>"
                    value=""
                    placeholder="Mot de Passe">
        </div>

        <input class="w-100 btnCustom" type="submit" >
    </form>
</section>
<?php
}
}
/* {/block "content"} */
}
