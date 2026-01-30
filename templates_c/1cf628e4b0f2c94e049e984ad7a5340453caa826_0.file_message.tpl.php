<?php
/* Smarty version 5.7.0, created on 2026-01-30 14:58:51
  from 'file:views/_partial/message.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_697cc72bc268e0_72477114',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1cf628e4b0f2c94e049e984ad7a5340453caa826' => 
    array (
      0 => 'views/_partial/message.tpl',
      1 => 1769781416,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697cc72bc268e0_72477114 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views\\_partial';
?>

    <?php if (((true && ($_smarty_tpl->hasVariable('success_message') && null !== ($_smarty_tpl->getValue('success_message') ?? null))))) {?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
                <?php echo $_smarty_tpl->getValue('success_message');?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php } elseif (($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('arrError')) > 0)) {?>
        <div class="alert alert-danger">
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrError'), 'strError');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('strError')->value) {
$foreach2DoElse = false;
?>
            <p><?php echo $_smarty_tpl->getValue('strError');?>
</p>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </div>
    <?php }?>
    <?php }
}
