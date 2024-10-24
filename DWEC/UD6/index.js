/* EVENT LISTENERS */

const btn = document.getElementsByTagName('button');

function random(number) {
    return Math.floor(Math.random() * (number + 1));
  }

btn[0].addEventListener('click', () => {
    const randomColor = `rgb(${random(255)}, ${random(255)}, ${random(255)})`;
    document.body.style.backgroundColor = randomColor;
});

function changeBgWhite(){
    document.body.style.backgroundColor = "white";
}

btn[1].addEventListener('click', changeBgWhite);

/* MOUSE OVER */

btn[0].addEventListener('mouseover', () => {
    const randomColor = `rgb(${random(255)}, ${random(255)}, ${random(255)})`;
    document.body.style.backgroundColor = randomColor;
});

/* MOUSE OUT*/

btn[0].addEventListener('mouseout', () => {
    document.body.style.backgroundColor = "white";
});

/* REMOVE LISTENER */

btn[1].addEventListener('click', () => btn[1].removeEventListener("click", changeBgWhite));

/* GET ELEMENT BY ID */

const cajaTexto = document.getElementById('textBox');

cajaTexto.addEventListener('keydown', (e) => console.log("Has escrito la letra " + e.key ));