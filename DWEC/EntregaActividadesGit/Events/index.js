// // WS1 1 2 4 5 9 10

// // document.addEventListener('click', () => alert('NO USES ALERTS'));

// // 2
// function mostrarPosicionMouse() {
//     console.log(mouseX + " " + mouseY);
// };

// let mouseX = 0;
// let mouseY = 0;

// document.addEventListener('mousemove', (e) => {
//     mouseX = e.clientX;
//     mouseY = e.clientY;
// });

// // setInterval(mostrarPosicionMouse, 1000);

// // 4

// function dibujarCanva() {
//     document.write("<table border=0 width='100%' height='100%'> ");
//         for(let i = 0; i < 50; i++){
//             document.write('<tr>');
//                 for(let k = 0; k < 100; k++){
//                     document.write('<td> </td>');
//                 }
//             document.write('</tr>');
//         }
//     document.write("</table>");
// }

// const celda = document.getElementsByTagName('tr');

// function pintaCeldasEnOnLoad() {
//     dibujarCanva();

//     const allCeldas = document.querySelectorAll('td'); // Selecciona todas las celdas
//     const tables = document.querySelectorAll('body table');

//     for (let i = 0; i < celda.length; i++) {
//         celda[i].addEventListener('mouseover', (e) => {
//             if (e.ctrlKey) {
//                 e.target.style.backgroundColor = 'red';
//             } else if (e.shiftKey) {
//                 e.target.style.backgroundColor = 'blue';
//             }else if(e.altKey){
//                 allCeldas.forEach(celda => celda.style.backgroundColor = 'white');
//             }
//             else {
//                 e.target.style.backgroundColor = 'white';
//             }
//         });

//     }

// }

// // 5 

// var pressedKey = "";

// function setBGWhite(){
//     document.body.style.backgroundColor = "white";
// }


// document.addEventListener('keydown', (e) => {
//     pressedKey =  e.key;
//     console.log(pressedKey);
// });


// 9
// 9
arrImg = document.getElementsByTagName("img");

Array.from(arrImg).forEach(ball => {

    ball.onmousedown = function (event) {

        let shiftX = event.clientX - ball.getBoundingClientRect().left;
        let shiftY = event.clientY - ball.getBoundingClientRect().top;

        ball.style.position = 'absolute';
        ball.style.zIndex = 1000;
        document.body.append(ball);
      
        moveAt(event.pageX, event.pageY);
    
        function moveAt(pageX, pageY) {
            ball.style.left = pageX - shiftX + 'px';
            ball.style.top = pageY - shiftY + 'px';
        }

        function onMouseMove(event) {
            moveAt(event.pageX, event.pageY);
        }

        document.addEventListener('mousemove', onMouseMove);

        ball.onmouseup = function () {
            document.removeEventListener('mousemove', onMouseMove);
            ball.onmouseup = null;
        };
    };

    ball.ondragstart = function () {
        return false;
    };

});
