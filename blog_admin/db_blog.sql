-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2018 at 09:07 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `blog_id` int(11) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `blog_description` text NOT NULL,
  `blog_image` text NOT NULL,
  `publication_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`blog_id`, `blog_title`, `author_name`, `blog_description`, `blog_image`, `publication_status`) VALUES
(1, 'Lensman caught in Croatia victory pile', 'Arfizur Rahman', 'No photographer got closer to Croatia\'s World Cup semi-final victory than AFP\'s Yuri Cortez who found himself right under the pile of jubilant players.\r\n\r\nHe happened to be working in the corner of the pitch in Moscow where Mario Mandzukic rushed to celebrate after scoring against England in extra time.\r\n\r\nTeammates piled in after the man behind the winning goal and Cortez disappeared beneath the team.\r\n\r\n\"They just kept coming towards me and they fell on me!\" he says.\r\n\r\nEver the professional, he picked up his camera and snapped the finalists close up, while colleagues in turn photographed the Salvadorean inside the pile.', '../asset/blog image/im1.jpg', 1),
(2, 'This is the first title', 'Ahmad', 'No photographer got closer to Croatia\'s World Cup semi-final victory than AFP\'s Yuri Cortez who found himself right under the pile of jubilant players.\r\n\r\nHe happened to be working in the corner of the pitch in Moscow where Mario Mandzukic rushed to celebrate after scoring against England in extra time.\r\n\r\nTeammates piled in after the man behind the winning goal and Cortez disappeared beneath the team.\r\n\r\n\"They just kept coming towards me and they fell on me!\" he says.\r\n\r\nEver the professional, he picked up his camera and snapped the finalists close up, while colleagues in turn photographed the Salvadorean inside the pile.', '../asset/blog image/im4.jpg', 1),
(12, 'This is the jkhktitle', 'Musharraf ', 'No photographer got closer to Croatia\'s World Cup semi-final victory than AFP\'s Yuri Cortez who found himself right under the pile of jubilant players.\r\n\r\nHe happened to be working in the corner of the pitch in Moscow where Mario Mandzukic rushed to celebrate after scoring against England in extra time.\r\n\r\nTeammates piled in after the man behind the winning goal and Cortez disappeared beneath the team.\r\n\r\n\"They just kept coming towards me and they fell on me!\" he says.\r\n\r\nEver the professional, he picked up his camera and snapped the finalists close up, while colleagues in turn photographed the Salvadorean inside the pile.', '../asset/blog image/im2.jpg', 1),
(13, 'This is the fourth title', 'Sadia Jannat', 'No photographer got closer to Croatia\'s World Cup semi-final victory than AFP\'s Yuri Cortez who found himself right under the pile of jubilant players.\r\n\r\nHe happened to be working in the corner of the pitch in Moscow where Mario Mandzukic rushed to celebrate after scoring against England in extra time.\r\n\r\nTeammates piled in after the man behind the winning goal and Cortez disappeared beneath the team.\r\n\r\n\"They just kept coming towards me and they fell on me!\" he says.\r\n\r\nEver the professional, he picked up his camera and snapped the finalists close up, while colleagues in turn photographed the Salvadorean inside the pile.', '../asset/blog image/im3.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `fullname`, `username`, `email`, `password`) VALUES
(2, 'Arfizur Rahman', 'arfizrahman', 'arfizrahman0@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'Ahmad', 'ahmad', 'ahmadcse@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'Sadia Jannat', 'sadia', 'sadia@gmail.com', '067d16c8d5712c7cbc6ce3fb21766ff8'),
(5, 'Sheik Arif', 'arifs', 'arif@gmail.com', '2fc3d66c4fc5b30a3a283bede6888a12'),
(6, 'Rifatul Islam', 'rifat', 'rifat@gmail.com', '79a629bcae723003a16fe0b1ad51a946'),
(7, 'Raihan', 'raihan', 'ar@gmail.com', 'daa6b8d04ce72d953d5501adc53ddd82'),
(8, 'Nishatt', 'nishat', 'nishat@gmail.com', '86119e55ee53cc8e91c65180d552d5b1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
