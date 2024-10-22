class Puzzle {
    constructor(valueDimension, limiteMovimientos, limiteTiempoSeg) {

        this.dimension = Array.from(
            { length: valueDimension },
            (_, i) => Array.from(
                { length: valueDimension },
                (_, j) => i * valueDimension + j + 1
            )
        );

        this.dimension[valueDimension - 1][valueDimension - 1] = -1;

        this.limiteMovimientos = limiteMovimientos;
        this.movimientos = 0;

        this.limiteTiempo = limiteTiempoSeg * 1000; // a ms
        this.tiempoInicio = null;
        this.tiempoACabo = 0;

        this.acabarJuego = false;

    }

    desordenarPuzzle() {
        // aplanamos la matriz para desordenar
        let flatArray = this.dimension.flat();

        // implementamos algoritmo de Fisher-Yates
        for (let i = flatArray.length - 1; i > 0; i--) {
            let j = Math.floor(Math.random() * (i + 1));
            [flatArray[i], flatArray[j]] = [flatArray[j], flatArray[i]];
        }

        // reconstruir el array
        this.dimension = Array.from(
            { length: this.dimension.length },
            (_, i) => flatArray.slice(i * this.dimension.length, (i + 1) * this.dimension.length)
        );

    }

    buscarPosiciones() {
        let posiciones = []

        for (let i = 0; i < this.dimension.length; i++) {
            for (let j = 0; j < this.dimension.length; j++) {
                if (this.dimension[i][j] == -1) {
                    posiciones.push(i);
                    posiciones.push(j);
                }
            }
        }

        return posiciones;
    }

    iniciarJuego() {
        this.tiempoInicio = Date.now();
        this.acabarJuego = false;
        this.tiempoACabo = 0;
        this.movimientos = 0;
        this.desordenarPuzzle();
    }

    moverArriba() {
        let p = this.buscarPosiciones();
        let posicionI = p[0];
        let posicionJ = p[1];

        if (posicionI > 0) {
            let temp = this.dimension[posicionI - 1][posicionJ];
            this.dimension[posicionI - 1][posicionJ] = this.dimension[posicionI][posicionJ];
            this.dimension[posicionI][posicionJ] = temp;
            return true; 
        } else {
            console.log('No se puede mover arriba');
            return false; 
        }
    }

    moverAbajo() {
        let p = this.buscarPosiciones();
        let posicionI = p[0];
        let posicionJ = p[1];

        if (posicionI < 2) {
            let temp = this.dimension[posicionI + 1][posicionJ];
            this.dimension[posicionI + 1][posicionJ] = this.dimension[posicionI][posicionJ];
            this.dimension[posicionI][posicionJ] = temp;
            return true;
        } else {
            console.log('No se puede mover abajo');
            return false;
        }
    }

    moverIzquierda() {
        let p = this.buscarPosiciones();
        let posicionI = p[0];
        let posicionJ = p[1];

        if (posicionJ > 0) {
            let temp = this.dimension[posicionI][posicionJ - 1];
            this.dimension[posicionI][posicionJ - 1] = this.dimension[posicionI][posicionJ];
            this.dimension[posicionI][posicionJ] = temp;
            return true;
        } else {
            console.log('No se puede mover a la izquierda');
            return false;
        }
    }

    moverDerecha() {
        let p = this.buscarPosiciones();
        let posicionI = p[0];
        let posicionJ = p[1];

        if (posicionJ < 2) {
            let temp = this.dimension[posicionI][posicionJ + 1];
            this.dimension[posicionI][posicionJ + 1] = this.dimension[posicionI][posicionJ];
            this.dimension[posicionI][posicionJ] = temp;
            return true;
        } else {
            console.log('No se puede mover a la derecha');
            return false;
        }
    }

    mover(direccion) {
        if (this.acabarJuego) {
            console.log('El juego ha acabado');
            return;
        }

        if (this.tiempoInicio == null) {
            console.log('Por favor inicia el juego');
            return;
        }

        this.actualizarTiempo();

        if (this.tiempoACabo >= this.limiteTiempo) {
            console.log('Tiempo alcanzado. Usted ha perdido');
            this.acabarJuego = true;
            return;
        }

        if (this.movimientos >= this.limiteMovimientos) {
            console.log('Limite de movimientos alcanzado. Usted ha perdido');
            this.acabarJuego = true;
            return;
        }

        let movimientoValido = false;

        switch (direccion) {
            case 'arriba':
                movimientoValido = this.moverArriba();
                break;
            case 'abajo':
                movimientoValido = this.moverAbajo();
                break;
            case 'izquierda':
                movimientoValido = this.moverIzquierda();
                break;
            case 'derecha':
                movimientoValido = this.moverDerecha();
                break;
            default:
                console.log('Dirección no válida');
                return;
        }

        if (movimientoValido) {
            this.movimientos++;
            this.verificarVictoria();
        }

    }

    actualizarTiempo() {
        if (this.tiempoInicio != null && !this.acabarJuego) {
            this.tiempoACabo = Date.now() - this.tiempoInicio;
        }
    }

    progresoPartida() {
        this.actualizarTiempo();
        return {
            movimientos: this.movimientos,
            tiempoTranscurrido: Math.floor(this.tiempoACabo / 1000), // Convertir a segundos
            juegoTerminado: this.acabarJuego
        };
    }

    verificarVictoria() {
        let flatArray = this.dimension.flat();
        for (let i = 0; i < flatArray.length - 1; i++) {
            if (flatArray[i] !== i + 1) {
                return; // No es victoria
            }
        }
        console.log('¡Felicidades! Has resuelto el puzzle.');
        this.juegoTerminado = true;
    }

    dibujar() {
        console.table(this.dimension);
    }

    simularJuego(movimientos, tiempoEspera) {
        this.iniciarJuego();
        console.log("Inicio del juego:", this.progresoPartida());

        setTimeout(() => {
            for (let i = 0; i < movimientos; i++) {
                const direcciones = ['arriba', 'abajo', 'izquierda', 'derecha'];
                const direccionAleatoria = direcciones[Math.floor(Math.random() * direcciones.length)];
                this.mover(direccionAleatoria);
            }
            console.log("Después de los movimientos:", this.progresoPartida());
        }, tiempoEspera);
    }

}

let miPuzzle = new Puzzle(3, 100, 60); // 3x3, 100 movimientos max, 60 segundos max
miPuzzle.iniciarJuego();
miPuzzle.simularJuego(5, 5000);

