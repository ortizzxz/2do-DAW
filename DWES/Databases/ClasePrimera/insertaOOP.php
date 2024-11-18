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

    $sql = "INSERT INTO USUARIO VALUES(null, 'Mateo', 'admin', 2)";
    $insert = $conexion->query($sql);

    if($insert){
        echo 'Registrado correctamente';
    }else{
        echo 'Error' . $conexion->connect_error;
    }
    
?>