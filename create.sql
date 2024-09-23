create database fatui;
use fatui;

create table login
(
	id Integer(10) auto_increment,
    username varchar(10) not null, 
    passkey varchar(10) not null,
    adminrole varchar(10) not null,
    primary key (id)


);

create table fatuipeople
(
	id Integer(10) auto_increment,
    username varchar(10) not null, 
    passkey varchar(10) not null,
    adminrole varchar(10) not null,
    primary key (id)


);

INSERT INTO fatuipeople (username, passkey, adminrole) VALUES
('user1', 'pass1234', 'admin'),
('user3', 'abcde123', 'user');


