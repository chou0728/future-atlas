use fa;

create table member(
	mem_id int NOT NULL AUTO_INCREMENT,
    mem_nick varchar(10) NOT NULL,
    password varchar(20) NOT NULL,
    mem_name varchar(20) NOT NULL,
    mem_points int default '50',
    mem_permissions bool default '1',
    mem_mail varchar(50),
    mem_phone varchar(20),
    PRIMARY KEY (mem_id)
);

create table activity(
	activity_no int NOT NULL AUTO_INCREMENT,
    activity_name varchar(10) NOT NULL,
    activity_short_name varchar(5) NOT NULL,
    activity_location varchar(10) NOT NULL,
    activity_start_date date,
    activity_end_date date,
    activity_time char(5),
    activity_duration int,
    activity_intro varchar(200),
    activity_cycle int,
    activity_filename varchar(20),
    PRIMARY KEY (activity_no)
);

create table facility_maintenance(
facility_no int AUTO_INCREMENT,
maintenance_date int,
foreign KEY (facility_no) references facility (facility_no)
);

create table backend_manager(
manager_id int AUTO_INCREMENT,
password varchar(20),
top_manager boolean,
manager_status boolean,
PRIMARY KEY (manager_id)
);

create table facility_order_item(
order_no int AUTO_INCREMENT,
facility_no int,
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

create table facility(
facility_no int auto_increment not null,
facility_name varchar(10) not null,
facility_mphoto varchar(20) not null,
facility_tphoto varchar(20),
facility_sphoto1 varchar(20),
facility_sphoto2 varchar(20),
facility_intro varchar(20),
facility_description varchar(200),
facility_status boolean,
facility_crowd int,
full_fare int,
half_fare int,
PRIMARY KEY(facility_no)
);

CREATE TABLE facility_order(
   order_no int NOT NULL AUTO_INCREMENT,
   facility_no int not null,
   member_id int not null,
   order_date date not null,
   original_total int not null,
   discount int,
   creditcard_num varchar(16) not null,
   PRIMARY KEY (order_no),
   foreign KEY (member_id) references member (mem_id)
);

show tables;

insert into member (mem_name,mem_nick,password,mem_mail,mem_phone)
values ("dd","dd","dd","dd","dd");

select * from member;

select * from member where mem_name = "Chen";
select * from facility;

select * from member where mem_name = "father";

insert into member (mem_name,mem_nick,password,mem_mail,mem_phone)
values ("dd","dd","dd","sbxew99@gmail.com","0926704627");
