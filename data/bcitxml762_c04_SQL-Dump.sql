-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2014 at 07:59 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bcitx762_c04`
--

-- --------------------------------------------------------

--
-- Table structure for table `attraction`
--

CREATE TABLE IF NOT EXISTS `attraction` (
`id` int(11) NOT NULL,
  `category` varchar(8) NOT NULL,
  `link` varchar(20) NOT NULL,
  `caption` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `location` varchar(20) NOT NULL,
  `price` decimal(8,2) NOT NULL DEFAULT '0.00',
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(50) NOT NULL,
  `subimg1` varchar(50) NOT NULL,
  `subimg2` varchar(50) NOT NULL,
  `subimg3` varchar(50) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `attraction`
--

INSERT INTO `attraction` (`id`, `category`, `link`, `caption`, `description`, `location`, `price`, `dateAdded`, `image`, `subimg1`, `subimg2`, `subimg3`) VALUES
(1, 'eat', '/eat/1', 'Lindenhofkeller: Wine Lovers Sanctuary', 'If you like to fine food and sumptious wine, then you are in right place in Lindenhofkeller. Since 1860, the restaurant Gastronomic delights high above the Limmat. Since 1996, it is the culinary skills of René K. Hofer, that lures daily business people, tourists and wine lovers in cozy Lindenhofkeller.', 'Zurich', '69.99', '2014-09-25 00:00:00', 'restaurant.jpg', 'lindenhofkeller1.jpg', 'lindenhofkeller2.jpg', 'lindenhofkeller3.jpg'),
(2, 'sleep', '/sleep/2', 'Leoneck Hotel: The Centre of Zurich', 'The Leoneck Hotel is furnished in original Ethno style and located in a prime location in the centre of Zurich City. In just six minutes, you can walk to the main train station, the shopping area, the banking district, the university, and the hospitals.', 'Zurich City', '169.99', '2014-08-29 00:00:00', 'sleep.jpg', 'leoneck1.jpg', 'leoneck2.jpg', 'leoneck3.jpg'),
(3, 'play', '/play/3', 'Felseneggs Cableway: Skyview of Zurich', 'From Adliswil, just outside Zurich in the Sihl Valley, you get to Felsenegg with the one and only public cableway in canton Zurich, which is part of the Zurich agglomerative transport association. From the restaurant terrace you enjoy sweeping views over the city of Zurich and its lake – and a beautiful sea of lights by night.', 'Sihl Valley, Adliswi', '89.99', '2014-09-28 00:00:00', 'attractions.jpg', 'fel1.jpg', 'fel2.jpg', 'fel3.jpg'),
(4, 'eat', '/eat/4', 'Metropol: Cafe with a Terrace', 'In every METROPOLis around the world, whether New York, Paris, London or Amsterdam, there is always one special place link you like to go. That is also the case in Zurich.The neo-baroque building located between the Limmat and the Bahnhofstrasse is home to a cafe with a terrace, a and the METROPOL restaurant. In the morning, this is the perfect place to enjoy a cup of coffee and read the newspaper in peace or enjoy a delicious breakfast. Our special club sandwich, healthy salads or even Wiener Schnitzel are available at lunch and throughout the restof the day. Early in the evening, the bar fills with people having an after-work cocktail.', 'Zurich', '49.99', '2014-09-21 00:00:00', 'metropol.jpg', 'metropol1.jpg', 'metropol2.jpg', 'metropol3.jpg'),
(5, 'play', '/play/5', 'Polybahn: The Emblem of Zurich', 'Initially the service was powered by water-weights, like that of Berne and still today in Freiburg, althoughin Zurich the service was soon to be powered by electricity.&nbsp In 1976, saved on the last bell thanks tothe support of a Swiss bank, the historic Polybahn was subject to comprehensive revision back in 1996. Today it’s fitted with state-of-the-art technics - and the mountain station boasts the same original red colour of its original beginnings since 2001.', 'Freiburg, Zurich', '29.99', '2014-10-01 00:00:00', 'polybahn.jpg', 'poly1.jpg', 'poly2.jpg', 'poly3.jpg'),
(6, 'sleep', '/sleep/6', 'Hotel Alexander: The Heart of Zurich', 'In the immediate vicinity of the hotels are located next to Zurichs most famous landmark and the business and financial district, the shopping mile Bahnhofstrasse, Zurichs university district of ETH / Uni, the car-free lake and river promenade, the Messe Zurich as well as a variety of cafes, bars and restaurants.', 'Bahnhofstrasse, Zuri', '149.99', '2014-10-02 00:00:00', 'alex.jpg', 'alex1.jpg', 'alex2.jpg', 'alex3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('9d75572f52231330c56b4efb15a4af44', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:33.0) Gecko/20100101 Firefox/33.0', 1414997337, 'a:1:{s:4:"item";a:12:{s:2:"id";s:1:"6";s:8:"category";s:1:"0";s:4:"link";s:8:"/sleep/6";s:7:"caption";s:36:"Hotel Alexander: The Heart of Zurich";s:11:"description";s:301:"In the immediate vicinity of the hotels are located next to Zurichs most famous landmark and the business and financial district, the shopping mile Bahnhofstrasse, Zurichs university district, the car-free lake and river promenade, the Messe Zurich as well as a variety of cafes, bars and restaurants.";s:8:"location";s:20:"Bahnhofstrasse, Zuri";s:5:"price";s:6:"149.99";s:9:"dateAdded";s:19:"2014-10-01 17:00:00";s:5:"image";s:8:"alex.jpg";s:7:"subimg1";s:9:"alex1.jpg";s:7:"subimg2";s:9:"alex2.jpg";s:7:"subimg3";s:9:"alex3.jpg";}}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attraction`
--
ALTER TABLE `attraction`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD PRIMARY KEY (`session_id`), ADD KEY `last_activity_idx` (`last_activity`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attraction`
--
ALTER TABLE `attraction`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

