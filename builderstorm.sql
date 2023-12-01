-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2023 at 05:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `builderstorm`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned_projects`
--

CREATE TABLE `assigned_projects` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assigned_projects`
--

INSERT INTO `assigned_projects` (`id`, `project_id`, `user_id`) VALUES
(1, 1, 1),
(3, 1, 2),
(4, 5, 2),
(5, 5, 3),
(6, 1, 4),
(7, 5, 4),
(8, 1, 5),
(9, 5, 5),
(10, 1, 27);

-- --------------------------------------------------------

--
-- Table structure for table `drawings`
--

CREATE TABLE `drawings` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `status` varchar(15) NOT NULL,
  `file` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drawing_category`
--

CREATE TABLE `drawing_category` (
  `id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `permission_name` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permission_name`, `user_id`) VALUES
(11, 'add', 27),
(12, 'edit', 27);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `image`, `address`, `start_date`, `end_date`) VALUES
(1, 'Empirial City', 'uploads/download (1).jpg', 'G.T Road,asr', '2024-08-08', '2025-01-01'),
(5, 'white enclave', 'uploads/areachart.PNG', 'green avenue', '2024-07-07', '2025-09-09'),
(6, 'Holy city', 'uploads/OthersVideos.PNG', 'near city hospital, gt road ,amritsar', '2024-06-06', '2025-09-09'),
(7, 'Festyn Royale', 'uploads/hero-img.png', 'ranjit avenue, amritsar.', '2024-12-08', '2025-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `dob` date NOT NULL,
  `image` varchar(100) DEFAULT 'uploads/user.PNG',
  `address` varchar(100) NOT NULL,
  `type_id` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `is_block` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `dob`, `image`, `address`, `type_id`, `password`, `is_block`) VALUES
(1, 'Harman', 'Kaur', 'harman@gmail.com', '1999-01-08', 'uploads/step2CnfrmAcc.PNG', 'house-no:234,green field,asr.', 1, '09cb40da74beec3dd3c0ade018adda28', 0),
(2, 'yuvraj', 'singh', 'yuvi@gmail.com', '2023-11-08', 'uploads/user.PNG', 'sultanwind road, amritsar', 1, '4735699871c51e61aee96e540a7f5301', 0),
(3, 'hitman', 'singh', 'hitman2gmail.com', '2023-11-03', 'uploads/user.PNG', 'swastik vihar, chandigarh', 1, 'hitmanac637c531f902729ecad6c25e6c4bb22', 0),
(4, 'Rahul', 'Sharma', 'harman@gmail.com', '1999-09-09', 'uploads/1.jpeg', 'bcvxbz', 2, '1298815fd9e0a06860203eefd188c354', 0),
(5, 'Awish', 'Chopra', 'awish@gmail.com', '2001-08-07', 'uploads/2.jpeg', 'cjujgvfhvfj', 3, '84b925e5070df4fb2f38f13a021ebf99', 0),
(6, 'Vrinda', 'Aggarwal', 'vrinda@gmail.com', '2004-03-31', 'uploads/boy.jpg', 'mnbvcxzlkjgds', 4, '076c94c532596fb1337d78c1f5b72e74', 1),
(7, 'Robin', 'Sekhon', 'robin@gmail.com', '2002-12-10', 'uploads/Blis.png', 'MNBVCXASDFGHJKLQWERFTGH', 1, '02f89c0d1de9718e3d47dad24bd51f31', 1),
(8, 'Navneet', 'Kaur', 'navneet@gmail.com', '1999-01-17', 'uploads/bjd-cute-dal-doll-Favim.com-486779.jpg', 'nvnvxchjgfdyrte', 2, '61c9b08de1468d8a684b7ab93395411d', 0),
(9, 'Jasbir', 'Kaur', 'jasbir@gmail.com', '1994-07-25', 'uploads/itm_pretty-girls-dolls-wallpapers-for-profile-pictures2013-05-05_20-43-08_1.jpg', 'poiuytrewasdfghjk,mnbvcxz', 1, 'd49cc3c7f8f3e0c3bfe55e95c0e10b0f', 0),
(10, 'Ravkaran', 'Singh', 'ravkaran@gmail.com', '2009-10-20', 'uploads/independent-House-Bazar-Hansli-Wala-Amritsar.jpg', 'mnbvcxzlkjhgfdsapoiuytrewq', 3, 'b35e1784d736fbf081c2029c78d49bfb', 0),
(11, 'Rohan', 'Dhingra', 'rohan@gmail.com', '2003-09-09', 'uploads/download.jpg', 'wertyuidfghjkxcvbnm', 4, '3a714e83fb94eb56bcec1a92742b9113', 0),
(12, 'Shubham', 'Sharma', 'shubham@gmail.com', '1996-02-19', 'uploads/images.jpg', 'xcvbndfghjkwerty', 3, 'dcba30563c4331f342324a77e4ebae28', 0),
(13, 'Jasmeen', 'kaur', 'jasmeen@gmail.com', '1995-07-09', 'uploads/new-barbie-doll-facebook-DPs-.jpg', 'bvcvcfg', 2, 'ab61edaefaa37927eb7aaf62d799dc7c', 0),
(14, 'Shivam', 'Khanna', 'shivam@gmail.com', '1998-11-11', 'uploads/still 3.jpg', 'bvvcc', 4, 'a6a32d191c010338f46ea55d3883f17d', 0),
(27, 'Shubhman', 'Kaur', 'shubh@gmail.com', '2020-09-09', 'uploads/img1 (6).jpg', 'cvbndfgh', 2, 'ead2eb75f2fb821feb757336d7464543', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `type`) VALUES
(1, 'admin'),
(2, 'standard'),
(3, 'view'),
(4, 'none');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigned_projects`
--
ALTER TABLE `assigned_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id_fk` (`project_id`),
  ADD KEY `userid_fk` (`user_id`);

--
-- Indexes for table `drawings`
--
ALTER TABLE `drawings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projectid_fk` (`project_id`),
  ADD KEY `category_id_fk` (`category_id`);

--
-- Indexes for table `drawing_category`
--
ALTER TABLE `drawing_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk` (`user_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryId_fk` (`type_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assigned_projects`
--
ALTER TABLE `assigned_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `drawings`
--
ALTER TABLE `drawings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drawing_category`
--
ALTER TABLE `drawing_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigned_projects`
--
ALTER TABLE `assigned_projects`
  ADD CONSTRAINT `project_id_fk` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `userid_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `drawings`
--
ALTER TABLE `drawings`
  ADD CONSTRAINT `category_id_fk` FOREIGN KEY (`category_id`) REFERENCES `drawing_category` (`id`),
  ADD CONSTRAINT `projectid_fk` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `categoryId_fk` FOREIGN KEY (`type_id`) REFERENCES `user_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
