<!-- Barre de navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">

        <a class="navbar-brand" href="/vite-gourmand/index.php">
            🍽 Vite & Gourmand
        </a>

        <div class="navbar-nav ms-auto">

            <a class="nav-link" href="/vite-gourmand/index.php">
                Accueil
            </a>

            <a class="nav-link" href="/vite-gourmand/views/menus.php">
                Menus
            </a>

            <a class="nav-link" href="/vite-gourmand/views/contact.php">
                Contact
            </a>

            <?php if (isset($_SESSION["prenom"])): ?>

                <span class="nav-link">
                    👤 <?= htmlspecialchars($_SESSION["prenom"]) ?>
                </span>

                <a class="nav-link" href="/vite-gourmand/views/logout.php">
                    Déconnexion
                </a>

            <?php else: ?>

                <a class="nav-link" href="/vite-gourmand/views/connexion.php">
                    Connexion
                </a>

            <?php endif; ?>

        </div>
    </div>
</nav>