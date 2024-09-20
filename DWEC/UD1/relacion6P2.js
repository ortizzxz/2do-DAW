// // 9
// var col = parseInt(prompt('Columnas'));
// var alt = parseInt(prompt('Altura'));
// var anc = parseInt(prompt('Anchura'));

// document.write('<table border="0" cellspacing="2" bgcolor="black" width="200" >');
// document.write('<tr bgcolor="white" height="' + alt +  '" >');

// for ( let i = 0; i < col; i++){
//     if((i%2 == 0) ? document.write('<td width="' + anc + '">&nbsp;</td>') : document.write('<td bgcolor="black" width="' + anc + '">&nbsp;</td>'));
// }

// document.write('</tr>');
// document.write('</table>');

// // 4 14
// var col = parseInt(prompt('Columnas'));
// var alt = parseInt(prompt('Altura'));
// var anc = parseInt(prompt('Anchura'));
// let i = 0;
// document.write('<table border="0" cellspacing="2" bgcolor="black" width="200" >');
// document.write('<tr bgcolor="white" height="' + alt +  '" >');

// while ( i <= col){
//     if((i%2 == 0) ? document.write('<td width="' + anc + '">&nbsp;</td>') : document.write('<td bgcolor="black" width="' + anc + '">&nbsp;</td>'));
//     i++;
// }

// document.write('</tr>');
// document.write('</table>');

// // 4 18
// var col = parseInt(prompt('Columnas'));
// var fil = parseInt(prompt('Filas'));
// var alt = parseInt(prompt('Altura'));
// var anc = parseInt(prompt('Anchura'));

// document.write('<table border="0" cellspacing="2" bgcolor="black" width="200" >');

// for ( let i = 0; i < fil; i++){
//     document.write('<tr bgcolor="white" height="' + alt +  '" >');

//     for(let a = 0; a < col; a++){
//         document.write('<td width="' + anc + '">&nbsp;</td>');
//     }
    
// }

// document.write('</tr>');
// document.write('</table>');

// 4 19 
// let area = parseInt(prompt('Indique medida'));

// document.write('<table border="0" cellspacing="2" bgcolor="black" >');

// for ( let i = 0; i < 8; i++){
//     document.write('<tr back height="' + area  + '" >');

//     for(let a = 0; a < 8; a++){
//         if(i%2==0){
//             if((a%2==0) ? document.write('<td bgcolor="white" width="' + area + '">&nbsp;</td>') 
//                         : document.write('<td  bgcolor="black" width="' + area + '">&nbsp;</td>'));
//         }else{
//             if((a%2==0) ? document.write('<td bgcolor="black" width="' + area + '">&nbsp;</td>') 
//                         : document.write('<td  bgcolor="white" width="' + area + '">&nbsp;</td>'));
//         }
        
//     }

//     document.write('</tr>');
// }
// document.write('</table>');