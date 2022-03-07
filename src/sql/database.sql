CREATE DATABASE isp;
USE isp;

create table ciudad
(
    idCiudad     int auto_increment
        primary key,
    nombreCiudad varchar(28) not null
);

create table informacionservicios
(
    titulo    varchar(255) not null
        primary key,
    contenido longtext     null,
    url       varchar(255) null
);

create table servicio
(
    idServicio     int auto_increment
        primary key,
    nombreServicio varchar(28) not null
);

create table usuario
(
    idUsuario       int auto_increment
        primary key,
    nombre          varchar(28)  not null,
    dni             varchar(10)  not null,
    apellido1       varchar(28)  not null,
    apellido2       varchar(28)  null,
    correo          varchar(50)  not null,
    nombreUsuario   varchar(50)  not null,
    password        varchar(255) not null,
    telefono        varchar(28)  not null,
    fechaNacimiento date         null,
    direccion       varchar(50)  null,
    codigoPostal    varchar(10)  null,
    idCiudad        int          null,
    constraint correo
        unique (correo),
    constraint dni
        unique (dni),
    constraint nombreUsuario
        unique (nombreUsuario),
    constraint usuario_ibfk_1
        foreign key (idCiudad) references ciudad (idCiudad)
            on update cascade on delete set null
);

create index idCiudad
    on usuario (idCiudad);

create table usuario_servicio
(
    idUsuarioServicio int auto_increment
        primary key,
    idServicio        int                             null,
    idUsuario         int                             not null,
    nombreUsuario     varchar(50)                     null,
    password          varchar(255)                    null,
    nombreDominio     varchar(255)                    null,
    status            enum ('yes', 'no') default 'no' null,
    constraint nombreDominio
        unique (nombreDominio),
    constraint usuario_servicio_ibfk_1
        foreign key (idServicio) references servicio (idServicio)
            on update cascade on delete set null,
    constraint usuario_servicio_ibfk_2
        foreign key (idUsuario) references usuario (idUsuario)
            on update cascade on delete cascade
);

create index idServicio
    on usuario_servicio (idServicio);

create index idUsuario
    on usuario_servicio (idUsuario);

-- INSERTS

INSERT INTO isp.ciudad (idCiudad, nombreCiudad) VALUES (1, 'Manacor');
INSERT INTO isp.ciudad (idCiudad, nombreCiudad) VALUES (2, 'Petra');
INSERT INTO isp.ciudad (idCiudad, nombreCiudad) VALUES (3, 'Palma');
INSERT INTO isp.ciudad (idCiudad, nombreCiudad) VALUES (4, 'Vilafranca');
INSERT INTO isp.ciudad (idCiudad, nombreCiudad) VALUES (5, 'Inca');
INSERT INTO isp.ciudad (idCiudad, nombreCiudad) VALUES (6, 'Marratxi');
INSERT INTO isp.ciudad (idCiudad, nombreCiudad) VALUES (7, 'Mancor');
INSERT INTO isp.ciudad (idCiudad, nombreCiudad) VALUES (8, 'Cala Millor');
INSERT INTO isp.ciudad (idCiudad, nombreCiudad) VALUES (9, 'Santanyi');
INSERT INTO isp.ciudad (idCiudad, nombreCiudad) VALUES (10, 'Alcudia');

INSERT INTO isp.servicio (idServicio, nombreServicio) VALUES (1, 'apache');
INSERT INTO isp.servicio (idServicio, nombreServicio) VALUES (2, 'ftp');
INSERT INTO isp.servicio (idServicio, nombreServicio) VALUES (3, 'mysql');
INSERT INTO isp.servicio (idServicio, nombreServicio) VALUES (4, 'wordpress');
INSERT INTO isp.servicio (idServicio, nombreServicio) VALUES (5, 'postgresql');
INSERT INTO isp.servicio (idServicio, nombreServicio) VALUES (6, 'email');
INSERT INTO isp.servicio (idServicio, nombreServicio) VALUES (7, 'dns');

INSERT INTO isp.informacionservicios (titulo, contenido, url) VALUES ('apache', 'Apache es un servidor web HTTP de código abierto. Está desarrollado y mantenido por una comunidad de usuarios en torno a la Apache Software Foundation.', 'https://httpd.apache.org/');
INSERT INTO isp.informacionservicios (titulo, contenido, url) VALUES ('dns', 'El sistema de nombres de dominio ​ es un sistema de nomenclatura jerárquico descentralizado para dispositivos conectados a redes IP como Internet o una red privada.', 'https://ubuntu.com/server/docs/service-domain-name-service-dns');
INSERT INTO isp.informacionservicios (titulo, contenido, url) VALUES ('email', 'Postfix es un servidor de correo de software libre / código abierto, un programa informático para el enrutamiento y envío de correo electrónico, creado con la intención de que sea una alternativa más rápida, fácil de administrar y segura al ampliamente utilizado Sendmail.', 'https://www.postfix.org/');
INSERT INTO isp.informacionservicios (titulo, contenido, url) VALUES ('ftp', 'FTP son las siglas de File Transfer Protocol (protocolo de transferencia de archivos). Comencemos a conocer un poco más. Básicamente, un “protocolo” es un conjunto de procedimientos o reglas que permiten que los dispositivos electrónicos se comuniquen entre sí.', 'https://es.wikipedia.org/wiki/Protocolo_de_transferencia_de_archivos');
INSERT INTO isp.informacionservicios (titulo, contenido, url) VALUES ('mysql', 'MySQL es una sistema gestor de bases de datos relacional muy eficiente propiedad de oracle que nos permite guardar informacion de forma consistente.', 'https://www.mysql.com');
INSERT INTO isp.informacionservicios (titulo, contenido, url) VALUES ('postgresql', 'PostgreSQL es una sistema gestor de bases de datos relacional muy eficiente de codigo abierto que nos permite guardar informacion de forma consistente.', 'https://www.postgresql.org/');
INSERT INTO isp.informacionservicios (titulo, contenido, url) VALUES ('wordpress', 'Wordpress es un Sistema de gestion de contenido que nos permite la creacion de paginas web mediante el uso de plugins y plantillas.', 'https://wordpress.com/es/');
