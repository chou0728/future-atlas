-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-01-17 19:54:19
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
  `program_no` int(11) NOT NULL,
  `program_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `program_intro` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `program_ photo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `program_fare` int(11) NOT NULL,
  `program_ status` tinyint(1) NOT NULL COMMENT '1:上架 0:下架'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  MODIFY `program_no` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
