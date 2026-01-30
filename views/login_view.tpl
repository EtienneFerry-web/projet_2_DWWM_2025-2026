{extends file="views/layout_view.tpl"}
{block name="title" prepend}Connexion{/block}
{block name="description"}Connecte toi pour une experience personnalisée{/block}

{block name="content"}
<section id="login" class="container py-5 my-auto ">
<!-- include messages  -->
    <h1 class="text-center">Connexion</h1>
    <p class="mx-auto text-center py-2">Si vous n'avez pas de compte vous pouvez en créer un sur la page <a href="/Projet2/page/create_account.html" class="text-dark">d'inscription !</a></p>
    <form method="post">
        <div class="form-group py-3">
            <label class="form-label">Adresse Mail</label>
            <input  type="email" 
                    name="email"
                    class="form-control {if (isset($arrError['email']))} is-invalid{/if}" 
                    value="{$objUser->getEmail()}"
                    placeholder="Email">
        </div>
        <div class="form-group py-3">
            <label class="form-label">Mots de passe</label>
            <input  type="password" 
                    name="pwd"
                    class="form-control {if (isset($arrError['pwd']))} is-invalid {/if}"  
                    value=""
                    placeholder="Mot de Passe">
        </div>

        <input class="w-100 btnCustom" type="submit" >
    </form>
</section>
{/block}