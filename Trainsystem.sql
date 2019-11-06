-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2019 at 02:19 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trainsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`uid`, `pid`, `number`) VALUES
(38, 38, 2),
(38, 39, 2),
(30, 44, 2),
(31, 44, 2),
(31, 45, 2),
(31, 38, 2),
(33, 38, 2),
(33, 40, 2),
(35, 42, 2),
(35, 43, 2),
(36, 44, 2),
(36, 45, 2);

-- --------------------------------------------------------

--
-- Table structure for table `catalogue`
--

CREATE TABLE `catalogue` (
  `pid` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dstart` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dfinish` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tstart` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tfinish` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `number` int(11) NOT NULL,
  `price` double NOT NULL,
  `desc` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catalogue`
--

INSERT INTO `catalogue` (`pid`, `name`, `dstart`, `dfinish`, `tstart`, `tfinish`, `number`, `price`, `desc`) VALUES
(38, 'Blagoevgrad to Sofia', 'Blagoevgrad, Bulgari', 'Sofia, Bulgaria', '2019-11-07 11:30:00', '2019-11-07 13:00:00', 50, 5.5, 'Bus leaving from Blagoevgrad, arriving in Central Bus-station, Sofia'),
(39, 'Plovdiv to Sofia', 'Plovdiv, Bulgaria', 'Sofia, Bulgaria', '2019-11-26 11:30:00', '2019-11-26 13:00:00', 60, 10, 'Bus leaving from Plovdiv, arriving in Central Bus-station, Sofia'),
(40, 'Sofia to Blagoevgrad', 'Sofia, Bulgaria', 'Blagoevgrad, Bulgari', '2019-11-27 13:00:00', '2019-11-27 14:30:00', 50, 5.5, 'Bus leaving from Sofia Central Bus-Station, arriving in Blagoevgrad'),
(41, 'Sofia to Plovdiv', 'Sofia, Bulgaria', 'Plovdiv, Bulgaria', '2019-11-27 13:30:00', '2019-11-27 15:00:00', 60, 11, 'Bus leaving from Sofia Central Bus-Station, arriving in Plovdiv'),
(42, 'Varna to Sofia', 'Varna, Bulgaria', 'Sofia, Bulgaria', '2019-12-03 10:30:00', '2019-12-03 18:00:00', 60, 20.5, 'Bus leaving from Varna, arriving in Central Bus-station, Sofia'),
(43, 'Sofia to Varna', 'Sofia, Bulgaria', 'Varna, Bulgaria', '2019-12-04 10:30:00', '2019-12-04 18:30:00', 60, 20, 'Bus leaving from Sofia Central Bus-Station, arriving in Varna'),
(44, 'Burgas to Sofia', 'Burgas, Bulgaria', 'Sofia, Bulgaria', '2019-12-06 10:30:00', '2019-12-06 18:00:00', 50, 10, 'Bus leaving from Burgas, arriving in Central Bus-station, Sofia'),
(45, 'Sofia to Burgas', 'Sofia, Bulgaria', 'Burgas, Bulgaria', '2019-12-07 10:10:00', '2019-12-07 19:00:00', 60, 20, 'Bus leaving from Sofia Central Bus-Station, arriving in Burgas');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `email` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(42) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `email`, `password`, `address`) VALUES
(30, 'Johndoe@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', '101 John Doe St., John Does City, John Doe Country'),
(31, 'Janedoe@yahoo.com', 'ae2b1fca515949e5d54fb22b8ed95575', '102 Jane Doe St., Jane Doe City, Jane Doe Country'),
(33, 'lyubo.valkov@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', '27 Maritsa St., Ent. B, Fl. 2, Ap. 5, Blagoevgrad, Bulgaria'),
(34, 'root@root.root', '63a9f0ea7bb98050796b649e85481845', 'root'),
(35, 'sitikash@awel.icu', 'ae2b1fca515949e5d54fb22b8ed95575', '4212 Hessel Island Apt. 793 Gleichnershire, AL, USA'),
(36, 'mfitcher@z-mail.cf', 'ae2b1fca515949e5d54fb22b8ed95575', '1618 Kessler Flats Suite 074 North Lincoln, ME, USA'),
(38, 'a', 'ae2b1fca515949e5d54fb22b8ed95575', 'testing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `uid` (`uid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `catalogue`
--
ALTER TABLE `catalogue`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catalogue`
--
ALTER TABLE `catalogue`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `Cart_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `catalogue` (`pid`),
  ADD CONSTRAINT `Cart_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
