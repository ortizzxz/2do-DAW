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

function pruebaSuma($n1, $n2){
    return suma($n1, $n2);
}

// echo 'La suma de 4 y 6 es ' .pruebaSuma(4, 6);

// funciones con parametros por defecto 
function capitales($pais, $capital = "Madrid"){
    return "la capital de $pais es $capital";
}

// echo capitales("España");
// echo '<br />';
// echo capitales("Alemania", "Berlin");

// argumentos con nombres
function moduloDaw($nombre, $profesor, $ies){
    return "El modulo $nombre es impartido por $profesor en el $ies";
} 

echo moduloDaw(
    ies : 'Francisco Ayala',
    nombre: 'DWES',
    profesor: 'Maria'
);

echo '<br/>';

// lista argumento variable
function concatena($titulo, ...$palabra){
    $resultado = "$titulo <br />";
    
    foreach($palabra as $p){
        $resultado .= $p. " ";
    }

    return $resultado;
}

echo concatena("Ciclo Formativo", "Desarrollo", "de", "aplicaciones", "web");

echo "<br/> <br/>";

// paso de argumento por valor 
function duplicar(float &$numero): float|string{
    if($numero > 0){
        $resultado = $numero * 2;
        $numero = $resultado;
        return $resultado;
    }else{
        return 'No puedes usar un numero menor igual que 0';
    }
}

$numero = 12.1;
echo duplicar($numero);
echo "<br/>"; 
echo duplicar($numero); 
echo "<br/>"; 
echo "<br/>"; 


// funciones anonimas
$multiplicador = function($a,$b) {
    return $a * $b;
};
    
    $numeros = range (1,10); // 1 2 3 4 5 6 7 8 9 10
    $numeros2 = range (1,10);
    $lista = array_map($multiplicador, $numeros, $numeros2);
    echo implode(" ", $lista);

echo "<br/>"; 
echo "<br/>";

// funcion flecha
$suma = fn($x, $y) => $x + $y;
echo $suma(3, 5);
?>