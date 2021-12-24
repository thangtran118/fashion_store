-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: database:3306
-- Generation Time: Dec 24, 2021 at 09:26 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashion_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(10, 'admin', '$2y$10$9R82r9U5RBtjlKltOGSvaublemDAfGQharLPlUkbZjuTgVT9al99u');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(4, 'women', '2021-12-12 05:56:25', '2021-12-12 05:56:25'),
(5, 'men', '2021-12-12 05:56:37', '2021-12-12 05:56:37'),
(6, 'bag', '2021-12-12 05:56:48', '2021-12-12 05:56:48'),
(7, 'shoes', '2021-12-12 05:57:07', '2021-12-12 05:57:07'),
(8, 'watches', '2021-12-12 05:57:35', '2021-12-12 05:57:35');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `msg` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` char(60) NOT NULL,
  `phone` char(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(4, 'thang', 'demo1@gmail.com', '$2y$10$RThJGJlp2IjX.BJ/tCeVKu/GLXqhA4ypQPtRUA1D.x1vz/yMQ43Ay', '0123123123', 'Ha Noi', '2021-12-23 23:52:49', '2021-12-23 23:52:49');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` char(20) NOT NULL,
  `total` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `name`, `address`, `phone`, `total`, `created_at`, `updated_at`) VALUES
(5, 4, 'thang', 'Ha Noi', '0123123123', 94, '2021-12-24 08:57:55', '2021-12-24 08:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(10, 4, 6, 2, '2021-12-24 08:38:17', '2021-12-24 08:38:17'),
(11, 4, 16, 1, '2021-12-24 08:38:17', '2021-12-24 08:38:17'),
(12, 4, 10, 1, '2021-12-24 08:38:17', '2021-12-24 08:38:17'),
(13, 5, 11, 1, '2021-12-24 08:57:55', '2021-12-24 08:57:55'),
(14, 5, 20, 2, '2021-12-24 08:57:55', '2021-12-24 08:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` double NOT NULL,
  `picture` varchar(200) NOT NULL,
  `description` mediumtext NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `picture`, `description`, `category_id`, `created_at`, `updated_at`) VALUES
(5, 'Esprit Ruffle Shirt', 16.64, 'uploads/product-01.jpg', 'Pháº§n mÃ´ táº£', 4, '2021-12-22 07:53:37', '2021-12-22 07:53:37'),
(6, 'Herschel supply', 35.31, 'uploads/product-02.jpg', 'ÄÃ¢y lÃ  pháº§n mÃ´ táº£', 4, '2021-12-22 07:55:01', '2021-12-22 07:55:01'),
(7, 'Only Check Trouser', 25.5, 'uploads/product-03.jpg', 'ÄÃ¢y lÃ  pháº§n mÃ´ táº£', 5, '2021-12-22 07:55:28', '2021-12-22 07:55:28'),
(8, 'Classic Trench Coat', 75, 'uploads/product-04.jpg', 'ÄÃ¢y lÃ  pháº§n mÃ´ táº£', 4, '2021-12-22 07:55:51', '2021-12-22 07:55:51'),
(9, 'Front Pocket Jumper', 34.75, 'uploads/product-05.jpg', 'ÄÃ¢y lÃ  pháº§n mÃ´ táº£', 4, '2021-12-22 07:56:13', '2021-12-22 07:56:13'),
(10, 'Vintage Inspired Classic', 93.2, 'uploads/product-06.jpg', 'ÄÃ¢y lÃ  pháº§n mÃ´ táº£', 8, '2021-12-22 07:56:40', '2021-12-22 07:56:40'),
(11, 'Shirt in Stretch Cotton', 52.66, 'uploads/product-07.jpg', 'ÄÃ¢y lÃ  pháº§n mÃ´ táº£', 4, '2021-12-22 08:40:18', '2021-12-22 08:40:18'),
(12, 'Pieces Metallic Printed', 19.96, 'uploads/product-08.jpg', 'ÄÃ¢y lÃ  pháº§n mÃ´ táº£', 4, '2021-12-22 08:40:42', '2021-12-22 08:40:42'),
(13, 'Converse All Star Hi Plimsolls', 75, 'uploads/product-09.jpg', 'ÄÃ¢y lÃ  pháº§n mÃ´ táº£', 7, '2021-12-22 08:41:00', '2021-12-22 08:41:00'),
(14, 'Femme T-Shirt In Stripe', 25.85, 'uploads/product-10.jpg', 'ÄÃ¢y lÃ  pháº§n mÃ´ táº£', 4, '2021-12-22 08:41:30', '2021-12-22 08:41:30'),
(15, 'Herschel supply', 63.16, 'uploads/product-11.jpg', 'ÄÃ¢y lÃ  pháº§n mÃ´ táº£', 5, '2021-12-22 08:41:54', '2021-12-22 08:41:54'),
(16, 'Herschel supply', 63.15, 'uploads/product-12.jpg', 'ÄÃ¢y lÃ  pháº§n mÃ´ táº£', 5, '2021-12-22 08:42:13', '2021-12-22 08:42:13'),
(17, 'T-Shirt with Sleeve', 18.49, 'uploads/product-13.jpg', 'ÄÃ¢y lÃ  pháº§n mÃ´ táº£', 4, '2021-12-22 08:42:38', '2021-12-22 08:42:38'),
(18, 'Pretty Little Thing', 54.79, 'uploads/product-14.jpg', 'ÄÃ¢y lÃ  pháº§n mÃ´ táº£', 4, '2021-12-22 08:43:25', '2021-12-22 08:43:25'),
(19, 'Mini Silver Mesh Watch', 86.65, 'uploads/product-15.jpg', 'ÄÃ¢y lÃ  pháº§n mÃ´ táº£', 8, '2021-12-22 08:43:47', '2021-12-22 08:43:47'),
(20, 'Square Neck Back', 20.84, 'uploads/product-16.jpg', 'ÄÃ¢y lÃ  pháº§n mÃ´ táº£', 4, '2021-12-22 08:44:08', '2021-12-22 08:44:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
