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


document.write("<table border='1'>");

    document.write("<tr>");
        document.write("<th>Property</th>");
        document.write("<th>Value</th>");
    document.write("</tr>");
    
    
    // Object.entries(windowP).forEach(([propiedad, valor]) => {
    //     document.write("<tr>");
    //     document.write("<td>" + propiedad + "</td>");
    //     document.write("<td>" + valor + "</td>");
    //     document.write("</tr>");
    // });

    for(prop in windowP){
        document.write("<tr>");
        document.write("<td>" + prop + "</td>");
        document.write("<td>" + windowP[prop] + "</td>");
        document.write("</tr>");
    }


document.write("</table>");