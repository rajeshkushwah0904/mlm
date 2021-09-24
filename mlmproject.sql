-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2021 at 02:13 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mlmproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `added_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Category 1', NULL, 2, '2021-09-22 09:18:58', '2021-09-22 09:20:06'),
(2, 'Category 2', 2, NULL, '2021-09-24 04:34:44', '2021-09-24 04:34:44');

-- --------------------------------------------------------

--
-- Table structure for table `distributors`
--

CREATE TABLE `distributors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `distributor_tracking_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `status` bigint(20) NOT NULL,
  `distributor_is_paid` bigint(20) NOT NULL,
  `sponsor_tracking_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominee` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joining_date` timestamp NULL DEFAULT NULL,
  `activate_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distributors`
--

INSERT INTO `distributors` (`id`, `name`, `email`, `distributor_tracking_id`, `address`, `mobile`, `status`, `distributor_is_paid`, `sponsor_tracking_id`, `nominee`, `joining_date`, `activate_date`, `created_at`, `updated_at`) VALUES
(10000001, 'NAME', 'kushwah.lala@gmail.com', 'RF10000001', 'Address 11', 8319245219, 0, 0, 'RF10000000', 'Nominee', '2021-09-12 03:01:11', NULL, '2021-09-12 03:01:11', '2021-09-12 03:01:11'),
(10000002, 'NAME', 'rajesh@gmail.com', 'RF10000002', 'Address 11', 8319245219, 0, 0, 'RF10000001', 'Nominee', '2021-09-12 03:06:39', NULL, '2021-09-12 03:06:39', '2021-09-12 03:06:40');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kycs`
--

CREATE TABLE `kycs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pancard_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pancard_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aadhaarcard_no` bigint(20) DEFAULT NULL,
  `aadhaar_card_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_holder_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` bigint(20) DEFAULT NULL,
  `account_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ifsc_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_branch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_document` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `distributor_id` bigint(20) DEFAULT NULL,
  `distributor_user_id` bigint(20) DEFAULT NULL,
  `added_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kycs`
--

INSERT INTO `kycs` (`id`, `pancard_no`, `pancard_file`, `aadhaarcard_no`, `aadhaar_card_file`, `account_holder_name`, `account_number`, `account_type`, `ifsc_code`, `bank_name`, `bank_branch`, `bank_document`, `distributor_id`, `distributor_user_id`, `added_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'Pancard', 'upload/hkvslmvhebyycsb9cuit8avbbs6dowyw6hmhyi10biwu0ptghut2bmpbmpbmp.bmp', 123456789012, 'upload/lschrnjaohrtw1dlcuit8avbbs6dowyw6hmhyi10biwu0ptghut2bmpbmpbmp.bmp', 'Account Holder Name', 1234567890, 'Account Type', 'IFSC Code', 'Bank Name', 'Bank Branch', 'upload/re0j0feohuaz25shcuit8avbbs6dowyw6hmhyi10biwu0ptghut2bmpbmpbmp.bmp', 10000001, 2, 2, NULL, '2021-09-18 02:21:44', '2021-09-18 02:21:45');

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
(43, '2014_10_12_000000_create_users_table', 1),
(44, '2014_10_12_100000_create_password_resets_table', 1),
(45, '2019_08_19_000000_create_failed_jobs_table', 1),
(46, '2021_09_10_160515_create_packages_table', 1),
(47, '2021_09_11_055144_create_package_products_table', 1),
(48, '2021_09_12_044631_create_distributors_table', 1),
(49, '2021_09_12_072153_create_user_roles_table', 1),
(50, '2021_09_12_073534_distributer_key_increament', 1),
(54, '2021_09_15_154411_create_kycs_table', 2),
(57, '2021_09_22_023251_create_categories_table', 3),
(58, '2021_09_22_025433_create_subcategories_table', 3),
(61, '2021_09_22_154647_create_products_table', 4),
(63, '2021_09_23_155358_create_pins_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `sponsor_income` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_name`, `amount`, `sponsor_income`, `created_at`, `updated_at`) VALUES
(1, 'Package1', '1500.00', '1000.00', '2021-09-23 10:49:49', '2021-09-23 10:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `package_products`
--

CREATE TABLE `package_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) DEFAULT NULL,
  `service_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `hsn_sac` bigint(20) DEFAULT NULL,
  `gst_rate` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_products`
--

INSERT INTO `package_products` (`id`, `package_id`, `service_name`, `price`, `hsn_sac`, `gst_rate`, `created_at`, `updated_at`) VALUES
(1, 1, 'product 11', '1500.00', 111111, 12, '2021-09-23 10:49:49', '2021-09-23 10:49:49');

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
-- Table structure for table `pins`
--

CREATE TABLE `pins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) DEFAULT NULL,
  `transfer_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `used_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` bigint(20) DEFAULT NULL,
  `added_id` bigint(20) DEFAULT NULL,
  `updated_id` bigint(20) DEFAULT NULL,
  `generated_pin` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pins`
--

INSERT INTO `pins` (`id`, `package_id`, `transfer_to`, `used_by`, `status`, `added_id`, `updated_id`, `generated_pin`, `created_at`, `updated_at`) VALUES
(61, 1, 'RF10000001', NULL, 0, NULL, NULL, '172442', '2021-09-23 11:20:26', '2021-09-23 11:20:26'),
(62, 1, 'RF10000001', NULL, 0, NULL, NULL, '378827', '2021-09-23 11:20:26', '2021-09-23 11:20:26'),
(63, 1, 'RF10000001', NULL, 0, NULL, NULL, '646692', '2021-09-23 11:20:26', '2021-09-23 11:20:26'),
(64, 1, 'RF10000001', NULL, 0, NULL, NULL, '125938', '2021-09-23 11:20:27', '2021-09-23 11:20:27'),
(65, 1, 'RF10000001', NULL, 0, NULL, NULL, '362042', '2021-09-23 11:20:27', '2021-09-23 11:20:27'),
(66, 1, 'RF10000001', NULL, 0, NULL, NULL, '868092', '2021-09-23 11:20:27', '2021-09-23 11:20:27'),
(67, 1, 'RF10000001', NULL, 0, NULL, NULL, '882952', '2021-09-23 11:20:27', '2021-09-23 11:20:27'),
(68, 1, 'RF10000001', NULL, 0, NULL, NULL, '810931', '2021-09-23 11:20:27', '2021-09-23 11:20:27'),
(69, 1, 'RF10000001', NULL, 0, NULL, NULL, '100684', '2021-09-23 11:20:27', '2021-09-23 11:20:27'),
(70, 1, 'RF10000001', NULL, 0, NULL, NULL, '969479', '2021-09-23 11:20:28', '2021-09-23 11:20:28'),
(71, 1, 'RF10000001', NULL, 0, NULL, NULL, '248680', '2021-09-23 11:20:28', '2021-09-23 11:20:28'),
(72, 1, 'RF10000001', NULL, 0, NULL, NULL, '858915', '2021-09-23 11:20:28', '2021-09-23 11:20:28'),
(73, 1, 'RF10000001', NULL, 0, NULL, NULL, '996514', '2021-09-23 11:20:28', '2021-09-23 11:20:28'),
(74, 1, 'RF10000001', NULL, 0, NULL, NULL, '671729', '2021-09-23 11:20:28', '2021-09-23 11:20:28'),
(75, 1, 'RF10000001', NULL, 0, NULL, NULL, '294956', '2021-09-23 11:20:28', '2021-09-23 11:20:28'),
(76, 1, 'RF10000001', NULL, 0, NULL, NULL, '405315', '2021-09-23 11:20:28', '2021-09-23 11:20:28'),
(77, 1, 'RF10000001', NULL, 0, NULL, NULL, '902714', '2021-09-23 11:20:28', '2021-09-23 11:20:28'),
(78, 1, 'RF10000001', NULL, 0, NULL, NULL, '780106', '2021-09-23 11:20:29', '2021-09-23 11:20:29'),
(79, 1, 'RF10000001', NULL, 0, NULL, NULL, '957866', '2021-09-23 11:20:29', '2021-09-23 11:20:29'),
(80, 1, 'RF10000001', NULL, 0, NULL, NULL, '392642', '2021-09-23 11:20:29', '2021-09-23 11:20:29');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hsn_code` bigint(20) DEFAULT NULL,
  `product_code` bigint(20) DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `subcategory_id` bigint(20) DEFAULT NULL,
  `serial_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mrp` decimal(8,2) DEFAULT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `actual_rate` decimal(8,2) DEFAULT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `hsn_code`, `product_code`, `category_id`, `subcategory_id`, `serial_no`, `mrp`, `discount`, `actual_rate`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'NVR Camera', 111111, 22222, 1, 1, '2423536', '2000.00', '200.00', '1800.00', 'Raw denim you probably haven\'t heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.', 'upload/hx0bqpidwhtcrmccnpr-camera-500x500jpg.jpg', '2021-09-23 10:11:48', '2021-09-23 10:11:48'),
(2, 'LED Light', 666666, 777777, 1, 1, '3242342', '1500.00', '100.00', '1400.00', 'Raw denim you probably haven\'t heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.', 'upload/elrazlhomgdbnylmdownloadjpg.jpg', '2021-09-23 10:12:51', '2021-09-23 10:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `added_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `category_id`, `added_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'SubCategory 1', 1, NULL, 2, '2021-09-22 09:24:36', '2021-09-22 09:33:47'),
(2, 'SubCategory 2', 1, NULL, NULL, '2021-09-22 09:27:03', '2021-09-22 09:27:03'),
(3, 'SubCategory 3', 2, 2, NULL, '2021-09-24 04:35:15', '2021-09-24 04:35:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `otp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `distributor_tracking_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `distributor_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominee` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` timestamp NULL DEFAULT NULL,
  `pincode` bigint(20) DEFAULT NULL,
  `status` bigint(20) DEFAULT NULL,
  `role` bigint(20) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `address`, `mobile`, `otp`, `distributor_tracking_id`, `distributor_id`, `nominee`, `gender`, `dob`, `pincode`, `status`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'kushwah.lala@gmail.com', NULL, '$2y$10$UMmmSkImrJEk5g9o5vkgWuO2CDEPtdd2haaviCYb78.IFM4ivsc5y', 'Address 11', 8319245219, NULL, 'RF10000001', '10000001', 'Nominee', NULL, NULL, NULL, 1, 1, NULL, '2021-09-12 03:01:11', '2021-09-12 03:01:11'),
(3, 'Distributor', 'rajesh@gmail.com', NULL, '$2y$10$UMmmSkImrJEk5g9o5vkgWuO2CDEPtdd2haaviCYb78.IFM4ivsc5y', 'Address 11', 8319245219, NULL, 'RF10000002', '10000002', 'Nominee', NULL, NULL, NULL, 1, 3, NULL, '2021-09-12 03:06:40', '2021-09-12 03:06:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributors`
--
ALTER TABLE `distributors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `distributors_distributor_tracking_id_unique` (`distributor_tracking_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kycs`
--
ALTER TABLE `kycs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_products`
--
ALTER TABLE `package_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pins`
--
ALTER TABLE `pins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `distributors`
--
ALTER TABLE `distributors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000003;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kycs`
--
ALTER TABLE `kycs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `package_products`
--
ALTER TABLE `package_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pins`
--
ALTER TABLE `pins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
