

    <style>
        pre {
            font-family: monospace;
        }
    </style>

    <?php
    // Définir la hauteur du triangle
    $hauteur = 5;

    // Afficher le triangle
    echo "<pre>";
    for ($i = 1; $i <= $hauteur; $i++) {
        // Affichage des espaces pour centrer les étoiles
        for ($j = $hauteur - $i; $j > 0; $j--) {
            echo " ";
        }
        // Affichage des étoiles
        for ($k = 0; $k < (2 * $i - 1); $k++) {
            echo "*";
        }
        echo "<br />";
    }
    echo "</pre>";
    ?>

