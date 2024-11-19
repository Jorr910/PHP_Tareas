<?php 

// Declaramos las listas. 

$numero_naturales = [1,2,3,4,5,6,7,8,9,10]; 

$numeros_primo = [2,3,5,7,11,13,17,19]; 

function list_inv($arr) {

    $inversion = array_reverse($arr);
    return  $inversion; 
}

// Ejecutamos la función 

$resultados = list_inv($numero_naturales); 
$resulta2 = list_inv($numeros_primo);

print ("Lista original - Núm Naturales: \n");
print_r($numero_naturales); 
print ("Lista invertida: \n"); 
print_r($resultados);

// Numeros primos: 

print ("Lista original- Núm Primos: \n");
print_r($numeros_primo); 
print ("Lista invertida: \n"); 
print_r($resulta2);



?>