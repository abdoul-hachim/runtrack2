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
    <h1>Bienvenue, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <nav>
        <a href="index.php">Accueil</a>
        <a href="coment.php">Commentaires</a>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="add_coment.php">Ajouter un Commentaire</a>
            <a href="profil.php">Modifier Profil</a>
            <a href="logout.php">Déconnexion</a>
        <?php else: ?>
            <a href="login.php">Connexion</a>
            <a href="inscription.php">Inscription</a>
        <?php endif; ?>
    </nav>
</header>
</body>
</html>
