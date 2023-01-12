# Foro

## Dependencias

Este proyecto utiliza composer como gestor de paquetes. En distribuciones basadas en Arch Linux, el comando para instalarlo es el siguiente:

```s
$ sudo pacman -Syu composer
```

Para instalar las dependencias del proyecto, sobre la raíz ejecutaremos los siguientes comandos:

```s
$ composer require vlucas/dotenv phpmailer/phpmailer
```

## Instalación

Crea las bases de datos shur:
```sql
CREATE DATABASE linkenin;
```

```sql
CREATE USER 'linkenin'@'localhost' IDENTIFIED BY 'linkenin';
```

```sql
GRANT ALL PRIVILEGES ON linkenin.* TO 'linkenin'@'localhost' WITH GRANT OPTION;
```

```sql
CREATE TABLE usuarios (
    id int auto_increment PRIMARY KEY,
    nombre VARCHAR(255),
    passwd VARCHAR(255),
    img    VARCHAR(255),
    correo VARCHAR(255),
    descripcion TEXT
);
```

```sql
CREATE TABLE tokens (
    id int auto_increment PRIMARY KEY,
    id_usuario int,
    valor VARCHAR(255),
    expiracion DATETIME,
    CONSTRAINT fk_id_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);
```

## Ejecución
```bash
./run.sh
```