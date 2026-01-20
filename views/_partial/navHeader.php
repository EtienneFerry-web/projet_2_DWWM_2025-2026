<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
    
    <?php if(!isset($_SESSION['user'])){?>
        <li class="nav-item"><a class="nav-link <?= ($strPage ==="login")? "active" : ""; ?>" href="index.php?ctrl=user&action=login">Connexion</a></li>
        <li class="nav-item"><a class="nav-link <?= ($strPage ==="addAccount")? "active" : ""; ?>" href="index.php?ctrl=user&action=createAccount">Inscription</a></li>
    <?php } else { ?>
        <li class="nav-item"><a class="nav-link <?= ($strPage ==="logout")? "active" : ""; ?>" href="index.php?ctrl=user&action=logout">Déconnection</a></li>
        <li class="nav-item"><a class="nav-link <?= ($strPage ==="user")? "active" : ""; ?>" href="index.php?ctrl=user&action=user">Profil</a></li>
    <?php } ?>
    <li class="nav-item"><a class="nav-link <?= ($strPage ==="addMovie")? "active" : ""; ?>" href="index.php?ctrl=content&action=addMovie">Ajouter un film</a></li>
</ul>
<div class="dropdown">
    <button class="btn btn-light dropdown-toggle " type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        classement
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item <?= ($strPage ==="list")? "active" : ""; ?>" href="index.php?ctrl=movie&action=list">Action 1</a></li>
        <li><a class="dropdown-item" href="/Projet2/page/list.php">Action 2</a></li>
        <li><a class="dropdown-item" href="/Projet2/page/list.php">Action 3</a></li>
    </ul>
</div>