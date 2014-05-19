<?php

	require "qa_cgi/connect.php";
	$topic = "Nuclear";

?>

<html>
<head>
	<script src="js/jcanvas.js"></script>
	<script src="js/addCircle.js"></script>
	<script src="freeTalk.js"></script>
	<script>
	var openAll = openSet('<?php echo $topic; ?>');
	var leftCircle = circleSet();
	var rightCircle = circleSet();
<?php 

	$qaDataQuery = mysql_query("SELECT `id`, `fration` FROM `5_qaDataNuclear`");
	while( ( $qaDataRow = mysql_fetch_assoc($qaDataQuery) ) != FALSE){
		if($qaDataRow['fration'] == 0){
			echo "leftCircle('".$topic."',0);";
		}else{
			echo "rightCircle('".$topic."',1);";
		}

	}

?>

	$(document).ready(function() {

		loadAllFreeTalk(fration, 'Nuclear', 1);
		$('#input_talk_area').keydown(function(event){inputKeyDown(event, uid, username)});

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
	 <div id="custom">
		<div id="customTop"></div>
		<div id="freeTalk">
			<div class='talkBlock'><span class='username'>Jax: </span><span class='talk'>Hello world!</span></div>
			<div class='talkBlock'><span class='username'>Jax: </span><span class='talk'>Hello world!</span></div>
			<div class='talkBlock'><span class='username'>Jax: </span><span class='talk'>Hello world!</span></div>
		</div>
		<textarea id='input_talk_area'></textarea>
		<footer></footer>
	 </div>
</html>	
