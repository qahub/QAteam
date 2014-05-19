<?php

	session_start();

?>

<html>
<head>
<link href="stylesheet/forums.css" rel="stylesheet" type="text/css"></link>
<script src="http://code.jquery.com/jquery-2.1.0.min.js" type="text/javascript"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.js" type="text/javascript"></script>
<script src="js/commentFunc.js"></script>
<script>

	var uid = "123"; // "<?php echo $_SESSION['uid'];?>";
	var username = "ddd"; //"<?php echo $_SESSION['username'];?>";
	var fration = "0";//<?php echo $_GET['fration']; ?>;
	var topic = 'Nuclear';
	var table = 1;

function newClick(){
			$("#down").animate({
				height:'100%',
				opacity:'.9'
			},1000);
			//$("#arrow-new").remove();
			$("#down").empty();
			$("#down").append("<textarea id='reply'></textarea>");
			$("#down").append("<div id='arr'> <div id='arrow-submit'></div> <div id='arrow-subtext'> <p id='submit'>submit</p> </div> </div>");
			$("#down").append("<div id='arr2'> <div id='arrow-cancel'></div> <div id='arrow-cantext'> <p id='cancel'>cancel</p> </div> </div>");
		
			$("#arrow-cantext").click(function(){
				$("#down").animate({
					height:'70px',
					opacity:'1'
				},1000);
				$("#down").empty();
				$("#down").append("	<div id='arrow-new'></div><div id='arrow-text'> <p id='new'>+new</p> </div>");
				$("#arrow-text").click(newClick);
			});
		}

	$(document).ready(function() {

		loadAllComment(fration, 'Nuclear', 1);

		$('#input_comment_area').keydown(function(event){inputKeyDown(event, uid, username, fration, topic, table)});

		$("#arrow-text").click(newClick);

	});

</script>
<script type="text/javascript">


</script>
<meta charset='UTF-8' />
</head>

<body>
	<div id ='forums'>
		<div id='allComment'>
		</div>
		<form id='add_comment_form'>
			<textarea id='input_comment_area'></textarea>
		</form> 
	</div>
	<div id="hackpad">
		<script src="https://qaweb.hackpad.com/QX40jss2oCy.js"></script><noscript><div>View <a href="https://qaweb.hackpad.com/QX40jss2oCy">BLACK</a> on Hackpad.</div></noscript>
	</div>
<div id="down">
	<div id="arrow-new"></div>
	<div id="arrow-text"> <p id="new">+new</p> </div>
</div>
</body>
</html>
