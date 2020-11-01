-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2018 at 01:48 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cmsys-login-registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL,
  `itinerary_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `user_comment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `itineraries`
--

CREATE TABLE IF NOT EXISTS `itineraries` (
`itinerary_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `tags` text NOT NULL,
  `mini_desc` varchar(50) NOT NULL,
  `thumb` text NOT NULL,
  `image_url` text NOT NULL,
  `description` text NOT NULL,
  `location` text NOT NULL,
  `days_open` int(7) NOT NULL,
  `daysopen_from` int(1) NOT NULL,
  `daysopen_to` int(1) NOT NULL,
  `tour_time` int(11) NOT NULL,
  `time_open` int(11) NOT NULL,
  `time_closed` int(11) NOT NULL,
  `tips` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itineraries`
--

INSERT INTO `itineraries` (`itinerary_id`, `name`, `tags`, `mini_desc`, `thumb`, `image_url`, `description`, `location`, `days_open`, `daysopen_from`, `daysopen_to`, `tour_time`, `time_open`, `time_closed`, `tips`) VALUES
(1, 'Manila Cathedral', 'historical|church|basilica|religion', 'Historic basilica known for papal visits', '', 'Manila Cathedral', 'The Minor Basilica and Metropolitan Cathedral of the Immaculate Conception, also known as Manila Cathedral, is the cathedral of Manila and basilica located in Intramuros, the historic walled city within today''s modern city of Manila, Philippines.', 'Sto. Tomas, Intramuros, Manila, 1002 Metro Manila', 1234567, 0, 0, 20, 6, 19, 'There is a mini museum inside located at both sides of the cathedral, featuring figures of saints and other religious icons.'),
(7, 'Fort Santiago', 'historical|ruins|fort', 'Iconic citadel & with a hero''s memorial', '', 'Fort Santiago', 'Fort Santiago is a citadel first built by Spanish conquistador, Miguel López de Legazpi for the new established city of Manila in the Philippines. The defense fortress is part of the structures of the walled city of Manila referred to as Intramuros.', 'Intramuros, Manila, 1002 Metro Manila', 1234567, 0, 0, 120, 8, 21, 'There is an entrance fee of XX pesos.'),
(8, 'Rizal Park', 'park|hero|jose rizal|statue', 'Large park for strolling & public events', '', 'Rizal Park', 'Rizal Park, also known as Luneta Park or simply Luneta, is a historical urban park in the Philippines. Located along Roxas Boulevard, Manila, adjacent to the old walled city of Intramuros, it is one of the largest urban parks in Asia.', 'Roxas Blvd Ermita, Barangay 666 Zone 72, Manila, 1000 Metro Manila', 1234567, 0, 0, 30, 6, 20, ''),
(9, 'Manila Ocean Park', 'park|ocean|aquatic', 'Aquatic theme park & educational facility featurin', '', 'Manila Ocean Park', 'The Manila Ocean Park is an oceanarium in Manila, Philippines. It is owned by China Oceanis Philippines Inc., a subsidiary of China Oceanis Inc., a Singaporean-registered firm. It is located behind the Quirino Grandstand at Rizal Park. ', '666 Behind Quirino Grandstand, Ermita, Manila, 1000 Metro Manila', 1234567, 0, 0, 180, 9, 20, ''),
(10, 'National Museum of the Philippines', 'museum|art', 'Massive museum with collections of Filipino f', '', 'National Museum of the Philippines', 'The National Museum of the Philippines is a government institution in the Philippines and serves as an educational, scientific and cultural institution in preserving the various permanent national collections featuring the ethnographic, anthropological, archaeological and visual artistry of the Philippines.', 'Padre Burgos Ave, Ermita, Manila, 1000 Metro Manila', 1234567, 0, 0, 120, 19, 0, 'asd'),
(22, 'San Agustin Church', 'church|religious', 'Cultural exhibits near a historic church', '', 'San Agustin Church', 'San Agustin Church is a Roman Catholic church under the auspices of The Order of St. Augustine, located inside the historic walled city of Intramuros in Manila.', 'General Luna St, Manila, 1002 Metro Manila', 1234567, 0, 0, 15, 7, 19, ' '),
(23, 'Casa Manila', 'museum|architecture|house', 'Museum depicting Spanish colonial life', '', 'Casa Manila', 'Casa Manila is a museum in Intramuros depicting colonial lifestyle during Spanish colonization of the Philippines', 'Plaza San Luis Complex, General Luna St, Intramuros, Manila, 1002 Metro Manila', 1234567, 0, 0, 30, 9, 18, ' '),
(24, 'Bahay Tsinoy', 'chinese|museum|house', 'Museum of Chinese history in the Philippines', '', 'Bahay Tsinoy', 'The Bahay Tsinoy is a building in Intramuros, Manila, Philippines which houses the Kaisa-Angelo King Heritage Center, a museum documents the history, lives and contributions of the ethnic Chinese in the Philippine life and history.', '32 Anda St, Intramuros, Manila, 1002 Metro Manila', 234567, 0, 0, 30, 8, 18, ' '),
(25, 'Manila City Hall', 'hall|government|clock', 'Historic government building in Manila', '', 'Manila City Hall', 'The Manila City Hall is located in the historic center of Ermita, Manila. It is where the Mayor of Manila holds office and the chambers of the Manila City Council.', 'Padre Burgos Ave, Ermita, Manila, 1000 Metro Manila', 23456, 0, 0, 45, 8, 17, ' '),
(26, 'Museo Pambata', 'museum|kids|children|playground', 'Educational and interactive kids'' displays', '', 'Museo Pambata', 'The Museo Pambata is a children''s museum in the Ermita district of Manila, near Rizal Park, in the Philippines. It is located in the former Elks Club Building, built in 1910, along Roxas Boulevard at the corner of South Drive.', ' Roxas Blvd, Ermita, Manila, 1000 Metro Manila', 1234567, 0, 0, 120, 9, 17, ' '),
(27, 'Manila Metropolitan Theatre', 'theatre|art|deco|architecture', 'An old, abandoned historical theatre', '', 'Manila Metropolitan Theatre', 'The Manila Metropolitan Theater is a Philippine Art Deco building found near the Mehan Garden located on Padre Burgos Avenue corner Arroceros Street, near the Manila Central Post Office.', ' ', 1234567, 0, 0, 12, 8, 20, ''),
(28, 'Arroceros Forest Park', 'forest|park|garden|botanical', 'Tree & plant-filled spot by the river', '', 'Arroceros Forest Park', 'The Arroceros Forest Park is a riverside park in Manila, Philippines, located on Antonio Villegas Street in the central district of Ermita.', 'Antonio Villegas St, 659 A Ermita, Manila, 1000 Metro Manila', 23456, 0, 0, 30, 9, 17, ' '),
(29, 'National Planetarium', 'museum|planetarium', 'Museum of space history in Manila', '', 'National Planetarium', 'The National Planetarium is a planetarium owned and operated by the National Museum of the Philippines in Manila. It is a 16-meter dome located in Rizal Park between the Japanese Garden and Chinese Garden on Padre Burgos Avenue in the central district of Ermita.', '', 1234567, 0, 0, 0, 9, 16, ' '),
(30, '123123aarobmnl', 'rombnl', 'rombnl', '', '', 'robmnl', 'robmnl', 1234567, 0, 0, 60, 8, 20, 'rob'),
(31, '222111aaaaromblnl', 'asd', 'asd', '', 'aaaaromblnl', 'asd', 'asd', 1234567, 0, 0, 60, 8, 11, 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `itinerary`
--

CREATE TABLE IF NOT EXISTS `itinerary` (
`itinerary_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL,
  `alloted_time` int(11) NOT NULL,
  `user_tags` text NOT NULL,
  `start_time` int(11) NOT NULL,
  `rating` float NOT NULL,
  `timeframe_start` text NOT NULL,
  `timeframe_end` text NOT NULL,
  `place_image_url` text NOT NULL,
  `place_name` text NOT NULL,
  `place_desc` text NOT NULL,
  `place_location` text NOT NULL,
  `place_tourtime` text NOT NULL,
  `place_hours_open` text NOT NULL,
  `place_hours_closed` text NOT NULL,
  `place_notes` text NOT NULL,
  `placesv2` text NOT NULL,
  `ratingv2` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itinerary`
--

INSERT INTO `itinerary` (`itinerary_id`, `name`, `author`, `date_created`, `alloted_time`, `user_tags`, `start_time`, `rating`, `timeframe_start`, `timeframe_end`, `place_image_url`, `place_name`, `place_desc`, `place_location`, `place_tourtime`, `place_hours_open`, `place_hours_closed`, `place_notes`, `placesv2`, `ratingv2`) VALUES
(12, 'Parks', 'admin', '0000-00-00 00:00:00', 6, 'park', 10, 3, 'a:3:{i:0;s:8:"10:00 AM";i:1;s:8:"10:30 AM";i:2;s:8:"11:00 AM";}', 'a:3:{i:0;s:8:"10:30 AM";i:1;s:8:"11:00 AM";i:2;s:7:"2:00 PM";}', 'a:3:{i:0;s:65:"http://localhost/cilantro/assets/wp_content/images/Rizal_Park.png";i:1;s:76:"http://localhost/cilantro/assets/wp_content/images/Arroceros_Forest_Park.png";i:2;s:72:"http://localhost/cilantro/assets/wp_content/images/Manila_Ocean_Park.png";}', 'a:3:{i:0;s:10:"Rizal Park";i:1;s:21:"Arroceros Forest Park";i:2;s:17:"Manila Ocean Park";}', 'a:3:{i:0;s:40:"Large park for strolling & public events";i:1;s:37:"Tree & plant-filled spot by the river";i:2;s:50:"Aquatic theme park & educational facility featurin";}', 'a:3:{i:0;s:66:"Roxas Blvd Ermita, Barangay 666 Zone 72, Manila, 1000 Metro Manila";i:1;s:60:"Antonio Villegas St, 659 A Ermita, Manila, 1000 Metro Manila";i:2;s:64:"666 Behind Quirino Grandstand, Ermita, Manila, 1000 Metro Manila";}', 'a:3:{i:0;s:10:"30 minutes";i:1;s:10:"30 minutes";i:2;s:7:"3 hours";}', 'a:3:{i:0;s:7:"6:00 AM";i:1;s:7:"9:00 AM";i:2;s:7:"9:00 AM";}', 'a:3:{i:0;s:7:"8:00 PM";i:1;s:7:"5:00 PM";i:2;s:7:"8:00 PM";}', 'a:3:{i:0;s:154:"Jose Rizal''s remains lie at the very monument in this Park, transferred after formerly located in Paco Park. Jose Rizal is the Philippines'' national hero.";i:1;s:15:" Free admission";i:2;s:115:"The park has several packages with prices starting from 590 pesos which includes tickets to many facilities inside.";}', '', 0),
(13, 'Parks and Churches', 'admin', '0000-00-00 00:00:00', 6, 'park,church', 10, 4, 'a:5:{i:0;s:8:"10:00 AM";i:1;s:8:"10:20 AM";i:2;s:8:"10:50 AM";i:3;s:8:"11:05 AM";i:4;s:8:"11:35 AM";}', 'a:5:{i:0;s:8:"10:20 AM";i:1;s:8:"10:50 AM";i:2;s:8:"11:05 AM";i:3;s:8:"11:35 AM";i:4;s:7:"2:35 PM";}', 'a:5:{i:0;s:71:"http://localhost/cilantro/assets/wp_content/images/Manila_Cathedral.png";i:1;s:65:"http://localhost/cilantro/assets/wp_content/images/Rizal_Park.png";i:2;s:73:"http://localhost/cilantro/assets/wp_content/images/San_Agustin_Church.png";i:3;s:76:"http://localhost/cilantro/assets/wp_content/images/Arroceros_Forest_Park.png";i:4;s:72:"http://localhost/cilantro/assets/wp_content/images/Manila_Ocean_Park.png";}', 'a:5:{i:0;s:16:"Manila Cathedral";i:1;s:10:"Rizal Park";i:2;s:18:"San Agustin Church";i:3;s:21:"Arroceros Forest Park";i:4;s:17:"Manila Ocean Park";}', 'a:5:{i:0;s:40:"Historic basilica known for papal visits";i:1;s:40:"Large park for strolling & public events";i:2;s:40:"Cultural exhibits near a historic church";i:3;s:37:"Tree & plant-filled spot by the river";i:4;s:50:"Aquatic theme park & educational facility featurin";}', 'a:5:{i:0;s:49:"Sto. Tomas, Intramuros, Manila, 1002 Metro Manila";i:1;s:66:"Roxas Blvd Ermita, Barangay 666 Zone 72, Manila, 1000 Metro Manila";i:2;s:42:"General Luna St, Manila, 1002 Metro Manila";i:3;s:60:"Antonio Villegas St, 659 A Ermita, Manila, 1000 Metro Manila";i:4;s:64:"666 Behind Quirino Grandstand, Ermita, Manila, 1000 Metro Manila";}', 'a:5:{i:0;s:10:"20 minutes";i:1;s:10:"30 minutes";i:2;s:10:"15 minutes";i:3;s:10:"30 minutes";i:4;s:7:"3 hours";}', 'a:5:{i:0;s:7:"6:00 AM";i:1;s:7:"6:00 AM";i:2;s:7:"7:00 AM";i:3;s:7:"9:00 AM";i:4;s:7:"9:00 AM";}', 'a:5:{i:0;s:7:"7:00 PM";i:1;s:7:"8:00 PM";i:2;s:7:"7:00 PM";i:3;s:7:"5:00 PM";i:4;s:7:"8:00 PM";}', 'a:5:{i:0;s:124:"There is a mini museum inside located at both sides of the cathedral, featuring figures of saints and other religious icons.";i:1;s:154:"Jose Rizal''s remains lie at the very monument in this Park, transferred after formerly located in Paco Park. Jose Rizal is the Philippines'' national hero.";i:2;s:153:"San Agustin Church was one of four Philippine churches constructed during the Spanish colonial period to be designated as a World Heritage Site by UNESCO";i:3;s:15:" Free admission";i:4;s:115:"The park has several packages with prices starting from 590 pesos which includes tickets to many facilities inside.";}', '', 0),
(14, 'Museums', 'admin', '0000-00-00 00:00:00', 8, 'museum', 9, 4, 'a:4:{i:0;s:7:"9:00 AM";i:1;s:8:"11:00 AM";i:2;s:7:"1:00 PM";i:3;s:7:"1:30 PM";}', 'a:4:{i:0;s:8:"11:00 AM";i:1;s:7:"1:00 PM";i:2;s:7:"1:30 PM";i:3;s:7:"2:00 PM";}', 'a:4:{i:0;s:75:"http://localhost/cilantro/assets/wp_content/images/National_Planetarium.png";i:1;s:68:"http://localhost/cilantro/assets/wp_content/images/Museo_Pambata.png";i:2;s:66:"http://localhost/cilantro/assets/wp_content/images/Casa_Manila.png";i:3;s:67:"http://localhost/cilantro/assets/wp_content/images/Bahay_Tsinoy.png";}', 'a:4:{i:0;s:20:"National Planetarium";i:1;s:13:"Museo Pambata";i:2;s:11:"Casa Manila";i:3;s:12:"Bahay Tsinoy";}', 'a:4:{i:0;s:33:"Museum of space history in Manila";i:1;s:42:"Educational and interactive kids'' displays";i:2;s:38:"Museum depicting Spanish colonial life";i:3;s:44:"Museum of Chinese history in the Philippines";}', 'a:4:{i:0;s:0:"";i:1;s:46:" Roxas Blvd, Ermita, Manila, 1000 Metro Manila";i:2;s:78:"Plaza San Luis Complex, General Luna St, Intramuros, Manila, 1002 Metro Manila";i:3;s:49:"32 Anda St, Intramuros, Manila, 1002 Metro Manila";}', 'a:4:{i:0;s:7:"2 hours";i:1;s:7:"2 hours";i:2;s:10:"30 minutes";i:3;s:10:"30 minutes";}', 'a:4:{i:0;s:7:"9:00 AM";i:1;s:7:"9:00 AM";i:2;s:7:"9:00 AM";i:3;s:7:"1:00 PM";}', 'a:4:{i:0;s:7:"4:00 PM";i:1;s:7:"5:00 PM";i:2;s:7:"6:00 PM";i:3;s:7:"5:00 PM";}', 'a:4:{i:0;s:63:" Admission fee of 50 pesos for adults and 30 pesos for students";i:1;s:39:" There is an entrance fee of 250 pesos.";i:2;s:99:" It was constructed by Imelda Marcos during the 1980s and modeled on Spanish colonial architecture.";i:3;s:76:" There is an entrance fee of 100 pesos for adults and 60 pesos for students.";}', '', 0),
(15, 'Museums', 'admin', '0000-00-00 00:00:00', 8, 'museum', 9, 4, 'a:4:{i:0;s:7:"9:00 AM";i:1;s:8:"11:00 AM";i:2;s:7:"1:00 PM";i:3;s:7:"1:30 PM";}', 'a:4:{i:0;s:8:"11:00 AM";i:1;s:7:"1:00 PM";i:2;s:7:"1:30 PM";i:3;s:7:"2:00 PM";}', 'a:4:{i:0;s:75:"http://localhost/cilantro/assets/wp_content/images/National_Planetarium.png";i:1;s:68:"http://localhost/cilantro/assets/wp_content/images/Museo_Pambata.png";i:2;s:66:"http://localhost/cilantro/assets/wp_content/images/Casa_Manila.png";i:3;s:67:"http://localhost/cilantro/assets/wp_content/images/Bahay_Tsinoy.png";}', 'a:4:{i:0;s:20:"National Planetarium";i:1;s:13:"Museo Pambata";i:2;s:11:"Casa Manila";i:3;s:12:"Bahay Tsinoy";}', 'a:4:{i:0;s:33:"Museum of space history in Manila";i:1;s:42:"Educational and interactive kids'' displays";i:2;s:38:"Museum depicting Spanish colonial life";i:3;s:44:"Museum of Chinese history in the Philippines";}', 'a:4:{i:0;s:0:"";i:1;s:46:" Roxas Blvd, Ermita, Manila, 1000 Metro Manila";i:2;s:78:"Plaza San Luis Complex, General Luna St, Intramuros, Manila, 1002 Metro Manila";i:3;s:49:"32 Anda St, Intramuros, Manila, 1002 Metro Manila";}', 'a:4:{i:0;s:7:"2 hours";i:1;s:7:"2 hours";i:2;s:10:"30 minutes";i:3;s:10:"30 minutes";}', 'a:4:{i:0;s:7:"9:00 AM";i:1;s:7:"9:00 AM";i:2;s:7:"9:00 AM";i:3;s:7:"1:00 PM";}', 'a:4:{i:0;s:7:"4:00 PM";i:1;s:7:"5:00 PM";i:2;s:7:"6:00 PM";i:3;s:7:"5:00 PM";}', 'a:4:{i:0;s:63:" Admission fee of 50 pesos for adults and 30 pesos for students";i:1;s:39:" There is an entrance fee of 250 pesos.";i:2;s:99:" It was constructed by Imelda Marcos during the 1980s and modeled on Spanish colonial architecture.";i:3;s:76:" There is an entrance fee of 100 pesos for adults and 60 pesos for students.";}', '', 0),
(16, '9 Hours Manila Tour', 'admin', '0000-00-00 00:00:00', 9, '', 8, 3, 'a:12:{i:0;s:7:"8:00 AM";i:1;s:7:"8:20 AM";i:2;s:7:"8:50 AM";i:3;s:7:"9:05 AM";i:4;s:7:"9:20 AM";i:5;s:8:"10:05 AM";i:6;s:8:"11:05 AM";i:7;s:8:"11:17 AM";i:8;s:7:"1:17 PM";i:9;s:7:"3:17 PM";i:10;s:7:"3:47 PM";i:11;s:7:"4:17 PM";}', 'a:12:{i:0;s:7:"8:20 AM";i:1;s:7:"8:50 AM";i:2;s:7:"9:05 AM";i:3;s:7:"9:20 AM";i:4;s:8:"10:05 AM";i:5;s:8:"11:05 AM";i:6;s:8:"11:17 AM";i:7;s:7:"1:17 PM";i:8;s:7:"3:17 PM";i:9;s:7:"3:47 PM";i:10;s:7:"4:17 PM";i:11;s:7:"4:47 PM";}', 'a:12:{i:0;s:71:"http://localhost/cilantro/assets/wp_content/images/Manila_Cathedral.png";i:1;s:65:"http://localhost/cilantro/assets/wp_content/images/Rizal_Park.png";i:2;s:73:"http://localhost/cilantro/assets/wp_content/images/San_Agustin_Church.png";i:3;s:70:"http://localhost/cilantro/assets/wp_content/images/Aduana_Building.png";i:4;s:71:"http://localhost/cilantro/assets/wp_content/images/Manila_City_Hall.png";i:5;s:72:"http://localhost/cilantro/assets/wp_content/images/Malacanang_Palace.png";i:6;s:82:"http://localhost/cilantro/assets/wp_content/images/Manila_Metropolitan_Theatre.png";i:7;s:68:"http://localhost/cilantro/assets/wp_content/images/Fort_Santiago.png";i:8;s:75:"http://localhost/cilantro/assets/wp_content/images/National_Planetarium.png";i:9;s:76:"http://localhost/cilantro/assets/wp_content/images/Arroceros_Forest_Park.png";i:10;s:66:"http://localhost/cilantro/assets/wp_content/images/Casa_Manila.png";i:11;s:67:"http://localhost/cilantro/assets/wp_content/images/Bahay_Tsinoy.png";}', 'a:12:{i:0;s:16:"Manila Cathedral";i:1;s:10:"Rizal Park";i:2;s:18:"San Agustin Church";i:3;s:15:"Aduana Building";i:4;s:16:"Manila City Hall";i:5;s:17:"Malacanang Palace";i:6;s:27:"Manila Metropolitan Theatre";i:7;s:13:"Fort Santiago";i:8;s:20:"National Planetarium";i:9;s:21:"Arroceros Forest Park";i:10;s:11:"Casa Manila";i:11;s:12:"Bahay Tsinoy";}', 'a:12:{i:0;s:40:"Historic basilica known for papal visits";i:1;s:40:"Large park for strolling & public events";i:2;s:40:"Cultural exhibits near a historic church";i:3;s:50:"A Spanish colonial structure that housed several g";i:4;s:38:"Historic government building in Manila";i:5;s:50:"Presidential museum & library showcasing Philippin";i:6;s:36:"An old, abandoned historical theatre";i:7;s:39:"Iconic citadel & with a hero''s memorial";i:8;s:33:"Museum of space history in Manila";i:9;s:37:"Tree & plant-filled spot by the river";i:10;s:38:"Museum depicting Spanish colonial life";i:11;s:44:"Museum of Chinese history in the Philippines";}', 'a:12:{i:0;s:49:"Sto. Tomas, Intramuros, Manila, 1002 Metro Manila";i:1;s:66:"Roxas Blvd Ermita, Barangay 666 Zone 72, Manila, 1000 Metro Manila";i:2;s:42:"General Luna St, Manila, 1002 Metro Manila";i:3;s:52:"Magallanes Dr, Intramuros, Manila, 1002 Metro Manila";i:4;s:51:"Padre Burgos Ave, Ermita, Manila, 1000 Metro Manila";i:5;s:69:"Malacañan Palace, JP Laurel Street, San Miguel, Manila, Metro Manila";i:6;s:52:" Padre Burgos Ave, Ermita, Manila, 1000 Metro Manila";i:7;s:37:"Intramuros, Manila, 1002 Metro Manila";i:8;s:0:"";i:9;s:60:"Antonio Villegas St, 659 A Ermita, Manila, 1000 Metro Manila";i:10;s:78:"Plaza San Luis Complex, General Luna St, Intramuros, Manila, 1002 Metro Manila";i:11;s:49:"32 Anda St, Intramuros, Manila, 1002 Metro Manila";}', 'a:12:{i:0;s:10:"20 minutes";i:1;s:10:"30 minutes";i:2;s:10:"15 minutes";i:3;s:10:"15 minutes";i:4;s:10:"45 minutes";i:5;s:7:"1 hours";i:6;s:10:"12 minutes";i:7;s:7:"2 hours";i:8;s:7:"2 hours";i:9;s:10:"30 minutes";i:10;s:10:"30 minutes";i:11;s:10:"30 minutes";}', 'a:12:{i:0;s:7:"6:00 AM";i:1;s:7:"6:00 AM";i:2;s:7:"7:00 AM";i:3;s:7:"8:00 AM";i:4;s:7:"8:00 AM";i:5;s:7:"8:00 AM";i:6;s:7:"8:00 AM";i:7;s:7:"8:00 AM";i:8;s:7:"9:00 AM";i:9;s:7:"9:00 AM";i:10;s:7:"9:00 AM";i:11;s:7:"1:00 PM";}', 'a:12:{i:0;s:7:"7:00 PM";i:1;s:7:"8:00 PM";i:2;s:7:"7:00 PM";i:3;s:7:"4:00 PM";i:4;s:7:"5:00 PM";i:5;s:7:"5:00 PM";i:6;s:7:"8:00 PM";i:7;s:7:"9:00 PM";i:8;s:7:"4:00 PM";i:9;s:7:"5:00 PM";i:10;s:7:"6:00 PM";i:11;s:7:"5:00 PM";}', 'a:12:{i:0;s:124:"There is a mini museum inside located at both sides of the cathedral, featuring figures of saints and other religious icons.";i:1;s:154:"Jose Rizal''s remains lie at the very monument in this Park, transferred after formerly located in Paco Park. Jose Rizal is the Philippines'' national hero.";i:2;s:153:"San Agustin Church was one of four Philippine churches constructed during the Spanish colonial period to be designated as a World Heritage Site by UNESCO";i:3;s:140:"In 1997, the National Archives acquired the building to serve as their future office. Restoration efforts have already commenced as to date.";i:4;s:116:" The city hall''s clock tower is the largest clock tower in the Philippines, reaching close to 100 feet in elevation.";i:5;s:115:"The place contains a presidential museum and a library inside the complex. Malacanang Palace is closed on holidays.";i:6;s:142:"The theater is closed as it is abandoned long before, however, restoration and renovation works are on the way in order to reopen the theater.";i:7;s:38:"There is an entrance fee of 100 pesos.";i:8;s:63:" Admission fee of 50 pesos for adults and 30 pesos for students";i:9;s:15:" Free admission";i:10;s:99:" It was constructed by Imelda Marcos during the 1980s and modeled on Spanish colonial architecture.";i:11;s:76:" There is an entrance fee of 100 pesos for adults and 60 pesos for students.";}', '', 0),
(17, 'my custom itinerary', 'admin', '0000-00-00 00:00:00', 7, 'museum,park', 10, 3, 'a:6:{i:0;s:8:"10:00 AM";i:1;s:8:"10:30 AM";i:2;s:8:"12:30 AM";i:3;s:7:"2:30 PM";i:4;s:7:"3:00 PM";i:5;s:7:"3:30 PM";}', 'a:6:{i:0;s:8:"10:30 AM";i:1;s:8:"12:30 AM";i:2;s:7:"2:30 PM";i:3;s:7:"3:00 PM";i:4;s:7:"3:30 PM";i:5;s:7:"4:00 PM";}', 'a:6:{i:0;s:65:"http://localhost/cilantro/assets/wp_content/images/Rizal_Park.png";i:1;s:75:"http://localhost/cilantro/assets/wp_content/images/National_Planetarium.png";i:2;s:68:"http://localhost/cilantro/assets/wp_content/images/Museo_Pambata.png";i:3;s:76:"http://localhost/cilantro/assets/wp_content/images/Arroceros_Forest_Park.png";i:4;s:66:"http://localhost/cilantro/assets/wp_content/images/Casa_Manila.png";i:5;s:67:"http://localhost/cilantro/assets/wp_content/images/Bahay_Tsinoy.png";}', 'a:6:{i:0;s:10:"Rizal Park";i:1;s:20:"National Planetarium";i:2;s:13:"Museo Pambata";i:3;s:21:"Arroceros Forest Park";i:4;s:11:"Casa Manila";i:5;s:12:"Bahay Tsinoy";}', 'a:6:{i:0;s:40:"Large park for strolling & public events";i:1;s:33:"Museum of space history in Manila";i:2;s:42:"Educational and interactive kids'' displays";i:3;s:37:"Tree & plant-filled spot by the river";i:4;s:38:"Museum depicting Spanish colonial life";i:5;s:44:"Museum of Chinese history in the Philippines";}', 'a:6:{i:0;s:66:"Roxas Blvd Ermita, Barangay 666 Zone 72, Manila, 1000 Metro Manila";i:1;s:0:"";i:2;s:46:" Roxas Blvd, Ermita, Manila, 1000 Metro Manila";i:3;s:60:"Antonio Villegas St, 659 A Ermita, Manila, 1000 Metro Manila";i:4;s:78:"Plaza San Luis Complex, General Luna St, Intramuros, Manila, 1002 Metro Manila";i:5;s:49:"32 Anda St, Intramuros, Manila, 1002 Metro Manila";}', 'a:6:{i:0;s:10:"30 minutes";i:1;s:7:"2 hours";i:2;s:7:"2 hours";i:3;s:10:"30 minutes";i:4;s:10:"30 minutes";i:5;s:10:"30 minutes";}', 'a:6:{i:0;s:7:"6:00 AM";i:1;s:7:"9:00 AM";i:2;s:7:"9:00 AM";i:3;s:7:"9:00 AM";i:4;s:7:"9:00 AM";i:5;s:7:"1:00 PM";}', 'a:6:{i:0;s:7:"8:00 PM";i:1;s:7:"4:00 PM";i:2;s:7:"5:00 PM";i:3;s:7:"5:00 PM";i:4;s:7:"6:00 PM";i:5;s:7:"5:00 PM";}', 'a:6:{i:0;s:154:"Jose Rizal''s remains lie at the very monument in this Park, transferred after formerly located in Paco Park. Jose Rizal is the Philippines'' national hero.";i:1;s:63:" Admission fee of 50 pesos for adults and 30 pesos for students";i:2;s:39:" There is an entrance fee of 250 pesos.";i:3;s:15:" Free admission";i:4;s:99:" It was constructed by Imelda Marcos during the 1980s and modeled on Spanish colonial architecture.";i:5;s:76:" There is an entrance fee of 100 pesos for adults and 60 pesos for students.";}', '', 0),
(18, 'my itinerary', 'Marron Marasigan', '0000-00-00 00:00:00', 5, 'museum,carnival', 10, 1, 'a:4:{i:0;s:8:"10:00 AM";i:1;s:8:"12:00 AM";i:2;s:7:"2:00 PM";i:3;s:7:"2:30 PM";}', 'a:4:{i:0;s:8:"12:00 AM";i:1;s:7:"2:00 PM";i:2;s:7:"2:30 PM";i:3;s:7:"3:00 PM";}', 'a:4:{i:0;s:73:"http://localhost/mantis/assets/wp_content/images/National_Planetarium.png";i:1;s:66:"http://localhost/mantis/assets/wp_content/images/Museo_Pambata.png";i:2;s:64:"http://localhost/mantis/assets/wp_content/images/Casa_Manila.png";i:3;s:65:"http://localhost/mantis/assets/wp_content/images/Bahay_Tsinoy.png";}', 'a:4:{i:0;s:20:"National Planetarium";i:1;s:13:"Museo Pambata";i:2;s:11:"Casa Manila";i:3;s:12:"Bahay Tsinoy";}', 'a:4:{i:0;s:33:"Museum of space history in Manila";i:1;s:42:"Educational and interactive kids'' displays";i:2;s:38:"Museum depicting Spanish colonial life";i:3;s:44:"Museum of Chinese history in the Philippines";}', 'a:4:{i:0;s:0:"";i:1;s:46:" Roxas Blvd, Ermita, Manila, 1000 Metro Manila";i:2;s:78:"Plaza San Luis Complex, General Luna St, Intramuros, Manila, 1002 Metro Manila";i:3;s:49:"32 Anda St, Intramuros, Manila, 1002 Metro Manila";}', 'a:4:{i:0;s:7:"2 hours";i:1;s:7:"2 hours";i:2;s:10:"30 minutes";i:3;s:10:"30 minutes";}', 'a:4:{i:0;s:7:"9:00 AM";i:1;s:7:"9:00 AM";i:2;s:7:"9:00 AM";i:3;s:7:"1:00 PM";}', 'a:4:{i:0;s:7:"4:00 PM";i:1;s:7:"5:00 PM";i:2;s:7:"6:00 PM";i:3;s:7:"5:00 PM";}', 'a:4:{i:0;s:63:" Admission fee of 50 pesos for adults and 30 pesos for students";i:1;s:39:" There is an entrance fee of 250 pesos.";i:2;s:99:" It was constructed by Imelda Marcos during the 1980s and modeled on Spanish colonial architecture.";i:3;s:76:" There is an entrance fee of 100 pesos for adults and 60 pesos for students.";}', '', 0),
(19, 'Afternoon Parks and Church', 'Marron Marasigan', '0000-00-00 00:00:00', 4, 'park,church', 12, 1, 'a:4:{i:0;s:8:"12:00 AM";i:1;s:8:"12:35 AM";i:2;s:7:"1:05 PM";i:3;s:7:"1:50 PM";}', 'a:4:{i:0;s:8:"12:20 AM";i:1;s:8:"12:50 AM";i:2;s:7:"1:35 PM";i:3;s:7:"2:20 PM";}', 'a:4:{i:0;s:71:"http://localhost/cilantro/assets/wp_content/images/Manila_Cathedral.png";i:1;s:73:"http://localhost/cilantro/assets/wp_content/images/San_Agustin_Church.png";i:2;s:65:"http://localhost/cilantro/assets/wp_content/images/Rizal_Park.png";i:3;s:76:"http://localhost/cilantro/assets/wp_content/images/Arroceros_Forest_Park.png";}', 'a:4:{i:0;s:16:"Manila Cathedral";i:1;s:18:"San Agustin Church";i:2;s:10:"Rizal Park";i:3;s:21:"Arroceros Forest Park";}', 'a:4:{i:0;s:40:"Historic basilica known for papal visits";i:1;s:40:"Cultural exhibits near a historic church";i:2;s:40:"Large park for strolling & public events";i:3;s:37:"Tree & plant-filled spot by the river";}', 'a:4:{i:0;s:49:"Sto. Tomas, Intramuros, Manila, 1002 Metro Manila";i:1;s:42:"General Luna St, Manila, 1002 Metro Manila";i:2;s:66:"Roxas Blvd Ermita, Barangay 666 Zone 72, Manila, 1000 Metro Manila";i:3;s:60:"Antonio Villegas St, 659 A Ermita, Manila, 1000 Metro Manila";}', 'a:4:{i:0;s:10:"20 minutes";i:1;s:10:"15 minutes";i:2;s:10:"30 minutes";i:3;s:10:"30 minutes";}', 'a:4:{i:0;s:7:"6:00 AM";i:1;s:7:"6:00 AM";i:2;s:7:"7:00 AM";i:3;s:7:"9:00 AM";}', 'a:4:{i:0;s:7:"7:00 PM";i:1;s:7:"7:00 PM";i:2;s:7:"8:00 PM";i:3;s:7:"5:00 PM";}', 'a:4:{i:0;s:124:"There is a mini museum inside located at both sides of the cathedral, featuring figures of saints and other religious icons.";i:1;s:153:"San Agustin Church was one of four Philippine churches constructed during the Spanish colonial period to be designated as a World Heritage Site by UNESCO";i:2;s:154:"Jose Rizal''s remains lie at the very monument in this Park, transferred after formerly located in Paco Park. Jose Rizal is the Philippines'' national hero.";i:3;s:15:" Free admission";}', '1|22|8|28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `itineraryv2`
--

CREATE TABLE IF NOT EXISTS `itineraryv2` (
`itinerary_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `user_tags` varchar(100) NOT NULL,
  `alloted_time` int(5) NOT NULL,
  `start_time` int(5) NOT NULL,
  `places` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE IF NOT EXISTS `place` (
`itinerary_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` int(1) NOT NULL,
  `tags` text NOT NULL,
  `mini_desc` varchar(50) NOT NULL,
  `thumb` text NOT NULL,
  `image_url` text NOT NULL,
  `description` text NOT NULL,
  `location` text NOT NULL,
  `days_open` int(7) NOT NULL,
  `daysopen_from` int(1) NOT NULL,
  `daysopen_to` int(1) NOT NULL,
  `tour_time` int(11) NOT NULL,
  `time_open` int(11) NOT NULL,
  `time_closed` int(11) NOT NULL,
  `tips` text NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`itinerary_id`, `name`, `category`, `tags`, `mini_desc`, `thumb`, `image_url`, `description`, `location`, `days_open`, `daysopen_from`, `daysopen_to`, `tour_time`, `time_open`, `time_closed`, `tips`, `rating`) VALUES
(1, 'Manila Cathedral', 4, 'historical|church', 'Historic basilica known for papal visits', '', 'Manila Cathedral', 'The Minor Basilica and Metropolitan Cathedral of the Immaculate Conception, also known as Manila Cathedral, is the cathedral of Manila and basilica located in Intramuros, the historic walled city within today''s modern city of Manila, Philippines.', 'Sto. Tomas, Intramuros, Manila, 1002 Metro Manila', 0, 2, 1, 20, 6, 19, 'There is a mini museum inside located at both sides of the cathedral, featuring figures of saints and other religious icons.', 5),
(7, 'Fort Santiago', 2, 'historical', 'Iconic citadel & with a hero''s memorial', '', 'Fort Santiago', 'Fort Santiago is a citadel first built by Spanish conquistador, Miguel López de Legazpi for the new established city of Manila in the Philippines. The defense fortress is part of the structures of the walled city of Manila referred to as Intramuros.', 'Intramuros, Manila, 1002 Metro Manila', 0, 2, 1, 120, 8, 21, 'There is an entrance fee of 100 pesos.', 3.3),
(8, 'Rizal Park', 3, 'park', 'Large park for strolling & public events', '', 'Rizal Park', 'Rizal Park, also known as Luneta Park or simply Luneta, is a historical urban park in the Philippines. Located along Roxas Boulevard, Manila, adjacent to the old walled city of Intramuros, it is one of the largest urban parks in Asia.', 'Roxas Blvd Ermita, Barangay 666 Zone 72, Manila, 1000 Metro Manila', 0, 2, 1, 30, 7, 20, 'Jose Rizal''s remains lie at the very monument in this Park, transferred after formerly located in Paco Park. Jose Rizal is the Philippines'' national hero.', 4),
(9, 'Manila Ocean Park', 6, 'park|amusement', 'Aquatic theme park & educational facility featurin', '', 'Manila Ocean Park', 'The Manila Ocean Park is an oceanarium in Manila, Philippines. It is owned by China Oceanis Philippines Inc., a subsidiary of China Oceanis Inc., a Singaporean-registered firm. It is located behind the Quirino Grandstand at Rizal Park. ', '666 Behind Quirino Grandstand, Ermita, Manila, 1000 Metro Manila', 0, 2, 1, 180, 9, 20, 'The park has several packages with prices starting from 590 pesos which includes tickets to many facilities inside.', 1),
(10, 'National Museum of the Philippines', 1, 'museum|art', 'Massive museum with collections of Filipino', '', 'National Museum of the Philippines', 'The National Museum of the Philippines is a government institution in the Philippines and serves as an educational, scientific and cultural institution in preserving the various permanent national collections featuring the ethnographic, anthropological, archaeological and visual artistry of the Philippines.', 'Padre Burgos Ave, Ermita, Manila, 1000 Metro Manila', 0, 2, 1, 120, 19, 0, 'National Museum is comprised of several buildings catering to different themes. Currently there are museums of Anthropology, Natural History, and Fine Arts.', 2.5),
(22, 'San Agustin Church', 4, 'church|historical', 'Cultural exhibits near a historic church', '', 'San Agustin Church', 'San Agustin Church is a Roman Catholic church under the auspices of The Order of St. Augustine, located inside the historic walled city of Intramuros in Manila.', 'General Luna St, Manila, 1002 Metro Manila', 0, 2, 1, 15, 6, 19, 'San Agustin Church was one of four Philippine churches constructed during the Spanish colonial period to be designated as a World Heritage Site by UNESCO', 0),
(23, 'Casa Manila', 1, 'museum|architecture', 'Museum depicting Spanish colonial life', '', 'Casa Manila', 'Casa Manila is a museum in Intramuros depicting colonial lifestyle during Spanish colonization of the Philippines', 'Plaza San Luis Complex, General Luna St, Intramuros, Manila, 1002 Metro Manila', 0, 2, 1, 30, 9, 18, ' It was constructed by Imelda Marcos during the 1980s and modeled on Spanish colonial architecture.', 0),
(24, 'Bahay Tsinoy', 1, 'chinese|museum', 'Museum of Chinese history in the Philippines', '', 'Bahay Tsinoy', 'The Bahay Tsinoy is a building in Intramuros, Manila, Philippines which houses the Kaisa-Angelo King Heritage Center, a museum documents the history, lives and contributions of the ethnic Chinese in the Philippine life and history.', '32 Anda St, Intramuros, Manila, 1002 Metro Manila', 0, 3, 1, 30, 13, 17, ' There is an entrance fee of 100 pesos for adults and 60 pesos for students.', 0),
(25, 'Manila City Hall', 2, 'historical|government', 'Historic government building in Manila', '', 'Manila City Hall', 'The Manila City Hall is located in the historic center of Ermita, Manila. It is where the Mayor of Manila holds office and the chambers of the Manila City Council.', 'Padre Burgos Ave, Ermita, Manila, 1000 Metro Manila', 0, 2, 6, 45, 8, 17, ' The city hall''s clock tower is the largest clock tower in the Philippines, reaching close to 100 feet in elevation.', 0),
(26, 'Museo Pambata', 1, 'museum|kids', 'Educational and interactive kids'' displays', '', 'Museo Pambata', 'The Museo Pambata is a children''s museum in the Ermita district of Manila, near Rizal Park, in the Philippines. It is located in the former Elks Club Building, built in 1910, along Roxas Boulevard at the corner of South Drive.', ' Roxas Blvd, Ermita, Manila, 1000 Metro Manila', 0, 2, 7, 120, 9, 17, ' There is an entrance fee of 250 pesos.', 0),
(27, 'Manila Metropolitan Theatre', 5, 'theatre|art|architecture', 'An old, abandoned historical theatre', '', 'Manila Metropolitan Theatre', 'The Manila Metropolitan Theater is a Philippine Art Deco building found near the Mehan Garden located on Padre Burgos Avenue corner Arroceros Street, near the Manila Central Post Office.', ' Padre Burgos Ave, Ermita, Manila, 1000 Metro Manila', 0, 2, 1, 12, 8, 20, 'The theater is closed as it is abandoned long before, however, restoration and renovation works are on the way in order to reopen the theater.', 0),
(28, 'Arroceros Forest Park', 3, 'forest|park', 'Tree & plant-filled spot by the river', '', 'Arroceros Forest Park', 'The Arroceros Forest Park is a riverside park in Manila, Philippines, located on Antonio Villegas Street in the central district of Ermita.', 'Antonio Villegas St, 659 A Ermita, Manila, 1000 Metro Manila', 0, 2, 6, 30, 9, 17, ' Free admission', 0),
(29, 'National Planetarium', 1, 'museum', 'Museum of space history in Manila', '', 'National Planetarium', 'The National Planetarium is a planetarium owned and operated by the National Museum of the Philippines in Manila. It is a 16-meter dome located in Rizal Park between the Japanese Garden and Chinese Garden on Padre Burgos Avenue in the central district of Ermita.', '', 0, 2, 1, 120, 9, 16, ' Admission fee of 50 pesos for adults and 30 pesos for students', 0),
(35, 'Aduana Building', 5, 'historical|architecture|government', 'A Spanish colonial structure that housed several g', '', 'Aduana Building', 'The Aduana Building, also known as the Intendencia, was a Spanish colonial structure in Manila, Philippines that housed several government offices through the years.', 'Magallanes Dr, Intramuros, Manila, 1002 Metro Manila', 0, 2, 6, 15, 8, 16, 'In 1997, the National Archives acquired the building to serve as their future office. Restoration efforts have already commenced as to date.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
`review_id` int(11) NOT NULL,
  `category` int(1) NOT NULL,
  `itinerary_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `category`, `itinerary_id`, `user_id`, `rating`, `comment`, `date`) VALUES
(1, 0, 1, 5, 5, 'asdf', ''),
(9, 0, 9, 7, 5, 'The place is very enticing even for kids. Lots of aquatic species and resources can be seen here.', ''),
(31, 1, 5, 7, 5, 'very nice sparkss', ''),
(39, 0, 10, 7, 5, 'helloas', ''),
(40, 0, 1, 7, 5, 'A very beautiful cathedral.', ''),
(41, 0, 1, 6, 5, 'The place is quite serene and peaceful. There was a mass going on while I visited and although mass is still ongoing, many tourists flock the entrance hall and silently taking pictures making sure no one is disturbed.', '2018-09-12'),
(42, 0, 8, 6, 4, 'Sad to see that there is a building situated behind the monument. The building construction makes taking photos difficult and makes tourists'' experience unpleasant .', '2018-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`text`) VALUES
('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquam enim ac pellentesque aliquam. Nunc non justo ut lectus mollis pretium. In congue, lectus eu tristique commodo, nulla ligula mollis sapien, sed ultricies neque risus in erat. In consequat risus ac nibh posuere, quis commodo neque pellentesque. Sed ut posuere dui. Quisque sagittis cursus vehicula. Mauris tincidunt imperdiet convallis. Aenean a pretium massa, ut pulvinar risus. Ut ut interdum quam. Aliquam ac aliquam justo. Suspendisse commodo est vitae condimentum gravida.\r\n\r\nVivamus ut ipsum quis metus pharetra sodales. Curabitur mi nibh, luctus at tincidunt id, euismod eget purus. Ut non est tincidunt, varius tortor vel, varius lorem. Aliquam erat volutpat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam tempor porta ante, tempor iaculis nunc vestibulum vitae. Quisque consectetur metus et mi fermentum hendrerit. Cras venenatis dui ut aliquet ultricies. Donec arcu neque, lobortis quis gravida consectetur, semper condimentum nisl.\r\n\r\nFusce sed sagittis sem. Aenean ac vulputate orci. Nunc turpis sapien, mollis quis felis quis, hendrerit mattis elit. Aenean lobortis pellentesque lobortis. Suspendisse at dignissim magna, egestas mollis ligula. Curabitur placerat pretium metus eu fringilla. Sed eleifend sem purus. Phasellus tincidunt bibendum neque et bibendum. Aenean ultricies ligula venenatis justo commodo, sed pellentesque quam viverra. Aenean ut rhoncus est, eget dignissim sem. Duis non sem nibh. Fusce eu aliquam nulla.\r\n\r\nDuis aliquam fermentum purus, at feugiat neque ultrices ut. In venenatis, libero et sodales maximus, sem elit sagittis velit, ut tempus lacus nisl viverra mi. Phasellus congue quis arcu eget fringilla. Praesent rhoncus est vitae scelerisque fermentum. Curabitur vel libero sit amet erat cursus ultricies non non turpis. Pellentesque consequat, leo ac fermentum fringilla, neque purus scelerisque tortor, quis pretium justo ligula sit amet tellus. Nunc elementum non nulla in sollicitudin. Praesent vulputate ut arcu id tristique. Ut ut elementum tortor. Fusce lobortis, nulla eu tempor dignissim, risus purus pellentesque quam, non vulputate lorem eros nec nibh. Vivamus ac elementum est, tristique egestas erat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris non magna felis. Sed at fringilla dolor. Nunc convallis ex enim, quis accumsan ipsum semper ac.\r\n\r\nInteger vitae sem sit amet mi faucibus porttitor interdum ullamcorper eros. Curabitur sollicitudin dapibus justo ac aliquam. Nam pretium lectus vitae quam dictum vehicula. Suspendisse velit leo, porttitor id ex vitae, faucibus tempus ligula. Phasellus pellentesque, ex in mollis sollicitudin, ipsum massa placerat diam, ornare tempor eros ligula id purus. Duis at urna at magna luctus egestas consectetur quis nibh. Maecenas mi arcu, tristique ut ipsum vitae, placerat aliquam eros. Ut iaculis vulputate elit, vitae faucibus massa dictum quis. Nunc vel imperdiet ante. Etiam orci eros, pretium sed elit sed, aliquam rutrum arcu. Vestibulum posuere tortor velit, pellentesque porttitor tellus gravida id. Vestibulum vitae magna vitae metus luctus varius sit amet vel enim.\r\n\r\nAenean ultricies non libero eget maximus. Donec posuere feugiat urna, ac euismod felis tempus quis. Donec gravida elit vel est condimentum, non aliquet risus porttitor. Nam dictum, ipsum at pharetra pulvinar, orci lacus varius libero, sit amet mollis leo ligula quis ante. Aliquam dictum, lorem et tempus vestibulum, urna ipsum porta lorem, eget viverra lectus nisi a sem. Phasellus pretium, quam eu sagittis tristique, orci ante consequat magna, quis lacinia leo dui ut nibh. Nam ligula sapien, consequat eget libero et, interdum ullamcorper neque. Aenean congue eleifend metus condimentum lacinia. Proin non auctor enim, vitae venenatis risus.\r\n\r\nMauris quis finibus ipsum. Quisque quis vehicula justo. Vestibulum vel tellus faucibus, accumsan nisl id, feugiat odio. Fusce magna tellus, tincidunt non maximus ut, varius a felis. Duis porta facilisis ante sagittis porttitor. Vivamus imperdiet aliquet libero, sit amet luctus leo hendrerit a. Donec eget sagittis dolor.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'Ehtesham', 'ehtesham@gmail.com', '123'),
(2, 'Ehtesham', 'ehtesham@gmail.com', '123'),
(3, 'farrukh', 'farrukh@gmail.com', '123'),
(4, 'zaid', 'zaid@gmail.com', '202cb962ac59075b964b07152d234b70'),
(5, 'qwerty', 'qwerty@qwerty.com', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(6, 'Marron Marasigan', 'marron.marasigan@yahoo.com', '24863cb63b2053d512782040f6c134dd'),
(7, 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3'),
(8, 'Avegail Carpio', 'avegailcarpio@mail.com', '8e887287c55bc07f9077720a066216a5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `itineraries`
--
ALTER TABLE `itineraries`
 ADD PRIMARY KEY (`itinerary_id`);

--
-- Indexes for table `itinerary`
--
ALTER TABLE `itinerary`
 ADD PRIMARY KEY (`itinerary_id`);

--
-- Indexes for table `itineraryv2`
--
ALTER TABLE `itineraryv2`
 ADD PRIMARY KEY (`itinerary_id`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
 ADD PRIMARY KEY (`itinerary_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
 ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `itineraries`
--
ALTER TABLE `itineraries`
MODIFY `itinerary_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `itinerary`
--
ALTER TABLE `itinerary`
MODIFY `itinerary_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `itineraryv2`
--
ALTER TABLE `itineraryv2`
MODIFY `itinerary_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
MODIFY `itinerary_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
