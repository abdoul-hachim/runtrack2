
    <?php
    // Définir les nombres à exclure
    $exclusions = [26, 37, 88, 1111, 3233];

    // Parcourir les nombres de 0 à 1337
    for ($i = 0; $i <= 1337; $i++) {
        // Vérifier si le nombre est dans la liste des exclusions
        if (!in_array($i, $exclusions)) {
            echo "$i<br />";
        }
    }
    ?>
