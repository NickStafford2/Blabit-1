<?php 
    session_start();
    require_once "includes/database/database-connection-open.php";

?>

<!doctype html>
<html lang="en-us">

<head>
    <title>Global Chat</title>
    <?php include "includes/standard-head-data.html"; ?>
</head>
<body>
    <?php include "includes/header/header.php"; ?>
    <!--?php include "includes/sidebar.html"; ?-->

    <div class="container">
        <div class="chatbox-container">
            <?php 
                $chat_id = 1;
                include "includes/chatbox/chatbox.php"; 
            ?>
        </div>
        <h1>Trigger Warning!</h1>
        <p>The chat get rowdy, you have been warned</p>
        <?php include "includes/big-text-block.html"; ?>
    </div>
    <?php include "includes/footer.html"; ?>

</body>

</html>