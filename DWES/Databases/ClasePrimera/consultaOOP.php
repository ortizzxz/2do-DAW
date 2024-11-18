<?php
    $servername = 'localhost';
    $database = 'empresa';
    $username = 'root';
    $password = '';

    error_reporting(0);
    mysqli_report(MYSQLI_REPORT_OFF);

    $conexion = @new mysqli($servername, $username, $password, $database);

    if($conexion->connect_error){
        die('La conexion ha fallado: ' . $conexion->connect_error);
    }

    $sql = 'SELECT * FROM usuario';
    $query = $conexion->query($sql);

    if($resultado = $conexion->query($sql)){

        // Un array asociativo
        // while($row = $query->fetch_assoc()){
        //     echo 'Codigo: ' . $row['codigo'] . ', Nombre: ' . $row['nombre'] . ', Rol: ' . $row['rol'] . '<br />'; 
        // }

        // Un objeto
        while($obj = $resultado->fetch_object()){
            echo 'Codigo: ' . $obj->codigo . ', Nombre: ' . $obj->nombre . ', Rol: ' . $obj->rol . '<br />'; 
        }

        $conexion->close();
    }else{
        echo 'No hay registros';
    }
    
?>