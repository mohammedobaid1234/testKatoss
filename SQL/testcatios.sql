-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2023 at 01:29 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testcatios`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mohammed Obaid', 'admin@admin.com', NULL, '$2y$10$Ykv40z6NDwQbC.9Lj9HB1.f.8NuHNwIHSuuYHfOcviegJiOx/CIU.', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('read','un_read') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'un_read',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `mobile_no`, `email`, `subject`, `message`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sigourney Franklin', NULL, 'hesigoxef@mailinator.com', 'devekasy@mailinator.com', 'Illo non enim elit', 'un_read', '2023-01-23 16:22:52', '2023-01-23 16:22:52', NULL),
(2, 'Ciara Ford', '+1 (979) 367-2573', 'wegofunala@mailinator.com', 'vegem@mailinator.com', 'Animi commodi ut do', 'un_read', '2023-01-23 16:26:05', '2023-01-23 16:26:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(13, 'mail', '{\"uuid\":\"953cc9f5-4fbc-46e0-8632-532afda56495\",\"displayName\":\"App\\\\Jobs\\\\SendMailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendMailJob\",\"command\":\"O:20:\\\"App\\\\Jobs\\\\SendMailJob\\\":10:{s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";s:4:\\\"mail\\\";s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1674520157, 1674520157);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2019_08_19_000000_create_failed_jobs_table', 1),
(13, '2023_01_22_203856_create_settings_table', 1),
(15, '2023_01_22_205944_create_admins_table', 2),
(16, '2023_01_22_210013_create_sections_table', 3),
(17, '2023_01_22_210056_create_services_table', 3),
(18, '2023_01_22_210157_create_news_table', 3),
(19, '2023_01_22_210304_create_contact_us_table', 3),
(21, '2023_01_24_000321_create_jobs_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `label`, `body`, `image`, `user_name`, `user_image`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Make your team a Design driven company', '<h4 class=\"title\"><span style=\"font-size: 13px;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.</span><br></h4>', 'gYGzM9BVLd1Alx8Jgxpb0RBqYAr6IBbaJOWLIWTb.jpg', 'Make your team a Design driven company', NULL, NULL, '2023-01-23 15:38:05', '2023-01-23 21:18:56', NULL),
(2, 'The newest web framework that changed the world', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.<br></p>', 'fPgkHkJp1CDCBfd925TaZR45QALkWljiMMdfdZcR.jpg', 'BY TIM NORTON', 'w77IuOeNbiZpeup9wWtWUXz3QOoWFbIAELxsLXIX.jpg', NULL, '2023-01-23 16:01:25', '2023-01-23 20:39:36', NULL),
(3, '5 ways to improve user retention for your startup', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.<br></p>', 'oT7EALeeK7CO4L1hEnbNgs458ZMtIhaG5oV8uYoU.jpg', 'BY TIM NORTON', 'mBE41TUfaFIVxC5Q6sXDuRFKWqPYj4Db9DrMEzTr.jpg', NULL, '2023-01-23 20:40:51', '2023-01-23 20:40:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `label`, `body`, `image`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'headerSection', '<h1>Corporate &amp; Business Site Template by Ayro UI.</h1><h1><p style=\"font-size: 13px;\">We are a digital agency that helps brands to achieve their business outcomes. We see technology as a tool to create amazing things.</p></h1>', 'ZSYTX6STZdHUsBIiFpBQpV8zBLkhWz0bpBAnv29U.jpg', NULL, '2023-01-23 19:43:42', '2023-01-23 19:43:43', NULL),
(4, 'about As', '<h6 class=\"small-title text-lg\">About Us</h6><h2 class=\"main-title fw-bold\">Our team comes with the experience and knowledge</h2>', '7UY0kCjR3Y1XJ3pnnukHO1wSuuwRSVeweVPdfOz8.jpg', NULL, '2023-01-23 19:58:23', '2023-01-23 19:58:43', NULL),
(5, 'servcies', '<h6>Services</h6><h2 class=\"fw-bold\">Our Best Services</h2><p style=\"font-size: 13px;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>', NULL, NULL, '2023-01-23 20:07:23', '2023-01-23 20:07:23', NULL),
(6, 'news', '<h6>latest news</h6><h2 class=\"fw-bold\">Latest News &amp; Blog</h2><p style=\"font-size: 13px;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>', NULL, NULL, '2023-01-23 20:23:20', '2023-01-23 20:23:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `label`, `body`, `image`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'servcie1', '<h4>Refreshing Design</h4><h4><p style=\"font-size: 13px;\">Lorem ipsum dolor sit amet, adipscing elitr, sed diam nonumy eirmod tempor ividunt labor dolore magna.</p></h4>', 'Ig5fWHfZvgkpKYII4Lr46LmJ9v1qIa26NbOrYzro.jpg', NULL, '2023-01-23 16:07:26', '2023-01-23 20:13:02', NULL),
(2, 'servcie2', '<h4>Solid Bootstrap 5</h4><h4><p style=\"font-size: 13px;\">Lorem ipsum dolor sit amet, adipscing elitr, sed diam nonumy eirmod tempor ividunt labor dolore magna.</p></h4>', NULL, NULL, '2023-01-23 20:13:28', '2023-01-23 20:13:28', NULL),
(3, 'servcie3', '<h4>100+ Components</h4><h4><p style=\"font-size: 13px;\">Lorem ipsum dolor sit amet, adipscing elitr, sed diam nonumy eirmod tempor ividunt labor dolore magna.</p></h4>', NULL, NULL, '2023-01-23 20:13:54', '2023-01-23 20:13:54', NULL),
(4, 'servcie4', '<h4>Speed Optimized</h4><h4><p style=\"font-size: 13px;\">Lorem ipsum dolor sit amet, adipscing elitr, sed diam nonumy eirmod tempor ividunt labor dolore magna.</p></h4>', NULL, NULL, '2023-01-23 20:14:14', '2023-01-23 20:14:14', NULL),
(5, 'servcie4', '<h4>Speed Optimized</h4><h4><p style=\"font-size: 13px;\">Lorem ipsum dolor sit amet, adipscing elitr, sed diam nonumy eirmod tempor ividunt labor dolore magna.</p></h4>', NULL, NULL, '2023-01-23 20:14:14', '2023-01-23 20:14:22', '2023-01-23 20:14:22'),
(6, 'servcie5', '<h4>Fully Customizable</h4><h4><p style=\"font-size: 13px;\">Lorem ipsum dolor sit amet, adipscing elitr, sed diam nonumy eirmod tempor ividunt labor dolore magna.</p></h4>', NULL, NULL, '2023-01-23 20:14:42', '2023-01-23 20:14:42', NULL),
(7, 'servcie6', '<h4>Regular Updates</h4><h4><p style=\"font-size: 13px;\">Lorem ipsum dolor sit amet, adipscing elitr, sed diam nonumy eirmod tempor ividunt labor dolore magna.</p></h4>', NULL, NULL, '2023-01-23 20:15:07', '2023-01-23 20:15:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copy_right` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Schedule` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `who_are` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `our_vision` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `our_history` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `header_video`, `footer`, `copy_right`, `mobile_no`, `email`, `address`, `Schedule`, `who_are`, `our_vision`, `our_history`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'https://www.youtube.com/watch?v=r44RKWyfcFw&fbclid=IwAR21beSJORalzmzokxDRcGfkZA1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM', '<h4>Address</h4><h4><p style=\"font-size: 13px;\">175 5th Ave, New York, NY 10010</p><p style=\"font-size: 13px;\">United States</p></h4>', '<p><span style=\"color: rgb(255, 255, 255);\">Making the world a better place through constructing elegant hierarchies.</span><br></p>', '00972594034429', 'mhmd.obaid.18@gmail.com', '<h4>Address</h4><h4><p style=\"font-size: 13px;\">175 5th Ave, New York, NY 10010</p><p style=\"font-size: 13px;\">United States</p></h4>', '<h4>Schedule</h4><h4><p style=\"font-size: 13px;\">24 Hours / 7 Days Open</p><p style=\"font-size: 13px;\">Office time: 10 AM - 5:30 PM</p></h4>', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, look like readable English.</p><p>There are many variations of passages of Lorem Ipsum available, but the majority have in some form, by injected humour.</p>', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, look like readable English.</p><p>There are many variations of passages of Lorem Ipsum available, but the majority have in some form, by injected humour.</p>', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, look like readable English.</p><p>There are many variations of passages of Lorem Ipsum available, but the majority have in some form, by injected humour.</p>', NULL, '2023-01-23 21:03:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Kade Bosco', 'judah.homenick@example.net', '2023-01-23 22:09:55', '$2y$10$K3X2OJl/z8jC8WGYnpvocOOrVMGrAl6WYbRj8HOPJb4vRU8wkotVK', 'RDEQaLiF0o', '2023-01-23 22:09:56', '2023-01-23 22:09:56'),
(2, 'Prof. Enos Thiel MD', 'friesen.daija@example.com', '2023-01-23 22:09:55', '$2y$10$oxoqD7kMuC/xk246UcAf1Ol5.BnTy88bFHsWdFNo8zclNtbtxke9W', 'KtLNySj5uX', '2023-01-23 22:09:56', '2023-01-23 22:09:56'),
(3, 'Kenton Mraz', 'zbuckridge@example.org', '2023-01-23 22:09:55', '$2y$10$uaRJgigRAGqjttYRpDVk6O0Vu0XtkZs4OJT/oNVMY65y8pXKDHKtK', 's4jm5Ave7T', '2023-01-23 22:09:56', '2023-01-23 22:09:56'),
(4, 'Garett Parker', 'virginie.sanford@example.com', '2023-01-23 22:09:55', '$2y$10$3oKL0ZB/aneWoH0/7EWUf.jmHL.Fee1TNBwpb5dAToOfQMRacjSc6', 'M594XM5eRJ', '2023-01-23 22:09:56', '2023-01-23 22:09:56'),
(5, 'Ms. Teagan Boyer Sr.', 'ngreenholt@example.net', '2023-01-23 22:09:55', '$2y$10$98z1d3qB/vAZa//gdsl86OtZfjXyDOm9q5dkAE/45JTlE4IYVkRYu', 'jdwtvnWfNv', '2023-01-23 22:09:56', '2023-01-23 22:09:56'),
(6, 'Lowell Wiegand', 'evans26@example.com', '2023-01-23 22:09:55', '$2y$10$/J.KEneAjMiLI1RB1oi3KeuyFsYT4OfTROupan59hF0IafE4g8/Se', 'XJRm1uLcId', '2023-01-23 22:09:56', '2023-01-23 22:09:56'),
(7, 'Alison Rodriguez', 'rrunte@example.org', '2023-01-23 22:09:55', '$2y$10$0Vl6y/PXhtouo2OtfSb7y.SipoJE.fNMjYUe2o8Xyxgc0E9TjY27y', '9PpOLXKZoc', '2023-01-23 22:09:56', '2023-01-23 22:09:56'),
(8, 'Eleanora Graham II', 'maryam10@example.org', '2023-01-23 22:09:56', '$2y$10$VbshRgUGZnosT1jS1eO8/OVw6uZZD.dE/LPbakzq7eTwoR0sEJJdy', 'Vko7TcbzBd', '2023-01-23 22:09:56', '2023-01-23 22:09:56'),
(9, 'Wilford Sipes', 'thelma39@example.net', '2023-01-23 22:09:56', '$2y$10$FCK5j4iP9sdDm4P6Pa7sbOBAgbN1jsUmnabJK6xgxYenNJVw/ujbi', 'gtul2Z7AYl', '2023-01-23 22:09:56', '2023-01-23 22:09:56'),
(10, 'Mr. Reese Jones', 'alejandrin.hills@example.com', '2023-01-23 22:09:56', '$2y$10$SDwjrGJhArVqDXDM./maLekZqU6I9zO5OVRnGcZrNnbOGuzP3Iely', 'e9ijrkayNo', '2023-01-23 22:09:56', '2023-01-23 22:09:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_created_by_foreign` (`created_by`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sections_created_by_foreign` (`created_by`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_created_by_foreign` (`created_by`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
