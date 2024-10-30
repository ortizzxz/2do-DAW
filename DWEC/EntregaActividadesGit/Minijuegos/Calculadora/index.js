window.onload = () => {
    var sumar = document.getElementById('suma');
    var restar = document.getElementById('resta');
    var multiplicar = document.getElementById('multiplicacion'); 
    var dividir = document.getElementById('division');
    var teclas = document.querySelectorAll('.numbersContainer button');
    var writingBox = document.getElementById('writingBox');
    var clearBtn = document.getElementById('clear');
    var resultado = document.getElementById('resultContainer');
    var numActual;
    var numAnterior;
    var operacionActual;
    
    
    resultado.addEventListener('click', realizaOperacion);

    function realizaOperacion(){
        numActual = parseFloat(writingBox.innerHTML);
        switch(operacionActual){
            case 'suma':
                writingBox.innerHTML = suma(numAnterior,numActual);
                break;
            case 'resta':
                writingBox.innerHTML = resta(numAnterior,numActual);
                break;
            case 'multiplicacion':
                writingBox.innerHTML = multiplicacion(numAnterior,numActual);
                break;
            case 'division':
                writingBox.innerHTML = division(numAnterior, numActual);
                break;
            default:
                break;
        }
    }

    sumar.addEventListener('click', () => {
        numAnterior = parseFloat(writingBox.innerHTML);
        writingBox.innerHTML = "";
        operacionActual = 'suma';
    });

    restar.addEventListener('click', () => {
        numAnterior = parseFloat(writingBox.innerHTML);
        writingBox.innerHTML = "";
        operacionActual = 'resta';
    });

    multiplicar.addEventListener('click', () => {
        numAnterior = parseFloat(writingBox.innerHTML);
        writingBox.innerHTML = "";
        operacionActual = 'multiplicacion';
    });

    dividir.addEventListener('click', () => {
        numAnterior = parseFloat(writingBox.innerHTML);
        writingBox.innerHTML = "";
        operacionActual = 'division';
    });
    
    
    teclas.forEach(element => {
        element.addEventListener('click', (e) => {
            if( !(element.innerHTML == "C")){
                writingBox.innerHTML += element.innerHTML;
            }else{
                writingBox.innerHTML = "0";
            }
        })
    });
    
};

var suma = (num1, num2) => (num1 + num2);
var resta = (num1, num2) => (num1 - num2);
var multiplicacion = (num1, num2) => (num1 * num2);

function division(num1, num2){
    if(num2 == 0){
        return 0;
    }

    return num1 / num2;
}
