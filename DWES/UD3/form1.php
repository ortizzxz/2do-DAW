<?php
    echo 'Metodo: ' . $_SERVER['REQUEST_METHOD'];
    echo "<br />";
    echo "<br />";

    $nombre = $_POST['nombre'];
    echo 'Hola ' . $nombre;
    echo "<br />";
    
    $apellido = $_REQUEST['apellidos'];
    echo 'Apellidos: ' . $apellido;
    echo "<br />";

?>