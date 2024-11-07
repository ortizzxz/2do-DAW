function validarMayuscula(str) {
    var regex = /^[A-Z]+/;

    return regex.test(str);
}

function validarCaracteresEspeciales(str) {
    var regex = /[!@#$%^&]+/;

    return regex.test(str);
}

export function validarCorreo(str) {
    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    return regex.test(str);
}

function validarTarjetaCredito(str) {
    str = str.replace(/-/g, ""); //quito los -
    str = str.replace(/\s/g, ""); //quito los espacios con \s

    var regex = /^[0-9]{16}$/;
    return regex.test(str);
}

function validarLongitud(str) {
    var regex = /^.{8,}$/;

    return regex.test(str);
}

function validarNumero(str) {
    var regex = /[0-9]+/;
    return regex.test(str);
}
