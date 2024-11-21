<?php
require_once './Library/MyPDO.php';
require_once './Config/ConstDB.php';

use Library\MyPDO;

try {
    $conexion = new MyPDO();
    $producto = "' OR '1'='1"; 

    try {
        // $query = "DELETE FROM stock WHERE 1=1";
        $query = "DELETE FROM stock WHERE producto = '$producto'";

        $conexion->query($query);


    } catch (PDOException $e) {
        echo 'Error: '. $e;
    }
} catch (PDOException $e) {
    echo 'Error: '. $e;
} finally {
    unset($conexion);
}
?>