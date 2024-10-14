<?php
/* 1. Ejercicio 1
Escribe un script que almacene un array de 8 números enteros:

a.      recorrerá el array y lo mostrará

b.       lo ordenará y lo mostrará

c.       mostrará su longitud

d.       buscará un elemento dentro del array

e.      buscará un elemento dentro del array, pero por el parámetro que llegue a la URL

Para mostrar los elementos del array en cada uno de los apartados se creará una función llamada mostrarArray(). */

$a = [12, 234, 24, 56, 231, 3, 5, 100];

function mostrar($a){
    foreach($a as $x){
        echo "$x <br />";
    }
}

asort($a);


// mostrarlo ordenado
// mostrar($a);

// echo count($a);

// 
function buscarElemento($elemento){
    $a = [12, 234, 24, 56, 231, 3, 5, 100];

    if(isset($_GET['elemento'])){
        $elemento = $_GET['elemento'];

        foreach($a as $x){
            if($x == $elemento){
                return "El elemento existe en el array";
            }
        }

        return "El elemento no existe en el array";
    }
}

// echo (buscarElemento($_GET['elemento']));

/* 2. Ejercicio 2
Crea un script que añada valores a un array mientras que su longitud sea menor que 120.

Después mostrará la información del array por pantalla */

$s = "asojdjsaasldkbasdiubasdnasodnasiubdasdja";

while(strlen($s) < 120){
    $s .= "p";
}

// echo $s;

/* 3. Ejercicio 3
Escribe un script que rellene un array con valores aleatorios (0,1) y lo muestre. A continuación, calcularemos su 
complementario y también la mostraremos.

Por ejemplo:
1 1 1 0 0 0 
0 0 0 1 1 1 
*/
function randomBi(){
    $a = [];
    $b = [];

    for ($i = 0; $i < 7; $i++){
        $a[$i] = rand(0, 1);
    }

    for ($i = 0; $i < 7; $i++){
        if ($a[$i] == 1){
            $b[$i] = 0;
        }else{
            $b[$i] = 1;
        }
    }

    echo implode($a). "</br>";
    echo implode($b);
}
/* 
Escriba un script PHP que:

Guarde en un array 20 valores aleatorios entre 0 y 100.
En un segundo array, llamado cuadrados, deberá almacenar los cuadrados de los valores que hay en el primer array.
En un tercer array, llamado cubo, se deben almacenar los cubos de los valores que hay en el primer array.
Por último, se mostrará el contenido de los tres arrays dispuesto en tres columnas paralelas. */

function CuadradoyCubo(){

    $a = [];
    
    for ($i = 0; $i < 20; $i++){
        $a[$i] = rand(0, 100);
    }
    
    $cuadrados = [];
    
    for ($i = 0; $i < count($a); $i++){
        $cuadrados[$i] = ($a[$i] * $a[$i]); 
    }

    $cubos = [];
    
    for ($i = 0; $i < count($a); $i++){
        $cubos[$i] = ($a[$i] * $a[$i] * $a[$i]); 
    }
    
    echo "<table border=1><tr><td>Numero</td><td>Cuadrado</td><td>Cubo</td></tr>";
    
    for($i = 0; $i < count($a); $i++){
        echo "<tr>";
        echo "<td>$a[$i]</td>";
        echo "<td>$cuadrados[$i]</td>";
        echo "<td>$cubos[$i]</td>";
        echo "</tr>";
    }
    
    echo "</table>";
}

function boletin(){
    $notas = [
        "Matematicas" => [6, 7, 8],
        "Lengua" => [7, 6, 2],
        "Fisica" => [8, 10, 9],
        "Latin" => [3, 1, 4],
        "Ingles" => [3, 2, 5],
    ];


    for ( $i = 1; $i <= 5; $i++ ){
        echo "<td>";

        if($i == 1){    
            echo "Asignatura";
        } else if ($i != 1 && $i != 5 ){
            echo "Trimestre " . $i-1; 
        }else{
            echo "Media";
        }
        

        echo "</td>";
    }
}



?>  


<html>
<head>
    <style>
        table {
            margin: 0 auto;
            border: 1px solid black;
        }
        td, th {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
    <body>
        <h1>Boletin de Notas</h1>
        <table>
            <?php boletin(); ?>
        </table>
    </body>
</html>
