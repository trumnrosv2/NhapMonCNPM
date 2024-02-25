-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 03, 2023 lúc 10:01 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cnpm`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `BrandID` int(11) NOT NULL,
  `BranName` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`BrandID`, `BranName`) VALUES
(1, 'Owen'),
(2, 'Biluxury\r\n'),
(3, 'Routine'),
(4, 'Poloman'),
(5, 'Coolmate');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(250) NOT NULL,
  `Size_x` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` decimal(10,0) NOT NULL,
  `Total` decimal(10,0) NOT NULL,
  `DateTime_x` datetime NOT NULL,
  `img_sanpham` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `UserID`, `ProductID`, `ProductName`, `Size_x`, `Quantity`, `Price`, `Total`, `DateTime_x`, `img_sanpham`) VALUES
(85, 14, 20, 'Quần Jean Premium', 11, 1, 990000, 990000, '2023-11-29 17:13:34', 'upload/6aadee76b828ba31e962c1465fe8abb6.jpg'),
(86, 14, 25, 'Áo Crop Top Basic', 22, 1, 4990000, 4990000, '2023-11-29 17:13:50', 'upload/xanh.jpg'),
(87, 14, 17, 'Áo Sơ Mi \"Urban Denim', 44, 2, 789000, 1578000, '2023-11-29 17:14:11', 'upload/anh3.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `Ma_SanPham` varchar(20) NOT NULL,
  `ProductName` varchar(250) NOT NULL,
  `ProductDescription` varchar(250) NOT NULL,
  `Price` decimal(10,0) NOT NULL,
  `PriceSale` decimal(10,0) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `TypeID` int(11) NOT NULL,
  `BrandID` int(11) NOT NULL,
  `ImgProduct` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`ProductID`, `Ma_SanPham`, `ProductName`, `ProductDescription`, `Price`, `PriceSale`, `Quantity`, `TypeID`, `BrandID`, `ImgProduct`, `status`) VALUES
(16, 'Sp005', 'Áo Polo \"Elegance Stripe', 'Một chiếc áo polo thanh lịch với đường kẻ tinh tế.\r\nChất liệu cao cấp, thoáng khí và thoải mái.\r\nPhù hợp cho cả bữa trưa công việc và cuộc hẹn cuối tuần.', 590000, 10000, 11, 1, 1, 'upload/anh2f.jpg', 1),
(17, 'Sp006', 'Áo Sơ Mi \"Urban Denim', 'Sơ mi denim với vẻ ngoại ô đô thị.\r\nChất liệu chambray nhẹ và dễ chịu.\r\nThiết kế đơn giản, phù hợp cho cả ngày làm việc và dạo phố.', 789000, 12000, 111, 1, 2, 'upload/anh3.jpg', 1),
(18, 'Sp007', 'Áo Hoodie \"Street Style Essentials', 'Hoodie phong cách đường phố.\r\nChất liệu nỉ cao cấp, giữ ấm hiệu quả.\r\nMàu sắc và kiểu dáng thời trang, phản ánh phong cách cá nhân', 870000, 12000, 111, 1, 3, 'upload/xam.jpg', 1),
(20, 'Sp008', 'Quần Jean Premium', '                                                Chất liệu cao cấp và thoải mái.\r\nPhong cách đẳng cấp, dễ kết hợp.                                        ', 990000, 12000, 111, 1, 1, 'upload/6aadee76b828ba31e962c1465fe8abb6.jpg', 1),
(21, 'Sp009', 'Quần Kaki Slim Fit', 'Dáng slim fit, tạo vẻ lịch lãm.\r\nKaki thoải mái, phù hợp mọi dịp.', 20990000, 12000, 111, 2, 5, 'upload/99fb8b64a56de51631dc201fe59ef379.jpg', 1),
(23, 'sp001', 'Áo Sơ Mi Linen Đơn Giản', 'Áo sơ mi với chất liệu linen nhẹ nhàng.\r\nThiết kế đơn giản, phù hợp cho mọi dịp.', 19000000, 100000, 111, 2, 2, 'upload/anh2f.jpg', 1),
(24, 'sp002', 'Áo Tank Top Active', '                        Tank top thể thao, thoải mái khi vận động.\r\nPhù hợp cho hoạt động ngoại ô và tập luyện.                    ', 3900000, 100000, 111, 3, 5, 'upload/385d236345eae02bc894e792cab63e90.jpg', 1),
(25, '2p03', 'Áo Crop Top Basic', '                                                Crop top cơ bản, phối hợp linh hoạt.\r\nPhù hợp cho phong cách casual và streetwear.                                        ', 4990000, 100000, 111, 2, 3, 'upload/xanh.jpg', 1),
(26, 'sp20', 'Áo Thun Graphic Vintage', '                        Áo thun với hình in vintage sáng tạo.\r\nTạo điểm nhấn cho outfit hàng ngày.                    ', 690000, 10000, 22, 1, 2, 'upload/f8bf5226e65e902463a1d8fe2df50727.jpg', 1),
(27, 'sp21', 'Áo Hoodie Oversized', 'Hoodie dáng rộng, phong cách hiện đại.\r\nChất liệu mềm mại, thoải mái suốt ngày.', 390000, 10000, 22, 1, 1, 'upload/6efd019e8f7b017097fd575af65fcaff.jpg', 1),
(29, 'sp24', 'Áo Cardigan Dáng Dài', 'Cardigan dáng dài, phối màu trẻ trung.\r\nLà item lý tưởng cho mùa thu lạnh.', 1690000, 15000, 11, 3, 4, 'upload/5cf71833beea75ef3ffa9332006a3586.jpg', 1),
(30, '20p44', 'Áo Maxi Dress Floral', 'Đầm maxi hoa nhí, điệu đà và thoải mái.\r\nPhù hợp cho những buổi dạo phố hoặc dự tiệc.', 990000, 12000, 33, 2, 4, 'upload/2c8b53a8ddcd7c89624733c6df80c7bd.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `typeproduct`
--

CREATE TABLE `typeproduct` (
  `TypeID` int(11) NOT NULL,
  `TypeName` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `typeproduct`
--

INSERT INTO `typeproduct` (`TypeID`, `TypeName`) VALUES
(1, 'Áo'),
(2, 'Quần'),
(3, 'Giày'),
(4, 'Dép');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(250) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `hashpassword` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `sdt` char(10) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `password_user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `hashpassword`, `email`, `sdt`, `status`, `password_user`) VALUES
(9, 'ndjhdj', 'jkzjiz', '1552c03e78d38d5005d4ce7b8018addf', 'c@gmail.com', '0936354454', 1, '123a'),
(13, 'admin', 'nro', '9cbf8a4dcb8e30682b927f352d6559a0', 'admin@gmail.com', '0123456789', 1, '123456a'),
(14, 'Nguyễn Minh', 'Tú', 'e10adc3949ba59abbe56e057f20f883e', 'kakalot@gmail.com', '01', 1, '123456');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`BrandID`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `TypeID` (`TypeID`),
  ADD KEY `BrandID` (`BrandID`);

--
-- Chỉ mục cho bảng `typeproduct`
--
ALTER TABLE `typeproduct`
  ADD PRIMARY KEY (`TypeID`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `typeproduct`
--
ALTER TABLE `typeproduct`
  MODIFY `TypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`TypeID`) REFERENCES `typeproduct` (`TypeID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`BrandID`) REFERENCES `brands` (`BrandID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
