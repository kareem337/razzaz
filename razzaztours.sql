-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 05:41 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `user_id` int(11) NOT NULL,
  `order_placed` datetime NOT NULL,
  `pid` int(11) NOT NULL,
  `price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pagesaccess`
--

CREATE TABLE `pagesaccess` (
  `ID` int(11) NOT NULL,
  `UTI` int(11) NOT NULL,
  `Access` varchar(255) NOT NULL,
  `Link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pagesaccess`
--

INSERT INTO `pagesaccess` (`ID`, `UTI`, `Access`, `Link`) VALUES
(1, 1, 'Edit Users', 'EditUsersInfoH.php'),
(2, 1, 'Edit Trips', 'EditTripsH.php'),
(3, 2, 'Edit my profile', 'EditMyProfileH.php'),
(4, 2, 'Contact Us', 'chatPage.php'),
(6, 1, 'Users Messages', 'message_users.php'),
(11, 1, 'Purchases', 'orderssH.php');

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
(1, 1, 'South Egypt', 'Aswan', '2021-06-09 01:56:25', 500, 'Aswan, a city on the Nile River, has been southern Egypt’s strategic and commercial gateway since antiquity. It contains significant archaeological sites like the Philae temple complex, on Agilkia Island near the landmark Aswan Dam. Philae’s ruins include', 'aswan1.jpg ', 'aswan1.jpg '),
(2, 2, 'Tahrir', 'The Grand Egyptian Museum', '2021-06-09 01:57:41', 29, 'The Museum of Egyptian Antiquities, known commonly as the Egyptian Museum or Museum of Cairo, in Cairo, Egypt, is home to an extensive collection of ancient Egyptian antiquities. It has 120,000 items, with a representative amount on display.', 'egyptian_museum.jpg', 'egyptian_museum.jpg'),
(3, 1, 'sdasd', 'asdsdasd', '2021-06-10 00:24:09', 123123, 'sadsadasdasdasd', 'aswan1.jpg', 'aswan1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `ID` int(11) NOT NULL,
  `Trip_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Review` varchar(255) NOT NULL,
  `Rating` int(11) NOT NULL,
  `User_name` varchar(255) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`ID`, `Trip_ID`, `User_ID`, `Review`, `Rating`, `User_name`, `Date`) VALUES
(3, 1, 2, ' hi', 5, 'Karim', '2021-05-07 18:09:45'),
(4, 1, 2, ' so great', 2, 'Karim', '2021-05-07 18:10:04'),
(5, 1, 2, ' it was so good', 5, 'Karim', '2021-05-08 02:56:54');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `contact_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Mostafa', 'Khaled', 'Mostafa1810751@miuegypt.edu.eg', 'male', '01020820065', 'Mkhaled18', 'Mostafa.jpg', 2),
(2, 'Kareem', 'Yasser', 'kareem1802405@miuegypt.edu.eg', 'male', '01231231200', 'Kareem123', 'bg-equestrian.jpeg', 2);

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
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagesaccess`
--
ALTER TABLE `pagesaccess`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UTI` (`UTI`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Trip_ID` (`Trip_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`contact_id`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pagesaccess`
--
ALTER TABLE `pagesaccess`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pagesaccess`
--
ALTER TABLE `pagesaccess`
  ADD CONSTRAINT `pagesaccess_ibfk_1` FOREIGN KEY (`UTI`) REFERENCES `user_type` (`ID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`User_Type_ID`) REFERENCES `user_type` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
