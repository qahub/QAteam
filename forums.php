<?php
	
	require "qa_cgi/connect.php";

	session_start();
	$valid = $_GET['valid'];
	$fration = $_GET['fration'];
	$squery = mysql_query("SELECT * FROM `5_NuclearState`") or die(mysql_error());
	$srow = array();

	while( ($result = mysql_fetch_assoc($squery)) != false){
		$name = $result['name'];
		$value = $result['value'];
		$srow[$name] = $value;

	}

	if($valid == 0 && $fration == 2) $table = $srow['blackNum'];
	else if( $valid == 0 && $fration == 1) $table = $srow['whiteNum'];
	else{

		$table = $valid;

	}

?>

<html>
<head>
<link href="stylesheet/forums.css" rel="stylesheet" type="text/css"></link>
<link href="stylesheet/profile.css" rel="stylesheet" />
<link href="stylesheet/score.css" rel="stylesheet" />
<link href="stylesheet/allComPanel.css" rel="stylesheet" />
 <link href="plugin/prefectScrollBar/perfect-scrollbar.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-2.1.0.min.js" type="text/javascript"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.js" type="text/javascript"></script>
<script src="plugin/prefectScrollBar/jquery.mousewheel.js"></script>
<script src="plugin/prefectScrollBar/perfect-scrollbar.js"></script>
<script src="js/commentFunc.js"></script>
<script src="js/link.js"></script>
<script src="js/signup_js.js"></script>

<script>

	var uid = "<?php echo $_SESSION['uid'];?>";
	var username = "<?php echo $_SESSION['username'];?>";
	var fration = '<?php echo $fration; ?>';
	if(fration == 2) var fra = 'Black';
	else if(fration == 1) var fra = 'White';
	var topic = 'Nuclear';
	var table =  <?echo $table; ?>;
	var sta = <?echo $_GET['status']; ?>;
	var openAllComment = openSet(event, topic, fra, table, sta);
	function newClick(){
			$("#down").animate({
				height:'100%',
				opacity:'.9'
			},1000);
			//$("#arrow-new").remove();
			$("#down").empty();
			$("#down").append("<textarea id='reply'></textarea>");
			$("#down").append("<div id='arr'><div id='arrow-submit'></div><div id='arrow-subtext' class='arrow_button'> <p id='submit'>submit</p> </div></div>");
			$("#down").append("<div id='arr2'> <div id='arrow-cancel'></div> <div id='arrow-cantext' class='arrow_button'> <p id='cancel'>cancel</p> </div> </div>");
			$("#arrow-subtext").click(function(){uploadCommit(uid,username,fration,topic,table,sta); });	
			$("#arrow-cantext").click(function(){
				$("#down").animate({
					height:'70px',
					opacity:'1'
				},1000);
				$("#down").empty();
				$("#down").append("	<div id='arrow-new'></div><div id='arrow-text' class='arrow_button'> <p id='new'>+new</p> </div>");
				$("#arrow-text").click(newClick);
			});
		}


	$(document).ready(function() {
		loadAllComment(fration, topic, table, sta);

		$('#input_comment_area').keydown(function(event){inputKeyDown(event, uid, username, fration, topic, table)});
		$("#arrow-text").click(newClick);
		$('#allmask').click(function(){
		
			$('#allmask').css("visibility","hidden");
			$('#all').css("visibility","hidden");
			$('#allAuthor').html("");
			$('#allContent').html("");

			$('#profile').css("visibility","hidden")
		
			$('#allReply').html("");
			$('#replyPart').html("");
			$('#replyPart').append("<img id='replyButton' src='images/forumns/reply.png' /><textarea id='replyArea' placeholder='給點意見吧 !'></textarea>");
		});


		$('#allContent').perfectScrollbar({
          wheelSpeed: 20,
          wheelPropagation: false
        });

		$('#allReply').perfectScrollbar({
          wheelSpeed: 20,
          wheelPropagation: false
        });


	});

</script>
<meta charset='UTF-8' />
</head>

<body>
	<div id ='forums'>
		<div id='allComment'>
		</div>
	</div>
	<div id="hackpad">
			<?php if($_GET['fration'] == 2) { ?>
			<script src="https://qaweb.hackpad.com/QX40jss2oCy.js"></script>
			<noscript>
				<div>View <a href="https://qaweb.hackpad.com/QX40jss2oCy">BLACK</a> on Hackpad.</div>
			</noscript>
			<?php }else if($_GET['fration'] == 1){ ?>
			<script src="https://qaweb.hackpad.com/oUnAhk2LkjD.js"></script><noscript><div>View <a href="https://qaweb.hackpad.com/oUnAhk2LkjD">WHITE</a> on Hackpad.</div></noscript>
			<?php } ?>
	</div>
<?php if($_SESSION['fration'] == $_GET['fration'] && $valid == 0) {?>
<div id="down">
	<div id="arrow-new"></div>
	<div id="arrow-text" class="arrow_button"> <p id="new">+new</p> </div>
</div>
<?php } ?>
  <nav>  	
 	<div class='middle'>
		MENU
	</div>
	<?php if($_SESSION['fration'] != 1){ ?>	
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
	<?php if($_SESSION['fration'] != 2){ ?>
	<img id='white' class='link' src='images/mainpage/goWhite.png' width="100px" height="120px" />
	<?php } ?>
  </nav>
  <div id="allmask"></div>
  <div id="all">
  	<span id="allLeft">
  		<div id="allAuthor"></div>
		<div id="allContent"></div>
	</span>
	<span id="line"></span>
	<span id="allRight">
		<div id="allReply"></div>
	<?php  if(!empty($_SESSION['uid']) || $valid == 0){ ?>
		<div id="replyPart">
			<img id="replyButton" src="images/forumns/reply.png" />
			<textarea id="replyArea" placeholder="給點意見吧 !"></textarea>
		</div>
	<?php } ?>
	</span>

  </div>
  <div id='profile'>
  	<img id = 'bighead' src='images/test.jpg'> </img>
  	<div id = 'name'> <p> battle cat </p> </div>
  	<div id = 'post' class = 'list'> 
  		<img class = 'icon' src='images/profile/01.png'> </img>
  		<span class = 'tittle'> Post </span>
  		<span class = 'number'> 3132 </span> 
  	</div>
  	<div id = 'vote' class = 'list'> 
  		<img class = 'icon' src='images/profile/02.png'> </img>
  		<span class = 'tittle'> Vote </span>
  		<span class = 'number'> 3132 </span> 
  	</div>
  	<div id = 'last_time' class = 'list'> 
  		<img class = 'icon' src='images/profile/03.png'> </img>
  		<span class = 'tittle'> Last time </span>
  		<span class = 'number'> Jun 15 19:05 </span> 
  	</div>
  	<div id = 'give'> <p> TRUST </p> </div>

  </div>
</body>
</html>
