<?php

	require "qa_cgi/connect.php";
	session_start();
	$topic = "Nuclear";
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

		$('#blackTriangle').jCanvas({
			fillStyle: '<?php  if($srow['nowFration'] == 2) echo "black";else echo "#F1F2F2";?>',
			 x: 50, y: 45,
			 radius: 55,
			 sides: 3,
			 rotate: 180
		}).drawPolygon();

		$('#grayTriangle').jCanvas({
			fillStyle: '<?php  if($srow['nowFration'] == 2) echo "#F1F2F2"; else echo "#black";?>',
			 x: 50, y: 70,
			 radius: 55,
			 sides: 3,
			 rotate: 0
		}).drawPolygon();

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
			<img id = 'bighead' src='images/profile/default.jpg'></img>
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
