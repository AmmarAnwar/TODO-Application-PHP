-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 08:53 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.20
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET
  time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8mb4 */
;

--
-- Database: `database`
--
-- --------------------------------------------------------
--
-- Table structure for table `notes`
--
CREATE TABLE `notes` (
  `srno` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--
INSERT INTO
  `notes` (`srno`, `title`, `description`, `time`)
VALUES
  (
    1,
    'Name',
    'My name is Ammar Anwar !!!',
    '2020-08-22 21:28:56'
  ),
  (
    2,
    'Buy Fruits',
    '1. Mango\r\n2. Banana\r\n3. Apple',
    '2020-08-25 21:29:27'
  ),
  (3, 'Start', 'Hello World', '2020-07-21 18:31:27'),
  (
    4,
    'Go to play',
    'Play football with friends.',
    '2020-10-21 13:31:49'
  ),
  (
    5,
    'Homework',
    'Do WDL Project.',
    '2020-10-21 9:18:43'
  );

--
-- Indexes for dumped tables
--
--
-- Indexes for table `notes`
--
ALTER TABLE
  `notes`
ADD
  PRIMARY KEY (`srno`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE
  `notes`
MODIFY
  `srno` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 50;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;