-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2023 at 09:51 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `masala`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `designation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `email`, `password`, `designation`) VALUES
(1, 'Abhijeet Chauhan', 'admin@gmail.com', 'admin', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `booking_list`
--

CREATE TABLE `booking_list` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `short_desc` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_list`
--

INSERT INTO `booking_list` (`id`, `title`, `short_desc`, `status`) VALUES
(1, 'Table Reservation', 'Book your table prior to avoid last minute changes and uncertainity.', 1),
(2, 'Kitty Party', 'A beautiful ambiance and a huge variety of food for a perfect kitty party.', 1),
(3, 'Order Food', 'We are also available on platforms like Zomata and swiggy. So now You can enjoy your meal at home.', 1),
(4, 'Open Mic', 'A perfect platform to showcase your talent. We also some guest performance arranged for u.', 1),
(5, 'Proposal  set up', 'Proposal has to be special and memorable so we are there to help you out in an unique style.', 1),
(6, 'Birthday party', 'Birthday party booking. Make you and your loved ones birthday more special by having a birthday party.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `booking_list_img`
--

CREATE TABLE `booking_list_img` (
  `id` int(11) NOT NULL,
  `booking_list_id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_list_img`
--

INSERT INTO `booking_list_img` (`id`, `booking_list_id`, `image`) VALUES
(1, 1, 'tab.jpg'),
(2, 2, 'kity-party.jpg'),
(3, 3, 'order.jpg'),
(4, 4, 'mic.jpg'),
(5, 5, 'pros.jpg'),
(6, 6, 'birth.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `booking_order`
--

CREATE TABLE `booking_order` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `title` varchar(30) NOT NULL,
  `DateAndTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_category`
--

CREATE TABLE `menu_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_category`
--

INSERT INTO `menu_category` (`id`, `name`, `description`, `status`) VALUES
(1, 'Poha', 'Rice is parboiled before flattening so that it can be consumed with very little to no cooking.', 1),
(2, 'Gobi Masala', 'Rice is parboiled before flattening so that it can be consumed with very little to no cooking.', 1),
(3, 'Kashmiri Pulav', 'Delicious variant of rice pulao from Kashmiri cuisine made with nuts, dried fruits, saffron and fresh fruits', 1),
(4, 'Punjabi Thali', 'Delux Punjabi Thali includes Veg Sabji, Paneer sabji, Dal, Rice, Salad Buttermilk 1 Tandoori Roti', 1),
(5, 'Amritsari chole', 'From the pinds of punjab, overnight cooked chickpeas\r\nsimmered in pounded spices', 1),
(6, 'Mawa bati ', 'Jodhpur’s delicacy of condensed milk filled fried bati and nuts', 1),
(7, 'Gulab jamun', 'A larger than life local variation of gulab jamun, selected nutty filling', 1),
(8, 'Paneer kathi roll', 'Cottage cheese and peppers tossed in hand pounded kadhai spice and wrapped in whole wheat tortilla,mint chutney', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_product`
--

CREATE TABLE `menu_product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` float NOT NULL,
  `mrp` float NOT NULL,
  `image` text NOT NULL,
  `short_desc` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_product`
--

INSERT INTO `menu_product` (`id`, `category_id`, `name`, `price`, `mrp`, `image`, `short_desc`, `status`) VALUES
(1, 1, 'Poha', 99, 199, '', 'Poha', 1),
(2, 2, 'Gobi Masala', 299, 350, '', 'Gobi Masala', 1),
(3, 3, 'Kashmiri Pulav', 249, 300, '', 'Kashmiri Pulav', 1),
(4, 4, 'Punjabi Thali', 199, 299, '', 'Punjabi Thali', 1),
(5, 5, 'Amritsari chole', 299, 400, '', 'Amritsari chole', 1),
(6, 6, 'Mawa bati', 425, 600, '', 'Mawa bati', 1),
(7, 7, 'Gulab jamun', 200, 300, '', 'Gulab jamun', 1),
(8, 8, 'Paneer kathi roll', 300, 350, '', 'Paneer kathi roll', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `type` varchar(20) NOT NULL,
  `DateAndTime` datetime NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_list`
--
ALTER TABLE `booking_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_list_img`
--
ALTER TABLE `booking_list_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_order`
--
ALTER TABLE `booking_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_category`
--
ALTER TABLE `menu_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_product`
--
ALTER TABLE `menu_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking_list`
--
ALTER TABLE `booking_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `booking_list_img`
--
ALTER TABLE `booking_list_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `booking_order`
--
ALTER TABLE `booking_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menu_category`
--
ALTER TABLE `menu_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `menu_product`
--
ALTER TABLE `menu_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
