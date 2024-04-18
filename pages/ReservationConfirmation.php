<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Moffat Bay Marina</title>
    <script type="text/javascript" src="../js/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- HEADER -->
    <header>
        <h1><img src="../images/Logo.png" alt="Moffat Bay Marina Logo" id="logo">Moffat Bay Marina</h1>
    </header>
    <div class="topnav" id="myTopnav">
        <a href="../index.html">Home</a>
        <a href="#">About Us</a>
        <a href="../pages/Reservation.php">Reservations</a>
        <a href="../pages/login.php" id="login">Login</a>
        <a href="javascript:void(0);" class="icon" onclick="topNav()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <!-- MAIN CONTENT -->
    <div class="container login">
        <h1>Reservation Confirmation Placeholder</h1>
        <p>
            <?php 
            session_start();
            echo("Size ".$_SESSION['slipSize']."<BR>");
            echo("Boat Name ".$_SESSION['boatName']."<BR>");
            echo("Check in ".$_SESSION['reservationDate']."<BR>");
            echo("Slip ".$_SESSION['slipID']."<BR>");
            echo("Waitllist? ".$_SESSION['AddToWaitList']."<BR>");
            ?>
        </p>
        </div>
    <!-- FOOTER -->
    <div class="containe-fluid">
        <footer class="py-3 my-4">
            <p>Copyright (c) Moffat Bay Marina</p>
        </footer>
    </div>
</body>
</html>