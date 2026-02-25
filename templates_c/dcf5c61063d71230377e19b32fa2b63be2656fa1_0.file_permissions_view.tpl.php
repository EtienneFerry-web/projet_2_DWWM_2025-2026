<?php
/* Smarty version 5.8.0, created on 2026-02-24 16:21:01
  from 'file:views/permissions_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_699dcfed8d09f1_64072840',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dcf5c61063d71230377e19b32fa2b63be2656fa1' => 
    array (
      0 => 'views/permissions_view.tpl',
      1 => 1771943991,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_699dcfed8d09f1_64072840 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1936641564699dcfed8bf5a8_54368397', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1338354791699dcfed8c2831_71157066', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_407613767699dcfed8c5a18_62496041', "css_variation");
?>



<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1312766625699dcfed8c7219_44470190', "content");
?>


<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_1936641564699dcfed8bf5a8_54368397 extends \Smarty\Runtime\Block
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
class Block_1338354791699dcfed8c2831_71157066 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
}
}
/* {/block "description"} */
/* {block "css_variation"} */
class Block_407613767699dcfed8c5a18_62496041 extends \Smarty\Runtime\Block
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
class Block_1312766625699dcfed8c7219_44470190 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

<div class="container my-5">
 <a href="index.php?ctrl=user&action=user&id=<?php echo $_SESSION['user']['user_id'];?>
" class="btn btn-outline-secondary m-2" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Consulter mes droits">< Retour</a>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            

            <h2 class="mb-4 text-center">Droits et fonctionnalités</h2>

            <section class="mb-4">
                <?php if ($_SESSION['user']['user_funct_id'] == 1) {?>
                <h4>En tant qu'utilisateur, tu peux :</h4>
                <?php }?>

                <?php if ($_SESSION['user']['user_funct_id'] == 2) {?>
                <h4>En tant que modérateur, tu peux :</h4>
                <?php }?> 

                <?php if ($_SESSION['user']['user_funct_id'] == 3) {?>
                <h4>En tant qu'administrateur, tu peux tout faire !! You're the GOAT!</h4>
                <?php }?> 

                <!--User-->
                <ul>
                    <li>Ajouter un film : prospose ton film s'il n'est pas dans notre base de données</li>
                    <li>Modifier/Supprimer ton compte : à tout moment tu peux modifier ou supprimer ton compte</li>
                    <li>Liker des films</li>
                    <li>Noter des films</li>
                    <li>Commenter des films</li>
                </ul>            

                <?php if ($_SESSION['user']['user_funct_id'] == 2 || $_SESSION['user']['user_funct_id'] == 3) {?>
                <!--Modo-->
                <ul>
                    <li>Modifier ou supprimer un film</li>
                    <li>Modifier ou supprimer une célébrité</li>
                    <li>Modifier les comptes des autres utilisateurs</li>
                    <li>Suspendre des comptes d'utilisateur</li>
                    <li>Supprimer des commentaires d'utilisateur</li>                    
                </ul>  
                <?php }?>  
                        
                <?php if ($_SESSION['user']['user_funct_id'] == 3) {?>
                <!--Admin-->
                <ul>
                    <li>Supprimer n'importe quel utilisateur</li>
                    <li>Bannir n'importe quel utilisateur</li>
                    
                </ul>  
                <?php }?>          
            </section>
            
                
        </div>
    </div>
</div>
<?php
}
}
/* {/block "content"} */
}
