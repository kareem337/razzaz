-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2021 at 02:53 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `razzaztours`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Price` int(11) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Background` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `category`, `Location`, `Name`, `Date`, `Price`, `Description`, `Image`, `Background`) VALUES
(1, 1, 'South Egypt', 'Aswan', '2021-06-08 23:56:25', 500, 'Aswan, a city on the Nile River, has been southern Egypt’s strategic and commercial gateway since antiquity. It contains significant archaeological sites like the Philae temple complex, on Agilkia Island near the landmark Aswan Dam. Philae’s ruins include', 'aswan1.jpg ', 'aswan1.jpg '),
(2, 2, 'Tahrir', 'The Grand Egyptian Museum', '2021-06-08 23:57:41', 29, 'The Museum of Egyptian Antiquities, known commonly as the Egyptian Museum or Museum of Cairo, in Cairo, Egypt, is home to an extensive collection of ancient Egyptian antiquities. It has 120,000 items, with a representative amount on display.', 'egyptian_museum.jpg', 'egyptian_museum.jpg'),
(4, 1, 'East of Egypt', 'Sharm El-Sheikh', '2021-06-24 00:12:01', 399, 'Sharm el-Sheikh is an Egyptian resort town between the desert of the Sinai Peninsula and the Red Sea. It\'s known for its sheltered sandy beaches, clear waters and coral reefs. Naama Bay, with a palm tree-lined promenade, is filled with bars and restaurant', 'sharm.jpg', 'sharm.jpg'),
(5, 1, 'North-East of Egypt', 'Sinai', '2021-06-24 00:15:01', 299, 'Egypt’s Sinai Peninsula is a sparsely populated desert region between the Red Sea and the Mediterranean Sea. On its southern tip, Sharm el-Sheikh resort is a base for diving and snorkeling around the reefs of Ras Mohammed National Park. Inland, 6th-centur', 'sinai.jpg', 'sinai.jpg'),
(6, 2, 'Cairo', 'MUSEUM OF ISLAMIC ART', '2021-06-24 00:27:27', 35, 'The mission of the Museum of Islamic Art (MIA) is to display, preserve and interpret Islamic artifacts, and to reach a maximum number of national and international visitors. MIA also aims to develop education programs, encourage scientific research and co', 'islamic.jpg', 'islamic.jpg'),
(7, 2, 'Luxor', 'Luxor Museum', '2021-06-24 00:35:33', 49, 'This wonderful museum has a well-chosen and brilliantly displayed and explained collection of antiquities dating from the end of the Old Kingdom right through to the Mamluk period, mostly gathered from the Theban temples and necropolis. The ticket price p', 'luxor.jpg', 'luxor.jpg'),
(8, 1, 'Red Sea', 'Hurghada', '2021-06-24 00:53:24', 399, 'Egypt, a country linking northeast Africa with the Middle East, dates to the time of the pharaohs. Millennia-old monuments sit along the fertile Nile River Valley, including Giza\'s colossal Pyramids and Great Sphinx as well as Luxor\'s hieroglyph-lined Kar', 'hurghada.jpg', 'hurghada.jpg'),
(9, 1, 'North Egypt', 'Alexandria', '2021-06-24 00:41:06', 199, 'Alexandria is a Mediterranean port city in Egypt. During the Hellenistic period, it was home to a lighthouse ranking among the Seven Wonders of the Ancient World as well as a storied library. Today the library is reincarnated in the disc-shaped, ultramode', 'alex.jpg', 'alex.jpg'),
(10, 1, 'South Coast of Sinai', 'Dahab', '2021-06-24 00:43:50', 499, 'Dahab is a new-constructed Egyptian town on the southeast coast of the Sinai Peninsula in Egypt, approximately 80 km northeast of Sharm el-Sheikh. Formerly a Bedouin fishing spot, Dahab is now considered to be one of Egypt\'s most treasured diving destinat', 'dahab.jpeg', 'dahab.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
