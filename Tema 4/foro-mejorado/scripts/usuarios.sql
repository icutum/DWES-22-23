DROP TABLE IF EXISTS usuarios;

CREATE TABLE usuarios (
    id int auto_increment PRIMARY KEY,
    nombre VARCHAR(255) UNIQUE NOT NULL,
    passwd VARCHAR(255) NOT NULL,
    img    VARCHAR(255),
    correo VARCHAR(255) UNIQUE NOT NULL,
    descripcion TEXT
);