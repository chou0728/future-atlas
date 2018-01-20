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

select * from activity order by activity_date;
drop table activity;

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

insert into activity (activity_date,activity_name,activity_short_name,activity_location,activity_start_time,activity_end_time,activity_intro,activity_news) values (
"27",
"APP關鍵報告",
"APP報告",
"演講廳",
"14:30",
"16:00",
"Flurr報告2017年行動市場趨勢",
"2017 年 App 整體使用量的成長幅度為 6%，與 2016 年的成長幅度 11% 相比，2017 年成長趨向平緩。正如 Flurry 在 2017 年發布的數據報告：使用者每天使用智慧型手機的時間已超過 5 小時，App 總使用時間已趨飽和，只是在新下載與已安裝的 App 間重新進行分配。"
);

update activity set activity_date = 18 where activity_no = 22;

select activity_short_name from activity where activity_date = 1 order by activity_start_time;
