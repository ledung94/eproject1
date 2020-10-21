-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 21, 2020 lúc 05:18 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `eproject1`
--

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `oderitemsview`
-- (See below for the actual view)
--
CREATE TABLE `oderitemsview` (
`OrderID` varchar(250)
,`Price` float
,`Quantity` int(11)
,`ProductName` varchar(250)
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `OrderID` varchar(250) NOT NULL,
  `ProductID` varchar(250) NOT NULL,
  `Price` float NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`OrderID`, `ProductID`, `Price`, `Quantity`) VALUES
('SOF1602485858', 'F1', 108, 1),
('SOF1602485858', 'J1', 30, 2),
('SOF1602485858', 'V1', 120, 1),
('SOF1602485858', 'V3', 20, 1),
('SOF1602485968', 'F20201019093050', 50000, 5),
('SOF1602485997', 'D1', 7, 1),
('SOF1603162441', 'F2', 72, 1),
('SOF1603162441', 'J1', 30, 1),
('SOF1603162708', 'F1', 108, 3),
('SOF1603162789', 'F20201019093050', 50000, 3),
('SOF1603162891', 'F20201019093050', 50000, 8),
('SOF1603163405', 'F20201019093050', 50000, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `OrderID` char(250) NOT NULL,
  `UserID` char(250) NOT NULL,
  `Address` text NOT NULL,
  `Phone` varchar(250) NOT NULL,
  `CreateTime` datetime NOT NULL,
  `OrderStatus` char(250) NOT NULL,
  `Payment` varchar(250) NOT NULL,
  `TotalPrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`OrderID`, `UserID`, `Address`, `Phone`, `CreateTime`, `OrderStatus`, `Payment`, `TotalPrice`) VALUES
('SOF1602485198', 'USER1602476009', '36 hoang cau, ha noi', '123', '2020-10-12 08:59:57', 'Shipping', 'Cash', 7.7),
('SOF1602485858', 'USER1602476009', '36 hoang cau, ha noi', '123', '2020-10-12 08:57:38', 'Cancel', 'Cash', 338.8),
('SOF1602485898', 'USER1602476009', '36 hoang cau, ha noi', '123', '2020-10-12 08:59:57', 'Cancel', 'Cash', 7.7),
('SOF1602485968', 'USER1602476009', '36 hoang cau, ha noi', '123', '2020-10-12 08:59:57', 'Cancel', 'Cash', 7.7),
('SOF1602485991', 'USER1602476009', '36 hoang cau, ha noi', '123', '2020-10-12 08:59:57', 'Cancel', 'Cash', 7.7),
('SOF1602485992', 'USER1602476009', '36 hoang cau, ha noi', '123', '2020-10-12 08:59:57', 'Waiting', 'Cash', 7.7),
('SOF1602485993', 'USER1602476009', '36 hoang cau, ha noi', '123', '2020-10-12 08:59:57', 'Cancel', 'Cash', 7.7),
('SOF1602485994', 'USER1602476009', '36 hoang cau, ha noi', '123', '2020-10-12 08:59:57', 'Shipping', 'Cash', 7.7),
('SOF1602485995', 'USER1602476009', '36 hoang cau, ha noi', '123', '2020-10-12 08:59:57', 'Waiting', 'Cash', 7.7),
('SOF1602485996', 'USER1602476009', '36 hoang cau, ha noi', '123', '2020-10-12 08:59:57', 'Shipping', 'Cash', 7.7),
('SOF1602485997', 'USER1602476009', '36 hoang cau, ha noi', '123', '2020-10-12 08:59:57', 'Waiting', 'Cash', 7.7),
('SOF1602485998', 'USER1602476009', '36 hoang cau, ha noi', '123', '2020-10-12 08:59:57', 'Waiting', 'Cash', 7.7),
('SOF1602485999', 'USER1602476009', '36 hoang cau, ha noi', '123', '2020-10-12 08:59:57', 'Cancel', 'Cash', 7.7),
('SOF1603163405', 'USER1602476009', 'test', '123', '2020-10-20 05:10:05', 'Waiting', 'Credit', 275000);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `orderview`
-- (See below for the actual view)
--
CREATE TABLE `orderview` (
`OrderID` char(250)
,`FirstName` varchar(250)
,`LastName` varchar(250)
,`Address` text
,`Phone` varchar(250)
,`CreateTime` datetime
,`OrderStatus` char(250)
,`Payment` varchar(250)
,`TotalPrice` float
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `ProductID` char(250) NOT NULL,
  `ProductName` varchar(250) NOT NULL,
  `Price` float NOT NULL,
  `Discount` float NOT NULL,
  `Amount` int(11) NOT NULL,
  `Description` text DEFAULT NULL,
  `Category` varchar(250) NOT NULL,
  `Image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `Price`, `Discount`, `Amount`, `Description`, `Category`, `Image`) VALUES
