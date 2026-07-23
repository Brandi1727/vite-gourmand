<?php

include "../config/database.php";

$messageSucces = "";
$erreur = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nom = trim($_POST["nom"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    if (empty($nom) || empty($email) || empty($message)) {

        $erreur = "Veuillez remplir tous les champs.";

        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    $erreur = "Veuillez saisir une adresse e-mail valide.";

    } else {

        $requete = $pdo->prepare(
            "INSERT INTO contacts (nom, email, sujet, message, date_envoi)
             VALUES (:nom, :email, :sujet, :message, NOW())"
        );

        $requete->execute([
            "nom" => $nom,
            "email" => $email,
            "sujet" => "Demande de contact",
            "message" => $message
        ]);

        $messageSucces = "Votre message a bien été envoyé.";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Vite & Gourmand</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php include "partials/navbar.php"; ?>

<div class="container mt-5">

    <h1 class="text-center mb-5">
        Contactez-nous
    </h1>

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
            <label class="form-label">Nom</label>
 
            <input
    type="text"
    class="form-control"
    name="nom"
    value="<?= htmlspecialchars($nom ?? '') ?>"
>

        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
           <input
    type="email"
    class="form-control"
    name="email"
    value="<?= htmlspecialchars($email ?? '') ?>"
>
        </div>

        <div class="mb-3">
            <label class="form-label">Votre message</label>
           <textarea
    name="message"
    class="form-control"
    rows="5"
><?= htmlspecialchars($message ?? '') ?></textarea>
        </div>

        <button type="submit" class="btn btn-success">
            Envoyer
        </button>

    </form>

</div>

</body>

</html>