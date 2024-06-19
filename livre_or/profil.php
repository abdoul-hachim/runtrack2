<?php
session_start();
include '_db_connection.php';

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$error = "";
$success = "";

// Récupérez les informations actuelles de l'utilisateur
$stmt = $conn->prepare("SELECT login, password FROM utilisateurs WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($current_login, $current_password);
$stmt->fetch();
$stmt->close();

// Traitement du formulaire de modification de profil
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_login = $_POST['login'];
    $new_password = $_POST['password'];

    if (empty($new_login) || empty($new_password)) {
        $error = "Les champs login et mot de passe ne peuvent pas être vides.";
    } else {
        // Hachage du mot de passe
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("UPDATE utilisateurs SET login = ?, password = ? WHERE id = ?");
        $stmt->bind_param("ssi", $new_login, $hashed_password, $user_id);

        if ($stmt->execute()) {
            $success = "Le profil a été mis à jour avec succès.";
            $_SESSION['login'] = $new_login;
            $_SESSION['password'] = $new_password; // Mettez à jour le nom d'utilisateur dans la session
        } else {
            $error = "Une erreur est survenue lors de la mise à jour du profil.";
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
    <title>Modifier le Profil</title>
    <link rel="stylesheet" href="./assets/CSS/style.css">
</head>
<body>
    <?php include '_header.php'; ?>

    <main>
        <h1>Modifier le Profil</h1>
        <form method="post" action="">
            <label for="login">Login:</label>
            <input type="text" id="login" name="login" value="<?php echo htmlspecialchars($current_login); ?>" required><br>
            
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required><br>
            
            <input type="submit" value="Mettre à jour">
        </form>
        <?php if ($error): ?>
            <p><?php echo $error; ?></p>
        <?php endif; ?>
        <?php if ($success): ?>
            <p><?php echo $success; ?></p>
        <?php endif; ?>
    </main>
</body>
</html>
