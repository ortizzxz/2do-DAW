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
  const productoModal = document.getElementById('productoModal');
  const carritoProductos = document.getElementById('carritoProductos');
  const carritoTotal = document.getElementById('carritoTotal');
  const vaciarCarritoBtn = document.getElementById('vaciarCarrito');
  const productoModalCerrarBtn = document.getElementById('productoModalCerrarBtn');
  const procederPagoBtn = document.getElementById('procederPago');
  const cerrarCarritoBtn = document.getElementById('cerrarCarrito');
  const API_URL = "https://api.escuelajs.co/api/v1/products";
  const LIMIT = 10; // Limitar a 20 productos por cada carga
  let offset = 0; // Para saber qué productos ya hemos cargado
  let loading = false; // Para evitar llamadas duplicadas mientras cargamos
  let productosCargados = []; // Array para almacenar los IDs de los productos cargados
  let categoriaProducto = null; // Variable para almacenar la categoría seleccionada


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

  productoModalCerrarBtn.addEventListener('click', (e) => {
    e.preventDefault();
    productoModal.style.display = 'none';
  });

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
    const sesionActiva = JSON.parse(localStorage.getItem('sesionActiva'));

    // Verificar si hay sesión activa
    if (!sesionActiva) {
      // Si no hay sesión activa, mostrar un mensaje o redirigir a la página de login
      alert('Por favor, inicia sesión para añadir productos al carrito.');
      return; // Detener la ejecución de la función
    }
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
  const fetchProductos = async (categoriaSeleccionada) => {
    if (loading) return;
    loading = true;
    try {
      const response = await fetch(`${API_URL}?offset=${offset}&limit=${LIMIT}${categoriaSeleccionada ? `&categoryId=${categoriaSeleccionada}` : ''}`);
      const productos = await response.json();
      const productosNuevos = productos.filter(producto => !productosCargados.includes(producto.id));
      if (productosNuevos.length > 0) {
        renderProductos(productosNuevos, true); // Usa true para append
        productosNuevos.forEach(producto => productosCargados.push(producto.id));
        offset += LIMIT;
      } else {
        window.onscroll = null; // Desactivar el scroll infinito
      }
    } catch (error) {
      console.error("Error al obtener los productos:", error);
      productosContainer.innerHTML += "<p>Hubo un error cargando los productos. Inténtalo más tarde.</p>";
    } finally {
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


  const renderProductos = (productos, append = false) => {
    console.log(productos);
    const productosHTML = productos.map(producto => `
      <div class="producto" data-id="${producto.id}">
        <div class="producto-imagenes">
          <div class="producto-carrusel">
            <button class="flecha flecha-izquierda">&#60;</button>
            <div class="producto-carrusel-imagenes">
              ${producto.images && producto.images.length > 0 ? producto.images.map((image, index) => `
                <img src="${image}" alt="${producto.title}" class="producto-imagen" data-index="${index}" onerror="defaultImage(event)" />
              `).join('') : '<p>No hay imágenes disponibles</p>'}
            </div>
            <button class="flecha flecha-derecha">&#62;</button>
          </div>
        </div>
        <h3>${producto.title}</h3>
        <p>$${producto.price.toFixed(2)}</p>
        <button class="btn-comprar" data-id="${producto.id}" data-title="${producto.title}" data-price="${producto.price}" data-images="${producto.images}">Añadir al Carrito</button>
        <button class="btn-descripcion" data-id="${producto.id}" data-title="${producto.title}" data-price="${producto.price}" data-images="${producto.images}">Mirar Descripcion</button>
      </div>
    `).join('');

    if (append) {
      productosContainer.insertAdjacentHTML('beforeend', productosHTML);
    } else {
      productosContainer.innerHTML = productosHTML;
    }

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
    const botonesDescripcionCarrito = document.querySelectorAll('.btn-comprar');
    botonesDescripcionCarrito.forEach(boton => {
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

  const botonesAñadirCarrito = document.querySelectorAll('.btn-descripcion');
  botonesAñadirCarrito.forEach(boton => {
    boton.addEventListener('click', (event) => {
      const productoId = productoElemento.dataset.id;
      const productoSeleccionado = productos.find(p => p.id == productoId);
      if (productoSeleccionado) {
        mostrarDetallesProducto(productoSeleccionado);
      }
    });
  });



  // Función de scroll infinito
  const handleScroll = () => {
    const { scrollTop, scrollHeight, clientHeight } = document.documentElement;
    if (scrollTop + clientHeight >= scrollHeight - 5 && !loading) {
      if (categoriaProducto) {
        fetchProductos(categoriaProducto);
      } else {
        fetchProductos();
      }
    }
  };

  window.addEventListener('scroll', handleScroll);



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
      categoriaProducto = categoriaSeleccionada; // Actualizar la variable global
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

  // Función para registrar un usuario
  const registrarUsuario = (email, password, name) => {
    const usuarios = JSON.parse(localStorage.getItem('usuarios')) || [];
    const existeUsuario = usuarios.some(usuario => usuario.email === email);

    if (existeUsuario) {
      alert('El correo ya está registrado.');
      return false;
    }

    const nuevoUsuario = { id: Date.now(), email, password, name };
    usuarios.push(nuevoUsuario);
    localStorage.setItem('usuarios', JSON.stringify(usuarios));
    alert('¡Usuario registrado con éxito!');
    return true;
  };

  // Función para iniciar sesión
  const iniciarSesion = (email, password) => {
    const usuarios = JSON.parse(localStorage.getItem('usuarios')) || [];
    const usuario = usuarios.find(usuario => usuario.email === email);

    if (!usuario) {
      alert('El usuario no existe.');
      return false;
    }

    if (usuario.password !== password) {
      alert('Contraseña incorrecta.');
      return false;
    }

    // Guardar sesión activa
    localStorage.setItem('sesionActiva', JSON.stringify({ id: usuario.id, email: usuario.email, name: usuario.name }));
    alert(`¡Bienvenido, ${usuario.name}!`);
    return true;
  };


  // Cerrar sesión
  const cerrarSesion = () => {
    localStorage.removeItem('sesionActiva');
    alert('Sesión cerrada.');
  };

  // Manejar el registro
  document.getElementById('registerForm').addEventListener('submit', (e) => {
    e.preventDefault();

    const email = document.getElementById('emailRegister').value;
    const password = document.getElementById('passwordRegister').value;
    const confirmPassword = document.getElementById('confirmPasswordRegister').value;
    const name = 'Usuario'; // Puedes agregar un campo de nombre en el formulario si lo deseas.

    if (password !== confirmPassword) {
      alert('Las contraseñas no coinciden.');
      return;
    }

    const registrado = registrarUsuario(email, password, name);
    if (registrado) document.getElementById('registerForm').reset();
  });

  // Manejar el inicio de sesión
  document.getElementById('loginForm').addEventListener('submit', (e) => {
    e.preventDefault();

    const email = document.getElementById('emailLogin').value;
    const password = document.getElementById('passwordLogin').value;

    const logueado = iniciarSesion(email, password);
    if (logueado) document.getElementById('loginForm').reset();
  });

  // Verificar sesión activa al cargar la página
  verificarSesionActiva();

  // Botón de cerrar sesión (si existe en tu HTML)
  document.getElementById('cerrarSesion')?.addEventListener('click', cerrarSesion);


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

    const logueado = iniciarSesion(email, password);
    if (logueado) loginForm.reset();
  });

  // Verificar sesión activa al cargar la página
  const verificarSesionActiva = () => {
    const sesion = JSON.parse(localStorage.getItem('sesionActiva'));

    if (sesion) {
      alert(`¡Bienvenido nuevamente, ${sesion.name}!`);
    }
  };

  // Cerrar sesión
  document.getElementById('cerrarSesion')?.addEventListener('click', () => {
    localStorage.removeItem('sesionActiva');
    alert('Sesión cerrada.');
  });

  verificarSesionActiva();
  window.addEventListener('scroll', handleScroll);
  // Actualizar el contador del carrito
  actualizarCarritoCount();
};

// Funcion Default para obtener una imagen cuando recibo una con error
function defaultImage(e) {
  e.target.src = './assets/imgs/noImage.png';
}
