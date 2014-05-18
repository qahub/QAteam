<html>
<head>
<meta charset='utf8' />
<link href="stylesheet/forums.css" rel="stylesheet" type="text/css"></link>
<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
<script src="js/commentFunc.js"></script>
<script>

	var uid = '123123';
	var username = 'Jax';
	var fration = 0;
	var topic = 'Nuclear';
	var table = 1;

	$(document).ready(function() {

		loadAllComment(0, 'Nuclear', 1);

		$('#input_comment_area').keydown(function(event){inputKeyDown(event, uid, username, fration, topic, table)});

	});

</script>
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
</body>
</html>
