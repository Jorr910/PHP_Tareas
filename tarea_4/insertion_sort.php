<?php 

function insertionSort($arr) {

    // Verificar si tiene algo en el arreglo

    if(count($arr) <= 1) return $arr;


    for($i = 1; $i < count($arr); $i++) {
        $key = $arr[$i]; 
        $j = $i - 1; 

        // Mover a la derecha los mayores. 

        while($j >= 0 && $arr[$j] > $key) {
            $arr[$j + 1] = $arr[$j]; 
            $j--; 
        }

        // Inteframos $key en su posición 

        $arr[$j + 1] = $key;
    }

    return $arr;
}

// PRUEBAS: 

$compañeres = ["Julissa", "Erika", "Lau", "Omar", "Zelayda", "Bendición"];

echo "Lista original:\n";
print_r($compañeres);


$ordenar = insertionSort($compañeres);

echo "\nLista ordenada:\n";
print_r($ordenar);


?>