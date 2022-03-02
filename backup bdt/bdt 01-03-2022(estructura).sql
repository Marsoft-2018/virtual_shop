/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.22-MariaDB : Database - bdt_virtualshop
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bdt_virtualshop` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `bdt_virtualshop`;

/*Table structure for table `calificacion` */

DROP TABLE IF EXISTS `calificacion`;

CREATE TABLE `calificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` varchar(160) CHARACTER SET latin1 NOT NULL,
  `idProducto` varchar(20) NOT NULL,
  `calificacion` int(11) NOT NULL,
  `opinion` longtext CHARACTER SET latin1 DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `idUsuario` (`idUsuario`),
  KEY `idProducto` (`idProducto`),
  CONSTRAINT `calificacion_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

/*Table structure for table `carritocompras` */

DROP TABLE IF EXISTS `carritocompras`;

CREATE TABLE `carritocompras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `referencia` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 0,
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `idUsuario` (`idUsuario`),
  KEY `idProducto` (`idProducto`),
  KEY `referencia` (`referencia`),
  CONSTRAINT `carritocompras_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `categorias` */

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `idSeccion` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` char(100) NOT NULL,
  `descripcion` char(255) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `idSeccion` (`idSeccion`),
  CONSTRAINT `categorias_ibfk_1` FOREIGN KEY (`idSeccion`) REFERENCES `secciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Table structure for table `continentes` */

DROP TABLE IF EXISTS `continentes`;

CREATE TABLE `continentes` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `departamentos` */

DROP TABLE IF EXISTS `departamentos`;

