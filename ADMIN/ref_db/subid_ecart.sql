-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2020 at 08:23 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `subid_ecart`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories_by_gender`
--

CREATE TABLE `categories_by_gender` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories_by_gender`
--

INSERT INTO `categories_by_gender` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(1, 'Men', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat'),
(2, 'Women', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat'),
(3, 'Kids', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_img` text NOT NULL,
  `customer_ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `date`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_img`, `customer_ip`) VALUES
(16, 'Suman', 'sumandats@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '2019-10-27 20:18:36', 'India', 'Kolkata', '789897546', 'dasdasdqewqtrgdhd', 'IMG_20160202_140124.jpg', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`order_id`, `customer_id`, `due_amount`, `order_no`, `qty`, `order_date`, `order_status`) VALUES
(10, 16, 598, '#550566/10/11/19', 2, '2019-11-09 18:41:41', 'pending'),
(11, 16, 697, '#763469/13/11/19', 3, '2019-11-13 08:15:21', 'pending'),
(12, 16, 559, '#873043/21/11/19', 3, '2019-11-21 15:17:38', 'pending'),
(14, 16, 1023, '#304906/21/11/19', 6, '2019-11-21 15:37:15', 'pending'),
(15, 16, 1134, '#670911/20/12/19', 3, '2019-12-19 20:37:50', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_contact` int(10) NOT NULL,
  `customer_city` varchar(255) NOT NULL,
  `customer_country` varchar(255) NOT NULL,
  `order_status` varchar(10) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_no`, `product_id`, `product_keywords`, `p_cat_id`, `qty`, `size`, `price`, `customer_id`, `customer_email`, `customer_address`, `customer_contact`, `customer_city`, `customer_country`, `order_status`, `order_date`) VALUES
(27, '#550566/10/11/19', 8, 'Jackets', 1, 2, 'medium', 598, 16, 'sumandats@gmail.com', 'dasdasdqewqtrgdhd', 789897546, 'Kolkata', 'India', 'pending', '2019-11-09 18:41:41'),
(28, '#763469/13/11/19', 13, 'Jeans', 4, 1, 'large', 99, 16, 'sumandats@gmail.com', 'dasdasdqewqtrgdhd', 789897546, 'Kolkata', 'India', 'pending', '2019-11-13 08:15:21'),
(29, '#763469/13/11/19', 8, 'Jackets', 1, 2, 'medium', 598, 16, 'sumandats@gmail.com', 'dasdasdqewqtrgdhd', 789897546, 'Kolkata', 'India', 'pending', '2019-11-13 08:15:21'),
(30, '#873043/21/11/19', 8, 'Jackets', 1, 1, 'medium', 299, 16, 'sumandats@gmail.com', 'dasdasdqewqtrgdhd', 789897546, 'Kolkata', 'India', 'pending', '2019-11-21 15:17:38'),
(31, '#873043/21/11/19', 1, 'T-Shirts', 5, 2, 'large', 260, 16, 'sumandats@gmail.com', 'dasdasdqewqtrgdhd', 789897546, 'Kolkata', 'India', 'pending', '2019-11-21 15:17:38'),
(33, '#304906/21/11/19', 16, 'Jeans', 4, 2, 'medium', 170, 16, 'sumandats@gmail.com', 'dasdasdqewqtrgdhd', 789897546, 'Kolkata', 'India', 'pending', '2019-11-21 15:37:15'),
(34, '#304906/21/11/19', 1, 'T-Shirts', 5, 1, 'medium', 130, 16, 'sumandats@gmail.com', 'dasdasdqewqtrgdhd', 789897546, 'Kolkata', 'India', 'pending', '2019-11-21 15:37:15'),
(35, '#304906/21/11/19', 8, 'Jackets', 1, 2, 'large', 598, 16, 'sumandats@gmail.com', 'dasdasdqewqtrgdhd', 789897546, 'Kolkata', 'India', 'pending', '2019-11-21 15:37:15'),
(36, '#304906/21/11/19', 10, 'Jeans', 4, 1, 'medium', 125, 16, 'sumandats@gmail.com', 'dasdasdqewqtrgdhd', 789897546, 'Kolkata', 'India', 'pending', '2019-11-21 15:37:15'),
(37, '#670911/20/12/19', 7, 'Jackets', 1, 3, 'medium', 1134, 16, 'sumandats@gmail.com', 'dasdasdqewqtrgdhd', 789897546, 'Kolkata', 'India', 'pending', '2019-12-19 20:37:50');

-- --------------------------------------------------------

--
-- Table structure for table `productbrand`
--

CREATE TABLE `productbrand` (
  `brand_id` int(10) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productbrand`
--

INSERT INTO `productbrand` (`brand_id`, `brand_name`, `p_cat_id`, `cat_id`) VALUES
(1, 'JAINISH', 4, 1),
(2, 'Trendy Trotters', 4, 1),
(3, 'Pepe Jeans', 4, 1),
(4, 'NEWPORT', 4, 1),
(5, 'fourgee', 4, 2),
(6, 'BLINKIN', 4, 2),
(7, 'FNOCKS', 4, 2),
(8, 'Lee', 4, 2),
(9, 'CERO', 5, 1),
(10, 'Hangout Hub', 5, 1),
(11, 'Spoilx', 5, 1),
(12, 'Generic', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL,
  `product_brand` int(5) NOT NULL,
  `product_status` int(1) NOT NULL COMMENT '0=not_in_stock, 1=in_stock',
  `views` int(10) NOT NULL,
  `approval` int(2) NOT NULL COMMENT '0= not approved, 1 = approved'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keywords`, `product_brand`, `product_status`, `views`, `approval`) VALUES
(1, 5, 1, '2020-02-05 16:10:11', 'Men\'s Solid Regular fit T-Shirt', 'product-1.jpg', 'product-2.jpg', 'product-3.jpg', 130, '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id efficitur ante. Etiam ullamcorper volutpat nisi ut convallis. Ut et vulputate mi. Sed ut accumsan dui. Nullam tristique urna et quam posuere suscipit. In hac habitasse platea dictumst. Nunc egestas ac odio sit amet</span> dapibus</p>', 'T-Shirts', 9, 1, 13, 1),
(2, 1, 2, '2020-02-12 16:49:44', 'Jeans Women\'s Full Sleeves Denim Jacket with Button Closure', 'Next-Denim-Borg-Lined-Western-Jacket-0463-0064553-1-pdp_slider_l.jpg', 'Next-Denim-Borg-Lined-Western-Jacket-0463-0064553-2-pdp_slider_l.jpg', 'Next-Denim-Borg-Lined-Western-Jacket-0465-0064553-3-pdp_slider_l.jpg', 142, '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id efficitur ante. Etiam ullamcorper volutpat nisi ut convallis. Ut et vulputate mi. Sed ut accumsan dui. Nullam tristique urna et quam posuere suscipit. In hac habitasse platea dictumst. Nunc egestas ac odio sit amet dapibus</span></p>', 'Jackets', 0, 1, 10, 0),
(3, 6, 1, '2020-02-12 16:10:11', 'Vandnam Slim Fit Men\'s Polycotton Checks Formal Trouser Pants', '1.jpg', '2.jpg', '3.jpg', 270, '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id efficitur ante. Etiam ullamcorper volutpat nisi ut convallis. Ut et vulputate mi. Sed ut accumsan dui. Nullam tristique urna et quam posuere suscipit. In hac habitasse platea dictumst. Nunc egestas ac odio sit amet dapibus.</span></p>', 'Men\'s Formal Trousers', 0, 1, 0, 1),
(4, 1, 1, '2020-02-12 16:10:11', 'Sports and Casual Track Jacket for Men and Women', 'jacket-1.jpg', 'jacket-2.jpg', 'jacket-3.jpg', 72, '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id efficitur ante. Etiam ullamcorper volutpat nisi ut convallis. Ut et vulputate mi. Sed ut accumsan dui. Nullam tristique urna et quam posuere suscipit. In hac habitasse platea dictumst. Nunc egestas ac odio sit amet dapibus.</span></p>', 'Jackets', 0, 1, 0, 1),
(5, 5, 1, '2020-02-12 16:10:11', 'Mens Cotton Half Sleeve Striped Polo T Shirt with Collar Blue & White', 'United-Colors-of-Benetton-White-Polo-Shirt-0608-0914361-1-pdp_slider_l.jpg', 'United-Colors-of-Benetton-White-Polo-Shirt-0608-0914361-2-pdp_slider_l.jpg', 'United-Colors-of-Benetton-White-Polo-Shirt-0609-0914361-3-pdp_slider_l.jpg', 200, '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id efficitur ante. Etiam ullamcorper volutpat nisi ut convallis. Ut et vulputate mi. Sed ut accumsan dui. Nullam tristique urna et quam posuere suscipit. In hac habitasse platea dictumst. Nunc egestas ac odio sit amet dapibus.</span></p>', 'T-Shirts', 10, 1, 0, 1),
(6, 5, 1, '2020-02-12 16:50:09', 'Men\'s Cotton T-Shirt', 'img1.jpg', 'img2 (1).jpg', 'img2.jpg', 250, '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id efficitur ante. Etiam ullamcorper volutpat nisi ut convallis. Ut et vulputate mi. Sed ut accumsan dui. Nullam tristique urna et quam posuere suscipit. In hac habitasse platea dictumst. Nunc egestas ac odio sit amet dapibus.</span></p>', 'T-Shirts', 9, 1, 9, 0),
(7, 1, 2, '2020-02-12 16:10:11', 'Women Winter Warm Faux Fur Coat Outwear Thick Warm Jacket Overcoat', 'coat1.jpg', 'coat2.jpg', 'coat3.jpg', 378, '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id efficitur ante. Etiam ullamcorper volutpat nisi ut convallis. Ut et vulputate mi. Sed ut accumsan dui. Nullam tristique urna et quam posuere suscipit. In hac habitasse platea dictumst. Nunc egestas ac odio sit amet dapibus.</span></p>', 'Jackets', 0, 1, 8, 1),
(8, 1, 1, '2020-02-12 16:10:11', 'Blue Star Half Sleeve Self Design Men\'s Denim Jacket', 'Levi-s-Blue-Solid-Denim-Jacket-5953-6506172-1-pdp_slider_l.jpg', 'Levi-s-Blue-Solid-Denim-Jacket-5953-6506172-2-pdp_slider_l.jpg', 'Levi-s-Blue-Solid-Denim-Jacket-5953-6506172-3-pdp_slider_l.jpg', 299, '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id efficitur ante. Etiam ullamcorper volutpat nisi ut convallis. Ut et vulputate mi. Sed ut accumsan dui. Nullam tristique urna et quam posuere suscipit. In hac habitasse platea dictumst. Nunc egestas ac odio sit amet dapibus.</span></p>', 'Jackets', 0, 1, 15, 1),
(9, 4, 1, '2020-02-12 16:49:50', 'Ben Martin Men\'s Regular Fit Denim Jeans', 'jeans1_1.jpg', 'jeans1_2.jpg', 'jeans1_3.jpg', 236, '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras in consequat quam. Aenean ligula risus, aliquam eget nibh eget, blandit aliquam odio. Suspendisse potenti. Sed eget volutpat mi. Fusce auctor id ex ac aliquet. Donec interdum lorem metus, at faucibus urna congue tempus. Phasellus dictum, dolor nec convallis lacinia, arcu dolor feugiat lacus, ac dignissim risus sem ac justo. Cras aliquam eget tellus id commodo. Fusce&nbsp;</span></p>', 'Jeans', 1, 1, 11, 0),
(10, 4, 1, '2020-02-12 16:10:11', 'HOFFMEN Men\'s Straight Relaxed Fit Denimax Colour Silky Jeans', 'j2_1.jpg', 'j2_2.jpg', 'j2_3.jpg', 125, '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras in consequat quam. Aenean ligula risus, aliquam eget nibh eget, blandit aliquam odio. Suspendisse potenti. Sed eget volutpat mi. Fusce auctor id ex ac aliquet. Donec interdum lorem metus, at faucibus urna congue tempus. Phasellus dictum, dolor nec convallis lacinia, arcu dolor feugiat lacus, ac dignissim risus sem ac justo. Cras aliquam eget tellus id commodo. Fusce&nbsp;</span></p>', 'Jeans', 2, 1, 3, 1),
(11, 4, 1, '2020-02-12 16:10:11', 'Amazon Brand - Symbol Men\'s Relaxed Fit Jeans  4.6 out of 5 stars', 'j3_1.jpg', 'j3_2.jpg', 'j3_3.jpg', 199, '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras in consequat quam. Aenean ligula risus, aliquam eget nibh eget, blandit aliquam odio. Suspendisse potenti. Sed eget volutpat mi. Fusce auctor id ex ac aliquet. Donec interdum lorem metus, at faucibus urna congue tempus. Phasellus dictum, dolor nec convallis lacinia, arcu dolor feugiat lacus, ac dignissim risus sem ac justo. Cras aliquam eget tellus id commodo. Fusce&nbsp;</span></p>', 'Jeans', 3, 1, 1, 1),
(12, 4, 1, '2020-02-12 16:49:52', 'STUDIO NEXX Men\'s Light Blue Regular fit Jeans', 'j6_1.jpg', 'j6_2.jpg', 'j6_3.jpg', 221, '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel rhoncus nisl, in rutrum quam. Ut viverra posuere tristique. Etiam laoreet porttitor tincidunt. Aliquam suscipit consequat odio. Vivamus blandit luctus felis, at pulvinar orci venenatis in. Pellentesque volutpat nec sem at dictum. Interdum et malesuada fames ac ante ipsum primis in faucibus.</span></p>', 'Jeans', 4, 1, 17, 0),
(13, 4, 1, '2020-02-12 16:10:11', 'AOLOPY-9 Men\'s Cotton Trouser', 'j5_1.jpg', 'j5_2.jpg', 'j5_3.jpg', 99, '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel rhoncus nisl, in rutrum quam. Ut viverra posuere tristique. Etiam laoreet porttitor tincidunt. Aliquam suscipit consequat odio. Vivamus blandit luctus felis, at pulvinar orci venenatis in. Pellentesque volutpat nec sem at dictum. Interdum et malesuada fames ac ante ipsum primis in faucibus.</span></p>', 'Jeans', 1, 1, 6, 1),
(14, 4, 2, '2020-02-12 16:10:11', 'Broadstar Women Denim Black Jeans', 'j7.1.jpg', 'j7.2.jpg', 'j7.3.jpg', 70, '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel rhoncus nisl, in rutrum quam. Ut viverra posuere tristique. Etiam laoreet porttitor tincidunt. Aliquam suscipit consequat odio. Vivamus blandit luctus felis, at pulvinar orci venenatis in. Pellentesque volutpat nec sem at dictum. Interdum et malesuada fames ac ante ipsum primis in faucibus.</span></p>', 'Jeans', 5, 1, 36, 1),
(15, 4, 2, '2020-02-12 16:49:55', 'Nifty Women\'s Slim Fit Jeans', 'j8.1.jpg', 'j8.2.jpg', 'j8.3.jpg', 155, '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel rhoncus nisl, in rutrum quam. Ut viverra posuere tristique. Etiam laoreet porttitor tincidunt. Aliquam suscipit consequat odio. Vivamus blandit luctus felis, at pulvinar orci venenatis in. Pellentesque volutpat nec sem at dictum. Interdum et malesuada fames ac ante ipsum primis in faucibus.</span></p>', 'Jeans', 6, 1, 5, 0),
(16, 4, 2, '2020-02-12 16:10:11', 'Mesh Casual Jeggings for Womens and Girls', 'j9.1.jpg', 'j9.2.jpg', 'j9.3.jpg', 85, '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel rhoncus nisl, in rutrum quam. Ut viverra posuere tristique. Etiam laoreet porttitor tincidunt. Aliquam suscipit consequat odio. Vivamus blandit luctus felis, at pulvinar orci venenatis in. Pellentesque volutpat nec sem at dictum. Interdum et malesuada fames ac ante ipsum primis in faucibus.</span></p>', 'Jeans', 5, 1, 34, 1),
(17, 4, 2, '2020-02-12 16:50:05', 'DAMEN MODE Women\'s Tights', 'j10.1.jpg', 'j10.2.jpg', 'j10.3.jpg', 123, '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel rhoncus nisl, in rutrum quam. Ut viverra posuere tristique. Etiam laoreet porttitor tincidunt. Aliquam suscipit consequat odio. Vivamus blandit luctus felis, at pulvinar orci venenatis in. Pellentesque volutpat nec sem at dictum. Interdum et malesuada fames ac ante ipsum primis in faucibus.</span></p>', 'Jeans', 6, 1, 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(1, 'Jackets', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat'),
(2, 'Computer Accessories', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat'),
(3, 'Shoes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat'),
(4, 'Jeans', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat'),
(5, 'T-Shirts', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat'),
(6, 'Men\'s Formal Trousers', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id efficitur ante. Etiam ullamcorper volutpat nisi ut convallis. Ut et vulputate mi');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_location`
--

CREATE TABLE `shipping_location` (
  `id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_contact` int(10) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_city` varchar(255) NOT NULL,
  `customer_country` varchar(255) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `near_location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping_location`
--

INSERT INTO `shipping_location` (`id`, `customer_id`, `customer_name`, `customer_email`, `customer_contact`, `customer_address`, `customer_city`, `customer_country`, `order_no`, `near_location`) VALUES
(3, 16, 'Suman', 'sumandats@gmail.com', 789897546, 'dasdasdqewqtrgdhd', 'Kolkata', 'India', '#550566/10/11/19', ''),
(4, 16, 'Suman', 'sumandats@gmail.com', 789897546, 'dasdasdqewqtrgdhd', 'Kolkata', 'India', '#763469/13/11/19', ''),
(5, 16, 'Suman', 'sumandats@gmail.com', 789897546, 'dasdasdqewqtrgdhd', 'Kolkata', 'India', '#873043/21/11/19', ''),
(6, 16, 'Suman', 'sumandats@gmail.com', 789897546, 'dasdasdqewqtrgdhd', 'Kolkata', 'India', '#953007/21/11/19', ''),
(7, 16, 'Suman', 'sumandats@gmail.com', 789897546, 'dasdasdqewqtrgdhd', 'Kolkata', 'India', '#304906/21/11/19', ''),
(8, 16, 'Suman', 'sumandats@gmail.com', 789897546, 'dasdasdqewqtrgdhd', 'Kolkata', 'India', '#670911/20/12/19', '');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`) VALUES
(1, 'slide number 1', '1.jpg'),
(2, 'slide number 2', '2.jpg'),
(3, 'slide number 3', '4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories_by_gender`
--
ALTER TABLE `categories_by_gender`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productbrand`
--
ALTER TABLE `productbrand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `shipping_location`
--
ALTER TABLE `shipping_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories_by_gender`
--
ALTER TABLE `categories_by_gender`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `productbrand`
--
ALTER TABLE `productbrand`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shipping_location`
--
ALTER TABLE `shipping_location`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
