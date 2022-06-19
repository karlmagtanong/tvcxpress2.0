-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for tvcxpress_db
CREATE DATABASE IF NOT EXISTS `tvcxpress_db` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `tvcxpress_db`;

-- Dumping structure for table tvcxpress_db.tvc_mgmt_advertiser
CREATE TABLE IF NOT EXISTS `tvc_mgmt_advertiser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table tvcxpress_db.tvc_mgmt_advertiser: ~2 rows (approximately)
/*!40000 ALTER TABLE `tvc_mgmt_advertiser` DISABLE KEYS */;
INSERT INTO `tvc_mgmt_advertiser` (`id`, `name`) VALUES
	(3, 'JOLLIBEE FOODS CORPORATION'),
	(4, 'TEST ADVERTISER');
/*!40000 ALTER TABLE `tvc_mgmt_advertiser` ENABLE KEYS */;

-- Dumping structure for table tvcxpress_db.tvc_mgmt_asc_brand
CREATE TABLE IF NOT EXISTS `tvc_mgmt_asc_brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table tvcxpress_db.tvc_mgmt_asc_brand: ~3 rows (approximately)
/*!40000 ALTER TABLE `tvc_mgmt_asc_brand` DISABLE KEYS */;
INSERT INTO `tvc_mgmt_asc_brand` (`id`, `name`) VALUES
	(1, 'Brand 1'),
	(2, 'Brand 2'),
	(4, 'Brand 33');
/*!40000 ALTER TABLE `tvc_mgmt_asc_brand` ENABLE KEYS */;

-- Dumping structure for table tvcxpress_db.tvc_mgmt_billing_contact_details
CREATE TABLE IF NOT EXISTS `tvc_mgmt_billing_contact_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_person` varchar(50) DEFAULT NULL,
  `contact_number` varchar(50) DEFAULT NULL,
  `contact_email` varchar(50) DEFAULT NULL,
  `billing_info_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table tvcxpress_db.tvc_mgmt_billing_contact_details: ~0 rows (approximately)
/*!40000 ALTER TABLE `tvc_mgmt_billing_contact_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `tvc_mgmt_billing_contact_details` ENABLE KEYS */;

-- Dumping structure for table tvcxpress_db.tvc_mgmt_billing_info
CREATE TABLE IF NOT EXISTS `tvc_mgmt_billing_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ce_number` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `address` longtext,
  `tin` varchar(255) DEFAULT NULL,
  `style` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `terms` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table tvcxpress_db.tvc_mgmt_billing_info: ~0 rows (approximately)
/*!40000 ALTER TABLE `tvc_mgmt_billing_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `tvc_mgmt_billing_info` ENABLE KEYS */;

-- Dumping structure for table tvcxpress_db.tvc_mgmt_channel
CREATE TABLE IF NOT EXISTS `tvc_mgmt_channel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `cluster` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=316 DEFAULT CHARSET=utf8;

-- Dumping data for table tvcxpress_db.tvc_mgmt_channel: ~41 rows (approximately)
/*!40000 ALTER TABLE `tvc_mgmt_channel` DISABLE KEYS */;
INSERT INTO `tvc_mgmt_channel` (`id`, `name`, `type`, `cluster`) VALUES
	(275, 'Fox Channel', 2, 5),
	(276, 'Star Sports', 2, 5),
	(277, 'Star Movies', 2, 5),
	(278, 'Star World', 2, 5),
	(279, 'Fox Crime', 2, 5),
	(280, 'National Geographic', 2, 5),
	(281, 'Fox Sports Channel', 2, 5),
	(282, 'AXN', 2, 6),
	(283, 'Sony Channel (BeTV)', 2, 6),
	(284, 'Animax', 2, 6),
	(285, 'History Channel', 2, 7),
	(286, 'Biography Channel', 2, 7),
	(287, 'Lifetime', 2, 7),
	(288, 'FYI', 2, 7),
	(289, 'Kapamilya Channel', 1, 1),
	(290, 'ABS-CBN Sports Channel', 1, 1),
	(291, 'ANC', 1, 1),
	(292, 'Cinema One', 1, 1),
	(293, 'Balls', 1, 1),
	(294, 'DZMM TeleRadyo', 1, 1),
	(295, 'Hero', 1, 1),
	(296, 'Knowledge Channel', 1, 1),
	(297, 'Lifestyle Channel', 1, 1),
	(298, 'Maxxx', 1, 1),
	(299, 'Velvet', 1, 1),
	(300, 'Yey', 1, 1),
	(301, 'Jeepney TV', 1, 1),
	(302, 'E! Channel', 1, 1),
	(303, 'Myx', 1, 1),
	(304, 'Cinemo', 1, 1),
	(305, 'GNTV', 1, 2),
	(306, 'GMA Regional', 1, 2),
	(307, 'GMA Pinoy TV', 1, 2),
	(308, 'Tape Office', 1, 2),
	(309, 'Heart of Asia', 1, 2),
	(310, 'HallyPop', 1, 2),
	(311, 'ETC', 1, 3),
	(312, 'Solar Sports', 1, 3),
	(313, 'AKSYON TV', 1, 4),
	(314, 'AKTV', 1, 4),
	(315, 'Others', 1, NULL);
/*!40000 ALTER TABLE `tvc_mgmt_channel` ENABLE KEYS */;

-- Dumping structure for table tvcxpress_db.tvc_mgmt_channel_cluster
CREATE TABLE IF NOT EXISTS `tvc_mgmt_channel_cluster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table tvcxpress_db.tvc_mgmt_channel_cluster: ~7 rows (approximately)
/*!40000 ALTER TABLE `tvc_mgmt_channel_cluster` DISABLE KEYS */;
INSERT INTO `tvc_mgmt_channel_cluster` (`id`, `name`) VALUES
	(1, 'ABS-CBN Cable Channels'),
	(2, 'GMA7'),
	(3, 'Solar Entertainment'),
	(4, 'TV5'),
	(5, 'Fox International Channels'),
	(6, 'AXN'),
	(7, 'A&E Network');
/*!40000 ALTER TABLE `tvc_mgmt_channel_cluster` ENABLE KEYS */;

-- Dumping structure for table tvcxpress_db.tvc_mgmt_extra_services
CREATE TABLE IF NOT EXISTS `tvc_mgmt_extra_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` longtext,
  `sub_category` longtext,
  `price` float(11,2) DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT '1 = main cat 2 = sub cat',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Dumping data for table tvcxpress_db.tvc_mgmt_extra_services: ~11 rows (approximately)
