-- minutes
use manager;
create table minutes (
  num int auto_increment primary key,
  day date not null,
  name varchar(200) not null,
  contents text not null
);
-- minutes

-- idea
use manager;
create table idead (
  num int auto_increment primary key,
  day date not null,
  name varchar(200) not null,
  idea text not null
);
-- idea

-- document
-- file
use manager;
create table doc1 (
  num int auto_increment primary key,
  day date not null,
  name varchar(200) not null,
  file text not null,
  coment text not null
);
-- file
-- url
use manager;
create table doc2 (
  num int auto_increment primary key,
  day date not null,
  name varchar(200) not null,
  url text not null,
  explanation text not null
);
-- url
-- document