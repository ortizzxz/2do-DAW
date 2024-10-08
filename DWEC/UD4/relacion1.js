/* RELACION W1A ENTERA */
/**
 * @name isOdd
 * @description Devuelve si un número es impar
 * 
 * @param {number} x - El número a evaluar
 * @returns {Boolean} Devuelve true si el número {x} es impar, false sino
 *
 * @example
 *  isOdd(3) // returns true
 */
const isOdd = (x) => (x%2 !== 0); 

/**
 * @name inRange
 * @description Devuelve si un número se encuentra dentro de un rango
 * 
 * @param {number} x - El número a evaluar si se encuentra dentro del rango
 * @param {number} min - El límite inferior del rango
 * @param {number} max - El límite superior del rango
 * @returns {Boolean} Devuelve true si el número {x} se encuentra dentro del rango definido por {min} y {max}, false sino
 *
 * @example
 *  inRange(2, -4, 10) // returns true
 */

function inRange(x, min, max){

    while (min <= max){
        if(x == min){
            return true;
        }

        min++;
    }

    return false;
}

/**
 * @name getBiggestNumber
 * @description Devuelve el número más grande de un array
 * 
 * @param {number[]} numbers - Un array de números
 * @returns {Number} El número más grande del arrray {numbers}
 *
 * @example
 *  getBiggestNumber([3, 8, 2, 1, 10]) // returns 10
 */

function getBiggestNumber(numbers){
    let greatest = numbers[0];

    numbers.forEach(element => {
        if (element > greatest){
            greatest = element;
        }
    });

    return greatest;
}

/**
 * @name getPercentage
 * @description Devuelve el porcentaje correspondiente de un número
 * 
 * @param {number} number - Número a obtener el porcentage
 * @param {number} percentage - Porcentaje a obtener
 * @returns {Number}
 *
 * @example
 *  getPercentage(200, 10) // returns 20
 */

function getPercentage(number, percentage){
    return ( ( number * (percentage/100) ) );
}

/**
 * @name getRandomColorSequence
 * @description Devuelve una secuencia aleatoria de ciertos colores con cierta longitud
 * 
 * @param {string[]} colors - Array de colores a ser utilizados en la secuencia
 * @param {number} length - Longitud de la secuencia
 * @returns {String[]} - Secuencia aleatoria de colores disponibles en {colors}, con longitud {length}
 *
 * @example
 *  getRandomColorSequence(["red", "blue", "green"], 4) // returns ['blue', 'red', 'red', 'green']
 */

function getRandomColorSequence(colors, length){
    // colors: colores random: -> [a b c d e]
    // lenght return.length 
    let l = colors.length;
    let secuencia = [];

    for (let i = 0; i < length; i++){
        secuencia.push(colors[Math.floor( Math.random() * l )]);
    }

    return secuencia;
}

/**
 * @name getRockPaperScissor
 * @description Devuelve una jugada aleatoria de piedra, papel o tijera
 * 
 * @returns {String} - Devuelve "rock", "paper" o "scissor"
 *
 * @example
 *  getRockPaperScissor() // returns "paper"
 */

function getRockPaperScissor(){
    let opts = ["rock", "paper","scissor"];

    return opts[ Math.floor( Math.random() * 3 ) ];
}

/**
 * @name getRockPaperScissorRandomSequence
 * @description Devuelve una secuencia aleatoria de jugadas de piedra, papel o tijera, con cierta longitud
 *
 * @param {number} length - Longitud de la secuencia
 * @returns {String[]}
 *
 * @example
 *  getRockPaperScissorRandomSequence(4) // returns ["rock", "paper", "rock", "scissor"]
 */

function getRockPaperScissorRandomSequence(length){
    let opts = ["rock", "paper","scissor"];
    let secuencia = [];

    for (let i=0; i < length; i++){
        secuencia.push( opts[Math.floor( Math.random() * 3 )] );
    }

    return secuencia;
}

