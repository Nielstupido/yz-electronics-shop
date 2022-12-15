-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 06:08 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
(9, 'Gairus', 'nielstupidity@gmail.com', '$2y$10$Gl6C/lFSKrzTC5Rn4IpdUO9lpc6VfsjERKmRMXRRsN1LfqvsH0cse', '0'),
(10, 'niel', 'acosta.barbhea3yr@gmail.com', '$2y$10$vw2BSnmwCX/LcwxlslFFI.il/AR6TCYmz7RyvUL6JZEN/L3FmtBai', '0');

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
(2, 'Toshiba'),
(3, 'HP'),
(4, 'Fujitso'),
(11, 'dfsdf');

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
(84, 2, '::1', 8, 1),
(85, 22, '::1', 8, 1),
(86, 23, '::1', 8, 1);

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
(2, 'sdfdffff'),
(3, 'Celeron'),
(16, 'fdgdfg');

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
(26, 8, 2, 1, 'src_jaPGJaFBaoTcfDCjWP9NfN4p', 'Completed'),
(27, 8, 22, 1, 'src_jaPGJaFBaoTcfDCjWP9NfN4p', 'Completed');

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
(2, 2, 3, 'HP Intel Corei5 5300U 8GB RAM/120GB SSD', '13,600.00', 7, 'HP Laptop. \r\nPwede sa mga programming students at nag wowork from home (WFH)\r\nWarranty: 3 months\r\n\r\nCPU: Intel Corei5 5300u 2.3GHz 5th generation\r\nMemory: 8GB\r\nStorage: 120GB SSD\r\nDisplay: 12.5-inch screen size\r\nBattery: 2-3 hrs. (Rough estimate)\r\n\r\n- With built-in cam\r\n- With built-in wifi (dual band)\r\n- With built-in cam\r\n- With VGA port\r\n- With USB ports (3)\r\n- With LAN port\r\n- Backlit keyboard\r\n\r\nNo Bluetooth, pwede kabitan ng dongle\r\nNo DVD ROM\r\nNo HDMI port\r\n\r\nFREEBIES:\r\n- Mouse \r\n- Bag\r\n- Movies', 'product2.jpg', 'hp, core, with freebies', 'Featured-ALL', ''),
(11, 16, 11, 'sadfsdf', '34', 3, 'sdfsdf', 'asdf', 'asdf', 'asdf', 'sdf'),
(22, 2, 4, 'Fujitso Intel Corei5 8GB RAM/240GB SSD', '20,000.00', 7, 'Sa mga nagwowork from home na need ng high specs unit.\r\n2ND HAND OFFICE USED. HINDI PO ITO BRANDNEW.\r\n\r\nQuick specs:\r\n\r\nCPU: Intel Corei5 6th Gen 3.0 GHz processor\r\nMemory: 8GB\r\nStorage: 240GB SSD (Much faster than HDD)\r\n\r\n- With Bluetooth\r\n- With Built-in webcam\r\n- With WIFI\r\n- Good Batt.', 'product6.jpg', 'hp, core, students', 'Featured-ALL', ''),
(23, 2, 2, 'Toshiba Intel Corei3 8GB RAM/256GB SSD', '11,500.00', 3, 'LIMITED STOCKS!\nToshiba laptops\n\nPrice: 11,500 Pesos\nWarranty: 3 Months \nNote: These are 2nd hand units, expect some minor scratches or hairlines sa case.\n\nQuick specs:\n\nCPU: Intel Corei3 2.0GHz (6th Generation)\nMemory: 8GB RAM\nStorage: 256GB SSD\nOperating system: Windows 10\n\n- FULL SIZE KEYBOARD (W/ numpad)\n- With DVD ROM\n- Dual-band wifi (built-in)\n- With vga and hdmi ports\n- With bluetooth\n- With builtin camera\n- 15.6-inch wide display\n- 1366x768 resolution\n- 2-3 hrs. Batt. Life\n- 4 USB ports\n\nFREEBIES: USB Mouse, Bag, Movies', 'product5.jpg', 'toshiba, core, with freebies', 'Featured-ALL', ''),
(25, 2, 3, 'HP Intel Corei5 8GB RAM/120GB SSD', '13,600.00', 7, 'CPU: Intel corei5 2.3GHz (5th Gen)\r\nMemory: 8GB (upgradable to 16GB)\r\nStorage: 120GB SSD (upgradable)\r\n\r\n- with built-in cam\r\n- no bluetooth but pwede po kabitan ng bluetooth dongle\r\n\r\nWarranty: 3 Months', 'product7.jpg', 'hp, core', '', 'Recommended'),
(26, 2, 2, 'Toshiba R732 Intel Corei5', '9,700.00', 5, 'CPU: Intel corei5 2.6GHz\r\nMemory: 4GB DDR3\r\nStorage: 320GB HDD\r\nDisplay: 13 INCH DISPLAY \r\nBattery: 2-3 hrs.\r\n\r\n- With VGA port\r\n- With HDMI port\r\n- With USB port\r\n- With SATA port\r\n- With DVD port\r\n', 'product10.jpg', 'toshiba, core', '', 'Recommended'),
(27, 3, 4, 'Fujitso Intel Celeron 4GB RAM/250GB HDD', '5,500.00', 7, 'Sakto sa students and professionals ito. Budget meal\r\nNot for gaming po.\r\n\r\nCPU: Intel Celeron 1.2GHz\r\nMemory: 4GB\r\nStorage: 250GB HDD\r\nOperating System: windows 10\r\nDisplay: 12 inch display\r\nBattery: GOOD\r\nLightweight UNIT\r\n\r\n- With USB ports\r\n- With VGA port\r\n- No cam\r\n- No bluetooth\r\n- With external wifi receiver\r\n\r\nApplications installed: \r\nMicrosoft Office 2013 (activated)\r\nVLC media player\r\nWinrar archiver\r\nSmadav antivirus\r\nGoogle Chrome', 'product8.jpg', 'fujitso, celeron', '', 'Recommended'),
(29, 3, 2, 'Toshiba Dynabook B450/C', '7,500.00', 3, 'Toshiba Dynabook B450/C Notebook Laptop \r\n\r\nCPU: Intel Celeron 925 2.29ghz \r\nMemory: 4GB RAM DDR3\r\nStorage: 120GB SSD Storage\r\nGraphics: Intel HD Graphics\r\nDisplay: 15.6\" inch Screen Size\r\nOS: Windows 10 with MS office 2019\r\n\r\n- USB port 2.0\r\n- 1* VGA Video output\r\n- Headphone Jack\r\n- Ethernet Port\r\n- DVD Rom\r\n- Wifi Ready\r\n- Up to 30mins or up to 1hr batt life depende sa usage normal on pre-owned laptop\r\n- No built in Camera and Bluetooth\r\n- Ready to use\r\n\r\nInclusions :\r\nFREE laptop bag and charger\r\nWifi Dongle\r\nFREE Mouse & mouse pad, FREE MOVIES', 'product12.jpg', 'toshiba', '', 'Recommended'),
(30, 3, 2, 'Toshiba B45/B Intel Celeron', '9,500.00', 3, 'Manipis pero malapad gusto mo? \r\nSLIM TYPE Laptop! \r\nMatagal malowbat\r\n\r\nModel: Toshiba B45/B\r\nProcessor: Intel Celeron 1.6GHz \r\nMemory/RAM: 4GB\r\nStorage: 120GB SSD\r\nBluetooth: Yes\r\nScreen size: 15.6inch\r\nWiFi: yes (Dual Band): 2.4GHz & 5GHz \r\nNumeric pad: Yes\r\nDVD-ROM: yes\r\nBattery life: 2-3 hrs. (heavy active use)\r\nUSB ports: 4, yes \r\nVGA port: yes\r\nHDMI port: yes\r\nLAN port: yes\r\n\r\nInclusions: \r\nFree Bag\r\nFree external Cam\r\nCharger\r\n\r\nWarranty: 2 Months', 'product11.jpg', 'toshiba, celeron', '', 'Recommended'),
(123, 16, 4, 'asdf', '123', 3, 'asdfsdf', 'asdfa', 'adf', 'asdf', 'adf'),
(231, 2, 4, 'saf', '23', 1, 'sdf', 'asdf', 'adf', 'adf', 'adf'),
(232, 2, 11, 'asdfd', '23', 2, 'asdf', 'asdf', 'sadfasdf', 'asdfasd', 'fasdf'),
(3412, 3, 3, 'sadf', '3', 3, 'sdf', 'sdfsdf', 'asdf', 'asdf', 'asdf'),
(3421, 3, 11, 'sadfasdf', '341', 3, 'asdf', 'asdfasdf', 'asdf', 'asdfas', 'dfasdf');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `product_id` int(5) NOT NULL,
  `stars_number` int(11) NOT NULL,
  `date_review` varchar(20) NOT NULL,
  `comments` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `product_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `product_id`, `stars_number`, `date_review`, `comments`, `username`, `product_name`) VALUES
(1, 0, 0, '2022-11-10', '', 'Jason Ababao', 'NEC Intel Celeron 3855U'),
(33, 2, 1, '12.11.22', '                                                Share your thoughts on the product to help other buyers.\n                                            ', 'Niel', 'HP Intel Corei5 5300U 8GB RAM/120GB SSD');

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
(8, 'Niel', 'Legaspi', 'sdfsd@gmail.com', '7782119a3bcd64bc7de9fd9693f727ed', '0987654321', 'Galutan, Domorog, Cataingan, Masbate 5405', '32'),
(9, 'mep', 'le', 'le@gmail.com', '11a700d7275839a03fe4cac042a84663', '0987654321', 'SDFSDFSDF', 'DSF');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3422;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
