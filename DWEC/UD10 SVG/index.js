window.onload = () => {

    let pelotas = new Array();
    let svgPadre = document.getElementById("svgPadre");

    for (let index = 0; index < 10; index++) {
        pelotas.push(new Bola(svgPadre));
    }

    for (const p of pelotas) {
        setInterval(() => {
            p.mover();
        }, 3);
    }
        
}

class Bola {
    constructor(svgPadre) {
        this.posicionX = 50;
        this.posicionY = 50;
        this.limiteX = 1000;
        this.limiteY = 500;
        this.radio = 5;
        this.velocidadX = 5;
        this.velocidadY = 5;
        this.stroke = 'green';
        this.fill = 'blue';
        this.createTag = svgPadre; 
    }

    creaTag(svgPagre) {
        newPelota = document.createElementNS("http://www.w3.org/2000/svg", 'circle');
        newPelota.setAttribute('cx', this.posicionX);
        newPelota.setAttribute('cy', this.posicionY);
        newPelota.setAttribute('r', this.radio);
        newPelota.setAttribute('stroke', this.stroke);
        newPelota.setAttribute('stroke-width', '1');
        newPelota.setAttribute('fill', this.fill);
        document.getElementById(svgPagre).appendChild(this.newPelota);

    }

    mover() {
        this.posicionX += this.velocidadX;
        this.posicionY += this.velocidadY;

        this.newPelota.setAttribute('cx', posicionX++);
        this.newPelota.setAttribute('cy', posicionY++);

        if ((this.posicionX + this.radio) > this.limiteX) {
            this.velocidadX *= -1;
        } else {
            if ((this.posicionX - this.radio) < 0) {
                this.velocidadX *= -1;
            }
        }

        if ((this.posicionY + this.radio) > this.limiteY) {
            this.velocidadY *= -1;
        } else {
            if ((this.posicionY - this.radio) < 0) {
                this.velocidadY *= -1;
            }
        }
    }
}

