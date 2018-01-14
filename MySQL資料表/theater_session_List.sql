-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-01-14 11:32:46
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
-- 資料表結構 `theater_session_list`
--

CREATE TABLE `theater_session_list` (
  `session_no` int(11) NOT NULL,
  `program_no` int(11) NOT NULL DEFAULT '0',
  `session_time` char(5) NOT NULL DEFAULT '0',
  `time_date` date NOT NULL,
  `total_ticket` int(11) DEFAULT '0',
  `last_ticket` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `theater_session_list`
--

INSERT INTO `theater_session_list` (`session_no`, `program_no`, `session_time`, `time_date`, `total_ticket`, `last_ticket`) VALUES
(1, 1, '11:00', '2018-01-17', 150, 150),
(2, 1, '14:00', '2018-01-17', 150, 150),
(3, 1, '15:00', '2018-01-17', 150, 150),
(4, 1, '19:00', '2018-01-17', 150, 150),
(5, 1, '11:00', '2018-01-21', 150, 150),
(6, 1, '14:00', '2018-01-21', 150, 150),
(7, 1, '15:00', '2018-01-21', 150, 150),
(8, 1, '19:00', '2018-01-21', 150, 150),
(9, 1, '11:00', '2018-01-24', 150, 150),
(10, 1, '14:00', '2018-01-24', 150, 150),
(11, 1, '15:00', '2018-01-24', 150, 150),
(12, 1, '19:00', '2018-01-24', 150, 150),
(13, 1, '11:00', '2018-01-26', 150, 150),
(14, 1, '14:00', '2018-01-26', 150, 150),
(15, 1, '15:00', '2018-01-26', 150, 150),
(16, 1, '19:00', '2018-01-26', 150, 150),
(17, 1, '11:00', '2018-01-28', 150, 150),
(18, 1, '14:00', '2018-01-28', 150, 150),
(19, 1, '15:00', '2018-01-28', 150, 150),
(20, 1, '19:00', '2018-01-28', 150, 150),
(21, 1, '11:00', '2018-01-31', 150, 150),
(22, 1, '14:00', '2018-01-31', 150, 150),
(23, 1, '15:00', '2018-01-31', 150, 150),
(24, 1, '19:00', '2018-01-31', 150, 150),
(25, 1, '11:00', '2018-02-02', 150, 150),
(26, 1, '14:00', '2018-02-02', 150, 150),
(27, 1, '15:00', '2018-02-02', 150, 150),
(28, 1, '19:00', '2018-02-02', 150, 150),
(29, 2, '11:00', '2018-01-23', 150, 150),
(30, 2, '14:00', '2018-01-23', 150, 148),
(31, 2, '15:00', '2018-01-23', 150, 150),
(32, 2, '19:00', '2018-01-23', 150, 150),
(33, 2, '11:00', '2018-01-27', 150, 150),
(34, 2, '14:00', '2018-01-27', 150, 150),
(35, 2, '15:00', '2018-01-27', 150, 150),
(36, 2, '19:00', '2018-01-27', 150, 150),
(37, 2, '11:00', '2018-01-30', 150, 150),
(38, 2, '14:00', '2018-01-30', 150, 150),
(39, 2, '15:00', '2018-01-30', 150, 150),
(40, 2, '19:00', '2018-01-30', 150, 150),
(41, 2, '11:00', '2018-02-03', 150, 150),
(42, 2, '14:00', '2018-02-03', 150, 150),
(43, 2, '15:00', '2018-02-03', 150, 150),
(44, 2, '19:00', '2018-02-03', 150, 150);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `theater_session_list`
--
ALTER TABLE `theater_session_list`
  ADD PRIMARY KEY (`session_no`),
  ADD KEY `program_no` (`program_no`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `theater_session_list`
--
ALTER TABLE `theater_session_list`
  MODIFY `session_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `theater_session_list`
--
ALTER TABLE `theater_session_list`
  ADD CONSTRAINT `theater_session_list_ibfk_1` FOREIGN KEY (`program_no`) REFERENCES `theater_program` (`program_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
