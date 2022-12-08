-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for medplants_db
CREATE DATABASE IF NOT EXISTS `medplants_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `medplants_db`;

-- Dumping structure for table medplants_db.tbl_plants
CREATE TABLE IF NOT EXISTS `tbl_plants` (
  `plant_id` int(11) NOT NULL AUTO_INCREMENT,
  `plant_name` varchar(100) NOT NULL,
  `plant_description` text NOT NULL,
  `plant_img` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_last_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`plant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table medplants_db.tbl_plants: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_plants` DISABLE KEYS */;
INSERT INTO `tbl_plants` (`plant_id`, `plant_name`, `plant_description`, `plant_img`, `date_added`, `date_last_modified`) VALUES
	(1, 'Sample', '', 'stage-en-scripting-languages-1024x538.png.webp', '2022-12-01 09:21:51', '2022-12-01 09:21:51');
/*!40000 ALTER TABLE `tbl_plants` ENABLE KEYS */;

-- Dumping structure for table medplants_db.tbl_users
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(50) NOT NULL,
  `user_mname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `user_contact_num` varchar(20) NOT NULL,
  `user_category` varchar(1) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `date_added` datetime NOT NULL,
  `date_last_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table medplants_db.tbl_users: ~7 rows (approximately)
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` (`user_id`, `user_fname`, `user_mname`, `user_lname`, `user_contact_num`, `user_category`, `user_email`, `username`, `password`, `date_added`, `date_last_modified`) VALUES
	(1, 'Juan', 'Cruz', 'Dela Cruz', '', 'A', 'email@fm.com', 'admin', '0cc175b9c0f1b6a831c399e269772661', '2022-07-22 01:04:02', '2022-08-24 11:02:43'),
	(2, 'James', '', 'Smith', '', 'S', 'smith@gmail.com', 'james', 'b148e7f41fdc3be4b14e8d17e068bbad', '2022-08-26 08:04:58', '2022-08-26 08:04:58'),
	(3, 'Ree', '', 'Nu', '', 'S', 'd@gmail.com', 'staff', 'b148e7f41fdc3be4b14e8d17e068bbad', '2022-08-26 08:05:30', '2022-08-26 08:05:30'),
	(4, 'Anna Maria', 'Santos', 'Santos', '', 'S', 'perosn@gmail.com', 'anna', 'b148e7f41fdc3be4b14e8d17e068bbad', '2022-08-26 08:06:30', '2022-08-26 08:06:30'),
	(5, 'Pepe', '', 'Smith', '09262662222', 'S', 'sa@gmail.com', 'pepe', 'b148e7f41fdc3be4b14e8d17e068bbad', '2022-08-26 08:06:54', '2022-08-26 08:06:54'),
	(6, 'John', '', 'Doe', '09260923454', 'S', 'john@gmail.com', 'john', '0cc175b9c0f1b6a831c399e269772661', '2022-08-26 08:07:15', '2022-08-26 08:07:15'),
	(7, '', '', '', '', '', '', '', 'b148e7f41fdc3be4b14e8d17e068bbad', '2022-12-08 11:19:02', '2022-12-08 11:19:02');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
