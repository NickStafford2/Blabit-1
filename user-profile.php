<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}


?>

<!doctype html>
<html lang="en-us">

<head>
    <title>My Profile</title>
    <?php include "includes/standard-head-data.html"; ?>
</head>

<body>
    <?php include "includes/header/header.php"; ?>
    <!--?php include "includes/sidebar.html"; ?-->
    <br>
    <br>
    <br>

    <div class="container">
        <br>
        <div class="row">
            <div class="col-lg-4">
                <h1><?php echo $_SESSION['username']; ?></h1>
                <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post" enctype="multipart/form-data">
                    Select image to upload:
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="Upload Image" name="submit">
                </form>
                <br>
                <br>
                <p><a href="logout.php" class="btn btn-danger">Log Out</a></p>
            </div>
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <h1>These are the times that try mens souls.</h1>
        <p>The Addpocylapse has made monetization nearly impossible</p>
        <p>YouTube takes ~30% of superchat revenue</p>
        <p>Twitch takes large chunks of subscription fees</p>
        <h3>Fear not these dark days, for there is hope.</h3>
        <p>With Blabit, you can support content creators without these intrusive platforms. Use Blabit to ensure you support your favorite content creators as efficently as possible</p>
        <p>Fight the addpocalypse!</p>
        <h3>About Blabit</h3>
        <?php include "includes/big-text-block.html"; ?>
    </div>
    <?php include "includes/footer.html"; ?>


</body>


</html>