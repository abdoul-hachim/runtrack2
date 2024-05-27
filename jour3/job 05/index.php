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
    // Vérifie si le caractère est une lettre
    if (($char >= 'a' && $char <= 'z') || ($char >= 'A' && $char <= 'Z')) {
        // Vérifie si le caractère est une voyelle
        $is_voyelle = false;
        for ($j = 0; $j < count($voyelles); $j++) {
            if ($char == $voyelles[$j]) {
                $is_voyelle = true;
                break;
            }
        }
        if ($is_voyelle) {
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
