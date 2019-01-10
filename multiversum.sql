-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 18 jun 2018 om 11:55
-- Serverversie: 10.1.30-MariaDB
-- PHP-versie: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multiversum`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_first_name` varchar(255) NOT NULL,
  `admin_last_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_created_at` datetime NOT NULL,
  `admin_last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_first_name`, `admin_last_name`, `admin_email`, `admin_password`, `admin_created_at`, `admin_last_login`) VALUES
(1, 'Melvin', 'van Zutphen', 'melvin@test.com', 'test', '2018-06-15 14:52:27', '2018-06-15 14:52:39');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `house_number` varchar(255) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `last_purchased` datetime NOT NULL,
  `iban` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `order_item_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `ean_code` bigint(20) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` decimal(10,0) NOT NULL,
  `product_brand` varchar(255) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_platform` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `sale` enum('0','1') NOT NULL DEFAULT '0',
  `sale_price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`product_id`, `ean_code`, `product_name`, `product_description`, `product_price`, `product_brand`, `product_color`, `product_platform`, `product_image`, `sale`, `sale_price`) VALUES
(1, 471848768757, 'HTC Vive', 'De Vive Consumer Edition wordt geleverd met de headset, twee draadloze controllers, een Vive Link Box, oordopjes en twee Vive-basisstations.', '799', 'HTC', 'zwart', 'pc', '2000965529.jpeg', '1', '599'),
(2, 815820020103, 'Oculus Rift Bundle (Rift + Touch)', 'nvt', '449', 'Ocolus', 'Zilver', 'PC', '2001571823.jpeg', '0', '0'),
(4, 711719843757, 'Sony PlayStation VR', 'nvt', '229', 'Sony', 'Zwart', 'PlayStation 4', '2000774356.png', '0', '0'),
(5, 815820020004, 'Oculus Rift', '	• Voor en achterkant bevat sensoren zodat er 360 graden positionele tracking is.', '549', 'Ocolus', 'Zwart', 'PC', '2000898912.png', '0', '0'),
(6, 4718487708185, 'HTC Vive Pro', 'nvt', '879', 'PC', 'Blauw, zwart', 'PC', '2001919397.png', '0', '0'),
(7, 192018001602, 'HP Windows Mixed Reality headset', 'nvt', '399', 'HP', 'Zwart', 'PC', '2001712141.jpeg', '0', '0'),
(8, 780437918016, 'Samsung Galaxy Gear VR (v2)', 'Geschikt voor:\r\nSamsung Galaxy Note5\r\nSamsung Galaxy S6\r\nSamsung Galaxy S6 Edge\r\nSamsung Galaxy S6 Edge+\r\nSamsung Galaxy S7\r\nSamsung Galaxy S7 Edge', '59', 'Samsung', 'Wit', 'Smartphone', '2000774349.jpeg', '0', '0'),
(9, 884116285380, 'Dell Visor + Dell ViIsor controllers', 'Windows Mixed Reality headset\r\nTe bedienen met: Motion controllers, Xbox-controller, Toetsenbord en muis, Cortana Voice.\r\n\r\nInclusief 2x Dell Visor controllers.', '635', 'Dell', 'Wit', 'PC', '2001740465.jpeg', '1', '435'),
(10, 191999086226, 'Lenovo Explorer Headset', 'Windows Mixed Reality headset\r\nTe bedienen met: Motion controllers, Xbox-controller, Toetsenbord en muis, Cortana Voice', '456', 'Lenovo', 'Zwart', 'PC', '2001712845.jpeg', '0', '0'),
(11, 4718487692866, 'HTC Vive Business Edition', '	De Vive Business Edition wordt geleverd met de headset, twee draadloze controllers, een Vive Link Box, oordopjes en twee Vive-basisstations en Dedicated Business Edition customer support line.', '1389', 'HTC', 'Zwart', 'PC', '2001357491.jpeg', '0', '0'),
(12, 8806088773391, 'Samsung New Gear VR + Gear VR Controller', 'Geschikt voor:\r\nSamsung Galaxy S6\r\nSamsung Galaxy S7\r\nSamsung Galaxy S8', '121', 'Samsung', 'Zwart', 'Smartphone', '2001477121.png', '0', '0'),
(13, 3536403351991, 'PNY The DiscoVRy Headset', '', '7', 'PNY', 'Zwart', 'Smartphone', '2001720145.png', '0', '0'),
(14, 3760071190020, '	\r\nHomido Smartphone Virtual Reality Headset', '', '35', 'Homido', 'Zwart', 'Smartphone', '2000566018.png', '0', '0'),
(15, 4713883398558, 'Acer Mixed Reality Headset', '', '389', 'Acer', 'Blauw', 'PC', '2001712799.png', '0', '0'),
(16, 8801643063863, 'Samsung Gear VR 4 + Gear VR Controller', 'Werkt met Samsung Galaxy Note 8, S8, S8 Plus of S7 Edge, S7, S6 edge Plus, S6', '200', 'Samsung', 'Zwart', 'Smartphone', '2001756715.jpeg', '1', '115'),
(17, 6941921144159, 'Hyper BoboVR Z4', 'nvt', '40', 'Hyper', 'Wit', 'Smartphone', '2001764669.jpeg', '0', '0'),
(18, 8806088503141, 'Samsung Gear VR 2', 'Geschikt voor:\r\nSamsung Galaxy S6\r\nSamsung Galaxy S6 Edge\r\nSamsung Galaxy S6 Edge+\r\nSamsung Galaxy S7\r\nSamsung Galaxy S7 Edge\r\nSamsung Galaxy Note 7', '150', 'Samsung', 'Zwart', 'Smartphone', '2001229257.jpeg', '1', '80'),
(19, 8718868990570, 'Salora VR Gecko', '', '25', 'Salora', 'Wit', 'Smartphone', '2001740159.jpeg', '0', '0'),
(20, 4015625616662, 'Medion Erazer X1000 Mixed Reality Headset', 'Windows Mixed Reality Headset', '449', 'Medion', 'Blauw, zwart', 'PC', '2001691081.jpeg', '0', '0'),
(21, 8718722141599, '	\r\nVR Shinecon VR Bril Zwart + Bluetooth Gamepad en Remote Control Zwart', 'nvt', '60', 'VR Shinecon', 'Zwart', 'Smartphone', '2001053039.jpeg', '1', '28'),
(22, 8717534023048, 'Sweex Virtual Reality-Bril 4-Voudig Verstelbare Lenzen', 'nvt', '12', 'Sweex', 'Zwart', 'Smartphone', '2001320855.jpeg', '0', '0'),
(23, 8718924811191, '	\r\nWonky Monkey 3D VR Glasses (+ BT afstandsbediening)', 'nvt', '40', 'Wonky Money', 'Zwart', 'Smartphone', '2001184371.jpeg', '0', '0'),
(24, 187774000891, 'Vuzix iWear Video Headphones', 'nvt', '350', 'Vuzix', 'Zwart', 'PC, PlayStation 4, Smartphone, Xbox One', '2001317733.png', '1', '201'),
(25, 8718066349491, '	\r\nVR Shinecon VR Bril Zwart + Bluetooth Gamepad Zwart', 'nvt', '35', 'VR Shinecon', 'Zwart', 'Smartphone', '2001184375.jpeg', '0', '0'),
(26, 8718722130593, 'VR Shinecon VR Bril Zwart', 'nvt', '25', 'VR Shinecon', 'Zwart', 'Smartphone', '2000949999.jpeg', '0', '0'),
(27, 0, 'OSVR Hacker Development Kit 2', '', '437', 'OSVR', 'Zwart', 'PC', '2001139019.png', '0', '0'),
(28, 8806087005479, 'LG R100 360 VR', '- Geschikt voor LG G5', '63', 'LG', 'Zilver', 'Smartphone', '2001081273.jpeg', '0', '0');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexen voor tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `email_address` (`email_address`);

--
-- Indexen voor tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `order_number` (`order_number`);

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
