/*
Tres en Raya. El juego del tres en raya consiste en un tablero de 3x3, en el que  
sucesivamente dos  jugadores  van marcando casillas  hasta  conseguir  tener  sus  tres  
marcas en linea, pudiendo ser esta horizontal, vertical o en diagonal. Se pide por tanto 
la implementacion de este juego teniendo en cuenta:
1. El juego es pensado para ser usado por dos usuarios.
2. El juego finaliza cuando los dos seleccionan sus 3 marcas, o bien uno consigue  
antes las tres en linea.
*/

class tresEnLinea{
    constructor(){
        this.tablero = Array.from(
            { length: 3 }, 
            () => Array(3).fill(0)
        );

        this.acabarJuego = false;
        this.jugadaEfectiva = false;
        
    }

    mostrarTablero(){
        console.table(this.tablero);
    }

    jugar(jugador, posicionJuego){
        let puntero = jugador; // 1 or 2
        let posicion = posicionJuego - 1;
        this.jugadaEfectiva = false;

        if(posicion < 0 || posicion > 3){
            console.log('Movimiento inválido');
            return;
        }

        for (let i = this.tablero.length - 1; i >= 0 && !this.jugadaEfectiva; i--) {

            if (this.tablero[i][posicion] === 0) {
                this.tablero[i][posicion] = puntero;
                this.jugadaEfectiva = true;
            }

        }
    
        
    }
}




let miJuego = new tresEnLinea();
miJuego.mostrarTablero();
miJuego.jugar(1, 1);
miJuego.jugar(1, 1);
miJuego.mostrarTablero();