('D1', 'Garlic', 10, 0.3, 499, 'Garlic is a species in the onion genus, Allium. Its close relatives include the onion, shallot, leek, chive, and Chinese onion. It is native to Central Asia and northeastern Iran and has long been a common seasoning worldwide, with a history of several thousand years of human consumption and use.', 'Dried', ' ../../utilities/media/Garlic2020-10-21.png'),
('F1', 'Strawberry', 120, 0.1, 96, 'The garden strawberry is a widely grown hybrid species of the genus Fragaria, collectively known as the strawberries, which are cultivated worldwide for their fruit. The fruit is widely appreciated for its characteristic aroma, bright red color, juicy texture, and sweetness.', 'Fruits', ' ../../utilities/media/Strawberry2020-10-21.png'),
('F2', 'TOMATOE', 80, 0.1, 499, 'The tomato is the edible, often red berry of the plant Solanum lycopersicum, commonly known as a tomato plant. The species originated in western South America and Central America. The Nahuatl word tomatl gave rise to the Spanish word tomate, from which the English word tomato derived. ', 'Fruits', ' ../../utilities/media/TOMATOE2020-10-21.png'),
('F20201019093050', 'dau tay', 10, 0.5, 10, 'dau tay', 'Fruits', ' ../../utilities/media/dautay2020-10-21.png'),
('F3', 'APPLE', 140, 0.15, 1000, 'oishi', 'Fruits', ' ../../utilities/media/APPLE2020-10-21.png'),
('J1', 'Apple Juice', 30, 0, 97, 'cccccccccccccccccccccccccc', 'Juice', ' ../../utilities/media/AppleJuice2020-10-21.png'),
('V1', 'Bell Pepper', 120, 0, 9, 'scssssssssssssssssssss', 'Vegetables', ' ../../utilities/media/BellPepper2020-10-21.png'),
('V2', 'Green Beans', 80, 0.5, 200, 'scccccccccccccccccccccc', 'Vegetables', ' ../../utilities/media/GreenBeans2020-10-21.png'),
('V3', 'Chilli', 20, 0, 4, 'ssssssssssssssssssssssssssss', 'Vegetables', ' ../../utilities/media/Chilli2020-10-21.png'),
('V4', 'PURPLE CABBAGE', 120, 0, 50, 'PPPPPPPPPPPP', 'Vegetables', ' ../../utilities/media/PURPLECABBAGE2020-10-21.png'),
('V5', 'BROCOLLI', 120, 0.2, 300, 'BROCOLLI is vegetables', 'Vegetables', ' ../../utilities/media/BROCOLLI2020-10-21.png'),
('V6', 'CARROTS', 100, 0.4, 1000, 'CARROTS is vegetables', 'Vegetables', ' ../../utilities/media/CARROTS2020-10-21.png'),
('V7', 'ONION', 80, 0.3, 400, 'hanh tim', 'Vegetables', ' ../../utilities/media/ONION2020-10-21.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `UserID` char(250) NOT NULL,
  `UserName` varchar(250) NOT NULL,
  `FirstName` varchar(250) DEFAULT NULL,
  `LastName` varchar(250) DEFAULT NULL,
  `Password` varchar(250) NOT NULL,
  `Phone` varchar(250) DEFAULT NULL,
  `Mail` varchar(250) DEFAULT NULL,
  `Address` text DEFAULT NULL,
  `Avatar` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `FirstName`, `LastName`, `Password`, `Phone`, `Mail`, `Address`, `Avatar`) VALUES
('USER1602476009', 'ledung', 'Lê', 'Dũng', '202cb962ac59075b964b07152d234b70', '123', 'ledung@gmail.com', '36 hoang cau, ha noi', NULL),
('USER1602476675', 'dungle', 'Dũng', 'Lê', 'a4130ad461268d6e63580916a26107d6', '12345', '123@gmail.com', 'ha noi', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc cho view `oderitemsview`
--
DROP TABLE IF EXISTS `oderitemsview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `oderitemsview`  AS  select `orderdetail`.`OrderID` AS `OrderID`,`orderdetail`.`Price` AS `Price`,`orderdetail`.`Quantity` AS `Quantity`,`products`.`ProductName` AS `ProductName` from (`orderdetail` join `products`) where `orderdetail`.`ProductID` = `products`.`ProductID` ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `orderview`
--
DROP TABLE IF EXISTS `orderview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `orderview`  AS  select `orders`.`OrderID` AS `OrderID`,`users`.`FirstName` AS `FirstName`,`users`.`LastName` AS `LastName`,`orders`.`Address` AS `Address`,`orders`.`Phone` AS `Phone`,`orders`.`CreateTime` AS `CreateTime`,`orders`.`OrderStatus` AS `OrderStatus`,`orders`.`Payment` AS `Payment`,`orders`.`TotalPrice` AS `TotalPrice` from (`orders` join `users`) where `orders`.`UserID` = `users`.`UserID` ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`OrderID`,`ProductID`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
