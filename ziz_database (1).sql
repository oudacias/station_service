-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 27, 2021 at 07:48 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ziz_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE IF NOT EXISTS `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE IF NOT EXISTS `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', ''),
(2, 'manager', ''),
(3, 'user', ''),
(4, 'admin_central', '');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE IF NOT EXISTS `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE IF NOT EXISTS `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 2),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE IF NOT EXISTS `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(15, '::1', 'houdalemkiri@gmail.com', 2, '2021-09-15 05:27:11', 1),
(16, '::1', 'houdalemkiri@gmail.com', 2, '2021-09-15 09:07:55', 1),
(17, '::1', 'houdalemkiri@gmail.com', 2, '2021-09-16 04:52:30', 1),
(18, '::1', 'houdalemkiri@gmail.com', 2, '2021-09-16 10:26:39', 1),
(19, '::1', 'houdalemkiri@gmail.com', 2, '2021-09-16 13:37:19', 1),
(20, '::1', 'houdalemkiri@gmail.com', 2, '2021-09-16 23:28:52', 1),
(21, '::1', 'houdalemkiri@gmail.com', 2, '2021-09-17 08:54:46', 1),
(22, '::1', 'houdalemkiri@gmail.com', NULL, '2021-09-20 03:09:46', 0),
(23, '::1', 'houdalemkiri@gmail.com', 2, '2021-09-20 03:09:52', 1),
(24, '::1', 'houdalemkiri@gmail.com', NULL, '2021-09-21 09:13:00', 0),
(25, '::1', 'houdalemkiri@gmail.com', 2, '2021-09-21 09:13:05', 1),
(26, '::1', 'houdalemkiri@gmail.com', 2, '2021-09-21 18:59:30', 1),
(27, '::1', 'houdalemkiri@gmail.com', 2, '2021-09-22 03:07:03', 1),
(28, '::1', 'houdalemkiri@gmail.com', 2, '2021-09-23 03:08:41', 1),
(29, '::1', 'houdalemkiri@gmail.com', 2, '2021-09-23 08:58:10', 1),
(30, '::1', 'houdalemkiri@gmail.com', 2, '2021-09-24 03:14:31', 1),
(31, '::1', 'houdalemkiri@gmail.com', 2, '2021-09-24 08:35:44', 1),
(32, '::1', 'houdalemkiri@gmail.com', 2, '2021-09-26 05:15:19', 1),
(33, '::1', 'houdalemkiri@gmail.com', 2, '2021-09-27 02:53:59', 1),
(34, '::1', 'houda1@gmail.com', 3, '2021-10-04 05:48:50', 0),
(35, '::1', 'admin@admin.com', NULL, '2021-10-04 05:52:16', 0),
(36, '::1', 'ad@admin.com', NULL, '2021-10-04 05:52:47', 0),
(37, '::1', 'admin@admin.com', NULL, '2021-10-04 05:53:38', 0),
(38, '::1', 'houdalemkiri@gmail.com', NULL, '2021-10-04 05:53:59', 0),
(39, '::1', 'admin2384@admin.com', NULL, '2021-10-05 11:07:30', 0),
(40, '::1', 'admin2384@admin.com', NULL, '2021-10-05 11:07:39', 0),
(41, '::1', 'admin2384@admin.com', NULL, '2021-10-05 11:08:40', 0),
(42, '::1', 'houda1@gmail.com', NULL, '2021-10-05 11:09:09', 0),
(43, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-05 11:30:33', 1),
(44, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-05 11:37:41', 1),
(45, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-07 03:55:43', 1),
(46, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-07 14:21:41', 1),
(47, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-07 16:14:50', 1),
(48, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-13 09:46:17', 1),
(49, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-13 14:21:11', 1),
(50, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-14 10:07:12', 1),
(51, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-14 18:48:27', 1),
(52, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-15 00:22:19', 1),
(53, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-15 02:56:23', 1),
(54, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-15 02:56:30', 1),
(55, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-15 03:11:15', 1),
(56, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-20 04:34:17', 1),
(57, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-21 08:57:49', 1),
(58, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-22 02:56:07', 1),
(59, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-22 09:41:46', 1),
(60, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-22 10:03:10', 1),
(61, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-23 06:34:02', 1),
(62, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-23 09:19:04', 1),
(63, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-24 06:29:40', 1),
(64, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-24 06:37:18', 1),
(65, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-24 21:08:11', 1),
(66, '::1', 'houdalemkiri@gmail.com', NULL, '2021-10-24 23:27:29', 0),
(67, '::1', 'wsk', NULL, '2021-10-24 23:28:41', 0),
(68, '::1', 'houdalemkiri@gmail.com', NULL, '2021-10-24 23:30:53', 0),
(69, '::1', 'houdalemkiri@gmail.com', NULL, '2021-10-24 23:31:24', 0),
(70, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-24 23:39:17', 1),
(71, '::1', 'houdalemkiri@gmail.com', NULL, '2021-10-25 08:46:32', 0),
(72, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-25 08:46:38', 1),
(73, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-25 23:05:22', 1),
(74, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-26 09:07:38', 1),
(75, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-26 09:45:12', 1),
(76, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-26 10:05:40', 1),
(77, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-26 13:47:35', 1),
(78, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-26 13:49:08', 1),
(79, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-27 02:49:09', 1),
(80, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-27 10:50:07', 0),
(81, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-27 10:50:19', 0),
(82, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-27 10:51:11', 1),
(83, '::1', 'houdalemkiri@gmail.com', 2, '2021-10-27 11:16:14', 1),
(84, '::1', 'admin@admin.com', NULL, '2021-10-27 12:20:41', 0),
(85, '::1', 'admin@admin.com', 2, '2021-10-27 12:21:15', 1),
(86, '::1', 'admin@admin.com', 2, '2021-10-27 12:24:52', 1),
(87, '::1', 'admin@admin.com', 2, '2021-10-27 12:30:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE IF NOT EXISTS `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'admins', '');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE IF NOT EXISTS `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE IF NOT EXISTS `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE IF NOT EXISTS `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_users_permissions`
--