CREATE TABLE `departamentos` (
  `idPais` tinyint(4) NOT NULL,
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `idPais` (`idPais`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `facturasc` */

DROP TABLE IF EXISTS `facturasc`;

CREATE TABLE `facturasc` (
  `idProveedor` char(50) NOT NULL,
  `idFactura` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `total` double NOT NULL,
  `tipo` enum('Contado','Credito') NOT NULL,
  `formaDePago` char(20) DEFAULT NULL,
  `estado` char(30) NOT NULL DEFAULT 'Cancelada',
  `factRegistro` char(30) NOT NULL,
  PRIMARY KEY (`idFactura`),
  KEY `ID_PROVEEDOR` (`idProveedor`),
  KEY `FACTURA` (`idFactura`),
  CONSTRAINT `facturasc_ibfk_1` FOREIGN KEY (`idProveedor`) REFERENCES `proveedores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=278 DEFAULT CHARSET=latin1;

/*Table structure for table `facturascomprasdes` */

DROP TABLE IF EXISTS `facturascomprasdes`;

CREATE TABLE `facturascomprasdes` (
  `idFactura` int(11) unsigned NOT NULL,
  `idProducto` varchar(20) CHARACTER SET latin1 NOT NULL,
  `descripcion` char(150) CHARACTER SET latin1 DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `valorUnitario` double DEFAULT NULL,
  `subTotal` double DEFAULT NULL,
  `idCompra` int(11) NOT NULL AUTO_INCREMENT,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idCompra`),
  KEY `id_prod` (`idProducto`),
  KEY `FACTURA` (`idFactura`),
  CONSTRAINT `facturascomprasdes_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `facturascomprasdes_ibfk_3` FOREIGN KEY (`idFactura`) REFERENCES `facturasc` (`idFactura`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1614 DEFAULT CHARSET=utf8;

/*Table structure for table `facturastemp` */

DROP TABLE IF EXISTS `facturastemp`;

CREATE TABLE `facturastemp` (
  `id` int(11) NOT NULL,
  `idProducto` varchar(20) NOT NULL,
  `descripcion` char(150) DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `valorUnitario` double DEFAULT NULL,
  `subTotal` double DEFAULT NULL,
  PRIMARY KEY (`id`,`idProducto`),
  KEY `id_prod` (`idProducto`),
  KEY `FACTURA` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `facturasv` */

DROP TABLE IF EXISTS `facturasv`;

CREATE TABLE `facturasv` (
  `idCliente` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `total` double DEFAULT NULL,
  `tipo` char(20) CHARACTER SET latin1 NOT NULL,
  `formaPago` char(25) CHARACTER SET latin1 DEFAULT 'Efectivo',
  `estado` char(30) CHARACTER SET latin1 NOT NULL DEFAULT 'Cancelada',
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `idCliente` (`idCliente`),
  CONSTRAINT `facturasv_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10436 DEFAULT CHARSET=utf8;

/*Table structure for table `facturasventasdes` */

DROP TABLE IF EXISTS `facturasventasdes`;

CREATE TABLE `facturasventasdes` (
  `idFactura` int(11) NOT NULL,
  `idProducto` varchar(10) DEFAULT NULL,
  `descripcion` char(150) DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `valorUnitario` double DEFAULT NULL,
  `subTotal` double DEFAULT NULL,
  `idVenta` int(11) NOT NULL AUTO_INCREMENT,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idVenta`),
  KEY `id_prod` (`idProducto`),
  KEY `FACTURA` (`idFactura`),
  CONSTRAINT `facturasventasdes_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `facturasventasdes_ibfk_3` FOREIGN KEY (`idFactura`) REFERENCES `facturasv` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11858 DEFAULT CHARSET=latin1;

/*Table structure for table `favoritos` */

DROP TABLE IF EXISTS `favoritos`;

CREATE TABLE `favoritos` (
  `id` int(11) NOT NULL DEFAULT 0,
  `idUsuario` varchar(160) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `referencia` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 0,
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  KEY `idUsuario` (`idUsuario`),
  CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `municipios` */

DROP TABLE IF EXISTS `municipios`;

CREATE TABLE `municipios` (
  `idDepto` tinyint(4) NOT NULL,
  `id` bigint(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `idDepto` (`idDepto`),
  CONSTRAINT `municipios_ibfk_1` FOREIGN KEY (`idDepto`) REFERENCES `departamentos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `negocio` */

DROP TABLE IF EXISTS `negocio`;

CREATE TABLE `negocio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` char(150) CHARACTER SET latin1 DEFAULT NULL,
  `nit` char(20) CHARACTER SET latin1 DEFAULT NULL,
  `direccion` char(100) CHARACTER SET latin1 DEFAULT NULL,
  `barrio` char(50) CHARACTER SET latin1 DEFAULT NULL,
  `ciudad` char(50) CHARACTER SET latin1 DEFAULT NULL,
  `telefono` char(25) CHARACTER SET latin1 DEFAULT NULL,
  `correo` char(250) CHARACTER SET latin1 DEFAULT NULL,
  `logo` char(250) CHARACTER SET latin1 DEFAULT 'logo1.gif',
  `propietario` char(150) CHARACTER SET latin1 DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `fecha_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Table structure for table `paises` */

DROP TABLE IF EXISTS `paises`;

CREATE TABLE `paises` (
  `idContinente` tinyint(4) NOT NULL,
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `idContinente` (`idContinente`),
  CONSTRAINT `paises_ibfk_1` FOREIGN KEY (`idContinente`) REFERENCES `continentes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `payu` */

DROP TABLE IF EXISTS `payu`;

CREATE TABLE `payu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `api_key` char(255) NOT NULL DEFAULT 'a',
  `merchantId` int(11) NOT NULL,
  `accountId` int(11) NOT NULL,
  `description` char(150) NOT NULL,
  `referenceCode` char(50) NOT NULL,
  `amount` double NOT NULL COMMENT 'valor total',
  `tax` double NOT NULL DEFAULT 0 COMMENT 'interes',
  `taxReturnBase` double NOT NULL DEFAULT 0 COMMENT 'tasa de retorno',
  `currency` char(10) NOT NULL DEFAULT 'COP' COMMENT 'tipo de moneda',
  `signature` char(255) DEFAULT NULL COMMENT 'firma',
  `test` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'tipo de test 1 = prueba',
  `buyerEmail` char(255) DEFAULT NULL COMMENT 'correo del cliente',
  `responseUrl` longtext DEFAULT NULL COMMENT 'direccion de respuesta',
  `confirmationUrl` longtext DEFAULT NULL COMMENT 'direccion de confirmacion del pago',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `preguntas` */

DROP TABLE IF EXISTS `preguntas`;

CREATE TABLE `preguntas` (
  `idUsuario` varchar(120) CHARACTER SET latin1 NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` longtext CHARACTER SET latin1 NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `idUsuario` (`idUsuario`),
  CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Table structure for table `producto` */

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
  `idCategoria` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` char(100) NOT NULL,
  `descripcion` char(255) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `idProveedor` (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `id` varchar(20) CHARACTER SET latin1 NOT NULL,
  `nombre` varchar(600) CHARACTER SET latin1 NOT NULL,
  `referencia` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `precioCompra` double NOT NULL DEFAULT 0,
  `precioVenta` double NOT NULL DEFAULT 0,
  `cantidadInicial` double DEFAULT 0,
  `compras` double DEFAULT 0,
  `ventas` double DEFAULT 0,
  `devoluciones` double DEFAULT 0,
  `existencias` double DEFAULT 0,
  `cantidadMinima` int(11) DEFAULT NULL,
  `IdNegocio` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `imagen` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT 'paquete.png',
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `fecha_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `Inv` (`IdNegocio`),
  KEY `Cat` (`idCategoria`),
  CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`IdNegocio`) REFERENCES `negocio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `proveedores` */

DROP TABLE IF EXISTS `proveedores`;

CREATE TABLE `proveedores` (
  `id` char(50) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `nombre` char(250) CHARACTER SET latin1 NOT NULL,
  `direccion` char(150) CHARACTER SET latin1 DEFAULT NULL,
  `telefono` char(20) CHARACTER SET latin1 DEFAULT NULL,
  `ciudad` char(50) CHARACTER SET latin1 DEFAULT NULL,
  `correo` char(250) CHARACTER SET latin1 DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `fecha_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `NewIndex1` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `respuestas` */

DROP TABLE IF EXISTS `respuestas`;

CREATE TABLE `respuestas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pregunta` int(11) NOT NULL,
  `respuesta` longtext NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `fecha_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `id_pregunta` (`id_pregunta`),
  CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` char(50) NOT NULL,
  `Descripcion` char(100) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Table structure for table `secciones` */

DROP TABLE IF EXISTS `secciones`;

CREATE TABLE `secciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(170) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `fecha_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `email` char(160) CHARACTER SET latin1 NOT NULL,
  `nombreUsuario` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `clave` char(100) CHARACTER SET latin1 NOT NULL,
  `idRol` int(11) NOT NULL,
  `primerNombre` varchar(120) CHARACTER SET latin1 NOT NULL,
  `segundoNombre` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `primerApellido` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `segundoApellido` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TipoDoc` char(100) CHARACTER SET latin1 NOT NULL,
  `numerodoc` int(11) NOT NULL,
  `foto` char(255) CHARACTER SET latin1 DEFAULT NULL,
  `ciudad` bigint(6) NOT NULL,
  `direccion` char(250) CHARACTER SET latin1 NOT NULL,
  `telefono` char(100) CHARACTER SET latin1 NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`email`),
  KEY `idRol` (`idRol`),
  KEY `idTipoDoc` (`TipoDoc`),
  KEY `ciudad` (`ciudad`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`ciudad`) REFERENCES `municipios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
