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


    // Agregar un nuevo evento de delegación
    carritoProductos.addEventListener('click', eliminarProductoHandler);
  };
  

  function eliminarProductoHandler(e) {
    if (e.target.classList.contains('btn-eliminar')) {
      const productoId = parseInt(e.target.getAttribute('data-id'));
      const productoIndex = carrito.findIndex(producto => producto.id === productoId);

      if (productoIndex > -1) {
        carrito.splice(productoIndex, 1);
        localStorage.setItem('carrito', JSON.stringify(carrito));
        renderCarrito();
        actualizarCarritoCount();
      }
    }
  }

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
    actualizarCarritoCount();
    renderCarrito();
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
      const response = await fetch(`${API_URL}?_limit=${LIMIT}&_start=${offset}${categoriaSeleccionada ? `&category=${categoriaSeleccionada}` : ''}`);
      const productos = await response.json();

      const productosNuevos = productos.filter(producto => !productosCargados.includes(producto.id));

      if (productosNuevos.length > 0) {
        renderProductos(productosNuevos, true);
        productosNuevos.forEach(producto => productosCargados.push(producto.id));
        offset += LIMIT;
      } else {
        // No hay más productos para cargar
        window.onscroll = null; // Desactivar el scroll infinito
      }

      loading = false;
    } catch (error) {
      console.error("Error al obtener los productos:", error);
      productosContainer.innerHTML += "<p>Hubo un error cargando los productos. Inténtalo más tarde.</p>";
      loading = false;
    }
  };

  // Función para mostrar los detalles del producto en el modal
const mostrarDetallesProducto = (producto) => {
  // Rellenar el modal con la información del producto
  document.getElementById('productoModalTitulo').textContent = producto.title;
  document.getElementById('productoModalDescripcion').textContent = producto.description || 'No hay descripción disponible';
  document.getElementById('productoModalPrecio').textContent = `$${producto.price.toFixed(2)}`;

  // Mostrar el modal
  document.getElementById('productoModal').style.display = 'block';

  // Añadir la funcionalidad al botón de añadir al carrito
  document.getElementById('productoModalCarritoBtn').onclick = () => {
    anadirAlCarrito(producto);
    document.getElementById('productoModal').style.display = 'none';  // Cerrar el modal después de añadir al carrito
    renderCarrito();
  };
};

