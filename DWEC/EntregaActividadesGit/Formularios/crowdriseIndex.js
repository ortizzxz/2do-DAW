window.onload = () =>{
    let nombreInput = document.getElementById('name');
    let apellidoInput = document.getElementById('lastname');
    let telfInput = document.getElementById('number');
    let emailInput = document.getElementById('email');
    let password = document.getElementById('password')
    let passwordR = document.getElementById('passwordR')

    nombreInput.addEventListener('focusout', () =>{
        if(!validarRelleno(nombreInput.value)){
            nombreInput.value = "";
            nombreInput.placeholder = "Introduza un nombre válido"
            nombreInput.style.borderColor = "red"; 
        }else{
            nombreInput.style.borderColor = "green";
        }
    });
    
    apellidoInput.addEventListener('focusout', () =>{
        if(!validarRelleno(apellidoInput.value)){
            apellidoInput.value = "";
            apellidoInput.placeholder = "Introduza un Apellido válido"
            apellidoInput.style.borderColor = "red"; 
        }else{
            apellidoInput.style.borderColor = "green"; 
        }
    });
    
    telfInput.addEventListener('focusout', () => {
        if(!validarNumeroTelefono(telfInput.value)){
            telfInput.value = "";
            telfInput.placeholder = "Introduza un número válido"
            telfInput.style.borderColor = "red"; 
        }else{
            telfInput.style.borderColor = "green";
        }
    });
    
    emailInput.addEventListener('focusout', () => {
        if(!validarCorreo(emailInput.value)){
            emailInput.value = "";
            emailInput.placeholder = "Introduza un correo válido"
            emailInput.style.borderColor = "red"; 
        }else{
            emailInput.style.borderColor = "green"; 
        }
    });
    
    password.addEventListener('focusout', () => {
        if(!validarCaracteresEspeciales(password.value)){
            password.value = "";
            password.placeholder = "Introduza una contraseña válida"
            password.style.borderColor = "red"; 
        }else{
            password.style.borderColor = "green"; 
        }
    });

    passwordR.addEventListener('focusout', () => {
        if((passwordR.value != password.value)){
            passwordR.value = "";
            passwordR.placeholder = "Las contraseñas no coinciden"
            passwordR.style.borderColor = "red"; 
        }else{
            passwordR.style.borderColor = "green"; 
        }
    });
};

function validarRelleno(str){
    var regExp = /^[A-Za-z\s]{3,}$/;
    return regExp.test(str);
}

function validarNumeroTelefono(str) {
    var regex = /^[0-9]{9,10}$/;
    return regex.test(str);
}

function validarUser(str){
    var regExp = /^(?=.*\d)(?=.*[^\d\s])[^\s]+$/;
    return regExp.test(str);
}

function validarCorreo(str) {
    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    return regex.test(str);
}


function validarCaracteresEspeciales(str) {
    var regex = /[!@#$%^&]+/;

    return regex.test(str);
}