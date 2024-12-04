window.onload = () => {
    const productosContainer = document.getElementById("productos-container");
  
    const API_URL = "https://api.escuelajs.co/api/v1/products";
  
    const fetchProductos = async () => {
      try {
        const response = await fetch(API_URL);
        const productos = await response.json();
        const productosLimitados = productos.slice(0, 50);
        renderProductos(productosLimitados);
      } catch (error) {
        console.error("Error al obtener los productos:", error);
        productosContainer.innerHTML =
          "<p>Hubo un error cargando los productos. Inténtalo más tarde.</p>";
      }
    };
  
    const renderProductos = (productos) => {
      productosContainer.innerHTML = productos
        .map(
          (producto) => `
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
                  `
                  )
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
      `
        )
        .join("");
  
      // Agregar la funcionalidad del carrusel
      const carruseles = document.querySelectorAll(".producto-carrusel");
  
      carruseles.forEach((carousel) => {
        const images = carousel.querySelectorAll(".producto-imagen");
        const flechaIzquierda = carousel.querySelector(".flecha-izquierda");
        const flechaDerecha = carousel.querySelector(".flecha-derecha");
        let currentIndex = 0;
  
        // Inicializa el primer producto visible
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
  
        // Navegar hacia la siguiente imagen (flecha derecha)
        flechaDerecha.addEventListener("click", () => {
          currentIndex = (currentIndex + 1) % images.length; // Vuelve al principio si llega al final
          showImage(currentIndex);
        });
  
        // Navegar hacia la imagen anterior (flecha izquierda)
        flechaIzquierda.addEventListener("click", () => {
          currentIndex = (currentIndex - 1 + images.length) % images.length; // Vuelve al final si llega al principio
          showImage(currentIndex);
        });
      });
    };
  
    fetchProductos();
  };
  