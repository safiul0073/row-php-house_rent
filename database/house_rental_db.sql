-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 03, 2022 at 08:40 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `house_rental_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Duplex'),
(2, 'Single-Family Home'),
(3, 'Multi-Family Home'),
(4, '2-story house');

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `id` int(30) NOT NULL,
  `house_no` varchar(56) NOT NULL,
  `category_id` int(30) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `flat` int(56) NOT NULL DEFAULT 1,
  `unit` int(56) NOT NULL DEFAULT 1,
  `isGarage` tinyint(2) NOT NULL DEFAULT 1,
  `image` longtext DEFAULT NULL,
  `is_selled` tinyint(4) NOT NULL DEFAULT 0,
  `owner_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `house_no`, `category_id`, `description`, `price`, `flat`, `unit`, `isGarage`, `image`, `is_selled`, `owner_id`) VALUES
(1, '4554', 4, 'Sample', 2500, 1, 1, 1, NULL, 0, NULL),
(2, '45456', 1, 'dsfsdfsdfa', 6000, 1, 1, 1, NULL, 0, NULL),
(19, '465455', 3, 'Directory traversal vulnerability in the (1) extract and (2) extractall functions in the tarfile module in Python allows user-assisted remote attackers to overwrite arbitrary files via a .. (dot dot) sequence in filenames in a TAR archive, a related issue to CVE-2001-1267.', 50000, 45, 54, 1, '1667232660_laptop4.jpg,1667232660_laptop3.jpg,1667232660_laptop2.jpg,1667232660_laptop1.jpg,', 1, 3),
(20, 'my house', 3, 'Using color to add meaning only provides a visual indication, which will not be conveyed to users of assistive technologies – such as screen readers. Ensure that information denoted by the color is either obvious from the content itself (e.g. the visible text), or is included through alternative means, such as additional text hidden with the .sr-only class.', 40000, 8, 445, 1, '1667451360_resul-store.png,1667451360_response.png,1667451360_parcelPriceCalculation.png,', 0, 3),
(22, 'my house2', 3, 'Using color to add meaning only provides a visual indication, which will not be conveyed to users of assistive technologies – such as screen readers. Ensure that information denoted by the color is either obvious from the content itself (e.g. the visible text), or is included through alternative means, such as additional text hidden with the .sr-only class.', 6565, 56, 45, 0, '1667405940_laptop6.jpg,1667405940_laptop5.jpg,1667405940_house1.jpeg,', 1, 4),
(23, 'my house3', 2, '\r\nNever miss an update with the LinkedIn app\r\nDownload on the App StoreGet it on Google Play\r\nThis email was intended for Md Safiullah (Software Engineer at FarukExpress)\r\nLearn why we included this.\r\nYou are receiving Job Alert emails.\r\nManage job alerts   ·   Unsubscribe   ·   Help\r\nLinkedIn\r\n© 2022 LinkedIn Corporation, 1‌000 West Maude Avenue, Sunnyvale, CA 94085. LinkedIn and the LinkedIn logo are registered trademarks of LinkedIn.', 500000, 5, 10, 1, '1667447640_unitTestError.png,1667447640_Screenshot from 2022-05-30 19-01-43.png,1667447640_Screenshot from 2022-03-30 18-26-30.png,1667447640_Screenshot from 2022-03-30 18-24-52.png,1667447640_resul-store.png,1667447640_response.png,', 1, 5),
(24, 'my house 5', 3, ' Showing rows 0 - 5 (6 total, Query took 0.0006 seconds.)\r\nSELECT * FROM `houses`\r\n Profiling [ Edit inline ] [ Edit ] [ Explain SQL ] [ Create PHP code ] [ Refresh ]\r\n Show all	|			Number of rows: \r\n25\r\nFilter rows: \r\nSearch this table\r\nSort by key: \r\nNone\r\n+ Options\r\nFull texts\r\nid	\r\nhouse_no	\r\ncategory_id	\r\ndescription	\r\nprice	\r\nflat	\r\nunit	\r\nisGarage	\r\nimage	\r\nis_selled	\r\nowner_id	\r\n	\r\nEdit Edit\r\nCopy Copy\r\nDelete Delete\r\n1\r\n4554\r\n4\r\nSample\r\n2500\r\n1\r\n1\r\n1\r\nNULL\r\n0\r\nNULL\r\n	\r\nEdit Edit\r\nCopy Copy\r\nDelete Delete\r\n2\r\n45456\r\n1\r\ndsfsdfsdfa\r\n6000\r\n1\r\n1\r\n1\r\nNULL\r\n0\r\nNULL\r\n	\r\nEdit Edit\r\nCopy Copy\r\nDelete Delete\r\n19\r\n465455\r\n3\r\nDirectory traversal vulnerability in the (1) extra...\r\n50000\r\n45\r\n54\r\n1\r\n1667232660_laptop4.jpg,1667232660_laptop3.jpg,1667...\r\n1\r\n3\r\n	\r\nEdit Edit\r\nCopy Copy\r\nDelete Delete\r\n20\r\nmy house\r\n3\r\nUsing color to add meaning only provides a visual ...\r\n40000\r\n8\r\n445\r\n1\r\nNULL\r\n2\r\n3\r\n	\r\nEdit Edit\r\nCopy Copy\r\nDelete Delete\r\n21\r\nmy house2\r\n3\r\nUsing color to add meaning only provides a visual ...\r\n6565\r\n56\r\n45\r\n0\r\n1667405880_laptop6.jpg,1667405880_laptop5.jpg,1667...\r\n2\r\n3\r\n	\r\nEdit Edit\r\nCopy Copy\r\nDelete Delete\r\n22\r\nmy house2\r\n3\r\nUsing color to add meaning only provides a visual ...\r\n6565\r\n56\r\n45\r\n0\r\n1667405940_laptop6.jpg,1667405940_laptop5.jpg,1667...\r\n2\r\n3\r\nWith selected:  Check all With selected:    \r\n Show all	|			Number of rows: \r\n25\r\n', 6565, 10, 45, 1, '1667449800_unitTestError.png,1667449800_Screenshot from 2022-10-17 19-46-55.png,1667449800_Screenshot from 2022-10-11 15-23-57.png,1667449800_Screenshot from 2022-09-25 16-43-43.png,1667449800_Screenshot from 2022-06-09 14-51-16.png,', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(30) NOT NULL,
  `tenant_id` int(30) NOT NULL,
  `amount` float NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `tenant_id`, `amount`, `invoice`, `date_created`) VALUES
