-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.31 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for comics
CREATE DATABASE IF NOT EXISTS `comictv` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `comictv`;

-- Dumping structure for table comics.comics
CREATE TABLE IF NOT EXISTS `comics` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `cover_image` text,
  `status` tinyint(1) DEFAULT NULL,
  `author` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table comics.comics: ~2 rows (approximately)
INSERT INTO `comics` (`id`, `name`, `description`, `cover_image`, `status`, `author`) VALUES
	(1, 'one piece', NULL, 'abc.png', NULL, NULL),
	(2, 'optimis', 'hay chon gia dung', 'https://cdn.vox-cdn.com/thumbor/oylb3MGb1jQk3LOP2N3c4eaW-dg=/1400x1400/filters:format(jpeg)/cdn.vox-cdn.com/uploads/chorus_asset/file/24390847/last_knight_optimus.jpeg', 'dang cap nhat', NULL);

-- Dumping structure for table comics.chapter
CREATE TABLE IF NOT EXISTS `chapters` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `index_chapter` float NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `comic_id` bigint NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comic_id` (`comic_id`),
  CONSTRAINT `chapter_ibfk_1` FOREIGN KEY (`comic_id`) REFERENCES `comics` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table comics.chapter: ~3 rows (approximately)
INSERT INTO `chapters` (`id`, `index_chapter`, `name`, `comic_id`) VALUES
	(1, 1, 'bat dau', 1),
	(2, 2, 'giua tran', 1),
	(3, 3, 'ket thuc', 1);

-- Dumping structure for table comics.genre
CREATE TABLE IF NOT EXISTS `genres` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table comics.genre: ~0 rows (approximately)
INSERT INTO `genres` (`id`, `name`, `description`) VALUES
	(1, 'hai tac', 'di tim kho bau');

-- Dumping structure for table comics.comic_genre
CREATE TABLE IF NOT EXISTS `comic_genre` (
  `comic_id` bigint NOT NULL,
  `genre_id` bigint NOT NULL,
  PRIMARY KEY (`comic_id`,`genre_id`),
  KEY `genre_id` (`genre_id`),
  CONSTRAINT `comic_genre_ibfk_1` FOREIGN KEY (`comic_id`) REFERENCES `comics` (`id`),
  CONSTRAINT `comic_genre_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table comics.comic_genre: ~1 rows (approximately)
INSERT INTO `comic_genre` (`comic_id`, `genre_id`) VALUES
	(1, 1);

-- Dumping structure for table comics.image
CREATE TABLE IF NOT EXISTS `images` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `file` text NOT NULL,
  `index_image` float NOT NULL,
  `chapter_id` bigint NOT NULL,
  PRIMARY KEY (`id`),
  KEY `chapter_id` (`chapter_id`),
  CONSTRAINT `image_ibfk_1` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table comics.image: ~9 rows (approximately)
INSERT INTO `images` (`id`, `file`, `index_image`, `chapter_id`) VALUES
	(1, 'http://pic0.iqiyipic.com/image/20211206/f2/2e/a_100421840_m_601_en_m1_1013_638.jpg', 1, 1),
	(2, 'http://pic0.iqiyipic.com/image/20211206/f2/2e/a_100421840_m_601_en_m1_1013_638.jpg', 2, 1),
	(3, 'http://pic0.iqiyipic.com/image/20211206/f2/2e/a_100421840_m_601_en_m1_1013_638.jpg', 3, 1),
	(7, 'https://media.vov.vn/sites/default/files/styles/large/public/2022-10/4_6.jpeg.jpg', 1, 2),
	(8, 'https://media.vov.vn/sites/default/files/styles/large/public/2022-10/4_6.jpeg.jpg', 2, 2),
	(9, 'https://media.vov.vn/sites/default/files/styles/large/public/2022-10/4_6.jpeg.jpg', 3, 2),
	(10, 'https://pic0.iqiyipic.com/image/20211206/f2/2e/a_100421840_m_601_en_m1_1080_608.jpg', 1, 3),
	(11, 'https://pic0.iqiyipic.com/image/20211206/f2/2e/a_100421840_m_601_en_m1_1080_608.jpg', 2, 3),
	(12, 'https://pic0.iqiyipic.com/image/20211206/f2/2e/a_100421840_m_601_en_m1_1080_608.jpg', 3, 3);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
