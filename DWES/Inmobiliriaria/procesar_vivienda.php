<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'Vivienda.php';
require 'ValidadorVivienda.php';
require 'AlmacenamientoVivienda.php';
require 'ProcesarVivienda.php';

$validador = new ValidadorVivienda();
$almacenamiento = new AlmacenamientoVivienda('datos/viviendas.txt');
$procesador = new ProcesarVivienda($validador, $almacenamiento);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $procesador->procesarFormulario($_POST, $_FILES['foto']);
}
?>