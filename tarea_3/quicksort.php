<?php

function quickSort($array) {
    $length = count($array);

    // Validación si el arreglo está vacio

    if ($length <= 1) {
        return $array;
    } else {

        // Posicionamos el pivot en el ultimo elemento.

        $pivot = $array[0];
        $left = $right = array();

        // Definimos derecha e izquierda

        for ($i = 1; $i < $length; $i++) {
            if ($array[$i] < $pivot) {
                $left[] = $array[$i];
            } else {
                $right[] = $array[$i];
            }
        }

        // Unimos los arreglos

        return array_merge(
            quickSort($left), 
            array($pivot), 
            quickSort($right)
        );
    }
}

// Pruebas con los arreglos 

$array = array(3, 1, 4, 1, 5, 9, 2, 6, 5, 3, 5);
$sortedArray = quickSort($array);

echo "Array: " . implode(", ", $array) . "\n";
echo "Reordenamiento: " . implode(", ", $sortedArray);

?>
