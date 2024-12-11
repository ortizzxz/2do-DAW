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


-- Butacas
INSERT INTO butaca (id, fila, numero, estado) VALUES
(1, 1, 1, 'libre'),
(2, 1, 2, 'libre'),
(3, 1, 3, 'libre'),
(4, 1, 4, 'libre'),
(5, 1, 5, 'libre'),
(6, 1, 6, 'libre'),
(7, 1, 7, 'libre'),
(8, 1, 8, 'libre'),
(9, 1, 9, 'libre'),
(10, 1, 10, 'libre'),
(11, 1, 11, 'libre'),
(12, 1, 12, 'libre'),
(13, 1, 13, 'libre'),
(14, 1, 14, 'libre'),
(15, 1, 15, 'libre'),
(16, 1, 16, 'libre'),
(17, 1, 17, 'libre'),
(18, 1, 18, 'libre'),
(19, 1, 19, 'libre'),
(20, 1, 20, 'libre'),
(21, 2, 1, 'libre'),
(22, 2, 2, 'libre'),
(23, 2, 3, 'libre'),
(24, 2, 4, 'libre'),
(25, 2, 5, 'libre'),
(26, 2, 6, 'libre'),
(27, 2, 7, 'libre'),
(28, 2, 8, 'libre'),
(29, 2, 9, 'libre'),
(30, 2, 10, 'libre'),
(31, 2, 11, 'libre'),
(32, 2, 12, 'libre'),
(33, 2, 13, 'libre'),
(34, 2, 14, 'libre'),
(35, 2, 15, 'libre'),
(36, 2, 16, 'libre'),
(37, 2, 17, 'libre'),
(38, 2, 18, 'libre'),
(39, 2, 19, 'libre'),
(40, 2, 20, 'libre'),
(41, 3, 1, 'libre'),
(42, 3, 2, 'libre'),
(43, 3, 3, 'libre'),
(44, 3, 4, 'libre'),
(45, 3, 5, 'libre'),
(46, 3, 6, 'libre'),
(47, 3, 7, 'libre'),
(48, 3, 8, 'libre'),
(49, 3, 9, 'libre'),
(50, 3, 10, 'libre'),
(51, 3, 11, 'libre'),
(52, 3, 12, 'libre'),
(53, 3, 13, 'libre'),
(54, 3, 14, 'libre'),
(55, 3, 15, 'libre'),
(56, 3, 16, 'libre'),
(57, 3, 17, 'libre'),
(58, 3, 18, 'libre'),
(59, 3, 19, 'libre'),
(60, 3, 20, 'libre');
