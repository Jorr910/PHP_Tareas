<?php

/*

Crear un programa que contenga dos personajes: "Esqueleto" y "Zombi". Cada personaje tendrá una lógica diferente en sus ataques y velocidad. La creación de los personajes dependerá del nivel del juego:

- En el nivel fácil se creará un personaje "Esqueleto".

- En el nivel difícil se creará un personaje "Zombi".

*/

// CREAMOS LAS INTERFACE DE LAS CARACTERISTICA POR PERSONAJE

interface Personaje {
    public function atacar();

    public function velocidad();
}

// cREAMOS LAS CLASES 

class Esqueleto implements Personaje {

    public function atacar() {

        return "Esqueleto ataca con pica huesos.";
    }

    public function velocidad() {
        return "Velocidad: Baja.";
    }
}


class Zombi implements Personaje {
    public function atacar() {
        return "Zombi ataca con los dientes. grrr.";
    }
    public function velocidad() {
        return "Velocidad: Media.";
    }
}

// Definamos la clase que contrendrá el nivel de dificultad 

class PersonajeFactory {
    public static function crearPersonaje($nivel) {
        if ($nivel === 'facil') {
            return new Esqueleto();
        } elseif ($nivel === 'dificil') {
            return new Zombi();
        }
        throw new Exception("Nivel no válido");
    }
}

// SELECCIONA EL NIVEL FACIL

$nivelJuego = 'dificil';
$personaje = PersonajeFactory::crearPersonaje($nivelJuego);

// FUNCIONAMIENTO:

echo "\n";
print $nivelJuego;
echo " es el nivel seleccionado.  \n";
echo "............................................ \n";
echo $personaje->atacar() . "\n";
echo $personaje->velocidad() . "\n";

// SELECCIONA EL NIVEL FACIL

$nivelJuego = 'facil';
$personaje = PersonajeFactory::crearPersonaje($nivelJuego);


echo "\n";
echo "Prueba 2 \n";
echo "--------------------------------------------";
echo "\n";
print $nivelJuego;
echo " es el nivel seleccionado.  \n";
echo "............................................ \n";
echo $personaje->atacar() . "\n";
echo $personaje->velocidad() . "\n";
