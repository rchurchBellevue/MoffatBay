/*
    Title: Project 2: Moffat Bay Island Marina
    Author: Khaoula Azdoud, Tanner Glaser, Ryan Church, DJ Trost
    Date: 04/08/2024
    Description: Moffat Bay Island Marina database initialization script.
*/

-- Create the MarinaDB database if it doesn't already exist
CREATE DATABASE IF NOT EXISTS MarinaDB;

-- Select the MarinaDB database
USE MarinaDB;

-- Drop database user if it exists 
DROP USER IF EXISTS 'marinaAdmin'@'localhost';

-- Create marinaAdmin and grant all privileges to the Moffat Bay Island Marina database 
CREATE USER 'marinaAdmin'@'localhost' IDENTIFIED WITH mysql_native_password BY 'Moff@Bay1#';

-- Grant all privileges to the Moffat Bay Island Marina database to user marinaAdmin on localhost 
GRANT ALL PRIVILEGES ON MarinaDB.* TO 'marinaAdmin'@'localhost';

-- Drop tables if they exist
DROP TABLE IF EXISTS reservations;
DROP TABLE IF EXISTS waitlist;
DROP TABLE IF EXISTS rates;
DROP TABLE IF EXISTS slips;
DROP TABLE IF EXISTS boats;
DROP TABLE IF EXISTS users;

-- Create the users table
CREATE TABLE IF NOT EXISTS users (
    userID int NOT NULL AUTO_INCREMENT,
    first_Name varchar(20) NOT NULL,
    last_Name varchar(20) NOT NULL,
    email varchar(33) NOT NULL,
    phone_Number varchar(15) NOT NULL,
    password varchar(20) NOT NULL,
    PRIMARY KEY (userID)
);

-- Create the boats table
CREATE TABLE IF NOT EXISTS boats (
  boatID int NOT NULL AUTO_INCREMENT,
  boat_Name varchar(33) NOT NULL,
  boat_Length int NOT NULL,
  userID int DEFAULT NULL,
  PRIMARY KEY (boatID),
  FOREIGN KEY (userID) REFERENCES users(userID)
);

-- Create the slips table
CREATE TABLE IF NOT EXISTS slips (
  slipID char(3) NOT NULL,
  availability_status BOOLEAN NOT NULL,
  slipSize char(1) DEFAULT NULL,
  PRIMARY KEY (slipID)
); 

-- Create the rates table
CREATE TABLE rates (
    ratesID INT NOT NULL AUTO_INCREMENT,
    pricePerFoot  DECIMAL(19,2) NOT NULL,
    ElectricPowe DECIMAL(19,2) NOT NULL,
    PRIMARY KEY (ratesID)
);

-- Create the waitList table
CREATE TABLE IF NOT EXISTS  waitlist (
    waitlistID int NOT NULL AUTO_INCREMENT,
    boatID int NOT NULL,
    PRIMARY KEY (waitlistID),
    FOREIGN KEY (boatID) REFERENCES boats(boatID)
);

-- Create the reservations table
CREATE TABLE IF NOT EXISTS reservations (
    reservationID INT NOT NULL AUTO_INCREMENT,
    total_Cost  DECIMAL NOT NULL,
    checkIn_date DATE NOT NULL,
    checkOut_date DATE NOT NULL,
    userID INT, 
    boatID INT,
    slipID CHAR(3), 
    ratesID INT, 
    PRIMARY KEY (reservationID),
    FOREIGN KEY (userID) REFERENCES users (userID),
    FOREIGN KEY (boatID) REFERENCES boats (boatID),
    FOREIGN KEY (slipID) REFERENCES slips (slipID),
    FOREIGN KEY (ratesID) REFERENCES rates (ratesID)
);

-- insert users records
INSERT INTO users
(first_Name, last_Name, email, phone_Number, password)
VALUES
('Sean', 'Wollock', 'swollock@gmail.com', '3426840681', 'M0nkeys');
INSERT INTO users
(first_Name, last_Name, email, phone_Number, password)
VALUES
('Phil', 'Steimer', 'psteimer@gmail.com', '9023450293', 'r3dc@rs');
INSERT INTO users
(first_Name, last_Name, email, phone_Number, password)
VALUES
('Mary', 'Neeva', 'mneeva@gmail.com', '1108337596', 'Sun$hine');

