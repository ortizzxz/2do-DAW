function imprimeConsola(error){
    console.log(error);
}

function orden(a, b){

    if(a < b){
        return 1;
    }else if(b < a){
        return -1;
    }else{
        return 0;
    }

}

function orden3(a, b, c){
        

}

var resultado = orden3("mathias", "jose", "francisco");
console.log(resultado); 