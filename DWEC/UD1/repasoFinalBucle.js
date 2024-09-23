
// 1 
// let num = parseInt(prompt('Ingrese un numero'));

// for(let i = 1; i <= num; i++){
//     document.write(  i + '<br /> ');
// }

// 2
// let num = parseInt(prompt('Ingrese un numero'));

// for(let i = 1; i <= num; i++){
//     document.write(  i + '<br /> ');
//     i++;
// }

// 3
// let num = parseInt(prompt('Ingrese un numero'));

// for(let i = num; i > 0; i--){
//     document.write(  i + '<br /> ');
// }

// 4
// for (let i = 1; i <= 10; i++){
//     console.log(' 9 * ' + i + ': ' + (9*i));
// }

// 5 Pedir al usuario que ingrese un número en un prompt, hacer la suma de todos los dígitos
// let palabra = prompt('Ingrese un numero');
// let suma = 0;

// for (let i = 0; i < palabra.length; i++) {
//     suma += parseInt(palabra[i], 10);    
// }

// if ((palabra.length  < 1 ) ? document.write(palabra) : document.write(suma));

// //6 Realizar la suma de todos los números pares entre N y M donde N y M los ingresa un usuario.
// let n = 0;
// let m = 0;
// let suma = 0;
// let mayor; 

// while(n == m){
//     n = parseInt(prompt('Ingrese un numero'));
//     m = prompt(('Ingrese otro numero'));
// }

// if (( m > n) ? mayor = m : mayor = n);

// for ( let i = n; i <= m; i++){
//     if (i%2 == 0){
//         suma += i;
//     }
// }

// document.write(suma);


// // 7 Realizar la sumatoria de los primeros N números, donde N es ingresado por el usuario.
// let n = 0;
// let suma = 0;

// n = parseInt(prompt('Ingrese un numero'));

// for ( let i = 1; i <= n; i++){
//     suma += i;
// }

// document.write(suma);

// 8 Realizar el factorial de los primeros N números.
// factorial n! = n * (n-1) ... 2 

// let n = parseInt(prompt('Ingresa un numero'));
// let f = 1;

// for ( let i = 1; i <= n; i++){
//     f *= i;
// };

// document.write(f);   