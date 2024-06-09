<?php
session_start();

// Réinitialiser le jeu si le bouton "Réinitialiser la partie" est cliqué
if (isset($_POST['reset'])) {
    unset($_SESSION['grille']);
}

// Initialiser la grille si elle n'existe pas déjà en session
if (!isset($_SESSION['grille'])) {
    $_SESSION['grille'] = [
        ['-', '-', '-'],
        ['-', '-', '-'],
        ['-', '-', '-']
    ];
}

// Fonction pour vérifier si un joueur a gagné
function verifierVictoire($grille, $symbole) {
    // Vérifier les lignes
    for ($i = 0; $i < 3; $i++) {
        if ($grille[$i][0] == $symbole && $grille[$i][1] == $symbole && $grille[$i][2] == $symbole) {
            return true;
        }
    }

    // Vérifier les colonnes
    for ($j = 0; $j < 3; $j++) {
        if ($grille[0][$j] == $symbole && $grille[1][$j] == $symbole && $grille[2][$j] == $symbole) {
            return true;
        }
    }

    // Vérifier les diagonales
    if ($grille[0][0] == $symbole && $grille[1][1] == $symbole && $grille[2][2] == $symbole) {
        return true;
    }
    if ($grille[0][2] == $symbole && $grille[1][1] == $symbole && $grille[2][0] == $symbole) {
        return true;
    }

    return false;
}

// Vérifier si un joueur a gagné
$gagneX = verifierVictoire($_SESSION['grille'], 'X');
$gagneO = verifierVictoire($_SESSION['grille'], 'O');
$matchNul = false;

// Vérifier si toutes les cases sont remplies et aucun joueur n'a gagné
if (!$gagneX && !$gagneO) {
    $casesRemplies = 0;
    foreach ($_SESSION['grille'] as $ligne) {
        foreach ($ligne as $case) {
            if ($case != '-') {
                $casesRemplies++;
            }
        }
    }
    if ($casesRemplies == 9) {
        $matchNul = true;
    }
}

// Si un joueur a gagné ou match nul, réinitialiser la grille
if ($gagneX || $gagneO || $matchNul) {
    $_SESSION['grille'] = [
        ['-', '-', '-'],
        ['-', '-', '-'],
        ['-', '-', '-']
    ];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeu du Morpion</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 20px auto;
        }
        td {
            border: 1px solid black;
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 24px;
        }
        button {
            width: 100%;
            height: 100%;
            font-size: inherit;
        }
        .message {
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Jeu du Morpion</h1>

    <!-- Affichage du tableau de jeu -->
    <form method="post">
        <table>
            <?php foreach ($_SESSION['grille'] as $ligne): ?>
                <tr>
                    <?php foreach ($ligne as $case): ?>
                        <td>
                            <?php if ($case == '-'): ?>
                                <button type="submit" name="case" value="<?php echo $case; ?>"><?php echo $case; ?></button>
                            <?php else: ?>
                                <?php echo $case; ?>
                            <?php endif; ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>
        <!-- Bouton de réinitialisation -->
        <div class="message">
            <?php if ($gagneX): ?>
                X a gagné !
            <?php elseif ($gagneO): ?>
                O a gagné !
            <?php elseif ($matchNul): ?>
                Match nul !
            <?php endif; ?>
        </div>
        <input type="submit" name="reset" value="Réinitialiser la partie">
    </form>
</body>
</html>
