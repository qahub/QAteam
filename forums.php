<?php

	session_start();

?>

<html>
<head>
<link href="stylesheet/forums.css" rel="stylesheet" type="text/css"></link>
<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
<script src="js/commentFunc.js"></script>
<script>

	var uid = "<?php echo $_SESSION['uid'];?>";
	var username = "<?php echo $_SESSION['username'];?>";
	var fration = <?php echo $_GET['fration']; ?>;
	var topic = 'Nuclear';
	var table = 1;

	$(document).ready(function() {

		loadAllComment(fration, 'Nuclear', 1);

		$('#input_comment_area').keydown(function(event){inputKeyDown(event, uid, username, fration, topic, table)});

	});

</script>
<meta charset='UTF-8' />
</head>

<style>
	#input_comment_area {
		resize: none;
	}
</style>
<body>
	<div id ='forums'>
		<div id='allComment'>
		</div>
		<form id='add_comment_form'>
			<textarea id='input_comment_area'></textarea>
		</form> 
	</div>
	<div id="hackpad">
	</div>
<div id="down">
	<div id="arrow-new"></div>
	<div id="arrow-text"> <p id="new">+new</p> </div>
</div>
</body>
</html>
