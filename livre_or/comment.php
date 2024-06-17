<?php
session_start();
include 'db_connection.php'; // Incluez votre fichier de connexion à la base de données

// Récupérer les commentaires de la base de données
$sql = "SELECT commentaires.commentaires, commentaires.created_at, utilisateures.nomutilisateur FROM commentaires 
        JOIN utilisateurs ON commentaires.id_utilisateur = utlisateurs.id 
        ORDER BY commentaires.created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commentaires</title>
    <link rel="stylesheet" href="./assets/CSS/style.css">
</head>
<body>
    <?php
    if(isset($_SESSION['user_id'])) {
        include '_header.php';
    } else {
        include '_secondheader.php';
    }
    ?>

    <main>
        <h1>Commentaires</h1>
        <?php if(isset($_SESSION['user_id'])): ?>
            <a href="add_comment.php">Ajouter un commentaire</a>
        <?php endif; ?>

        <?php if ($result->num_rows > 0): ?>
            <ul>
                <?php while($row = $result->fetch_assoc()): ?>
                    <li>
                        Posté le <?php echo date('d/m/Y', strtotime($row['created_at'])); ?> par <?php echo htmlspecialchars($row['username']); ?>:
                        <p><?php echo htmlspecialchars($row['comment_text']); ?></p>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>Aucun commentaire pour le moment.</p>
        <?php endif; ?>
    </main>
</body>
</html>
