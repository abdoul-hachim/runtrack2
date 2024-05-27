
    <?php
    // Fonction pour vérifier si un nombre est premier
    function isPrime($number) {
        if ($number < 2) {
            return false;
        }
        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i == 0) {
                return false;
            }
        }
        return true;
    }

    // Parcourir les nombres de 2 à 1000 et vérifier s'ils sont premiers
    for ($i = 2; $i <= 1000; $i++) {
        if (isPrime($i)) {
            echo "$i<br />";
        }
    }
    ?>