const renderProductos = (productos) => {
  console.log(productos);
  productosContainer.innerHTML = productos.map(producto => `
    <div class="producto" data-id="${producto.id}">
      <div class="producto-imagenes">
        <div class="producto-carrusel">
          <button class="flecha flecha-izquierda">&#60;</button>
          <div class="producto-carrusel-imagenes">
            ${producto.images && producto.images.length > 0
        ? producto.images.map((image, index) => `
                  <img src="${image}" alt="${producto.title}" class="producto-imagen" data-index="${index}" onerror="defaultImage(event)" />
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

   // Agregar el evento de clic para mostrar detalles del producto en el modal
   const productosElementos = document.querySelectorAll('.producto');
   productosElementos.forEach(productoElemento => {
     productoElemento.addEventListener('click', () => {
       const productoId = productoElemento.dataset.id;
       const productoSeleccionado = productos.find(p => p.id == productoId);
       if (productoSeleccionado) {
         mostrarDetallesProducto(productoSeleccionado);
       }
     });
   });

   // Agregar eventos de clic en las flechas del carrusel
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

     flechaIzquierda.addEventListener('click', (event) => {
       event.stopPropagation(); // Detener la propagación del evento
       indiceActual = (indiceActual === 0) ? imagenesArray.length - 1 : indiceActual - 1;
       cambiarImagen(indiceActual);
     });

     flechaDerecha.addEventListener('click', (event) => {
       event.stopPropagation(); // Detener la propagación del evento
       indiceActual = (indiceActual === imagenesArray.length - 1) ? 0 : indiceActual + 1;
       cambiarImagen(indiceActual);
     });
   });

   // Manejar clics en el botón de "Añadir al Carrito"
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
    if ((window.innerHeight + window.scrollY >= document.body.offsetHeight - 100) && !loading) {
      fetchProductos(categoria);
    }
  };


  // Filtro por categoría
  categorias.forEach(categoria => {
    categoria.addEventListener('click', (e) => {
      e.preventDefault();
      productos.style.display = "inline";
      hero.style.display = "none";
      categoriasContainer.style.display = 'none';

      const categoriaSeleccionada = new URL(e.target.closest('a').href).searchParams.get('categoria');

      productosContainer.innerHTML = '';
      productosCargados = [];
      offset = 0;
      categoria = categoriaSeleccionada; // Actualizar la variable global
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
  // Referencias a formularios y mensajes de error
  const loginForm = document.getElementById('loginForm');
  const registerForm = document.getElementById('registerForm');
  const loginError = document.getElementById('loginError');
  const registerError = document.getElementById('registerError');
  const API_BASE_URL = 'https://api.escuelajs.co/api/v1/users';

  // func para registrar un usuario
  const registrarUsuario = async (email, password, name) => {
    try {
      // Verificar si el email esta registrado // BUG: LA API SIEMPRE DEVUELVE FALSE
      const emailCheckResponse = await fetch(`${API_BASE_URL}/is-available`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ email })
      });

      const emailCheck = await emailCheckResponse.json();

      if (!emailCheck.isAvailable) {
        registerError.style.display = 'block';
        registerError.textContent = 'Este email ya está registrado.';
        return false;
      }

      // Crear el usuario
      const response = await fetch(API_BASE_URL, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
          name,
          email,
          password,
          avatar: 'https://picsum.photos/800', // Imagen genérica
        })
      });

      if (response.ok) {
        alert('¡Usuario registrado con éxito!');
        registerError.style.display = 'none';
        return true;
      } else {
        throw new Error('Error al registrar el usuario.');
      }
    } catch (error) {
      console.error(error);
      registerError.style.display = 'block';
      registerError.textContent = 'Hubo un error al registrar el usuario.';
      return false;
    }
  };

  // Función para iniciar sesión
  const iniciarSesion = async (email, password) => {
    try {
      // Obtener todos los usuarios
      const response = await fetch(API_BASE_URL);
      const usuarios = await response.json();

      // Buscar el usuario por email
      const usuario = usuarios.find(user => user.email === email);

      if (!usuario) {
        loginError.style.display = 'block';
        loginError.textContent = 'El usuario no existe.';
        return false;
      }

      if (usuario.password !== password) {
        loginError.style.display = 'block';
        loginError.textContent = 'Contraseña incorrecta.';
        return false;
      }

      // Guardar sesión activa
      localStorage.setItem('sesionActiva', JSON.stringify({ id: usuario.id, email: usuario.email, name: usuario.name }));
      loginError.style.display = 'none';
      alert(`¡Bienvenido, ${usuario.name}!`);
      return true;
    } catch (error) {
      console.error(error);
      loginError.style.display = 'block';
      loginError.textContent = 'Hubo un error al iniciar sesión.';
      return false;
    }
  };

  // Manejar el registro
  registerForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    const email = document.getElementById('emailRegister').value;
    const password = document.getElementById('passwordRegister').value;
    const confirmPassword = document.getElementById('confirmPasswordRegister').value;

    if (password !== confirmPassword) {
      registerError.style.display = 'block';
      registerError.textContent = 'Las contraseñas no coinciden.';
      return;
    }

    const registrado = await registrarUsuario(email, password);
    if (registrado) registerForm.reset();
  });

  // Manejar el inicio de sesión
  loginForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    const email = document.getElementById('emailLogin').value;
    const password = document.getElementById('passwordLogin').value;

    const logueado = await iniciarSesion(email, password);
    if (logueado) loginForm.reset();
  });

  // Verificar sesión activa al cargar la página
  const verificarSesionActiva = () => {
    const sesion = JSON.parse(localStorage.getItem('sesionActiva'));

    if (sesion) {
      alert(`¡Bienvenido nuevamente, ${sesion.name}!`);
      // Aquí podrías actualizar el DOM para mostrar el estado "logueado".
    }
  };

  // Cerrar sesión
  document.getElementById('cerrarSesion')?.addEventListener('click', () => {
    localStorage.removeItem('sesionActiva');
    alert('Sesión cerrada.');
    // Aquí podrías actualizar el DOM para mostrar el estado "deslogueado".
  });

  verificarSesionActiva();

  // Actualizar el contador del carrito
  actualizarCarritoCount();
};

// Funcion Default para obtener una imagen cuando recibo una con error
function defaultImage(e) {
  e.target.src = './assets/imgs/noImage.png';
}
