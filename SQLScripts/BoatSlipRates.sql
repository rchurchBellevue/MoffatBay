CREATE DATABASE marinaDB IF NOT EXISTS

CREATE TABLE IF NOT EXISTS boats (
  boatID int NOT NULL AUTO_INCREMENT,
  boat_Name varchar(33) NOT NULL,
  boat_Length int NOT NULL,
  userID int DEFAULT NULL,
  PRIMARY KEY (boatID),
  FOREIGN KEY (userID) REFERENCES users(userID)
);

INSERT INTO marinadb.boats
(boat_Name,boat_Length,userID)
VALUES
('Mr Beaumont',43,1);

INSERT INTO marinadb.boats
(boat_Name,boat_Length,userID)
VALUES
('Lady Kathleen', 27,2);

INSERT INTO marinadb.boats
(boat_Name,boat_Length,userID)
VALUES
('Maritime Dreams', 50,3);

CREATE TABLE IF NOT EXISTS slips (
  slipID char(3) NOT NULL,
  availability_status BOOLEAN NOT NULL,
  slipSize char(1) DEFAULT NULL,
  PRIMARY KEY (slipID)
);

INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A1',FALSE,'3');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A2',FALSE,'3');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A3',FALSE,'3');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A4',FALSE,'2');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A5',FALSE,'2');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A6',FALSE,'2');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A7',FALSE,'2');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A8',FALSE,'1');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A9',FALSE,'1');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A10',FALSE,'1');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A11',FALSE,'1');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A12',FALSE,'1');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A13',FALSE,'3');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A14',FALSE,'3');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A15',FALSE,'3');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A16',FALSE,'2');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A17',FALSE,'2');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A18',FALSE,'2');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A19',FALSE,'2');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A20',FALSE,'1');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A21',FALSE,'1');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A22',FALSE,'1');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A23',FALSE,'1');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A24',FALSE,'1');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B1',FALSE,'3');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B2',FALSE,'3');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B3',FALSE,'3');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B4',FALSE,'2');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B5',FALSE,'2');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B6',FALSE,'2');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B7',FALSE,'2');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B8',FALSE,'1');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B9',FALSE,'1');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B10',FALSE,'1');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B11',FALSE,'1');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B12',FALSE,'1');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B13',FALSE,'3');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B14',FALSE,'3');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B15',FALSE,'3');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B16',FALSE,'2');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B17',FALSE,'2');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B18',FALSE,'2');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B19',FALSE,'2');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B20',FALSE,'1');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B21',FALSE,'1');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B22',FALSE,'1');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B23',FALSE,'1');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B24',FALSE,'1');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C1',FALSE,'3');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C2',FALSE,'3');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C3',FALSE,'3');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C4',FALSE,'2');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C5',FALSE,'2');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C6',FALSE,'2');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C7',FALSE,'2');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C8',FALSE,'1');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C9',FALSE,'1');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C10',FALSE,'1');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C11',FALSE,'1');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C12',FALSE,'1');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C13',FALSE,'3');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C14',FALSE,'3');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C15',FALSE,'3');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C16',FALSE,'2');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C17',FALSE,'2');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C18',FALSE,'2');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C19',FALSE,'2');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C20',FALSE,'1');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C21',FALSE,'1');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C22',FALSE,'1');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C23',FALSE,'1');
INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C24',FALSE,'1');


CREATE TABLE IF NOT EXISTS rates (
  ratesId int NOT NULL AUTO_INCREMENT,
  pricePerFoot DECIMAL(19,2) ,
  electricPower DECIMAL(19,2),
  PRIMARY KEY (ratesID)
);

INSERT INTO marinadb.rates (pricePerFoot,electricPower) VALUES (10.50,10.00);