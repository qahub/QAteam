<?php 

	session_start(); 
	$username = $_SESSION['username'];

?>
<html>
<head>
	<link href="stylesheet/profile.css" rel="stylesheet" />
	<link href="stylesheet/allPanel.css" rel="stylesheet" />
	<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
	<script src="js/jcanvas.js"></script>
	<script src="js/index.js"></script>
	<script src="js/signup_js.js">
	
	</script>
	<meta charset="UTF-8" />
</head>
<body>
<!--
  <div id='headerBar'>
	<div id="logo"></div>
	<div id="topic"></div>
	<?php if(empty($_SESSION['uid'])){  ?>
		<img class='icon' id='fb_link' src="images/signup/signup-FB-01.png">
	<?php }else{ 
		echo "<div id='user'>Welcome $username !! <span id='logout'>Logout</span></div>";
	}?>
  </div>
-->
  <nav>  	
 	<div class='middle'>
		MENU
	</div>	
	<img id='black' class='link'  src='images/mainpage/goBlack.png' width="100px" height="120px" />
	<div id='midPart'>
		<span class='link' id='aboutUs'>About us</span>
		<span class='link' id='home'>Home</span>
	</div>
	<img id='white' class='link' src='images/mainpage/goWhite.png' width="100px" height="120px" />

  </nav>
  <div id="page"></div>
  <div id="register">
  </div>

</body>
</html>