/**
 * @name filterNumbersGreaterThan
 * @description Filtra los números de un array que sean mayor a cierto número x dejando solo los que sean menores a este
 *
 * @param {number[]} numbers - Array de números a filtrar
 * @param {number} filter - Número a partir del cuál filtrar los demás números
 * @returns {Number[]} - Array de números filtrados menores a {filter}
 *
 * @example
 *  filterNumbersGreaterThan([3, 8, 12, 1, 7, 4], 7) // returns [3, 1, 4]
 */

function filterNumbersGreaterThan(number, filter){
    let filtered = [];

    for (let i = 0; i < number.length; i++) {
        if (number[i]< filter){
            filtered.push(number[i]);
        }
    }

    return filtered;     
}

/**
 * @name getFactorial
 * @description Devuelve el factorial de un número
 *
 * @param {number} x - Número del cuál obtener factorial
 * @returns {Number} - Factorial de {x}
 *
 * @example
 *  getFactorial(4) // returns 24
 */
function getFactorial(x){
    /* vamos a tabajar la recursividad:
        recursividad es llamar a una funcion dentro de una funcion 
        Basicamente lo que hacemos es romper el problema en subproblemas y resolverlos llamando al metodo 
        haciendo asi que la solucion sea la suma de la solucion de todos los subproblemas */

    if(x == 0){
        return 1;
    }
    return ( x * getFactorial(x-1));
}

/**
 * @name areArraysEqual
 * @description Devuelve si dos arrays son iguales (tienen los mismos ítems en el mismo orden)
 *
 * @param {[]} a 
 * @param {[]} b 
 * @returns {Boolean} - Devuelve true si ambos arrays son iguales, false sino
 *
 * @example
 *  areArraysEqual([1, 4], [1, 4]) // returns true
 */

function areArraysEqual(a, b){
    let iguales = true;
    for (let i = 0; i < a.length && iguales; i ++){

        if(a[i] !== b[i]){
            iguales = false;    
        }

    }

    return iguales;
}

/**
 * @name toHackerSpeak
 * @description Convierte un string a "Hacker Speak". Para hacerlo, tiene que transformar las "a" en 4, las "e" en 3, las "i"
 * en 1, las "o" en 0 y las "s" en 5
 *
 * @param {string} text 
 * @returns {String} - El texto convertido a "Hacker Speak"
 * 
 * @example
 *  toHackerSpeak("I'm a hacker now") // returns "1'm 4 h4ack3r n0w"
 */

function toHackerSpeak (text){
    let nText = "";

    for(let i = 0; i < text.length; i++){
        switch(text[i].toLocaleLowerCase()){
            case ('a'):
                nText += '4';
                break;
            case 'e':
                nText += '3';
                break;
            case 'i':
                nText += '1';
                break;
            case 'o':
                nText += '0';
            break;
            case 's':
                nText += '5';
                break;
            default:
                nText += text[i];
                break;
        }
    }
    return nText;
}

/**
 * @name getFileExtension
 * @description Obtiene la extensión de un archivo
 *
 * @param {string} file - El nombre del archivo a obtener la extensión 
 * @returns {String} - La extensión del archivo
 * 
 * @example
 *  getFileExtension("imagen.jpg") // returns "jpg"
 */
const getFileExtension = (file) => {
    return file.slice(file.lastIndexOf(".") + 1);
}

/**
 * @name flatArray
 * @description Dado un array 2D, devuelve un array 1D que contiene todos los ítems 
 *
 * @param {[][]} arr - Array 2D a "aplanar" 
 * @returns {[]} - El array "aplanado"
 * 
 * @example
 *  flatArray([[1, 5, 4], [3, 10], [2, 5]]) // returns [1, 5, 6, 3, 10, 2, 5] () => typoarr[3] = 4 y no 6 
 */
function flatArrayF(arr){
    /* The concat() method creates a new array by merging (concatenating) existing arrays*/
    /* newArray = arrayOne.concat(arrayB, arrayC); */

    /* The flat() method creates a new array with sub-array elements concatenated to a specified depth.*/
    return arr.flat();
}

const flatArray = (arr) => arr.flat();

/**
 * @name removeDuplicates
 * @description Remueve duplicados de un array 
 *
 * @param {[]} arr - Array con duplicados a remover
 * @returns {[]} - El array resultante sin duplicados
 * 
 * @example
 *  removeDuplicates([4, 5, 10, 4, 10, 2]) // returns [4, 5, 10, 2]
 */

