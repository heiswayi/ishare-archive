DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned not null primary key auto_increment,
  `username` varchar(50) not null,
  `password` varchar(255) not null,
  `email` varchar(255) not null,
  `userlevel` int(1) not null default '0',
  `fullname` varchar(255) not null,
  `ip` varchar(50) not null
);

DROP TABLE IF EXISTS `chitchat`;
CREATE TABLE IF NOT EXISTS `chitchat` (
  `id` int(10) unsigned not null primary key auto_increment,
  `chitchat_hash` varchar(255) not null,
  `chitchat_hash6` varchar(6) not null,
  `chitchat_name` varchar(50) not null,
  `creator` varchar(50) not null,
  `created_time` int(10) not null,
  `user_limit` int(3) not null default '999'
);

DROP TABLE IF EXISTS `bookmark`;
CREATE TABLE IF NOT EXISTS `bookmark` (
  `id` int(10) unsigned not null primary key auto_increment,
  `chitchat_hash` varchar(255) not null,
  `username` varchar(50) not null
);

DROP TABLE IF EXISTS `chatmsg`;
CREATE TABLE IF NOT EXISTS `chatmsg` (
  `id` int(10) unsigned not null primary key auto_increment,
  `chitchat_hash` varchar(255) not null,
  `username` varchar(50) not null,
  `message` text not null,
  `posted_time` int(10) not null,
  `text_color` varchar(20) not null default 'text-default'
);

DROP TABLE IF EXISTS `online`;
CREATE TABLE IF NOT EXISTS `online` (
  `id` int(10) unsigned not null primary key auto_increment,
  `username` varchar(50) not null,
  `chitchat_hash` varchar(255) not null
);