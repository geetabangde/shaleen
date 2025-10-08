-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2025 at 12:45 PM
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
-- Database: `shaleen_new`
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
  `api_token` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` text DEFAULT NULL,
  `department` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `email_verified_at`, `image`, `password`, `contact_number`, `tan_number`, `pan_number`, `bank_name`, `account_type`, `account_number`, `ifsc_code`, `role_id`, `role`, `types`, `status`, `remember_token`, `api_token`, `created_at`, `updated_at`, `address`, `department`) VALUES
(22, 'Sylvia Stark', 'user@test.com', NULL, NULL, NULL, '$2y$12$Jl1OACUh7eOpgTl4x19NrumLklfe4/aSukCxdRdLlzvHRSaz31PCa', '9669198800', 'sdfdfsddfsdfsfw', '233232FSDRER', 'Rahim Buchanan', 'current', '48389080', 'AJKDDR97870', 1, NULL, '[\"buyer\"]', 1, NULL, NULL, '2025-09-19 04:46:42', '2025-09-25 01:52:02', '[{\"consignment_address\":\"59 Hague Drive\",\"pincode\":\"297878\",\"state\":\"Madhya Pradesh\",\"country\":\"India\"}]', ''),
(25, 'Shaleen Verseas', 'shaleen@gmail.com', NULL, NULL, NULL, '$2y$12$23ukNQSVbnyflSY1WmPnXOli8xpV.0O0X4UMzaJTEdqc4encSZAkK', '9669198801', 'DELX12345B', 'RAK9E0RDNK', 'BOI', 'current', '48389080', 'BOIN0125627', 1, NULL, '[\"seller\",\"buyer\"]', 1, NULL, NULL, '2025-09-24 05:24:45', '2025-09-25 01:28:41', '[{\"consignment_address\":\"Vijay Nagar Indore\",\"pincode\":\"297878\",\"state\":\"Madhya Pradesh\",\"country\":\"India\"}]', ''),
(26, 'rajiv', 'kihsna@gmail.com', NULL, NULL, NULL, '$2y$12$UNS78LigRAWDkZzl7.cCS.UJk3FWVvq3zBAVdo0emYVjfhe2hXnFO', '233231233232', 'DELX12345B', 'RAK9E0RDNK', NULL, NULL, NULL, NULL, 1, NULL, '[\"seller\",\"broker\"]', 1, NULL, NULL, '2025-09-25 01:06:44', '2025-10-07 01:03:44', '[{\"consignment_address\":\"Palasiya ,Indore\",\"pincode\":\"297878\",\"state\":\"Madhya Pradesh\",\"country\":\"India\"}]', NULL),
(27, 'Default Admin', 'admin@gmail.com', NULL, NULL, 'ledger_images/1758891761_Screenshot (840).png', '$2y$12$w4edeRrwpi1XcTfE3dWEYedz1mk93F4PITvtHCnwuPrPcLhMZmGfO', '9669198809', 'DELX12345B', 'RAK9E0RDNK', 'SBI', 'current', '48389080', 'SBIN0125620', 1, NULL, '[\"buyer\",\"broker\"]', 1, NULL, NULL, '2025-09-25 01:37:09', '2025-10-07 02:09:49', '[{\"consignment_address\":\"Mahu Naka ,Indore\",\"pincode\":\"297878\",\"state\":\"Madhya Pradesh\",\"country\":\"India\"}]', ''),
(28, 'Sylvia Stark', 'user@test.com', NULL, NULL, 'profile_images/WQCv9vNxhbDnvyxKE0nALXI6Sp8kQh9P64JsVy3r.png', '$2y$12$.ntW8HzSXSWLhz.EoPYg.OCY.Ep6G0DjvYpRvBzgm2B8lxUoUNvdC', '9669198800', NULL, NULL, 'BOI', 'Salary', '48389080', '23132323fdfffd', 1, 'Manager', NULL, 1, NULL, NULL, '2025-09-26 01:46:01', '2025-09-26 05:46:54', NULL, 'HR'),
(29, 'Sylvia Stark', 'user@test.com', NULL, NULL, NULL, '$2y$12$Qj/WhiQljlf8X0dLlLgF5.pYZ/HFdf5z7KVMAcdlhpLF84702JcDa', '9669198801', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Viewer', NULL, 1, NULL, NULL, '2025-09-26 01:52:36', '2025-09-26 02:23:59', NULL, 'HR'),
(30, 'Sylvia Stark', 'user@test.com', NULL, NULL, 'profile_images/bTXnNQ4kg8gfTsJvMbOitYFzwV20ULtKMzfClsw8.png', '$2y$12$Cm/.xyQ.7ctrww4pYPTNXuHNmgZcqWq67n7gOk59wKHRQFKXCoi76', '9669198801', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Manager', NULL, 1, NULL, NULL, '2025-09-26 02:51:00', '2025-09-26 02:51:00', NULL, 'IT'),
(31, 'Sylvia Stark', 'user@ddtest.com', NULL, NULL, 'profile_images/41wHGNGmkXg0LUFiktEoZ1IucH7T47QUPVVJP5tM.png', '$2y$12$1zP4SiLX1luOxXAF1d/R4.8RNKzz67ADD8cOFsB7UCJP.H8awFq/e', '9669198800', NULL, NULL, 'SBI', 'Saving', '2323324344343', '23132323FDFFFD', 1, 'Admin', NULL, 1, NULL, NULL, '2025-09-26 02:55:23', '2025-09-26 05:01:51', NULL, 'HR'),
(32, 'Ram', 'ramg@mal.com', NULL, NULL, 'profile_images/kE55GXc70GAxumEzrvgUIMWloUkB8UG1WrHKNDIP.png', '$2y$12$QwRsBCHsc0VczrL80pH8GuAQjWbtj3eEpFXCw/BgHmu2GrSfXH/EK', '9098989091', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Manager', NULL, 1, NULL, NULL, '2025-09-26 04:39:49', '2025-09-26 05:11:17', NULL, 'Finance'),
(33, 'krishan kumar', 'k@gmail.com', NULL, NULL, 'profile_images/wS4xdGWVP1o9rtyJK0yTeQZl75U4E1Irh5zxJTjr.png', '$2y$12$nU61HF8qpPlABIX55C8cDO8CAt1LnCYMw5j2IikUXygs44uV2kpsm', '8797439444', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Admin', NULL, 1, NULL, NULL, '2025-09-26 05:20:07', '2025-09-26 06:12:15', NULL, 'HR'),
(34, 'Hemat Bishiva', 'hemat@gmai.com', NULL, NULL, 'profile_images/Y7zCxu3HaNceh9mvRmOtmEiySMk7IoG26ywH70Zc.png', '$2y$12$ryeTLD7wyD8t.QmCJ62l1ez2fgg7nqXT38GGtGkNdii1s0KRHOY/e', '8989898989', NULL, NULL, 'ICICIC', 'Saving', '9779879879', 'ICCDDE1223', 1, 'Manager', NULL, 1, NULL, NULL, '2025-09-26 05:49:56', '2025-09-26 05:49:56', NULL, 'IT'),
(35, 'Vinay', 'vinay@test.com', NULL, NULL, NULL, '$2y$12$0c7/.aJZtfODO7l0B3BSruC8zPDMKzy9/8P48RK3iegQ0UKAMBjWO', '9669198800', 'DELX12345B', 'RAK9E0RDNK', 'SBI', 'saving', '48389080', NULL, 1, NULL, '[\"buyer\",\"broker\"]', 1, NULL, NULL, '2025-09-26 06:23:20', '2025-09-26 06:23:20', '[{\"pincode\":\"297878\",\"consignment_address\":\"59 Hague Drive\",\"state\":\"Madhya Pradesh\",\"country\":\"India\"}]', NULL),
(36, 'Vishal', 'vishl@gmail.com', NULL, NULL, 'profile_images/m8MYUABgRW0DhdtVbjLq6xjO6ZqeWEmJrOjgASbo.png', '$2y$12$hzil219t/fM3nDsrvDuwv.3gCWte7Gsd/zj8Yra50x0axTjby7YCu', '9669198809', 'DELX12345B', '233232FSDRER', 'BOI', NULL, '48389080', 'AJKDDR97870', 1, 'Manager', '[\"buyer\",\"broker\"]', 1, NULL, NULL, '2025-09-26 07:08:31', '2025-10-07 04:08:14', '[{\"consignment_address\":\"59 Hague Drive\",\"pincode\":\"297878\",\"state\":\"Madhya Pradesh\",\"country\":\"India\"}]', 'Sales');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `labour_id` bigint(20) UNSIGNED NOT NULL,
  `attendance_date` date NOT NULL,
  `day_shift_worked` tinyint(1) NOT NULL DEFAULT 0,
  `night_shift_worked` tinyint(1) NOT NULL DEFAULT 0,
  `day_shift_status` enum('present','half_day','absent') NOT NULL DEFAULT 'absent',
  `night_shift_status` enum('present','half_day','absent') NOT NULL DEFAULT 'absent',
  `day_rate` decimal(10,2) NOT NULL DEFAULT 0.00,
  `night_rate` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `labour_id`, `attendance_date`, `day_shift_worked`, `night_shift_worked`, `day_shift_status`, `night_shift_status`, `day_rate`, `night_rate`, `total_amount`, `created_at`, `updated_at`) VALUES
(73, 1, '2025-10-06', 0, 1, 'absent', 'half_day', 300.00, 400.00, 200.00, '2025-10-07 07:58:46', '2025-10-08 00:51:17'),
(74, 1, '2025-10-07', 1, 1, 'present', 'present', 300.00, 400.00, 700.00, '2025-10-07 07:58:46', '2025-10-07 07:58:46'),
(75, 2, '2025-10-06', 0, 1, 'absent', 'present', 340.00, 320.00, 320.00, '2025-10-07 07:58:46', '2025-10-08 00:51:17'),
(76, 2, '2025-10-07', 1, 1, 'present', 'half_day', 340.00, 320.00, 500.00, '2025-10-07 07:58:46', '2025-10-07 07:59:26'),
(77, 3, '2025-10-06', 0, 1, 'absent', 'half_day', 800.00, 900.00, 450.00, '2025-10-07 07:58:46', '2025-10-08 00:51:17'),
(78, 3, '2025-10-07', 1, 1, 'present', 'half_day', 800.00, 900.00, 1250.00, '2025-10-07 07:58:46', '2025-10-07 07:58:46'),
(79, 1, '2025-10-08', 1, 1, 'present', 'half_day', 300.00, 400.00, 500.00, '2025-10-08 00:42:01', '2025-10-08 00:42:01'),
(80, 2, '2025-10-08', 1, 1, 'present', 'half_day', 340.00, 320.00, 500.00, '2025-10-08 00:42:01', '2025-10-08 00:42:01'),
(81, 3, '2025-10-08', 1, 1, 'present', 'half_day', 800.00, 900.00, 1250.00, '2025-10-08 00:42:01', '2025-10-08 00:42:01'),
(82, 4, '2025-10-06', 1, 1, 'half_day', 'half_day', 590.00, 910.00, 750.00, '2025-10-08 01:25:04', '2025-10-08 01:25:04'),
(83, 4, '2025-10-07', 1, 1, 'half_day', 'half_day', 590.00, 910.00, 750.00, '2025-10-08 01:25:04', '2025-10-08 01:25:04'),
(84, 4, '2025-10-08', 1, 1, 'present', 'half_day', 590.00, 910.00, 1045.00, '2025-10-08 01:25:04', '2025-10-08 01:25:04'),
(85, 1, '2025-09-29', 1, 1, 'present', 'present', 300.00, 400.00, 700.00, '2025-10-08 01:33:39', '2025-10-08 01:33:39'),
(86, 1, '2025-09-30', 1, 1, 'present', 'half_day', 300.00, 400.00, 500.00, '2025-10-08 01:33:39', '2025-10-08 01:33:39'),
(87, 1, '2025-10-01', 0, 0, 'absent', 'absent', 300.00, 400.00, 0.00, '2025-10-08 01:33:39', '2025-10-08 01:33:39'),
(88, 1, '2025-10-02', 1, 1, 'half_day', 'half_day', 300.00, 400.00, 350.00, '2025-10-08 01:33:39', '2025-10-08 01:33:39'),
(89, 1, '2025-10-03', 1, 0, 'half_day', 'absent', 300.00, 400.00, 150.00, '2025-10-08 01:33:39', '2025-10-08 01:33:39'),
(90, 1, '2025-10-04', 0, 0, 'absent', 'absent', 300.00, 400.00, 0.00, '2025-10-08 01:33:39', '2025-10-08 01:33:39'),
(91, 1, '2025-10-05', 0, 1, 'absent', 'half_day', 300.00, 400.00, 200.00, '2025-10-08 01:33:39', '2025-10-08 01:33:39'),
(92, 2, '2025-09-29', 1, 0, 'present', 'absent', 340.00, 320.00, 340.00, '2025-10-08 01:33:39', '2025-10-08 01:33:39'),
(93, 2, '2025-09-30', 1, 0, 'present', 'absent', 340.00, 320.00, 340.00, '2025-10-08 01:33:39', '2025-10-08 01:33:39'),
(94, 2, '2025-10-01', 1, 0, 'present', 'absent', 340.00, 320.00, 340.00, '2025-10-08 01:33:39', '2025-10-08 01:33:39'),
(95, 2, '2025-10-02', 1, 1, 'half_day', 'half_day', 340.00, 320.00, 330.00, '2025-10-08 01:33:39', '2025-10-08 01:33:39'),
(96, 2, '2025-10-03', 1, 0, 'half_day', 'absent', 340.00, 320.00, 170.00, '2025-10-08 01:33:39', '2025-10-08 01:33:39'),
(97, 2, '2025-10-04', 0, 0, 'absent', 'absent', 340.00, 320.00, 0.00, '2025-10-08 01:33:40', '2025-10-08 01:33:40'),
(98, 2, '2025-10-05', 0, 0, 'absent', 'absent', 340.00, 320.00, 0.00, '2025-10-08 01:33:40', '2025-10-08 01:33:40'),
(99, 3, '2025-09-29', 1, 0, 'present', 'absent', 800.00, 900.00, 800.00, '2025-10-08 01:33:40', '2025-10-08 01:33:40'),
(100, 3, '2025-09-30', 1, 0, 'half_day', 'absent', 800.00, 900.00, 400.00, '2025-10-08 01:33:40', '2025-10-08 01:33:40'),
(101, 3, '2025-10-01', 1, 0, 'present', 'absent', 800.00, 900.00, 800.00, '2025-10-08 01:33:40', '2025-10-08 01:33:40'),
(102, 3, '2025-10-02', 0, 1, 'absent', 'half_day', 800.00, 900.00, 450.00, '2025-10-08 01:33:40', '2025-10-08 01:33:40'),
(103, 3, '2025-10-03', 1, 0, 'present', 'absent', 800.00, 900.00, 800.00, '2025-10-08 01:33:40', '2025-10-08 01:33:40'),
(104, 3, '2025-10-04', 1, 1, 'present', 'half_day', 800.00, 900.00, 1250.00, '2025-10-08 01:33:40', '2025-10-08 01:33:40'),
(105, 3, '2025-10-05', 1, 0, 'half_day', 'absent', 800.00, 900.00, 400.00, '2025-10-08 01:33:40', '2025-10-08 01:33:40'),
(106, 4, '2025-09-29', 1, 0, 'present', 'absent', 590.00, 910.00, 590.00, '2025-10-08 01:33:40', '2025-10-08 01:33:40'),
(107, 4, '2025-09-30', 0, 0, 'absent', 'absent', 590.00, 910.00, 0.00, '2025-10-08 01:33:40', '2025-10-08 01:33:40'),
(108, 4, '2025-10-01', 0, 0, 'absent', 'absent', 590.00, 910.00, 0.00, '2025-10-08 01:33:40', '2025-10-08 01:33:40'),
(109, 4, '2025-10-02', 0, 1, 'absent', 'half_day', 590.00, 910.00, 455.00, '2025-10-08 01:33:40', '2025-10-08 01:33:40'),
(110, 4, '2025-10-03', 1, 1, 'present', 'half_day', 590.00, 910.00, 1045.00, '2025-10-08 01:33:40', '2025-10-08 01:33:40'),
(111, 4, '2025-10-04', 1, 0, 'half_day', 'absent', 590.00, 910.00, 295.00, '2025-10-08 01:33:40', '2025-10-08 01:33:40'),
(112, 4, '2025-10-05', 0, 0, 'absent', 'absent', 590.00, 910.00, 0.00, '2025-10-08 01:33:40', '2025-10-08 01:33:40');

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
-- Table structure for table `labour_managements`
--

CREATE TABLE `labour_managements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `day_shift` varchar(255) DEFAULT NULL,
  `night_shift` varchar(255) DEFAULT NULL,
  `aadhar_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `labour_managements`
--

INSERT INTO `labour_managements` (`id`, `name`, `mobile_number`, `day_shift`, `night_shift`, `aadhar_number`, `address`, `document`, `created_at`, `updated_at`) VALUES
(1, 'Ravi Kishan', '890980890', '300', '400', '787878787878', 'Indore', 'uploads/module_files/YZQpM8ZQyXdH4eS8gir3I9kHzgUi1IGHuMrfzwu2.png', NULL, NULL),
(2, 'Salman', '89898098', '340', '320', '76387409438', '59 Hague Drive', 'uploads/module_files/pUZ7nIv14SswkyFsBl58npxL2TDBzaWdsRMrfCnM.pdf', NULL, NULL),
(3, 'watson', '8908099999', '800', '900', NULL, NULL, NULL, NULL, NULL),
(4, 'Devendra', '789898988', '590', '910', '899798089809', '59 Hague Drive', NULL, NULL, NULL);

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
(7, '2025_09_24_061140_create_bags_table', 7),
(8, '2025_03_13_064511_create_personal_access_tokens_table', 8),
(9, '2025_10_06_123614_create_attendances_table', 9),
(10, '2025_10_08_080509_create_role_modules_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(5, 'App\\Models\\Admin', 12),
(7, 'App\\Models\\Admin', 8);

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
(34, 'Item Master', 1, 1, 1, '2025-10-01 04:19:20', '2025-10-01 04:19:20'),
(35, 'Labour Management', 1, 1, 1, '2025-10-06 06:59:20', '2025-10-06 06:59:20');

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
(222, 34, 'HSN/SAC', 'text', '[]', 0, 1, NULL, 'Enter a HSN/SAC', NULL, NULL, '2025-10-01 04:27:19', '2025-10-01 04:27:19'),
(223, 35, 'Name', 'text', '[]', 1, 1, NULL, 'Enter  Name', NULL, NULL, '2025-10-06 06:59:20', '2025-10-06 06:59:20'),
(224, 35, 'Mobile Number', 'number', '[]', 1, 1, NULL, 'Enter  Mobile Number', NULL, NULL, '2025-10-06 06:59:20', '2025-10-06 06:59:20'),
(225, 35, 'Day shift', 'number', '[]', 1, 1, NULL, 'Enter Day shift Amount', NULL, NULL, '2025-10-06 06:59:20', '2025-10-06 06:59:20'),
(226, 35, 'Night shift', 'number', '[]', 0, 1, NULL, 'Enter Night  shift Amount', NULL, NULL, '2025-10-06 06:59:20', '2025-10-06 06:59:20'),
(227, 35, 'Aadhar Number', 'number', '[]', 0, 1, NULL, 'Enter Aadhar Number', NULL, 12, '2025-10-06 06:59:20', '2025-10-06 06:59:20'),
(228, 35, 'Address', 'text', '[]', 0, 1, NULL, NULL, NULL, NULL, '2025-10-06 06:59:20', '2025-10-06 06:59:20'),
(229, 35, 'Document', 'file', '[]', 0, 1, NULL, NULL, NULL, NULL, '2025-10-06 06:59:20', '2025-10-06 06:59:20');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'manage dashboard', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(2, 'create order_booking', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(3, 'edit order_booking', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(4, 'delete order_booking', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(5, 'view order_booking', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(6, 'manage order_booking', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(7, 'create lr_consignment', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(8, 'edit lr_consignment', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(9, 'delete lr_consignment', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(10, 'view lr_consignment', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(11, 'manage lr_consignment', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(12, 'create freight_bill', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(13, 'edit freight_bill', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(14, 'delete freight_bill', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(15, 'view freight_bill', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(16, 'manage freight_bill', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(17, 'create vehicles', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(18, 'edit vehicles', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(19, 'delete vehicles', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(20, 'view vehicles', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(21, 'manage vehicles', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(22, 'create maintenance', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(23, 'edit maintenance', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(24, 'delete maintenance', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(25, 'view maintenance', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(26, 'manage maintenance', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(27, 'create tyres', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(28, 'edit tyres', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(29, 'delete tyres', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(30, 'view tyres', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(31, 'manage tyres', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(32, 'create task_managment', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(33, 'edit task_managment', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(34, 'delete task_managment', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(35, 'view task_managment', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(36, 'manage task_managment', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(37, 'create employees', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(38, 'edit employees', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(39, 'delete employees', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(40, 'view employees', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(41, 'manage employees', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(42, 'create drivers', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(43, 'edit drivers', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(44, 'delete drivers', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(45, 'view drivers', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(46, 'manage drivers', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(47, 'create attendance', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(48, 'manage attendance', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(49, 'create payroll', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(50, 'edit payroll', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(51, 'delete payroll', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(52, 'view payroll', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(53, 'manage payroll', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(54, 'create customer', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(55, 'edit customer', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(56, 'delete customer', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(57, 'view customer', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(58, 'manage customer', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(59, 'create package_type', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(60, 'edit package_type', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(61, 'delete package_type', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(62, 'view package_type', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(63, 'manage package_type', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(64, 'create destination', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(65, 'edit destination', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(66, 'delete destination', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(67, 'view destination', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(68, 'manage destination', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(69, 'create contract', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(70, 'edit contract', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(71, 'delete contract', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(72, 'view contract', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(73, 'manage contract', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(74, 'create vehicle_type', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(75, 'edit vehicle_type', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(76, 'delete vehicle_type', 'web', '2025-05-04 03:02:17', '2025-05-04 03:02:17'),
(77, 'view vehicle_type', 'web', '2025-05-04 03:02:18', '2025-05-04 03:02:18'),
(78, 'manage vehicle_type', 'web', '2025-05-04 03:02:18', '2025-05-04 03:02:18'),
(79, 'create warehouse', 'web', '2025-05-04 03:02:18', '2025-05-04 03:02:18'),
(80, 'edit warehouse', 'web', '2025-05-04 03:02:18', '2025-05-04 03:02:18'),
(81, 'delete warehouse', 'web', '2025-05-04 03:02:18', '2025-05-04 03:02:18'),
(82, 'view warehouse', 'web', '2025-05-04 03:02:18', '2025-05-04 03:02:18'),
(83, 'manage warehouse', 'web', '2025-05-04 03:02:18', '2025-05-04 03:02:18'),
(84, 'edit stock_transfer', 'web', '2025-05-04 03:02:18', '2025-05-04 03:02:18'),
(85, 'delete stock_transfer', 'web', '2025-05-04 03:02:18', '2025-05-04 03:02:18'),
(86, 'view stock_transfer', 'web', '2025-05-04 03:02:18', '2025-05-04 03:02:18'),
(87, 'manage stock_transfer', 'web', '2025-05-04 03:02:18', '2025-05-04 03:02:18'),
(88, 'create permissions', 'web', '2025-05-04 03:02:18', '2025-05-04 03:02:18'),
(89, 'edit permissions', 'web', '2025-05-04 03:02:18', '2025-05-04 03:02:18'),
(90, 'delete permissions', 'web', '2025-05-04 03:02:18', '2025-05-04 03:02:18'),
(91, 'view permissions', 'web', '2025-05-04 03:02:18', '2025-05-04 03:02:18'),
(92, 'manage permissions', 'web', '2025-05-04 03:02:18', '2025-05-04 03:02:18'),
(93, 'create role', 'web', '2025-05-04 03:02:18', '2025-05-04 03:02:18'),
(94, 'edit role', 'web', '2025-05-04 03:02:18', '2025-05-04 03:02:18'),
(95, 'delete role', 'web', '2025-05-04 03:02:18', '2025-05-04 03:02:18'),
(96, 'view role', 'web', '2025-05-04 03:02:18', '2025-05-04 03:02:18'),
(97, 'manage role', 'web', '2025-05-04 03:02:18', '2025-05-04 03:02:18'),
(98, 'create settings', 'web', '2025-05-04 03:02:18', '2025-05-04 03:02:18'),
(99, 'edit settings', 'web', '2025-05-04 03:02:18', '2025-05-04 03:02:18'),
(100, 'delete settings', 'web', '2025-05-04 03:02:18', '2025-05-04 03:02:18'),
(101, 'view settings', 'web', '2025-05-04 03:02:18', '2025-05-04 03:02:18'),
(102, 'manage settings', 'web', '2025-05-04 03:02:18', '2025-05-04 03:02:18'),
(103, 'create stock_transfer', 'web', '2025-05-04 06:46:22', '2025-05-04 06:46:22'),
(104, 'create payout', 'web', '2025-05-04 08:02:01', '2025-05-04 08:02:01'),
(105, 'edit payout', 'web', '2025-05-04 08:02:01', '2025-05-04 08:02:01'),
(106, 'delete payout', 'web', '2025-05-04 08:02:01', '2025-05-04 08:02:01'),
(107, 'view payout', 'web', '2025-05-04 08:02:01', '2025-05-04 08:02:01'),
(108, 'manage payout', 'web', '2025-05-04 08:02:01', '2025-05-04 08:02:01'),
(109, 'create users', 'web', '2025-05-05 08:03:09', '2025-05-05 08:03:09'),
(110, 'edit users', 'web', '2025-05-05 08:03:09', '2025-05-05 08:03:09'),
(111, 'delete users', 'web', '2025-05-05 08:03:09', '2025-05-05 08:03:09'),
(112, 'view users', 'web', '2025-05-05 08:03:10', '2025-05-05 08:03:10'),
(113, 'manage users', 'web', '2025-05-05 08:03:10', '2025-05-05 08:03:10');

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
(10, '2025-09-27', '42344324', '22', '25', 'Dal', 'Red', 120.60, '20', 'Indore', 2000, 'good', '1 month', ',..', 'Await Delivery', '2025-09-25 05:10:06', '2025-10-06 06:10:13');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(5, 'hr', 'web', '2025-05-04 06:29:53', '2025-05-05 01:01:16'),
(7, 'admin', 'web', '2025-05-04 06:53:25', '2025-05-04 06:53:25'),
(12, 'employee', 'web', '2025-05-22 08:09:37', '2025-05-22 08:09:37'),
(13, 'Manager', 'web', '2025-06-23 05:01:23', '2025-06-23 05:01:23');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 5),
(1, 7),
(1, 12),
(1, 13),
(2, 5),
(2, 7),
(2, 12),
(2, 13),
(3, 5),
(3, 7),
(3, 12),
(3, 13),
(4, 5),
(4, 7),
(4, 12),
(4, 13),
(5, 5),
(5, 7),
(5, 12),
(5, 13),
(6, 5),
(6, 7),
(6, 12),
(6, 13),
(7, 5),
(7, 7),
(7, 13),
(8, 5),
(8, 7),
(8, 13),
(9, 5),
(9, 7),
(9, 13),
(10, 5),
(10, 7),
(10, 12),
(10, 13),
(11, 5),
(11, 7),
(11, 12),
(11, 13),
(12, 5),
(12, 7),
(12, 13),
(13, 5),
(13, 7),
(13, 13),
(14, 5),
(14, 7),
(14, 13),
(15, 5),
(15, 7),
(15, 13),
(16, 5),
(16, 7),
(16, 13),
(17, 5),
(17, 7),
(17, 13),
(18, 5),
(18, 7),
(18, 13),
(19, 5),
(19, 7),
(19, 13),
(20, 5),
(20, 7),
(20, 13),
(21, 5),
(21, 7),
(21, 13),
(22, 5),
(22, 7),
(22, 13),
(23, 5),
(23, 7),
(23, 13),
(24, 5),
(24, 7),
(24, 13),
(25, 5),
(25, 7),
(25, 13),
(26, 5),
(26, 7),
(26, 13),
(27, 5),
(27, 7),
(27, 13),
(28, 5),
(28, 7),
(28, 13),
(29, 5),
(29, 7),
(29, 13),
(30, 5),
(30, 7),
(30, 13),
(31, 5),
(31, 7),
(31, 13),
(32, 5),
(32, 7),
(32, 13),
(33, 5),
(33, 7),
(33, 13),
(34, 5),
(34, 7),
(34, 12),
(34, 13),
(35, 5),
(35, 7),
(35, 12),
(35, 13),
(36, 5),
(36, 7),
(36, 12),
(36, 13),
(37, 5),
(37, 7),
(37, 12),
(37, 13),
(38, 5),
(38, 7),
(38, 12),
(38, 13),
(39, 5),
(39, 7),
(39, 12),
(39, 13),
(40, 5),
(40, 7),
(40, 12),
(40, 13),
(41, 5),
(41, 7),
(41, 12),
(41, 13),
(42, 5),
(42, 7),
(42, 13),
(43, 5),
(43, 7),
(43, 13),
(44, 5),
(44, 7),
(44, 13),
(45, 5),
(45, 7),
(45, 13),
(46, 5),
(46, 7),
(46, 13),
(47, 5),
(47, 7),
(47, 12),
(47, 13),
(48, 5),
(48, 7),
(48, 12),
(48, 13),
(49, 5),
(49, 7),
(49, 13),
(50, 5),
(50, 7),
(50, 13),
(51, 5),
(51, 7),
(51, 13),
(52, 5),
(52, 7),
(52, 13),
(53, 5),
(53, 7),
(53, 13),
(54, 5),
(54, 7),
(54, 13),
(55, 5),
(55, 7),
(55, 13),
(56, 5),
(56, 7),
(56, 13),
(57, 5),
(57, 7),
(57, 13),
(58, 5),
(58, 7),
(58, 13),
(59, 5),
(59, 7),
(59, 13),
(60, 5),
(60, 7),
(60, 13),
(61, 5),
(61, 7),
(61, 13),
(62, 5),
(62, 7),
(62, 13),
(63, 5),
(63, 7),
(63, 13),
(64, 5),
(64, 7),
(64, 13),
(65, 5),
(65, 7),
(65, 13),
(66, 5),
(66, 7),
(66, 13),
(67, 5),
(67, 7),
(67, 13),
(68, 5),
(68, 7),
(68, 13),
(69, 5),
(69, 7),
(69, 13),
(70, 5),
(70, 7),
(70, 13),
(71, 5),
(71, 7),
(71, 13),
(72, 5),
(72, 7),
(72, 13),
(73, 5),
(73, 7),
(73, 13),
(74, 5),
(74, 7),
(74, 13),
(75, 5),
(75, 7),
(75, 13),
(76, 5),
(76, 7),
(76, 13),
(77, 5),
(77, 7),
(77, 13),
(78, 5),
(78, 7),
(78, 13),
(79, 5),
(79, 7),
(79, 13),
(80, 5),
(80, 7),
(80, 13),
(81, 5),
(81, 7),
(81, 13),
(82, 5),
(82, 7),
(82, 13),
(83, 5),
(83, 7),
(83, 13),
(84, 5),
(84, 7),
(84, 13),
(85, 5),
(85, 7),
(85, 13),
(86, 5),
(86, 7),
(86, 13),
(87, 5),
(87, 7),
(87, 13),
(88, 5),
(88, 7),
(88, 13),
(89, 5),
(89, 7),
(89, 13),
(90, 5),
(90, 7),
(90, 13),
(91, 5),
(91, 7),
(91, 13),
(92, 5),
(92, 7),
(92, 13),
(93, 5),
(93, 7),
(93, 13),
(94, 5),
(94, 7),
(94, 13),
(95, 5),
(95, 7),
(95, 13),
(96, 5),
(96, 7),
(96, 13),
(97, 5),
(97, 7),
(97, 13),
(98, 5),
(98, 7),
(98, 13),
(99, 5),
(99, 7),
(99, 13),
(100, 5),
(100, 7),
(100, 13),
(101, 5),
(101, 7),
(101, 13),
(102, 5),
(102, 7),
(102, 13),
(103, 5),
(103, 7),
(103, 13),
(104, 5),
(104, 7),
(104, 13),
(105, 5),
(105, 7),
(105, 13),
(106, 5),
(106, 7),
(106, 13),
(107, 5),
(107, 7),
(107, 13),
(108, 5),
(108, 7),
(108, 13),
(109, 5),
(109, 7),
(109, 13),
(110, 5),
(110, 7),
(110, 13),
(111, 5),
(111, 7),
(111, 13),
(112, 5),
(112, 7),
(112, 13),
(113, 5),
(113, 7),
(113, 13);

-- --------------------------------------------------------

--
-- Table structure for table `role_modules`
--

CREATE TABLE `role_modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_name` varchar(255) NOT NULL,
  `actions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`actions`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `unit` varchar(255) DEFAULT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `sale_contracts`
