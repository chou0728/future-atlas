create table activity(
	activity_no int NOT NULL AUTO_INCREMENT,
    activity_date int not null,
    activity_name varchar(15) NOT NULL,
    activity_short_name varchar(10) NOT NULL,
    activity_location varchar(10) NOT NULL,
    activity_start_time char(5),
    activity_end_time char(5),
    activity_intro varchar(20),
    activity_news varchar(200),
PRIMARY KEY (activity_no)
);

create table backend_manager(
	manager_id int AUTO_INCREMENT,
	manager_name varchar(20),
	password varchar(20),
	top_manager boolean,
	manager_status boolean,
PRIMARY KEY (manager_id)
);

create table facility_order_item(
	order_no int,
	facility_no int,
	facility_name varchar(10),
	full_fare_num int not null default '0',
	full_fare_num_used int not null default '0',
	half_fare_num int not null default '0',
	half_fare_num_used int not null default '0',
	subtotal int,
	order_date date,
	comment_content varchar(200),
	comment_grade int,
	comment_timestamp datetime,
foreign KEY (facility_no) references facility (facility_no),
foreign KEY (facility_name) references facility (facility_name),
foreign KEY (order_no) references facility_order (order_no)
);

CREATE TABLE facility_order(
   order_no int NOT NULL AUTO_INCREMENT,
   member_id int not null,
   order_date date,
   original_total int not null,
   discount int,
   creditcard_num char(16) not null,
PRIMARY KEY (order_no),
foreign KEY (member_id) references member (mem_id)
);
