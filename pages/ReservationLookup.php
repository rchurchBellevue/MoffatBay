<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once "../php/Database.php";

// Define variables and initialize with empty values
$reservationDetails = [];

if (isset($_POST['submit']) && (isset($_POST['reservationID']) || isset($_POST['email']))) {
    $conn = Database::getConn();

    // SQL query to retrieve reservation details
    $sql = "SELECT r.*, b.boat_Name, b.boat_Length, s.slipSize, r.slipID
            FROM reservations r
            JOIN boats b ON r.boatID = b.boatID
            JOIN slips s ON r.slipID = s.slipID
            JOIN users u ON u.userID = b.userID
            WHERE r.reservationID = :reservationID OR u.email = :email";

    $stmt = $conn->prepare($sql);

    $reservationID = !empty($_POST['reservationID']) ? $_POST['reservationID'] : null;
    $email = !empty($_POST['email']) ? $_POST['email'] : null;
    $stmt->bindParam(':reservationID', $reservationID);
    $stmt->bindParam(':email', $email);

    $stmt->execute();

    $reservationDetails = $stmt->fetch(PDO::FETCH_ASSOC);

    Database::closeConnection();

    // Redirect to reservationDetails.php if details are found
    if (!empty($reservationDetails)) {
        $_SESSION['reservationDetails'] = $reservationDetails;
        header("Location: reservationDetails.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Lookup - Moffat Bay Marina</title>
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
        <a href="../pages/AboutUs.php">About Us</a>
        <a href="../pages/Reservation.php">Reservations</a>
        <a href="../pages/ReservationLookup.php" id="lookup">Reservation Lookup</a>
        <a href="../pages/login.php" id="login">Login</a>
        <a href="javascript:void(0);" class="icon" onclick="topNav()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <!-- MAIN CONTENT -->
    <div class="container login">
        <h1>Reservation Lookup</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
            <div class="form-group">
                <label for="reservationID">Reservation ID:</label>
                <input type="text" class="form-control" id="reservationID" name="reservationID">
            </div>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Search</button>
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