function removeDuplicates(arr){
    let noDupe = [];
    noDupe.push(arr[0]);

    for (let i = 1; i < arr.length; i++) {
        if (!noDupe.includes(arr[i])) {
            noDupe.push(arr[i]);
        }
    }

    return noDupe;
}

/**
 * @name countLetter
 * @description Devuelve la cantidad de veces que una letra aparece en un string 
 *
 * @param {string} letter - Letra a contar
 * @param {string} text - Texto sobre el que realizar la cuenta de {letter}
 * @returns {Number} - Número de veces que aparece {letter} en {text}
 * 
 * @example
 *  countLetter("a", "javascript") // returns 2
*/
function countLetter(letter, text){
    let contador = 0;
    
    for ( let i = 0; i < text.length; i++){
        if(text[i] == letter){
            contador++
        }
    }

    return contador;
}

/**
 * @name canPlay
 * @description Devuelve si dada una mano de Uno y una carta en la mesa, puede jugar o tiene que retirar del mazo. Las cartas
 * tienen uno de 4 colores posibles (red, blue, green or yellow) y un número del 1 al 9. Una carta se escribe como un string
 * con color y número. Por ejemplo: "yellow 3", "red 6". Se puede jugar si la carta en la mano coincide en color o en número
 * con la carta en la mesa
 *
 * @param {string[]} hand - Array de cartas que tiene en la mano 
 * @param {string} face - Carta que está en la mesa
 * @returns {Boolean} - Devuelve true si puede jugar alguna carta, o false si tiene que retirar del mazo
 * 
 * @example
 *   canPlay(["yellow 3", "yellow 5", "red 8"], "red 2") // returns true
 *   canPlay(["yellow 3", "yellow 5", "red 8"], "blue 5") // returns true
 *   canPlay(["yellow 3", "blue 5", "red 8", "red 9"], "green 4") // returns false
 *   canPlay(["yellow 3", "red 8"], "green 2") // returns false
 */

function canPlay(hand, face){
    let cartaEnMesa = face.split(' ');
    let jugar = false;
    
    // Aqui lo que quiero hacer es un split del hueco entre la pinta y el numero y luego la pinta.push a mis pintas y lo mismo con el numero
    for(let i = 0; i < hand.length && !jugar; i++){ 

        let misCartas = hand[i].split(' ');
        
        if(misCartas[0] == cartaEnMesa[0] || misCartas[1] == cartaEnMesa[1] ){
            jugar = true;
        }
    }

    return jugar;
}

/**
 * @name removeWords
 * @description Dado un string y un array de palabras a remover, devuelve el string sin las palabras removidas
 *
 * @param {string} str - Texto a recortar 
 * @param {string[]} words - Palabras a remover
 * @returns {string} - Texto resultante con las palabras removidas
 * 
 * @example
 *   removeWords("This is a really bad test", ["really", "bad"]) // returns "This is a test"
 */
function removeWords(str, words){
    for (let index = 0; index < words.length; index++) {
        str = str.replace(words[index]);
    }

    return str;
}

/**
 * @name getRange
 * @description Dado dos números, devuelve un array con los números enteros sucesivos entre ellos, puede incluir los números 
 * iniciales o no
 *
 * @param {number} a 
 * @param {number} b
 * @param {boolean} [inclusive=true] inclusive // Parámetro opcional, valor por defecto true
 * @returns {number[]} - Array de números entre a y b, incluyendo a y b
 * 
 * @example
 *   getRange(5, 10) // returns [5, 6, 7, 8, 9 ,10]
 *   getRange(3, -2) // returns [3, 2, 1, 0, -1, -2]
 *   getRange(-5, -10, false) // returns [-6, -7, -8, -9]
 */

function getRange(a, b, inclusive=true){
    let n = [];
    
    if(!inclusive){a++}

    if (inclusive){
        for( ; a <= b; a++){
            n.push(a);
        }
    }else{
        for(  ; a < b; a++){
            n.push(a);
        }
    }

    return n;
}

console.log(getRange(-5, -10, false));