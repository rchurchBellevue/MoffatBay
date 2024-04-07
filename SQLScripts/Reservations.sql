CREATE TABLE IF NOT EXISTS reservations (
    reservationID int NOT NULL AUTO_INCREMENT,
    total_Cost DECIMAL(19, 2) NOT NULL,
    checkin_Date date NOT NULL,
    checkout_Date date NOT NULL,
    userID int NOT NULL,
    boatID int NOT NULL,
    slipID int NOT  NULL,
    ratesID int NOT NULL,
    PRIMARY KEY (reservationID),
    FOREIGN KEY (userID) REFERENCES users(userID),
    FOREIGN KEY (boatID) REFERENCES boats(boatID),
    FOREIGN KEY (slipID) REFERENCES slips(slipID),
    FOREIGN KEY (ratesID) REFERENCES rates(rateID)
);

INSERT INTO marindadb.reservations
(total_Cost, checkin_Date, checkout_Date)
VALUES
(75.30, 2024-05-22, 2024-05-23);

INSERT INTO marindadb.reservations
(total_Cost, checkin_Date, checkout_Date)
VALUES
(32.52, 2024-05-25, 2024-05-28);

INSERT INTO marindadb.reservations
(total_Cost, checkin_Date, checkout_Date)
VALUES
(98.42, 2024-06-20, 2024-06-27);
