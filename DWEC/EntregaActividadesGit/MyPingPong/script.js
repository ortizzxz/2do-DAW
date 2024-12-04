window.onload = () => {
    const paletaIzq = document.getElementById('paletaIzq');
    const paletaDer = document.getElementById('paletaDer');
    const bola = document.getElementById('bola');
    const marcadorIzq = document.getElementById('puntosIzq');
    const marcadorDer = document.getElementById('puntosDer');

    const svgAlto = 500;
    const svgAncho = 800;

    const alturaPaleta = 100;
    const velocidadPaleta = 5;

    let bolaRadio = 8;
    let bolaX = 400;
    let bolaY = 250;
    let bolaXVel = 5;
    let bolaYVel = 5;

    let jugadorIzqY = 200;
    let jugadorDerY = 200;

    let puntosJugadorIzq = 0;
    let puntosJugadorDer = 0;

    let arribaIzqPresionada = false;
    let abajoIzqPresionada = false;
    let arribaDerPresionada = false;
    let abajoDerPresionada = false;

    /* EVENTLISTENERS */
    // izq
    document.addEventListener('keydown', (e) => {
        if (e.key == 'w' || e.key == 'W') arribaIzqPresionada = true;
        if ((e.key === 's' )||(e.key === 'S' ) ) abajoIzqPresionada = true;
    });

    document.addEventListener('keyup', (e) => {
        if ((e.key === 'w') || (e.key == 'W')) arribaIzqPresionada = false;
        if ((e.key === 's') || (e.key === 'S') ) abajoIzqPresionada = false;
    });

    // der
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowUp') arribaDerPresionada = true;
        if (e.key === 'ArrowDown') abajoDerPresionada = true;
    });
    
    document.addEventListener('keyup', (e) => {
        if (e.key === 'ArrowUp') arribaDerPresionada = false;
        if (e.key === 'ArrowDown') abajoDerPresionada = false;
    });

    /* REINICIAR BOLA Y ASIGNAR PUNTO */
    function reiniciarBola(puntoParaIzquierda) {
        /* centrar bola */
        bolaX = 400; 
        bolaY = 250;

        //reset velocidad
        bolaXVel = 5;


        if (puntoParaIzquierda) {
            puntosJugadorIzq++;
        } else {
            puntosJugadorDer++;
        }

        // SUMAR PUNTOS 
        marcadorIzq.innerHTML = puntosJugadorIzq;
        marcadorDer.innerHTML = puntosJugadorDer;
    }

    function update() {
        bolaX += bolaXVel;
        bolaY += bolaYVel;

        if (bolaY - bolaRadio <= 0 || bolaY + bolaRadio >= svgAlto) {
            bolaYVel *= -1;
        }

        if (bolaX - bolaRadio <= 30 && bolaY >= jugadorIzqY && bolaY <= jugadorIzqY + alturaPaleta) {
            bolaXVel *= 1.05;
        }

        if (bolaX + bolaRadio >= 770 && bolaY >= jugadorDerY && bolaY <= jugadorDerY + alturaPaleta) {
            bolaXVel *= -1.05;
        }

        // reiniciar bola
        if (bolaX - bolaRadio <= 0) {
            reiniciarBola(false);  // punto para derecha
        }
        if (bolaX + bolaRadio >= svgAncho) {
            reiniciarBola(true); // punto para izquieirda
        }

        //IZQ
        if (arribaIzqPresionada && jugadorIzqY > 0) {
            jugadorIzqY -= velocidadPaleta;
        }
        if (abajoIzqPresionada && jugadorIzqY < svgAlto - alturaPaleta) {
            jugadorIzqY += velocidadPaleta;
        }

        //DER
        if (arribaDerPresionada && jugadorDerY > 0) {
            jugadorDerY -= velocidadPaleta;
        }
        if (abajoDerPresionada && jugadorDerY < svgAlto - alturaPaleta) {
            jugadorDerY += velocidadPaleta;
        }

 


        paletaIzq.setAttribute('y', jugadorIzqY);
        paletaDer.setAttribute('y', jugadorDerY);
        bola.setAttribute('cx', bolaX);
        bola.setAttribute('cy', bolaY);

        requestAnimationFrame(update);
    }

    update();
};
