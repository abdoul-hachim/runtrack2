<?php
session_start();
include '_db_connection.php';

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$error = "";
$success = "";

// Traitement du formulaire d'ajout de commentaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $commentaire = $_POST['commentaire'];

    if (empty($commentaire)) {
        $error = "Le champ de commentaire ne peut pas être vide.";
    } else {
        $stmt = $conn->prepare("INSERT INTO commentaires (commentaires, id_utilisateure, date) VALUES (?, ?, NOW())");
        $stmt->bind_param("si", $commentaire, $user_id);

        if ($stmt->execute()) {
            $success = "Commentaire ajouté avec succès.";
        } else {
            $error = "Une erreur est survenue lors de l'ajout du commentaire.";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Commentaire</title>
    <link rel="stylesheet" href="./assets/CSS/style.css">
</head>
<body>
    <?php include '_header.php'; ?>

    <main>
        <h1>Ajouter un Commentaire</h1>
        <form method="post" action="">
            <label for="commentaire">Commentaire:</label>
            <textarea id="commentaire" name="commentaire" required></textarea><br>
            <input type="submit" value="Poster le Commentaire">
        </form>
        <?php if ($error): ?>
            <p><?php echo $error; ?></p>
        <?php endif; ?>
        <?php if ($success): ?>
            <p><?php echo $success; ?></p>
        <?php endif; ?>
    </main>
</body>
</html>
