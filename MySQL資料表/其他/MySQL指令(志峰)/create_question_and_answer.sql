-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-01-20 19:53:42
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
-- 資料表結構 `question_and_answer`
--

CREATE TABLE `question_and_answer` (
  `key_word_no` int(255) NOT NULL,
  `key_word` varchar(10000) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '尚未定義' COMMENT '關鍵字',
  `answer` varchar(10000) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '尚未定義' COMMENT '關鍵字對應的答案',
  `unsolved_question` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci COMMENT '使用者找不到答案的問題'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `question_and_answer`
--

INSERT INTO `question_and_answer` (`key_word_no`, `key_word`, `answer`, `unsolved_question`) VALUES
(1, '開園', '本樂園的開放時間為 週二至週日(週一公休) 10:00am至8:00pm', NULL),
(2, '開門', '本樂園的開放時間為 週二至週日(週一公休) 10:00am至8:00pm', NULL),
(3, '營業', '本樂園的開放時間為 週二至週日(週一公休) 10:00am至8:00pm', NULL),
(4, '關門', '本樂園的開放時間為 週二至週日(週一公休) 10:00am至8:00pm', NULL),
(5, '幾點', '本樂園的開放時間為 週二至週日(週一公休) 10:00am至8:00pm', NULL),
(6, '閉園', '本樂園的開放時間為 週二至週日(週一公休) 10:00am至8:00pm', NULL),
(7, '尚未定義', '尚未定義', '購票'),
(8, '購票設施', '您可直接點選上方導覽列左邊的「設施購票」選項，即可進入購買設施票券之頁面', NULL),
(9, '購票劇場', '您可直接點選上方導覽列左邊的「劇場購票」選項，即可進入購買劇場票券之頁面', NULL),
(10, '使用', '不論是設施票券或劇場票券，只需在入場驗票時出示您會員專區中的QR code便可直接入場', NULL),
(11, '尚未定義', '尚未定義', 'how to use tickets'),
(12, '靠杯', '你是想吃子彈是嗎?', NULL),
(13, '靠北', '你是想吃子彈是嗎?', NULL),
(14, '尚未定義', '尚未定義', '這個月有什麼活動?'),
(15, '尚未定義', '尚未定義', '如何購票'),
(16, '尚未定義', '尚未定義', '我好餓');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `question_and_answer`
--
ALTER TABLE `question_and_answer`
  ADD PRIMARY KEY (`key_word_no`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `question_and_answer`
--
ALTER TABLE `question_and_answer`
  MODIFY `key_word_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
