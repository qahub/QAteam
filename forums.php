<?php 

	require "qa_cgi/connect.php";
	$topic = 'Nuclear';
	$table = 1;
	$fration = 'Black';

?>

<html>
<head>
<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
<script src="js/upload.js"></script>
</head>

<style>
	#input_comment_area {
		resize: none;
	}
</style>

<body>
	<div id ='forums'>
		<div id='allComment'>
<?php 

	$cquery = mysql_query("SELECT * FROM `5_".$fration.$topic.$table."` ORDER BY `grade` DESC"); 
	while(($crow = mysql_fetch_assoc($cquery)) != FALSE ) {;
?>
			<div class='comment'>
				<div>
					<span class='name'><?php echo $crow['username']; ?> </span>
					<span class='comment'><?php echo nl2br($crow['comment']); ?></span>
				</div>
				<div>
					<span class='dateTime'><?php echo $crow['date']." ".$crow['time']; ?></span>
					<span class='grade'><?php echo $crow['grade']; ?></span> 
				</div>			
			</div>
<?php } ?>
		</div>
		<form id='add_comment_form'>
			<textarea id='input_comment_area'></textarea>
		</form> 
	</div>
</body>
</html>