/*!40000 ALTER TABLE `tvc_mgmt_extra_services` DISABLE KEYS */;
INSERT INTO `tvc_mgmt_extra_services` (`id`, `name`, `description`, `sub_category`, `price`, `type`) VALUES
	(1, 'Video Conversion', 'We handle the upscaling and downscaling of video resolution, HD to SD, conversion to other digital format, conversion of video to the correct specification based on the TV network requirements, We can also convert your master file from NTSC to PAL or to digital formats with adjusting the video compression Codec and audio to the specification you needed. - HD to SD, SD to HD - Frame Rate Conversion (NTSC to PAL, PAL to NTSC) - Aspect Ratio and Video Resolution - Waveform Correction', NULL, NULL, NULL),
	(2, 'Audio Correction', 'Our Audio process includes stereo mixing, level adjustment, lay-in audio & video matching and ensuring compliance with the necessary standards for TV network and digital platform - Stereo to Mono - Level Adjustments - Lay-in, Audio & Video Matching / Sync', NULL, NULL, NULL),
	(3, 'Digitization', 'Our digitization services transform your analog tape materials to a digital format, enhancing and distribution of transformed materials to advanced digital platforms. - NTSC Betacam Tape - Umatic Tape - Mini DV Tape - VHS / SVHSC Tape - Betamax Tape - Video 8 Tape - Hi8 Tape - Super and Regular 8mm Tape - Cassette Tape - Audio Reels - Tape Cleaning - Tape Repair To enable screen reader support, press Ctrl+Alt+Z To learn about keyboard shortcuts, press Ctrl+slash', NULL, NULL, NULL),
	(4, 'Editing', 'Our video editing services provide post-production support from edit down to video clean-up and video stitching. The Team can ensure your video file is edited to compliance and version requirements for TV network and digital platform includiing adding supers / logos, change end tags, ASC reference numbers and add qualifiers. - Edit Down - Addition of Supers/Qualifiers/Logos/ASC reference number - Video Cleanup - Video Stitching - Change End Tag - Subtitling - Targa Assembly', NULL, NULL, NULL),
	(5, 'ASC Application', 'Our assistance in storyboarding and application for ASC will ensure your campaigns run smoothly, without penalties, delays, and time-consuming application process - Edit digital content', NULL, NULL, NULL),
	(6, 'Conversion and Export', 'We will convert your file to the precise specification of any digital media platform and adjust the images to horizontal and vertical sizing for print layout (Billboard, Newsprint and Magazine) based of their requirements - Billboard - Newsprint - Magazine', NULL, NULL, NULL),
	(7, 'Transcription and Repurposing', 'Bumper Ads Derivative Ads', NULL, NULL, NULL),
	(8, 'Media Archive', 'Our Media Archiving system efficiently stores all your digital TVC\'s and video content. You will have easy access to your library of past and current files via our user-friendly dashboard.', NULL, NULL, NULL),
	(9, 'Media Asset Retrieval from Media Archive', 'We offer video file retrieval of the uncompressed files, and transmitted materials for your convenient use and reference We also upload and download your asset using our top-caliber technology and high-speed internet, getting it to the destination smoothly. - Uncompressed and Compressed Files - HD and SD video Files - Other Media Asset and Digital contents', NULL, NULL, NULL),
	(10, 'Media Asset and Digital Asset Storage', 'Our Digital Asset Management Library can carry and secure all of your asset and materials, allowing you to upload, download, share, organize and track all of your existing assets. Data Storage durability, scalable storages, redundant and multiple back-up systems ensure your data are intact.', NULL, NULL, NULL),
	(11, 'Radio and TV Monitoring Solution', 'An automated, secure, 24/7 system capable of monitoring audio, video, image content on TV (National, Provincial), Radio (Nationwide), Internet, and out of home platforms Works in synergy with the TVCXpress Archive in activating data/metadata for tracking/monitoring; can monitor your media post-buys and competitive ads In synergy with the TVCXpress Archive and our data science team, can be used as an early warning/alert on brand/consumers crisis reported in media and social media', NULL, NULL, NULL);
/*!40000 ALTER TABLE `tvc_mgmt_extra_services` ENABLE KEYS */;

