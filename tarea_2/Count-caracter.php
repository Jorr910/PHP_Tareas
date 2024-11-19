<?php

// Función que cuenta las letras de una oración 

function count_element($arr) {

    // array auxiliar para contar las letras

    $frecuencia = []; 

    // Iteramos cada elemento de la cadena. "strlen" nos ayuda determinar la logitud del arreglo

    for ($i=0; $i < strlen($arr); $i++) { 

        $caracter = $arr[$i];

       // verificar si se repiten los datos 

          if(array_key_exists($caracter, $frecuencia)){
      
        // Incremente los valores que se repiten
      
         $frecuencia[$caracter]++;

         } else {

            //  Que el valor por defecto por caracter en el arreglo sea 1. 

          $frecuencia[$caracter] = 1; 

         }
        
    }

    return $frecuencia;

}

// Ejemplo de uso: 

$prueba = "Holiwis, este es un contador...";
$resultado = count_element($prueba);


print ("Oración original:"); 
print ($prueba);
print("\n");
print ("Contador de caracteres: "); 
print_r($resultado);

?>