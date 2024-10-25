// WS1 1 2 4 5 9 10

// document.addEventListener('click', () => alert('NO USES ALERTS'));

// 2
function mostrarPosicionMouse() {
    console.log(mouseX + " " + mouseY);
};

let mouseX = 0;
let mouseY = 0;

document.addEventListener('mousemove', (e) => {
    mouseX = e.clientX;
    mouseY = e.clientY;
});

// setInterval(mostrarPosicionMouse, 1000);

// 4

function dibujarCanva() {
    document.write("<table border=0 width='100%' height='100%'> ");
        for(let i = 0; i < 50; i++){
            document.write('<tr>');
                for(let k = 0; k < 100; k++){
                    document.write('<td> </td>');
                }
            document.write('</tr>');
        }
    document.write("</table>");
}

const celda = document.getElementsByTagName('tr');

function pintaCeldasEnOnLoad() {
    dibujarCanva();

    const tables = document.querySelectorAll('body table');

    for (let i = 0; i < celda.length; i++) {
        celda[i].addEventListener('mouseover', (e) => {
            if (e.ctrlKey) {
                e.target.style.backgroundColor = 'red';
            } else if (e.shiftKey) {
                e.target.style.backgroundColor = 'blue';
            }
        });
    }
    

    tables[0].addEventListener('mouseout', () => {
        tables[0].style.backgroundColor = "white";
    });
}

