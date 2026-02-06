<?php
/* Smarty version 5.7.0, created on 2026-02-06 13:10:46
  from 'file:views/dashboard_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_6985e856e59ae0_43654204',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a41bfa6ad9ef5f3cc44fab8d0aba63facde696c0' => 
    array (
      0 => 'views/dashboard_view.tpl',
      1 => 1770383444,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6985e856e59ae0_43654204 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_729221246985e856db80d9_44442177', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_19459745476985e856dc3ae9_81684024', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_10894006676985e856dcd5a1_91727621', "css_variation");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_728728656985e856dd89d7_23885920', "content");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_10064394316985e856e53077_74999697', "js");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_729221246985e856db80d9_44442177 extends \Smarty\Runtime\Block
{
public $prepend = 'true';
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Dashboard<?php
}
}
/* {/block "title"} */
/* {block "description"} */
class Block_19459745476985e856dc3ae9_81684024 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
}
}
/* {/block "description"} */
/* {block "css_variation"} */
class Block_10894006676985e856dcd5a1_91727621 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="stylesheet" href="/Projet2/assets/css/style.css">
<?php
}
}
/* {/block "css_variation"} */
/* {block "content"} */
class Block_728728656985e856dd89d7_23885920 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

<section id="dashboard" class="container py-5">
    <h1>DashBoard</h1>
    <div class="py-2 container row col-12 col-lg-auto">
        <div id="user"  class="nav-link col-2">Utilisateurs</div>
        <div id="addMovie"  class="nav-link col-2">Films</div>
        <div id="report"  class="nav-link col-2">Célébrités</div>
        <!--rajout onglet Modération Films + Signal-->
    </div>
    <a href="index.php" class="homeBtn"><i class="bi bi-house-fill fs-1"></i></a>
    <div id="ficheMovie" class="d-none">
        <h2>Tous les films</h2>
        <form class="row g-1 align-items-center py-3 ">
                <div class="col-12 col-md-5 p-0">
                    <input class="form-control " type="search" placeholder="Rechercher..." name="search" value="">
                </div>
                <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                    Recherche
                </button>
            </form>
        <div class="allUser"> 
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrMovieToDisplay'), 'objMovie');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('objMovie')->value) {
$foreach0DoElse = false;
?>                         
                <div class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-2">
                        <span class="spanMovie"><?php echo $_smarty_tpl->getValue('objMovie')->getId();?>
</span>
                    </div>
                    <div class="col-4">
                        <span class="spanMovie"><?php echo $_smarty_tpl->getValue('objMovie')->getTitle();?>
</span>
                    </div>
                    <div class="col-3">
                        <a href="">Modifier</a>
                    </div>
                    <div class="col-3">
                        <a href="">Supprimer</a>
                    </div>                     
                </div>                   
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>              
            </div>
    </div>
    <div id="listUser" class="d-block">
        <h2>Tous Les Utilisateurs</h2>
            <form class="row g-1 align-items-center py-3 ">
                <div class="col-12 col-md-5 p-0">
                    <input class="form-control " type="search" placeholder="Rechercher..." name="search" value="">
                </div>

                <div class="col-12 col-md-5 p-0">
                    <select class="form-select">
                        <option value="">Tous Les Grades</option>
                        <option value="usa">Croissant</option>
                        <option value="france">Decroissant</option>
                    </select>
                </div>
                <button type="submit" class="col-12 col-md-2 p-1 btnCustom" id="send">
                    Recherche
                </button>
            </form>

            <div class="allUser"> 
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrUserToDisplay'), 'objUser');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('objUser')->value) {
$foreach1DoElse = false;
?>                         
                <div class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-1">
                        <span class="spanMovie"><?php echo $_smarty_tpl->getValue('objUser')->getId();?>
</span>
                    </div>
                    <div class="col-3">
                        <span class="spanMovie"><?php echo $_smarty_tpl->getValue('objUser')->getPseudo();?>
</span>
                    </div>
                    <div class="col-4">
                        <span class="spanMovie"><?php echo $_smarty_tpl->getValue('objUser')->getEmail();?>
</span>
                    </div>
                    <div class="col-2">
                        <a href="">Modifier</a>
                    </div>
                    <div class="col-2">
                        <a href="index.php?ctrl=user&action=deleteAccount&id=<?php echo $_smarty_tpl->getValue('objUser')->getId();?>
">Supprimer</a>
                    </div> 
                    
                </div>
                   
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>              
            </div>
          
        <div>
    </div>
    </div>
    <div id="allReport" class="d-none">
        <h2>les célébrités</h2>
        <div class="allUser"> 
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arrPersonToDisplay'), 'objPerson');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('objPerson')->value) {
$foreach2DoElse = false;
?>                         
                <div class="row g-2 align-items-center justify-content-center py-2">
                    <div class="col-1">
                        <span class="spanMovie"><?php echo $_smarty_tpl->getValue('objPerson')->getId();?>
</span>
                    </div>
                    <div class="col-3">
                        <span class="spanMovie"><?php echo $_smarty_tpl->getValue('objPerson')->getFullName();?>
</span>
                    </div>                    
                    <div class="col-2">
                        <a href="">Modifier</a>
                    </div>
                    <div class="col-2">
                        <a href="">Supprimer</a>
                    </div>                     
                </div>
                   
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </div>
</section>
<?php
}
}
/* {/block "content"} */
/* {block "js"} */
class Block_10064394316985e856e53077_74999697 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

  <?php echo '<script'; ?>
 src="assets/js/dasboard.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block "js"} */
}
