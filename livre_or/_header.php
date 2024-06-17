<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<header>
    <h1>Bienvenue, <?php echo htmlspecialchars($_SESSION['login']); ?>!</h1>
    <nav>
        <a href="index.php">Accueil</a>
        <a href="comment.php">Commentaires</a>
        <a href="logout.php">Déconnexion</a>
    </nav>
</header>
</body>
</html>
