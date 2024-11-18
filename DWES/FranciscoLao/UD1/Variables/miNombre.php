<?php
 // las variables se inicializan con $ 
 // no se declara el tipo al igual que en js // como un let 

 //VARIABLES 
 $nombre = "Jesús";
 $apellido = "Ortiz";
 $edad = 21;
 $nombreCompleto= array('Jesus', 'Daniel');
 $apellidoCompleto = ["Ortiz", 'Reyes'];
 $tamArray = count($nombreCompleto);

 // CONSTANTES
 const NOMBRE = "Jesus";
 define("APELLIDO", "Ortiz");
 
 echo "Estas son variables simples que siempre se inicializan con el simbolo $ </br>";
 echo "Mi nombre: ", $nombre, ", mi apellido: ", $apellido;

 echo "</br> Estas son constantes que se pueden definir con define() o const </br>";
 echo "Mi nombre: ", NOMBRE, ", mi apellido: ", APELLIDO;

 echo "</br> Tengo ", $edad, " años";
 echo "<br />Usted tiene $tamArray nombres";
 

?>
