<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Compter les Voyelles et Consonnes</title>
</head>
<body>
    <?php
    // Définir la variable de type string
    $str = "On n’est pas le meilleur quand on le croit mais quand on le sait";
    echo $str;

    // Définir le dictionnaire pour compter les voyelles et les consonnes
    $dic = [
        "consonnes" => 0,
        "voyelles" => 0
    ];

    // Définir les voyelles
    $voyelles = ['a', 'e', 'i', 'o', 'u', 'y', 'A', 'E', 'I', 'O', 'U', 'Y'];

    // Parcourir la chaîne et compter les voyelles et consonnes
    for ($i = 0; $i < strlen($str); $i++) {
        $char = $str[$i];
        if (ctype_alpha($char)) { // Vérifie si le caractère est une lettre
            if (in_array($char, $voyelles)) {
                $dic["voyelles"]++;
            } else {
                $dic["consonnes"]++;
            }
        }
    }
    ?>

    <!-- Afficher les résultats dans un tableau HTML -->
    <table border="1">
        <thead>
            <tr>
                <th>Voyelles</th>
                <th>Consonnes</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $dic["voyelles"]; ?></td>
                <td><?php echo $dic["consonnes"]; ?></td>
            </tr>
        </tbody>
    </table>
</body>
</html>
