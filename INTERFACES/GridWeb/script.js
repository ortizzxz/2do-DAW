window.onload = () => {
  const productosContainer = document.getElementById("productos-container");

  const API_URL = "https://api.escuelajs.co/api/v1/products";

  const params = new URLSearchParams(window.location.search);
  const categoria = params.get("categoria");

  const fetchProductos = async () => {
    try {
      const response = await fetch(API_URL);
      const productos = await response.json();

      const productosFiltrados = categoria
        ? productos.filter(producto => producto.category?.name.toLowerCase() === categoria.toLowerCase())
        : productos;

      const productosLimitados = productosFiltrados.slice(0, 100);
      renderProductos(productosLimitados);
    } catch (error) {
      console.error("Error al obtener los productos:", error);
      productosContainer.innerHTML =
        "<p>Hubo un error cargando los productos. Inténtalo más tarde.</p>";
    }
  };

  const renderProductos = (productos) => {
    productosContainer.innerHTML = productos
      .map((producto) => `
              <div class="producto">
                  <div class="producto-imagenes">
                      <div class="producto-carrusel">
                          <!-- Flecha izquierda -->
                          <button class="flecha flecha-izquierda">&#60;</button>
                          <div class="producto-carrusel-imagenes">
                              ${producto.images
          .map(
            (image, index) => `
                                      <img src="${image}" alt="${producto.title}" class="producto-imagen" data-index="${index}" />
                                  `)
          .join('')}
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

    const carruseles = document.querySelectorAll(".producto-carrusel");

    carruseles.forEach((carousel) => {
      const images = carousel.querySelectorAll(".producto-imagen");
      const flechaIzquierda = carousel.querySelector(".flecha-izquierda");
      const flechaDerecha = carousel.querySelector(".flecha-derecha");
      let currentIndex = 0;

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

  fetchProductos();
};
