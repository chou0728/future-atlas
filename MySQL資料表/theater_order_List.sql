-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-01-14 11:33:01
-- 伺服器版本: 10.1.25-MariaDB
-- PHP 版本： 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `futureatlas`
--

-- --------------------------------------------------------

--
-- 資料表結構 `theater_order_list`
--

CREATE TABLE `theater_order_list` (
  `theaterticket_no` int(11) NOT NULL,
  `session_no` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `number_purchase` int(11) NOT NULL,
  `used_ticket` int(11) NOT NULL DEFAULT '0',
  `order_date` date NOT NULL,
  `original_amount` int(11) NOT NULL DEFAULT '0',
  `points_discount` int(11) DEFAULT '0',
  `credit_card` char(19) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `theater_order_list`
--

INSERT INTO `theater_order_list` (`theaterticket_no`, `session_no`, `member_id`, `number_purchase`, `used_ticket`, `order_date`, `original_amount`, `points_discount`, `credit_card`) VALUES
(1, 9, 1, 5, 0, '2018-01-17', 500, 0, '1111-1111-1111-1111'),
(2, 10, 1, 5, 0, '2018-01-17', 500, 0, '1111-1211-1111-1211'),
(3, 30, 2, 2, 0, '2018-01-14', 1000, 500, '1111-2222-3333-4444');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `theater_order_list`
--
ALTER TABLE `theater_order_list`
  ADD PRIMARY KEY (`theaterticket_no`),
  ADD KEY `session_no` (`session_no`),
  ADD KEY `member_id` (`member_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `theater_order_list`
--
ALTER TABLE `theater_order_list`
  MODIFY `theaterticket_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `theater_order_list`
--
ALTER TABLE `theater_order_list`
  ADD CONSTRAINT `theater_order_list_ibfk_1` FOREIGN KEY (`session_no`) REFERENCES `theater_session_list` (`session_no`),
  ADD CONSTRAINT `theater_order_list_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `member` (`mem_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
