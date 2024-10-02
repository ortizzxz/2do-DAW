<?php

// function mostrarN(){
// $n = array(
//     'uno' => 'one',
//     'dos' => 'two',
//     'tres' => 'three',
//     'cuatro' => 'four',
//     'cinco' => 'five',
//     'seis' => 'six',
//     'siete' => 'seven',
//     'ocho' => 'eight',
//     'nueve' => 'nine',
//     'diez' => 'ten'
// );



 

// foreach($n as $esp => $ing){
//     echo "<tr>";
//     echo "<td>$esp</td>";
//     echo "<td>$ing</td>";
//     echo "</tr>";
// }

// }


// // DADOS
// $nR = rand(1, 6);
// $nR2 = rand(1, 6);
// $mayor = 0;

// if(($nR > $nR2) ? $mayor = $nR : $mayor = $nR2);

// echo("Dado 1: $nR <br/> Dado 2: $nR2 <br/> El mayor es: $mayor");

// binario
echo "<table border='1'>";
echo    "<tr>";
echo        "<th>Decimal</th>";
echo        "<th>Binario</th>";
echo        "<th>Octal</th>";
echo        "<th>Hexa</th>";
echo    "</tr>";

for($i = 1 ; $i <= 20; $i++){
    printf("<tr><td> %d </td> <td>%b</td><td>%o</td><td>%X</td></tr>", $i, $i, $i, $i);
}
?>

<!-- <html>
    <table border="1">
        <tr>
            <th>Español</th>
            <th>Inglés</th>
        </tr>

        <?php mostrarN() ?> 
    </table>
</html> -->