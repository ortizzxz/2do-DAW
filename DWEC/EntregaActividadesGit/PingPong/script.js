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
    const velocidadPaletaDerecha = 3; // para poder ganar

    let bolaX = 400;
    let bolaY = 250;
    let bolaXVel = 5;
    let bolaYVel = 3;

    let jugadorIzqY = 200;
    let jugadorDerY = 200;

    let puntosJugadorIzq = 0;
    let puntosJugadorDer = 0;

    let arribaPresionada = false;
    let abajoPresionada = false;

    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowUp') arribaPresionada = true;
        if (e.key === 'ArrowDown') abajoPresionada = true;
    });

    document.addEventListener('keyup', (e) => {
        if (e.key === 'ArrowUp') arribaPresionada = false;
        if (e.key === 'ArrowDown') abajoPresionada = false;
    });

    function reiniciarBola(puntoParaIzquierda) {
        bolaX = 400;
        bolaY = 250;
        bolaXVel = (Math.random() > 0.5 ? 1 : -1) * 5; 
        bolaYVel = (Math.random() > 0.5 ? 1 : -1) * 3;

        if (puntoParaIzquierda) {
            puntosJugadorIzq++;
        } else {
            puntosJugadorDer++;
        }

        marcadorIzq.textContent = puntosJugadorIzq;
        marcadorDer.textContent = puntosJugadorDer;
    }

    function update() {
        bolaX += bolaXVel;
        bolaY += bolaYVel;

        if (bolaY - 8 <= 0 || bolaY + 8 >= svgAlto) {
            bolaYVel *= -1;
        }

        if (
            bolaX - 8 <= 30 && 
            bolaY >= jugadorIzqY &&
            bolaY <= jugadorIzqY + alturaPaleta
        ) {
            bolaXVel *= -1;
        }

        if (
            bolaX + 8 >= 770 && 
            bolaY >= jugadorDerY &&
            bolaY <= jugadorDerY + alturaPaleta
        ) {
            bolaXVel *= -1;
        }

        if (bolaX - 8 <= 0) {
            reiniciarBola(false); 
        }
        if (bolaX + 8 >= svgAncho) {
            reiniciarBola(true); 
        }

        if (arribaPresionada && jugadorIzqY > 0) {
            jugadorIzqY -= velocidadPaleta;
        }
        if (abajoPresionada && jugadorIzqY < svgAlto - alturaPaleta) {
            jugadorIzqY += velocidadPaleta;
        }

        if (bolaY < jugadorDerY + alturaPaleta / 2) {
            jugadorDerY -= velocidadPaletaDerecha;
        } else if (bolaY > jugadorDerY + alturaPaleta / 2) {
            jugadorDerY += velocidadPaletaDerecha;
        }

        jugadorDerY = Math.max(0, Math.min(svgAlto - alturaPaleta, jugadorDerY));

        paletaIzq.setAttribute('y', jugadorIzqY);
        paletaDer.setAttribute('y', jugadorDerY);
        bola.setAttribute('cx', bolaX);
        bola.setAttribute('cy', bolaY);

        requestAnimationFrame(update);
    }

    update();
};
