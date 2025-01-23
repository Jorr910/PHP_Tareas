<?php

// Interfaz para mostrar la salida

interface EstrategiaSalida {
    public function mostrar($mensaje);
}

// Implementaciones 
class SalidaConsola implements EstrategiaSalida {
    public function mostrar($mensaje) {
        echo "Salida en consola: " . $mensaje . "\n";
    }
}

// JSON 

class SalidaJSON implements EstrategiaSalida {
    public function mostrar($mensaje) {
        echo json_encode(["mensaje JSON" => $mensaje]) . "\n";
    }
}

// .TXT

class SalidaArchivo implements EstrategiaSalida {
    public function mostrar($mensaje) {

        // Crear el archivo

        file_put_contents("salida.txt", $mensaje . "\n", FILE_APPEND);

        echo "Mensaje guardado en archivo salida.txt\n";
    }
}

// ESTRATEGIA

class ContextoSalida {
    private $estrategia;

    public function __construct(EstrategiaSalida $estrategia) {

        $this->estrategia = $estrategia;
    }

    public function ejecutar($mensaje) {

        $this->estrategia->mostrar($mensaje);
    }
}

// USO:

$mensaje = "Hola, este es un mensaje de prueba.";

echo "\n";
$salidaConsola = new ContextoSalida(new SalidaConsola());
$salidaConsola->ejecutar($mensaje);
echo "\n";

$salidaJSON = new ContextoSalida(new SalidaJSON());
$salidaJSON->ejecutar($mensaje);
echo "\n";

$salidaArchivo = new ContextoSalida(new SalidaArchivo());
$salidaArchivo->ejecutar($mensaje);
echo "\n";

?>