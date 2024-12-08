-- Creaction de la tabla Usuario
CREATE TABLE `usuario` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nombre` varchar(100) NOT NULL,
    `apellido` varchar(200) NOT NULL,
    `apellido_dos` varchar(30) NOT NULL,
    `dni` varchar(9) NOT NULL,
    `usuario` varchar(50) NOT NULL,
    `password` varchar(255) NOT NULL,
    `email` varchar(100) NOT NULL,
    `es_secretario` tinyint(1) DEFAULT 0,
    `primer_login` tinyint(1) DEFAULT 1,
    `reset_token` varchar(64) DEFAULT NULL,
    `reset_token_expiry` datetime DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `dni` (`dni`),
    UNIQUE KEY `usuario` (`usuario`),
    UNIQUE KEY `email` (`email`)
) ENGINE = InnoDB AUTO_INCREMENT = 47 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci

-- Creacion de la tabla Butaca
CREATE TABLE `butaca` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `fila` int(11) NOT NULL,
    `numero` int(11) NOT NULL,
    `estado` enum('libre', 'ocupada') DEFAULT 'libre',
    PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 61 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci


-- Creacion de la tabla Reserva 
CREATE TABLE `reserva` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `usuario_id` int(11) DEFAULT NULL,
    `butaca_id` int(11) DEFAULT NULL,
    `fecha_reserva` datetime DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    KEY `usuario_id` (`usuario_id`),
    KEY `butaca_id` (`butaca_id`),
    CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`),
    CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`butaca_id`) REFERENCES `butaca` (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 16 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci


-- Creación de un Super Admin - CAMBIAR CONTRASEÑA Y USUARIO.
INSERT INTO usuario (id, nombre, apellido, apellido_dos, dni, usuario, password, email, es_secretario, primer_login) 
VALUES (
    1, 
    'Admin', 
    'NULL', 
    'NULL', 
    'NULL', 
    'admin', 
    '$2y$10$qtFHQzDDMzKsbgEwYrvsbORrnxp.8f/LGaZSVXFoVPsQnHytWqu2u', 
    'admin@admin.com', 
    1, 
    0
);
