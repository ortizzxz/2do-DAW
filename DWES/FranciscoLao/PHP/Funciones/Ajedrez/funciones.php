<?php
/* Funcion para pintar una tabla de ajedrez por pantalla haciendo uso de las imagenes
 * contenidas en el fichero fichasAjedres/
*/
function creaTable(){ 
    
    $piezasBlancas = array("torreb","caballob","alfilb","reinab","reyb","alfilb","caballob","torreb");
    $piezasNegras = array("torren","caballon","alfiln","reinan","reyn","alfiln","caballon","torren");
    
    for($fila = 0; $fila < 8; $fila++){
        // bucle inicial para crear los tr donde $i => fila 
        echo '<tr>';

        // bucle indexado donde $a => columna
        for($columna = 0; $columna  < 8; $columna ++){
            $class = ($fila + $columna ) % 2 == 0 ? 'blanca' : 'gris'; // nFila + nColummna / 2 => posicion 
            
            echo "<td class='$class'>";
            
            if($fila == 0){
                echo "<img src='./fichasAjedrez/{$piezasNegras[$columna ]}.png'>";
            } else if($fila == 1){
                echo "<img src='./fichasAjedrez/peon-negro.png'>";
            } else if($fila == 6){
                echo "<img src='./fichasAjedrez/peon-blanco.png'>";
            } else if($fila == 7){
                echo "<img src='./fichasAjedrez/{$piezasBlancas[$columna ]}.png'>";
            } else {
                echo '&nbsp;';
            }

            echo '</td>';
        }
        echo '</tr>';
    }
}
?>  