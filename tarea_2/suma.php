<?php

// Declaramos la lista a trabajar: 

$numero_naturales = [1,2,3,4,5,6,7,8,9,10]; 

function sumar_pares($arr) {

    // Iniciamos desde 0 cualquier suma: 
    $suma = 0; 

    // recorremos la lista con un foreach 

    foreach ($arr as $numero) {

        // Número par = 2*n por lo tanto 2*n/2 no debe dar risiduos

        if($numero %2 == 0) {
            $suma += $numero;
        }
    } 

    return $suma; 
}

// Ejecutamos la función: 

$resultado = sumar_pares($numero_naturales
); 

print ("La suma de los numeros pares es: ");
print($resultado); 










?>