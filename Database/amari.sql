-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 13, 2021 at 10:41 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amari`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Date_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `firstname`, `lastname`, `email`, `password`, `Date_time`) VALUES
(5, 'Buhwa', 'Ezra', 'ezybuhwa4@gmail.com', '$2y$10$tBY3eXeAjsMNhZsEANa6/e4YAh.ONKiRhsDx8eyA.Gs8QjthyAdZO', ''),
(7, 'Ezra', 'Jiji', 'ezybuhwa@gmail.com', '$2y$10$MUxjLHat6RhQwsAqCtzHKuThmA66VfUdRui61w6qzMi/yAVdcRxly', ''),
(8, 'Buhwa', 'Erasmus', 'ezybuhwa2@gmail.com', '$2y$10$tBY3eXeAjsMNhZsEANa6/e4YAh.ONKiRhsDx8eyA.Gs8QjthyAdZO', ''),
(16, 'Erasmus Ezra', 'Buhwa', 'ezybuhwa7@gmail.com', '$2y$10$4gr7iyP1Pl93H0bkmhsWlO2RTKNfzLc/tiJTmgYx.5mohwg9s8EH6', '2021-06-04 23:17:46');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(255) NOT NULL,
  `userID` int(255) NOT NULL,
  `ProductID` int(255) NOT NULL,
  `Quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `userID`, `ProductID`, `Quantity`) VALUES
(11, 3, 47, 1),
(16, 4, 47, 1),
(19, 22, 47, 1),
(23, 36, 47, 1),
(25, 22, 50, 1),
(26, 36, 50, 1),
(27, 36, 49, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryid` int(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `category`) VALUES
(1, 'Decorating Accessories'),
(2, 'Edible Supplies '),
(3, 'Packaging'),
(4, 'Bakeware'),
(5, 'Inspiration');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Message` varchar(10000) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `FirstName`, `Email`, `Message`, `status`) VALUES
(1, 'Ezra', 'ezybuhwa@gmail.com', 'Hello, I would like to say you guys give good service.lfkqmewlkmfhbrjfk4kjf5lfmklmdqkdmj34n4fj4rfnreemejkfnrkfjrkfnrehfkerjfjebhfbyu4kwejfejfkrbfhyb4fyjbqekhfberfjbkrefuy4rebkfjbenfbeyfbekfjejfby34f deknfjrlfjr4f fk4jfn4fjk4nf fqjfnerkjf4f 4fjn4fkj4fnkjf4 f5fn5fjekjf kfjrfn4h5jnfkjf krjfrnfyffkjyk fjhrfbrfkjfy4 fbfewyfkwjhfbfh4f jhfbyewjwfbj', 'Read');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userID` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `Phone_Number` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userID`, `firstname`, `lastname`, `Phone_Number`, `payment_method`, `Location`, `total`, `created`) VALUES
(61, 8, 'Buhwa', 'Erasmus', '12345', 'Mobile Money', 'Kasubi', '42000', '10:02:03pm 04-06-2021'),
(62, 8, 'Buhwa', 'Erasmus', '12345', 'Mobile Money', 'Kasubi', '42000', '10:05:13pm 04-06-2021'),
(63, 36, 'Twonjex', 'Ezra', '12345', 'Cash on delivery', 'Kasubi', '60000', '12:01:36pm 13-06-2021');

-- --------------------------------------------------------

--
-- Table structure for table `orders_fulfilled`
--

