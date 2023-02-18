-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.22 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for u868151405_aposta
CREATE DATABASE IF NOT EXISTS `u868151405_aposta` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `u868151405_aposta`;

-- Dumping structure for table u868151405_aposta.dado_bacario
CREATE TABLE IF NOT EXISTS `dado_bacario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `credit_account_id` varchar(50) DEFAULT NULL,
  `value` double NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`),
  UNIQUE KEY `credit_account_id` (`credit_account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table u868151405_aposta.dado_bacario: ~2 rows (approximately)
/*!40000 ALTER TABLE `dado_bacario` DISABLE KEYS */;
INSERT INTO `dado_bacario` (`id`, `credit_account_id`, `value`) VALUES
	(1, '567', 100),
	(2, '789', 200);
/*!40000 ALTER TABLE `dado_bacario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
