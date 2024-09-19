{/* IF */ }

// // ej 1 1 
// var numero = prompt('Indique un numero');

// document.write(( numero % 2 == 0 ? 'Par' : 'Impar'));

// // ej 1 2 
// var edad = prompt('Indique una edad');

// document.write(( edad >= 18 ? 'Mayor de Edad' : 'Menor de edad'));

// // 1 3 
// var edad2 = prompt('Indique una edad');
// var ciudad = prompt('Indique una ciudad');

// document.write(( (edad2 >= 25 && ciudad == 'Madrid') ? 'Enhorabuena' : 'No enhorabuena'));

// // 1 4 
// var numero = prompt('Indique un numero');
// if(numero >= 100){
//     let descuento = numero * 0.15;
//     numero = numero - descuento;
//     document.write(numero);
// }else{
//     document.write('No aplica descuento');
// }

// // 1 5 
// var nombre = prompt('Indique un nombre');

// if (nombre == 'Pablo' || nombre == 'Eduardo') {
//     document.write('Bienvenido');
// }else if(nombre == 'Ana' || nombre == 'Clara'){
//     document.write('Bienvenida');
// };

// // 1 6 
// var ciudad = prompt('Indique una ciudad');
// var edad = prompt('Indique una edad');

// if(ciudad == "Madrid" && (edad >= 18 && edad <= 30)){
//     document.write('Puede acceder al carnet de empresarios para emprendedores');
// }else{
//     document.write('No puede acceder al carnet de empresarios para emprendedores');
// }

{/* IF ELSE */ }
// // 2 1 
// var nombre = prompt('Indique un nombre');
// var apellido = prompt('Indique un apellido');

// if(nombre == "Ricardo" ){
//     document.write(apellido);
// }else{
//     document.write('nose');
// }

// // 2 2 
// var edad = prompt('Indique una edad');

// console.write((edad >= 67 ) ? 'Puede jubilarse' : 'No puede jubilarse');

// // 2 3 
// var edad = prompt('Indique una edad');

// if ( edad < 5 ){ 
//     console.write('Jardin de Infancia');
// } else if ( edad >= 6 && edad <= 11){
//     console.write('Primaria');
// }else if ( edad >= 12 && edad <= 16){
//     console.write('ESO');
// }else if ( edad >= 17 && edad <= 21){
//     console.write('Bachillerato o Ciclos');
// }else{
//     console.write('Universidad');
// };

// // 2 4 
// var nHermanos = prompt('Indique N hermanos');
// var precio = parseInt(prompt('Indique precio'));
// var descuento;

// if (nHermanos > 0) {
//     if (nHermanos >= 3) {
//         descuento = precio * 0.15;
//         precio -= descuento;
//     } else {
//         descuento = precio * 0.05;
//         precio -= descuento;
//     }
// };

// document.write(precio);

// // 2 5 
// var exam1 = parseInt(prompt('Nota Examen 1'));
// var exam2 = parseInt(prompt('Nota Examen 2'));
// var trabajo1 = parseInt(prompt('Nota Trabajo 1'));
// var trabajo2 = parseInt(prompt('Nota Trabajo 2'));

// var media = ((((exam1 + exam2) * 0.75) + ((trabajo1 + trabajo2) * 0.25)) / 2);

// if ( exam1 > 4.5 && exam2 > 4.5 && trabajo1 > 4.5 && trabajo2 > 4.5){
//     document.write((media >= 5) ? 'Aprobado con media de: ' + media : 'No aprobado');
// }else {
//     document.write('No aprobado');
// }

{/* SWITCH */}
// //3 1 
// var mes = prompt('Diga un mes');

// switch(mes)
// {
//     case('Enero' || 'Marzo' || 'Mayo' || 'Julio' || 'Agosto' || 'Octubre' || 'Diciembre'):
//         document.write('El mes tiene 31 días');
//         break;
//     case('Febrero'):
//         document.write('El mes tiene 28 días');
//         break;
//     case('Abril' || 'Junio' || 'Septiembre' || 'Noviembre'):
//         document.write('El mes tiene 28 días');
//         break;
//     default:
//         break;
// };

// // 3 3
// var operacion = prompt('Seleccione una operacion (+ - * /)');
// var a = parseInt(prompt('Numero 1'));
// var b = parseInt(prompt('Numero 2'));

// switch(operacion)
// {
//     case('+'):
//         document.write(a + ' + ' + b + ' = ' + (a+b));
//         break;
//     case('-'):
//         document.write(a + ' - ' + b + ' = ' + (a-b));
//         break;
//     case('*'):
//         document.write(a + ' * ' + b + ' = ' + (a*b));
//         break;
//     case('/'):
//         if(b === 0){ 
//             document.write('no se puede dividir entre 0');
//         }else{
//             document.write(a + ' / ' + b + ' = ' + (a/b));
//         }
//         break;
//     default:
//             console.log('Default');
//         break;
// };

