// let nombres = ["jose", "jesus", "marco"];

// nombres.sort( (a, b) => {
//     if ( a < b){
//         return -1;
//     }else if (a > b){
//         return 1;
//     }else{
//         return 0;
//     }
// });

// let numero = [10, 2, 21312, 2, 1, 123];

// console.log(numero.sort( (num1, num2) => {
//     if(num1 < num2){
//         return 1;
//     }else if(num1 > num2){
//         return -1;
//     }else{
//         return 0;
//     }
// }));


// 1b #2  5 7 8 9 
const sum = (num1, num2) => { return num1 + num2 }


const stringLength = (str) => {
    let length = str.length;
    console.log(`the length of "${str}" is:`, length);
    return str.length;
}

let alerts = ["Hey, you are awesome", "You are so wonderful", "What a marvel you are", "You're so lovely", "You're so sweet that I'd think you're a sweet potato -- and I LOOOOVE POTATOES"];
const showAlert = (name) => { alert(alerts[(Math.floor(Math.random() * alerts.length))] + `, ${name}!`) }

const returnName = (n, a) => {
    console.log('Hello, I am ' + n + ', and I am ' + a + ' years old.');
}

/* 7. Write an arrow function that takes an array of integers, and returns the sum of the elements in the array. Google and use the built-in reduce
     array method for this.
 */

let n = [1, 23, 5, 12, 91];

const reduce = (numeros) => {
    let total = numeros.reduce((a, b) =>
        a + b,
        0 // => acumulador e inicializador a 0 
    )

    return total;
};

let eye = "eye";

const fire = () => `bulls-`;

const fibonacci = (n) => {
    if (n < 3){
        return 1;
    }

    return fibonacci(n - 1) + fibonacci(n - 2);
}

/* 2 => 5 7 8 9 */

// paresImpares = array 100 numeros x del 1 al 1000
// mostrar
// ordenar pares e impares
// mostrar

const paresImpares = () => {
    let a = [];

    for( let i = 0; i < 100; i++){
        a.push(Math.floor( Math.random() * 1000 ));
    }

    return a;
}

let num = paresImpares();

num = num.sort( (a, b) => {
    if(a%2 == 0){
        return -1;
    }else{
        return 1;
    }
});


// 7 
const creaArrayACero = () => {return Array(10).fill(0);}

let arrayACero = creaArrayACero();

const agregarUno = (array) => { 
   return array.map( posicion =>  posicion + 1)
}

const muestraConEspacio = (array) => { 
    array.forEach(elemento => {
        return document.write(elemento + ' ');
    })
}

// muestraConEspacio(arrayACero);  
// document.write('<br />')
// muestraConEspacio(agregarUno(arrayACero));  

// 8 

function lanzamiento36000(){
    let caras = [1, 2, 3, 4, 5, 6];
    
    let combinacion = Array.from(
        {length: 6}, () => Array(6).fill(0)
    );

    for (let i = 0; i < 36000; i++){
        let dado1 = Math.floor(Math.random () * (caras.length) + 1);
        let dado2 = Math.floor(Math.random () * (caras.length) + 1);
        
        combinacion[dado1 - 1][dado2 - 1]++;

    }

    console.table(combinacion);
    
    document.write('<table border=1>');
    document.write('<tr><td> Indice </td>');

    for(let i = 1; i < 7; i++){
        document.write('<th> ' + i + ' </th>')
    }

    for (let i = 0; i < combinacion.length; i++){
        document.write('<tr>');
        document.write('<th>' + (i+1) + '</th>');

        for(let k = 0; k < combinacion.length; k++){
            document.write('<td>' + combinacion[i][k] + '</td>')
        }

        document.write('</tr>')
    }

    document.write('</table>');
}

lanzamiento36000();
