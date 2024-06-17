<?php
session_start();
include '_db_connection.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, login, password FROM utilisateurs WHERE login = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $login, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['login'] = $login;
            $_SESSION['connected'] = true; // Assurez-vous de définir cette variable pour vérifier la connexion
            header("Location: index.php");
            exit();
        } else {
            $error = "Mot de passe incorrect.";
        }
    } else {
        $error = "Aucun compte trouvé avec ce login.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="./assets/CSS/style.css">
</head>
<body>
    <?php include '_secondheader.php'; ?>

    <main>
        <h1>Connexion</h1>
        <form method="post" action="">
            <label for="login">Login:</label>
            <input type="text" id="login" name="login" required><br>

            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required><br>

            <input type="submit" value="Se connecter">
        </form>
        <?php if ($error): ?>
            <p><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
    </main>
</body>
</html>
