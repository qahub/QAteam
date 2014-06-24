<?php 
	session_start();
	require "connect.php";
	$topic = $_GET['topic'];
	$table = $_GET['table'];
	$fration = $_GET['fration'];
	$status = $_GET['status'];
	$qid = $_GET['qid'];
	$tableName = "5_".$fration.$topic.$status.$table."_".$qid;
?>

<?php
	$i=0;
	
	$cquery = mysql_query("SELECT * FROM `$tableName`"); 
	while(($crow = mysql_fetch_assoc($cquery)) != FALSE ) {
?>
			<div class="eachReply">
				<div class="replyName"><?php echo $crow['username']; ?></div>
				<div class="replyContent"><?php echo $crow['reply']; ?></div>
				<div class="replyLine"></div>
			</div>

<?php } ?>

