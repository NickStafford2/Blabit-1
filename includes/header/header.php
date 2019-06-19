<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top" >

	<div class="navbar-header">
		<button class="navbar-nav" id="navbar-sidebar-button">sidebar
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span> 
    	</button>

		<em>
			<a id="site-logo" class="navbar-brand" href="index.php">
				<p>Blab<span id="site-logo-it">It</span></p>
			</a>
		</em>

		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-links">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span> 
	    </button>
	</div>
	<div class="collapse navbar-collapse" id="navbar-links">
		<ul class="nav navbar-nav">
			<li><a class="nav-link bar-item" href="global-chat.php">Global Chatroom</a></li>
			<li><a class="nav-link bar-item" href="about-us.php">About Us</a></li>
			<li><a class="nav-link bar-item" href="#">Policies</a></li>
		</ul>
		<div class="nav navbar-nav navbar-right" id="user-info-div">
			<?php 
				if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
					include "includes/header/header-logged-in.php";
				} 
				else {
					include "includes/header/header-not-logged-in.php";
				}
			?>
		</div>
	</div-->
</nav>
