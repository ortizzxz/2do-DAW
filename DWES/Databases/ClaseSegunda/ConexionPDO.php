<?php
    require 'constDB.php';

    try{
        $conexion = new PDO("mysql:host=" . SERVERNAME . "; dbname=" . DATABASE . "; charset=utf8mb4", USERNAME, PASSWORD);

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Conexion exitosa';

    }catch(PDOException $e){
        echo "Error " . $e->getMessage();
    }

    unset($conexion);

?>