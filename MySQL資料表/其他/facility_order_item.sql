use fa;
show tables;
insert into member (mem_nick, password, mem_name,mem_points, mem_permissions, mem_mail, mem_phone)
values( "Mars","ilovefe","Manna Chen",5000,1,"sbxew99@gmail.com","0939772729");
SELECT LAST_INSERT_ID() AS `mem_id`;

select * from member where mem_name = "Rose" and password = "13456";

RENAME TABLE bd103g3.facility_order_item TO fa.facility_order_item;

drop table facility;
select * from facility;
select * from facility_order;
select * from facility_order_item;
alter table facility_order drop facility_no;
alter table facility drop facility_sphoto2;
insert into facility (facility_name,facility_mphoto) values ("設1","1m.png");
insert into facility (facility_name,facility_mphoto) values ("未來鐵道","2m.png");
insert into facility (facility_name,facility_mphoto) values ("摩天輪","3m.png");
insert into facility (facility_name,facility_mphoto) values ("碰碰車","4m.png");
insert into facility (facility_name,facility_mphoto) values ("海盜船","5m.png");
insert into facility (facility_name,facility_mphoto) values ("VR體驗","5m.png");

UPDATE `table` SET `name` = 'newaurora'  WHERE `id` = '12'  ;

update facility set facility_mphoto = "6m.png" where facility_no = 6;
update facility set facility_name = "旋轉木馬" where facility_no = 1;
update facility set facility_name = "摩天輪" where facility_no = 4;

insert into facility_order (member_id, order_date, original_total, discount, creditcard_num)
values (5,DATE_FORMAT(NOW(),'%Y-%m-%d'),3000,50,"1234567812345678");

select DATE_FORMAT(NOW(),'%Y-%m-%d');

insert into facility_order (member_id, order_date) values (8, DATE_FORMAT(NOW(),'%Y-%m-%d'));

insert into activity (activity_name,activity_short_name,activity_location,activity_start_date,activity_end_date,activity_time,activity_duration,activity_intro,activity_cycle,activity_filename)
values("星際大戰變裝秀","變裝秀","未來大道","2018-01-20","2018-03-03","19:00","90","超酷唷!",1,"1a.png");

insert into activity (activity_name,activity_short_name,activity_location,activity_start_date,activity_end_date,activity_time,activity_duration,activity_intro,activity_cycle,activity_filename)
values("VR配備裝置大展","VR裝置展","名日廳","2018-01-01","2018-02-28","10:00","600","各大廠最新研發
現場試玩!",5,"2a.png");

update activity set activity_location = "明日廳" where activity_no = 2;

insert into facility_order (creditcard_num) values (111);

insert into facility_order_item values (22,"2",1,185,0,0,185,"",0,);


create table facility_order_item(
order_no int,
facility_no int,
facility_name varchar(10),
full_fare_num int,
full_fare_num_used int,
half_fare_num int,
half_fare_num_used int,
subtotal int,
comment_content varchar(200),
comment_grade int,
comment_timestamp datetime,
foreign KEY (facility_no) references facility (facility_no),
foreign KEY (order_no) references facility_order (order_no)
);

create table activity(
	activity_no int NOT NULL AUTO_INCREMENT,
    activity_name varchar(10) NOT NULL,
    activity_short_name varchar(5) NOT NULL,
    activity_location varchar(10) NOT NULL,
    activity_date date,
    activity_start_time char(5),
    activity_end_time char(5),
    activity_intro varchar(200),
    activity_filename varchar(20),
    PRIMARY KEY (activity_no)
);

lastinsertid();
insert into facility_order_item
values (2,1,"宇宙雲霄飛車",1,0,1,0,280,"尚未評分",0,"2018-01-16-20-20-20"),
(2,2,"碰碰車",5,0,5,0,800,"尚未評分",0,"2018-01-16-20-20-20"),
(2,3,"旋轉木馬",5,0,5,0,800,"尚未評分",0,"2018-01-16-20-20-20");

