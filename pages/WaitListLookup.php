<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once "../php/Database.php";

// Define variables and initialize with empty values
$waitArray = [];
$sizeError = "";


if (isset($_POST['submit']) && (isset($_POST['frmSize']) && $_POST['frmSize'] != "0")) {
    $slipSizeValue = $_REQUEST['frmSize'];

    if ($sizeError == "") {
        $conn = Database::getConn();

        // SQL query to retrieve reservation details
        $sql = "SELECT *  FROM waitlist
            WHERE waitSlipSize= :paramSize";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':paramSize', $slipSizeValue);

        $stmt->execute();

        $waitArray = $stmt->fetch(PDO::FETCH_ASSOC);

        Database::closeConnection();

        $waitString="";
        if (!empty($waitArray)) {
            $waitString= "There are currently ".count($waitArray)." boats ahead of your in the queue";
        } else {
            $waitString= "Currently no waiting for a slip of that size";
        }
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
        <a href="../pages/WaitListLookup.php" id="lookup">WaitList Lookup</a>
        <a href="../pages/login.php" id="login">Login</a>
        <a href="javascript:void(0);" class="icon" onclick="topNav()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <!-- MAIN CONTENT -->
    <?php if ($_SERVER["REQUEST_METHOD"] == "GET") { ?>

        <div class="container login">
            <h1>WaitList Lookup</h1>
            <h4>Select a slip size to see the number of customers waiting </h4>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-select">
                    <label for="slipSize">Boat Length:</label>
                    <select name="frmSize">
                        <option value="0">Select...</option>
                        <option value="1">Up to 26 Feet</option>
                        <option value="2">27 to 40 Feet</option>
                        <option value="3">41 to 50 Feet</option>
                    </select>

                </div>
                <button type="submit" class="btn btn-primary" name="submit">Search</button>
            </form>
        </div>
    <?php } ?>
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $waitString!="") { ?>
        <div class="container login">
            <h1>WaitList Results</h1>
            <h4> <?php echo($waitString); ?> </h4>
        </div>
    <?php } ?>
    
    <!-- FOOTER -->
    <div class="container-fluid">
        <footer class="py-3 my-4">
            <p>Copyright (c) Moffat Bay Marina</p>
        </footer>
    </div>
</body>

</html>