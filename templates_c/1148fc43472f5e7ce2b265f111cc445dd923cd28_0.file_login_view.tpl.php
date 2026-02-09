<?php
/* Smarty version 5.7.0, created on 2026-02-09 12:03:01
  from 'file:views/login_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_6989ccf5188489_16886796',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1148fc43472f5e7ce2b265f111cc445dd923cd28' => 
    array (
      0 => 'views/login_view.tpl',
      1 => 1770634641,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6989ccf5188489_16886796 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_214959426989ccf516c501_30196134', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_6078505796989ccf5174f09_30714379', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_13452954946989ccf51776c6_87469438', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_214959426989ccf516c501_30196134 extends \Smarty\Runtime\Block
{
public $prepend = 'true';
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>
Connexion<?php
}
}
/* {/block "title"} */
/* {block "description"} */
class Block_6078505796989ccf5174f09_30714379 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>
Connecte toi pour une experience personnalisée<?php
}
}
/* {/block "description"} */
/* {block "content"} */
class Block_13452954946989ccf51776c6_87469438 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views';
?>

<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('vardump')($_SESSION);?>

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
