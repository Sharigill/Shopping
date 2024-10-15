-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2024 at 05:59 PM
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
-- Database: `ecommerce`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getcat` (IN `cid` INT)   SELECT * FROM categories WHERE cat_id=cid$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'admin', 'f925916e2754e5e03f75dd58a5733251', '2017-01-24 16:21:18', '21-06-2018 08:27:55 PM');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `Name` varchar(225) NOT NULL,
  `description` varchar(200) NOT NULL,
  `image` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `Name`, `description`, `image`) VALUES
(7, ' stationery', 'multiple catogery of statory you can use easily', 'istockphoto-588238694-612x612.jpg'),
(8, 'Gift Articles', 'best offers of Gift Articles is 80% off', 'images (8).jpeg'),
(9, 'Greeting Carts', 'multiple catogery of Greeting Carts', 'images (9).jpeg'),
(10, 'dolls', 'latest Dolls Avaliable For Cheap And Reliable Price', 'images (10).jpeg'),
(11, 'Hand Bags', 'multiple catogery of Hands Bags For Girls ', 'images (11).jpeg'),
(12, 'wallet', 'Mens Wallet latest design for 10% off Sale', 'images (12).jpeg'),
(13, 'Beauty Products', 'Latest Products And Brands Are Available for Beauty Catogery ', '271537201bfd535.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `paymentMethod` varchar(50) DEFAULT NULL,
  `orderStatus` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `productId`, `quantity`, `orderDate`, `paymentMethod`, `orderStatus`) VALUES
(1, 1, '3', 1, '2017-03-07 19:32:57', 'COD', NULL),
(3, 1, '4', 1, '2017-03-10 19:43:04', 'Debit / Credit card', 'Delivered'),
(4, 1, '17', 1, '2017-03-08 16:14:17', 'COD', 'in Process'),
(5, 1, '3', 1, '2017-03-08 19:21:38', 'COD', NULL),
(6, 1, '4', 1, '2017-03-08 19:21:38', 'COD', NULL),
(7, 4, '15', 1, '2024-10-04 11:47:25', 'Internet Banking', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orderss`
--

