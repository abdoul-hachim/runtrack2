<?php
session_start(); // Démarrer la session

// Vérifier si la variable de session "nbvisites" existe
if (!isset($_SESSION['nbvisites'])) {
    // Si elle n'existe pas, initialiser à 0
    $_SESSION['nbvisites'] = 0;
}

// Incrémenter le compteur à chaque visite
$_SESSION['nbvisites']++;

// Vérifier si le bouton de réinitialisation a été cliqué
if (isset($_POST['reset'])) {
    // Réinitialiser le compteur
    $_SESSION['nbvisites'] = 0;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compteur de visites</title>
</head>
<body>

<h1>Compteur de visites</h1>

<p>Nombre de visites : <?php echo $_SESSION['nbvisites']; ?></p>

<form method="post">
    <input type="submit" name="reset" value="Réinitialiser">
</form>

</body>
</html>
