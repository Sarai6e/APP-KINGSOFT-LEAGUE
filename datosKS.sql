-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: mydb
-- ------------------------------------------------------
-- Server version	8.3.0

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
-- Table structure for table `club_robotica`
--

DROP TABLE IF EXISTS `club_robotica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `club_robotica` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `ciudad` varchar(45) NOT NULL,
  `pais` varchar(45) NOT NULL,
  `logo` binary(200) NOT NULL,
  `nombre_institucion_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_club_robotica_nombre_institucion_idx` (`nombre_institucion_id`),
  CONSTRAINT `nombre_instirucion` FOREIGN KEY (`nombre_institucion_id`) REFERENCES `nombre_institucion` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `club_robotica`
--

LOCK TABLES `club_robotica` WRITE;
/*!40000 ALTER TABLE `club_robotica` DISABLE KEYS */;
INSERT INTO `club_robotica` VALUES (1,'Club de Robótica A','Ciudad A','País A',_binary '4Vx�\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',1),(2,'Club de Robótica B','Ciudad B','País B',_binary '�\�\�#\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',2),(3,'Club de Robótica C','Ciudad C','País C',_binary 'Eg��\�\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',3);
/*!40000 ALTER TABLE `club_robotica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `competencia`
--

DROP TABLE IF EXISTS `competencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `competencia` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `fecha_inicio_inscripcion` date NOT NULL,
  `fecha_fin_inscripcion` date NOT NULL,
  `fecha_compentencia` date NOT NULL,
  `tipo_competencia` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo_comptencia_idx` (`tipo_competencia`),
  CONSTRAINT `tipo_comptencia` FOREIGN KEY (`tipo_competencia`) REFERENCES `tipo_competencia` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competencia`
--

LOCK TABLES `competencia` WRITE;
/*!40000 ALTER TABLE `competencia` DISABLE KEYS */;
INSERT INTO `competencia` VALUES (1,'Competencia A','2024-06-01','2024-06-15','2024-07-01',1),(2,'Competencia B','2024-07-01','2024-07-15','2024-08-01',2),(3,'Competencia C','2024-08-01','2024-08-15','2024-09-01',3);
/*!40000 ALTER TABLE `competencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grado_estudio`
--

DROP TABLE IF EXISTS `grado_estudio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grado_estudio` (
  `id` int NOT NULL,
  `grado` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grado_estudio`
--

