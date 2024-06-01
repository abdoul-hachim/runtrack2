<?php
function leetSpeak($str) {
    $leet = [
        'A' => '4', 'a' => '4',
        'B' => '8', 'b' => '8',
        'E' => '3', 'e' => '3',
        'G' => '6', 'g' => '6',
        'L' => '1', 'l' => '1',
        'S' => '5', 's' => '5',
        'T' => '7', 't' => '7'
    ];

    $result = '';

    for ($i = 0; $i < strlen($str); $i++) {
        $char = $str[$i];
        if (isset($leet[$char])) {
            $result .= $leet[$char];
        } else {
            $result .= $char;
        }
    }

    return $result;
}

if (isset($_GET['str']) && isset($_GET['fonction'])) {
    $str = $_GET['str'];
    $fonction = $_GET['fonction'];

    switch ($fonction) {
        case 'uppercase':
            $result = strtoupper($str);
            break;
        case 'lowercase':
            $result = strtolower($str);
            break;
        case 'reverse':
            $result = strrev($str);
            break;
        case 'leetSpeak':
            $result = leetSpeak($str);
            break;
        default:
            $result = $str;
            break;
    }

    echo "Résultat : " . htmlspecialchars($result);
} else {
    echo "Veuillez entrer une chaîne et choisir une transformation.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transformateur de Chaîne</title>
</head>
<body>
    <form action="process.php" method="GET">
        <label for="str">Entrez une chaîne :</label>
        <input type="text" id="str" name="str"><br><br>
        
        <label for="fonction">Choisissez une transformation :</label>
        <select id="fonction" name="fonction">
            <option value="uppercase">Majuscules</option>
            <option value="lowercase">Minuscules</option>
            <option value="reverse">Inverser</option>
            <option value="leetSpeak">Leet Speak</option>
        </select><br><br>
        
        <button type="submit">Transformer</button>
    </form>
</body>
</html>
