use mysql;

drop user 'webphp'@'localhost';

flush privileges;

CREATE USER 'webphp'@'localhost' IDENTIFIED BY 'password';

create database finaldb;

grant all privileges on finaldb.* to 'webphp'@'localhost';

use finaldb;

create table auth(userid INT AUTO_INCREMENT, username varchar(60), password varchar(60), firstName varchar(60), lastName varchar(60), email varchar(60), phone varchar(60), primary key(userid));

insert into auth (username, password, firstName, lastName, email, phone) values ("maw", "password123", "Marcin", "Wski", "maw@gmail.com", "818-914-6453");

insert into auth (username, password, firstName, lastName, email, phone) values ("crn", "qwerty", "Curt", "Nan", "crn@aol.com", "818-333-1147");

insert into auth (username, password, firstName, lastName, email, phone) values ("jem", "123456", "Jeff", "Malik", "jem@yahoo.com", "818-682-9973");

select * from auth;
