<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire GET</title>
</head>
<body>
    <form action="process.php" method="GET">
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name"><br><br>
        <label for="email">Email :</label>
        <input type="text" id="email" name="email"><br><br>
        <label for="age">Âge :</label>
        <input type="text" id="age" name="age"><br><br>
        <input type="submit" value="Envoyer">
    </form>

    <?php
    // Compter le nombre d'arguments GET
    $nombreArguments = count($_GET);

    // Afficher le nombre d'arguments GET
    echo "<p>Le nombre d'arguments GET envoyé est : " . $nombreArguments . "</p>";

    // Afficher les arguments GET et leurs valeurs
    if ($nombreArguments > 0) {
        echo "<ul>";
        foreach ($_GET as $key => $value) {
            echo "<li>" . htmlspecialchars($key) . " : " . htmlspecialchars($value) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Aucun argument GET reçu.</p>";
    }
    ?>

</body>
</html>