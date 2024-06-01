<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nombre d'occurrences</title>
</head>
<body>
    <?php
    // Définir la fonction occurrences
    function occurrences($str, $char) {
        $count = 0;
        $length = strlen($str);

        for ($i = 0; $i < $length; $i++) {
            if ($str[$i] == $char) {
                $count++;
            }
        }

        return $count;
    }

    // Exemple d'utilisation
    $str = "Bonjour";
    $char = "o";
    $occurrences = occurrences($str, $char);

    // Afficher le résultat
    echo "Le nombre d'occurrences de '$char' dans '$str' est : $occurrences";
    ?>
</body>
</html>
