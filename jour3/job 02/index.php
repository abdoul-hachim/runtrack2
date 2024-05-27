
    <?php
    // Définir la variable de type string
    $str = "Tous ces instants seront perdus dans le temps comme les larmes sous la pluie.";

    // Initialiser une variable pour stocker le résultat
    $result = "";

    // Parcourir la chaîne et ajouter un caractère sur deux à la variable résultat
    for ($i = 0; $i < strlen($str); $i += 2) {
        $result .= $str[$i];
    }

    // Afficher le résultat
    echo $result;
    ?>
