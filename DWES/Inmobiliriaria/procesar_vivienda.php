<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); // Inicia la sesión al principio

require 'Vivienda.php';
require 'ValidadorVivienda.php';
require 'AlmacenamientoVivienda.php';
require 'ProcesarVivienda.php';

$validador = new ValidadorVivienda();
$almacenamiento = new AlmacenamientoVivienda('datos/viviendas.xml');
$procesador = new ProcesarVivienda($validador, $almacenamiento);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $resultado = $procesador->procesarFormulario($_POST, $_FILES['foto']);

    if (is_array($resultado)) {
        $_SESSION['errores'] = $resultado;
        header('Location: index.php');
        exit;
    }
}

?>