<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des salles</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
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

<h1>Liste des salles</h1>

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

// Requête SQL pour récupérer les noms et les capacités des salles
$sql = "SELECT nom, capacite FROM salles";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Création du tableau HTML
    echo "<table>";
    echo "<thead><tr>";
    echo "<th>Nom</th><th>Capacité</th>";
    echo "</tr></thead><tbody>";

    // Affichage des données de chaque ligne
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
        echo "<td>" . htmlspecialchars($row['capacite']) . "</td>";
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
