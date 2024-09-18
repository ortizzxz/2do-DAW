// dia 1 

document.write("Puedes tener algo escrito, y también utilizar HTML");
document.write('<br />')
// dia 2 
var primeraVariable = 'Variables globales'; 
let segundaVariable = 'Variables locales'; 
const terceraVariable = 'Constante - no se puede modificar luego'; 

/// concatenacion
document.write("Variable local: " + segundaVariable + '<br />');

/// bloques { }: si quiero una funcion que exista solo dentro de este bloque uso let 
if (true){
    let variableLocalDelBloque = 0;
    document.write('Esta variable solo existe en este bloque: ' + variableLocalDelBloque + '<br/>')
};

/// siempre se usa let para los for y este tipo de cosas, es decir, uso unicos 
/// en js no hay definicion de tipos, una variable puede ser un string y luego un numero

var booleanos = true; 
document.write('esto es un booleano: ' + booleanos + '<br />');

// undefined es que no ha cogido valor alguno -> null que si pero es nulo 

// parseInt parseFloat parsean numeros 
let almacenarPrompt = parseInt(prompt('dame un numero'));
almacenarPrompt = almacenarPrompt + 1;

document.write(almacenarPrompt);

    