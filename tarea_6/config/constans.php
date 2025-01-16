<?php
// Detectar la URL base automáticamente (SE USO POR PROBLEMA DE RUTAS)

$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];
$path = rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . '/';

define('BASE_URL', $protocol . $host . $path);

?>