<?php

include '../config/database.php';

$requete = $pdo->query("SELECT * FROM menus");

$menus = $requete->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Menus</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php include "partials/navbar.php"; ?>

<div class="container mt-5">

    <h1 class="text-center mb-5">
        Nos Menus
    </h1>

    <div class="row">

      <?php foreach ($menus as $menu): ?>

    <div class="col-md-4 mb-4">

        <div class="card shadow h-100">

            <div class="card-body">

                <h3><?= htmlspecialchars($menu['nom']) ?></h3>

                <p><?= htmlspecialchars($menu['description']) ?></p>

                <h4><?= number_format($menu['prix'], 2, ',', ' ') ?> €</h4>

                <p>
                    Minimum <?= htmlspecialchars($menu['nombre_personnes_min']) ?> personnes
                </p>

            </div>

        </div>

    </div>

<?php endforeach; ?> 
    
</div>

</body>

</html>