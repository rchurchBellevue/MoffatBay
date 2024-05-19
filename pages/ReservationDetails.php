<?php
session_start();

// Check if reservation details are available 
if (isset($_SESSION['reservationDetails'])) {
    $reservationDetails = $_SESSION['reservationDetails'];
    unset($_SESSION['reservationDetails']);
} else {
    // Redirect back to reservationLookup.php if no reservation details are found 
    header("Location: ReservationLookup.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Details - Moffat Bay Marina</title>
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
        <a href="../pages/WaitListLookup.php" id="lookup">WaitList Lookup</a>
        <a href="../pages/login.php" id="login">Login</a>
        <a href="javascript:void(0);" class="icon" onclick="topNav()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <div class="container login">
        <h1>Reservation Details</h1>
        <?php if (!empty($reservationDetails)) : ?>
            <div class="reservation-details">
                <br>
                <p>
                    <strong>Boat Name:</strong> <?php echo $reservationDetails['boat_Name']; ?><br>
                    <strong>Boat Size:</strong> <?php echo $reservationDetails['boat_Length']; ?><br>
                    <strong>Check-in Date:</strong> <?php echo $reservationDetails['checkin_Date']; ?><br>
                    <strong>Slip Size:</strong> <?php echo $reservationDetails['slipSize']; ?><br>
                    <strong>Slip ID:</strong> <?php echo $reservationDetails['slipID']; ?><br>
                </p>
            </div>
        <?php else : ?>
            <p>No reservation found with the provided details.</p>
        <?php endif; ?>
    </div>
    <div class="container-fluid">
        <footer class="py-3 my-4">
            <p>Copyright (c) Moffat Bay Marina</p>
        </footer>
    </div>
</body>
</html>
