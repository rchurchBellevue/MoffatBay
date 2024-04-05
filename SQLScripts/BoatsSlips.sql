CREATE DATABASE IF NOT EXISTS marinaDB ;

CREATE TABLE IF NOT EXISTS boats (
  boatID int NOT NULL AUTO_INCREMENT,
  boat_Name varchar(33) NOT NULL,
  boat_Length int NOT NULL,
  userID int DEFAULT NULL,
  categoryID int DEFAULT NULL,
  PRIMARY KEY (boatID)
);

INSERT INTO marinadb.boats
(boat_Name,boat_Length,userID,categoryID)
VALUES
('Mr Beaumont', 43,1,2);

INSERT INTO marinadb.boats
(boat_Name,boat_Length,userID,categoryID)
VALUES
('Lady Kathleen', 27,2,1);

INSERT INTO marinadb.boats
(boat_Name,boat_Length,userID,categoryID)
VALUES
('Maritime Dreams', 50,1,3);

CREATE TABLE IF NOT EXISTS slips (
  slipID char(3) NOT NULL,
  dock char(1) NOT NULL,
  availability_status BOOLEAN NOT NULL,
  categoryID int DEFAULT NULL,
  PRIMARY KEY (slipID)
);

INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('A1','A',FALSE,'3');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('A2','A',FALSE,'3');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('A3','A',FALSE,'3');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('A4','A',FALSE,'2');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('A5','A',FALSE,'2');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('A6','A',FALSE,'2');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('A7','A',FALSE,'2');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('A8','A',FALSE,'1');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('A9','A',FALSE,'1');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('A10','A',FALSE,'1');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('A11','A',FALSE,'1');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('A12','A',FALSE,'1');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('A13','A',FALSE,'3');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('A14','A',FALSE,'3');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('A15','A',FALSE,'3');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('A16','A',FALSE,'2');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('A17','A',FALSE,'2');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('A18','A',FALSE,'2');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('A19','A',FALSE,'2');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('A20','A',FALSE,'1');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('A21','A',FALSE,'1');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('A22','A',FALSE,'1');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('A23','A',FALSE,'1');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('A24','A',FALSE,'1');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('B1','B',FALSE,'3');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('B2','B',FALSE,'3');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('B3','B',FALSE,'3');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('B4','B',FALSE,'2');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('B5','B',FALSE,'2');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('B6','B',FALSE,'2');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('B7','B',FALSE,'2');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('B8','B',FALSE,'1');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('B9','B',FALSE,'1');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('B10','B',FALSE,'1');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('B11','B',FALSE,'1');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('B12','B',FALSE,'1');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('B13','B',FALSE,'3');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('B14','B',FALSE,'3');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('B15','B',FALSE,'3');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('B16','B',FALSE,'2');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('B17','B',FALSE,'2');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('B18','B',FALSE,'2');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('B19','B',FALSE,'2');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('B20','B',FALSE,'1');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('B21','B',FALSE,'1');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('B22','B',FALSE,'1');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('B23','B',FALSE,'1');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('B24','B',FALSE,'1');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('C1','C',FALSE,'3');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('C2','C',FALSE,'3');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('C3','C',FALSE,'3');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('C4','C',FALSE,'2');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('C5','C',FALSE,'2');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('C6','C',FALSE,'2');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('C7','C',FALSE,'2');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('C8','C',FALSE,'1');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('C9','C',FALSE,'1');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('C10','C',FALSE,'1');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('C11','C',FALSE,'1');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('C12','C',FALSE,'1');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('C13','C',FALSE,'3');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('C14','C',FALSE,'3');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('C15','C',FALSE,'3');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('C16','C',FALSE,'2');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('C17','C',FALSE,'2');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('C18','C',FALSE,'2');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('C19','C',FALSE,'2');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('C20','C',FALSE,'1');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('C21','C',FALSE,'1');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('C22','C',FALSE,'1');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('C23','C',FALSE,'1');
INSERT INTO marinadb.slips (slipID,dock,availability_status,categoryID) VALUES ('C24','C',FALSE,'1');
