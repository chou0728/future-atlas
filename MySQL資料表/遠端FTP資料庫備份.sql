-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 建立日期: Jan 28, 2018, 06:46 PM
-- 伺服器版本: 5.1.36
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 資料庫: `bd103g3`
--

-- --------------------------------------------------------

--
-- 資料表格式： `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `activity_no` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK',
  `activity_date` int(11) NOT NULL,
  `activity_name` varchar(15) NOT NULL,
  `activity_short_name` varchar(10) NOT NULL,
  `activity_location` varchar(10) NOT NULL,
  `activity_start_time` char(5) DEFAULT NULL,
  `activity_end_time` char(5) DEFAULT NULL,
  `activity_intro` varchar(20) DEFAULT NULL,
  `activity_news` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`activity_no`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=105 ;

--
-- 列出以下資料庫的數據： `activity`
--

INSERT INTO `activity` (`activity_no`, `activity_date`, `activity_name`, `activity_short_name`, `activity_location`, `activity_start_time`, `activity_end_time`, `activity_intro`, `activity_news`) VALUES
(1, 1, '台北COMPUTEX', 'COMPUTEX', '貿易中心', '10:00', '16:00', '物聯網的應用已愈來愈精彩，了解最新趨勢！', '廠商預期 2018 年物聯網就要進入商機爆發期，使得物聯網應用成為今年 COMPUTEX 的重頭戲，包括聚焦安全應用、智慧居家與娛樂、智慧穿戴、車用電子、3D 商業、智慧科技解決方案、智慧製造等超過 180 家廠商參展，當中也能看到台廠在物聯網時代的轉型成果。'),
(2, 6, '台北COMPUTEX', 'COMPUTEX', '貿易中心', '10:00', '16:00', '物聯網的應用已愈來愈精彩，了解最新趨勢！', '廠商預期 2018 年物聯網就要進入商機爆發期，使得物聯網應用成為今年 COMPUTEX 的重頭戲，包括聚焦安全應用、智慧居家與娛樂、智慧穿戴、車用電子、3D 商業、智慧科技解決方案、智慧製造等超過 180 家廠商參展，當中也能看到台廠在物聯網時代的轉型成果。'),
(3, 11, '台北COMPUTEX', 'COMPUTEX', '貿易中心', '10:00', '16:00', '物聯網的應用已愈來愈精彩，了解最新趨勢！', '廠商預期 2018 年物聯網就要進入商機爆發期，使得物聯網應用成為今年 COMPUTEX 的重頭戲，包括聚焦安全應用、智慧居家與娛樂、智慧穿戴、車用電子、3D 商業、智慧科技解決方案、智慧製造等超過 180 家廠商參展，當中也能看到台廠在物聯網時代的轉型成果。'),
(4, 16, '台北COMPUTEX', 'COMPUTEX', '貿易中心', '10:00', '16:00', '物聯網的應用已愈來愈精彩，了解最新趨勢！', '廠商預期 2018 年物聯網就要進入商機爆發期，使得物聯網應用成為今年 COMPUTEX 的重頭戲，包括聚焦安全應用、智慧居家與娛樂、智慧穿戴、車用電子、3D 商業、智慧科技解決方案、智慧製造等超過 180 家廠商參展，當中也能看到台廠在物聯網時代的轉型成果。'),
(5, 21, '台北COMPUTEX', 'COMPUTEX', '未來中心', '10:00', '16:00', '物聯網的應用已愈來愈精彩，了解最新趨勢！', '廠商預期 2018 年物聯網就要進入商機爆發期，使得物聯網應用成為今年 COMPUTEX 的重頭戲，包括聚焦安全應用、智慧居家與娛樂、智慧穿戴、車用電子、3D 商業、智慧科技解決方案、智慧製造等超過 180 家廠商參展，當中也能看到台廠在物聯網時代的轉型成果。'),
(6, 26, '台北COMPUTEX', 'COMPUTEX', '未來中心', '10:00', '16:00', '物聯網的應用已愈來愈精彩，了解最新趨勢！', '廠商預期 2018 年物聯網就要進入商機爆發期，使得物聯網應用成為今年 COMPUTEX 的重頭戲，包括聚焦安全應用、智慧居家與娛樂、智慧穿戴、車用電子、3D 商業、智慧科技解決方案、智慧製造等超過 180 家廠商參展，當中也能看到台廠在物聯網時代的轉型成果。'),
(7, 31, '台北AR show', 'AR展', '貿易中心', '10:00', '16:00', '物聯網的應用已愈來愈精彩，了解最新趨勢！', '廠商預期 2018 年物聯網就要進入商機爆發期，使得物聯網應用成為今年 COMPUTEX 的重頭戲，包括聚焦安全應用、智慧居家與娛樂、智慧穿戴、車用電子、3D 商業、智慧科技解決方案、智慧製造等超過 180 家廠商參展，當中也能看到台廠在物聯網時代的轉型成果。'),
(8, 2, '2018未來商務展', '未來商務展', '貿易中心', '11:00', '14:00', '四大主題 X 未來實境', '現在就是未來，聚焦Mobile、Internet、Technology所改變的未來世界，發掘創新商業模式、服務方式、銷售方式及溝通方式，一同攜手提早佈局、突破未來僵局，開創真正屬於我們的機會及時代。即將引爆未來商務的場景革命，Experience Everything...'),
(9, 3, '2018未來商務展', '未來商務展', '貿易中心', '11:00', '14:00', '四大主題 X 未來實境', '現在就是未來，聚焦Mobile、Internet、Technology所改變的未來世界，發掘創新商業模式、服務方式、銷售方式及溝通方式，一同攜手提早佈局、突破未來僵局，開創真正屬於我們的機會及時代。即將引爆未來商務的場景革命，Experience Everything...'),
(10, 4, '2018未來商務展', '未來商務展', '貿易中心', '11:00', '14:00', '四大主題 X 未來實境', '現在就是未來，聚焦Mobile、Internet、Technology所改變的未來世界，發掘創新商業模式、服務方式、銷售方式及溝通方式，一同攜手提早佈局、突破未來僵局，開創真正屬於我們的機會及時代。即將引爆未來商務的場景革命，Experience Everything...'),
(11, 5, '2018未來商務展', '未來商務展', '貿易中心', '11:00', '14:00', '四大主題 X 未來實境', '現在就是未來，聚焦Mobile、Internet、Technology所改變的未來世界，發掘創新商業模式、服務方式、銷售方式及溝通方式，一同攜手提早佈局、突破未來僵局，開創真正屬於我們的機會及時代。即將引爆未來商務的場景革命，Experience Everything...'),
(12, 6, '2018未來商務展', '未來商務展', '貿易中心', '11:00', '14:00', '四大主題 X 未來實境', '現在就是未來，聚焦Mobile、Internet、Technology所改變的未來世界，發掘創新商業模式、服務方式、銷售方式及溝通方式，一同攜手提早佈局、突破未來僵局，開創真正屬於我們的機會及時代。即將引爆未來商務的場景革命，Experience Everything...'),
(13, 7, '台北國際貿易博覽會', '貿易博覽會', '貿易中心', '14:00', '20:00', '包括工業、電子產品等十二個類別。', '為推動亞太區域貿易發展，促進柬埔寨與世界國家和地區的經濟交往，提升本地企業的知名度，擴大企業商品服務銷路，經柬埔寨王國商業部批准，首屆柬埔寨國際貿易博覽會將於2018年3月1 6至3月1 8日在金邊市鑽石島國際會展中心舉辦。目前，已有中國北京、上海、湖南等省市和港澳台地區以及東南亞周邊國家200余家企業報名參展。'),
(14, 8, '台北國際貿易博覽會', '貿易博覽會', '貿易中心', '14:00', '20:00', '包括工業、電子產品等十二個類別。', '為推動亞太區域貿易發展，促進柬埔寨與世界國家和地區的經濟交往，提升本地企業的知名度，擴大企業商品服務銷路，經柬埔寨王國商業部批准，首屆柬埔寨國際貿易博覽會將於2018年3月1 6至3月1 8日在金邊市鑽石島國際會展中心舉辦。目前，已有中國北京、上海、湖南等省市和港澳台地區以及東南亞周邊國家200余家企業報名參展。'),
(15, 9, '台北國際貿易博覽會', '貿易博覽會', '貿易中心', '14:00', '20:00', '包括工業、電子產品等十二個類別。', '為推動亞太區域貿易發展，促進柬埔寨與世界國家和地區的經濟交往，提升本地企業的知名度，擴大企業商品服務銷路，經柬埔寨王國商業部批准，首屆柬埔寨國際貿易博覽會將於2018年3月1 6至3月1 8日在金邊市鑽石島國際會展中心舉辦。目前，已有中國北京、上海、湖南等省市和港澳台地區以及東南亞周邊國家200余家企業報名參展。'),
(16, 10, '台北國際貿易博覽會', '貿易博覽會', '貿易中心', '14:00', '20:00', '包括工業、電子產品等十二個類別。', '為推動亞太區域貿易發展，促進柬埔寨與世界國家和地區的經濟交往，提升本地企業的知名度，擴大企業商品服務銷路，經柬埔寨王國商業部批准，首屆柬埔寨國際貿易博覽會將於2018年3月1 6至3月1 8日在金邊市鑽石島國際會展中心舉辦。目前，已有中國北京、上海、湖南等省市和港澳台地區以及東南亞周邊國家200余家企業報名參展。'),
(17, 11, '台北國際貿易博覽會', '貿易博覽會', '貿易中心', '14:00', '20:00', '包括工業、電子產品等十二個類別。', '為推動亞太區域貿易發展，促進柬埔寨與世界國家和地區的經濟交往，提升本地企業的知名度，擴大企業商品服務銷路，經柬埔寨王國商業部批准，首屆柬埔寨國際貿易博覽會將於2018年3月1 6至3月1 8日在金邊市鑽石島國際會展中心舉辦。目前，已有中國北京、上海、湖南等省市和港澳台地區以及東南亞周邊國家200余家企業報名參展。'),
(18, 12, '台北國際貿易博覽會', '貿易博覽會', '貿易中心', '14:00', '20:00', '包括工業、電子產品等十二個類別。', '為推動亞太區域貿易發展，促進柬埔寨與世界國家和地區的經濟交往，提升本地企業的知名度，擴大企業商品服務銷路，經柬埔寨王國商業部批准，首屆柬埔寨國際貿易博覽會將於2018年3月1 6至3月1 8日在金邊市鑽石島國際會展中心舉辦。目前，已有中國北京、上海、湖南等省市和港澳台地區以及東南亞周邊國家200余家企業報名參展。'),
(19, 13, '2018台北國際電玩展', '國際電玩展', '貿易中心', '15:00', '21:00', '台灣遊戲界年度盛事', '玩咖大集合！台灣遊戲界年度盛事【2018台北國際電玩展】將於1/26(五)~1/29(一)在台北世貿一館盛大展出，精彩活動天天不間斷，將帶來最豐富的遊戲體驗，集合最新發表的電玩大作、闔家同樂的趣味桌遊、女性專屬的粉紅區域、還有來自世界各地的創新獨立遊戲，就是要你玩個痛快！2018年最令人期待的遊戲盛會，等你來狂歡！'),
(20, 14, '2018台北國際電玩展', '國際電玩展', '貿易中心', '15:00', '21:00', '台灣遊戲界年度盛事', '玩咖大集合！台灣遊戲界年度盛事【2018台北國際電玩展】將於1/26(五)~1/29(一)在台北世貿一館盛大展出，精彩活動天天不間斷，將帶來最豐富的遊戲體驗，集合最新發表的電玩大作、闔家同樂的趣味桌遊、女性專屬的粉紅區域、還有來自世界各地的創新獨立遊戲，就是要你玩個痛快！2018年最令人期待的遊戲盛會，等你來狂歡！'),
(21, 15, '2018台北國際電玩展', '國際電玩展', '貿易中心', '15:00', '21:00', '台灣遊戲界年度盛事', '玩咖大集合！台灣遊戲界年度盛事【2018台北國際電玩展】將於1/26(五)~1/29(一)在台北世貿一館盛大展出，精彩活動天天不間斷，將帶來最豐富的遊戲體驗，集合最新發表的電玩大作、闔家同樂的趣味桌遊、女性專屬的粉紅區域、還有來自世界各地的創新獨立遊戲，就是要你玩個痛快！2018年最令人期待的遊戲盛會，等你來狂歡！'),
(22, 18, 'VR Show', '虛擬實境展', '未來中心', '15:00', '21:00', '台灣VR界年度盛事', '玩咖大集合！台灣遊戲界年度盛事【2018台北國際電玩展】將於1/26(五)~1/29(一)在台北世貿一館盛大展出，精彩活動天天不間斷，將帶來最豐富的遊戲體驗，集合最新發表的電玩大作、闔家同樂的趣味桌遊、女性專屬的粉紅區域、還有來自世界各地的創新獨立遊戲，就是要你玩個痛快！2018年最令人期待的遊戲盛會，等你來狂歡！'),
(23, 17, '2018台北國際電玩展', '國際電玩展', '未來中心', '15:00', '21:00', '台灣遊戲界年度盛事', '玩咖大集合！台灣遊戲界年度盛事【2018台北國際電玩展】將於1/26(五)~1/29(一)在台北世貿一館盛大展出，精彩活動天天不間斷，將帶來最豐富的遊戲體驗，集合最新發表的電玩大作、闔家同樂的趣味桌遊、女性專屬的粉紅區域、還有來自世界各地的創新獨立遊戲，就是要你玩個痛快！2018年最令人期待的遊戲盛會，等你來狂歡！'),
(24, 18, '2018台北國際電玩展', '國際電玩展', '未來中心', '15:00', '21:00', '台灣遊戲界年度盛事', '玩咖大集合！台灣遊戲界年度盛事【2018台北國際電玩展】將於1/26(五)~1/29(一)在台北世貿一館盛大展出，精彩活動天天不間斷，將帶來最豐富的遊戲體驗，集合最新發表的電玩大作、闔家同樂的趣味桌遊、女性專屬的粉紅區域、還有來自世界各地的創新獨立遊戲，就是要你玩個痛快！2018年最令人期待的遊戲盛會，等你來狂歡！'),
(25, 1, 'Wonton 混沌派對', 'Wonton', '電子舞廳', '21:00', '24:00', '那些太過美好的不可能，就像這場派對。', '巨大的飛船好像很高科技但這東西二戰之後不是就很少見了嗎？牆壁上爬滿不明所以的管線看來建築師已經不再費心將線路藏進牆裡，廣告看板裡的人物可以跟自己調情一向是全人類的夢想，卻找到控制系統證明法西斯從來不退流行有效率的掌控這個世界。死寂一片的城市井然有序，表面和諧卻隱隱躁動著。這是最糟糕政府的假想之地，以為2049啊？醒醒吧，我們其實沒有未來，歡迎來到現世絕望鄉－混沌派對'),
(26, 2, 'Wonton 混沌派對', 'Wonton', '電子舞廳', '21:00', '24:00', '那些太過美好的不可能，就像這場派對。', '巨大的飛船好像很高科技但這東西二戰之後不是就很少見了嗎？牆壁上爬滿不明所以的管線看來建築師已經不再費心將線路藏進牆裡，廣告看板裡的人物可以跟自己調情一向是全人類的夢想，卻找到控制系統證明法西斯從來不退流行有效率的掌控這個世界。死寂一片的城市井然有序，表面和諧卻隱隱躁動著。這是最糟糕政府的假想之地，以為2049啊？醒醒吧，我們其實沒有未來，歡迎來到現世絕望鄉－混沌派對'),
(27, 7, 'Wonton 混沌派對', '國際電玩展', '貿易中心', '21:00', '24:00', '那些太過美好的不可能，就像這場派對。', '巨大的飛船好像很高科技但這東西二戰之後不是就很少見了嗎？牆壁上爬滿不明所以的管線看來建築師已經不再費心將線路藏進牆裡，廣告看板裡的人物可以跟自己調情一向是全人類的夢想，卻找到控制系統證明法西斯從來不退流行有效率的掌控這個世界。死寂一片的城市井然有序，表面和諧卻隱隱躁動著。這是最糟糕政府的假想之地，以為2049啊？醒醒吧，我們其實沒有未來，歡迎來到現世絕望鄉－混沌派對'),
(28, 16, 'Wonton 混沌派對', 'Wonton', '電子舞廳', '21:00', '24:00', '那些太過美好的不可能，就像這場派對。', '巨大的飛船好像很高科技但這東西二戰之後不是就很少見了嗎？牆壁上爬滿不明所以的管線看來建築師已經不再費心將線路藏進牆裡，廣告看板裡的人物可以跟自己調情一向是全人類的夢想，卻找到控制系統證明法西斯從來不退流行有效率的掌控這個世界。死寂一片的城市井然有序，表面和諧卻隱隱躁動著。這是最糟糕政府的假想之地，以為2049啊？醒醒吧，我們其實沒有未來，歡迎來到現世絕望鄉－混沌派對'),
(29, 24, 'Wonton 混沌派對', 'Wonton', '電子舞廳', '21:00', '24:00', '那些太過美好的不可能，就像這場派對。', '巨大的飛船好像很高科技但這東西二戰之後不是就很少見了嗎？牆壁上爬滿不明所以的管線看來建築師已經不再費心將線路藏進牆裡，廣告看板裡的人物可以跟自己調情一向是全人類的夢想，卻找到控制系統證明法西斯從來不退流行有效率的掌控這個世界。死寂一片的城市井然有序，表面和諧卻隱隱躁動著。這是最糟糕政府的假想之地，以為2049啊？醒醒吧，我們其實沒有未來，歡迎來到現世絕望鄉－混沌派對'),
(95, 30, '星際大戰變裝秀', '變裝秀', '電子舞廳', '10:00', '14:01', '所有星際迷不可錯過的盛會', NULL),
(96, 27, '搜尋關鍵報告', '搜尋報告', '未來中心', '10:00', '18:00', 'Larry Page預測2018年趨勢', NULL),
(97, 22, '未來生活節', '未來生活節', '貿易中心', '18:00', '20:00', '未來的生活現在就開始', NULL),
(98, 23, '未來生活節', '未來生活節', '未來大道', '18:00', '20:00', '未來的生活現在就開始', NULL),
(99, 29, '星際大戰變裝秀', '變裝秀', '電子舞廳', '20:00', '22:00', '所有星際迷不可錯過的盛會', NULL),
(100, 28, 'VR Show', '虛擬實境展', '明日之廳', '10:00', '12:00', '台灣VR界年度盛事', NULL),
(101, 19, '未來燈光秀', '未來燈光秀', '未來大道', '23:00', '23:30', '結合科技與藝術的煙火燈光秀', NULL),
(102, 20, '未來燈光秀', '未來燈光秀', '未來大道', '23:00', '12:30', '結合科技與藝術的煙火燈光秀', NULL),
(103, 25, '未來燈光秀', '未來燈光秀', '未來大道', '23:00', '23:30', '結合科技與藝術的煙火燈光秀', NULL),
(104, 5, 'DPP關鍵報告', 'DPP報告', '貿易中心', '00:00', '13:00', 'Flurr報告2017年行動市', NULL);

-- --------------------------------------------------------

--
-- 資料表格式： `backend_manager`
--

CREATE TABLE IF NOT EXISTS `backend_manager` (
  `manager_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK',
  `manager_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '限英文數字，英文不分大小寫',
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `top_manager` tinyint(1) NOT NULL COMMENT '1:是 0:否',
  `manager_status` tinyint(1) NOT NULL COMMENT '1:正常 0:停用',
  PRIMARY KEY (`manager_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- 列出以下資料庫的數據： `backend_manager`
