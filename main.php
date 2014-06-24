<?php

	require "qa_cgi/connect.php";
	session_start();
	$topic = "Nuclear";

?>

<html>
<head>
	<meta charset='utf8' />
	<link href="stylesheet/register.css" rel="stylesheet" />
	<script src="js/jcanvas.js"></script>
	<script src="js/addCircle.js"></script>
	<script src="js/freeTalk.js"></script>
	<script src="js/custom.js"></script>
	<script src="plugin/prefectScrollBar/jquery.mousewheel.js"></script>
	<script src="plugin/prefectScrollBar/perfect-scrollbar.js"></script>
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
		$('#headpic').click( function(){ getSomeInformation(uid, username);});
		$('#board').perfectScrollbar({
          wheelSpeed: 20,
          wheelPropagation: false
        });
		$('#freeTalk').perfectScrollbar({
          wheelSpeed: 20,
          wheelPropagation: false
        });
		$('#allAns').perfectScrollbar({
          wheelSpeed: 20,
          wheelPropagation: false
        });
		$('#allQue').perfectScrollbar({
          wheelSpeed: 20,
          wheelPropagation: false
        });        

        var headpic_address = "http://graph.facebook.com/" + uid + "/picture";
		$('#bighead').attr('src', headpic_address);
		$('#bighead').css("position", "relative");
		$('#bighead').css("height", "70px");
		$('#bighead').css("width", "70px");
		$('#bighead').css("margin", "0 auto");
		$('#bighead').css("border-radius", "50%");

	});

	</script>

</head>
	  <div id="allmask"></div>
	  <div id="all">	
		<div id="allAns">
			<div id="A">A</div>
			<div id="contentA"></div>
		</div>
		<div id="line"></div>
		<div id="allQue">
			<div id="Q">Q</div>
			<div id="contentQ"></div>
		</div>	
		<div id="toBoard">
			<img id="toBoardButton" src="images/mainpage/toBoard.png" />
		</div>
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
		<?php if(!(empty($_SESSION['uid']))) { ?>
			<?php echo $_SESSION['username'];?>
			<img id = 'bighead' src='http://graph.facebook.com/UID/picture'></img>
		<?php } ?>

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
