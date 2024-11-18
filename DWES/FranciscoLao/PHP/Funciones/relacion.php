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

// calculadora($_GET['n1'], $_GET['n2'], $_GET['action']);

//  3
/*Escribe una función que reciba un argumento.

Dicha función comprobará:
Si el argumento recibido es una cadena de caracteres:
en dicho caso, verificará si está vacía y si es así devolverá:   "Este es el relleno porque estaba vacía"
Si tiene contenido, devolverá la cadena recibida en mayúscula.
Si el argumento no es un string devolverá el argumento recibido más el mensaje “no es una cadena de caracteres”. */

function devuelveString($str){
    $ext = "";
    if( (isset($str) && $str !== '')  ? $ext = strtoupper($str) : $ext = 'Este es el relleno porque estaba vacía');
    return $ext;
}

// echo devuelveString($_GET['st']);

// 4 Potencias 
/*Escribe una función para calcular potencias. La función recibirá como argumentos la base y el exponente. 
El exponente es opcional y tiene por defecto el valor 2 */

function potencias($base, $exponente = 2){
    $valor = 0;

    if($exponente === 1 || $exponente === 0){
        return 1;
    } 

    for ($i = 1; $i < $exponente; $i++){
        if($valor === 0){
            $valor += $base * $base;
        }else{
            $valor = $valor * $base;
            
        }
    }

    return $valor;
}

// echo potencias(2, 0);

function fechaHoy(){
    date_default_timezone_set('Europe/Madrid');
    setlocale(LC_TIME, ES);
    $fecha = strftime("%A, %d de %B de %Y");
    return  $f;
}


// fact n 
function factorialN($n){
    $r = 1;
    if($n <= 0){
        throw Exception("error");
    }
    for($i = $n; $i > 0; $i--)  {
        $r *= $i;
    }

    return $r;
}

echo factorialN(-2);



?>