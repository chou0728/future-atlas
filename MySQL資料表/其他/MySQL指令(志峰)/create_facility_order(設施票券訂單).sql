use fa;

CREATE TABLE `fa`.`facility_order` ( `order _no` INT NOT NULL AUTO_INCREMENT , `member_id` INT NOT NULL , `order_date` DATE NOT NULL , `original_total` INT NOT NULL , `discount` INT NOT NULL , `creditcard_num` CHAR(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL , PRIMARY KEY (`order _no`)) ENGINE = InnoDB;

ALTER TABLE `facility_order` ADD UNIQUE(`order _no`);

select * from facility_order;