use fa;
CREATE TABLE facility(
   facility_no int NOT NULL AUTO_INCREMENT,
   facility_name varchar(10) NOT NULL,
   facility_mphoto varchar(20) NOT NULL,
   facility_tphoto varchar(20),
   facility_sphoto1 varchar(20),       
   facility_description varchar(150),
   facility_status boolean NOT NULL default '1',
   facility_crowd int NOT NULL default '2',
   full_fare int NOT NULL,
   half_fare int NOT NULL,
   PRIMARY KEY (facility_no)
);

ALTER TABLE `facility` ADD UNIQUE(`facility_no`);

select * from facility;
