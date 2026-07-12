-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2024 at 12:39 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `construction`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_request`
--

CREATE TABLE `book_request` (
  `br_id` int(10) NOT NULL,
  `date` date DEFAULT NULL,
  `u_id` int(10) DEFAULT NULL,
  `l_id` int(10) DEFAULT NULL,
  `from` date DEFAULT NULL,
  `to` date DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Pending',
  `description` varchar(150) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `rating` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_request`
--

INSERT INTO `book_request` (`br_id`, `date`, `u_id`, `l_id`, `from`, `to`, `status`, `description`, `amount`, `rating`) VALUES
(3, '2024-06-11', 2, 1, '2024-06-12', '2024-06-13', 'Paid', 'House maintenance', 100, NULL),
(5, '2024-06-11', 2, 1, '2024-06-15', '2024-06-17', 'Paid', 'sdfghjhgf fjftj', 114, NULL),
(6, NULL, NULL, NULL, NULL, NULL, 'Pending', NULL, NULL, NULL),
(7, '2024-07-20', 2, 1, '2024-07-21', '2024-07-24', 'Paid', 'dsc', 1000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dboy`
--

CREATE TABLE `dboy` (
  `did` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dboy`
--

INSERT INTO `dboy` (`did`, `name`, `phone`, `address`) VALUES
(1, 'db1', '7755220011', 'Address of db1@gmail.com'),
(2, 'newdb', '774411552288', 'Address of newdb@gmail.co'),
(3, 'fghj', '9088776688', 'Addresso of fhx@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `estimate`
--

CREATE TABLE `estimate` (
  `eid` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `location` varchar(100) NOT NULL,
  `sqft` int(10) NOT NULL,
  `bedroom` int(10) NOT NULL,
  `bathroom` int(10) NOT NULL,
  `floors` int(10) NOT NULL,
  `description` varchar(200) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `estimate`
--

INSERT INTO `estimate` (`eid`, `uid`, `date`, `location`, `sqft`, `bedroom`, `bathroom`, `floors`, `description`, `file`) VALUES
(1, 2, '2024-10-21', 'Aluva', 1000, 2, 3, 2, 'A normal house', '../static/media/docu.png'),
(2, 2, '2024-10-21', 'Ekm', 5000, 5, 10, 3, 'Mini shopping mall', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(10) NOT NULL,
  `u_id` int(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `feedback` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `u_id`, `date`, `feedback`) VALUES
(4, 2, '2024-06-13', 'Good one'),
(5, 2, '2024-06-13', 'Valuable resource'),
(7, 2, '2024-07-20', 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `labour_reg`
--

CREATE TABLE `labour_reg` (
  `l_id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phonenumber` bigint(15) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `purpose` varchar(50) DEFAULT NULL,
  `rating` int(10) DEFAULT 0,
  `outof` int(10) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `labour_reg`
--

INSERT INTO `labour_reg` (`l_id`, `name`, `email`, `phonenumber`, `place`, `password`, `purpose`, `rating`, `outof`) VALUES
(1, 'carpenter', 'carpenter@gmail.com', 7736745599, 'Tcr', 'carpenter@gmaiL123', 'Carpender', 9, 15);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `lid` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `uname` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `utype` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`lid`, `uid`, `uname`, `password`, `utype`, `status`) VALUES
(22, 2, 'abi@gmail.com', 'abi@gmaiL123', 'users', 'Approved'),
(23, 1, 'carpenter@gmail.com', 'carpenter@gmaiL123', 'labours', 'Approved'),
(24, 0, 'admin', 'admin', 'admin', 'Approved'),
(25, 3, 'user@gmail.com', 'user@gmaiL123', 'users', 'Approved'),
(26, 1, 'db1@gmail.com', 'db1@gmaiL123', 'dboy', 'Approved'),
(27, NULL, NULL, NULL, NULL, 'Pending'),
(28, 2, 'newdb@gmail.co', 'newdb@gmaL123', 'dboy', 'Approved'),
(29, 3, 'fhx@gmail.com', 'fhx@gmaiL123', 'dboy', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `p_id` int(10) NOT NULL,
  `amount` float DEFAULT NULL,
  `date` date DEFAULT NULL,
  `br_id` int(10) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Succesfull'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`p_id`, `amount`, `date`, `br_id`, `status`) VALUES
(1, 114, '2024-06-12', 5, 'Succesfull'),
(2, 100, '2024-06-12', 3, 'Succesfull'),
(3, 1000, '2024-07-20', 7, 'Succesfull'),
(4, 10000, NULL, 1, 'Succesfull');

-- --------------------------------------------------------

--
-- Table structure for table `paymentprod`
--

CREATE TABLE `paymentprod` (
  `pp_id` int(10) NOT NULL,
  `amount` int(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `pbr_id` int(10) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'Succesfull'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymentprod`
--

INSERT INTO `paymentprod` (`pp_id`, `amount`, `date`, `pbr_id`, `status`) VALUES
(1, 4000, NULL, 2, 'Succesfull'),
(2, 7000, NULL, 3, 'Succesfull'),
(3, 0, NULL, 4, 'Succesfull');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(20) NOT NULL,
  `p_name` varchar(50) DEFAULT NULL,
  `p_qty` int(20) DEFAULT NULL,
  `p_desc` varchar(100) DEFAULT NULL,
  `p_img` varchar(200) DEFAULT NULL,
  `p_status` varchar(20) DEFAULT 'approved',
  `p_price` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_qty`, `p_desc`, `p_img`, `p_status`, `p_price`) VALUES
(18, 'second prod', 79, 'desc of p2', '../static/media/pexels-energepiccom-175039.jpg', 'approved', 1000),
(19, 'Quaryy', 1000, 'Material for construction', '../static/media/sngist.jpg', 'approved', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `prod_book_rq`
--

CREATE TABLE `prod_book_rq` (
  `pbr_id` int(10) NOT NULL,
  `date` date DEFAULT current_timestamp(),
  `u_id` int(10) DEFAULT NULL,
  `p_id` int(10) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `amount` int(10) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prod_book_rq`
--

INSERT INTO `prod_book_rq` (`pbr_id`, `date`, `u_id`, `p_id`, `status`, `amount`, `qty`) VALUES
(1, '2024-09-24', 2, 18, 'Delivered', 10000, 10),
(2, '2024-09-24', 2, 18, 'Delivered', 4000, 4),
(3, '2024-09-24', 3, 18, 'Delivered', 7000, 7),
(4, '2024-10-05', 2, 0, 'Paid', 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

CREATE TABLE `user_reg` (
  `u_id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `age` int(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `place` varchar(50) DEFAULT NULL,
  `phonenumber` bigint(15) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `purpose` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_reg`
--

INSERT INTO `user_reg` (`u_id`, `name`, `age`, `email`, `place`, `phonenumber`, `password`, `purpose`) VALUES
(2, 'Abi', 21, 'abi@gmail.com', 'TCr', 7736745588, 'abi@gmaiL123', 'Shifting'),
(3, 'user', 21, 'user@gmail.com', 'TCR', 7755224411, 'user@gmaiL123', 'New home construction');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_request`
--
ALTER TABLE `book_request`
  ADD PRIMARY KEY (`br_id`);

--
-- Indexes for table `dboy`
--
ALTER TABLE `dboy`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `estimate`
--
ALTER TABLE `estimate`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `labour_reg`
--
ALTER TABLE `labour_reg`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `paymentprod`
--
ALTER TABLE `paymentprod`
  ADD PRIMARY KEY (`pp_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `prod_book_rq`
--
ALTER TABLE `prod_book_rq`
  ADD PRIMARY KEY (`pbr_id`);

--
-- Indexes for table `user_reg`
--
ALTER TABLE `user_reg`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_request`
--
ALTER TABLE `book_request`
  MODIFY `br_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dboy`
--
ALTER TABLE `dboy`
  MODIFY `did` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `estimate`
--
ALTER TABLE `estimate`
  MODIFY `eid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `labour_reg`
--
ALTER TABLE `labour_reg`
  MODIFY `l_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `paymentprod`
--
ALTER TABLE `paymentprod`
  MODIFY `pp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `prod_book_rq`
--
ALTER TABLE `prod_book_rq`
  MODIFY `pbr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_reg`
--
ALTER TABLE `user_reg`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
