<?php
// Vérifier si le formulaire de connexion a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['connexion'])) {
    // Vérifier si le champ "prenom" est défini et n'est pas vide
    if (isset($_POST["prenom"]) && !empty($_POST["prenom"])) {
        // Stocker le prénom dans un cookie
        setcookie('prenom', $_POST["prenom"], time() + 3600 * 24 * 30); // Expire dans 30 jours
        // Rediriger l'utilisateur vers la page pour éviter de soumettre le formulaire à nouveau
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

// Vérifier si l'utilisateur est déjà connecté
if (isset($_COOKIE['prenom'])) {
    // Si oui, afficher un message de bienvenue et le bouton de déconnexion
    echo "Bonjour " . htmlspecialchars($_COOKIE['prenom']) . " ! ";
    echo '<form method="post"><input type="submit" name="deco" value="Déconnexion"></form>';
} else {
    // Sinon, afficher le formulaire de connexion
    echo '<form method="post">
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom">
            <input type="submit" name="connexion" value="Connexion">
          </form>';
}

// Gérer la déconnexion si le bouton "Déconnexion" est cliqué
if (isset($_POST['deco'])) {
    // Supprimer le cookie en définissant son expiration à une date passée
    setcookie('prenom', '', time() - 3600); // Expiration immédiate pour supprimer le cookie
    // Rediriger l'utilisateur vers la page pour éviter de soumettre le formulaire à nouveau
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>
