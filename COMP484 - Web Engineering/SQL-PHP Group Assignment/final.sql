MariaDB [mysql]> CREATE USER 'webphp'@'localhost' IDENTIFIED BY 'password';
Query OK, 0 rows affected (0.000 sec)

MariaDB [mysql]> select user,host from user;
+--------+-----------------------+
| user   | host                  |
+--------+-----------------------+
| root   | 127.0.0.1             |
| root   | ::1                   |
| root   | localhost             |
| webphp | localhost             |
| root   | localhost.localdomain |
+--------+-----------------------+
5 rows in set (0.000 sec)

MariaDB [mysql]> create database finaldb;
Query OK, 1 row affected (0.000 sec)

MariaDB [mysql]> use finaldb;
Database changed

MariaDB [finaldb]> create table auth(userid INT AUTO_INCREMENT, username varchar(60), password varchar(60), firstName varchar(60), lastName varchar(60), email varchar(60), phone varchar(60), primary key(userid));
Query OK, 0 rows affected (0.015 sec)

MariaDB [finaldb]> show tables;
+-------------------+
| Tables_in_finaldb |
+-------------------+
| auth              |
+-------------------+
1 row in set (0.000 sec)

MariaDB [finaldb]> insert into auth (username, password, firstName, lastName, email, phone) values ("maw", "password123", "Marcin", "Wski", "maw@gmail.com", "818-914-6453");
Query OK, 1 row affected (0.004 sec)

MariaDB [finaldb]> insert into auth (username, password, firstName, lastName, email, phone) values ("crn", "qwerty", "Curt", "Nan", "crn@aol.com", "818-333-1147");
Query OK, 1 row affected (0.004 sec)

MariaDB [finaldb]> insert into auth (username, password, firstName, lastName, email, phone) values ("jem", "123456", "Jeff", "Malik", "jem@yahoo.com", "818-682-9973");
Query OK, 1 row affected (0.004 sec)

MariaDB [finaldb]> select * from auth;
+--------+----------+-------------+-----------+----------+---------------+--------------+
| userid | username | password    | firstName | lastName | email         | phone        |
+--------+----------+-------------+-----------+----------+---------------+--------------+
|      2 | maw      | password123 | Marcin    | Wski     | maw@gmail.com | 818-914-6453 |
|      3 | crn      | qwerty      | Curt      | Nan      | crn@aol.com   | 818-333-1147 |
|      4 | jem      | 123456      | Jeff      | Malik    | jem@yahoo.com | 818-682-9973 |
+--------+----------+-------------+-----------+----------+---------------+--------------+
3 rows in set (0.000 sec)
