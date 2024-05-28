<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire POST</title>
</head>
<body>
    <form method="get" action="">
        <label for="nombres">nombres:</label>
        <input type="text" id="nombres" name="nombres"><br><br>
        <input type="submit" value="validation">
    </form>
   
    <?php
    if (isset($_GET['nombres'])) {
        $nombres = $_GET['nombres'];

        if (is_numeric($nombres)) {
            if ($nombres % 2 == 0) {
                echo "Nombre pair";
            } else {
                echo "Nombre impair";
            }
        } else {
            echo "Veuillez entrer un nombre valide.";
        }
    }
    ?>
</body>
</html>
