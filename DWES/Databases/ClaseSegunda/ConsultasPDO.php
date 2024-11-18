<?php
    require 'constDB.php';

    try{
        $bd = new PDO("mysql:host=" . SERVERNAME . "; dbname=" . DATABASE . "; charset=utf8mb4", USERNAME, PASSWORD);
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try{
            $stmt = $bd->query('SELECT * FROM usuario');
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            foreach($stmt->fetchAll() as $row){
                echo 'Nombre: ' . $row['nombre'] . ', Codigo: ' . $row['codigo'] . '<br/>';
            }
        }catch(PDOException $err){
            die('Error ejecutando la consulta SQL');
        }

    }catch(PDOException $e){
        echo "Error " . $e->getMessage();
    }

    unset($bd);

?>