-- Dumping structure for table tvcxpress_db.tvc_mgmt_extra_services_sub
CREATE TABLE IF NOT EXISTS `tvc_mgmt_extra_services_sub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serv_id` int(11) DEFAULT NULL,
  `sub_category` varchar(50) DEFAULT NULL,
  `price` float(11,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table tvcxpress_db.tvc_mgmt_extra_services_sub: ~4 rows (approximately)
/*!40000 ALTER TABLE `tvc_mgmt_extra_services_sub` DISABLE KEYS */;
INSERT INTO `tvc_mgmt_extra_services_sub` (`id`, `serv_id`, `sub_category`, `price`) VALUES
	(4, 1, 'Category 1', 1000.00),
	(5, 1, 'Category 2', 2000.00),
	(6, 2, 'Category 3', 3000.00),
	(7, 3, 'Category 4', 5000.00);
/*!40000 ALTER TABLE `tvc_mgmt_extra_services_sub` ENABLE KEYS */;

-- Dumping structure for table tvcxpress_db.tvc_mgmt_producer
CREATE TABLE IF NOT EXISTS `tvc_mgmt_producer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table tvcxpress_db.tvc_mgmt_producer: ~2 rows (approximately)
/*!40000 ALTER TABLE `tvc_mgmt_producer` DISABLE KEYS */;
INSERT INTO `tvc_mgmt_producer` (`id`, `name`, `contact_number`, `email`) VALUES
	(1, 'Producer 1', '09176225896', 'prod1@gmail.com'),
	(4, 'Producer 22', '09177778521', 'prod2@gmail.com');
/*!40000 ALTER TABLE `tvc_mgmt_producer` ENABLE KEYS */;

-- Dumping structure for table tvcxpress_db.tvc_mgmt_product_cat
CREATE TABLE IF NOT EXISTS `tvc_mgmt_product_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- Dumping data for table tvcxpress_db.tvc_mgmt_product_cat: ~28 rows (approximately)
/*!40000 ALTER TABLE `tvc_mgmt_product_cat` DISABLE KEYS */;
INSERT INTO `tvc_mgmt_product_cat` (`id`, `name`) VALUES
	(1, 'Alcoholic Beverages'),
	(2, 'Apparel'),
	(3, 'Appliances'),
	(4, 'Automotives'),
	(5, 'Banking and Finance'),
	(6, 'Canned Product'),
	(7, 'Communications/Telecommunications'),
	(8, 'Confectionary and Snacks'),
	(9, 'Courier and Cargo'),
	(10, 'Dairy Product'),
	(11, 'E-Commerce'),
	(12, 'Education/Educational Institution'),
	(13, 'Entertainment'),
	(14, 'Government Agency'),
	(15, 'Hair Care'),
	(16, 'Malls, Supermarkets, Groceries'),
	(17, 'Medical Institution'),
	(18, 'Mobile Application'),
	(19, 'Non-Alcoholic Beverages'),
	(20, 'Over the Counter Drugs'),
	(21, 'Personal Care'),
	(22, 'Pharmaceuticals'),
	(23, 'Policacy'),
	(24, 'Public Service Announcement'),
	(25, 'Processed Meats'),
	(26, 'Quick Serving Restaurant'),
	(27, 'Real Estate'),
	(28, 'Utilities');
/*!40000 ALTER TABLE `tvc_mgmt_product_cat` ENABLE KEYS */;

-- Dumping structure for table tvcxpress_db.tvc_mgmt_rate
CREATE TABLE IF NOT EXISTS `tvc_mgmt_rate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `length_from` decimal(11,2) DEFAULT NULL,
  `length_to` decimal(11,2) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `amount` float(11,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Dumping data for table tvcxpress_db.tvc_mgmt_rate: ~12 rows (approximately)
/*!40000 ALTER TABLE `tvc_mgmt_rate` DISABLE KEYS */;
INSERT INTO `tvc_mgmt_rate` (`id`, `name`, `length_from`, `length_to`, `type`, `amount`) VALUES
	(2, '0 - 5sec', 0.00, 5.00, 1, 900.00),
	(3, '6sec - 4min 59sec', 6.00, 275.40, 1, 2755.00),
	(4, '5min - 30min', 300.00, 1800.00, 1, 5500.00),
	(5, '31min - 60min', 1860.00, 3600.00, 1, 10000.00),
	(6, 'Publicis JimenezBasic, Inc.', 0.00, 5.00, 3, 900.00),
	(7, 'Publicis JimenezBasic, Inc.', 6.00, 275.40, 3, 2400.00),
	(8, 'Publicis JimenezBasic, Inc.', 300.00, 1800.00, 3, 5500.00),
	(9, 'Publicis JimenezBasic, Inc.', 1860.00, 3600.00, 3, 10000.00),
	(10, 'JOLLIBEE FOODS CORPORATION', 0.00, 5.00, 2, 900.00),
	(11, 'JOLLIBEE FOODS CORPORATION', 6.00, 275.40, 2, 2000.00),
	(12, 'JOLLIBEE FOODS CORPORATION', 300.00, 1800.00, 2, 5500.00),
	(13, 'JOLLIBEE FOODS CORPORATION', 1860.00, 3600.00, 2, 10000.00);
/*!40000 ALTER TABLE `tvc_mgmt_rate` ENABLE KEYS */;

-- Dumping structure for table tvcxpress_db.tvc_order
CREATE TABLE IF NOT EXISTS `tvc_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) DEFAULT NULL,
  `order_code` varchar(255) DEFAULT NULL,
  `advertiser` varchar(255) DEFAULT NULL,
  `asc_brand` varchar(255) DEFAULT NULL,
  `product_category` varchar(255) DEFAULT NULL,
  `asc_project_title` varchar(255) DEFAULT NULL,
  `length` varchar(255) DEFAULT NULL,
  `break_date` date DEFAULT NULL,
  `break_time_hh` varchar(50) DEFAULT NULL,
  `break_time_mm` int(11) DEFAULT NULL,
  `break_time_aa` varchar(255) DEFAULT NULL,
  `producer` varchar(255) DEFAULT NULL,
  `producer_contact` varchar(255) DEFAULT NULL,
  `producer_email` varchar(255) DEFAULT NULL,
  `agency_company` varchar(255) DEFAULT NULL,
  `agency_contact_person` varchar(255) DEFAULT NULL,
  `agency_contact_no` varchar(255) DEFAULT NULL,
  `agency_email` varchar(255) DEFAULT NULL,
  `billing_ce` varchar(255) DEFAULT NULL,
  `billing_company` varchar(255) DEFAULT NULL,
  `billing_address` varchar(255) DEFAULT NULL,
  `billing_contact_person` varchar(255) DEFAULT NULL,
  `billing_contact_no` varchar(255) DEFAULT NULL,
  `billing_contact_email` varchar(255) DEFAULT NULL,
  `billing_tin` varchar(255) DEFAULT NULL,
  `billing_business_type` varchar(255) DEFAULT NULL,
  `payment_terms` int(11) DEFAULT NULL,
  `currency` int(11) DEFAULT NULL,
  `mode_payment` int(11) DEFAULT NULL,
  `gcash_name` varchar(255) DEFAULT NULL,
  `gcash_email` varchar(255) DEFAULT NULL,
  `gcash_number` varchar(255) DEFAULT NULL,
  `service_type` int(11) DEFAULT NULL COMMENT '1 = Transmission 2 = Non Transmission',
  `platform` int(11) DEFAULT NULL COMMENT '1 = Tv 2 = Radio 3 = Online 4 = Print',
  `delivery_method` int(11) DEFAULT NULL,
  `delivery_company` varchar(255) DEFAULT NULL,
  `delivery_contact_name` varchar(255) DEFAULT NULL,
  `delivery_number` varchar(255) DEFAULT NULL,
  `delivery_email` varchar(255) DEFAULT NULL,
  `share_type` int(11) DEFAULT NULL,
  `share_link` varchar(255) DEFAULT NULL,
  `share_date` date DEFAULT NULL,
  `share_time_hh` varchar(50) DEFAULT NULL,
  `share_time_mm` int(11) DEFAULT NULL,
  `share_aa` varchar(255) DEFAULT NULL,
  `asc_upload` int(11) DEFAULT NULL,
  `asc_date` date DEFAULT NULL,
  `asc_time_hh` varchar(50) DEFAULT NULL,
  `asc_time_mm` int(11) DEFAULT NULL,
  `asc_time_aa` varchar(255) DEFAULT NULL,
  `asc_reference_code` varchar(255) DEFAULT NULL,
  `asc_valid_from` date DEFAULT NULL,
  `asc_valid_to` date DEFAULT NULL,
  `type` int(11) NOT NULL COMMENT '1 = Active 2 = Summary 3 = Save 4 = History 5 = Saved History',
  `created_by` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

