-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-01-21 14:50:47
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
-- 資料表結構 `facility_order`  (先只建立PK，FK等等再弄)
--

CREATE TABLE `facility_order` (
  `order_no` int NOT NULL AUTO_INCREMENT,
  `mem_id` int NOT NULL,
  `order_date` date,
  `original_total` int NOT NULL,
  `discount` int,
  `creditcard_num` char(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (order_no)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `facility_order`
--

INSERT INTO `facility_order` (`order_no`, `mem_id`, `order_date`, `original_total`, `discount`, `creditcard_num`) VALUES
(1, 1, '2018-01-14', 500, 100, ''),
(2, 2, '2018-01-15', 800, 0, '');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `facility_order`
--
ALTER TABLE `facility_order`
  ADD PRIMARY KEY (`order_no`),
  ADD KEY `mem_id` (`mem_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `facility_order`
--
ALTER TABLE `facility_order`
  MODIFY `order_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `facility_order`
--
ALTER TABLE `facility_order`
  ADD FOREIGN KEY (`mem_id`) REFERENCES `member` (`mem_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