LOCK TABLES `grado_estudio` WRITE;
/*!40000 ALTER TABLE `grado_estudio` DISABLE KEYS */;
INSERT INTO `grado_estudio` VALUES (1,'colegio'),(2,'instituto'),(3,'universidad');
/*!40000 ALTER TABLE `grado_estudio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nombre_institucion`
--

DROP TABLE IF EXISTS `nombre_institucion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nombre_institucion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nombre_institucion`
--

LOCK TABLES `nombre_institucion` WRITE;
/*!40000 ALTER TABLE `nombre_institucion` DISABLE KEYS */;
INSERT INTO `nombre_institucion` VALUES (1,'senati'),(2,'udh'),(3,'valdizan'),(4,'rosagana');
/*!40000 ALTER TABLE `nombre_institucion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participante_genero`
--

DROP TABLE IF EXISTS `participante_genero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `participante_genero` (
  `id` int NOT NULL,
  `genero` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participante_genero`
--

LOCK TABLES `participante_genero` WRITE;
/*!40000 ALTER TABLE `participante_genero` DISABLE KEYS */;
INSERT INTO `participante_genero` VALUES (1,'masculino'),(2,'femenino');
/*!40000 ALTER TABLE `participante_genero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participantes`
--

DROP TABLE IF EXISTS `participantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `participantes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `dni` int NOT NULL,
  `genero` int NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `correo` varchar(100) NOT NULL,
  `anio_estudio` int NOT NULL,
  `especialidad` varchar(100) DEFAULT NULL,
  `clave` varchar(100) NOT NULL,
  `fecha_actualizacion` timestamp(1) NOT NULL,
  `grado_estudio` int NOT NULL,
  `id_club_robotica` int NOT NULL,
  `nombre_institucion_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `correo_UNIQUE` (`correo`),
  UNIQUE KEY `dni_UNIQUE` (`dni`),
  KEY `participante_genero` (`genero`),
  KEY `nombre_institucion_id` (`nombre_institucion_id`),
  KEY `id_club_robotica` (`id_club_robotica`),
  KEY `participante_grado_estudio` (`grado_estudio`),
  CONSTRAINT `participante_genero` FOREIGN KEY (`genero`) REFERENCES `participante_genero` (`id`),
  CONSTRAINT `participante_grado_estudio` FOREIGN KEY (`grado_estudio`) REFERENCES `grado_estudio` (`id`),
  CONSTRAINT `participantes_ibfk_1` FOREIGN KEY (`nombre_institucion_id`) REFERENCES `nombre_institucion` (`id`),
  CONSTRAINT `participantes_ibfk_2` FOREIGN KEY (`grado_estudio`) REFERENCES `grado_estudio` (`id`),
  CONSTRAINT `participantes_ibfk_3` FOREIGN KEY (`id_club_robotica`) REFERENCES `club_robotica` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participantes`
--

LOCK TABLES `participantes` WRITE;
/*!40000 ALTER TABLE `participantes` DISABLE KEYS */;
INSERT INTO `participantes` VALUES (7,'Juan','Pérez',123456789,1,'1990-05-15','juan@example.com',3,'Ingeniería Informática','clave123','2024-03-07 16:40:34.0',1,1,1),(8,'María','Gómez',987654321,2,'1992-08-20','maria@example.com',4,'Biología','clave456','2024-03-07 16:40:34.0',2,2,2),(9,'Carlos','López',456789012,1,'1995-02-10','carlos@example.com',2,'Matemáticas','clave789','2024-03-07 16:40:34.0',3,3,3);
/*!40000 ALTER TABLE `participantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `robot`
--

DROP TABLE IF EXISTS `robot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `robot` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `peso` float NOT NULL,
  `ancho` float NOT NULL,
  `alto` float NOT NULL,
  `id_participante` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_participante_UNIQUE` (`id_participante`),
  CONSTRAINT `robat_participante` FOREIGN KEY (`id_participante`) REFERENCES `participantes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `robot`
--

LOCK TABLES `robot` WRITE;
/*!40000 ALTER TABLE `robot` DISABLE KEYS */;
INSERT INTO `robot` VALUES (4,'matador300',5,12,15,7),(5,'salpicador',10,12,14,8),(6,'mechaman',5,12,16,9);
/*!40000 ALTER TABLE `robot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `robot_competencia`
--

DROP TABLE IF EXISTS `robot_competencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `robot_competencia` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_robot` int NOT NULL,
  `id_competencia` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_compentencia_idx` (`id_competencia`),
  KEY `id_robot_idx` (`id_robot`),
  CONSTRAINT `id_compentencia` FOREIGN KEY (`id_competencia`) REFERENCES `competencia` (`id`),
  CONSTRAINT `id_robot` FOREIGN KEY (`id_robot`) REFERENCES `robot` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `robot_competencia`
--

LOCK TABLES `robot_competencia` WRITE;
/*!40000 ALTER TABLE `robot_competencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `robot_competencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_competencia`
--

DROP TABLE IF EXISTS `tipo_competencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_competencia` (
  `id` int NOT NULL,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_competencia`
--

LOCK TABLES `tipo_competencia` WRITE;
/*!40000 ALTER TABLE `tipo_competencia` DISABLE KEYS */;
INSERT INTO `tipo_competencia` VALUES (1,'minisumo'),(2,'velocista'),(3,'bunset');
/*!40000 ALTER TABLE `tipo_competencia` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-07 12:07:27
