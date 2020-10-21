-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 20, 2020 at 03:40 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eproject1`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `oderitemsview`
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
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `OrderID` varchar(250) NOT NULL,
  `ProductID` varchar(250) NOT NULL,
  `Price` float NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`OrderID`, `ProductID`, `Price`, `Quantity`) VALUES
('SOF1603201047', 'D1', 77, 1),
('SOF1603201047', 'F1', 50, 5),
('SOF1603201047', 'F2', 84, 1),
('SOF1603201196', 'J1', 48, 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
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
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `UserID`, `Address`, `Phone`, `CreateTime`, `OrderStatus`, `Payment`, `TotalPrice`) VALUES
('SOF1603201047', 'USER1602476009', '36 hoang cau, ha noi', '123', '2020-10-20 15:37:27', 'Waiting', 'Cash', 452.1),
('SOF1603201196', 'USER1602476009', '44 HAO NAM', '123456789', '2020-10-20 15:39:56', 'Waiting', 'ATM', 264);

-- --------------------------------------------------------

--
-- Stand-in structure for view `orderview`
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
-- Table structure for table `products`
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
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `Price`, `Discount`, `Amount`, `Description`, `Category`, `Image`) VALUES
('D1', 'GARLIC', 110, 0.3, 499, 'Garlic is a species in the onion genus, Allium. Its close relatives include the onion, shallot, leek, chive, and Chinese onion. It is native to Central Asia and northeastern Iran and has long been a common seasoning worldwide, with a history of several thousand years of human consumption and use.', 'Dried', 'images/product-11.jpg'),
('F1', 'GRAPE', 100, 0.5, 95, 'A grape is a fruit, botanically a berry, of the deciduous woody vines of the flowering plant genus Vitis. Grapes can be eaten fresh as table grapes or they can be used for making wine, jam, grape juice, jelly, grape seed extract, raisins, vinegar, and grape seed oil.', 'Fruits', '../../utilities/media/nho2020-10-19.png'),
('F2', 'STRAWBERRY', 120, 0.3, 49, 'The garden strawberry is a widely grown hybrid species of the genus Fragaria, collectively known as the strawberries, which are cultivated worldwide for their fruit. The fruit is widely appreciated for its characteristic aroma, bright red color, juicy texture, and sweetness', 'Fruits', 'images/product-2.jpg'),
('F3', 'TOMATOES', 60, 0, 200, 'The tomato is the edible, often red berry of the plant Solanum lycopersicum, commonly known as a tomato plant. The species originated in western South America and Central America. The Nahuatl word tomatl gave rise to the Spanish word tomate, from which the English word tomato derived. ', 'Fruits', 'images/product-5.jpg'),
('F4', 'APPLE', 100, 0.2, 100, 'An apple is an edible fruit produced by an apple tree. Apple trees are cultivated worldwide and are the most widely grown species in the genus Malus. The tree originated in Central Asia, where its wild ancestor, Malus sieversii, is still found today.', 'Fruits', 'images/product-10.jpg'),
('F5', 'CHILLI', 120, 0.3, 200, 'The chili pepper, from Nahuatl chīlli, is the fruit of plants from the genus Capsicum which are members of the nightshade family, Solanaceae. Chili peppers are widely used in many cuisines as a spice to add heat to dishes.', 'Fruits', 'images/product-12.jpg'),
('J1', 'FRUIT JUICE', 80, 0.4, 15, 'Juice is a drink made from the extraction or pressing of the natural liquid contained in fruit and vegetables. It can also refer to liquids that are flavored with concentrate or other biological food sources, such as meat or seafood, such as clam juice.', 'Juice', 'images/product-8.jpg'),
('V1', 'BELL PEPPER', 80, 0.2, 100, 'The bell pepper is the fruit of plants in the Grossum cultivar group of the species Capsicum annuum. Cultivars of the plant produce fruits in different colours, including red, yellow, orange, green, white, and purple. Bell peppers are sometimes grouped with less pungent pepper varieties as \"sweet peppers\".', 'Vegetables', 'images/product-1.jpg'),
('V2', 'GREEN BEANS', 90, 0.1, 200, 'Green beans are the unripe, young fruit of various cultivars of the common bean. Immature or young pods of the runner bean, yardlong bean, and hyacinth bean are used in a similar way. Green beans are known by many common names, including French beans, string beans, snap beans, snaps, and the French name haricot vert. ', 'Vegetables', 'images/product-3.jpg'),
('V3', 'PURPLE CABBAGE', 50, 0, 300, 'The red cabbage is a kind of cabbage, also known as Blaukraut after preparation. Its leaves are colored dark red/purple. However, the plant changes its color according to the pH value of the soil, due to a pigment belonging to anthocyanins.', 'Vegetables', 'images/product-4.jpg'),
('V4', 'BROCCOLI', 120, 0.05, 150, 'Broccoli is an edible green plant in the cabbage family whose large flowering head, stalk and small associated leaves are eaten as a vegetable.', 'Vegetables', 'images/product-6.jpg'),
('V5', 'CARROTS', 50, 0, 400, 'The carrot is a root vegetable, usually orange in color, though purple, black, red, white, and yellow cultivars exist. They are a domesticated form of the wild carrot, Daucus carota, native to Europe and Southwestern Asia. The plant probably originated in Persia and was originally cultivated for its leaves and seeds.', 'Vegetables', 'images/product-7.jpg'),
('V6', 'ONION', 30, 0, 500, 'The onion, also known as the bulb onion or common onion, is a vegetable that is the most widely cultivated species of the genus Allium. Its close relatives include the garlic, scallion, shallot, leek, chive, and Chinese onion.', 'Vegetables', 'images/product-9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `FirstName`, `LastName`, `Password`, `Phone`, `Mail`, `Address`, `Avatar`) VALUES
('USER1602476009', 'ledung', 'Lê', 'Dũng', 'd9b1d7db4cd6e70935368a1efb10e377', '123456789', 'ledung@gmail.com', '44 HAO NAM', NULL);

-- --------------------------------------------------------

--
-- Structure for view `oderitemsview`
--
DROP TABLE IF EXISTS `oderitemsview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `oderitemsview`  AS  select `orderdetail`.`OrderID` AS `OrderID`,`orderdetail`.`Price` AS `Price`,`orderdetail`.`Quantity` AS `Quantity`,`products`.`ProductName` AS `ProductName` from (`orderdetail` join `products`) where `orderdetail`.`ProductID` = `products`.`ProductID` ;

-- --------------------------------------------------------

--
-- Structure for view `orderview`
--
DROP TABLE IF EXISTS `orderview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `orderview`  AS  select `orders`.`OrderID` AS `OrderID`,`users`.`FirstName` AS `FirstName`,`users`.`LastName` AS `LastName`,`orders`.`Address` AS `Address`,`orders`.`Phone` AS `Phone`,`orders`.`CreateTime` AS `CreateTime`,`orders`.`OrderStatus` AS `OrderStatus`,`orders`.`Payment` AS `Payment`,`orders`.`TotalPrice` AS `TotalPrice` from (`orders` join `users`) where `orders`.`UserID` = `users`.`UserID` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`OrderID`,`ProductID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
