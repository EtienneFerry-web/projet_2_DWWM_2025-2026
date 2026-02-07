<?php
/* Smarty version 5.7.0, created on 2026-02-07 09:59:47
  from 'file:views/_partial/footer.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_69870d13e8b580_57966274',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8a9d0487a10dc89a93d509b1bbf42e5e9b30fd8d' => 
    array (
      0 => 'views/_partial/footer.tpl',
      1 => 1770458239,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69870d13e8b580_57966274 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views\\_partial';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
    <footer>
        <div class="container text-center py-5">
            <a href="index.php?ctrl=page&action=mention" class="p-2 nav-link <?php echo $_smarty_tpl->getValue('strPage') === "mention" ? "active" : '';?>
">Mentions Légales</a>|
            <a href="index.php?ctrl=page&action=policy" class="p-2 nav-link <?php echo $_smarty_tpl->getValue('strPage') === "policy" ? "active" : '';?>
">Politique de confidentialité</a>
            <div>© 2026 GIVE MY FIVE. Tous droits réservés.</div>
        </div>
    </footer>
    <?php echo '<script'; ?>
 src="assets/js/autoCompletion.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_74501690669870d13e8a6a5_36804202', "js");
?>

</body>
</html>
<?php }
/* {block "js"} */
class Block_74501690669870d13e8a6a5_36804202 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views\\_partial';
}
}
/* {/block "js"} */
}
