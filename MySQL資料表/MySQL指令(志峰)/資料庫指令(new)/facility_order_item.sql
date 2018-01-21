-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-01-21 14:59:16
-- 伺服器版本: 10.1.29-MariaDB
-- PHP 版本： 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `fa`
--

-- --------------------------------------------------------

--
-- 資料表結構 `facility_order_item`
--

CREATE TABLE `facility_order_item` (
  `order_no` int COMMENT 'PK,FK',
  `facility_no` int COMMENT 'PK,FK',
  `mem_id` int COMMENT 'FK',
  `facility_name` varchar(10) ,
  `full_fare_num` int  default '0',
  `full_fare_num_used` int  default '0',
  `half_fare_num` int default '0',
  `half_fare_num_used` int  default '0',
  `subtotal` int COMMENT '訂單小計 ',
  `comment_content` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment_grade` int DEFAULT '0' COMMENT '1-5分',
  `comment_timestamp` datetime,
  `comment_status` boolean  DEFAULT '0' COMMENT '1:已評價 0:未評價'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `facility_order_item`
--

INSERT INTO `facility_order_item` (`order_no`, `facility_no`, `mem_id`, `facility_name`, `full_fare_num`, `full_fare_num_used`, `half_fare_num`, `half_fare_num_used`, `subtotal`, `comment_content`, `comment_grade`, `comment_timestamp`, `comment_status`) VALUES
(1, 1, 1, '宇宙雲霄飛車', 4, 0, 2, 0, 400, '棒棒喔~~~~~', 4, '2018-01-20 19:07:40', 1),
(1, 2, 1, 'FA摩天輪', 6, 6, 1, 1, 350, '棒棒', 4, '2018-01-20 19:06:34', 1),
(1, 3, 1, 'XXXX', 6, 6, 1, 1, 350, 'OMG', 5, '0000-00-00 00:00:00', 1),
(2, 2, 2, 'FA摩天輪', 10, 0, 5, 0, 1200, 'OMG', 5, '0000-00-00 00:00:00', 1);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `facility_order_item`
--
ALTER TABLE `facility_order_item`
  ADD PRIMARY KEY (`order_no`,`facility_no`),
  ADD KEY `facility_no` (`facility_no`),
  ADD KEY `mem_id` (`mem_id`);

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `facility_order_item`
--
ALTER TABLE `facility_order_item`
  ADD CONSTRAINT `facility_order_item_ibfk_1` FOREIGN KEY (`order_no`) REFERENCES `facility_order` (`order_no`),
  ADD CONSTRAINT `facility_order_item_ibfk_2` FOREIGN KEY (`order_no`) REFERENCES `facility_order` (`order_no`),
  ADD CONSTRAINT `facility_order_item_ibfk_3` FOREIGN KEY (`facility_no`) REFERENCES `facility` (`facility_no`),
  ADD CONSTRAINT `facility_order_item_ibfk_4` FOREIGN KEY (`order_no`) REFERENCES `facility_order` (`order_no`),
  ADD CONSTRAINT `facility_order_item_ibfk_5` FOREIGN KEY (`mem_id`) REFERENCES `facility_order` (`mem_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
