-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 06:41 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

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
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(200) DEFAULT NULL,
  `brand_img` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '1=show;0=hide',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_img`, `status`, `created_at`, `updated_at`, `created_by`, `deleted_at`) VALUES
(72, 'batta edit1', 'brand_603c7b56173f7_72_.png', 1, '2021-02-28 07:19:10', '2021-02-28 23:27:50', 0, NULL),
(93, 'Pay Pal', 'brand_603c79a92c1d1_93_.png', 1, '2021-03-01 06:20:41', NULL, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `category_name` varchar(100) DEFAULT NULL,
  `slug` varchar(65) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `parent_id`, `category_name`, `slug`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(49, NULL, 'Electronics', 'electronics', 1, 39, '2021-03-01 06:24:51', NULL),
(55, 49, 'test', 'test', 1, 39, '2021-03-01 07:46:11', NULL),
(56, NULL, 'food', 'food', 1, 3, '2021-03-01 07:48:00', NULL),
(57, 56, 'rice', 'rice', 1, 3, '2021-03-01 07:48:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `gallery_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_slug` varchar(50) DEFAULT NULL,
  `product_code` varchar(50) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1000,
  `short_description` varchar(200) NOT NULL,
  `long_description` text DEFAULT NULL,
  `product_model` varchar(150) DEFAULT NULL,
  `featured_product` tinyint(5) DEFAULT NULL,
  `product_price` double DEFAULT NULL,
  `product_discount_price` double DEFAULT NULL,
  `discount_type` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `product_img` varchar(255) DEFAULT NULL,
  `point` int(11) DEFAULT NULL,
  `warrenty` varchar(100) DEFAULT NULL,
  `guarantee` varchar(100) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_slug`, `product_code`, `quantity`, `short_description`, `long_description`, `product_model`, `featured_product`, `product_price`, `product_discount_price`, `discount_type`, `status`, `product_img`, `point`, `warrenty`, `guarantee`, `category_id`, `brand_id`, `color_id`, `supplier_id`, `created_at`, `updated_at`, `created_by`, `deleted_at`) VALUES
(1, 'sd', 'sd', '4344', 3, 'se', 'wer', 'wer', NULL, 23, 34, 'Select Type', 0, 'product_603cd920bf6d5_1_3.png', 0, '', '', 0, 0, 0, 0, '2021-03-01 12:07:55', '2021-03-01 06:08:00', 3, '2021-03-01 23:29:59'),
(2, 'S D', 's-d', '4344', 3, 'se', 'wer', 'wer', NULL, 23, 34, 'Select Type', 1, 'product_603cddb32e340_2_3.png', 2021, '2021-03-24', '2021-03-12', 0, 0, 0, 0, '2021-03-01 12:12:45', '2021-03-01 06:27:31', 3, '2021-03-01 22:17:16'),
(3, 'rtyr', 'rtyr', '4344', 3, 'se', 'wer', 'wer', NULL, 23, 34, '', 1, 'product_603dc64b10523_3_.png', NULL, '2', '2', 49, 93, 0, 0, '2021-03-02 05:59:54', '2021-03-02 04:59:54', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_questions`
--

CREATE TABLE `product_questions` (
  `product_question_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `question` varchar(50) NOT NULL,
  `replay` varchar(50) NOT NULL,
  `replied_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review_text` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `slide_id` int(11) NOT NULL,
  `slide_name` varchar(150) DEFAULT NULL,
  `slide_img` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=show;0=hide'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`slide_id`, `slide_name`, `slide_img`, `created_at`, `updated_at`, `created_by`, `status`) VALUES
(6, 'first slide', 'slide_603c84bc20016_6_.png', '2021-03-01 07:07:56', NULL, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `login_id` int(11) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `user_name` varchar(250) DEFAULT NULL,
  `phone_number` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `user_type` tinyint(10) DEFAULT 1 COMMENT '1=admin,2=sub_admin,3=user',
  `verfiy_status` tinyint(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`login_id`, `f_name`, `l_name`, `email`, `user_name`, `phone_number`, `password`, `user_type`, `verfiy_status`, `created_at`, `updated_at`) VALUES
(3, '', '', 'admin@gmail.com', NULL, NULL, 'bVlYZE03YXZScnZaZnBhaDJPQml0Zz09', 1, 1, NULL, NULL),
(25, 'user', '1', 'user1@gmail.com', NULL, '98374983', 'bVlYZE03YXZScnZaZnBhaDJPQml0Zz09', 3, NULL, '2021-02-20 10:44:40', NULL),
(38, 'user', '2', 'user2@gmail.com', NULL, '9834759', 'bVlYZE03YXZScnZaZnBhaDJPQml0Zz09', 3, NULL, '2021-02-22 06:58:51', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_questions`
--
ALTER TABLE `product_questions`
  ADD PRIMARY KEY (`product_question_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`login_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_questions`
--
ALTER TABLE `product_questions`
  MODIFY `product_question_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
