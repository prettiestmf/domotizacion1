-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: sistema-escolar2
-- ------------------------------------------------------
-- Server version	8.0.29

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
-- Table structure for table `alumno_profesor`
--

DROP TABLE IF EXISTS `alumno_profesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumno_profesor` (
  `ap_id` int NOT NULL AUTO_INCREMENT,
  `alumno_id` int NOT NULL,
  `pm_id` int NOT NULL,
  `periodo_id` int NOT NULL,
  `estadop` int NOT NULL,
  PRIMARY KEY (`ap_id`),
  KEY `alumno_id` (`alumno_id`),
  KEY `proceso_id` (`pm_id`),
  KEY `periodo_id` (`periodo_id`),
  CONSTRAINT `alumno_profesor_ibfk_1` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`alumno_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `alumno_profesor_ibfk_2` FOREIGN KEY (`pm_id`) REFERENCES `profesor_materia` (`pm_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno_profesor`
--

LOCK TABLES `alumno_profesor` WRITE;
/*!40000 ALTER TABLE `alumno_profesor` DISABLE KEYS */;
INSERT INTO `alumno_profesor` VALUES (1,2,1,0,1),(2,1,2,0,1),(4,1,3,4,0),(5,2,3,4,0),(6,1,4,4,0),(7,7,5,4,0),(8,13,3,4,1);
/*!40000 ALTER TABLE `alumno_profesor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumnos` (
  `alumno_id` int NOT NULL AUTO_INCREMENT,
  `nombre_alumno` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `edad` int NOT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `cedula` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `clave` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` bigint NOT NULL,
  `correo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_nac` date NOT NULL,
  `fecha_registro` date NOT NULL,
  `estado` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`alumno_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos`
--

LOCK TABLES `alumnos` WRITE;
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` VALUES (1,'Ysaura Vasquez',15,'Villa Olga','12345','$2y$10$P94mJy.HX.K8p/Xrv4C.C.u4DzanUOG93t3TBm2UmE0L1xYZTsyTq',1234,'A@gmail.com','2007-01-01','2022-07-14',0),(2,'Fabio Rodriguez',15,'V','1234','',1234,'F@gmail.com','2007-01-01','2022-07-14',0),(4,'w',1,'12','323','$2y$10$kE4ZYGYd4Df56c6u1QyB3ejXdUtI3NT5OsZXOpUo3E7mc.JjsQEW.',1,'1@gmail.com','2022-07-17','2022-07-17',0),(5,'1',2,'q','1','$2y$10$/YbvzVRQjHWEBi2zdnlCG.P6pGEHN7ZKOnAs.x9mZv.I33OtEt2g6',1,'1@gmail.com','2022-07-17','2022-07-17',0),(6,'rw',1,'r','12349','$2y$10$VuzPpQk7a.Pn1AveB42AgucmLEXE2ZcwY3d15fJje.CxkLKM/Lnja',1,'1@gmail.com','2022-07-17','2022-07-17',0),(7,'Juan Fernandez',15,'Villa Olga','45454545','$2y$10$nENnXXTbbhKrWNaRsCxJCuSJRCRh2kXmryf4VY7pQgjnT881.iihu',8096768989,'1@gmail.com','2022-07-17','2022-07-17',0),(8,'hhhh1235',2,'r','1456778888888','$2y$10$O4rM.nrMtFkbNdWurXmTN.FRKGxtIQEXy.KDR.dFJQew.YS/KCTyG',2,'1@gmail.com','2022-07-18','2022-07-18',0),(9,'benjamin',18,'Villa olga','12345678','$2y$10$Xyb4bb2Oz0YHuRZ4AfmGaOOon9.l2JB8rjTUaNpOq.pV.tNlzbYcW',8096768989,'1@gmail.com','2022-07-19','2022-07-19',0),(10,'Juan pablo',12,'Villa olga','123456789','$2y$10$eeR8pW1iN5ucbt6dH8oD3.qXTAW6dlXOVbxPkuJLwob/sl6glNrke',8096768989,'1@gmail.com','2022-07-20','2022-07-20',0),(11,'Liam ',12,'Padres las casas','liam','$2y$10$bPWi5eL4Q97zv1rO17Tbm.dOXB.UYM.n/FyKXNwdUR/x4l.PzXT/O',8096768989567,'1@gmail.com','2022-07-24','2022-07-24',0),(12,'Radame Rodríguez ',15,'Avenidad Estrella sadhala','010203','$2y$10$uPMfDLnNOY9FNNJzo5LTDu1yJzx0SZXT0sO0KqhOdjqzRseV7wIL.',9999999999,'1@gmail.com','2022-07-27','2022-07-27',0),(13,'EDIFICIO A',123,'rff','727272','$2y$10$6FQhE5.zhwMgtbLj3mboQezB/ce.DdNjIfg9l12A7MYlEmmfUg9BO',888,'1@g.com','2023-03-10','2023-03-10',1),(14,'EDIFICIO B',3646545,'hshshsh','162553','$2y$10$6WmYvaUvt/m7D1yEpzm41uxvZLY06J9O4r9CZb3gPqWFBENAwpa4S',123,'1@g.com','2023-03-10','2023-03-10',1),(15,'EDIFICIO C',25253553,'hhdshdh','263636','$2y$10$/OVIwztGjsuOZNQFictic.r2hAbDWvWfZ/j3D3eFMeydIqgnxULJ.',747747,'1@g.com','2023-03-10','2023-03-10',1);
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aulas`
--

DROP TABLE IF EXISTS `aulas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aulas` (
  `aula_id` int NOT NULL AUTO_INCREMENT,
  `nombre_aula` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `estado` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`aula_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aulas`
--

LOCK TABLES `aulas` WRITE;
/*!40000 ALTER TABLE `aulas` DISABLE KEYS */;
INSERT INTO `aulas` VALUES (6,'C101',1),(7,'C102',1),(8,'C103',1),(9,'C104',1),(10,'C105',1),(11,'C106',1),(12,'C107',1),(13,'C108',1);
/*!40000 ALTER TABLE `aulas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `event_day` text NOT NULL,
  `event_time_start` time NOT NULL,
  `event_time_end` time NOT NULL,
  `event_status` tinyint DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,'monday','01:01:00','01:15:00',0),(2,'thursday','01:00:00','02:00:00',0),(3,'tuesday','13:00:00','14:00:00',0);
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grados`
--

DROP TABLE IF EXISTS `grados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grados` (
  `grado_id` int NOT NULL AUTO_INCREMENT,
  `nombre_grado` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `estado` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`grado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grados`
--

LOCK TABLES `grados` WRITE;
/*!40000 ALTER TABLE `grados` DISABLE KEYS */;
INSERT INTO `grados` VALUES (7,'Primero-A',1);
/*!40000 ALTER TABLE `grados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horarios`
--

DROP TABLE IF EXISTS `horarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `horarios` (
  `horario_id` int NOT NULL AUTO_INCREMENT,
  `aula` varchar(45) NOT NULL,
  `hora_on` varchar(45) NOT NULL,
  `hora_off` varchar(45) NOT NULL,
  `dia` varchar(45) NOT NULL,
  `estado` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`horario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horarios`
--

LOCK TABLES `horarios` WRITE;
/*!40000 ALTER TABLE `horarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `horarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materias`
--

DROP TABLE IF EXISTS `materias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `materias` (
  `materia_id` int NOT NULL AUTO_INCREMENT,
  `nombre_materia` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `estado` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`materia_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materias`
--

LOCK TABLES `materias` WRITE;
/*!40000 ALTER TABLE `materias` DISABLE KEYS */;
INSERT INTO `materias` VALUES (5,'Programación de vídeos juegos',1),(6,'Administración de negocios electrónicos ',0),(7,'Investigación operativa II',0),(8,'Lengua y Literatura',0),(9,'Lengua y Literatura',0);
/*!40000 ALTER TABLE `materias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periodos`
--

DROP TABLE IF EXISTS `periodos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `periodos` (
  `periodo_id` int NOT NULL AUTO_INCREMENT,
  `nombre_periodo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `estado` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`periodo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periodos`
--

LOCK TABLES `periodos` WRITE;
/*!40000 ALTER TABLE `periodos` DISABLE KEYS */;
INSERT INTO `periodos` VALUES (4,'Enero-Abril',1),(5,'Mayo-Agosto',1);
/*!40000 ALTER TABLE `periodos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesor`
--

DROP TABLE IF EXISTS `profesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profesor` (
  `profesor_id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `cedula` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `clave` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` bigint NOT NULL,
  `correo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nivel_est` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `estado` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`profesor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesor`
--

LOCK TABLES `profesor` WRITE;
/*!40000 ALTER TABLE `profesor` DISABLE KEYS */;
INSERT INTO `profesor` VALUES (4,'2','ee','234','$2y$10$zvmSOoRHAYedzptH8Os/5.SH8pk5z8z8s8C7ec0wrHexmlHRjP./a',2345,'w@gmail.com','qw',0),(5,'Juan pablo2','Villa olga','fabio1','$2y$10$SmxcP5w3GWUVecOVVxBUr.P19icFClvLKrpZqF2kF3QHJYrzvfcSi',123,'Juan@gmail.com','Licenciado en ciencias Naturales',1),(6,'Samuel Perez','San  jose','samuel','$2y$10$A5VPI6gbHHYNDS5z.nL31.zU6pfeho7a6qN/hurAkaGDW52IbuZmy',34543,'sanjose@gmail.com','Licenciado en ciencias Sociales',1),(7,'Alejandro','San pedro ','1234','$2y$10$IWcZKPVtZLOEf7r8B2rKy.opLbHiHv.D9B3414pUGhNsOVnjAs506',8096768989,'Alejandro@gmail.com','Ingeniero en software',1),(8,'w','w','1','$2y$10$K6NWl0agCjTW0IDGL0cJruNva8TX.A5PyOs9WmkngyA4cqahBb1zO',1,'1@gmail.com','w',0),(9,'Nachely','Villa olga','12345','$2y$10$WmkCd5m7MN8jXJ1k0bf/1.ScLdms5uRURwWWCXCprRxD0hlQC7j12',8096768989,'1@gmail.com','Licenciado en ciencias Naturales',1),(10,'Ramon','Villa Olga','ramon1','$2y$10$VKej0WdRWGx1mcsOHHPo8uBRO3Fy.UBJNau1XQYPOwCMKvXED5PxK',8096768989,'1@gmail.com','Profesor de esducacion fisica',1),(11,'Nachely 17','Villa Olga','nachely','$2y$10$NTj3d3q.Whd0d1zjEbrsZeEEWYkf.m8pMYxWq0FbdAyfLV8/CBuRe',8096768989,'1@gmail.com','Ingeniero en software',1),(12,'Luis Peralta','Villa olga','luis1','$2y$10$WdgNGtUn4OqsrEqfP/ssJ.RrAGb5/7b1EQJclsvfhIYRtBbSAn6BG',8096768989,'1@gmail.com','Licenciado en ciencias Sociales',1),(13,'Fabio Rodriguez','Villa olga','fabio2','$2y$10$JB89uKIcgBUpGoQOruMtI.QSKjbSgRgEe27SJS6qBty/9Y5RULG/2',8096768989,'1@gmail.com','Licenciado en ciencias Naturales',1),(14,'Faxy','ttt','Faxy','$2y$10$SvhoR5Zl4s.9/iQIDDf2mOrju7g9r/NXwFmadpWwMUK9W/4RULLrq',2345,'1@gmail.com','Ciencias de la compuctacion',1),(15,'gior','Villa olga','gior','$2y$10$2AOZicZHFF0kjE9b3JHq7OgGCx8Vp6kJI.tEUlZIFZFD3fgXxm.jS',1,'1@gmail.com','Profesor de Historia',1),(16,'Martha Perez','Padres las casas','martha','$2y$10$XeMg6RsEBQQRZRmhNw.HjedpDAyF.lqu/oplCGX15QG.ZcxPhAjsy',8096768989567,'1@gmail.com','Matematicas',1),(17,'Rafael','Villa olga','rafael','$2y$10$IeaDEE8F//OLEpZUg2252u65wVGCkyvQZt4mzqNiFg/GohaGgReVm',1,'1@gmail.com','Alto',1),(18,'Juan pablo','Villa olga','juan','$2y$10$XA8F25dWtfrQDuumW8pfguScS.MwtLH2TNZnZdCy8fLhqFAfoadAu',123,'Juan@gmail.com','Licenciado en ciencias Naturales',1),(19,'Keila','jardines del yaque','14252857964','chocolate123',8099211658,'keila@gmail.com','Ingeniero en software',1);
/*!40000 ALTER TABLE `profesor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesor_materia`
--

DROP TABLE IF EXISTS `profesor_materia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profesor_materia` (
  `pm_id` int NOT NULL AUTO_INCREMENT,
  `profesor_id` int NOT NULL,
  `grado_id` int NOT NULL,
  `aula_id` int NOT NULL,
  `materia_id` int NOT NULL,
  `periodo_id` int NOT NULL,
  `estadopm` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`pm_id`),
  KEY `grado_id` (`grado_id`),
  KEY `aula_id` (`aula_id`),
  KEY `profesor_id` (`profesor_id`),
  KEY `materia_id` (`materia_id`),
  KEY `periodo_id` (`periodo_id`),
  CONSTRAINT `profesor_materia_ibfk_1` FOREIGN KEY (`aula_id`) REFERENCES `aulas` (`aula_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `profesor_materia_ibfk_2` FOREIGN KEY (`grado_id`) REFERENCES `grados` (`grado_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `profesor_materia_ibfk_3` FOREIGN KEY (`profesor_id`) REFERENCES `profesor` (`profesor_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesor_materia`
--

LOCK TABLES `profesor_materia` WRITE;
/*!40000 ALTER TABLE `profesor_materia` DISABLE KEYS */;
INSERT INTO `profesor_materia` VALUES (1,5,7,6,0,0,1),(2,6,7,7,0,0,1),(3,6,7,6,5,4,1),(4,11,7,6,7,4,1),(5,11,7,6,5,4,1);
/*!40000 ALTER TABLE `profesor_materia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol` (
  `rol_id` int NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'Administrador'),(2,'Asistente');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `usuario_id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `usuario` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `clave` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `rol` int NOT NULL,
  `estado` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`usuario_id`),
  KEY `rol` (`rol`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `rol` (`rol_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Luis Noguera','admin','admin123',1,0),(2,'Andres Martinez','andres1','$2y$10$NRNhbzPgwxb8TKqrVqZopu7Pwe.9eJVtK7srAcJWSSAtGXKv03nx.',1,0),(3,'Juan pabloo','juan1','$2y$10$LiKqd3unErTShpSUWd0FueSc2gBBdIJ5CSNOH/XUtQhF3ohaQVSBe',1,0),(4,'Administrador','admin','$2y$10$cwPih29cPq7VlKhlKt0W6eK9I3Lrdrbkk1DqWlMFfrxcKTrzq8i6O',1,1),(5,'Fabio 21','fabio145','$2y$10$Xb9CT3TFYK7z33mYXLvDZOpbEbFGHCcqR8WNsbAjjf/6UaSwsXRUm',1,0),(6,'Diogenes Núñez','Diogenes1','$2y$10$HYa6YYkQJaBb1L7q/cg8h.j5Jm/p/mO1WizR1xjnCswr3ZkX3KvE6',2,0),(7,'Ysaura Vasquez','ysaura1','$2y$10$bRd0cKKByiFzdJa3LQ0uf.j/Q9wGfivNZHiJL7ktUOrAgCBq1d2WG',1,0),(10,'Pedro Rodriguez','pedro1','$2y$10$/LnJDSL.HV4OrSsH2jEaV.BGVsDs3avS32zX2eVf9GuWqEUMTkzqq',2,0),(11,'Hilari rosio','hilari1','$2y$10$D.lS7CtVEbdM4XGj9.hLVera3i0IpXoOKGUDRat5Mk26aFMa2fXO.',1,0),(12,'Dahiana hirata','dahi1','$2y$10$bFAfukJBl9wl2GqbsW6jMO1CgkIIaFCO4ZyIO6h2QaWeWBDu57zvW',1,0),(13,'Nayely silveriio','nayely1','$2y$10$kZFt0o/vb/EI2GoqHEoN8eQjmLojb0tLUlqa95TJppI4eRTTy.Pfy',1,0),(14,'Cesilio Martinez','Cesilio','$2y$10$vUIgtqnaVyKckRouDuO3KeUgEXytMxNrRgbI0yQForzM2TvP5xM76',1,0),(15,'Nachely','nachely','$2y$10$dK5brLkF3xYyIkNRGnUZk.5Hyjg652zBin4HS0rGKmoIqW20XxJb6',1,1),(16,'Keila','keila','1234567890',1,1),(17,'Melny','Melny','$2y$10$QEpeut.kOvB0Uccm1p.npO8/kOirxxkmwtlExtOpLoPaOrHa2IYWG',1,1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'sistema-escolar2'
--

--
-- Dumping routines for database 'sistema-escolar2'
--
/*!50003 DROP PROCEDURE IF EXISTS `actualiza_usuarios` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualiza_usuarios`(IN `p_id_usuario` INT, IN `p_nombre` VARCHAR(100), IN `p_usuario` VARCHAR(100), IN `p_clave` VARCHAR(100), IN `p_rol` INT, IN `p_estado` INT)
IF p_id_usuario = 0 THEN
    INSERT INTO usuarios( nombre,usuario,clave,rol,estado)
    VALUES (p_nombre,p_usuario,p_clave,p_rol,p_estado);
 
ELSEIF p_clave IS NULL OR p_clave = '' THEN
	UPDATE usuarios
    SET nombre = p_nombre,usuario = p_usuario,rol = p_rol,estado = p_estado
    WHERE usuario_id = p_id_usuario; 
    
ELSE
	UPDATE usuarios
    SET nombre = p_nombre,usuario = p_usuario,clave = p_clave,rol = p_rol,estado = p_estado
	WHERE usuario_id = p_id_usuario;
END IF ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `nuevo_usuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `nuevo_usuario`(IN `p_nombre` VARCHAR(50), IN `p_usuario` VARCHAR(50), IN `p_clave` VARCHAR(50), IN `p_rol` INT, IN `p_estado` INT)
INSERT INTO usuarios (nombre,usuario,clave,rol,estado) VALUES (p_nombre,p_usuario,p_clave,p_rol,p_estado) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-28 11:01:47
