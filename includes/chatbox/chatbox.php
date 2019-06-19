<?php 
	if($mysqli->connect_error) {
    	die("Connection failed: " . $mysqli->connect_error);
	}
	//echo $chat_id;
	$sql = "SELECT title, description FROM `chat` WHERE id=1";
	$result = $mysqli->query($sql);

	if ($result->num_rows == 1) {
		$row = $result->fetch_assoc();
		$title = $row["title"];
		$description = $row["description"];

	}
	else {
		die("sql get title failed. num of rows != 1.");
	}


?>
<div class="chat-main"> 

	<div class="chat-heading">
		<h1 class="text-light"><?php echo htmlspecialchars($title) ?></h1>
		<p class="text-light"><?php echo htmlspecialchars($description) ?></p>
	</div>
	
	<div class="chat-history">
		<ul>
			<li class="shouts">Lorem ipsum f amet, consectetur</li>
			<li class="shouts">Lorem fdset, consectetur</li>
			<li class="shouts">sum dolor sit amet, consectdetur</li>
			<li class="shouts">Lorem ipsufasfdm dolor sit amet, consectetur</li>
			<li class="shouts">Lorem ipsum dolor sit dsafmet, consectetur</li>
			<li class="shouts">Lorem ipsum dolor sit amet, consectdetur</li>
			<li class="shouts">Lordfm dolor sit amet, consectetur</li>
			<li class="shouts">Lorem ipsum dolor sit amet, consectetur</li>
			<li class="shouts">Lorfd dolor sit amet, consectetur</li>
		</ul>
	</div>
	<div class="chat-user-message">
		<div class="divider-line"></div>
		<div>
			<img id="chat-draft-user-icon" class="chat-user-icon" src="resources/images/default-user-icon.png">
			<div id="user-message" class="chat-draft-text" name="user-message" contenteditable=""></div>	
		</div>
		<div class="chat-user-message-options">
			<img id="send-button" src="includes/chatbox/icons8-chevron-right-filled-50.png" alt="send" >
			<p>Message Options</p>
		</div>
	</div>
</div>


<!--form method="post" action="submitChat.php" style="background-color:yellow;"-->
<!--input type="text" class="form-control" id="userMessage" name="userMessage" placeholder="Talk to the web" style="vertical-align: text-top"-->
