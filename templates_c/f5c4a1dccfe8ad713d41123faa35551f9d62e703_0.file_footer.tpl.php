<?php
/* Smarty version 5.7.0, created on 2026-02-24 07:34:11
  from 'file:views/_partial/footer.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_699d54734f9656_05374001',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f5c4a1dccfe8ad713d41123faa35551f9d62e703' => 
    array (
      0 => 'views/_partial/footer.tpl',
      1 => 1771860012,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_699d54734f9656_05374001 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views/_partial';
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
    <?php echo '<script'; ?>
 src="assets/js/autoCompletion.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_223890416699d54734f54f1_38947976', "js");
?>

</body>
</html>
<?php }
/* {block "js"} */
class Block_223890416699d54734f54f1_38947976 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/Projet2/views/_partial';
}
}
/* {/block "js"} */
}
