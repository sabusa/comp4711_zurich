/*
-- Query For Creating the main table for our Zurich website
-- 
-- Date: 2014-11-01
-- Author: Jason Roque & Sandra Buchanan
*/

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


--
-- Database: `bcitx762_c04`
--

-- --------------------------------------------------------

--
-- Table structure for table `attraction`
--

CREATE TABLE IF NOT EXISTS `attraction` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `category` VARCHAR(8) NOT NULL,
  `link` VARCHAR(20) NOT NULL,
  `caption` VARCHAR(100) NOT NULL,
  `description` VARCHAR(1000) NOT NULL,
  `location` VARCHAR(20) NOT NULL,
  `price` DECIMAL(8,2) NOT NULL DEFAULT 0.00,
  `dateAdded` TIMESTAMP NOT NULL DEFAULT NOW(),
  `image` VARCHAR(50) NOT NULL,
  `subimg1` VARCHAR(50) NOT NULL,
  `subimg2` VARCHAR(50) NOT NULL,
  `subimg3` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM DEFAULT CHARSET=utf8;


/*
-- Query For Inserting Initial Data Into the Attraction Table
-- Date: 2014-11-01
-- Author: Jason Roque & Sandra Buchanan
*/
INSERT INTO `attraction`
    VALUES(1, 
           'eat', 
           '/eat/1', 
           'Lindenhofkeller: Wine Lovers Sanctuary',
           'If you like to eat and drink this wine, then you are in Lindenhofkeller to the right place. Since 1860, the restaurant Gastronomic delights high above the Limmat. Since 1996, it is mainly the cooking skills of René K. Hofer , the lure daily business people, tourists and wine lovers in the cozy Lindenhofkeller. Please note that for groups of 7 or a menu choice is imperative.',
           'Zurich',
           69.99,
           '2014/09/25',
           'restaurant.jpg',
           'lindenhofkeller1.jpg',
           'lindenhofkeller2.jpg',
           'lindenhofkeller3.jpg');
INSERT INTO `attraction`
    VALUES(2, 
           'sleep', 
           '/sleep/2', 
           'Leoneck Hotel: The Centre of Zurich',
           'The Leoneck Hotel is furnished in original Ethno style and located in a prime location in the centre of Zurich City. In just six minutes, you can walk to the main train station, the shopping area, the banking district, the university, and the hospitals.',
           'Zurich City',
           169.99,
           '2014/08/29',
           'sleep.jpg',
           'leoneck1.jpg',
           'leoneck2.jpg',
           'leoneck3.jpg');
INSERT INTO `attraction`
    VALUES(3, 
           'play', 
           '/play/3', 
           'Felseneggs Cableway: Skyview of Zurich',
           'From Adliswil, just outside Zurich in the Sihl Valley, you get to Felsenegg with the one and only public cableway in canton Zurich, which is part of the Zurich agglomerative transport association. From the restaurant terrace you enjoy sweeping views over the city of Zurich and its lake – and a beautiful sea of lights by night.',
           'Sihl Valley, Adliswil',
           89.99,
           '2014/09/28',
           'attractions.jpg',
           'fel1.jpg',
           'fel2.jpg',
           'fel3.jpg');
INSERT INTO `attraction`
    VALUES(4, 
           'eat', 
           '/eat/4', 
           'Metropol: Cafe with a Terrace',
           'In every METROPOLis around the world, whether New York, Paris, London or Amsterdam, there is always one special place link you like to go. That is also the case in Zurich.The neo-baroque building located between the Limmat and the Bahnhofstrasse is home to a cafe with a terrace, a and the METROPOL restaurant. In the morning, this is the perfect place to enjoy a cup of coffee and read the newspaper in peace or enjoy a delicious breakfast. Our special club sandwich, healthy salads or even Wiener Schnitzel are available at lunch and throughout the restof the day. Early in the evening, the bar fills with people having an after-work cocktail.',
           'Zurich',
           49.99,
           '2014/09/21',
           'metropol.jpg',
           'metropol1.jpg',
           'metropol2.jpg',
           'metropol3.jpg');
INSERT INTO `attraction`
    VALUES(5, 
           'play', 
           '/play/5', 
           'Polybahn: The Emblem of Zurich',
           'Initially the service was powered by water-weights, like that of Berne and still today in Freiburg, althoughin Zurich the service was soon to be powered by electricity.&nbsp In 1976, saved on the last bell thanks tothe support of a Swiss bank, the historic Polybahn was subject to comprehensive revision back in 1996. Today it’s fitted with state-of-the-art technics - and the mountain station boasts the same original red colour of its original beginnings since 2001.',
           'Freiburg, Zurich',
           29.99,
           '2014/10/01',
           'polybahn.jpg',
           'poly1.jpg',
           'poly2.jpg',
           'poly3.jpg');
INSERT INTO `attraction`
    VALUES(6, 
           'sleep', 
           '/sleep/6', 
           'Hotel Alexander: The Heart of Zurich',
           'In the immediate vicinity of the hotels are located next to Zurichs most famous landmark and the business and financial district, the shopping mile Bahnhofstrasse, Zurichs university district of ETH / Uni, the car-free lake and river promenade, the Messe Zurich as well as a variety of cafes, bars and restaurants.',
           'Bahnhofstrasse, Zurich',
           149.99,
           '2014/10/02',
           'alex.jpg',
           'alex1.jpg',
           'alex2.jpg',
           'alex3.jpg');
           
    