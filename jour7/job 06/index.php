<?php
function leetSpeak($str) {
    // Tableau de correspondance pour le leet speak
    $leet = [
        'A' => '4', 'a' => '4',
        'B' => '8', 'b' => '8',
        'E' => '3', 'e' => '3',
        'G' => '6', 'g' => '6',
        'L' => '1', 'l' => '1',
        'S' => '5', 's' => '5',
        'T' => '7', 't' => '7'
    ];

    // Initialiser la chaîne de résultat
    $result = '';

    // Parcourir chaque caractère de la chaîne d'entrée
    for ($i = 0; $i < strlen($str); $i++) {
        $char = $str[$i];
        // Si le caractère a une correspondance en leet speak, on le remplace
        if (isset($leet[$char])) {
            $result .= $leet[$char];
        } else {
            // Sinon, on garde le caractère tel quel
            $result .= $char;
        }
    }
    // Retourner la chaîne convertie
    return $result;
}

// Exemple d'utilisation
$original = "Hello, I am a great developer!";
$converted = leetSpeak($original);
echo "Original: $original<br>";
echo "Leet Speak: $converted";
?>
