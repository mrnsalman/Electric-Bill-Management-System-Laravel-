-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2019 at 12:39 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mosquemarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` int(11) NOT NULL,
  `shop_floor` tinyint(4) NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `bill_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `previous_unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `used_unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `previous_due` int(11) NOT NULL,
  `additional_fee` int(11) NOT NULL,
  `exclude_fee` int(11) NOT NULL,
  `exclude_due` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `after_date` int(11) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `due_amount` int(11) NOT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `shop_id`, `shop_floor`, `month`, `year`, `bill_id`, `previous_unit`, `current_unit`, `used_unit`, `unit_rate`, `previous_due`, `additional_fee`, `exclude_fee`, `exclude_due`, `total_amount`, `after_date`, `paid_amount`, `due_amount`, `payment_status`, `last_date`, `created_at`, `updated_at`) VALUES
(3, 1, 2, 'July', 2019, '1_july_2109', '185', '362', '177', '12', 0, 0, 2124, 2124, 2124, 2324, 2124, 0, 'Paid', '15/11/2019', '2019-11-18 13:20:07', '2019-11-18 13:20:07'),
(4, 1, 2, 'August', 2019, '1_august_2019', '362', '500', '138', '12', 0, 0, 1656, 1656, 1656, 1856, 1500, 156, 'Partial', '15/11/2019', '2019-11-19 07:13:41', '2019-11-23 13:07:25'),
(5, 1, 2, 'September', 2019, '1_september_2019', '500', '650', '150', '12', 0, 0, 1800, 1800, 1800, 2000, 1500, 300, 'Partial', '15/11/2019', '2019-11-19 07:18:00', '2019-11-19 07:18:00'),
(6, 1, 2, 'October', 2019, '1_october_2019', '650', '700', '50', '12', 300, 0, 600, 600, 900, 1100, 900, 0, 'Paid', '15/11/2019', '2019-11-19 07:20:59', '2019-11-19 07:20:59'),
(7, 1, 2, 'November', 2019, '1_november_2019', '700', '800', '100', '12', 0, 0, 1200, 1200, 1200, 1400, 1200, 0, 'Paid', '15/11/2019', '2019-11-19 07:25:05', '2019-11-19 07:25:05'),
(8, 1, 2, 'December', 2019, '1_december_2019', '800', '915', '115', '12', 0, 0, 1380, 1380, 1380, 1580, 0, 1380, 'Due', '15/11/2019', '2019-11-19 08:04:48', '2019-11-19 08:04:48'),
(9, 1, 2, 'Jun', 2019, '1_jun_2019', '430', '500', '70', '12', 0, 0, 840, 840, 840, 1040, 840, 0, 'Paid', '15/11/2019', '2019-11-19 08:14:54', '2019-11-19 08:14:54'),
(10, 1, 2, 'May', 2019, '1_may_2019', '510', '650', '140', '12', 0, 0, 1680, 1680, 1680, 1880, 1400, 280, 'Partial', '15/11/2019', '2019-11-19 08:15:23', '2019-11-19 08:15:23'),
(11, 1, 2, 'April', 2019, '1_april_2019', '580', '700', '120', '12', 0, 0, 1440, 1440, 1440, 1640, 0, 1440, 'Due', '15/11/2019', '2019-11-19 08:15:50', '2019-11-19 08:15:50'),
(12, 1, 2, 'March', 2019, '1_march_2019', '185', '362', '177', '12', 0, 0, 2124, 2124, 2124, 2324, 2124, 0, 'Paid', '15/11/2019', '2019-11-19 08:16:11', '2019-11-19 08:16:11'),
(15, 1, 2, 'February', 2019, '1_february_2019', '720', '800', '80', '12', 0, 0, 960, 960, 960, 1160, 0, 960, 'Due', '15/11/2019', '2019-11-19 11:12:32', '2019-11-19 11:12:32'),
(16, 3, 1, 'July', 2019, '3_july_2019', '185', '362', '177', '12', 0, 0, 2124, 2124, 2124, 2324, 2124, 0, 'Paid', '15/11/2019', '2019-11-21 01:18:55', '2019-11-23 14:16:11'),
(17, 3, 1, 'April', 2019, '3_april_2019', '49700', '50000', '300', '12', 0, 0, 3600, 3600, 3600, 3800, 3600, 0, 'Paid', '15/11/2019', '2019-11-23 12:57:55', '2019-11-23 12:57:55'),
(19, 3, 1, 'September', 2019, '3_september_2019', 'Month', 'Month', 'Month', 'Month', 0, 0, 500, 500, 500, 700, 400, 100, 'Partial', '15/11/2019', '2019-11-23 14:12:07', '2019-11-23 14:12:07'),
(20, 3, 1, 'December', 2019, '3_december_2019', '490', '500', '10', '12', 100, 380, 120, 500, 600, 800, 0, 600, 'Due', '15/11/2019', '2019-11-26 05:44:03', '2019-11-26 05:44:03');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_10_29_102356_create_shops_table', 2),
(4, '2019_11_16_112221_create_bills_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('salmanhossain.shm@gmail.com', '$2y$10$hWQBPLqW8iysYvugYq.truxYZlhR1rXkRyDsQCdabJWhuCt4HITPS', '2019-11-02 12:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `floor` tinyint(4) NOT NULL,
  `shop_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `shop_no`, `floor`, `shop_id`, `shop_name`, `user_id`, `shop_owner`, `owner_address`, `owner_contact`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 2, '1/2', 'Billah General Store', 0, 'Md. Masum Billah', 'B-38/F-18, joint quarter,  Tikkapara, Mohammadpur, dhaka-1207', '012345679', 'shopOwner-images/1573673761.Signature.jpg', 1, '2019-11-13 04:38:58', '2019-11-13 13:36:01'),
(3, '2', 1, '2/1', 'test General Store', 0, 'Md. Masum Billah', 'B-38/F-18, joint quarter,  Tikkapara, Mohammadpur, dhaka-1207', '123456789', 'shopOwner-images/1573675069.600x600.png', 1, '2019-11-13 13:57:49', '2019-11-14 06:00:48'),
(4, '5', 1, '4', 'Nolan-Dooley', 0, 'Hollis Bruen', '8641 Jonathon Crescent\nBoyleville, TN 81969', '694-283-1716 x733', 'shopOwner-images/avatar5.png', 1, '1984-11-08 01:36:07', '2019-11-18 09:09:15'),
(5, '3', 1, '9', 'Kulas Group', 0, 'Prof. Nyasia Schumm II', '14713 Salvador Park Apt. 436\nWest Brayan, WV 12379-7783', '897-981-6784', 'shopOwner-images/avatar5.png', 1, '1990-05-03 21:42:39', '2019-11-18 14:11:47'),
(6, '10', 1, '10/1', 'Schowalter and Schneider', 0, 'Lennie Herman', '51561 Eryn Canyon Apt. 294North Benniemouth, VT 95527', '(635) 374-1935', 'shopOwner-images/avatar5.png', 2, '1975-02-03 00:05:14', '2019-11-13 15:13:59'),
(7, '1', 1, '4', 'Schaden-McLaughlin', 0, 'Dr. Tyshawn Pagac', '1193 Thiel Turnpike\nPort Ibrahimmouth, WI 26482-6645', '(625) 446-5540', 'shopOwner-images/avatar5.png', 2, '1978-01-11 09:36:37', '1976-09-29 18:21:55'),
(8, '8', 1, '8/1', 'Franecki and Lesch', 0, 'Miss Johanna Wunsch DVM', '422 Geovanny EstatesBenjaminberg, CT 51825-6499', '(516) 224-3275 x0383', 'shopOwner-images/avatar5.png', 2, '1973-11-24 22:50:41', '2019-11-13 15:14:17'),
(9, '7', 1, '7', 'Hilpert and Sons', 0, 'Bryana Deckow', '729 Hirthe Valleys\nEast Frieda, OR 89776', '953-338-8943 x34148', 'shopOwner-images/avatar5.png', 2, '1974-08-07 11:01:13', '1977-10-07 02:20:15'),
(10, '8', 1, '1', 'Johnston-Gusikowski', 0, 'Colt Raynor I', '896 Roger Port\nEast Norwood, UT 32088-0979', '(645) 231-2405', 'shopOwner-images/avatar5.png', 2, '1982-07-31 09:01:36', '1976-01-06 14:57:46'),
(11, '2', 1, '9', 'Hessel and Sons', 0, 'Dr. Pedro Daniel MD', '6576 Feeney Point\nKoelpinhaven, MD 80446-6193', '396-720-0425', 'shopOwner-images/avatar5.png', 2, '1986-01-02 21:32:02', '2016-10-22 04:38:52'),
(12, '4', 1, '4', 'Fadel-Dickinson', 0, 'Odessa Mosciski', '39184 Lila Plains Suite 208\nHailieland, NM 16304', '+1-356-304-0231', 'shopOwner-images/avatar5.png', 2, '1999-02-05 03:59:40', '2019-05-26 02:34:34'),
(13, '7', 1, '2', 'Little, Grady and Gleichner', 0, 'Prof. Samson Kozey IV', '27185 Mitchell Crossroad Apt. 042\nReganborough, NV 93001', '+18427681765', 'shopOwner-images/avatar5.png', 2, '1982-05-25 23:04:36', '2008-11-25 18:27:08'),
(14, '4', 1, '1', 'Abbott Group', 0, 'Macey Howell', '808 Ferry Brook\nMcLaughlinville, NE 52075-2215', '468-895-3000', 'shopOwner-images/avatar5.png', 2, '1978-11-19 03:39:31', '2003-05-22 12:03:59'),
(15, '10', 1, '6', 'Raynor-Satterfield', 0, 'Anissa Olson II', '292 Narciso Expressway Suite 706\nWolffville, HI 43506-3980', '+1.861.534.9506', 'shopOwner-images/avatar5.png', 2, '2007-02-26 10:50:14', '1993-10-17 21:16:46'),
(16, '4', 1, '4', 'Donnelly-Sipes', 0, 'Abdiel Buckridge', '5436 Luigi River\nCalitown, SD 53078-6254', '+1-749-298-7607', 'shopOwner-images/avatar5.png', 2, '1997-08-29 02:45:24', '1981-07-20 07:30:50'),
(17, '1', 1, '4', 'Kerluke Ltd', 0, 'Dr. Austyn Renner III', '8156 Kessler Union Suite 808\nWymanbury, WY 36639-8920', '1-762-347-1088 x4372', 'shopOwner-images/avatar5.png', 2, '1976-05-28 16:38:14', '2009-12-14 00:20:52'),
(18, '10', 1, '1', 'Koelpin, Mohr and Willms', 0, 'Prof. Garrett Larkin', '42791 Okuneva Motorway\nNikostad, FL 84880', '(775) 804-7940 x763', 'shopOwner-images/avatar5.png', 2, '1972-01-16 06:01:49', '1994-06-13 00:36:31'),
(19, '4', 1, '8', 'Stark-Hill', 0, 'Prof. Ebony Cummings V', '23387 Linnea Ports\nKeyshawnshire, ND 22855-1806', '+13836242344', 'shopOwner-images/avatar5.png', 2, '2009-08-02 14:15:57', '1994-01-12 18:47:04'),
(20, '10', 1, '3', 'Larkin-Luettgen', 0, 'Maggie Cole', '9138 Wolf Drive\nSouth Robbville, CT 81665', '451.422.0806', 'shopOwner-images/avatar5.png', 2, '1974-09-29 17:53:19', '1991-10-10 18:42:32'),
(21, '3', 1, '7', 'Bogan LLC', 0, 'Tito Graham', '9948 Ryleigh Isle\nWest Reece, IN 56393', '965-975-6938 x00406', 'shopOwner-images/avatar5.png', 2, '1974-02-09 11:08:39', '1972-10-01 01:04:24'),
(22, '7', 1, '1', 'Labadie-Christiansen', 0, 'Asa Keebler', '5791 Melissa Fall\nBlancastad, WY 35344', '391-308-2057', 'shopOwner-images/avatar5.png', 2, '2013-07-08 18:54:58', '1982-12-07 05:37:15'),
(23, '6', 1, '6', 'Rice Group', 0, 'Annabell Grady Sr.', '92360 Braun Springs Suite 189\nWest Eino, OR 85041-2751', '723-466-4165 x6586', 'shopOwner-images/avatar5.png', 2, '2015-05-01 04:44:46', '1976-11-30 10:57:26'),
(24, '25', 1, '25/1', 'Mom & Kids', 10, 'Salman Hossain', 'B-38/F-18, joint quarter,  Tikkapara, Mohammadpur, dhaka-1207', '01670851823', 'shopOwner-images/1574628082.miran.jpg', 1, '2019-11-24 14:41:22', '2019-11-24 14:55:15'),
(25, '26', 1, '26/1', 'Freeland', 10, 'Salman Hossain', 'B-38/F-18, joint quarter,  Tikkapara, Mohammadpur, dhaka-1207', '01670851823', 'shopOwner-images/1574628996.miran.jpg', 2, '2019-11-24 14:56:36', '2019-11-24 14:56:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user-image/avatar5.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullName`, `email`, `email_verified_at`, `password`, `role`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin Hassan', 'admin@gmail.com', NULL, '$2y$10$6IiHYNGOm6rNkKcDbffsz.Fo70XWXtPNDOAd6/yG/tZLrg.NTwVCO', 'super', 'user-images/miran.jpg', '9QaWNGYTn5CdxillW1ScSHTrSsBy8YL89exNHhurBJLUaYfPzkKP7gUwl55T', '2019-10-16 12:34:54', '2019-11-10 13:29:24'),
(3, 'admin2', 'Admin2 Hossain', 'admin2@gmail.com', NULL, '$2y$10$pwO4q5rLORWkk1Ti6dahcOVMHuzURteh0IhteZSx0YQ8QnC6kKM/q', 'admin', 'user-images/600x600.png', 'suthwOy9HW4wc76zclHLcUvhcn6RtITGHFpwkSyz7On5PAcIduiWkaOXGYyQ', '2019-10-30 14:22:04', '2019-11-01 15:41:29'),
(9, 'Miran', 'Salman Hossain', 'salmanhossain.shm@gmail.com', NULL, '$2y$10$qbMsF9xzihlI950vsKp4a.5LZPb5GzeZ5Ks7jJX72/oPSxLkFjYki', 'visitor', 'user-images/1573414700.600x600.png', '0EjlYCx11F9XKPmIu9F54Bnuktou1M8RblCmQgJjiaI0xmtDWzWZRN1aBDzg', '2019-11-10 13:38:20', '2019-11-10 13:38:20'),
(10, 'mrnsalman', 'Salman Miran', 'salmanhossain80@yahoo.com', NULL, '$2y$10$NUlUv45ZcNQzcfQqUpp9eu0OTply/FSO05gVH8NnRSYdOcMC7oIn2', 'visitor', 'user-images/1574628026.miran.jpg', '3fZIoBB49xEbkVzXgHkvrVSZi1KwujyupT6g7t1dCaKGERJfZ3KMr68l5xPy', '2019-11-24 14:40:26', '2019-11-24 14:40:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
