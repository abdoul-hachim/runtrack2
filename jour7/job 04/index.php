<?php 
function calcul($a, $operation, $b){
    switch ($operation){
        case '+':
            return $a + $b;
        case '-':
            return $a - $b;
        case '*':
            return $a * $b;
        case '/':
            if ($b != 0) {
                return $a / $b;
            }else{
                return "erreur : division par zéro";
            }
        case '%':
            if ($b != 0){
                return "Erreur : division par zéro";
            }
        default:
        return "Erreur : opération non reconnue";

    }
}
echo calcul(10, '+', 5) . "<br>";
echo calcul(10, '-', 5) . "<br>"; 
echo calcul(10, '*', 5) . "<br>";
echo calcul(10, '/', 5) . "<br>"; 
echo calcul(10, '%', 3) . "<br>"; 
echo calcul(10, '/', 0) . "<br>";
echo calcul(10, '^', 5) . "<br>";
?>