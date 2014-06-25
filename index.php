<?php 

	require "qa_cgi/connect.php";
	session_start(); 
	$username = $_SESSION['username'];
	$webName = $_GET['web'];
	$squery = mysql_query("SELECT * FROM `5_NuclearState`") or die(mysql_error());
	$srow = array();

	while( ($result = mysql_fetch_assoc($squery)) != false){
		$name = $result['name'];
		$value = $result['value'];
		$srow[$name] = $value;

	}

?>
<html>
<head>
	<title>Q & A</title>
	<link href="stylesheet/profile.css" rel="stylesheet" />
	<link href="stylesheet/allPanel.css" rel="stylesheet" />
	<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
	<script src="js/jcanvas.js"></script>
	<script src="js/signup_js.js"></script>
	<script src="js/index.js"></script>
	<script>
		$(document).ready(function(){

<?php

	if(empty($webName)){
		echo "link('main.php');";
	}else{
		echo "link('$webName');";
	}
?>
		});
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
	<?php if($_SESSION['fration'] != 1 && $srow['nowFration'] == 2) { ?>
	<img id='black' class='link'  src='images/mainpage/goBlack.png' width="100px" height="120px" />
	<?php } ?>
	<div id='midPart'>
		<span class='link' id='aboutUs'>About us</span>
	<?php if(empty($_SESSION['username'])){?>
		<span id='login' class='link logPart'>Login</span>
	<?php }else{ ?>
		<span class='logPart'>
			<div id='photo'></div>
			<div id='logout' class='link'>Logout</div>
		</span>
	<?php } ?>
		<span class='link' id='home'>Home</span>
	</div>
	<?php if( $_SESSION['fration'] != 2 && $srow['nowFration'] == 1) { ?>
	<img id='white' class='link' src='images/mainpage/goWhite.png' width="100px" height="120px" />
	<?php } ?>
  </nav>
  <div id="page"></div>

</body>
</html>
