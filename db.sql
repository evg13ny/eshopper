-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2021 at 09:01 PM
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
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `url_address` varchar(60) NOT NULL,
  `title` varchar(60) NOT NULL,
  `post` text NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `date` datetime NOT NULL,
  `user_url` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `url_address`, `title`, `post`, `image`, `date`, `user_url`) VALUES
(1, 'some-post', 'Some Post', 'some text', 'uploads/Hhz80jqrjsmf6dKSsLJ8HMqXDayMfyFcRJvfYVC2sh26cNYgwNt2alq86nMB.jpg', '2021-09-27 21:05:11', 'SSy0xP4JUO26Zl3oaOv'),
(2, 'third-title', 'Third Title', 'another content', 'uploads/UJh6WqcsRRXsLWug7PlXG935jYVGQ4MmmRawtiIlVjR1IGbA8mgmWCK8ns0h.jpg', '2021-09-27 22:03:36', 'SSy0xP4JUO26Zl3oaOv'),
(4, 'long-post', 'Long Post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sodales quam in elit dapibus, eu fermentum nibh pharetra. Donec imperdiet, ligula eget pretium vehicula, dolor risus posuere sem, ut finibus lacus purus vitae diam. Sed semper sodales enim a lacinia. Ut tempor, orci et feugiat auctor, velit ligula cursus nulla, vel imperdiet magna mi quis lorem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse lacinia enim ante, sit amet ornare nisi viverra ut. Nullam quam ex, porttitor sed mi eu, congue elementum ante. Pellentesque ut nibh eu erat dapibus finibus.\r\n\r\nIn at leo ac nisi consectetur rhoncus. Nulla eget placerat nulla. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque pretium sem vel lacus tempus gravida. Mauris laoreet, magna vitae hendrerit suscipit, augue sem bibendum odio, vitae consequat ligula enim non ipsum. In vulputate nec diam pulvinar pellentesque. Nam vel venenatis erat. Aliquam quis congue mauris, sed cursus dolor.\r\n\r\nDuis faucibus pulvinar neque, nec vehicula massa. Sed accumsan accumsan magna sed semper. Cras sed ex ac lectus placerat rhoncus. Ut sollicitudin semper tristique. In hac habitasse platea dictumst. Fusce placerat fringilla orci nec hendrerit. Pellentesque sit amet mi ut nisl sodales congue. Nullam quis eros augue. Nam porttitor vitae lacus eget vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. In vehicula, dolor ac hendrerit commodo, nisi ex commodo ligula, id faucibus neque est in mauris. Curabitur mauris ipsum, sodales sit amet luctus id, euismod bibendum ante. Pellentesque urna lectus, sollicitudin sit amet dapibus non, dignissim eu mauris. Curabitur at porttitor magna.\r\n\r\nVivamus et quam eget purus cursus tempus eget et odio. Vestibulum sit amet suscipit nulla, sit amet congue leo. Donec condimentum enim nec risus dapibus ultricies. Ut eleifend, lectus a finibus tincidunt, nulla libero iaculis metus, sit amet euismod lorem dui at risus. In lacinia diam ut tincidunt suscipit. Aliquam ultricies tortor quis neque faucibus pellentesque. Mauris id ipsum non enim aliquam fringilla. Nullam commodo elit orci, at mollis nunc lacinia non. Nulla a dolor et quam pretium imperdiet. Nullam molestie quam libero, et efficitur ante laoreet et. Nam vitae tellus suscipit, convallis ex eget, congue dui.\r\n\r\nPhasellus in laoreet odio, pulvinar posuere orci. In iaculis, sem in faucibus feugiat, neque ipsum auctor dui, sit amet suscipit nibh sem eget eros. Mauris vehicula tempus malesuada. Nulla aliquet bibendum risus ut imperdiet. Nunc pharetra tristique turpis. Morbi consectetur venenatis est ac laoreet. Proin nec quam ut nisl lacinia cursus. Nam id commodo diam. Duis porttitor, risus sed pulvinar convallis, tellus massa accumsan dolor, sed venenatis nibh lorem non nibh. Integer et ultrices augue.', 'uploads/Ovetz7pVHYreboYwucfxf7mAIQBzwF0JJSVU7gzf3K8OmCC2pYeYXX1UbDjy.jpg', '2021-09-30 13:25:23', 'SSy0xP4JUO26Zl3oaOv');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `parent` int(11) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `disabled`, `parent`, `views`) VALUES
(3, 'Water', 0, 0, 0),
(5, 'Mineral Water', 0, 3, 0),
(6, 'Clothes', 0, 0, 1),
(7, 'Chips', 0, 0, 2),
(8, 'Bags', 0, 0, 0),
(10, 'Pens', 1, 6, 0),
(11, 'Books', 1, 0, 2),
(13, 'Soda', 0, 3, 2),
(14, 'Milk', 0, 0, 0),
(16, 'Shirts', 0, 6, 0),
(19, 'Skirt', 0, 6, 2),
(22, 'Phones', 0, 0, 1),
(23, 'Cell Phones', 0, 22, 0),
(25, 'Cat\'s Food', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `subject`, `message`, `date`) VALUES
(1, 'User', 'user@example.com', 'Subject', 'Message', '2021-09-25 03:30:14');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country` varchar(30) NOT NULL,
  `disabled` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`, `disabled`) VALUES