CREATE TABLE `orderss` (
  `id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `fnam` varchar(255) NOT NULL,
  `lnam` varchar(255) NOT NULL,
  `uemaill` varchar(255) NOT NULL,
  `tel` varchar(13) NOT NULL,
  `comp` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `apart` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postal` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `order_id` varchar(1100) NOT NULL,
  `uid` int(11) NOT NULL,
  `prrid` varchar(11) NOT NULL,
  `pnam` varchar(225) NOT NULL,
  `ppric` int(11) NOT NULL,
  `pqt` int(11) NOT NULL,
  `order_at` date NOT NULL DEFAULT current_timestamp(),
  `Statement_pr` varchar(1100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderss`
--

INSERT INTO `orderss` (`id`, `u_name`, `fnam`, `lnam`, `uemaill`, `tel`, `comp`, `address`, `apart`, `city`, `postal`, `country`, `payment`, `order_id`, `uid`, `prrid`, `pnam`, `ppric`, `pqt`, `order_at`, `Statement_pr`) VALUES
(496, 'sufyaan', 'sufyaan', 'su', 'ali@gmail.com', '33443344332', '33443344332', 'cash', 'yio', 'sindh', '342345', '6', 'Card', '477713', 4, 'SR00004', 'Two flaps double sided Both sides of the pencil box have a large capacity as the school stationary organizer Pencil Box is composed of sturdy, premium latex material', 11, 1, '2024-10-06', 'Delivered'),
(497, 'sufyaan', 'sufyaan', 'su', 'ali@gmail.com', '33443344332', '33443344332', 'cash', 'yio', 'sindh', '342345', '6', 'Online', '670597', 4, 'SR00003', 'The Best Stationery in Pakistan - ORO School & Office Stationery', 223, 1, '2024-10-06', 'Cancelled'),
(498, 'sufyaan', 'sufyaan', 'su', 'ali@gmail.com', '33443344332', '33443344332', 'cash', 'yio', 'sindh', '342345', '6', 'Online', '197781', 4, 'SR00001', 'CES 2024: HP\'s latest portfolio includes Windows 11-powered HP Spectre360', 76, 1, '2024-10-06', 'pending/Processing'),
(499, 'sufyaan', 'sufyaan', 'su', 'ali@gmail.com', '33443344332', '33443344332', 'cash', 'yio', 'sindh', '342345', '6', 'cash', '233744', 4, 'SR00002', 'Iigen Melody Children\'S Gift Stationery Gift Bag Creative Student Stationery Blind Box Neutral Pen Pencil Ruler Eraser 5pcs Set', 1290, 1, '2024-10-06', 'pending/Processing'),
(500, 'sufyaan', 'sufyaan', 'su', 'ali@gmail.com', '33443344332', '33443344332', 'cash', 'yio', 'sindh', '342345', '6', 'Online', '968973', 4, 'SR00003', 'The Best Stationery in Pakistan - ORO School & Office Stationery', 223, 1, '2024-10-07', 'pending/Processing'),
(501, 'sufyaan', 'ali', 'khan', 'ali@gmail.com', '33443344332', '33443344332', 'saddar karachi bunsroad street #2 building Name : zohra-manzil', 'y12 5th floor', 'sindh', '342345', '6', 'cash', '833578', 4, 'SR00003', 'The Best Stationery in Pakistan - ORO School & Office Stationery', 223, 6, '2024-10-07', 'pending/Processing'),
(502, 'sufyaan', 'ali', 'khan', 'ali@gmail.com', '33443344332', '33443344332', 'saddar karachi bunsroad street #2 building Name : zohra-manzil', 'y12 5th floor', 'sindh', '342345', '6', 'cash', '833578', 4, 'SR00005', 'Islamic Gifts, Mini Quran Tasbih Gift Set, Wedding Favors, Islamic Party Favors, Muslim Wedding Gift, Islamic Set, Eid Gift Box, Nikkah Gift - Etsy', 133, 17, '2024-10-07', 'pending/Processing'),
(503, 'sufyaan', 'ali', 'khan', 'ali@gmail.com', '33443344332', '33443344332', 'saddar karachi bunsroad street #2 building Name : zohra-manzil', 'y12 5th floor', 'sindh', '342345', '6', 'cash', '833578', 4, 'SR00016', 'Shop Beauty Care Products for women (Dark Spot Serum, Dual-Foundation, Eye-Gel) in Pakistan From Imported Brand (WBM) With 100% Genuine products, Cash', 2384, 8, '2024-10-07', 'pending/Processing'),
(504, 'sufyaan', 'ahmed', 'khan', 'ali@gmail.com', '33443344332', '33443344332', 'cash', 'y12 5th floor', 'sindh', '342345', '6', 'cash', '305148', 4, 'SR00001', 'CES 2024: HP\'s latest portfolio includes Windows 11-powered HP Spectre360', 76, 1, '2024-10-07', 'pending/Processing'),
(505, 'sufyaan', 'ahmed', 'khan', 'ali@gmail.com', '33443344332', '33443344332', 'cash', 'y12 5th floor', 'sindh', '342345', '6', 'cash', '305148', 4, 'SR00002', 'Iigen Melody Children\'S Gift Stationery Gift Bag Creative Student Stationery Blind Box Neutral Pen Pencil Ruler Eraser 5pcs Set', 1290, 1, '2024-10-07', 'pending/Processing'),
(506, 'sufyaan', 'ahmed', 'khan', 'ali@gmail.com', '33443344332', '33443344332', 'cash', 'y12 5th floor', 'sindh', '342345', '6', 'cash', '305148', 4, 'SR00003', 'The Best Stationery in Pakistan - ORO School & Office Stationery', 223, 1, '2024-10-07', 'pending/Processing'),
(507, 'sufyaan', 'ahmed', 'khan', 'ali@gmail.com', '33443344332', '33443344332', 'cash', 'y12 5th floor', 'sindh', '342345', '6', 'cash', '305148', 4, 'SR00004', 'Two flaps double sided Both sides of the pencil box have a large capacity as the school stationary organizer Pencil Box is composed of sturdy, premium latex material', 11, 1, '2024-10-07', 'pending/Processing'),
(508, 'sufyaan', 'ahmed', 'khan', 'ali@gmail.com', '33443344332', '33443344332', 'cash', 'y12 5th floor', 'sindh', '342345', '6', 'cash', '305148', 4, 'SR00006', 'Traditional Gifts for Ramadan and Eid - Official Bateel Blog', 2334, 1, '2024-10-07', 'pending/Processing'),
(509, 'sufyaan', 'ahmed', 'khan', 'ali@gmail.com', '33443344332', '33443344332', 'cash', 'y12 5th floor', 'sindh', '342345', '6', 'cash', '305148', 4, 'SR00007', 'Size: 4mm Transparent Acrylic, Edges: Smooth Polished Edges, Printing Material: Long-Lasting UV Printing', 2388, 1, '2024-10-07', 'pending/Processing'),
(510, 'sufyaan', 'ahmed', 'khan', 'ali@gmail.com', '33443344332', '33443344332', 'cash', 'y12 5th floor', 'sindh', '342345', '6', 'cash', '305148', 4, 'SR00008', 'Size: 4mm Transparent Acrylic Edges: Smooth Polished Edges Printing Material: Long-Lasting UV Printing', 567, 1, '2024-10-07', 'pending/Processing'),
(511, 'sufyaan', 'ahmed', 'khan', 'ali@gmail.com', '33443344332', '33443344332', 'cash', 'y12 5th floor', 'sindh', '342345', '6', 'cash', '305148', 4, 'SR00009', 'Cute Princess Dolls For Girls', 78, 1, '2024-10-07', 'pending/Processing'),
(512, 'sufyaan', 'ahmed', 'khan', 'ali@gmail.com', '33443344332', '33443344332', 'cash', 'y12 5th floor', 'sindh', '342345', '6', 'cash', '305148', 4, 'SR00010', 'Jet Roy Baby Reborn Toddler Baby Dolls Silicone Full Body Girl 22 inch Long Hair Anatomically Correct Waterproof Dolls Reborn Pink Dress Birthday', 122, 1, '2024-10-07', 'pending/Processing'),
(513, 'sufyaan', 'ali', 'khan', 'ali@gmail.com', '33443344332', '33443344332', 'saddar karachi bunsroad street #2 building Name : zohra-manzil', 'y12 5th floor', 'sindh', '342345', '6', 'Online', '644350', 4, 'SR00003', 'The Best Stationery in Pakistan - ORO School & Office Stationery', 223, 1, '2024-10-07', 'pending/Processing'),
(516, 'sufyaan', 'sufyaan', 'su', 'ali@gmail.com', '33443344332', '33443344332', 'cash', 'y12 5th floor', 'sindh', '342345', '6', 'Online', '828567', 4, 'SR00008', 'Size: 4mm Transparent Acrylic Edges: Smooth Polished Edges Printing Material: Long-Lasting UV Printing', 567, 1, '2024-10-09', 'pending/Processing'),
(517, 'sufyaan', 'sufyaan', 'su', 'ali@gmail.com', '33443344332', '33443344332', 'cash', 'y12 5th floor', 'sindh', '342345', '6', 'cash', '717502', 4, 'SR00004', 'Two flaps double sided Both sides of the pencil box have a large capacity as the school stationary organizer Pencil Box is composed of sturdy, premium latex material', 11, 1, '2024-10-09', 'pending/Processing'),
(521, 'sufyaan', 'sufyaan', 'su', 'ali@gmail.com', '33443344332', '33443344332', 'cash', 'y12 5th floor', 'sindh', '342345', '6', 'cash', '334235', 4, 'SR00004', 'Two flaps double sided Both sides of the pencil box have a large capacity as the school stationary organizer Pencil Box is composed of sturdy, premium latex material', 11, 1, '2024-10-09', 'pending/Processing'),
(522, 'sufyaan', 'sufyaan', 'su', 'ali@gmail.com', '33443344332', '33443344332', 'cash', 'y12 5th floor', 'sindh', '342345', '6', 'cash', '334235', 4, 'SR00010', 'Jet Roy Baby Reborn Toddler Baby Dolls Silicone Full Body Girl 22 inch Long Hair Anatomically Correct Waterproof Dolls Reborn Pink Dress Birthday', 122, 1, '2024-10-09', 'pending/Processing'),
(523, 'sufyaan', 'sufyaan', 'su', 'ali@gmail.com', '33443344332', '33443344332', 'cash', 'y12 5th floor', 'sindh', '342345', '6', 'cash', '334235', 4, 'SR00008', 'Size: 4mm Transparent Acrylic Edges: Smooth Polished Edges Printing Material: Long-Lasting UV Printing', 567, 1, '2024-10-09', 'pending/Processing'),
(524, 'sufyaan', 'sufyaan', 'su', 'ali@gmail.com', '33443344332', '33443344332', 'cash', 'y12 5th floor', 'sindh', '342345', '6', 'cash', '334235', 4, 'SR00007', 'Size: 4mm Transparent Acrylic, Edges: Smooth Polished Edges, Printing Material: Long-Lasting UV Printing', 2388, 1, '2024-10-09', 'Cancelled'),
(525, 'sufyaan', 'sufyaan', 'su', 'ali@gmail.com', '33443344332', '33443344332', 'cash', 'yio', 'sindh', '342345', '6', 'cash', '916222', 4, 'SR00004', 'Two flaps double sided Both sides of the pencil box have a large capacity as the school stationary organizer Pencil Box is composed of sturdy, premium latex material', 11, 1, '2024-10-09', 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

CREATE TABLE `ordertrackhistory` (
  `id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ordertrackhistory`
--

INSERT INTO `ordertrackhistory` (`id`, `orderId`, `status`, `remark`, `postingDate`) VALUES
(1, 3, 'in Process', 'Order has been Shipped.', '2017-03-10 19:36:45'),
(2, 1, 'Delivered', 'Order Has been delivered', '2017-03-10 19:37:31'),
(3, 3, 'Delivered', 'Product delivered successfully', '2017-03-10 19:43:04'),
(4, 4, 'in Process', 'Product ready for Shipping', '2017-03-10 19:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `Statement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `Statement`) VALUES
(1, 'Delivered'),
(2, 'Pending'),
(3, 'Canceled Product');

-- --------------------------------------------------------

--
-- Table structure for table `productorder`
--

CREATE TABLE `productorder` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `p_id` varchar(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productorder`
--

INSERT INTO `productorder` (`id`, `u_id`, `u_name`, `p_id`, `p_name`, `p_price`, `p_qty`) VALUES
(1, 4, 'sufyaan', '0', '', 0, 0),
(2, 4, 'sufyaan', '', '', 0, 0),
(3, 4, 'sufyaan', '', '', 0, 0),
(4, 4, 'sufyaan', '', '', 0, 0),
(5, 4, 'sufyaan', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `productreviews`
--

CREATE TABLE `productreviews` (
  `id` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `quality` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `review` longtext DEFAULT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `productreviews`
--

INSERT INTO `productreviews` (`id`, `productId`, `quality`, `price`, `value`, `name`, `summary`, `review`, `reviewDate`) VALUES
(2, 3, 4, 5, 5, 'Anuj Kumar', 'BEST PRODUCT FOR ME :)', 'BEST PRODUCT FOR ME :)', '2017-02-26 20:43:57'),
(3, 3, 3, 4, 3, 'Sarita pandey', 'Nice Product', 'Value for money', '2017-02-26 20:52:46'),
(4, 3, 3, 4, 3, 'Sarita pandey', 'Nice Product', 'Value for money', '2017-02-26 20:59:19');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `pro_discription` varchar(225) NOT NULL,
  `pro_price` int(200) NOT NULL,
  `pro_QTY` int(11) NOT NULL,
  `pro_image` varchar(2000) NOT NULL,
  `categorey` int(11) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `product_id` varchar(1100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pro_discription`, `pro_price`, `pro_QTY`, `pro_image`, `categorey`, `pro_name`, `product_id`) VALUES
(24, 'CES 2024: HP\'s latest portfolio includes Windows 11-powered HP Spectre360', 3400, 76, 'images (2).jpeg', 7, 'hp laptop', 'SR00001'),
(25, 'Iigen Melody Children\'S Gift Stationery Gift Bag Creative Student Stationery Blind Box Neutral Pen Pencil Ruler Eraser 5pcs Set', 20, 1290, 'images (13).jpeg', 7, 'Girls Pens', 'SR00002'),
(26, 'The Best Stationery in Pakistan - ORO School & Office Stationery', 3400, 223, 'images (14).jpeg', 7, 'pencils for office', 'SR00003'),
(27, 'Two flaps double sided Both sides of the pencil box have a large capacity as the school stationary organizer Pencil Box is composed of sturdy, premium latex material', 34, 11, 'images (15).jpeg', 7, 'Pencils ORO For Students For Sale', 'SR00004'),
(28, 'Islamic Gifts, Mini Quran Tasbih Gift Set, Wedding Favors, Islamic Party Favors, Muslim Wedding Gift, Islamic Set, Eid Gift Box, Nikkah Gift - Etsy', 3400, 133, 'images (16).jpeg', 8, 'Golden Gift Article', 'SR00005'),
(29, 'Traditional Gifts for Ramadan and Eid - Official Bateel Blog', 1000, 2334, 'images (17).jpeg', 8, 'Ramzan Gift Article', 'SR00006'),
(30, 'Size: 4mm Transparent Acrylic, Edges: Smooth Polished Edges, Printing Material: Long-Lasting UV Printing', 1000, 2388, 'VAGC-01.jpg', 9, 'Acrylic Greeting Cards Get Well Soon', 'SR00007'),
(31, 'Size: 4mm Transparent Acrylic Edges: Smooth Polished Edges Printing Material: Long-Lasting UV Printing', 1000, 567, 'VAGC-05.jpg', 9, 'Acrylic Happy Birthday Greeting Card', 'SR00008'),
(32, 'Cute Princess Dolls For Girls', 280, 78, 'images (18).jpeg', 10, 'dolls for girls', 'SR00009'),
(33, 'Jet Roy Baby Reborn Toddler Baby Dolls Silicone Full Body Girl 22 inch Long Hair Anatomically Correct Waterproof Dolls Reborn Pink Dress Birthday', 3400, 122, '61heMOWbYbL._AC_UF1000,1000_QL80_.jpg', 10, 'Baby\'s Dolls', 'SR00010'),
(34, 'Handbags FOR GIRLS/WOMEN, Hand Bag Width: 10.5\" inches Height: 7\" inches, Removable Golden Large Chain StrapFix HandleInner side Zip Pocket Single ', 19000, 2234, 'images (20).jpeg', 11, 'Elegant Light Brown Color Handbag For Girls/Women', 'SR00011'),
(35, 'Handbags FOR GIRLS/WOMEN, Hand Bag Width: 10.5\" inches Height: 7\" inches, Removable Golden Large Chain StrapFix HandleInner side Zip Pocket Single ', 3400, 122, 'images (19).jpeg', 11, 'handbags', 'SR00012'),
(36, 'URBAN FOREST Kyle RFID Blocking Black/Red Leather Wallet for Men. :', 2322, 189, 'images (21).jpeg', 12, 'FOREST  Wallet', 'SR00013'),
(37, 'Prima Male Men Leather Wallet, 6, Card Slots: 5 at Rs 450 in Faridabad | ID: 21339151112', 2200, 394, 'images (22).jpeg', 12, 'Wallets Mens', 'SR00014'),
(38, '﻿ Interior: Interior Slot Pocket,Interior Pocket,Interior Compartment, Poucht,Coin Pocket,Note Compartment,Photo Holder,Card Holder Lining Material: ..', 2200, 32435, 'images (24).jpeg', 12, 'Flip Wallet - MensCorner', 'SR00015'),
(39, 'Shop Beauty Care Products for women (Dark Spot Serum, Dual-Foundation, Eye-Gel) in Pakistan From Imported Brand (WBM) With 100% Genuine products, Cash', 7800, 2384, 'images (25).jpeg', 13, 'Buy Online WBM Beauty Age-Defying Skin Care Kit In Pakistan', 'SR00016');

-- --------------------------------------------------------

--
-- Table structure for table `registation`
--

CREATE TABLE `registation` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userrole` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registation`
--

INSERT INTO `registation` (`id`, `full_name`, `email`, `password`, `userrole`) VALUES
(1, 'zain', 'zain@gmail.com', 'a1234', 'user'),
(2, 'sharoon', 'sharoon@gmail.com', 'sk123', 'admin'),
(3, 'sufyaan', 'sufyaan@gmail.com', 'a1234', 'admin'),
(9, 'meer', 'meer@gmail.com', 'm1234', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `emaill` varchar(100) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fname`, `lname`, `emaill`, `pass`) VALUES
(3, 'sufyaan', 'ali', 'sufyaan@gmail.com', 'ali11'),
(4, 'sufyaan', 'ali', 'alisufyaan45@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `creationDate`, `updationDate`) VALUES
(2, 4, 'Led Television', '2017-01-26 16:24:52', '26-01-2017 11:03:40 PM'),
(3, 4, 'Television', '2017-01-26 16:29:09', ''),
(4, 4, 'Mobiles', '2017-01-30 16:55:48', ''),
(5, 4, 'Mobile Accessories', '2017-02-04 04:12:40', ''),
(6, 4, 'Laptops', '2017-02-04 04:13:00', ''),
(7, 4, 'Computers', '2017-02-04 04:13:27', ''),
(8, 3, 'Comics', '2017-02-04 04:13:54', ''),
(9, 5, 'Beds', '2017-02-04 04:36:45', ''),
(10, 5, 'Sofas', '2017-02-04 04:37:02', ''),
(11, 5, 'Dining Tables', '2017-02-04 04:37:51', ''),
(12, 6, 'Men Footwears', '2017-03-10 20:12:59', '');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userEmail`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-02-26 11:18:50', '', 1),
(2, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-02-26 11:29:33', '', 1),
(3, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-02-26 11:30:11', '', 1),
(4, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-02-26 15:00:23', '26-02-2017 11:12:06 PM', 1),
(5, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-02-26 18:08:58', '', 0),
(6, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-02-26 18:09:41', '', 0),
(7, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-02-26 18:10:04', '', 0),
(8, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-02-26 18:10:31', '', 0),
(9, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-02-26 18:13:43', '', 1),
(10, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-02-27 18:52:58', '', 0),
(11, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-02-27 18:53:07', '', 1),
(12, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-03 18:00:09', '', 0),
(13, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-03 18:00:15', '', 1),
(14, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-06 18:10:26', '', 1),
(15, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-07 12:28:16', '', 1),
(16, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-07 18:43:27', '', 1),
(17, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-07 18:55:33', '', 1),
(18, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-07 19:44:29', '', 1),
(19, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-08 19:21:15', '', 1),
(20, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-15 17:19:38', '', 1),
(21, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-15 17:20:36', '15-03-2017 10:50:39 PM', 1),
(22, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-16 01:13:57', '', 1),
(23, 'hgfhgf@gmass.com', 0x3a3a3100000000000000000000000000, '2018-04-29 09:30:40', '', 1),
(24, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2023-02-09 22:23:13', NULL, 1),
(25, 'alisufyaan45@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-04 11:46:48', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `shippingAddress` longtext DEFAULT NULL,
  `shippingState` varchar(255) DEFAULT NULL,
  `shippingCity` varchar(255) DEFAULT NULL,
  `shippingPincode` int(11) DEFAULT NULL,
  `billingAddress` longtext DEFAULT NULL,
  `billingState` varchar(255) DEFAULT NULL,
  `billingCity` varchar(255) DEFAULT NULL,
  `billingPincode` int(11) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contactno`, `password`, `shippingAddress`, `shippingState`, `shippingCity`, `shippingPincode`, `billingAddress`, `billingState`, `billingCity`, `billingPincode`, `regDate`, `updationDate`) VALUES
(1, 'NOWDEMY OFFICIAL', 'Nowdemy@gmail.com', 9009857868, 'f925916e2754e5e03f75dd58a5733251', 'karachi,khi', 'Sindh', 'Sindh', 110001, 'Sindh area', 'Sindh area', 'SIndh', 110092, '2017-02-04 19:30:50', ''),
(2, 'Amit ', 'amir@gmail.com', 8285703355, '5c428d8875d2948607f3e3fe134d71b4', '', '', '', 0, '', '', '', 0, '2017-03-15 17:21:22', ''),
(3, 'hg', 'hgfhgf@gmass.com', 1121312312, '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', 0, '', '', '', 0, '2018-04-29 09:30:32', ''),
(4, 'sufyaan yufyt', 'alisufyaan45@gmail.com', 300225500, '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-04 11:46:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `userId`, `productId`, `postingDate`) VALUES
(1, 1, 0, '2017-02-27 18:53:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderss`
--
ALTER TABLE `orderss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productorder`
--
ALTER TABLE `productorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productreviews`
--
ALTER TABLE `productreviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorey` (`categorey`);

--
-- Indexes for table `registation`
--
ALTER TABLE `registation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orderss`
--
ALTER TABLE `orderss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=530;

--
-- AUTO_INCREMENT for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `productorder`
--
ALTER TABLE `productorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `productreviews`
--
ALTER TABLE `productreviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `registation`
--
ALTER TABLE `registation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categorey`) REFERENCES `category` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
