<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inverser une chaîne</title>
</head>
<body>
    <?php
    // Définir la variable de type string
    $str = "Les choses que l'on possède finissent par nous posséder.";

    // Initialiser une variable pour stocker le résultat inversé
    $result = "";

    // Parcourir la chaîne de la fin au début et construire la chaîne inversée
    for ($i = strlen($str) - 1; $i >= 0; $i--) {
        $result .= $str[$i];
    }

    // Afficher le résultat
    echo $result;
    ?>
</body>
</html>
