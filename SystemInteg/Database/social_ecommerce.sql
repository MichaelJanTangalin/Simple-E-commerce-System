-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2022 at 06:26 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_history`
--

CREATE TABLE `account_history` (
  `User_ID` int(11) NOT NULL COMMENT 'Auto generated ID	',
  `Register_Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_history`
--

INSERT INTO `account_history` (`User_ID`, `Register_Date`) VALUES
(33, '2022-03-19 14:49:18'),
(35, '2022-03-19 14:49:18'),
(11, '2022-03-19 14:49:18'),
(14, '2022-03-19 14:49:18'),
(18, '2022-03-19 14:49:18'),
(31, '2022-03-19 14:49:18'),
(30, '2022-03-19 14:49:18'),
(16, '2022-03-19 14:49:18'),
(36, '2022-03-19 14:49:18'),
(12, '2022-03-19 14:49:18'),
(9, '2022-03-19 14:49:18'),
(32, '2022-03-19 14:49:18'),
(13, '2022-03-19 14:49:18'),
(15, '2022-03-19 14:49:18'),
(28, '2022-03-19 14:49:18'),
(33, '2022-03-19 14:52:02'),
(35, '2022-03-19 14:52:02'),
(11, '2022-03-19 14:52:02'),
(14, '2022-03-19 14:52:02'),
(18, '2022-03-19 14:52:02'),
(31, '2022-03-19 14:52:02'),
(30, '2022-03-19 14:52:02'),
(16, '2022-03-19 14:52:02'),
(36, '2022-03-19 14:52:02'),
(12, '2022-03-19 14:52:02'),
(9, '2022-03-19 14:52:02'),
(37, '2022-03-19 14:52:02'),
(32, '2022-03-19 14:52:02'),
(13, '2022-03-19 14:52:02'),
(15, '2022-03-19 14:52:02'),
(28, '2022-03-19 14:52:02'),
(33, '2022-03-27 13:51:13'),
(35, '2022-03-27 13:51:13'),
(11, '2022-03-27 13:51:13'),
(14, '2022-03-27 13:51:13'),
(18, '2022-03-27 13:51:13'),
(31, '2022-03-27 13:51:13'),
(30, '2022-03-27 13:51:13'),
(16, '2022-03-27 13:51:13'),
(36, '2022-03-27 13:51:13'),
(12, '2022-03-27 13:51:13'),
(9, '2022-03-27 13:51:13'),
(37, '2022-03-27 13:51:13'),
(38, '2022-03-27 13:51:13'),
(32, '2022-03-27 13:51:13'),
(13, '2022-03-27 13:51:13'),
(15, '2022-03-27 13:51:13'),
(28, '2022-03-27 13:51:13'),
(33, '2022-04-27 02:02:01'),
(35, '2022-04-27 02:02:01'),
(11, '2022-04-27 02:02:01'),
(14, '2022-04-27 02:02:01'),
(18, '2022-04-27 02:02:01'),
(31, '2022-04-27 02:02:01'),
(30, '2022-04-27 02:02:01'),
(16, '2022-04-27 02:02:01'),
(36, '2022-04-27 02:02:01'),
(12, '2022-04-27 02:02:01'),
(9, '2022-04-27 02:02:01'),
(37, '2022-04-27 02:02:01'),
(38, '2022-04-27 02:02:01'),
(32, '2022-04-27 02:02:01'),
(13, '2022-04-27 02:02:01'),
(15, '2022-04-27 02:02:01'),
(39, '2022-04-27 02:02:01'),
(28, '2022-04-27 02:02:01');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_ID` int(11) NOT NULL COMMENT 'Auto generated ID',
  `category_name` text NOT NULL COMMENT 'Product category',
  `category_type` text NOT NULL COMMENT 'Product Type'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_ID`, `category_name`, `category_type`) VALUES
(17, 'Laptop', 'Digital Technology'),
(18, 'Tablets', 'Digital Technology'),
(22, 'Cellphone', 'Digital Technology'),
(26, 'Output Devices', 'Digital Hardware');

-- --------------------------------------------------------

--
-- Table structure for table `dispatch`
--

CREATE TABLE `dispatch` (
  `Delivery_Code` int(11) NOT NULL COMMENT 'Dispatchment Code for delivery',
  `Transaction_ID` int(11) NOT NULL COMMENT 'Transaction Number ID	',
  `User_ID` int(11) NOT NULL COMMENT '	Auto generated ID of Customer User',
  `Status` text NOT NULL COMMENT 'Delivery Status',
  `Delivery_Date` date NOT NULL DEFAULT current_timestamp() COMMENT 'Delivery Date'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dispatch`
