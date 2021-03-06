-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-01-21 15:48:09
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
-- 資料表結構 `theater_program`
--

CREATE TABLE `theater_program` (
  `program_no` int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'PK',
  `program_name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `program_intro` varchar(100) CHARACTER SET utf8 NOT NULL,
  `program_photo` varchar(20) CHARACTER SET utf8 DEFAULT '',
  `program_fare` int NOT NULL DEFAULT '500',
  `program_status` tinyint(1) DEFAULT '1' COMMENT '1:上架 0:下架'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `theater_program`
--

INSERT INTO `theater_program` (`program_no`, `program_name`, `program_intro`, `program_photo`, `program_fare`, `program_status`) VALUES
(1, '尋找星生命', '廣大的宇宙中，到底有沒有外星人？跟著最先進的太空工作室，一窺宇宙前線，尋找外星新生命。', '', 500, 1),
(2, '末世決戰', '傑克與瑪莉無意之間打開了宇宙通道，數以兆計的外星生物瞬間湧入地球，人類究竟該不該跟牠們成為朋友？', '', 500, 1);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `theater_program`
--
ALTER TABLE `theater_program`
  ADD PRIMARY KEY (`program_no`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `theater_program`
--
ALTER TABLE `theater_program`
  MODIFY `program_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
