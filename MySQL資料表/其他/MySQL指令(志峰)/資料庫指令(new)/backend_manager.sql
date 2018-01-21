-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-01-21 14:22:49
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
-- 資料表結構 `backend_manager`
--

CREATE TABLE `backend_manager` (
  `manager_id` int(11) NOT NULL,
  `manager_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '限英文數字，英文不分大小寫',
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `top_manager` tinyint(1) NOT NULL COMMENT '1:是 0:否',
  `manager_status` tinyint(1) NOT NULL COMMENT '1:正常 0:停用'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `backend_manager`
--

INSERT INTO `backend_manager` (`manager_id`, `manager_name`, `password`, `top_manager`, `manager_status`) VALUES
(1, 'Eric', 'root', 0, 1);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `backend_manager`
--
ALTER TABLE `backend_manager`
  ADD PRIMARY KEY (`manager_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `backend_manager`
--
ALTER TABLE `backend_manager`
  MODIFY `manager_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
