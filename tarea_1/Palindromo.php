<?php

/* Problema de Palíndromos:
Implementa una función llamada esPalindromo que determine si una cadena de texto dada es un palíndromo. Un palíndromo es una palabra, frase o secuencia que se lee igual en ambas direcciones. */

function esPalindromo($texto) {

    // replace espacios en blanco, que sean minusculas y la logitud
   
    $texto = strtolower(str_replace(' ', '', $texto));

    $longitud = strlen($texto);

    // validación 

    for ($i = 0; $i < $longitud / 2; $i++) {
      
    
        if ($texto[$i] != $texto[$longitud - $i - 1]) {

            return false;
        }
    }

    return true;
}

// PRUEBAAA 

$texto = "Yo hago yoga hoy"; 

echo "\n LA FRASE: ";

if (esPalindromo($texto)) {
    echo "'$texto' es un palíndromo.";
} else {
    echo "'$texto' no es un palíndromo.";
}


$texto = "Atar a la rata"; 

echo "\n LA FRASE: ";

if (esPalindromo($texto)) {
    echo "'$texto' es un palíndromo.";
} else {
    echo "'$texto' no es un palíndromo.";
}

$texto = "Holiwis clase"; 

echo "\n LA FRASE: ";

if (esPalindromo($texto)) {
    echo "'$texto' es un palíndromo.";
} else {
    echo "'$texto' no es un palíndromo.";
}

?>


