<?php
session_start();
include '_db_connection.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password != $confirm_password) {
        $error = "Les mots de passe ne correspondent pas.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $conn->prepare("INSERT INTO utilisateurs (login, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $login, $hashed_password);

        if ($stmt->execute()) {
            header("Location: login.php");
            exit;
        } else {
            $error = "Une erreur est survenue lors de l'inscription.";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="./assets/CSS/style.css">
</head>
<body>
    <?php include '_secondheader.php'; ?>

    <main>
        <h1>Inscription</h1>
        <form method="post" action="">
            <label for="login">Login:</label>
            <input type="text" id="login" name="login" required><br>

            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required><br>

            <label for="confirm_password">Confirmez le mot de passe:</label>
            <input type="password" id="confirm_password" name="confirm_password" required><br>

            <input type="submit" value="S'inscrire">
        </form>
        <?php if ($error): ?>
            <p><?php echo $error; ?></p>
        <?php endif; ?>
    </main>
</body>
</html>
