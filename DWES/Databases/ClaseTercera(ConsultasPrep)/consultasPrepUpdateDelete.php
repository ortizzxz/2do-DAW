<?php
    require 'constDB.php';

    try{
        $bd = new PDO("mysql:host=" . SERVERNAME . "; dbname=" . DATABASE . "; charset=utf8mb4", USERNAME, PASSWORD);
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try{

            // UPDATE
            $currentName = 'Admin';
            $toSetName = 'Marquitos';
 
            $s = $bd->prepare('UPDATE usuario SET nombre = :toSetName WHERE nombre = :currentName');
            $s->setFetchMode(PDO::FETCH_ASSOC);

            $s->bindValue(':toSetName', $toSetName);
            $s->bindValue(':currentName', $currentName);
            
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