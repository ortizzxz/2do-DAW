<?php
/* Funcion para pintar una tabla de ajedrez por pantalla haciendo uso de las imagenes
 * contenidas en el fichero fichasAjedres/
*/
function creaTable(){ 
    
    $piezasBlancas = array("torreb","caballob","alfilb","reinab","reyb","alfilb","caballob","torreb");
    $piezasNegras = array("torren","caballon","alfiln","reinan","reyn","alfiln","caballon","torren");
    
    for($i = 0; $i < 8; $i++){
        // bucle inicial para crear los tr donde $i => fila 
        echo '<tr>';

        // bucle indexado donde $a => columna
        for($a = 0; $a < 8; $a++){
            $class = ($i + $a) % 2 == 0 ? 'blanca' : 'gris'; // nFila + nColummna / 2 => posicion 
            
            echo "<td class='$class'>";
            
            if($i == 0){
                echo "<img src='./fichasAjedrez/{$piezasNegras[$a]}.png'>";
            } else if($i == 1){
                echo "<img src='./fichasAjedrez/peon-negro.png'>";
            } else if($i == 6){
                echo "<img src='./fichasAjedrez/peon-blanco.png'>";
            } else if($i == 7){
                echo "<img src='./fichasAjedrez/{$piezasBlancas[$a]}.png'>";
            } else {
                echo '&nbsp;';
            }

            echo '</td>';
        }

        echo '</tr>';
    }
    
}
?>  