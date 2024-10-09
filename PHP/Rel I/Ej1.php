<?php
// 1. tipos
// Crear tres variables: país, habitantes y continente a los que les darás un valor. 

// A continuación, muestra su valor por pantalla junto con el tipo de dato que tiene cada una de ellas
    $pais = "venezuela";
    $habitantes = "28M";
    $continente = "Sudamerica";

    echo "$pais, tipo de dato: " .gettype($pais). " <br/>"; 
    echo "$habitantes, tipo de dato: " .gettype($habitantes). " <br/>"; 
    echo "$continente, tipo de dato: " .gettype($continente). " <br/>"; 
    echo "<br />";

//     2. printf - round
//  Escribe un programa que calcule la longitud, la superficie y el volumen de una esfera dado el radio. 
// Se pide que el resultado, en todos los casos, solo con dos decimales.

// Ilustra las diferencias entre usas la función round() y la función printf().
    $radio = 20;

    $l = (2 * 3.14 * $radio);
    $s = (4 * 3.14 * ($radio * $radio));
    $v = ((4/3) * 3.14 * ($radio * $radio * $radio));

    echo round($l, 2) . " | Utilizando round() <br/>"; 
    printf("Superficie: %u", $s);
    printf("<br/>Volumen: %u", $v);
    echo "<br /> Volumen con round(): " . round($v,2). "<br/> <br/>"; 

    // 3. ecuación segundo grado
    // Escribe un programa que resuelva una ecuación de segundo grado.
    // Aprovecha para ilustrar la diferencia entre echo, print y printf.
    
    // Recuerda que aún no sabemos cómo recoger valores desde el teclado.

    // -b + sqrt ( (b*b) - (4 * a * c) ) / 2 * A
    
    $a = 12;
    $b = 5;
    $c = -45;
    $sq = round(sqrt(($b * $b) - (4 * $a * $c)), 2);

    $x1 = ( (-$b + $sq )  / (2 * $a) ); 
    $x2 = ( (-$b - $sq )  / (2 * $a) );;

    echo round($x1, 2)."<br/>";
    echo round($x2, 2)."<br/>";


//     4. conversor dólar
// Realiza un conversor de euros a dólares

    $dolar = 50; 
    $euro = $dolar * 1.14;

    echo "<br/> $dolar Dolares equivalen a $euro Euros <br />";

    // 5 
    echo "<h1>EJ5</h1>";
    $documentacion = "https://www.php.net/manual/es/function.date.php";
    
    $hoy = date('d-m-y');
    echo "Hoy: $hoy <br/>";

    $ayer = date('d-m-y' , strtotime("-1 day"));
    echo "Ayer: $ayer <br/>";
    
    $manana = date('d-m-y' , strtotime("+1 day"));
    echo "Mañana: $manana <br />";

    $ano = date('d-m-y', strtotime('+1 year'));
    echo "En un año: $ano";

    // 6  switch
    echo "<h1>EJ6</h1>";

    /*6. cadena al revés
    Dada una variable que contenga una cadena de varios caracteres, escribe un script que nos permita escribir esa cadena al revés (empezando desde la última letra y acabando en la primera) sin hacer uso de la función strrev(). Para solucionarlo tienes que tener en cuenta que existen funciones que permiten extraer el carácter que ocupa una posición determinada de una cadena. Por otro lado,  tienes que trabajar con estructuras iterativas, para recorrer las distintas posiciones que tiene una cadena. Eso sí, necesitamos conocer su longitud, pero para eso también tenemos funciones de cadena.

    Ten en cuenta que si hay caracteres especiales, como eñes o letras con tilde, ocupan más de un byte y no se mostrarán adecuadamente. Busca la función adecuada e cadenas de caracteres que debes usar. */

    $cadena = "españa";

    $s = strlen($cadena);

    for ( $i = ($s-1); $i >= 0; $i--){
        echo($cadena[$i]);
    };

?>