use fa;

CREATE TABLE `fa`.`member` ( `mem_id` INT NOT NULL AUTO_INCREMENT , `mem_nick` VARCHAR(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL , `mem_password` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '最少6碼，最多20碼' , `mem_name` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '最少6碼，最多20碼' , `mem_points` INT NOT NULL , `mem_permissions` BOOLEAN NOT NULL COMMENT '1:可對設施留言 0:不可對設施留言' , `mem_mail` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL , `mem_phone` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL , PRIMARY KEY (`mem_id`)) ENGINE = InnoDB;



ALTER TABLE `member` ADD UNIQUE(`mem_id`);

select * from member;