(1, 'Russia', 0),
(2, 'Netherlands', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `user_url` varchar(60) NOT NULL,
  `delivery_address` varchar(1024) DEFAULT NULL,
  `total` double NOT NULL DEFAULT 0,
  `country` varchar(20) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `zip` varchar(6) DEFAULT NULL,
  `tax` double DEFAULT 0,
  `shipping` double DEFAULT 0,
  `date` datetime NOT NULL,
  `sessionid` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_url`, `delivery_address`, `total`, `country`, `state`, `zip`, `tax`, `shipping`, `date`, `sessionid`, `phone`) VALUES
(1, 'SSy0xP4JUO26Zl3oaOv', 'my address', 4.08, 'Netherlands', 'North Holland', '00000', 0, 0, '2021-08-27 23:21:55', '6evs1bd6bhskamum823th802rp', '9998887766'),
(2, 'SSy0xP4JUO26Zl3oaOv', 'my address', 5.8, 'Netherlands', 'North Holland', '00000', 0, 0, '2021-08-27 23:23:31', '6evs1bd6bhskamum823th802rp', '9998887766'),
(3, 'SSy0xP4JUO26Zl3oaOv', 'Lopasnenskaya 11', 3.9, 'Russia', 'Moskovskaya', '142300', 0, 0, '2021-09-08 11:30:25', '6evs1bd6bhskamum823th802rp', '999 888 77 66'),
(4, 'SSy0xP4JUO26Zl3oaOv', 'Lopasnenskaya 111', 3.9, 'Russia', 'Moskovskaya', '142300', 0, 0, '2021-09-09 18:47:50', '6evs1bd6bhskamum823th802rp', '999 888 77 66');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) NOT NULL,
  `orderid` bigint(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `amount` double NOT NULL,
  `total` double NOT NULL,
  `productid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `orderid`, `qty`, `description`, `amount`, `total`, `productid`) VALUES