INSERT INTO `auth_users_permissions` (`user_id`, `permission_id`) VALUES
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` text DEFAULT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT 1,
  `plafond` float DEFAULT NULL,
  `solde` float DEFAULT NULL,
  `reliquat` float DEFAULT NULL,
  `station_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `actif`, `plafond`, `solde`, `reliquat`, `station_id`, `created_at`, `updated_at`) VALUES
(11, 'SAGED', 1, 0, 0, 0, 1, '2021-10-25 06:06:18', '2021-10-26 16:29:47'),
(12, 'GSLR', 1, 0, 0, 0, 1, '2021-10-25 06:06:33', '2021-10-25 06:06:33'),
(13, 'BENHADDOU', 1, 0, 0, 0, 1, '2021-10-25 06:06:44', '2021-10-25 06:06:44'),
(14, 'AUDIMAK', 1, 0, 0, 0, 1, '2021-10-25 06:06:57', '2021-10-25 06:06:57'),
(15, 'TSPS', 1, 0, 0, 0, 1, '2021-10-25 06:07:04', '2021-10-25 06:07:04'),
(16, 'IMNETWORKS', 1, 0, 0, 0, 1, '2021-10-25 06:07:16', '2021-10-25 06:07:16'),
(17, 'RSK', 1, 0, 0, 0, 1, '2021-10-25 06:07:22', '2021-10-25 06:07:22'),
(18, 'MOB SHOP', 0, 0, 0, 0, 1, '2021-10-25 06:07:31', '2021-10-27 18:29:42');

-- --------------------------------------------------------

--
-- Table structure for table `creditclients`
--

