-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 10, 2022 lúc 11:44 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `appvaytien`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `name`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, '$2y$10$YnTS1LxPma7TrhrgoalMFeRDi9I/kKOSiAI7zz/seHd/pVG4qqfm6', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `loan_amount`
--

CREATE TABLE `loan_amount` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loan_amount`
--

INSERT INTO `loan_amount` (`id`, `name`, `sort`, `created_at`, `updated_at`) VALUES
(1, '10 đến 50 triêu', 0, '2022-06-10 02:34:39', '2022-06-10 02:34:39'),
(2, '50 đến 100 triêu', 1, '2022-06-10 02:34:48', '2022-06-10 02:34:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loan_period`
--

CREATE TABLE `loan_period` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interest_rate` double(8,2) NOT NULL,
  `sort` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loan_period`
--

INSERT INTO `loan_period` (`id`, `name`, `interest_rate`, `sort`, `created_at`, `updated_at`) VALUES
(1, '12 tháng', 0.50, 0, '2022-06-10 02:34:56', '2022-06-10 02:34:56'),
(2, '24 tháng', 0.20, 1, '2022-06-10 02:35:09', '2022-06-10 07:59:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_06_070219_create_user_info_table', 1),
(6, '2022_06_06_071134_create_user_bank_table', 1),
(7, '2022_06_06_072035_create_admins_table', 1),
(8, '2022_06_06_072403_create_wallets_table', 1),
(9, '2022_06_06_073222_create_loan_amount_table', 1),
(10, '2022_06_06_073635_create_loan_period_table', 1),
(11, '2022_06_06_074034_create_user_loan_amount_table', 1),
(12, '2022_06_06_075019_create_user_loan_repayment_table', 1),
(13, '2022_06_06_075543_create_user_withdrawal_progress_table', 1),
(14, '2022_06_06_075816_create_settings_table', 1),
(15, '2022_06_06_091413_create_user_verify_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plain_value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_input` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `key`, `plain_value`, `type_input`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Travel', '0', NULL, NULL),
(2, 'site_logo', 'public/images/logo-default.png', '3', NULL, NULL),
(3, 'site_hotline', '0379266997', '0', NULL, NULL),
(4, 'site_zalo', '0379266997', '0', NULL, NULL),
(5, 'site_facebook', '0379266997', '1', NULL, NULL),
(6, 'site_introduce', '<p>Li&ecirc;n quan vụ việc 4 người trong c&ugrave;ng gia đ&igrave;nh tử vong, theo th&ocirc;ng tin ban đầu, anh N.H.H., 43 tuổi, được ph&aacute;t hiện tử vong tại ph&ograve;ng kh&aacute;ch trong căn hộ ở tầng 28, Park 1, Park Hill, Khu đ&ocirc; thị Times City. Vợ anh H. l&agrave; chị V.T.L., 43 tuổi, c&ugrave;ng 2 con 16 tuổi v&agrave; 5 tuổi, tử vong tại ph&ograve;ng ngủ.</p>\r\n\r\n<p>Trước đ&oacute;, khoảng 15h, một người th&acirc;n đến quầy lễ t&acirc;n to&agrave; Park 1 b&aacute;o kh&ocirc;ng li&ecirc;n hệ được với gia đ&igrave;nh anh H. Ban quản l&yacute; to&agrave; nh&agrave; đ&atilde; li&ecirc;n hệ tổ trưởng tổ d&acirc;n phố c&ugrave;ng c&ocirc;ng an phường Mai Động tiến h&agrave;nh mở cửa kiểm tra th&igrave; ph&aacute;t hiện 4 người đều đ&atilde; tử vong.</p>', '2', NULL, '2022-06-10 04:39:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `refs` bigint(20) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `phone`, `email`, `verified`, `refs`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, '0379266997', 'trantruong1797@gmail.com', 1, NULL, NULL, '$2y$10$vueC3NIkNzEi4MNoqLOm7e6nA65G7tQgJgxuNY9avZ3l2C6ffnVSi', NULL, '2022-06-10 03:19:18', '2022-06-10 04:50:25'),
(3, '0342909557', 'ittranvantruong@gmail.com', 1, NULL, NULL, '$2y$10$G8pEX78BDb6prXDQXMuAc.lyv.VLM47KsUfypnhG61iqH9Wz2rRvS', NULL, '2022-06-10 07:17:22', '2022-06-10 09:36:50'),
(4, '0338927456', 'hungnguyen@gmail.com', 1, NULL, NULL, '$2y$10$MdB2va8gJPH5ytG53buKB.nJ.4YNQR.cj8ODRpVvKKagbPaaHYrvm', NULL, '2022-06-10 09:42:13', '2022-06-10 09:43:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_bank`
--

CREATE TABLE `user_bank` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name_owner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_bank`
--

INSERT INTO `user_bank` (`id`, `user_id`, `name_owner`, `identity_number`, `name`, `number`, `created_at`, `updated_at`) VALUES
(2, 2, 'Tran Van Truong', '213213213213', 'VIETCOMBANK', '5462716558541156', '2022-06-10 03:19:18', '2022-06-10 03:26:46'),
(3, 3, 'Tran Van Truong', '213213213213', 'VIETCOMBANK', '5462716558541156', '2022-06-10 07:17:22', '2022-06-10 09:08:44'),
(4, 4, 'Hung Nguyen', '213213213213', 'VIETCOMBANK', '5462716558541156', '2022-06-10 09:42:13', '2022-06-10 09:43:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_info`
--

CREATE TABLE `user_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_income` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `private_apartment` tinyint(1) DEFAULT NULL,
  `private_car` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_info`
--

INSERT INTO `user_info` (`id`, `user_id`, `fullname`, `identity_number`, `education`, `personal_income`, `purpose`, `private_apartment`, `private_car`, `created_at`, `updated_at`) VALUES
(2, 2, 'Trần Văn Trường', '221435463', 'Đại học', '5tr', 'Tiêu diệt nhà cái', 0, 0, '2022-06-10 03:19:18', '2022-06-10 03:25:06'),
(3, 3, 'Trần Trường', '213213213213', 'Học Đại', '4 triệu', 'Tiêu diệt nhà cái', 1, 0, '2022-06-10 07:17:22', '2022-06-10 09:00:38'),
(4, 4, 'Chính Hưng', '213213213213333', 'Học Đại', '500tr', 'Tiêu diệt nhà cái', 0, 0, '2022-06-10 09:42:13', '2022-06-10 09:43:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_loan_amount`
--

CREATE TABLE `user_loan_amount` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identity_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan_period` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interest_rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan_limit` double DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_loan_amount`
--

INSERT INTO `user_loan_amount` (`id`, `code`, `user_id`, `fullname`, `identity_number`, `phone`, `loan_amount`, `loan_period`, `interest_rate`, `loan_limit`, `status`, `created_at`, `updated_at`) VALUES
(1, 'KVTV1654832192', 2, 'Trần Văn Trường', '221435463', '0379266997', '10 đến 50 triêu', '24 tháng', '0.5', 10000000, 1, '2022-06-10 03:36:32', '2022-06-10 06:53:44'),
(2, 'KVTV1654834966', 2, 'Trần Văn Trường', '221435463', '0379266997', '50 đến 100 triêu', '12 tháng', '0.5', 10000000, 1, '2022-06-10 04:22:46', '2022-06-10 07:34:55'),
(8, 'KVTV1654847972', 2, 'Trần Văn Trường', '221435463', '0379266997', '10 đến 50 triêu', '24 tháng', '0.2', NULL, 0, '2022-06-10 07:59:32', '2022-06-10 07:59:32'),
(9, 'KVTV1654852493', 3, 'Trần Trường', '213213213213', '0342909557', '10 đến 50 triêu', '24 tháng', '0.2', 10000000, 1, '2022-06-10 09:14:53', '2022-06-10 09:15:19'),
(10, 'KVTV1654854240', 4, 'Chính Hưng', '213213213213333', '0338927456', '10 đến 50 triêu', '12 tháng', '0.5', 10000000, 1, '2022-06-10 09:44:00', '2022-06-10 09:44:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_loan_repayment`
--

CREATE TABLE `user_loan_repayment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_loan_amount_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_verify`
--

CREATE TABLE `user_verify` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `info_personal` tinyint(1) NOT NULL,
  `info_general` tinyint(1) NOT NULL,
  `bank` tinyint(1) NOT NULL,
  `phone` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_verify`
--

INSERT INTO `user_verify` (`id`, `user_id`, `info_personal`, `info_general`, `bank`, `phone`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 1, 1, 1, '2022-06-10 03:19:18', '2022-06-10 03:27:45'),
(3, 3, 1, 1, 1, 1, '2022-06-10 07:17:22', '2022-06-10 09:14:45'),
(4, 4, 1, 1, 1, 1, '2022-06-10 09:42:13', '2022-06-10 09:43:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_withdrawal_progress`
--

CREATE TABLE `user_withdrawal_progress` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_loan_amount_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wallets`
--

INSERT INTO `wallets` (`id`, `user_id`, `amount`, `created_at`, `updated_at`) VALUES
(2, 2, 20000000, '2022-06-10 03:19:18', '2022-06-10 07:34:55'),
(3, 3, 10000000, '2022-06-10 07:17:22', '2022-06-10 09:15:19'),
(4, 4, 10000000, '2022-06-10 09:42:13', '2022-06-10 09:44:14');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_name_unique` (`name`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `loan_amount`
--
ALTER TABLE `loan_amount`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loan_period`
--
ALTER TABLE `loan_period`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_refs_foreign` (`refs`);

--
-- Chỉ mục cho bảng `user_bank`
--
ALTER TABLE `user_bank`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_bank_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_info_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `user_loan_amount`
--
ALTER TABLE `user_loan_amount`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_loan_amount_code_unique` (`code`),
  ADD KEY `user_loan_amount_user_id_foreign` (`user_id`),
  ADD KEY `user_loan_amount_code_status_index` (`code`,`status`);

--
-- Chỉ mục cho bảng `user_loan_repayment`
--
ALTER TABLE `user_loan_repayment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_loan_repayment_user_loan_amount_id_foreign` (`user_loan_amount_id`);

--
-- Chỉ mục cho bảng `user_verify`
--
ALTER TABLE `user_verify`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_verify_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `user_withdrawal_progress`
--
ALTER TABLE `user_withdrawal_progress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_withdrawal_progress_user_loan_amount_id_foreign` (`user_loan_amount_id`);

--
-- Chỉ mục cho bảng `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallets_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loan_amount`
--
ALTER TABLE `loan_amount`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `loan_period`
--
ALTER TABLE `loan_period`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `user_bank`
--
ALTER TABLE `user_bank`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `user_loan_amount`
--
ALTER TABLE `user_loan_amount`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `user_loan_repayment`
--
ALTER TABLE `user_loan_repayment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user_verify`
--
ALTER TABLE `user_verify`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `user_withdrawal_progress`
--
ALTER TABLE `user_withdrawal_progress`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_refs_foreign` FOREIGN KEY (`refs`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `user_bank`
--
ALTER TABLE `user_bank`
  ADD CONSTRAINT `user_bank_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `user_loan_amount`
--
ALTER TABLE `user_loan_amount`
  ADD CONSTRAINT `user_loan_amount_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `user_loan_repayment`
--
ALTER TABLE `user_loan_repayment`
  ADD CONSTRAINT `user_loan_repayment_user_loan_amount_id_foreign` FOREIGN KEY (`user_loan_amount_id`) REFERENCES `user_loan_amount` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `user_verify`
--
ALTER TABLE `user_verify`
  ADD CONSTRAINT `user_verify_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `user_withdrawal_progress`
--
ALTER TABLE `user_withdrawal_progress`
  ADD CONSTRAINT `user_withdrawal_progress_user_loan_amount_id_foreign` FOREIGN KEY (`user_loan_amount_id`) REFERENCES `user_loan_amount` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `wallets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
