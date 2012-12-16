-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 16, 2012 at 09:02 PM
-- Server version: 5.1.54
-- PHP Version: 5.3.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `_elib2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_profiles`
--

CREATE TABLE IF NOT EXISTS `admin_profiles` (
  `user_id` int(10) unsigned NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `profile_image` text,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_profiles`
--

INSERT INTO `admin_profiles` (`user_id`, `first_name`, `last_name`, `profile_image`) VALUES
(17421134, 'Deni', 'Permana', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auto_populate`
--

CREATE TABLE IF NOT EXISTS `auto_populate` (
  `vehicle_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(5) NOT NULL,
  `make` varchar(36) NOT NULL,
  `model` varchar(36) NOT NULL,
  PRIMARY KEY (`vehicle_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `auto_populate`
--

INSERT INTO `auto_populate` (`vehicle_id`, `type`, `make`, `model`) VALUES
(1, 'Car', 'Hyundai', 'Sonata'),
(2, 'Car', 'Ford', 'Fiesta'),
(3, 'Truck', 'Toyota', 'Tacoma'),
(4, 'Car', 'Toyota', 'Tercel'),
(5, 'Truck', 'Ford', 'F-150'),
(6, 'Car', 'Honda', 'Civic'),
(7, 'Car', 'Chevrolet', 'Nova'),
(8, 'Car', 'Ford', 'Mustang'),
(9, 'Truck', 'Toyota', 'Tundra'),
(10, 'Truck', 'Ford', 'F-250'),
(11, 'Car', 'Hyundai', 'Accent'),
(12, 'Car', 'Toyota', 'Corolla'),
(13, 'Car', 'Honda', 'Accord'),
(14, 'Car', 'Honda', 'Fit'),
(15, 'Truck', 'Honda', 'Ridgeline'),
(16, 'Truck', 'Ford', 'Ranger'),
(17, 'Truck', 'Chevrolet', 'Colorado'),
(18, 'Truck', 'Chevrolet', 'Silverado'),
(19, 'Car', 'Chevrolet', 'Impala'),
(20, 'Car', 'Chevrolet', 'Corvette'),
(21, 'Car', 'Mazda', 'RX-8'),
(22, 'Car', 'Mazda', 'Miata');

-- --------------------------------------------------------

--
-- Table structure for table `category_menu`
--

CREATE TABLE IF NOT EXISTS `category_menu` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(56) NOT NULL,
  `parent_id` int(10) DEFAULT '0',
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `category_menu`
--

INSERT INTO `category_menu` (`category_id`, `name`, `parent_id`) VALUES
(1, 'Food', 0),
(2, 'Mexican', 1),
(3, 'Italian', 1),
(4, 'American', 1),
(5, 'Tacos', 2),
(6, 'Burritos', 2),
(7, 'Enchiladas', 2),
(8, 'Spaghetti', 3),
(9, 'Lasagna', 3),
(10, 'Hamburgers', 4),
(11, 'Fries', 4);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `country_province`
--

CREATE TABLE IF NOT EXISTS `country_province` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `country` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=170 ;

--
-- Dumping data for table `country_province`
--

INSERT INTO `country_province` (`id`, `country`, `province`) VALUES
(1, 'Brunei Darussalam  ', 'Belait'),
(2, 'Brunei Darussalam', 'Brunei and Muara'),
(3, 'Brunei Darussalam ', 'Temburong'),
(4, 'Brunei Darussalam ', 'Tutong'),
(5, 'Indonesia', 'Aceh'),
(6, 'Indonesia', 'Bali'),
(7, 'Indonesia', 'Banten'),
(8, 'Indonesia', 'Bengkulu'),
(9, 'Indonesia', 'Gorontalo'),
(10, 'Indonesia', 'Irian Jaya Barat'),
(11, 'Indonesia', 'Jakarta Raya'),
(12, 'Indonesia', 'Jambi'),
(13, 'Indonesia', 'Jawa Barat'),
(14, 'Indonesia', 'Jawa Tengah'),
(15, 'Indonesia', 'Jawa Timur'),
(16, 'Indonesia', 'Kalimantan Barat'),
(17, 'Indonesia', 'Kalimantan Selatan'),
(18, 'Indonesia', 'Kalimantan Tengah'),
(19, 'Indonesia', 'Kalimantan Timur'),
(20, 'Indonesia', 'Kepulauan Bangka Belitung'),
(21, 'Indonesia', 'Kepulauan Riau'),
(22, 'Indonesia', 'Lampung'),
(23, 'Indonesia', 'Maluku'),
(24, 'Indonesia', 'Maluku Utara'),
(25, 'Indonesia', 'Nusa Tenggara Barat'),
(26, 'Indonesia', 'Nusa Tenggara Timur'),
(27, 'Indonesia', 'Papua'),
(28, 'Indonesia', 'Riau'),
(29, 'Indonesia', 'Sulawesi Barat'),
(30, 'Indonesia', 'Sulawesi Selatan'),
(31, 'Indonesia', 'Sulawesi Tengah'),
(32, 'Indonesia', 'Sulawesi Tenggara'),
(33, 'Indonesia', 'Sulawesi Utara'),
(34, 'Indonesia', 'Sumatera Barat'),
(35, 'Indonesia', 'Sumatera Selatan'),
(36, 'Indonesia', 'Sumatera Utara'),
(37, 'Indonesia', 'Yogyakarta'),
(38, 'Malaysia', 'Johor'),
(39, 'Malaysia', 'Kedah'),
(40, 'Malaysia', 'Kelantan'),
(41, 'Malaysia', 'Kuala Lumpur'),
(42, 'Malaysia', 'Labuan'),
(43, 'Malaysia', 'Malacca'),
(44, 'Malaysia', 'Negeri Sembilan'),
(45, 'Malaysia', 'Pahang'),
(46, 'Malaysia', 'Perak'),
(47, 'Malaysia', 'Perlis'),
(48, 'Malaysia', 'Penang'),
(49, 'Malaysia', 'Sabah'),
(50, 'Philiphines', 'Abra'),
(51, 'Philiphines', 'Agusan del Norte'),
(52, 'Philiphines', 'Agusan del Sur'),
(53, 'Philiphines', 'Aklan'),
(54, 'Philiphines', 'Albay'),
(55, 'Philiphines', 'Antique'),
(56, 'Philiphines', 'Apayao'),
(57, 'Philiphines', 'Aurora'),
(58, 'Philiphines', 'Basilan'),
(59, 'Philiphines', 'Bataan'),
(60, 'Philiphines', 'Batanes'),
(61, 'Philiphines', 'Batangas'),
(62, 'Philiphines', 'Biliran'),
(63, 'Philiphines', 'Benguet'),
(64, 'Philiphines', 'Bohol'),
(65, 'Philiphines', 'Bukidnon'),
(66, 'Philiphines', 'Bulacan'),
(67, 'Philiphines', 'Cagayan'),
(68, 'Philiphines', 'Camarines Norte'),
(69, 'Philiphines', 'Camarines Sur'),
(70, 'Philiphines', 'Camiguin'),
(71, 'Philiphines', 'Capiz'),
(72, 'Philiphines', 'Catanduanes'),
(73, 'Philiphines', 'Cavite'),
(74, 'Philiphines', 'Cebu'),
(75, 'Philiphines', 'Compostela'),
(76, 'Philiphines', 'Davao del Norte'),
(77, 'Philiphines', 'Davao del Sur'),
(78, 'Philiphines', 'Davao Oriental'),
(79, 'Philiphines', 'Eastern Samar'),
(80, 'Philiphines', 'Guimaras'),
(81, 'Philiphines', 'Ifugao'),
(82, 'Philiphines', 'Ilocos Norte'),
(83, 'Philiphines', 'Ilocos Sur'),
(84, 'Philiphines', 'Iloilo'),
(85, 'Philiphines', 'Isabela'),
(86, 'Philiphines', 'Kalinga'),
(87, 'Philiphines', 'Laguna'),
(88, 'Philiphines', 'Lanao del Norte'),
(89, 'Philiphines', 'Lanao del Sur'),
(90, 'Philiphines', 'La Union'),
(91, 'Philiphines', 'Leyte'),
(92, 'Philiphines', 'Maguindanao'),
(93, 'Philiphines', 'Marinduque'),
(94, 'Philiphines', 'Masbate'),
(95, 'Philiphines', 'Mindoro Occidental'),
(96, 'Philiphines', 'Mindoro Oriental'),
(97, 'Philiphines', 'Mountain Province'),
(98, 'Philiphines', 'Negros Occidental'),
(99, 'Philiphines', 'Negros Oriental'),
(100, 'Philiphines', 'North Cotabato'),
(101, 'Philiphines', 'Northern Samar'),
(102, 'Philiphines', 'Nueva Ecija'),
(103, 'Philiphines', 'Nueva Vizcaya'),
(104, 'Philiphines', 'Palawan'),
(105, 'Philiphines', 'Pampanga'),
(106, 'Philiphines', 'Pangasinan'),
(107, 'Philiphines', 'Quezon'),
(108, 'Philiphines', 'Quirino'),
(109, 'Philiphines', 'Rizal'),
(110, 'Philiphines', 'Romblon'),
(111, 'Philiphines', 'Sarangani'),
(112, 'Philiphines', 'Siquijor'),
(113, 'Philiphines', 'South Cotabato'),
(114, 'Philiphines', 'Southern Leyte'),
(115, 'Philiphines', 'Sultan Kudarat'),
(116, 'Philiphines', 'Sulu'),
(117, 'Philiphines', 'Surigao del Norte'),
(118, 'Philiphines', 'Surigao del Sur'),
(119, 'Philiphines', 'Tarlac'),
(120, 'Philiphines', 'Tawi-Tawi'),
(121, 'Philiphines', 'Zambales'),
(122, 'Philiphines', 'Zamboanga del Norte'),
(123, 'Philiphines', 'Zamboanga del Sur'),
(124, 'Philiphines', 'Zamboanga Sibugay'),
(125, 'Timor Leste', 'Aileu'),
(126, 'Timor Leste', 'Ainaro'),
(127, 'Timor Leste', 'Ambeno'),
(128, 'Timor Leste', 'Baucau'),
(129, 'Timor Leste', 'Bobonaro'),
(130, 'Timor Leste', 'Cova Lima'),
(131, 'Timor Leste', 'Dili'),
(132, 'Timor Leste', 'Ermera'),
(133, 'Timor Leste', 'Lautém'),
(134, 'Timor Leste', 'Liquiçá'),
(135, 'Timor Leste', 'Manatuto'),
(136, 'Timor Leste', 'Manufahi'),
(137, 'Timor Leste', 'Viqueque'),
(138, 'Singapore', 'Ang Mo Kio'),
(139, 'Singapore', 'Bedok'),
(140, 'Singapore', 'Bishan'),
(141, 'Singapore', 'Bukit Batok'),
(142, 'Singapore', 'Bukit Merah'),
(143, 'Singapore', 'Bukit Panjang'),
(144, 'Singapore', 'Bukit Timah'),
(145, 'Singapore', 'Choa Chu Kang'),
(146, 'Singapore', 'Clementi'),
(147, 'Singapore', 'Downtown Core'),
(148, 'Singapore', 'Geylang'),
(149, 'Singapore', 'Hougang'),
(150, 'Singapore', 'Jurong East'),
(151, 'Singapore', 'Jurong West'),
(152, 'Singapore', 'Kallang'),
(153, 'Singapore', 'Marine Parade'),
(154, 'Singapore', 'Newton'),
(155, 'Singapore', 'Novena'),
(156, 'Singapore', 'Outram'),
(157, 'Singapore', 'Pasir Ris'),
(158, 'Singapore', 'Punggol'),
(159, 'Singapore', 'Queenstown'),
(160, 'Singapore', 'River Valley'),
(161, 'Singapore', 'Rochor'),
(162, 'Singapore', 'Sembawang'),
(163, 'Singapore', 'Sengkang'),
(164, 'Singapore', 'Serangoon'),
(165, 'Singapore', 'Tampines'),
(166, 'Singapore', 'Tanglin'),
(167, 'Singapore', 'Toa Payoh'),
(168, 'Singapore', 'Woodlands'),
(169, 'Singapore', 'Yishun');

-- --------------------------------------------------------

--
-- Table structure for table `customer_profile`
--

CREATE TABLE IF NOT EXISTS `customer_profile` (
  `user_id` int(10) unsigned NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `country` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `street_address` text NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `focus_area` longtext NOT NULL,
  `website` varchar(255) NOT NULL,
  `blog` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `profile_image` text,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_profile`
--

INSERT INTO `customer_profile` (`user_id`, `first_name`, `last_name`, `organization`, `country`, `province`, `street_address`, `phone_number`, `focus_area`, `website`, `blog`, `facebook`, `twitter`, `profile_image`) VALUES
(661604037, '', '', 'abc', '0', '0', 'Jakarta Selatan', '08118605075', 'a:2:{i:0;s:3:"MSM";i:1;s:8:"HIV/AIDS";}', '', '', '', '', NULL),
(896519780, '', '', 'ABC', 'Indonesia', '0', 'Jakarta', '6281585815005', 'a:2:{i:0;s:3:"MSM";i:1;s:3:"IDU";}', '', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_profiles`
--

CREATE TABLE IF NOT EXISTS `customer_profiles` (
  `user_id` int(10) unsigned NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `street_address` varchar(60) NOT NULL,
  `city` varchar(60) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `profile_image` text,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `custom_uploader_table`
--

CREATE TABLE IF NOT EXISTS `custom_uploader_table` (
  `user_id` int(10) unsigned NOT NULL,
  `images_data` text,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `denied_access`
--

CREATE TABLE IF NOT EXISTS `denied_access` (
  `IP_address` varchar(45) NOT NULL,
  `time` int(10) NOT NULL,
  `reason_code` tinyint(2) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ips_on_hold`
--

CREATE TABLE IF NOT EXISTS `ips_on_hold` (
  `IP_address` varchar(45) NOT NULL,
  `time` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login_errors`
--

CREATE TABLE IF NOT EXISTS `login_errors` (
  `username_or_email` varchar(255) NOT NULL,
  `IP_address` varchar(45) NOT NULL,
  `time` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_errors`
--

INSERT INTO `login_errors` (`username_or_email`, `IP_address`, `time`) VALUES
('deni@duniakreatif.com', '127.0.0.1', 1355662620);

-- --------------------------------------------------------

--
-- Table structure for table `manager_profiles`
--

CREATE TABLE IF NOT EXISTS `manager_profiles` (
  `user_id` int(10) unsigned NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `license_number` varchar(30) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `profile_image` text,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manager_profiles`
--

INSERT INTO `manager_profiles` (`user_id`, `first_name`, `last_name`, `license_number`, `phone_number`, `profile_image`) VALUES
(93062220, 'George', 'Washington', 'VgeJKQg+ujpyfOOfK42j2g==', '555-555-5555', NULL),
(93062221, 'John', 'Adams', '5j8jU82ECPnCEZxza/rW6Q==', '555-555-5555', NULL),
(93062222, 'Thomas', 'Jefferson', 'P7LMlEPwokCkho+yRVmpSA==', '555-555-5555', NULL),
(93062223, 'James', 'Madison', 'zpXKlyuWKIMlyDWjZuwkUQ==', '555-555-5555', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `reg_mode` int(1) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`reg_mode`) VALUES
(2);

-- --------------------------------------------------------

--
-- Table structure for table `temp_registration`
--

CREATE TABLE IF NOT EXISTS `temp_registration` (
  `reg_id` int(10) unsigned NOT NULL,
  `reg_time` int(10) NOT NULL,
  `user_name` varchar(12) NOT NULL,
  `user_pass` mediumtext NOT NULL,
  `user_salt` varchar(32) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `country` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `street_address` longtext NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `focus_area` longtext NOT NULL,
  `website` varchar(255) NOT NULL,
  `blog` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `temp_registration_data`
--

CREATE TABLE IF NOT EXISTS `temp_registration_data` (
  `reg_id` int(10) unsigned NOT NULL,
  `reg_time` int(10) NOT NULL,
  `user_name` varchar(12) NOT NULL,
  `user_pass` mediumtext NOT NULL,
  `user_salt` varchar(32) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `street_address` varchar(60) NOT NULL,
  `city` varchar(60) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `username_or_email_on_hold`
--

CREATE TABLE IF NOT EXISTS `username_or_email_on_hold` (
  `username_or_email` varchar(255) NOT NULL,
  `time` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) unsigned NOT NULL,
  `user_name` varchar(12) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(60) NOT NULL,
  `user_salt` varchar(32) NOT NULL,
  `user_last_login` int(10) DEFAULT NULL,
  `user_login_time` int(10) DEFAULT NULL,
  `user_date` int(10) NOT NULL,
  `user_modified` int(10) NOT NULL,
  `user_agent_string` varchar(32) DEFAULT NULL,
  `user_level` tinyint(2) unsigned NOT NULL,
  `user_banned` enum('0','1') NOT NULL DEFAULT '0',
  `passwd_recovery_code` varchar(60) DEFAULT NULL,
  `passwd_recovery_date` int(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_salt`, `user_last_login`, `user_login_time`, `user_date`, `user_modified`, `user_agent_string`, `user_level`, `user_banned`, `passwd_recovery_code`, `passwd_recovery_date`) VALUES
(17421134, 'administer', 'deni@duniakreatif.com', '$2a$09$1fd03f5f83ec092b7efcauWDdvBcOSLwLckfhHlmBR9aavst0Lx9.', '1fd03f5f83ec092b7efca2074f5ffcde', 1355653891, NULL, 1355243225, 1355243225, '454ee7de29e936f62cf50b5ad7b4cec8', 9, '0', '$2a$09$1fd03f5f83ec092b7efcauKuSGY6eO7K4nfc9YwIWT1VBbTXtKc2O', 1355651276),
(661604037, 'denipermana', 'denipermana@me.com', '$2a$09$4e5fbcd773921c23c89b4uvXnX3HQZKBRYFxNDGvQGAPCJs12diYC', '4e5fbcd773921c23c89b4877cec44bc1', NULL, NULL, 1355652097, 1355652097, NULL, 1, '0', NULL, NULL),
(896519780, 'dennychips', 'deni.duniakreatif@gmail.com', '$2a$09$8e30b0d29ca98785b3d5duhXIVId61e2OA/Y741yO17cxiVwJzeJS', '8e30b0d29ca98785b3d5d568d83b1345', 1355653997, NULL, 1355651559, 1355651559, '454ee7de29e936f62cf50b5ad7b4cec8', 1, '0', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
