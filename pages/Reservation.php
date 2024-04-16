<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Moffat Bay Marina</title>
    <script type="text/javascript" src="../js/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<?php
require_once "../php/Database.php";
$conn = Database::getConn();

session_start();

// Define variables and initialize with empty values
$boatName = $boatSlipSize = "";
$checkInDate;
$boatNameError = $boatLengthError = $checkInDateError =  "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // Check if boat name is empty
    if (empty(trim($_POST["frmBoatName"]))) {
        $boatNameError = "Please enter your boat's name.";
    } else {
        $boatName = trim($_POST["frmBoatName"]);
    }

    // Verify a boat length was selected
    if (isset($_REQUEST['frmBoatLength']) && $_REQUEST['frmBoatLength'] == "") {
        $boatLengthError = 'Please select the size of your boat.';
    } else {
        $boatSlipSize = $_REQUEST['frmBoatLength'];
    }

    // Verify a Check in date was selected


    if (isset($_POST["frmCheckIn"])) {
        $checkInDate = $_POST["frmCheckIn"];
    } else {
        $checkInDateError = 'Please select a checkin date.';
    }

    // Validate credentials
    if (empty($boatNameError) && empty($boatLengthError) && empty($checkInDateError)) {

        // Prepare a select statement
        $sql = "SELECT slipID FROM slips WHERE slipSize = :parmSlip AND availability_status=0;";

        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":parmSlip", $boatSlipSize, PDO::PARAM_STR);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                $_SESSION['slipSize']=$boatSlipSize;
                $_SESSION['boatName']=$boatName;
                $_SESSION['reservationDate']=$checkInDate;
                // If we have at least one row we can book, otherwise we'll need to go to waitlist
                if ($stmt->rowCount() >= 1) {
                    if ($row = $stmt->fetch()) {
                        $_SESSION['slipID'] = $row["slipID"];
                        // Redirect user to welcome page
                        header("location: ReservationConfirmation.php");
                    } 
                }
                else {
                    $_SESSION['slipID'] = null;
                    $_SESSION['AddToWaitList']='Y';
                    header("location: ReservationConfirmation.php");   
                }
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }


        // Close statement
        unset($stmt);
    }


    // Close connection
    Database::closeConnection();
}
?>

<body>
    <!-- HEADER -->
    <header>
        <h1><img src="../images/Logo.png" alt="Moffat Bay Marina Logo" id="logo">Moffat Bay Marina</h1>
    </header>
    <div class="topnav" id="myTopnav">
        <a href="../pages/Landing.php">Home</a>
        <a href="#">About Us</a>
        <a href="../pages/Reservation.php">Reservations</a>
        <a href="../pages/login.php" id="login" class="active">Login</a>
        <a href="javascript:void(0);" class="icon" onclick="topNav()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <!-- MAIN CONTENT -->
    <div class="container">
        <div class="row">
            <div class="col-lg reservation">
                <h3>Welcome to Moffat Bay Marina!</h3>
                <br>
                <p>Click the map to get a detailed view of the marina</p>
                <a href="../images/map.png">
                <img border="0" alt="Map" src="../images/map.png" width="400" height="400">
                </a>
            </div>
            <div class="col-md reservation col-right">
                <h3> Slip Reservation Form </h3>
                <p>Fill in the below information to view availability of slips for your boat </p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div>
                        <label>Boat Name:</label>
                        <input type="text" name="frmBoatName" value="<?php if (isset($_POST['frmBoatName'])) echo $_POST['frmBoatName']; ?>">
                        <span class="error">* <?php echo $boatNameError; ?></span>
                    </div>
                    <div class="form-select">
                        <label>Select your boat length</label>
                        <select name="frmBoatLength">
                            <option value="">Select...</option>
                            <option value="1">0 to 26 feet</option>
                            <option value="2">27 to 40 feet</option>
                            <option value="3">41 to 50 feet</option>
                        </select>
                    </div>
                    <span class="error">* <?php echo $boatLengthError; ?></span>
                    <div class="date-select">
                        <label>Check In Date:</label>
                        <input type="date" id="checkInDate" name="frmCheckIn">
                    </div>
                    <span class="error">* <?php echo $checkInDateError; ?></span>
                    <input type="submit" value="Search">
                </form>

            </div>
        </div>
    </div>
    <!-- FOOTER -->
    <footer>
        <p>Copyright (c) Moffat Bay Marina</p>
    </footer>
</body>

</html>