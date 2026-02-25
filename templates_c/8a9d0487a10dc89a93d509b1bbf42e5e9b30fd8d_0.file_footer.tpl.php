<?php
/* Smarty version 5.8.0, created on 2026-02-24 14:41:29
  from 'file:views/_partial/footer.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_699db899daae68_11074269',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8a9d0487a10dc89a93d509b1bbf42e5e9b30fd8d' => 
    array (
      0 => 'views/_partial/footer.tpl',
      1 => 1771943991,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_699db899daae68_11074269 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views\\_partial';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
    <footer>
        <div class="container text-center py-5">
            <a href="index.php?ctrl=page&action=mention" class="p-2 nav-link <?php echo $_smarty_tpl->getValue('strPage') === "mention" ? "active" : '';?>
">Mentions Légales</a>|
            <a href="index.php?ctrl=page&action=policy" class="p-2 nav-link <?php echo $_smarty_tpl->getValue('strPage') === "policy" ? "active" : '';?>
">Politique de confidentialité</a>
            <div>© 2026 GIVE ME FIVE. Tous droits réservés.</div>
        </div>
    </footer>
    <?php if ((true && (true && null !== ($_SESSION['user'] ?? null)))) {
echo '<script'; ?>
 src="assets/js/activity.js"><?php echo '</script'; ?>
><?php }?>
    <?php echo '<script'; ?>
 src="assets/js/autoCompletion.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_858507827699db899da8a61_69400855', "js");
?>

</body>
</html>
<?php }
/* {block "js"} */
class Block_858507827699db899da8a61_69400855 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views\\_partial';
}
}
/* {/block "js"} */
}
