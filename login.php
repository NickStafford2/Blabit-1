<?php
// Include config file
require_once "includes/database/database-connection-open.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } 
    else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } 
    else{
        $password = trim($_POST['password']);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT username, password FROM users WHERE username = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){    
                    echo "<p>num of rows = 1</p>";                
                    // Bind result variables
                    $stmt->bind_result($username, $hashed_password);
                    if($stmt->fetch()){
                        echo "<p>fetched</p>";                

                        if(password_verify($password, $hashed_password)){
                            /* Password is correct, so start a new session and
                            save the username to the session */
                            session_start();
                            $_SESSION['username'] = $username;      
                            header("location: user-homepage.php");
                        } 
                        else{
                            // Display an error message if password is not valid
                            $password_err = 'The password you entered was not valid. you entered "' . $password .'" hashed_password="' . $hashed_password ;
                        }
                    }
                } 
                else{
                    // Display an error message if username doesn't exist
                    $username_err = 'No account found with that username.';
                }
            } 
            else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $mysqli->close();
}
?>

<!doctype html>
<html lang="en-us">

<head>
    <title>Login</title>
    <?php include "includes/standard-head-data.html"; ?>
</head>

<body>
    <?php include "includes/header/header.php"; ?>
    <!--?php include "includes/sidebar.html"; ?-->
    <br>
    <br>
    <div class="container">
        <br>
        <div class="row home-login-messages">
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
                <h2>Login</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                        <label>Username</label>
                        <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                        <span class="help-block"><?php echo $username_err; ?></span>
                    </div>    
                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                        <span class="help-block"><?php echo $password_err; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Login">
                    </div>
                    <p>Don't have an account? <a href="signup.php">Sign up now</a>.</p>
                </form>
            </div>
            <div class="col-lg-4">
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <h3>About Blabit</h3>
        <?php include "includes/big-text-block.html"; ?>
    </div>
    <?php include "includes/footer.html"; ?>


</body>


</html>