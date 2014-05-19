<?php 

	require "connect.php";
	$topic = $_GET['topic'];

	$cquery = mysql_query("SELECT * FROM `5_FreeTalk".$topic."`") or die(mysql_error()); 
	while(($crow = mysql_fetch_assoc($cquery)) != FALSE ) {
?>
		<div class='talkBlock'>
			<span class='username'><?php echo $crow['username']; ?>: </span>
			<span class='talk'><?php echo $crow['talk']; ?></span>
		</div>


<?php } ?>

