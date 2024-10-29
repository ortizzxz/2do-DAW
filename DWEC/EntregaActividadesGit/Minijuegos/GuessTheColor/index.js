window.onload = () => {
    var colors = document.getElementsByClassName('color');
    var newColors = document.getElementById('newColors');
    var title = document.getElementById('rgbValue');
    var easyGame = document.getElementById('easyGame');

    newColors.addEventListener('click', () =>  {
        myRandom = cambiarColores(colors),
        myRandom = myRandom[Math.floor ( Math.random() * 6 ) ],
        title.innerHTML = "RGB (" + myRandom + ")";
    });


}


function generaRandomColor() {
    return [
        Math.floor(Math.random() * 256),
        Math.floor(Math.random() * 256),
        Math.floor(Math.random() * 256)
    ];
}

function cambiarColores(arr){
    
    let random = [];

    for (let element of arr) {
        let coloresRandom = generaRandomColor();
        element.style.backgroundColor = `rgb(${coloresRandom[0]}, ${coloresRandom[1]}, ${coloresRandom[2]})`;
        random.push(coloresRandom);
    }

    return random;

}