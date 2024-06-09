<?php
// Vérifier si le cookie "nbvisites" existe
if (isset($_COOKIE['nbvisites'])) {
    // Si le cookie existe, incrémenter sa valeur
    $nbvisites = $_COOKIE['nbvisites'] + 1;
} else {
    // Si le cookie n'existe pas, initialiser à 1
    $nbvisites = 1;
}

// Définir le cookie avec la nouvelle valeur
setcookie('nbvisites', $nbvisites, time() + 3600 * 24 * 30); // Expire dans 30 jours

// Réinitialiser le compteur si le bouton "reset" est cliqué
if (isset($_POST['reset'])) {
    setcookie('nbvisites', 0, time() - 3600); // Expiration immédiate pour supprimer le cookie
    $nbvisites = 0; // Réinitialiser la variable à 0
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compteur de visites (Cookie)</title>
</head>
<body>

<h1>Compteur de visites (Cookie)</h1>

<p>Nombre de visites : <?php echo $nbvisites; ?></p>

<form method="post">
    <input type="s
