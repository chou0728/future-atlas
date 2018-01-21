-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-01-21 15:38:49
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
-- 資料表結構 `theater_order_list`
--

CREATE TABLE `theater_order_list` (
  `theater_ticket_no` int NOT NULL PRIMARY KEY 	AUTO_INCREMENT COMMENT 'PK',
  `session_no` int NOT NULL COMMENT 'FK',
  `mem_id` int NOT NULL COMMENT 'FK',
  `number_purchase` int NOT NULL,
  `used_ticket` int  DEFAULT '0' COMMENT '預設為0',
  `order_date` date NOT NULL COMMENT 'yyyy-mm-dd',
  `original_amount` int COMMENT '未扣積分',
  `points_discount` int,
  `credit_card` char(16) COLLATE utf8_unicode_ci NOT NULL,
  `program_no` int NOT NULL COMMENT 'FK'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `theater_order_list`
--

INSERT INTO `theater_order_list` (`theater_ticket_no`, `session_no`, `mem_id`, `number_purchase`, `used_ticket`, `order_date`, `original_amount`, `points_discount`, `credit_card`, `program_no`) VALUES
(1, 9, 1, 5, 0, '2018-01-17', 500, 0, '1111-1111-1111-1', 1),
(2, 10, 1, 5, 0, '2018-01-26', 800, 0, '1111-1211-1111-1', 2),
(3, 30, 2, 2, 0, '2018-01-14', 1000, 500, '1111-2222-3333-4', 2);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `theater_order_list`
--
ALTER TABLE `theater_order_list`
  ADD PRIMARY KEY (`theater_ticket_no`),
  ADD KEY `program_no` (`program_no`),
  ADD KEY `session_no` (`session_no`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `theater_order_list`
--
ALTER TABLE `theater_order_list`
  MODIFY `theater_ticket_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `theater_order_list`
--
ALTER TABLE `theater_order_list`
  ADD CONSTRAINT `theater_order_list_ibfk_1` FOREIGN KEY (`program_no`) REFERENCES `theater_program` (`program_no`),
  ADD CONSTRAINT `theater_order_list_ibfk_2` FOREIGN KEY (`session_no`) REFERENCES `theater_session_list` (`session_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
