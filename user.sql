-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2022 at 12:00 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(10) NOT NULL,
  `division_id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `division_id`, `name`) VALUES
(1, 1, 'ManikGang'),
(2, 2, 'Patuakhali'),
(3, 1, 'Faridpur'),
(4, 1, 'Madaripur'),
(5, 2, 'Pirojpur'),
(6, 1, 'Sherpur');

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`id`, `name`) VALUES
(1, 'Dhaka'),
(2, 'Barisal'),
(3, 'Khulna');

-- --------------------------------------------------------

--
-- Table structure for table `userlist`
--

CREATE TABLE `userlist` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` enum('1','2','','') NOT NULL,
  `address` text NOT NULL,
  `status` enum('0','1','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlist`
--

INSERT INTO `userlist` (`id`, `first_name`, `last_name`, `user_name`, `password`, `gender`, `address`, `status`) VALUES
(1, 'Mashiur', 'Rahaman', 'Mashiur_', '1234', '1', 'Kuril Bishwa Road, Dhaka', '0'),
(2, 'Rakibul', 'Islam', 'Roky_', '4321', '1', 'Vatara ,Dhaka', '0'),
(9, 'mahathir', 'pushan', 'Pushan5', '5678', '1', 'Shymoli, Dhaka', '1'),
(10, 'Nowrin', 'Muhaimen', 'Nowrin12', '0975', '2', 'Uttara, Dhaka', '1'),
(13, 'Tasnim', 'Prova', 'Prova43', '5248', '2', 'Barisal, Bangladesh.', '1'),
(14, 'Rashik', 'al hasan', 'Hasan22', 'a82d922b133be19c1171', '1', 'Sylhet, Bangladesh', '0'),
(15, 'Hasib', 'Chowdhury', 'Hasib_', '00989c20ff1386dc386d', '1', 'Chankharpool, Dhaka 2020.', '1'),
(16, 'prottoy', 'asaf', 'asaf_', '81dc9bdb52d04dc20036', '1', 'Uttara,Dhaka', '0'),
(17, 'Mir', 'Abir', 'Abir12', '81dc9bdb52d04dc20036', '1', 'Barisal, Bangladesh', '0'),
(18, 'Syed', 'Yeasin', 'Yeasin', '81dc9bdb52d04dc20036', '1', 'abc, Bangladesh', '1'),
(19, 'Sayed', 'Mahmud', 'Sifat11', '81dc9bdb52d04dc20036', '1', 'Bakergang, Barisal', '0'),
(20, 'Sayf', 'Siam', 'siam12', '81dc9bdb52d04dc20036', '1', 'Rupatoli, Kaunia.', '0'),
(21, 'Shohag', 'Rahman', 'Shohag96', '81dc9bdb52d04dc20036', '1', 'Nikunja , Dhaka', '1'),
(22, 'Shakil', 'ahmed', 'Shakil22', '81dc9bdb52d04dc20036', '1', 'Nougaon, Rajshahi.', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlist`
--
ALTER TABLE `userlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userlist`
--
ALTER TABLE `userlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
