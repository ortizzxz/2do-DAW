//ej 1
// for (let i = 1; i <= 10; i++){
//     document.write(i + '<hr />')
// };

// 2 
// var num = parseInt(prompt('Diga un numero'));

// for (let i = num; i <= 100; i++){
//     document.write(i + '<br />');
// }

// 3
// let num = 1;
// while(num != 0){
//     num = parseInt(prompt('Diga un numero'));
// };

// 4 
// let pal = "";
// while(pal != 'SALIR'){
//     pal = prompt('Diga una palabra');
//     document.write(pal + ' <br />')
// };

// 5
// var suma = 0;

// for (let i = 0; i < 10; i++){
//     var num = parseInt(prompt('Diga un numero'));
//     suma += num;
// }

// document.write(suma);

// 6 
// var num = parseInt(prompt('Diga un numero'));

// for (let i = 0; i <= 10; i++){
//     document.write(num + ' * ' + i +'= ' +(num*i) + '<br />');
// }

// // 7
// var num = parseInt(prompt('Diga un numero'));
// var ad;

// while(ad != num){
//     if((ad > num) ? console.log('Prueba a menos') : console.log('Prueba a más'));
//     ad = parseInt(prompt('Diga un numero'));
// };

// // 8 
// for (let i = 1; i <= 6; i++){
//     document.write('<H' + i + '>' + 'Cabecera H' + i + '<H' + i + '/>')
// }

// 9
var col = parseInt(prompt('Columnas'));
var alt = parseInt(prompt('Altura'));
var anc = parseInt(prompt('Anchura'));

document.write('<table border="0" cellspacing="2" bgcolor="black" width="200" >');
document.write('<tr bgcolor="white" height="' + alt +  '" >');

for ( let i = 0; i < col; i++){
    document.write('<td width="' + anc + '">&nbsp;</td>');
}

document.write('</tr>');
document.write('</table>');