--

CREATE TABLE `sale_contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) DEFAULT NULL,
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

INSERT INTO `sale_contracts` (`id`, `status`, `contract_date`, `contract_no`, `seller_name`, `buyer_name`, `commodity`, `packing`, `shipment_date`, `price`, `quantity`, `total_value`, `payment_terms`, `documents`, `document_names`, `seller_bank_details`, `terms_conditions`, `created_at`, `updated_at`) VALUES
(7, 'approved', '2025-10-09', '001', '25', '22', 'Reprehenderit error', 'Packing', '2025-10-11', 500.00, 10.000, 5000.00, 'Payment Term', '[{\"name\":\"1 Original Invoices\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759583275_0.pdf\"},{\"name\":\"3\\/3 Bill of lading:\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759583275_1.pdf\"},{\"name\":\"1 Origine Certificate\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759583275_2.pdf\"},{\"name\":\"1 Phytosanitary Certificate\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759583275_3.pdf\"},{\"name\":\"Conformity Certificate\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759583794_0.pdf\"},{\"name\":\"Weight & Quality Certificate\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759583794_1.pdf\"},{\"name\":\"1 Fumigation Certificate\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759583794_2.pdf\"},{\"name\":\"1 Packing List\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759583794_3.pdf\"},{\"name\":\"1 Original Invoices\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759584532_0.pdf\"},{\"name\":\"3\\/3 Bill of lading:\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759584532_1.pdf\"}]', NULL, 'Seller Bank Details', '<p>Terms &amp; Conditions</p>', '2025-10-04 07:37:55', '2025-10-06 05:51:09'),
(8, 'rejected', '2025-10-10', '002232', '25', '25', 'Reprehenderit error', 'Irure quo voluptatib', '2025-10-10', 212.00, 1.000, 212.00, 'Payment Term', '[{\"name\":\"1 Original Invoices\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759585664_0.pdf\"},{\"name\":\"3\\/3 Bill of lading:\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759585664_1.pdf\"},{\"name\":\"1 Origine Certificate.\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759585664_2.pdf\"},{\"name\":\"1 Phytosanitary Certificate\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759585664_3.pdf\"},{\"name\":\"1 Packing List\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759585664_4.pdf\"},{\"name\":\"1 Fumigation Certificate\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759585664_5.pdf\"},{\"name\":\"Weight & Quality Certificate\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759585664_6.pdf\"},{\"name\":\"Conformity Certificate\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759585664_7.pdf\"},{\"name\":\"1 Original Invoices Three\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759585664_8.pdf\"}]', NULL, 'Seller Bank Details', '<p>Terms &amp; Conditions</p>', '2025-10-04 08:17:44', '2025-10-06 05:50:59'),
(9, 'approved', '2025-10-16', '00243', '25', '22', 'asdas', 'asda', '2025-10-16', 342.00, 34.000, 11628.00, 'sdsf', '[{\"name\":\"1 Original Invoices\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759746975_0.pdf\"},{\"name\":\"3\\/3 Bill of lading:\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759746975_1.pdf\"},{\"name\":\"1 Origine Certificate.\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759746975_2.pdf\"},{\"name\":\"1 Phytosanitary Certificate\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759746975_3.pdf\"},{\"name\":\"1 Packing List\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759746975_4.pdf\"},{\"name\":\"1 Fumigation Certificate\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759746975_5.pdf\"},{\"name\":\"Weight & Quality Certificate\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759746975_6.pdf\"},{\"name\":\"Conformity Certificate\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759746975_7.pdf\"}]', NULL, 'ss', '<p>TERMS AND CONDITIONS:</p><p>Other terms: As per GAFTA 88 Any Inconsistency between this contract document and the above mentioned \"Other terms\" to be resolved</p><p>in favour of this document.</p><p>Condition: If any changes in duty structure, trade will be subject to mutual discussion between buyer and seller. Trade can be</p><p>cancelled either seller or buyer wants to cancel or price renagotiable in case of any change in export duty structure in India.</p><p>SELLER</p><p>Force majeure : The seller shall not be liable for delay or non-performance of the contract in whole or part of this contractual obligation in</p><p>consequence of war, blockade, revolution, insurrection, civil commotions , riots, acts of government , act of God , Plague or other epidemic,</p><p>fire, flood, sabotage, quarantine restriction, explosion, embargo, non-availability / cancellation of vessel by shipping line &amp; any change /</p><p>modification in commercial loss &amp; regulation by government including sanctions for currency / export procedure.</p><p>B/L Will be Consignee : TO ORDER</p><p>SHALEEN OVERSEAS PRIVATE LIMITED</p><p>The Product is Subject to existing Government Policies of Government allowing to export freely in country of origin. Any Change</p><p>in Government Policy on Product to have necessary changes accordingly.</p><p>If custom will create any issue or if shipment stuck here so the contract will be cancel.</p><p>If the buyer fails to clear the goods within the free days stipulated by the shipping line at the destination, it shall be considered</p><p>as deemed No Objection Certificate (NOC) from the buyer. In such a case, the seller shall have the full right to either sell the</p><p>goods to another buyer or re-export the goods from the destination port, without any further consent from the original buyer.</p><p>BROKER NAME</p><p>Agri Allies</p><p>All local bank charges, import duty, taxes, licenses fees etc. present or future &amp; all local port / liner charges at destination are to buyers</p><p>account.</p><p>If the cargo is not cleared within 7 days of vessel arrival, all the risk of degradation in quality, demurrage charges, etc. are to be account of</p><p>the buyer.</p><p>Quality complain if any must be communicated to the seller within 5 days of cargo clearance. No quality complain after 5 days of cargo</p><p>clearance will be considered.</p><p>Free days for liners containers detention charges at discharged port are as per shipping line policy.</p><p>Arbitration: In London as per GAFTA 125 Rules.</p><p>SALE CONTRACT</p><p>Transshipment allowed, Part shipment allowed and Third Party Documents are acceptable.</p><p>Quality and quantity by independent Surveyor at the load port at seller\'s cost will be final and binding on both parties.</p><p>The sales contract should be returned duly signed and stamped as a token of acceptance. If the signed copy of the contract is not returned</p><p>within 3 working days, the seller</p><p>reserves the right to ship goods as per terms of this contract or cancel the same at par without compensation.</p><p>The buyer has to arrange necessary import permit &amp; shipping marks within 7 working days ( if applicable ).asdas terms and condition yescxc</p>', '2025-10-06 05:06:15', '2025-10-06 05:50:43'),
(10, 'approved', '2025-10-14', '001', '25', '22', 'Reprehenderit error', '87', '2025-10-07', 76.00, 67.000, 5092.00, 'Payment Term', '[{\"name\":\"1 Original Invoices\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759749992_0.pdf\"},{\"name\":\"3\\/3 Bill of lading:\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759749992_1.pdf\"},{\"name\":\"1 Origine Certificate.\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759749992_2.pdf\"},{\"name\":\"1 Phytosanitary Certificate\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759749992_3.pdf\"},{\"name\":\"1 Packing List\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759749992_4.pdf\"},{\"name\":\"1 Fumigation Certificate\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759749992_5.pdf\"},{\"name\":\"Weight & Quality Certificate\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759749992_6.pdf\"},{\"name\":\"Conformity Certificate\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759749992_7.pdf\"}]', NULL, 'gjh', '<p>TERMS AND CONDITIONS:</p><p>Other terms: As per GAFTA 88 Any Inconsistency between this contract document and the above mentioned \"Other terms\" to be resolved</p><p>in favour of this document.</p><p>Condition: If any changes in duty structure, trade will be subject to mutual discussion between buyer and seller. Trade can be</p><p>cancelled either seller or buyer wants to cancel or price renagotiable in case of any change in export duty structure in India.</p><p>SELLER</p><p>Force majeure : The seller shall not be liable for delay or non-performance of the contract in whole or part of this contractual obligation in</p><p>consequence of war, blockade, revolution, insurrection, civil commotions , riots, acts of government , act of God , Plague or other epidemic,</p><p>fire, flood, sabotage, quarantine restriction, explosion, embargo, non-availability / cancellation of vessel by shipping line &amp; any change /</p><p>modification in commercial loss &amp; regulation by government including sanctions for currency / export procedure.</p><p>B/L Will be Consignee : TO ORDER</p><p>SHALEEN OVERSEAS PRIVATE LIMITED</p><p>The Product is Subject to existing Government Policies of Government allowing to export freely in country of origin. Any Change</p><p>in Government Policy on Product to have necessary changes accordingly.</p><p>If custom will create any issue or if shipment stuck here so the contract will be cancel.</p><p>If the buyer fails to clear the goods within the free days stipulated by the shipping line at the destination, it shall be considered</p><p>as deemed No Objection Certificate (NOC) from the buyer. In such a case, the seller shall have the full right to either sell the</p><p>goods to another buyer or re-export the goods from the destination port, without any further consent from the original buyer.</p><p>BROKER NAME</p><p>Agri Allies</p><p>All local bank charges, import duty, taxes, licenses fees etc. present or future &amp; all local port / liner charges at destination are to buyers</p><p>account.</p><p>If the cargo is not cleared within 7 days of vessel arrival, all the risk of degradation in quality, demurrage charges, etc. are to be account of</p><p>the buyer.</p><p>Quality complain if any must be communicated to the seller within 5 days of cargo clearance. No quality complain after 5 days of cargo</p><p>clearance will be considered.</p><p>Free days for liners containers detention charges at discharged port are as per shipping line policy.</p><p>Arbitration: In London as per GAFTA 125 Rules.</p><p>SALE CONTRACT</p><p>Transshipment allowed, Part shipment allowed and Third Party Documents are acceptable.</p><p>Quality and quantity by independent Surveyor at the load port at seller\'s cost will be final and binding on both parties.</p><p>The sales contract should be returned duly signed and stamped as a token of acceptance. If the signed copy of the contract is not returned</p><p>within 3 working days, the seller</p><p>reserves the right to ship goods as per terms of this contract or cancel the same at par without compensation.</p><p>The buyer has to arrange necessary import permit &amp; shipping marks within 7 working days ( if applicable ).asdas kjkdhsk khfksjdhf</p>', '2025-10-06 05:56:32', '2025-10-06 05:56:32'),
(11, 'pending', '2025-10-15', '00243', '25', '22', 'asdas', 'Irure quo voluptatib', '2025-10-15', 56.00, 535.000, 29960.00, 'dfd', '[{\"name\":\"1 Original Invoices\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759750122_0.pdf\"},{\"name\":\"3\\/3 Bill of lading:\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759750122_1.pdf\"},{\"name\":\"1 Origine Certificate.\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759750122_2.pdf\"},{\"name\":\"1 Phytosanitary Certificate\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759750122_3.pdf\"},{\"name\":\"1 Packing List\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759750122_4.pdf\"},{\"name\":\"1 Fumigation Certificate\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759750122_5.pdf\"},{\"name\":\"Weight & Quality Certificate\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759750122_6.pdf\"},{\"name\":\"Conformity Certificate\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/documents\\/document_1759750122_7.pdf\"}]', NULL, 'fsdfsdf', '<p>TERMS AND CONDITIONS:</p><p>Other terms: As per GAFTA 88 Any Inconsistency between this contract document and the above mentioned \"Other terms\" to be resolved</p><p>in favour of this document.</p><p>Condition: If any changes in duty structure, trade will be subject to mutual discussion between buyer and seller. Trade can be</p><p>cancelled either seller or buyer wants to cancel or price renagotiable in case of any change in export duty structure in India.</p><p>SELLER</p><p>Force majeure : The seller shall not be liable for delay or non-performance of the contract in whole or part of this contractual obligation in</p><p>consequence of war, blockade, revolution, insurrection, civil commotions , riots, acts of government , act of God , Plague or other epidemic,</p><p>fire, flood, sabotage, quarantine restriction, explosion, embargo, non-availability / cancellation of vessel by shipping line &amp; any change /</p><p>modification in commercial loss &amp; regulation by government including sanctions for currency / export procedure.</p><p>B/L Will be Consignee : TO ORDER</p><p>SHALEEN OVERSEAS PRIVATE LIMITED</p><p>The Product is Subject to existing Government Policies of Government allowing to export freely in country of origin. Any Change</p><p>in Government Policy on Product to have necessary changes accordingly.</p><p>If custom will create any issue or if shipment stuck here so the contract will be cancel.</p><p>If the buyer fails to clear the goods within the free days stipulated by the shipping line at the destination, it shall be considered</p><p>as deemed No Objection Certificate (NOC) from the buyer. In such a case, the seller shall have the full right to either sell the</p><p>goods to another buyer or re-export the goods from the destination port, without any further consent from the original buyer.</p><p>BROKER NAME</p><p>Agri Allies</p><p>All local bank charges, import duty, taxes, licenses fees etc. present or future &amp; all local port / liner charges at destination are to buyers</p><p>account.</p><p>If the cargo is not cleared within 7 days of vessel arrival, all the risk of degradation in quality, demurrage charges, etc. are to be account of</p><p>the buyer.</p><p>Quality complain if any must be communicated to the seller within 5 days of cargo clearance. No quality complain after 5 days of cargo</p><p>clearance will be considered.</p><p>Free days for liners containers detention charges at discharged port are as per shipping line policy.</p><p>Arbitration: In London as per GAFTA 125 Rules.</p><p>SALE CONTRACT</p><p>Transshipment allowed, Part shipment allowed and Third Party Documents are acceptable.</p><p>Quality and quantity by independent Surveyor at the load port at seller\'s cost will be final and binding on both parties.</p><p>The sales contract should be returned duly signed and stamped as a token of acceptance. If the signed copy of the contract is not returned</p><p>within 3 working days, the seller</p><p>reserves the right to ship goods as per terms of this contract or cancel the same at par without compensation.</p><p>The buyer has to arrange necessary import permit &amp; shipping marks within 7 working days ( if applicable ).asdas kjkdhsk khfksjdhf hghgjs</p>', '2025-10-06 05:58:42', '2025-10-06 05:58:53');

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
('bmBZt4wzYOgYcMuYBjt7o5ZxE3lmBC92L7B2BY48', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidGo2VEs1bHF6ZzUwUG1BT21tWWE1MmtWanpNZ1RHWkN6d0RpWTlBWiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9zYWxlIjt9czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyNzt9', 1759920257),
('SRnJS9EFwbaz55SrFGpGcPqU2Kn9pY5zZMAbU9nQ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTXA5cGZFdnhBNURkcENDMnBsb2JFcmZNeVcxNThiYmY5UEFoMWZ0UyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9yb2xlL2VkaXQvNSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjc7fQ==', 1759917830);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'Terms & Conditions', '<p><strong>TERMS AND CONDITIONS:</strong></p><p><i>Other terms</i>: As per GAFTA 88 Any Inconsistency between this contract document and the above mentioned \"Other terms\" to be resolved</p><p>in favour of this document.</p><p><i>Condition</i>: If any changes in duty structure, trade will be subject to mutual discussion between buyer and seller. Trade can be</p><p>cancelled either seller or buyer wants to cancel or price renagotiable in case of any change in export duty structure in India.</p><p>SELLER</p><p><i>Force majeure</i> : The seller shall not be liable for delay or non-performance of the contract in whole or part of this contractual obligation in</p><p>consequence of war, blockade, revolution, insurrection, civil commotions , riots, acts of government , act of God , Plague or other epidemic,</p><p>fire, flood, sabotage, quarantine restriction, explosion, embargo, non-availability / cancellation of vessel by shipping line &amp; any change /</p><p>modification in commercial loss &amp; regulation by government including sanctions for currency / export procedure.</p><p><i>B/L Will be Consignee</i> : TO ORDER</p><p>SHALEEN OVERSEAS PRIVATE LIMITED</p><p>The Product is Subject to existing Government Policies of Government allowing to export freely in country of origin. Any Change</p><p>in Government Policy on Product to have necessary changes accordingly.</p><p>If custom will create any issue or if shipment stuck here so the contract will be cancel.</p><p>If the buyer fails to clear the goods within the free days stipulated by the shipping line at the destination, it shall be considered</p><p>as deemed No Objection Certificate (NOC) from the buyer. In such a case, the seller shall have the full right to either sell the</p><p>goods to another buyer or re-export the goods from the destination port, without any further consent from the original buyer.</p><p>BROKER NAME</p><p>Agri Allies</p><p>All local bank charges, import duty, taxes, licenses fees etc. present or future &amp; all local port / liner charges at destination are to buyers</p><p>account.</p><p>If the cargo is not cleared within 7 days of vessel arrival, all the risk of degradation in quality, demurrage charges, etc. are to be account of</p><p>the buyer.</p><p>Quality complain if any must be communicated to the seller within 5 days of cargo clearance. No quality complain after 5 days of cargo</p><p>clearance will be considered.</p><p>Free days for liners containers detention charges at discharged port are as per shipping line policy.</p><p>Arbitration: In London as per GAFTA 125 Rules.</p><p>SALE CONTRACT</p><p>Transshipment allowed, Part shipment allowed and Third Party Documents are acceptable.</p><p>Quality and quantity by independent Surveyor at the load port at seller\'s cost will be final and binding on both parties.</p><p>The sales contract should be returned duly signed and stamped as a token of acceptance. If the signed copy of the contract is not returned</p><p>within 3 working days, the seller</p><p>reserves the right to ship goods as per terms of this contract or cancel the same at par without compensation.</p><p>The buyer has to arrange necessary import permit &amp; shipping marks within 7 working days ( if applicable ).asdas kjkdhsk khfksjdhf</p>', '2025-10-06 04:45:44', '2025-10-07 08:35:50');

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
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `labour_managements`
--
ALTER TABLE `labour_managements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `role_modules`
--
ALTER TABLE `role_modules`
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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

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
-- AUTO_INCREMENT for table `labour_managements`
--
ALTER TABLE `labour_managements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary key', AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `module_fields`
--
ALTER TABLE `module_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary key', AUTO_INCREMENT=230;

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
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `role_modules`
--
ALTER TABLE `role_modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sale_contracts`
--
ALTER TABLE `sale_contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

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
