<?php 
require_once "../php/Database.php";
session_start();

// Define variables and initialize with empty values
$_SESSION['checkoutDate'] = "";
$_SESSION['totalCost'] = "";

// Form submission
if(isset($_POST['confirm'])) {
    if(isset($_SESSION['boatName']) && isset($_SESSION['boatLength']) && isset($_SESSION['reservationDate']) && isset($_SESSION['slipID']) && isset($_SESSION['AddToWaitList'])) {
        $conn = Database::getConn();
        // Get pricePerFoot and  electricPower rates
        $sql = "SELECT pricePerFoot, electricPower FROM rates WHERE ratesId = 1"; 
        $result = $conn->query($sql);

        if($result !== false && $result->rowCount() > 0) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $pricePerFoot = $row["pricePerFoot"];
            $electricPowerCharge = $row["electricPower"];

            // Get boat size 
            $boatSize = $_SESSION['boatLength'];
            $boatName=  $_SESSION['boatName'];

            // Calculate total cost
            $totalCost = ($pricePerFoot * $boatSize) + $electricPowerCharge;
            
            // Store total cost in session
            $_SESSION['totalCost'] = $totalCost;

            
            // Get boatID based on boatName
            $sqlBoatID = "SELECT boatID FROM boats WHERE boat_Name = :boatName"; 
            $stmtBoatID = $conn->prepare($sqlBoatID); 
            $stmtBoatID->bindParam(':boatName', $boatName); 
            $stmtBoatID->execute(); 

            if ($stmtBoatID) { 
                $boatIDRow = $stmtBoatID->fetch(PDO::FETCH_ASSOC); 
                $boatID = $boatIDRow['boatID'];
            } else {
                echo "Error: Unable to find the provided Boat Name try again!"; 
                exit; 
            }

            // Insert reservation details into the database
            $sqlInsert = "INSERT INTO reservations (total_Cost, checkin_Date, checkout_Date, userID, boatID, slipID, ratesID) 
                          VALUES (:totalCost, :checkinDate, :checkoutDate, :userID, :boatID, :slipID, 1)"; 
            $stmtInsert = $conn->prepare($sqlInsert); 
            $stmtInsert->bindParam(':totalCost', $totalCost); 
            $stmtInsert->bindParam(':checkinDate', $_SESSION['reservationDate']);

            // Calculate checkout date by adding 30 days to the check-in date
            $checkInDate = date_create($_SESSION['reservationDate']);
            date_add($checkInDate, date_interval_create_from_date_string('30 days'));
            $checkoutDate = date_format($checkInDate, 'Y-m-d');

            // Store checkout date in session
            $_SESSION['checkoutDate'] = $checkoutDate;

            $stmtInsert->bindParam(':checkoutDate', $checkoutDate);
            $stmtInsert->bindParam(':userID', $_SESSION["id"]);
            $stmtInsert->bindParam(':boatID', $boatID);
            $stmtInsert->bindParam(':slipID', $_SESSION['slipID']);
            $stmtInsert->execute(); 
            $reservationID = $conn->lastInsertId();

            // Close connection
            Database::closeConnection();

            $_SESSION['reservationID'] = $reservationID;

            // Redirect to ReservationConfirmation.php
            header("Location: ReservationConfirmation.php");
            exit();
        } else {
            echo "Error: No information found in the database.";
        }
    } else {
        echo "Something went wrong. Please try again later.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation - Moffat Bay Marina</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- HEADER -->
    <header>
        <h1><img src="../images/Logo.png" alt="Moffat Bay Marina Logo" id="logo">Moffat Bay Marina</h1>
    </header>
    <div class="topnav" id="myTopnav">
        <a href="../index.php">Home</a>
        <a href="AboutUs.php">About Us</a>
        <a href="../pages/Reservation.php">Reservations</a>
        <a href="../pages/ReservationLookup.php" id="lookup">Reservation Lookup</a>
        <a href="../pages/login.php" id="login">Login</a>
        <a href="javascript:void(0);" class="icon" onclick="topNav()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <!-- MAIN CONTENT -->
    <div class="container login">
        <h1>Reservation Summary</h1>
        <p>
            <?php 
            // Display reservation summary
            if(isset($_SESSION['boatName']) && isset($_SESSION['boatLength']) && isset($_SESSION['reservationDate']) && isset($_SESSION['slipID']) && isset($_SESSION['AddToWaitList'])) {
                echo "<strong>Boat Name:</strong> ".$_SESSION['boatName']."<br>";
                echo "<strong>Boat Size: </strong>".$_SESSION['boatLength']."<br>";
                echo "<strong>Check-in Date: </strong>".$_SESSION['reservationDate']."<br>";
                $checkInDate = date_create($_SESSION['reservationDate']);
                date_add($checkInDate, date_interval_create_from_date_string('30 days'));
                $checkoutDate = date_format($checkInDate, 'Y-m-d');
                echo "<strong>Checkout Date: </strong>".$checkoutDate."<br>";
                echo "<strong>Slip Size: </strong>".$_SESSION['slipSize']."<br>";
                echo "<strong>Slip ID: </strong>".$_SESSION['slipID']."<br>";
                echo "Waitlist? ".$_SESSION['AddToWaitList']."<BR>";
                $conn = Database::getConn();
                $sql = "SELECT pricePerFoot, electricPower FROM rates WHERE ratesId = 1"; 
                $result = $conn->query($sql);
                if($result !== false && $result->rowCount() > 0) {
                    $row = $result->fetch(PDO::FETCH_ASSOC);
                    $pricePerFoot = $row["pricePerFoot"];
                    $electricPowerCharge = $row["electricPower"];
                    $boatSize = $_SESSION['boatLength'];
                    $totalCost = ($pricePerFoot * $boatSize) + $electricPowerCharge;
                    echo "<strong>Reservation Cost: </strong>$".$totalCost."<br>";
                } else {
                    echo "Error: No information found in the database.";
                }
            } else {
                echo "Something went wrong. Please try again later.";
            }
            ?>
        </p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <button type="submit" class="btn btn-success" name="confirm">Confirm Registration</button>
        </form>
        <form action="../pages/Reservation.php" method="get">
            <button type="submit" class="btn btn-danger" name="cancel">Cancel</button>
        </form>
    </div>
    <!-- FOOTER -->
    <div class="container-fluid">
        <footer class="py-3 my-4">
            <p>Copyright (c) Moffat Bay Marina</p>
        </footer>
    </div>
</body>
</html>