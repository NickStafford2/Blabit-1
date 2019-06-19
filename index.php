<?php 
    session_start();
    //phpinfo();
?>

<!doctype html>
<html lang="en-us">

<head>
    <title>Home</title>
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
        <div class="row home-login-messages">
            <div class="col-lg-8">
                <h1>No Login Required</h1>
                <p>Browse at your leasure. Post anonymously or with a new account</p>
            </div>
            <div class="col-lg-4">
                <div class="mini-login-container">
                    <?php include "includes/mini-login.php"; ?>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>

        <div>
            <h1>Online Now</h1>
            <div class="row">
                <div class="col-lg-3">
                    <?php include "includes/stream-summary.php"; ?>
                </div>
                <div class="col-lg-3">
                    <?php include "includes/stream-summary.php"; ?>
                </div>
                <div class="col-lg-3">
                    <?php include "includes/stream-summary.php"; ?>
                </div>
                <div class="col-lg-3">
                    <?php include "includes/stream-summary.php"; ?>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-3">
                    <?php include "includes/stream-summary.php"; ?>
                </div>
                <div class="col-lg-3">
                    <?php include "includes/stream-summary.php"; ?>
                </div>
                <div class="col-lg-3">
                    <?php include "includes/stream-summary.php"; ?>
                </div>
                <div class="col-lg-3">
                    <?php include "includes/stream-summary.php"; ?>
                </div>
            </div>
        </div>
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