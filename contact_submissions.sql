-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `db_design_junkie`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_submissions`
--

CREATE TABLE `contact_submissions` (
  `submission_id` int(5) NOT NULL,
  `submission_status` int(1) NOT NULL DEFAULT '1',
  `submission_priority` int(1) NOT NULL DEFAULT '1',
  `submission_ip` varchar(32) NOT NULL,
  `submission_browser` varchar(150) NOT NULL,
  `submission_name` varchar(30) NOT NULL,
  `submission_email` varchar(100) NOT NULL,
  `submission_telephone` varchar(20) NOT NULL,
  `submission_message` text NOT NULL,
  `submission_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_submissions`
--
ALTER TABLE `contact_submissions`
  ADD PRIMARY KEY (`submission_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_submissions`
--
ALTER TABLE `contact_submissions`
  MODIFY `submission_id` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;
