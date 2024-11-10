window.onload = () => {
    var contenedor = document.getElementById('contenedor');
    var contenedorDos = document.getElementById('contenedorDos');
    var btnSubmit = document.getElementById('enviar');
    var inputUsername = document.getElementById('username');
    var usuarioGreeting = document.getElementById('usuarioGreeting');
    var cerrarSesion = document.getElementById('cerrarSesion');
    var tamLetra = document.getElementById('letra');

    let fontSize = "";

    if (document.cookie) {
        contenedorDos.style.display = "flex"
        contenedor.style.display = "none";

        usuarioGreeting.innerHTML = `Hola ${leerCookie("usuario")}`;

        cerrarSesion.addEventListener('click', (e) => {
            eraseCookie("usuario");
        });

        tamLetra.addEventListener('input', (e) => {
            if(e.data != null){
                fontSize += e.data;
            }else{
                fontSize = fontSize.slice(0, -1)
            }
            document.body.style.fontSize = fontSize + "px";
        })
    } else {
        btnSubmit.addEventListener('click', (e) => {
            crearCookie("usuario", inputUsername.value);
            window.location.reload();
        });
    }
};

function crearCookie(identicador, valor) {
    document.cookie = `${identicador}=${valor};max-age=300`;
}

function leerCookie(identificador) {
    const cookieValue = document.cookie
        .split("; ")
        .find((row) => row.startsWith(`${identificador}=`))
        ?.split("=")[1];
    return cookieValue;
}

function eraseCookie(name) {
    document.cookie = name + '=; Max-Age=-99999999;';
}
