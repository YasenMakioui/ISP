CREATE DATABASE isp;
USE isp;
CREATE TABLE ciudad (
  idCiudad INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  nombreCiudad VARCHAR(28) NOT NULL
);
CREATE TABLE usuario (
  idUsuario INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  DNI VARCHAR(10) UNIQUE NOT NULL,
  apellido1 VARCHAR(28) NOT NULL,
  apellido2 VARCHAR(28),
  correo VARCHAR(50) UNIQUE NOT NULL,
  nombreUsuario VARCHAR(50) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  telefono VARCHAR(28) NOT NULL,
  fechaNacimiento DATE,
  direccion VARCHAR(50),
  codigoPostal VARCHAR(10),
  idCiudad INT,
  FOREIGN KEY(idCiudad) REFERENCES ciudad(idCiudad) ON DELETE SET NULL ON UPDATE CASCADE
);
CREATE TABLE servicio (
  idServicio INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  nombreServicio VARCHAR(28) NOT NULL
);
CREATE TABLE usuario_servicio (
    idUsuarioServicio INT NOT NULL PRIMARY KEY,
    idServicio INT,
    idUsuario INT NOT NULL,
    nombreUsuario VARCHAR(50),
    password VARCHAR(255),
    nombreDominio VARCHAR(255) UNIQUE,
    FOREIGN KEY(idServicio) REFERENCES servicio(idServicio) ON DELETE SET NULL ON UPDATE CASCADE,
    FOREIGN KEY(idUsuario) REFERENCES usuario(idUsuario) ON DELETE CASCADE ON UPDATE CASCADE

);