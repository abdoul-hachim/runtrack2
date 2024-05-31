<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Choix du Style</title>
    <?php
    if (isset($_GET['style'])) {
        $style = htmlspecialchars($_GET['style']);
        echo '<link rel="stylesheet" type="text/css" href="' . $style . '.css">';
    }
    ?>
</head>
<body>
    <form method="get" action="">
        <label for="style">Choisissez un style:</label>
        <select id="style" name="style">
            <option value="style1">Style 1</option>
            <option value="style2">Style 2</option>
            <option value="style3">Style 3</option>
        </select>
        <br><br>
        <input type="submit" value="Appliquer le style">
    </form>
</body>
</html>
