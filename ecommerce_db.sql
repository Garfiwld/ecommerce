-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2018 at 01:24 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`) VALUES
(1, 'Levis'),
(2, 'Nike'),
(3, 'Polo'),
(5, 'Sketchers'),
(24, '999999'),
(25, '888888'),
(26, '77777');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `UserID` int(3) UNSIGNED ZEROFILL NOT NULL,
  `Username` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `Password` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `Name` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `Status` enum('ADMIN','USER') COLLATE utf8_croatian_ci NOT NULL DEFAULT 'USER'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`UserID`, `Username`, `Password`, `Name`, `Status`) VALUES
(010, 'q', 'q', 'q', 'USER'),
(002, 'z', 'z', 'Admin Account', 'ADMIN'),
(005, 'b', 'b', 'b', 'USER'),
(004, 'aaa', 'aaa', 'aaa', 'USER'),
(006, 'a', 'a', 'aa', 'USER'),
(007, 'asa', 'asa', 'asas', 'USER'),
(008, 'qwqw', 'qwqw', 'qwqw', 'USER'),
(009, 'aa', 'a', 'aaa', 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `brand`, `image`, `description`, `price`) VALUES
(1, 'Levis Jeans', 1, '/ecommerce/images/products/d72974f3c25200968c4900422f667bb3.jpeg', 'These jeans are amazing. They are super comfy and sexy! Buy them.', 10.99),
(2, 'Beautiful Shirt', 1, '/ecommerce/images/products/9e5a55aceaaedfca21e15cf2fef22d6e.png', 'What a beautiful blue colored polo-shirt.', 555.5),
(25, 'qqqqqqqqqq', 26, '/ecommerce/images/products/f08594fb63930d5ac24d1124921b43fa.png', 'qqqqqqqqqqqqqqqq', 0),
(26, '5555555555', 2, '/ecommerce/images/products/4b648e85fe32bfdc69a50e101fd29892.jpeg', '55555555', 0),
(28, 'tttttttt', 1, '/ecommerce/images/products/4bf0b5b131c93d923d51a80ced9341a2.png', 'ttttttttttttttttttttttttttttttttt', 0),
(29, 'eeeeeeeeee', 3, '/ecommerce/images/products/1124f6607a51166a117086aab39eb9b7.jpg', 'eeeeeeeeeeeeee', 0),
(30, 'ssssssssss', 24, '/ecommerce/images/products/60ae2fdb119d841ac32cc55002d0d882.png', 'sssssssssssssssssssss', 0),
(32, 'qqqqqqqqqq', 1, '/ecommerce/images/products/ba1c7e64bfebb760901616a060cc43e9.png', 'jjjjjjjjjj', 0),
(34, '1111111', 24, '/ecommerce/images/products/e52f6c420436db9b93d8d67da1daa0ad.png', '11111111111', 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `UserID` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
