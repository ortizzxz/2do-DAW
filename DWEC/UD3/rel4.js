// ws 4: (1 2)
// ws 6: (2c 2d 2e 2f)

let windowP = {
    InnerWidth : window.innerWidth,
    OuterWidth : window.outerWidth,
    InnerHeight : window.innerHeight,
    OuterHeight: window.outerHeight,
    Languages : navigator.languages
}

/* Usamos Object.entries() para convertir el objeto en un array de pares [clave, valor]. */


// document.write("<table border='1'>");

//     document.write("<tr>");
//         document.write("<th>Property</th>");
//         document.write("<th>Value</th>");
//     document.write("</tr>");
    
    
//     // Object.entries(windowP).forEach(([propiedad, valor]) => {
//     //     document.write("<tr>");
//     //     document.write("<td>" + propiedad + "</td>");
//     //     document.write("<td>" + valor + "</td>");
//     //     document.write("</tr>");
//     // });

//     // for(prop in navigator){
//     //     document.write("<tr>");
//     //     document.write("<td>" + prop + "</td>");
//     //     document.write("<td>" + navigator[prop] + "</td>");
//     //     document.write("</tr>");
//     // }

//     for(prop in screen){
//         document.write("<tr>");
//         document.write("<td>" + prop + "</td>");
//         document.write("<td>" + screen[prop] + "</td>");
//         document.write("</tr>");
//     }


// document.write("</table>");

// ws 6: (2c 2d 2e 2f)
// 2c 2d 2e 2f 
let imagesOnDocument = document.getElementsByTagName('img');
let linksOnDocument = document.getElementsByTagName('a').length;
let firstId = imagesOnDocument.item(0).getAttribute('id');

document.write('La primera img tiene un id: ' + firstId + '<br/>');
document.write('Este HTML tiene ' + imagesOnDocument.length + ' imágenes y ' + linksOnDocument + ' links');

