<?php
    require_once './Config/config.php'
?>

<header>
        <h1>Casino</h1>
        <nav>
            <ul>
                <li><a href="<?php URL ?>index.php?controller=Baraja&action=mostrarBaraja">Mostrar las cartas de la baraja</a></li>
                <li><a href="<?php URL ?>index.php?controller=Baraja&action=barajarMostrarResultado">Barajar y Mostrar el Resultado</a></li>
                <li><a href="<?php URL ?>index.php?controller=Baraja&action=sacarCarta">Sacar una carta de la baraja</a></li>
                <form action="" method="POST">
                    <li><a href="<?php URL ?>index.php?controller=Baraja&action=repartirCartas">Repartir Cartas</a>
                        Nº Jugadores: <input type="text" name="jugadores" placeholder="1, 2...">
                    </li>
                    <button type="submit">Jugadores</button>    
                </form>
            </ul>
        </nav>

</header>