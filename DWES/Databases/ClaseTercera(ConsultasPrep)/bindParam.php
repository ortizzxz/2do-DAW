<?php
    require 'constDB.php';

    try{
        $bd = new PDO("mysql:host=" . SERVERNAME . "; dbname=" . DATABASE . "; charset=utf8mb4", USERNAME, PASSWORD);
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try{

            echo 'Consulta con bindParam <br/>';
            $nom = 'admin';
            $s = $bd->prepare('SELECT * FROM usuario WHERE nombre = :nombre');
            $s->setFetchMode(PDO::FETCH_ASSOC);
            $s->bindParam(':nombre', $nom);
            $nom = 'Jesus';
            $s->execute();

            while ($row = $s->fetch()){
                echo "Nombre: {$row['nombre']} <br>";
            }

            

        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }

    }catch(PDOException $e){
        echo "Error " . $e->getMessage();
    }

    unset($bd);

?>