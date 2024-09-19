var celsius = parseFloat((prompt('Indique los Celsius: ')));
var celToFa = (1.8 * celsius) + 32;

document.write(celsius + 'ºC is' +  celToFa + ' ºF');
document.write('<br/>');


var fahrenheit = parseFloat((prompt('Indique los Fahrenheit: ')));
var faToCel = Math.trunc( ((fahrenheit - 32) / 1.8), 2 );

document.write(fahrenheit + 'ºF is' +  faToCel + ' ºC');
document.write('<br/>');

// f = (9/5 * c) - 32 
// c = (5/9)  * (f - 32)