CREATE TABLE IF NOT EXISTS `creditclients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL,
  `reference` text NULL,
  `montant` float NOT NULL DEFAULT 0,
  `qt` float NOT NULL DEFAULT 0,
  `recette_id` int(11) NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT 0,
  `cloture` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `creditclients`
--

INSERT INTO `creditclients` (`id`, `client_id`, `produit_id`, `reference`, `montant`, `qt`, `recette_id`, `valide`, `cloture`, `created_at`, `updated_at`) VALUES
(26, 14, 0, '', 50, 0, 53, 0, 0, '2021-10-26 10:55:22', '2021-10-26 10:55:22'),
(27, 16, 0, '', 965, 0, 53, 0, 0, '2021-10-26 10:55:22', '2021-10-26 10:55:22'),
(28, 18, 0, '', 82, 0, 53, 0, 0, '2021-10-26 10:55:23', '2021-10-26 10:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `depenses`
--

CREATE TABLE IF NOT EXISTS `depenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `produit_id` int(11) NOT NULL,
  `qt` float NOT NULL,
  `type_paiement` int(11) NOT NULL,
  `montant` float NOT NULL DEFAULT 0,
  `recette_id` int(11) NOT NULL,
  `detail` text NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT 0,
  `cloture` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `depenses`
--

INSERT INTO `depenses` (`id`, `produit_id`, `qt`, `type_paiement`, `montant`, `recette_id`, `detail`, `valide`, `cloture`, `created_at`, `updated_at`) VALUES
(1, 5, 10, 1, 2000, 2, '2345rtd', 0, 0, '2021-10-15 10:27:08', '2021-10-15 11:29:14'),
(2, 5, 20, 1, 0, 8, 'gggs', 0, 0, '2021-10-24 16:53:05', '2021-10-24 16:53:05'),
(3, 5, 20, 1, 0, 9, 'gggs', 0, 0, '2021-10-24 16:54:41', '2021-10-24 16:54:41'),
(4, 5, 20, 1, 0, 10, 'gggs', 0, 0, '2021-10-24 16:57:25', '2021-10-24 16:57:25'),
(5, 5, 20, 1, 0, 11, 'gggs', 0, 0, '2021-10-24 16:58:04', '2021-10-24 16:58:04'),
(6, 5, 10, 1, 2000, 24, 'Dewtails', 0, 0, '2021-10-24 18:10:59', '2021-10-24 18:10:59'),
(7, 5, 10, 1, 2000, 25, 'Dewtails', 0, 0, '2021-10-24 18:11:22', '2021-10-24 18:11:22'),
(8, 5, 20, 1, 4000, 29, '', 0, 0, '2021-10-24 18:36:14', '2021-10-24 18:36:14'),
(9, 12, 2220, 1, 2220, 36, '1we', 0, 0, '2021-10-25 11:35:45', '2021-10-25 11:35:45'),
(10, 12, 2220, 1, 2220, 37, '1we', 0, 0, '2021-10-25 11:35:51', '2021-10-25 11:35:51');

-- --------------------------------------------------------

--
-- Table structure for table `listeprixproduits`
--

