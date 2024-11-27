window.onload = () => {
    searchBtn = document.getElementById("searchBtn");
    let input = document.getElementById('titulo');
    let nombrePelicula = "";

    searchBtn.addEventListener('click', () =>{
        nombrePelicula = input.value;
        peticionAJAXmoderna(nombrePelicula);
    });

    /* GALERIAS */
    var galeriaContainer = document.getElementById('galeriaPeliculas');
    
    function peticionAJAXmoderna(nombrePelicula) {
        const URL = "http://www.omdbapi.com/?apikey=54349e1c&"
        
        fetch((URL + `s=${nombrePelicula}`), { method: "GET" }).then((res) => res.json()).then((movies) => {
            
            console.log(movies);
            
            movies.Search.forEach(e => {

                /* CONTENEDOR PRINCIPAL */
                let proyectoContainer = document.createElement('div');
                proyectoContainer.className = "proyecto";

                /* IMAGEN */
                let imgProyecto = document.createElement("img");
                imgProyecto.src = e.Poster;
                imgProyecto.alt = e.Title;

                proyectoContainer.appendChild(imgProyecto);

                galeriaContainer.appendChild(proyectoContainer);

            });
        }).catch((err) => console.error("Error:", err));
    }
}

