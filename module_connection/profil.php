<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "moduleconnexion";

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error){
    die("La connexion a échoué : " . $conn->connect_error);
}

$userId = 1; // définir l'ID de l'utilisateur que vous voulez mettre à jour

// Récupérer les informations actuelles de l'utilisateur
$sql = "SELECT 'nom', 'prenom', 'login' FROM utilisateurs WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$stmt->bind_result($currentNom, $currentPrenom, $currentLogin);
$stmt->fetch();
$stmt->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newPrenom = $_POST['prenom'];
    $newNom = $_POST['nom'];
    $newLogin = $_POST['login'];

    $query = "UPDATE utilisateurs SET prenom =?, nom =?, login =? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssi", $newPrenom, $newNom, $newLogin, $userId);

    if ($stmt->execute()) {
        echo "Vos informations ont été mises à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour des informations: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="profil.css">
</head>
<body>
    <header>
        <nav>
            <img src="" alt="">
            <ul>
                <li></li>
                <li></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <form method="post" action="profil.php">
                <label for="login">Login:</label><br>
                <input type="text" id="login" name="login" value="<?php echo htmlspecialchars($currentLogin); ?>"><br><br>

                <label for="nom">Nom:</label><br>
                <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($currentNom); ?>"><br><br>

                <label for="prenom">Prénom:</label><br>
                <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($currentPrenom); ?>"><br><br>

                <input type="submit" value="Enregistrer les modifications">
            </form>
        </section>
    </main>
    <footer>
        <ul>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <ul>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <ul>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </footer>
</body>
</html>
 