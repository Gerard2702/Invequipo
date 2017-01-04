-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.19-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for invequipo
CREATE DATABASE IF NOT EXISTS `invequipo` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `invequipo`;

-- Dumping structure for table invequipo.direccion
CREATE TABLE IF NOT EXISTS `direccion` (
  `id_direccion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_direccion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table invequipo.direccion: ~2 rows (approximately)
/*!40000 ALTER TABLE `direccion` DISABLE KEYS */;
INSERT INTO `direccion` (`id_direccion`, `nombre`) VALUES
	(1, 'Dinámica (Asignada por DHCP)\r\n'),
	(2, 'Otra'),
	(3, 'Otra2');
/*!40000 ALTER TABLE `direccion` ENABLE KEYS */;

-- Dumping structure for table invequipo.dominio
CREATE TABLE IF NOT EXISTS `dominio` (
  `id_dominio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_dominio`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table invequipo.dominio: ~2 rows (approximately)
/*!40000 ALTER TABLE `dominio` DISABLE KEYS */;
INSERT INTO `dominio` (`id_dominio`, `nombre`) VALUES
	(1, 'isss.gob.sv\r\n'),
	(2, 'otro');
/*!40000 ALTER TABLE `dominio` ENABLE KEYS */;

-- Dumping structure for table invequipo.dvd
CREATE TABLE IF NOT EXISTS `dvd` (
  `id_dvd` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_dvd`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table invequipo.dvd: ~4 rows (approximately)
/*!40000 ALTER TABLE `dvd` DISABLE KEYS */;
INSERT INTO `dvd` (`id_dvd`, `nombre`) VALUES
	(1, 'DVD RW'),
	(2, 'CD\r\n'),
	(3, 'DVD\r\n'),
	(4, 'NO'),
	(5, 'OTRO');
/*!40000 ALTER TABLE `dvd` ENABLE KEYS */;

-- Dumping structure for table invequipo.estado_equipo
CREATE TABLE IF NOT EXISTS `estado_equipo` (
  `id_estado_equipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_estado_equipo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table invequipo.estado_equipo: ~3 rows (approximately)
/*!40000 ALTER TABLE `estado_equipo` DISABLE KEYS */;
INSERT INTO `estado_equipo` (`id_estado_equipo`, `nombre`) VALUES
	(1, 'Óptimo'),
	(2, 'Bueno'),
	(3, 'Regular');
/*!40000 ALTER TABLE `estado_equipo` ENABLE KEYS */;

-- Dumping structure for table invequipo.inventario
CREATE TABLE IF NOT EXISTS `inventario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_equipo` varchar(50) DEFAULT NULL,
  `nivel` varchar(50) DEFAULT NULL,
  `ubicacion` varchar(50) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `centro_costo` int(50) DEFAULT NULL,
  `numero_inventario` varchar(50) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `serie` varchar(50) DEFAULT NULL,
  `marca_modelo` varchar(50) DEFAULT NULL,
  `velocidad` varchar(50) DEFAULT NULL,
  `ram` varchar(50) DEFAULT NULL,
  `hdd` varchar(50) DEFAULT NULL,
  `cd_dvd` varchar(50) DEFAULT NULL,
  `sistema_operativo` varchar(50) DEFAULT NULL,
  `licencia` varchar(50) DEFAULT NULL,
  `version_office` varchar(50) DEFAULT NULL,
  `licencia_office` varchar(50) DEFAULT NULL,
  `nombre_equipo` varchar(50) DEFAULT NULL,
  `direccionip` varchar(50) DEFAULT NULL,
  `nombre_dominio` varchar(50) DEFAULT NULL,
  `fecha_adquisicion` varchar(50) DEFAULT NULL,
  `fecha_vencimiento` varchar(50) DEFAULT NULL,
  `estado_equipo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

-- Dumping data for table invequipo.inventario: ~42 rows (approximately)
/*!40000 ALTER TABLE `inventario` DISABLE KEYS */;
INSERT INTO `inventario` (`id`, `tipo_equipo`, `nivel`, `ubicacion`, `usuario`, `centro_costo`, `numero_inventario`, `marca`, `modelo`, `serie`, `marca_modelo`, `velocidad`, `ram`, `hdd`, `cd_dvd`, `sistema_operativo`, `licencia`, `version_office`, `licencia_office`, `nombre_equipo`, `direccionip`, `nombre_dominio`, `fecha_adquisicion`, `fecha_vencimiento`, `estado_equipo`) VALUES
	(1, 'Computadora de Escritorio', NULL, '7º Nivel - Jefatura de Consulta Externa', 'Licda. Sandra Martinez 2', 537205, '03-530-08419', 'HP', 'Elite Desk 705 G1 SFF', 'MXL4452PF8', 'AMD  A10 PRO-7800B R7', '3 GHz', '4 GB', '1 TB', 'DVD RW', 'Windows 8.1 Pro 64 bits SP1', '', '2013 Standard', 'Preinstalado', '', 'Dinámica (Asignada por DHCP)\n', 'isss.gob.sv\n', 'Diciembre 2014', 'Diciembre 2019', 'Óptimo'),
	(2, 'Computadora de Escritorio', NULL, '7º Nivel - Oficina Jefatura de C. Ext. (Preparació', 'Licda. Sandra Martinez', 537208, '03-530-08434', 'HP', 'Elite Desk 705 G1 SFF', 'MXL446093V', 'AMD  A10 PRO-7800B R7', '3 GHz', '4 GB', '1 TB', 'DVD RW', 'Windows 8.1 Pro 64 bits SP1', '', '2013 Standard', 'Preinstalado', '', 'Dinámica (Asignada por DHCP)\n', 'isss.gob.sv\n', 'Diciembre 2014', 'Diciembre 2019', 'Óptimo'),
	(3, 'Computadora de Escritorio\r\n', NULL, '1º Nivel - Informática (Clínica 2 Oftalmología - E', 'Ing. Sergio Danilo León (Dr. Douglas Mendoza)\r\n', 537307, '03-530-08539', 'HP', 'Elite Desk 705 G1 SFF', 'MXL4460W0Q', 'AMD \nA10 PRO-7800B R7', '3.50 GHz', '4 GB', '1 TB', 'DVD RW', '"Windows 8.1 Pro\n64 bits\nSP1"', NULL, 'No tiene Office instalado', 'No tiene Office instalado', NULL, 'Dinámica (Asignada por DHCP)', 'isss.gob.sv', 'Diciembre 2014', 'Diciembre 2019', 'Óptimo'),
	(6, 'Computadora de Escritorio', NULL, '3º Nivel - Farmacia Jefatura', 'Lic. Elizabeth Varela', 53703, '03-530-06265', 'DELL\n', 'OPTIPLEX 780', 'D30FNN1', 'Intel Core 2 Duo', '2.93 GHz', '4 GB', '300 GB', 'DVD\n', 'Windows 7 Professional', 'C74YD-2VXG6-3XGWP-JJW7K-FVC2M', 'Office 2010', 'Preinstalado', 'CE-FARMA-6265', 'Dinámica (Asignada por DHCP)\n', 'isss.gob.sv\n', '06/Diciembre/2010', '06/Diciembre/2013', 'Óptimo');
/*!40000 ALTER TABLE `inventario` ENABLE KEYS */;

-- Dumping structure for table invequipo.marca
CREATE TABLE IF NOT EXISTS `marca` (
  `id_marca` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table invequipo.marca: ~6 rows (approximately)
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
INSERT INTO `marca` (`id_marca`, `nombre`) VALUES
	(1, 'HP'),
	(2, 'DELL\r\n'),
	(3, 'LENOVO\r\n'),
	(4, 'IBM\r\n'),
	(5, 'S/M\r\n'),
	(6, 'TOSHIBA');
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;

-- Dumping structure for table invequipo.nivel
CREATE TABLE IF NOT EXISTS `nivel` (
  `id_nivel` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_nivel`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table invequipo.nivel: ~0 rows (approximately)
/*!40000 ALTER TABLE `nivel` DISABLE KEYS */;
INSERT INTO `nivel` (`id_nivel`, `nombre`) VALUES
	(1, '7 Nivel - Consulta Externa'),
	(2, '6 Nivel - Administrativo'),
	(3, '6 Nivel - Consulta Externa'),
	(4, '5 Nivel - Consulta Externa'),
	(5, '5 Nivel - Rayos X'),
	(8, '4 Nivel - Consulta Externa'),
	(9, '4 Nivel - Procedimientos');
/*!40000 ALTER TABLE `nivel` ENABLE KEYS */;

-- Dumping structure for table invequipo.observaciones
CREATE TABLE IF NOT EXISTS `observaciones` (
  `id_observacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_inventario` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_observacion`),
  KEY `FK_observaciones_inventario` (`id_inventario`),
  CONSTRAINT `FK_observaciones_inventario` FOREIGN KEY (`id_inventario`) REFERENCES `inventario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

-- Dumping data for table invequipo.observaciones: ~38 rows (approximately)
/*!40000 ALTER TABLE `observaciones` DISABLE KEYS */;
INSERT INTO `observaciones` (`id_observacion`, `id_inventario`, `nombre`) VALUES
	(1, 1, 'Serie teclado: BDMEP0AHH6W0CG'),
	(2, 1, '\nSerie mouse: FCMHF0AHD7F1LE'),
	(3, 1, '\nSerie monitor: 6CM4271DZL"'),
	(5, 2, 'Serie teclado: BDMEP0AHH6W040'),
	(6, 2, '\nSerie mouse: FCMHF0AHD7GB4U'),
	(7, 2, '\nSerie monitor: 3CQ4281DQD"');
/*!40000 ALTER TABLE `observaciones` ENABLE KEYS */;

-- Dumping structure for table invequipo.otros_software
CREATE TABLE IF NOT EXISTS `otros_software` (
  `id_otro` int(11) NOT NULL AUTO_INCREMENT,
  `id_inventario` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_otro`),
  KEY `FK_otros_software_inventario` (`id_inventario`),
  CONSTRAINT `FK_otros_software_inventario` FOREIGN KEY (`id_inventario`) REFERENCES `inventario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

-- Dumping data for table invequipo.otros_software: ~42 rows (approximately)
/*!40000 ALTER TABLE `otros_software` DISABLE KEYS */;
INSERT INTO `otros_software` (`id_otro`, `id_inventario`, `nombre`) VALUES
	(1, 1, 'Software Preinstalado'),
	(3, 2, 'Software Preinstalado'),
	(5, 3, 'Software Preinstalado'),
	(8, 6, 'Software Preinstalado'),
	(9, 6, 'Software Preinstalado'),
	(10, 6, 'Software Preinstalado');
/*!40000 ALTER TABLE `otros_software` ENABLE KEYS */;

-- Dumping structure for table invequipo.sistemas_institucionales
CREATE TABLE IF NOT EXISTS `sistemas_institucionales` (
  `id_sistema` int(11) NOT NULL AUTO_INCREMENT,
  `id_inventario` int(11) DEFAULT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_sistema`),
  KEY `FK__inventario` (`id_inventario`),
  CONSTRAINT `FK__inventario` FOREIGN KEY (`id_inventario`) REFERENCES `inventario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

-- Dumping data for table invequipo.sistemas_institucionales: ~44 rows (approximately)
/*!40000 ALTER TABLE `sistemas_institucionales` DISABLE KEYS */;
INSERT INTO `sistemas_institucionales` (`id_sistema`, `id_inventario`, `nombre`) VALUES
	(1, 1, 'Sistema de Agenda Médica '),
	(2, 1, '\nWeb Consulta de Afiliados '),
	(3, 1, '\nSistema de Patología"'),
	(5, 2, 'Modulo de Consulta Externa'),
	(7, 3, 'Modulo de Consulta Externa'),
	(9, 6, 'SAP (SAFISSS)'),
	(10, 6, 'Sistema de Agenda Médica '),
	(11, 6, '\nWeb Consulta de Afiliados'),
	(12, 6, 'Sistema de Agenda Médica '),
	(13, 6, '\nWeb Consulta de Afiliados');
/*!40000 ALTER TABLE `sistemas_institucionales` ENABLE KEYS */;

-- Dumping structure for table invequipo.tipo_equipo
CREATE TABLE IF NOT EXISTS `tipo_equipo` (
  `id_tipo_equipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_equipo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table invequipo.tipo_equipo: ~3 rows (approximately)
/*!40000 ALTER TABLE `tipo_equipo` DISABLE KEYS */;
INSERT INTO `tipo_equipo` (`id_tipo_equipo`, `nombre`) VALUES
	(1, 'Computadora de Escritorio'),
	(2, 'Impresora Laser'),
	(4, 'Laptop');
/*!40000 ALTER TABLE `tipo_equipo` ENABLE KEYS */;

-- Dumping structure for table invequipo.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table invequipo.usuario: ~0 rows (approximately)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`idusuario`, `usuario`, `pass`) VALUES
	(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
