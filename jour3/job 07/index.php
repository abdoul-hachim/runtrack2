<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Décalage de caractères</title>
</head>
<body>
    <?php
    // Définir la variable de type string
    $str = "Certaines choses changent, et d'autres ne changeront jamais.";

    // Initialiser une variable pour stocker le résultat
    $result = "";

    // Parcourir la chaîne et décaler les caractères
    for ($i = 1; $i < strlen($str); $i++) {
        $result .= $str[$i];
    }

    // Ajouter le premier caractère à la fin de la chaîne
    $result .= $str[0];

    // Afficher le résultat
    echo $result;
    ?>
</body>
</html>
