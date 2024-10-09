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

console.log(num);

num = num.sort( (a, b) => {
    if(a%2 == 0){
        return -1;
    }else{
        return 1;
    }
});

console.log(num);

// 7 
