-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2024 at 05:33 AM
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
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_code` varchar(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `publisher` varchar(255) DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_code`, `category`, `name`, `price`, `stock`, `publisher`, `updated_at`, `created_at`) VALUES
(26, 'BC002', 'Biography', 'Harry Potter', 25000, 100, 'PT Gramedia Pustaka Utama', '2024-03-09', '2024-03-09'),
(27, 'BC003', 'Self-Help', 'The Da Vinci Code', 75000, 75, 'PT Serambi Ilmu Semesta', '2024-03-09', '2024-03-09'),
(28, 'BC004', 'Non-Fiction', 'Dune', 76000, 60, 'PT Gramedia Pustaka Utama', '2024-03-09', '2024-03-09'),
(29, 'BC005', 'Non-Fiction', 'Pride and Prejudice', 90000, 80, 'PT Pustaka Alvabet', '2024-03-09', '2024-03-09'),
(30, 'BC006', 'Self-Help', 'The Girl with the Dragon Tattoo', 75000, 45, 'PT Gagas Media', '2024-03-09', '2024-03-09'),
(31, 'BC007', 'Non-Fiction', 'The Book Thief', 80000, 55, 'PT Serambi Ilmu Semesta', '2024-03-09', '2024-03-09'),
(32, 'BC008', 'Biography', 'Dracula', 92000, 70, 'PT Gramedia Pustaka Utama', '2024-03-09', '2024-03-09'),
(33, 'BC009', 'Non-Fiction', 'P.S. I Love You', 87000, 65, 'PT Bhuana Ilmu Populer', '2024-03-09', '2024-03-09'),
(34, 'BC010', 'Biography', 'A Brief History of Time', 90000, 40, 'PT Gramedia Pustaka Utama', '2024-03-09', '2024-03-09'),
(35, 'B02', 'Science', 'Gani Pedia', 92000, 10, 'PT Penerbit Buku Kompas', '2024-03-09', '2024-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Non-Fiction', NULL, '2024-03-09'),
(3, 'Science', NULL, NULL),
(4, 'History', NULL, NULL),
(5, 'Biography', NULL, NULL),
(6, 'Self-Help', NULL, NULL),
(7, 'Cooking', NULL, NULL),
(15, 'Gani Pedia', '2024-03-09', '2024-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `name`, `address`, `phone_number`) VALUES
(1, 'PT Gramedia Pustaka Utama', 'Jl. Palmerah Selatan No. 22-28, Jakarta', '+62 21 1234567'),
(2, 'PT Elex Media Komputindo', 'Jl. Danau Sunter Utara Blok A No. 9, Jakarta', '+62 21 2345678'),
(3, 'PT Mizan Pustaka', 'Jl. Kertanegara No. 21, Jakarta', '+62 21 3456789'),
(4, 'PT Serambi Ilmu Semesta', 'Jl. Kramat Raya No. 43, Jakarta', '+62 21 4567890'),
(5, 'PT Bentang Pustaka', 'Jl. Hang Lekir Raya No. 4, Jakarta', '+62 21 5678901'),
(6, 'PT Penerbit Buku Kompas', 'Jl. Palmerah Selatan No. 22-28, Jakarta', '+62 21 6789012'),
(7, 'PT Pustaka Alvabet', 'Jl. Jembatan Merah No. 25, Surabaya', '+62 31 1234567'),
(8, 'PT Gagas Media', 'Jl. Suniaraja No. 11, Bandung', '+62 22 2345678'),
(9, 'PT Penerbit Buku Kompas', 'Jl. Kramat Raya No. 43, Jakarta', '+62 21 3456789'),
(10, 'PT Bhuana Ilmu Populer', 'Jl. Cipete Raya No. 9, Jakarta', '+62 21 4567890');

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
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
