<?php

// Creamos la interfaz para los archivos. 


interface Archivo {

    public function abrir();
}

// Creamos las clases a utilizar. 

class ArchivoWindows7 {

    public function abrirArchivo() {

        return "Abriendo archivo en formato Windows 7 adaptado.";
    }
}

// implementa la interfaz para windows 10

class ArchivoWindows10 implements Archivo {
    public function abrir() {
        return "Abriendo archivo en formato Windows 10";
    }
}



// Adaptador para hacer compatible Windows 7 con Windows 10

class AdaptadorWindows7 implements Archivo {
    private $archivoWindows7;

    public function __construct(ArchivoWindows7 $archivoWindows7) {

        $this->archivoWindows7 = $archivoWindows7;
    }

    public function abrir() {
        return $this->archivoWindows7->abrirArchivo();
    }
}

// le pasamos al adaptador el archivo de windows 7

$archivoWin7 = new ArchivoWindows7();

$adaptador = new AdaptadorWindows7($archivoWin7);

$archivoWin10 = new ArchivoWindows10();

echo $adaptador->abrir() . "\n";
echo $archivoWin10->abrir() . "\n";



?>