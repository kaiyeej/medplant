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

-- Dumping structure for table medplants_db.tbl_health_assessment
CREATE TABLE IF NOT EXISTS `tbl_health_assessment` (
  `assessment_id` int(11) NOT NULL AUTO_INCREMENT,
  `assessment_name` varchar(50) NOT NULL DEFAULT '0',
  `entity_id` int(11) NOT NULL DEFAULT '0',
  `is_healthy` int(1) NOT NULL DEFAULT '0',
  `assessment_common_name` varchar(50) NOT NULL DEFAULT '0',
  `assessment_description` text NOT NULL,
  `assessment_biological` text NOT NULL,
  `assessment_prevention` text NOT NULL,
  `assessment_img` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`assessment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table medplants_db.tbl_health_assessment: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_health_assessment` DISABLE KEYS */;
INSERT INTO `tbl_health_assessment` (`assessment_id`, `assessment_name`, `entity_id`, `is_healthy`, `assessment_common_name`, `assessment_description`, `assessment_biological`, `assessment_prevention`, `assessment_img`, `date_added`) VALUES
	(1, 'nutrient-related issue', 0, 1, 'nutritional disease', 'Nutrient-related abiotic disorders are caused by deficiency or toxicity of macronutrients and micronutrients essential for the plant. This can be caused by a suboptimal amount of nutrients in the soil or unsuitable conditions for nutrients uptake.', 'Replant the plant into fresh soil rich in nutrients.', 'Change the soil regularly. Plants should be repotted when the soil is compacted, depleted of nutrients, and no longer retains water.,Choose suitable neighboring plants. Plants with similar nutrient requirements should not be planted close to each other.', 'DCTM_Penguin_UK_DK_AL458052_zs2mia.webp', '2023-01-17 16:51:19');
/*!40000 ALTER TABLE `tbl_health_assessment` ENABLE KEYS */;

-- Dumping structure for table medplants_db.tbl_plants
CREATE TABLE IF NOT EXISTS `tbl_plants` (
  `plant_id` int(11) NOT NULL AUTO_INCREMENT,
  `plantid` int(11) NOT NULL,
  `plant_name` varchar(50) NOT NULL,
  `plant_name_authority` varchar(50) NOT NULL,
  `plant_synonyms` varchar(50) NOT NULL,
  `plant_taxonomy_class` varchar(50) NOT NULL,
  `plant_taxonomy_family` varchar(50) NOT NULL,
  `plant_taxonomy_genus` varchar(50) NOT NULL,
  `plant_taxonomy_kingdom` varchar(50) NOT NULL,
  `plant_taxonomy_order` varchar(50) NOT NULL,
  `plant_taxonomy_phylum` varchar(50) NOT NULL,
  `plant_description` text NOT NULL,
  `plant_img` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`plant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table medplants_db.tbl_plants: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_plants` DISABLE KEYS */;
INSERT INTO `tbl_plants` (`plant_id`, `plantid`, `plant_name`, `plant_name_authority`, `plant_synonyms`, `plant_taxonomy_class`, `plant_taxonomy_family`, `plant_taxonomy_genus`, `plant_taxonomy_kingdom`, `plant_taxonomy_order`, `plant_taxonomy_phylum`, `plant_description`, `plant_img`, `date_added`) VALUES
	(7, 383552303, 'Alocasia', 'Alocasia (Schott) G.Don', 'Ensolenanthe,Panzhuyuia,Schizocasia,Xenophya', 'Magnoliopsida', 'Araceae', 'Alocasia', 'Plantae', 'Alismatales', 'Magnoliophyta', 'Alocasia is a genus of broad-leaved rhizomatous or tuberous perennial flowering plants from the family Araceae. There are 79 species native to tropical and subtropical Asia to Eastern Australia, and widely cultivated elsewhere.', 'alocasia-frydek-plant-profile-ce6a16be606948a8a87217d335a6816f.jpg', '2022-12-13 10:29:16'),
	(8, 383552540, 'Monstera deliciosa', 'Monstera deliciosa Liebm.', 'Monstera borsigiana,Monstera deliciosa var. borsig', 'Magnoliopsida', 'Araceae', 'Monstera', 'Plantae', 'Alismatales', 'Magnoliophyta', 'Monstera deliciosa, the Swiss cheese plant, is a species of flowering plant native to tropical forests of southern Mexico, south to Panama. It has been introduced to many tropical areas, and has become a mildly invasive species in Hawaii, Seychelles, Ascension Island and the Society Islands. It is very widely grown in temperate zones as a houseplant.\r\nThe plant may be confused with Thaumatophyllum bipinnatifidum, known as the Split-leaf Philodendron or Tree Philodendron, as they have similar leaves and growing habits. However, the ingestion of Thaumatophyllum bipinnatifidum may cause irritation to the digestive tract and will induce internal swelling. The sap is also known to irritate the skin.', 'house-plants-1629187361.jpg', '2022-12-13 10:32:00'),
	(9, 390387474, 'Helianthus annuus', 'Helianthus annuus L.', 'Helianthus annuus f. fallax,Helianthus annuus f. l', 'Magnoliopsida', 'Asteraceae', 'Helianthus', 'Plantae', 'Asterales', 'Magnoliophyta', 'Helianthus annuus, the common sunflower, is a large annual forb of the genus Helianthus grown as a crop for its edible oil and edible fruits. This sunflower species is also used as wild bird food, as livestock forage (as a meal or a silage plant), in some industrial applications, and as an ornamental in domestic gardens. The plant was first domesticated in the Americas. Wild Helianthus annuus is a widely branched annual plant with many flower heads. The domestic sunflower, however, often possesses only a single large inflorescence (flower head) atop an unbranched stem. The name sunflower may derive from the flower&#39;s head&#39;s shape, which resembles the sun.\r\nSunflower seeds were brought to Europe from the Americas in the 16th century, where, along with sunflower oil, they became a widespread cooking ingredient.', 'DCTM_Penguin_UK_DK_AL458052_zs2mia.webp', '2023-01-17 11:01:33'),
	(10, 383552249, 'Dracaena fragrans', 'Dracaena fragrans (L.) Ker Gawl.', 'Aletris fragrans,Aloe fragrantissima,Cordyline fra', 'Magnoliopsida', 'Asparagaceae', 'Dracaena', 'Plantae', 'Asparagales', 'Magnoliophyta', 'Dracaena fragrans (cornstalk dracaena), is a flowering plant species that is native throughout tropical Africa, from Sudan south to Mozambique, west to CÃ´te d&#39;Ivoire and southwest to Angola, growing in upland regions at 600â€“2,250 m (1,970â€“7,380 ft) altitude.', '1623167350-screen-shot-2021-06-08-at-11-48-38-am-1623167334.png', '2022-12-13 10:28:44');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table medplants_db.tbl_users: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` (`user_id`, `user_fname`, `user_mname`, `user_lname`, `user_contact_num`, `user_category`, `user_email`, `username`, `password`, `date_added`, `date_last_modified`) VALUES
	(1, 'Juan', 'Cruz', 'Dela Cruz', '09262662222', 'A', 'email@fm.com', 'admin', '0cc175b9c0f1b6a831c399e269772661', '2022-07-22 01:04:02', '2022-12-12 09:59:23'),
	(2, 'James', '', 'Smith', '', 'U', 'smith@gmail.com', 'james', 'b148e7f41fdc3be4b14e8d17e068bbad', '2022-08-26 08:04:58', '2022-12-13 15:35:39'),
	(4, 'Anna Maria', 'Santos', 'Santos', '7977', 'U', 'perosn@gmail.com', 'anna', 'b148e7f41fdc3be4b14e8d17e068bbad', '2022-08-26 08:06:30', '2022-12-13 15:39:27'),
	(6, 'John', '', 'Doe', '09260923454', 'U', 'john@gmail.com', 'john', '0cc175b9c0f1b6a831c399e269772661', '2022-08-26 08:07:15', '2022-12-13 15:35:53');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