--

INSERT INTO `dispatch` (`Delivery_Code`, `Transaction_ID`, `User_ID`, `Status`, `Delivery_Date`) VALUES
(7, 23, 31, 'Delivered', '2022-04-12'),
(8, 24, 32, 'Delivered', '2022-04-12'),
(9, 25, 14, 'Delivered', '2022-04-12'),
(10, 27, 32, 'Delivered', '2022-04-12'),
(11, 26, 14, 'Delivered', '2022-04-12'),
(12, 32, 32, 'Delivered', '2022-04-12'),
(13, 34, 32, 'Pending Order', '2022-04-12');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `PO_ID` int(11) NOT NULL COMMENT 'Purchase Order ID',
  `User_ID` int(11) NOT NULL COMMENT 'Auto generated ID of Customer User',
  `product_ID` int(11) NOT NULL COMMENT 'Ordered Product',
  `quantity` int(40) NOT NULL COMMENT 'Product Quantity'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`PO_ID`, `User_ID`, `product_ID`, `quantity`) VALUES
(268, 14, 22, 1),
(269, 37, 29, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Transaction_ID` int(11) NOT NULL COMMENT 'Transaction Number ID',
  `User_ID` int(11) NOT NULL COMMENT 'Auto generated ID of Customer User',
  `Total_Bills` double NOT NULL COMMENT 'Total bills of the user',
  `Status` text NOT NULL COMMENT 'status of the Transaction',
  `Date` date NOT NULL DEFAULT current_timestamp() COMMENT 'Order Date'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Transaction_ID`, `User_ID`, `Total_Bills`, `Status`, `Date`) VALUES
(23, 31, 21644, 'Delivered', '2022-04-12'),
(24, 32, 16303, 'Delivered', '2022-04-12'),
(25, 14, 21644, 'Delivered', '2022-04-12'),
(26, 14, 94882, 'Delivered', '2022-04-12'),
(27, 32, 3995, 'Delivered', '2022-04-12'),
(29, 35, 8590, 'Pending Order', '2022-04-12'),
(30, 31, 1000, 'Pending Order', '2022-04-12'),
(32, 32, 4595, 'Delivered', '2022-04-12'),
(34, 32, 1999, 'Being Delivered', '2022-04-12');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_ID` int(11) NOT NULL COMMENT 'Auto generated ID',
  `category_ID` int(11) NOT NULL COMMENT 'Product category',
  `product_name` text NOT NULL COMMENT 'Name of the Product',
  `product_price` double NOT NULL COMMENT 'Price of the product',
  `productDesc` text NOT NULL COMMENT 'Description of a Product',
  `product_image` varchar(100) NOT NULL COMMENT 'Product Image'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_ID`, `category_ID`, `product_name`, `product_price`, `productDesc`, `product_image`) VALUES