(1, 2, 2500, '123456', '2020-10-26 11:29:35'),
(2, 2, 7500, '136654', '2020-10-26 11:30:21'),
(3, 3, 2000, '54544', '2022-10-31 19:18:56');

-- --------------------------------------------------------

--
-- Table structure for table `purches`
--

CREATE TABLE `purches` (
  `id` int(11) NOT NULL,
  `house_id` bigint(56) NOT NULL,
  `user_id` bigint(56) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purches`
--

INSERT INTO `purches` (`id`, `house_id`, `user_id`, `price`, `created_at`) VALUES
(8, 19, 3, 50000, '2022-11-02 15:43:16'),
(9, 22, 4, 6565, '2022-11-03 03:58:57'),
(10, 23, 5, 500000, '2022-11-03 04:29:14'),
(11, 24, 3, 6565, '2022-11-03 04:41:02');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'House Rental Management System', 'info@sample.comm', '+6948 8542 623', '1603344720_1602738120_pngtree-purple-hd-business-banner-image_5493.jpg', '&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400; text-align: justify;&quot;&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` int(30) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `house_id` int(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = active, 0= inactive',
  `date_in` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `firstname`, `middlename`, `lastname`, `email`, `contact`, `house_id`, `status`, `date_in`) VALUES
(2, 'John', 'C', 'Smith', 'jsmith@sample.com', '+18456-5455-55', 1, 1, '2020-07-02'),
(3, 'Md', 'dfssdf', 'Safiullah', 'safiul7303@gmail.com', '01676413972', 2, 1, '2022-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(56) DEFAULT NULL,
  `phone` varchar(56) DEFAULT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=Admin,2=Staff',
  `avater` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `username`, `password`, `type`, `avater`) VALUES
(1, 'Administrator', NULL, NULL, 'admin', '0192023a7bbd73250516f069df18b500', 1, NULL),
(2, 'hello', 'safiul7303@gmail.com', '01875267920', 'Md fdsfdsfds', '25d55ad283aa400af464c76d713c07ad', 2, NULL),
(3, 'hi', 'sdfsfsdfs@gmail.com', '01753949407', 'hellouser', '81dc9bdb52d04dc20036dbd8313ed055', 2, '1667461080_plagiarism-flow-chart.png'),
(4, 'Md Safiullah', 'safiudggdf@gmail.com', '01875267920', 'hellouser2', '81dc9bdb52d04dc20036dbd8313ed055', 2, NULL),
(5, 'hello', 'safiuldfdf@gmail.com', '01721764830', 'hellouser3', '81dc9bdb52d04dc20036dbd8313ed055', 2, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purches`
--
ALTER TABLE `purches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purches`
--
ALTER TABLE `purches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
