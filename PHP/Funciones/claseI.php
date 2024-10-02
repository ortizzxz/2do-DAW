<?php
/*  SINTAXIS
    function nombre(parametro){
        // logica
        
        return $variable;
    }
*/
$a = 1;

function suma($num1, $num2){
    $suma = $num1 + $num2;
    return $suma;
}

echo 'La suma de 4 y 6 es ' .suma(4, 6);

?>