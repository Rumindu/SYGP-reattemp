-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2024 at 05:34 AM
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
-- Database: `krushi-arunalu`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `agri_officer_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `published_date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `agri_officer_id`, `title`, `content`, `published_date_time`, `phone`) VALUES
(19, 5, 'further expand the mushroom cultivation in Hambantota district', 'Mr.Qi Zhenhong, the Chinese ambassador to Sri Lanka has requested to take measures to further expand the mushroom cultivation currently being carried out in Hambantota district. Although there are many types of mushroom in Sri Lanka, only several types such as Piduru Bimmal (Volvariella volvacea), Boththam Bimmal (Agaricus bisporus), Muthubeli Bimmal (Pleurotusostreatus), Shitake Bimmal (Lentinus edodes) and Abaloni Bimmal (Pleurotus cystidiosus) can be cultivated at commercial level. Even though mushroom cultivation is currently being carried out in Hambantota district, many farmers grow only two or three types of mushrooms. However, there are about 29 types of mushrooms which are suitable for human consumption and have high nutritional value. Mr.Qi Zhenhong, Chinese ambassador stated that measures should be taken to popularize mushroom as a food in Sri Lanka which is a very much popular food item among the Chinese. Since there is a large number of Chinese people living closer to Hambantota port, people in that area can earn a huge income by cultivating mushrooms. Therefore, the minister of Agriculture instructed the Department of Agriculture to take measures to further expand the mushroom cultivation currently being carried out in Hambantota district. The minister further said that the Chinese ambassador pledged him to extend the fullest support of the Chinese government to expand mushroom cultivation in Hambantota district.', '2023-11-10 19:34:20', 0),
(20, 5, 'Two Banana export projects to Embilipitiya and Sevanagala', 'Two Banana export projects to Embilipitiya and SevanagalaTwo Banana export projects to Embilipitiya and SevanagalaTwo Banana export projects to Embilipitiya and SevanagalaTwo Banana export projects to Embilipitiya and Sevanagala', '2023-11-10 19:34:31', 0),
(21, 5, 'Minister of Agriculture seeks a report on the allegation that 65 percent of Urea fertilizer is wasted in paddy cultivation', 'This is a sample announcement content.', '2023-11-10 19:35:29', 0),
(22, 5, 'Sample announcement 1', 'This is a sample announcement 1 content', '2023-11-10 19:36:03', 0),
(23, 5, 'Test announcemnt', 'Please edit this one', '2023-11-10 19:37:27', 0),
(32, 7, 'Sample announcement title by Sandul', 'This is a sample announcment by Sandul', '2023-12-15 06:32:39', 710151159);

-- --------------------------------------------------------

--
-- Table structure for table `cultivation_question`
--

