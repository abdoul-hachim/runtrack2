
    <style>
        pre {
            font-family: monospace;
        }
    </style>

    <?php
    // Définir les dimensions du rectangle
    $largeur = 25;
    $hauteur = 30;

    // Afficher le rectangle
    echo "<pre>";
    for ($i = 0; $i < $hauteur; $i++) {
        for ($j = 0; $j < $largeur; $j++) {
            echo "-";
        }
        echo "<br />";
    }
    echo "</pre>";
    ?>
