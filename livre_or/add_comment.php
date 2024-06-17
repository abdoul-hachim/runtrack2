<?php
session_start();
include 'db_connection.php';

if(!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $comment_text = $_POST['commentaires_text'];

    $stmt = $conn->prepare("INSERT INTO commentaires (id_utilisateure, commentaires_text) VALUES (?, ?)");
    $stmt->bind_param("is", $user_id, $comment_text);
    $stmt->execute();
    $stmt->close();

    header("Location: comment.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un commentaire</title>
    <link rel="stylesheet" href="./assets/CSS/style.css">
</head>
<body>
    <?php include '_header.php'; ?>

    <main>
        <h1>Ajouter un commentaire</h1>
        <form method="post">
            <textarea name="commentaires_text" required></textarea><br>
            <input type="submit" value="Poster le commentaire">
        </form>
    </main>
</body>
</html>
