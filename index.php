<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moffat Bay Marina</title>
    <script type="text/javascript" src="js/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">


    <?php

        $servername = "localhost";
        $user = "root";
        $pass = "root";
        $dbname = "marinadb";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $statements = [

        "DROP USER IF EXISTS 'marinaAdmin'@'localhost';",

        "CREATE USER 'marinaAdmin'@'localhost' IDENTIFIED WITH mysql_native_password BY 'Moff@Bay1#';",

        "GRANT ALL PRIVILEGES ON marinaDB.* TO 'marinaAdmin'@'localhost';",

        "DROP TABLE IF EXISTS reservations;",
        "DROP TABLE IF EXISTS waitlist;",
        "DROP TABLE IF EXISTS boats;",
        "DROP TABLE IF EXISTS users;",
        "DROP TABLE IF EXISTS slips;",
        "DROP TABLE IF EXISTS rates;",


        "CREATE TABLE IF NOT EXISTS users (
            userID int NOT NULL AUTO_INCREMENT,
            first_Name varchar(20) NOT NULL,
            last_Name varchar(20) NOT NULL,
            email varchar(33) NOT NULL,
            phone_Number bigint(10) NOT NULL,
            password varchar(256) NOT NULL,
            PRIMARY KEY (userID)
         );",

        "INSERT INTO marinadb.users
        (first_Name, last_Name, email, phone_Number, password)
        VALUES
        ('Sean', 'Wollock', 'swollock@gmail.com', 3426840681, 'M0nkeys');",

        "INSERT INTO marinadb.users
        (first_Name, last_Name, email, phone_Number, password)
        VALUES
        ('Phil', 'Steimer', 'psteimer@gmail.com', 9023450293, 'r3dc@rs');",

        "INSERT INTO marinadb.users
        (first_Name, last_Name, email, phone_Number, password)
        VALUES
        ('Mary', 'Neeva', 'mneeva@gmail.com', 1108337596, 'Sun5hine');",

        "CREATE TABLE IF NOT EXISTS boats (
          boatID int NOT NULL AUTO_INCREMENT,
          boat_Name varchar(33) NOT NULL,
          boat_Length int NOT NULL,
          userID int DEFAULT NULL,
          PRIMARY KEY (boatID),
          FOREIGN KEY (userID) REFERENCES users(userID)
         );",

        "INSERT INTO marinadb.boats
        (boat_Name,boat_Length,userID)
        VALUES
        ('Mr Beaumont',43,1);",

        "INSERT INTO marinadb.boats
        (boat_Name,boat_Length,userID)
        VALUES
        ('Lady Kathleen', 27,2);",

        "INSERT INTO marinadb.boats
        (boat_Name,boat_Length,userID)
        VALUES
        ('Maritime Dreams', 50,3);",

        "CREATE TABLE IF NOT EXISTS slips (
          slipID char(3) NOT NULL,
          availability_status BOOLEAN NOT NULL,
          slipSize char(1) DEFAULT NULL,
          PRIMARY KEY (slipID)
        );",

        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A1',FALSE,'3');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A2',FALSE,'3');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A3',FALSE,'3');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A4',FALSE,'2');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A5',FALSE,'2');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A6',FALSE,'2');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A7',FALSE,'2');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A8',FALSE,'1');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A9',FALSE,'1');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A10',FALSE,'1');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A11',FALSE,'1');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A12',FALSE,'1');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A13',FALSE,'3');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A14',FALSE,'3');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A15',FALSE,'3');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A16',FALSE,'2');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A17',FALSE,'2');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A18',FALSE,'2');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A19',FALSE,'2');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A20',FALSE,'1');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A21',FALSE,'1');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A22',FALSE,'1');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A23',FALSE,'1');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('A24',FALSE,'1');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B1',FALSE,'3');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B2',FALSE,'3');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B3',FALSE,'3');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B4',FALSE,'2');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B5',FALSE,'2');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B6',FALSE,'2');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B7',FALSE,'2');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B8',FALSE,'1');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B9',FALSE,'1');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B10',FALSE,'1');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B11',FALSE,'1');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B12',FALSE,'1');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B13',FALSE,'3');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B14',FALSE,'3');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B15',FALSE,'3');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B16',FALSE,'2');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B17',FALSE,'2');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B18',FALSE,'2');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B19',FALSE,'2');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B20',FALSE,'1');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B21',FALSE,'1');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B22',FALSE,'1');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B23',FALSE,'1');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('B24',FALSE,'1');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C1',FALSE,'3');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C2',FALSE,'3');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C3',FALSE,'3');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C4',FALSE,'2');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C5',FALSE,'2');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C6',FALSE,'2');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C7',FALSE,'2');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C8',FALSE,'1');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C9',FALSE,'1');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C10',FALSE,'1');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C11',FALSE,'1');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C12',FALSE,'1');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C13',FALSE,'3');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C14',FALSE,'3');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C15',FALSE,'3');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C16',FALSE,'2');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C17',FALSE,'2');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C18',FALSE,'2');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C19',FALSE,'2');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C20',FALSE,'1');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C21',FALSE,'1');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C22',FALSE,'1');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C23',FALSE,'1');",
        "INSERT INTO marinadb.slips (slipID,availability_status,slipSize) VALUES ('C24',FALSE,'1');",

        "CREATE TABLE IF NOT EXISTS rates (
          ratesId int NOT NULL AUTO_INCREMENT,
          pricePerFoot DECIMAL(19,2) ,
          electricPower DECIMAL(19,2),
          PRIMARY KEY (ratesID)
        );",

        "INSERT INTO marinadb.rates (pricePerFoot,electricPower) VALUES (10.50,10.00);",

        "CREATE TABLE IF NOT EXISTS reservations (
            reservationID int NOT NULL AUTO_INCREMENT,
            total_Cost DECIMAL(19, 2) NOT NULL,
            checkin_Date date NOT NULL,
            checkout_Date date NOT NULL,
            userID int NOT NULL,
            boatID int NOT NULL,
            slipID char(3) NOT  NULL,
            ratesID int NOT NULL,
            PRIMARY KEY (reservationID),
            FOREIGN KEY (userID) REFERENCES users(userID),
            FOREIGN KEY (boatID) REFERENCES boats(boatID),
            FOREIGN KEY (slipID) REFERENCES slips(slipID),
            FOREIGN KEY (ratesID) REFERENCES rates(ratesID)
        );",

        "INSERT INTO marinadb.reservations
        (total_Cost, checkin_Date, checkout_Date,userID,boatID,slipID,ratesID)
        VALUES
        (75.30, '2024-05-22', '2024-05-23',1,1,'A1',1);",

        "INSERT INTO marinadb.reservations
        (total_Cost, checkin_Date, checkout_Date,userID,boatID,slipID,ratesID)
        VALUES
        (32.52, '2024-05-25', '2024-05-28',2,2,'B5',1);",

        "INSERT INTO marinadb.reservations
        (total_Cost, checkin_Date, checkout_Date,userID,boatID,slipID,ratesID)
        VALUES
        (98.42, '2024-06-20', '2024-06-27',3,3,'C24',1);",


        "CREATE TABLE IF NOT EXISTS  waitlist (
            waitlistID int NOT NULL AUTO_INCREMENT,
            boatID int NOT NULL,
            waitSlipSize  char(1) DEFAULT NULL,

            PRIMARY KEY (waitlistID),

            CONSTRAINT fk_boat
            FOREIGN KEY (boatID)
            REFERENCES boats(boatID)
        );",


        "INSERT INTO marinadb.waitlist (boatID,waitslipSize)
        VALUES (2,'1'),
               (1,'1'),
               (3,'1');"];

            foreach ($statements as $statement) {
                $conn->exec($statement);
            }

        } catch(PDOException $e) {
            echo $e->getMessage();
        }



        ?>

</head>
<body>

    <!-- HEADER -->
    <header>
        <h1><img src="images/Logo.png" alt="Moffat Bay Marina Logo" id="logo">Moffat Bay Marina</h1>
    </header>
    <div class="topnav" id="myTopnav">
        <a href="index.php">Home</a>
        <a href="pages/AboutUs.php">About Us</a>
        <a href="pages/Reservation.php">Reservations</a>
        <a href="pages/ReservationLookup.php" id="lookup">Reservation Lookup</a>
        <a href="pages/WaitListLookup.php" id="lookup">WaitList Lookup</a>
        <a href="pages/login.php" id="login">Login</a>
        <a href="javascript:void(0);" class="icon" onclick="topNav()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <!-- MAIN CONTENT -->
    <div class="contanier">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="images/Boats.jpg" alt="Los Angeles" style="width:100%;">
                </div>

                <div class="item">
                    <img src="images/Lake.jpg" alt="Chicago" style="width:100%;">
                </div>

                <div class="item">
                    <img src="images/Marina.jpg" alt="New york" style="width:100%;">
                </div>
            </div>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        <p>Copyright (c) Moffat Bay Marina</p>
    </footer>
</body>
</html>