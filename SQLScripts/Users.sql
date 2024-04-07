CREATE TABLE IF NOT EXISTS users (
    userID int NOT NULL AUTO_INCREMENT,
    first_Name varchar(20) NOT NULL,
    last_Name varchar(20) NOT NULL,
    email varchar(33) NOT NULL,
    phone_Number int(10) NOT NULL,
    password varchar(20) NOT NULL,
    PRIMARY KEY (userID)
);

INSERT INTO marindadb.users
(first_Name, last_Name, email, phone_Number, password)
VALUES
('Sean', 'Wollock', 'swollock@gmail.com', 3426840681, 'M0nkeys');

INSERT INTO marindadb.users
(first_Name, last_Name, email, phone_Number, password)
VALUES
('Phil', 'Steimer', 'psteimer@gmail.com', 9023450293, 'r3dc@rs');

INSERT INTO marindadb.users
(first_Name, last_Name, email, phone_Number, password)
VALUES
('Mary', 'Neeva', 'mneeva@gmail.com', 1108337596, 'Sun$hine');