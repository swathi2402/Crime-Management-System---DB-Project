drop database crime;
create database crime;

\c crime

drop table police;
drop table citizen;
drop table police_station;
drop table complaint;
drop table criminal;
drop table avocation;

CREATE TABLE 	POLICE
(	Fname VARCHAR(30) NOT NULL ,
	Pid CHAR(9) NOT NULL,
	Age VARCHAR(2) NOT NULL,
	Gender CHAR,
	Address VARCHAR(50),
	Ward_no CHAR(2) NOT NULL,
	Incharge_id CHAR(9),
	PRIMARY KEY (Pid),
	UNIQUE (Ward_no),
	FOREIGN KEY (Incharge_id) REFERENCES POLICE(Pid));

CREATE TABLE 	CITIZEN
(	Cname VARCHAR(30)  NOT NULL,
	Age VARCHAR(2) NOT NULL,
	Gender CHAR,
	Address	 VARCHAR(40),
	Bdate DATE,
	Adhar_no CHAR(16) NOT NULL,
	Phone CHAR(10) NOT NULL,
	PRIMARY KEY (Adhar_no));
		
CREATE TABLE 	POLICE_STATION
(	Ward_no CHAR(2) NOT NULL,
	Sname VARCHAR(20) NOT NULL,
	Address VARCHAR(50), 
	PSIname VARCHAR(15) NOT NULL,
	Phone CHAR(10) NOT NULL,
	Email VARCHAR(25),
	PRIMARY KEY (Ward_no),
	FOREIGN KEY (Ward_no) REFERENCES POLICE(Ward_no));

CREATE TABLE 	COMPLAINT
(	Coname VARCHAR(30) NOT NULL,
	Coid CHAR(3) NOT NULL,
	Subject VARCHAR(30) NOT NULL,
	Date DATE,
	Details VARCHAR(30) NOT NULL,
	Adhar_no CHAR(16) NOT NULL,
	PRIMARY KEY (Coid),
	FOREIGN KEY (Adhar_no) REFERENCES CITIZEN(Adhar_no));

CREATE TABLE 	CRIMINAL
(	Criminal_id CHAR(3) NOT NULL,
	Crime_involved VARCHAR(30) NOT NULL,
	Law_id CHAR(3) NOT NULL,
	Adhar_no CHAR(16) NOT NULL,
	Pid CHAR(9) NOT NULL,
	PRIMARY KEY (Criminal_id, Law_id),
	UNIQUE (Law_id),
	FOREIGN KEY (Adhar_no) REFERENCES CITIZEN(Adhar_no),
	FOREIGN KEY(Pid) REFERENCES POLICE(Pid));

CREATE TABLE 	AVOCATION
(	Law_id CHAR(3) NOT NULL,
	Section CHAR(3) NOT NULL,
	Name VARCHAR(30) NOT NULL,
	Punishment VARCHAR(30) ,
	Description VARCHAR(35),
	PRIMARY KEY (Law_id),
	FOREIGN KEY (Law_id) REFERENCES CRIMINAL(Law_id));

