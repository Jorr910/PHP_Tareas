<?php

function mergeSort($arr) {

    if(count($arr) <= 1) return $arr;

    // Dividimos en 2. 

    $mid = floor(count($arr) / 2);

    // Definimos derecha e izquierda. 

    $left = array_slice($arr, 0, $mid);
    $right = array_slice($arr, $mid);

    // ordenamos recursivamente. 
    $left = mergeSort($left);
    $right = mergeSort($right);

    // llamamos a otra función de fusión
    return merge($left, $right);
}

// Función para fusionar ambar ramas para mostrar los resultados


function merge($left, $right) {
    $result = [];

    // Incializamos en 0

    $i = $j = 0;

    // Compararamos 

    while ($i < count($left) && $j < count($right)) {

        if ($left[$i] <= $right[$j]) {
            $result[] = $left[$i];
            $i++;   

        } else {

            $result[] = $right[$j];
            $j++;
        }
    }

    // Agregamos los restantes en izq

    while ($i < count($left)) {

        $result[] = $left[$i];

        $i++;
    }

    // Agregamos los restantes en izq}

    while ($j < count($right)) {

        $result[] = $right[$j];
        $j++;
    }

    return $result;
}

// PRUEBAS:  

$compañeres = ["Jairo", "Erick", "Ernesto", "Karla", "Ana", "Zara"];

echo "Lista original:\n";
print_r($compañeres);


$ordenmundial = mergeSort($compañeres);

// Mostrar la lista ordenada
echo "\nLista ordenada:\n";
print_r($ordenmundial);

?>
