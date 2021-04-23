-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2021 03 30:54 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prints`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `mid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mssg` varchar(300) NOT NULL,
  `cdate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ordrs`
--

CREATE TABLE `ordrs` (
  `myid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `img` varchar(50) NOT NULL,
  `name` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `addr` varchar(200) NOT NULL,
  `ordr` varchar(200) NOT NULL,
  `pr` varchar(20) NOT NULL,
  `sts` varchar(20) NOT NULL,
  `cdate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordrs`
--

INSERT INTO `ordrs` (`myid`, `uid`, `img`, `name`, `mobile`, `email`, `addr`, `ordr`, `pr`, `sts`, `cdate`) VALUES
(37, 2, 'img/26.jpg', 'jj', '313431433', 'jj@example.com', 'fsdfwe', 'Footbal', 'Free', 'Pending', '2021-03-30'),
(38, 5, '', 'don', '453', 'don@gmail.com', '45345', 'Ad HTML ', '$300', 'Pending', '2021-03-30'),
(39, 5, 'img/25.jpg', 'don', '57297575', 'don@gmail.com', 'Any Address for tEst ', 'Ad HTML ', '$300', 'Pending', '2021-03-30'),
(40, 5, 'img/23.jpg', 'don', '435434', 'don@gmail.com', 'My new test ', 'Advanced', '$500', 'Pending', '2021-03-30'),
(41, 5, 'img/16.jpg', 'don', '45334', 'don@gmail.com', 'tgdgf', 'Blogger', '$200', 'Pending', '2021-03-30'),
(42, 2, 'img/.jpg', 'jj', '5475', 'jj@example.com', 'hrt', 'Photoshop', '$100', 'Pending', '2021-03-30'),
(43, 2, 'img/12.jpg', 'jj', '6756', 'jj@example.com', '6ghfhgf', 'HTML Course', '$200', 'Pending', '2021-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `img` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `category` varchar(50) NOT NULL,
  `available` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `pr` varchar(20) NOT NULL,
  `cdate` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `img`, `name`, `pr`, `cdate`) VALUES
(1, 'img/1.jpg', 'image1', 'R25', '2020-03-30'),
(2, 'img/2.jpg', 'image2', 'R25', '2021-03-30'),
(3, 'img/3.jpg', 'image3', 'R25', '2021-03-30'),
(4, 'img/4.jpg', 'image4', 'R25', '2021-03-30'),
(5, 'img/5.jpg', 'image5', 'R25', '2020-03-30'),
(6, 'img/6.jpg', 'image6', 'R25', '2021-03-30'),
(7, 'img/7.jpg', 'image7', 'R25', '2021-03-30'),
(8, 'img/8.jpg', 'image8', 'R25', '2021-03-30'),
(9, 'img/9.jpg', 'image9', 'R25', '2020-03-30'),
(10, 'img/10.jpg', 'image10', 'R25', '2021-03-30'),
(11, 'img/11.jpg', 'image11', 'R25', '2021-03-30'),
(12, 'img/12.jpg', 'image12', 'R25', '2021-03-30'),
(13, 'img/13.jpg', 'image13', 'R25', '2020-03-30'),
(14, 'img/14.jpg', 'image14', 'R25', '2021-03-30'),
(15, 'img/15.jpg', 'image15', 'R25', '2021-03-30'),
(16, 'img/16.jpg', 'image16', 'R25', '2021-03-30'),
(17, 'img/17.jpg', "image17", 'R25', '2020-03-30'),
(18, 'img/18.jpg', 'image18', 'R25', '2021-03-30'),
(19, 'img/19.jpg', 'image19', 'R25', '2021-03-30'),
(20, 'img/20.jpg', 'image20', 'R25', '2021-03-30'),
(21, 'img/21.jpg', 'image21', 'R25', '2020-03-30'),
(22, 'img/22.jpg', 'image22', 'R25', '2021-03-30'),
(23, 'img/23.jpg', 'image23', 'R25', '2021-03-30'),
(24, 'img/24.jpg', 'image24', 'R25', '2021-03-30'),
(25, 'img/25.jpg', 'image25', 'R25', '2020-03-30'),
(26, 'img/26.jpg', 'image26', 'R25', '2021-03-30'),
(27, 'img/27.jpg', 'image27', 'R25', '2021-03-30'),
(28, 'img/28.jpg', 'image28', 'R25', '2021-03-30'),
(29, 'img/29.jpg', 'image29', 'R25', '2020-03-30');
(30, 'img/30.jpg', 'image30', 'R25', '2021-03-30'),
(31, 'img/31.jpg', 'image31', 'R25', '2021-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `joining_date`) VALUES
(1, 'admin', 'admin@example.com', '$2y$10$ujej4UpRJsbf3ETJRrqg8uQ7pBv4HX5w77dho8cD9t8zVK/zt75Na', '2021-03-30 11:33:28'),
(2, 'jj', 'jj@example.com', '$2y$10$aQUx3BOwroeFTAWja6ThF.H5y99jgike6o/IskgIlxo.7QLUHB7.C', '2021-03-30 11:33:48'),
(3, 'dd', 'dd@gmail.com', '$2y$10$KR3HabnOr3dgusF4XWJnQ.jnVcNfl8adjN4onmTr66/y045MCCyam', '2021-03-30 07:19:25'),
(4, 'David', 'david@gmail.com', '$2y$10$y3NgKp.DzKIdBoRRbyxnXuUDdB/PlXLGKGUsJmjKciuLU1PN2izUK', '2021-03-30 04:06:52'),
(5, 'don', 'don@gmail.com', '$2y$10$pCo4MOHPDFdk4DgUKbYw4OubecrEm8ZmERG/7tVpPKOh817TFYFV2', '2021-03-30 04:07:27'),
(6, 'John', 'john@gmail.com', '$2y$10$BpV9P7gNd8IGTPoxgXC2beiKpVsFOmgg5aAFAzLVWu1Z7skBYUTYi', '2021-03-30 04:18:26'),
(7, 'don43fe', 'dondfsdf@gmail.com', '$2y$10$KDfwZhbMZ.O9iVqyGmLii.jUHI7wUlpoSzznb1AMLj/k2GGprHnxS', '2021-03-30 04:57:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `ordrs`
--
ALTER TABLE `ordrs`
  ADD PRIMARY KEY (`myid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ordrs`
--
ALTER TABLE `ordrs`
  MODIFY `myid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
