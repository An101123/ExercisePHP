-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: db
-- Thời gian đã tạo: Th1 15, 2021 lúc 10:15 AM
-- Phiên bản máy phục vụ: 5.6.50
-- Phiên bản PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `product`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `id_orderdetail` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`id`, `name`, `quantity`, `size`, `price`) VALUES
(1034111373, 'Nike 1', 1, 'S', 13200),
(114374510, 'Nike 2', 1, 'S', 13200),
(92569701, 'Nike 3', 1, 'S', 15000),
(1034111373, 'Nike 1', 1, 'S', 13200),
(114374510, 'Nike 2', 1, 'S', 13200),
(92569701, 'Nike 3', 1, 'S', 15000),
(967681222, 'Nike 2', 1, 'S', 13200),
(627902080, 'Nike 1', 1, 'S', 13200),
(1456322761, 'Nike 1', 1, 'S', 13200),
(1037138488, 'Nike 1', 1, 'S', 13200),
(211758291, 'Nike 1', 1, 'S', 13200),
(2037299668, 'Nike 1', 1, 'S', 13200),
(1076756400, 'Nike 1', 1, 'S', 13200);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `image`, `price`) VALUES
(1, 'Nike 1', 'Consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequaturuis autem vel eum iure reprehenderit qui in ea voluptate velit es quam nihil molestiae consequr, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/573032ea-85c3-4279-9a3f-60fce7d11591/%E3%83%8A%E3%82%A4%E3%82%AD-%E3%82%A8%E3%82%A2-%E3%83%95%E3%82%A9%E3%83%BC%E3%82%B9-1-07-60-%E3%82%A6%E3%82%A3%E3%83%A1%E3%83%B3%E3%82%BA%E3%82%B7%E3%83%A5%E3%83%BC%E3%82%BA-xzTXLj.jpg', 13200),
(2, 'Nike 2', 'Consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequaturuis autem vel eum iure reprehenderit qui in ea voluptate velit es quam nihil molestiae consequr, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/7ad9a4ea-9825-44e9-8819-ad5cf1d5bf34/%E3%83%8A%E3%82%A4%E3%82%AD-%E3%82%A8%E3%82%A2-%E3%83%95%E3%82%A9%E3%83%BC%E3%82%B9-1-07-60-%E3%83%A1%E3%83%B3%E3%82%BA%E3%82%B7%E3%83%A5%E3%83%BC%E3%82%BA-tNT4KR.jpg', 13200),
(3, 'Nike 3', 'Consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequaturuis autem vel eum iure reprehenderit qui in ea voluptate velit es quam nihil molestiae consequr, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/e6e2c687-7c4a-4e02-9476-0fb67d948376/%E3%83%8A%E3%82%A4%E3%82%AD-%E3%82%A8%E3%82%A2-%E3%83%95%E3%82%A9%E3%83%BC%E3%82%B9-1-07-60-%E3%83%A1%E3%83%B3%E3%82%BA%E3%82%B7%E3%83%A5%E3%83%BC%E3%82%BA-fG0mB8.jpg', 15000),
(4, 'Nike 4', 'Consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequaturuis autem vel eum iure reprehenderit qui in ea voluptate velit es quam nihil molestiae consequr, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/ff33dc72-164c-4c30-9134-1b78c7c55456/%E3%83%8A%E3%82%A4%E3%82%AD-%E3%82%A8%E3%82%A2-%E3%83%95%E3%82%A9%E3%83%BC%E3%82%B9-1-07-se-%E3%82%A6%E3%82%A3%E3%83%A1%E3%83%B3%E3%82%BA%E3%82%B7%E3%83%A5%E3%83%BC%E3%82%BA-zscfVQ.jpg', 12000),
(5, 'Nike 5', 'Consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et\r\n                                dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum\r\n                                exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi\r\n                                consequaturuis autem vel eum iure reprehenderit qui in ea voluptate velit es quam nihil\r\n                                molestiae consequr, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/caee5d8c-825f-47d3-875a-f98fd0c825d5/%E3%83%8A%E3%82%A4%E3%82%AD-%E3%82%A8%E3%82%A2-%E3%83%95%E3%82%A9%E3%83%BC%E3%82%B9-1-07-se-%E3%82%A6%E3%82%A3%E3%83%A1%E3%83%B3%E3%82%BA%E3%82%B7%E3%83%A5%E3%83%BC%E3%82%BA-GSDgLQ.jpg', 150000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucher`
--

CREATE TABLE `voucher` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `voucher`
--

INSERT INTO `voucher` (`id`, `title`, `discount`) VALUES
(1, 'Discount 20%', 20),
(2, 'Discount 15%', 15),
(3, 'Discount 10%', 10);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
