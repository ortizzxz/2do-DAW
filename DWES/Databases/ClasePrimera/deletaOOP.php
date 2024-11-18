<?php
    $servername = 'localhost';
    $database = 'empresa';
    $username = 'root';
    $password = '';

    error_reporting(0);
    mysqli_report(MYSQLI_REPORT_OFF);

    $conexion = new mysqli($servername, $username, $password, $database);

    if($conexion->connect_error){
        die('La conexion ha fallado: ' . $conexion->connect_error);
    }

    $sql = "DELETE FROM usuario WHERE nombre = 'Mateo'";
    $delete = $conexion->query($sql);

    if($delete){
        echo 'Borrado correctamente';
    }else{
        echo 'Error' . $conexion->connect_error;
    }
    
?>