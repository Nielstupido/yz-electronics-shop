-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2022 at 03:17 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerceapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `is_active`) VALUES
(5, 'Bruno', 'brunoadmin@gmail.com', '$2y$10$qZ0OoyX8bhAVxDFM/fx8leZSZwlyq15c1C/KTnaqDLSx6eCDJ0VpC', '0'),
(8, 'Harry Den', 'harryden@gmail.com', '$2y$10$YKSDtra7v2wH6ORYfry8Ue9t49pk1AvQvdJGuq4lDvFLEcx.kP6Mq', '0'),
(9, 'Gairus', 'nielstupidity@gmail.com', '$2y$10$Gl6C/lFSKrzTC5Rn4IpdUO9lpc6VfsjERKmRMXRRsN1LfqvsH0cse', '0');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'NEC'),
(2, 'Toshiba'),
(3, 'HP'),
(4, 'Fujitso');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `qty`) VALUES
(6, 1, '::1', 7, 1),
(7, 10, '::1', 7, 1),
(10, 1, '::1', 8, 1),
(13, 4, '::1', 8, 1),
(14, 5, '::1', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(2, 'Core'),
(3, 'Celeron'),
(4, 'Rental'),
(5, 'Students'),
(6, 'Workers'),
(15, 'With freebies');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `trx_id` varchar(255) NOT NULL,
  `p_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `qty`, `trx_id`, `p_status`) VALUES
(1, 1, 1, 1, '9L434522M7706801A', 'Completed'),
(2, 1, 2, 1, '9L434522M7706801A', 'Completed'),
(3, 1, 3, 1, '9L434522M7706801A', 'Completed'),
(4, 1, 1, 1, '8AT7125245323433N', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(11) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` varchar(20) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL,
  `product_tag` varchar(20) NOT NULL,
  `product_tag2` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_qty`, `product_desc`, `product_image`, `product_keywords`, `product_tag`, `product_tag2`) VALUES
(1, 3, 1, 'NEC Intel Celeron 3855U', '7,500.00', 10, 'PROMO\r\nNo issue.\r\nWarranty: 3 Months\r\n\r\nSpecifications:\r\n\r\nCPU: Intel Celeron 1.6GHz 3855u (6th generation)\r\nOperating System: Windows 10\r\nMemory: 4GB DDR3 (Upgradable to 8GB)\r\nStorage: 500GB HDD or 120GB SSD (Pili lng po kayo kung alin mas prefer niyo)\r\nDisplay: 15-inch Widescreen Display\r\n\r\n- With built-in WiFi (dual-band)\r\n- With HDMI port\r\n- With VGA port\r\n- With Serial port\r\n- With DVD ROM\r\n- 5 USB ports (4 USB 3.0 1 USB 2.0)\r\n- With Bluetooth\r\n- 1.132 inch ang thickness (Di gaano makapal di rin gaano kanipis)\r\n- No builtin cam (pwede gamitan ng external cam)\r\n- GOOD BATTERY LIFE (3-4hrs. Straight use)\r\n\r\nApplications installed:\r\nWINRAR\r\nVLC player\r\nTeamviewer\r\nSmadav Antivirus\r\nMS Office 2013\r\nChrome\r\n\r\nInclusion:\r\nFREE Laptop bag\r\nFREE Mouse\r\nOriginal NEC Charger\r\n', 'product1.jpg', 'nec, celeron, with freebies', 'Featured-ALL', 'Recommended'),
(2, 2, 3, 'HP Intel Corei5 5300U 8GB RAM/120GB SSD', '13,600.00', 7, 'HP Laptop. \r\nPwede sa mga programming students at nag wowork from home (WFH)\r\nWarranty: 3 months\r\n\r\nCPU: Intel Corei5 5300u 2.3GHz 5th generation\r\nMemory: 8GB\r\nStorage: 120GB SSD\r\nDisplay: 12.5-inch screen size\r\nBattery: 2-3 hrs. (Rough estimate)\r\n\r\n- With built-in cam\r\n- With built-in wifi (dual band)\r\n- With built-in cam\r\n- With VGA port\r\n- With USB ports (3)\r\n- With LAN port\r\n- Backlit keyboard\r\n\r\nNo Bluetooth, pwede kabitan ng dongle\r\nNo DVD ROM\r\nNo HDMI port\r\n\r\nFREEBIES:\r\n- Mouse \r\n- Bag\r\n- Movies', 'product2.jpg', 'hp, core, with freebies', 'Featured-ALL', ''),
(4, 3, 1, 'NEC Intel Celeron 4GB RAM/250GB HDD', '5,800.00', 10, 'Specifications:\r\n\r\nCPU: Intel Celeron 1.9GHz\r\nMemory: 4GB memory (upgradable)\r\nStorage: 250 GB HDD (upgradable to SSD)\r\nDisplay: 15 inch display\r\nOperating System: Windows 10 (64-bit)\r\n\r\n- USB ports: 5\r\n- With VGA port\r\n- With HDMI port\r\n- With DVD ROM\r\n\r\nNo built-in cam\r\nNo built-in Bluetooth\r\nWeak battery (Approximately 1 hr. if di nakasaksak charger)\r\n\r\nApplications installed:\r\n* Chrome Browser\r\n* Winrar\r\n* VLC Player\r\n*Adobe PDF Reader\r\n*Microsoft Office 2013\r\n\r\nWarranty: 3 months', 'product3.jpg', 'nec, celeron', 'Featured-ALL', ''),
(5, 2, 1, 'NEC Intel Core i5 4GB RAM/120GB m.2 SSD', '9,500.00', 7, 'LIGHTWEIGHT AND RESPONSIVE UNIT (FAST)\r\nNEC Laptop\r\n\r\nCPU: Intel corei5 2.2GHz (5th gen)\r\nMemory: 4GB\r\nStorage: 120GB m.2 SSD\r\nDisplay: 13.5-inch display\r\nResolution: 2560 x 1440 (High-Resolution)\r\nLightweight unit. 0.9 KILO\r\n\r\n- With BUILT-IN CAMERA\r\n- With built-in wifi (dual-band)\r\n- With Bluetooth\r\n- With HDMI Port\r\n- With 2 USB 3.0 Ports', 'product4.jpg', 'nec, core', 'Featured-ALL', 'Recommended'),
(22, 2, 4, 'Fujitso Intel Corei5 8GB RAM/240GB SSD', '20,000.00', 7, 'Sa mga nagwowork from home na need ng high specs unit.\r\n2ND HAND OFFICE USED. HINDI PO ITO BRANDNEW.\r\n\r\nQuick specs:\r\n\r\nCPU: Intel Corei5 6th Gen 3.0 GHz processor\r\nMemory: 8GB\r\nStorage: 240GB SSD (Much faster than HDD)\r\n\r\n- With Bluetooth\r\n- With Built-in webcam\r\n- With WIFI\r\n- Good Batt.', 'product6.jpg', 'hp, core, students', 'Featured-ALL', ''),
(23, 2, 2, 'Toshiba Intel Corei3 8GB RAM/256GB SSD', '11,500.00', 3, 'LIMITED STOCKS!\r\nToshiba laptops\r\n\r\nPrice: 11,500 Pesos\r\nWarranty: 3 Months \r\nNote: These are 2nd hand units, expect some minor scratches or hairlines sa case.\r\n\r\nQuick specs:\r\n\r\nCPU: Intel Corei3 2.0GHz (6th Generation)\r\nMemory: 8GB RAM\r\nStorage: 256GB SSD\r\nOperating system: Windows 10\r\n\r\n- FULL SIZE KEYBOARD (W/ numpad)\r\n- With DVD ROM\r\n- Dual-band wifi (built-in)\r\n- With vga and hdmi ports\r\n- With bluetooth\r\n- With builtin camera\r\n- 15.6-inch wide display\r\n- 1366x768 resolution\r\n- 2-3 hrs. Batt. Life\r\n- 4 USB ports\r\n\r\nFREEBIES: USB Mouse, Bag, Movies', 'product5.jpg', 'toshiba, core, with freebies', 'Featured-ALL', ''),
(24, 2, 1, 'NEC VersaPro VH', '10,500.00', 5, 'CPU: Intel Corei5-7Y54 1.20GHz (7th gen)\r\nMemory: 4gb\r\nStorage: 128gb ssd\r\nWireless: Yes\r\nDisplay: 12.5\r\nResolution: FULL HD (1920 x 1080)\r\nWireless LAN: Yes\r\nWth builtin Bluetooth\r\nGraphics:  Intel HD Graphics 615\r\n\r\nNote: 2nd hand Company-used Laptops. PRESENTABLE UNITS.', 'product9.jpg', 'nec, core', '', 'Recommended'),
(25, 2, 3, 'HP Intel Corei5 8GB RAM/120GB SSD', '13,600.00', 7, 'CPU: Intel corei5 2.3GHz (5th Gen)\r\nMemory: 8GB (upgradable to 16GB)\r\nStorage: 120GB SSD (upgradable)\r\n\r\n- with built-in cam\r\n- no bluetooth but pwede po kabitan ng bluetooth dongle\r\n\r\nWarranty: 3 Months', 'product7.jpg', 'hp, core', '', 'Recommended'),
(26, 2, 2, 'Toshiba R732 Intel Corei5', '9,500.00', 5, 'CPU: Intel corei5 2.6GHz\r\nMemory: 4GB DDR3\r\nStorage: 320GB HDD\r\nDisplay: 13 INCH DISPLAY \r\nBattery: 2-3 hrs.\r\n\r\n- With VGA port\r\n- With HDMI port\r\n- With USB port\r\n- With SATA port\r\n- With DVD port\r\n', 'product10.jpg', 'toshiba, core', '', 'Recommended'),
(27, 3, 4, 'Fujitso Intel Celeron 4GB RAM/250GB HDD', '5,500.00', 7, 'Sakto sa students and professionals ito. Budget meal\r\nNot for gaming po.\r\n\r\nCPU: Intel Celeron 1.2GHz\r\nMemory: 4GB\r\nStorage: 250GB HDD\r\nOperating System: windows 10\r\nDisplay: 12 inch display\r\nBattery: GOOD\r\nLightweight UNIT\r\n\r\n- With USB ports\r\n- With VGA port\r\n- No cam\r\n- No bluetooth\r\n- With external wifi receiver\r\n\r\nApplications installed: \r\nMicrosoft Office 2013 (activated)\r\nVLC media player\r\nWinrar archiver\r\nSmadav antivirus\r\nGoogle Chrome', 'product8.jpg', 'fujitso, celeron', '', 'Recommended'),
(29, 3, 2, 'Toshiba Dynabook B450/C', '7,500.00', 3, 'Toshiba Dynabook B450/C Notebook Laptop \r\n\r\nCPU: Intel Celeron 925 2.29ghz \r\nMemory: 4GB RAM DDR3\r\nStorage: 120GB SSD Storage\r\nGraphics: Intel HD Graphics\r\nDisplay: 15.6\" inch Screen Size\r\nOS: Windows 10 with MS office 2019\r\n\r\n- USB port 2.0\r\n- 1* VGA Video output\r\n- Headphone Jack\r\n- Ethernet Port\r\n- DVD Rom\r\n- Wifi Ready\r\n- Up to 30mins or up to 1hr batt life depende sa usage normal on pre-owned laptop\r\n- No built in Camera and Bluetooth\r\n- Ready to use\r\n\r\nInclusions :\r\nFREE laptop bag and charger\r\nWifi Dongle\r\nFREE Mouse & mouse pad, FREE MOVIES', 'product12.jpg', 'toshiba', '', 'Recommended'),
(30, 3, 2, 'Toshiba B45/B Intel Celeron', '9,700.00', 3, 'Manipis pero malapad gusto mo? \r\nSLIM TYPE Laptop! \r\nMatagal malowbat\r\n\r\nModel: Toshiba B45/B\r\nProcessor: Intel Celeron 1.6GHz \r\nMemory/RAM: 4GB\r\nStorage: 120GB SSD\r\nBluetooth: Yes\r\nScreen size: 15.6inch\r\nWiFi: yes (Dual Band): 2.4GHz & 5GHz \r\nNumeric pad: Yes\r\nDVD-ROM: yes\r\nBattery life: 2-3 hrs. (heavy active use)\r\nUSB ports: 4, yes \r\nVGA port: yes\r\nHDMI port: yes\r\nLAN port: yes\r\n\r\nInclusions: \r\nFree Bag\r\nFree external Cam\r\nCharger\r\n\r\nWarranty: 2 Months', 'product11.jpg', 'toshiba, celeron', '', 'Recommended');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `review_image` text NOT NULL,
  `date` date NOT NULL,
  `comments` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `review_detail` varchar(1000) NOT NULL,
  `facebook_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `review_image`, `date`, `comments`, `username`, `product_name`, `review_detail`, `facebook_link`) VALUES
