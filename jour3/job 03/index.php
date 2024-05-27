
    <?php
    // Définir la variable de type string
    $str = "I'm sorry Dave I'm afraid I can't do that";

    // Initialiser une variable pour stocker le résultat
    $result = "";

    // Définir les voyelles (majuscule et minuscule)
    $voyelles = ['a', 'e', 'i', 'o', 'u', 'y', 'A', 'E', 'I', 'O', 'U', 'Y'];

    // Parcourir la chaîne et ajouter les voyelles à la variable résultat
    for ($i = 0; $i < strlen($str); $i++) {
        if (in_array($str[$i], $voyelles)) {
            $result .= $str[$i];
        }
    }

    // Afficher le résultat
    echo $result;
    ?>

