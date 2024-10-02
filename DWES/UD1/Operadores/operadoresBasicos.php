<?php
    $num1 = 3;
    $num2 = 5;

    echo "El número uno es: $num1, y el dos es: $num2 </br>";
    
    // para concatenar hay que utilizar ".(concatenado)."
    echo "La suma de $num1 y $num2 es ".($num1+$num2). "</br>";

    echo "La division de $num2 entre $num1 es ". sprintf("%.2f", ($num2/$num1));
?>