-- Dumping data for table tvcxpress_db.tvc_order: ~11 rows (approximately)
/*!40000 ALTER TABLE `tvc_order` DISABLE KEYS */;
INSERT INTO `tvc_order` (`id`, `order_id`, `order_code`, `advertiser`, `asc_brand`, `product_category`, `asc_project_title`, `length`, `break_date`, `break_time_hh`, `break_time_mm`, `break_time_aa`, `producer`, `producer_contact`, `producer_email`, `agency_company`, `agency_contact_person`, `agency_contact_no`, `agency_email`, `billing_ce`, `billing_company`, `billing_address`, `billing_contact_person`, `billing_contact_no`, `billing_contact_email`, `billing_tin`, `billing_business_type`, `payment_terms`, `currency`, `mode_payment`, `gcash_name`, `gcash_email`, `gcash_number`, `service_type`, `platform`, `delivery_method`, `delivery_company`, `delivery_contact_name`, `delivery_number`, `delivery_email`, `share_type`, `share_link`, `share_date`, `share_time_hh`, `share_time_mm`, `share_aa`, `asc_upload`, `asc_date`, `asc_time_hh`, `asc_time_mm`, `asc_time_aa`, `asc_reference_code`, `asc_valid_from`, `asc_valid_to`, `type`, `created_by`, `created_at`) VALUES
	(42, '62af4db003bf9', 'ORDER-62AF4DB00A840', 'JOLLIBEE FOODS CORPORATION', 'Brand 33', 'Alcoholic Beverages', 'project title', '15', '2022-06-20', '01:03', NULL, NULL, 'Producer 1', '09176233252', 'prod@gmail.com', 'company agency', 'agency contact', '09176233255', 'agency@gmail.com', '01222', 'company billing', 'address billing', 'billing contact', '09171112222', 'email@billing', '012-256-2584', 'style', 30, 1, 1, NULL, NULL, NULL, 1, 1, 1, 'company delivery', 'name delivery', 'number delivery', 'email@gmail.com', NULL, NULL, NULL, '', NULL, NULL, 2, '2022-06-20', '01:03', NULL, NULL, '', NULL, NULL, 5, 1, '2022-06-19'),
	(43, '62af50fe47530', 'ORDER-62AF50FE479A7', 'JOLLIBEE FOODS CORPORATION', 'Brand 33', 'Alcoholic Beverages', 'project title', '15', '2022-06-20', '02:02', NULL, NULL, 'Producer 1', '09176233252', 'prod@gmail.com', 'company agency', 'agency contact', '09176233255', 'agency@gmail.com', '01222', 'company billing', 'address billing', 'billing contact', '09171112222', 'email@billing', '012-256-2584', 'style', 30, 1, 1, NULL, NULL, NULL, 1, 1, 3, 'company delivery', 'name delivery', 'number delivery', 'email@gmail.com', 3, NULL, NULL, '', NULL, NULL, 2, '2022-06-20', '01:03', NULL, NULL, '', NULL, NULL, 5, 1, '2022-06-19'),
	(44, '62af51f02831c', 'ORDER-62AF51F0287C3', 'JOLLIBEE FOODS CORPORATION', 'Brand 33', 'Alcoholic Beverages', 'project title', '15', '2022-06-20', '02:02', NULL, NULL, 'Producer 1', '09176233252', 'prod@gmail.com', 'company agency', 'agency contact', '09176233255', 'agency@gmail.com', '01222', 'company billing', 'address billing', 'billing contact', '09171112222', 'email@billing', '012-256-2584', 'style', 30, 1, 1, NULL, NULL, NULL, 1, 1, 3, 'company delivery', 'name delivery', 'number delivery', 'email@gmail.com', 3, NULL, NULL, '', NULL, NULL, 2, '2022-06-20', '01:03', NULL, NULL, '', NULL, NULL, 5, 1, '2022-06-19'),
	(45, '62af5245e151c', 'ORDER-62AF5245E19D6', 'JOLLIBEE FOODS CORPORATION', 'Brand 33', 'Alcoholic Beverages', 'project title', '15', '2022-06-20', '02:02', NULL, NULL, 'Producer 1', '09176233252', 'prod@gmail.com', 'company agency', 'agency contact', '09176233255', 'agency@gmail.com', '01222', 'company billing', 'address billing', 'billing contact', '09171112222', 'email@billing', '012-256-2584', 'style', 30, 1, 1, NULL, NULL, NULL, 1, 1, 3, 'company delivery', 'name delivery', 'number delivery', 'email@gmail.com', 3, NULL, NULL, '', NULL, NULL, 2, '2022-06-20', '01:03', NULL, NULL, '', NULL, NULL, 5, 1, '2022-06-19'),
	(46, '62af530fc67b2', 'ORDER-62AF530FC6CB3', 'JOLLIBEE FOODS CORPORATION', 'Brand 33', 'Alcoholic Beverages', 'project title', '15', '2022-06-20', '02:02', NULL, NULL, 'Producer 1', '09176233252', 'prod@gmail.com', 'company agency', 'agency contact', '09176233255', 'agency@gmail.com', '01222', 'company billing', 'address billing', 'billing contact', '09171112222', 'email@billing', '012-256-2584', 'style', 30, 1, 1, NULL, NULL, NULL, 1, 1, 3, 'company delivery', 'name delivery', 'number delivery', 'email@gmail.com', 3, NULL, NULL, '', NULL, NULL, 2, '2022-06-20', '01:03', NULL, NULL, '', NULL, NULL, 4, 1, '2022-06-19'),
	(47, '62af5329c5a2a', 'ORDER-62AF530FC6CB3', 'JOLLIBEE FOODS CORPORATION', 'Brand 33', 'Alcoholic Beverages', 'project title', '15', '2022-06-20', '02:02', NULL, NULL, 'Producer 1', '09176233252', 'prod@gmail.com', 'company agency', 'agency contact', '09176233255', 'agency@gmail.com', '01222', 'company billing', 'address billing', 'billing contact', '09171112222', 'email@billing', '012-256-2584', 'style', 30, 1, 1, NULL, NULL, NULL, 1, 1, 3, 'company delivery', 'name delivery', 'number delivery', 'email@gmail.com', 3, NULL, NULL, '', NULL, NULL, 1, '2022-06-20', '01:03', NULL, NULL, '', NULL, NULL, 4, 1, '2022-06-19'),
	(48, '62af537185554', 'ORDER-62AF530FC6CB3', 'JOLLIBEE FOODS CORPORATION', 'Brand 33', 'Alcoholic Beverages', 'project title', '15', '2022-06-20', '02:02', NULL, NULL, 'Producer 1', '09176233252', 'prod@gmail.com', 'company agency', 'agency contact', '09176233255', 'agency@gmail.com', '01222', 'company billing', 'address billing', 'billing contact', '09171112222', 'email@billing', '012-256-2584', 'style', 30, 1, 1, NULL, NULL, NULL, 1, 1, 3, 'company delivery', 'name delivery', 'number delivery', 'email@gmail.com', 3, NULL, NULL, '', NULL, NULL, 1, '2022-06-20', '01:03', NULL, NULL, '', NULL, NULL, 4, 1, '2022-06-19'),
	(49, '62af53b02af50', 'ORDER-62AF53B02B366', 'TEST ADVERTISER', 'Brand 1', 'Alcoholic Beverages', 'project title 2', '30', '2022-06-15', '10:03', NULL, NULL, '', '09176233252', '123', 'PUBLICIS JIMENEZBASIC, INC.', 'agency contact', '09176233255', 'agency@gmail.com', '01222', '123', 'address billing', 'billing contact', '09171112222', 'email@billing', '012-256-2584', 'style', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '', NULL, NULL, '', NULL, NULL, 5, 1, '2022-06-19'),
	(50, '62af549e80415', 'ORDER-62AF549E808C1', 'TEST ADVERTISER', 'Brand 1', 'Alcoholic Beverages', 'project title 2', '30', '2022-06-15', '02:02', NULL, NULL, '', '09176233252', '123', 'PUBLICIS JIMENEZBASIC, INC.', 'agency contact', '09176233255', 'agency@gmail.com', '01222', '123', 'address billing', 'billing contact', '09171112222', 'email@billing', '012-256-2584', 'style', 30, 1, 1, NULL, NULL, NULL, 2, NULL, NULL, '', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '', NULL, NULL, '', NULL, NULL, 5, 1, '2022-06-19'),
	(51, '62af54d872666', 'ORDER-62AF54D8729F1', 'TEST ADVERTISER', 'Brand 1', 'Alcoholic Beverages', 'project title 2', '30', '2022-06-15', '02:02', NULL, NULL, '', '09176233252', '123', 'PUBLICIS JIMENEZBASIC, INC.', 'agency contact', '09176233255', 'agency@gmail.com', '01222', '123', 'address billing', 'billing contact', '09171112222', 'email@billing', '012-256-2584', 'style', 30, 1, 1, NULL, NULL, NULL, 2, NULL, NULL, '', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '', NULL, NULL, '', NULL, NULL, 5, 1, '2022-06-19'),
	(52, '62af552c4acaa', 'ORDER-62AF530FC6CB3', 'JOLLIBEE FOODS CORPORATION', 'Brand 33', 'Alcoholic Beverages', 'project title', '15', '2022-06-20', '02:02', NULL, NULL, 'Producer 1', '09176233252', 'prod@gmail.com', 'company agency', 'agency contact', '09176233255', 'agency@gmail.com', '01222', 'company billing', 'address billing', 'billing contact', '09171112222', 'email@billing', '012-256-2584', 'style', 30, 1, 1, NULL, NULL, NULL, 2, 1, 3, 'company delivery', 'name delivery', 'number delivery', 'email@gmail.com', 3, NULL, NULL, '', NULL, NULL, 1, '2022-06-20', '01:03', NULL, NULL, '', NULL, NULL, 4, 1, '2022-06-19'),
	(53, '62af56789549c', 'ORDER-62AF567895A06', 'TEST ADVERTISER', 'Brand 1', 'Alcoholic Beverages', 'project title 2', '30', '2022-06-15', '02:02', NULL, NULL, '', '09176233252', '123', 'PUBLICIS JIMENEZBASIC, INC.', 'agency contact', '09176233255', 'agency@gmail.com', '01222', '123', 'address billing', 'billing contact', '09171112222', 'email@billing', '012-256-2584', 'style', 30, 1, 1, NULL, NULL, NULL, 2, NULL, NULL, '', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '', NULL, NULL, '', NULL, NULL, 5, 1, '2022-06-19'),
	(54, '62af5683b3cbd', 'ORDER-62AF5683B409C', 'TEST ADVERTISER', 'Brand 1', 'Alcoholic Beverages', 'project title 2', '30', '2022-06-15', '02:02', NULL, NULL, '', '09176233252', '123', 'PUBLICIS JIMENEZBASIC, INC.', 'agency contact', '09176233255', 'agency@gmail.com', '01222', '123', 'address billing', 'billing contact', '09171112222', 'email@billing', '012-256-2584', 'style', 30, 1, 1, NULL, NULL, NULL, 2, NULL, NULL, '', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '', NULL, NULL, '', NULL, NULL, 4, 1, '2022-06-19'),
	(55, '62af56ada80a8', 'O2022062000002', 'JOLLIBEE FOODS CORPORATION', 'Brand 33', 'Alcoholic Beverages', 'project title', '15', '2022-06-20', '02:02', NULL, NULL, 'Producer 1', '09176233252', 'prod@gmail.com', 'company agency', 'agency contact', '09176233255', 'agency@gmail.com', '01222', 'company billing', 'address billing', 'billing contact', '09171112222', 'email@billing', '012-256-2584', 'style', 30, 1, 1, NULL, NULL, NULL, 2, 1, 3, 'company delivery', 'name delivery', 'number delivery', 'email@gmail.com', 3, NULL, NULL, '', NULL, NULL, 1, '2022-06-20', '01:03', NULL, NULL, '', NULL, NULL, 1, 1, '2022-06-19'),
	(56, '62af575e90f8a', 'ORDER-62AF5683B409C', 'TEST ADVERTISER', 'Brand 1', 'Alcoholic Beverages', 'project title 2', '30', '2022-06-15', '02:02', NULL, NULL, '', '09176233252', '123', 'PUBLICIS JIMENEZBASIC, INC.', 'agency contact', '09176233255', 'agency@gmail.com', '01222', '123', 'address billing', 'billing contact', '09171112222', 'email@billing', '012-256-2584', 'style', 30, 1, 1, NULL, NULL, NULL, 1, 1, 3, '', '', '', '', 3, NULL, NULL, '', NULL, NULL, 1, NULL, '', NULL, NULL, 'reference', '2022-06-22', '2022-06-15', 4, 1, '2022-06-19'),
	(57, '62af5773f4036', 'ORDER-62AF5683B409C', 'TEST ADVERTISER', 'Brand 1', 'Alcoholic Beverages', 'project title 2', '30', '2022-06-15', '02:02', NULL, NULL, '', '09176233252', '123', 'PUBLICIS JIMENEZBASIC, INC.', 'agency contact', '09176233255', 'agency@gmail.com', '01222', '123', 'address billing', 'billing contact', '09171112222', 'email@billing', '012-256-2584', 'style', 30, 1, 1, NULL, NULL, NULL, 1, 1, 3, 'company delivery', 'name delivery', 'number delivery', 'email@gmail.com', 3, NULL, NULL, '', NULL, NULL, 1, NULL, '', NULL, NULL, 'reference', '2022-06-22', '2022-06-15', 4, 1, '2022-06-19'),
	(60, '62af5abdd3fa2', 'O2022062000001', 'TEST ADVERTISER', 'Brand 2', 'Alcoholic Beverages', 'project title 2', '30', '2022-06-15', '02:02', NULL, NULL, '', '09176233252', '123', 'PUBLICIS JIMENEZBASIC, INC.', 'agency contact', '09176233255', 'agency@gmail.com', '01222', '123', 'address billing', 'billing contact', '09171112222', 'email@billing', '012-256-2584', 'style', 30, 1, 1, NULL, NULL, NULL, 1, 1, 3, 'company delivery', 'name delivery', 'number delivery', 'email@gmail.com', 3, NULL, NULL, '', NULL, NULL, 1, NULL, '', NULL, NULL, 'reference', '2022-06-22', '2022-06-15', 4, 1, '2022-06-19'),
	(61, '62af5adb61ca3', 'O2022062000001', 'TEST ADVERTISER', 'Brand 2', 'Appliances', 'project title 2', '30', '2022-06-15', '02:02', NULL, NULL, '', '09176233252', '123', 'PUBLICIS JIMENEZBASIC, INC.', 'agency contact', '09176233255', 'agency@gmail.com', '01222', '123', 'address billing', 'billing contact', '09171112222', 'email@billing', '012-256-2584', 'style', 30, 1, 1, NULL, NULL, NULL, 1, 1, 3, 'company delivery', 'name delivery', 'number delivery', 'email@gmail.com', 3, NULL, NULL, '', NULL, NULL, 1, NULL, '', NULL, NULL, 'reference', '2022-06-22', '2022-06-15', 1, 1, '2022-06-19');
