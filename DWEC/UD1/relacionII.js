// GEOMETRIZER 
// area = 3.14 * radio * radio;
// c = 3.14 * d; 
// d = 2 * r; 

var radio = parseFloat((prompt('Indique el radio: ')));
var d = 2 * radio;
var c = 2 * 3.14 * radio;
var area = (3.14 * radio) * (3.14 * radio) ;

document.write('The circumference is ' + c);
document.write('<br/>');
document.write('The area is ' + area);

