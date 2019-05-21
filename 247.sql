-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2019 at 06:53 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `247`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_05_10_125045_create_products_table', 1),
(10, '2017_12_01_072058_create_items_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `brand` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `asin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `product_page_link` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `prime_low_price` decimal(19,2) NOT NULL DEFAULT '0.00',
  `total_units_sold_mo` int(11) NOT NULL DEFAULT '0',
  `total_revenue_mo` decimal(19,2) NOT NULL DEFAULT '0.00',
  `competitive_sellers` int(11) NOT NULL DEFAULT '0',
  `our_sales_equity_units_mo` int(11) NOT NULL DEFAULT '0',
  `our_sales_equity_revenue_mo` decimal(19,2) NOT NULL DEFAULT '0.00',
  `website_url` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `image`, `brand`, `asin`, `product_page_link`, `prime_low_price`, `total_units_sold_mo`, `total_revenue_mo`, `competitive_sellers`, `our_sales_equity_units_mo`, `our_sales_equity_revenue_mo`, `website_url`, `firstname`, `lastname`, `address`, `contact_no`, `position`, `email`, `created_at`, `updated_at`) VALUES
(2, 'images\\waterwipes.jpg', 'test2', 'B07L5GGSRJ\r\n', 'https://www.amazon.com/MLVOC-Comfortable-Breathable-Washable-Contoured/dp/B07L5GGSRJ/ref=sr_1_1?qid=1557447958&refinements=p_36%3A2000-%2Cp_n_availability%3A1248816011&rnid=1248814011&s=home-garden&sr=1-1\r\n', '23.08', 1540, '119819.20', 3, 435, '13954.80', 'www.test.com', 'mike', 'test', 'test1, address1', '01662626', 'President', 'test1@gmail.com', NULL, NULL),
(9, 'images/71GEMxwrhfL._SX522__1557726708.jpg', 'asda', '232', 'https://www.amazon.com/Milliard-Bumper-Toddler-Bamboo-Non-Slip/dp/B07B3VZQNG/ref=sr_1_16?fst=as%3Aoff&qid=1556592002&rnid=166809011&s=kitchen-intl-ship&sr=1-16', '2.00', 4, '1231.00', 2, 434, '53.00', 'http://localhost:8000/addproduct', 'keno', 'buiza', '1980 Swarthmore Avenue # 3\r\nLakewood, NJ 08701', '866-686-4891', 'ceo', 'info@milliardbrands.com', '2019-05-12 21:51:48', '2019-05-12 21:51:48'),
(10, 'images/71GEMxwrhfL._SX522__1557726926.jpg', 'asda', '232', 'https://www.amazon.com/Milliard-Bumper-Toddler-Bamboo-Non-Slip/dp/B07B3VZQNG/ref=sr_1_16?fst=as%3Aoff&qid=1556592002&rnid=166809011&s=kitchen-intl-ship&sr=1-16', '23.00', 42, '145.00', 2, 545, '454.00', 'http://localhost:8000/addproduct', NULL, 'buiza', '1980 Swarthmore Avenue # 3\r\nLakewood, NJ 08701', '8666864891', 'ceo', 'albaybicycle@gmail.com', '2019-05-12 21:55:26', '2019-05-12 21:55:26'),
(11, 'images/71GEMxwrhfL._SX522__1557727401.jpg', 'Milliard', 'B07B3VZQNG', 'https://www.amazon.com/Milliard-Bumper-Toddler-Bamboo-Non-Slip/dp/B07B3VZQNG/ref=sr_1_16?fst=as%3Aoff&qid=1556592002&rnid=166809011&s=kitchen-intl-ship&sr=1-16', '39.95', 604, '24129.80', 2, 302, '12064.90', 'https://www.milliardbrands.com/', NULL, NULL, '1980 Swarthmore Avenue # 3\r\nLakewood, NJ 08701', '866-686-4891', 'ceo', 'info@milliardbrands.com', '2019-05-12 22:03:21', '2019-05-12 22:03:21'),
(14, 'images/81LI5QMFmL._SX522__1557728323.jpg', 'asda', '232', 'https://www.amazon.com/Sorbus-Flip-Top-Collapsible-Playroom-Organization/dp/B079V412P9/ref=sr_1_5?_=1556592894869&fst=as%3Aoff&qid=1556592895&rnid=3744921&s=kitchen-intl-ship&sr=1-5&th=1', '3232.00', 604, '24129.80', 2, 31, '12064.90', 'http://localhost:8000/addproduct', 'keno', 'buiza', 'adas', NULL, NULL, NULL, '2019-05-12 22:18:43', '2019-05-12 22:18:43'),
(15, 'images/81LI5QMFmL._SX522__1557729189.jpg', 'Sorbus', 'B079V412P9', 'https://www.amazon.com/Sorbus-Flip-Top-Collapsible-Playroom-Organization/dp/B079V412P9/ref=sr_1_5?_=1556592894869&fst=as%3Aoff&qid=1556592895&rnid=3744921&s=kitchen-intl-ship&sr=1-5&th=1', '15.00', 1034, '29975.66', 2, 517, '14987.83', 'http://www.sorbushouseware.com/', NULL, NULL, '25 Brighton Ave. \r\nPassaic, NJ 07055', '973.778.1045', NULL, 'sales@sorbushouseware.com', '2019-05-12 22:33:09', '2019-05-12 22:33:09'),
(16, 'images/81LI5QMFmL._SX522__1557729523.jpg', 'Sorbus', 'B079V412P9', 'https://www.amazon.com/Sorbus-Flip-Top-Collapsible-Playroom-Organization/dp/B079V412P9/ref=sr_1_5?_=1556592894869&fst=as%3Aoff&qid=1556592895&rnid=3744921&s=kitchen-intl-ship&sr=1-5&th=1', '28.99', 1034, '29975.66', 2, 517, '14987.83', 'http://www.sorbushouseware.com/', NULL, NULL, '25 Brighton Ave. \r\nPassaic, NJ 07055', '973.778.1045', NULL, 'sales@sorbushouseware.com', '2019-05-12 22:38:43', '2019-05-12 22:38:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wallet` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `wallet`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'keno buiza', 'buiza.khen0909@gmail.com', NULL, '$2y$10$k1mwFnQXsIPNl1IaymTP1eEmB.8.eUpsdZuoGoqzKKRVIYRw8SZzS', 89, NULL, '2019-05-10 21:52:09', '2019-05-13 20:01:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
