<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Moffat Bay Marina</title>
    <script type="text/javascript" src="../js/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>
<?php
    require_once "../php/Database.php";

  // Define variables and initialize with empty values
$firstName = $lastName = $emailAddress=$phoneNbr=$boatName=$boatLength=$password = $confirmpassword= "";
$firstName_err = "";
$lastName_err = "";
$emailAddress_err = "";
$phoneNbr_err = "";
$password_err = "";
$confirmpassword_err = "";
$boatname_err = "";
$boatlength_err = "";


session_start();
$conn=Database::getConn();
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    //Validate firstName
    if(empty(trim($_POST["first_name"]))){
      $firstName_err = "Please enter a firstName.";
    }
    else {
        $firstName=trim($_POST["first_name"]);
    }

    //Validate lasttName
    if(empty(trim($_POST["last_name"]))){
      $lastName_err = "Please enter a last Name.";
    }
    else {
        $lastName=trim($_POST["last_name"]);
    }
    //Validate phone Number
    if(empty(trim($_POST["phone"]))){
      $phoneNbr_err = "Please enter a phoneNumber.";
    }
    elseif(strlen(trim($_POST["phone"])) !=10){
        $phoneNbr_err = "Phone # must be 10 digits exactly.";
    }
    elseif(!preg_match('/^[0-9]+$/', trim($_POST["phone"]))){
        $phoneNbr_err = "Phone # must be 10 digits exactly.";
    }
    else {
        $phoneNbr=trim($_POST["phone"]);
    }

    //Validate boatname
    if(empty(trim($_POST["boatname"]))){
        $boatname_err = "Please enter a boat name.";
      }
      else {
          $boatName=trim($_POST["boatname"]);
      }

    //Validate boatLength
    if (empty(trim($_POST["boatlength"]))) {
        $boatLengthError = "Please enter your boat's length.";
    } 
    else if (!preg_match('/^[1-9]\d*$/',trim($_POST["boatlength"]))) {
        $boatLengthError = "Please enter a positive number.";
    }
    else {
        $boatLength = trim($_POST["boatlength"]);
    }


    // Validate username
    if(empty(trim($_POST["email_address"]))){
        $emailAddress_err = "Please enter an emailAddress.";
    } 
     else{
        // Prepare a select statement
        $sql = "SELECT userId FROM users WHERE email = :emailAddress";
        
        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":emailAddress", $param_emailAddress, PDO::PARAM_STR);
            
            // Set parameters
            $param_emailAddress = trim($_POST["email_address"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $emailAddress_err = "This email is already taken.";
                } else{
                    $emailAddress = trim($_POST["email_address"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(!preg_match('/^(?=.*[a-z])(?=.*[A-Z]).+$/', trim($_POST["password"]))){
        $password_err = "Password must have one uppercase and one lowercase letter."; 
    }
    elseif(strlen(trim($_POST["password"])) < 8){
        $password_err = "Password must have atleast 8 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirmpassword_err = "Please enter a confirmation password.";     
    } elseif(!preg_match('/^(?=.*[a-z])(?=.*[A-Z]).+$/', trim($_POST["confirm_password"]))){
        $confirmpassword_err = "Confirm Password must have one uppercase and one lowercase letter."; 
    }
    elseif(strlen(trim($_POST["confirm_password"])) < 8){
        $confirmpassword_err = "Confirm Password must have atleast 8 characters.";
    }
    elseif((trim($_POST["confirm_password"])) !=(trim($_POST["password"]))){
            $confirmpassword_err = "Password and Confirm Password must match";
    } else{
        $confirmpassword = trim($_POST["confirm_password"]);
    }


    
    // Check input errors before inserting in database
    if(empty($firstName_err) && empty($lastName_err) && empty($emailAddress_err) &&
       empty($phoneNbr_err) && empty($password_err) && empty($confirmpassword_err) 
    ){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (first_Name,last_Name,email,phone_Number, password) VALUES (:firstName,:lastName,:email,:phoneNbr,:password)";
         
        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":firstName", $param_firstName, PDO::PARAM_STR);
            $stmt->bindParam(":lastName", $param_lastName, PDO::PARAM_STR);
            $stmt->bindParam(":email", $param_emailAddress, PDO::PARAM_STR);
            $stmt->bindParam(":phoneNbr", $param_phoneNbr, PDO::PARAM_INT);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            
            // Set parameters
            $param_firstName = $firstName;
            $param_lastName = $lastName;
            $param_emailAddress = $emailAddress;
            $param_phoneNbr = $phoneNbr;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                $userID = $conn->lastInsertId();
                $_SESSION["id"] = $userID;
                
            } 
            else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            $sql = "INSERT INTO boats (boat_name,boat_Length,userID) VALUES (:boatname,:boatlength,:userid)";
            if($stmt = $conn->prepare($sql)){
                // Bind variables to the prepared statement as parameters
                $stmt->bindParam(":boatname", $param_boatName, PDO::PARAM_STR);
                $stmt->bindParam(":boatlength", $param_boatLength, PDO::PARAM_INT);
                $stmt->bindParam(":userid", $param_boatUserID, PDO::PARAM_INT);
      
                $param_boatName = $boatName;
                $param_boatLength = $boatLength;
                $param_boatUserID =$userID;


            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to success page
                header("location: success.php");
            } 
            else{
                echo "Oops! Something went wrong. Please try again later.";
            }    

            // Close statement
            unset($stmt);
        }
        }
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
        <a href="../index.php">Home</a>
        <a href="AboutUs.php">About Us</a>
        <a href="Reservation.php">Reservations</a>
        <a href="../pages/ReservationLookup.php" id="lookup">Reservation Lookup</a>
        <a href="../pages/WaitListLookup.php" id="lookup">WaitList Lookup</a>
        <a href="login.php" id="login">Login</a>
        <a href="javascript:void(0);" class="icon" onclick="topNav()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <!-- MAIN CONTENT -->
    <div class="container">
        <div class="row">
            <div class="col-lg register">
                <h3>Welcome to Moffat Bay Marina!</h3>
                <br>
                <p>Please Enter a Valid Email Address</p>
                <p>
                    <b>Phone Number Format:</b> <br>
                    Please enter in a 10 digit area code phone number combination
                </p>
                <p>
                    <b>Password Requirements:</b> <br>
                    At least 8 characters <br>
                    Include at least one uppercase letter and one lowercase letter.
                </p>
            </div>
            <div class="col-md register col-right">
                <form action="" method="post">
                    <table>
                    <tr><td><b>First Name:</b></td>
                    <td>
                    <input type="text" id="first_name" name="first_name" 
                    value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>">
                    <span class="error">* <?php echo $firstName_err;?>
                    </span>
                    </td>
                    </tr>
                    <tr>
                    <td><b>Last Name:</b></td>
                    <td><input type="text" id="last_name" name="last_name" 
                    value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
                                    <span class="error">* <?php echo $lastName_err;?></span>
                    </td></tr>
                    <tr><td><b>Email:</b></td>
                    <td><input type="email" id="email_address" name="email_address" 
                    value="<?php if (isset($_POST['email_address'])) echo $_POST['email_address']; ?>">
                    <span class="error">* <?php echo $emailAddress_err;?></span>
                    </td></tr>
                    <tr><td><b>Phone:</b></td>
                    <td><input type="tel" id="phone" name="phone" 
                    value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>">
                    <span class="error">* <?php echo $phoneNbr_err;?></span>
</td></tr>  
                    <tr><td><b>Boat Name:</b></td>
                    <td><input type="text" id="boatname" name="boatname" 
                    value="<?php if (isset($_POST['boatname'])) echo $_POST['boatname']; ?>">
                    <span class="error">* <?php echo $boatname_err;?></span>
                    </td></tr>
                    <tr><td><b>Boat Length:</b></td>
                    <td><input type="text" id="boatlength" name="boatlength" 
                    value="<?php if (isset($_POST['boatlength'])) echo $_POST['boatlength']; ?>">
                    <span class="error">* <?php echo $boatlength_err;?></span>
                    </td></tr>
                    <tr><td><b>Password:</b></td>
                    <td><input type="password" id="password" name="password" 
                    value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>">
                    <input type="checkbox" id="show_password" name="show_password" id="show_password" onclick="showPass()">
                    Show Password
                    <span class="error">* <?php echo $password_err;?></span>
                    </td></tr>
                    <tr><td><b>Confirm Password:</b></td>
                    <td><input type="password" id="confirm_password" name="confirm_password" 
                    value="<?php if (isset($_POST['confirm_password'])) echo $_POST['confirm_password']; ?>">
                    <input type="checkbox" id="show_password" name="show_password" id="show_password" onclick="showConfirmPass()">                
                    Show Password
                    <span class="error">* <?php echo $confirmpassword_err;?></span>
                    </table>
                    <input class="btn-primary" type="submit" value="Register">
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