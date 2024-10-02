// UTC 
var nuevaFecha = new Date();
nuevaFecha.toUTCString();
document.write(nuevaFecha + '<br />');

// Locale Date 
var c = new Date();
c = c.toLocaleString();
document.write(c + '<br/>');

// hora
nuevaFecha = nuevaFecha.getHours();
document.write(nuevaFecha);

// time out 
