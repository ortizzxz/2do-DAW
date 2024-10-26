<?php
    function leerArchivo(){
        $soloLectura = fopen("fichero.txt", "r");
    
        if($soloLectura){
    
            while( !feof($soloLectura)){
                $buffer = fgets($soloLectura);
                echo $buffer;
            }
            
            fclose($soloLectura);
        }
    }
    
    function addLineArchivo(){
        $soloEscritura = fopen("ficheroEscritura.txt", "a");
        $texto = "añado linea \r\n";

        if($soloEscritura){
            fwrite($soloEscritura, $texto);
            fclose($soloEscritura);
        }
    }

    function copyArchivo(){
        if( copy("ficheroEscritura.txt" ,"ficheroCopia.txt")){
            if(rename("ficheroCopia.txt", ("nuevo" . "archivoCopia.txt"))){
                unlink("nuevo" . "ficheroCopia.txt");
            }
        }
    }

    copyArchivo();
?>