/*!40000 ALTER TABLE `tvc_order` ENABLE KEYS */;

-- Dumping structure for table tvcxpress_db.tvc_order_attachment
CREATE TABLE IF NOT EXISTS `tvc_order_attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `filesize` varchar(255) DEFAULT NULL,
  `format` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT '1 = pdf 2 = materials 3 = asc',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8;

-- Dumping data for table tvcxpress_db.tvc_order_attachment: ~22 rows (approximately)
/*!40000 ALTER TABLE `tvc_order_attachment` DISABLE KEYS */;
INSERT INTO `tvc_order_attachment` (`id`, `order_id`, `filename`, `path`, `filesize`, `format`, `type`) VALUES
	(89, '62af4db003bf9', 'bg.jpg', 'attachments/upload_pdf/bg.jpg', NULL, 'jpg', 1),
	(90, '62af50fe47530', 'positive_pr_23.jpg', 'attachments/materials/positive_pr_23.jpg', NULL, 'jpg', 2),
	(91, '62af50fe47530', 'positive_pr_234.jpg', 'attachments/materials/positive_pr_234.jpg', NULL, 'jpg', 2),
	(92, '62af51f02831c', 'Capture.PNG', 'attachments/upload_pdf/Capture.PNG', NULL, 'PNG', 1),
	(93, '62af5245e151c', 'positive_pr_23.jpg', 'attachments/materials/positive_pr_23.jpg', NULL, 'jpg', 2),
	(94, '62af5245e151c', 'positive_pr_234.jpg', 'attachments/materials/positive_pr_234.jpg', NULL, 'jpg', 2),
	(95, '62af530fc67b2', 'Capture.PNG', 'attachments/upload_pdf/Capture.PNG', NULL, 'PNG', 1),
	(96, '62af530fc67b2', 'positive_pr_23.jpg', 'attachments/materials/positive_pr_23.jpg', NULL, 'jpg', 2),
	(97, '62af530fc67b2', 'positive_pr_234.jpg', 'attachments/materials/positive_pr_234.jpg', NULL, 'jpg', 2),
	(98, '62af5329c5a2a', 'tvcfavicon.png', 'attachments/materials/tvcfavicon.png', NULL, 'png', 2),
	(99, '62af5329c5a2a', 'bg.jpg', 'attachments/asc_clearance/bg.jpg', NULL, 'jpg', 3),
	(100, '62af5329c5a2a', 'positive_pr_23.jpg', 'attachments/materials/positive_pr_23.jpg', NULL, 'jpg', 2),
	(101, '62af5329c5a2a', 'Capture.PNG', 'attachments/upload_pdf/Capture.PNG', NULL, 'PNG', 1),
	(102, '62af537185554', 'favicon.png', 'attachments/materials/favicon.png', NULL, 'png', 2),
	(103, '62af537185554', 'tvcfavicon.png', 'attachments/materials/tvcfavicon.png', NULL, 'png', 2),
	(104, '62af537185554', 'bg.jpg', 'attachments/asc_clearance/bg.jpg', NULL, 'jpg', 3),
	(105, '62af53b02af50', 'Capture.PNG', 'attachments/upload_pdf/Capture.PNG', NULL, 'PNG', 1),
	(106, '62af549e80415', 'Capture.PNG', 'attachments/upload_pdf/Capture.PNG', NULL, 'PNG', 1),
	(107, '62af54d872666', 'Capture.PNG', 'attachments/upload_pdf/Capture.PNG', NULL, 'PNG', 1),
	(108, '62af552c4acaa', 'favicon.png', 'attachments/materials/favicon.png', NULL, 'png', 2),
	(109, '62af552c4acaa', 'tvcfavicon.png', 'attachments/materials/tvcfavicon.png', NULL, 'png', 2),
	(110, '62af552c4acaa', 'bg.jpg', 'attachments/asc_clearance/bg.jpg', NULL, 'jpg', 3),
	(111, '62af56789549c', 'Capture.PNG', 'attachments/upload_pdf/Capture.PNG', NULL, 'PNG', 1),
	(112, '62af5683b3cbd', 'Capture.PNG', 'attachments/upload_pdf/Capture.PNG', NULL, 'PNG', 1),
	(113, '62af56ada80a8', 'favicon.png', 'attachments/materials/favicon.png', NULL, 'png', 2),
	(114, '62af56ada80a8', 'tvcfavicon.png', 'attachments/materials/tvcfavicon.png', NULL, 'png', 2),
	(115, '62af56ada80a8', 'bg.jpg', 'attachments/asc_clearance/bg.jpg', NULL, 'jpg', 3),
	(116, '62af575e90f8a', 'Capture.PNG', 'attachments/materials/Capture.PNG', NULL, 'PNG', 2),
	(117, '62af575e90f8a', 'tvcfavicon.png', 'attachments/materials/tvcfavicon.png', NULL, 'png', 2),
	(118, '62af575e90f8a', 'favicon.png', 'attachments/materials/favicon.png', NULL, 'png', 2),
	(119, '62af575e90f8a', 'bg2.jpg', 'attachments/asc_clearance/bg2.jpg', NULL, 'jpg', 3),
	(120, '62af575e90f8a', 'Capture.PNG', 'attachments/upload_pdf/Capture.PNG', NULL, 'PNG', 1),
	(121, '62af5773f4036', 'Capture.PNG', 'attachments/materials/Capture.PNG', NULL, 'PNG', 2),
	(122, '62af5773f4036', 'tvcfavicon.png', 'attachments/materials/tvcfavicon.png', NULL, 'png', 2),
	(123, '62af5773f4036', 'favicon.png', 'attachments/materials/favicon.png', NULL, 'png', 2),
	(124, '62af5773f4036', 'Capture.PNG', 'attachments/upload_pdf/Capture.PNG', NULL, 'PNG', 1),
	(125, '62af5773f4036', 'bg2.jpg', 'attachments/asc_clearance/bg2.jpg', NULL, 'jpg', 3),
	(126, '62af5abdd3fa2', 'Capture.PNG', 'attachments/materials/Capture.PNG', NULL, 'PNG', 2),
	(127, '62af5abdd3fa2', 'tvcfavicon.png', 'attachments/materials/tvcfavicon.png', NULL, 'png', 2),
	(128, '62af5abdd3fa2', 'favicon.png', 'attachments/materials/favicon.png', NULL, 'png', 2),
	(129, '62af5abdd3fa2', 'Capture.PNG', 'attachments/upload_pdf/Capture.PNG', NULL, 'PNG', 1),
	(130, '62af5abdd3fa2', 'bg2.jpg', 'attachments/asc_clearance/bg2.jpg', NULL, 'jpg', 3),
	(131, '62af5adb61ca3', 'Capture.PNG', 'attachments/materials/Capture.PNG', NULL, 'PNG', 2),
	(132, '62af5adb61ca3', 'tvcfavicon.png', 'attachments/materials/tvcfavicon.png', NULL, 'png', 2),
	(133, '62af5adb61ca3', 'favicon.png', 'attachments/materials/favicon.png', NULL, 'png', 2),
	(134, '62af5adb61ca3', 'Capture.PNG', 'attachments/upload_pdf/Capture.PNG', NULL, 'PNG', 1),
	(135, '62af5adb61ca3', 'bg2.jpg', 'attachments/asc_clearance/bg2.jpg', NULL, 'jpg', 3);
/*!40000 ALTER TABLE `tvc_order_attachment` ENABLE KEYS */;

-- Dumping structure for table tvcxpress_db.tvc_order_channel
CREATE TABLE IF NOT EXISTS `tvc_order_channel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) DEFAULT NULL,
  `channel_id` int(11) DEFAULT NULL,
  `cluster_id` int(11) DEFAULT NULL,
  `price` float(11,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=189 DEFAULT CHARSET=utf8;

-- Dumping data for table tvcxpress_db.tvc_order_channel: ~28 rows (approximately)
/*!40000 ALTER TABLE `tvc_order_channel` DISABLE KEYS */;
INSERT INTO `tvc_order_channel` (`id`, `order_id`, `channel_id`, `cluster_id`, `price`) VALUES
	(145, '62af4db003bf9', 289, 1, 2000.00),
	(146, '62af4db003bf9', 290, 1, 2000.00),
	(147, '62af4db003bf9', 306, 2, 2000.00),
	(148, '62af4db003bf9', 312, 3, 2000.00),
	(149, '62af50fe47530', 289, 1, 2000.00),
	(150, '62af50fe47530', 290, 1, 2000.00),
	(151, '62af50fe47530', 306, 2, 2000.00),
	(152, '62af50fe47530', 312, 3, 2000.00),
	(153, '62af51f02831c', 289, 1, 2000.00),
	(154, '62af51f02831c', 290, 1, 2000.00),
	(155, '62af51f02831c', 306, 2, 2000.00),
	(156, '62af51f02831c', 312, 3, 2000.00),
	(157, '62af5245e151c', 289, 1, 2000.00),
	(158, '62af5245e151c', 290, 1, 2000.00),
	(159, '62af5245e151c', 306, 2, 2000.00),
	(160, '62af5245e151c', 312, 3, 2000.00),
	(161, '62af530fc67b2', 289, 1, 2000.00),
	(162, '62af530fc67b2', 290, 1, 2000.00),
	(163, '62af530fc67b2', 306, 2, 2000.00),
	(164, '62af530fc67b2', 312, 3, 2000.00),
	(165, '62af5329c5a2a', 289, 1, 2000.00),
	(166, '62af5329c5a2a', 290, 1, 2000.00),
	(167, '62af5329c5a2a', 306, 2, 2000.00),
	(168, '62af5329c5a2a', 312, 3, 2000.00),
	(169, '62af537185554', 289, 1, 2000.00),
	(170, '62af537185554', 290, 1, 2000.00),
	(171, '62af537185554', 306, 2, 2000.00),
	(172, '62af537185554', 312, 3, 2000.00),
	(173, '62af575e90f8a', 290, 1, 2400.00),
	(174, '62af575e90f8a', 291, 1, 2400.00),
	(175, '62af575e90f8a', 306, 2, 2400.00),
	(176, '62af575e90f8a', 307, 2, 2400.00),
	(177, '62af5773f4036', 290, 1, 2400.00),
	(178, '62af5773f4036', 291, 1, 2400.00),
	(179, '62af5773f4036', 306, 2, 2400.00),
	(180, '62af5773f4036', 307, 2, 2400.00),
	(181, '62af5abdd3fa2', 290, 1, 2400.00),
	(182, '62af5abdd3fa2', 291, 1, 2400.00),
	(183, '62af5abdd3fa2', 306, 2, 2400.00),
	(184, '62af5abdd3fa2', 307, 2, 2400.00),
	(185, '62af5adb61ca3', 290, 1, 2400.00),
	(186, '62af5adb61ca3', 291, 1, 2400.00),
	(187, '62af5adb61ca3', 306, 2, 2400.00),
	(188, '62af5adb61ca3', 307, 2, 2400.00);
/*!40000 ALTER TABLE `tvc_order_channel` ENABLE KEYS */;

-- Dumping structure for table tvcxpress_db.tvc_order_charges
CREATE TABLE IF NOT EXISTS `tvc_order_charges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) DEFAULT NULL,
  `grand_total` float(11,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- Dumping data for table tvcxpress_db.tvc_order_charges: ~10 rows (approximately)
/*!40000 ALTER TABLE `tvc_order_charges` DISABLE KEYS */;
INSERT INTO `tvc_order_charges` (`id`, `order_id`, `grand_total`) VALUES
	(1, '62af4db003bf9', 8000.00),
	(2, '62af50fe47530', 8000.00),
	(3, '62af51f02831c', 8000.00),
	(4, '62af5245e151c', 8000.00),
	(5, '62af530fc67b2', 8000.00),
	(6, '62af5329c5a2a', 8000.00),
	(7, '62af537185554', 8000.00),
	(8, '62af549e80415', 3000.00),
	(9, '62af54d872666', 0.00),
	(10, '62af552c4acaa', 5000.00),
	(11, '62af56789549c', 0.00),
	(12, '62af5683b3cbd', 3000.00),
	(13, '62af56ada80a8', 7000.00),
	(14, '62af575e90f8a', 9600.00),
	(15, '62af5773f4036', 9600.00),
	(16, '62af5abdd3fa2', 9600.00),
	(17, '62af5adb61ca3', 9600.00);
/*!40000 ALTER TABLE `tvc_order_charges` ENABLE KEYS */;

-- Dumping structure for table tvcxpress_db.tvc_order_services
CREATE TABLE IF NOT EXISTS `tvc_order_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) DEFAULT NULL,
  `sub_cat_id` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `price` float(11,2) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Dumping data for table tvcxpress_db.tvc_order_services: ~4 rows (approximately)
