window.onload = () => {
    // tarjeta
    var numeroDeTarjeta = document.getElementById('numeroDeTarjeta');
    var nombreDeCliente = document.getElementById('nombreDeCliente');
    var fechaDeExpiracion = document.getElementById('fechaDeExpiracion');

    // formulario
    var usuario = document.getElementById('cardHolder');
    var tarjeta = document.getElementById('cardNumber');
    var expirationMonth = document.getElementById('expirationMonth');
    var expirationYear = document.getElementById('expirationYear');
    var cvv = document.getElementById('cvv')

    usuario.addEventListener('input', (e) =>{
        if(e.data != null){
            nombreDeCliente.innerHTML += e.data;
        }else{
            numeroDeTarjeta.innerHTML = numeroDeTarjeta.innerHTML.slice(0, -1);
        }
    });

    tarjeta.addEventListener('input', (e) => {
        if(e.data != null){
            if(numeroDeTarjeta.innerHTML.length <= 18){
                if((numeroDeTarjeta.innerHTML.length+1) % 5 == 0){ // de 4 en 4
                    numeroDeTarjeta.innerHTML = numeroDeTarjeta.innerHTML + " " + e.data;
                }else{
                    numeroDeTarjeta.innerHTML += e.data;
                }
            }

        }else{
            numeroDeTarjeta.innerHTML = numeroDeTarjeta.innerHTML.slice(0, -1);
        }
    })

};