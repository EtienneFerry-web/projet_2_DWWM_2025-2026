<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
    <li class="nav-item"><a class="nav-link <?= ($strPage ==="login")? "active" : ""; ?>" href="/Projet2/page/login.php?id=13">Connexion</a></li>
    <li class="nav-item"><a class="nav-link <?= ($strPage ==="addAccount")? "active" : ""; ?>" href="/Projet2/page/createAccount.php">Inscription</a></li>
    <li class="nav-item"><a class="nav-link <?= ($strPage ==="addMovie")? "active" : ""; ?>" href="/Projet2/page/formNewMovie.php">Ajouter un film</a></li>
</ul>
<div class="dropdown">
    <button class="btn btn-light dropdown-toggle " type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        classement
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item <?= ($strPage ==="list")? "active" : ""; ?>" href="/Projet2/page/list.php">Action 1</a></li>
        <li><a class="dropdown-item" href="/Projet2/page/list.php">Action 2</a></li>
        <li><a class="dropdown-item" href="/Projet2/page/list.php">Action 3</a></li>
    </ul>
</div>
