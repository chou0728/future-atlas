
-- 資料表`activity`   

CREATE TABLE `activity` (
  `activity_no` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK',
  `activity_date` int(11) NOT NULL,
  `activity_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `activity_short_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `activity_location` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `activity_start_time` char(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activity_end_time` char(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activity_intro` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activity_news` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (activity_no) -- PK
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




-- 資料表`backend_manager`  
 
CREATE TABLE `backend_manager` (
  `manager_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK',
  `manager_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '限英文數字，英文不分大小寫',
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `top_manager` tinyint(1) NOT NULL COMMENT '1:是 0:否',
  `manager_status` tinyint(1) NOT NULL COMMENT '1:正常 0:停用',
  PRIMARY KEY (manager_id) -- PK
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





-- 資料表`facility`   

CREATE TABLE `facility` (
  `facility_no` int(11) NOT NULL  AUTO_INCREMENT COMMENT 'PK',
  `facility_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `facility_subname` varchar(25) COLLATE utf8_unicode_ci,
  `facility_mphoto` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `facility_tphoto` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `facility_intro` varchar(20) COLLATE utf8_unicode_ci,
  `facility_phrase` varchar(120) COLLATE utf8_unicode_ci,
  `facility_heart` varchar(10) COLLATE utf8_unicode_ci ,
  `facility_suit` varchar(15) COLLATE utf8_unicode_ci ,
  `facility_limit` varchar(15) COLLATE utf8_unicode_ci,
  `facility_description` varchar(200) COLLATE utf8_unicode_ci,
  `facility_status` tinyint(1) NOT NULL DEFAULT '1',
  `facility_crowd` int(11) NOT NULL DEFAULT '2',
  `full_fare` int(11),
  `half_fare` int(11),
  `info_already` tinyint(1) NOT NULL DEFAULT '0',
  `ticket_already` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (facility_no) -- PK
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




-- 資料表`facility_comment`   

CREATE TABLE `facility_comment` (
  `facility_no` int(11) NOT NULL COMMENT 'PK,FK',
  `comment_content` varchar(200) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '預設空值',
  `comment_grade` int(11) NOT NULL DEFAULT '0' COMMENT '1-5分',
  `comment_timestamp` datetime,
  `comment_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1:已評價 0:未評價',
  PRIMARY KEY (facility_no), -- PK
  KEY (facility_no) -- FK
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




-- 資料表`facility_order`
   
CREATE TABLE `facility_order` (
  `order_no` int NOT NULL AUTO_INCREMENT COMMENT 'PK',
  `mem_id` int NOT NULL COMMENT 'FK',
  `order_date` date,
  `original_total` int NOT NULL,
  `discount` int,
  `creditcard_num` char(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (order_no), -- PK
  KEY `mem_id` (`mem_id`) -- FK
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




-- 資料表`facility_order_item` 

CREATE TABLE `facility_order_item` (
  `order_no` int COMMENT 'PK,FK',
  `facility_no` int COMMENT 'PK,FK',
  `mem_id` int COMMENT 'FK',
  `facility_name` varchar(10) COLLATE utf8_unicode_ci ,
  `full_fare_num` int  default '0',
  `full_fare_num_used` int  default '0',
  `half_fare_num` int default '0',
  `half_fare_num_used` int  default '0',
  `subtotal` int COMMENT '訂單小計 ',
  `comment_content` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment_grade` int DEFAULT '0' COMMENT '1-5分',
  `comment_timestamp` datetime,
  `comment_status` boolean  DEFAULT '0' COMMENT '1:已評價 0:未評價',
  PRIMARY KEY (`order_no`,`facility_no`), -- PK
  KEY `order_no` (`order_no`), -- FK
  KEY `facility_no` (`facility_no`), -- FK
  KEY `mem_id` (`mem_id`) -- FK
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




-- 資料表`member` 

CREATE TABLE `member` (
  `mem_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK',
  `mem_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '帳號(62~0碼)',
  `password` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '密碼(6~20碼)',
  `mem_nick` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '暱稱',
  `mem_points` int(11) NOT NULL,
  `mem_permissions` tinyint(1) NOT NULL COMMENT '1:可對設施留言 0:不可對設施留言',
  `mem_mail` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mem_phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`mem_id`) -- PK
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




-- 資料表`question_and_answer` 

CREATE TABLE `question_and_answer` (
  `key_word_no` int(255) NOT NULL AUTO_INCREMENT COMMENT 'PK',
  `key_word` varchar(10000) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '尚未定義' COMMENT '關鍵字',
  `answer` varchar(10000) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '尚未定義' COMMENT '關鍵字對應的答案',
  `unsolved_question` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci COMMENT '使用者找不到答案的問題',
  PRIMARY KEY (`key_word_no`) -- PK
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



-- 資料表`theater_order_list`

CREATE TABLE `theater_order_list` (
  `theater_ticket_no` int NOT NULL	AUTO_INCREMENT COMMENT 'PK',
  `session_no` int NOT NULL COMMENT 'FK',
  `mem_id` int NOT NULL COMMENT 'FK',
  `number_purchase` int NOT NULL,
  `used_ticket` int  DEFAULT '0' COMMENT '預設為0',
  `order_date` date NOT NULL COMMENT 'yyyy-mm-dd',
  `original_amount` int COMMENT '未扣積分',
  `points_discount` int,
  `credit_card` char(16) COLLATE utf8_unicode_ci NOT NULL,
  `program_no` int NOT NULL COMMENT 'FK',
  PRIMARY KEY (`theater_ticket_no`), -- PK
  KEY `program_no` (`program_no`),-- FK
  KEY `session_no` (`session_no`)-- FK
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




-- 資料表`theater_program`

CREATE TABLE `theater_program` (
  `program_no` int NOT NULL  AUTO_INCREMENT COMMENT 'PK',
  `program_name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `program_intro` varchar(100) CHARACTER SET utf8 NOT NULL,
  `program_photo` varchar(20) CHARACTER SET utf8 DEFAULT '',
  `program_fare` int NOT NULL DEFAULT '500',
  `program_status` tinyint(1) DEFAULT '1' COMMENT '1:上架 0:下架',
  PRIMARY KEY (`program_no`) -- PK
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



-- 資料表`theater_session_list`

CREATE TABLE `theater_session_list` (
  `session_no` int NOT NULL  AUTO_INCREMENT COMMENT 'PK',
  `program_no` int NOT NULL  COMMENT 'FK',
  `session_time` char(5) NOT NULL COMMENT '一天演四場 hh:mm' ,
  `time_date` date NOT NULL COMMENT 'yyyy-mm-dd',
  `total_ticket` int(11) DEFAULT '150'  COMMENT '預設150張',
  `last_ticket` int(11) DEFAULT '150' COMMENT '剩下票數',
  PRIMARY KEY (`session_no`), -- PK
  KEY `program_no` (`program_no`)-- FK
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


