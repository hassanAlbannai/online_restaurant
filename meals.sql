-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Mar 15, 2022 at 06:09 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meals`
--

-- --------------------------------------------------------

--
-- Table structure for table `meal`
--

CREATE TABLE `meal` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `price` decimal(10,4) UNSIGNED NOT NULL,
  `image` varchar(500) NOT NULL,
  `description` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meal`
--

INSERT INTO `meal` (`id`, `title`, `price`, `image`, `description`) VALUES
(1, 'Best Sandwich', '23.9000', 'meal1.png', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias dolore hic quaerat deserunt eum iusto architecto, officia impedit consequuntur earum voluptatum totam quo minima molestiae velit nesciunt voluptas praesentium est. Nam nesciunt ex earum inventore corrupti consequuntur molestias accusamus eaque, dignissimos exercitationem explicabo expedita adipisci dolor nisi! Blanditiis omnis, nobis earum non architecto sapiente tempora asperiores minus, hic, deleniti enim!'),
(2, 'Burger', '25.9000', 'meal2.png', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias dolore hic quaerat deserunt eum iusto architecto, officia impedit consequuntur earum voluptatum totam quo minima molestiae velit nesciunt voluptas praesentium est. Nam nesciunt ex earum inventore corrupti consequuntur molestias accusamus eaque, dignissimos exercitationem explicabo expedita adipisci dolor nisi! Blanditiis omnis, nobis earum non architecto sapiente tempora asperiores minus, hic, deleniti enim!'),
(3, 'Burger Meal', '27.5000', 'meal3.png', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias dolore hic quaerat deserunt eum iusto architecto, officia impedit consequuntur earum voluptatum totam quo minima molestiae velit nesciunt voluptas praesentium est. Nam nesciunt ex earum inventore corrupti consequuntur molestias accusamus eaque, dignissimos exercitationem explicabo expedita adipisci dolor nisi! Blanditiis omnis, nobis earum non architecto sapiente tempora asperiores minus, hic, deleniti enim!'),
(4, 'Best Deal Meal', '32.9000', 'meal4.png', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias dolore hic quaerat deserunt eum iusto architecto, officia impedit consequuntur earum voluptatum totam quo minima molestiae velit nesciunt voluptas praesentium est. Nam nesciunt ex earum inventore corrupti consequuntur molestias accusamus eaque, dignissimos exercitationem explicabo expedita adipisci dolor nisi! Blanditiis omnis, nobis earum non architecto sapiente tempora asperiores minus, hic, deleniti enim!'),
(5, 'Chicken Burger', '19.4000', 'meal5.png', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias dolore hic quaerat deserunt eum iusto architecto, officia impedit consequuntur earum voluptatum totam quo minima molestiae velit nesciunt voluptas praesentium est. Nam nesciunt ex earum inventore corrupti consequuntur molestias accusamus eaque, dignissimos exercitationem explicabo expedita adipisci dolor nisi! Blanditiis omnis, nobis earum non architecto sapiente tempora asperiores minus, hic, deleniti enim!'),
(6, 'Pizza', '28.5000', 'meal6.png', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias dolore hic quaerat deserunt eum iusto architecto, officia impedit consequuntur earum voluptatum totam quo minima molestiae velit nesciunt voluptas praesentium est. Nam nesciunt ex earum inventore corrupti consequuntur molestias accusamus eaque, dignissimos exercitationem explicabo expedita adipisci dolor nisi! Blanditiis omnis, nobis earum non architecto sapiente tempora asperiores minus, hic, deleniti enim!');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `reviewer_name` varchar(80) NOT NULL,
  `city` varchar(80) NOT NULL,
  `date` datetime NOT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL,
  `image` varchar(500) NOT NULL,
  `review` varchar(500) NOT NULL,
  `meal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `reviewer_name`, `city`, `date`, `rating`, `image`, `review`, `meal_id`) VALUES
(1, 'Omar', 'Dhahran', '2020-02-08 21:43:32', 5, 'meal1.png', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias dolore hic quaerat deserunt eum iusto architecto, officia impedit consequuntur earum voluptatum totam quo minima molestiae velit nesciunt voluptas praesentium est. Nam nesciunt ex earum inventore corrupti consequuntur molestias accusamus eaque, dignissimos exercitationem explicabo expedita adipisci dolor nisi! Blanditiis omnis, nobis earum non architecto sapiente tempora asperiores minus, hic, deleniti enim!', 1),
(2, 'Abdullah', 'Khobar', '2020-01-08 21:46:57', 5, 'man-eating-burger.png', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias dolore hic quaerat deserunt eum iusto architecto, officia impedit consequuntur earum voluptatum totam quo minima molestiae velit nesciunt voluptas praesentium est. Nam nesciunt ex earum inventore corrupti consequuntur molestias accusamus eaque, dignissimos exercitationem explicabo expedita adipisci dolor nisi! Blanditiis omnis, nobis earum non architecto sapiente tempora asperiores minus, hic, deleniti enim!', 2),
(3, 'Ali', 'Jubail', '2021-02-08 21:46:57', 5, 'meal3.png', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias dolore hic quaerat deserunt eum iusto architecto, officia impedit consequuntur earum voluptatum totam quo minima molestiae velit nesciunt voluptas praesentium est. Nam nesciunt ex earum inventore corrupti consequuntur molestias accusamus eaque, dignissimos exercitationem explicabo expedita adipisci dolor nisi! Blanditiis omnis, nobis earum non architecto sapiente tempora asperiores minus, hic, deleniti enim!', 3),
(5, 'Khalid', 'Riyadh', '2021-03-08 21:46:57', 5, 'man-eating-burger.png', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias dolore hic quaerat deserunt eum iusto architecto, officia impedit consequuntur earum voluptatum totam quo minima molestiae velit nesciunt voluptas praesentium est. Nam nesciunt ex earum inventore corrupti consequuntur molestias accusamus eaque, dignissimos exercitationem explicabo expedita adipisci dolor nisi! Blanditiis omnis, nobis earum non architecto sapiente tempora asperiores minus, hic, deleniti enim!', 5),
(6, 'Abu Sami', 'Makkah', '2020-12-28 21:46:57', 5, 'meal6.png', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias dolore hic quaerat deserunt eum iusto architecto, officia impedit consequuntur earum voluptatum totam quo minima molestiae velit nesciunt voluptas praesentium est. Nam nesciunt ex earum inventore corrupti consequuntur molestias accusamus eaque, dignissimos exercitationem explicabo expedita adipisci dolor nisi! Blanditiis omnis, nobis earum non architecto sapiente tempora asperiores minus, hic, deleniti enim!', 6),
(55, 'hassan', 'qatif', '2021-04-23 00:00:00', 3, 'meal3.png', 'good food', 2),
(58, 'hany eid', 'dammam', '2021-04-23 00:00:00', 4, 'meal3.png', 'it is good!', 2),
(59, 'jassim ali', 'qatif', '2021-04-23 00:00:00', 5, 'meal3.png', 'great deal', 2),
(73, 'hassan', 'dammam', '2021-04-24 00:00:00', 4, 'meal4.png', 'good', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meal`
--
ALTER TABLE `meal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mid` (`meal_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meal`
--
ALTER TABLE `meal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `mid` FOREIGN KEY (`meal_id`) REFERENCES `meal` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
