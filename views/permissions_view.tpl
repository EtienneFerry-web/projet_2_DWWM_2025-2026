{extends file="views/layout_view.tpl"}
{block name="title" prepend}Dashboard{/block}
{block name="description"}{/block}

{block name="css_variation"}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/Projet2/assets/css/style.css">
{/block}


{block name="content"}
<div class="container my-5">
 <a href="index.php?ctrl=user&action=user&id={$smarty.session.user.user_id}" class="btn btn-outline-secondary m-2" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Consulter mes droits">< Retour</a>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            

            <h2 class="mb-4 text-center">Droits et fonctionnalités GiveMeFive</h2>

            <section class="mb-4">
                {if $smarty.session.user.user_funct_id == 1}
                <h4>Lorsque tu es utilisateur</h4>
                {/if}

                {if $smarty.session.user.user_funct_id == 2}
                <h4>Lorsque tu es modérateur, tu peux en plus :</h4>
                {/if} 

                {if $smarty.session.user.user_funct_id == 3}
                <h4>Lorsque tu es administrateur, tu peux tout faire !! You're the GOAT!</h4>
                {/if} 

                <!--User-->
                <ul>
                    <li>Ajouter un film :Prospose ton film s'il n'est pas dans notre base de données</li>
                    <li>Modifier/Supprimer ton compte : A tout moment tu peux modifier ou supprimer ton compte</li>
                    <li>Liker des films</li>
                    <li>Noter des films</li>
                    <li>Commenter des films</li>
                </ul>            

                {if $smarty.session.user.user_funct_id == 2 || $smarty.session.user.user_funct_id == 3}
                <!--Modo-->
                <ul>
                    <li>Modifier ou supprimer un film</li>
                    <li>Modifier ou supprimer une célébrité</li>
                    <li>Modifier les comptes des autres utilisateurs</li>
                    <li>Suspendre des comptes d'utilisateur</li>
                    <li>Supprimer des commentaires d'utilisateur</li>                    
                </ul>  
                {/if}  
                        
                {if $smarty.session.user.user_funct_id == 3}
                <!--Admin-->
                <ul>
                    <li>Supprimer n'importe quel utilisateur</li>
                    <li>Bannir n'importe quel utilisateur</li>
                    
                </ul>  
                {/if}          
            </section>
            
                
        </div>
    </div>
</div>
{/block}

