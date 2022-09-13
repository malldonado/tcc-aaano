-- MySQL dump 10.16  Distrib 10.1.35-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: animais
-- ------------------------------------------------------
-- Server version	10.1.35-MariaDB

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
-- Current Database: `animais`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `animais` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `animais`;

--
-- Table structure for table `adocaos`
--

DROP TABLE IF EXISTS `adocaos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adocaos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pessoa` int(10) unsigned NOT NULL,
  `id_animal` int(10) unsigned NOT NULL,
  `adotado` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `data_adocao` date DEFAULT NULL,
  `data_recusa` date DEFAULT NULL,
  `data_pedido_ad` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `adocaos_id_animal_foreign` (`id_animal`),
  KEY `adocaos_id_pessoa_foreign` (`id_pessoa`),
  CONSTRAINT `adocaos_id_animal_foreign` FOREIGN KEY (`id_animal`) REFERENCES `animals` (`id`) ON DELETE CASCADE,
  CONSTRAINT `adocaos_id_pessoa_foreign` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adocaos`
--

LOCK TABLES `adocaos` WRITE;
/*!40000 ALTER TABLE `adocaos` DISABLE KEYS */;
INSERT INTO `adocaos` VALUES (1,8,4,'R','2019-02-06 00:34:47','2019-02-06 02:28:12',NULL,'2019-02-06',NULL),(2,8,3,'S','2019-04-06 02:15:07','2019-02-06 02:21:43','2019-02-06',NULL,NULL),(3,8,5,'R','2019-02-06 01:15:17','2019-02-06 02:27:02',NULL,'2019-02-06',NULL),(4,8,6,'S','2019-02-10 02:09:39','2019-02-10 02:23:09','2019-02-10',NULL,NULL),(5,8,2,'S','2019-02-10 02:13:44','2019-02-10 02:22:38','2019-02-10',NULL,NULL),(6,8,7,'S','2019-02-10 03:08:31','2019-02-10 03:18:45','2019-02-10',NULL,NULL),(7,8,9,'S','2019-02-10 03:08:40','2019-02-10 16:51:49','2019-02-10',NULL,NULL),(8,8,10,'S','2019-02-10 03:16:02','2019-02-10 03:17:24','2019-02-10',NULL,'2019-02-10'),(9,8,11,'R','2019-02-10 17:06:03','2019-02-10 17:06:35',NULL,'2019-02-10','2019-02-10'),(10,8,5,'R','2019-02-10 17:13:02','2019-02-10 17:43:06',NULL,'2019-02-10','2019-02-10'),(11,8,11,'R','2019-02-10 17:13:07','2019-02-10 17:13:47',NULL,'2019-02-10','2019-02-10'),(12,8,11,'S','2019-02-10 17:15:22','2019-02-10 17:42:40','2019-02-10',NULL,'2019-02-10'),(13,8,4,'R','2019-02-10 17:41:25','2019-02-10 17:42:55',NULL,'2019-02-10','2019-02-10'),(14,8,4,'S','2019-02-10 17:45:29','2019-03-24 17:26:55','2019-03-24',NULL,'2019-02-10'),(15,8,5,'S','2019-02-10 17:45:37','2019-02-10 17:46:00','2019-02-10',NULL,'2019-02-10');
/*!40000 ALTER TABLE `adocaos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agendas`
--

DROP TABLE IF EXISTS `agendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agendas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pessoa` int(10) unsigned NOT NULL,
  `data` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `agendas_id_pessoa_foreign` (`id_pessoa`),
  CONSTRAINT `agendas_id_pessoa_foreign` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agendas`
--