CREATE TABLE IF NOT EXISTS `listeprixproduits` (
  `id` int(10) UNSIGNED NOT NULL,
  `produit_id` int(11) NOT NULL,
  `prix` float NOT NULL DEFAULT 0,
  `type` text NULL,
  `date_prix_debut` date NOT NULL,
  `date_prix_fin` date NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `listeprixproduits`
--

INSERT INTO `listeprixproduits` (`id`, `produit_id`, `prix`, `type`, `date_prix_debut`, `date_prix_fin`, `created_at`, `updated_at`) VALUES
(1, 1, 8.74, 'Revient', '2021-10-22', '2021-10-24', '2021-10-22 12:09:53', '2021-10-25 06:16:56'),
(2, 1, 9.62, 'Vente', '2021-10-23', '2021-10-25', '2021-10-22 15:50:16', '2021-10-25 06:15:58'),
(3, 2, 10.71, 'Revient', '2021-10-23', '2021-10-25', '2021-10-22 15:50:24', '2021-10-25 06:17:05'),
(4, 2, 11.42, 'Vente', '2021-10-23', '2021-10-25', '2021-10-22 15:50:39', '2021-10-25 06:16:25'),
(5, 6, 13.42, 'Vente', '2021-10-23', '2021-10-25', '2021-10-22 15:51:12', '2021-10-25 06:16:15'),
(6, 6, 1, 'Revient', '2021-10-14', '2021-10-30', '2021-10-22 16:18:47', '2021-10-25 06:18:31'),
(7, 1, 8.74, 'Revient', '2021-10-22', '2021-10-24', '2021-10-22 17:14:38', '2021-10-25 06:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-09-01-141505', 'App\\Database\\Migrations\\Recette', 'default', 'App', 1630508630, 1),
(2, '2021-09-01-165521', 'App\\Database\\Migrations\\Client', 'default', 'App', 1630567880, 2),
(3, '2021-09-02-090242', 'App\\Database\\Migrations\\Paiements', 'default', 'App', 1630577817, 3),
(4, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1631529817, 4),
(5, '2021-09-16-085943', 'App\\Database\\Migrations\\Stations', 'default', 'App', 1631783223, 5),
(6, '2021-09-16-103933', 'App\\Database\\Migrations\\Stations', 'default', 'App', 1631788784, 6),
(7, '2021-09-16-111234', 'App\\Database\\Migrations\\Client', 'default', 'App', 1631790763, 7),
(8, '2021-09-16-111328', 'App\\Database\\Migrations\\Produits', 'default', 'App', 1631790947, 8),
(9, '2021-09-17-060505', 'App\\Database\\Migrations\\Reservoires', 'default', 'App', 1631860516, 9),
(10, '2021-09-17-063527', 'App\\Database\\Migrations\\Pompes', 'default', 'App', 1631861243, 10),
(11, '2021-09-17-063536', 'App\\Database\\Migrations\\Stocks', 'default', 'App', 1631861243, 10),
(12, '2021-09-17-080831', 'App\\Database\\Migrations\\Moyenpaiement', 'default', 'App', 1631866315, 11),
(13, '2021-09-17-090045', 'App\\Database\\Migrations\\Volucompteurs', 'default', 'App', 1631889795, 12),
(14, '2021-09-17-132514', 'App\\Database\\Migrations\\Creditclients', 'default', 'App', 1631889795, 12),
(15, '2021-09-22-164718', 'App\\Database\\Migrations\\Recette', 'default', 'App', 1632329510, 13),
(16, '2021-09-26-114302', 'App\\Database\\Migrations\\Venteservices', 'default', 'App', 1632660702, 14),
(17, '2021-10-05-165343', 'App\\Database\\Migrations\\UserInfos', 'default', 'App', 1633452978, 15),
(18, '2021-10-15-061600', 'App\\Database\\Migrations\\Depenses', 'default', 'App', 1634278650, 16),
(19, '2021-10-22-085231', 'App\\Database\\Migrations\\Reglements', 'default', 'App', 1634892948, 17),
(20, '2021-10-22-101709', 'App\\Database\\Migrations\\Listeprixproduits', 'default', 'App', 1634900988, 18);

-- --------------------------------------------------------

--
-- Table structure for table `moyenpaiements`
--

CREATE TABLE IF NOT EXISTS `moyenpaiements` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `moyenpaiements`
--

INSERT INTO `moyenpaiements` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'CMI', '2021-09-17 09:22:43', '2021-10-21 16:47:59'),
(2, 'Cheque', '2021-09-17 09:22:49', '2021-09-17 09:22:49'),
(3, 'Espece', '2021-09-17 09:23:09', '2021-09-17 09:23:09'),
(4, 'VISA', '2021-10-15 15:25:40', '2021-10-15 15:25:40'),
(5, 'Bon ONT', '2021-10-20 16:08:13', '2021-10-20 16:08:13'),
(6, 'Bon ONCF', '2021-10-20 16:08:23', '2021-10-20 16:08:23'),
(7, 'Bon CI', '2021-10-20 16:08:29', '2021-10-20 16:08:29'),
(8, 'Bon ZIZ', '2021-10-20 16:08:35', '2021-10-20 16:08:35'),
(9, 'Attarik', '2021-10-20 16:08:45', '2021-10-20 16:08:45');

-- --------------------------------------------------------

--
-- Table structure for table `paiements`
--

