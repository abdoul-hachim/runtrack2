<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superficie totale des étages</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            padding: 8px 12px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>

<h1>Superficie totale des étages</h1>

<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jour09";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Requête SQL pour calculer la superficie totale des étages
$sql = "SELECT SUM(superficie) AS superficie_totale FROM etage";
$result = $conn->query($sql); // Exécution de la requête

if ($result->num_rows > 0) { // Vérification s'il y a des résultats
    // Création du tableau HTML
    echo "<table>";
    echo "<thead><tr>";

    // Affichage du nom du champ
    $fields = $result->fetch_fields();
    foreach ($fields as $field) {
        echo "<th>" . htmlspecialchars($field->name) . "</th>";
    }
    echo "</tr></thead><tbody>";

    // Affichage des données de chaque ligne
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['superficie_totale']) . "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
} else {
    echo "0 résultats";
}

// Fermeture de la connexion
$conn->close();
?>

</body>
</html>
