<?php 

	require "connect.php";
	$topic = $_GET['topic'];
	$table = $_GET['table'];
	if($_GET['fration'] == 0) $fration = 'Black';
	else $fration = 'White';

	$cquery = mysql_query("SELECT * FROM `5_".$fration.$topic.$table."` ORDER BY `grade` DESC") or die(mysql_error()); 
	while(($crow = mysql_fetch_assoc($cquery)) != FALSE ) {
?>
			<div class='comment'>
				<div>
					<span class='name'><?php echo $crow['username']; ?> </span>
					<span class='comment'><?php echo nl2br($crow['comment']); ?></span>
				</div>
				<div>
					<span class='dateTime'><?php echo $crow['date']." ".$crow['time']; ?></span>
					<span class='grade'><?php echo $crow['grade']; ?></span>
					<span class='scoreButton' onclick='score(<?php echo $crow['id']; ?>, $(this).offset())'> score</span>
				</div>			
			</div>
<?php } ?>

