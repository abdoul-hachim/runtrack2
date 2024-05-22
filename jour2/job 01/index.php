<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Affichage des Nombres</title>
</head>
<body>
    <?php
    for ($i = 0; $i <= 1337; $i++) {
        if ($i == 42) {
            echo "<b><u>$i</u></b><br />";
        } else {
            echo "$i<br />";
        }
    }
    ?>
</body>
</html>
