-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2023 at 02:13 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sidyey`
--

-- --------------------------------------------------------

--
-- Table structure for table `pos_checkout_order`
--

CREATE TABLE `pos_checkout_order` (
  `checkout_id` int(12) NOT NULL,
  `customer_id` int(12) NOT NULL,
  `transcode` varchar(50) NOT NULL,
  `delivery_option` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `street` varchar(100) NOT NULL,
  `barangay` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `is_paid` int(1) NOT NULL,
  `is_delivery` int(1) NOT NULL,
  `meal_status` varchar(12) NOT NULL,
  `is_rescheduled` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pos_customer`
--

CREATE TABLE `pos_customer` (
  `customer_id` int(12) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `address` text NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `barangay` varchar(100) NOT NULL,
  `contact` varchar(36) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pos_customer`
--

INSERT INTO `pos_customer` (`customer_id`, `firstname`, `lastname`, `address`, `street`, `city`, `barangay`, `contact`, `email`, `username`, `password`, `is_active`, `date_added`) VALUES
(4, 'Annalyn', 'Vitug', ' Blk 1 Lot 2', 'Phase 1', 'Binan', 'Langkiwa', '09364193104', 'annalynvitug07@gmail.com', 'annalyn07', 'naleng', 1, '2023-09-29 13:06:55'),
(13, 'Dae Ann', 'Vitug', ' blk 30', 'lot 19', 'binan', 'langkiwa', '09169371910', 'daeeeeeann@gmail.com', 'dae ann', 'lenard', 1, '2023-10-04 12:15:17'),
(18, 'jr', 'yepes', ' 11', 'langkiwa', 'carmona', 'langkiwa', '123456823411', 'manuelrapsin@gmail.com', 'balbuena', 'balbuena123', 1, '2023-10-09 06:02:43');

-- --------------------------------------------------------

--
-- Table structure for table `pos_inventory`
--

CREATE TABLE `pos_inventory` (
  `inventory_id` int(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `qty` varchar(50) NOT NULL,
  `photo` text NOT NULL,
  `price` varchar(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pos_inventory`
--

INSERT INTO `pos_inventory` (`inventory_id`, `name`, `description`, `qty`, `photo`, `price`, `date_added`) VALUES
(1, '<b> 12 Pieces Instax Inspired Frame </b>', '<h6> \r\n₱250  -  without box <br>\r\n₱280  -  with box <br>\r\n</h6>', '50', '12 Pieces Instax Inspired Frame.jpg', '120', '2023-09-29 12:51:07'),
(2, '<b> Calendar </b>', '<h6> \r\n₱50 each <br>\r\n<br>\r\n</h6>', '100', 'Calendar.jpg', '', '2023-09-29 13:53:21'),
(3, '<b> Calling Card </b>', '<h6> \r\n₱250  -  50 pieces <br>\r\n₱400  -  100 pieces\r\n</h6>', '500', 'Calling Card.jpg', '', '2023-09-29 13:55:52'),
(4, '<b> Customized Sticker </b>', '<h6> \r\n₱5 each <br>\r\n<br>\r\n</h6>', '500', 'Customized Sticker.jpg', '', '2023-09-29 13:56:57'),
(5, '<b> Double Glass Frame </b>', '<h6> \r\n₱350  -  complete package <br>\r\n<br>\r\n</h6>', '50', 'Double Glass Frame.jpg', '', '2023-09-29 13:57:57'),
(6, '<b> Give Away Keychain </b>', '<h6> \r\n₱25  -  retail <br>\r\n₱20  -  wholesale\r\n</h6>', '100', 'Giveaway Keychain.jpg', '', '2023-09-29 14:00:16'),
(7, '<b> Heart-Shaped Photo Frame </b>', '<h6> \r\n₱280  -  without box <br>\r\n₱310  -  with box\r\n</h6>', '50', 'Heart-Shaped Photo Frame.jpg', '', '2023-09-29 14:02:01'),
(8, '<b> House Address Plate </b>', '<h6> \r\n₱100 each \r\n<br>\r\n<br>\r\n</h6>', '50', 'House Address Plate.jpg', '', '2023-09-29 14:03:22'),
(9, '<b> Instagram Inspired Frame </b>', '<h6> \r\n₱250  -  without box <br>\r\n₱280  -  with box\r\n</h6>\r\n', '50', 'Instagram Inspired Frame.jpg', '', '2023-09-29 14:05:42'),
(10, '<b> Instax Inspired Print </b>', '<h6> \r\n₱50  -  10 pieces <br>\r\n₱100  -  20 pieces + 2 free\r\n</h6>', '500', 'Instax Inspired Print.jpg', '', '2023-09-29 14:06:49'),
(11, '<b> Invitation Card </b>', '<h6> \r\n₱10  -  3R <br>\r\n₱12  -  4R\r\n</h6>', '500', 'Invitation Card.jpg', '', '2023-09-29 14:07:56'),
(12, '<b> Label Sticker </b>', '<h6> \r\n₱5 each <br>\r\n<br>\r\n</h6>', '500', 'Label Sticker.jpg', '', '2023-09-29 14:08:55'),
(13, '<b> Milestone Photo Frame </b>', '<h6> \r\n₱280  -  without box <br>\r\n₱310  -  with box\r\n</h6>', '50', 'Milestone Photo Frame.jpg', '', '2023-09-29 14:09:49'),
(14, '<b> Mini Photo Album Keychain </b>', '<h6> \r\n₱99  -  small <br>\r\n₱149  -  medium\r\n</h6>', '100', 'Mini Photo Album Keychain.jpg', '', '2023-09-29 14:10:53'),
(15, '<b> Name Tag </b>', '<h6> \r\n₱50  -  with lace <br>\r\n<br>\r\n</h6>\r\n', '100', 'Name Tag.jpg', '', '2023-09-29 14:11:43'),
(16, '<b> New Born Photo Frame </b>', '<h6> \r\n₱280  -  without box <br>\r\n₱310  -  with box\r\n</h6>', '50', 'Newborn Photo Frame.jpg', '', '2023-09-29 14:13:37'),
(17, '<b> Photo Card </b>', '<h6> \r\n₱50  -  10 pieces <br>\r\n₱100  -  20 pieces + 2 free\r\n</h6>', '500', 'Photo Card.jpg', '', '2023-09-29 14:14:44'),
(18, '<b> Photo Film Strip </b>', '<h6> \r\n₱10  -  minimum of 5 strip <br>\r\n<br>\r\n</h6>', '500', 'Photo Film Strip.jpg', '', '2023-09-29 14:16:00'),
(19, '<b> Photo Frame </b>', '<h6> \r\n₱250  -  without box <br>\r\n₱280  -  with box\r\n</h6>\r\n', '50', 'Photo Frame.jpg', '', '2023-09-29 14:17:01'),
(20, '<b> Photo Print </b>', '<h6> \r\n₱5  -  cute size up to A4 <br>\r\n<br>\r\n</h6>', '500', 'Photo Print.jpg', '', '2023-09-29 14:18:13'),
(21, '<b> Photo With Dedication Frame </b>', '<h6> \r\n₱250  -  without box <br>\r\n₱280  -  with box\r\n</h6>', '50', 'Photo With Dedication Frame.jpg', '', '2023-09-29 14:19:24'),
(22, '<b> Plain Keychain </b>', '<h6> \r\n₱25  -  retail <br>\r\n₱20  -  wholesale\r\n</h6>', '500', 'Plain Keychain.jpg', '', '2023-09-29 14:20:26'),
(23, '<b> Ref Magnet </b>', '<h6> \r\n₱20 each <br>\r\n<br>\r\n</h6>', '100', 'Ref Magnet.jpg', '', '2023-09-29 14:21:13'),
(24, '<b> Sintra Board </b>', '<h6> \r\n₱45  each <br>\r\n₱100  -  3 pieces\r\n</h6>', '100', 'Sintra Board.jpg', '', '2023-09-29 14:26:56'),
(25, '<b> Spotify Keychain </b>', '<h6> \r\n₱25  -  retail <br>\r\n₱20  -  wholesale\r\n</h6>', '100', 'Spotify Keychain.jpg', '', '2023-09-29 14:28:44'),
(26, '<b> Spotify Song Frame </b>', '<h6> \r\n₱250  -  without box <br>\r\n₱280  -  with box\r\n</h6>', '50', 'Spotify Song Frame.jpg', '', '2023-09-29 14:30:15'),
(27, '<b> Spray Bottles </b>', '<h6> \r\n₱25  -  retail <br>\r\n₱20  -  wholesale\r\n</h6>', '500', 'Spray Bottles.jpg', '', '2023-09-29 14:31:26'),
(28, '<b> Subject Sticker </b>', '<h6> \r\n₱5 each <br>\r\n<br>\r\n</h6>', '500', 'Subject Sticker.jpg', '', '2023-09-29 14:32:43'),
(29, '<b> Thank You Card </b>', '<h6> \r\n₱250  -  50 pieces <br>\r\n₱400  -  100 pieces\r\n</h6>', '500', 'Thank You Card.jpg', '', '2023-09-29 14:33:27');

-- --------------------------------------------------------

--
-- Table structure for table `pos_items`
--

CREATE TABLE `pos_items` (
  `item_id` int(12) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_price` varchar(12) NOT NULL,
  `category` int(2) NOT NULL,
  `stock` int(11) NOT NULL,
  `small` int(11) NOT NULL,
  `meduim` int(11) NOT NULL,
  `large` int(11) NOT NULL,
  `xl` int(11) NOT NULL,
  `xxl` int(11) NOT NULL,
  `xxxl` int(11) NOT NULL,
  `description` text NOT NULL,
  `is_best_seller` int(11) NOT NULL,
  `is_hot` int(11) NOT NULL,
  `image` text NOT NULL,
  `is_active` int(1) NOT NULL,
  `is_status` int(1) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pos_item_category`
--

CREATE TABLE `pos_item_category` (
  `category_id` int(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  `photo` text NOT NULL,
  `description` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pos_item_category`
--

INSERT INTO `pos_item_category` (`category_id`, `name`, `photo`, `description`, `date_added`) VALUES
(1, 'CALENDAR', '', 'CALENDAR', '2023-10-09 16:13:59'),
(2, 'INSTAX INSPIRED PRINT', '', 'INSTAX INSPIRED PRINT', '2023-10-10 02:24:04'),
(3, 'PHOTO CARD', '', 'PHOTO CARD', '2023-10-10 02:30:48'),
(4, 'SPOTIFY KEYCHAIN', '', 'SPOTIFY KEYCHAIN', '2023-10-10 02:36:11'),
(5, 'MINI PHOTO ALBUM KEYCHAIN', '', 'MINI PHOTO ALBUM KEYCHAIN', '2023-10-10 02:41:56'),
(6, 'PHOTO FILM STRIP', '', 'PHOTO FILM STRIP', '2023-10-10 02:44:30'),
(7, 'PLAIN KEYCHAIN', '', 'PLAIN KEYCHAIN', '2023-10-10 02:53:32'),
(8, 'NAME TAG', '', 'NAME TAG', '2023-10-10 03:01:08'),
(9, 'SUBJECT STICKER', '', 'SUBJECT STICKER', '2023-10-10 04:34:10'),
(10, 'INVITATION CARD', '', 'INVITATION CARD', '2023-10-10 04:54:33'),
(11, 'CUSTOMIZED STICKER', '', 'CUSTOMIZED STICKER', '2023-10-10 05:07:06'),
(12, 'LABEL STICKER', '', 'LABEL STICKER', '2023-10-10 05:10:54'),
(13, 'GIVE AWAY KEYCHAIN', '', 'GIVE AWAY KEYCHAIN', '2023-10-10 05:16:13'),
(14, 'SINTRA BOARD', '', 'SINTRA BOARD', '2023-10-10 05:17:58'),
(15, 'CALLING CARD', '', 'CALLING CARD', '2023-10-10 05:29:24'),
(16, 'THANK YOU CARD', '', 'THANK YOU CARD', '2023-10-10 07:31:17'),
(17, 'SPRAY BOTTLE', '', 'SPRAY BOTTLE', '2023-10-10 07:34:01'),
(18, 'REF MAGNET', '', 'REF MAGNET', '2023-10-10 07:34:56'),
(19, 'PHOTO FRAME', '', 'PHOTO FRAME', '2023-10-10 07:36:44'),
(20, 'SPOTIFY SONG FRAME', '', 'SPOTIFY SONG FRAME', '2023-10-10 08:00:57'),
(21, 'HEART-SHAPED PHOTO FRAME', '', 'HEART-SHAPED PHOTO FRAME', '2023-10-10 08:06:52'),
(22, '12 PIECES INSTAX INSPIRED FRAME', '78686741_2684267908262426_1327642359051059200_n.jpg', '12 PIECES INSTAX INSPIRED FRAME', '2023-10-10 08:20:18'),
(23, 'MILESTONE PHOTO FRAME', '', 'MILESTONE PHOTO FRAME', '2023-10-10 08:40:10'),
(24, 'PHOTO WITH DEDICATION FRAME', '', 'PHOTO WITH DEDICATION FRAME', '2023-10-10 08:50:03'),
(25, 'INSTAGRAM INSPIRED FRAME', '', 'INSTAGRAM INSPIRED FRAME', '2023-10-10 08:52:40'),
(26, 'NEWBORN PHOTO FRAME', '', 'NEWBORN PHOTO FRAME', '2023-10-10 09:07:08'),
(27, 'DOUBLE GLASS FRAME', '', 'DOUBLE GLASS FRAME', '2023-10-10 10:08:16'),
(28, 'HOUSE ADDRESS PLATE', '', 'HOUSE ADDRESS PLATE', '2023-10-10 10:08:16');

-- --------------------------------------------------------

--
-- Table structure for table `pos_order`
--

CREATE TABLE `pos_order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `trans_code` varchar(100) NOT NULL,
  `service_id` int(12) NOT NULL,
  `qty` int(11) NOT NULL,
  `description` text NOT NULL,
  `reason` text NOT NULL,
  `photo_1` text NOT NULL,
  `size` text NOT NULL,
  `status` int(11) NOT NULL,
  `bgcolor` text NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `gradesection` varchar(50) NOT NULL,
  `theme` varchar(50) NOT NULL,
  `lace` varchar(50) NOT NULL,
  `fonts` varchar(50) NOT NULL,
  `invitation` text NOT NULL,
  `print` varchar(50) NOT NULL,
  `label` text NOT NULL,
  `texture` varchar(50) NOT NULL,
  `package` varchar(50) NOT NULL,
  `daytimebirth` varchar(100) NOT NULL,
  `hw` varchar(100) NOT NULL,
  `deliverytype` varchar(100) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `proof` text NOT NULL,
  `qoutesdetails` text NOT NULL,
  `delivery` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pos_order`
--

INSERT INTO `pos_order` (`order_id`, `customer_id`, `trans_code`, `service_id`, `qty`, `description`, `reason`, `photo_1`, `size`, `status`, `bgcolor`, `fullname`, `nickname`, `gradesection`, `theme`, `lace`, `fonts`, `invitation`, `print`, `label`, `texture`, `package`, `daytimebirth`, `hw`, `deliverytype`, `amount`, `proof`, `qoutesdetails`, `delivery`, `created_by`, `created_at`) VALUES
(1, 4, 'VHc1o1G5', 1, 1, '1', 'yoko na', '[\"Screenshot 2023-03-08 010108.png\",\"Screenshot 2023-03-08 103520.png\"]', '', 3, '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '<p>asdasdas</p>', '', 0, '2023-10-10 10:21:10'),
(2, 4, 'ZasQYHo5', 2, 1, '1', '', '[\"Screenshot 2023-03-07 142609 - Copy.png\",\"Screenshot 2023-03-07 142609.png\",\"Screenshot 2023-03-07 142646 - Copy.png\",\"Screenshot 2023-03-07 142646.png\",\"Screenshot 2023-03-08 010108.png\"]', '', 0, '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-10-10 10:30:15'),
(3, 4, 'ZZNzspAt', 3, 1, 'dad', '', '[\"Screenshot 2023-03-07 142609.png\",\"Screenshot 2023-03-07 142646 - Copy.png\",\"Screenshot 2023-03-07 142646.png\"]', 'Mini Wallet', 0, '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-10-10 10:35:42'),
(4, 4, 'AfQ0msUD', 4, 11, 'asd', '', '[\"Screenshot 2023-03-07 142646 - Copy.png\",\"Screenshot 2023-03-07 142646.png\"]', 'One Size', 6, 'Brown', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1700', '78686741_2684267908262426_1327642359051059200_n.jpg', '<p>asdasdsadaasdsasdasdsadasdasdasd</p>', 'For Deliver', 0, '2023-10-10 10:41:22'),
(5, 4, 'sHC65Efs', 5, 1, '11', '', '[\"Screenshot 2023-03-08 104508.png\",\"Screenshot 2023-03-08 104719.png\"]', 'Small Size (16 Photos)', 1, 'Black', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-10-10 10:44:01'),
(6, 4, 'dc0rXgv1', 6, 1, '1', '', '[\"Screenshot 2023-03-08 104508.png\",\"Screenshot 2023-03-08 104719.png\"]', '', 1, 'Black', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-10-10 10:48:55'),
(7, 4, 'uEnbwZ3c', 8, 12121, 'asdasd', '', 'null', 'One Size', 1, '', ' Kevin Jay Rroluna', 'jeff', 'q23', 'Plain White', 'Without Lace', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-10-10 12:30:46'),
(8, 4, 'm8SWy3wY', 9, 11, '11', '', 'null', '2 x 2 Inch', 1, 'Brown', 'Jeffry Bordeos', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-10-10 12:52:26'),
(9, 4, 'CVOz8xOL', 9, 1111, '11', '', 'null', '2 x 2 Inch', 1, 'Brown', 'asd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-10-10 12:52:51'),
(10, 4, 'tHYgxeg9', 9, 0, 'asd', '', 'null', '1 x 1 Inch', 1, 'Blue', ' Kevin Jay Rroluna', '', '', '', '', 'Arial', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-10-10 12:54:06'),
(11, 4, 'llmTVBt9', 10, 11, '1qSD', '', '[\"254656102_147483784270364_6460982872758558786_n.jpg\",\"255481410_147483704270372_3340903548719362714_n.jpg\"]', '4R', 1, '', '', '', '', 'Dark', '', '', 'asdasd', 'Front and Back', '', '', '', '', '', '', '', '', '', '', 0, '2023-10-10 13:04:27'),
(12, 4, 'u2LPSBec', 12, 11, 'asd', '', '[\"248172170_143501008001975_8371042035809357191_n.jpg\"]', '2 x 3.5 Inch', 1, 'Yellow', '', '', '', '', '', 'Calibri', '', '', 'asdwww', '', '', '', '', '', '', '', '', '', 0, '2023-10-10 13:15:20'),
(13, 4, 'uXDGBLh3', 13, 1, '11', '', '[\"254580876_147483734270369_8436777058762479746_n.jpg\"]', 'One Size', 1, 'Green', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-10-10 13:17:26'),
(14, 4, 'NT3GjIRe', 14, 1, '11', '', '[\"254580876_147483734270369_8436777058762479746_n.jpg\"]', 'One Size', 1, 'Canvass Matte', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-10-10 13:28:19'),
(15, 4, 'OC50DYV2', 15, 11, 'Card', '', '[\"254656102_147483784270364_6460982872758558786_n.jpg\"]', 'One Size', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-10-10 15:30:53'),
(16, 4, 'aq2u7M03', 16, 1, 'Thanks', '', '[\"254656102_147483784270364_6460982872758558786_n.jpg\",\"255481410_147483704270372_3340903548719362714_n.jpg\"]', 'One Size', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-10-10 15:31:58'),
(17, 4, 'c2ReCYsp', 17, 1, 'Spay', '', '[\"\"]', 'One Size', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-10-10 15:34:40'),
(18, 4, 'jP1KeIOf', 18, 1, '111', '', '[\"dudong_banner.jpg\"]', 'One Size', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-10-10 15:35:26'),
(19, 4, 'rEGql1oK', 17, 1, '1', '', '[\"254656102_147483784270364_6460982872758558786_n.jpg\"]', 'One Size', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-10-10 15:35:42'),
(20, 4, 'x2xNsx42', 19, 1, '11', '', '[\"78686741_2684267908262426_1327642359051059200_n.jpg\"]', 'One Size A4', 1, 'Black', '', '', '', '', '', '', '', '', '', '', 'With Box', '', '', '', '', '', '', '', 0, '2023-10-10 16:00:19'),
(21, 4, 'FlnuAbTI', 20, 1, '111', '', '[\"2-28940_youtube-channel-art-background-darkness.jpg\"]', 'One Size A4', 1, 'Black', '', '', '', '', '', '', '', '', 'Sample Label', '', 'With Box', '', '', '', '', '', '', '', 0, '2023-10-10 16:06:22'),
(22, 4, 'vdWIWuAU', 21, 1, '111', '', '[\"78686741_2684267908262426_1327642359051059200_n.jpg\"]', 'One Size A4', 1, 'Green', '', '', '', '', '', '', '', '', '1', '', 'With Box', '', '', '', '', '', '', '', 0, '2023-10-10 16:19:47'),
(23, 4, '7Jch1r9A', 22, 11, '11wqr324', '', '[\"254656102_147483784270364_6460982872758558786_n.jpg\"]', 'One Size A4', 11, 'White', '', '', '', '', '', '', '', '', 'weqwrw34234', '', 'With Box', '', '', '', '100', '', '<p>asdasd</p>', 'Pick Up', 0, '2023-10-10 16:29:27'),
(24, 4, 'v8dgAVp8', 23, 12, 'MLES', '', '[\"254656102_147483784270364_6460982872758558786_n.jpg\"]', 'One Size A4', 1, 'White', '1112', '', '', 'Blue', '', '', '', '', '12', '', 'With Box', '', '', '', '', '', '', '', 0, '2023-10-10 16:49:36'),
(25, 4, 'BFXnWPcG', 24, 12, 'DEDEDDD', '', '[\"254656102_147483784270364_6460982872758558786_n.jpg\",\"255481410_147483704270372_3340903548719362714_n.jpg\"]', 'One Size A4', 1, 'Black', '', '', '', '', '', '', '', '', 'Sample Label212', '', 'With Box', '', '', '', '', '', '', '', 0, '2023-10-10 16:52:15'),
(26, 4, 'zt9ZHTlV', 25, 12121, '111', '', '[\"254656102_147483784270364_6460982872758558786_n.jpg\"]', 'One Size A4', 1, 'Black', '', '', '', '', '', '', '', '', '231232123123', '', 'With Box', '', '', '', '', '', '', '', 0, '2023-10-10 17:06:30'),
(27, 4, 'cHDVUegY', 26, 1, 'asdasd', '', '[\"254656102_147483784270364_6460982872758558786_n.jpg\"]', 'One Size A4', 1, 'White', 'System Administrator', '', '', 'Blue', '', '', '', '', '', '', 'With Box', 'sd', 'sd', 'Normal', '', '', '', '', 0, '2023-10-10 18:07:17'),
(28, 4, '1f3zWfMC', 27, 12, '12', '', '[\"254656102_147483784270364_6460982872758558786_n.jpg\"]', 'One Size 5R', 11, 'Black', '', '', '', '', '', '', '', '', 'Sample Label AAvb', '', 'With Box', '', '', '', '1000', '254656102_147483784270364_6460982872758558786_n.jpg', '<p>sadsdsad</p>', 'Pick Up', 0, '2023-10-10 18:13:18'),
(29, 4, 'jLPqBYfq', 28, 1, 'asd', '', 'null', '', 1, 'White', '', '', '', '', '', '', '', '', 'Sample Label', '', '', '', '', '', '', '', '', '', 0, '2023-10-10 18:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `pos_settings`
--

CREATE TABLE `pos_settings` (
  `id` int(12) NOT NULL,
  `title` text NOT NULL,
  `email` text NOT NULL,
  `contact` text NOT NULL,
  `address` text NOT NULL,
  `facebook` text NOT NULL,
  `termscondition` text NOT NULL,
  `logo` text NOT NULL,
  `about` text NOT NULL,
  `faq` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pos_settings`
--

INSERT INTO `pos_settings` (`id`, `title`, `email`, `contact`, `address`, `facebook`, `termscondition`, `logo`, `about`, `faq`) VALUES
(1, 'SIDYEY', 'sidyeyprintstuff@gmail.com', '09554280710', 'Blk 35 Lot 16 Phase 3 SV5A Barangay Langkiwa Binan Laguna 4024', 'https://www.facebook.com/Sidyeyprintstuff', '&lt;center&gt;\r\n&lt;b&gt; 1. OUR SERVICES &lt;/b&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nThe information provided when using the Services is not intended for distribution to or use by any person or entity in any jurisdiction or country where such distribution or use would be contrary to law or regulation or which would subject us to any registration requirement within such jurisdiction or country. Accordingly, those persons who choose to access the Services from other locations do so on their own initiative and are solely responsible for compliance with local laws, if and to the extent local laws are applicable.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;b&gt; 2. INTELLECTUAL PROPERTY RIGHTS &lt;/b&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nWe are the owner or the licensee of all intellectual property rights in our Services, including all source code, databases, functionality, software, website designs, audio, video, text, photographs, and graphics in the Services (collectively, the &quot;Content&quot;), as well as the trademarks, service marks, and logos contained therein (the &quot;Marks&quot;).\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nOur Content and Marks are protected by copyright and trademark laws (and various other intellectual property rights and unfair competition laws) and treaties in the United States and around the world.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nThe Content and Marks are provided in or through the Services &quot;AS IS&quot; for your personal, non-commercial use or internal business purpose only.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nYour use of our Services\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nSubject to your compliance with these Legal Terms, including the &quot;PROHIBITED ACTIVITIES&quot; section below, we grant you a non-exclusive, non-transferable, revocable license to:\r\naccess the Services; and\r\ndownload or print a copy of any portion of the Content to which you have properly gained access.\r\nsolely for your personal, non-commercial use or internal business purpose.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nExcept as set out in this section or elsewhere in our Legal Terms, no part of the Services and no Content or Marks may be copied, reproduced, aggregated, republished, uploaded, posted, publicly displayed, encoded, translated, transmitted, distributed, sold, licensed, or otherwise exploited for any commercial purpose whatsoever, without our express prior written permission.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nIf you wish to make any use of the Services, Content, or Marks other than as set out in this section or elsewhere in our Legal Terms, please address your request to: sidyeysprintstuff@gmail.com. If we ever grant you the permission to post, reproduce, or publicly display any part of our Services or Content, you must identify us as the owners or licensors of the Services, Content, or Marks and ensure that any copyright or proprietary notice appears or is visible on posting, reproducing, or displaying our Content.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nWe reserve all rights not expressly granted to you in and to the Services, Content, and Marks.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nAny breach of these Intellectual Property Rights will constitute a material breach of our Legal Terms and your right to use our Services will terminate immediately.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nYour submissions and contributions\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nPlease review this section and the &quot;PROHIBITED ACTIVITIES&quot; section carefully prior to using our Services to understand the (a) rights you give us and (b) obligations you have when you post or upload any content through the Services.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nSubmissions: By directly sending us any question, comment, suggestion, idea, feedback, or other information about the Services (&quot;Submissions&quot;), you agree to assign to us all intellectual property rights in such Submission. You agree that we shall own this Submission and be entitled to its unrestricted use and dissemination for any lawful purpose, commercial or otherwise, without acknowledgment or compensation to you.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nContributions: The Services may invite you to chat, contribute to, or participate in blogs, message boards, online forums, and other functionality during which you may create, submit, post, display, transmit, publish, distribute, or broadcast content and materials to us or through the Services, including but not limited to text, writings, video, audio, photographs, music, graphics, comments, reviews, rating suggestions, personal information, or other material (&quot;Contributions&quot;). Any Submission that is publicly posted shall also be treated as a Contribution.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nYou understand that Contributions may be viewable by other users of the Services.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nWhen you post Contributions, you grant us a license (including use of your name, trademarks, and logos): By posting any Contributions, you grant us an unrestricted, unlimited, irrevocable, perpetual, non-exclusive, transferable, royalty-free, fully-paid, worldwide right, and license to: use, copy, reproduce, distribute, sell, resell, publish, broadcast, retitle, store, publicly perform, publicly display, reformat, translate, excerpt (in whole or in part), and exploit your Contributions (including, without limitation, your image, name, and voice) for any purpose, commercial, advertising, or otherwise, to prepare derivative works of, or incorporate into other works, your Contributions, and to sublicense the licenses granted in this section. Our use and distribution may occur in any media formats and through any media channels.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nThis license includes our use of your name, company name, and franchise name, as applicable, and any of the trademarks, service marks, trade names, logos, and personal and commercial images you provide.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nYou are responsible for what you post or upload: By sending us Submissions and/or posting Contributions through any part of the Services or making Contributions accessible through the Services by linking your account through the Services to any of your social networking accounts, you:\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nconfirm that you have read and agree with our &quot;PROHIBITED ACTIVITIES&quot; and will not post, send, publish, upload, or transmit through the Services any Submission nor post any Contribution that is illegal, harassing, hateful, harmful, defamatory, obscene, bullying, abusive, discriminatory, threatening to any person or group, sexually explicit, false, inaccurate, deceitful, or misleading;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nto the extent permissible by applicable law, waive any and all moral rights to any such Submission and/or Contribution;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nwarrant that any such Submission and/or Contributions are original to you or that you have the necessary rights and licenses to submit such Submissions and/or Contributions and that you have full authority to grant us the above-mentioned rights in relation to your Submissions and/or Contributions; and\r\nwarrant and represent that your Submissions and/or Contributions do not constitute confidential information.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nYou are solely responsible for your Submissions and/or Contributions and you expressly agree to reimburse us for any and all losses that we may suffer because of your breach of (a) this section, (b) any third party’s intellectual property rights, or (c) applicable law.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nWe may remove or edit your Content: Although we have no obligation to monitor any Contributions, we shall have the right to remove or edit any Contributions at any time without notice if in our reasonable opinion we consider such Contributions harmful or in breach of these Legal Terms. If we remove or edit any such Contributions, we may also suspend or disable your account and report you to the authorities.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;b&gt; 3. USER REPRESENTATIONS &lt;/b&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nBy using the Services, you represent and warrant that: (1) all registration information you submit will be true, accurate, current, and complete; (2) you will maintain the accuracy of such information and promptly update such registration information as necessary; (3) you have the legal capacity and you agree to comply with these Legal Terms; (4) you are not under the age of 13; (5) you are not a minor in the jurisdiction in which you reside, or if a minor, you have received parental permission to use the Services; (6) you will not access the Services through automated or non-human means, whether through a bot, script or otherwise; (7) you will not use the Services for any illegal or unauthorized purpose; and (8) your use of the Services will not violate any applicable law or regulation.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nIf you provide any information that is untrue, inaccurate, not current, or incomplete, we have the right to suspend or terminate your account and refuse any and all current or future use of the Services (or any portion thereof).\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n &lt;br&gt;\r\n&lt;br&gt;\r\n&lt;b&gt; 4. USER REGISTRATION &lt;/b&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nYou may be required to register to use the Services. You agree to keep your password confidential and will be responsible for all use of your account and password. We reserve the right to remove, reclaim, or change a username you select if we determine, in our sole discretion, that such username is inappropriate, obscene, or otherwise objectionable.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;b&gt; 5. PURCHASES AND PAYMENT &lt;/b&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nWe accept the following forms of payment:\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nYou agree to provide current, complete, and accurate purchase and account information for all purchases made via the Services. You further agree to promptly update account and payment information, including email address, payment method, and payment card expiration date, so that we can complete your transactions and contact you as needed. Sales tax will be added to the price of purchases as deemed required by us. We may change prices at any time. All payments shall be in Peso.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nYou agree to pay all charges at the prices then in effect for your purchases and any applicable shipping fees, and you authorize us to charge your chosen payment provider for any such amounts upon placing your order. We reserve the right to correct any errors or mistakes in pricing, even if we have already requested or received payment.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nWe reserve the right to refuse any order placed through the Services. We may, in our sole discretion, limit or cancel quantities purchased per person, per household, or per order. These restrictions may include orders placed by or under the same customer account, the same payment method, and/or orders that use the same billing or shipping address. We reserve the right to limit or prohibit orders that, in our sole judgment, appear to be placed by dealers, resellers, or distributors.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;b&gt; 6. POLICY &lt;/b&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nPlease review our Return Policy posted on the Services prior to making any purchases.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;b&gt; 7. PROHIBITED ACTIVITIES &lt;/b&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nYou may not access or use the Services for any purpose other than that for which we make the Services available. The Services may not be used in connection with any commercial endeavors except those that are specifically endorsed or approved by us.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nAs a user of the Services, you agree not to:\r\nSystematically retrieve data or other content from the Services to create or compile, directly or indirectly, a collection, compilation, database, or directory without written permission from us.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nTrick, defraud, or mislead us and other users, especially in any attempt to learn sensitive account information such as user passwords.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nCircumvent, disable, or otherwise interfere with security-related features of the Services, including features that prevent or restrict the use or copying of any Content or enforce limitations on the use of the Services and/or the Content contained therein.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nDisparage, tarnish, or otherwise harm, in our opinion, us and/or the Services.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nUse any information obtained from the Services in order to harass, abuse, or harm another person.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nMake improper use of our support services or submit false reports of abuse or misconduct.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nUse the Services in a manner inconsistent with any applicable laws or regulations.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nEngage in unauthorized framing of or linking to the Services.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nUpload or transmit (or attempt to upload or to transmit) viruses, Trojan horses, or other material, including excessive use of capital letters and spamming (continuous posting of repetitive text), that interferes with any party’s uninterrupted use and enjoyment of the Services or modifies, impairs, disrupts, alters, or interferes with the use, features, functions, operation, or maintenance of the Services.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nEngage in any automated use of the system, such as using scripts to send comments or messages, or using any data mining, robots, or similar data gathering and extraction tools.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nDelete the copyright or other proprietary rights notice from any Content.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nAttempt to impersonate another user or person or use the username of another user.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nUpload or transmit (or attempt to upload or to transmit) any material that acts as a passive or active information collection or transmission mechanism, including without limitation, clear graphics interchange formats (&quot;gifs&quot;), 1×1 pixels, web bugs, cookies, or other similar devices (sometimes referred to as &quot;spyware&quot; or &quot;passive collection mechanisms&quot; or &quot;pcms&quot;).\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nInterfere with, disrupt, or create an undue burden on the Services or the networks or services connected to the Services.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nHarass, annoy, intimidate, or threaten any of our employees or agents engaged in providing any portion of the Services to you.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nAttempt to bypass any measures of the Services designed to prevent or restrict access to the Services, or any portion of the Services.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nCopy or adapt the Services&#039; software, including but not limited to Flash, PHP, HTML, JavaScript, or other code.\r\nExcept as permitted by applicable law, decipher, decompile, disassemble, or reverse engineer any of the software comprising or in any way making up a part of the Services.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nExcept as may be the result of standard search engine or Internet browser usage, use, launch, develop, or distribute any automated system, including without limitation, any spider, robot, cheat utility, scraper, or offline reader that accesses the Services, or use or launch any unauthorized script or other software.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nUse a buying agent or purchasing agent to make purchases on the Services.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nMake any unauthorized use of the Services, including collecting usernames and/or email addresses of users by electronic or other means for the purpose of sending unsolicited email, or creating user accounts by automated means or under false pretenses.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nUse the Services as part of any effort to compete with us or otherwise use the Services and/or the Content for any revenue-generating endeavor or commercial enterprise.\r\nUse the Services to advertise or offer to sell goods and services.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;b&gt; 8. USER GENERATED CONTRIBUTIONS &lt;/b&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nThe Services may invite you to chat, contribute to, or participate in blogs, message boards, online forums, and other functionality, and may provide you with the opportunity to create, submit, post, display, transmit, perform, publish, distribute, or broadcast content and materials to us or on the Services, including but not limited to text, writings, video, audio, photographs, graphics, comments, suggestions, or personal information or other material (collectively, &quot;Contributions&quot;). \r\n&lt;br&gt;\r\n&lt;br&gt;Contributions may be viewable by other users of the Services and through third-party websites. As such, any Contributions you transmit may be treated as non-confidential and non-proprietary. When you create or make available any Contributions, you thereby represent and warrant that:\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nThe creation, distribution, transmission, public display, or performance, and the accessing, downloading, or copying of your Contributions do not and will not infringe the proprietary rights, including but not limited to the copyright, patent, trademark, trade secret, or moral rights of any third party.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nYou are the creator and owner of or have the necessary licenses, rights, consents, releases, and permissions to use and to authorize us, the Services, and other users of the Services to use your Contributions in any manner contemplated by the Services and these Legal Terms.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nYou have the written consent, release, and/or permission of each and every identifiable individual person in your Contributions to use the name or likeness of each and every such identifiable individual person to enable inclusion and use of your Contributions in any manner contemplated by the Services and these Legal Terms.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nYour Contributions are not false, inaccurate, or misleading.\r\nYour Contributions are not unsolicited or unauthorized advertising, promotional materials, pyramid schemes, chain letters, spam, mass mailings, or other forms of solicitation.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nYour Contributions are not obscene, lewd, lascivious, filthy, violent, harassing, libelous, slanderous, or otherwise objectionable (as determined by us).\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nYour Contributions do not ridicule, mock, disparage, intimidate, or abuse anyone.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nYour Contributions are not used to harass or threaten (in the legal sense of those terms) any other person and to promote violence against a specific person or class of people.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nYour Contributions do not violate any applicable law, regulation, or rule.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nYour Contributions do not violate the privacy or publicity rights of any third party.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nYour Contributions do not violate any applicable law concerning child pornography, or otherwise intended to protect the health or well-being of minors.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nYour Contributions do not include any offensive comments that are connected to race, national origin, gender, sexual preference, or physical handicap.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nYour Contributions do not otherwise violate, or link to material that violates, any provision of these Legal Terms, or any applicable law or regulation.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nAny use of the Services in violation of the foregoing violates these Legal Terms and may result in, among other things, termination or suspension of your rights to use the Services.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;b&gt; 9. CONTRIBUTION LICENSE &lt;/b&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nBy posting your Contributions to any part of the Services, you automatically grant, and you represent and warrant that you have the right to grant, to us an unrestricted, unlimited, irrevocable, perpetual, non-exclusive, transferable, royalty-free, fully-paid, worldwide right, and license to host, use, copy, reproduce, disclose, sell, resell, publish, broadcast, retitle, archive, store, cache, publicly perform, publicly display, reformat, translate, transmit, excerpt (in whole or in part), and distribute such Contributions (including, without limitation, your image and voice) for any purpose, commercial, advertising, or otherwise, and to prepare derivative works of, or incorporate into other works, such Contributions, and grant and authorize sublicenses of the foregoing. The use and distribution may occur in any media formats and through any media channels.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nThis license will apply to any form, media, or technology now known or hereafter developed, and includes our use of your name, company name, and franchise name, as applicable, and any of the trademarks, service marks, trade names, logos, and personal and commercial images you provide. You waive all moral rights in your Contributions, and you warrant that moral rights have not otherwise been asserted in your Contributions.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nWe do not assert any ownership over your Contributions. You retain full ownership of all of your Contributions and any intellectual property rights or other proprietary rights associated with your Contributions. We are not liable for any statements or representations in your Contributions provided by you in any area on the Services. You are solely responsible for your Contributions to the Services and you expressly agree to exonerate us from any and all responsibility and to refrain from any legal action against us regarding your Contributions.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nWe have the right, in our sole and absolute discretion, (1) to edit, redact, or otherwise change any Contributions; (2) to re-categorize any Contributions to place them in more appropriate locations on the Services; and (3) to pre-screen or delete any Contributions at any time and for any reason, without notice. We have no obligation to monitor your Contributions.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;b&gt; 10. SERVICES MANAGEMENT &lt;/b&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nWe reserve the right, but not the obligation, to: (1) monitor the Services for violations of these Legal Terms; (2) take appropriate legal action against anyone who, in our sole discretion, violates the law or these Legal Terms, including without limitation, reporting such user to law enforcement authorities; (3) in our sole discretion and without limitation, refuse, restrict access to, limit the availability of, or disable (to the extent technologically feasible) any of your Contributions or any portion thereof; (4) in our sole discretion and without limitation, notice, or liability, to remove from the Services or otherwise disable all files and content that are excessive in size or are in any way burdensome to our systems; and (5) otherwise manage the Services in a manner designed to protect our rights and property and to facilitate the proper functioning of the Services.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;b&gt; 11. PRIVACY POLICY &lt;/b&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nWe care about data privacy and security. Please review our Privacy Policy: __________. By using the Services, you agree to be bound by our Privacy Policy, which is incorporated into these Legal Terms. Please be advised the Services are hosted in the Philippines. If you access the Services from any other region of the world with laws or other requirements governing personal data collection, use, or disclosure that differ from applicable laws in the Philippines, then through your continued use of the Services, you are transferring your data to the Philippines, and you expressly consent to have your data transferred to and processed in the Philippines.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;b&gt; 12. TERM AND TERMINATION &lt;/b&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nThese Legal Terms shall remain in full force and effect while you use the Services. WITHOUT LIMITING ANY OTHER PROVISION OF THESE LEGAL TERMS, WE RESERVE THE RIGHT TO, IN OUR SOLE DISCRETION AND WITHOUT NOTICE OR LIABILITY, DENY ACCESS TO AND USE OF THE SERVICES (INCLUDING BLOCKING CERTAIN IP ADDRESSES), TO ANY PERSON FOR ANY REASON OR FOR NO REASON, INCLUDING WITHOUT LIMITATION FOR BREACH OF ANY REPRESENTATION, WARRANTY, OR COVENANT CONTAINED IN THESE LEGAL TERMS OR OF ANY APPLICABLE LAW OR REGULATION. WE MAY TERMINATE YOUR USE OR PARTICIPATION IN THE SERVICES OR DELETE YOUR ACCOUNT AND ANY CONTENT OR INFORMATION THAT YOU POSTED AT ANY TIME, WITHOUT WARNING, IN OUR SOLE DISCRETION.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nIf we terminate or suspend your account for any reason, you are prohibited from registering and creating a new account under your name, a fake or borrowed name, or the name of any third party, even if you may be acting on behalf of the third party. In addition to terminating or suspending your account, we reserve the right to take appropriate legal action, including without limitation pursuing civil, criminal, and injunctive redress.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;b&gt; 13. MODIFICATIONS AND INTERRUPTIONS &lt;/b&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nWe reserve the right to change, modify, or remove the contents of the Services at any time or for any reason at our sole discretion without notice. However, we have no obligation to update any information on our Services. We also reserve the right to modify or discontinue all or part of the Services without notice at any time. We will not be liable to you or any third party for any modification, price change, suspension, or discontinuance of the Services.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nWe cannot guarantee the Services will be available at all times. We may experience hardware, software, or other problems or need to perform maintenance related to the Services, resulting in interruptions, delays, or errors. We reserve the right to change, revise, update, suspend, discontinue, or otherwise modify the Services at any time or for any reason without notice to you. You agree that we have no liability whatsoever for any loss, damage, or inconvenience caused by your inability to access or use the Services during any downtime or discontinuance of the Services. Nothing in these Legal Terms will be construed to obligate us to maintain and support the Services or to supply any corrections, updates, or releases in connection therewith.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;b&gt; 14. GOVERNING LAW &lt;/b&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nThese Legal Terms shall be governed by and defined following the laws of __________. Sidyeys Print and Stuff and yourself irrevocably consent that the courts of __________ shall have exclusive jurisdiction to resolve any dispute which may arise in connection with these Legal Terms.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;b&gt; 15. DISPUTE RESOLUTION &lt;/b&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nYou agree to irrevocably submit all disputes related to these Legal Terms or the legal relationship established by these Legal Terms to the jurisdiction of the Philippines courts. Sidyeys Print and Stuff shall also maintain the right to bring proceedings as to the substance of the matter in the courts of the country where you reside or, if these Legal Terms are entered into in the course of your trade or profession, the state of your principal place of business.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;b&gt; 16. CORRECTIONS &lt;/b&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nThere may be information on the Services that contains typographical errors, inaccuracies, or omissions, including descriptions, pricing, availability, and various other information. We reserve the right to correct any errors, inaccuracies, or omissions and to change or update the information on the Services at any time, without prior notice.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;b&gt; 17. DISCLAIMER &lt;/b&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nTHE SERVICES ARE PROVIDED ON AN AS-IS AND AS-AVAILABLE BASIS. YOU AGREE THAT YOUR USE OF THE SERVICES WILL BE AT YOUR SOLE RISK. TO THE FULLEST EXTENT PERMITTED BY LAW, WE DISCLAIM ALL WARRANTIES, EXPRESS OR IMPLIED, IN CONNECTION WITH THE SERVICES AND YOUR USE THEREOF, INCLUDING, WITHOUT LIMITATION, THE IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, AND NON-INFRINGEMENT. \r\n&lt;br&gt;\r\n&lt;br&gt; \r\nWE MAKE NO WARRANTIES OR REPRESENTATIONS ABOUT THE ACCURACY OR COMPLETENESS OF THE SERVICES&#039; CONTENT OR THE CONTENT OF ANY WEBSITES OR MOBILE APPLICATIONS LINKED TO THE SERVICES AND WE WILL ASSUME NO LIABILITY OR RESPONSIBILITY FOR ANY (1) ERRORS, MISTAKES, OR INACCURACIES OF CONTENT AND MATERIALS, (2) PERSONAL INJURY OR PROPERTY DAMAGE, OF ANY NATURE WHATSOEVER, RESULTING FROM YOUR ACCESS TO AND USE OF THE SERVICES, (3) ANY UNAUTHORIZED ACCESS TO OR USE OF OUR SECURE SERVERS AND/OR ANY AND ALL PERSONAL INFORMATION AND/OR FINANCIAL INFORMATION STORED THEREIN, (4) ANY INTERRUPTION OR CESSATION OF TRANSMISSION TO OR FROM THE SERVICES, (5) ANY BUGS, VIRUSES, TROJAN HORSES, OR THE LIKE WHICH MAY BE TRANSMITTED TO OR THROUGH THE SERVICES BY ANY THIRD PARTY, AND/OR (6) ANY ERRORS OR OMISSIONS IN ANY CONTENT AND MATERIALS OR FOR ANY LOSS OR DAMAGE OF ANY KIND INCURRED AS A RESULT OF THE USE OF ANY CONTENT POSTED, TRANSMITTED, OR OTHERWISE MADE AVAILABLE VIA THE SERVICES. WE DO NOT WARRANT, ENDORSE, GUARANTEE, OR ASSUME RESPONSIBILITY FOR ANY PRODUCT OR SERVICE ADVERTISED OR OFFERED BY A THIRD PARTY THROUGH THE SERVICES, ANY HYPERLINKED WEBSITE, OR ANY WEBSITE OR MOBILE APPLICATION FEATURED IN ANY BANNER OR OTHER ADVERTISING, AND WE WILL NOT BE A PARTY TO OR IN ANY WAY BE RESPONSIBLE FOR MONITORING ANY TRANSACTION BETWEEN YOU AND ANY THIRD-PARTY PROVIDERS OF PRODUCTS OR SERVICES. \r\n&lt;br&gt;\r\n&lt;br&gt;\r\nAS WITH THE PURCHASE OF A PRODUCT OR SERVICE THROUGH ANY MEDIUM OR IN ANY ENVIRONMENT, YOU SHOULD USE YOUR BEST JUDGMENT AND EXERCISE CAUTION WHERE APPROPRIATE.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;b&gt; 18. LIMITATIONS OF LIABILITY &lt;/b&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nIN NO EVENT WILL WE OR OUR DIRECTORS, EMPLOYEES, OR AGENTS BE LIABLE TO YOU OR ANY THIRD PARTY FOR ANY DIRECT, INDIRECT, CONSEQUENTIAL, EXEMPLARY, INCIDENTAL, SPECIAL, OR PUNITIVE DAMAGES, INCLUDING LOST PROFIT, LOST REVENUE, LOSS OF DATA, OR OTHER DAMAGES ARISING FROM YOUR USE OF THE SERVICES, EVEN IF WE HAVE BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;b&gt; 19. INDEMNIFICATION &lt;/b&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nYou agree to defend, indemnify, and hold us harmless, including our subsidiaries, affiliates, and all of our respective officers, agents, partners, and employees, from and against any loss, damage, liability, claim, or demand, including reasonable attorneys’ fees and expenses, made by any third party due to or arising out of: (1) your Contributions; (2) use of the Services; (3) breach of these Legal Terms; (4) any breach of your representations and warranties set forth in these Legal Terms; (5) your violation of the rights of a third party, including but not limited to intellectual property rights; or (6) any overt harmful act toward any other user of the Services with whom you connected via the Services. \r\n&lt;br&gt;\r\n&lt;br&gt;\r\nNotwithstanding the foregoing, we reserve the right, at your expense, to assume the exclusive defense and control of any matter for which you are required to indemnify us, and you agree to cooperate, at your expense, with our defense of such claims. We will use reasonable efforts to notify you of any such claim, action, or proceeding which is subject to this indemnification upon becoming aware of it.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;b&gt; 20. USER DATA &lt;/b&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nWe will maintain certain data that you transmit to the Services for the purpose of managing the performance of the Services, as well as data relating to your use of the Services. Although we perform regular routine backups of data, you are solely responsible for all data that you transmit or that relates to any activity you have undertaken using the Services. You agree that we shall have no liability to you for any loss or corruption of any such data, and you hereby waive any right of action against us arising from any such loss or corruption of such data.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;b&gt; 21. ELECTRONIC COMMUNICATIONS, TRANSACTIONS, AND SIGNATURES &lt;/b&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nVisiting the Services, sending us emails, and completing online forms constitute electronic communications. You consent to receive electronic communications, and you agree that all agreements, notices, disclosures, and other communications we provide to you electronically, via email and on the Services, satisfy any legal requirement that such communication be in writing. \r\n&lt;br&gt;\r\n&lt;br&gt;\r\nYOU HEREBY AGREE TO THE USE OF ELECTRONIC SIGNATURES, CONTRACTS, ORDERS, AND OTHER RECORDS, AND TO ELECTRONIC DELIVERY OF NOTICES, POLICIES, AND RECORDS OF TRANSACTIONS INITIATED OR COMPLETED BY US OR VIA THE SERVICES. You hereby waive any rights or requirements under any statutes, regulations, rules, ordinances, or other laws in any jurisdiction which require an original signature or delivery or retention of non-electronic records, or to payments or the granting of credits by any means other than electronic means.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;b&gt; 22. MISCELLANEOUS &lt;/b&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\nThese Legal Terms and any policies or operating rules posted by us on the Services or in respect to the Services constitute the entire agreement and understanding between you and us. Our failure to exercise or enforce any right or provision of these Legal Terms shall not operate as a waiver of such right or provision. \r\n&lt;br&gt;\r\n&lt;br&gt;\r\nThese Legal Terms operate to the fullest extent permissible by law. We may assign any or all of our rights and obligations to others at any time. We shall not be responsible or liable for any loss, damage, delay, or failure to act caused by any cause beyond our reasonable control. If any provision or part of a provision of these Legal Terms is determined to be unlawful, void, or unenforceable, that provision or part of the provision is deemed severable from these Legal Terms and does not affect the validity and enforceability of any remaining provisions. There is no joint venture, partnership, employment or agency relationship created between you and us as a result of these Legal Terms or use of the Services. \r\n&lt;br&gt;\r\n&lt;br&gt;\r\nYou agree that these Legal Terms will not be construed against us by virtue of having drafted them. You hereby waive any and all defenses you may have based on the electronic form of these Legal Terms and the lack of signing by the parties hereto to execute these Legal Terms.\r\n\r\n&lt;/center&gt;\r\n', 'hero-img.jpg', '&lt;b&gt; Sidyey’s Print and Stuff &lt;/b&gt; is a printing business operating in Barangay Langkiwa, Biñan, Laguna. It was founded in 2019 as a small business. Its customers back then were mostly students, and they only provide printing services such as photo printing, document printing, photocopy, rush id, scan, laminate, layout, and more. Back then, the business only offered meet-up and pick-up orders, and when the pandemic happened, they started promoting the business’ services through Facebook by creating their very own page, which opens a door for delivery services for those customers that do not live nearby.  However, to provide a more efficient way of receiving, recording, and processing daily transactions for Sidyey&#039;s Print and Stuff, this online site was created to further expand this business and build their own name.', '&gt;&gt;&gt; &lt;u&gt; &lt;b&gt;  WHAT SERVICES DO YOU OFFER? &lt;/b&gt; &lt;/u&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;b&gt; Answer: &lt;/b&gt; We offer a wide range of printing services, including photo frames, sintra board frames, cards, souveniers, sticker, and more.\r\n&lt;br&gt;\r\n &lt;br&gt; \r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&gt;&gt;&gt; &lt;u&gt; &lt;b&gt; WHAT ARE YOUR TURNAROUND TIMES? &lt;/b&gt; &lt;/u&gt;\r\n&lt;br&gt;\r\n &lt;br&gt;\r\n&lt;b&gt; Answer: &lt;/b&gt; Turnaround times vary depending on the project and quantity. We can provide you with estimated completion times when you place your order.\r\n&lt;br&gt;\r\n&lt;br&gt; \r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&gt;&gt;&gt; &lt;u&gt; &lt;b&gt; WHAT FILE FORMATS DO YOU ACCEPT FOR PRINTING? &lt;/b&gt; &lt;/u&gt;\r\n&lt;br&gt;\r\n &lt;br&gt;\r\n&lt;b&gt; Answer: &lt;/b&gt; We accept common file formats such as PDF, JPEG, PNG, and TIFF. Please ensure your files are high-resolution for best results. \r\n&lt;br&gt; \r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&gt;&gt;&gt; &lt;u&gt; &lt;b&gt; DO YOU OFFER DESIGN SERVICES? &lt;/b&gt; &lt;/u&gt;\r\n&lt;br&gt; \r\n&lt;br&gt;\r\n&lt;b&gt;  Answer: &lt;/b&gt; Yes, we have the design to offer or allowing the customer to customize their desired design. \r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&gt;&gt;&gt; &lt;u&gt; &lt;b&gt; DO YOU OFFER BULK OR WHOLESALE PRICING? &lt;/b&gt; &lt;/u&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;b&gt; Answer: &lt;/b&gt; Yes, we offer discounts for large quantity orders. Contact us for specific pricing on bulk orders. &lt;/b&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&gt;&gt;&gt; &lt;u&gt; &lt;b&gt; WHAT TYPES OF PAPER AND FINISHES ARE AVAILABLE &lt;/b&gt; &lt;/u&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;b&gt; Answer: &lt;/b&gt; We have a variety of paper stocks and finishes to choose from, including glossy, matte, and specialty options. Our staff can help you select the best choice for your project. \r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&gt;&gt;&gt; &lt;u&gt; &lt;b&gt;  CAN I PICK UP MY ORDER OR DO YOU OFFER DELIVERY? &lt;/b&gt; &lt;/u&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;b&gt; Answer: &lt;/b&gt; You can choose to pick up your order at our location, or we offer delivery services for a fee around our barangy or cuty. Please inquire about delivery options when placing your order. \r\n&lt;br&gt;\r\n&lt;br&gt; \r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&gt;&gt;&gt; &lt;u&gt; &lt;b&gt;  WHAT PAYMENT METHODS DO YOU ACCEPT? &lt;/b&gt; &lt;/u&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;b&gt; Answer: &lt;/b&gt; We accept Cash on Delivery (COD) only.\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&gt;&gt;&gt; &lt;u&gt; &lt;b&gt; DO YOU OFFER ANY GUARANTEES ON THE QUALITY OF YOUR PRINTS? &lt;/b&gt; &lt;/u&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;b&gt; Answer: &lt;/b&gt; Yes, we strive for high-quality prints and customer satisfaction. If you encounter any issues with your order, please contact us, and we will work to resolve them. \r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&gt;&gt;&gt; &lt;u&gt; &lt;b&gt; CAN I PLACE AN ORDER ONLINE OR DO I NEED TO VISIT YOUR STORE IN PERSON? &lt;/b&gt; &lt;/u&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;b&gt; Answer: &lt;/b&gt; You can place orders both online and in person. Our website allows for easy online ordering, but you&#039;re also welcome to visit our store for personalized assistance. \r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&gt;&gt;&gt; &lt;u&gt; &lt;b&gt; WHAT IS YOUR RETURN POLICY? &lt;/b&gt; &lt;/u&gt;\r\n&lt;br&gt;\r\n&lt;br&gt;\r\n&lt;b&gt; Answer: &lt;/b&gt; Our return policy varies depending on the circumstances and the nature of the order. Please contact us if you have any concerns about your order. \r\n');

-- --------------------------------------------------------

--
-- Table structure for table `pos_users`
--

CREATE TABLE `pos_users` (
  `user_id` int(12) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `profile` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pos_users`
--

INSERT INTO `pos_users` (`user_id`, `firstname`, `lastname`, `username`, `password`, `role`, `profile`, `date_added`) VALUES
(1, 'Christine Joy', 'Ocampo', 'admin', 'admin', 1, 'admin.jpg', '2022-03-02 13:35:25'),
(14, 'Kevin Jay Napoles', 'Bordeos', 'mikecoros02', 'mikecoros02', 2, '', '2023-10-11 03:20:29');

-- --------------------------------------------------------

--
-- Table structure for table `tracking_orders`
--

CREATE TABLE `tracking_orders` (
  `id` int(12) NOT NULL,
  `order_id` int(12) NOT NULL,
  `status` text NOT NULL,
  `proof` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tracking_orders`
--

INSERT INTO `tracking_orders` (`id`, `order_id`, `status`, `proof`, `date_added`) VALUES
(1, 28, 'Order Approved', '', '2023-10-10 14:52:19'),
(2, 28, 'Qoutation Approved', '', '2023-10-10 15:08:08'),
(3, 28, 'Qoutation Sent for Approval', '', '2023-10-10 15:08:40'),
(4, 28, 'Qoutation Approved', '', '2023-10-10 15:08:43'),
(7, 28, 'Order Ready for Delivery', '254656102_147483784270364_6460982872758558786_n.jpg', '2023-10-10 15:26:57'),
(8, 28, 'Order Completed!', '', '2023-10-10 15:27:34'),
(9, 1, 'Order Ready for Delivery', '', '2023-10-11 03:11:37'),
(10, 1, 'Order Received', '', '2023-10-11 03:43:30'),
(11, 23, 'Qoutation Sent for Approval', '', '2023-10-11 10:30:58'),
(12, 28, 'Qoutation Approved', '', '2023-10-11 11:00:53'),
(13, 28, 'Order Received', '', '2023-10-11 11:06:46'),
(14, 23, 'Qoutation Approved', '', '2023-10-11 11:11:27'),
(15, 23, 'Order Received', '', '2023-10-11 11:12:20'),
(16, 1, 'Order Completed!', '', '2023-10-11 11:12:34'),
(17, 4, 'Qoutation Sent for Approval', '', '2023-10-11 11:13:05'),
(18, 4, 'Qoutation Sent for Approval', '', '2023-10-11 11:13:36'),
(19, 4, 'Qoutation Approved', '', '2023-10-11 11:13:47'),
(20, 4, 'Order Ready for Delivery', '78686741_2684267908262426_1327642359051059200_n.jpg', '2023-10-11 11:14:30'),
(21, 4, 'Order Received', '', '2023-10-11 11:14:39'),
(22, 4, 'Order Completed!', '', '2023-10-11 11:14:47'),
(23, 1, 'Qoutation Declined', '', '2023-10-14 16:15:00'),
(24, 1, 'Qoutation Sent for Approval', '', '2023-10-14 16:18:23'),
(25, 1, 'Qoutation Declined', '', '2023-10-14 16:18:35'),
(26, 1, 'Qoutation Sent for Approval', '', '2023-10-14 16:21:45'),
(27, 1, 'Service Cancelled', '', '2023-10-14 16:23:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pos_checkout_order`
--
ALTER TABLE `pos_checkout_order`
  ADD PRIMARY KEY (`checkout_id`);

--
-- Indexes for table `pos_customer`
--
ALTER TABLE `pos_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `pos_inventory`
--
ALTER TABLE `pos_inventory`
  ADD PRIMARY KEY (`inventory_id`);

--
-- Indexes for table `pos_items`
--
ALTER TABLE `pos_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `pos_item_category`
--
ALTER TABLE `pos_item_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `pos_order`
--
ALTER TABLE `pos_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `pos_settings`
--
ALTER TABLE `pos_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos_users`
--
ALTER TABLE `pos_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tracking_orders`
--
ALTER TABLE `tracking_orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pos_checkout_order`
--
ALTER TABLE `pos_checkout_order`
  MODIFY `checkout_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos_customer`
--
ALTER TABLE `pos_customer`
  MODIFY `customer_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pos_inventory`
--
ALTER TABLE `pos_inventory`
  MODIFY `inventory_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pos_items`
--
ALTER TABLE `pos_items`
  MODIFY `item_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos_item_category`
--
ALTER TABLE `pos_item_category`
  MODIFY `category_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pos_order`
--
ALTER TABLE `pos_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pos_settings`
--
ALTER TABLE `pos_settings`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pos_users`
--
ALTER TABLE `pos_users`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tracking_orders`
--
ALTER TABLE `tracking_orders`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
