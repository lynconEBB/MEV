-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: dbmimoevc
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbitemvenda`
--

DROP TABLE IF EXISTS `tbitemvenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbitemvenda` (
  `numItem` int(11) NOT NULL,
  `NumVenda` int(11) NOT NULL,
  `qtd` int(3) NOT NULL,
  PRIMARY KEY (`numItem`,`NumVenda`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbitemvenda`
--

LOCK TABLES `tbitemvenda` WRITE;
/*!40000 ALTER TABLE `tbitemvenda` DISABLE KEYS */;
INSERT INTO `tbitemvenda` VALUES (0,4,1);
/*!40000 ALTER TABLE `tbitemvenda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbpessoa`
--

DROP TABLE IF EXISTS `tbpessoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbpessoa` (
  `idPessoa` int(11) NOT NULL AUTO_INCREMENT,
  `NomeCompleto` varchar(45) DEFAULT NULL,
  `Cidade` varchar(45) DEFAULT NULL,
  `Bairro` varchar(45) DEFAULT NULL,
  `Rua` varchar(45) DEFAULT NULL,
  `Numero` varchar(6) DEFAULT NULL,
  `CPF` varchar(20) DEFAULT NULL,
  `Telefone` varchar(30) DEFAULT NULL,
  `Login` varchar(45) DEFAULT NULL,
  `Senha` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `TipoPessoa` char(1) DEFAULT '1',
  PRIMARY KEY (`idPessoa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbpessoa`
--

LOCK TABLES `tbpessoa` WRITE;
/*!40000 ALTER TABLE `tbpessoa` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbpessoa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbproduto`
--

DROP TABLE IF EXISTS `tbproduto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbproduto` (
  `idProduto` int(6) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  `preco` varchar(6) NOT NULL,
  `qtdestoque` varchar(6) NOT NULL,
  PRIMARY KEY (`idProduto`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbproduto`
--

LOCK TABLES `tbproduto` WRITE;
/*!40000 ALTER TABLE `tbproduto` DISABLE KEYS */;
INSERT INTO `tbproduto` VALUES (4,'Abotoadura','35','2'),(5,'Maq Lavar','2000','3');
/*!40000 ALTER TABLE `tbproduto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbvenda`
--

DROP TABLE IF EXISTS `tbvenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbvenda` (
  `numVenda` int(11) NOT NULL AUTO_INCREMENT,
  `dtVenda` date DEFAULT NULL,
  `cartaoBand` varchar(15) DEFAULT NULL,
  `cartaoNum` int(10) DEFAULT NULL,
  `vlTotal` double DEFAULT NULL,
  `idCliente` int(11) NOT NULL,
  PRIMARY KEY (`numVenda`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbvenda`
--

LOCK TABLES `tbvenda` WRITE;
/*!40000 ALTER TABLE `tbvenda` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbvenda` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-10  5:26:42
