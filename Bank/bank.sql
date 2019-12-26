-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2019 at 12:02 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `trans_id` int(100) NOT NULL,
  `user_id` varchar(50) CHARACTER SET utf8 NOT NULL,
  `trans_data` int(5) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`trans_id`, `user_id`, `trans_data`, `username`) VALUES
(1, 'galit', 100, 'sergey'),
(2, 'galit', 500, 'romanz'),
(3, 'galit', 500, 'romanZ'),
(4, 'sergey', 50, 'adonis'),
(5, 'sergey', 500, 'daniel'),
(6, 'romanZ', 100, 'sergey'),
(7, 'sergey', 50, 'romanZ'),
(8, 'sergey', 100, 'daniel'),
(9, 'sergey', 900, 'john'),
(10, 'sergey', 1000, 'kiril');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `card` int(5) NOT NULL,
  `balance` int(10) DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `age` int(3) DEFAULT NULL,
  `adress` varchar(100) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `gender` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `card`, `balance`, `email`, `age`, `adress`, `phone`, `gender`) VALUES
(1, 'sergey', '123', 11225, 8000, 'sergey@gmail.com', 30, 'Maapiley Egoz 86', 523091781, 'ApacheHelicopter'),
(2, 'galit', '666', 11224, 8750, 'galit@gmail.com', 28, 'Haarava 186', 541237959, 'Female'),
(3, 'adonis', '123456', 15151, 1255, 'adonis@gmail.com', 24, 'Dekel 78', 521368745, 'Male'),
(4, 'romanZ', 'A123456a', 13123, 1350, 'romanZ@gmail.com', 30, 'Hazionut 25', 547893215, 'Male'),
(5, 'daniel', 'daniel00', 12345, -311, 'daniel@gmail.com', 17, 'Moshe Dayan 4', 507891593, 'Male'),
(6, 'kiril', 'kiril555', 78956, 2000, 'kiril@gmail.com', 26, 'Mivza Kadesh 12', 542666123, 'Transgender'),
(7, 'gil', 'gilgold', 44665, 2000, 'gilgold@gmail.com', 60, 'Shaked 55', 521346825, 'Male'),
(8, 'yaniv', 'yaniv111', 14785, 3500, 'yaniv@gmail.com', 45, 'Haezel 23', 521237891, 'Male'),
(9, 'john', 'john123', 98765, 1800, ' john@gmail.com', 15, 'David Hamelech 8', 589631470, 'Male'),
(10, 'tony', 'tony666', 51967, 6666, 'tony@gmail.com', 20, 'Ron Nahman 50', 549631235, 'Female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `trans_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
