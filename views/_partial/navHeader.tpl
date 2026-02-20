<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
    {if !isset($smarty.session.user)}
        <li class="nav-item my-auto"><a class="nav-link {$strView ==="login" ? "active" : ""}" href="index.php?ctrl=user&action=login">Connexion</a></li>
        <li class="nav-item my-auto"><a class="nav-link {$strView ==="createAccount" ? "active" : ""}" href="index.php?ctrl=user&action=createAccount">Inscription</a></li>
    {else}
        <li class="nav-item my-auto"><a class="nav-link {$strView ==="user" ? "active" : ""}" href="index.php?ctrl=user&action=user&id={$smarty.session.user.user_id}"><i class="bi bi-person-circle fs-2"></i></a></li>
        <li class="nav-item my-auto"><a class="nav-link {$strView ==="logout" ? "active" : ""}" href="index.php?ctrl=user&action=logout">Deconnexion</i></a></li>
         <li class="nav-item my-auto"><a class="nav-link {$strView ==="addEditMovie" ? "active" : ""}" href="index.php?ctrl=movie&action=addEditMovie">Ajouter un film</a></li>
    {/if}
    <li class="nav-item my-auto"><a class="nav-link {$strView == 'list' ? 'active' : ''}" href="index.php?ctrl=movie&action=list">Nos Films</a></li>
</ul>
