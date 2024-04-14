<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Moffat Bay Marina</title>
    <script type="text/javascript" src="../js/script.js"></script>
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
    <div class="header">
        <nav>
            <ul>
                <li>Home</li>
                <li>About Us</li>
                <li>Reservations</li>
            </ul>
            <ul>
                <li>Login</li>
            </ul>
        </nav>
        <header>
            <h1>Moffat Bay Marina</h1>
        </header>
    </div>
    <!-- MAIN CONTENT -->
    <div>
        <h1>Login</h1>
        <h3>Welcome to Moffat Bay Marina!</h3>
        <b>Please enter your email and password to log in!</b>
        <form action="" method="post">
            <b>Email:</b>
            <input type="email" name="email_address" 
            value="<?php if (isset($_POST['email_address'])) echo $_POST['email_address']; ?>">
            <span class="error">* <?php echo $emailAddress_err;?></span>
            <br>
            <b>Password</b>
            <input type="password" name="password" id="password" >
            <span class="error">* <?php echo $password_err;?></span>
            <input type="checkbox" name="show_password" id="show_password" onclick="showPass()"> Show Password
            <br>
            <input type="checkbox" name="remember" id="remember"> Remember Me
            <br>
            <input type="submit" value="Login">
        </form>
        <a href="">Forgot Your Password?</a>
    </div>
</body>
</html>