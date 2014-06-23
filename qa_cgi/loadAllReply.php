<?php 
	session_start();
	require "connect.php";
	$topic = $_GET['topic'];
	$table = $_GET['table'];
	if($_GET['fration'] == 2) $fration = 'Black';
	else $fration = 'White';
	$qid = $_GET['qid'];
	$tableName = "5_".$fration.$topic.$table."_".$qid;
?>

<script>
	var topic = '<?php echo $topic; ?>';
	var table = '<?php echo $table; ?>';
	var fration = '<?php echo $fration; ?>';
</script>

<?php
	$cquery = mysql_query("SELECT * FROM `$tableName`") or die(mysql_error()); 
	while(($crow = mysql_fetch_assoc($cquery)) != FALSE ) {
?>
			<div class="eachReply">
				<div class="replyName"><?php echo $cquery['username']; ?></div>
				<div class="replyContent"><?php echo $cquery['reply']; ?></div>
				<div class="replyLine"></div>
			</div>

<?php } ?>

