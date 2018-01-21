-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-01-21 14:35:02
-- 伺服器版本: 10.1.29-MariaDB
-- PHP 版本： 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;


--
-- 資料庫： `fa1`
--

-- --------------------------------------------------------

--
-- 資料表結構 `facility`
--

CREATE TABLE `facility` (
  `facility_no` int(11) NOT NULL,
  `facility_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `facility_subname` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facility_mphoto` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `facility_tphoto` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `facility_intro` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facility_phrase` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facility_heart` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facility_suit` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facility_limit` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facility_description` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facility_status` tinyint(1) NOT NULL DEFAULT '1',
  `facility_crowd` int(11) NOT NULL DEFAULT '2',
  `full_fare` int(11) DEFAULT NULL,
  `half_fare` int(11) DEFAULT NULL,
  `info_already` tinyint(1) NOT NULL DEFAULT '0',
  `ticket_already` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `facility`
--

INSERT INTO `facility` (`facility_no`, `facility_name`, `facility_subname`, `facility_mphoto`, `facility_tphoto`, `facility_intro`, `facility_phrase`, `facility_heart`, `facility_suit`, `facility_limit`, `facility_description`, `facility_status`, `facility_crowd`, `full_fare`, `half_fare`, `info_already`, `ticket_already`) VALUES
(1, '宇宙雲霄飛車', 'COSMOS ROLLER COASTER', 'sub_6365_LL.png', 'roller.jpg', '史上最快最速的雲霄飛車', '<ul><li>全長<span>1250</span>公尺</li><li>速度最高<span>150</span>公里/小時</li><li>高度最高<span>32</span>公尺</li></ul>', '180dpm', '想感受刺激的人', '身高130cm~200cm', '以令人停止呼吸的加速度發動，僅需1.8秒就能達到150公里／小時，衝進空中垂直塔的一刻，周圍景色彷彿全部靜止，只聽得到尖叫聲貫穿樂園、直衝宇宙。', 1, 2, 150, 90, 0, 1),
(2, '未來中心', 'FUTURE CENTER', '20170910152642.jpg', '210.jpg', '不用票券', '<ul><li>有<span>12</span>種風格餐廳</li><li>內附<span>個別</span>休息室</li><li>不定期<span>免費</span>展覽</li></ul>', '100dpm', '想悠哉度過一天的人', '最大容納5000人', '未來中心從服務大廳可遠眺未來大道，夜景十分迷人；另外未來中心有各種機器人、科技相關展覽，因此配合科技主題，設戶外露天造景休息區，營造舒適用餐環境充滿未來氣息與科技感的空間。', 1, 2, 0, 0, 0, 0),
(3, 'FA摩天輪', 'FA FERRIS WHEEL', 'ferris.jpg', 'fatic.jpg', '高空一覽未來的樣貌', '<ul><li>直徑<span>130</span>公尺</li><li>高度<span>135</span>公尺</li><li>最多<span>6</span>人/車廂</li></ul>', '120dpm', '想要高空一覽天下的人', '7歲以上', '約40層樓高、矗立在未來樂園的FA摩天輪，360度放眼所及，一覽未來的樣貌。當上升至最高點，可欣賞全園景致，與雲握手、與風對話。', 1, 2, 180, 110, 0, 1),
(4, 'OCT-R5大戰', 'VR ROBOT BATTLE', 'gd.png', 'gdtic.png', '體驗超刺激VR駕駛機器人之旅', '<ul><li>體驗時間<span>15</span>分鐘</li><li>有<span>5</span>種導航聲音</li><li>帶給你<span>8K</span>畫質</li></ul>', '150dpm', '想體驗操作機器戰鬥的人', '12歲以上', '玩家可藉由VR體驗駕駛全長7公尺、高度約3.5公尺、橫幅約3公尺、總重15噸的巨大機器人「OCT-R5」，音效、畫面的呈現帶給玩家刺激的機器人戰鬥體驗！', 1, 2, 350, 220, 0, 1),
(5, 'FA飛行船', 'FA BLIMP', 'Blimp.jpg', 'Blimptic.jpg', '難得的飛行體驗!', '<ul><li>全程<span>無人</span>駕駛</li><li>有<span>12</span>個座位</li><li>飛行高度<span>1000</span>公尺</li></ul>', '100dpm', '想悠哉眺望天空之人', '10歲以下需家長陪同', '飛行船的原理與熱氣球相同，藉由熱空氣上升、冷空氣下降來操控上下，而飛行船多了動力，所以可以操控行進的方向，僅此點與熱氣球不同。而FA飛行船結合了最新科技，為無人駕駛機，快來體驗與眾不同的飛行之旅吧！', 1, 2, 900, 750, 0, 1),
(6, '時空探險', 'VR TIME TRAVELER', 'p_02.jpg', 'p02pic.jpg', '最新的VR帶給大家視覺刺激', '<ul><li>體驗時間<span>15</span>分鐘</li><li>有<span>10</span>種隨機地點</li><li>帶給你<span>8K</span>畫質</li></ul>', '180dpm', '想體時空旅行之人', '7歲以上', '使用最新的VR技術，前往高科技的未來世界，挑戰在未來世界的各種試驗。\r\n每次進入的未來世界為隨機，共10種。', 1, 2, 350, 220, 0, 1),
(7, '未來劇場', 'FA THEATER', 'dome_theater.png', 'flyingtic.jpg', '不用票券', '<ul><li>最新<span>4DX</span>體感</li><li>最新<span>720</span>度全景</li><li>最<span>震撼</span>的音效</li></ul>', '120dpm', '想體驗4DX的人', '7歲以下需家長陪同', '未來劇場帶給影迷不可思議的觀影感受，可讓影迷體驗片中各種動態效果，包括震動搖晃與左右橫移，甚至是香氣水霧與閃光聲效和風效，讓看電影不再只是看電影，更是徹底融入電影，讓你成為電影的主角。', 1, 2, 0, 0, 0, 0),
(8, '電子舞廳', 'DIGITAL DANCING HALL', 'digital.jpg', 'djstation.png', '享受4D的跳舞世界', '', '130dpm', '想體驗特殊氣氛的人', '18歲以下不得飲酒', '以4D空間呈現特殊氣氛，每天不同的駐店DJ帶給舞廳不同風格的歌曲，舞廳旁還附有電子遊樂場，遊樂場有最新的遊戲機，且獲得的票券可兌換舞廳各式飲品。', 1, 2, 170, 100, 0, 1),
(9, '未來遊園車', 'THE FUTURE MRT', 'sobi.jpg', 'NULL', '不用票券', '<ul><li>時速最高<span>36</span>Km</li><li>總長<span>500</span>公里</li><li>最多<span>30</span>人/車廂</li></ul>', '110dpm', '來遊園的所有人', '7歲以下需家長陪同', '未來樂園的入園者皆可搭乘，可快速到達各個遊樂設施。', 1, 2, 0, 0, 0, 0);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`facility_no`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `facility`
--
ALTER TABLE `facility`
  MODIFY `facility_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
