-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2025 at 03:49 AM
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
-- Database: `paw_patrol_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `adoption_tbl`
--

CREATE TABLE `adoption_tbl` (
  `adoption_id` int(11) NOT NULL,
  `adopter_name` varchar(100) NOT NULL,
  `adopter_email` varchar(50) NOT NULL,
  `adopter_phone` varchar(11) NOT NULL,
  `adopter_address` text NOT NULL,
  `other_pets` enum('Yes','No') NOT NULL,
  `home_type` enum('House','Apartment','Farm') NOT NULL,
  `adoption_story` text NOT NULL,
  `pet_name` varchar(50) NOT NULL,
  `pet_breed` varchar(50) NOT NULL,
  `pet_age` varchar(50) NOT NULL,
  `submission_date` date NOT NULL,
  `status` enum('Pending','Approved','Rejected','') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adoption_tbl`
--

INSERT INTO `adoption_tbl` (`adoption_id`, `adopter_name`, `adopter_email`, `adopter_phone`, `adopter_address`, `other_pets`, `home_type`, `adoption_story`, `pet_name`, `pet_breed`, `pet_age`, `submission_date`, `status`) VALUES
(1, 'Liam Chen', 'liam.chen@example.com', '555-0101', '123 Oak St, Anytown, CA 90210', 'Yes', 'House', 'I grew up with dogs and have always wanted to rescue a companion. I work from home and can provide constant attention and training.', 'Rocky', 'Beagle Mix', '3', '2025-10-20', 'Pending'),
(2, 'Sarah Jones', 'sarahj@webmail.com', '555-0102', '45B Apartment Complex, Cityplace, NY 10001', 'No', 'Apartment', 'I live alone and am looking for a small, quiet pet to share my space. I am committed to daily walks and indoor play.', 'Penny', 'Domestic Shorthair', '9', '2025-11-05', 'Approved'),
(3, 'Marcus Ramirez', 'marcusr@corpmail.net', '555-0103', '789 Pine Lane, Suburbia, TX 77001', 'Yes', 'Farm', 'We have a large property perfect for a high-energy dog. Our current dog loves playing, and we believe a companion would be great for both of them.', 'Jet', 'Border Collie', '1', '2025-11-28', 'Approved'),
(4, 'Aisha Khan', 'aisha.k@mail.org', '555-0104', '101 Maple Drive, Hometown, FL 33101', 'No', 'Apartment', 'I am a recent retiree with plenty of free time. I am looking specifically for an older pet that needs a calm, peaceful home to live out their golden years.', 'Bella', 'Senior Pug', '10', '2025-12-01', 'Pending'),
(5, 'David Lee', 'davidl@emailhost.co', '555-0105', '22 River Rd, Lakeside, WA 98001', 'Yes', 'House', 'My children have been begging for a guinea pig. We have researched their care extensively and have a secure, dedicated indoor habitat ready.', 'Gizmo', 'Guinea Pig', '6', '2025-12-05', 'Pending'),
(6, 'leonard', 'test@gmail.com', '12345678901', 'test address', 'Yes', 'House', 'i love pets', 'Ian', 'Labrador Mix', '2 years', '2025-12-09', 'Pending'),
(9, 'tatint', 'tatin@gmail.com', '12345678901', 'test address', 'Yes', 'Apartment', 'let me adopt', 'Tyrone', 'German Shepherd', '4 years', '2025-12-09', 'Approved'),
(10, 'tyrone', 'tyrone@gmail.com', '12345678901', 'test address', 'Yes', 'Farm', 'just because', 'Tyrone', 'German Shepherd', '4 years', '2025-12-11', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `donation_tbl`
--

CREATE TABLE `donation_tbl` (
  `donation_id` int(11) NOT NULL,
  `donation_amount` int(11) NOT NULL,
  `donor_name` varchar(100) NOT NULL,
  `donor_email` varchar(100) NOT NULL,
  `donor_contact` varchar(11) NOT NULL,
  `donor_message` text NOT NULL,
  `donation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donation_tbl`
--

INSERT INTO `donation_tbl` (`donation_id`, `donation_amount`, `donor_name`, `donor_email`, `donor_contact`, `donor_message`, `donation_date`) VALUES
(1, 200, 'leonard', 'test2@example.com', '12345678910', '', '2025-12-09');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_tbl`
--

CREATE TABLE `volunteer_tbl` (
  `volunteer_id` int(11) NOT NULL,
  `volunteer_name` varchar(100) NOT NULL,
  `volunteer_email` varchar(100) NOT NULL,
  `volunteer_phone` varchar(11) NOT NULL,
  `volunteer_address` text NOT NULL,
  `availability` enum('Weekdays (Morning)','Weekdays (Afternoon)','Weekends (Morning)','Weekends (Afternoon)','Flexible') NOT NULL,
  `commitment` enum('A few hours per week','1-2 days per week','3+ days per week','As needed (flexible)') NOT NULL,
  `area_of_interest` enum('Animal Care (feeding, walking)','Event Support & Fundraising','Administrative Tasks','Social Media & Outreach','Fostering Animals','Other') NOT NULL,
  `experience` text NOT NULL,
  `submission_date` date NOT NULL,
  `status` enum('Pending','Approved','Rejected','') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `volunteer_tbl`
--

INSERT INTO `volunteer_tbl` (`volunteer_id`, `volunteer_name`, `volunteer_email`, `volunteer_phone`, `volunteer_address`, `availability`, `commitment`, `area_of_interest`, `experience`, `submission_date`, `status`) VALUES
(1, 'leonard', 'test@example.com', '12345678901', 'test address 2', 'Weekdays (Morning)', 'A few hours per week', 'Animal Care (feeding, walking)', 'i love animals', '2025-12-09', 'Approved'),
(2, 'zweily', 'zweily@gmail.com', '12345678901', 'test address 2', 'Flexible', 'As needed (flexible)', 'Fostering Animals', 'let me in', '2025-12-09', 'Pending'),
(3, 'tatin', 'test2@example.com', '12345678901', 'test address 2', 'Flexible', '3+ days per week', 'Animal Care (feeding, walking)', 'i just want to', '2025-12-09', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoption_tbl`
--
ALTER TABLE `adoption_tbl`
  ADD PRIMARY KEY (`adoption_id`);

--
-- Indexes for table `donation_tbl`
--
ALTER TABLE `donation_tbl`
  ADD PRIMARY KEY (`donation_id`);

--
-- Indexes for table `volunteer_tbl`
--
ALTER TABLE `volunteer_tbl`
  ADD PRIMARY KEY (`volunteer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoption_tbl`
--
ALTER TABLE `adoption_tbl`
  MODIFY `adoption_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `donation_tbl`
--
ALTER TABLE `donation_tbl`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `volunteer_tbl`
--
ALTER TABLE `volunteer_tbl`
  MODIFY `volunteer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