-- insert boats records
INSERT INTO boats
(boat_Name,boat_Length,userID)
VALUES
('Mr Beaumont',43,1);

INSERT INTO boats
(boat_Name,boat_Length,userID)
VALUES
('Lady Kathleen', 27,2);

INSERT INTO boats
(boat_Name,boat_Length,userID)
VALUES
('Maritime Dreams', 50,3);

-- insert slips records
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('A1',FALSE,'3');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('A2',FALSE,'3');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('A3',FALSE,'3');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('A4',FALSE,'2');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('A5',FALSE,'2');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('A6',FALSE,'2');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('A7',FALSE,'2');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('A8',FALSE,'1');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('A9',FALSE,'1');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('A10',FALSE,'1');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('A11',FALSE,'1');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('A12',FALSE,'1');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('A13',FALSE,'3');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('A14',FALSE,'3');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('A15',FALSE,'3');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('A16',FALSE,'2');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('A17',FALSE,'2');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('A18',FALSE,'2');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('A19',FALSE,'2');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('A20',FALSE,'1');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('A21',FALSE,'1');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('A22',FALSE,'1');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('A23',FALSE,'1');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('A24',FALSE,'1');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('B1',FALSE,'3');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('B2',FALSE,'3');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('B3',FALSE,'3');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('B4',FALSE,'2');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('B5',FALSE,'2');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('B6',FALSE,'2');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('B7',FALSE,'2');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('B8',FALSE,'1');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('B9',FALSE,'1');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('B10',FALSE,'1');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('B11',FALSE,'1');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('B12',FALSE,'1');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('B13',FALSE,'3');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('B14',FALSE,'3');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('B15',FALSE,'3');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('B16',FALSE,'2');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('B17',FALSE,'2');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('B18',FALSE,'2');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('B19',FALSE,'2');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('B20',FALSE,'1');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('B21',FALSE,'1');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('B22',FALSE,'1');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('B23',FALSE,'1');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('B24',FALSE,'1');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('C1',FALSE,'3');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('C2',FALSE,'3');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('C3',FALSE,'3');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('C4',FALSE,'2');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('C5',FALSE,'2');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('C6',FALSE,'2');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('C7',FALSE,'2');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('C8',FALSE,'1');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('C9',FALSE,'1');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('C10',FALSE,'1');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('C11',FALSE,'1');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('C12',FALSE,'1');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('C13',FALSE,'3');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('C14',FALSE,'3');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('C15',FALSE,'3');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('C16',FALSE,'2');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('C17',FALSE,'2');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('C18',FALSE,'2');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('C19',FALSE,'2');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('C20',FALSE,'1');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('C21',FALSE,'1');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('C22',FALSE,'1');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('C23',FALSE,'1');
INSERT INTO slips (slipID,availability_status,slipSize) VALUES ('C24',FALSE,'1');

-- insert rates records
INSERT INTO rates (pricePerFoot, ElectricPowe)
VALUES (10.5, 10.00);

-- insert waitList records
INSERT INTO waitlist (boatID) VALUES (2);
INSERT INTO waitlist (boatID) VALUES (1);
INSERT INTO waitlist (boatID) VALUES (3);

-- insert reservations records
INSERT INTO reservations (total_Cost, checkIn_date, checkOut_date, userID, boatID, slipID, ratesID)
VALUES (440.00, '2024-04-06', '2024-05-06', 1, 1, 'A7', 1);
INSERT INTO reservations (total_Cost, checkIn_date, checkOut_date, userID, boatID, slipID, ratesID)
VALUES (280.00,'2024-05-10', '2024-05-10', 2, 2, 'B5', 1);
INSERT INTO reservations (total_Cost, checkIn_date, checkOut_date, userID, boatID, slipID, ratesID)
VALUES (510.00,'2024-05-10', '2024-05-10', 3, 3, 'A13', 1);
