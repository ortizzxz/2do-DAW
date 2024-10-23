<?php
    /* VAMOS A SIMULAR UNA BASE DE DATOS */
    /* VAMOS A UTILIZAR ARRAYS ASOCIATIVOS (SIMILARES A UN MAPA EN JAVA) */

    $usuarios = ["admin" => "claveadmin",
                 "usuario" => "claveusuario"
                ];
                
    // un poco de estos arrays es que para recorrerlos usamos un foreach
    foreach($usuarios as $s){
        echo "$s < br />";
    };
?>