(22, 22, 'Samsung Galaxy Edge A50', 14650, 'Brand New', 'product4.png'),
(24, 26, 'Sony Xperia G3 69', 1000, 'This Product is Old but GOLD!', 'product2.png'),
(26, 18, 'Sony Xperia Z4', 45950, 'Old but gold na new', 'product3.png'),
(29, 17, 'Apple MacBook Pro 69', 1799, 'Brand New', 'product1.png'),
(30, 22, 'POCO X3 GT', 3995, 'BRAND NEW!!', 'product5.png'),
(31, 22, 'POCO X3 PRO', 1795, '8GB RAM & 256GB Storage', 'POCO X3 PRO.png'),
(35, 17, 'ROG Flow X13', 3659, 'Brand New', 'ROG.png'),
(40, 17, 'Predator 17', 6250, 'Brand New', 'acer-laptop-png-11552856490bt40xqqayy.png'),
(43, 17, 'Predator Helios', 4595, 'Brand New', 'predator-helios-500-2_ztfm.png'),
(44, 18, 'Samsung Galaxy Tab S7', 4595, '2019 Limited Edition', 'Anti-Slip-TPU-Case-for-Samsung-Galaxy-S7-Plus-Transparent-22102020-01-p.jpg'),
(45, 26, 'Speakers', 1999, 'Brand New', 'speakers.jpg'),
(46, 22, 'Redmi 9 Power', 4595, '48MP Quad Camera', 'redmi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `seller_admin`
--

CREATE TABLE `seller_admin` (
  `User_ID` int(11) NOT NULL COMMENT 'Auto\r\ngenerated ID',
  `product_ID` int(11) NOT NULL COMMENT 'Auto Generated ID',
  `fullname` text NOT NULL COMMENT 'Full Name of\r\nthe User',
  `email` varchar(255) NOT NULL COMMENT 'Any email IDs',
  `password` varchar(255) NOT NULL COMMENT 'Login\r\nPassword of\r\nthe User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_customer`
--

CREATE TABLE `user_customer` (
  `User_ID` int(11) NOT NULL COMMENT 'Auto generated ID',
  `fullname` text NOT NULL COMMENT 'Full Name of The User',
  `email` varchar(255) NOT NULL COMMENT 'Any email address',
  `password` varchar(255) NOT NULL COMMENT 'Login Password of the User',
  `address` varchar(255) NOT NULL COMMENT 'address of the User',
  `contact` varchar(11) NOT NULL COMMENT 'Mobile Number of the User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_customer`
--

INSERT INTO `user_customer` (`User_ID`, `fullname`, `email`, `password`, `address`, `contact`) VALUES
(9, 'Michael', 'kyoya@localhost.com', '$2y$10$u2WbV0.gbWSSyxiiqHIsS.EWYlXTv9RHMlrB0B3IH0./6fYxm1QXq', '1301 Riverside Street', '09955908362'),
(11, 'Michael Jan Rocreo Tangalin', 'chonatangalin9@gmail.com', '$2y$10$YQSGoFKYze.zwUk5Hab0Bu7ebG0I2a7zqGNrE6J67Hs67zStWKpfy', '1301 Riverside Street', '09658423811'),
(12, 'Kyoya Tategami', 'Kyoya32@localhost.com', '$2y$10$tmqIdQc3z/nMXvStJTvuvuk4zgQdh9groV8yTpwXXo1ecl1IzCMXa', '32160', '09568398445'),
(13, 'SATO', 'mjrtangalin@neu.edu.ph', '$2y$10$Z41KA9NPg1VJ5.c7t4YdHO/XKKPdVpIQA7UxpAn/9eS2RU42ArNGC', '1301 Street College', '09658421425'),
(14, 'Dave Mendoza', 'DaveM@localhost.com', '$2y$10$cntSnEEGkx1Pya8bxU41u.hVTcKq03iNxjFRFsyaUrKGzeO3htJv.', '1307 Riverside Bagumbayan Rizal', '09398508336'),
(15, 'SATO', 'mjt@yahoo.com', '$2y$10$OjP6DvJI6JAsaQYsljnzx.X8mu4oMeMInD6Zi2GJR3HLt2Kg3cAu.', '1301 Street College', '09398508336'),
(16, 'Juan Dela Cruz', 'Juanito@gmail.com', '$2y$10$LAEmqiTUTJXaGFaiOb/nYuItBdX5zpFmhKg9H3OfLxiSxZmfsBCXy', '1395 Commonwealth Street', '09938503364'),
(18, 'DJ KHALID', 'DJK20@localhost.net', '$2y$10$bswOh1ISc/I8vQY.zFYu6.KkV.EWbk7YEjQ3MhH/Y3wbk8MLKflZS', '1301 Saint Jimmy Street', '09568398445'),
(28, 'TOSAN', 'ts@localhost.com', '$2y$10$cexybW7MKKrIsIVOGANdlemhbGDgEYdUkYzaiTj8XtpDwAZKxOkJy', '1301 Street College', '09658423811'),
(30, 'Harry Potter', 'HP_2000@gmail.com', '$2y$10$UKuX4Y/LowzJPE.HTzom3.O4l7fc5TKvjygYra89VbNUNVzZ1zHAK', 'England 3, 2000', '09598221101'),
(31, 'Blue Raine Coronel', 'FBI_OPENUP@gmail.com', '$2y$10$OEfeLuAxC6XDhmpbeyk5zu7Sd1CqRHgBU8DFXnGbzDpx0fiI4rUPW', 'England 3, 2000', '09267123838'),
(32, 'Michael Jan Tangalin', 'michael.tangalin@neu.edu.ph', '$2y$10$B3alTLMGD/rZdsm/5.q/Xuir8.LyXUc2.PTbETJ5RzlnvE/WirxJS', '1301 Street College', '09955908362'),
(33, 'admin', 'admin@localhost.com', '$2y$10$ESu8IXqTyfw1GZK5HUTbdelfDmWny9LchNJHNwMfsdYxdvzLFGfG6', '671 Lincoln Avenue in Winnetka, Illinois.', '09658421425'),
(35, 'Kakashi Hatake', 'chidori@localhost.com', '$2y$10$ODMV5RgCCosGrzGm2Y63WeZiTjJvBuvW8EBG6UMVTl73F7INM05US', '16 Konoha Village QC', '09955908362'),
(36, 'Ken Masters', 'KM@localhost.com', '$2y$10$NbWFt4j5rrHANg9kBOblb.mh9EZQcetfdiMkzAH5wDc6PYqS7NvXG', '150 USA CA Street', '09267123838'),
(37, 'Undertaker', 'lifetillYou@localhost.com', '$2y$10$d0rkyBD130dBsRwoMa0Yp.GrkKKvtbna9z6g5nWrjobD0Qwiv.Ace', 'WWE 0568 CA', '09658421425'),
(38, 'Darryle Tala', 'ManyakM@localhost.com', '$2y$10$WEbxZY/qLpKwjh4oruKGc.HesgvYVkCmR3dDM9MTv1FZLkFF2axXq', 'England 3, 2000', '09398508336'),
(39, 'Naruto Uzumaki', 'NarutoS32@gmail.com', '$2y$10$Il3zV0b8/gzXDKZjSrxKsuFFBNBehXaEPmmc5hD3vro2CNUoVV8cK', 'Konoha Village 62', '09658423811');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_history`
--
ALTER TABLE `account_history`
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_ID`);

--
-- Indexes for table `dispatch`
--
ALTER TABLE `dispatch`
  ADD PRIMARY KEY (`Delivery_Code`),
  ADD KEY `Transaction_ID` (`Transaction_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`PO_ID`),
  ADD KEY `product_ID` (`product_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Transaction_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_ID`),
  ADD KEY `category_ID` (`category_ID`);

--
-- Indexes for table `seller_admin`
--
ALTER TABLE `seller_admin`
  ADD PRIMARY KEY (`User_ID`),
  ADD KEY `product_ID` (`product_ID`);

--
-- Indexes for table `user_customer`
--
ALTER TABLE `user_customer`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto generated ID', AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `dispatch`
--
ALTER TABLE `dispatch`
  MODIFY `Delivery_Code` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Dispatchment Code for delivery', AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `PO_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Purchase Order ID', AUTO_INCREMENT=281;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `Transaction_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Transaction Number ID', AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto generated ID', AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user_customer`
--
ALTER TABLE `user_customer`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto generated ID', AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_history`
--
ALTER TABLE `account_history`
  ADD CONSTRAINT `account_history_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user_customer` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dispatch`
--
ALTER TABLE `dispatch`
  ADD CONSTRAINT `dispatch_ibfk_1` FOREIGN KEY (`Transaction_ID`) REFERENCES `payment` (`Transaction_ID`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`product_ID`) REFERENCES `products` (`product_ID`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `user_customer` (`User_ID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_ID`) REFERENCES `categories` (`category_ID`);

--
-- Constraints for table `seller_admin`
--
ALTER TABLE `seller_admin`
  ADD CONSTRAINT `seller_admin_ibfk_1` FOREIGN KEY (`product_ID`) REFERENCES `products` (`product_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
