window.onload = () => {
  const productosContainer = document.getElementById("productos-container");

  const API_URL = "https://api.escuelajs.co/api/v1/products";
  const LIMIT = 20; // Limitar a 20 productos por cada carga
  let offset = 0; // Para saber qué productos ya hemos cargado
  let loading = false; // Para evitar llamadas duplicadas mientras cargamos
  let productosCargados = []; // Array para almacenar los IDs de los productos cargados

  const params = new URLSearchParams(window.location.search);
  const categoria = params.get("categoria");

  // Función para obtener los productos
  const fetchProductos = async () => {
    if (loading) return; // Si ya estamos cargando, no hacer nada
    loading = true; // Establecer estado de carga

    try {
      const response = await fetch(`${API_URL}?_limit=${LIMIT}&_start=${offset}`);
      const productos = await response.json();

      const productosFiltrados = categoria
        ? productos.filter(producto => producto.category?.name.toLowerCase() === categoria.toLowerCase())
        : productos;

      // Filtrar productos que ya han sido cargados
      const productosNuevos = productosFiltrados.filter(producto => !productosCargados.includes(producto.id));

      renderProductos(productosNuevos); // Solo renderizar los productos nuevos

      // Agregar los nuevos productos al array de productos cargados
      productosNuevos.forEach(producto => productosCargados.push(producto.id));

      offset += LIMIT; // Incrementar el offset para la siguiente llamada

      loading = false; // Fin de la carga
    } catch (error) {
      console.error("Error al obtener los productos:", error);
      productosContainer.innerHTML =
        "<p>Hubo un error cargando los productos. Inténtalo más tarde.</p>";
      loading = false; // Termina la carga
    }
  };

  // Función para renderizar los productos en el contenedor
  const renderProductos = (productos) => {
    console.log(productos);
    productosContainer.innerHTML += productos
      .map((producto) => `
        <div class="producto">
          <div class="producto-imagenes">
            <div class="producto-carrusel">
              <!-- Flecha izquierda -->
              <button class="flecha flecha-izquierda">&#60;</button>
              <div class="producto-carrusel-imagenes">
                ${producto.images && producto.images.length > 0
                  ? producto.images
                      .map((image, index) => `
                        <img src="${image}" alt="${producto.title}" class="producto-imagen" data-index="${index}" />
                      `)
                      .join('')
                  : '<p>No hay imágenes disponibles</p>'}  <!-- Mensaje si no hay imágenes -->
              </div>
              <!-- Flecha derecha -->
              <button class="flecha flecha-derecha">&#62;</button>
            </div>
          </div>
          <h3>${producto.title}</h3>
          <p>$${producto.price.toFixed(2)}</p>
          <button class="btn-comprar">Comprar</button>
        </div>
      `)
      .join("");
    
    // Función de carrusel para cada producto (solo una vez se renderiza)
    const carruseles = document.querySelectorAll(".producto-carrusel");

    carruseles.forEach((carousel) => {
      const images = carousel.querySelectorAll(".producto-imagen");
      const flechaIzquierda = carousel.querySelector(".flecha-izquierda");
      const flechaDerecha = carousel.querySelector(".flecha-derecha");
      let currentIndex = 0;

      // Mostrar solo la primera imagen al principio
      images[currentIndex].style.display = "block";
      images.forEach((img, index) => {
        if (index !== currentIndex) {
          img.style.display = "none";
        }
      });

      // Función para mostrar la siguiente imagen
      const showImage = (index) => {
        images.forEach((img, idx) => {
          if (idx === index) {
            img.style.display = "block";
          } else {
            img.style.display = "none";
          }
        });
      };

      flechaDerecha.addEventListener("click", () => {
        currentIndex = (currentIndex + 1) % images.length;
        showImage(currentIndex);
      });

      flechaIzquierda.addEventListener("click", () => {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        showImage(currentIndex);
      });
    });
  };

  // Detectar cuando el usuario hace scroll hasta el final
  const handleScroll = () => {
    const scrollPosition = window.innerHeight + window.scrollY;
    const bottomPosition = document.documentElement.scrollHeight;

    if (scrollPosition >= bottomPosition - 200 && !loading) { // Si está cerca del final y no estamos cargando
      fetchProductos();
    }
  };

  // Escuchar el evento de scroll
  window.addEventListener("scroll", handleScroll);

  // Cargar los primeros productos al inicio
  fetchProductos();
};
