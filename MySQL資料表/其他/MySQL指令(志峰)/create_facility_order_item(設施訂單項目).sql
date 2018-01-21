use fa;

CREATE TABLE `fa`.`facility_order_item` ( `order _no` INT NOT NULL , `facility_no` INT NOT NULL , `full_fare_num` INT NOT NULL , `full_fare_num_used` INT NOT NULL , `half_fare_num` INT NOT NULL , `full_fare_num_used` INT NOT NULL , `subtotal` INT NOT NULL , `comment_content` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL , `comment_grade` INT NOT NULL COMMENT '0:未評價 1-5分' , `comment_timestamp` DATETIME NOT NULL ) ENGINE = InnoDB;

ALTER TABLE `fa`.`facility_order_item` ADD PRIMARY KEY (`order_no`, `facility_no`);

ALTER TABLE `facility_order_item` ADD UNIQUE(`order_no`);

ALTER TABLE `facility_order_item` ADD UNIQUE(`facility_no`);

select * from facility_order_item;


