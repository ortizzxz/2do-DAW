use teatro;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(200) NOT NULL,
    dni VARCHAR(9) NOT NULL UNIQUE,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    es_secretario BOOLEAN DEFAULT FALSE,
    primer_login BOOLEAN DEFAULT TRUE
);

CREATE TABLE butacas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fila INT NOT NULL,
    numero INT NOT NULL,
    estado ENUM('libre', 'ocupada') DEFAULT 'libre'
);

CREATE TABLE reservas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    butaca_id INT,
    fecha_reserva DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (butaca_id) REFERENCES butacas(id)
);