CREATE TABLE IF NOT EXISTS `paiements` (
  `id` int(10) UNSIGNED NOT NULL,
  `recette_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `reference` text DEFAULT NULL,
  `type_paiement` text DEFAULT NULL,
  `montant` float NOT NULL DEFAULT 0,
  `commission` float NOT NULL DEFAULT 0,
  `montant_restant` float NOT NULL DEFAULT 0,
  `valide` tinyint(1) NOT NULL DEFAULT 0,
  `cloture` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paiements`
--

INSERT INTO `paiements` (`id`, `recette_id`, `client_id`, `reference`, `type_paiement`, `montant`, `commission`, `montant_restant`, `valide`, `cloture`, `created_at`, `updated_at`) VALUES
(44, 53, 0, NULL, '8', 500, 0, 500, 0, 0, '2021-10-26 10:55:22', '2021-10-26 10:55:22'),
(45, 53, 0, NULL, '5', 500, 0, 500, 0, 0, '2021-10-26 10:55:22', '2021-10-26 10:55:22'),
(46, 53, 0, NULL, '4', 2535, 0, 2535, 0, 0, '2021-10-26 10:55:22', '2021-10-26 10:55:22');

-- --------------------------------------------------------

--
-- Table structure for table `pompes`
--

CREATE TABLE IF NOT EXISTS `pompes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` text NOT NULL,
  `station_id` int(11) NOT NULL,
  `reservoir_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pompes`
--

INSERT INTO `pompes` (`id`, `nom`, `station_id`, `reservoir_id`, `created_at`, `updated_at`) VALUES
(1, 'Pompe_1q', 1, 1, '2021-09-17 08:31:22', '2021-10-21 15:48:50'),
(3, 'Pompe_3', 3, 1, '2021-09-22 02:21:42', '2021-10-23 15:38:14'),
(5, 'Pompe_GSP', 1, 5, '2021-10-25 06:38:00', '2021-10-25 06:38:00'),
(6, 'Pompe_CM', 1, 6, '2021-10-25 06:38:11', '2021-10-25 06:38:11');

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` text NOT NULL,
  `prix` float NOT NULL,
  `categorie` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `prix`, `categorie`, `created_at`, `updated_at`) VALUES
(1, 'Gasoil', 10, 'Carburant', '2021-09-17 06:41:02', '2021-09-17 06:41:02'),
(2, 'SUPER SANS PLOMB', 7, 'Carburant', '2021-09-17 06:42:57', '2021-09-17 06:42:57'),
(6, 'Melange', 15, 'Carburant', '2021-10-15 14:54:55', '2021-10-15 14:54:55'),
(7, 'Lavage', 1, 'Divers', '2021-10-25 06:12:56', '2021-10-25 06:13:35'),
(8, 'Graissage', 1, 'Divers', '2021-10-25 06:13:55', '2021-10-25 06:14:10'),
(9, 'Vidange', 1, 'Divers', '2021-10-25 06:14:24', '2021-10-25 06:14:24'),
(10, 'Carte Attarik', 1, 'Divers', '2021-10-25 06:14:38', '2021-10-25 06:14:38'),
(11, 'Compteur Eau', 1, 'Divers', '2021-10-25 06:14:53', '2021-10-25 06:19:03'),
(12, 'facture lydec', 1, 'Depense', '2021-10-25 06:19:45', '2021-10-25 06:19:45'),
(13, '2 TEMPS 1L', 36.5, 'Filtre', '2021-10-25 06:21:08', '2021-10-25 06:21:08'),
(14, '2-40 1L', 39, 'Filtre', '2021-10-25 06:21:52', '2021-10-25 06:21:52'),
(15, 'E5 1/2', 30, 'Filtre', '2021-10-25 06:22:15', '2021-10-25 06:22:15');

-- --------------------------------------------------------

--
-- Table structure for table `recettes`
--

CREATE TABLE IF NOT EXISTS `recettes` (
  `id` int(10) UNSIGNED NOT NULL,
  `station_id` int(11) DEFAULT NULL,
  `responsable_id` int(11) DEFAULT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT 0,
  `cloture` tinyint(1) NOT NULL DEFAULT 0,
  `volucompteur` float DEFAULT NULL,
  `stock` float DEFAULT NULL,
  `credit` float DEFAULT NULL,
  `paiement` float DEFAULT NULL,
  `ventes_services` float DEFAULT NULL,
  `depense` float NOT NULL,
  `diff` float DEFAULT NULL,
  `recette_date` date NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recettes`
--

INSERT INTO `recettes` (`id`, `station_id`, `responsable_id`, `valide`, `cloture`, `volucompteur`, `stock`, `credit`, `paiement`, `ventes_services`, `depense`, `diff`, `recette_date`, `created_at`, `updated_at`) VALUES
(53, 1, 2, 0, 0, 17122.9, NULL, 1097, 3535, 100, 0, -12390.9, '2021-10-11', '2021-10-26 04:55:22', '2021-10-26 04:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `reglements`
--

CREATE TABLE IF NOT EXISTS `reglements` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `montant` float NOT NULL DEFAULT 0,
  `recette_id` int(11) NOT NULL,
  `objet_reglement` text NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT 0,
  `cloture` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reglements`
--

INSERT INTO `reglements` (`id`, `client_id`, `montant`, `recette_id`, `objet_reglement`, `valide`, `cloture`, `created_at`, `updated_at`) VALUES
(3, 14, 10, 36, 'qqq', 0, 0, '2021-10-25 11:35:45', '2021-10-25 11:35:45'),
(4, 14, 10, 37, 'qqq', 0, 0, '2021-10-25 11:35:51', '2021-10-25 11:35:51');

-- --------------------------------------------------------

--
-- Table structure for table `reservoirs`
--

CREATE TABLE IF NOT EXISTS `reservoirs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` text NOT NULL,
  `stock_initial` float NOT NULL,
  `station_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservoirs`
--

INSERT INTO `reservoirs` (`id`, `nom`, `stock_initial`, `station_id`, `produit_id`, `actif`, `created_at`, `updated_at`) VALUES
(1, 'CG111', 15015, 1, 1, 1, '2021-09-17 08:18:06', '2021-10-25 16:05:46'),
(2, 'CG2', 20000, 3, 2, 1, '2021-09-17 08:19:03', '2021-10-25 06:39:17'),
(5, 'GSP', 12645.5, 1, 2, 1, '2021-10-25 06:37:06', '2021-10-26 09:58:33'),
(6, 'CM', 10, 1, 6, 1, '2021-10-25 06:37:25', '2021-10-25 06:39:22');

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE IF NOT EXISTS `stations` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` text NOT NULL,
  `localisation` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`id`, `nom`, `localisation`, `created_at`, `updated_at`) VALUES
(1, '2 mars', 'Casablanca', '2021-09-16 11:40:03', '2021-10-26 11:19:13'),
(3, 'Station_2', 'Casablanca', '2021-10-21 15:30:35', '2021-10-21 15:30:35'),
(4, 'Ain Sebaa', 'Ain Sebaa', '2021-10-26 15:46:46', '2021-10-26 15:46:46');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE IF NOT EXISTS `stocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `stock_initial` float NOT NULL,
  `stock_comptable` float NOT NULL,
  `stock_physique` float NOT NULL,
  `sortie` float NOT NULL,
  `entree` float NOT NULL,
  `manquant_excedent` float NOT NULL,
  `reservoir_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL,
  `prix_achat` float DEFAULT NULL,
  `recette_id` int(11) NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT 0,
  `cloture` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `stock_initial`, `stock_comptable`, `stock_physique`, `sortie`, `entree`, `manquant_excedent`, `reservoir_id`, `produit_id`, `prix_achat`, `recette_id`, `valide`, `cloture`, `created_at`, `updated_at`) VALUES
