-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 04, 2024 at 06:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pizza`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2024_02_03_115031_create_pizzas_table', 2),
(9, '2024_02_04_045309_create_toppings_table', 2),
(10, '2024_02_04_052606_create_promotions_table', 3),
(13, '2024_02_04_092723_create_orders_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `pizzas` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`pizzas`)),
  `status` varchar(255) DEFAULT NULL,
  `total_sum` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `pizzas`, `status`, `total_sum`, `created_at`, `updated_at`) VALUES
(1, '1', '[{\"image\":\"20240204095403.webp\",\"price\":\"299.00\",\"name_pi\":\"PIZZA8\",\"topping\":\"\\u0e0a\\u0e35\\u0e1f\\u0e39\\u0e15\",\"quantity\":\"1\",\"totalPrice\":\"299\"}]', '0', '299', '2024-02-04 09:40:06', '2024-02-04 09:40:06'),
(2, '1', '[{\"image\":\"20240204095513.jpeg\",\"price\":\"449.00\",\"name_pi\":\"PIZZA10\",\"topping\":\"\\u0e0a\\u0e35\\u0e14\",\"quantity\":\"4\",\"totalPrice\":\"1796\"},{\"image\":\"20240204045700.jpeg\",\"price\":\"100.00\",\"name_pi\":\"PIZZA1\",\"topping\":\"\\u0e0a\\u0e35\\u0e1f\\u0e39\\u0e15\",\"quantity\":\"3\",\"totalPrice\":\"300\"}]', '1', '2096', '2024-02-04 09:40:26', '2024-02-04 09:43:58'),
(3, '1', '[{\"image\":\"20240204095513.jpeg\",\"price\":\"449.00\",\"name_pi\":\"PIZZA10\",\"topping\":\"\\u0e0a\\u0e35\\u0e14\",\"quantity\":\"5\",\"totalPrice\":\"2245\"},{\"image\":\"20240204095403.webp\",\"price\":\"299.00\",\"name_pi\":\"PIZZA8\",\"topping\":\"\\u0e0a\\u0e35\\u0e1f\\u0e39\\u0e15\",\"quantity\":\"4\",\"totalPrice\":\"1196\"}]', '2', '3441', '2024-02-04 09:41:04', '2024-02-04 09:44:03'),
(4, '1', '[{\"image\":\"20240204095513.jpeg\",\"price\":\"449.00\",\"name_pi\":\"PIZZA10\",\"topping\":\"\\u0e0a\\u0e35\\u0e14\",\"quantity\":\"1\",\"totalPrice\":\"449\"},{\"image\":\"20240204045712.jpeg\",\"price\":\"200.00\",\"name_pi\":\"PIZZA2\",\"topping\":\"\\u0e0a\\u0e35\\u0e14\",\"quantity\":\"3\",\"totalPrice\":\"600\"}]', '0', '1049', '2024-02-04 10:13:47', '2024-02-04 10:13:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pizzas`
--

CREATE TABLE `pizzas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pizzas`
--

INSERT INTO `pizzas` (`id`, `name`, `price`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'PIZZA 1', '100', '20240204045700.jpeg', 'PIZZA 1', '2024-02-03 21:57:00', '2024-02-03 21:57:00'),
(2, 'PIZZA 2', '200', '20240204045712.jpeg', 'PIZZA 2', '2024-02-03 21:57:12', '2024-02-03 21:57:12'),
(4, 'PIZZA 3', '300', '20240204052710.webp', 'PIZZA 3', '2024-02-03 22:27:10', '2024-02-03 22:27:10'),
(5, 'PIZZA 4', '400', '20240204095217.webp', 'PIZZA', '2024-02-04 02:52:17', '2024-02-04 02:52:17'),
(6, 'PIZZA 5', '400', '20240204095233.webp', 'PIZZA 5', '2024-02-04 02:52:33', '2024-02-04 02:52:33'),
(7, 'PIZZA 6', '100', '20240204095249.jpeg', 'PIZZA 6', '2024-02-04 02:52:49', '2024-02-04 02:52:49'),
(8, 'PIZZA 7', '120', '20240204095333.jpeg', 'PIZZA 7', '2024-02-04 02:53:33', '2024-02-04 02:53:33'),
(9, 'PIZZA 8', '299', '20240204095403.webp', 'PIZZA 8', '2024-02-04 02:54:03', '2024-02-04 02:54:03'),
(10, 'PIZZA 9', '299', '20240204095432.jpeg', 'PIZZA 9', '2024-02-04 02:54:32', '2024-02-04 02:54:32'),
(11, 'PIZZA 10', '399', '20240204095513.jpeg', 'PIZZA 10', '2024-02-04 02:55:13', '2024-02-04 02:55:13');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `toppings` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `name`, `toppings`, `price`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, '9', '1', '99', '2024-02-01', '2024-02-29', '2024-02-03 23:26:45', '2024-02-04 04:21:59'),
(2, '11', '2', '89', '2024-02-04', '2024-02-29', '2024-02-03 23:27:13', '2024-02-04 03:21:09');

-- --------------------------------------------------------

--
-- Table structure for table `toppings`
--

CREATE TABLE `toppings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `toppings`
--

INSERT INTO `toppings` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1, 'ชีฟูต', NULL, '2024-02-03 22:08:58', '2024-02-03 22:16:28'),
(2, 'ชีด', '50', '2024-02-03 22:09:14', '2024-02-03 22:09:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastName`, `phone`, `address`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user', NULL, NULL, NULL, 'user@hot.com', NULL, '$2y$12$6rxuf3ZDw2zLgCt3ZApxn.xbD329LSp0CgjEzJD6Zzc6vb.cpDX56', NULL, '2024-02-03 02:02:28', '2024-02-03 02:02:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pizzas`
--
ALTER TABLE `pizzas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toppings`
--
ALTER TABLE `toppings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pizzas`
--
ALTER TABLE `pizzas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `toppings`
--
ALTER TABLE `toppings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
