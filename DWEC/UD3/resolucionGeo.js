/* 
The geolocation API allows the user to provide their location to web applications if they so desire. For privacy reasons, the user is asked for permission to report location information.

The geolocation API is published through the navigator.geolocation object. If the object exists, geolocation services are available.

Develop a web app in which:
    Test if geolocation is available.
    If it's available, show the current position (latitude and longitude)
    If it isn't available, show a message for each and everyone of the possible errors.
    Improve your code so you show the position continuously (although the user could be moving, so it could change)
    Find the way to meassure the distance traveled.

Let's try to use the geolocation information with the API of Here Maps.
    Use a map to show your location
    Draw a marker in your location
*/

// // a 1 
// function muestraPosicion(pos) {
//     document.write('Callback... <br/>');
//     document.write('Latitud: ' + pos.coords.latitude + '<br/>');
//     document.write('Longitud: ' + pos.coords.longitude + '<br/> <br/>');
// }

// function error() {
//     document.write("No ha sido posible obtener su localizacion");
// }

// if (!navigator.geolocation) {
//     document.write("Geolocalizacion no disponible");
// } else {

//     // a 1 2 
//     try {
//         navigator.geolocation.getCurrentPosition(muestraPosicion, error);
//     } catch (e) {
//         console.error(e);
//     }

// }

// a 3 
// try {
//     navigator.geolocation.watchPosition(muestraPosicion);
// } catch (e) {
//     console.error(e);
// }


// // 2 
// function muestraPosicionMejorada(pos) {
//     let lat = pos.coords.latitude;
//     let lon = pos.coords.longitude;

//     var map = L.map('map').setView([lat, lon], 13);
//     L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
//         maxZoom: 19,
//         attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
//     }).addTo(map);

//     var marker = L.marker([lat, lon]).addTo(map);

// }

// navigator.geolocation.getCurrentPosition(muestraPosicionMejorada);

function calcDistancia(lat1, lon1, lat2, lon2) {
    const R = 6371e3; // radio de la tierra en metros
    const l1 = lat1 * Math.PI / 180;
    const l2 = lat2 * Math.PI / 180;
    const la1 = (lat2 - lat1) * Math.PI / 180;
    const la2 = (lon2 - lon1) * Math.PI / 180;

    const a = Math.sin(la1 / 2) * Math.sin(la1 / 2) + Math.cos(l1) * Math.cos(l2) * Math.sin(la2 / 2) * Math.sin(la2 / 2);
    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

    return R * c; // distancia en metros 
}


var latPosAct = 0, latPosAnt = 0, longPosAct = 0, longPosAnt = 0;
var distanciaTotal =0;

function obtenerPosicionYCalcularDistancia() {

    navigator.geolocation.watchPosition(
        function(pos) {

            console.log('posicion nueva');
            
            latPosAnt = latPosAct;
            longPosAnt = longPosAct;
            
            latPosAct = pos.coords.latitude;
            longPosAct = pos.coords.longitude;

            console.log("posicion nueva:", latPosAct, longPosAct);
            
            if (latPosAnt === 0 && longPosAnt === 0) {
                latPosAnt = latPosAct;
                longPosAnt = longPosAct;
                return;
            }

            const lat1 = latPosAnt;
            const lon1 = longPosAnt;
            const lat2 = latPosAct;
            const lon2 = longPosAct;

            distanciaTotal += calcDistancia(lat1, lon1, lat2, lon2);
            document.getElementById('result').textContent = `La distancia es: ${distanciaTotal.toFixed(2)} metros`;        
        }
    );
}

obtenerPosicionYCalcularDistancia();