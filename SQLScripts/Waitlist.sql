/* 
    SQL script to initialize the waitlist table for MoffatBay
*/

CREATE DATABASE IF NOT EXISTS marinaDB ;

CREATE TABLE IF NOT EXISTS  waitlist (
    waitlistID int NOT NULL AUTO_INCREMENT,
    boatID int NOT NULL,

    PRIMARY KEY (waitlistID),
    FOREIGN KEY (boatID) REFERENCES boats(boatID)
);

-- insert data into table
INSERT INTO waitlist (boatID)
VALUES (2),
       (1),
       (3);