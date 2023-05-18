
CREATE DATABASE `prueba_suplos` ;

USE `prueba_suplos`;

DROP TABLE IF EXISTS `clase`;

CREATE TABLE `clase` (
  `Codigo_Segmento` int(8) NOT NULL,
  `Nombre_Segmento` varchar(100) NOT NULL,
  `Codigo_Familia` int(8) NOT NULL,
  `Nombre_Familia` varchar(100) NOT NULL,
  `Codigo_Clase` int(8) NOT NULL,
  `Nombre_Clase` varchar(100) NOT NULL,
  `Codigo_Producto` int(8) NOT NULL,
  `Nombre_Producto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `files_info`;

CREATE TABLE `files_info` (
  `id_files` int(12) NOT NULL AUTO_INCREMENT,
  `fecha_de_creacion` datetime DEFAULT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `n_archivos` int(10) DEFAULT NULL,
  `id_info_basica` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_files`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `info_basica`;

CREATE TABLE `info_basica` (
  `id_info` int(20) NOT NULL AUTO_INCREMENT,
  `objeto` varchar(200) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `moneda` varchar(50) NOT NULL,
  `presupuesto` int(20) NOT NULL,
  `actividad` int(10) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `fecha_cierre` date NOT NULL,
  `hora_cierre` time NOT NULL,
  `estado` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_info`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

