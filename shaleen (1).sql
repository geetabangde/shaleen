-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2025 at 03:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shaleen`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contact_number` varchar(225) DEFAULT NULL,
  `tan_number` varchar(225) DEFAULT NULL,
  `pan_number` varchar(225) DEFAULT NULL,
  `bank_name` varchar(225) DEFAULT NULL,
  `account_type` varchar(225) DEFAULT NULL,
  `account_number` varchar(225) DEFAULT NULL,
  `ifsc_code` varchar(225) DEFAULT NULL,
  `role_id` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=Admin, 2=Retailer, 3=Manufacturer',
  `role` varchar(40) DEFAULT NULL,
  `types` text DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` text DEFAULT NULL,
  `department` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `email_verified_at`, `image`, `password`, `contact_number`, `tan_number`, `pan_number`, `bank_name`, `account_type`, `account_number`, `ifsc_code`, `role_id`, `role`, `types`, `status`, `remember_token`, `created_at`, `updated_at`, `address`, `department`) VALUES
(22, 'Sylvia Stark', 'user@test.com', NULL, NULL, NULL, '$2y$12$Jl1OACUh7eOpgTl4x19NrumLklfe4/aSukCxdRdLlzvHRSaz31PCa', '9669198800', 'sdfdfsddfsdfsfw', '233232FSDRER', 'Rahim Buchanan', 'current', '48389080', 'AJKDDR97870', 1, NULL, '[\"buyer\"]', 1, NULL, '2025-09-19 04:46:42', '2025-09-25 01:52:02', '[{\"consignment_address\":\"59 Hague Drive\",\"pincode\":\"297878\",\"state\":\"Madhya Pradesh\",\"country\":\"India\"}]', ''),
(25, 'Shaleen Verseas', 'shaleen@gmail.com', NULL, NULL, NULL, '$2y$12$23ukNQSVbnyflSY1WmPnXOli8xpV.0O0X4UMzaJTEdqc4encSZAkK', '9669198801', 'DELX12345B', 'RAK9E0RDNK', 'BOI', 'current', '48389080', 'BOIN0125627', 1, NULL, '[\"seller\",\"buyer\"]', 1, NULL, '2025-09-24 05:24:45', '2025-09-25 01:28:41', '[{\"consignment_address\":\"Vijay Nagar Indore\",\"pincode\":\"297878\",\"state\":\"Madhya Pradesh\",\"country\":\"India\"}]', ''),
(26, 'Ishwar', 'admin12@gmail.com', NULL, NULL, NULL, '$2y$12$UNS78LigRAWDkZzl7.cCS.UJk3FWVvq3zBAVdo0emYVjfhe2hXnFO', '9669198801', 'DELX12345B', 'RAK9E0RDNK', 'BOI', NULL, '48389080', 'BOIN0125627', 1, 'Admin', '[\"seller\",\"broker\"]', 1, NULL, '2025-09-25 01:06:44', '2025-09-26 04:47:56', '[{\"consignment_address\":\"Palasiya ,Indore\",\"pincode\":\"297878\",\"state\":\"Madhya Pradesh\",\"country\":\"India\"}]', 'Finance'),
(27, 'Default Admin', 'admin@gmail.com', NULL, NULL, 'ledger_images/1758891761_Screenshot (840).png', '$2y$12$w4edeRrwpi1XcTfE3dWEYedz1mk93F4PITvtHCnwuPrPcLhMZmGfO', '9669198809', 'DELX12345B', 'RAK9E0RDNK', 'SBI', 'current', '48389080', 'SBIN0125620', 1, NULL, '[\"buyer\",\"broker\"]', 1, NULL, '2025-09-25 01:37:09', '2025-09-26 07:32:41', '[{\"consignment_address\":\"Mahu Naka ,Indore\",\"pincode\":\"297878\",\"state\":\"Madhya Pradesh\",\"country\":\"India\"}]', ''),
(28, 'Sylvia Stark', 'user@test.com', NULL, NULL, 'profile_images/WQCv9vNxhbDnvyxKE0nALXI6Sp8kQh9P64JsVy3r.png', '$2y$12$.ntW8HzSXSWLhz.EoPYg.OCY.Ep6G0DjvYpRvBzgm2B8lxUoUNvdC', '9669198800', NULL, NULL, 'BOI', 'Salary', '48389080', '23132323fdfffd', 1, 'Manager', NULL, 1, NULL, '2025-09-26 01:46:01', '2025-09-26 05:46:54', NULL, 'HR'),
(29, 'Sylvia Stark', 'user@test.com', NULL, NULL, NULL, '$2y$12$Qj/WhiQljlf8X0dLlLgF5.pYZ/HFdf5z7KVMAcdlhpLF84702JcDa', '9669198801', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Viewer', NULL, 1, NULL, '2025-09-26 01:52:36', '2025-09-26 02:23:59', NULL, 'HR'),
(30, 'Sylvia Stark', 'user@test.com', NULL, NULL, 'profile_images/bTXnNQ4kg8gfTsJvMbOitYFzwV20ULtKMzfClsw8.png', '$2y$12$Cm/.xyQ.7ctrww4pYPTNXuHNmgZcqWq67n7gOk59wKHRQFKXCoi76', '9669198801', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Manager', NULL, 1, NULL, '2025-09-26 02:51:00', '2025-09-26 02:51:00', NULL, 'IT'),
(31, 'Sylvia Stark', 'user@ddtest.com', NULL, NULL, 'profile_images/41wHGNGmkXg0LUFiktEoZ1IucH7T47QUPVVJP5tM.png', '$2y$12$1zP4SiLX1luOxXAF1d/R4.8RNKzz67ADD8cOFsB7UCJP.H8awFq/e', '9669198800', NULL, NULL, 'SBI', 'Saving', '2323324344343', '23132323FDFFFD', 1, 'Admin', NULL, 1, NULL, '2025-09-26 02:55:23', '2025-09-26 05:01:51', NULL, 'HR'),
(32, 'Ram', 'ramg@mal.com', NULL, NULL, 'profile_images/kE55GXc70GAxumEzrvgUIMWloUkB8UG1WrHKNDIP.png', '$2y$12$QwRsBCHsc0VczrL80pH8GuAQjWbtj3eEpFXCw/BgHmu2GrSfXH/EK', '9098989091', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Manager', NULL, 1, NULL, '2025-09-26 04:39:49', '2025-09-26 05:11:17', NULL, 'Finance'),
(33, 'krishan kumar', 'k@gmail.com', NULL, NULL, 'profile_images/wS4xdGWVP1o9rtyJK0yTeQZl75U4E1Irh5zxJTjr.png', '$2y$12$nU61HF8qpPlABIX55C8cDO8CAt1LnCYMw5j2IikUXygs44uV2kpsm', '8797439444', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Admin', NULL, 1, NULL, '2025-09-26 05:20:07', '2025-09-26 06:12:15', NULL, 'HR'),
(34, 'Hemat Bishiva', 'hemat@gmai.com', NULL, NULL, 'profile_images/Y7zCxu3HaNceh9mvRmOtmEiySMk7IoG26ywH70Zc.png', '$2y$12$ryeTLD7wyD8t.QmCJ62l1ez2fgg7nqXT38GGtGkNdii1s0KRHOY/e', '8989898989', NULL, NULL, 'ICICIC', 'Saving', '9779879879', 'ICCDDE1223', 1, 'Manager', NULL, 1, NULL, '2025-09-26 05:49:56', '2025-09-26 05:49:56', NULL, 'IT'),
(35, 'Vinay', 'vinay@test.com', NULL, NULL, NULL, '$2y$12$0c7/.aJZtfODO7l0B3BSruC8zPDMKzy9/8P48RK3iegQ0UKAMBjWO', '9669198800', 'DELX12345B', 'RAK9E0RDNK', 'SBI', 'saving', '48389080', NULL, 1, NULL, '[\"buyer\",\"broker\"]', 1, NULL, '2025-09-26 06:23:20', '2025-09-26 06:23:20', '[{\"pincode\":\"297878\",\"consignment_address\":\"59 Hague Drive\",\"state\":\"Madhya Pradesh\",\"country\":\"India\"}]', NULL),
(36, 'Vishal', 'vishl@gmail.com', NULL, NULL, 'ledger_images/1758891402_Screenshot (721).png', '$2y$12$ysc6IQhtERj5Mo.Rq2KXl.GT7WzGy2tSBfOhea4pxoMGPIpxIwyF2', '9669198809', 'DELX12345B', '233232FSDRER', 'BOI', 'current', '48389080', 'AJKDDR97870', 1, NULL, '[\"buyer\",\"broker\"]', 1, NULL, '2025-09-26 07:08:31', '2025-09-26 08:08:56', '[{\"consignment_address\":\"59 Hague Drive\",\"pincode\":\"297878\",\"state\":\"Madhya Pradesh\",\"country\":\"India\"}]', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bags`
--

