<?php
// 1 Factorial 
function factorial($n){
    $r = 1;

    for($i = $n; $i > 0; $i--)  {
        $r *= $i;
    }

    return $r;
}

// echo factorial(5);

// 2 calculadora
// a 


// b 

function calculadora($n1, $n2, $operacion){
    
    $sumar = fn($x, $y) => $x + $y;
    $restar = fn($x, $y) => $x - $y;
    $multiplicar = fn($x, $y) => $x * $y;
    $dividir = fn($x, $y) => $x / $y;

    switch($operacion){
        case 'sumar':
            echo $sumar($n1, $n2);
            break;

        case 'restar':
            echo ($restar($n1, $n2));
            break;

        case 'multiplicar':
            echo ($multiplicar($n1, $n2));
            break;

        case 'dividir':
            echo ($dividir($n1, $n2));
            break;
        
        default:
            break;
    }
}

calculadora($_GET['n1'], $_GET['n2'], $_GET['action']);

//  3

?>