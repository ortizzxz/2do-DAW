<?php
/* Funcion para pintar una tabla de ajedrez */
function creaTable(){ 
    
    $piezasBlancas=array("torreb","caballob","alfilb","reinab","reyb","alfilb","caballob","torreb");
    $piezasNegras=array("torren","caballon","alfiln","reinan","reyn","alfiln","caballon","torren");
    
    for($i = 0; $i < 8; $i++){
        echo '<tr>';

        for($a = 0; $a < 8; $a++){
            if($i%2==0){
                if($i == 6){
                    if($a%2==0){
                        echo '<td class="blanca"><img src="./fichasAjedrez/peon-negro.png"></td>';
                    }else {
                        echo '<td class="gris"><img src="./fichasAjedrez/peon-negro.png"></td>';
                    } 
                }else{
                    if($a%2==0){
                        echo '<td class="blanca">&nbsp;</td>';
                    }else {
                        echo '<td class="gris">&nbsp;</td>';
                    } 
                }
            }else{
                if($i == 1){
                    if($a%2==0){
                        echo '<td class="gris"><img src="./fichasAjedrez/peon-negro.png"></td>';
                    }else {
                        echo '<td class="blanca"><img src="./fichasAjedrez/peon-negro.png"></td>';
                    } 
                }else{
                    if($a%2==0){
                        echo '<td class="gris">&nbsp;</td>';
                    }else {
                        echo '<td class="blanca">&nbsp;</td>';
                    } 
                }

            }
        }

        echo '<tr />';
    }
    
}

?>