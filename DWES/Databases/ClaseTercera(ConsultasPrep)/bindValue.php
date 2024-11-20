<?php
    require 'constDB.php';

    try{
        $bd = new PDO("mysql:host=" . SERVERNAME . "; dbname=" . DATABASE . "; charset=utf8mb4", USERNAME, PASSWORD);
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try{

            echo '<h1>Consulta con bindValue</h1>';
            $nom = 'Admin';
            $s = $bd->prepare('SELECT * FROM usuario WHERE nombre = :nombre');
            $s->setFetchMode(PDO::FETCH_ASSOC);
            $s->bindValue(':nombre', $nom);
            $nom = 'Jesus';
            $s->execute();

            while ($row = $s->fetch()){
                echo "Nombre: {$row['nombre']} <br>";
            }

            echo '<h1>Consulta con bindParam</h1>';
            $nom = 'Admin';
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