window.onload = () => {

    let pelotas = new Array();
    let svgPadre = document.getElementById("svgPadre");

    for (let index = 0; index < 1; index++) {
        pelotas.push(new Bola(svgPadre));
    }

    setInterval(() => {
        for(let p of pelotas){
            p.mover();
        }
    }, 16);
        
}

class Bola {
    constructor(svgPadre) {
        this.posicionX = getRandomArbitrary(1, 1300);
        this.posicionY = getRandomArbitrary(1, 500);
        this.limiteX = 1340;
        this.limiteY = 580;
        this.radio = 5;
        this.velocidadX = (Math.random() - 0.5) * 10; 
        this.velocidadY = (Math.random() - 0.5) * 10; 
        this.stroke = 'green';
        this.fill = 'blue';
        this.svgPadre = svgPadre;
        this.creaTag();
    }

    creaTag() {
        this.newPelota = document.createElementNS("http://www.w3.org/2000/svg", 'circle');
        this.newPelota.setAttribute('cx', this.posicionX);
        this.newPelota.setAttribute('cy', this.posicionY);
        this.newPelota.setAttribute('r', this.radio);
        this.newPelota.setAttribute('stroke', this.stroke);
        this.newPelota.setAttribute('stroke-width', '1');
        this.newPelota.setAttribute('fill', this.fill);
        this.svgPadre.appendChild(this.newPelota);
    }

    mover() {
        this.posicionX += this.velocidadX;
        this.posicionY += this.velocidadY;

        this.newPelota.setAttribute('cx', this.posicionX);
        this.newPelota.setAttribute('cy', this.posicionY);

        if ((this.posicionX + this.radio) > this.limiteX || (this.posicionX - this.radio) < 0) {
            this.velocidadX *= -1;
        }
        
        if ((this.posicionY + this.radio) > this.limiteY || (this.posicionY - this.radio) < 0) {
            this.velocidadY *= -1;
        }
        
    }
}


// copiada de mdn
function getRandomArbitrary(min, max) {
    return Math.random() * (max - min) + min;
}