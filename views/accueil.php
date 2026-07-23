<?php

session_start();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vite & Gourmand</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

   <?php include "partials/navbar.php"; ?>

    <!-- contenu principal -->
    <div class="container text-center mt-5">

        <h1 class="display-4">
            Bienvenue chez Vite & Gourmand
        </h1>

        <?php if (isset($_SESSION["prenom"])): ?>

    <div class="alert alert-success mt-3">
        Vous êtes connecté en tant que
        <?= htmlspecialchars($_SESSION["prenom"]) ?>.
    </div>

    <?php endif; ?>

        <p class="lead">
            Votre traiteur pour tous vos événements.
        </p>

        <button class="btn btn-success btn-lg">
            Découvrir nos menus
        </button>
<div class="container mt-5">

    <div class="row">

        <div class="col-md-4">

            <h3>🥗 Produits frais</h3>

            <p>
                Tous nos menus sont préparés avec des produits frais
                et de qualité.
            </p>

        </div>

        <div class="col-md-4">

            <h3>🚚 Livraison</h3>

            <p>
                Livraison rapide dans Bordeaux et ses alentours.
            </p>

        </div>

        <div class="col-md-4">

            <h3>🎉 Évènements</h3>

            <p>
                Mariages, anniversaires, Noël, Pâques,
                repas d'entreprise...
            </p>

        </div>

    </div>

</div>
    </div>
<footer class="bg-dark text-white text-center py-4 mt-5">
    <div class="container">
        <p class="mb-1">&copy; 2026 Vite & Gourmand</p>
        <p class="mb-0">Projet ECF Développeur Web & Web Mobile</p>
    </div>
</footer>
</body>

</html>