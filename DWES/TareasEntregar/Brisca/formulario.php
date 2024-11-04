<?php

function imprimirFormulario(){

 echo "<form action='logicaBrisca.php' method='post'>";
    echo    "<button type='submit' name='opcionSeleccionada' value='3' >Jugar 3 Cartas</button>";
    echo    "<button type='submit' name='opcionSeleccionada' value='10' >Jugar 10 Cartas</button>";
    echo    "<br /> <br />";
 echo "</form>";
}
?>