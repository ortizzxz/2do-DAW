/*
Tres en Raya. El juego del tres en raya consiste en un tablero de 3x3, en el que  
sucesivamente dos  jugadores  van marcando casillas  hasta  conseguir  tener  sus  tres  
marcas en linea, pudiendo ser esta horizontal, vertical o en diagonal. Se pide por tanto 
la implementacion de este juego teniendo en cuenta:
1. El juego es pensado para ser usado por dos usuarios.
2. El juego finaliza cuando los dos seleccionan sus 3 marcas, o bien uno consigue  
antes las tres en linea.
*/

class tresEnLinea {
    constructor() {
        this.tablero = Array.from(
            { length: 3 },
            () => Array(3).fill(0)
        );

        this.acabarJuego = false;
        this.jugadaEfectiva = false;
        this.seguirJugando = true;

    }

    mostrarTablero() {
        console.table(this.tablero);
    }

    jugar(jugador, fila, columna) {
        fila -= 1;
        columna -= 1;

        if (fila < 0 || fila > 2 || columna < 0 || columna > 2) {
            console.log('Movimiento inválido');
            return;
        }

        if (this.tablero[fila][columna] === 0) {
            this.tablero[fila][columna] = jugador;
            this.jugadaEfectiva = true;

            if (this.comprobarVictoria()) {
                console.log(`¡Jugador ${jugador} ha ganado!`);
                this.seguirJugando = false;
            }
        } else {
            console.log("Esta casilla ya está ocupada");
            this.jugadaEfectiva = false;
        }
    }



    comprobarVictoria() {
        for (let i = 0; i < 3; i++) {
            if (this.tablero[i][0] !== 0 &&
                this.tablero[i][0] === this.tablero[i][1] &&
                this.tablero[i][0] === this.tablero[i][2]) {
                return true;
            }
        }

        // Check columns
        for (let j = 0; j < 3; j++) {
            if (this.tablero[0][j] !== 0 &&
                this.tablero[0][j] === this.tablero[1][j] &&
                this.tablero[0][j] === this.tablero[2][j]) {
                return true;
            }
        }

        // Check diagonals
        if (this.tablero[0][0] !== 0 &&
            this.tablero[0][0] === this.tablero[1][1] &&
            this.tablero[0][0] === this.tablero[2][2]) {
            return true;
        }

        if (this.tablero[0][2] !== 0 &&
            this.tablero[0][2] === this.tablero[1][1] &&
            this.tablero[0][2] === this.tablero[2][0]) {
            return true;
        }   

        return false;

    }

}


let miJuego = new tresEnLinea();
miJuego.mostrarTablero();
miJuego.jugar(1, 1, 1);
miJuego.jugar(2, 1, 2);
miJuego.jugar(1, 2, 2);
miJuego.jugar(2, 2, 1);
miJuego.jugar(1, 3, 3);
miJuego.mostrarTablero();
console.log(miJuego.comprobarVictoria());