(1, 1, 1, 'Pepsi Max 1l', 0.96, 0.96, 11),
(2, 1, 2, 'Lays 225g', 1.56, 3.12, 10),
(3, 2, 2, 'Aqua Minerale 2l', 0.92, 1.84, 16),
(4, 2, 2, 'Borjomi 1,25l', 1.98, 3.96, 9),
(5, 3, 1, 'Borjomi 1,25l', 1.98, 1.98, 9),
(6, 3, 2, 'Pepsi Max 1l', 0.96, 1.92, 11),
(7, 4, 1, 'Borjomi 1,25l', 1.98, 1.98, 9),
(8, 4, 2, 'Pepsi Max 1l', 0.96, 1.92, 11);

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
(16, 'SSy0xP4JUO26Zl3oaOv', 'Aqua Minerale 2l', 5, 0.92, 29, 'uploads/Aqua Minerale.jpg', '', '', '', '2021-08-11 16:48:41', 'aqua-minerale-2l'),
(17, 'SSy0xP4JUO26Zl3oaOv', 'Kvas', 3, 1.09, 9, 'uploads/4.jpg', '', '', '', '2021-08-11 16:52:13', 'kvas'),
(18, 'SSy0xP4JUO26Zl3oaOv', 'Ggg', 23, 0.03, 1, 'uploads/amEfXBwROoMG2914KXx1MDE16JpXNEc6J00Z0zq7fEHiearw8oH7YLJNukZA.jpg', '', '', '', '2021-08-12 17:03:22', 'ggg'),
(22, 'SSy0xP4JUO26Zl3oaOv', 'Fish', 25, 8.99, 1, 'uploads/N17aLvtQhBivh2FsSYDocsXw4OvvazCEwTeSRTz1EwBZmgM0mUYPkDmh1ViI.jpg', '', '', '', '2021-10-03 19:30:35', 'fish');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `setting` varchar(30) DEFAULT NULL,
  `value` varchar(2048) DEFAULT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting`, `value`, `type`) VALUES
(1, 'phone_number', '+8878', ''),
(2, 'email', 'info', ''),
(3, 'facebook_link', 'https://facebook.com', ''),
(4, 'twitter_link', 'https://twitter.com', ''),
(5, 'linkedin_link', '', ''),
(6, 'google_plus_link', '', ''),
(7, 'website_link', '', ''),
(8, 'youtube_link', 'https://youtube.com', ''),
(9, 'contact_info', 'E-Shopper Inc.\r\n935 W. Webster Ave New Streets Chicago, IL 60614, NY\r\nNewyork USA\r\nMobile: +2346 17 38 93\r\nFax: 1-714-252-0026\r\nEmail: info@e-shopper.com', 'textarea');

-- --------------------------------------------------------

--
-- Table structure for table `slider_images`
--

CREATE TABLE `slider_images` (
  `id` int(11) NOT NULL,
  `header1_text` varchar(20) NOT NULL,
  `header2_text` varchar(30) DEFAULT NULL,
  `text` varchar(200) NOT NULL,
  `link` varchar(200) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `image2` varchar(500) DEFAULT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider_images`
--

INSERT INTO `slider_images` (`id`, `header1_text`, `header2_text`, `text`, `link`, `image`, `image2`, `disabled`) VALUES
(1, 'E SHOP', 'Awesome Description', 'Awesome message', 'http://localhost/testprojects/testsite16/eshopper/public/product_details/lays-225g', 'uploads/3pfZ8rM9hIs4JY8ZBGCVuVjQj70Sul7hNMEABxtF5oky2p7ATYg81F2bQ54S.jpg', '', 0),
(2, 'E SHOP ANOTHER', 'Another Awesome Description', 'Another awesome message', 'http://localhost/testprojects/testsite16/eshopper/public/product_details/borjomi-1-25l', 'uploads/SsHmUAMQobEiat1xFgrvzZyeLdSfrLetDOIsaqTVDHPzoVeU0S1GTiJzgnt3.jpg', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `state` varchar(30) NOT NULL,
  `disabled` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `parent`, `state`, `disabled`) VALUES
(1, 1, 'Murmanskaya', 0),
(2, 1, 'Moskovskaya', 0),
(3, 2, 'North Holland', 0),
(4, 2, 'South Holland', 0);

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
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `url_address` (`url_address`),
  ADD KEY `title` (`title`),
  ADD KEY `date` (`date`),
  ADD KEY `user_url` (`user_url`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `disabled` (`disabled`),
  ADD KEY `parent` (`parent`),
  ADD KEY `views` (`views`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `email` (`email`),
  ADD KEY `subject` (`subject`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disabled` (`disabled`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `date` (`date`),
  ADD KEY `userid` (`user_url`),
  ADD KEY `sessionid` (`sessionid`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderid` (`orderid`),
  ADD KEY `description` (`description`);

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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `setting` (`setting`);

--
-- Indexes for table `slider_images`
--
ALTER TABLE `slider_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disabled` (`disabled`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`),
  ADD KEY `disabled` (`disabled`);

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
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `slider_images`
--
ALTER TABLE `slider_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
