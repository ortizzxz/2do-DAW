window.addEventListener('load', () => {
    // tarjeta
    const numeroDeTarjeta = document.getElementById('numeroDeTarjeta');
    const nombreDeCliente = document.getElementById('nombreDeCliente');
    const fechaDeExpiracion = document.getElementById('fechaDeExpiracion');

    // Formulario 
    const usuario = document.getElementById('cardHolder');
    const tarjeta = document.getElementById('cardNumber');
    const expirationMonth = document.getElementById('expirationMonth');
    const expirationYear = document.getElementById('expirationYear');
    const cvv = document.getElementById('cvv');

    usuario.addEventListener('input', (e) => {
        nombreDeCliente.textContent = e.target.value;
    });

    tarjeta.addEventListener('input', (e) => {
        let value = tarjeta.value.replace(/\D/g, ''); 

        if (value.length > 16) {
            value = value.slice(0, 16); 
            tarjeta.value = value; 
        }

        if(value.length == 0){
            numeroDeTarjeta.textContent = "";
        }
        
        let formattedValue = '';

        for (let i = 0; i < value.length; i++) {
            if ( (i > 0) && (i % 4 === 0) ) {
                formattedValue += ' ';
            }
            formattedValue += value[i];
        }
        
        numeroDeTarjeta.textContent = formattedValue;
    });


    expirationMonth.addEventListener('input', updateExpiration);
    expirationYear.addEventListener('input', updateExpiration);

    function updateExpiration() {
        const month = expirationMonth.value;
        const year = expirationYear.value.slice(-2);
        fechaDeExpiracion.textContent = month + "/" + year;
    }

    cvv.addEventListener('input', (e) =>{
        let value = cvv.value.replace(/\D/g, ''); 

        if (value.length > 3) {
            value = value.slice(0, 3); 
            cvv.value = value; 
        }

    });


});