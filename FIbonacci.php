<?php

/* Problema de la serie Fibonacci:
Escribe una función llamada generar Fibonacci que reciba un número n como parámetro y genere los primeros n términos de la serie Fibonacci. La serie comienza con 0 y 1, y cada término subsiguiente es la suma de los dos anteriores. */

function generarFibonacci($n) {
   
    if ($n <= 0) {
        return "Ingresa un numero valido, mayor a 0.";
    }
    
    // Iniciador 

    $fibonacci = [0, 1];
    
    // Bucle for

    for ($i = 2; $i < $n; $i++) {


        $fibonacci[$i] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
    }
    
    return $fibonacci;
}

// PRUEBAAAAA: 


$n = 10; // INICIAMOS CON 10 TERMINOS

$resultado = generarFibonacci($n);

// Mostrar la serie de Fibonacci
echo "Serie de Fibonacci de $n términos: ";
echo implode(", ", $resultado);
?>