--

INSERT INTO `backend_manager` (`manager_id`, `manager_name`, `password`, `top_manager`, `manager_status`) VALUES
(1, 'superfa', '123456', 1, 1),
(2, 'eric', '123456', 0, 1),
(3, 'isnarita', '123456', 0, 1),
(4, 'manna', '123456', 0, 1),
(5, 'david', '123456', 0, 0),
(6, 'yuyu', '123456', 0, 1);

-- --------------------------------------------------------

--
-- 資料表格式： `facility`
--

CREATE TABLE IF NOT EXISTS `facility` (
  `facility_no` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK',
  `facility_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `facility_subname` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facility_mphoto` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `facility_tphoto` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `facility_intro` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facility_phrase` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facility_heart` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facility_suit` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facility_limit` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facility_description` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facility_status` tinyint(1) NOT NULL DEFAULT '1',
  `facility_crowd` int(11) NOT NULL DEFAULT '2',
  `full_fare` int(11) DEFAULT NULL,
  `half_fare` int(11) DEFAULT NULL,
  `info_already` tinyint(1) NOT NULL DEFAULT '0',
  `ticket_already` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`facility_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- 列出以下資料庫的數據： `facility`
--

INSERT INTO `facility` (`facility_no`, `facility_name`, `facility_subname`, `facility_mphoto`, `facility_tphoto`, `facility_intro`, `facility_phrase`, `facility_heart`, `facility_suit`, `facility_limit`, `facility_description`, `facility_status`, `facility_crowd`, `full_fare`, `half_fare`, `info_already`, `ticket_already`) VALUES
(1, '宇宙雲霄飛車', 'COSMOS ROLLER COASTER', 'sub_6365_LL.png', 'roller.jpg', '史上最快最速的雲霄飛車', '<ul><li>全長<span>1250</span>公尺</li><li>速度最高<span>150</span>公里/小時</li><li>高度最高<span>32</span>公尺</li></ul>', '180dpm', '想感受刺激的人', '200cm以下', '以令人停止呼吸的加速度發動，僅需1.8秒就能達到150公里／小時，衝進空中垂直塔的一刻，周圍景色彷彿全部靜止，只聽得到尖叫聲貫穿樂園、直衝宇宙。', 1, 2, 150, 90, 1, 1),
(2, '未來中心', 'FUTURE CENTER', '20170910152642.jpg', '210.jpg', '不用票券', '<ul><li>有<span>12</span>種風格餐廳</li><li>內附<span>個別</span>休息室</li><li>不定期<span>免費</span>展覽</li></ul>', '100dpm', '想悠哉整天的人', '容納5000人', '未來中心從服務大廳可遠眺未來大道，夜景十分迷人；另外未來中心有各種機器人、科技相關展覽，因此配合科技主題，設戶外露天造景休息區，營造舒適用餐環境充滿未來氣息與科技感的空間。', 1, 2, 0, 0, 1, 0),
(3, 'FA摩天輪', 'FA FERRIS WHEEL', 'ferris.jpg', 'fatic.jpg', '高空一覽未來的樣貌', '<ul><li>直徑<span>130</span>公尺</li><li>高度<span>135</span>公尺</li><li>最多<span>6</span>人/車廂</li></ul>', '120dpm', '想一覽天下的人', '7歲以上', '約40層樓高、矗立在未來樂園的FA摩天輪，360度放眼所及，一覽未來的樣貌。當上升至最高點，可欣賞全園景致，與雲握手、與風對話。', 1, 2, 180, 110, 1, 1),
(4, 'OCT-R5大戰', 'VR ROBOT BATTLE', 'gd.png', 'gdtic.png', '體驗超刺激VR駕駛機器人之旅', '<ul><li>體驗時間<span>15</span>分鐘</li><li>有<span>5</span>種導航聲音</li><li>帶給你<span>8K</span>畫質</li></ul>', '150dpm', '想體驗機器戰鬥者', '12歲以上', '玩家可藉由VR體驗駕駛全長7公尺、高度約3.5公尺、橫幅約3公尺、總重15噸的巨大機器人「OCT-R5」，音效、畫面的呈現帶給玩家刺激的機器人戰鬥體驗！', 1, 2, 350, 220, 1, 1),
(5, 'FA飛行船', 'FA BLIMP', 'Blimp.jpg', 'Blimptic.jpg', '難得的飛行體驗!', '<ul><li>全程<span>無人</span>駕駛</li><li>有<span>12</span>個座位</li><li>飛行高度<span>1000</span>公尺</li></ul>', '100dpm', '想眺望天空之人', '10歲以上', '飛行船的原理與熱氣球相同，藉由熱空氣上升、冷空氣下降來操控上下，而飛行船多了動力，所以可以操控行進的方向，僅此點與熱氣球不同。而FA飛行船結合了最新科技，為無人駕駛機，快來體驗與眾不同的飛行之旅吧！', 1, 2, 900, 750, 1, 1),
(6, '時空探險', 'VR TIME TRAVELER', 'p_02.jpg', 'p02pic.jpg', '最新的VR帶給大家視覺刺激', '<ul><li>體驗時間<span>15</span>分鐘</li><li>有<span>10</span>種隨機地點</li><li>帶給你<span>8K</span>畫質</li></ul>', '180dpm', '想時空旅行者', '7歲以上', '使用最新的VR技術，前往高科技的未來世界，挑戰在未來世界的各種試驗。\r\n每次進入的未來世界為隨機，共10種。', 1, 2, 350, 220, 1, 1),
(7, '未來劇場', 'FA THEATER', 'dome_theater.png', 'flyingtic.jpg', '不用票券', '<ul><li>最新<span>4DX</span>體感</li><li>最新<span>720</span>度全景</li><li>最<span>震撼</span>的音效</li></ul>', '120dpm', '想體驗4D者', '7歲以上', '未來劇場帶給影迷不可思議的觀影感受，可讓影迷體驗片中各種動態效果，包括震動搖晃與左右橫移，甚至是香氣水霧與閃光聲效和風效，讓看電影不再只是看電影，更是徹底融入電影，讓你成為電影的主角。', 1, 2, 0, 0, 1, 0),
(8, '電子舞廳', 'DIGITAL DANCING HALL', 'digital.jpg', 'djstation.png', '享受4D的跳舞世界', '', '130dpm', '注重氣氛的人', '未成年勿飲酒', '以4D空間呈現特殊氣氛，每天不同的駐店DJ帶給舞廳不同風格的歌曲，舞廳旁還附有電子遊樂場，遊樂場有最新的遊戲機，且獲得的票券可兌換舞廳各式飲品。', 1, 2, 170, 100, 1, 1),
(9, '未來遊園車', 'THE FUTURE MRT', 'sobi.jpg', 'NULL', '不用票券', '<ul><li>時速最高<span>36</span>Km</li><li>總長<span>500</span>公里</li><li>最多<span>30</span>人/車廂</li></ul>', '110dpm', '來遊園的所有人', '7歲以上', '未來樂園的入園者皆可搭乘，可快速到達各個遊樂設施。', 1, 2, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- 資料表格式： `facility_comment`
--

CREATE TABLE IF NOT EXISTS `facility_comment` (
  `facility_no` int(11) DEFAULT NULL COMMENT 'FK',
  `mem_id` int(11) DEFAULT NULL COMMENT 'FK',
  `comment_content` varchar(200) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '預設空值',
  `comment_grade` int(11) NOT NULL DEFAULT '0' COMMENT '1-5分',
  `comment_timestamp` datetime DEFAULT NULL,
  `comment_status` tinyint(1) NOT NULL,
  KEY `facility_no` (`facility_no`),
  KEY `mem_id` (`mem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 列出以下資料庫的數據： `facility_comment`
--

INSERT INTO `facility_comment` (`facility_no`, `mem_id`, `comment_content`, `comment_grade`, `comment_timestamp`, `comment_status`) VALUES
(1, 6, 'wowowwo', 3, '2018-01-24 14:02:42', 1),
(3, 6, '很好玩', 4, '2018-01-24 14:23:35', 1),
(2, 6, '非常方便的中心，服務也很棒!', 5, '2018-01-24 18:10:45', 1),
(4, 6, '好無聊', 3, '2018-01-26 07:44:23', 1),
(3, 6, '超棒的摩天輪，夜景超美!很適合情侶一起來~', 4, '2018-01-26 20:29:01', 1),
(1, 8, '我喜歡這種刺激的感覺', 4, '2018-01-26 21:45:10', 1),
(6, 8, '沒有很真實的時空穿越感，覺得有點失望', 2, '2018-01-26 21:45:36', 1),
(3, 8, '轉一圈速度有點久，一個人搭成很無聊', 2, '2018-01-27 13:55:17', 1),
(5, 8, '第一次搭乘飛行船，真的是太酷了', 5, '2018-01-27 13:56:49', 1),
(4, 8, '喜歡機器人的朋友都應該來玩的!', 4, '2018-01-27 13:59:23', 1),
(1, 9, '想要更刺激', 3, '2018-01-27 14:02:55', 1),
(5, 9, '飛行船很棒，座位如果能更舒適點就更好', 4, '2018-01-27 14:03:13', 1),
(6, 9, 'ＶＲ體驗超酷，好像真的穿越了時空一樣', 5, '2018-01-27 14:03:43', 1),
(8, 9, '氣氛太讓人暈眩，希望酒的種類可以多一點', 3, '2018-01-27 14:04:12', 1),
(7, 9, '服務很好', 5, '2018-01-27 14:04:58', 1),
(9, 9, '速度真的很快！節省不少時間', 5, '2018-01-27 14:05:15', 1),
(1, 6, '嚇的我不要不要的', 4, '2018-01-27 15:41:34', 1),
(4, 7, '非常棒!!', 5, '2018-01-27 17:08:17', 1),
(1, 7, '不錯玩', 5, '2018-01-27 19:49:36', 1),
(4, 6, '超逼真的打鬥情境，下次再去一定要再玩!', 5, '2018-01-28 01:17:29', 1),
(2, 12, '感覺很有科技感的中心耶!好想趕快去體驗看看', 4, '2018-01-28 05:30:28', 1),
(8, 8, '跳舞跳得很盡興', 5, '2018-01-28 13:27:42', 1),
(7, 8, '座位很乾淨', 4, '2018-01-28 13:28:18', 1),
(6, 8, '超好玩', 5, '2018-01-28 17:01:44', 1),
(2, 10, '免費賺積分喔!!', 5, '2018-01-28 22:09:50', 1),
(1, 10, '很刺激喔!!!!', 5, '2018-01-28 22:32:22', 1);

-- --------------------------------------------------------

--
-- 資料表格式： `facility_order`
--

CREATE TABLE IF NOT EXISTS `facility_order` (
  `order_no` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK',
  `mem_id` int(11) NOT NULL COMMENT 'FK',
  `order_date` date DEFAULT NULL,
  `original_total` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `creditcard_num` char(16) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`order_no`),
  KEY `mem_id` (`mem_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- 列出以下資料庫的數據： `facility_order`
--

INSERT INTO `facility_order` (`order_no`, `mem_id`, `order_date`, `original_total`, `discount`, `creditcard_num`) VALUES
(1, 6, '2018-01-26', 0, 0, ''),
(2, 6, '2018-01-26', 0, 0, ''),
(3, 6, '2018-01-26', 180, 0, ''),
(4, 8, '2018-01-26', 500, 0, '1258404450562122'),
(5, 8, '2018-01-27', 2770, 0, '1434057822593333'),
(6, 8, '2018-01-27', 220, 0, '2235456825457894'),
(7, 9, '2018-01-27', 4240, 0, '0399875602571958'),
(8, 6, '2018-01-27', 850, 0, '1235054784523565'),
(9, 7, '2018-01-27', 470, 0, '1567466977954498'),
(10, 7, '2018-01-27', 390, 0, '5685465774567456'),
(11, 7, '2018-01-27', 700, 0, '5445564789897364'),
(12, 10, '2018-01-27', 1060, 0, '4564687945678978'),
(13, 7, '2018-01-27', 1100, 10, '1264356427474747'),
(14, 12, '2018-01-27', 360, 0, '8797234567894563'),
(15, 12, '2018-01-27', 300, 50, '6456456789434567'),
(16, 8, '2018-01-28', 460, 12, '5264888875451256'),
(17, 6, '2018-01-28', 450, 0, '1111233338223821'),
(18, 6, '2018-01-28', 450, 0, '1111233338223821'),
(19, 10, '2018-01-28', 360, 50, '7258725525272752'),
(20, 10, '2018-01-28', 390, 0, '8858478575755572'),
(21, 6, '2018-01-28', 1500, 0, '4465456494652315');

-- --------------------------------------------------------

--
-- 資料表格式： `facility_order_item`
--

CREATE TABLE IF NOT EXISTS `facility_order_item` (
  `order_no` int(11) NOT NULL DEFAULT '0' COMMENT 'PK,FK',
  `facility_no` int(11) NOT NULL DEFAULT '0' COMMENT 'PK,FK',
  `mem_id` int(11) DEFAULT NULL COMMENT 'FK',
  `facility_name` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `full_fare_num` int(11) DEFAULT '0',
  `full_fare_num_used` int(11) DEFAULT '0',
  `half_fare_num` int(11) DEFAULT '0',
  `half_fare_num_used` int(11) DEFAULT '0',
  `subtotal` int(11) DEFAULT NULL COMMENT '訂單小計 ',
  `comment_content` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment_grade` int(11) DEFAULT '0' COMMENT '1-5分',
  `comment_timestamp` datetime DEFAULT NULL,
  `comment_status` tinyint(1) DEFAULT '0' COMMENT '1:已評價 0:未評價',
  PRIMARY KEY (`order_no`,`facility_no`),
  KEY `order_no` (`order_no`),
  KEY `facility_no` (`facility_no`),
  KEY `mem_id` (`mem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 列出以下資料庫的數據： `facility_order_item`
--

INSERT INTO `facility_order_item` (`order_no`, `facility_no`, `mem_id`, `facility_name`, `full_fare_num`, `full_fare_num_used`, `half_fare_num`, `half_fare_num_used`, `subtotal`, `comment_content`, `comment_grade`, `comment_timestamp`, `comment_status`) VALUES
(3, 3, 6, 'FA摩天輪', 1, 1, 0, 0, 180, '超棒的摩天輪，夜景超美!很適合情侶一起來~', 4, '2018-01-26 20:29:01', 1),
(4, 1, 8, '宇宙雲霄飛車', 1, 1, 0, 0, 150, '我喜歡這種刺激的感覺', 4, '2018-01-26 21:45:10', 1),
(4, 6, 8, '時空探險', 1, 0, 0, 0, 350, '沒有很真實的時空穿越感，覺得有點失望', 2, '2018-01-26 21:45:36', 1),
(5, 3, 8, 'FA摩天輪', 1, 0, 0, 0, 180, '轉一圈速度有點久，一個人搭成很無聊', 2, '2018-01-27 13:55:17', 1),
(5, 5, 8, 'FA飛行船', 1, 0, 1, 0, 1650, '第一次搭乘飛行船，真的是太酷了', 5, '2018-01-27 13:56:49', 1),
(5, 6, 8, '時空探險', 1, 0, 1, 0, 570, '超好玩', 5, '2018-01-28 17:01:44', 1),
(5, 8, 8, '電子舞廳', 1, 0, 2, 0, 370, '跳舞跳得很盡興', 5, '2018-01-28 13:27:42', 1),
(6, 4, 8, 'OCT-R5大戰', 0, 0, 1, 0, 220, '喜歡機器人的朋友都應該來玩的!', 4, '2018-01-27 13:59:23', 1),
(7, 1, 9, '宇宙雲霄飛車', 1, 0, 1, 0, 240, '想要更刺激', 3, '2018-01-27 14:02:55', 1),
(7, 5, 9, 'FA飛行船', 3, 0, 0, 0, 2700, '飛行船很棒，座位如果能更舒適點就更好', 4, '2018-01-27 14:03:13', 1),
(7, 6, 9, '時空探險', 2, 0, 0, 0, 700, 'ＶＲ體驗超酷，好像真的穿越了時空一樣', 5, '2018-01-27 14:03:43', 1),
(7, 8, 9, '電子舞廳', 0, 0, 6, 0, 600, '氣氛太讓人暈眩，希望酒的種類可以多一點', 3, '2018-01-27 14:04:12', 1),
(8, 1, 6, '宇宙雲霄飛車', 1, 1, 0, 0, 150, '嚇的我不要不要的', 4, '2018-01-27 15:41:34', 1),
(8, 4, 6, 'OCT-R5大戰', 2, 2, 0, 0, 700, '超逼真的打鬥情境，下次再去一定要再玩!', 5, '2018-01-28 01:17:29', 1),
(9, 3, 7, 'FA摩天輪', 2, 0, 1, 0, 470, '尚未評分', 0, '0000-00-00 00:00:00', 0),
(10, 1, 7, '宇宙雲霄飛車', 2, 0, 1, 0, 390, '不錯玩', 5, '2018-01-27 19:49:36', 1),
(11, 4, 7, 'OCT-R5大戰', 2, 2, 0, 0, 700, '非常棒!!', 5, '2018-01-27 17:08:17', 1),
(12, 3, 10, 'FA摩天輪', 2, 0, 0, 0, 360, '尚未評分', 0, '0000-00-00 00:00:00', 0),
(12, 6, 10, '時空探險', 2, 0, 0, 0, 700, '尚未評分', 0, '0000-00-00 00:00:00', 0),
(13, 1, 7, '宇宙雲霄飛車', 1, 0, 1, 0, 240, '尚未評分', 0, '0000-00-00 00:00:00', 0),
(13, 3, 7, 'FA摩天輪', 1, 0, 1, 0, 290, '尚未評分', 0, '0000-00-00 00:00:00', 0),
(13, 4, 7, 'OCT-R5大戰', 1, 0, 1, 0, 570, '尚未評分', 0, '0000-00-00 00:00:00', 0),
(14, 3, 12, 'FA摩天輪', 2, 0, 0, 0, 360, '尚未評分', 0, '0000-00-00 00:00:00', 0),
(15, 1, 12, '宇宙雲霄飛車', 2, 0, 0, 0, 300, '尚未評分', 0, '0000-00-00 00:00:00', 0),
(16, 1, 8, '宇宙雲霄飛車', 1, 0, 1, 0, 240, '尚未評分', 0, '0000-00-00 00:00:00', 0),
(16, 6, 8, '時空探險', 0, 0, 1, 0, 220, '尚未評分', 0, '0000-00-00 00:00:00', 0),
(17, 1, 6, '宇宙雲霄飛車', 3, 3, 0, 0, 450, '尚未評分', 0, '0000-00-00 00:00:00', 0),
(18, 1, 6, '宇宙雲霄飛車', 3, 3, 0, 0, 450, '尚未評分', 0, '0000-00-00 00:00:00', 0),
(19, 3, 10, 'FA摩天輪', 2, 0, 0, 0, 360, '尚未評分', 0, '0000-00-00 00:00:00', 0),
(20, 1, 10, '宇宙雲霄飛車', 2, 0, 1, 0, 390, '很刺激喔!!!!', 5, '2018-01-28 22:32:22', 1),
(21, 1, 6, '宇宙雲霄飛車', 10, 10, 0, 0, 1500, '尚未評分', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- 資料表格式： `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `mem_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK',
  `mem_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '帳號(62~0碼)',
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '密碼(6~20碼)',
  `mem_nick` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT '暱稱',
  `mem_points` int(11) NOT NULL DEFAULT '50',
  `mem_permissions` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:可對設施留言 0:不可對設施留言',
  `mem_mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mem_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`mem_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- 列出以下資料庫的數據： `member`
--

INSERT INTO `member` (`mem_id`, `mem_name`, `password`, `mem_nick`, `mem_points`, `mem_permissions`, `mem_mail`, `mem_phone`) VALUES
(1, 'david', '123456', '大衛David', 50, 1, 'david520@gmail.com', '0942205923'),
(2, 'handsome', '123456', 'Handsome', 50, 1, 'handsome@gmail.com', '0946505923'),
(3, 'sara', '123456', 'Sara', 50, 1, 'sbxew@ggg', '0926704627'),
(4, 'rose', '123456', 'Rose', 50, 1, 'a123w99@gmail.com', '0926704627'),
(5, 'alex', '123456', 'Alex', 50, 1, 'b12345699@gmail.com', '0926704627'),
(6, 'eric', '123456', 'Eric', 80, 1, 'eric0728@gmail.com', '0926704627'),
(7, 'manna', '123456', 'manna', 60, 1, 'manna99@gmail.com', '0926704627'),
(8, 'tina', '123456', 'tina', 118, 1, 'tina666@gmail.com', '0910236785'),
(9, 'takeshi', '123456', 'takeshi552', 110, 1, 'takeshi552@gmail.com', '0921555326'),
(10, 'andylee', '123456', 'andylee', 20, 1, 'andylee@gmail.com', '0945684236'),
(11, 'lulala', '123456', 'Lulu', 50, 1, 'gg@gmail', '0946474747'),
(12, 'peggy123', '810728', 'peggy', 10, 1, 'peggy123@gmail.com', '0914365210');

-- --------------------------------------------------------

--
-- 資料表格式： `question_and_answer`
--

CREATE TABLE IF NOT EXISTS `question_and_answer` (
  `key_word_no` int(255) NOT NULL AUTO_INCREMENT COMMENT 'PK',
  `key_word` varchar(10000) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '尚未定義' COMMENT '關鍵字',
  `answer` varchar(10000) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '尚未定義' COMMENT '關鍵字對應的答案',
  `unsolved_question` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci COMMENT '使用者找不到答案的問題',
  PRIMARY KEY (`key_word_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=135 ;

--
-- 列出以下資料庫的數據： `question_and_answer`
--

INSERT INTO `question_and_answer` (`key_word_no`, `key_word`, `answer`, `unsolved_question`) VALUES
(1, '位置', '本園區的地址為 桃園市中壢區中大路300號', NULL),
(2, '開門', '本園開放時間為週一至週日10:00至22:00，時間偶有調整，詳情請見活動月曆專區', NULL),
(3, '營業', '本園開放時間為週一至週日10:00至22:00，時間偶有調整，詳情請見活動月曆專區', NULL),
(4, '關門', '本園開放時間為週一至週日10:00至22:00，時間偶有調整，詳情請見活動月曆專區', NULL),
(5, '幾點', '本園開放時間為週一至週日10:00至22:00，時間偶有調整，詳情請見活動月曆專區', NULL),
(6, '閉園', '本園開放時間為週一至週日10:00至22:00，時間偶有調整，詳情請見活動月曆專區', NULL),
(8, '設施購票', '您可直接點選上方導覽列左邊的「設施購票」選項，即可進入購買設施票券之頁面', NULL),
(9, '劇場購票', '您可直接點選上方導覽列左邊的「劇場購票」選項，即可進入購買劇場票券之頁面', NULL),
(10, '使用', '不論是設施票券或劇場票券，只需在入場驗票時出示您會員專區中的QR code便可直接入場', NULL),
(12, '機車', '請勿使用不雅文字，小心我開槍喔!', NULL),
(14, '活動', '您可直接點選上方導覽列右邊的「活動月曆」選項，即可查看活動', NULL),
(16, '好餓', '....我也是', NULL),
(22, '購票', '我們的票券皆為電子票券，請先成為本站的會員即可購買票券', NULL),
(24, '開園', '本園開放時間為週一至週日10:00至22:00，時間偶有調整，詳情請見活動月曆專區', NULL),
(26, '對不起', '沒關係啦', NULL),
(28, '買票', '我們的票券皆為電子票券，請先成為本站的會員即可購買票券', NULL),
(29, '周邊商品', '我們的周邊商品皆為實體店面販售，沒有開放網路購買喔', NULL),
(30, '哈囉', '哈囉', NULL),
(32, 'Open', '本園開放時間為週一至週日10:00至22:00，時間偶有調整，詳情請見活動月曆專區', NULL),
(38, '刺激', '你可以試試宇宙雲霄飛車或是電子舞廳', NULL),
(39, '評價', '成為我們的會員即可評價，一次評價可獲得10積分，現賺10元喔', NULL),
(41, '很普通', '我也覺得很普通', NULL),
(42, '排隊', '您可直接點選上方導覽列左邊的「設施介紹」選項，即可查看目前設施的人潮等狀態', NULL),
(43, '貓咪', '可至「尋喵啟事」平台獲取各種貓咪相關資訊！網址：http://bit.ly/2EhNiXl', NULL),
(44, '說人話', '你才給我說人話', NULL),
(59, '害怕', '不要怕', NULL),
(60, 'FA', '「FA」是FUTURE ATLAS的簡稱', NULL),
(61, '好貴', '覺得貴的話，可成為我們的會員，對設施評分就能拿到積分，1積分可以折抵1元', NULL),
(65, '測試', '是要測多久', NULL),
(67, '嗨', '嗨', NULL),
(70, 'Hi', 'Hi!', NULL),
(71, '你好', '你好！', NULL),
(77, '開運', '可至「Dozen點算」平台購買開運小物讓運勢旺旺旺！網址：http://bit.ly/2EgmCWB', NULL),
(82, '靠杯', '請勿使用不雅文字，小心我開槍喔!', NULL),
(83, '智障', '你才是智障', NULL),
(85, '周志峰', '我明天一定會到學校', NULL),
(86, '劉介安', '我真的不太了解你的意思，但請勿留下不雅文字', NULL),
(87, 'ATLAS', 'ATLAS的原意是一本地圖集，而我們的樂園就像是一本記錄過去到未來的大地圖集，所以才會用ATLAS來命名喔', NULL),
(88, '劉家彭', '是一個甲甲', NULL),
(89, '黃宥函', '情敵都是男人', NULL),
(90, '新年', '新年快樂！今年也是美好的一年！', NULL),
(91, '積分', '積分可以於購買設施及劇場票券時扣抵金額，1點積分可扣抵1元喔!', NULL),
(92, '撿到貓咪', '可至「尋喵啟事」平台獲取各種貓咪相關資訊！網址：http://bit.ly/2EhNiXl', NULL),
(96, '算命', '可至「Dozen點算」平台獲得您想要的答案！網址：http://bit.ly/2EgmCWB', NULL),
(97, '生日', '生日快樂！', NULL),
(99, '回家', '這裡就是你的家', NULL),
(100, '早安', '早安', NULL),
(103, '聊天', '請問要聊什麼呢?', NULL),
(104, '尋喵啟事', '網址：http://bit.ly/2EhNiXl', NULL),
(105, 'Dozen', '網址：http://bit.ly/2EgmCWB', NULL),
(106, '點算', '網址：http://bit.ly/2EgmCWB', NULL),
(120, '你跟安', '你才跟安安最好!', NULL),
(123, '安安', '安安~你好', NULL),
(126, '結束', '謝謝大家的聆聽!新年快樂~', NULL);

-- --------------------------------------------------------

--
-- 資料表格式： `theater_order_list`
--

CREATE TABLE IF NOT EXISTS `theater_order_list` (
  `theater_ticket_no` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK',
  `session_no` int(11) NOT NULL COMMENT 'FK',
  `mem_id` int(11) NOT NULL COMMENT 'FK',
  `number_purchase` int(11) NOT NULL,
  `used_ticket` int(11) DEFAULT '0' COMMENT '預設為0',
  `order_date` date NOT NULL COMMENT 'yyyy-mm-dd',
  `original_amount` int(11) DEFAULT NULL COMMENT '訂單原始總金額',
  `points_discount` int(11) DEFAULT '0',
  `credit_card` char(19) COLLATE utf8_unicode_ci NOT NULL,
  `program_no` int(11) NOT NULL COMMENT 'FK',
  PRIMARY KEY (`theater_ticket_no`),
  KEY `program_no` (`program_no`),
  KEY `session_no` (`session_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=55 ;

--
-- 列出以下資料庫的數據： `theater_order_list`
--

INSERT INTO `theater_order_list` (`theater_ticket_no`, `session_no`, `mem_id`, `number_purchase`, `used_ticket`, `order_date`, `original_amount`, `points_discount`, `credit_card`, `program_no`) VALUES
(1, 16, 2, 2, 0, '2018-01-26', 200, 0, '1647-5978-1345-4679', 1),
(2, 33, 3, 2, 0, '2018-01-26', 200, 0, '4679-8462-1378-4268', 2),
(3, 34, 4, 2, 0, '2018-01-26', 200, 0, '6458-8234-9731-3669', 2),
(4, 35, 5, 2, 0, '2018-01-26', 200, 0, '1364-4678-2925-4367', 2),
(5, 36, 6, 2, 0, '2018-01-26', 200, 0, '6795-2346-7513-4921', 2),
(6, 17, 7, 1, 1, '2018-01-26', 100, 0, '6497-1375-4682-1927', 1),
(7, 18, 8, 2, 0, '2018-01-26', 200, 0, '4629-8372-1276-4952', 1),
(8, 61, 2, 2, 0, '2018-01-26', 200, 0, '4268-1035-7469-1065', 2),
(9, 62, 3, 2, 0, '2018-01-26', 100, 0, '6482-3288-4762-1954', 2),
(10, 63, 4, 1, 0, '2018-01-26', 100, 0, '9167-4385-1047-3691', 2),
(11, 64, 5, 1, 0, '2018-01-26', 100, 0, '4862-1035-7921-4632', 2),
(12, 53, 6, 1, 1, '2018-01-26', 100, 0, '2351-1786-1032-8946', 1),
(13, 17, 6, 2, 2, '2018-01-26', 200, 0, '0089-7755-1477-5107', 1),
(14, 61, 2, 1, 0, '2018-01-26', 100, 0, '4316-7913-1964-2046', 2),
(15, 50, 6, 1, 0, '2018-01-26', 100, 0, '5435-3454-4475-7855', 1),
(16, 45, 8, 1, 0, '2018-01-27', 100, 0, '4237-6915-4627-7951', 1),
(17, 46, 3, 2, 0, '2018-01-27', 200, 0, '4237-1369-4208-9145', 1),
(18, 47, 3, 2, 0, '2018-01-27', 200, 0, '4326-8781-2565-7824', 1),
(19, 46, 7, 2, 0, '2018-01-27', 200, 0, '4679-1248-3675-1049', 1),
(20, 63, 7, 2, 0, '2018-01-27', 100, 0, '4682-1379-4682-1649', 2),
(21, 44, 7, 2, 0, '2018-01-27', 200, 0, '4681-7913-4620-4912', 2),
(22, 36, 7, 2, 0, '2018-01-27', 200, 0, '1234-3647-5678-5678', 2),
(23, 37, 10, 2, 0, '2018-01-27', 200, 0, '7897-9456-7845-0789', 2),
(24, 36, 10, 2, 0, '2018-01-27', 200, 0, '7897-9645-5676-7869', 2),
(25, 45, 2, 1, 0, '2018-01-27', 100, 0, '1679-5389-1267-6437', 1),
(26, 41, 3, 2, 0, '2018-01-27', 200, 0, '1346-5956-8385-2131', 2),
(27, 58, 12, 2, 0, '2018-01-27', 200, 0, '8978-7756-7544-4567', 1),
(28, 46, 5, 2, 0, '2018-01-28', 200, 0, '1035-6846-2486-1035', 1),
(29, 65, 6, 2, 2, '2018-01-28', 200, 0, '2345-7615-3224-1679', 2),
(30, 58, 8, 2, 0, '2018-01-28', 200, 0, '1257-6324-2378-1292', 1),
(31, 68, 11, 2, 0, '2018-01-28', 200, 0, '1024-5589-6132-4862', 2),
(32, 57, 10, 2, 0, '2018-01-28', 200, 0, '7825-3214-9652-1258', 1),
(33, 59, 9, 2, 0, '2018-01-28', 200, 0, '6282-4267-5813-3168', 1),
(34, 66, 9, 3, 0, '2018-01-28', 300, 0, '3462-6765-2436-3725', 2),
(35, 67, 4, 4, 0, '2018-01-28', 400, 0, '4682-3791-2376-7345', 2),
(36, 60, 4, 2, 0, '2018-01-28', 200, 0, '6789-5223-2697-1354', 1),
(37, 48, 12, 2, 0, '2018-01-28', 200, 0, '2576-1057-8912-4623', 1),
(38, 42, 12, 2, 0, '2018-01-28', 200, 0, '1035-9645-1035-7812', 2),
(39, 49, 8, 2, 0, '2018-01-28', 200, 0, '3679-1056-9801-6245', 1),
(40, 50, 8, 1, 0, '2018-01-28', 100, 0, '1358-6940-2674-7946', 1),
(41, 66, 11, 2, 0, '2018-01-28', 200, 0, '4036-9712-2358-5233', 2),
(42, 45, 9, 2, 0, '2018-01-28', 200, 0, '2384-6759-1354-2674', 1),
(43, 47, 9, 2, 0, '2018-01-28', 200, 0, '1685-5982-2655-4556', 1),
(44, 49, 2, 2, 0, '2018-01-28', 200, 0, '1354-9853-5688-6556', 1),
(45, 67, 2, 2, 0, '2018-01-28', 200, 0, '5465-8656-6565-7892', 2),
(46, 51, 2, 2, 0, '2018-01-28', 200, 0, '4862-4655-9521-5679', 1),
(47, 52, 2, 2, 2, '2018-01-28', 200, 0, '3257-8685-8561-4956', 1),
(48, 54, 9, 2, 0, '2018-01-28', 200, 0, '4682-3567-8225-7561', 1),
(49, 51, 10, 2, 0, '2018-01-28', 200, 0, '8456-2356-4682-1352', 1),
(50, 21, 10, 2, 0, '2018-01-28', 200, 0, '8946-4346-9329-7364', 1),
(51, 22, 10, 2, 0, '2018-01-28', 200, 0, '6853-5659-9895-5558', 1),
(52, 54, 10, 2, 0, '2018-01-28', 200, 0, '4568-5648-4845-5455', 1),
(53, 58, 10, 2, 0, '2018-01-28', 200, 0, '8858-5859-9985-7474', 1),
(54, 37, 10, 3, 0, '2018-01-28', 300, 0, '7747-4747-7474-5678', 2);

-- --------------------------------------------------------

--
-- 資料表格式： `theater_program`
--

CREATE TABLE IF NOT EXISTS `theater_program` (
  `program_no` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK',
  `program_name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `program_intro` varchar(100) CHARACTER SET utf8 NOT NULL,
  `program_photo` varchar(20) CHARACTER SET utf8 DEFAULT '',
  `program_fare` int(11) NOT NULL DEFAULT '500',
  `program_status` tinyint(1) DEFAULT '1' COMMENT '1:上架 0:下架',
  PRIMARY KEY (`program_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- 列出以下資料庫的數據： `theater_program`
--

INSERT INTO `theater_program` (`program_no`, `program_name`, `program_intro`, `program_photo`, `program_fare`, `program_status`) VALUES
(1, '尋找星生命', '廣大的宇宙中，到底有沒有外星人？跟著最先進的太空工作室，一窺宇宙前線，尋找外星新生命。', 'Galaxy_2_m.jpg', 100, 1),
(2, '末世決戰', '傑克與瑪莉無意之間打開了宇宙通道，數以兆計的外星生物瞬間湧入地球，人類究竟該不該跟牠們成為朋友？', 'game_1.jpg', 100, 1);

-- --------------------------------------------------------

--
-- 資料表格式： `theater_session_list`
--

CREATE TABLE IF NOT EXISTS `theater_session_list` (
  `session_no` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK',
  `program_no` int(11) NOT NULL COMMENT 'FK',
  `session_time` char(5) COLLATE utf8_unicode_ci NOT NULL COMMENT '一天演四場 hh:mm',
  `time_date` date NOT NULL COMMENT 'yyyy-mm-dd',
  `total_ticket` int(11) DEFAULT '150' COMMENT '預設150張',
  `last_ticket` int(11) DEFAULT '150' COMMENT '剩下票數',
  PRIMARY KEY (`session_no`),
  KEY `program_no` (`program_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=69 ;

--
-- 列出以下資料庫的數據： `theater_session_list`
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
(16, 1, '19:00', '2018-01-26', 150, 148),
(17, 1, '11:00', '2018-01-28', 150, 147),
(18, 1, '14:00', '2018-01-28', 150, 148),
(19, 1, '15:00', '2018-01-28', 150, 150),
(20, 1, '19:00', '2018-01-28', 150, 150),
(21, 1, '11:00', '2018-01-31', 150, 148),
(22, 1, '14:00', '2018-01-31', 150, 148),
(23, 1, '15:00', '2018-01-31', 150, 150),
(24, 1, '19:00', '2018-01-31', 150, 150),
(25, 1, '11:00', '2018-02-02', 150, 150),
(26, 1, '14:00', '2018-02-02', 150, 150),
(27, 1, '15:00', '2018-02-02', 150, 150),
(28, 1, '19:00', '2018-02-02', 150, 150),
(29, 2, '11:00', '2018-01-22', 150, 150),
(30, 2, '14:00', '2018-01-22', 150, 150),
(31, 2, '15:00', '2018-01-22', 150, 150),
(32, 2, '19:00', '2018-01-22', 150, 150),
(33, 2, '11:00', '2018-01-27', 150, 148),
(34, 2, '14:00', '2018-01-27', 150, 148),
(35, 2, '15:00', '2018-01-27', 150, 148),
(36, 2, '19:00', '2018-01-27', 150, 144),
(37, 2, '11:00', '2018-01-29', 150, 145),
(38, 2, '14:00', '2018-01-29', 150, 150),
(39, 2, '15:00', '2018-01-29', 150, 150),
(40, 2, '19:00', '2018-01-29', 150, 150),
(41, 2, '11:00', '2018-02-03', 150, 148),
(42, 2, '14:00', '2018-02-03', 150, 148),
(43, 2, '15:00', '2018-02-03', 150, 150),
(44, 2, '19:00', '2018-02-03', 150, 148),
(45, 1, '11:00', '2018-02-04', 150, 146),
(46, 1, '14:00', '2018-02-04', 150, 144),
(47, 1, '15:00', '2018-02-04', 150, 146),
(48, 1, '19:00', '2018-02-04', 150, 148),
(49, 1, '11:00', '2018-02-07', 150, 146),
(50, 1, '14:00', '2018-02-07', 150, 148),
(51, 1, '15:00', '2018-02-07', 150, 146),
(52, 1, '19:00', '2018-02-07', 150, 148),
(53, 1, '11:00', '2018-02-09', 150, 149),
(54, 1, '14:00', '2018-02-09', 150, 146),
(55, 1, '15:00', '2018-02-09', 150, 150),
(56, 1, '19:00', '2018-02-09', 150, 150),
(57, 1, '11:00', '2018-02-11', 150, 148),
(58, 1, '14:00', '2018-02-11', 150, 144),
(59, 1, '15:00', '2018-02-11', 150, 148),
(60, 1, '19:00', '2018-02-11', 150, 148),
(61, 2, '11:00', '2018-02-05', 150, 147),
(62, 2, '14:00', '2018-02-05', 150, 148),
(63, 2, '15:00', '2018-02-05', 150, 147),
(64, 2, '19:00', '2018-02-05', 150, 149),
(65, 2, '11:00', '2018-02-10', 150, 148),
(66, 2, '14:00', '2018-02-10', 150, 145),
(67, 2, '15:00', '2018-02-10', 150, 144),
(68, 2, '19:00', '2018-02-10', 150, 148);
