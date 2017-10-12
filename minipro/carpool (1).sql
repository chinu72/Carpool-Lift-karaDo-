-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2017 at 03:22 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carpool`
--

-- --------------------------------------------------------

--
-- Table structure for table `jointab`
--

CREATE TABLE `jointab` (
  `join_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `join_from` varchar(255) NOT NULL,
  `join_to` varchar(255) NOT NULL,
  `join_seats` int(11) NOT NULL DEFAULT '1',
  `join_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `offer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `offer_from` varchar(255) NOT NULL,
  `offer_to` varchar(255) NOT NULL,
  `offer_time` datetime NOT NULL,
  `offer_seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`offer_id`, `user_id`, `offer_from`, `offer_to`, `offer_time`, `offer_seats`) VALUES
(1, 1004, 'katraj', 'baner', '2017-10-04 08:00:00', 4),
(2, 1005, 'pimpri', 'katraj', '2017-10-04 12:01:00', 2),
(3, 1001, 'kataj', 'shivajinagar', '2017-10-05 09:00:00', 3),
(4, 1008, 'Katraj', 'swargate', '2017-10-05 12:30:00', 5),
(5, 1016, 'lohgaon', 'swargate', '2017-10-05 18:45:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rate_id` int(11) NOT NULL,
  `offerer_id` int(11) NOT NULL,
  `joiner_id` int(11) NOT NULL,
  `last_rate` decimal(3,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rate_id`, `offerer_id`, `joiner_id`, `last_rate`) VALUES
(2, 1001, 1002, '2.0'),
(3, 1001, 1002, '2.0'),
(4, 1001, 1002, '5.0'),
(5, 1005, 1002, '2.0'),
(6, 1005, 1001, '3.0');

--
-- Triggers `rating`
--
DELIMITER $$
CREATE TRIGGER `ratingtrigger` AFTER INSERT ON `rating` FOR EACH ROW begin
update users set users.user_rate=(select avg(last_rate) from rating where users.user_id=rating.offerer_id);
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_mob` bigint(11) NOT NULL,
  `user_psw` varchar(16) NOT NULL,
  `user_adhaar` varchar(20) NOT NULL,
  `user_dob` date NOT NULL,
  `user_gen` char(1) NOT NULL,
  `user_addr` varchar(255) NOT NULL,
  `user_vrc` varchar(255) DEFAULT NULL,
  `user_vname` varchar(255) DEFAULT NULL,
  `user_rate` decimal(3,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_mob`, `user_psw`, `user_adhaar`, `user_dob`, `user_gen`, `user_addr`, `user_vrc`, `user_vname`, `user_rate`) VALUES
(1001, 'stavan shah', 'stavan@gmail.com', 9797979797, 'catmat', '2222 3333 4444 5555', '2017-10-02', 'O', 'Mumbai', NULL, NULL, '3.0'),
(1002, 'shreyas bhaskarwar', 'shreyas@gmail.com', 9696969696, 'catchat', '3333 4444 5555 6666', '2017-10-03', 'M', 'Nagpur', NULL, NULL, NULL),
(1003, 'omkesh mitkari', 'omkesh@gmail.com', 9898989898, 'catsat', '1111 2222 3333 4444', '2017-10-01', 'M', 'Buldhana', NULL, NULL, NULL),
(1004, 'raj thakrey', 'raj@gmail.com', 7788556622, 'sadsad', '1111 5555 5555 6666', '1998-01-02', 'M', 'nagpur', NULL, NULL, NULL),
(1005, 'rohan', 'rohan@gmail.com', 9494949494, 'tomcat', '5555 6666 7777 8888', '1999-03-03', 'M', 'Nagpur', NULL, NULL, '2.5'),
(1008, 'chinmay shimpi', 'shimpichinmay@gmail.com', 9403192826, 'badbad', '1235 1235 1235', '1998-01-03', 'M', 'Nashik', NULL, NULL, NULL),
(1009, 'rishabh shetty', 'rishabh@gmail.com', 9090909090, 'powers', '6666 7777 8888 9999', '1998-02-21', 'M', 'pune', NULL, NULL, NULL),
(1016, 'Radha', 'radha@gmail.com', 9191919191, 'elephant', '2121 2121 2121 2121', '1997-05-06', 'F', 'mumbai', NULL, NULL, NULL),
(1019, 'arun jately', 'arun@gmail.com', 9595959595, 'warden', '5454 5454 5454 5454', '1998-02-23', 'M', 'Nashik', 'bmw', 'csa22143413', NULL),
(1020, 'jayesh', 'jayesh@gmail.com', 9393939393, 'tartar', '2323 2323 2323 2323', '1997-01-21', 'M', 'nagpur', 'wd21232', 'audi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vehi_name` varchar(255) NOT NULL,
  `vehi_rc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jointab`
--
ALTER TABLE `jointab`
  ADD PRIMARY KEY (`join_id`),
  ADD KEY `fk_join_user_id` (`user_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`offer_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rate_id`),
  ADD KEY `fk_offerer_id` (`offerer_id`),
  ADD KEY `fk_joiner_id` (`joiner_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehi_id`),
  ADD KEY `fk_vehiuser` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jointab`
--
ALTER TABLE `jointab`
  MODIFY `join_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1021;
--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehi_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `jointab`
--
ALTER TABLE `jointab`
  ADD CONSTRAINT `fk_join_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `fk_joiner_id` FOREIGN KEY (`joiner_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `fk_offerer_id` FOREIGN KEY (`offerer_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `fk_vehiuser` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
