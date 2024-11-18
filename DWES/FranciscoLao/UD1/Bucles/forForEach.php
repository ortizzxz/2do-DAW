<?php
    //declaracion de un array 
    $num = [4, 6, 10, 21];  
    $mayor;

    //bucle for 
    for ($i = 0; $i < count($num); $i++){
        echo " Valor del elemento $i del Array: $num[$i] <br /> ";
    };

    // condicional para que si el array es menor que 0 no agregue valor a $mayor
    if(count($num) > 0){
        $mayor = $num[0];
    } 
    
    // buscar el mayor con un for each 
    foreach ($num as $n){
        if($n > $mayor ){
            $mayor = $n; 
        }
    };

    echo "El mayor es $mayor";
?>