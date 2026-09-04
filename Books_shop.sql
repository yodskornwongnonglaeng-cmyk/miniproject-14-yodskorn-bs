-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 04, 2026 at 06:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Books shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` varchar(20) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` int(30) NOT NULL,
  `product_cover` text NOT NULL,
  `type_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_cover`, `type_id`) VALUES
('P001', 'Dr.Stone', 80, 'https://down-th.img.susercontent.com/file/4a42be955be7be4075b00ba55463b052', 1),
('P002', 'one piece', 80, 'https://i.ebayimg.com/images/g/-FYAAOSwVydknm--/s-l1200.jpg', 2),
('P003', 'Tensura', 95, 'https://animatebkk-online.com/wp-content/uploads/2023/12/9784867165010_1_2.jpg', 3),
('P004', 'Campfire cooking', 100, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTsaE8UHgMNsQoealU6FkKUcutA5ZJxeDwjCU_Lp_-AwA&s=10', 4),
('P005', 'The angel next door ', 85, 'https://cdn.kobo.com/book-images/15b206e1-57af-42d8-815b-24a81b44f290/1200/1200/False/the-angel-next-door-spoils-me-rotten-vol-1-light-novel.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `Type`
--

CREATE TABLE `Type` (
  `Type_id` int(30) NOT NULL,
  `Type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Type`
--

INSERT INTO `Type` (`Type_id`, `Type_name`) VALUES
(1, 'Sci-fi'),
(2, 'Adventure'),
(3, 'Isekai'),
(4, 'Cooking'),
(5, 'Romance');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` int(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `created_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fname`, `lname`, `created_at`) VALUES
(1, 'admin', 1234, 'puneieiz', 'LnwZa', '2026-4-09 10:51:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
