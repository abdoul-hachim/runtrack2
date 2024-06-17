<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="./assets/CSS/style.css">
</head>
<body>
    <?php
    session_start();
    if(isset($_SESSION['user_id'])) {
        include '_header.php';
    } else {
        include '_secondheader.php';
    }
    ?>
    <main>
        <h1>
            Bienvenue sur notre site
        </h1>
        <p>
            Ceci est la page d'accueil. Vous pouvez vous inscrire ou vous 
            connecter pour accéder à plus de fonctionnalités.
        </p>
 
    </main>
</body>
</html>
