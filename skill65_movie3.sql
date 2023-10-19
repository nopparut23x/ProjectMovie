-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2023 at 05:11 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skill65_movie3`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(11) NOT NULL COMMENT 'รหัสภาพยนตร์',
  `name` varchar(50) NOT NULL COMMENT 'ชื่อภาพยนตร์',
  `poster` varchar(100) DEFAULT NULL COMMENT 'ภาพโปสเตอร์ภาพยนตร์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='# movies\nตารางภาพยนตร์\n## Example table\n| movie_id | name | poster |\n| ----: | ---- | ---- |\n| 1 | Avatar: The Way of Water | /storage/posters/63a93871328d1.jpg |\n| 2 | Wednesday | /storage/posters/63a938a7d1d92.jpg |\n| 3 | WALL·E | /storage/posters/63a938ad2c0c0.jpg |';

-- --------------------------------------------------------

--
-- Table structure for table `movie_times`
--

CREATE TABLE `movie_times` (
  `movie_time_id` int(11) NOT NULL COMMENT 'รหัสเวลาฉายภาพยนตร์',
  `movie_id` int(11) NOT NULL COMMENT 'รหัสภาพยนตร์',
  `start_time` datetime NOT NULL COMMENT 'วันเวลาเริ่มฉายภาพยนตร์',
  `end_time` datetime NOT NULL COMMENT 'วันเวลาสิ่นสุดการฉายภาพยนตร์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='# movie_times\nตารางเวลาฉายภาพยนตร์\n## Example table\n| movie_time_id | movie_id | start_time | end_time |\n| ----: | ---- | ---- | ---- |\n| 1 | 1 | 2022-1-20 13:30:00 | 2022-1-20 15:30:00 |\n| 2 | 1 | 2022-1-20 17:00:00 | 2022-1-20 19:00:00 |\n| 3 | 2 | 2022-1-21 9:00:00 | 2022-1-21 11:00:00 |';

-- --------------------------------------------------------

--
-- Table structure for table `reserve_action`
--

CREATE TABLE `reserve_action` (
  `reserve_action_id` int(11) NOT NULL COMMENT 'รหัสการจองที่นั่ง',
  `user_id` int(11) NOT NULL COMMENT 'รหัสผู้ใช้',
  `movie_time_id` int(11) NOT NULL COMMENT 'รหัสเวลาฉายภาพยนตร์',
  `status` int(1) NOT NULL COMMENT '-1 = ปฏิเสธการจอง\n0 = รอการอนุมัติการจอง\n1 = อนุมัติการจองแล้ว'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='# reserve_action\nตารางการจองที่นั่งโรงภาพยนตร์\n## Example table\n| reserve_action_id | user_id | movie_time_id | status |\n| ----: | ----: | ----: | ----: |\n| 1 | 2 | 1 | 1 |\n| 2 | 2 | 2 | 0 |\n| 3 | 4 | 3 | -1 |';

-- --------------------------------------------------------

--
-- Table structure for table `reserve_items`
--

CREATE TABLE `reserve_items` (
  `reserve_item_id` int(11) NOT NULL COMMENT 'รหัสรายการที่นั่งที่จอง',
  `reserve_action_id` int(11) NOT NULL COMMENT 'รหัสการจองที่นั่ง',
  `theater_seat_id` int(11) NOT NULL COMMENT 'รหัสที่นั่งโรงภาพยนตร์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='# reserve_items\nตารางรายการที่นั่งที่จอง\n## Example table\n| reserve_item_id | reserve_action_id | theater_seat_id |\n| ----: | ----: | ----: |\n| 1 | 1 | 1 |\n| 2 | 1 | 2 |\n| 3 | 1 | 3 |\n| 4 | 2 | 1 |\n| 5 | 3 | 3 |';

-- --------------------------------------------------------

--
-- Table structure for table `theater_plan`
--

CREATE TABLE `theater_plan` (
  `id` int(11) NOT NULL COMMENT 'รหัสผังที่นั่งโรงภาพยนตร์',
  `img` varchar(100) NOT NULL COMMENT 'ภาพผังที่นั่งโรงภาพยนตร์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='# theater_plan\nตารางผังที่นั่งโรงภาพยนตร์\n## Example table\n| id | img |\n| ----: | ---- |\n| 1 | /storage/plan/63a938bace23a.jpg | ';

-- --------------------------------------------------------

--
-- Table structure for table `theater_seats`
--

CREATE TABLE `theater_seats` (
  `theater_seat_id` int(11) NOT NULL COMMENT 'รหัสที่นั่งโรงภาพยนตร์',
  `seat_name` varchar(5) NOT NULL COMMENT 'ชื่อที่นั่งโรงภาพยนตร์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='# theater_seats\nตารางที่นั่งโรงภาพยนตร์\n## Example table\n| theater_seat_id | seat_name |\n| ----: | ---- |\n| 1 | A1 | \n| 2 | A2 | \n| 3 | A3 | \n| 4 | B1 | \n| 5 | B2 |\n| 6 | C1 | ';

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL COMMENT 'รหัสผู้ใช้',
  `firstname` varchar(25) NOT NULL COMMENT 'ชื่อ',
  `lastname` varchar(25) NOT NULL COMMENT 'นามสกุล',
  `profile` varchar(100) DEFAULT NULL COMMENT 'ภาพประจำตัว',
  `email` varchar(100) NOT NULL COMMENT 'อีเมล',
  `password` varchar(64) NOT NULL COMMENT 'รหัสผ่าน',
  `user_type` enum('admin','user') NOT NULL COMMENT 'ประเภทบัญชี',
  `status` int(1) NOT NULL COMMENT '-1 = ระงับการใช้งาน\n0 = ขอใช้งานระบบ\n1 = ใช้งานระบบ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='# users \nตารางผู้ใช้\n## Example table\n| user_id | firstname | lastname | profile | email | password | user_type | status |\n| ----: | ---- | ---- | ---- | ---- | ---- | ---- | ----: | \n| 1 | admin | demo | /storage/profiles/5ece4797eaf5e.jpg | admin@demo.com | 25d55ad283aa400af464c76d713c07ad | admin | 1 |\n| 2 | user | demo | /storage/profiles/63a936d4a716d.jpg | user@demo.com | 25d55ad283aa400af464c76d713c07ad | user | 1 |\n| 3 | user1 | demo | /assets/img/profile.png | user1@demo.com | 25d55ad283aa400af464c76d713c07ad | user | 0 |\n| 4 | user2 | demo | /assets/img/profile.png | user2@demo.com | 25d55ad283aa400af464c76d713c07ad | user | -1 |';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `movie_times`
--
ALTER TABLE `movie_times`
  ADD PRIMARY KEY (`movie_time_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `reserve_action`
