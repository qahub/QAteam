﻿<?php

	require "qa_cgi/connect.php";
	session_start();
	$topic = "Nuclear";

?>

<html>
<head>
	<script src="js/jcanvas.js"></script>
	<script src="js/addCircle.js"></script>
	<script src="js/freeTalk.js"></script>
	<script>
	var openAll = openSet('<?php echo $topic; ?>');
	var leftCircle = circleSet();
	var rightCircle = circleSet();
<?php 

	$qaDataQuery = mysql_query("SELECT `id`, `fration` FROM `5_qaDataNuclear`");
	while( ( $qaDataRow = mysql_fetch_assoc($qaDataQuery) ) != FALSE){
		if($qaDataRow['fration'] == 2){
			echo "leftCircle('".$topic."',2);";
		}else if($qaDataRow['fration'] ==1){
			echo "rightCircle('".$topic."',1);";
		}

	}

?>

	$(document).ready(function() {
		var uid= "<?php echo $_SESSION['uid'];?>";
		var username= "<?php echo $_SESSION['username'];?>";
		var topic="<?php echo $topic;?>";
		loadAllFreeTalk(topic);
		$('#input_talk_area').keydown(function(event){inputKeyDown(event, uid, username,topic)});

	});

	</script>

</head>
	  <div id="mask"></div>
	  <div id="all">
		<div id="allTitle"></div>
		<div id="allContent"></div>
	  </div>

	 <div id="board">
		<div id="right"></div>
		<div id="left"></div>
		<div id="clock">
			<canvas id="blackTriangle" width='100px' height='100px' ></canvas>
			<canvas id="grayTriangle" width='100px' height='100px' ></canvas>
		</div>
	  <div id="leftboard"></div>	
	  <div id="rightboard"></div>
	 </div>
	 <div id="headpic">
		<?php echo $_SESSION['username'];?>
	 </div>
	 <div id="custom">
		<div id="customTop"></div>
		<div id="titleft"> Free talk</div>
			<br /><br />
		<div id="freeTalk" >
		</div>
		<?php if(!(empty($_SESSION['uid']))) { ?>
		<textarea id='input_talk_area' placeholder='來聊天吧 ...'></textarea>
		<?php } ?>
		<footer></footer>
	 </div>
	 <div id="foot">
	     <img class="boticon" src='images/mainpage/image.png'></img>
	 </div>
</html>	
