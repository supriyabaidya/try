-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2017 at 05:57 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `server_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_credentials`
--

CREATE TABLE `login_credentials` (
  `id` varchar(6) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_credentials`
--

INSERT INTO `login_credentials` (`id`, `username`, `password`) VALUES
('u001', 'tom', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productid` varchar(10) NOT NULL,
  `productname` varchar(60) NOT NULL,
  `productimage` varchar(100) DEFAULT NULL,
  `productprice` int(11) NOT NULL,
  `productdesc` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productid`, `productname`, `productimage`, `productprice`, `productdesc`) VALUES
('p001', 'nokia 6', 'p001.jpg', 14999, 'This is second android smartphone by Nokia .'),
('p002', 'lg q6', 'p002.jpg', 14999, 'Lg q6 is FullVision phone with Bezel less display.'),
('p003', 'corsair 8gb ram', 'p003.jpg', 6000, 'corsair 8gb ddr3 RAM 1600 MHz.Its Vengence.'),
('p004', 'Happyness', 'p004.jpg', 0, 'Selling Happyness for free, you need to apply a promo code'),
('p005', 'nokia 3', 'p005.jpg', 9499, 'This is the first nokia branded android smart phone.This flagship phone is made by HMD Global.'),
('p006', 'nokia 5', 'p006.jpg', 12000, 'The second android phone of nokia .');

-- --------------------------------------------------------

--
-- Table structure for table `synonym`
--

CREATE TABLE `synonym` (
  `word` varchar(30) NOT NULL,
  `synonyms` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `visitor_comment` text NOT NULL,
  `id` int(11) NOT NULL,
  `visitor_ip` varchar(256) NOT NULL,
  `visitor_city` varchar(64) NOT NULL,
  `visitor_state` varchar(64) NOT NULL,
  `visitor_country` varchar(64) NOT NULL,
  `visitor_browser` varchar(64) NOT NULL,
  `visitor_OS` varchar(64) NOT NULL,
  `visitor_date` varchar(256) NOT NULL,
  `visitor_day` tinyint(2) NOT NULL,
  `visitor_month` tinyint(2) NOT NULL,
  `visitor_year` int(11) NOT NULL,
  `visitor_hour` tinyint(2) NOT NULL DEFAULT '0',
  `visitor_minute` tinyint(2) NOT NULL DEFAULT '0',
  `visitor_seconds` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`visitor_comment`, `id`, `visitor_ip`, `visitor_city`, `visitor_state`, `visitor_country`, `visitor_browser`, `visitor_OS`, `visitor_date`, `visitor_day`, `visitor_month`, `visitor_year`, `visitor_hour`, `visitor_minute`, `visitor_seconds`) VALUES
('This is my first comment .', 1, 'localhost36', 'kolkata', 'WB', 'India', 'WebKit', 'Windows 7', '17/09/17 11:38:15 pm Asia/Kolkata', 17, 9, 2017, 23, 38, 15),
('this is 2nd', 2, 'localhost18', 'kolkata', 'WB', 'India', 'WebKit', 'Windows 7', '17/09/17 11:45:37 pm Asia/Kolkata', 17, 9, 2017, 23, 45, 37),
('trying fdfh 9+41854194 dhgdfgd 489484651566548541658 dhfhfdhhdfffffffffffh', 3, 'localhost25', 'kolkata', 'WB', 'India', 'WebKit', 'Windows 7', '18/09/17 8:25:15 am Asia/Kolkata', 18, 9, 2017, 8, 25, 15),
('last until now', 4, 'localhost60', 'kolkata', 'WB', 'India', 'WebKit', 'Windows 7', '18/09/17 8:26:06 am Asia/Kolkata', 18, 9, 2017, 8, 26, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_credentials`
--
ALTER TABLE `login_credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `synonym`
--
ALTER TABLE `synonym`
  ADD PRIMARY KEY (`word`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
