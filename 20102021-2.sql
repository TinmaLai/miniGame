-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 20, 2021 lúc 03:11 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `20102021`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `choigame1`
--

CREATE TABLE `choigame1` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `choigame1`
--

INSERT INTO `choigame1` (`id`, `name`) VALUES
(1, 'tinpro'),
(2, 'louis vutton'),
(3, 'louis vutton'),
(4, 'louis vutton'),
(5, 'louis vutton'),
(6, 'louis vutton'),
(7, 'louis vutton'),
(8, 'louis vutton'),
(9, 'pro'),
(10, 'pro'),
(11, 'pro'),
(12, 'pro'),
(13, 'pro'),
(14, 'pro'),
(15, 'pro'),
(16, 'pro'),
(17, 'pro'),
(18, 'pro'),
(19, 'pro'),
(20, 'pro'),
(21, 'pro'),
(22, 'pro'),
(23, 'pro'),
(24, 'pro'),
(25, 'pro'),
(26, 'pro'),
(27, 'pro'),
(28, 'pro'),
(29, 'pro'),
(30, 'pro'),
(31, 'pro'),
(32, 'pro'),
(33, 'pro'),
(34, 'pro'),
(35, 'pro'),
(36, 'pro'),
(37, 'pro'),
(38, 'pro'),
(39, 'pro'),
(40, 'pro'),
(41, 'pro'),
(42, 'pro'),
(43, 'pro'),
(44, 'pro'),
(45, 'pro'),
(46, 'louis vutton'),
(47, 'louis vutton'),
(48, 'louis vutton'),
(49, 'louis vutton'),
(50, 'adaf'),
(51, 'adaf'),
(52, 'adaf'),
(53, 'adaf'),
(54, 'adaf'),
(55, 'adaf'),
(56, 'adaf'),
(57, 'adaf'),
(58, 'adaf'),
(59, 'louis vutton'),
(60, 'tét'),
(61, 'téttỉp'),
(62, 'téttỉp'),
(63, 'téttỉp'),
(64, 'téttỉp'),
(65, 'téttỉp'),
(66, 'téttỉp'),
(67, 'téttỉp'),
(68, 'téttỉp'),
(69, 'téttỉp'),
(70, 'téttỉp'),
(71, 'téttỉp'),
(72, 'téttỉp'),
(73, 'téttỉp'),
(74, 'téttỉp'),
(75, 'téttỉp'),
(76, 'téttỉp'),
(77, 'téttỉp'),
(78, 'téttỉp'),
(79, 'téttỉp'),
(80, 'téttỉp'),
(81, 'téttỉp'),
(82, 'téttỉp'),
(83, 'téttỉp'),
(84, 'téttỉp'),
(85, 'téttỉp'),
(86, 'téttỉp'),
(87, 'téttỉp'),
(88, 'téttỉp'),
(89, 'téttỉp'),
(90, 'téttỉp'),
(91, 'téttỉp'),
(92, 'téttỉp'),
(93, 'téttỉp'),
(94, 'téttỉp'),
(95, 'téttỉp'),
(96, 'téttỉp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `choigame2`
--

CREATE TABLE `choigame2` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `choigame2`
--

INSERT INTO `choigame2` (`id`, `name`) VALUES
(1, 'ThinhMii'),
(2, 'ThinhMii'),
(3, 'ThinhMii'),
(4, 'louis vutton'),
(5, 'louis vutton'),
(6, 'louis vutton'),
(7, 'louis vutton'),
(8, 'louis vutton'),
(9, 'louis vutton'),
(10, 'louis vutton'),
(11, 'louis vutton'),
(12, 'louis vutton'),
(13, 'louis vutton'),
(14, 'louis vutton'),
(15, 'louis vutton'),
(16, 'louis vutton'),
(17, 'louis vutton'),
(18, '13'),
(19, 'téttỉp'),
(20, 'téttỉp'),
(21, 'téttỉp'),
(22, 'téttỉp'),
(23, 'téttỉp'),
(24, 'téttỉp'),
(25, 'téttỉp'),
(26, 'tstki');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `choigame3`
--

CREATE TABLE `choigame3` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `choigame3`
--

INSERT INTO `choigame3` (`id`, `name`) VALUES
(1, 'ThinhMii'),
(8, 'louis vutton'),
(9, 'téttỉp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(8, 'testter', '123456'),
(9, 'admin', '123456'),
(10, 'tin123', '123456'),
(11, 'trieuvu', '123456'),
(12, 'ThinhMii', '123456'),
(13, 'tinpro', '123456'),
(14, 'louis vutton', '123456'),
(15, '13', '123456'),
(16, 'pro', '123456'),
(17, 'adaf', '123456'),
(18, 'tét', '123456'),
(19, 'téttỉp', '123456'),
(20, 'tstki', '123456');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `choigame1`
--
ALTER TABLE `choigame1`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `choigame2`
--
ALTER TABLE `choigame2`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `choigame3`
--
ALTER TABLE `choigame3`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `choigame1`
--
ALTER TABLE `choigame1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT cho bảng `choigame2`
--
ALTER TABLE `choigame2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `choigame3`
--
ALTER TABLE `choigame3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
