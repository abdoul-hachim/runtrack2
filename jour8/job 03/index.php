<?php
session_start(); // Démarrer la session

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si le champ "prenom" est défini et n'est pas vide
    if (isset($_POST["prenom"]) && !empty($_POST["prenom"])) {
        // Ajouter le prénom à la variable de session
        $_SESSION['prenoms'][] = $_POST["prenom"];
    }
}

// Réinitialiser la liste si le bouton "reset" est cliqué
if (isset($_POST['reset'])) {
    // Supprimer la variable de session contenant les prénoms
    unset($_SESSION['prenoms']);
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter des prénoms (Session)</title>
</head>
<body>

<h1>Ajouter des prénoms (Session)</h1>

<!-- Formulaire pour ajouter un prénom -->
<form method="post">
    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom">
    <input type="submit" value="Ajouter">
</form>

<!-- Bouton de réinitialisation -->
<form method="post">
    <input type="submit" name="reset" value="Réinitialiser">
</form>

<!-- Affichage de la liste des prénoms -->
<?php if (isset($_SESSION['prenoms']) && !empty($_SESSION['prenoms'])): ?>
    <h2>Liste des prénoms :</h2>
    <ul>
        <?php foreach ($_SESSION['prenoms'] as $prenom): ?>
            <li><?php echo htmlspecialchars($prenom); ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

</body>
</html>
