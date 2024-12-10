window.onload = () => {
  // Variables y constantes
  const inicioBtn = document.getElementById("inicio");
  const inicioLink = document.getElementById("inicioLink");
  const hero = document.getElementById("hero");
  const productosContainer = document.getElementById("productos-container");
  const productos = document.getElementById("productos");
  const categoriasContainer = document.getElementById('categorias');
  const categorias = document.querySelectorAll(".link-categorias");
  const carritoLink = document.getElementById('carritoLink');
  const carritoCount = document.getElementById('carritoCount');
  const carritoModal = document.getElementById('carrito');
  const carritoProductos = document.getElementById('carritoProductos');
  const carritoTotal = document.getElementById('carritoTotal');
  const vaciarCarritoBtn = document.getElementById('vaciarCarrito');
  const procederPagoBtn = document.getElementById('procederPago');
  const cerrarCarritoBtn = document.getElementById('cerrarCarrito');
  const API_URL = "https://api.escuelajs.co/api/v1/products";
  const LIMIT = 20; // Limitar a 20 productos por cada carga
  let offset = 0; // Para saber qué productos ya hemos cargado
  let loading = false; // Para evitar llamadas duplicadas mientras cargamos
  let productosCargados = []; // Array para almacenar los IDs de los productos cargados
  let categoria = null; // Variable para almacenar la categoría seleccionada

  // Recuperar carrito del localStorage
  const carrito = JSON.parse(localStorage.getItem('carrito')) || [];

  // Función para actualizar el contador del carrito
  const actualizarCarritoCount = () => {
    carritoCount.textContent = carrito.length;
  };

  // Función para mostrar los productos en el carrito
  const renderCarrito = () => {
    if (carrito.length === 0) {
      carritoProductos.innerHTML = '<p>No hay productos en el carrito</p>';
      carritoTotal.innerHTML = 'Total: $0.00';
    } else {
      carritoProductos.innerHTML = carrito.map(producto => `
        <div class="producto-carrito">
          <p>${producto.title} - $${producto.price.toFixed(2)} x ${producto.cantidad}</p>
        </div>
      `).join('');
  
      const total = carrito.reduce((total, producto) => total + producto.price * producto.cantidad, 0);
      carritoTotal.innerHTML = `${total.toFixed(2)}`;
    }
  
    // // Eliminar el evento anterior
    // carritoProductos.removeEventListener('click', eliminarProductoHandler);
    
    // Agregar un nuevo evento de delegación
    carritoProductos.addEventListener('click', eliminarProductoHandler);
  };
  
  // function eliminarProductoHandler(e) {
  //   if (e.target.classList.contains('btn-eliminar')) {
  //     const productoId = parseInt(e.target.getAttribute('data-id'));
  //     const productoIndex = carrito.findIndex(producto => producto.id === productoId);
      
  //     if (productoIndex > -1) {
  //       carrito.splice(productoIndex, 1);
  //       localStorage.setItem('carrito', JSON.stringify(carrito));
  //       renderCarrito();
  //       actualizarCarritoCount();
  //     }
  //   }
  // }

  // Mostrar el carrito cuando se haga clic en el enlace
  carritoLink.addEventListener('click', (e) => {
    e.preventDefault();
    carritoModal.style.display = 'flex';
    renderCarrito();
  });

  // Cerrar el carrito
  cerrarCarritoBtn.addEventListener('click', () => {
    carritoModal.style.display = 'none';
  });

  // Vaciar el carrito
  vaciarCarritoBtn.addEventListener('click', () => {
    localStorage.removeItem('carrito');
    carrito.length = 0;
    renderCarrito();
    actualizarCarritoCount();
  });

  

  // Función para proceder al pago
  procederPagoBtn.addEventListener('click', () => {
    alert('Procediendo al pago...');
  });

  // Función para añadir un producto al carrito
  const anadirAlCarrito = (producto) => {
    const productoExistente = carrito.find(item => item.id === producto.id);
    if (productoExistente) {
      productoExistente.cantidad += 1;
    } else {
      carrito.push({ ...producto, cantidad: 1 });
    }
    localStorage.setItem('carrito', JSON.stringify(carrito));
    actualizarCarritoCount();
  };

  // Función para obtener los productos
  const fetchProductos = async (categoriaSeleccionada = null) => {
    if (loading) return;
    loading = true;

    try {
      const response = await fetch(`${API_URL}?_limit=${LIMIT}&_start=${offset}`);
      const productos = await response.json();

      // Filtrar productos según la categoría seleccionada
      const productosFiltrados = categoriaSeleccionada
        ? productos.filter(producto => producto.category?.name.toLowerCase() === categoriaSeleccionada.toLowerCase())
        : productos;

      const productosNuevos = productosFiltrados.filter(producto => !productosCargados.includes(producto.id));

      renderProductos(productosNuevos);
      productosNuevos.forEach(producto => productosCargados.push(producto.id));
      offset += LIMIT;

      loading = false;
    } catch (error) {
      console.error("Error al obtener los productos:", error);
      productosContainer.innerHTML = "<p>Hubo un error cargando los productos. Inténtalo más tarde.</p>";
      loading = false;
    }
  };


  // Función para renderizar los productos en el contenedor
  const renderProductos = (productos) => {
    productosContainer.innerHTML = productos.map(producto => `
      <div class="producto">
        <div class="producto-imagenes">
          <div class="producto-carrusel">
            <button class="flecha flecha-izquierda">&#60;</button>
            <div class="producto-carrusel-imagenes">
              ${producto.images && producto.images.length > 0
        ? producto.images.map((image, index) => `
                  <img src="${image}" alt="${producto.title}" class="producto-imagen" data-index="${index}" />
                `).join('')
        : '<p>No hay imágenes disponibles</p>'
      }
            </div>
            <button class="flecha flecha-derecha">&#62;</button>
          </div>
        </div>
        <h3>${producto.title}</h3>
        <p>$${producto.price.toFixed(2)}</p>
        <button class="btn-comprar" data-id="${producto.id}" data-title="${producto.title}" data-price="${producto.price}" data-images="${producto.images}">Añadir al Carrito</button>
      </div>
    `).join('');

    // Funcionalidad para las flechas del carrusel
    const carruseles = document.querySelectorAll('.producto-carrusel');
    carruseles.forEach(carrusel => {
      const flechaIzquierda = carrusel.querySelector('.flecha-izquierda');
      const flechaDerecha = carrusel.querySelector('.flecha-derecha');
      const imagenes = carrusel.querySelector('.producto-carrusel-imagenes');
      const imagenesArray = Array.from(imagenes.children);

      let indiceActual = 0;

      const cambiarImagen = (nuevoIndice) => {
        imagenesArray.forEach((img, index) => img.style.display = 'none');
        imagenesArray[nuevoIndice].style.display = 'block';
      };

      cambiarImagen(indiceActual);

      flechaIzquierda.addEventListener('click', () => {
        indiceActual = (indiceActual === 0) ? imagenesArray.length - 1 : indiceActual - 1;
        cambiarImagen(indiceActual);
      });

      flechaDerecha.addEventListener('click', () => {
        indiceActual = (indiceActual === imagenesArray.length - 1) ? 0 : indiceActual + 1;
        cambiarImagen(indiceActual);
      });
    });

    // Añadir al carrito
    const botonesAñadirCarrito = document.querySelectorAll('.btn-comprar');
    botonesAñadirCarrito.forEach(boton => {
      boton.addEventListener('click', (event) => {
        const producto = {
          id: event.target.dataset.id,
          title: event.target.dataset.title,
          price: parseFloat(event.target.dataset.price),
          images: event.target.dataset.images,
        };
        anadirAlCarrito(producto);
        renderCarrito();
      });
    });
  };

  // Cargar los productos al cargar la página
  fetchProductos();

  // Función de scroll infinito
  window.onscroll = () => {
    if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 100 && !loading) {
      fetchProductos();
    }
  };

  // Filtro por categoría

  categorias.forEach(categoria => {
    categoria.addEventListener('click', (e) => {
      // Evitar que el navegador siga el enlace y recargue la página
      e.preventDefault();

      // Aplicar estilos
      productos.style.display = "inline";
      hero.style.display = "none";
      categoriasContainer.style.display = 'none';

      // Obtener el valor de la categoría desde el href del enlace
      const categoriaSeleccionada = new URL(e.target.closest('a').href).searchParams.get('categoria');

      // Limpiar los productos actuales y resetear variables necesarias
      productosContainer.innerHTML = ''; // Limpiar productos actuales
      productosCargados = [];
      offset = 0;

      // Llamar a la función para cargar productos filtrados
      fetchProductos(categoriaSeleccionada);
    });
  });



  // Enlace para abrir el login
  document.getElementById('loginLink').addEventListener('click', (e) => {
    e.preventDefault();  // Evitar que se recargue la página
    document.getElementById('login').style.display = 'block';  // Mostrar modal de login
  });

  // Enlace para abrir el registro
  document.getElementById('registerLink').addEventListener('click', (e) => {
    e.preventDefault();  // Evitar que se recargue la página
    document.getElementById('register').style.display = 'block';  // Mostrar modal de registro
  });

  // Enlace para abrir el carrito
  document.getElementById('carritoLink').addEventListener('click', (e) => {
    e.preventDefault();  // Evitar que se recargue la página
    document.getElementById('carrito').style.display = 'flex';  // Mostrar carrito
  });

  // Formulario de login
  const loginForm = document.getElementById('loginForm');
  loginForm.addEventListener('submit', (e) => {
    e.preventDefault();  // Evitar que se recargue la página al enviar el formulario
    // Lógica de autenticación (si la tienes)
  });

  // Formulario de registro
  const registerForm = document.getElementById('registerForm');
  registerForm.addEventListener('submit', (e) => {
    e.preventDefault();  // Evitar que se recargue la página al enviar el formulario
    // Lógica de registro (si la tienes)
  });

  // Botón para cerrar el modal de login
  document.getElementById('closeLogin').addEventListener('click', (e) => {
    e.preventDefault();  // Evitar recarga si el botón es un enlace
    document.getElementById('login').style.display = 'none';  // Cerrar el modal de login
  });

  // Botón para cerrar el modal de registro
  document.getElementById('closeRegister').addEventListener('click', (e) => {
    e.preventDefault();  // Evitar recarga si el botón es un enlace
    document.getElementById('register').style.display = 'none';  // Cerrar el modal de registro
  });

  // Para volver al incio
  inicioBtn.addEventListener('click', (e) => {
    e.preventDefault();
    // Aplicar estilos
    productos.style.display = "none";
    hero.style.display = "inline";
    categoriasContainer.style.display = 'grid';

  })
  
  // Para volver al incio
  inicioLink.addEventListener('click', (e) => {
    e.preventDefault();
    // Aplicar estilos
    productos.style.display = "none";
    hero.style.display = "inline";
    categoriasContainer.style.display = 'grid';

  })




  // Actualizar el contador del carrito
  actualizarCarritoCount();
};
