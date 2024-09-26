// ws 3 (1 2 7 9)

// 1 
// a
function invierteCadena(cad_arg){
    let nu = cad_arg.length;
    let nPalabra ="";

    for ( let i = (nu-1); i >= 0; i--){
        nPalabra += cad_arg[i];
    }

    return nPalabra;
} 

// document.write(invierteCadena("hola"));

//b
function inviertePalabras(cad_arg){
    let a = cad_arg.split(" ");
    let n = a.length;
    let pal = "";


    for ( let i = (n-1); i >= 0; i--){
        pal += (invierteCadena(a[i]) + " ");
    }
    
    return pal;

}
// document.write(inviertePalabras("hola loquito"));

// // c 
function encuentraPalabraMasLarga(cad_arg){

    let a = cad_arg.split(" ");
    let mayor = 0;
    let palabraMayor = "";
    let n = a.length;
    
    for ( let i = 0; i < n; i++){
        if(a[i].length > mayor){
            palabraMayor = a[i];
            mayor = a[i].length;
        }
    }

    return palabraMayor;
}

// document.write(encuentraPalabraMasLarga("holaaaa hola a"));
// d
function filtraPalabraMasLargas(cad_arg, i){
    let contador = 0;
    let n = cad_arg.split(" ");
    let m = n.length;

    for(let j = 0; j < m; j++){
        if(n[j].length > i){ 
            contador++;
        };
    }
    return contador;
}

// document.write(filtraPalabraMasLargas("hola hollaaaaa ho asdasdas", 8))
// e
function cadenaBienFormada(cad_arg){
    let cadena = "";
    let a = (cad_arg[0].toUpperCase());
    let b = "";
    for (let i = 1; i < cad_arg.length; i++){
        b += cad_arg[i].toLowerCase();
    }

    cadena = (a + b);
    return cadena;
}

document.write(cadenaBienFormada("HOLAaaa"));