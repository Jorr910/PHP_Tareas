<?php

/* Crea una función llamada esPrimo que determine si un número dado es primo o no. Un número primo es aquel que solo es divisible por 1 y por sí mismo. */

function esPrimo($numero) {

    if ($numero <= 1) {
        return false;
    }

    for ($i = 2; $i <= $numero / 2; $i++) {
        if ($numero % $i == 0) {
            return false;
        }
    }

    return true;
}

// USOOO 

$numero = 3; 

print "Probando con ";

if (esPrimo($numero)) {
    echo "$numero, es un número primo.";
} else {
    echo "$numero, no es un número primo.";
}

$numero = 5; 

echo "\n Probando con ";

if (esPrimo($numero)) {
    echo "$numero, es un número primo.";
} else {
    echo "$numero, no es un número primo.";
}

$numero = 10; 

print "\n Probando con ";


if (esPrimo($numero)) {
    echo "$numero, es un número primo. ";
} else {
    echo "$numero, no es un número primo. ";
}


?>