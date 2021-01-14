-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2020 at 03:25 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `donar`
--

CREATE TABLE `donar` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `blood` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birth` date NOT NULL,
  `phone` int(50) NOT NULL,
  `last` date NOT NULL,
  `disease` varchar(150) NOT NULL,
  `location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donar`
--

INSERT INTO `donar` (`id`, `name`, `email`, `blood`, `gender`, `birth`, `phone`, `last`, `disease`, `location`) VALUES
(1, 'Tajmim Hossain Purnata', 'tajmimpurnata@gmail.com', 'B+', 'Female', '1997-08-11', 12345, '2020-11-30', 'none', 'Dhaka'),
(3, 'Purnata', 'purnata@yahoo.com', 'B+', 'Female', '1999-11-30', 12345, '2020-12-02', 'ggg', 'Dhaka'),
(4, 'Tajmim ', 'tajmim.hossain.purnata@g.bracu.ac.bd', 'A+', 'Female', '1990-05-04', 12345435, '2020-11-04', 'Diabetes', 'Dhaka'),
(5, 'Farhana', 'farhana@yahoo.com', 'AB+', 'Female', '1974-12-08', 5153465, '2020-09-10', 'Diabetes', 'Dhaka'),
(7, 'Farhin', 'farhinhusain@gmail.com', 'B+', 'Female', '1997-03-18', 57757, '2020-09-30', 'none', 'Noahkhali');

-- --------------------------------------------------------

--
-- Table structure for table `seeker`
--

CREATE TABLE `seeker` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `blood` varchar(10) NOT NULL,
  `disease` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(50) NOT NULL,
  `location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seeker`
--

INSERT INTO `seeker` (`id`, `name`, `blood`, `disease`, `email`, `phone`, `location`) VALUES
(1, 'Tajmim Hossain Purnata', 'B+', 'ggg', 'tajmimpurnata@gmail.com', 12345, 'Dhaka'),
(2, 'Tajmim Hossain Purnata', 'B+', 'ggg', 'tajmimpurnata@gmail.com', 12345, 'Dhaka'),
(3, 'Apshara', 'B+', 'Diabetes', 'apshara@gmail.com', 932778, 'Dhaka'),
(4, 'BTS', 'A+', 'none', 'bts@bighit.com', 78740, 'Seoul'),
(5, 'Raka', 'A+', 'none', 'raka@gmail.com', 12345, 'Dhaka'),
(6, 'Akash', 'A+', '', 'nurullahakash@gmail.com', 12345435, 'Sydney'),
(7, 'Dara', 'AB+', 'Diabetes', 'dara@gmail.com', 98237238, 'Noahkhali');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donar`
--
ALTER TABLE `donar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seeker`
--
ALTER TABLE `seeker`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donar`
--
ALTER TABLE `donar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `seeker`
--
ALTER TABLE `seeker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
