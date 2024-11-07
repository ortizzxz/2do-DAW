import { validarCorreo } from "./Validaciones.js";

window.onload = () => {
    let nombreInput = document.getElementById('nombre');
    let apellidoInput = document.getElementById('apellido');
    let dniInput = document.getElementById('dni');
    let telfInput = document.getElementById('telefono');
    let emailInput = document.getElementById('email');
    let usernameInput = document.getElementById('username');

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

    dniInput.addEventListener('focusout', () => {
        if(!validarDNI(dniInput.value)){
            dniInput.value = "";
            dniInput.placeholder = "Introduza un DNI válido"
            dniInput.style.borderColor = "red"; 
        }else{
            dniInput.style.borderColor = "green"; 
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
    
    usernameInput.addEventListener('focusout', () => {
        if(!validarUser(usernameInput.value)){
            usernameInput.value = "";
            usernameInput.placeholder = "usuar1oV4lido"
            usernameInput.style.borderColor = "red"; 
        }else{
            usernameInput.style.borderColor = "green"; 
        }
    });
};

function validarRelleno(str){
    var regExp = /^[A-Za-z\s]*$/;
    return regExp.test(str);
}

function validarDNI(str){
    var regExp = /^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i;
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
