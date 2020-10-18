drop database if exists manager;
create database manager default character set utf8 collate utf8_general_ci;
grant all on manager.* to 'master@localhost' identified by '0524';

use manager;
create table accunt (
  user int auto_increment primary key,
  ID varchar(200) not null,
  password varchar(200) not null
);

insert into accunt values(null, 'yuma', '0524');

