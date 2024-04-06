/*
    Moffat Bay Marina database initialization script
*/

-- drop database user if exists
DROP USER IF EXISTS 'marinaAdmin'@'localhost'

-- create marinaAdmin and grant them all privileges to the marina database
CREATE USER 'marinaAdmin'@'localhost' IDENTIFIED WITH mysql_native_password BY 'Moff@Bay1#';

GRANT ALL PRIVILEGES ON marinaDB.* TO 'marinaAdmin'@'localhost';

-- drop tables if they are present
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS slips;
DROP TABLE IF EXISTS boats;
DROP TABLE IF EXISTS waitlist;
DROP TABLE IF EXISTS reservations;

/*
CREATE TABLES
*/

-- create waitlist table
CREATE TABLE IF NOT EXISTS  waitlist (
    waitlistID int NOT NULL AUTO_INCREMENT,
    boatID int NOT NULL,

    PRIMARY KEY (waitlistID),

    CONSTRAINT fk_boat
    FOREIGN KEY (boatID) 
    REFERENCES boats(boatID)
);

/*
POPULATE TABLES
*/

-- insert data into waitlist table
INSERT INTO waitlist (boatID)
VALUES (2),
       (1),
       (3);