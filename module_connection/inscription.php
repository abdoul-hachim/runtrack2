<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Paramètres de connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "moduleconnexion";

    // Créer une connexion
    $conn =  mysqli_connect($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    // Récupérer les données du formulaire
    $login = $_POST['login'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password']; 

    // Vérifier si les mots de passe correspondent
    if ($password === $confirm_password) {
        // Requête SQL d'insertion
        $sql = "INSERT INTO utilisateurs (`login`, `prenom`, `nom`, `password`) VALUES ('$login', '$prenom', '$nom', '$password')";

        // Exécuter la requête
        if ($conn->query($sql) === TRUE) {
            // Redirection vers la page de connexion
            header("Location: page_de_connexion.php");
            exit();
        } else {
            echo "Erreur : " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Les mots de passe ne correspondent pas.";
    }

    // Fermer la connexion
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <link rel="stylesheet" href="page_de_connexion.css">
</head>
<body>
    <h2>Formulaire d'Inscription</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="login">Login:</label><br>
        <input type="text" id="login" name="login" required><br><br>

        <label for="prenom">Prénom:</label><br>
        <input type="text" id="prenom" name="prenom" required><br><br>

        <label for="nom">Nom:</label><br>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="password">Mot de passe:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <label for="confirm_password">Confirmer le mot de passe:</label><br>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>

        <input type="submit" value="s'inscrire">
    </form>
</body>
</html>
