<?php
/* Smarty version 5.7.0, created on 2026-02-01 08:32:08
  from 'file:views/_partial/filtersList.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_697f0f884949d2_63508959',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '36c199f8013013676136b3fc5cfa34f10687361b' => 
    array (
      0 => 'views/_partial/filtersList.tpl',
      1 => 1769797403,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697f0f884949d2_63508959 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views\\_partial';
?> <form method="post">
     <div class="row flex-sm-column g-2 text-start">
         <!-- Filtre Réalisateur -->
         <div class="col-md-3 w-100">
         <label for="filmTitle" class="form-label">Réalisateur</label>
         <select class="form-select" name="realisator" >
             <option value="">Tous</option>
             <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrRealToDisplay'), 'objReal');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('objReal')->value) {
$foreach1DoElse = false;
?>
                 <option value="<?php echo $_smarty_tpl->getValue('objReal')->getId();?>
" <?php echo ($_smarty_tpl->getValue('objReal')->getId() === (int)$_smarty_tpl->getValue('realisator')) ? "selected" : '';?>
><?php echo $_smarty_tpl->getValue('objReal')->getFullName();?>
</option>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
         </select>
         </div>

         <!-- Filtre  acteur -->
         <div class="col-md-3 w-100">
         <label for="actor" class="form-label">Acteur</label>
         <select class="form-select"  name="actor" >
             <option value="">Tous</option>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrActorToDisplay'), 'objActor');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('objActor')->value) {
$foreach2DoElse = false;
?>
                 <option value="<?php echo $_smarty_tpl->getValue('objActor')->getId();?>
" <?php echo ($_smarty_tpl->getValue('objActor')->getId() === (int)$_smarty_tpl->getValue('actor')) ? "selected" : '';?>
>{ $objActor->getFullName()}</option>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
         </select>
         </div>

         <!-- Filtre  Genre -->
         <div class="col-md-3 w-100">
         <label for="actor" class="form-label">Genre</label>
         <select class="form-select" id="categories" name="categories">
             <option value="">Tous</option>
             <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrCategoriesToDisplay'), 'objCategories');
$foreach3DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('objCategories')->value) {
$foreach3DoElse = false;
?>
                 <option value="<?php echo $_smarty_tpl->getValue('objCategories')->getId();?>
" <?php echo ($_smarty_tpl->getValue('objCategories')->getId() === (int)$_smarty_tpl->getValue('categories')) ? "selected" : '';?>
><?php echo $_smarty_tpl->getValue('objCategories')->getCategories();?>
</option>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
         </select>
         </div>

         <!-- Filtre producteur -->
         <div class="col-md-3 w-100">
         <label for="producer" class="form-label">Producteur</label>
         <select class="form-select" id="producer" name="producer">
             <option value="">Tous</option>
              <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrProducerToDisplay'), 'objProducer');
$foreach4DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('objProducer')->value) {
$foreach4DoElse = false;
?>
                 <option value="<?php echo $_smarty_tpl->getValue('objProducer')->getId();?>
" <?php echo ($_smarty_tpl->getValue('objProducer')->getId() === (int)$_smarty_tpl->getValue('producer')) ? "selected" : '';?>
><?php echo $_smarty_tpl->getValue('objProducer')->getFullName();?>
</option>
             <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
         </select>
         </div>

         <!-- Filtre pays -->
         <div class="col-md-3 w-100">
             <label for="country" class="form-label">Pays</label>
             <select class="form-select" id="country" name="country">
                 <option value="">Tous</option>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrCountryToDisplay'), 'objCountry');
$foreach5DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('objCountry')->value) {
$foreach5DoElse = false;
?>
                     <option value="<?php echo $_smarty_tpl->getValue('objCountry')->getId();?>
" <?php echo ($_smarty_tpl->getValue('objCountry')->getId() === (int)$_smarty_tpl->getValue('country')) ? "selected" : '';?>
> <?php echo $_smarty_tpl->getValue('objCountry')->getCountry();?>
</option>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
             </select>
             </div>

             <div class="col-md-6" id="date-exact">
  			<label for="date" class="form-label">Date</label>
  			<input
     				type="date"
     				class="form-control"
     				id="date"
     				name="date"
     				aria-describedby="date-help"
     				value="<?php echo $_smarty_tpl->getValue('date');?>
" >
  			<small id="date-help" class="form-text text-muted">
     				Format: JJ/MM/AAAA
  			</small>
   		</div>
   		<div id="date-range" >
  			<div class="row g-3">
				<div class="col-md-6">
    				<label for="startdate" class="form-label">Date de début</label>
    				<input
    				type="date"
    				class="form-control"
    				id="startdate"
    				name="startdate"
    				value="<?php echo $_smarty_tpl->getValue('startDate');?>
" >
				</div>
				<div class="col-md-6">
    				<label for="enddate" class="form-label">Date de fin</label>
    				<input
    				type="date"
    				class="form-control"
    				id="enddate"
    				name="enddate"
    				value="<?php echo $_smarty_tpl->getValue('endDate');?>
" >
				</div>
  			</div>
   		</div>
     </div>

     <div class="py-3 text-center">
         <button type="submit" class="btnCustom">Filtrer</button>
         <a href="/Projet2/index.php?ctrl=movie&action=list" class="btnCustom">Réinitialiser</button></a>
     </div>
</form>
<?php }
}
