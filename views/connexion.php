<?php

session_start();

include "../config/database.php";

$erreur = "";

$messageSucces = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["email"]);
    $motDePasse = trim($_POST["mot_de_passe"]);

    if (empty($email) || empty($motDePasse)) {

        $erreur = "Veuillez remplir tous les champs.";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $erreur = "Veuillez saisir une adresse e-mail valide.";

    } else {

        $requete = $pdo->prepare(
            "SELECT * FROM utilisateurs WHERE email = :email"
        );

        $requete->execute([
            "email" => $email
        ]);

        $utilisateur = $requete->fetch(PDO::FETCH_ASSOC);

        if (!$utilisateur) {

            $erreur = "Adresse e-mail ou mot de passe incorrect.";

        } else {

           if ($motDePasse !== $utilisateur["mot_de_passe"]) {

            $erreur = "Adresse e-mail ou mot de passe incorrect.";

        } else {

            $_SESSION["utilisateur_id"] = $utilisateur["id"];
            $_SESSION["prenom"] = $utilisateur["prenom"];
            $_SESSION["email"] = $utilisateur["email"];
            $_SESSION["role"] = $utilisateur["role"];

        $messageSucces = "Connexion réussie. Bienvenue " . $utilisateur["prenom"] . " !";

    }

        }

    }

}

?>


<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <title>Connexion</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<?php include "partials/navbar.php"; ?>

<div class="container mt-5">

    <h1 class="text-center mb-4">Connexion</h1>

    <?php if ($erreur !== ""): ?>

    <div class="alert alert-danger">
        <?= htmlspecialchars($erreur) ?>
    </div>

<?php endif; ?>

<?php if ($messageSucces !== ""): ?>

    <div class="alert alert-success">
        <?= htmlspecialchars($messageSucces) ?>
    </div>

<?php endif; ?>

<form method="POST">

    <div class="mb-3">
        <label class="form-label">Adresse e-mail</label>

        <input
            type="email"
            name="email"
            class="form-control"
        >
    </div>

    <div class="mb-3">
        <label class="form-label">Mot de passe</label>

        <input
            type="password"
            name="mot_de_passe"
            class="form-control"
        >
    </div>

    <button type="submit" class="btn btn-success">
        Se connecter
    </button>

</form>

</div>

</body>

</html>