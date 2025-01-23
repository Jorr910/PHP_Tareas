<?php

/* Crear un programa donde sea posible añadir diferentes armas a ciertos personajes de videojuegos. Debes utilizar al menos dos personajes para este ejercicio.*/

// Definir a los personajes a utilizar

interface Personajes {
    public function atacar();
}

interface PersonajeConArmas extends Personajes {}


// Base del patron de diseño decoration 

class PersonajeDecorator implements PersonajeConArmas {
    protected $personaje;

    public function __construct(Personajes $personaje) {
        $this->personaje = $personaje;
    }

    public function atacar() {
        return $this->personaje->atacar();
    }

}

// Implementamos a los personajes 

class Esqueleto implements Personajes {
    public function atacar() {
        return "Esqueleto ataca";
    }

}

// DECORADOR EPARA LAS ARMARS

class Pica extends PersonajeDecorator {
    public function atacar() {
        return $this->personaje->atacar() . " con pica hueso afilado.";
    }
}


class Craneo extends PersonajeDecorator {
    public function atacar() {
        return $this->personaje->atacar() . " con un poderoso craneo volador.";
    }
}

// EJEMPLO DE USO: 

$personajeBase = new Esqueleto();
$personaje1 = new Pica($personajeBase);
$personaje2 = new Craneo($personajeBase);

echo "personaje 1: \n";
echo $personaje1->atacar() . "\n\n";
echo "personaje 2: \n";
echo $personaje2->atacar() . "\n";

?>
