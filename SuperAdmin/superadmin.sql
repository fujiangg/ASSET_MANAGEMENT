-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2023 at 04:29 AM
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
-- Database: `superadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us_descriptions`
--

CREATE TABLE `about_us_descriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us_descriptions`
--

INSERT INTO `about_us_descriptions` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Kami merupakan siswi SMK Negeri 1 Cimahi, jurusan Sistem Informatika Jaringan dan Aplikasi (SIJA) yang sedang melaksanakan Praktik Kerja Lapangan (PKL) di PT. Eltran Indonesia. Kegiatan PKL ini dilaksanakan selama 6 bulan pada bulan Juli-Desember 2023.', '2023-12-19 00:01:30', '2023-12-19 00:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `about_us_teams`
--

CREATE TABLE `about_us_teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `jobposition` varchar(255) NOT NULL,
  `instagramlink` varchar(255) NOT NULL,
  `linkedinlink` varchar(255) NOT NULL,
  `profilepicture` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us_teams`
--

INSERT INTO `about_us_teams` (`id`, `fullname`, `jobposition`, `instagramlink`, `linkedinlink`, `profilepicture`, `created_at`, `updated_at`) VALUES
(1, 'Fuji Anggraeni', 'Back-End Developer', 'https://www.instagram.com/fujianggr_/ ', 'https://www.linkedin.com/in/fuji-anggraeni-29371825b/', 'website_image_1.png', '2023-12-19 00:01:39', '2023-12-19 00:01:39'),
(2, 'Nabila Putri', 'Back-End Developer', 'https://www.instagram.com/nabilaptrnaa_/ ', 'https://www.linkedin.com/in/nabila-putri-nur-alya-475a10283/', 'website_image_2.jpg', '2023-12-19 00:01:39', '2023-12-19 00:01:39'),
(3, 'Pera Rahmawati', 'Front-End Developer', 'https://www.instagram.com/pera.rhmwt/ ', 'https://www.linkedin.com/in/pera-rahmawati/', 'website_image_3.jpg', '2023-12-19 00:01:39', '2023-12-19 00:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_card1s`
--

CREATE TABLE `contact_us_card1s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cardtitle` varchar(255) NOT NULL,
  `carddescription` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `emailaddress` varchar(255) NOT NULL,
  `locationaddress` varchar(255) NOT NULL,
  `facebooklink` varchar(255) NOT NULL,
  `twitterlink` varchar(255) NOT NULL,
  `instagramlink` varchar(255) NOT NULL,
  `linkedinlink` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us_card1s`
--

INSERT INTO `contact_us_card1s` (`id`, `cardtitle`, `carddescription`, `day`, `time`, `phonenumber`, `emailaddress`, `locationaddress`, `facebooklink`, `twitterlink`, `instagramlink`, `linkedinlink`, `created_at`, `updated_at`) VALUES
(1, 'Let’s talk with us!', 'We take pride in our friendly customer care! Reach out and we’ll help you however we can.', 'Monday – Friday', '8:00 A.M. – 5:00 P.M', '+62-22-7351 7098', 'marketing@eltran.co.id', 'Jl. Soekarno Hatta No.501, Cijagra, Kec. Lengkong, Kota Bandung, Jawa Barat 40265', 'https://eltran.co.id/', 'https://eltran.co.id/', 'https://eltran.co.id/', 'https://eltran.co.id/', '2023-12-19 00:04:30', '2023-12-19 00:04:30');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_card2s`
--

CREATE TABLE `contact_us_card2s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cardtitle` varchar(255) NOT NULL,
  `carddescription` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us_card2s`
--

INSERT INTO `contact_us_card2s` (`id`, `cardtitle`, `carddescription`, `created_at`, `updated_at`) VALUES
(2, 'Can’t wait? Send a message!', 'Have a quick question? Fill out this form. If you need to include a picture or file attachment, please use emails.', '2023-12-20 20:26:29', '2023-12-20 20:26:29');

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
-- Table structure for table `footers`
--

CREATE TABLE `footers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `websitelogo` varchar(255) NOT NULL,
  `locationaddress` varchar(255) NOT NULL,
  `copyrightpage` varchar(255) NOT NULL,
  `privacypolicypage` varchar(255) NOT NULL,
  `termsofusepage` varchar(255) NOT NULL,
  `copyright` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footers`
--

INSERT INTO `footers` (`id`, `websitelogo`, `locationaddress`, `copyrightpage`, `privacypolicypage`, `termsofusepage`, `copyright`, `created_at`, `updated_at`) VALUES
(1, 'Website_Logo_1.png', 'Jl. Soekarno Hatta No.501, Cijagra, Kec. Lengkong, Kota Bandung, Jawa Barat 40265', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', 'Copyright © 2023 Proking Indonesia', '2023-12-19 00:05:53', '2023-12-19 00:05:53');

-- --------------------------------------------------------

--
-- Table structure for table `homes`
--

CREATE TABLE `homes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `websiteimage` varchar(255) NOT NULL,
  `websitelogo` varchar(255) NOT NULL,
  `greetingsword` varchar(255) NOT NULL,
  `websitedescription` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homes`
--

INSERT INTO `homes` (`id`, `websiteimage`, `websitelogo`, `greetingsword`, `websitedescription`, `created_at`, `updated_at`) VALUES
(1, 'Website_Image.png', 'Website_Logo.png', 'Welcome to our!', 'ProKing (Project Taking) merupakan sebuah website yang dibuat khusus untuk mengelola beberapa proyek yang telah dibuat. Dengan ProKing, Anda akan lebih mudah dalam menampilkan serta mengelola proyek.', '2023-12-19 00:01:12', '2023-12-19 00:01:12');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `fullname`, `email`, `phone`, `subject`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Widara sanariato', 'widarariato@gmail.com', '08123452286547', 'Feedback', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', 1, '2023-12-19 00:06:16', '2023-12-19 00:06:16');

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
(6, '2023_12_18_033532_navbars', 1),
(7, '2023_12_18_062610_homes', 1),
(8, '2023_12_18_063518_about_us_descriptions', 1),
(9, '2023_12_18_063604_about_us_teams', 1),
(10, '2023_12_18_071344_contact_us_card1s', 1),
(11, '2023_12_18_071809_contact_us_card2s', 1),
(12, '2023_12_18_072938_footers', 1),
(13, '2023_12_18_074551_portal_login', 1),
(14, '2023_12_18_090348_messages', 1),
(15, '2023_12_19_033752_our_projects', 1),
(16, '2023_12_19_043726_project_management', 1);

-- --------------------------------------------------------

--
-- Table structure for table `navbars`
--

CREATE TABLE `navbars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `websitelogo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `navbars`
--

INSERT INTO `navbars` (`id`, `websitelogo`, `created_at`, `updated_at`) VALUES
(1, 'Website_Logo.png', '2023-12-19 00:01:04', '2023-12-19 00:01:04');

-- --------------------------------------------------------

--
-- Table structure for table `our_projects`
--

CREATE TABLE `our_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `projectname` varchar(255) NOT NULL,
  `projectdescription` varchar(255) NOT NULL,
  `projectdetail` varchar(255) NOT NULL,
  `projectimage` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `our_projects`
--

INSERT INTO `our_projects` (`id`, `projectname`, `projectdescription`, `projectdetail`, `projectimage`, `created_at`, `updated_at`) VALUES
(3, 'Project Name 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', 'Project_Image_1.jpg', '2023-12-20 20:01:15', '2023-12-20 20:01:15'),
(4, 'Project Name 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', 'Project_Image_2.jpg', '2023-12-20 20:01:15', '2023-12-20 20:01:15'),
(5, 'Project Name 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', 'Project_Image_3.jpg', '2023-12-20 20:01:15', '2023-12-20 20:01:15'),
(6, 'Project Name 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', 'Project_Image_4.jpg', '2023-12-20 20:01:15', '2023-12-20 20:01:15'),
(7, 'Project Name 5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', 'Project_Image_5.jpg', '2023-12-20 20:01:15', '2023-12-20 20:01:15'),
(8, 'Project Name 6', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.', 'Project_Image_6.jpg', '2023-12-20 20:01:15', '2023-12-20 20:01:15');

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
-- Table structure for table `portal_logins`
--

CREATE TABLE `portal_logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `projectname` varchar(255) NOT NULL,
  `projectlink` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portal_logins`
--

INSERT INTO `portal_logins` (`id`, `projectname`, `projectlink`, `created_at`, `updated_at`) VALUES
(1, 'Project Name 1', 'http://127.0.0.1:8000/login', '2023-12-19 00:06:04', '2023-12-19 00:06:04');

-- --------------------------------------------------------

--
-- Table structure for table `project_management`
--

CREATE TABLE `project_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` varchar(255) NOT NULL,
  `projectname` varchar(255) NOT NULL,
  `projectuser` varchar(255) NOT NULL,
  `projectdeadline` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_management`
--

INSERT INTO `project_management` (`id`, `project_id`, `projectname`, `projectuser`, `projectdeadline`, `created_at`, `updated_at`) VALUES
(3, 'PROJ_20231219050046', 'Project Name 1', 'Kominfo', '2024-12-12', NULL, '2023-12-19 00:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` tinyint(1) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `phone`, `picture`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Nabila Putri', 'nabilaputri@gmail.com', 1, '082115450690', 'UIMG_202312206582b5e21f9be.jpg', NULL, '$2y$10$yxVXGnJg9aqJ17kVfwkGJuXe9zs1QTxj5jix/cRimn2U.Nw2xO84y', NULL, '2023-12-18 23:55:18', '2023-12-20 02:37:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us_descriptions`
--
ALTER TABLE `about_us_descriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_us_teams`
--
ALTER TABLE `about_us_teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us_card1s`
--
ALTER TABLE `contact_us_card1s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us_card2s`
--
ALTER TABLE `contact_us_card2s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navbars`
--
ALTER TABLE `navbars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_projects`
--
ALTER TABLE `our_projects`
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
-- Indexes for table `portal_logins`
--
ALTER TABLE `portal_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_management`
--
ALTER TABLE `project_management`
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
-- AUTO_INCREMENT for table `about_us_descriptions`
--
ALTER TABLE `about_us_descriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_us_teams`
--
ALTER TABLE `about_us_teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_us_card1s`
--
ALTER TABLE `contact_us_card1s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us_card2s`
--
ALTER TABLE `contact_us_card2s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footers`
--
ALTER TABLE `footers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `navbars`
--
ALTER TABLE `navbars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `our_projects`
--
ALTER TABLE `our_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portal_logins`
--
ALTER TABLE `portal_logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project_management`
--
ALTER TABLE `project_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
