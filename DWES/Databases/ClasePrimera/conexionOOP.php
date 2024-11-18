<?php
    $servername = 'localhost';
    $database = 'empresa';
    $username = 'root';
    $password = '';

    error_reporting(0);
    mysqli_report(MYSQLI_REPORT_OFF);

    $conexion = new Mysqli($servername, $username, $password, $database);

    if($conexion->connect_errno){
        die('La conexion ha fallado: ' . $conexion->connect_errno);
    }

    echo '<h3>Conexion realizada correctamente</h3>';
    
    mysqli_close($conexion);
?>