<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
    {if !isset($smarty.session.user)}
        <li class="nav-item my-auto"><a class="nav-link {$strView ==="login" ? "active" : ""}" href="{$smarty.env.BASE_URL}User/Login">Connexion</a></li>
        <li class="nav-item my-auto"><a class="nav-link {$strView ==="createAccount" ? "active" : ""}" href="{$smarty.env.BASE_URL}User/CreateAccount">Inscription</a></li>
    {else}
        <li class="nav-item my-auto"><a class="nav-link {$strView ==="user" ? "active" : ""}" href="{$smarty.env.BASE_URL}user/user?id={$smarty.session.user.user_id}"><i class="bi bi-person-circle fs-2"></i></a></li>
        <li class="nav-item my-auto"><a class="nav-link {$strView ==="logout" ? "active" : ""}" href="{$smarty.env.BASE_URL}User/Logout">Deconnexion</i></a></li>
         <li class="nav-item my-auto"><a class="nav-link {$strView ==="addEditMovie" ? "active" : ""}" href="{$smarty.env.BASE_URL}Movie/AddEditMovie">Ajouter un film</a></li>
    {/if}
    <li class="nav-item my-auto"><a class="nav-link {$strView == 'list' ? 'active' : ''}" href="{$smarty.env.BASE_URL}Movie/List">Nos Films</a></li>
</ul>
