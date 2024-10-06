/* RELACION W1 2 3 6 7 */

// 2
function lanzamiento(){
    let caras = [1, 2, 3, 4, 5, 6];
    let r = Math.floor(Math.random () * (caras.length));

    return caras[r];
}

function lanzamiento6000(){
    let caras = [1, 2, 3, 4, 5, 6];
    let contador = [0, 0, 0, 0, 0, 0];
    
    for (let i = 0; i < 6000; i++){
        let r = Math.floor(Math.random () * (caras.length));
        
        switch(caras[r]){
            case 1:
                contador[0]++;
                break;
            case 2:
                contador[1]++;
                break;
            case 3:
                contador[2]++;
                break;
            case 4:
                contador[3]++;
                break;
            case 5:
                contador[4]++;
                break;
            case 6:
                contador[5]++;
                break;
            default:
                break;
        }
    }

    return contador;
}
// 3
function imprimirLanzamientos(){
    let l = lanzamiento6000();

    for(let i = 0; i < l.length; i++){
        document.write('Cara ' + (i+1) + ' | Apariciones: ' + l[i] + '<br/>');
    }
} 

function potenciasRecursivas(base, exponente){
        //caso base
        if(exponente == 0){
            return 1;
        }

        //caso recursivo
        return (base * potenciasRecursivas(base, (exponente-1)));
}

function getFactorial(x){
    if(x == 0){
        return 1;
    }
    return ( x * getFactorial(x-1));
}


function pruebaFactorial(){
    document.write('<table border="1 px"> <tr> <td>Numero</td> <td> Factorial </td> </tr>');

    for(let i = 1; i <= 10; i++){
        document.write('<tr>');
        
        document.write('<td>');
        document.write(i);
        document.write('</td>');

        document.write('<td>');
        document.write(getFactorial(i));
        document.write('</td>');

        document.write('</tr>');
    }

    document.write('</table>');
}

pruebaFactorial();