/*!40000 ALTER TABLE `tvc_order_services` DISABLE KEYS */;
INSERT INTO `tvc_order_services` (`id`, `order_id`, `sub_cat_id`, `cat_id`, `price`, `qty`) VALUES
	(3, '62af549e80415', 4, 1, 1000.00, 1),
	(4, '62af549e80415', 5, 1, 2000.00, 1),
	(5, '62af552c4acaa', 4, 1, 1000.00, 1),
	(6, '62af552c4acaa', 5, 1, 4000.00, 2),
	(7, '62af56789549c', 4, 1, 0.00, NULL),
	(8, '62af56789549c', 5, 1, 0.00, NULL),
	(9, '62af5683b3cbd', 4, 1, 1000.00, 1),
	(10, '62af5683b3cbd', 5, 1, 2000.00, 1),
	(11, '62af56ada80a8', 4, 1, 1000.00, 1),
	(12, '62af56ada80a8', 5, 1, 6000.00, 3);
/*!40000 ALTER TABLE `tvc_order_services` ENABLE KEYS */;

-- Dumping structure for table tvcxpress_db.tvc_order_share_link
CREATE TABLE IF NOT EXISTS `tvc_order_share_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) DEFAULT NULL,
  `share_link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

-- Dumping data for table tvcxpress_db.tvc_order_share_link: ~11 rows (approximately)
/*!40000 ALTER TABLE `tvc_order_share_link` DISABLE KEYS */;
INSERT INTO `tvc_order_share_link` (`id`, `order_id`, `share_link`) VALUES
	(48, '62af4db003bf9', ''),
	(49, '62af50fe47530', ''),
	(50, '62af51f02831c', ''),
	(51, '62af5245e151c', ''),
	(52, '62af530fc67b2', ''),
	(53, '62af5329c5a2a', ''),
	(54, '62af537185554', ''),
	(55, '62af53b02af50', ''),
	(56, '62af549e80415', ''),
	(57, '62af54d872666', ''),
	(58, '62af552c4acaa', ''),
	(59, '62af56789549c', ''),
	(60, '62af5683b3cbd', ''),
	(61, '62af56ada80a8', ''),
	(62, '62af575e90f8a', ''),
	(63, '62af5773f4036', ''),
	(64, '62af59abbf38e', ''),
	(65, '62af5a57a92c4', ''),
	(66, '62af5abdd3fa2', ''),
	(67, '62af5adb61ca3', '');