(1, 'r1.jpg', '2022-11-10', '', 'Jason Ababao', 'NEC Intel Celeron 3855U', 'Client from Cam sur, Mr. Jason Ababao. Konting story lng, nakailang bili na to si lodi jason 😅, 3 laptops 1 voucher-type na pisowifi if I remember correctly. Salamat padz', 'https://www.facebook.com/photo/?fbid=523133009829762&set=pb.100063992012550.-2207520000.'),
(2, 'r2.jpg', '2022-11-10', '', 'Cresol Sajuela', 'NEC Intel Celeron 3855U', 'Client, Teacher from Itaran National Highschool Polangui , Mr. Cresol Sajuela. salamuch! 👍✌️', 'https://www.facebook.com/photo/?fbid=523128476496882&set=pb.100063992012550.-2207520000.'),
(3, 'r3.jpg', '2022-11-07', '', 'Lalaine Mendevil', 'NEC Intel Celeron 3855U', 'Client, student from DCOMC, Ms. Lalaine Mendevil. Salamuch! 👍:)', 'https://www.facebook.com/photo.php?fbid=520870080056055&set=pb.100063992012550.-2207520000.'),
(4, 'r4.jpg', '2022-11-07', '', 'Emel Reñevo', 'NEC Intel Celeron 3855U', 'Client from Legazpi City, DCOMC student, Mr. Emel Reñevo. salamuch lodi! 👍', 'https://www.facebook.com/photo/?fbid=520779703398426&set=pb.100063992012550.-2207520000.'),
(5, 'r6.jpg', '2022-10-26', '', 'Mark John Espinas', 'NEC Intel Celeron 3855U', 'Client, B.U student from Pio Duran, Albay, Mr. Mark John Espinas, salamat lodi! 😁👍', 'https://www.facebook.com/photo/?fbid=5559913830769557&set=pb.100063992012550.-2207520000.'),
(6, 'r7.jpg', '2022-10-22', '', 'Jay Mark Baynado', 'HP Intel Corei5', 'Client from Libon, soon to be Engr. , Mr. Jay Mark Baynado. Slamat lods 👍😁', 'https://www.facebook.com/photo/?fbid=5549231445171129&set=pb.100063992012550.-2207520000.'),
(7, 'r8.jpg', '2022-10-21', '', 'Lito Nograles', 'NEC Intel Celeron 3855U', 'Client from Bogtong Legazpi City, Mr. Lito Nograles. salamat sa pasoftdrinks at small talk sir 😁🥳', 'https://www.facebook.com/YzElectronics/photos/pb.100063992012550.-2207520000./5545689782191962'),
(8, 'r9.jpg', '2022-10-19', '', 'Harley Christian Avenilla', 'HP Intel Corei5', 'Client from Sorsogon, Mr. Harley Christian Avenilla, salamuch po!', 'https://www.facebook.com/photo/?fbid=5539931596101114&set=pb.100063992012550.-2207520000.');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(1, 'Christine', 'Randolph', 'randolphc@gmail.com', '25f9e794323b453885f5181f1b624d0b', '8389080183', '2133  Hill Haven Drive', 'Terra Stree'),
(2, 'Will', 'Willams', 'willainswill@gmail.com', '25f9e794323b453885f5181f1b624d0b', '8389080183', '4567  Orphan Road', 'WI'),
(3, 'Demo', 'Name', 'demo@gmail.com', 'password', '9876543210', 'demo ad1', 'ademo ad2'),
(5, 'Steeve', 'Rogers', 'steeve1@gmail.com', '305e4f55ce823e111a46a9d500bcb86c', '9876547770', '573  Pinewood Avenue', 'MN'),
(6, 'Melissa', 'Gilbert', 'gilbert@gmail.com', '305e4f55ce823e111a46a9d500bcb86c', '7845554582', '1711  McKinley Avenue', 'MA'),
(7, 'niel', 'legaspi', 'acosta.barbhea3yr@gmail.com', '7782119a3bcd64bc7de9fd9693f727ed', '1234567890', '345345', '43554'),
(8, 'Niel', 'Legaspi', 'sdfsd@gmail.com', '7782119a3bcd64bc7de9fd9693f727ed', '0987654321', '232', '32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_product_cat` (`product_cat`),
  ADD KEY `fk_product_brand` (`product_brand`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_brand` FOREIGN KEY (`product_brand`) REFERENCES `brands` (`brand_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_product_cat` FOREIGN KEY (`product_cat`) REFERENCES `categories` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
