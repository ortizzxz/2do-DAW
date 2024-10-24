/* EVENT LISTENERS */

const btn = document.getElementsByTagName('button');

function random(number) {
    return Math.floor(Math.random() * (number + 1));
  }

btn[0].addEventListener('click', () => {
    const randomColor = `rgb(${random(255)}, ${random(255)}, ${random(255)})`;
    document.body.style.backgroundColor = randomColor;
});

btn[1].addEventListener('click', () => document.body.style.backgroundColor = "white");

/* MOUSE OVER */

btn[0].addEventListener('mouseover', () => {
    const randomColor = `rgb(${random(255)}, ${random(255)}, ${random(255)})`;
    document.body.style.backgroundColor = randomColor;
});

/* MOUSE OUT*/

btn[0].addEventListener('mouseout', () => {
    document.body.style.backgroundColor = "white";
});