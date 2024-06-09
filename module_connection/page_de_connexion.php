<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Paramètres de connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "moduleconnexion";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    // Récupérer les données du formulaire
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Requête de vérification
    $query = "SELECT * FROM utilisateurs WHERE nom = '$login' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 0) {
        // Les informations de connexion n'existent pas dans la base de données
        // L'utilisateur peut être autorisé à se connecter
        echo "Verifiez que le mot de passe ou le login sont correct.";
    } else {
        // Les informations de connexion existent déjà dans la base de données
        // Redirection vers une page d'erreur
        header("Location: page_de_profil.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="page_de_connexion.css">
</head>
<body>
<section class="connect_form">
        <h2>Formulaire de connexion</h2>
        <form method="post" action="page_de_connexion.php">
            <label for="login">Login</label><br>
            <input type="text" id="login" name="login" required><br><br>

            <label for="password">Mot de passe</label><br>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" value="se connecter">
        </form>
    </section>
</body>
</html>
