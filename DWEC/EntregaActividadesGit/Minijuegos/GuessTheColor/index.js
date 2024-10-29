window.onload = () => {
    var colors = document.getElementsByClassName('color');
    var newColors = document.getElementById('newColors');
    var title = document.getElementById('rgbValue');
    var easyGame = document.getElementById('easyGame');
    var hardGame = document.getElementById('hardGame');
    var container = document.getElementById('displayColors');
    let correctColor;
    let lifes;

    function updateColors() {
        let myRandom = cambiarColores(colors);
        correctColor = myRandom[Math.floor(Math.random() * colors.length)];
        title.innerHTML = "RGB (" + correctColor.join(", ") + ")";

        for (let colorDiv of colors) {
            colorDiv.addEventListener('click', checkColor);
        }
    }

    function checkColor(event) {
        let clickedDiv = event.target;
        let clickedColor = clickedDiv.style.backgroundColor;
        let correctColorRGB = `rgb(${correctColor.join(', ')})`;

        if (clickedColor == correctColorRGB) {
            alert("¡Ganaste! Has elegido el color correcto.");
            chooseGameMode(6);
            updateColors();
        } else {
            clickedDiv.remove();
            lifes++;

            if(lifes == 3){
                alert("¡Has perdido tus 3 vidas! PERDEDOR");
                chooseGameMode(6);
                updateColors();
            }

        }
    }

    newColors.addEventListener('click', updateColors);

    easyGame.addEventListener('click', () => {
        chooseGameMode(3);
        updateColors();
    });

    hardGame.addEventListener('click', () => {
        chooseGameMode(6);
        updateColors();
    });

    function chooseGameMode(numColor) {
        container.innerHTML = '';

        for (let i = 0; i < numColor; i++) {
            let colorDiv = document.createElement('div');
            colorDiv.className = 'color';
            container.appendChild(colorDiv);
        }

        colors = document.getElementsByClassName('color');
        lifes = 0;
        updateColors();
    }

    chooseGameMode(6);
    updateColors();
}


function generaRandomColor() {
    return [
        Math.floor(Math.random() * 256),
        Math.floor(Math.random() * 256),
        Math.floor(Math.random() * 256)
    ];
}

function cambiarColores(arr) {
    let random = [];
    for (let element of arr) {
        let coloresRandom = generaRandomColor();
        element.style.backgroundColor = `rgb(${coloresRandom[0]}, ${coloresRandom[1]}, ${coloresRandom[2]})`;
        random.push(coloresRandom);
    }
    return random;
}

