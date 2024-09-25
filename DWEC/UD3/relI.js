// rel 1 ( 1 2 3 5 )

// 1 
// var nuevaFecha = new Date();
// document.write(nuevaFecha.getFullYear() + ' Año<br />');
// document.write((nuevaFecha.getMonth() + 1) + ' Mes <br />');
// document.write(nuevaFecha.getDay() + ' Dia <br />');
// document.write(nuevaFecha.getHours() + ' Hora<br />');
// document.write(nuevaFecha.getMinutes() + 'Minutos <br />');
// document.write(nuevaFecha.getSeconds() + ' Segundos <br />');


// 2
// var f = new Date();
// const agregarDia = 24 * 60 * 60 * 1000;
// const agregarAños = 365 * 24 * 60 * 60 * 1000;

// var fechaHoy = f.getTime();
// var fecha85 = new Date (fechaHoy + (agregarDia * 85));
// var fecha187 = new Date(fechaHoy + (agregarDia * 187));
// var fecha85y2 = new Date(fecha85  + (agregarAños * 2));
// var fecha186 = new Date(fechaHoy - (agregarDia * 186));
// var fechaResto = (fecha85 - fecha187);

// document.write("Fecha hoy: " + f.toLocaleDateString("en-GB") + "<br/>");
// document.write("Fecha en 85 días: " + fecha85.toLocaleDateString("en-GB") + "<br/>");
// document.write("Fecha en 187 días: " + fecha187.toLocaleDateString("en-GB") + "<br/>");
// document.write("Fecha en 2 años: " + fecha85y2.toLocaleDateString("en-GB") + "<br/>");
// document.write("Fecha hace 186 días: " + fecha186.toLocaleDateString("en-GB") + "<br/>");
// document.write("Variable resto: " + fechaResto + "<br/>");

// // 3 
// var detener = 1000;
// var n = 60;

// function contador(){
//     document.write('<h1>' + n + '</h1>');
//     n--;
// }

// setInterval(contador, detener);

var n = 60;

function contador() {
    if (n >= 0) {
        console.log(n);
        n--;
        setTimeout(contador, 1000);
    }
}

contador();