--
ALTER TABLE `reserve_action`
  ADD PRIMARY KEY (`reserve_action_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `movie_time_id` (`movie_time_id`);

--
-- Indexes for table `reserve_items`
--
ALTER TABLE `reserve_items`
  ADD PRIMARY KEY (`reserve_item_id`),
  ADD KEY `reserve_action_id` (`reserve_action_id`),
  ADD KEY `theater_seat_id` (`theater_seat_id`);

--
-- Indexes for table `theater_plan`
--
ALTER TABLE `theater_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theater_seats`
--
ALTER TABLE `theater_seats`
  ADD PRIMARY KEY (`theater_seat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสภาพยนตร์';

--
-- AUTO_INCREMENT for table `movie_times`
--
ALTER TABLE `movie_times`
  MODIFY `movie_time_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสเวลาฉายภาพยนตร์';

--
-- AUTO_INCREMENT for table `reserve_action`
--
ALTER TABLE `reserve_action`
  MODIFY `reserve_action_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการจองที่นั่ง';

--
-- AUTO_INCREMENT for table `reserve_items`
--
ALTER TABLE `reserve_items`
  MODIFY `reserve_item_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสรายการที่นั่งที่จอง';

--
-- AUTO_INCREMENT for table `theater_plan`
--
ALTER TABLE `theater_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผังที่นั่งโรงภาพยนตร์';

--
-- AUTO_INCREMENT for table `theater_seats`
--
ALTER TABLE `theater_seats`
  MODIFY `theater_seat_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสที่นั่งโรงภาพยนตร์';

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ใช้';

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie_times`
--
ALTER TABLE `movie_times`
  ADD CONSTRAINT `movie_times_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reserve_action`
--
ALTER TABLE `reserve_action`
  ADD CONSTRAINT `reserve_action_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserve_action_ibfk_2` FOREIGN KEY (`movie_time_id`) REFERENCES `movie_times` (`movie_time_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reserve_items`
--
ALTER TABLE `reserve_items`
  ADD CONSTRAINT `reserve_items_ibfk_1` FOREIGN KEY (`reserve_action_id`) REFERENCES `reserve_action` (`reserve_action_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserve_items_ibfk_2` FOREIGN KEY (`theater_seat_id`) REFERENCES `theater_seats` (`theater_seat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
