<?php
/* Smarty version 5.7.0, created on 2026-02-01 16:16:27
  from 'file:views/mention_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_697f7c5b0d2438_07711067',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6bca9f353312a0a39603c2b53a0a3579ea0eda54' => 
    array (
      0 => 'views/mention_view.tpl',
      1 => 1769962586,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697f7c5b0d2438_07711067 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_403562792697f7c5b0ce630_54985432', "title");
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1543105656697f7c5b0d0a24_42899019', "description");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2081415055697f7c5b0d1922_63958435', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "views/layout_view.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_403562792697f7c5b0ce630_54985432 extends \Smarty\Runtime\Block
{
public $prepend = 'true';
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
Accueil<?php
}
}
/* {/block "title"} */
/* {block "description"} */
class Block_1543105656697f7c5b0d0a24_42899019 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>
bienvenue sur notre accueil !!!!<?php
}
}
/* {/block "description"} */
/* {block "content"} */
class Block_2081415055697f7c5b0d1922_63958435 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\Projet2\\views';
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <h1 class="mb-4 text-center">Mentions légales</h1>

            <section class="mb-4">
                <h2 class="h5">1. Éditeur du site</h2>
                <p>
                    Le site <strong>Nom de l’agenda de sorties</strong> est édité par :
                </p>
                <ul>
                    <li>Nom / Raison sociale : <strong>À compléter</strong></li>
                    <li>Statut : <strong>Particulier / Association / Société</strong></li>
                    <li>Adresse : <strong>Adresse complète</strong></li>
                    <li>Email : <strong>contact@exemple.fr</strong></li>
                    <li>Téléphone : <strong>XX XX XX XX XX</strong></li>
                </ul>
            </section>

            <section class="mb-4">
                <h2 class="h5">2. Hébergement</h2>
                <p>
                    Le site est hébergé par :
                </p>
                <ul>
                    <li>Hébergeur : <strong>Nom de l’hébergeur</strong></li>
                    <li>Adresse : <strong>Adresse de l’hébergeur</strong></li>
                    <li>Téléphone : <strong>Numéro de téléphone</strong></li>
                    <li>Site web : <strong>www.hebergeur.fr</strong></li>
                </ul>
            </section>

            <section class="mb-4">
                <h2 class="h5">3. Objet du site</h2>
                <p>
                    Le site a pour objet de proposer un agenda de sorties (événements, concerts,
                    soirées, spectacles, activités culturelles ou festives).
                </p>
                <p>
                    Les informations diffusées sont fournies à titre indicatif et peuvent être
                    modifiées ou annulées par les organisateurs.
                </p>
            </section>

            <section class="mb-4">
                <h2 class="h5">4. Responsabilité</h2>
                <p>
                    L’éditeur du site ne saurait être tenu responsable de l’exactitude, de la mise
                    à jour ou de l’annulation des événements publiés.
                </p>
                <p>
                    L’utilisateur est invité à vérifier les informations directement auprès des
                    organisateurs.
                </p>
            </section>

            <section class="mb-4">
                <h2 class="h5">5. Propriété intellectuelle</h2>
                <p>
                    Tous les contenus présents sur le site (textes, images, logos, graphismes)
                    sont protégés par le droit d’auteur.
                </p>
                <p>
                    Toute reproduction, totale ou partielle, sans autorisation écrite est interdite.
                </p>
            </section>

            <section class="mb-4">
                <h2 class="h5">6. Données personnelles</h2>
                <p>
                    Le site peut collecter des données personnelles (formulaire de contact,
                    inscription à une newsletter).
                </p>
                <p>
                    Conformément au RGPD, vous disposez d’un droit d’accès, de rectification et
                    de suppression de vos données en contactant : <strong>contact@exemple.fr</strong>.
                </p>
            </section>

            <section class="mb-4">
                <h2 class="h5">7. Cookies</h2>
                <p>
                    Le site peut utiliser des cookies à des fins de fonctionnement, de statistiques
                    ou d’amélioration de l’expérience utilisateur.
                </p>
                <p>
                    Vous pouvez configurer votre navigateur pour refuser les cookies.
                </p>
            </section>



        </div>
    </div>
</div>
<?php
}
}
/* {/block "content"} */
}
