-- Active: 1731915948507@@127.0.0.1@3306@empresa
CREATE TABLE usuario(  
    codigo int(10) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(100) not null,
    clave VARCHAR(100) not null,
    rol int(20) not null,
    CONSTRAINT pk_usuarios PRIMARY KEY(codigo),
    CONSTRAINT UC_nombre UNIQUE (nombre)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_bin;

INSERT INTO USUARIO VALUES(null, 'Maria', 'maria123', 1);
INSERT INTO USUARIO VALUES(null, 'Jesus', 'jesus123', 1);
INSERT INTO USUARIO VALUES(null, 'Admin', 'admin', 2);
INSERT INTO USUARIO VALUES(null, 'Pepe', 'pepe123', 2);