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
<?php
    require_once "../php/Database.php";
    $conn=Database::getConn();

// Define variables and initialize with empty values
$emailAddress = $password = "";
$emailAddress_err = $password_err =  "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["email_address"]))){
        $emailAddress_err = "Please enter email address.";
    } else{
        $emailAddress = trim($_POST["email_address"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT userID, email, password FROM users WHERE email = :email";
        
        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":email", $param_emailAddress, PDO::PARAM_STR);
            
            // Set parameters
            $param_emailAddress = trim($_POST["email_address"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if username exists, if yes then verify password
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["userID"];
                        $username = $row["email"];
                        $hashed_password = $row["password"];
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $userID;
                            $_SESSION["username"] = $emailAddress;                            
                            
                            // Redirect user to welcome page
                            header("location: LoginSuccess.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
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
        <a href="login.php" id="login" class="active">Login</a>
        <a href="javascript:void(0);" class="icon" onclick="topNav()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <!-- MAIN CONTENT -->
    <div class="container login">
        <h2>Welcome to Moffat Bay Marina!</h2>
        <b>Please enter your email and password to log in!</b>
        <p>Don't have an account? Create one <a href="register.php">here</a>!</p>
        <form action="" method="post">
            <b>Email:</b> <br>
            <input type="email" name="email_address" 
            value="<?php if (isset($_POST['email_address'])) echo $_POST['email_address']; ?>">
            <span class="error">* <?php echo $emailAddress_err;?></span>
            <br>
            <br>
            <b>Password:</b> <br>
            <input type="password" name="password" id="password" >
            <span class="error">* <?php echo $password_err;?></span>
            <input type="checkbox" name="show_password" id="show_password" onclick="showPass()"> Show Password
            <br>
            <input type="checkbox" name="remember" id="remember"> Remember Me
            <br>
            <input class="btn btn-primary" type="submit" value="Login">
        </form>
        <a class="align-right" href="">Forgot Your Password?</a>
    </div>
    <!-- FOOTER -->
    <div class="containe-fluid">
        <footer class="py-3 my-4">
            <p>Copyright (c) Moffat Bay Marina</p>
        </footer>
    </div>
</body>
</html>