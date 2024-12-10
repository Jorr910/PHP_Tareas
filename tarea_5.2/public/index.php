<?php

// EL SALVADOR DE TODO, LA CONSOLA DE ERRORES 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// AUTOLOAD 

spl_autoload_register(function ($class) {
    $baseDir = __DIR__ . '/../src/';
    $classPath = $baseDir . str_replace('\\', '/', $class) . '.php';

    if (file_exists($classPath)) {
        require_once $classPath;
    } else {
        echo "Archivo no encontrado para la clase: $class. Ruta esperada: $classPath<br>";
    }
});

// Iniciamos sessión para guardar los datos en el localstorage 

require_once __DIR__ . '/../src/helpers/SessionHelper.php';
use helpers\SessionHelper;
SessionHelper::initSession();

// Controlador 
use Controllers\BibliotecaController;
$controller = new BibliotecaController();
$controller->handleRequest();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
</head>
<body>
    <h1>Biblioteca</h1>

    <section>

<!--Renderizado por resultados-->
        
        <?php $controller->renderForm(); ?>
        <main>
            <?php $controller->renderTable(); ?>
            <?php require __DIR__ . '/views/search_Form.php'; ?>
        </main>
</section>
</body>
</html>
