-- Create a database
CREATE DATABASE rwl;

-- Use the database
USE rwl;

-- Create users table
CREATE TABLE Users
(
Username varchar(20),
Password varchar(40),
PRIMARY KEY (Username)
);

-- Create a user to access this database with appropriate rights
INSERT INTO Users VALUES ('admin', sha1('pass'));

GRANT SELECT, INSERT, UPDATE, DELETE ON rwl.*
	TO 'rwl_user'@'localhost'
	IDENTIFIED BY 'rwl_pass';

FLUSH PRIVILEGES;