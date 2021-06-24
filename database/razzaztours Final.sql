-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2021 at 07:54 AM
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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(11) NOT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `pid` int(11) NOT NULL,
  `Date_Created` date NOT NULL,
  `Total_Price` int(11) NOT NULL,
  `quantity` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `reciever` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `links` varchar(250) NOT NULL,
  `images` blob NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_placed` datetime NOT NULL,
  `pid` int(11) NOT NULL,
  `price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `First Name` varchar(255) NOT NULL,
  `Last Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Number` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Picture` varchar(55) NOT NULL,
  `User_Type_ID` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `First Name`, `Last Name`, `Email`, `Gender`, `Number`, `Password`, `Picture`, `User_Type_ID`) VALUES
(9, 'Mostafa', 'Khaled', 'Mostafa1810751@miuegypt.edu.eg', 'male', '01020820065', 'Mkhaled18', 'Mostafa.jpg', 1),
(10, 'Kareem', 'Yasser', 'Kareem@gmail.com', 'male', '12312312', 'Kareem123', 'kareem.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `ID` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`ID`, `type`) VALUES
(1, 'Admin'),
(2, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userCart` (`User_ID`),
  ADD KEY `cartProduct` (`pid`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userChat` (`sender`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`),
  ADD KEY `user_id_3` (`user_id`),
  ADD KEY `user_id_4` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `User_Type_ID` (`User_Type_ID`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cartProduct` FOREIGN KEY (`pid`) REFERENCES `products` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userCart` FOREIGN KEY (`User_ID`) REFERENCES `users` (`ID`);

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `userChat` FOREIGN KEY (`sender`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`User_Type_ID`) REFERENCES `user_type` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