CREATE TABLE `orders_fulfilled` (
  `id` int(11) NOT NULL,
  `Order_Number` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone_Number` varchar(255) NOT NULL,
  `Product` varchar(255) NOT NULL,
  `Quantity` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_contents`
--

CREATE TABLE `order_contents` (
  `id` int(255) NOT NULL,
  `userID` int(255) NOT NULL,
  `orderID` int(255) NOT NULL,
  `ProductID` int(255) NOT NULL,
  `Product` varchar(255) NOT NULL,
  `Quantity` int(255) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Product_Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_contents`
--

INSERT INTO `order_contents` (`id`, `userID`, `orderID`, `ProductID`, `Product`, `Quantity`, `Price`, `Product_Image`) VALUES
(196, 36, 55, 52, 'Floral Stencil', 2, '40000', 'Stencil 6.jpg'),
(197, 36, 55, 53, 'Stencil', 1, '50000', 'Stencil 7.jpg'),
(198, 36, 55, 54, 'Floral Stencil', 1, '20000', 'Stencil5.jpg'),
(199, 36, 56, 53, 'Stencil', 1, '50000', 'Stencil 7.jpg'),
(200, 36, 56, 54, 'Floral Stencil', 2, '20000', 'Stencil5.jpg'),
(201, 36, 57, 46, 'Floral Stencil', 3, '40000', '8cb8ebda5fc2234c2f8a001fb0f3ed08.jpg'),
(202, 36, 58, 46, 'Floral Stencil', 3, '40000', '8cb8ebda5fc2234c2f8a001fb0f3ed08.jpg'),
(203, 36, 59, 46, 'Floral Stencil', 2, '40000', '8cb8ebda5fc2234c2f8a001fb0f3ed08.jpg'),
(204, 8, 60, 46, 'Floral Stencil', 1, '40000', '8cb8ebda5fc2234c2f8a001fb0f3ed08.jpg'),
(205, 8, 60, 47, 'Floral Stencil2', 1, '2000', '8cb8ebda5fc2234c2f8a001fb0f3ed08.jpg'),
(206, 8, 61, 46, 'Floral Stencil', 1, '40000', '8cb8ebda5fc2234c2f8a001fb0f3ed08.jpg'),
(207, 8, 61, 47, 'Floral Stencil2', 1, '2000', '8cb8ebda5fc2234c2f8a001fb0f3ed08.jpg'),
(208, 8, 62, 46, 'Floral Stencil', 1, '40000', '8cb8ebda5fc2234c2f8a001fb0f3ed08.jpg'),
(209, 8, 62, 47, 'Floral Stencil2', 4, '2000', '8cb8ebda5fc2234c2f8a001fb0f3ed08.jpg'),
(210, 36, 63, 46, 'Floral Stencil', 2, '30000', '8cb8ebda5fc2234c2f8a001fb0f3ed08.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `popular`
--

CREATE TABLE `popular` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `popular`
--

INSERT INTO `popular` (`id`, `categoryid`, `category`, `category_image`) VALUES
(1, 3, 'Packaging', 'pack.jpg'),
(2, 2, 'EDIBLE DECORATIONS', 'coloringscat.jpg'),
(3, 4, 'Bakeware', 's-l1600.jpg'),
(4, 4, 'Bakeware', 's-l1600.jpg'),
(5, 4, 'Bakeware', 's-l1600.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(255) NOT NULL,
  `categoryid` int(255) NOT NULL,
  `Product` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `categoryid`, `Product`) VALUES
(1, 1, 'Stencils'),
(2, 2, 'Color'),
(3, 2, 'Sprinkles'),
(4, 3, 'Rectangle Pans'),
(5, 3, 'Dummies'),
(6, 1, 'Molds'),
(7, 1, 'Cutters'),
(8, 3, 'Packaging'),
(9, 4, 'Cake Board'),
(10, 4, 'Cake Box');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` int(11) NOT NULL,
  `categoryid` int(255) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Product` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Product_Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `categoryid`, `ProductID`, `Product`, `Price`, `Description`, `Product_Image`) VALUES
(52, 1, 1, 'Floral Stencil', '40000', 'Decorate.', 'Stencil 6.jpg'),
(53, 1, 1, 'Stencil', '50000', 'Nice floral stencil', 'Stencil 7.jpg'),
(54, 1, 1, 'Floral Stencil', '20000', 'WOOOHOO', 'Stencil5.jpg'),
(56, 2, 2, 'Orange Emulsion', '14500', 'Decorate.', 'IMG_3953.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `service_area`
--

CREATE TABLE `service_area` (
  `id` int(11) NOT NULL,
  `Location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_area`
--

INSERT INTO `service_area` (`id`, `Location`) VALUES
(1, 'Kikoni'),
(2, 'Entebbe'),
(3, 'Nansana');

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE `slideshow` (
  `id` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`id`, `image`, `Description`) VALUES
(2, '1.jpg', 'Decorate your cake.'),
(3, '51H8kc3jiPL.jpg', 'Nice floral stencils'),
(5, '8cb8ebda5fc2234c2f8a001fb0f3ed08.jpg', 'WOOOHOO');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Phone_Number` varchar(255) NOT NULL,
  `Date_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `password`, `Location`, `Phone_Number`, `Date_time`) VALUES
(3, 'Erasmus Ezra', 'Buhwa', '$2y$10$CJnSq6zdu5wtaq0SdGNG4u9AfMQR33rMkVXiVDsPuiLP3E37upQz6', 'Kikoni', '07535443062', '2021-03-19 18:11:45'),
(36, 'Twonjex', 'Ezra', '$2y$10$DsvEIForcsZ1x9Dk3KXJJ.GDCbc7t4rcw9M7Afp0lIJ8wt2ugAUcy', 'Kasubi', '12345', '2021-03-20 22:41:43'),
(37, 'Buhwa', 'Ezra', '$2y$10$yNIr0EBH4mms0s5u4dCL1Ok6Su/Ox7EoREW.vd5DtQEVYeINpeGZm', 'Kisubi', '123456', '2021-04-13 12:28:46');

-- --------------------------------------------------------

--
-- Table structure for table `yo`
--

CREATE TABLE `yo` (
  `id` int(255) NOT NULL,
  `ok` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `yo`
--

INSERT INTO `yo` (`id`, `ok`) VALUES
(1, 'date(Y-m-d)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `orders_fulfilled`
--
ALTER TABLE `orders_fulfilled`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_contents`
--
ALTER TABLE `order_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `popular`
--
ALTER TABLE `popular`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_area`
--
ALTER TABLE `service_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yo`
--
ALTER TABLE `yo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `orders_fulfilled`
--
ALTER TABLE `orders_fulfilled`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_contents`
--
ALTER TABLE `order_contents`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `popular`
--
ALTER TABLE `popular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `service_area`
--
ALTER TABLE `service_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `yo`
--
ALTER TABLE `yo`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
