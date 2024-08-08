-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2024 at 02:43 AM
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
-- Database: `xjvs`
--

-- --------------------------------------------------------

--
-- Table structure for table `servers`
--

CREATE TABLE `servers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `seed` varchar(30) NOT NULL,
  `port` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `tunnel_id` varchar(100) NOT NULL,
  `created_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('running','stopped') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `servers`
--

INSERT INTO `servers` (`id`, `user_id`, `name`, `seed`, `port`, `address`, `tunnel_id`, `created_datetime`, `status`) VALUES
(68, 1, 'sdf', 'sdf', '64635', 'white-reset.gl.joinmc.link', 'f1d45002-71a3-484c-b73a-663f4e6add05', '2024-08-08 01:24:57', 'stopped'),
(69, 1, 'YOW', 'SDF', '52427', 'complete-trick.gl.joinmc.link', 'd86b2696-a4e0-4b5b-b2b9-3c43c68bc54f', '2024-08-08 01:30:56', 'stopped'),
(70, 1, 'boss', 'vboisss', '51465', 'feature-fifth.gl.joinmc.link', '17ab1bad-b6f5-4478-a297-76e070f4543b', '2024-08-08 01:34:36', 'stopped'),
(71, 1, 'ssd', 'dff', '58996', 'hill-intend.gl.joinmc.link', 'd5640f8d-ba5d-4f12-aeba-15fedbdc4013', '2024-08-08 08:29:50', 'stopped');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `servers`
--
ALTER TABLE `servers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `servers`
--
ALTER TABLE `servers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