LOCK TABLES `agendas` WRITE;
/*!40000 ALTER TABLE `agendas` DISABLE KEYS */;
/*!40000 ALTER TABLE `agendas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `animals`
--

DROP TABLE IF EXISTS `animals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `animals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idade` int(11) NOT NULL,
  `raca` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cor` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `porte` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deficiencia` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vacinado` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dt_registro` date NOT NULL,
  `castrado` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patologia` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `situacao` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci,
  `imagem` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animals`
--

LOCK TABLES `animals` WRITE;
/*!40000 ALTER TABLE `animals` DISABLE KEYS */;
INSERT INTO `animals` VALUES (2,2,'biggle','Thor','preto','medio','N','M','S','2017-08-09','S','N','Bem de saúde','I','Filhotes de Beagle podem ser um desafio e tanto! O Beagle é um cachorro atraente com alma de','2ted.jpeg','2018-11-19 00:34:37','2019-02-10 02:22:38'),(3,2,'biggle','Ben','preto','medio','N','M','S','2017-08-09','S','N','Em tratamento, pata machucada','I','Filhotes de Beagle podem ser um desafio e tanto! O Beagle é um cachorro atraente com alma de','2ted.jpeg','2018-11-19 00:34:38','2019-02-06 02:21:43'),(4,2,'biggle','Amora','preto','medio','N','M','S','2017-08-09','S','N','Bem','I','dkfhwkjfhkwe,fbskdbflksdbfkjsdbf','2ted.jpeg','2018-11-19 00:34:39','2019-03-24 17:26:55'),(5,4,'dog','Bilie','branco','pequeno','N','M','N','2018-11-20','S','S','Muit bem de saúde','I','Requerem muito cuidado','2ted.jpeg','2018-11-20 22:11:17','2019-02-10 17:46:00'),(6,4,'Cavalo','horse','Marron claro','grande','N','M','N','2018-11-20','S','N','Muito Bem','I','Animal muito forte','2ted.jpeg','2018-11-20 22:12:48','2019-02-10 02:23:09'),(7,2,'biggle','Ted','Branco','pequeno','N','M','S','2018-12-12','S','N','Bem','I','Belo animal','2ted.jpeg','2018-12-16 23:43:52','2019-02-10 03:18:45'),(9,12,'xxxxxx','xxxxxxx','xxxxxxx','xxxxxx','N','M','S','2002-11-20','S','S','Bem de saúde','I','XXXXXXXXXXXXXXX','12xxxxxxx.jpeg','2019-01-26 16:52:23','2019-02-10 16:51:50'),(10,2,'pastor Alemão','Charlie','Preto','grande','S','M','S','2012-11-20','S','S','Bem de saúde','I','Bravo','2adriano.jpeg','2019-01-29 01:09:22','2019-02-10 03:17:24'),(11,12,'Pincher','Cadela','Preto','pequeno','N','M','S','2018-11-20','N','N','Bem de Saúde','I','Animal carinhoso','12cadela.jpeg','2019-02-10 17:03:01','2019-02-10 17:42:40'),(12,2,'Biggle','Arnold','Branco','pequeno','N','M','S','2012-11-20','S','S','Bom de saúde','I','Cão bagunceiro','2arnold.jpeg','2019-02-10 18:53:02','2019-02-10 18:59:29'),(13,3,'biglle','Bob','Preto','pequeno','S','M','S','2018-11-20','S','N','Bem de saúde','A','Bagunceiro','','2019-02-10 18:54:19','2019-02-10 18:54:49');
/*!40000 ALTER TABLE `animals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arquivo`
--

DROP TABLE IF EXISTS `arquivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arquivo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `caminho` text NOT NULL,
  `id_responsavel` int(10) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arquivo`
--

LOCK TABLES `arquivo` WRITE;
/*!40000 ALTER TABLE `arquivo` DISABLE KEYS */;
/*!40000 ALTER TABLE `arquivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enderecos`
--

DROP TABLE IF EXISTS `enderecos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enderecos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pessoa` int(10) unsigned DEFAULT NULL,
  `bairro` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rua` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resumo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cep` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pessoa_pk01` (`id_pessoa`),
  CONSTRAINT `id_pessoa_pk01` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enderecos`
--

LOCK TABLES `enderecos` WRITE;
/*!40000 ALTER TABLE `enderecos` DISABLE KEYS */;
INSERT INTO `enderecos` VALUES (10,7,'Jardim Europa','255','Bulgaria','Americana','AC','Bulgaria Jardim Europa, Jardim Europa, 255, SBO, SP','13455452','2019-02-03 23:56:44','2019-02-04 01:03:13'),(11,8,'Jardim Europa','2470','Ruqa da Varzea','SBO','AC','Ruqa da Varzea Jardim Europa, Jardim Europa, 2470, SBO, SP','13455452','2019-02-06 00:22:27','2019-02-06 00:28:18'),(12,9,'Jardim Europa','2470','Bulgaria','SBO','AC','Bulgaria Jardim Europa, Jardim Europa, 2470, SBO, SP','13455452','2019-02-10 02:21:08','2019-02-10 02:21:45'),(13,10,'Jardim Europa','2470','Bulgaria','SBO','SP','Bulgaria Jardim Europa, Jardim Europa, 2470, SBO, SP','13455452','2019-02-10 18:37:08','2019-02-10 18:37:08'),(14,11,'Jardim Europa','2470','Ruqa da Varzea','SBO','SP','Ruqa da Varzea Jardim Europa, Jardim Europa, 2470, SBO, SP','13455452','2019-02-10 18:43:14','2019-02-10 18:43:14'),(15,12,'Jardim Europa','2470','Bulgaria','SBO','SP','Bulgaria Jardim Europa, Jardim Europa, 2470, SBO, SP','13455452','2019-02-10 18:46:06','2019-02-10 18:46:06'),(17,14,'Jardim Europa','2470','Bulgaria','Americana','AC','Bulgaria Jardim Europa, Jardim Europa, 2470, Americana, SP','13455452','2019-02-10 19:05:38','2019-02-19 04:03:53'),(18,16,'Jardim','2470','Rua Bulgaria','Santa Barbara d\'Oeste','AC','Rua Bulgaria Jardim, Jardim, 2470, Santa Barbara d\'Oeste, SP','13455452','2019-02-19 03:46:04','2019-03-24 17:26:38'),(19,NULL,'Jardim','2470','Rua Bulgaria','Santa Barbara d\'Oeste','SP','Rua Bulgaria Jardim, Jardim, 2470, Santa Barbara d\'Oeste, SP','13455452','2019-02-19 03:47:15','2019-02-19 03:47:15'),(20,NULL,'Jardim','2470','Rua Bulgaria','Santa Barbara d\'Oeste','SP','Rua Bulgaria Jardim, Jardim, 2470, Santa Barbara d\'Oeste, SP','13455452','2019-02-19 03:47:37','2019-02-19 03:47:37');
/*!40000 ALTER TABLE `enderecos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fotos`
--

DROP TABLE IF EXISTS `fotos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fotos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_animal` int(10) unsigned NOT NULL,
  `caminho` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fotos_id_animal_foreign` (`id_animal`),
  CONSTRAINT `fotos_id_animal_foreign` FOREIGN KEY (`id_animal`) REFERENCES `animals` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fotos`
--

LOCK TABLES `fotos` WRITE;
/*!40000 ALTER TABLE `fotos` DISABLE KEYS */;
/*!40000 ALTER TABLE `fotos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensagens`
--

DROP TABLE IF EXISTS `mensagens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mensagens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_rem` int(10) unsigned NOT NULL,
  `id_dest` int(10) unsigned NOT NULL,
  `mensagem` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mensagens_id_rem_foreign` (`id_rem`),
  KEY `mensagens_id_dest_foreign` (`id_dest`),
  CONSTRAINT `mensagens_id_dest_foreign` FOREIGN KEY (`id_dest`) REFERENCES `pessoas` (`id`),
  CONSTRAINT `mensagens_id_rem_foreign` FOREIGN KEY (`id_rem`) REFERENCES `pessoas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensagens`
--

LOCK TABLES `mensagens` WRITE;
/*!40000 ALTER TABLE `mensagens` DISABLE KEYS */;
/*!40000 ALTER TABLE `mensagens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2018_10_12_122053_create_pessoas_table',1),(2,'2018_10_12_122106_create_usuarios_table',1),(3,'2018_10_12_122118_create_enderecos_table',1),(4,'2018_10_12_122137_create_mensagens_table',1),(5,'2018_10_12_122151_create_solicitacoes_table',1),(6,'2018_10_12_122212_create_telefones_table',1),(7,'2018_10_12_122225_create_adocaos_table',1),(8,'2018_10_12_122234_create_animals_table',1),(9,'2018_10_27_124733_create_fotos_table',1),(10,'2018_10_27_125828_create_foto_usuario',1),(11,'2018_11_02_131228_create_pessoa__enderecos_table',1),(12,'2018_11_02_141420_usuario_status',1),(13,'2018_11_17_234710_create_agendas_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoas`
--

DROP TABLE IF EXISTS `pessoas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dt_nasc` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoas`
--

LOCK TABLES `pessoas` WRITE;
/*!40000 ALTER TABLE `pessoas` DISABLE KEYS */;
INSERT INTO `pessoas` VALUES (7,'Michelle','F','45660720889','1996-11-20','2019-02-03 23:56:44','2019-02-03 23:56:44'),(8,'Wanessa','M','45660720889','1996-11-20','2019-02-06 00:22:27','2019-02-06 00:22:27'),(9,'Danieli','F','45660720889','1993-11-20','2019-02-10 02:21:08','2019-02-10 02:21:08'),(10,'Mautilio Lima','M','45660720889','1996-11-20','2019-02-10 18:37:08','2019-02-10 18:37:08'),(11,'Adrinano','M','45660720889','1996-11-20','2019-02-10 18:43:14','2019-02-10 18:43:14'),(12,'Fernanda','F','45660720889','1996-11-20','2019-02-10 18:46:06','2019-02-10 18:46:06'),(14,'Adriana','F','564.654.654-64','1996-11-20','2019-02-10 19:05:38','2019-02-10 19:05:38'),(15,'Aléx dos Santos','M','45660720889','1996-11-20','2019-02-19 03:47:15','2019-02-19 03:47:15'),(16,'Aléx dos Santos','M','45660720889','1996-11-20','2019-02-19 03:47:37','2019-02-19 03:47:37');
/*!40000 ALTER TABLE `pessoas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitacoes`
--

DROP TABLE IF EXISTS `solicitacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solicitacoes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pessoa` int(10) unsigned NOT NULL,
  `data` date NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `solicitacoes_id_pessoa_foreign` (`id_pessoa`),
  CONSTRAINT `solicitacoes_id_pessoa_foreign` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitacoes`
--

LOCK TABLES `solicitacoes` WRITE;
/*!40000 ALTER TABLE `solicitacoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telefones`
--

DROP TABLE IF EXISTS `telefones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pessoa` int(10) unsigned NOT NULL,
  `numero` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL,
  PRIMARY KEY (`id`),
  KEY `id_pessoa` (`id_pessoa`),
  CONSTRAINT `id_pessoa` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefones`
--

LOCK TABLES `telefones` WRITE;
/*!40000 ALTER TABLE `telefones` DISABLE KEYS */;
INSERT INTO `telefones` VALUES (7,7,'255','2019-02-03 23:56:44','2019-02-03 23:56:44'),(8,8,'2470','2019-02-06 00:22:27','2019-02-06 00:22:27'),(9,9,'2470','2019-02-10 02:21:08','2019-02-10 02:21:08'),(10,10,'2470','2019-02-10 18:37:08','2019-02-10 18:37:08'),(11,11,'2470','2019-02-10 18:43:14','2019-02-10 18:43:14'),(12,12,'2470','2019-02-10 18:46:06','2019-02-10 18:46:06'),(14,14,'2470','2019-02-10 19:05:38','2019-02-10 19:05:38'),(15,15,'2470','2019-02-19 03:47:16','2019-02-19 03:47:16'),(16,16,'2470','2019-02-19 03:47:37','2019-02-19 03:47:37');
/*!40000 ALTER TABLE `telefones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pessoa` int(10) unsigned NOT NULL,
  `nivel` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `foto` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuarios_id_pessoa_foreign` (`id_pessoa`),
  CONSTRAINT `usuarios_id_pessoa_foreign` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (3,7,'S','mi@gmail.com','123','$2y$10$mqD.q5R2abHQXEvzF63.Ju/o1GajgYm8/sYq07AVl7WJHwyNEFYLi','2019-02-03 23:56:44','2019-02-04 01:16:06','michelle.jpeg','A'),(4,8,'S','wa@gmail.com','123','$2y$10$CjbfJcyAvAsXHPjoTZUGQe6I1dvxSPiY4eUsGsnIrOPPCIFUQI.EW','2019-02-06 00:22:27','2019-02-10 18:35:30','wanessa.jpeg','I'),(5,9,'S','dani@gmail.com','123','$2y$10$r42oAyUwBdZl62phuvIGuOh/gX7P9hRV3hUEdkM0PSDr/FmagLadO','2019-02-10 02:21:08','2019-02-10 16:58:58','danieli.jpeg','A'),(6,10,'S','maurilio@gmail.com','123','$2y$10$zeewEk9J2qvqOMxXD3Joxu9/MTt/J6xTD09sKxS7kgJN4vvOMFRoK','2019-02-10 18:37:08','2019-02-10 18:37:08','mautilio-lima.jpeg','A'),(7,11,'S','adriano@gmail.com','123','$2y$10$1asZyOY2cYHVXjRC3uUywuidVZ/U36oqhoqGU.27vMyl9SStzkBdq','2019-02-10 18:43:14','2019-02-10 18:43:14','adrinano.jpeg','I'),(8,12,'A','fernanda@gmail.com','123','$2y$10$MGoYszGe.Si9pjMvVfPdiujEnrOCvHzB9ctim/jotOQUtSoeeggBa','2019-02-10 18:46:06','2019-02-10 18:46:06','fernanda.jpeg','A'),(10,14,'V','adrinana@gmail.com','123','$2y$10$wEEneM4XAohB7CrTqHcCjeAcSmInzIe8317KftW5pePgC1neGCYD2','2019-02-10 19:05:38','2019-02-19 04:03:53','adriana.jpeg','A'),(11,16,'S','Alex.S5@hotmail.com.br','123','$2y$10$W1rWmy3G.AnoJaddHrfPWuz3XymuwwPCx7.ZsmrGFUv4J01FgSKne','2019-02-19 03:47:38','2019-03-24 17:26:38','aléx-dos-santos.webp','I');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-24 11:29:35
