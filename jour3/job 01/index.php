<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Parité des Nombres</title>
</head>
<body>
    <?php
    // Définir le tableau de nombres
    $nombres = [200, 204, 173, 98, 171, 404, 459];

    // Parcourir le tableau et afficher la parité de chaque nombre
    foreach ($nombres as $nombre) {
        if ($nombre % 2 == 0) {
            echo "$nombre est paire<br />";
        } else {
            echo "$nombre est impaire<br />";
        }
    }
    ?>
</body>
</html>
