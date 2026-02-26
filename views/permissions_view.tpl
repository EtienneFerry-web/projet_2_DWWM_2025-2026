{extends file="views/layout_view.tpl"}
{block name="title" prepend}Dashboard{/block}
{block name="description"}{/block}

{block name="css_variation"}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{$smarty.env.BASE_URL}assets/css/style.css">
{/block}


{block name="content"}
<div class="container my-5">
<div class="py-3"><a href="{$smarty.env.BASE_URL}user/userPage/{$smarty.session.user.user_id}" class="spanMovie"><i class="bi bi-arrow-left fs-1"></i></a></div>    <div class="row justify-content-center">
        <div class="col-lg-10">
            

            <h2 class="mb-4 text-center">Droits et fonctionnalités</h2>

            <section class="mb-4">
                {if $smarty.session.user.user_funct_id == 1}
                    <h4>En tant qu'utilisateur, tu peux :</h4>
                {/if}

                {if $smarty.session.user.user_funct_id == 2}
                    <h4>En tant que modérateur, tu peux :</h4>
                {/if} 

                {if $smarty.session.user.user_funct_id == 3}
                    <h4>En tant qu'administrateur, tu peux tout faire !! You're the GOAT!</h4>
                {/if} 

                <!--User-->
                <ul>
                    <li>Ajouter un film : prospose ton film s'il n'est pas dans notre base de données</li>
                    <li>Modifier/Supprimer ton compte : à tout moment tu peux modifier ou supprimer ton compte</li>
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

