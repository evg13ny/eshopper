-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2021 at 06:28 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `disabled`, `parent`) VALUES
(3, 'Water', 0, 0),
(5, 'Mineral Water', 0, 3),
(6, 'Clothes', 0, 0),
(7, 'Chips', 0, 0),
(8, 'Bags', 0, 0),
(10, 'Pens', 1, 6),
(11, 'Books', 1, 0),
(13, 'Soda', 0, 3),
(14, 'Milk', 0, 0),
(16, 'Shirts', 0, 6),
(19, 'Skirt', 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `user_url` varchar(60) NOT NULL,
  `description` varchar(200) NOT NULL,
  `category` int(11) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `image2` varchar(500) DEFAULT NULL,
  `image3` varchar(500) DEFAULT NULL,
  `image4` varchar(500) DEFAULT NULL,
  `date` datetime NOT NULL,
  `slag` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_url`, `description`, `category`, `price`, `quantity`, `image`, `image2`, `image3`, `image4`, `date`, `slag`) VALUES
(9, 'SSy0xP4JUO26Zl3oaOv', 'Borjomi 1,25l', 5, 1.98, 21, 'uploads/borjomi1.jpg', 'uploads/borjomi2.jpg', 'uploads/borjomi3.jpg', 'uploads/borjomi4.jpg', '2021-08-10 15:53:20', 'borjomi-1-25l'),
(10, 'SSy0xP4JUO26Zl3oaOv', 'Lays 225g', 7, 1.56, 31, 'uploads/lays1.jpeg', 'uploads/lays2.jpg', 'uploads/lays3.jpeg', 'uploads/lays4.jpg', '2021-08-10 15:55:24', 'lays-225g'),
(11, 'SSy0xP4JUO26Zl3oaOv', 'Pepsi Max 1l', 13, 0.96, 13, 'uploads/pepsi1.jpeg', 'uploads/pepsi2.jpeg', 'uploads/pepsi3.jpeg', 'uploads/pepsi4.jpeg', '2021-08-10 15:56:31', 'pepsi-max-1l'),
(12, 'SSy0xP4JUO26Zl3oaOv', 'Coca Cola Zero 0.9l', 13, 1.07, 17, 'uploads/cola1.png', 'uploads/cola2.jpeg', 'uploads/cola3.jpeg', 'uploads/cola4.jpeg', '2021-08-10 15:58:57', 'coca-cola-zero-0-9l');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `url_address` varchar(60) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `date` datetime NOT NULL,
  `rank` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `url_address`, `name`, `email`, `password`, `date`, `rank`) VALUES
(15, 'SSy0xP4JUO26Zl3oaOv', 'Sunny', 'sunny@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2021-07-16 12:11:35', 'admin'),
(16, 'EHT29pvuDkIkV44NPprglYpyDXwA', 'Nik', 'nik@mail.com', 'dd5fef9c1c1da1394d6d34b248c51be2ad740840', '2021-07-16 13:49:14', 'customer'),
(17, '3HwaDDlMbfbBT2NNO3afh3OeggOHbD0c6gRQnmW1pAUO6o', 'Mary', 'mary@email.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2021-07-19 13:11:28', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `disabled` (`disabled`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slag` (`slag`),
  ADD KEY `date` (`date`),
  ADD KEY `price` (`price`),
  ADD KEY `quantity` (`quantity`),
  ADD KEY `category` (`category`),
  ADD KEY `user_url` (`user_url`),
  ADD KEY `description` (`description`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `url_address` (`url_address`),
  ADD KEY `email` (`email`),
  ADD KEY `name` (`name`),
  ADD KEY `date` (`date`),
  ADD KEY `rank` (`rank`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
