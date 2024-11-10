/*
Crea 3 funciones genéricas para el manejo de cookies:
    a) CrearCookie(identificador,valor,fechaExpiracion): Crea la cookie con sólo un par identificador=valor.
    b) LeerCookie(identificador): Devuelve el valor dentro de la cookie para el identificador indicado si existe o null en caso contrario.
    c) BorrarCookie().
*/

function crearCookie(identicador, valor, fechaExpiracion) {
    document.cookie = `${identicador}=${valor};max-age=${fechaExpiracion}`;
}

function leerCookie(identificador) {
    if (
        document.cookie.split(";").some((item) => item.trim().startsWith(`${identificador}=`))
    ) {
        const cookieValue = document.cookie
            .split("; ")
            .find((row) => row.startsWith(`${identificador}=`))
            ?.split("=")[1];

        console.log(identificador + " => " + cookieValue);
    }
}

function borrarCookie(){ // no entiendo si esta cookie o todas las cookies

}

crearCookie("clave", "valor", 545454445);
leerCookie("clave")
