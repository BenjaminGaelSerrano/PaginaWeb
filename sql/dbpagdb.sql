-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: pagina_web
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `compra`
--

DROP TABLE IF EXISTS `compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compra` (
  `id_compra` int(11) NOT NULL,
  `nombre_de_usuario_usuario` varchar(45) DEFAULT NULL,
  `ID_producto_producto` int(11) DEFAULT NULL,
  `cantidad_de_productos` int(11) DEFAULT NULL,
  `monto_total` int(11) DEFAULT NULL,
  `envio_id` int(11) DEFAULT NULL,
  `metodo_de_pago_codigo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_compra`),
  KEY `nombre_de_usuario_usuario` (`nombre_de_usuario_usuario`),
  KEY `ID_producto_producto` (`ID_producto_producto`),
  KEY `envio_id` (`envio_id`),
  KEY `metodo_de_pago_codigo` (`metodo_de_pago_codigo`),
  CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`nombre_de_usuario_usuario`) REFERENCES `usuario` (`nombre_de_usuario`),
  CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`ID_producto_producto`) REFERENCES `productos` (`ID_producto`),
  CONSTRAINT `compra_ibfk_3` FOREIGN KEY (`envio_id`) REFERENCES `envio` (`id_envio`),
  CONSTRAINT `compra_ibfk_4` FOREIGN KEY (`metodo_de_pago_codigo`) REFERENCES `metodo_de_pago` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra`
--

LOCK TABLES `compra` WRITE;
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `envio`
--

DROP TABLE IF EXISTS `envio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `envio` (
  `id_envio` int(11) NOT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `pais` varchar(45) DEFAULT NULL,
  `codigo_postal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_envio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `envio`
--

LOCK TABLES `envio` WRITE;
/*!40000 ALTER TABLE `envio` DISABLE KEYS */;
/*!40000 ALTER TABLE `envio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `metodo_de_pago`
--

DROP TABLE IF EXISTS `metodo_de_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `metodo_de_pago` (
  `codigo` int(11) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `metodo_de_pago`
--

LOCK TABLES `metodo_de_pago` WRITE;
/*!40000 ALTER TABLE `metodo_de_pago` DISABLE KEYS */;
/*!40000 ALTER TABLE `metodo_de_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ofertas`
--

DROP TABLE IF EXISTS `ofertas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ofertas` (
  `id_descuento` int(11) NOT NULL,
  `monto_des` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_descuento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ofertas`
--

LOCK TABLES `ofertas` WRITE;
/*!40000 ALTER TABLE `ofertas` DISABLE KEYS */;
INSERT INTO `ofertas` VALUES (350,80,NULL),(351,25,NULL),(352,50,NULL);
/*!40000 ALTER TABLE `ofertas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `ID_producto` int(11) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `deporte` varchar(45) DEFAULT NULL,
  `talle` varchar(45) DEFAULT NULL,
  `categoria` varchar(45) DEFAULT NULL,
  `imagen` varchar(45) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `genero` varchar(45) DEFAULT NULL,
  `min1` varchar(45) DEFAULT NULL,
  `min2` varchar(45) DEFAULT NULL,
  `min3` varchar(45) DEFAULT NULL,
  `min4` varchar(45) DEFAULT NULL,
  `id_descuento` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_producto`),
  KEY `id_proveedor` (`id_proveedor`),
  KEY `id_descuento` (`id_descuento`),
  CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id`),
  CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_descuento`) REFERENCES `ofertas` (`id_descuento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,15,'nike',40,'Pelota de Fútbol Nike',3,'futbol','5','material deportivo','/imagenes/pelota.png','naranja',NULL,NULL,NULL,NULL,NULL,NULL),(2,20,'kappa',60,'Remera de Racing 22/23',3,'futbol','L','ropa deportiva','/imagenes/remera_akd.png','Azul','Masculino',NULL,NULL,NULL,NULL,NULL),(3,70,'adidas ',60,'Remera Alternativa de River 23/24',3,'futbol','L','ropa deportiva','/imagenes/merentiel.png','negra','masculino',NULL,NULL,NULL,NULL,350),(4,7,'arra',15,'Remera de Los Pumas 2024',3,'rugby','XL','ropa deportiva','/imagenes/pumas.png','celeste','masculino',NULL,NULL,NULL,NULL,NULL),(5,15,'mikasa',8,'Pelota de Volley Mikasa',3,'volley','5','material deportivo','/imagenes/pelota_volley.png','amarillo',NULL,NULL,NULL,NULL,NULL,351),(6,15,'nassau',23,'Palo de Hockey Nassau',3,'hockey','L','material deportivo','/imagenes/paloh.png','rosa',NULL,NULL,NULL,NULL,NULL,NULL),(7,15,'everlast',9,'Pala de Badminton',3,'badminton',NULL,'material deportivo','/imagenes/pala_badminton.png','amarillo',NULL,NULL,NULL,NULL,NULL,NULL),(8,15,'shimano',60,'asiento reforzado  ',3,'ciclismo','5','material deportivo','/imagenes/asiento_cleta.png','negro',NULL,NULL,NULL,NULL,NULL,352),(9,5,'volcom',80,'Patineta ',3,'Skateboard',NULL,'Deportes de riesgo','/imagenes/skate.png','negro',NULL,NULL,NULL,NULL,NULL,NULL),(10,90,'Porto',5,'Gorro de natación',3,'Natación','L','Deportes acuáticos','/imagenes/gorro.png','negro',NULL,NULL,NULL,NULL,NULL,NULL),(11,3,'Wilson',3,'Lata de pelotas de tenis Wilson',3,'Tenis',NULL,'tenis','/imagenes/pelotas_de_tenis.png','verde',NULL,NULL,NULL,NULL,NULL,NULL),(12,45,'Wilson',80,'paleta padel',3,'padel',NULL,'Material deportivo','/imagenes/paleta.png','negro',NULL,NULL,NULL,NULL,NULL,NULL),(13,8,'atom',115,'vendaje elastico',3,NULL,NULL,'material deportivo','/imagenes/beñita.png','Azul',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` VALUES (3,4354,'pepo 123');
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `nombre_de_usuario` varchar(45) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `mail` varchar(45) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `contraseña` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`nombre_de_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('JuanferQuintero912','Juan Fernando','Quintero','JFQ@gmail.com',9122018,'moristeenmadrid'),('santigamer','santiago','ortiz','santiortiz@gmail.com',23875675,'Pepo');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-18 15:06:06