/*!40000 ALTER TABLE `tvc_order_share_link` ENABLE KEYS */;

-- Dumping structure for table tvcxpress_db.tvc_traffic
CREATE TABLE IF NOT EXISTS `tvc_traffic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_code` varchar(255) DEFAULT NULL,
  `sched` date DEFAULT NULL,
  `order_form` int(11) DEFAULT NULL,
  `material` int(11) DEFAULT NULL,
  `asc_clearance` int(11) DEFAULT NULL,
  `billing` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table tvcxpress_db.tvc_traffic: ~0 rows (approximately)
/*!40000 ALTER TABLE `tvc_traffic` DISABLE KEYS */;
INSERT INTO `tvc_traffic` (`id`, `order_code`, `sched`, `order_form`, `material`, `asc_clearance`, `billing`, `status`, `created_by`, `created_at`) VALUES
	(1, 'O2022062000002', '2022-06-21', 2, 2, 2, 1, 3, NULL, NULL),
	(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `tvc_traffic` ENABLE KEYS */;

-- Dumping structure for table tvcxpress_db.tvc_traffic_log
CREATE TABLE IF NOT EXISTS `tvc_traffic_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_code` varchar(255) DEFAULT NULL,
  `order_form_status` int(11) DEFAULT NULL,
  `order_form_datetime` datetime DEFAULT NULL,
  `order_form_user` int(11) DEFAULT NULL,
  `meterial_status` int(11) DEFAULT NULL,
  `material_datetime` datetime DEFAULT NULL,
  `material_user` int(11) DEFAULT NULL,
  `asc_clearance_status` int(11) DEFAULT NULL,
  `asc_clearance_datetime` datetime DEFAULT NULL,
  `asc_clearance_user` int(11) DEFAULT NULL,
  `billing_status` int(11) DEFAULT NULL,
  `billing_datetime` datetime DEFAULT NULL,
  `Billing_user` int(11) DEFAULT NULL,
  `order_status` int(11) DEFAULT NULL,
  `order_status_datetime` datetime DEFAULT NULL,
  `order_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table tvcxpress_db.tvc_traffic_log: ~0 rows (approximately)
/*!40000 ALTER TABLE `tvc_traffic_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `tvc_traffic_log` ENABLE KEYS */;

-- Dumping structure for table tvcxpress_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `password_hash` varchar(50) DEFAULT NULL,
  `user_role` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `agency_name` varchar(255) DEFAULT NULL,
  `agency_contact` varchar(50) DEFAULT NULL,
  `agency_contact_no` varchar(50) DEFAULT NULL,
  `agency_email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table tvcxpress_db.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `username`, `password`, `password_hash`, `user_role`, `created_at`, `agency_name`, `agency_contact`, `agency_contact_no`, `agency_email`) VALUES
	(1, 'John Melbourne', 'admin', '123456', 'e10adc3949ba59abbe56e057f20f883e', 1, '2022-06-08', 'Agency Name', 'John Melbourne', '09172512234', 'john@gmail.com');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
