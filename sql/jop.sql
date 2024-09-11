-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2024 at 02:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'John', 'Doe', 'john.doe@example.com', '$2y$10$12/sHpbgkdkx/rsuk0G1DOyrmd41usTeMy3u9MsyEgkg6FjcAvM1a', '2024-09-09 19:52:02', '2024-09-09 19:52:02'),
(2, 'mohamed', 'khaled', 'mohamed@gmail.com', '$2y$10$93O5t3WDUpROsJVuWCjp3.8qUkHl9bdMAFg9srX7gZVHtYkwdxJE2', '2024-09-09 20:07:01', '2024-09-09 20:07:01'),
(3, 'khaled', 'mohamed', 'khaled@gmail.com', '$2y$10$JVgRtTTSn9yL76vKAhH7SuutQDKdsebXIiw.0nsdk100n2HGXrahu', '2024-09-09 20:09:53', '2024-09-09 20:09:53'),
(4, 'kkk', 'kmkmk', 'kkk@gmail.com', '$2y$10$8PvWBq.nMz79syqXUdMQFeTM3a/11zKi6voIo7V0gYPMV4l97dPQ6', '2024-09-09 20:12:37', '2024-09-09 20:12:37');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `cover_letter` text NOT NULL,
  `status` enum('pending','accepted','rejected') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `job_id`, `candidate_id`, `cover_letter`, `status`, `created_at`, `updated_at`) VALUES
(5, 5, 4, 'I\'m excited to apply for this position.', 'accepted', '2024-09-09 15:17:01', '2024-09-09 19:12:48'),
(6, 5, 4, 'I\'m excited to apply for this position.', 'accepted', '2024-09-09 15:37:02', '2024-09-09 19:12:47'),
(7, 5, 4, 'I\'m excited to apply for this position.', 'rejected', '2024-09-09 15:37:09', '2024-09-09 19:15:14'),
(8, 5, 3, 'i love you', 'rejected', '2024-09-09 17:40:54', '2024-09-09 19:15:14');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `resume`, `created_at`, `updated_at`, `password`) VALUES
(2, 'mostafa', 'khaled', 'mohamedwapas16@gmail.com', '01115081133', 'momoomoomoomomomom', '2024-09-02 11:46:58', '2024-09-02 11:46:58', '$2y$10$7AHgsWkgRbmD60Do2P5ndeLsAc6O8sWcvSjyU9XVE8ggDvo3f.vY2'),
(3, 'mostafa', 'khaled', 'mostafa@gmail.com', '01115081133', 'momoomoomoomomomom', '2024-09-02 11:55:32', '2024-09-02 11:55:32', '$2y$10$1fPYOe6tuI8iTwqZbE9mXuRk64Mdju/KbDQJOPEnUORKT3AwIfmZq'),
(4, 'John', 'Doe', 'john.doe@example.com', '1234567890', 'link_to_resume', '2024-09-05 10:23:59', '2024-09-05 11:46:49', '$2y$10$82U/JHDKS6vC1jvLx4iJ.OTP0g5WoOuUtGDLvHfZ0iRcGr0U2t8PG');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `first_name`, `last_name`, `email`, `password`, `department`, `location`, `phone_number`, `created_at`, `updated_at`) VALUES
(1, 'mostafa', 'khaled', 'mostafa@gmail.com', '$2y$10$.98tVI7XzqA/YpzkO72BCeq1jYDaJiEaBOUQVaGp5W10OWL/xhJ3.', 'network', 'khjgljhcklhg', '01115081133', '2024-09-02 11:13:34', '2024-09-02 11:13:34'),
(2, 'mohamed', 'khaled', 'mohamedwapas@gmail.com', '$2y$10$7aqw.iJHwHpsqtmpYzzPeuemMRdysXeCwCjrlO2lWN/gxkYNuptbe', 'network', 'khjgljhcklhg', '01115081133', '2024-09-03 07:57:44', '2024-09-03 07:57:44'),
(4, 'Jane', 'Doe', 'jane.doe@example.com', '$2y$10$B7AESo0iwnJeKOVSQICVRu9X8wMWZS.CZzXAJWWBbRKAL2CHFcnzG', 'HR', 'New York', '123-456-7890', '2024-09-03 08:07:39', '2024-09-05 10:08:04'),
(5, 'mohamed', 'khaled', 'mohamedwapas8787@gmail.com', '$2y$10$GG9rEfozHzwzB14kqNL6TejwplHsYkbR4.qz6uZ8AUtROoR32/mvy', 'network', 'khjgljhcklhg', '01115081133', '2024-09-03 08:07:51', '2024-09-03 08:07:51'),
(7, 'mohamed', 'khaled', 'mostafa159753@gmail.com', '$2y$10$3wXyPQfpHmmANCnCH2bEz.ki7KnZ6S.rwopg1Ov9wN0CsWwEDoWme', 'network', 'khjgljhcklhg', '01115081133', '2024-09-03 08:11:22', '2024-09-03 08:11:22'),
(8, 'mohamed', 'khaled', 'mohamedwapas159753246@gmail.com', '$2y$10$xZznUF4o0y0VVQ7FovubSuChbId2q86oYQ2npyfnqRWNty3JwGDAe', 'network', 'khjgljhcklhg', '01115081133', '2024-09-03 08:15:59', '2024-09-03 08:15:59'),
(9, 'mohamed', 'khaled', 'mohamedwapas15953246@gmail.com', '$2y$10$289duukvCzY6TNFtkyqYROYRL7acxYrb8pvFvZlyJ1/4n86/p2nIK', 'network', 'khjgljhcklhg', '01115081133', '2024-09-03 08:17:38', '2024-09-03 08:17:38'),
(10, 'mohamed', 'khaled', 'mohamedwapas1953246@gmail.com', '$2y$10$obD1LPFjGc9t/R.zgglkWumNTv87LjnZ/oVicdnAR3pwDd4sv5Pki', 'network', 'khjgljhcklhg', '01115081133', '2024-09-03 08:18:57', '2024-09-03 08:18:57'),
(12, 'John', 'Doe', 'john.doe@example.com', '$2y$10$/QcGdJD.tzUlogHsEJM.g.0SVufIHU5fpRMEjpfM3WEokiSH7SbQq', 'HR', 'New York', '123-456-7890', '2024-09-05 08:18:19', '2024-09-05 08:18:19'),
(16, 'jj', 'jjjjjj', 'M@GMAIL.COM', '$2y$10$HgmKoWSPqwB4u3Y9uxQFnOtnqLu5cn5p23ODInHuJ7wsD7bPzGjHi', 'mmmmmmm', 'mmmmmm', '01115081133', '2024-09-09 13:01:27', '2024-09-09 13:01:27');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `skills` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`skills`)),
  `status` enum('open','closed') DEFAULT 'open',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `employee_id`, `title`, `description`, `skills`, `status`, `created_at`, `updated_at`) VALUES
(4, 4, 'Software Developer', 'Responsible for developing and maintaining applications.', '\"[\\\"PHP\\\",\\\"Laravel\\\",\\\"JavaScript\\\"]\"', 'open', '2024-09-09 13:47:21', '2024-09-09 13:47:21'),
(5, 1, 'pharmcy', 'player foot ball and tennis', '\"[\\\"laplapalpalpalplapa\\\"]\"', 'open', '2024-09-09 13:50:51', '2024-09-09 13:50:51');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `candidate_id` (`candidate_id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

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
  ADD KEY `employee_id` (`employee_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
