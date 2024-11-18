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

    $sql = 'SELECT * FROM usuario';
    $query = mysqli_query($conexion, $sql);

    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            echo 'Codigo: ' . $row['codigo'] . ', Nombre: ' . $row['nombre'] . ', Rol: ' . $row['rol'] . '<br />'; 
        }
    }else{
        echo 'No hay registros';
    }
    
    mysqli_close($conexion);
?>