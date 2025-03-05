<header class="navbar">
    <nav class="navbar-content">
        <a href="/" class="navbar-logo">My first app PHP</a>
        <ul class="navbar-links">
            <li class="navbar-item"><a href="#">Accueil</a>
            </li>
            <li class="navbar-item"><a href="#">Profil</a>
            </li>
            <li class="navbar-item"><a href="#">Blog</a>
            </li>
        </ul>
        <ul class="navbar-buttons">
            <li class="navbar-item">
                <?php if (!empty($_SESSION['user'])): ?>
                    <a href="/logout.php" class="btn btn-danger">Logout</a>
                <?php else: ?>
                    <a href="/login.php" class="btn btn-secondary">Login</a>
                <?php endif; ?>
            </li>
        </ul>
    </nav>
</header>