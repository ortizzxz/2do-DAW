<?php
    $servername = 'localhost';
    $database = 'empresa';
    $username = 'root';
    $password = '';

    error_reporting(0);
    mysqli_report(MYSQLI_REPORT_OFF);

    $conexion = mysqli_connect($servername, $username, $password, $database);

    if(!$conexion){
        die('La conexion ha fallado: ' . mysqli_connect_error());
    }

    echo '<h3>Conexion realizada correctamente</h3>';
    
    mysqli_close($conexion);
?>