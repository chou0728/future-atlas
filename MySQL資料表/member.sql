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

use fa;

select * from activity order by activity_start_time;
drop table activity;

create table activity(
	activity_no int NOT NULL AUTO_INCREMENT,
    activity_name varchar(10) NOT NULL,
    activity_short_name varchar(5) NOT NULL,
    activity_location varchar(10) NOT NULL,
    activity_start_time datetime,
    activity_end_time datetime,
    activity_time char(5),
    activity_intro varchar(200),
PRIMARY KEY (activity_no)
);