(83, 15015, 13787.6, 13727, 1227.39, 0, -60.61, 1, 1, NULL, 47, 0, 0, '2021-10-26 10:33:22', '2021-10-26 10:33:22'),
(84, 12645.5, 12190.3, 12128.5, 455.22, 0, -61.78, 5, 2, NULL, 47, 0, 0, '2021-10-26 10:33:22', '2021-10-26 10:33:22'),
(85, 15015, 13787.6, 13727, 1227.39, 0, -60.61, 1, 1, NULL, 48, 0, 0, '2021-10-26 10:34:11', '2021-10-26 10:34:11'),
(86, 12645.5, 12190.3, 12128.5, 455.22, 0, -61.78, 5, 2, NULL, 48, 0, 0, '2021-10-26 10:34:11', '2021-10-26 10:34:11'),
(87, 15015, 13787.6, 13727, 1227.39, 0, -60.61, 1, 1, NULL, 49, 0, 0, '2021-10-26 10:34:33', '2021-10-26 10:34:33'),
(88, 12645.5, 12190.3, 12128.5, 455.22, 0, -61.78, 5, 2, NULL, 49, 0, 0, '2021-10-26 10:34:33', '2021-10-26 10:34:33'),
(89, 15015, 13787.6, 13727, 1227.39, 0, -60.61, 1, 1, NULL, 50, 0, 0, '2021-10-26 10:34:41', '2021-10-26 10:34:41'),
(90, 12645.5, 12190.3, 12128.5, 455.22, 0, -61.78, 5, 2, NULL, 50, 0, 0, '2021-10-26 10:34:41', '2021-10-26 10:34:41'),
(91, 15015, 13787.6, 13727, 1227.39, 0, -60.61, 1, 1, NULL, 51, 0, 0, '2021-10-26 10:48:47', '2021-10-26 10:48:47'),
(92, 12645.5, 12190.3, 12128.5, 455.22, 0, -61.78, 5, 2, NULL, 51, 0, 0, '2021-10-26 10:48:47', '2021-10-26 10:48:47'),
(93, 15015, 13787.6, 13727, 1227.39, 0, -60.61, 1, 1, NULL, 52, 0, 0, '2021-10-26 10:52:11', '2021-10-26 10:52:11'),
(94, 12645.5, 12190.3, 12128.5, 455.22, 0, -61.78, 5, 2, NULL, 52, 0, 0, '2021-10-26 10:52:11', '2021-10-26 10:52:11'),
(95, 15015, 13787.6, 13727, 1227.39, 0, -60.61, 1, 1, 8.74, 53, 0, 0, '2021-10-26 10:55:22', '2021-10-26 11:06:08'),
(96, 12645.5, 12190.3, 12128.5, 455.22, 0, -61.78, 5, 2, 10.71, 53, 0, 0, '2021-10-26 10:55:22', '2021-10-26 11:06:15'),
(97, 13727, 13727, 0, 0, 0, -13727, 1, 1, 8.74, 54, 0, 0, '2021-10-26 16:39:57', '2021-10-26 16:39:57'),
(98, 12128.5, 12128.5, 0, 0, 0, -12128.5, 5, 2, 10.71, 54, 0, 0, '2021-10-26 16:39:57', '2021-10-26 16:39:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user2@gmail.com', 'houda', '$2y$10$6GEaVXI4pQovSf1o1K0zmukv5cGqD8QzqPt/c2ny1cX1Kp7leMbEG', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2021-09-13 10:35:41', '2021-10-27 05:33:29', NULL),
(2, 'admin@admin.com', 'exploringtechworld', '$2y$10$eLVms1KO53LtMWgMZxf1Ee.uTU9HSRSj/1Sum8Aw4DcrS3iY6jp2G', NULL, NULL, NULL, 'ff2a64d33654ea2de08acf360da49f24', 'd', NULL, 1, 0, '2021-09-13 10:36:05', '2021-10-27 03:30:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_infos`
--

CREATE TABLE IF NOT EXISTS `user_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text DEFAULT NULL,
  `station_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_infos`
--

INSERT INTO `user_infos` (`id`, `user_id`, `nom`, `prenom`, `station_id`, `created_at`, `updated_at`) VALUES
(1, 2, 'user1', 'user1', 1, '2021-10-23 15:34:46', '2021-10-27 18:40:16'),
(2, 3, 'nom1', 'prenom1', 4, '2021-10-26 16:15:18', '2021-10-26 16:15:18'),
(3, 4, 'nom1', 'prenom1', 4, '2021-10-26 16:15:21', '2021-10-26 16:15:36'),
(4, 1, 'user2', 'user2', 4, '2021-10-26 16:16:03', '2021-10-27 18:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `venteservices`
--

CREATE TABLE IF NOT EXISTS `venteservices` (
  `id` int(10) UNSIGNED NOT NULL,
  `produit_id` int(11) NOT NULL,
  `qt` float NOT NULL,
  `type_paiement` int(11) NOT NULL,
  `montant` float NOT NULL DEFAULT 0,
  `recette_id` int(11) NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT 0,
  `cloture` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `venteservices`
--

INSERT INTO `venteservices` (`id`, `produit_id`, `qt`, `type_paiement`, `montant`, `recette_id`, `valide`, `cloture`, `created_at`, `updated_at`) VALUES
(14, 7, 100, 1, 100, 46, 0, 0, '2021-10-25 16:16:11', '2021-10-25 16:16:11'),
(15, 7, 100, 1, 100, 53, 0, 0, '2021-10-26 10:55:23', '2021-10-26 10:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `volucompteurs`
--

CREATE TABLE IF NOT EXISTS `volucompteurs` (
  `id` int(10) UNSIGNED NOT NULL,
  `pompe_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `compteur_initial` float NOT NULL DEFAULT 0,
  `compteur_final` float NOT NULL DEFAULT 0,
  `recette_id` int(11) DEFAULT NULL,
  `prix_unitaire` float NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT 0,
  `cloture` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `volucompteurs`
--

INSERT INTO `volucompteurs` (`id`, `pompe_id`, `product_id`, `compteur_initial`, `compteur_final`, `recette_id`, `prix_unitaire`, `valide`, `cloture`, `created_at`, `updated_at`) VALUES
(134, 1, 1, 0, 1227.39, 53, 9.62, 0, 0, '2021-10-26 10:55:22', '2021-10-26 10:55:22'),
(135, 5, 2, 0, 396.82, 53, 11.42, 0, 0, '2021-10-26 10:55:22', '2021-10-26 10:55:22'),
(136, 6, 6, 0, 58.4, 53, 13.42, 0, 0, '2021-10-26 10:55:22', '2021-10-26 10:55:22'),
(137, 1, 1, 0, 1227.39, 54, 9.62, 0, 0, '2021-10-26 16:39:57', '2021-10-26 17:10:42'),
(138, 5, 2, 0, 396.82, 54, 11.42, 0, 0, '2021-10-26 16:39:57', '2021-10-26 17:10:46'),
(139, 6, 6, 0, 58.4, 54, 13.42, 0, 0, '2021-10-26 16:39:57', '2021-10-26 17:10:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `creditclients`
--
ALTER TABLE `creditclients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `depenses`
--
ALTER TABLE `depenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listeprixproduits`
--
ALTER TABLE `listeprixproduits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moyenpaiements`
--
ALTER TABLE `moyenpaiements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paiements`
--
ALTER TABLE `paiements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pompes`
--
ALTER TABLE `pompes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recettes`
--
ALTER TABLE `recettes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reglements`
--
ALTER TABLE `reglements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservoirs`
--
ALTER TABLE `reservoirs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_infos`
--
ALTER TABLE `user_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venteservices`
--
ALTER TABLE `venteservices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volucompteurs`
--
ALTER TABLE `volucompteurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `creditclients`
--
ALTER TABLE `creditclients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `depenses`
--
ALTER TABLE `depenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `listeprixproduits`
--
ALTER TABLE `listeprixproduits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `moyenpaiements`
--
ALTER TABLE `moyenpaiements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `paiements`
--
ALTER TABLE `paiements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `pompes`
--
ALTER TABLE `pompes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `recettes`
--
ALTER TABLE `recettes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `reglements`
--
ALTER TABLE `reglements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reservoirs`
--
ALTER TABLE `reservoirs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_infos`
--
ALTER TABLE `user_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `venteservices`
--
ALTER TABLE `venteservices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `volucompteurs`
--
ALTER TABLE `volucompteurs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
