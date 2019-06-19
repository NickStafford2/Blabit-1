<?php 
    // Include database config file

    require_once "includes/database/database-connection-open.php";

    // define variables and set to empty values
    $username = $password = "";
    $username_err = $password_err = "";

    // Processing form data when form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // validate username
        if (empty(trim($_POST["username"]))) {
            $username_err = "Please enter a username.";
        }
        else {
            // prepare a select statement
            $sql = "SELECT id FROM users WHERE username = ?";

            if($stmt = $mysqli->prepare($sql)) {
                // Bind the variables to the prepared statement as parameters
                $stmt->bind_param("s", $param_username);

                // WARNING add make_input_safe() 
                // set parameters
                $param_username = trim($_POST["username"]);

                // attempt to execute the prepared statement
                if($stmt->execute()) {
                    // store result
                    $stmt->store_result();

                    if($stmt->num_rows == 1) {
                        $username_err = "This username is already taken.";
                    }
                    else {
                        $username = trim($_POST["username"]);
                    }
                }
                else {
                    // execution failed
                    echo "Something went wrong. Please try again.";
                }
            }
            // Close statement
            $stmt->close();
        }
        
        // Validate password
        if(empty(trim($_POST["password"]))) {
            $password_err = "Please enter a password.";
        }
        elseif(strlen(trim($_POST["password"])) < 6) {
            $password_err = "Password must have at least 6 characters.";
        }
        else {
            $password = trim($_POST["password"]);
        }

        // Check input errors before inserting in database
        if(empty($username_err) && empty($password_err)) {
            // prepare an insert statement
            $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

            if($stmt = $mysqli->prepare($sql)){
                //Bind variables to the prepared statement as parameters
                $stmt->bind_param("ss", $param_username, $param_password);
            
                // Set parameters
                $param_username = $username;
                $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

                // attempt to execute the prepared statement
                if($stmt->execute()){
                    //redirect to login page
                    header("Location: login.php");
                }
                else {
                    echo "something went wrong. Please try again later. (Error 2)";
                }
            }
            $stmt->close();
        }
        $mysqli->close();
    }


    //$username = make_input_safe($_POST["username"]);
    //$password = make_input_safe($_POST["password"]);

    //function make_input_safe($data) {
    //    $data = trim($data);
    //    $data = stripslashes($data);
    //    $data = htmlspecialchars($data);
    //    return $data;
    //}
?>


<!doctype html>
<html lang="en-us">

<head>
    <title>Sign Up</title>
    <?php include "includes/standard-head-data.html"; ?>
</head>

<body>
    <?php include "includes/header/header.php"; ?>
    <!--?php include "includes/sidebar.html"; ?-->

    <div class="container">
        <br>
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <h1>Sign Up</h1>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <!--form action="signup-welcome.php" method="post"-->
                    <div class="form-group">
                        <label for="text">Username:</label>
                        <input type="text" class="form-control" name="username" />
                    </div>
                    <div class="form-group">
                        <label for="text">Password:</label>
                        <input type="password" class="form-control" name="password" />
                    </div>
                   <input type="submit" name="submit" value="Submit" />
                </form>
                <br>
                <br>
            </div>
            <div class="col-lg-4"></div>
        </div>
        <br>
        <br>
        <br>
        <div>
            <h3>About Blabit</h3>
            <?php include "includes/big-text-block.html"; ?>
        </div>
    </div>
    <?php include "includes/footer.html"; ?>
</body>


</html>