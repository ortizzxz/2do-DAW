<?php
    /* VAMOS A SIMULAR UNA BASE DE DATOS */
    /* VAMOS A UTILIZAR ARRAYS ASOCIATIVOS (SIMILARES A UN MAPA EN JAVA) */

    $usuarios = ["admin" => "claveadmin",
                 "usuario" => "claveusuario"
                ];
                
    // un poco de estos arrays es que para recorrerlos usamos un foreach
    // aqui basicamente accedemos al valor ya que esto es clave => valor

    foreach($usuarios as $s){
        echo "$s <br/>";
    };

    //si queremos acceder tambien a la clave hacemos un (var as clave => valor) 
    foreach($usuarios as $usuario => $clave){
        echo "$usuario : $clave <br / >";
    };
    
    


?>