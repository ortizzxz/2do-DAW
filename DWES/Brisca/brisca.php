<?php
/* 
Utiliza un array asociativo para obtener los puntos a partir del nombre de la figura de la carta.
Suma los puntos de cada una de las cartas de su baza.
Muestra el resultado
*/

$oro = ["oros_1", "oros_2", "oros_3", "oros_4", "oros_5", "oros_6", "oros_7", "oros_10", "oros_11", "oros_12"];
$copa = ["copas_1", "copas_2", "copas_3", "copas_4", "copas_5", "copas_6", "copas_7", "copas_10", "copas_11", "copas_12"];
$espada = ["espadas_1", "espadas_2", "espadas_3", "espadas_4", "espadas_5", "espadas_6", "espadas_7", "espadas_10", "espadas_11", "espadas_12"];
$basto = ["bastos_1", "bastos_2", "bastos_3", "bastos_4", "bastos_5", "bastos_6", "bastos_7", "bastos_10", "bastos_11", "bastos_12"];

$baraja = [ $oro, $copa, $espada, $basto ];

function tresCartas() {
    $jugadorUno = [];
    $contador = 0;



    while($contador < 3){

        global $jugadorUno;
        global $baraja;
        $contador++;

        //  palo y carta aleatoria utilizando array_rand
        $paloIndex = array_rand($baraja);
        $cartaIndex = array_rand($baraja[$paloIndex]);

        // saber cual es nuestra carta
        $carta = $baraja[$paloIndex][$cartaIndex];

        // Añadir la carta al jugador
        $jugadorUno[] = $carta;
        
        // eliminar carta
        unset($baraja[$paloIndex][$cartaIndex]);
    }

    // Muestra las cartas que ha recibido el jugador. Se adjunta una carpeta con imágenes de cartas para que puedas usarlas en la presentación.
    echo "<H1>Mi Baraja</H1>";
    for ($i = 0; $i < count($jugadorUno); $i++) {
        echo "<img src='./imagenes/" . $jugadorUno[$i] . ".jpg'>";
    }
}

function diezCartas() {
    $jugadorUno = [];
    $contador = 0;
    $puntosTotales = 0;

    // str_contains(string $buscar, string $palabra_a_Buscar): bool

    // key(carta) => valorCarta
    $puntos = [
        "1" => 11, 
        "3" => 10,
        "12" => 4,
        "11" => 3,
        "10" => 2
    ];


    while($contador < 10){

        global $jugadorUno;
        global $baraja;
        $contador++;

        //  palo y carta aleatoria utilizando array_rand
        $paloIndex = array_rand($baraja);
        $cartaIndex = array_rand($baraja[$paloIndex]);

        // saber cual es nuestra carta
        $carta = $baraja[$paloIndex][$cartaIndex];

        // Añadir la carta al jugador
        $jugadorUno[] = $carta;
        
        // eliminar carta
        unset($baraja[$paloIndex][$cartaIndex]);
    }

    // Muestra las cartas que ha recibido el jugador. Se adjunta una carpeta con imágenes de cartas para que puedas usarlas en la presentación.
    echo "<H1>Mi Baraja</H1>";
    for ($i = 0; $i < count($jugadorUno); $i++) {
        echo "<img src='./imagenes/" . $jugadorUno[$i] . ".jpg'>";

        foreach($puntos as $key => $value){
            if(strpos($jugadorUno[$i], $key) !== false){
                $puntosTotales += $value;
            }
        }
    }
    echo "<H1>Puntos totales: " . $puntosTotales . "</H1>";

}


?>