CREATE TABLE `cultivation_question` (
  `id` int(11) NOT NULL,
  `producer_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` text NOT NULL,
  `asked_date_time` date NOT NULL DEFAULT current_timestamp(),
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cultivation_question`
--

INSERT INTO `cultivation_question` (`id`, `producer_name`, `title`, `content`, `image`, `asked_date_time`, `category`) VALUES
(1, 'Kavishka', 'Spreading \"Red Weevil\" over my coconut cultivation', 'My coconut cultivation is facing series Red Weevil spread. I have done some several actions to control this issue. But it\'s not success. Kindly give me a solution for protect my cultivation.', '', '2023-08-07', 'Pest_and_disease_management'),
(2, 'Kavishka', 'This a sample question 2', 'This is the content of the sample question 2. This is the content of the sample question 2. This is the content of the sample question 2. This is the content of the sample question 2. This is the content of the sample question 2. This is the content of the sample question 2. This is the content of the sample question 2. This is the content of the sample question 2.', '', '2023-08-07', 'Cultivation_techniques'),
(9, 'Kavishka', 'Topic of crop specific question', 'Content of crop specific question', '', '2023-08-20', 'Crop_specific_questions');

-- --------------------------------------------------------

--
-- Table structure for table `cultivation_question_category`
--

CREATE TABLE `cultivation_question_category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cultivation_question_category`
--

INSERT INTO `cultivation_question_category` (`id`, `category`) VALUES
(1, 'Cultivation_techniques'),
(2, 'Crop_specific_questions'),
(3, 'Soil_and_fertility_management'),
(4, 'Pest_and_disease_management'),
(5, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `cultivation_question_response`
--

CREATE TABLE `cultivation_question_response` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `agri_officer_id` int(11) NOT NULL,
  `responded_date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cultivation_question_response`
--

INSERT INTO `cultivation_question_response` (`id`, `question_id`, `agri_officer_id`, `responded_date_time`, `content`) VALUES
(15, 2, 7, '2023-08-17 06:39:27', 'Restructure'),
(16, 1, 5, '2023-08-17 06:40:34', 'This is a response by Rumindu'),
(29, 9, 5, '2023-08-23 16:57:18', 'Test reponse');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `name`) VALUES
(1, 'Colombo'),
(2, 'Gampaha'),
(3, 'Kalutara'),
(4, 'Kandy'),
(5, 'Matale'),
(6, 'Nuwara Eliya'),
(7, 'Galle'),
(8, 'Matara'),
(9, 'Hambantota'),
(10, 'Jaffna'),
(11, 'Kilinochchi'),
(12, 'Mannar'),
(13, 'Vavuniya'),
(14, 'Mullativu'),
(15, 'Batticaloa'),
(16, 'Ampara'),
(17, 'Trincomalee'),
(18, 'Kurunegala'),
(19, 'Puttalam'),
(20, 'Anuradhapura'),
(21, 'Polonnaruwa'),
(22, 'Badulla'),
(23, 'Moneragala'),
(24, 'Ratnapura'),
(25, 'Kegalle');

-- --------------------------------------------------------

--
-- Table structure for table `registered_user`
--

CREATE TABLE `registered_user` (
  `id` int(11) NOT NULL,
  `nic` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `district` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `hash_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registered_user`
--

INSERT INTO `registered_user` (`id`, `nic`, `role`, `name`, `address`, `district`, `email`, `contact_no`, `hash_password`) VALUES
(5, '9923000094V', 'Agri Officer', 'Rumindu', 'Meetiyagoda', 'Galle', 'rumindu@gmail.com', 710151159, '$2y$10$VwRktutgqS0JHoshItalQORIO0YecRgWT1VVc6OyyVfGzCaYhXWa6'),
(6, '982300094V', 'Producer', 'Kavishka', 'Meetiyagoda', 'Galle', 'kavishka@gmail.com', 779907227, '$2y$10$S7hqPVHg28SYEyKi4s.2zeeBknSmF1QgQGp0i.ZEcCCc3PrvyS99K'),
(7, '200023001245', 'Agri Officer', 'Sandul', 'Galle', 'Galle', 'sandul@gmail.com', 710151159, '$2y$10$lQfNxf7QerwejmFt1iLOlu/ckHIcv/DEB5NpEjqxFKSkYZMdqgMMa'),
(9, '995600094V', 'Producer', 'Surani', 'Ampegama', 'Galle', 'surani@gmail.com', 710151159, '$2y$10$Va8GYaUFfJMDsaF/z57ts.hPPD6LrTUw9BiVQ5XDtoxEK1I10Ugv6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agri_officer_id` (`agri_officer_id`);

--
-- Indexes for table `cultivation_question`
--
ALTER TABLE `cultivation_question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producer_id` (`producer_name`);

--
-- Indexes for table `cultivation_question_category`
--
ALTER TABLE `cultivation_question_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cultivation_question_response`
--
ALTER TABLE `cultivation_question_response`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `agri_officer_id` (`agri_officer_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registered_user`
--
ALTER TABLE `registered_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `district_id` (`district`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `cultivation_question`
--
ALTER TABLE `cultivation_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cultivation_question_category`
--
ALTER TABLE `cultivation_question_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cultivation_question_response`
--
ALTER TABLE `cultivation_question_response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `registered_user`
--
ALTER TABLE `registered_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cultivation_question_response`
--
ALTER TABLE `cultivation_question_response`
  ADD CONSTRAINT `cultivation_question_response_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `cultivation_question` (`id`),
  ADD CONSTRAINT `cultivation_question_response_ibfk_2` FOREIGN KEY (`agri_officer_id`) REFERENCES `registered_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
