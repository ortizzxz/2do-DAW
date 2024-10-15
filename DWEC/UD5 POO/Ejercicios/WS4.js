// 1 y 2 

/*
1) Puzzle. Se desea implementar una web para la realizacion de puzzles. Un puzzle no es 
mas   que   un   tablero   cuadrado   con   un   hueco   que   podemo  mover y que  permite
reordenar las piezas. Se pide por tanto la implementacion de una clase que represente
este juego teniendo en cuenta:

1. La dimension puede variar, se escoge en la creacion

2. El espacio en blanco solo se mueve arriba, abajo, izquierda, derecha, controlando
por supuesto que sea un movimiento valido

3. Debe llevarse un control del tiempo minimo para resolverlo, asi como el numero de 
movimientos realizados.

4. Los tableros se generan aleatoriamente

5. Implementaras un metodo dibujar() que imprimira en pantalla el tablero para poder 
ser probado
*/

class Puzzle {
    constructor(valueDimension, limiteMovimientos, limiteTiempoSeg) {

        /* La función de mapeo (_, i) => ... se usa para cada fila, donde i es el índice de la fila. */

        /* Dentro de cada fila, usamos otra función de mapeo (_, j) => i * valueDimension + j + 1 para generar valores progresivos:
        i * valueDimension nos da el valor inicial de cada fila.
        + j incrementa el valor en cada columna.
        + 1 asegura que empecemos desde 1 en lugar de 0. */

        /* Si quieres que los números sean consecutivos pero empezando desde 0, puedes simplemente quitar el + 1 en la función de mapeo */

        this.dimension = Array.from(
            { length: valueDimension },
            (_, i) => Array.from(
                { length: valueDimension },
                (_, j) => i * valueDimension + j + 1
            )
        );

        this.dimension[valueDimension - 1][valueDimension - 1] = -1;
        this.limiteMovimientos = limiteMovimientos;
        this.limiteTiempo = limiteTiempoSeg * 1000; // a ms
        this.tiempoACabo = 0;
        this.movimientos = 0;

    }

    mostrarEspacio() {
        console.table(this.dimension);
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

    moverArriba() {
        let posicionI = 0;
        let posicionJ = 0;

        if (this.movimientos >= this.limiteMovimientos) {
            console.log("Limite de movimientos Alcanzado");
        } else {

            for (let i = 0; i < this.dimension.length; i++) {
                for (let j = 0; j < this.dimension.length; j++) {

                    if (this.dimension[i][j] == -1) {
                        posicionI = i;
                        posicionJ = j;
                    }

                }
            }

            if (posicionI > 0) {

                let temp = this.dimension[posicionI - 1][posicionJ];

                this.dimension[posicionI - 1][posicionJ] = this.dimension[posicionI][posicionJ];

                this.dimension[posicionI][posicionJ] = temp;

                this.movimientos++;

            } else {
                console.log('No se puede mover arriba');
            }
        }
    }


    moverAbajo() {
        let posicionI = 0;
        let posicionJ = 0;

        if (this.movimientos >= this.limiteMovimientos) {
            console.log("Limite de movimientos Alcanzado");
        } else {



            for (let i = 0; i < this.dimension.length; i++) {
                for (let j = 0; j < this.dimension.length; j++) {

                    if (this.dimension[i][j] == -1) {
                        posicionI = i;
                        posicionJ = j;
                    }

                }
            }

            if (posicionI < 2) {

                let temp = this.dimension[posicionI + 1][posicionJ];

                this.dimension[posicionI + 1][posicionJ] = this.dimension[posicionI][posicionJ];

                this.dimension[posicionI][posicionJ] = temp;

                this.movimientos++;
            } else {
                console.log('No se puede mover abajo');
            }
        }
    }

    moverIzquierda() {
        let posicionI = 0;
        let posicionJ = 0;

        if (this.movimientos >= this.limiteMovimientos) {
            console.log("Limite de movimientos Alcanzado");
        } else {

            for (let i = 0; i < this.dimension.length; i++) {
                for (let j = 0; j < this.dimension.length; j++) {

                    if (this.dimension[i][j] == -1) {
                        posicionI = i;
                        posicionJ = j;
                    }

                }
            }

            if (posicionJ > 0) {

                let temp = this.dimension[posicionI][posicionJ - 1];

                this.dimension[posicionI][posicionJ - 1] = this.dimension[posicionI][posicionJ];

                this.dimension[posicionI][posicionJ] = temp;

                this.movimientos++;

            } else {
                console.log('No se puede mover a la izquierda');
            }
        }
    }

    moverDerecha() {
        let posicionI = 0;
        let posicionJ = 0;

        if (this.movimientos >= this.limiteMovimientos) {
            console.log("Limite de movimientos Alcanzado");

        } else {

            for (let i = 0; i < this.dimension.length; i++) {
                for (let j = 0; j < this.dimension.length; j++) {

                    if (this.dimension[i][j] == -1) {
                        posicionI = i;
                        posicionJ = j;
                    }

                }
            }

            if (posicionJ < 2) {

                let temp = this.dimension[posicionI][posicionJ + 1];

                this.dimension[posicionI][posicionJ + 1] = this.dimension[posicionI][posicionJ];

                this.dimension[posicionI][posicionJ] = temp;

                this.movimientos++;

            } else {
                console.log('No se puede mover a la derecha');
            }
        }
    }

    mostrarMovimientos() {
        return this.movimientos;
    }
}

miPuzzle = new Puzzle(3, 2);
miPuzzle.desordenarPuzzle();
miPuzzle.mostrarEspacio();
miPuzzle.moverDerecha();
miPuzzle.moverIzquierda();
miPuzzle.moverAbajo();
miPuzzle.moverArriba();
miPuzzle.mostrarEspacio();

console.log(miPuzzle.mostrarMovimientos() + " MOVIMIENTOS");