CREATE TABLE `bags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `contract_no` varchar(255) DEFAULT NULL,
  `buyer_name` varchar(255) DEFAULT NULL,
  `seller_name` varchar(255) DEFAULT NULL,
  `packing` varchar(255) DEFAULT NULL,
  `number_of_container` int(11) DEFAULT NULL,
  `marking` varchar(255) DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `quantity` decimal(15,2) DEFAULT NULL,
  `broker` varchar(255) DEFAULT NULL,
  `status` varchar(40) DEFAULT NULL,
  `delivery_at` varchar(255) DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `number_of` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bags`
--

INSERT INTO `bags` (`id`, `date`, `contract_no`, `buyer_name`, `seller_name`, `packing`, `number_of_container`, `marking`, `price`, `quantity`, `broker`, `status`, `delivery_at`, `remark`, `number_of`, `created_at`, `updated_at`) VALUES
(2, '2025-09-13', '9669198800', '25', '22', '10', 101, 'Consectetur amet se', 100.00, 100.00, 'Rahul', 'Delivered', 'Indore', NULL, NULL, '2025-09-24 01:23:52', '2025-09-25 04:30:04'),
(3, '2025-09-26', '9669198800', '16', '8', '10', 122, 'Et aute rerum eos s', 111.00, 54545.00, 'Dolor totam est dolo', 'Delivered', '3322', '111', NULL, '2025-09-24 01:37:05', '2025-09-25 04:29:49'),
(4, '2025-09-26', '9669198800', '25', '26', '10', 12, 'No.1', 20.00, 2000.00, '26', 'Delivered', 'Indore', '....', NULL, '2025-09-25 02:17:51', '2025-09-25 04:29:29'),
(5, '2025-10-03', '9669198800', '27', '25', '10', 434, '32', 323.00, 32.00, '26', 'Delivered', '323', '23', '12', '2025-09-25 05:34:04', '2025-09-25 05:49:28'),
(6, '2025-09-20', '9669198800', '25', '25', '10', 89, 'No.1', 90.00, 800.00, '26', 'Await Delivery', 'Indore', 'nknk', '90', '2025-09-25 05:50:29', '2025-09-25 05:50:29'),
(7, '2025-09-20', '9669198800', '25', '25', '10', 89, 'No.1', 90.00, 800.00, '26', 'Await Delivery', 'Indore', 'nknk', '90', '2025-09-25 05:50:30', '2025-09-25 05:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text DEFAULT NULL,
  `manufacturer_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `manufacturer_id`, `description`, `status`, `created_at`, `updated_at`) VALUES
(14, 'Costco\'s Logo one', NULL, NULL, 'Costco\'s Logo Description two', 1, '2025-09-17 01:38:33', '2025-09-17 01:55:01'),
(15, 'Peloton\'s Logo. yes', NULL, NULL, 'Peloton\'s Logo Description no', 1, '2025-09-17 01:38:56', '2025-09-17 01:55:54'),
(17, 'Mara Silva', NULL, NULL, 'Description done', 1, '2025-09-17 08:24:13', '2025-09-17 08:24:22'),
(18, 'Brand B', NULL, 9, 'This is Brand B', 1, '2025-09-18 05:12:26', '2025-09-18 05:12:26'),
(19, 'Brand A', NULL, 16, 'Description for Brand A', 1, '2025-09-18 05:13:22', '2025-09-18 05:17:15'),
(20, 'brannd name', NULL, 9, 'khjkhk', 1, '2025-09-18 05:28:07', '2025-09-18 05:28:07'),
(21, 'brannd name', 'http://localhost:8000/uploads/brand_1758193185.png', 9, 'khjkhk', NULL, '2025-09-18 05:29:46', '2025-09-18 05:29:46'),
(22, 'Additive OF(100Gm)', NULL, NULL, 'hjkhk', NULL, '2025-09-18 05:38:09', '2025-09-18 05:38:09');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categaries`
--

CREATE TABLE `categaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categaries`
--

INSERT INTO `categaries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'a', NULL, NULL),
(2, 'b', NULL, NULL),
(3, 'b', NULL, NULL);

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
-- Table structure for table `item_masters`
--

CREATE TABLE `item_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `h_s_n/_s_a_c` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_masters`
--

INSERT INTO `item_masters` (`id`, `item_name`, `h_s_n/_s_a_c`, `created_at`, `updated_at`) VALUES
(1, 'Chick Peas', '07132010', NULL, NULL),
(2, 'Red Lentils', '07132011', NULL, NULL),
(3, 'Rice', '07132012', NULL, NULL),
(4, 'Organic Soybean', '07132013', NULL, NULL);

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
(1, '2025_09_19_120242_create_purchases_table', 1),
(2, '2025_09_19_120951_create_purchases_table', 2),
(3, '2025_09_20_064417_create_modules_table', 3),
(4, '2025_09_20_064448_create_module_module_records_table', 4),
(5, '2025_09_20_070243_create_module_module_fields_table', 5),
(6, '2025_09_20_064431_create_module_fields_table', 6),
(7, '2025_09_24_061140_create_bags_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'Primary key',
  `name` varchar(255) NOT NULL COMMENT 'Name of the module',
  `allow_edit` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Whether module can be edited',
  `allow_delete` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Whether module can be deleted',
  `allow_show` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `allow_edit`, `allow_delete`, `allow_show`, `created_at`, `updated_at`) VALUES
(34, 'Item Master', 1, 1, 1, '2025-10-01 04:19:20', '2025-10-01 04:19:20');

-- --------------------------------------------------------

--
-- Table structure for table `module_fields`
--

CREATE TABLE `module_fields` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'Primary key',
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) NOT NULL COMMENT 'Field label',
  `type` varchar(255) NOT NULL COMMENT 'Field type: text, number, date, file, radio, dropdown, etc.',
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'Options for dropdown/radio/checkbox' CHECK (json_valid(`options`)),
  `required` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Whether field is required',
  `table_show` tinyint(4) NOT NULL DEFAULT 0,
  `value_type` varchar(122) DEFAULT NULL,
  `placeholder` varchar(255) DEFAULT NULL COMMENT 'Field placeholder',
  `default_value` varchar(255) DEFAULT NULL COMMENT 'Default value if any',
  `max_length` int(11) DEFAULT NULL COMMENT 'Maximum length of input',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `module_fields`
--

INSERT INTO `module_fields` (`id`, `module_id`, `label`, `type`, `options`, `required`, `table_show`, `value_type`, `placeholder`, `default_value`, `max_length`, `created_at`, `updated_at`) VALUES
(221, 34, 'Item Name', 'text', '[]', 1, 1, NULL, 'Enter a Item name', NULL, NULL, '2025-10-01 04:27:19', '2025-10-01 04:27:19'),
(222, 34, 'HSN/SAC', 'text', '[]', 0, 1, NULL, 'Enter a HSN/SAC', NULL, NULL, '2025-10-01 04:27:19', '2025-10-01 04:27:19');

-- --------------------------------------------------------

--
-- Table structure for table `module_files`
--

CREATE TABLE `module_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `module_record_id` bigint(20) UNSIGNED NOT NULL,
  `field_id` bigint(20) UNSIGNED DEFAULT NULL,
  `file_path` varchar(255) NOT NULL COMMENT 'Path to the uploaded file',
  `file_name` varchar(255) NOT NULL COMMENT 'Original file name',
  `file_type` varchar(255) NOT NULL COMMENT 'MIME type of the file',
  `file_size` bigint(20) UNSIGNED NOT NULL COMMENT 'File size in bytes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `module_records`
--

CREATE TABLE `module_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 132, 'auth_token', '5c4b698f06e97d5eaffea52b415726ab09cf85cf71068e899ae45cea11c6ca62', '[\"*\"]', '2025-09-16 05:19:04', NULL, '2025-09-16 04:39:36', '2025-09-16 05:19:04'),
(2, 'App\\Models\\User', 133, 'auth_token', '36dedef17ddc2db957f55cdeddbbee3cb000d941c933d6ba574a9c586e083103', '[\"*\"]', '2025-09-16 05:46:16', NULL, '2025-09-16 05:34:03', '2025-09-16 05:46:16'),
(3, 'App\\Models\\User', 134, 'auth_token', '15cb19dfa63ac4f722d0032591bfa9f53ed16656026901a97be9b5f3ace89715', '[\"*\"]', '2025-09-16 05:59:38', NULL, '2025-09-16 05:49:41', '2025-09-16 05:59:38'),
(4, 'App\\Models\\User', 136, 'auth_token', '7b07c0d0229a6f43eab3ce6bb108af7521bae1f1b61984a721e39f1de9af57ce', '[\"*\"]', '2025-09-17 05:03:19', NULL, '2025-09-17 02:39:58', '2025-09-17 05:03:19'),
(5, 'App\\Models\\User', 137, 'auth_token', '8747de2ed02aeb29b57eb38a3131f66d9100b021b0e93925a01cb67d3d98ed93', '[\"*\"]', '2025-09-18 05:30:18', NULL, '2025-09-18 05:04:28', '2025-09-18 05:30:18');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `raw_date` date DEFAULT NULL,
  `raw_contract_no` varchar(255) DEFAULT NULL,
  `raw_buyer_name` varchar(255) DEFAULT NULL,
  `raw_seller_name` varchar(255) DEFAULT NULL,
  `raw_commodity` varchar(255) DEFAULT NULL,
  `raw_specification` varchar(255) DEFAULT NULL,
  `raw_price` decimal(15,2) DEFAULT NULL,
  `raw_packing` varchar(255) DEFAULT NULL,
  `raw_delivery` varchar(255) DEFAULT NULL,
  `raw_quantity` int(11) DEFAULT NULL,
  `raw_bags_condition` varchar(255) DEFAULT NULL,
  `raw_payment_terms` varchar(255) DEFAULT NULL,
  `raw_terms_conditions` text DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `raw_date`, `raw_contract_no`, `raw_buyer_name`, `raw_seller_name`, `raw_commodity`, `raw_specification`, `raw_price`, `raw_packing`, `raw_delivery`, `raw_quantity`, `raw_bags_condition`, `raw_payment_terms`, `raw_terms_conditions`, `status`, `created_at`, `updated_at`) VALUES
(3, '2025-09-26', '4554534', '25', '22', 'Ex porro sunt aut no', 'Quaerat voluptas pos', 12.00, '50', 'iidore', 200, 'good', 'Est ut rerum perfere', 'fdfs', 'Await Delivery', '2025-09-24 02:12:18', '2025-09-25 02:58:42'),
(4, '2025-09-13', '4554534', '22', '25', 'Makka', 'Red', 30.00, '50', 'Indore', 30000, 'good', '1 month', '...', 'Await Delivery', '2025-09-25 01:55:02', '2025-09-25 04:27:25'),
(6, '2025-09-12', '4554534', '25', '26', 'Dal', 'Tuar', 200.00, '50', 'Indore', 2000, 'good', '1 month', '-', 'Await Delivery', '2025-09-25 01:56:42', '2025-09-25 02:58:18'),
(7, '2025-09-26', '42344324', '22', '25', 'Dal', 'Tuar', 230.00, '50', 'Ujjain', 3000, 'Good', '1 month', ',.', 'Await Delivery', '2025-09-25 02:38:03', '2025-09-25 02:57:39'),
(8, '2025-09-11', '42344324', '27', '25', 'Dal', 'Red', 120.00, '50', 'Ujjain', 9000, 'Good', '1 month', ',,', 'Await Delivery', '2025-09-25 02:40:14', '2025-09-25 02:57:30'),
(9, '2025-09-20', '42344324', '22', '25', 'Dal', 'Tuar', 90.00, '20', 'Ujjain', 700, 'Good', '1 month', '..', 'Await Delivery', '2025-09-25 02:46:47', '2025-09-25 02:46:47'),
(10, '2025-09-27', '42344324', '22', '25', 'Dal', 'Red', 120.60, '20', 'Indore', 2000, 'good', '1 month', ',..', 'Delivered', '2025-09-25 05:10:06', '2025-09-25 08:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `sales_order_id` varchar(255) NOT NULL,
  `item_id` varchar(255) DEFAULT NULL,
  `broker_name` varchar(255) DEFAULT NULL,
  `party_name` varchar(255) NOT NULL,
  `item` varchar(255) DEFAULT NULL,
  `quantity` decimal(12,2) NOT NULL DEFAULT 0.00,
  `bags` int(11) NOT NULL DEFAULT 0,
  `brand` varchar(255) DEFAULT NULL,
  `price` decimal(12,2) NOT NULL DEFAULT 0.00,
  `remark` text DEFAULT NULL,
  `loading_history_pending_balance` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `date`, `sales_order_id`, `item_id`, `broker_name`, `party_name`, `item`, `quantity`, `bags`, `brand`, `price`, `remark`, `loading_history_pending_balance`, `created_at`, `updated_at`) VALUES
(2, '2025-09-24', '8979', '3', '25', '27', 'jgjg', 23230.00, 2, 'Brand Name', 212.00, 'Remark', 'Loading History', '2025-09-25 07:30:34', '2025-09-30 08:12:55'),
(3, '2025-09-30', '3443', '4', '27', '22', 'yollow dal', 150.00, 4, 'no', 2000.00, 'no', '200', '2025-09-26 04:10:04', '2025-09-30 08:11:45'),
(4, '2025-09-18', 'SO-20250926095457-WCZ3', '3', '26', '25', 'yollow dal', 32075.00, 5, 'no', 535.00, 'Remark', '100', '2025-09-26 04:24:57', '2025-10-03 02:00:22'),
(5, '2025-10-03', 'SO-20251001115844-KS9Y', '2', '26', '22', NULL, 400.00, 2, 'test', 500.00, 'Remark', 'yes', '2025-10-01 06:28:44', '2025-10-01 06:28:44'),
(6, '2025-10-03', 'SO-20251001120605-ZZWX', '2', '26', '25', NULL, 49.00, 3, 'brand', 78979.00, 'hkhkj', 'sdfsdf', '2025-10-01 06:36:05', '2025-10-03 02:10:48');

-- --------------------------------------------------------

--
-- Table structure for table `sale_contracts`
--

CREATE TABLE `sale_contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contract_date` varchar(255) DEFAULT NULL,
  `contract_no` varchar(255) DEFAULT NULL,
  `seller_name` varchar(255) DEFAULT NULL,
  `buyer_name` varchar(255) DEFAULT NULL,
  `commodity` varchar(255) DEFAULT NULL,
  `packing` varchar(255) DEFAULT NULL,
  `shipment_date` date DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `quantity` decimal(12,3) DEFAULT NULL,
  `total_value` decimal(12,2) DEFAULT NULL,
  `payment_terms` varchar(255) DEFAULT NULL,
  `documents` text DEFAULT NULL,
  `document_names` text DEFAULT NULL,
  `seller_bank_details` text DEFAULT NULL,
  `terms_conditions` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_contracts`
--

INSERT INTO `sale_contracts` (`id`, `contract_date`, `contract_no`, `seller_name`, `buyer_name`, `commodity`, `packing`, `shipment_date`, `price`, `quantity`, `total_value`, `payment_terms`, `documents`, `document_names`, `seller_bank_details`, `terms_conditions`, `created_at`, `updated_at`) VALUES
(7, '2025-10-09', '001', '25', '22', 'Reprehenderit error', 'Packing', '2025-10-11', 500.00, 10.000, 5000.00, 'Payment Term', '[{\"name\":\"1 Original Invoices\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759583275_0.pdf\"},{\"name\":\"3\\/3 Bill of lading:\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759583275_1.pdf\"},{\"name\":\"1 Origine Certificate\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759583275_2.pdf\"},{\"name\":\"1 Phytosanitary Certificate\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759583275_3.pdf\"},{\"name\":\"Conformity Certificate\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759583794_0.pdf\"},{\"name\":\"Weight & Quality Certificate\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759583794_1.pdf\"},{\"name\":\"1 Fumigation Certificate\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759583794_2.pdf\"},{\"name\":\"1 Packing List\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759583794_3.pdf\"},{\"name\":\"1 Original Invoices\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759584532_0.pdf\"},{\"name\":\"3\\/3 Bill of lading:\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759584532_1.pdf\"}]', NULL, 'Seller Bank Details', '<p>Terms &amp; Conditions</p>', '2025-10-04 07:37:55', '2025-10-04 08:00:26');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('TOLt9OxaYdn0qgaBfwthzRJruvIOFBsT5G1H7q4L', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQWYwZXNJRjB3N2hIalo3ekU4bUJWcVduVWxCTW9WZmhSOW9sZEJPVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9zYWxlLWludGVybmF0aW9uYWwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI3O30=', 1759584730);

-- --------------------------------------------------------

--
-- Table structure for table `sub_sales`
--

CREATE TABLE `sub_sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `invoice_date` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `mode_terms_of_payment` varchar(255) DEFAULT NULL,
  `dispatch_doc_no` varchar(255) DEFAULT NULL,
  `delivery_note_date` date DEFAULT NULL,
  `dispatched_through` varchar(255) DEFAULT NULL,
  `motor_vehicle_no` varchar(255) DEFAULT NULL,
  `terms_of_delivery` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_note` varchar(255) DEFAULT NULL,
  `reference_no` varchar(255) DEFAULT NULL,
  `other_references` varchar(255) DEFAULT NULL,
  `buyer_order_no` varchar(255) DEFAULT NULL,
  `dated` date DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `bill_lr_no` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('pending','delivered') NOT NULL DEFAULT 'pending',
  `delivery_type` enum('spot','normal') NOT NULL DEFAULT 'normal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_sales`
--

INSERT INTO `sub_sales` (`id`, `sale_id`, `invoice_no`, `invoice_date`, `quantity`, `sale_price`, `unit`, `mode_terms_of_payment`, `dispatch_doc_no`, `delivery_note_date`, `dispatched_through`, `motor_vehicle_no`, `terms_of_delivery`, `delivery_note`, `reference_no`, `other_references`, `buyer_order_no`, `dated`, `destination`, `bill_lr_no`, `created_at`, `updated_at`, `status`, `delivery_type`) VALUES
(16, 4, 'INV-20251003072211-NU5R', '2025-10-03', 1, 232.00, 'QTL', '8 days', 'Dispatch Doc No', '2025-10-29', 'Dispatched Through', 'GJ17Y9580', 'Terms of Delivery', 'Delivery Note', '001ref', 'Other References', '002ord', '2025-10-17', '59 Hague Drive', '001LLRNO', '2025-10-03 01:52:11', '2025-10-03 01:52:11', 'delivered', 'spot'),
(17, 4, 'INV-20251003072254-MJKL', '2025-10-03', 4, 2312.00, 'QTL', '8 days', '2008', '2025-10-29', 'Dispatched Through', 'GJ17Y9580', 'Terms of Delivery', 'Delivery Note', '001ref', NULL, '002ord', '2025-10-22', '59 Hague Drive', '002LLRNO', '2025-10-03 01:52:54', '2025-10-03 01:53:06', 'delivered', 'normal'),
(18, 4, 'INV-20251003072548-GO8J', '2025-10-03', 1, 232.00, 'QTL', '8 days', '2008', '2025-10-21', 'Dispatched Through', 'GJ17Y9580', 'Terms of Delivery', 'Delivery Note', '001ref', 'Other References', '002ord', '2025-10-10', '59 Hague Drive', '001LLRNO', '2025-10-03 01:55:48', '2025-10-03 01:55:48', 'delivered', 'spot'),
(19, 4, 'INV-20251003072629-PQ11', '2025-10-03', 4, 7899.00, 'QTL', '8 days', '2008', '2025-10-21', 'Dispatched Through', 'GJ17Y9580', 'Terms of Delivery', 'Delivery Note', '001ref', 'Other References', '002ord', '2025-10-16', '59 Hague Drive', '001LLRNO', '2025-10-03 01:56:29', '2025-10-03 01:59:39', 'delivered', 'normal'),
(20, 4, 'INV-20251003073022-IWZS', '2025-10-03', 4, 33.00, 'QTL', '8 days', '2008', '2025-10-22', 'Dispatched Through', NULL, 'Terms of Delivery', 'Delivery Note', '001ref', 'Other References', '002ord', '2025-10-10', '59 Hague Drive', '001LLRNO', '2025-10-03 02:00:22', '2025-10-03 02:07:55', 'delivered', 'normal'),
(21, 6, 'INV-20251003074048-WFDZ', '2025-10-03', 1, 554.00, 'QTL', '8 days', '20065', '2025-10-22', 'Dispatched Through', 'GJ17Y9580', 'Terms of Delivery', 'Delivery Note', '001ref', 'Other References', '000ord', '2025-10-17', '59 Hague Drive', '001LLRNO', '2025-10-03 02:10:48', '2025-10-03 02:10:48', 'pending', 'normal');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `otp` varchar(255) DEFAULT NULL,
  `api_token` varchar(255) DEFAULT NULL,
  `session_otp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `mobile_number`, `status`, `otp`, `api_token`, `session_otp`) VALUES
(131, 'John Sharma', 'john.doe@example.com', NULL, NULL, NULL, '2025-09-15 06:51:19', '2025-09-15 07:08:07', '9876543212', NULL, '542365', NULL, NULL),
(132, 'riya Doe', NULL, NULL, NULL, NULL, '2025-09-16 02:40:06', '2025-09-16 05:33:03', '9876543211', NULL, '794327', NULL, NULL),
(133, 'riya Doe', NULL, NULL, NULL, NULL, '2025-09-16 05:33:42', '2025-09-16 05:47:57', '9876543216', NULL, '369478', NULL, NULL),
(134, 'priya sharma', NULL, NULL, NULL, NULL, '2025-09-16 05:49:22', '2025-09-16 05:49:22', '9876543217', NULL, '969768', NULL, NULL),
(135, 'priya sharma', NULL, NULL, NULL, NULL, '2025-09-16 08:36:36', '2025-09-16 08:36:36', '9876543215', NULL, '327221', NULL, NULL),
(136, 'priya sharma', NULL, NULL, NULL, NULL, '2025-09-17 02:39:39', '2025-09-17 02:39:39', '987654325', NULL, '416227', NULL, NULL),
(137, 'priya sharma', NULL, NULL, NULL, NULL, '2025-09-18 05:03:35', '2025-09-18 05:03:35', '987654321', NULL, '878334', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`username`);

--
-- Indexes for table `bags`
--
ALTER TABLE `bags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categaries`
--
ALTER TABLE `categaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `item_masters`
--
ALTER TABLE `item_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `modules_name_unique` (`name`);

--
-- Indexes for table `module_fields`
--
ALTER TABLE `module_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `module_fields_module_id_foreign` (`module_id`);

--
-- Indexes for table `module_files`
--
ALTER TABLE `module_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `module_files_module_id_foreign` (`module_id`),
  ADD KEY `module_files_module_record_id_foreign` (`module_record_id`),
  ADD KEY `module_files_field_id_foreign` (`field_id`);

--
-- Indexes for table `module_records`
--
ALTER TABLE `module_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `module_records_module_id_foreign` (`module_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sales_sales_order_id_unique` (`sales_order_id`);

--
-- Indexes for table `sale_contracts`
--
ALTER TABLE `sale_contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sub_sales`
--
ALTER TABLE `sub_sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sale_id` (`sale_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `bags`
--
ALTER TABLE `bags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `categaries`
--
ALTER TABLE `categaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_masters`
--
ALTER TABLE `item_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary key', AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `module_fields`
--
ALTER TABLE `module_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary key', AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT for table `module_files`
--
ALTER TABLE `module_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `module_records`
--
ALTER TABLE `module_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sale_contracts`
--
ALTER TABLE `sale_contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_sales`
--
ALTER TABLE `sub_sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `module_fields`
--
ALTER TABLE `module_fields`
  ADD CONSTRAINT `module_fields_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `module_files`
--
ALTER TABLE `module_files`
  ADD CONSTRAINT `module_files_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `module_fields` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `module_files_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `module_files_module_record_id_foreign` FOREIGN KEY (`module_record_id`) REFERENCES `module_records` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `module_records`
--
ALTER TABLE `module_records`
  ADD CONSTRAINT `module_records_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_sales`
--
ALTER TABLE `sub_sales`
  ADD CONSTRAINT `sub_sales_ibfk_1` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
