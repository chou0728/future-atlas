CREATE TABLE facility_order(
   order_no int NOT NULL AUTO_INCREMENT,
   member_id int,
   order_date date,
   original_total int,
   discount int,       
   creditcard_num varchar(16),
   PRIMARY KEY (order_no)
);

select * from facility_order;

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

ALTER TABLE member CHANGE pass_word password varchar(20);

select * from member;

insert into member(mem_nick, password, mem_name, mem_mail, mem_phone)
values("Davis","iaak01","Chen", "cclm@gmail.com","0942205923");
